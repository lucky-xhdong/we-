<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Tags extends CI_Model{


    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'                => array("require" => false),
            'name'              => array("require" => true),
            "type"              => array("require" => false),
            "user_id"           => array("require" => false),
            "create_time"       => array("require" => false),
        );
        parent::_initialize($config);
    }

    public function getTag($id){
        $tag = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("region_tags")->row_array();
        if($item){
            foreach($item as $key=>$val){
                if(empty($val)) $val = "";
                $tag->$key = $val;
            }
        }else{
            $tag->id = 0;
        }
        return $tag;
    }

    public function getUserInfo(){
        return $this->user->getUser($this->user_id)->getUserInfoNotToken();
    }

    public function getTagInfo(){

        $data = array(
            'id'                => $this->id,
            'name'              => $this->name,
            "type" 		        => $this->type,
            "user_id" 		    => $this->user_id,
            "userInfo"          =>$this->getUserInfo(),
            "create_time" 		=> $this->create_time,

        );
        return $data;
    }




    public function  updateKey($data = array()){
        if(count($data)){
            $this->db->where("id",$this->id);
            $this->db->update("region_tags",$data);
        }
        return true;
    }



    public function getTagCount($post){
        $roles = $this->db->select('*');
        if(isset($post['key']) && !empty($post['key'])) {
            $roles = $roles->like("name", $post['key']);
        }
        $entity = $this->input->get();

        if(isset($entity['type']) && !empty($entity['type'])){
            $items =$roles->where("type",$entity['type']);
        }
        $roles =  $roles->get('region_tags')->num_rows();
        return $roles?$roles:0;
    }

    /*
     *
     * 获取阿米巴列表数据
     */

    public function getTagList($limit=20,$start=0){
        $data = array();
        $entity = $this->input->get();

        $items = $this->db->select("id");
        if(isset($entity['type']) && !empty($entity['type'])){
            $items =$items->where("type",$entity['type']);
        }
        $items =$items->order_by("id","desc")->limit($limit,$start)->get("region_tags")->result();
        foreach($items as $item){
            $data[] = $this->getTag($item->id)->getTagInfo();
        }
        return $data;
    }


    public function save($data){
        $entity = $this->config['attributes'];
        foreach($data as $key => $val){
            if(!in_array($key,array_keys($entity)) && $key != "tag_id"){
                unset($data[$key]);
            }
        }
        if(!empty($data['tag_id'])){
            $this->db->where("id",$data['tag_id']);
            unset($data['tag_id']);
            $this->db->update("region_tags",$data);
        }else{
            unset($data['tag_id']);
            $data['user_id'] = getAdminViewer()->id;
            $data['create_time'] = date('Y-m-d H:i:s');
            $this->db->insert("region_tags",$data);
        }
        return true;
    }




    public function DeleteTag($data){
        if(isset($data['id']) && !empty($data['id'])){
            $this->db->where("id",$data['id']);
            $this->db->delete('region_tags');
        }
        return $this;
    }
}  
