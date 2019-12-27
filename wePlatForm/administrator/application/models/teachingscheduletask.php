<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
 *
 *
 *  读课表
 *
 * */

class Teachingscheduletask extends CI_Model{



    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
                "id"                        => array("require" => false),
                "teaching_schedule_id"      => array("require" => false),
                "created_time"              => array("require" => false),
                "user_id"                   => array("require" => false),
                "name"                      => array("require" => false),
                "is_allowed_upload_material" => array("require" => false),
                "description"               => array("require" => false),
                "material_resource_ids"     => array("require" => false),
                 "end_date"     => array("require" => false),
            "file_id"               => array("require" => false),



        );
        parent::_initialize($config);
    }




    public function getTeachingScheduleTask($id){
        $region = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("teaching_schedule_task")->row_array();
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




    public function getTeachingScheduleTaskInfo(){

        $data = array(
            "id"                        => $this->id,
            "created_time"              => $this->created_time,
            "user_id"                   => $this->user_id,
            "name"                      => $this->name,
            "end_date"                  => $this->end_date,
            "description"               => $this->description,
            "material_resource_ids"     => $this->material_resource_ids,
            "file_id"                    => $this->file_id,
            "userInfo"                  => $this->getUserInfo(),
        );
        return $data;
    }


    public function getUserInfo(){
        return $this->user->getUser($this->user_id)->getUserInfoNotToken();
    }




    public function getTeachingScheduleTaskCount($teachingschedule_id=0){
        return $this->db->where("teaching_schedule_id",$teachingschedule_id)->get('teaching_schedule_task')->num_rows();
    }


    public function  updateKey($data = array()){
        if(count($data)){
            $this->db->where("id",$this->id);
            $this->db->update("teaching_schedule_task",$data);
        }
        return true;
    }

    /*
     *
     * 获取区域列表数据
     */

    public function getTeachingScheduleTaskList($teachingschedule_id=0,$limit=20,$start=0){
        $data = array();
        $items = $this->db->select("id")->where("teaching_schedule_id",$teachingschedule_id)->order_by("id","desc")->limit($limit,$start)->get("teaching_schedule_task")->result();
        foreach($items as $item){
            $data[] = $this->getTeachingScheduleTask($item->id)->getTeachingScheduleTaskInfo();
        }
        return $data;
    }


    public function getTeachingScheduleTaskInfoList($limit=20,$start=0,$post){
        $data = array();
        $items = $this->db->select("id");
        if(isset($post['key']) && !empty($post['key'])){
            $items = $items->like("name",$post['key']);
        }
        $items = $items->limit($limit,$start)->order_by("id","desc")->get("teaching_schedule_task")->result();
        foreach($items as $item){
            $data[] = $this->getTeachingScheduleTask($item->id)->getTeachingScheduleTaskInfo();
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
        if(isset($data['id']) && !empty($data['id'])){
            $this->db->where("id",$data['id']);
            $this->db->update('teaching_schedule_task',$data);
        }else{
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $this->db->insert('teaching_schedule_task',$data);
            $data['id']= $this->db->insert_id();
        }

        return true;
    }



    public function delete(){
        if(!isset($this->id)){
            return false;
        }else{
            $this->db->where("id",$this->id);
            $this->db->delete("teaching_schedule_task");
        }
        return true;
    }

}  
