<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unit extends CI_Model{

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
            'id'                 => array("require" => false),
            "name"               => array("require" => false),
            'title'              => array("require" => true),
            "createdDate"        => array("require" => false),
            "updateDate" 		 => array("require" => false),
            "filename"           => array("require" => false),
            "description"        => array("require" => false),
            "course_id"          => array("require" => false),
            "status"          => array("require" => false),

        );
        parent::_initialize($config);
    }

    public function getUnit($id){
        $unit = new self;
        $data = $this->config['attributes'];
        $row = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("units")->row_array();
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

    public function getUnitInfo($user= null,$course_id=1){
        if($user && $user->id == 3){
            $unitLock = ($this->id ==1) ? false:true;
            $testLock = ($this->id ==1) ? false:true;
        }else{
            $unitLock = in_array($this->id,array(1,2,3,4,5,6)) || ($this->id >=9 && $this->id <=12 )   ? false:true;
            $testLock = in_array($this->id,array(1,2,3,4,5,6)) || ($this->id >=9 && $this->id <=12 ) ? false:true;
        }

        $data = array(
                'id'                =>  (int)$this->id,
                'name'              =>  $this->name,
                'description'       =>  $this->description,
                'course_id'         =>  $this->course_id,
                'status'            =>  $this->status,
                'title'             =>  $this->title,
                'accuracy'          =>  rand(1,100)/100,
                'completion_rate'   =>  0,
                'scores'            =>  0,
                'unitLock'          =>  $unitLock,
                'testLock'          =>  $testLock,
                'picture_url'       =>  $this->getFileUrl()
        );

        $lesson = $this->db->select('id')->where("type","test")->where("unit_id",$this->id)->get("lessons")->row();
        if($lesson && $user){
            $this->recordmanager->user_id = $user->id;
            $this->recordmanager->unit_id = 0;
            $this->recordmanager->part_id = 0;
            $data['scores'] = $this->recordmanager->getUserMTScores((int)$lesson->id);
        }
        if($user){
            $auhtUnits = $this->courseauth->getUserUintListChain($user,$course_id);
//            echo "<pre>";
//            print_r($auhtUnits);
//            echo "</pre>";
            if(isset( $auhtUnits[$this->id])){
                $data['unitLock'] = $auhtUnits[$this->id];
                $data['testLock'] = $auhtUnits[$this->id];
            }
            $this->recordmanager->user_id = $user->id;
            $this->recordmanager->unit_id = $this->id;
            $data['completion_rate'] =     $this->recordmanager->getMyCompletion();
            $this->recordmanager->part_id = 0;

            $data['accuracy']        =   round($this->recordmanager->getMyCorrection(),2);
        }
        if($user && $user->id == 53){
            $data['unitLock'] = 0;
            $data['testLock'] =0;
        }
        $data['stars'] = 0;
        if($user){
            $lessonDetail = $this->getMyPartDetails($user,$this->id);
            if(isset($lessonDetail['stars'])){
                $data['stars']  =   $lessonDetail['stars'];
            }
        }
        return $data;
    }


    public function getMyPartDetails($user=null,$unit_id=0){
        $result = array();
        if($user){
            $this->recordmanager->user_id = $user->id;
            $this->recordmanager->unit_id = $unit_id;

            $end_time       = date('Y-m-d');
            $this->recordmanager->start_time = date('Y-m-d',strtotime($end_time. '-14 days'));;
            $this->recordmanager->end_time   =$end_time;
            $StudyReuslt            =   sprintf("%.2f",$this->recordmanager->getUserStudyReuslt()*20); //学习效果
            $StudyReuslt             =$StudyReuslt>20?20:$StudyReuslt;
            if($StudyReuslt <= 0 ){
                $StudyReusltString = "学习效果低于标准水平.";
                $scores = 0;
                $study_tips  = "请注意一定按照教师要求，确保课程的完成率达标，提高答题的正确率和达标率，及时复习，提高MT的正确率和得分，提高学习得分.";
            } else if($StudyReuslt > 0 && $StudyReuslt <12){
                $StudyReusltString = "学习效果低于标准水平.";
                $scores = 1;
                $study_tips  = "请注意一定按照教师要求，确保课程的完成率达标，提高答题的正确率和达标率，及时复习，提高MT的正确率和得分，提高学习得分.";
            }else if($StudyReuslt >=12 && $StudyReuslt <=14){
                $StudyReusltString = "学习效果，处于标准水平.";
                $scores = 2;
                $study_tips = "请继续按照教师要求，确保课程的完成率达标，提高答题的正确率和达标率，及时复习，提高MT的正确率和得分，提高学习得分；";
            }else if($StudyReuslt > 14 && $StudyReuslt <=16){
                $scores = 2;
                $StudyReusltString = "学习效果良好.";
                $study_tips  = "请继续按照教师要求，确保课程的完成率达标，提高答题的正确率和达标率，及时复习，提高MT的正确率和得分，提高学习得分.";
            }else if($StudyReuslt > 16){
                $StudyReusltString = "学习效果，远高于标准水平.";
                $scores = 3;
                $study_tips  = "请继续保持良好的练习习惯，继续提升练习效果.";

            }

            $result = array(
                "stars"               => $scores,
                "completion_rate"     => $this->recordmanager->getMyCompletion(),  //完成率
                "accuracy"            => $this->recordmanager->getMyCorrection(),  //正确率
                "last_score"          => $this->recordmanager->getUserPartScores(),
                "learning_times"      => $this->recordmanager->getLearningTimes(),  //学习次数
                "time"                => $this->recordmanager->getLearningTime(),  //总学习时间
                "learning_evaluation" => $StudyReusltString, //学习评价
                "study_tips"          => $study_tips  //学习建议
            );
        }
        return $result;
    }


    public function getFileUrl(){
        if(!empty($this->filename)){
            $picture = $this->storage->setMinxer($this)->getFileName($this->filename,"origin");
            return $picture;
        }


        $filename = 'assets/units/unit'.$this->id.'.png';
        $picture =  FILEPATH.$filename;

        if(is_file($picture)){
            return  base_url().'media/'.$filename;
        }else{
            return  base_url().'media/assets/units/defaultunit.png';
        }

    }



    public function getUnitList($user,$course_id=1,$level_id=0){
//        $units = $this->db->select('id')->where("level_id",$level_id)
//            ->where("status",1)
//            ->where("course_id",$course_id)->get("units")->result();
        if($user->id == 53){
            $units = $this->db->select('id')->where("level_id",$level_id)
                ->where("course_id",$course_id)->get("units")->result();
        }else{
            $units = $this->db->select('id')->where("level_id",$level_id)
                ->where("status",1)
                ->where("course_id",$course_id)->get("units")->result();
        }
        $result = array();
        foreach($units as $unit){
            $result[] = $this->getUnit($unit->id)->getUnitInfo($user,$course_id);
        }
        $this->returncode['data'] = $result;
        return $this;
    }


    public function getUnitAllList($user,$course_id=1,$level_id=0){
        $units = $this->db->select('id')->where("level_id",$level_id)->where("course_id",$course_id)->get("units")->result();
        $result = array();
        foreach($units as $unit){
            $result[] = $this->getUnit($unit->id)->getUnitInfo($user,$course_id);
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function getUnitCount($course_id=1,$level_id=0){
        $units = $this->db->select("count(*) as num")->where("level_id",$level_id)->where("course_id",$course_id)->get("units")->row();
        return $units->num;
    }

    public function getTotalUnit(){
        $units = $this->db->select("count(*) as num")->get("units")->result();
        return $units->num;
    }

    public function getUnits($course_id=0){
        $units = $this->db->select('id')->where("course_id",$course_id)->get("units")->result();
        $result = array();
        foreach($units as $unit){
            $result[] = $this->getUnit($unit->id);
        }
        return $result;
    }

    public function getUnitsInfo($course_id=0,$user=null){
        $units = $this->db->select('id')->where("course_id",$course_id)->get("units")->result();
        $result = array();
        foreach($units as $unit){
            $unitItem = $this->getUnit($unit->id)->getUnitInfo();
            $unitItem['lessons'] = $this->lesson->getLessonList($user,$unit->id)->returncode['data'];
            $result[] = $unitItem;
        }
        return $result;
    }

    public function getUnitsMtInfo($course_id=0,$user=null){
        $units = $this->db->select('id')->where("course_id",$course_id)->get("units")->result();
        $result = array();
        foreach($units as $unit){
            $unitItem = $this->getUnit($unit->id)->getUnitInfo();
            // 获取Unit下面的MT lesson_id
            $lesson = $this->db->select('id')->where("type","test")->where("unit_id",$unit->id)->get("lessons")->row();
            if($lesson && $user){
                $this->recordmanager->user_id = $user->id;
                $unitItem['mt_score'] = $this->recordmanager->getUserMTScores((int)$lesson->id);
            }
            $result[] = $unitItem;
        }
        return $result;
    }

    public function getUnitsMtHistoryList($unit_id,$user=null){
        $lesson = $this->db->select('id')->where("type","test")->where("unit_id",$unit_id)->get("lessons")->row();
        if($lesson){
            $this->recordmanager->user_id = $user->id;
            return $this->recordmanager->getUserMTScoresList((int)$lesson->id);
        }
        return array();
    }

    public function  updateKey($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->where("id", $this->id);
            $this->db->update("units", $data);
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
            $this->db->insert("units", $data);
            return $this->db->insert_id();
        }
        return 0;
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


    public function syncUnitTemplate($unit_id=0){
        if($unit_id){
            $unit = $this->getUnit($unit_id);
            // 如果下面有lessons 所有将被删除
            if($unit->id != 0){
                $this->db->where("unit_id",$unit->id);
                $this->db->delete("lessons");
                $course_unit_template = $this->db->where("course_id",$unit->course_id)->order_by("id","asc")->get("units")->row();
                $lessons = $this->db->where("unit_id",$course_unit_template->id)->order_by("id","asc")->get("lessons")->result_array();
                foreach($lessons as $lesson){
                    $lesson['unit_id'] = $unit->id;
                    $orginLessonId =  $lesson['id'];
                    unset($lesson['id']);
                    $this->db->insert("lessons",$lesson);
                    $newLesson_id = $this->db->insert_id();
                    $lessonparts  = $this->db->where("lesson_id",$orginLessonId)
                        ->order_by("id","asc")
                        ->get("lessons_part")->result_array();
                    foreach($lessonparts as $lessonpart){
                        $lessonpart['lesson_id']     = $newLesson_id;
                        $lessonpart['file_id']       = 0;
                        $lessonpart['sync_origin_id']= 0;
                        $lessonpart['event_type_id'] = 0;
                        unset($lessonpart['id']);
                        $this->db->insert("lessons_part",$lessonpart);
                    }
                }
            }
        }
        return $this;
    }
}  
