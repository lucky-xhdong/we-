<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Units extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('unit');
        $this->load->model('courseauth');
        $this->load->model('publish_hourse_course_unit');
        $this->load->model('school');


    }





    public function getUnitList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            if(count($argus) ==1){
                $course_id = 1;
                //通过course_id 获取level_id
                $level = $this->db->where("course_id",$course_id)->get("levels")->row();
                if($level)  $level_id = $level->id;
                else $level_id = 0;
            }else if(count($argus) ==2){
                $course_id  = isset($argus[0])?$argus[0]:1;
                $level = $this->db->where("course_id",$course_id)->get("levels")->row();
                if($level)  $level_id = $level->id;
                else $level_id = 0;
            }else if(count($argus) > 2){
                $course_id  = isset($argus[0])?$argus[0]:1;
                $level_id   =  isset($argus[1])?$argus[1]:22;
            }
            if($user->id == 53){
                return $this->unit->getUnitList($user,$course_id,$level_id);
            }else{

                if(count($argus) ==1){
                    $course_id = 1;
                    $publishing_house_id = 0;
                    //倒流高中课程
                    $UserSchoolGradeClassRealtionShip = $user->getUserSchoolGradeClassRealtionShip();
                    if($UserSchoolGradeClassRealtionShip){
                        //与学校关系存在
                        if(isset($UserSchoolGradeClassRealtionShip->school_id) && !empty($UserSchoolGradeClassRealtionShip->school_id)){
                            $school = $this->school->getSchool($UserSchoolGradeClassRealtionShip->school_id);
                            if($school->id != 0){
                                $publishing_house_id = $school->publishing_house_id;

                            }
                        }
                    }

                    $course = $this->db->select('courses.id,publishing_house_courses.id as publishing_house_course_id')
                        ->join('courses','courses.id = publishing_house_courses.course_id', 'left')
                        ->where("courses.status",1)->where("courses.id",1)
                        ->where("publishing_house_courses.publishing_house_id",$publishing_house_id)
                        ->order_by("publishing_house_courses.sort","asc")
                        ->get("publishing_house_courses")->row();
                    if($course){
                        $course_id = $course->publishing_house_course_id;
                    }

                    //通过course_id 获取level_id
                    $level = $this->db->where("publishing_house_course_id",$course_id)->get("publishing_house_course_levels")->row();
                    if($level)  $level_id = $level->id;
                    else $level_id = 0;
                }else if(count($argus) ==2){
                    $course_id  = isset($argus[0])?$argus[0]:1;
                    $level = $this->db->where("publishing_house_course_id",$course_id)->get("publishing_house_course_levels")->row();
                    if($level)  $level_id = $level->id;
                    else $level_id = 0;
                }else if(count($argus) > 2){
                    $course_id  = isset($argus[0])?$argus[0]:1;
                    $level_id   =  isset($argus[1])?$argus[1]:22;
                }
                return $this->publish_hourse_course_unit->getUnitList($user,$course_id,$level_id,true);
            }

        }
        return $this;
    }

    public function getUnitDetail(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $course_id  = isset($argus[0])?$argus[0]:0;
            $unit_id  = isset($argus[1])?$argus[1]:0;
            $UserSchoolGradeClassRealtionShip = $user->getUserSchoolGradeClassRealtionShip();
            if($UserSchoolGradeClassRealtionShip){
                //与学校关系存在
                if(isset($UserSchoolGradeClassRealtionShip->school_id) && !empty($UserSchoolGradeClassRealtionShip->school_id)){
                    $school = $this->school->getSchool($UserSchoolGradeClassRealtionShip->school_id);
                    if($school->id != 0){
                        $publishing_house_id = $school->publishing_house_id;
                        return $this->unit->getUnitDetail($user,$course_id,$unit_id,$publishing_house_id);
                    }else{
                        $this->returncode['errcode'] = 2000009;
                        $this->returncode['errdesc'] = "您没有权限访问此内容,或者内容已经被删除!";
                    }
                }else{
                    $this->returncode['errcode'] = 2000009;
                    $this->returncode['errdesc'] = "您没有权限访问此内容,或者内容已经被删除!";
                }
            }else{
                $this->returncode['errcode'] = 2000009;
                $this->returncode['errdesc'] = "您没有权限访问此内容,或者内容已经被删除!";
            }
        }else{
            $this->load->view("qrerror");
        }
        return $this;
    }


    public function getTestUnitDetail(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1) {
            $data =  $this->unit->getTestUnitDetail($user,$argus[0]);
            var_dump($data);
        }
        return $this;
    }


    public function getUnitInfo($unit_id=0,$user_id = 0){
        $user = $this->user->getUser($user_id);
        $unit = $this->unit->getUnit($unit_id);
        if(isset($unit->id) && !empty($unit->id) && isset($user->id) && !empty($user->id)){
            return $unit->calculateUnit($user);
        }
        return true;
    }


    public function getDigitalPortfolioList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user  && count($argus) >= 1 ){
            if(count($argus) == 1){
                return $this;
            } else if(count($argus) == 2){
                $unit_id = isset($argus[0])?$argus[0]:0;
                $limit = 20;
                $start = 0;
                $part_id = 0;
            }else if(count($argus) == 3){
                $unit_id = isset($argus[0])?$argus[0]:0;
                $limit = isset($argus[1])?$argus[1]:20;
                $start = isset($argus[2])?$argus[2]:0;
                $part_id = 0;
            }else{
                $unit_id = isset($argus[0])?$argus[0]:0;
                $limit = isset($argus[1])?$argus[1]:20;
                $start = isset($argus[2])?$argus[2]:0;
                $part_id = isset($argus[3])?$argus[3]:0;
            }
            if(!empty($unit_id)) return $this->unit->getDigitalPortfolioList($unit_id,$user,$limit,$start,$part_id);
        }
        return $this;
    }




}
