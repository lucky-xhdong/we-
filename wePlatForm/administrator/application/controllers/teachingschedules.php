<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);

class Teachingschedules extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('teachingschedule');
        $this->load->model('category');
        $this->load->model('functions');
        $this->load->model('region');
        $this->load->model('school');
        $this->load->model('classes');
        $this->load->model('materialresource');


        if(!getAdminViewer()->id){
            redirect('login');
        }else{
            $permissions = getAdminViewer()->getUserRolePermission();
            $permission_urls = array();
            foreach($permissions as $permission){
                $permission_urls[] = $permission->url;
            }
            if(!in_array("/teachingschedules/",$permission_urls)){
                redirect('error');
            }
        }
    }

    public function index(){
        $data['regions'] = $this->region->getRegionList(10000,0);
        $data['schools'] = $this->school->getSchoolList($data['regions'][0]->id,9999,0);
        $data['teachers'] = $this->classes->getRegionSchoolUsersInfo($data['regions'][0]->id,0);
        $this->load->view('wePlatForm/teachingschedules',$data);
    }

    public function getTeachingscheduleInfo($teachingschedule_id=0){
        $data['teachingschedule'] = $this->teachingschedule->getTeachingSchedule($teachingschedule_id);
        $data['filelist'] = $this->materialresource->getResourceInfoListByIds($data['teachingschedule']->material_resource_ids);
        $data['regions'] = $this->region->getRegionList(10000,0);
        $data['schools'] = $this->school->getSchoolList($data['teachingschedule']->region_id,9999,0);
        $data['teachers'] = $this->classes->getRegionSchoolUsersInfo($data['teachingschedule']->region_id,$data['school_id']);
        $this->load->view('wePlatForm/tmpl/TeachingScheduleEdit',$data);
    }


    public function addteachingschedule(){
        $post = $this->input->post();
        $id = $this->teachingschedule->save($post);
        echo json_encode($this);
    }

    public function updateteachingschedule(){
        $post = $this->input->post();
        $id = $this->teachingschedule->save($post);
        echo json_encode($this);
    }

    public function getTeachingScheduleList(){
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$this->teachingschedule->getTeachingScheduleList($limit,($page-1)*$limit),
            'totalCount'=>$this->teachingschedule->getTeachingScheduleCount(),
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
        unset($post['region_id']);
        $id = $this->article->saveArticle($post);

        redirect("contents");
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
        $paramter['province_id'] =  $data['provinces'][0]->province_id;
        $paramter['city_id'] =  $data['citys'][0]->city_id;
        $paramter['district_id'] =  $data['districts'][0]->district_id;
        $data['regions'] = $this->region->getRegionInfoList(1000,0,$paramter);
        $data['categorys'] = $this->category->getPlatformCategoryList();
        $this->load->view('wePlatForm/content',$data);
    }


    public function getRegionList(){
        $data = $this->input->post();
        echo json_encode($this->region->getRegionInfoList(1000,0,$data));
    }


    public function getSchoolList($region_id=0){
        $data = $this->input->get();
        $data['schools'] = $this->school->getSchoolList($region_id);
        $data['teachers'] = $this->classes->getRegionSchoolUsersInfo($region_id,0);
        echo json_encode( $data);
    }

    public function getTeacherList($region_id,$school_id=0){
        $data['teachers'] = $this->classes->getRegionSchoolUsersInfo($region_id,$school_id);
        echo json_encode( $data);

    }



}


