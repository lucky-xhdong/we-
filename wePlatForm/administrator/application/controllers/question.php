<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);

class Question extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('amoeba');
        $this->load->model('school');
        $this->load->model('grades');
        $this->load->model('classes');
        $this->load->model('question');
        if(!getAdminViewer()->id){
            redirect('login');
        }
    }

    public function index(){
        $data['amoebas'] = $this->amoeba->getAmoebaList();
        $this->load->view('studyData',$data);
    }

    public function uploadQuestion(){
        echo '321321';
//        $data=$this->input->post();
//        echo $data['quest_content'];
    }

}


