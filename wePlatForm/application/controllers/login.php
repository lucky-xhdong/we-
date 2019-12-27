<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('authenticationwetalk');
        $this->load->model('user');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function userLogin(){
        $data = $this->input->post();
        $data['error']     = false;
        $data['errcode']   = 0;
        $data['errordesc'] =  "";
        if($data){
            $result =  $this->authenticationwetalk->onAuthenticateRegional($data['username'],$data['password']);
            if( $result->returncode['errcode'] !=0 ){
                $data['error'] = true;
                $data['errcode'] = $result->returncode['errcode'];
                $data['errordesc'] = $result->returncode['errdesc'];
            }else{
                $user = $result->returncode['data'];
                $this->session->set_userdata('viewer', serialize($user));
            }
        }else{
            $data['error']     = true;
            $data['errcode']   = 112211;
            $data['errordesc'] =  "未检测到登陆信息!";
        }
        echo json_encode($data);
    }


    public function changePassword(){
        $this->load->view('changePassword');
    }

    public function logout(){
        if ($this->session->unset_userdata('viewer')) {
            redirect('login');
        }
        redirect('login');
    }
}
