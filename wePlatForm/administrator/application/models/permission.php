<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Permission extends CI_Model{



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
            "url"               => array("require" => false),
            "category"               => array("require" => false),
         );
        parent::_initialize($config);
    }

    public function getPermission($id){
        $amoeba = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("user_permission")->row_array();
        if($item){
            foreach($item as $key=>$val){
                if(empty($val) && $val != 0) $val = "";
                $amoeba->$key = $val;
            }
        }else{
            $amoeba->id = 0;
        }
        return $amoeba;
    }

    public function getPermissionInfo(){

        $data = array(
            'id'                => $this->id,
            'name'              => $this->name,
            "url" 		        => $this->url,
            "category"          => $this->category,

        );
        return $data;
    }



    public function getPermissionCount(){
        return $this->db->get('user_permission')->where("category","0")->num_rows();
    }


    public function  updateKey($data = array()){
        if(count($data)){
            $this->db->where("id",$this->id);
            $this->db->update("user_permission",$data);
        }
        return true;
    }

    /*
     *
     * 获取阿米巴列表数据
     */

    public function getPermissionList($limit=20,$start=0){
        $data = array();
        $items = $this->db->select("id")->limit($limit,$start)->where("category","0")->get("user_permission")->result();
        foreach($items as $item){
            $data[] = $this->getPermission($item->id)->getPermissionInfo();
        }
        return $data;
    }


    public function getRolePermissionList($rid = 0){
        $data = array();
        $items = $this->db->select("pid")->where("rid",$rid)->where("category","0")->get("user_role_permission")->result();
        foreach($items as $item){
            $data[] = array(
                "pid"=>$item->pid
            );
        }
        return $data;
    }


    public function save($data){
        $entity = $this->config['attributes'];
        foreach($data as $key => $val){
            if(!in_array($key,array_keys($entity)) && $key != "permission_id"){
                unset($data[$key]);
            }
        }
        if(!empty($data['permission_id'])){
            $this->db->where("id",$data['permission_id']);
            unset($data['permission_id']);
            $this->db->update("user_permission",$data);
        }else{
            unset($data['permission_id']);
            $this->db->insert("user_permission",$data);
        }
        return true;
    }



}  
