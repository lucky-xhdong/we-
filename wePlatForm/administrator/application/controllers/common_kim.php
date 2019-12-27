<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * @author kim.zhang
 * 通用功能
 *
 */
class Common extends CI_Controller {

    function __construct(){
        parent::__construct();
        
        $this->load->model('courseauth');
        if(!getAdminViewer()->id){
            redirect('login');
        }else{
           // if($this->userpermission->hasPermissions(getAdminViewer(),array_keys($this->region->initPermission())) === false){
           //     redirect('error');
           // }
        }
    }

    public function setPassWord($user_id)
    {
    	$password = "123456";
    	//$data = $this->db->update()
    }
}
