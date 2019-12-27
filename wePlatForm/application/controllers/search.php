<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct(){
	   parent::__construct();
       $this->load->model('category') ;
        $this->load->model('article') ;

    }

	public function index($limit=10,$start=0)
	{   $post = $this->input->post();
        $data['menu_categorys'] = $this->category->getCategoryList();
        $data['searcharticles'] = $this->article->getSearchArticleList($post,$limit,$start);
        $data['hot_articles']   = $this->category->getHotArticles();
        $data['key'] = $post['key'];
        $data['formbuild']             = $this->article->getARticleForm();
		$this->load->view('searchPage',$data);
	}
}
