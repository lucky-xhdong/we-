<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 *
 * 即时聊天接口
 *
 * */

class Messages extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('group');
    }


    /*
    *
    * 上传图片体文件
    *
    */

    public function addImage(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
       // $this->returncode['errcode'] = 1000005;
        //$this->returncode['errdesc'] = "消息服务已经关闭";
       // return $this;
        if($user) {
            $user->objectType = "message";
            $file= $this->storage->setMinxer($user)->uploadfile();
            if($file->errorCode == 0){
                $filename    =  $file->data['file_name'];
                $this->returncode['data'] = array(
                    "small"=>$this->storage->setMinxer($user)->getFileName($filename),
                    "origin"=>$this->storage->setMinxer($user)->getFileName($filename,'origin'),
                );
            }else{
                $this->returncode['errcode'] = 1000003;
                $this->returncode['errdesc'] = "文件上传失败";
                $this->returncode['data']    = $file;
            }
        }
        return $this;
    }

    /*
     *
     * 上传对媒体文件
     *
     */

    public function addMediaFile(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
//        $this->returncode['errcode'] = 1000005;
//        $this->returncode['errdesc'] = "消息服务已经关闭";
        //return $this;
        if($user) {
            $user->objectType = "message";
            $file = $this->storage->setMinxer($user)->uploadMediaFile();
            if($file->errorCode == 0){
                $filename    =  $file->data['file_name'];
                $this->returncode['data'] = $this->storage->setMinxer($user)->getFileName($filename,'origin');
            }else{
                $this->returncode['errcode'] = 1000003;
                $this->returncode['errdesc'] = "文件上传失败";
                $this->returncode['data']    = $file->errorMessage;
            }
        }
        return $this;
    }


    public function getFollowerList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=3){
            $limit = isset($argus[0])?$argus[0]:20;
            $start = isset($argus[1])?$argus[1]:0;
            return $user->getMyFollowerList($user,$limit,$start);
        }
        return $this;
    }


    /*
     *
     * 关注好友
     *
     *
     **/

    public function addFollower(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $userid = isset($argus[0])?$argus[0]:0;
            return $user->addFollower($userid);
        }else{
            $this->returncode['errcode'] = 1000001;
            $this->returncode['errdesc'] = "无效的用户";
        }
        return $this;
    }


    /*
    *
    * 取消关注好友
    *
    *
    **/

    public function removeFollower(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $userid = isset($argus[0])?$argus[0]:0;
            return $user->removeFollower($userid);
        }else{
            $this->returncode['errcode'] = 1000001;
            $this->returncode['errdesc'] = "无效的用户";
        }
        return $this;
    }

    /*
     *
     * 创建圈
     */

    public function addGroup(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            return $this->group->createGroup($user);
        }else{
            $this->returncode['errcode'] = 1000001;
            $this->returncode['errdesc'] = "无效的用户";
        }
        return $this;
    }

    /*
    *
    * 获取我加入的圈列表
    */

    public function getMyGroupList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=3){
            $limit = isset($argus[0])?$argus[0]:20;
            $start = isset($argus[1])?$argus[1]:0;
            return $this->group->getMyGroupList($user,$limit,$start);
        }
        return $this;
    }

    /*
    *
    * 获取圈成员
    *
    *
    **/

    public function getGroupFollowerList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=3){
            $group_id = isset($argus[0])?$argus[0]:0;
            $limit = isset($argus[1])?$argus[1]:20;
            $start = isset($argus[2])?$argus[2]:0;
            $group = $this->group->getGroup($group_id);
            return $group->getGroupFollowerList($user,$limit,$start);
        }else{
            $this->returncode['errcode'] = 1000001;
            $this->returncode['errdesc'] = "无效的用户";
        }
        return $this;
    }

    /*
     *
     * 邀请别人加入圈
     */

    public function inviteJoinGroup(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $group_id = isset($argus[0])?$argus[0]:0;
            $user_ids = $this->input->post('user_ids');
            $group = $this->group->getGroup($group_id);
            if($user_ids && !empty($group->id)){
                $users = explode(',',$user_ids);
                foreach($users as $user_id){
                    if(!$group->isFollower($user_id)) $group->addFollower($user_id);
                }
            }

        }else{
            $this->returncode['errcode'] = 1000001;
            $this->returncode['errdesc'] = "无效的用户";
        }
        return $this;
    }

    /*
     *
     * 踢出圈
     */

    public function kickGroupFollower(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $group_id = isset($argus[0])?$argus[0]:0;
            $user_id = isset($argus[1])?$argus[1]:1;
            $group = $this->group->getGroup($group_id);
            if($group->isAdmin($user) && $user->id != $user_id) $group->removeFollower($user_id);
            else{
                $this->returncode['errcode'] = 2000001;
                $this->returncode['errdesc'] = "你无权限执行此操作";
            }
        }else{
            $this->returncode['errcode'] = 1000001;
            $this->returncode['errdesc'] = "无效的用户";
        }
        return $this;
    }

    /*
     *
     * 加入圈
     *
     *
     **/

    public function addGroupFollower(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $group_id = isset($argus[0])?$argus[0]:0;
            $group = $this->group->getGroup($group_id);
            return $group->addFollower($user->id);
        }else{
            $this->returncode['errcode'] = 1000001;
            $this->returncode['errdesc'] = "无效的用户";
        }
        return $this;
    }

    /*
     *
     * 加入圈
     *
     *
     **/

    public function removeGroupFollower(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $group_id = isset($argus[0])?$argus[0]:0;
            $group = $this->group->getGroup($group_id);
            return $group->removeFollower($user->id);
        }else{
            $this->returncode['errcode'] = 1000001;
            $this->returncode['errdesc'] = "无效的用户";
        }
        return $this;
    }

    /*
    *
    * 获取单个圈信息
    *
    *
    **/

    public function getGroupInfo(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $group_id = isset($argus[0])?$argus[0]:0;
            $group = $this->group->getGroup($group_id);
            return $group->getGroupEntity($user);
        }else{
            $this->returncode['errcode'] = 1000001;
            $this->returncode['errdesc'] = "无效的用户";
        }
        return $this;
    }

    /*
     *
     * 个人信息返回
     *
     *
     **/

    public function getUserInfo(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $user_id = isset($argus[0])?$argus[0]:0;
            $user = $this->user->getUser($user_id);
            return $user->getUserDetail();
        }else{
            $this->returncode['errcode'] = 1000001;
            $this->returncode['errdesc'] = "无效的用户";
        }
        return $this;
    }


    /*
     *
     * 搜索人
     *
     *
     **/

    public function searchUsers(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
             $data = array();
             $limit  = isset($argus[0])?$argus[0]:20;
             $start  = isset($argus[1])?$argus[1]:0;
             $key   = $this->input->post('key');
             $users = $this->db->select("id");
            if(!empty($key)) $users = $users->like("name",$key)->or_like("mobile",$key)->or_like("username",$key);
             $users = $users->where("id !=",$user->id)->limit($limit,$start)->get("users")->result();
             foreach($users as $user1){
                 $data[] = $this->user->getUser($user1->id)->getUserInfoNotToken($user);
             }
            $this->returncode['data'] = $data;
        }else{
            $this->returncode['errcode'] = 1000001;
            $this->returncode['errdesc'] = "无效的用户";
        }
        return $this;
    }


}
