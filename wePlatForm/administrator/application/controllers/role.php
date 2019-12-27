<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('roles');
        $this->load->model('permission');
        if(!getAdminViewer()->id){
            redirect('login');
        }else{
            $permissions = getAdminViewer()->getUserRolePermission();
            $permission_urls = array();
            foreach($permissions as $permission){
                $permission_urls[] = $permission->url;
            }
            if(!in_array("/role/",$permission_urls)){
                redirect('error');
            }
        }
    }

    public function index(){
        $data['permissions'] = $this->roles->getPermissionList();
        $this->load->view('role',$data);
    }


    public function getPermissionList(){

        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        $data = $this->input->get();
        echo json_encode(array(
            'items'=>$this->permission->getPermissionList($limit,($page-1)*$limit),
            'totalCount'=>$this->permission->getPermissionCount($data),
        ));
    }


    public function addPermission(){
        $data = $this->input->post();
        $this->permission->save($data);
        echo json_encode($this->returncode);
    }

    public function getAmoebaList(){
//        echo json_encode(array(
//            'data'=>$this->amoeba->getAmoebaInfoList(),
//            'itemsCount'=>$this->amoeba->getAmoebaCount(),
//        ));
   }

    public function addRole(){
        $data = $this->input->post();
        $this->roles->addRole($data);
        echo json_encode($this->returncode);
    }

    public function getRolesList(){
        $data = $this->input->post();
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$this->roles->getRoleList($limit,($page-1)*$limit,$data),
            'totalCount'=>$this->roles->getRoletCount($data),
        ));
    }

    public function getRoleInfo($id,$isView){
        $data['role'] = $this->roles->getRole($id);
        $data['isView'] = $isView;
        $data['permissions'] = $this->roles->getPermissionList($data['role']);
        $this->load->view('tmpl/RoleBasicEdit',$data);
    }

    public function DeleteRole(){
        $data = $this->input->post();
        $this->roles->DeleteRole($data);
        echo json_encode($this->returncode);
    }

}
