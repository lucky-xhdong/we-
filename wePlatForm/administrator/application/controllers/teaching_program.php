<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 *创建课程计划
 *
 *
 **/


class Teaching_program extends CI_Controller {

    function __construct(){
        parent::__construct();
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
        $this->load->view('wePlatForm/teaching_program');
    }
}
