<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
 *
 *
 *  读课表
 *
 * */

class Teachingschedule extends CI_Model{



    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
                "id"                        => array("require" => false),
                "region_id"                 => array("require" => false),
                "created_time"              => array("require" => false),
                "user_id"                   => array("require" => false),
                "name"                      => array("require" => false),
                "school_id"                 => array("require" => false),
                "start_date"                => array("require" => false),
                "end_date"                  => array("require" => false),
                "description"               => array("require" => false),
                "material_resource_ids"     => array("require" => false),
                "teacher_ids"               => array("require" => false),
            "status"               => array("require" => false),


        );
        parent::_initialize($config);
    }




    public function getTeachingSchedule($id){
        $region = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("teaching_schedule")->row_array();
        if($item){
            foreach($item as $key=>$val){
                if(empty($val) && $val != 0) $val = "";
                $region->$key = $val;
            }
        }else{
            $region->id = 0;
        }
        return $region;
    }




    public function getTeachingScheduleInfo(){

        $data = array(
            "id"                        => $this->id,
            "region_id"                 => $this->region_id,
            "created_time"              => $this->created_time,
            "user_id"                   => $this->user_id,
            "name"                      => $this->name,
            "school_id"                 => $this->school_id,
            "start_date"                => $this->start_date,
            "end_date"                  => $this->end_date,
            "status"                    => $this->status,
            "description"               => $this->description,
            "material_resource_ids"     => $this->material_resource_ids,
            "teacher_ids"               => $this->teacher_ids,
            "schoolInfo"                => $this->school->getSchool($this->school_id),
            "userInfo"                  => $this->getUserInfo(),
            "teacherInfo"                  => $this->getTeacherInfo(),
            "task_count"                => $this->getTaskCount()

        );
        return $data;
    }

    public function getTaskCount(){
        return $this->db->where("teaching_schedule_id",$this->id)->get("teaching_schedule_task")->num_rows();
    }

    public function getTeacherInfo(){
        $techers = array();
        if(!empty($this->teacher_ids)){
            $teacher_ids = explode(",",$this->teacher_ids);
            foreach($teacher_ids as $teacher_id){
                $techers[] = $this->user->getUser($this->user_id)->name;
            }

        }
        return $techers;
    }


    public function getUserInfo(){
        return $this->user->getUser($this->user_id)->getUserInfoNotToken();
    }




    public function getTeachingScheduleCount(){
        $role = getAdminViewer()->getUserRole();
        $region_school_info = getAdminViewer()->getPlatFormAccountRegion();
        $items =  $this->db;
        $entity = $this->input->get();
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $items = $items->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $items = $items->where("created_time <=",$entity['end_date']);
        }
        if(isset($entity['searchName']) && !empty($entity['searchName']) ){
            $items = $items->like("name",$entity['searchName']);
        }
        if($role->type == 666666 || $role->type == 7777777){
            if(count($region_school_info) > 0) $region_school_info = $region_school_info[0];
            $items = $items->where("school_id",$region_school_info->school_id);
        }
        if($role->type == 444444){
            $items = $items->where("IF( FIND_IN_SET(".getAdminViewer()->id.",teacher_ids),1, 0)");
        }
       return $items->get('teaching_schedule')->num_rows();
    }


    public function  updateKey($data = array()){
        if(count($data)){
            $this->db->where("id",$this->id);
            $this->db->update("teaching_schedule",$data);
        }
        return true;
    }

    /*
     *
     * 获取区域列表数据
     */

    public function getTeachingScheduleList($limit=20,$start=0){
        $role = getAdminViewer()->getUserRole();
        $region_school_info = getAdminViewer()->getPlatFormAccountRegion();
        $data = array();
        $items = $this->db->select("id");
        $entity = $this->input->get();
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $items = $items->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $items = $items->where("created_time <=",$entity['end_date']);
        }
        if(isset($entity['searchName']) && !empty($entity['searchName']) ){
            $items = $items->like("name",$entity['searchName']);
        }
        if($role->type == 666666){
            if(count($region_school_info) > 0) $region_school_info = $region_school_info[0];
            $items = $items->where("school_id",$region_school_info->school_id);
        }
        if($role->type == 444444){
            $items = $items->where("IF( FIND_IN_SET(".getAdminViewer()->id.",teacher_ids),1, 0)");
        }
        $items = $items->order_by("id","desc")->limit($limit,$start)->get("teaching_schedule")->result();
        foreach($items as $item){
            $data[] = $this->getTeachingSchedule($item->id)->getTeachingScheduleInfo();
        }
        return $data;
    }


    public function getTeachingScheduleInfoList($limit=20,$start=0,$post){
        $data = array();
        $items = $this->db->select("id");
        if(isset($post['key']) && !empty($post['key'])){
            $items = $items->like("name",$post['key']);
        }
        $items = $items->limit($limit,$start)->order_by("id","desc")->get("teaching_schedule")->result();
        foreach($items as $item){
            $data[] = $this->getTeachingSchedule($item->id)->getTeachingScheduleInfo();
        }
        return $data;
    }



    public function save($data){
        $entity = $this->config['attributes'];
        foreach($data as $key => $val){
            if(!in_array($key,array_keys($entity))){
                unset($data[$key]);
            }
        }
        if(isset($data['teacher_ids']) && !empty($data['teacher_ids'])){
            $data['teacher_ids'] = implode(",",$data['teacher_ids']);
        }
        if(isset($data['id']) && !empty($data['id'])){
            $this->db->where("id",$data['id']);
            $this->db->update('teaching_schedule',$data);
        }else{
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $this->db->insert('teaching_schedule',$data);
            $data['id']= $this->db->insert_id();
        }

        return true;
    }



    public function delete(){
        if(!isset($this->id)){
            return false;
        }else{
            $this->db->where("id",$this->id);
            $this->db->delete("teaching_schedule");
        }
        return true;
    }



}  
