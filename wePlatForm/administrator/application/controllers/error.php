<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);

class Error extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!getAdminViewer()->id){
            redirect('login');
        }
    }

    public function index(){
        $this->load->view('wePlatForm/error_general');
    }

}


