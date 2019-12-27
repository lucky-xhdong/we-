<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Region extends CI_Controller {

	function __construct(){
	   parent::__construct();
       $this->load->model('category') ;
        $this->load->model('article') ;

    }

	public function index($category_id = 0,$start = 0)
	{
	    $this->load->view('region');

	}

}
