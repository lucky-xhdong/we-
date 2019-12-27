<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);

class Supervisecourselist extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('functions');
        $this->load->model('region');
        $this->load->model('school');
        $this->load->model('classes');
        $this->load->model('supervisecourse');
        $this->load->model('regioneducationplan');
        if(!getAdminViewer()->id){
            redirect('login');
        }else{
            $permissions = getAdminViewer()->getUserRolePermission();
            $permission_urls = array();
            foreach($permissions as $permission){
                $permission_urls[] = $permission->url;
            }
            if(!in_array("/supervisecourselist/",$permission_urls)){
                redirect('error');
            }
        }
    }

    public function index($region_education_plan_id=0){
        $data['region_education_plan'] = $this->regioneducationplan->getRegionEducationPlan($region_education_plan_id);
        $this->load->view('wePlatForm/supervisecourselist',$data);
        //$this->load->view('wePlatForm/supervisecourses');
    }


    public function getSupervisecoursesList($region_education_plan_id = 0){
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$this->supervisecourse->getSupervisecourseList($region_education_plan_id,$limit,($page-1)*$limit,$this->input->get()),
            'totalCount'=>$this->supervisecourse->getSupervisecourseCount($region_education_plan_id,$this->input->get()),
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



    public function add($region_education_plan_id =0){
        $data['region_education_plan'] = $this->regioneducationplan->getRegionEducationPlan($region_education_plan_id);
        $data['region'] = $this->region->getRegion( $data['region_education_plan']->region_id);
        $data['schools'] = $this->school->getSchoolList($data['region_education_plan']->region_id,9999,0);
        $data['educationUsers'] = $this->user->getPlatformRoleUsers(333333)->returncode['data'];
        $data['SuperviseCourseCategorys'] = $this->supervisecourse->getSuperviseCourseCategory();
        $this->load->view('wePlatForm/supervisecourses',$data);
    }


    public function detail($supervise_course_id=0){
        $data['viewSuperviseCourse'] = true;
        $data['SuperviseCourse'] = $this->supervisecourse->getSupervisecourse($supervise_course_id);
        $data['region_education_plan'] = $this->regioneducationplan->getRegionEducationPlan( $data['SuperviseCourse']->region_education_plan_id);
        $data['region'] = $this->region->getRegion( $data['region_education_plan']->region_id);
        $this->load->view('wePlatForm/supervisecoursedetail',$data);
    }


    public function saveSupervisecourse($region_education_plan_id =0){
        $data['region_education_plan'] = $this->regioneducationplan->getRegionEducationPlan($region_education_plan_id);
        $post = $this->input->post();
        $post['region_education_plan_id'] = $region_education_plan_id;
        $this->supervisecourse->save($post);
        redirect("supervisecourses");

    }

    public function getSchoolClassList($school_id=0){
        $school = $this->school->getSchool($school_id);
        $data = $this->classes->getSchoolClass($school)->returncode['data'];
        echo json_encode($data);

    }


    public function getClassTeacherList($class_id=0){
        $data = $this->classes->getClassUsersInfo($class_id,"teacher");
        echo json_encode($data);

    }


    public function getRegionList(){
        $data = $this->input->post();
        echo json_encode($this->region->getRegionInfoList(1000,0,$data));
    }




}


