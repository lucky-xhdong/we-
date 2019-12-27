<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * 班级
 *
 **/

class Courses extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('course');
        $this->load->model('courseauth');
        $this->load->model('unit');
        $this->load->model('lesson');
        $this->load->model('lessonpart');
        $this->load->model('school');
        $this->load->model('recordmanager');
        $this->load->model('publishing_house');
        $this->load->model('publishing_house_course');
        $this->load->model('publish_hourse_course_unit');

    }


    public function getCourseInfoList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            if($user->id == 53){
                return $this->course->getCourseList($user);
            }else{
                //验证用户学校信息
                $UserSchoolGradeClassRealtionShip = $user->getUserSchoolGradeClassRealtionShip();
                if($UserSchoolGradeClassRealtionShip){
                    //与学校关系存在
                    if(isset($UserSchoolGradeClassRealtionShip->school_id) && !empty($UserSchoolGradeClassRealtionShip->school_id)){
                        $school = $this->school->getSchool($UserSchoolGradeClassRealtionShip->school_id);
                        if($school->id != 0){
                            $publishing_house_id = $school->publishing_house_id;
                            return $this->publishing_house_course->getCourseInfoList($user,$publishing_house_id);
                        }
                    }
                }
            }
        }
        return $this;
    }


    public function getCourseInfoList1(){
        $argus = func_get_args();
        $user = $this->user->getUser(41023);

        if($user){

            if($user->id == 53){
                return $this->course->getCourseList($user);
            }else{
                //验证用户学校信息
                $UserSchoolGradeClassRealtionShip = $user->getUserSchoolGradeClassRealtionShip();

                if($UserSchoolGradeClassRealtionShip){

                    //与学校关系存在
                    if(isset($UserSchoolGradeClassRealtionShip->school_id) && !empty($UserSchoolGradeClassRealtionShip->school_id)){
                        $school = $this->school->getSchool($UserSchoolGradeClassRealtionShip->school_id);
                        if($school->id != 0){
                            $publishing_house_id = $school->publishing_house_id;
                            var_dump($this->publishing_house_course->getCourseInfoList($user,$publishing_house_id));
                            exit;
                        }
                    }
                }
            }
        }
        return $this;
    }


    public function getCourseList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            if($user->id == 53){
                return $this->course->getCoursesDetails($user);
            }else{
                return $this->course->getAdminPublishUnLockCoursesDetails($user);
            }
        }
        return $this;
    }

    public function getLevelList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            if(count($argus) ==1){
                $course_id = 2;
            }else{
                $course_id  = isset($argus[0])?$argus[0]:2;
            }
            if($user->id == 53){
                return $this->course->getLevelList($course_id,$user);
            }else{
                if($course_id){
                    return $this->publishing_house_course->getLevelList($course_id,$user);
                }
            }
        }
        return $this;
    }

    public function getStudentMtList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            if($user->id == 53){
                return $this->course->getCoursesMtDetails($user);
            }else{
                return $this->course->getPublishCoursesMtDetailsClient($user);
            }
        }
        return $this;
    }


    public function getUnitsMtHistoryList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $this->returncode['data'] =  $this->unit->getUnitsMtHistoryList($argus[0],$user);
            return $this;
        }
        return $this;
    }


    public function getUnitsMtHistoryList1(){
        $user = $this->user->getUser(4437);

        if($user){
            var_dump($this->unit->getUnitsMtHistoryList(32,$user));
        }
        return $this;
    }

    public function getCourseLearningTimeList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user ){
             if(count($argus ) == 1){
                 $date  = date("Y-m-d");
             }else if(count($argus ) == 2){
                 $date =  isset($argus[0])?$argus[0]:date("Y-m-d");
             }else{
                 $date =  isset($argus[0])?$argus[0]:date("Y-m-d");
                 $user_id  = isset($argus[1])?$argus[1]:0;
                 if($user_id){
                     $user = $this->user->getUser($user_id);
                 }
             }

            if($this->input->post("dete")){
                $date  =$this->input->post("dete");
            }

            if($this->input->post("user_id")){
                $user_id  =$this->input->post("user_id");
                if($user_id){
                    $user = $this->user->getUser($user_id);
                }
            }
          

            if($user->id == 53){
                return $this->course->getCourseLearningTimeDetails($user,$date);
            }else{
                return $this->course->getCourseLearningTimeDetails($user,$date);
            }
        }
        return $this;
    }


}
