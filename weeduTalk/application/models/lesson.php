<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lesson extends CI_Model{


    public $objectType = 'lessons';
    public $type = 'lessons';

    public     $table_user_record = "users_record";

    public $partitions = array(
        "2018-04"=>"p0",
        "2018-05"=>"p1",
        "2018-06"=>"p2",
        "2018-07"=>"p3",
        "2018-08"=>"p4",
        "2018-09"=>"p5",
        "2018-10"=>"p6",
        "2018-11"=>"p7",
        "2018-12"=>"p8",
        "2019-01"=>"p9",
        "2019-02"=>"p10",
        "2019-03"=>"p11",
        "2019-04"=>"p12",
        "2019-05"=>"p13",
        "2019-06"=>"p14",
        "2019-07"=>"p15",
        "2019-08"=>"p16",
        "2019-09"=>"p17",
        "2019-10"=>"p18",
        "2019-11"=>"p19",
        "2019-12"=>"p20",
        "2020-01"=>"p21",
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->library('oss');
        $this->_initialize();
        $this->table_user_record =  $this->table_user_record.' '.'PARTITION('.implode(",",$this->getPartitions()).')';

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
            "status"            => array("require" => false),

        );
        parent::_initialize($config);
    }


    public function getPartitions(){
        $date = date("Y-m");
        $partitions = array();
        foreach($this->partitions as $key=> $partition){
            if($key <=  $date){
                $partitions[] = $partition;
            }else{
                break;
            }
        }
        return $partitions;
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

    public function getLessonObject($lessonitem){
        $lesson = new self;
        if(isset($lessonitem->id)){
            $lesson->id           = $lessonitem->id;
            $lesson->name          = $lessonitem->name;
            $lesson->description  = $lessonitem->description;
            $lesson->status       = $lessonitem->status;
            $lesson->type        = $lessonitem->type;
            $lesson->filename       = $lessonitem->filename;
            $lesson->unit_id       = $lessonitem->unit_id;
            $lesson->update_time       = $lessonitem->update_time;

        }
        return $lesson;
    }

    public function getLessonInfo($user=null,$unit_id=0){
        $data = array(
            'id'              =>(int)$this->id,
            'name'            =>$this->name,
            'description'     =>$this->description,
            'accuracy'        => 0,
            'completion_rate' => 0,
            'scores'          => 0,
            'lessonLock'      => (bool)0,
            'testLock'        => (bool)0,
            'type'            =>$this->type,
            'picture_url'     => $this->getFileUrl(),
            'unit_id'         => $this->unit_id,
            "update_time"     =>$this->update_time,
            'zip_url'         => $this->getZipUrl(),
            'mt_score'         => 0,
            'status'            =>  $this->status,
            "object_key"       =>"assets/lesson".$this->id.'.zip',
//            "zip_url"       => $this->oss->createSignUrl("assets/lesson".$this->id.'.zip')

        );
        if(empty($this->update_time)){
            $data['update_time'] = date("Y-m-d H:i:s");
            $this->updateKey(array("update_time"=> $data['update_time'],"createdTime"=> $data['update_time']));
        }

        $get = $this->input->get();
        if(isset($get['school_key']) && !empty($get['school_key'])){
            //  $data['update_time'] = "2018-03-02 06:04:02";
        }
        if(isset($get['app_version']) && $get['app_version'] >= "1.0.3"){
            if($user && $user->id == 53){
                $data['zip_url'] = $this->oss->createSignUrlNewWeSpeak("assets/lesson".$this->id.'.zip');
            }else{
                $data['zip_url'] = $this->oss->createSignUrlWeSpeak("assets/lesson".$this->id.'.zip');
            }

        }

        if($user){
//            $auhtUnits = $this->courseauth->getUserLessonListChain($user,$unit_id);
//            if(isset( $auhtUnits[$this->id])){
//                $data['lessonLock'] = (bool)$auhtUnits[$this->id];
//                $data['testLock'] = (bool)$auhtUnits[$this->id];
//            }
//            $this->recordmanager->initialize()->user_id = $user->id;
//            $this->recordmanager->lesson_id =$this->id;
//            $data['accuracy']        =   $this->recordmanager->getMyCorrection();
//            $this->recordmanager->initialize()->user_id = $user->id;
//            $this->recordmanager->lesson_id =$this->id;
//            $data['completion_rate'] =   $this->recordmanager->getMyCompletion();
//            if($data['accuracy'] >100) $data['accuracy'] = 100;
//            if($data['completion_rate'] > 100){
//                $data['completion_rate']= 100;
//            }

            if($user){

                $auhtUnit= $this->courseauth->getUserLessonRowChain($user,$this->id);
                if($auhtUnit){
                    if($user->user_type == "teacher"){
                        $data['lessonLock'] =false;
                        $data['testLock'] = false;
                    }else{
                        $data['lessonLock'] = (bool)$auhtUnit->islock;
                        $data['testLock'] = (bool)$auhtUnit->islock;
                    }




//                    if(empty($auhtUnit->calculate_date) && empty($auhtUnit->accuracy) && empty($auhtUnit->completion_rate)  && $this->unit_id < 123){
//                        $this->recordmanager->initialize()->user_id = $user->id;
//                        $this->recordmanager->lesson_id =$this->id;
//                        $data['accuracy']        =   $this->recordmanager->getMyCorrection();
//
//                        $this->recordmanager->initialize()->user_id = $user->id;
//
//                        $this->recordmanager->lesson_id =$this->id;
//                        $data['completion_rate'] =   $this->recordmanager->getMyCompletion();
//                        if($data['accuracy'] >=1) $data['accuracy'] = 1;
//                        if($data['completion_rate'] >= 1)  $data['completion_rate'] = 1;
//
//                        $this->recordmanager->user_id = $user->id;
//                        $this->recordmanager->lesson_id =$this->id;
//                        if($this->type == "test"){
//                            $data["mt_score"] = $this->recordmanager->getUserMTScores((int)$this->id);
//                            $auhtTrueUnit = $this->courseauth->getUserUintRowChain($user,(int)$this->unit_id);
//                            if($auhtTrueUnit && $auhtTrueUnit->mt_score != $data["mt_score"]){
//                                $this->db->where("id",$auhtTrueUnit->id)->update("user_relation_course_unit",array(
//                                    "mt_score"=>$data["mt_score"],
//                                    "calculate_date"=>date("Y-m-d H:i:s")
//                                ));
//                            }
//
//                        }else{
//                            $data["mt_score"] = 0;
//                        }
//
//
//                        $this->db->where("id",$auhtUnit->id)->update("user_relation_unit_lesson",array(
//                            "accuracy"=>$data['accuracy'],
//                            "completion_rate"=>$data['completion_rate'],
//                            "mt_score"=>$data["mt_score"],
//                            "calculate_date"=>date("Y-m-d H:i:s")
//                        ));
//
//                    }else
                    $hour = date("H");

                    //  if( $hour <= 18 && $hour >=22 && (empty($auhtUnit->calculate_date)  || ( !empty($auhtUnit->calculate_date) && ((time()-strtotime($auhtUnit->calculate_date)) > 10*60 )))) {
                    if((empty($auhtUnit->calculate_date)  || ( !empty($auhtUnit->calculate_date) && ((time()-strtotime($auhtUnit->calculate_date)) > 10*60 )))) {

                        $parts = $this->db->select("id")->where("lesson_id",$this->id)
                            ->where("status",1)->get("lessons_part")->result();
                        if($parts){
                            $count =  $this->db->select("id")
                                ->where("user_id",$user->id)
                                ->where_in("part_id",$this->toIdArray($parts))
                                ->limit(1)
                                ->get($this->table_user_record)->row();
                        }else{
                            $count = false;
                        }



                        if($count){
                            $this->recordmanager->initialize()->user_id = $user->id;
                            $this->recordmanager->lesson_id =$this->id;
                            $data['accuracy']        =   $this->recordmanager->getMyCorrection();

                            $this->recordmanager->initialize()->user_id = $user->id;

                            $this->recordmanager->lesson_id =$this->id;
                            $data['completion_rate'] =   $this->recordmanager->getMyCompletion();
                            if($data['accuracy'] >=1) $data['accuracy'] = 1;
                            if($data['completion_rate'] >= 1)  $data['completion_rate'] = 1;

                            $this->recordmanager->user_id = $user->id;
                            $this->recordmanager->lesson_id =$this->id;
                            if($this->type == "test"){
                                $data["mt_score"] = $this->recordmanager->getUserMTScores((int)$this->id);
                                $auhtTrueUnit = $this->courseauth->getUserUintRowChain($user,(int)$this->unit_id);
                                if($auhtTrueUnit && $auhtTrueUnit->mt_score != $data["mt_score"]){
                                    $this->db->where("id",$auhtTrueUnit->id)->update("user_relation_course_unit",array(
                                        "mt_score"=>$data["mt_score"],
                                        "calculate_date"=>date("Y-m-d H:i:s")
                                    ));
                                }

                            }else{
                                $data["mt_score"] = 0;
                            }

                            $this->db->where("id",$auhtUnit->id)->update("user_relation_unit_lesson",array(
                                "accuracy"=>$data['accuracy'],
                                "completion_rate"=>$data['completion_rate'],
                                "mt_score"=>$data["mt_score"],
                                "calculate_date"=>date("Y-m-d H:i:s")
                            ));
                        }else{
                            $data["mt_score"] =(int)$auhtUnit->mt_score;
                            $data['completion_rate']=round($auhtUnit->completion_rate,2);
                            $data['accuracy']  =round($auhtUnit->accuracy,2);
                        }

                    }else{
                        $data["mt_score"] =(int)$auhtUnit->mt_score;
                        $data['completion_rate']=round($auhtUnit->completion_rate,2);
                        $data['accuracy']  =round($auhtUnit->accuracy,2);
                    }

                }
            }
        }
//        if($user ){
//            // 查询本单元MT成绩
//            $this->recordmanager->user_id = $user->id;
//            $data["mt_score"] = $this->recordmanager->getUserMTScores((int)$this->id);
//        }else{
//            $data["mt_score"] = 0;
//            $data['lessonLock'] = true;
//            $data['testLock'] =true;
//        }
        $data['completion_rate']=round($data['completion_rate'],2);
        $data['accuracy']  =round($data['accuracy'],2);


        if($this->name == "Vocabulary"){
            //  $data['lessonLock'] = 1;
        }
        if($user && $user->id == 53){
            $data['lessonLock'] = false;
            $data['testLock'] =false;
        }
        $get = $this->input->get();
        if( $get['device_platform'] == "android" ){
            $data['lessonLock'] =(int)$data['lessonLock'];
            $data['testLock'] = (int)$data['testLock'];;
        }

        if($data['accuracy'] >1)  $data['accuracy'] = 1;
        if($data['completion_rate'] >1)  $data['completion_rate'] = 1;
        $data["scores"]   = $data["mt_score"];
        if( $data['scores'] > 100) $data['scores']  = 100;
        if( $data['mt_score'] > 100) $data['mt_score']  = 100;
        $data['stars'] = 0;
//        if($user){
//            $lessonDetail = $this->getMyPartDetails($user,$this->id);
//            if(isset($lessonDetail['stars'])){
//                $data['stars']  =   $lessonDetail['stars'];
//            }
//        }
        return $data;
    }


    public function getLessonLearningTimeInfo($user=null,$date){
        $data = array(
            'id'              =>(int)$this->id,
            'name'            =>$this->name,
        );

        if($user){
            $this->recordmanager->initialize()->user_id = $user->id;
            $this->recordmanager->lesson_id =$this->id;
            $timeRecord =  $this->recordmanager->getMyTimeData($date);
            if($timeRecord){
                $data['LearningTime']        =  $timeRecord;
            }else{
                $data['LearningTime']   = 0;
            }
        }else{
            $data['LearningTime'] = 0;
        }
        $parts = $this->db->select("id,name")->where("lesson_id",$this->id)
            ->where("status",1)->get("lessons_part")->result();
        foreach ($parts as $part){
            $this->recordmanager->initialize()->user_id = $user->id;
            $this->recordmanager->part_id =$part->id;
            $timeRecord =  $this->recordmanager->getMyTimeData($date);

            if($timeRecord){
                $part->LearningTime        =  $timeRecord;
            }else{
                $part->LearningTime    = 0;
            }
        }

        $data['parts'] = $parts;


        return $data;
    }

    public function calculateLesson($user=null){
        if($user){
            $auhtUnit= $this->courseauth->getUserLessonRowChain($user,$this->id);
            if($auhtUnit){
                $this->recordmanager->initialize()->user_id = $user->id;
                $this->recordmanager->lesson_id =$this->id;
                $data['accuracy']        =   $this->recordmanager->getMyCorrection();

                $this->recordmanager->initialize()->user_id = $user->id;

                $this->recordmanager->lesson_id =$this->id;
                $data['completion_rate'] =   $this->recordmanager->getMyCompletion();
                if($data['accuracy'] >=1) $data['accuracy'] = 1;
                if($data['completion_rate'] >= 1)  $data['completion_rate'] = 1;

                $this->recordmanager->user_id = $user->id;
                $this->recordmanager->lesson_id =$this->id;
                if($this->type == "test"){
                    $data["mt_score"] = $this->recordmanager->getUserMTScores((int)$this->id);
                    $auhtTrueUnit = $this->courseauth->getUserUintRowChain($user,(int)$this->unit_id);
                    if($auhtTrueUnit && $auhtTrueUnit->mt_score != $data["mt_score"]){
                        $this->db->where("id",$auhtTrueUnit->id)->update("user_relation_course_unit",array(
                            "mt_score"=>$data["mt_score"],
                            "calculate_date"=>date("Y-m-d H:i:s")
                        ));
                    }

                }else{
                    $data["mt_score"] = 0;
                }


            }
        }
        return true;

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

    public function getLessonList($user=null,$unit_id=0,$flag=0){
        if($user && $user->id == 0) $user=null;
        if(($user && $user->id == 53) || $flag == 1){
            $lessons = $this->db->select('*')->where("unit_id",(int)$unit_id)->order_by("sort","asc")->get("lessons")->result();
        }else{
            $lessons = $this->db->select('*')->where("status",1)->where("unit_id",(int)$unit_id)->order_by("sort","asc")->get("lessons")->result();
        }

        $result = array();
        foreach($lessons as $lesson){
            $result[] = $this->getLessonObject($lesson)->getLessonInfo($user,$unit_id);
        }
        if($flag == 0){
            $course = $this->db->select("courses.type")
                ->join('courses','courses.id = units.course_id', 'left')
                ->where("units.id",(int)$unit_id)
                ->get("units")->row();
            if($course && $course->type == "middle_school_new"){
                $result[] =  $this->getLessonInfo2($unit_id);
            }

        }


        $this->returncode['data'] = $result;
        return $this;
    }



    public function getLessonInfo2($unit_id){
        $data = array(
            'id'              =>0,
            'name'            =>"Digital Portfolio",
            'description'     =>"储存Reading&Recap中Try by Yourself活动的练习记录(暂不包含其他活动)。",
            'accuracy'        => 0,
            'completion_rate' => 0,
            'scores'          => 0,
            'lessonLock'      => (bool)0,
            'testLock'        => (bool)0,
            'type'            =>"digital_portfolio",
            'picture_url'     =>base_url().'media/assets/lessons/digital_portfolio_new_2.png',
            'unit_id'         =>$unit_id,
            "update_time"     => date("Y-m-d H:i:s"),
            'zip_url'         => "",
            'mt_score'        => 0,
            'status'           => "",
            'stars'            => 3,
            "object_key"       =>"",

        );

        return $data;
    }


    public function getLessonLearningTimeList($user=null,$unit_id=0,$date){
        if($user && $user->id == 0) $user=null;
        $this->recordmanager->initialize()->user_id = $user->id;
        $this->recordmanager->initialize()->unit_id = $unit_id;
        $lessonOBJ =  $this->recordmanager->getMyDateStudyLessonsTimeData($date);
        $lessons = $this->db->select('*')->where_in("id",$this->toIdArray($lessonOBJ))->where("unit_id",(int)$unit_id)->order_by("sort","asc")->get("lessons")->result();
        $result = array();
        foreach($lessons as $lesson){
            $result[] = $this->getLessonObject($lesson)->getLessonLearningTimeInfo($user,$date);
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function getPtLessons($user=null){
        if($user && $user->id == 0) $user=null;
        $units = $this->db->where("course_id",3)->where("status",1)->get("units")->result();
        $lessons = $this->db->select('id')->where("status",1)->where_in("unit_id",$this->toIdArray($units))->where("type","test")->get("lessons")->result();
        $result = array();
        foreach($lessons as $lesson){
            $result[] = $this->getLesson($lesson->id)->getLessonInfo($user);
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function getLessonCount($unit_id=0){
        $lesson = $this->db->select("count(*) as num")->where("unit_id",(int)$unit_id)->get("lessons")->row();
        return $lesson->num;
    }

    public function getLessons($unit_id=0){
        $lessons = $this->db->select('id')->where("unit_id",(int)$unit_id)->order_by("sort","asc")->get("lessons")->result();
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

    public function deleteLessons($unit_id){
        $lessons = $this->db->select('id')->where("unit_id",(int)$unit_id)->get("lessons")->result();;
        $result = array();
        foreach($lessons as $lesson){
            $lessonItem = $this->getLesson($lesson->id);
            $lessonItem->delete($lesson->id);
        }

        $this->returncode['data'] = $result;
        return $this;
    }

    public function delete($lesson_id=0){
        $lesson = $this->getLesson($lesson_id);
        if($lesson->id != 0){
            $this->lessonpart->deleteLessonparts($lesson->id);
            $this->db->where("id",$lesson->id);
            $this->db->delete("lessons");
            //删除lesson下附件和关系
            $lesson->deleteFiles();
        }
        return $this;
    }

    public function deleteFiles(){
        $source  = UPLOADFILEPATH.'lesson/n'.$this->id;
        if(is_dir($source)){
            $this->rmdirs($source);
        }
        //copy 资源库索引
        $this->db
            ->where('object_type',"lesson")
            ->where("object_id",$this->id);
        $this->db ->delete("files");
        return true;
    }

    /**
     * 删除文件夹e41
     * @param $path
     * @return bool
     */
    public function rmdirs($path)
    {
        $handle = opendir($path);
        while (($item = readdir($handle)) !== false) {
            if ($item == '.' || $item == '..') continue;
            $_path = $path . '/' . $item;
            if (is_file($_path)) unlink($_path);
            if (is_dir($_path)) rmdirs($_path);
        }
        closedir($handle);
        return rmdir($path);
    }
}  
