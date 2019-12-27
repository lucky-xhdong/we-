<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessons extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('lesson');
        $this->load->model('courseauth');
        $this->load->model('recordmanager');
    }

    public function get_rand_number(){

        // echo  date('Ymd');
        $month_day = date('Y-m-d', strtotime(date('Y-m-01') . ' -1 day'));
        echo$month_day;
        exit;
        echo rand(1,999999).substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 12);
        exit;
        $group_id = "201810293410157102";
        $row = $this->db->where("group_id",$group_id)->order_by("time","desc")->get("users_record")->row();
        var_dump($row);exit;
        if($row && !empty($row->time)){
            $this->db->where("group_id",$group_id)->where("id !=",$row->id);
            $this->db->update("users_record",array("time"=>0));

        }

        echo date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 10);
    }

    public function getLessonList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >1){
            return $this->lesson->getLessonList($user,$argus[0]);
        }
        return $this;
    }

    public function getPtLessons(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            return $this->lesson->getPtLessons($user);
        }
        return $this;
    }


    //解锁课程
    public function unLockLesson() {
        $this->load->view('unlock_lesson');
    }

    //教师成员
    public function teacherList() {
        $this->load->view('teacher_list');
    }

    //成绩列表
    public function gradeList() {
        $this->load->view('grade_list');
    }

    //批阅
    public function markHomework() {
        $this->load->view('mark_homework');
    }

    public function getTestUnitDetail(){
//        $argus = func_get_args();
//        $user = func_get_arg(count($argus)-1);
//        if($user && count($argus) >=1) {
//            $data =  $this->lesson->getTestUnitDetail($user,$argus[0]);
//            var_dump($data);
//        }
        return $this;
    }


    public function getLessonInfo($lesson_id=0,$user_id = 0){
        $user = $this->user->getUser($user_id);
        $lesson = $this->lesson->getLesson($lesson_id);
        if(isset($lesson->id) && !empty($lesson->id) && isset($user->id) && !empty($user->id)){
            return $lesson->calculateLesson($user);
        }
        return true;
    }

    public function calculationrecordTime($part_id=0,$lesson_id=0,$unit_id,$group_id=0,$user_id = 0){

        if($part_id != 0){
            $this->recordmanager->initialize()->user_id = $user_id;
            $this->recordmanager->part_id = $part_id;
            $this->recordmanager->calcuStudyTimes($group_id,$unit_id,$lesson_id);
        }else if( $lesson_id !=0){
            $this->recordmanager->initialize()->user_id = $user_id;
            $this->recordmanager->lesson_id =$lesson_id;
            $this->recordmanager->calcuStudyTimes($group_id,$unit_id,$lesson_id);
        }

        echo "success";
    }



}
