<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NewHome extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('category') ;
        $this->load->model('article') ;
        $this->load->model('region') ;
        $this->load->model('functions') ;

    }

    public function index()
    {
        $data['RecommendCategorys']          = $this->category->getRecommendCategoryArticles(58);
        $this->load->view('wePlatForm1.0.0/home',$data);
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

    //404
    public function notFound()
    {   $data['menu_categorys']        = $this->category->getCategoryList();
        $this->load->view('notFound',$data);
    }
    //新增页面
    public function articlelists()
    {
        $this->load->view('articlelists');
    }
    //项目培训
    public function train()
    {
        $this->load->view('train');
    }

    public function testSkill(){
        $user = $this->user->getUser(4514);
        $this->recordmanager->user_id = $user->id;
        $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));;
        //获取今天的值
        $month_last_day = date('Y-m-d');
        $this->recordmanager->start_time = $month_frist_day;
        $this->recordmanager->end_time   =$month_last_day;
        echo   $this->recordmanager->initialize()->getUserSkillAverage();
        exit;

    }
}
