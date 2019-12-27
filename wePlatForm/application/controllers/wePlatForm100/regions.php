<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regions extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('category') ;
        $this->load->model('article') ;
        $this->load->model('region') ;
        $this->load->model('functions') ;
        $this->load->model('school') ;
        $this->load->model('materialresource') ;


    }

    public function index($id = 0)
    {

        $data['region']  = $this->region->getRegion($id);
//       echo   $data['region']->getFileBgUrl();
//        exit;
        if($data['region'] ->id == 0) show_404();
        $data['schools']   = $this->school->getSchoolList($id,0);
        $data['articles']  = $this->article->getRegionNewestCategoryArticle($data['region']);
        $data['school_count']   =  $this->school->getSchoolListCount($id);
        $data['newsFlashArticles']  = $this->category->getArticlesForList(78,0,5);
        $data['totalPages'] =  ceil($data['school_count']/6);
        if(count( $data['schools']) > 0){
            $data['articles']  = $this->article->getSchoolCategoryArticle($data['region'],null,0,3,0);
        }else{
            $data['articles'] = array();
        }

        $data['schoolDataPicture'] = $this->materialresource->getResourceInfoList(1,0,array(
            "region_id"=>$id,
            "resource_type_id"=>12
        ));

        if(count($data['schoolDataPicture']) == 0){
            $data['schoolDataPicture'] = $this->materialresource->getResourceInfoList(1,0,array(
                "region_id"=>31,
                "resource_type_id"=>12
            ));
        }


        $data['classDataPicture'] = $this->materialresource->getResourceInfoList(1,0,array(
            "region_id"=>$id,
            "resource_type_id"=>13
        ));


        if(count($data['classDataPicture']) == 0){
            $data['classDataPicture'] = $this->materialresource->getResourceInfoList(1,0,array(
                "region_id"=>31,
                "resource_type_id"=>13
            ));
        }


        $data['studentDataPicture'] = $this->materialresource->getResourceInfoList(1,0,array(
            "region_id"=>$id,
            "resource_type_id"=>14
        ));

        if(count($data['studentDataPicture']) == 0){
            $data['studentDataPicture'] = $this->materialresource->getResourceInfoList(1,0,array(
                "region_id"=>31,
                "resource_type_id"=>14
            ));
        }


        $this->load->view('wePlatForm1.0.0/region',$data);
    }


    public function getArticleList($school_id,$region_id,$start=0){
        if($school_id == 0){
            $region  = $this->region->getRegion($region_id);
            $data['articles']  = $this->article->getSchoolCategoryArticle($region,null,0,3,$start);
        }else{
            $school = $this->school->getSchool($school_id);
            $data['articles']  = $this->article->getSchoolCategoryArticle(null,$school,0,3,$start);
        }

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
        $this->load->view('wePlatForm1.0.0/search');
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
        $this->load->view('wePlatForm1.0.0/news');
    }
}
