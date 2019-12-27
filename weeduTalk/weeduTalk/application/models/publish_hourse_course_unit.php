<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publish_hourse_course_unit extends CI_Model{

    public $objectType = 'units';
    public $type = 'units';

    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'                                      => array("require" => false),
            "publishing_house_id"                     => array("require" => false),
            'publishing_house_course_id'              => array("require" => true),
            "publishing_house_course_level_id"        => array("require" => false),
            "unit_id" 		                          => array("require" => false),
            "name"                                    => array("require" => false),
            "sort"                                    => array("require" => false),


        );
        parent::_initialize($config);
    }

    public function getUnit($id){
        $unit = new self;
        $data = $this->config['attributes'];
        $row = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("publishing_house_course_units")->row_array();
        if($row){
            foreach($row as $key=>$val){
                if(empty($val)) $val = "";
                $unit->$key = $val;
            }
        }else{
            $unit->id = 0;
            $unit->name = "";
        }
        return $unit;
    }



    public function getUnitInfo1($user= null,$unit){
        $unitInfo =  $this->unit->getUnitObject($unit)->getUnitInfo($user);
        $unitInfo['name'] = $unit->unitnewname;
        $unitInfo['publishing_house_course_unit_id'] = $unit->publishing_house_course_unit_id;
        return $unitInfo;
    }

    public function getUnitInfo($user= null){
        $unitInfo =  $this->unit->getUnit($this->unit_id)->getUnitInfo($user);
        $unitInfo['name'] = $this->name;
        $unitInfo['publishing_house_course_unit_id'] = $this->id;
        return $unitInfo;
    }

    public function  updateKey($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->where("id", $this->id);
            $this->db->update("publishing_house_course_units", $data);
//            echo $this->db->last_query();
        }
        return true;
    }

    public function  saveUnit($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->insert("publishing_house_course_units", $data);
            return $this->db->insert_id();
        }
        return 0;
    }


    public function getUnitList($user,$publishing_house_course_id=1,$publishing_house_course_level_id=0){
        $units = $this->db->select('publishing_house_course_units.id as publishing_house_course_unit_id ,publishing_house_course_units.name as unitnewname,units.*')
            ->where("publishing_house_course_level_id",$publishing_house_course_level_id)
            ->join('units','units.id = publishing_house_course_units.unit_id', 'left')
            ->where("units.status",1)
            ->where("publishing_house_course_id",$publishing_house_course_id)
            ->order_by("publishing_house_course_units.sort","asc")->get("publishing_house_course_units")->result();
        $result = array();
        foreach($units as $unit){
            $result[] = $this->getUnitInfo1($user,$unit);
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function getAdminUnitsInfo($course_id=0,$user=null,$level_id=0){
        $units = $this->db->select('publishing_house_course_units.*')
            ->where("publishing_house_course_level_id",$level_id)
            ->join('units','units.id = publishing_house_course_units.unit_id', 'left')
            ->where("units.status",1)
            ->where("publishing_house_course_id",$course_id)
            ->order_by("publishing_house_course_units.sort","asc")->get("publishing_house_course_units")->result();
        $result = array();
        foreach($units as $unit){
            $unitItem = $this->getUnit($unit->id)->getUnitInfo();
            $unitItem['lessons'] = $this->lesson->getLessonList($user,$unit->unit_id)->returncode['data'];
            $result[] = $unitItem;
        }
        return $result;
    }


    public function getpublichUnlockUnitsInfo($course_id=0,$user=null){
        $units = $this->db->select('publishing_house_course_units.unit_id,publishing_house_course_units.id as publishing_house_course_unit_id ,publishing_house_course_units.name as unitnewname,units.*,publishing_house_course_levels.name as levelName')
            ->join('units','units.id = publishing_house_course_units.unit_id', 'left')
            ->join('publishing_house_course_levels','publishing_house_course_levels.id = publishing_house_course_units.publishing_house_course_level_id', 'left')
            ->where("units.status",1)
            ->where("publishing_house_course_units.publishing_house_course_id",$course_id)
            ->order_by("publishing_house_course_units.sort","asc")->get("publishing_house_course_units")->result();
        $result = array();
        foreach($units as $unit){
            $unitItem = $this->getUnitInfo1($user,$unit);
            $unitItem['name'] =  $unit->levelName.'-'.$unitItem['name'];
            $unitItem['lessons'] = $this->lesson->getLessonList($user,$unit->unit_id)->returncode['data'];
            $result[] = $unitItem;
        }
        return $result;
    }

    public function getpublichUnitsMtInfo($course_id=0,$user=null){
        $units = $this->db->select('publishing_house_course_units.unit_id,publishing_house_course_units.id as publishing_house_course_unit_id ,publishing_house_course_units.name as unitnewname,units.*,publishing_house_course_levels.name as levelName')
            ->join('units','units.id = publishing_house_course_units.unit_id', 'left')
            ->join('publishing_house_course_levels','publishing_house_course_levels.id = publishing_house_course_units.publishing_house_course_level_id', 'left')
            ->where("units.status",1)
            ->where("publishing_house_course_units.publishing_house_course_id",$course_id)
            ->order_by("publishing_house_course_units.sort","asc")->get("publishing_house_course_units")->result();
        $result = array();
        foreach($units as $unit){
            $unitItem = $this->getUnitInfo1($user,$unit);
            // $unitItem['name'] =  $unit->levelName.'-'.$unitItem['name'];
            //$unitItem['name'] = $unitItem['name'];
            $unitItem['mt_score'] = 0;
            $lesson = $this->db->select('id')->where("type","test")->where("unit_id",$unit->unit_id)->get("lessons")->row();
            if($lesson && $user){
                $this->recordmanager->user_id = $user->id;
                $mtscore = $this->recordmanager->getUserMTScoresDate((int)$lesson->id);
                $unitItem['mt_score'] = $mtscore->totalScore;
                $unitItem['date'] = $mtscore->date;
            }
            $result[] = $unitItem;
        }
        return $result;
    }


    public function getUnitsMtInfo($course_id=0,$user=null,$level_id=0){
        $units = $this->db->select('publishing_house_course_units.*')
            ->where("publishing_house_course_level_id",$level_id)
            ->join('units','units.id = publishing_house_course_units.unit_id', 'left')
            ->where("units.status",1)
            ->where("publishing_house_course_id",$course_id)
            ->order_by("publishing_house_course_units.sort","asc")->get("publishing_house_course_units")->result();
        $result = array();
        foreach($units as $unit){
            $unitItem['mt_score'] = 0;
            $unitItem['date'] = "";
            $unitItem['name'] = "";
            $unitItem['mt_score_list'] = array();
            // 获取Unit下面的MT lesson_id
            $lesson = $this->db->select('id')->where("type","test")->where("unit_id",$unit->unit_id)->get("lessons")->row();
            if($lesson && $user){
                $unitItem['name'] = isset($unit->name)?$unit->name:"";
                $this->recordmanager->user_id = $user->id;
                $mtscore = $this->recordmanager->getUserMTScoresDate((int)$lesson->id);
                $unitItem['mt_score'] = $mtscore->totalScore;
                $unitItem['date'] = $mtscore->date;
                $this->recordmanager->user_id = $user->id;
                $unitItem['mt_score_list'] =  $this->recordmanager->getUserMTLimtScoresList((int)$lesson->id);
            }
            $result[] = $unitItem;
        }

        return $result;
    }


    public function getUnitCount($publishing_house_course_id=1,$publishing_house_course_level_id=0){
        return $this->db
            ->where("publishing_house_course_level_id",$publishing_house_course_level_id)
            ->join('units','units.id = publishing_house_course_units.unit_id', 'left')
            ->where("units.status",1)
            ->where("publishing_house_course_id",$publishing_house_course_id)
            ->order_by("publishing_house_course_units.sort","asc")->get("publishing_house_course_units")->num_rows();
    }

    public function delete(){
        if($this->id != 0){
            $this->db->where("id",$this->id);
            $this->db->delete("publishing_house_course_units");
        }
        return $this;
    }

    public function getAllUnitList($publishing_house_course_id=1,$limit=10,$start=0){
        $push_hourse_course = $this->publishing_house_course->getPublishingHouseCourse($publishing_house_course_id);
        $units = $this->db->select('units.*')
            ->where("units.status",1)
            ->where("units.course_id",$push_hourse_course->course_id)
            ->limit($limit,$start)
            ->get("units")->result();
        // echo $this->db->last_query();
        $result = array();
        foreach($units as $unit){
            $result[] = $this->getUnit($unit->id)->getAllUnitInfo($push_hourse_course,$unit->id);
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function getAllUnitCount($publishing_house_course_id=1){
        $push_hourse_course = $this->publishing_house_course->getPublishingHouseCourse($publishing_house_course_id);
        return $this->db
            ->where("units.status",1)
            ->where("units.course_id",$push_hourse_course->course_id)
            ->get("units")->num_rows();
    }

    public function getAllUnitInfo($push_hourse_course,$unit_id){
        $unitInfo =  $this->unit->getUnit($unit_id)->getUnitInfo();
        $row = $this->db
            ->where("publishing_house_course_id",$push_hourse_course->id)
            ->where("publishing_house_id",$push_hourse_course->publishing_house_id)
            ->where("unit_id",$unit_id)
            ->get("publishing_house_course_units")->num_rows();
        if($row == 0) $unitInfo['hasUnit'] = false;
        else  $unitInfo['hasUnit'] = true;

        return $unitInfo;
    }

    public function importUnit($post){
        if(isset($post['publishing_house_course_id']) && !empty($post['publishing_house_course_id'])){
            if(isset($post['publishing_house_course_level_id']) && !empty($post['publishing_house_course_level_id'])){
                if(isset($post['orgin_unit_id']) && !empty($post['orgin_unit_id'])){
                    $unit = $this->unit->getUnit($post['orgin_unit_id']);
                    if($unit->id !=0){
                        $push_hourse_course = $this->publishing_house_course->getPublishingHouseCourse($post['publishing_house_course_id']);
                        $entity = array(
                            "publishing_house_id"       =>$push_hourse_course->publishing_house_id,
                            "publishing_house_course_id"=>$push_hourse_course->id,
                            "publishing_house_course_level_id"=>$post['publishing_house_course_level_id'],
                            "unit_id"=>$unit->id,
                            "name"=>$unit->name
                        );
                        $row = $this->db
                            ->where("publishing_house_course_id",$push_hourse_course->id)
                            ->where("publishing_house_id",$push_hourse_course->publishing_house_id)
                            ->where("publishing_house_course_level_id",$post['publishing_house_course_level_id'])
                            ->where("unit_id",$unit->id)
                            ->get("publishing_house_course_units")->num_rows();
                        if($row == 0){
                            $this->db->insert("publishing_house_course_units",$entity);
                            $new_id = $this->db->insert_id();
                            $this->db->where("id",$new_id)->update("publishing_house_course_units",array("sort"=>$new_id));
                        }
                    }
                }
            }
        }
        return true;
    }

    public function updateUnitSorts($unit_id,$publishing_house_course_id,$data=array()){
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db
                ->where("publishing_house_course_id",$publishing_house_course_id)
                ->where("unit_id",$unit_id)->update("publishing_house_course_units", $data);
//            echo $this->db->last_query();
        }
    }
}  
