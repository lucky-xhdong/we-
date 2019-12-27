<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('authenticationwetalk');
    }

    public function index(){
        $this->load->view('exam/login');
    }

    public function userLogin(){
        $data = $this->input->post();
        if($data){
            $result =  $this->authenticationwetalk->onAuthenticate($data['username'],$data['password']);
            if( $result->returncode['errcode'] !=0 ){
                $data['error'] = true;
                $data['errordesc'] = $result->returncode['errdesc'];
                $this->load->view('exam/login', $data);
            }else{
                $this->session->set_userdata('viewer', serialize((object)$result->returncode['data']));
                redirect('home/');
            }
        }else{
            $this->load->view('exam/login');
        }
    }


    public function logout(){
        if ($this->session->unset_userdata('viewer')) {
            redirect('login');
        }
        redirect('exam/login');
    }
}


