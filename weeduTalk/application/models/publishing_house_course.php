<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publishing_house_course extends CI_Model{

    public $objectType = 'publishing_house';
    public $type = 'publishing_house';

    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'                  => array("require" => false),
            "publishing_house_id" => array("require" => false),
            "course_id"           => array("require" => false),
            "sort"               => array("require" => false),


        );
        parent::_initialize($config);
    }

    public function getPublishingHouseCourse($id){
        $unit = new self;
        $data = $this->config['attributes'];
        $row = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("publishing_house_courses")->row_array();
        if($row){
            foreach($row as $key=>$val){
                if(empty($val)) $val = "";
                $unit->$key = $val;
            }
            $unit->course = $unit->getOrginCourseDetail();
        }else{
            $unit->id = 0;
            $unit->course = null;
        }
        return $unit;
    }


    public function getgetPublishingHouseCourseInfo(){
        $data = array(
            'id'                 =>(int)$this->id,
            "publishing_house_id" => $this->publishing_house_id,
            "course_id"           => $this->course_id,
            "sort"               => $this->sort,
        );
        return $data;
    }

    public function getOrginCourseDetail(){
        return $this->course->getCourse( $this->course_id);
    }


    public function getgetPublishingHouseCourseCount(){
        $item = $this->db->select('count(*) as num')->get("publishing_house_courses")->row();
        return isset($item->num)?$item->num:0;
    }


    public function getgetPublishingHouseCourseList(){
        $courses = $this->db->select('id')->get("publishing_house_courses")->result();
        $result = array();
        foreach($courses as $course){
            $result[] = $this->getPublishingHouseCourse($course->id)->getgetPublishingHouseCourseInfo();
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function  updateKey($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->where("id", $this->id);
            $this->db->update("publishing_house_courses", $data);
//            echo $this->db->last_query();
        }
        return true;
    }


    public function getCourseList($user=null){
        $result = array();
        $courses = $this->db->select('courses.id,publishing_house_courses.id as publishing_house_course_id')
            ->join('courses','courses.id = publishing_house_courses.course_id', 'left')
            ->where("courses.status",1)
            ->where("publishing_house_courses.publishing_house_id",$this->id)
            ->order_by("publishing_house_courses.sort","asc")->get("publishing_house_courses")->result();
        foreach($courses as $course){
            $couseInfo = $this->course->getCourse($course->id)->getCourseInfo($user);
            $couseInfo['publishing_house_course_id'] = $course->publishing_house_course_id;
            $result[] = $couseInfo;
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function getCourseInfoList($user=null,$publishing_house_id){
        $result = array();
        $courses = $this->db->select('courses.id,publishing_house_courses.id as publishing_house_course_id')
            ->join('courses','courses.id = publishing_house_courses.course_id', 'left')
            ->where("courses.status",1);
        //  echo $user->course_ids."xxxx";
        if($user != null && !empty($user->course_ids) && $user->id != 53){
            $coursearray = explode(",",$user->course_ids);
            $courses = $courses->where_in("courses.id",$coursearray);
        }
        $courses = $courses->where("publishing_house_courses.publishing_house_id",$publishing_house_id)
            ->order_by("publishing_house_courses.sort","asc")->get("publishing_house_courses")->result();
        //  echo $this->db->last_query();
        foreach($courses as $course){
            $couseInfo = $this->course->getCourse($course->id)->getCourseInfo($user,$course->publishing_house_course_id);
            $couseInfo['orgin_course_id'] = $couseInfo['id'];
            if(!isset($couseInfo['completion_rate'])){
                $couseInfo['completion_rate'] = 0.3;
                $couseInfo['accuracy']        =0.6;
            }
            $couseInfo['id'] = $course->publishing_house_course_id;
            $result[] = $couseInfo;
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function getCourseCount(){
        $count = 0;
        $item = $this->db->select('count(*) as num')
            ->join('courses','courses.id = publishing_house_courses.course_id', 'left')
            ->where("courses.status",1)
            ->where("publishing_house_courses.publishing_house_id",$this->id)
            ->get("publishing_house_courses")->row();
        $count = isset($item->num)?$item->num:0;
        return $count;
    }

    public function getLevelList($publishing_house_course_id=0,$user){
        $get = $this->input->get();
        $levels = $this->db->select('id,name,status')
            ->where("publishing_house_course_id",$publishing_house_course_id)
            ->get("publishing_house_course_levels")->result();
        foreach ($levels as $level){
            $level->completion_rate = 0.3;
            $level->accuracy = 0.4;
            if(isset($get['app_version']) && $get['app_version'] >= "2.0.0"){
                $units = $this->db->select('units.id as id')
                    ->where("publishing_house_course_level_id",$level->id)
                    ->join('units','units.id = publishing_house_course_units.unit_id', 'left')
                    ->where("units.status",1)
                    ->where("publishing_house_course_id",$publishing_house_course_id)
                    ->get("publishing_house_course_units")->result();
                $record =  $this->courseauth->getUserCourseLevelRowAVG($user,$this->toIdArray($units));
                if($record){
                    $level->completion_rate =  $record->completion_rate;
                    $level->accuracy      = $record->accuracy;
                }
            }


        }
        $this->returncode['data'] = $levels;
        return $this;
    }


    public function save($data){

        if(!empty($data['level_id'])){
            $this->db->where("id",$data['level_id']);
            unset($data['level_id']);
            $this->db->update("publishing_house_course_levels",$data);
        }else{
            unset($data['level_id']);
            $data['createdDate']   = date('Y-m-d H:i:s');
            $this->db->insert("publishing_house_course_levels",$data);
        }
        return true;
    }

    public function delete($data){
        if(!empty($data['level_id'])){
            $this->db->where("id",$data['level_id']);
            $this->db->delete("publishing_house_course_levels");
        }
        return true;
    }

}  
