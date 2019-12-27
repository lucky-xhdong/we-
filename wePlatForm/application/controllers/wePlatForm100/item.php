<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('category') ;
        $this->load->model('article') ;
        $this->load->model('region') ;
        $this->load->model('functions') ;

    }

    public function index($id=0)
    { $data['article']        = $this->article->getarticleDetail((int)$id);
        $data['hot_articles'] = $this->category->getHotArticles();
        if($data['article']){
            $data['category'] = $this->category->getCategory($data['article']->catid);
            $this->load->view('wePlatForm1.0.0/item',$data);
        }else{
            show_404();
        }
    }


    public function about_us()
    {
        $id = 211;
        $data['article']        = $this->article->getarticleDetail((int)$id);
        $data['hot_articles'] = $this->category->getHotArticles();
        if($data['article']){
            $data['category'] = $this->category->getCategory($data['article']->catid);
            $this->load->view('wePlatForm1.0.0/item',$data);
        }else{
            show_404();
        }
    }

    public function contact_us()
    {
        $id = 212;
        $data['article']        = $this->article->getarticleDetail((int)$id);
        $data['hot_articles'] = $this->category->getHotArticles();
        if($data['article']){
            $data['category'] = $this->category->getCategory($data['article']->catid);
            $this->load->view('wePlatForm1.0.0/item',$data);
        }else{
            show_404();
        }
    }

    public function privacy_policy()
    {
        $id = 213;
        $data['article']        = $this->article->getarticleDetail((int)$id);
        $data['hot_articles'] = $this->category->getHotArticles();
        if($data['article']){
            $data['category'] = $this->category->getCategory($data['article']->catid);
            $this->load->view('wePlatForm1.0.0/item',$data);
        }else{
            show_404();
        }
    }


}
