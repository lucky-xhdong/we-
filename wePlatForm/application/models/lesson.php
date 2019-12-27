<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lesson extends CI_Model{


    public $objectType = 'lessons';
    public $type = 'lessons';

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
            'unit_id'             => array("require" => true),
            "createdTime"         => array("require" => false),
            "filename"            => array("require" => false),
            "type"                => array("require" => false),
            "description"         => array("require" => false),
            "update_time"         => array("require" => false),

        );
        parent::_initialize($config);
    }

    public function getLesson($id){
        $unit = new self;
        $data = $this->config['attributes'];
        $row = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("lessons")->row_array();
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

    public function initLessons($entitys = array()){
        $lessons = array();
        foreach($entitys as $entity){
            $lesson = new self;
            foreach($entity as $key=>$val){
                if(empty($val)) $val = "";
                $lesson->$key = $val;
            }
            $lessons[] = $lesson;
        }
        return $lessons;
    }

    public function getLessonInfo($user=null,$unit_id=0){
        $data = array(
            'id'              =>(int)$this->id,
            'name'            =>$this->name,
            'description'     =>$this->description,
            'accuracy'        => rand(0.1,1),
            'completion_rate' => 0,
            'scores'          => 0,
            'lessonLock'      => (bool)0,
            'testLock'        => (bool)0,
            'type'            =>$this->type,
            'picture_url'     => $this->getFileUrl(),
            'unit_id'         => $this->unit_id,
            "update_time"     =>$this->update_time,
            'zip_url'         => $this->getZipUrl(),
            'mt_score'         => 0

        );
        if($user && $unit_id){
            $auhtUnits = $this->courseauth->getUserLessonListChain($user,$unit_id);
            if(isset( $auhtUnits[$this->id])){
                $data['lessonLock'] = (bool)$auhtUnits[$this->id];
                $data['testLock'] = $auhtUnits[$this->id];
            }
            $this->recordmanager->user_id = $user->id;
            $this->recordmanager->lesson_id =$this->id;
            $data['accuracy']        =   $this->recordmanager->getMyCorrection();

            $data['completion_rate'] =   $this->recordmanager->getMyCompletion();
        }
        if($user ){
            // 查询本单元MT成绩
            $this->recordmanager->user_id = $user->id;
            $data["mt_score"] = $this->recordmanager->getUserMTScores((int)$this->id);
        }else{
            $data["mt_score"] = 0;
            $data['lessonLock'] = 1;
            $data['testLock'] =1;
        }
        if($user && $user->id == 53){
            $data['lessonLock'] = 0;
            $data['testLock'] =0;
        }
        $data["scores"]   = $data["mt_score"];
        $data['stars'] = 0;
//        if($user){
//            $lessonDetail = $this->getMyPartDetails($user,$this->id);
//            if(isset($lessonDetail['stars'])){
//                $data['stars']  =   $lessonDetail['stars'];
//            }
//        }
        return $data;
    }

    public function getZipUrl(){
        $filePath =  UPLOADFILEPATH.'lesson'.$this->id.'.zip';
        if(is_file($filePath)){
            return base_url().'/assets/lesson'.$this->id.'.zip';
        }else{
            $filePath = FILEPATH.'assets/lessons/lesson'.$this->id.'.zip';
            if(is_file($filePath)) return  base_url().'media/assets/lessons/lesson'.$this->id.'.zip';
            else return "";
        }

    }


    public function getMyPartDetails($user=null,$lesson_id=0){
        $result = array();
        if($user){
            $this->recordmanager->user_id = $user->id;
            $this->recordmanager->lesson_id = $lesson_id;

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

        $filename = 'assets/lessons/'.strtolower(str_replace(" ","",$this->name)).$this->id.'.png';
        $picture =  FILEPATH.$filename;


        if(is_file($picture)){
            return  base_url().'media/'.$filename;
        }else{
            return  base_url().'media/assets/lessons/defaultlesson.png';
        }


        //$picture =  UPLOADFILEPATH.'lessons/'.strtolower(str_replace(" ","",$this->name)).$this->id.'.png';


    }

    public function  updateKey($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->where("id", $this->id);
            $this->db->update("lessons", $data);
        }
        return true;
    }


    public function  saveLesson($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->insert("lessons", $data);
            return $this->db->insert_id();
        }
        return 0;
    }


    public function getLessonList($user=null,$unit_id=0){
        if($user && $user->id == 0) $user=null;
        $lessons = $this->db->select('id')->where("unit_id",(int)$unit_id)->where("status",1)->get("lessons")->result();
        $result = array();
        foreach($lessons as $lesson){
            $result[] = $this->getLesson($lesson->id)->getLessonInfo($user,$unit_id);
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function getLessonCount($unit_id=0){
        $lesson = $this->db->select("count(*) as num")->where("unit_id",(int)$unit_id)->get("lessons")->row();
        return $lesson->num;
    }

    public function getLessons($unit_id=0){
        $lessons = $this->db->select('id')->where("unit_id",(int)$unit_id)->get("lessons")->result();
        $result = $this->initLessons($lessons);
        return $result;
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
}  
