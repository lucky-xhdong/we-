<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Roles extends CI_Model{


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
            "type"               => array("require" => false),
        );
        parent::_initialize($config);
    }

    public function getRole($id){
        $amoeba = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("user_role")->row_array();
        if($item){
            foreach($item as $key=>$val){
                if(empty($val)) $val = "";
                $amoeba->$key = $val;
            }
        }else{
            $amoeba->id = 0;
        }
        return $amoeba;
    }

    public function getRoleInfo(){

        $data = array(
            'id'                => $this->id,
            'name'              => $this->name,
            "type" 		        => $this->type,
            "permissions"       =>$this->permission->getRolePermissionList($this->id)

        );
        return $data;
    }



    public function getPermissionCount(){
        return $this->db->get('user_role')->num_rows();
    }


    public function  updateKey($data = array()){
        if(count($data)){
            $this->db->where("id",$this->id);
            $this->db->update("user_role",$data);
        }
        return true;
    }


        public function addRole($data){
        if(isset($data['role_id']) && !empty($data['role_id']) && $data['role_id'] !=0  && isset($data['name'])){
            //TODO 编辑
            $data1 = array(
                "name"=>$data['name'],
            );
            $this->db->where("id",$data['role_id']);
            $this->db->update('user_role',$data1);
        }else{
            if(isset($data['name'])){
                $entity = array(
                    "name"=>$data['name'],
                    "type"=>rand(100000,999999)
                );
                $this->db->insert('user_role',$entity);
                $data['role_id'] = $this->db->insert_id();
            }
        }
        if(isset($data['role_id']) && $data['role_id'] !=0){
            if(isset($data['permissions']) && !empty($data['permissions'])){
                $permissions = json_decode($data['permissions']);
                $this->db->where("rid",$data['role_id'])->delete("user_role_permission");
                foreach($permissions as $permission){
                    $entity = array(
                        "rid"=>$data['role_id'],
                        "pid"=>$permission
                    );
                    $this->db->insert('user_role_permission',$entity);
                }
            }
        }

        return $this;
    }

    public function getRoletCount($post){
        $roles = $this->db->select('*');
        if(isset($post['key']) && !empty($post['key'])) {
            $roles = $roles->like("name", $post['key']);
        }
        $roles =  $roles->get('user_role')->num_rows();
        return $roles?$roles:0;
    }

    /*
     *
     * 获取阿米巴列表数据
     */

    public function getRoleList($limit=20,$start=0){
        $data = array();
        $items = $this->db->select("id")->order_by("id","desc")->limit($limit,$start)->get("user_role")->result();
        foreach($items as $item){
            $data[] = $this->getRole($item->id)->getRoleInfo();
        }
        return $data;
    }


    public function save($data){
        $entity = $this->config['attributes'];
        foreach($data as $key => $val){
            if(!in_array($key,array_keys($entity)) && $key != "role_id"){
                unset($data[$key]);
            }
        }
        if(!empty($data['role_id'])){
            $this->db->where("id",$data['role_id']);
            unset($data['role_id']);
            $this->db->update("user_role",$data);
        }else{
            unset($data['role_id']);
            $this->db->insert("user_role",$data);
        }
        return true;
    }




    public function getPermissionList($role=null)
    {
        $result = $this->db->where("level",1)->where("parent_id",0)->get('permissions')->result();
        if(isset($role->id) && !empty($role->permission_ids)){
            $permissionarry = explode(',',$role->permission_ids);
        }else{
            $permissionarry = array();
        }
        foreach($result as  $item){
            $child1 = $this->db->where("level",2)->where("parent_id",$item->id)->get('permissions')->result();
            $item->chlid = $child1;
            foreach($item->chlid as $child){
                $child2 = $this->db->where("level",3)->where("parent_id",$child->id)->get('permissions')->result();
                foreach($child2 as $lastItem){
                    if(in_array($lastItem->id,$permissionarry)){
                        $lastItem->ischecked = true;
                    }else{
                        $lastItem->ischecked = false;
                    }
                }
                $child->child = $child2;
            }
        }
//        echo "<pre>";
//        var_dump($result);exit;
//        echo "</pre>";
        return $result;
    }

//    public function addRole($data){
//        if(isset($data['id']) && !empty($data['id'])){
//            //TODO 编辑
//            $data1 = array(
//                "name"=>$data['name'],
//                "permission_ids"=>implode(',',$data['permissios_id']),
//            );
//            $this->db->where("id",$data['id']);
//            $this->db->update('permissions_role',$data1);
//        }else{
//            $data = array(
//                "name"=>$data['name'],
//                "permission_ids"=>implode(',',$data['permissios_id']),
//                "user_id"=>getAdminViewer()->id,
//                "created_time"=>date('Y-m-d H:i:s')
//            );
//            $this->db->insert('permissions_role',$data);
//        }
//        return $this;
//    }

//    public function getRoleList($limit=20,$start=0,$post){
//        $roles = $this->db->select('*');
//        if(isset($post['key']) && !empty($post['key'])) {
//            $roles = $roles->like("name", $post['key']);
//        }
//        $roles =  $roles->limit($limit,$start)->get('permissions_role')->result();
//        foreach($roles as $role){
//            $role->operations = "<div class='handle-icon'><span class='role-change' data-id='".$role->id."'>修改</span><span class='role-del' data-id='".$role->id."'>删除</span><span class='role-check' data-id='".$role->id."'>查看</span></div>";
//        }
//        return $roles;
//    }
//
//
//    public function getRoletCount($post){
//        $roles = $this->db->select('*');
//        if(isset($post['key']) && !empty($post['key'])) {
//            $roles = $roles->like("name", $post['key']);
//        }
//        $roles =  $roles->get('permissions_role')->num_rows();
//        return $roles?$roles:0;
//    }
//
//    public function getRole($id){
//        return  $this->db->select('*')->where("id",$id)->get('permissions_role')->row();
//    }

    public function DeleteRole($data){
        if(isset($data['id']) && !empty($data['id'])){
            $this->db->where("rid",$data['id'])->delete("user_role_permission");
            $this->db->where("id",$data['id']);
            $this->db->delete('user_role');
        }
        return $this;
    }
}  
