<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publishing_house extends CI_Model{

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
            "name"                => array("require" => false),
            "createdDate"          => array("require" => false),

        );
        parent::_initialize($config);
    }

    public function getPublishingHouse($id){
        $unit = new self;
        $data = $this->config['attributes'];
        $row = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("publishing_house")->row_array();
        if($row){
            foreach($row as $key=>$val){
                if(empty($val)) $val = "";
                $unit->$key = $val;
            }
        }else{
            $unit->id = 0;
        }
        return $unit;
    }


    public function getPublishingHouseInfo(){
        $data = array(
            'id'              =>(int)$this->id,
            'name'            => $this->name,
            "createdDate"     =>  $this->createdDate,

        );
        return $data;
    }


    public function getPublishingHouseCount(){
        $item = $this->db->select('count(*) as num')->get("publishing_house")->row();
        return isset($item->num)?$item->num:0;
    }


    public function getPublishingHouseList($limit=20,$start=0){
        if($limit){
            $courses = $this->db->select('id')->limit($limit,$start)->get("publishing_house")->result();
        }else{
            $courses = $this->db->select('id')->get("publishing_house")->result();
        }

        $result = array();
        foreach($courses as $course){
            $result[] = $this->getPublishingHouse($course->id)->getPublishingHouseInfo();
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
            $this->db->update("publishing_house", $data);
//            echo $this->db->last_query();
        }
        return true;
    }



    public function save($data){

        if(!empty($data['id'])){
            $this->db->where("id",$data['id']);
           // unset($data['id']);
            $this->db->update("publishing_house",$data);
        }else{
            $data['createdDate']   = date('Y-m-d H:i:s');
            $this->db->insert("publishing_house",$data);
            $data['id'] = $this->db->insert_id();
        }
        $publishHourse = $this->getPublishingHouse($data['id']);
        $publishHourse->syncPublishingHouseCourses();
        return $data['id'];
    }

    public function delete($data){
        if(!empty($data['id'])){
            $this->db->where("id",$data['id']);
            $this->db->delete("publishing_house");
            $this->db->where("publishing_house_id",$data['id'])->delete("publishing_house_courses");
        }
        return true;
    }

    // 同步课程

    public function syncPublishingHouseCourses(){
        $courses = $this->db->get("courses")->result();
        foreach($courses as $course){
            $count = $this->db->where("publishing_house_id",$this->id)->where("course_id",$course->id)->get("publishing_house_courses")->num_rows();
            if($count == 0){
                $entity = array(
                    "publishing_house_id"=>$this->id,
                    "course_id"          =>$course->id,
                    "sort"               =>$course->sort
                );
                $this->db->insert("publishing_house_courses",$entity);
            }
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

    public function updateCourseKey($course_id,$data=array()){
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->where("publishing_house_id",$this->id)->where("course_id", $course_id);
            $this->db->update("publishing_house_courses", $data);
//            echo $this->db->last_query();
        }
    }
}  
