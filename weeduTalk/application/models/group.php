<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Model{

    public $objectType = "group";

    public $type = "group";


    public function __construct()
    {
        parent::__construct();
        $this->load->model('notification');
        $this->_initialize();


    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'                => array("require" => false),
            'name'              => array("require" => true),
            "description"       => array("require" => false),
            "filename" 		    => array("require" => false),
            "created_time"      => array("require" => false),
            'user_id'    	    => array("require" => false),
            'follower_count'  	=> array("require" => false),
            'story_count'		=> array("require" => false),
            'update_time'       => array("require" => false)
        );
        parent::_initialize($config);
    }

    public function getGroup($id){
        $iuser = new self;
        $data = $this->config['attributes'];
        $user = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("groups")->row_array();
        if($user){
            foreach($user as $key=>$val){
                if(empty($val)) $val = "";
                $iuser->$key = $val;
            }
        }else{
            $iuser->id = 0;
        }
        return $iuser;
    }

    public function getGroupsInfo(){

        $data = array(
                'id'                => (int)$this->id,
                'name'              => $this->name,
                "description"       => $this->description,
                "fileurl" 		    => $this->storage->setMinxer($this)->getFileName($this->filename),
                "created_time"      => $this->created_time,
                'userInfo'    	    => $this->user->getUser($this->user_id)->getUserInfoNotToken(),
                'follower_count'  	=> $this->follower_count,
                'update_time'       => $this->update_time,
                'follower_ids'      => $this->getFollowerIds(),
                'administrator_ids' => $this->getAdministratorIds(),
                'is_official'       => false
        );
        return $data;
    }

    public function getFollowerIds(){
        $result = $this->db
            ->select("user_id as id")
            ->where('group_id',$this->id)
            ->where('is_admin',0)
            ->get('group_followers')->result();
        $data = array();
        foreach($result as $item){
            $data[] = $item->id;
        }
        return $data;
    }


    public function getAdministratorIds(){
        $result = $this->db
            ->select("user_id as id")
            ->where('group_id',$this->id)
            ->where('is_admin',1)
            ->get('group_followers')->result();
        $data = array();
        foreach($result as $item){
            $data[] = $item->id;
        }
        return $data;
    }




    public function  updateKey($data = array()){
        if(count($data)){
            $this->db->where("id",$this->id);
            $this->db->update("groups",$data);
        }
        return true;
    }

    /*
   *
   * 获取关注我的好友列表
   *
   *
  **/
    public function getGroupFollowerList($user,$limit=20,$start=0){
       // $this->notification->setMinxer($this)->updateNotificationStatus("follow");
        $result = $this->db
            ->where('group_id',$this->id)
            ->order_by("id","desc");
        if($limit != 0) $result = $result->limit($limit,$start);
            $result = $result->get('group_followers')->result();
        $data = array();
        foreach($result as $follower){
            $users = $this->user->getUser($follower->user_id)->getUserInfoNotToken($user);
            $users['remarks']  = $follower->remarks;
            $users['is_admin'] = $follower->is_admin;
            $data[] = $users;
        }
        $this->returncode['data']    = $data;
        return $this;
    }

    /*
     *
     * 判断圈是不是已经加入
     *
     */

    public function isFollower($user_id){
        $row = $this->db->where('user_id',$user_id)->where('group_id',$this->id)->get('group_followers')->num_rows();
        if($row == 0) return false;
        return true;
    }


    /*
     *
     * 判断圈是不是群主
     *
     */

    public function isAdmin($user){
        $row = $this->db->where('user_id',$user->id)->where('is_admin',1)->where('group_id',$this->id)->get('group_followers')->num_rows();
        if($row == 0) return false;
        return true;
    }

    /*
     *
     * 关注圈
     *
     *
     */

    public function addFollower($user_id,$is_admin=0){
        $user = $this->user->getUser($user_id);
        $row = $this->db->where('user_id',$user->id)->where('group_id',$this->id)->get('group_followers')->num_rows();
        if($row == 0){
            if($user && !empty($user->id)){
               // $this->type = "follow";
                //$this->notification->setMinxer($this)->addNotification($user,$this,'follow');
                $data = array(
                    'user_id'     => $user->id,
                    'group_id'    => $this->id,
                    'created_time'=> date('Y-m-d H:i:s'),
                    'remarks'     => $user->name,
                    'is_admin'    => $is_admin
                );
                $this->db->insert('group_followers',$data);
                $this->addGroupMessageToRedis($user,'group','add',$this);
            }else{
                $this->returncode['errcode'] = 100031;
                $this->returncode['errdesc'] = "用户不存在";
            }
            $this->resetStatus();
        }else{
            $this->returncode['errcode'] = 100033;
            $this->returncode['errdesc'] = "你已经加入了圈";
        }

        return $this;
    }

    /*
     *
     * 取消关注圈
     *
     *
     */

    public function removeFollower($user_id){
        $user = $this->user->getUser($user_id);
        if($user){
            $row = $this->db->where('user_id',$user->id)->where('group_id',$this->id)->get('group_followers')->num_rows();
            if($row){
                //$this->type = "unfollow";
                $this->notification->setMinxer($this)->addNotification($user,$this,'unfollow');
                // 将之前的follower消息置为已读

                $this->db->where('user_id',$user->id)->where('group_id',$this->id);
                $this->db->delete('group_followers');
                $this->addGroupMessageToRedis($user,'group','del',$this);
            }
            $this->resetStatus();
        }else{
            $this->returncode['errcode'] = 100031;
            $this->returncode['errdesc'] = "用户不存在";
        }
        return $this;
    }

    public function createNewGroup($post,$user){
            $data = array(
                'name'        => $post['name'],
                'description' => $post['name'],
                'created_time'=> date('Y-m-d H:i:s'),
                'user_id'     => $user->id,
                'update_time' => date('Y-m-d H:i:s'),
                'class_id'    => $post['class_id']
            );
            $this->db->insert('groups',$data);
            $group = $this->getGroup($this->db->insert_id());

            $group->resetStatus();
            $data = $this->getGroup($group->id)->getGroupsInfo();
            $this->returncode['data']    = $data;
            $data['created_by'] = $user->id;
            $this->sendSocketTogroupChat(json_encode($data));
          return $group;
    }


    public function createGroup($user){
        $post = $this->input->post();
        if(isset($post['group_id'])){
            if(isset($post['name'])){
                $data = array(
                    'name'        => $post['name'],
                    'update_time' => date('Y-m-d H:i:s'),
                );
                $this->db->where("id",$post['group_id'])->update('groups',$data);
                $data = $this->getGroup($post['group_id'])->getGroupsInfo();
                $this->returncode['data']    = $data;
            }
        }else{
            if(isset($post['name'])){
                $data = array(
                    'name'        => $post['name'],
                    'description' => $post['name'],
                    'created_time'=> date('Y-m-d H:i:s'),
                    'user_id'     => $user->id,
                    'update_time' => date('Y-m-d H:i:s'),
                );
                $this->db->insert('groups',$data);
                $group = $this->getGroup($this->db->insert_id());
                $group->addFollower($user->id,1);

                if(isset($post['user_ids']) && !empty($post['user_ids'])){
                    $users = explode(',',$post['user_ids']);
                    foreach($users as $user_id){
                        $group->addFollower($user_id);
                    }
                }
                $group->resetStatus();
                $data = $this->getGroup($group->id)->getGroupsInfo();
                $this->returncode['data']    = $data;
                $data['created_by'] = $user->id;
                $this->sendSocketTogroupChat(json_encode($data));

            }
        }
        return $this;
    }


    public function createClassGroup($user,$post){
            if(isset($post['name'])){
                $data = array(
                    'name'        => $post['name'],
                    'description' => $post['name'],
                    'created_time'=> date('Y-m-d H:i:s'),
                    'user_id'     => $user->id,
                    'update_time' => date('Y-m-d H:i:s'),
                );
                $this->db->insert('groups',$data);
                $group = $this->getGroup($this->db->insert_id());
                $group->addFollower($user->id,1);

                if(isset($post['user_ids']) && !empty($post['user_ids'])){
                    $users = explode(',',$post['user_ids']);
                    foreach($users as $user_id){
                        $group->addFollower($user_id);
                    }
                }
                $group->resetStatus();
                $data = $this->getGroup($group->id)->getGroupsInfo();
                $this->returncode['data']    = $data;
                $data['created_by'] = $user->id;
                $this->sendSocketTogroupChat(json_encode($data));

            }
        return $this;
    }

    public function resetStatus(){
        if($this->id){
            $row =  $this->db->select('count(*) as num')
                ->where("group_id",$this->id)
                ->get("group_followers")->row();
            $this->updateKey(
                array(
                    'follower_count'=>$row->num
                )
            );
        }
        return $this;
    }

    /*
     * 获取我的groupList
     */

    public function  getMyGroupList($user,$limit=20,$start=0){
        $result = $this->db
            ->where('user_id',$user->id)
            ->order_by("id","desc");
         if($limit != 0) $result = $result->limit($limit,$start);
        $result = $result->get('group_followers')->result();
        $data = array();
        foreach($result as $item){
            $group = $this->getGroup($item->group_id);
            $data[] = $group->getGroupsInfo();
        }
        $this->returncode['data']    = $data;
        return $this;
    }

    public function getGroupEntity($user){
        if(!empty($this->id)){
            $data = $this->getGroupsInfo();
            $this->returncode['data']    = $data;
        }else{
            $this->returncode['errcode'] = 100043;
            $this->returncode['errdesc'] = "群组不存在";
        }
        return $this;
    }

    public function sendSocketTogroupChat($data_string){
        $clientServer =  client_url();
        if(isset($clientServer) && !empty($clientServer)){
            $ch = curl_init($clientServer.'chat/createNewGroup');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
            curl_setopt($ch, CURLOPT_TIMEOUT,10);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string))
            );
            $result = curl_exec($ch);
        }
    }



    public function addGroupMessageToRedis($follower,$type='group',$op='add',$actor,$actor2=null){
        $clientServer =  client_url();
        if($op == "add"){
            $contentType = "joinGroup";
        }else{
            $contentType = "exitGroup";
        }

        if(isset($clientServer) && !empty($clientServer)){
            if($actor2){
                $contentType = "takeOutGroup";
                $data = array(
                    "actor"=>$actor->id,
                    "follower" =>$follower->id,
                    'type'=>$type,
                    'op'=>$op,
                    "subjectAvatar"=>$actor2->getAvatarUrl(),
                    "subjectId"=>$actor2->id,
                    "subjectName"=>$actor2->name,
                    "objectId"  =>$follower->id,
                    "objectName"=>$follower->name,
                    "contentType"=>$contentType,
                );
            }else{
                $data = array(
                    "actor"=>$actor->id,
                    "follower" =>$follower->id,
                    'type'=>$type,
                    'op'=>$op,
                    "subjectAvatar"=>$follower->getAvatarUrl(),
                    "subjectId"=>$follower->id,
                    "subjectName"=>$follower->name,
                    "objectId"  =>"0",
                    "objectName"=>"",
                    "contentType"=>$contentType,
                );
            }

            $data_string = json_encode($data);
            $ch = curl_init($clientServer.'chat/actorFollowersUpate');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
            curl_setopt($ch, CURLOPT_TIMEOUT,10);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string))
            );
            $result = curl_exec($ch);
        }
    }

}  
