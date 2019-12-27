<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('validatecode');
        $this->load->model('authenticationwetalk');
    }

    public function index(){
        if(getAdminViewer()->id !=0){
            $permissions = getAdminViewer()->getUserRolePermission();
            if(count($permissions) >0) {
                redirect($permissions[0]->url);
            }
            $this->load->view('wePlatForm/login');
        }else{
            $this->load->view('wePlatForm/login');
        }
    }

    public function singIn(){
        redirect('StudyData/index');
    }

    public function getPicture(){
        $this->validatecode->doimg();
        $this->session->set_userdata('authnum_session', $this->validatecode->getCode());
        $this->validatecode->outputimage();
    }

    public function userLogin(){
        $data = $this->input->post();
        $data['redirect_url'] = "home";
        if($data){
            $sessioncoude = $this->session->userdata('authnum_session');
            if(strtolower($data['code']) === strtolower($sessioncoude)) {
                $result = $this->authenticationwetalk->onAdministratorAuthenticate($data['username'], $data['password']);
                if ($result->returncode['errcode'] != 0) {
                    $data['error'] = true;
                    $data['errordesc'] = $result->returncode['errdesc'];
                    // $this->load->view('login', $data);
                } else {
                    $user = $result->returncode['data'];
                    $this->session->set_userdata('adminviewer', serialize($user));
                    //redirect('home/');
                   // $data['redirect_url'] = $user->redirect_url;
                    $data['redirect_url'] =anchorurl('home/');
                }
            }else{
                    $data['error'] = true;
                    $data['errordesc'] = "验证码错误";
                    //$this->load->view('login', $data);
                }
        }else{
           // $this->load->view('login');
        }
        echo json_encode($data);

    }

    public function logout()
    {
        if ($this->session->unset_userdata('adminviewer')) {
            redirect('login');
        }
        redirect('login');
    }

}
