<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessons extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('lesson');
        $this->load->model('courseauth');
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
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1) {
            $data =  $this->lesson->getTestUnitDetail($user,$argus[0]);
            var_dump($data);
        }
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

}
