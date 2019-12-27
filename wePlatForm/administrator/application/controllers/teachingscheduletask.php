<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);

/*
 *
 * 教学进度管理
 *
 *
 * */

class Teachingscheduletask extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('functions');
        $this->load->model('region');
        $this->load->model('school');
        $this->load->model('classes');
        $this->load->model('teachingscheduletask');
        $this->load->model('teachingschedule');
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

    public function index($teachingschedule_id=0){
        $data['teachingschedule'] = $this->teachingschedule->getTeachingSchedule($teachingschedule_id);
        $this->load->view('wePlatForm/teachingscheduletask',$data);
        //$this->load->view('wePlatForm/supervisecourses');
    }

    public function getTeachingscheduleTaskInfo($teachingschedule_id=0){
        $data['teachingschedule'] = $this->teachingschedule->getTeachingSchedule($teachingschedule_id);
        $data['regions'] = $this->region->getRegionList(10000,0);
        $data['schools'] = $this->school->getSchoolList($data['teachingschedule']->region_id,9999,0);
        $data['teachers'] = $this->classes->getRegionSchoolUsersInfo($data['teachingschedule']->region_id,$data['school_id']);
        $this->load->view('wePlatForm/tmpl/TeachingScheduleEdit',$data);
    }

    public function getTeachingScheduleTaksList($teachingschedule_id=0){
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$this->teachingscheduletask->getTeachingScheduleTaskList($teachingschedule_id,$limit,($page-1)*$limit),
            'totalCount'=>$this->teachingscheduletask->getTeachingScheduleTaskCount($teachingschedule_id),
        ));
    }


    public function addteachingscheduletask(){
        $post = $this->input->post();
        $id = $this->teachingscheduletask->save($post);
        echo json_encode($this);
    }

    public function updateteachingscheduletask(){
        $post = $this->input->post();
        $id = $this->teachingscheduletask->save($post);
        echo json_encode($this);
    }



}


