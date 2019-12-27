<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('category') ;
        $this->load->model('article') ;
        $this->load->model('region') ;
        $this->load->model('functions') ;

    }

    public function index()
    {
        $data['touTiaoArticles']  = $this->category->getArticleForClientList(76,0,3);
        $data['peopleArticles']  = $this->category->getArticleForClientList(77,0,2);
        $data['newsFlashArticles']  = $this->category->getArticleForClientList(78,0,5);
        $data['regions']  = $this->region->getRegionList(0);
        if(count( $data['regions']) > 0){
            $data['articles']  = $this->article->getSchoolCategoryArticle($data['regions'][0],null,0,3);
        }else{
            $data['articles'] = array();
        }
        $data['teacherarticles']  = $this->category->getArticleForClientList(79,0,1);
        $data['techrticles']  = $this->category->getArticlesForList(80,0,1);
        $data['foreignTeacherArticles']  = $this->category->getArticleForClientList(81,0,1);


        $this->load->view('wePlatForm1.0.0/home',$data);
    }

    public function getArticleList($region_id){
        $region = $this->region->getRegion($region_id);
        $data['articles']  = $this->article->getSchoolCategoryArticle($region,null,0,3);
        $this->load->view('wePlatForm1.0.0/tmpl/articlelist',$data);
    }
    //login
    public function login()
    {
        $this->load->view('wePlatForm1.0.0/login');
    }

    //search
    public function search()
    {
        $data = $this->input->post();
        $data['articles']  = $this->article->getSearchArticleList($data);
        $this->load->view('wePlatForm1.0.0/search',$data);
    }

    //region
    public function region()
    {
        $this->load->view('wePlatForm1.0.0/region');
    }

    //item
    public function item($id=0)
    {
        $data['article']        = $this->article->getarticleDetail((int)$id);
        $data['hot_articles'] = $this->category->getHotArticles();
        if($data['article']){
            $data['category'] = $this->category->getCategory($data['article']->catid);
            $this->load->view('wePlatForm1.0.0/item',$data);
        }else{
            show_404();
        }
    }

    //news
    public function news()
    {
        $data['newsFlashArticles']  = $this->category->getArticleForClientList(78,0,5);
        $this->load->view('wePlatForm1.0.0/news',$data);
    }

    public function evaluation(){
        $this->load->view('wePlatForm1.0.0/evaluation');
    }

    //404
    public function notFound()
    {   $data['menu_categorys']        = $this->category->getCategoryList();
        $this->load->view('notFound',$data);
    }
}
