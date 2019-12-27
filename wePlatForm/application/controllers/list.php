<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class aList extends CI_Controller {

	function __construct(){
	   parent::__construct();
       $this->load->model('category') ;

    }

	public function index()
	{   $data['menu_categorys'] = $this->category->getCategoryList();
		$this->load->view('home',$data);
	}
    //二级页(今日热点、热门文章)
    public function hotNews()
    {
        $this->load->view('hotNews');
    }

    //三级页(文章详情页)
    public function articleDetail()
    {
        $this->load->view('articleDetail');
    }

    //搜索页
    public function searchPage()
    {
        $this->load->view('searchPage');
    }

    //搜索页
    public function articlesearch()
    {
        $this->load->view('articlesearch');
    }
}
