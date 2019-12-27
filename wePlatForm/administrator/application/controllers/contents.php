<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);

class Contents extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('article');
        $this->load->model('category');
        $this->load->model('functions');
        $this->load->model('region');
        $this->load->model('school');
        if(!getAdminViewer()->id){
            redirect('login');
        }else{
            $permissions = getAdminViewer()->getUserRolePermission();
            $permission_urls = array();
            foreach($permissions as $permission){
                $permission_urls[] = $permission->url;
            }
            if(!in_array("/contents/",$permission_urls)){
                redirect('error');
            }
        }
    }

    public function index(){
        $data['categorys'] = $this->category->getPlatformCategoryList();
        $this->load->view('wePlatForm/contents',$data);
    }


    public function getArticleList(){
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        $catid = $this->input->get("catid")?$this->input->get("catid"):0;
        echo json_encode(array(
            'items'=>$this->article->getArticleForList($catid,$limit,($page-1)*$limit),
            'totalCount'=>$this->article->getArticleForListCount($catid),
        ));
    }

    public function getContent($id){
        $data['article'] = $this->article->getarticleDetail($id);
        $this->load->view('wePlatForm/tmpl/articleDetail',$data);
    }

    public function save(){
        $post = $this->input->post();
      //  var_dump($post);exit;
        if(isset($post['region_id']) && count($post['region_id']) > 0){
            $post['region_ids'] = implode(",",$post['region_id']);
        }
       // unset($post['region_id']);
        $id = $this->article->saveArticle($post);
        if($id == 211){
            redirect("contents/about_us");
        }elseif($id == 212){
            redirect("contents/contact_us");
        }elseif($id == 213){
            redirect("contents/privacy_policy");
        }else{
            redirect("contents");
        }

    }



    public function add($id =0){
        $data = array();

        $data['provinces'] = $this->functions->getProviceList();
        if($id != 0 ){
            $data['article'] = $this->article->getarticleDetail($id);
            $data['citys'] = $this->functions->getCityList($data['article']->province_id);
            $data['districts'] = $this->functions->getAreaList($data['article']->city_id);
        }else{
            $data['citys'] = $this->functions->getCityList();
            $data['districts'] = $this->functions->getAreaList();
        }
        if(isset($data['article']->province_id) && !empty($data['article']->province_id)){
            $paramter['province_id'] =  $data['article']->province_id;
        }else{
            $paramter['province_id'] =  $data['provinces'][0]->province_id;
        }
        if(isset($data['article']->city_id) && !empty($data['article']->city_id)){
            $paramter['city_id'] =  $data['article']->city_id;
        }else{
            $paramter['city_id'] =  $data['citys'][0]->city_id;
        }

        if(isset($data['article']->district_id) && !empty($data['article']->district_id)){
            $paramter['district_id'] =  $data['article']->district_id;
        }else{
            $paramter['district_id'] =  $data['districts'][0]->district_id;
        }


        $data['regions'] = $this->region->getRegionInfoForCntentList(1000,0,$paramter);


        if(isset($data['article']->region_id) && !empty($data['article']->region_id)){
            $data['schools'] = $this->school->getSchoolList($data['article']->region_id,0);
        }else{
            if(count($data['regions']) > 0){
                $data['schools'] = $this->school->getSchoolList($data['regions'][0]->id,0);
            }else{
                $data['schools'] = array();
            }
        }
        $data['categorys'] = $this->category->getPlatformCategoryList();
        $this->load->view('wePlatForm/content',$data);
    }


    public function getRegionList(){
        $data = $this->input->post();
        echo json_encode($this->region->getRegionInfoForCntentList(1000,0,$data));
    }

    public function getRegionSchoolList($region_id){
        $data['schools'] = $this->school->getSchoolList($region_id,0);
       
        echo json_encode($data);
    }


    public function about_us(){
        $id = 211;
        $data = array();
        $data['provinces'] = $this->functions->getProviceList();
        if($id != 0 ){
            $data['article'] = $this->article->getarticleDetail($id);
            $data['citys'] = $this->functions->getCityList($data['article']->province_id);
            $data['districts'] = $this->functions->getAreaList($data['article']->city_id);
        }else{
            $data['citys'] = $this->functions->getCityList();
            $data['districts'] = $this->functions->getAreaList();
        }
        $paramter['province_id'] =  $data['provinces'][0]->province_id;
        $paramter['city_id'] =  $data['citys'][0]->city_id;
        $paramter['district_id'] =  $data['districts'][0]->district_id;
        $data['regions'] = $this->region->getRegionInfoList(1000,0,$paramter);


        if(isset($data['article']->region_id) && !empty($data['article']->region_id)){
            $data['schools'] = $this->school->getSchoolList($data['article']->region_id,0);
        }else{
            if(count($data['regions']) > 0){
                $data['schools'] = $this->school->getSchoolList($data['regions'][0]->id,0);
            }else{
                $data['schools'] = array();
            }
        }
        $data['categorys'] = $this->category->getPlatformCategoryList();
        $this->load->view('wePlatForm/content',$data);
    }


    public function contact_us(){
        $id = 212;
        $data = array();
        $data['provinces'] = $this->functions->getProviceList();
        if($id != 0 ){
            $data['article'] = $this->article->getarticleDetail($id);
            $data['citys'] = $this->functions->getCityList($data['article']->province_id);
            $data['districts'] = $this->functions->getAreaList($data['article']->city_id);
        }else{
            $data['citys'] = $this->functions->getCityList();
            $data['districts'] = $this->functions->getAreaList();
        }
        $paramter['province_id'] =  $data['provinces'][0]->province_id;
        $paramter['city_id'] =  $data['citys'][0]->city_id;
        $paramter['district_id'] =  $data['districts'][0]->district_id;
        $data['regions'] = $this->region->getRegionInfoList(1000,0,$paramter);


        if(isset($data['article']->region_id) && !empty($data['article']->region_id)){
            $data['schools'] = $this->school->getSchoolList($data['article']->region_id,0);
        }else{
            if(count($data['regions']) > 0){
                $data['schools'] = $this->school->getSchoolList($data['regions'][0]->id,0);
            }else{
                $data['schools'] = array();
            }
        }
        $data['categorys'] = $this->category->getPlatformCategoryList();
        $this->load->view('wePlatForm/content',$data);
    }


    public function privacy_policy(){
        $id = 213;
        $data = array();
        $data['provinces'] = $this->functions->getProviceList();
        if($id != 0 ){
            $data['article'] = $this->article->getarticleDetail($id);
            $data['citys'] = $this->functions->getCityList($data['article']->province_id);
            $data['districts'] = $this->functions->getAreaList($data['article']->city_id);
        }else{
            $data['citys'] = $this->functions->getCityList();
            $data['districts'] = $this->functions->getAreaList();
        }
        $paramter['province_id'] =  $data['provinces'][0]->province_id;
        $paramter['city_id'] =  $data['citys'][0]->city_id;
        $paramter['district_id'] =  $data['districts'][0]->district_id;
        $data['regions'] = $this->region->getRegionInfoList(1000,0,$paramter);


        if(isset($data['article']->region_id) && !empty($data['article']->region_id)){
            $data['schools'] = $this->school->getSchoolList($data['article']->region_id,0);
        }else{
            if(count($data['regions']) > 0){
                $data['schools'] = $this->school->getSchoolList($data['regions'][0]->id,0);
            }else{
                $data['schools'] = array();
            }
        }
        $data['categorys'] = $this->category->getPlatformCategoryList();
        $this->load->view('wePlatForm/content',$data);
    }

}


