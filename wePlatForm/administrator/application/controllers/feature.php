<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 *课程管理
 *
 *
 **/


class Feature extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('tags');
        if(!getAdminViewer()->id){
            redirect('login');
        }else{
            $permissions = getAdminViewer()->getUserRolePermission();
            $permission_urls = array();
            foreach($permissions as $permission){
                $permission_urls[] = $permission->url;
            }
        }
    }


    public function index(){
        $this->load->view('wePlatForm/feature_manage');
    }


    public function getTagList(){

        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        $data = $this->input->get();
        echo json_encode(array(
            'items'=>$this->tags->getTagList($limit,($page-1)*$limit),
            'totalCount'=>$this->tags->getTagCount($data),
        ));
    }

    public function addTag(){
        $post = $this->input->post();
        $this->tags->save($post);
        echo json_encode($this->returncode);
    }
}
