<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 *服务审核
 *
 *
 **/


class Myserviceaudit extends CI_Controller {

    public $permissionsUrls = array();
    function __construct(){
        parent::__construct();
        $this->load->model('tags');
        $this->load->model('region');
        $this->load->model('school');
        $this->load->model('regionbusinessplan');
        $this->load->model('regioneducationplan');
        $this->load->model('supervisecourse');
        $this->load->model('classes');
        $this->load->model('regionoperateplan');
        if(!getAdminViewer()->id){
            redirect('login');
        }else{
            $permissions = getAdminViewer()->getUserRolePermission();
            foreach($permissions as $permission){
                $this->permissionsUrls[] = $permission->url;
            }
            if(!in_array("/myserviceaudit/business/", $this->permissionsUrls) && !in_array("/myserviceaudit/operate/", $this->permissionsUrls) && !in_array("/myserviceaudit/education/", $this->permissionsUrls)){
                redirect('error');
            }
        }
    }


    public function index(){
        if(in_array("/myserviceaudit/business/", $this->permissionsUrls)){
            redirect("/myserviceaudit/business/");
        }else if(in_array("/myserviceaudit/operate/", $this->permissionsUrls)){
            redirect("/myserviceaudit/operate/");
        }else if(in_array("/myserviceaudit/education/", $this->permissionsUrls)){
            redirect("/myserviceaudit/education/");
        }
        $this->load->view('wePlatForm/myserviceauditBusiness');
    }

    public function business(){
        if(!in_array("/myserviceaudit/business/", $this->permissionsUrls)){
            redirect('error');
        }
        $this->load->view('wePlatForm/myserviceauditBusiness');
    }

    public function operate(){
        if(!in_array("/myserviceaudit/operate/", $this->permissionsUrls)){
            redirect('error');
        }
        $this->load->view('wePlatForm/myserviceauditoperate');
    }

    public function education(){
        if(!in_array("/myserviceaudit/education/", $this->permissionsUrls)){
            redirect('error');
        }
        $this->load->view('wePlatForm/myserviceauditeducation');
    }



    public function getTagList(){

        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        $data = $this->input->get();
        echo json_encode(array(
            'items'=>$this->tags->getTagList($limit,($page-1)*$limit),
            'totalCount'=>$this->tags->getTagCount($data),
        ));
    }

    public function addTag(){
        $post = $this->input->post();
        $this->tags->save($post);
        echo json_encode($this->returncode);
    }

    public function getRegionOperatePlanList($region_id = 0){
        $region = $this->region->getregion($region_id);
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$region->getRegionOperatePlanList($limit,($page-1)*$limit,$this->input->get("status")),
            'totalCount'=>$region->getRegionOperatePlanCount($this->input->get("status")),
        ));
    }


    public function getRegionEducationPlanList($region_id = 0){
        $region = $this->region->getregion($region_id);
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$region->getRegionEducationPlanList($limit,($page-1)*$limit,$this->input->get("status")),
            'totalCount'=>$region->getRegionEducationPlanCount($this->input->get("status")),
        ));
    }

    public function getRegionServicePlanList($region_id = 0){
        $region = $this->region->getregion($region_id);
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$region->getRegionServicePlanList($limit,($page-1)*$limit,$this->input->get("status")),
            'totalCount'=>$region->getRegionServicePlanCount($this->input->get("status")),
        ));
    }

    public function addRegionEducationPlan($region_id=0){
        $region = $this->region->getregion($region_id);
        $data = $this->input->post();
        $regionServicePlan = $region->addRegionEducationPlan($data);
        $region->uploadRegionEducationPlanFile($regionServicePlan);
        echo json_encode($regionServicePlan);
    }

    public function addRegionServicePlan($region_id=0){
        $region = $this->region->getregion($region_id);
        $data = $this->input->post();
        $regionServicePlan = $region->addRegionServicePlan($data);
        $region->uploadRegionServicePlanFile($regionServicePlan);
        echo json_encode($regionServicePlan);
    }

    public function addRegionOperatePlan($region_id=0){
        $region = $this->region->getregion($region_id);
        $data = $this->input->post();
        $regionServicePlan = $region->addRegionOperatePlan($data);
        $region->uploadRegionOperatePlanFile($regionServicePlan);
        echo json_encode($regionServicePlan);
    }

    //服务计划

    public function businessPlan($plan_detail_id=0){
        $data['plan_detail'] = $this->region->getRegionServicePlan($plan_detail_id);
        $this->load->view('wePlatForm/auditbusinessPlanList',$data);
    }

    public function getRegionBusinessServicePlanInfo($service_plan_id =0){
        $data['regionServicePlan']  =  $this->regionbusinessplan->getRegionServicePlan($service_plan_id);
        $this->load->view('wePlatForm/tmpl/RegionBusinessServicePlanInfo',$data);
    }


    public function addRegionBusinessServicePlan($plan_detail=0){
        $data = $this->input->post();
        $regionServicePlan = $this->regionbusinessplan->addRegionServicePlan($data);
        $this->regionbusinessplan->uploadRegionServicePlanFile($regionServicePlan);
        echo json_encode($regionServicePlan);
    }


    public function getRegionBusinessServicePlanList($plan_detail = 0){
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$this->regionbusinessplan->getRegionServicePlanList($limit,($page-1)*$limit,$plan_detail),
            'totalCount'=>$this->regionbusinessplan->getRegionServicePlanCount($plan_detail),
        ));
    }



    public function operatePlan($plan_detail_id=0){
        $data['plan_detail'] = $this->region->getRegionOperatePlanInfo($plan_detail_id);
        $this->load->view('wePlatForm/auditoperatePlanList',$data);
    }

    public function getRegionServiceOperatePlanInfo($operate_plan_id =0){
        $data['regionServicePlan']  = $this->regionoperateplan->getRegionOperatePlanInfo($operate_plan_id);
        $this->load->view('wePlatForm/tmpl/ServiceRegionOperatePlanInfo',$data);
    }

    public function addRegionServiceOperatePlan($plan_detail_id = 0){
        $data = $this->input->post();
        $regionServicePlan = $this->regionoperateplan->addRegionOperatePlan($data,$plan_detail_id);
        $this->regionoperateplan->uploadRegionOperatePlanFile($regionServicePlan);
        echo json_encode($regionServicePlan);
    }


    public function getRegionServiceOperatePlanList($plan_detail_id=0){
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$this->regionoperateplan->getRegionOperatePlanList($limit,($page-1)*$limit,$plan_detail_id),
            'totalCount'=>$this->regionoperateplan->getRegionOperatePlanCount($plan_detail_id),
        ));
    }




    public function educationPlan($plan_detail_id=0){
        $data['plan_detail'] = $this->region->getRegionEducationPlanInfo($plan_detail_id);
        $this->load->view('wePlatForm/auditeducationPlanList',$data);
    }


    public function getRegionServiceEducationPlanInfo($education_plan_id =0){
        $data['regionServicePlan']  = $this->regioneducationplan->getEducationPlan($education_plan_id);
        $this->load->view('wePlatForm/tmpl/RegionServiceEducationPlanInfo',$data);
    }

    public function addRegionServiceEducationPlan($plan_detail_id=0){
        $data = $this->input->post();
        $regionServicePlan = $this->regioneducationplan->addRegionEducationPlan($data);
        $this->regioneducationplan->uploadRegionEducationPlanFile($regionServicePlan);
        echo json_encode($regionServicePlan);
    }


    public function getRegionServiceEducationPlanList($plan_detail_id = 0){
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$this->regioneducationplan->getRegionEducationPlanList($limit,($page-1)*$limit,$plan_detail_id),
            'totalCount'=>$this->regioneducationplan->getRegionEducationPlanCount($plan_detail_id),
        ));
    }

    public function supervisecourses($region_education_plan_id=0){
        $data['region_education_plan'] = $this->regioneducationplan->getRegionEducationPlan($region_education_plan_id);
        $this->load->view('wePlatForm/auditsupervisecoursesList',$data);
        //$this->load->view('wePlatForm/supervisecourses');
    }

    public function getSupervisecoursesList($region_education_plan_id = 0){
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$this->supervisecourse->getSupervisecourseList($region_education_plan_id,$limit,($page-1)*$limit),
            'totalCount'=>$this->supervisecourse->getSupervisecourseCount($region_education_plan_id),
        ));
    }

    public function supervisecourses_detail($supervise_course_id=0){
        $data['SuperviseCourse'] = $this->supervisecourse->getSupervisecourse($supervise_course_id);
        $data['region_education_plan'] = $this->regioneducationplan->getRegionEducationPlan( $data['SuperviseCourse']->region_education_plan_id);
        $data['region'] = $this->region->getRegion( $data['region_education_plan']->region_id);
        $this->load->view('wePlatForm/auditsupervisecoursedetail',$data);
    }

}
