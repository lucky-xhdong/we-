<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reform extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('category') ;
        $this->load->model('article') ;

    }

    public function index()
    {
        $data['categorys'] = $this->category->getCategoryArticleList(65);
        $this->load->view('reform',$data);
    }

}
