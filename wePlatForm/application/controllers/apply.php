<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apply extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('category') ;
        $this->load->model('article') ;

    }

    public function index()
    {
        $this->load->view('apply');
    }

}
