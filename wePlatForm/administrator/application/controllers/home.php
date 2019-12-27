<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);

class Home extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('amoeba');
        $this->load->model('school');
        $this->load->model('grades');
        $this->load->model('classes');
        $this->load->model('recordmanager');
        if(!getAdminViewer()->id){
            redirect('login');
        }else{
            $permissions = getAdminViewer()->getUserRolePermission();
            $permission_urls = array();
//            foreach($permissions as $permission){
//                $permission_urls[] = $permission->url;
//            }
//            if(!in_array("/home/",$permission_urls)){
//                redirect('error');
//            }
        }
    }

    //老师 444444 区域领导 555555  校长  666666 教研员 7777777

    public function index(){

        $data['role'] = getAdminViewer()->getUserRole();

        if(!in_array($data['role']->type,array(444444,666666,777777,555555))){
            $permissions = getAdminViewer()->getUserRolePermission();
            redirect(anchorurl($permissions[0]->url));
        }
        //查看自身relationSHIP
        //教师 教学资源、督课表数、教学任务数、平均分、优秀率、学习计划达标率
        //教研员 入校人数、教师人数、使用学生数、使用天数、服务计划数、教学资源数、教学任务数、教学成果数

         //查看所管理区域或者学校
         $data['region_school_info'] = getAdminViewer()->getPlatFormAccountRegion();

        if(count($data['region_school_info']) == 1 &&  $data['region_school_info'][0]->region_id == 32){
            if($data['role']->type == 444444){
                $data['teachResource'] = 32;
                $data['supervise']      = 27;
                $data['teaching_schedule_task'] = 32;
                $data['score_avg'] = 89;
                $data['Outstanding'] = 67.6;
                $data['standard_reaching'] = 92.2;
            }else if($data['role']->type == 555555 || $data['role']->type == 777777){
                $data['student'] = 1238;
                $data['teachers'] = 323;
                $data['studyDay'] = 27;
                $data['plan_count'] = 28;
                $data['teachResource'] = 22;
                $data['teaching_schedule_task'] =123;
                $data['teachResource'] = 25;
            }else if($data['role']->type == 666666){
                $data['student'] = 534;
                $data['teachers'] = 49;
                $data['studyDay'] = 27;
                $data['plan_count'] = 28;
                $data['teachResource'] = 23;
                $data['totalTime'] =546;
                $data['Outstanding'] = 78;
                $data['standard_reaching'] = 85;
                $data['score_avg'] = 73.5;
            }
            $this->load->view('wePlatForm/welcome',$data);
            return;
        }

       if(count($data['region_school_info']) > 0) $data['region_school_info'] = $data['region_school_info'][0];
         $data['teachResource'] = $this->db->where("school_id",$data['region_school_info']->school_id)->get("material_resource")->num_rows();
        if($data['role']->type == 444444){
            $data['supervise'] = $this->db->where("teacher_id", getAdminViewer()->id)->get("supervise_course")->num_rows();
        }else{
            $data['supervise'] = $this->db->where("school_id",$data['region_school_info']->school_id)->get("supervise_course")->num_rows();

        }
        if($data['role']->type == 444444){
            $data['teaching_schedule_task'] = $this->db
                                                 ->where("IF( FIND_IN_SET(".getAdminViewer()->id.",teacher_ids),1, 0)")
                                                 ->join('teaching_schedule','teaching_schedule.id = teaching_schedule_task.teaching_schedule_id', 'left')
                                                ->get("teaching_schedule_task")->num_rows();
        }else{
            $data['teaching_schedule_task'] = $this->db->where("teaching_schedule.school_id",$data['region_school_info']->school_id)
                ->join('teaching_schedule','teaching_schedule.id = teaching_schedule_task.teaching_schedule_id', 'left')
                ->get("teaching_schedule_task")->num_rows();
        }

        if($data['role']->type == 444444){
            $user_relation_ship = getAdminViewer()->getUserSchoolGradeClassRealtionShip();
            if($user_relation_ship){
                $data['score_avg'] = $this->db->select("AVG(totalScore) as avg")->where("class_id",$user_relation_ship->class_id)->get("user_record_result")->num_rows();
            }else{
                $data['score_avg'] = 0;
            }
        }else{
            $data['score_avg'] = $this->db->select("AVG(totalScore) as avg")->where("school_id",$data['region_school_info']->school_id)->get("user_record_result")->num_rows();

        }

        if($data['role']->type == 444444){
            $user_relation_ship = getAdminViewer()->getUserSchoolGradeClassRealtionShip();
            if($user_relation_ship){
                $data['Outstanding'] = $this->db->where("class_id",$user_relation_ship->class_id)->where("totalScore >=",85)->get("user_record_result")->num_rows();
                $totalUser = $this->db->where("class_id",$user_relation_ship->id)->get("user_record_result")->num_rows();
                if($totalUser != 0){
                    $data['Outstanding'] = round($data['Outstanding']/$totalUser)*100;
                }
            }else{
                $data['Outstanding'] = 0;
            }
        }else{
            $data['Outstanding'] = $this->db->where("school_id",$data['region_school_info']->school_id)->where("totalScore >=",85)->get("user_record_result")->num_rows();
            $totalUser = $this->db->where("school_id",$data['region_school_info']->school_id)->get("user_record_result")->num_rows();
            if($totalUser != 0){
                $data['Outstanding'] = round($data['Outstanding']/$totalUser)*100;
            }
        }

        if($data['role']->type == 444444){
            $user_relation_ship = getAdminViewer()->getUserSchoolGradeClassRealtionShip();
            if($user_relation_ship){
                $data['standard_reaching'] = $this->db->where("class_id",$user_relation_ship->class_id)->where("totalScore >=",60)->get("user_record_result")->num_rows();
                $totalUser = $this->db->where("class_id",$user_relation_ship->id)->get("user_record_result")->num_rows();
                if($totalUser != 0){
                    $data['standard_reaching'] = round($data['standard_reaching']/$totalUser)*100;
                }
            }else{
                $data['standard_reaching'] = 0;
            }
        }else{
            $data['standard_reaching'] = $this->db->where("school_id",$data['region_school_info']->school_id)->where("totalScore >=",60)->get("user_record_result")->num_rows();
            $totalUser = $this->db->where("school_id",$data['region_school_info']->school_id)->get("user_record_result")->num_rows();
            if($totalUser != 0){
                $data['standard_reaching'] = round($data['standard_reaching']/$totalUser)*100;
            }
        }

        if($data['role']->type == 444444){
            $user_relation_ship = getAdminViewer()->getUserSchoolGradeClassRealtionShip();
            if($user_relation_ship){
                $data['students'] = $this->db->where("user_type","student")->where("class_id",$user_relation_ship->class_id)->get("class_user_relationship")->num_rows();
            }else{
                $data['students'] = 0;
            }
        }else{
            $data['students'] = $this->db->where("user_type","student")->where("school_id",$data['region_school_info']->school_id)->get("class_user_relationship")->num_rows();

        }

        if($data['role']->type == 444444){
            $user_relation_ship = getAdminViewer()->getUserSchoolGradeClassRealtionShip();
            if($user_relation_ship){
                $data['teachers'] = $this->db->where("user_type","teacher")->where("class_id",$user_relation_ship->class_id)->get("class_user_relationship")->num_rows();
            }else{
                $data['teachers'] = 0;
            }
        }else{
            $data['teachers'] = $this->db->where("user_type","teacher")->where("school_id",$data['region_school_info']->school_id)->get("class_user_relationship")->num_rows();

        }

        if($data['role']->type == 444444){
            $user_relation_ship = getAdminViewer()->getUserSchoolGradeClassRealtionShip();
            $end_time       = date('Y-m-d');
            $this->recordmanager->date = date('Y-m-d',strtotime($end_time. '-14 days'));;
            $this->recordmanager->date   =$end_time;
            if($user_relation_ship){
                $this->recordmanager->users    = $this->classes->getClassUsers($user_relation_ship->class_id);
                $data['totalTime'] =  round($this->recordmanager->getUserStudyTimeS()/60*60,2);
            }else{
                $data['totalTime'] = 0;
            }
        }else{
            $end_time       = date('Y-m-d');
            $this->recordmanager->date = date('Y-m-d',strtotime($end_time. '-14 days'));;
            $this->recordmanager->date   =$end_time;
            $this->recordmanager->users    = $this->getSchoolUsers($data['region_school_info']->school_id);
            $data['totalTime'] = round($this->recordmanager->getUserStudyTimeS()/60/60,2);
        }

        if($data['role']->type == 444444){
            $user_relation_ship = getAdminViewer()->getUserSchoolGradeClassRealtionShip();
            $end_time       = date('Y-m-d');
            $this->recordmanager->date = date('Y-m-d',strtotime($end_time. '-14 days'));;
            $this->recordmanager->date   =$end_time;
            if($user_relation_ship){
                $data['studyDay'] = $this->recordmanager->getStudentStudyDays();
            }else{
                $data['studyDay'] = 0;
            }
        }else{
            $end_time       = date('Y-m-d');
            $this->recordmanager->date = date('Y-m-d',strtotime($end_time. '-14 days'));;
            $this->recordmanager->date   =$end_time;
            $this->recordmanager->users    = $this->getSchoolUsers($data['region_school_info']->school_id);
            $data['studyDay'] = $this->recordmanager->getStudentStudyDays();
        }

        if($data['role']->type == 444444){
            $data['plan_count'] = $this->db
                ->where("IF( FIND_IN_SET(".getAdminViewer()->id.",wetalk_region_education_plan_detail.teacher_ids),1, 0)")
                ->join('region_education_plan_detail','region_education_plan_detail.id = region_education_plan.plan_detail_id', 'left')
                ->get("region_education_plan")->num_rows();
        }else{
            $data['plan_count'] = $this->db->where("region_education_plan_detail.school_id",$data['region_school_info']->school_id)
                ->join('region_education_plan_detail','region_education_plan_detail.id = region_education_plan.plan_detail_id', 'left')
                ->get("region_education_plan")->num_rows();
        }


        $this->load->view('wePlatForm/welcome',$data);
    }

    public function getSchoolUsers($school_id=0,$type="student"){
        $user_ids = $this->db->select('class_user_relationship.*')->where('class_user_relationship.user_type',$type);
        if($school_id){
            $user_ids = $user_ids->where("class_user_relationship.school_id",$school_id);
        }
        $user_ids =  $user_ids->get('class_user_relationship')->result();
        $users = array();
        foreach($user_ids as $val){
            $user = $this->user->getUser($val->user_id);
            $users[] = $user;
        }
        return $users;
   }

}


