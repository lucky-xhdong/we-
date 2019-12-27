<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Model{

    public $objectType = 'courses';
    public $type = 'courses';

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
            "createdTime"         => array("require" => false),
            "unitCount"           => array("require" => false),
            "type"                => array("require" => false),
            "suitable_object"     => array("require" => false),
            "learning_goals"      => array("require" => false),
            "nature_course"       => array("require" => false),
            "description"         => array("require" => false),
            "filename"            => array("require" => false),
            "status"              => array("require" => false),
        );
        parent::_initialize($config);
    }

    public function getCourse($id){
        $unit = new self;
        $data = $this->config['attributes'];
        $row = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("courses")->row_array();
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


    public function getCourseInfo($user=null){
        $data = array(
            'id'              =>(int)$this->id,
            'name'            => $this->name,
            'description'     => $this->description,
            'createdTime'     => $this->createdTime,
            'unitCount'       => $this->unitCount,
            'type'            => $this->type,
            'suitable_object' => $this->suitable_object,
            'learning_goals'  =>$this->learning_goals,
            'nature_course'   => $this->nature_course,
            'picture_url'     => $this->getFileUrl(),
            'status'            =>  $this->status,
        );
        return $data;
    }

    public function getFileUrl(){
        if(!empty($this->filename)){
            $picture = $this->storage->setMinxer($this)->getFileName($this->filename,"origin");
            return $picture;
        }
        return base_url().'media/assets/courses/'.$this->filename;
    }



    public function getCourseList($user=null){
        if($user != null && !empty($user->course_ids) && $user->id != 53){
            $coursearray = explode(",",$user->course_ids);
            $courses = $this->db->select('id')->where_in("id",$coursearray);
        }else{
            $courses = $this->db->select('id');
        }

        if($user != null && $user->id != 53){
            $courses = $courses->where("status",1);
        }

        $courses = $courses->get("courses")->result();

        $result = array();
        foreach($courses as $course){
            $result[] = $this->getCourse($course->id)->getCourseInfo($user);
        }
        $this->returncode['data'] = $result;
        return $this;
    }


    public function getAdminCourseList($user=null){
        $result = array();
        if($user != null){
            $coursearray = explode(",",$user->course_ids);
            if(count($coursearray) > 0){
                $courses = $this->db->select('id')->where_in("id",$coursearray)->get("courses")->result();
                foreach($courses as $course){
                    $result[] = $this->getCourse($course->id)->getCourseInfo($user);
                }
            }
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function getAdminCourseCount($user=null){
        $count = 0;
        if($user != null){
            $coursearray = explode(",",$user->course_ids);
            if(count($coursearray) > 0){
                $item = $this->db->select('count(*) as num')->where_in("id",$coursearray)->get("courses")->row();
                $count = isset($item->num)?$item->num:0;
            }
        }
        return $count;
    }



    public function getCourseCount(){
        $item = $this->db->select('count(*) as num')->get("courses")->row();
        return isset($item->num)?$item->num:0;
    }


    public function getLevelList($course_id=2){
        $levels = $this->db->select('id,name,status')->where("course_id",$course_id)->get("levels")->result();
        $this->returncode['data'] = $levels;
        return $this;
    }


    public function getCoursesDetails($user=null){
        $data = $this->config['attributes'];
        if($user != null && !empty($user->course_ids) && $user->id != 53){
            $coursearray = explode(",",$user->course_ids);
            $courses = $this->db->select(implode(',',array_keys($data)))->where_in("id",$coursearray);
        }else{
            $courses = $this->db->select(implode(',',array_keys($data)));
        }

        if($user != null && $user->id != 53){
            $courses = $courses->where("status",1);
        }

        $courses = $courses->get("courses")->result();
       // echo $this->db->last_query();

        //$courses =  $this->db->select(implode(',',array_keys($data)))->get("courses")->result();
        foreach($courses as $key => $course){
            $units = $this->unit->getUnitsInfo($course->id,$user);
            $course->units = $units;
        }
        $this->returncode['data'] = $courses;
        return $this;
    }


    public function getClassCoursesDetails($class=null){
        $data = $this->config['attributes'];
        if($class != null && !empty($class->course_ids)){
            $coursearray = explode(",",$class->course_ids);
            $courses = $this->db->select(implode(',',array_keys($data)))->where("status",1)->where_in("id",$coursearray);
        }else{
            return $this;
        }
        $courses = $courses->get("courses")->result();
        // echo $this->db->last_query();
        //$courses =  $this->db->select(implode(',',array_keys($data)))->get("courses")->result();
        foreach($courses as $key => $course){
            $units = $this->unit->getUnitsInfo($course->id);
            $course->units = $units;
        }
        $this->returncode['data'] = $courses;
        return $this;
    }

    public function getCoursesMtDetails($user=null){
        $data = $this->config['attributes'];
        $courses =  $this->db->select(implode(',',array_keys($data)))->get("courses")->result();
        foreach($courses as $key => $course){
            $units = $this->unit->getUnitsMtInfo($course->id,$user);
            $course->units = $units;
        }
        $this->returncode['data'] = $courses;
        return $this;
    }


    public function  saveCourse($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->insert("courses", $data);
            return $this->db->insert_id();
        }
        return 0;
    }

    public function  updateKey($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->where("id", $this->id);
            $this->db->update("courses", $data);
//            echo $this->db->last_query();
        }
        return true;
    }

    public function uploadpicture()
    {

        $file = $this->storage->setMinxer($this)->uploadFile();
        if ($file->errorCode == 0) {
            $data['filename'] = $file->data['file_name'];
            $this->updateKey($data);
            $this->returncode['data'] = $this->getFileUrl();
        } else {
            $this->returncode['errcode'] = 1000003;
            $this->returncode['errdesc'] = "头像上传失败";
            $this->returncode['data'] = $file;
        }
        return $this;
    }


    public function save($data){

        if(!empty($data['level_id'])){
            $this->db->where("id",$data['level_id']);
            unset($data['level_id']);
            $this->db->update("levels",$data);
        }else{
            unset($data['level_id']);
            $data['createdDate']   = date('Y-m-d H:i:s');
            $this->db->insert("levels",$data);
        }
        return true;
    }

    public function delete($data){
        if(!empty($data['level_id'])){
            $this->db->where("id",$data['level_id']);
            $this->db->delete("levels");
        }
        return true;
    }

    public function getAdminPublishCoursesDetails($user=null,$class=null){
        $data = $this->config['attributes'];
        $school_id = 0;
        if($user){
            $UserSchoolGradeClassRealtionShip = $user->getUserSchoolGradeClassRealtionShip();
            $school_id = $UserSchoolGradeClassRealtionShip->school_id;
        }else if($class){
            $school_id = $class->school_id;
        }
        $school =$this->db->where("id",$school_id)->get("school")->row();

        if($user != null && !empty($user->course_ids) && $user->id != 53){
            $coursearray = explode(",",$user->course_ids);
            $courses = $this->db->select("courses.*,publishing_house_courses.id as publishing_house_courses_id")->where_in("publishing_house_courses.course_id",$coursearray);
        }else if($class != null && !empty($class->course_ids)){
            $coursearray = explode(",",$class->course_ids);
            $courses = $this->db->select("courses.*,publishing_house_courses.id as publishing_house_courses_id")->where_in("publishing_house_courses.course_id",$coursearray);
        }else{
            $courses = $this->db->select("courses.*,publishing_house_courses.id as publishing_house_courses_id");
        }

        if($school->id !=0){
            $courses = $courses->where("publishing_house_courses.publishing_house_id",$school->publishing_house_id);
        }

        $courses = $courses->join('courses','courses.id = publishing_house_courses.course_id', 'left')
            ->where("courses.status",1);

        $courses = $courses->order_by("publishing_house_courses.sort","asc")->get("publishing_house_courses")->result();
        // echo $this->db->last_query();

        //$courses =  $this->db->select(implode(',',array_keys($data)))->get("courses")->result();
        foreach($courses as $key => $course){
            $levels = $this->db->select('id,name,status')->where("publishing_house_course_id",$course->publishing_house_courses_id)->get("publishing_house_course_levels")->result();
            $course->levels = $levels;
            if(count($levels) >0){
                $units = $this->publish_hourse_course_unit->getAdminUnitsInfo($course->publishing_house_courses_id,$user,$levels[0]->id);
            }else{
                $units = $this->publish_hourse_course_unit->getAdminUnitsInfo($course->publishing_house_courses_id,$user,0);
            }
            $course->units = $units;
        }
        $this->returncode['data'] = $courses;
        return $this;
    }
}  
