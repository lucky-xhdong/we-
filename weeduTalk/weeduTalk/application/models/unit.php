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
            "status"            => array("require" => false),
            "qr_filename"            => array("require" => false),


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

    public function  getUnitDetail($user,$course_id,$unit_id,$publishing_house_id=0){
        $unit = $this->getUnit($unit_id);
        if($unit->id !=0 && $course_id == $unit->course_id){
            //获取对应course数据
            $auhtUnits = $this->courseauth->getUserUintListChain($user,$course_id);

            if(isset( $auhtUnits[$unit_id]) && $auhtUnits[$unit_id] == 0){
                $course = $this->db->select('*')->where("id",$unit->course_id)->get("courses")->row();
                if($course){
                    //从这获取真实的教材版本名称
                    if($publishing_house_id != 0 ){
                        $publishing_house_course = $this->db
                            ->where("publishing_house_id",$publishing_house_id)
                            ->where("unit_id",$unit->id)->get("publishing_house_course_units")->row();
                        if($publishing_house_course){
                            $course->unit_id =$unit_id;
                            $course->course_id = $course->id;
                            $course->unitName =$publishing_house_course->name;
                        }else{
                            $course->unit_id =$unit_id;
                            $course->course_id = $course->id;
                            $course->unitName =$unit->name;
                        }
                        $this->returncode['data'] = $course;
                    }else{
                        $this->returncode['errcode'] = 2000005;
                        $this->returncode['errdesc'] = "您没有权限访问此内容,或者内容已经被删除!";
                    }
                }else{
                    $this->returncode['errcode'] = 2000005;
                    $this->returncode['errdesc'] = "您没有权限访问此内容,或者内容已经被删除!";
                }
            }else{
                $this->returncode['errcode'] = 2000004;
                $this->returncode['errdesc'] = "您没有权限访问此内容,单元未解锁!";
            }
        }else{
            $this->returncode['errcode'] = 2000003;
            $this->returncode['errdesc'] = "数据不存在,请确认后再试!";
        }
        return $this;
    }

    public function getUnitObject($unititem){
        $unit = new self;
        if(isset($unititem->id)){
            $unit->id           = $unititem->id;
            $unit->name          = $unititem->name;
            $unit->description  = $unititem->description;
            $unit->course_id    = $unititem->course_id;
            $unit->status       = $unititem->status;
            $unit->title        = $unititem->title;
            $unit->filename        = $unititem->filename;
            $unit->qr_filename        = $unititem->qr_filename;



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
            'accuracy'          =>  0,
            'completion_rate'   =>  0,
            'scores'            =>  0,
            'unitLock'          =>  $unitLock,
            'testLock'          =>  $testLock,
            'picture_url'       =>  $this->getFileUrl(),
            "qrcode_url"        => $this->getQrcodeUrl()
        );

        if($user){
//            $this->recordmanager->user_id = $user->id;
//            $this->recordmanager->unit_id = 0;
//            $this->recordmanager->part_id = 0;
//            $data['scores'] = $this->recordmanager->getUserMTScores((int)$lesson->id);

            $auhtUnit = $this->courseauth->getUserUintRowChain($user,(int)$this->id);
            if($auhtUnit){
                if($user->user_type == "teacher"){
                    $data['unitLock'] =false;
                    $data['testLock'] = false;
                }else{
                    $data['unitLock'] = (bool)$auhtUnit->islock;
                    $data['testLock'] = (bool)$auhtUnit->islock;
                }

//                if(empty($auhtUnit->calculate_date) || ( !empty($auhtUnit->calculate_date) && ((time()-strtotime($auhtUnit->calculate_date)) > 10*60 ))){
//                    $this->recordmanager->initialize()->user_id = $user->id;
//                    $this->recordmanager->unit_id = $this->id;
//                    $data['accuracy']        =   $this->recordmanager->getMyCorrection();
//
//                    $this->recordmanager->initialize()->user_id = $user->id;
//                    $this->recordmanager->unit_id = $this->id;
//                    $data['completion_rate'] =   $this->recordmanager->getMyCompletion();
//                    if($data['accuracy'] >=1) $data['accuracy'] = 1;
//                    if($data['completion_rate'] >= 1)  $data['completion_rate'] = 1;
//
//                    $lesson = $this->db->select('id')->where("type","test")->where("unit_id",$this->id)->get("lessons")->row();
//                    if($lesson){
//                        $this->recordmanager->user_id = $user->id;
//                        $this->recordmanager->unit_id = $this->id;
//                        $this->recordmanager->part_id = 0;
//                        $data["mt_score"] = $this->recordmanager->getUserMTScores((int)$lesson->id);
//                    }else{
//                        $data["mt_score"] = 0;
//                    }
//
//                    $data['scores'] = (int)$data["mt_score"];
//                    $this->db->where("id",$auhtUnit->id)->update("user_relation_course_unit",array(
//                        "accuracy"=>$data['accuracy'],
//                        "completion_rate"=>$data['completion_rate'],
//                        "mt_score"=>$data["mt_score"],
//                        "calculate_date"=>date("Y-m-d H:i:s")
//                    ));
//
//                }else{
                $data["mt_score"] =(int)$auhtUnit->mt_score;
                $data['completion_rate']=round($auhtUnit->completion_rate,2);
                $data['accuracy']  =round($auhtUnit->accuracy,2);
                $data['scores'] = (int)$auhtUnit->mt_score;
                //}
            }
        }
        $data['completion_rate']=round($data['completion_rate'],2);
        $data['accuracy']  =round($data['accuracy'],2);
        $get = $this->input->get();
        if( $get['device_platform'] == "android" ){
            $data['unitLock'] =(int)$data['unitLock'];
            $data['testLock'] = (int)$data['testLock'];;
        }
        if($user){


//            $auhtUnits = $this->courseauth->getUserUintListChain($user,$this->course_id);
//            echo "<pre>";
//            print_r($auhtUnits);
//            echo "</pre>";
//            if(isset( $auhtUnits[$this->id])){
//                $data['unitLock'] = (bool)$auhtUnits[$this->id];
//                $data['testLock'] = (bool)$auhtUnits[$this->id];
//            }
//            $this->recordmanager->initialize()->user_id = $user->id;
//            $this->recordmanager->unit_id = $this->id;
//            $data['completion_rate'] =     $this->recordmanager->getMyCompletion();
//
//            $this->recordmanager->initialize()->user_id = $user->id;
//            $this->recordmanager->unit_id = $this->id;
//            $data['accuracy']        =   round($this->recordmanager->getMyCorrection(),2);
        }
        if($data['accuracy'] >=1) $data['accuracy'] = 1;
        if($data['completion_rate'] >= 1)  $data['completion_rate'] = 1;
        if($user && $user->id == 53){
            $data['unitLock'] = 0;
            $data['testLock'] =0;
        }
        $data['stars'] = 0;
        // echo $user->username;
        if($user){
            if($data['completion_rate'] >=0.3 && $data['completion_rate'] <=0.49){
                $data['stars'] = 1;
            }else if($data['completion_rate'] >=0.5 && $data['completion_rate'] <=0.79){
                $data['stars'] = 2;
            }else if($data['completion_rate'] >=0.8){
                $data['stars'] = 3;
            }
//            $lessonDetail = $this->getMyPartDetails($user,$this->id);
//            if(isset($lessonDetail['stars'])){
//                $data['stars']  =   $lessonDetail['stars'];
//            }
        }
        return $data;
    }


    public function calculateUnit($user= null){
        if($user) {
            $auhtUnit = $this->courseauth->getUserUintRowChain($user, (int)$this->id);
            if ($auhtUnit) {
                $this->recordmanager->initialize()->user_id = $user->id;
                $this->recordmanager->unit_id = $this->id;
                $data['accuracy'] = $this->recordmanager->getMyCorrection();
                $this->recordmanager->initialize()->user_id = $user->id;
                $this->recordmanager->unit_id = $this->id;
                $data['completion_rate'] = $this->recordmanager->getMyCompletion();
                if ($data['accuracy'] >= 1) $data['accuracy'] = 1;
                if ($data['completion_rate'] >= 1) $data['completion_rate'] = 1;
                $lesson = $this->db->select('id')->where("type", "test")->where("unit_id", $this->id)->get("lessons")->row();
                if ($lesson) {
                    $this->recordmanager->user_id = $user->id;
                    $this->recordmanager->unit_id = $this->id;
                    $this->recordmanager->part_id = 0;
                    $data["mt_score"] = $this->recordmanager->getUserMTScores((int)$lesson->id);
                } else {
                    $data["mt_score"] = 0;
                }
                $data['scores'] = (int)$data["mt_score"];
                $this->db->where("id", $auhtUnit->id)->update("user_relation_course_unit", array(
                    "accuracy" => $data['accuracy'],
                    "completion_rate" => $data['completion_rate'],
                    "mt_score" => $data["mt_score"],
                    "calculate_date" => date("Y-m-d H:i:s")
                ));
            }
        }
        return true;
    }

    public function getMyPartDetails($user=null,$unit_id=0){
        $result = array();
        if($user){
            $this->recordmanager->user_id = $user->id;
            $this->recordmanager->unit_id = $unit_id;

            $end_time       = date('Y-m-d');
            $this->recordmanager->start_time = date('Y-m-d',strtotime($end_time. '-14 days'));;
            $this->recordmanager->end_time   =$end_time;
            $StudyReuslt            =   sprintf("%.2f",$this->recordmanager->getUserStudyReuslt()*100); //学习效果
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
            }else if($StudyReuslt > 14 && $StudyReuslt <16){
                $scores = 2;
                $StudyReusltString = "学习效果良好.";
                $study_tips  = "请继续按照教师要求，确保课程的完成率达标，提高答题的正确率和达标率，及时复习，提高MT的正确率和得分，提高学习得分.";
            }else if($StudyReuslt >= 16){
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
            $course = $this->getUnitCourse();
            if($course){
                if($course->type == "primary_school"){
                    return  base_url().'media/assets/units/defaultunitprimary.png';
                }
            }
            return  base_url().'media/assets/units/defaultunit.png';
        }

    }

    public function getQrcodeUrl(){
        if(!empty($this->qr_filename)){
            $picture =  UPLOADFILEPATH.'/qrcode/'.$this->qr_filename;
            if(is_file($picture)){
                return  base_url().'assets/qrcode/'.$this->qr_filename;
            }
        }
        return "";

    }

    public function getUnitCourse(){
        return $this->db->select('*')->where("id",$this->course_id)->get("courses")->row();
    }


    public function getUnitList($user,$course_id=1,$level_id=0){
//        $units = $this->db->select('id')->where("level_id",$level_id)
//            ->where("status",1)
//            ->where("course_id",$course_id)->get("units")->result();
        if($user->id == 53){
            $units = $this->db->select('id')->where("level_id",$level_id)
                ->where("course_id",$course_id)->order_by("sort","asc")->get("units")->result();
        }else{
            $units = $this->db->select('id')->where("level_id",$level_id)
                ->where("status",1)
                ->where("course_id",$course_id)->order_by("sort","asc")->get("units")->result();
        }
        $result = array();
        foreach($units as $unit){
            $result[] = $this->getUnit($unit->id)->getUnitInfo($user,$course_id);
        }
        $this->returncode['data'] = $result;
        return $this;
    }


    public function getUnitAllList($user,$course_id=1,$level_id=0){
        $units = $this->db->select('id')->where("level_id",$level_id)->where("course_id",$course_id)->order_by("sort","asc")->get("units")->result();
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
        $units = $this->db->select('id')->where("course_id",$course_id)->order_by("sort","asc")->get("units")->result();
        $result = array();
        foreach($units as $unit){
            $result[] = $this->getUnit($unit->id);
        }
        return $result;
    }

    public function getUnitsInfo($course_id=0,$user=null){
        $units = $this->db->select('id')->where("course_id",$course_id)->order_by("sort","asc")->get("units")->result();
        $result = array();
        foreach($units as $unit){
            $unitItem = $this->getUnit($unit->id)->getUnitInfo();
            $unitItem['lessons'] = $this->lesson->getLessonList($user,$unit->id)->returncode['data'];
            $result[] = $unitItem;
        }
        return $result;
    }


    public function getAdminUnitsInfo($course_id=0,$user=null,$level_id=0){
        $units = $this->db->select('id')->where("course_id",$course_id)->where("level_id",$level_id)->order_by("sort","asc")->get("units")->result();
        $result = array();
        foreach($units as $unit){
            $unitItem = $this->getUnit($unit->id)->getUnitInfo();
            $unitItem['lessons'] = $this->lesson->getLessonList($user,$unit->id)->returncode['data'];
            $result[] = $unitItem;
        }
        return $result;
    }

    public function getUnitsMtInfo($course_id=0,$user=null){
        $units = $this->db->select('id')->where("course_id",$course_id)->order_by("sort","asc")->get("units")->result();
        $result = array();
        foreach($units as $unit){
            $unitItem = $this->getUnit($unit->id)->getUnitInfo();
            $unitItem['mt_score'] = 0;
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


    public function getPublishUnitsMtInfo($course_id=0,$user=null){
        $units = $this->db->select('id')->where("course_id",$course_id)->order_by("sort","asc")->get("units")->result();
        $result = array();
        foreach($units as $unit){
            $unitItem = $this->getUnit($unit->id)->getUnitInfo();
            $unitItem['mt_score'] = 0;
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
        if($lesson){ $this->recordmanager->user_id = $user->id;
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
                $course = $this->db->where("id",$unit->course_id)->get("courses")->row();
                if($course->type == "high_school"){
                    $course_unit_template = $this->db->where("id",42)->get("units")->row();
                }else{
                    $course_unit_template = $this->db->where("course_id",$unit->course_id)->order_by("id","asc")->get("units")->row();
                }
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


    public function syncUnitALLTemplateContent($unit_id=0){
        if($unit_id){
            $unitItem = $this->getUnit($unit_id);
            // 如果下面有lessons 所有将被删除
            if($unitItem->id != 0){
                //复制unit
                $unit_array = $this->db->where("id",$unitItem->id)->get("units")->row_array();
                if($unit_array){
                    unset($unit_array["id"]);
                    $unit_array["name"]   =  $unit_array["name"].'-COPY';
                    $this->db->insert("units",$unit_array);
                    $unit = $this->db->where("id",$this->db->insert_id())->get("units")->row();
                    if(!$unit) return false;
                }

                $lessons = $this->db->where("unit_id",$unitItem->id)->order_by("id","asc")->get("lessons")->result_array();
                foreach($lessons as $lesson){
                    $lesson['unit_id'] = $unit->id;
                    $orginLessonId =  $lesson['id'];
                    unset($lesson['id']);
                    $this->db->insert("lessons",$lesson);
                    $newLesson_id = $this->db->insert_id();
                    $lessonparts  = $this->db->where("lesson_id",$orginLessonId)
                        ->order_by("id","asc")
                        ->get("lessons_part")->result_array();
                    $source  = UPLOADFILEPATH.'lesson/n'.$orginLessonId;
                    if(is_dir($source)){
                        $dest   = UPLOADFILEPATH.'lesson/n'.$newLesson_id;
                        $this->copydir($source,$dest);
                    }
                    //copy 资源库索引
                    $files  = $this->db
                        ->select('*')
                        ->where('object_type',"lesson")
                        ->where("object_id",$orginLessonId)->get("files")->result_array();
                    foreach($files as $file){
                        unset($file['id']);
                        $file['object_id'] = $newLesson_id;
                        $this->db->insert("files",$file);
                    }

                    foreach($lessonparts as $lessonpart){
                        $lessonpart['lesson_id']     = $newLesson_id;
                        $lessonpart['file_id']       = 0;
                        $lessonpart['sync_origin_id']= 0;
                        $lessonpart['event_type_id'] = 0;
                        $oldpartid = $lessonpart['id'];
                        unset($lessonpart['id']);
                        $this->db->insert("lessons_part",$lessonpart);
                        $part = $this->db->where("id",$this->db->insert_id())->get("lessons_part")->row();
                        $this->event->syncAllEvents($part,$oldpartid);
                    }
                }
            }
        }
        return $this;
    }

    /**
     * 复制文件夹
     * @param $source
     * @param $dest
     */
    public function copydir($source, $dest)
    {
        if (!file_exists($dest)) mkdir($dest);
        $handle = opendir($source);
        while (($item = readdir($handle)) !== false) {
            if ($item == '.' || $item == '..') continue;
            $_source = $source . '/' . $item;
            $_dest = $dest . '/' . $item;
            if (is_file($_source)) copy($_source, $_dest);
            if (is_dir($_source)) copydir($_source, $_dest);
        }
        closedir($handle);
    }

    public function delete($unit_id=0){
        $unit = $this->getUnit($unit_id);
        if($unit->id != 0){
            $this->lesson->deleteLessons($unit->id);
            $this->db->where("id",$unit->id);
            $this->db->delete("units");
        }
        return $this;
    }
}  
