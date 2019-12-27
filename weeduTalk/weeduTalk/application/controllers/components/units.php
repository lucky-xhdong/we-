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
                return $this->publish_hourse_course_unit->getUnitList($user,$course_id,$level_id);
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


}
