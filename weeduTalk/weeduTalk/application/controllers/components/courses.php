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
                return $this->course->getLevelList($course_id);
            }else{
                if($course_id){
                    return $this->publishing_house_course->getLevelList($course_id);
                }
            }
        }
        return $this;
    }

    public function getStudentMtList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            return $this->course->getCoursesMtDetails($user);
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


}
