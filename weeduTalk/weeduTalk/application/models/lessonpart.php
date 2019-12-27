<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessonpart extends CI_Model{

    public $objectType = 'parts';
    public $type = 'parts';

    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'              => array("require" => false),
            "name"            => array("require" => false),
            'lesson_id'       => array("require" => true),
            "description"     => array("require" => false),
            "filename"        => array("require" => false),
            "type"            => array("require" => false),
            "tips"            => array("require" => false),
            "total_items"     => array("require" => false),
            "background_file_name"  => array("require" => false),
            "total_time"      => array("require" => false),
            "part_type"       => array("require" => false),
            "tag_type"        => array("require" => false),
            "tag_name"        => array("require" => false),
            "part_script_type"=> array("require" => false),
            "media_filename"  => array("require" => false),
            "media_type"      => array("require" => false),
            "totalTime"       => array("require" => false),
            "have_questions"  => array("require" => false),
            "questions_type"  => array("require" => false),
            "unit_id"         => array("require" => false),
            "keywords"        => array("require" => false),
            "file_id"         => array("require" => false),
            "sync_origin_id"  => array("require" => false),
            "event_type_id"   => array("require" => false),
            "content_totalcount"    => array("require" => false),
            "content_perpage"       => array("require" => false),
            "content_perPageCount"  => array("require" => false),
            "select_items_1"        => array("require" => false),
            "select_items_2"        => array("require" => false),
            "select_items_3"        => array("require" => false),
            "sr_category"           => array("require" => false),
            "back_file_id"          => array("require" => false),
            "eng"                   => array("require" => false),
            "status"                => array("require" => false),
            "weight"                => array("require" => false),
        );
        parent::_initialize($config);
    }

    public function getLessonpart($id){
        $unit = new self;
        $data = $this->config['attributes'];
        $row = $this->db->select(implode(',',array_keys($data)))
            ->where("id",$id)
            ->get("lessons_part")
            ->row_array();
        if($row){
            foreach($row as $key=>$val){
                if(empty($val)) $val = "";
                $unit->$key = $val;
            }
        }else{
            $unit->id = 0;
            $unit->total_items = 0;
        }
        return $unit;
    }

    public function getLessonpartInfo($user=null){
        $data = array(
            'id'              => (int)$this->id,
            'lesson_id'              => (int)$this->lesson_id,
            'name'            => $this->name,
            'part_type'            => $this->part_type,
            'accuracy'        => rand(0.1,1),
            'completion_rate' => 0,
            'scores'          => rand(0,100),
            'partLock'        => (bool)0,
            'testLock'        => (bool)0,
            'description'     => $this->description,
            'picture_url'     => $this->getFileUrl(),
            'background_picture_url'     => $this->getBackGroundFileUrl(),
            'type'            => $this->type,
            "tips"            => $this->tips,
            'zip_url'         => base_url().'media/assets/parts/part'.$this->id.'.zip',
            'background_url'  => base_url().'media/assets/parts/'.$this->part_type.'.png',
            "tag_type"        => $this->tag_type,
            "tag_name"        => $this->tag_name,
            "media_files"     => $this->getMediaFileList(),
            "event_count"     => $this->getEventCount(),
            "sync_origin_id"  =>  $this->sync_origin_id,
            "event_type_id"   => $this->event_type_id,
            "content_totalcount"   => $this->content_totalcount,
            "content_perpage"       => $this->content_perpage,
            "content_perPageCount"   =>$this->content_perPageCount,
            "select_items_1"    =>$this->select_items_1,
            "select_items_2"    => $this->select_items_2,
            "select_items_3"    =>$this->select_items_3,
            "sr_category" =>$this->sr_category,
            'status'            =>  $this->status,
        );
        if($user){
            $this->recordmanager->initialize()->user_id = $user->id;
            $this->recordmanager->part_id =$this->id;
            $data['accuracy']        =   $this->recordmanager->getMyCorrection();
            $data['completion_rate'] =   $this->recordmanager->getMyCompletion();
        }
        if($data['accuracy'] >=1) $data['accuracy'] = 1;
        if($data['completion_rate'] >= 1)  $data['completion_rate'] = 1;
        return $data;
    }

    public function getEventCount(){
        $event = $this->db->select("count(*) as num")->where("part_id",$this->id)->get("lessons_part_events")->row();
        return isset($event->num)?$event->num:0;
    }


    public function createJson($lesson,$course,$unit)
    {
        $filename = "";
        $filetype = "";
        if(!empty($this->file_id)){
            $file = $this->wetalkfile->getFile($this->file_id);
            if($file->id != 0){
                $filename = 'media/'.$file->filename;
                $filetype = $file->type;
            }
        }
        $this->real_file_name = $filename;
        $this->real_file_type = $filetype;
        $backGroundfilename = "";
        if(!empty($this->back_file_id)){
            $file = $this->wetalkfile->getFile($this->back_file_id);
            if($file->id != 0){
                $backGroundfilename = 'media/'.$file->filename;
            }
        }

        //$lesson = $this->db->select('unit_id')->where("id",(int)$this->lesson_id)->get("lessons")->row();
        $data = array(
            "unit_id"       =>   (int)$lesson->unit_id,
            "lesson_id"     =>   (int)$this->lesson_id,
            "part_id"       =>   (int)$this->id,
            "media_filename"=>   $filename,
            "background_file_url"=>$backGroundfilename,
            "sr_category"   =>   $this->sr_category,
            "media_type"    =>  $filetype,
            "totalTime"     =>  $this->totalTime,
            "part_type"        =>  $this->part_script_type,
            "part_script_type" =>  $this->part_type,
            "have_questions"=>  (bool)$this->have_questions,
            "questions_type"=>  $this->questions_type,
            "content_totalcount"    =>  (int)$this->content_totalcount,
            "content_perpage"       =>  (int)$this->content_perpage,
            "content_perPageCount"  =>  (int)$this->content_perPageCount,
            "keywords"      =>  explode(",",$this->keywords),
            "eng"           => (int)$this->eng

        );
        if(empty($data['media_type'])){
            $data['media_type'] = "audio";
        }
//        if($lesson->type == "review" && $course->type == 'middle_school'){
//            $data['dataMenu'] = $this->event->getJsonAllMenuList($lesson,$this);
//        }
        if(!empty($this->select_items_1)){
            $data['selectItems'][0] = explode(",",$this->select_items_1);
        }
        if(!empty($this->select_items_2)){
            $data['selectItems'][1] = explode(",",$this->select_items_2);
        }
        if(!empty($this->select_items_3)){
            $data['selectItems'][2] = explode(",",$this->select_items_3);
        }

        $part_types = array("phonics","vocabulary");


        $data['dataMenu'] = $this->event->getJsonFileAllMenuList($lesson,$this);

        if($lesson->type == "review" && $course->type == 'middle_school'){
            $data['dataMenu'] = $this->event->getJsonAllMenuList($lesson,$this);
        }

        $results = $this->event->getJsonForReviewSummaryEventList($this,"system");
        $data['systems'] = $results['events'];
        $results1 = $this->event->getJsonForReviewSummaryEventList($this,"result");
        $data['results'] = $results1['events'];

        if($lesson->type == "grammar" && $course->type == 'middle_school' && $this->part_type == "Quiz"){
            $fill_in_rand = rand(1,5);
            $fill_in_sr_rand = rand(1,5);
            $data["key_rand"] = array(

                0=>array(
                    "read_and_click_fill_in"=>$fill_in_rand,
                    "read_and_click_sentence_formation" =>5-$fill_in_rand,
                    "read_and_speak_cloze_sr" =>1),
                1=>array(
                    "read_and_speak_fill_in_sr"=>$fill_in_sr_rand,
                    "read_and_speak_sentence_formation_sr" =>5-$fill_in_sr_rand,
                    "read_and_click_cloze" =>1,
                )
            );
            $data = array_merge($data,$this->event->getJsonAllPartEventList($lesson,$this));
        }elseif($lesson->type == "test" && $course->type == 'middle_school'){
            $types = array(
                "vocabulary_quiz_sentence"=>array("num_questions"=>4,"text"=>"Listen and click","score"=>5,
                    "title"=>"听录音选答案:根据听到的录音,点击选择正确答案."),
                "reading_sr" =>array("num_questions"=>9,"text"=>"Look and read","score"=>5,
                    "title"=>"朗读句子:大声准确地朗读屏幕上显示的句子,注意语音、语调和流利度."),
                "read_and_click_fill_in" =>array("num_questions"=>3,"text"=>"Listen and click","score"=>5,
                    "title"=>"选词填空:点击恰当的选项,将句子补充完整."),
                "read_and_speak_sentence_formation_sr" =>array("num_questions"=>4,"text"=>"Look and speak","score"=>5,
                    "title"=>"语音识别的连词成句:直接将语序错乱的词语排列组合,读出正确的句子."),
//                    "review_multipleChoices_speak"=>array("num_questions"=>5,"text"=>"Listen and speak","score"=>5,
//                        "title"=>"语音识别的回答问题:看图片内容和选项,根据听到的问题,读出正确的选项;"),
            );
            $data["key_rand"] = $types;
            $data = array_merge($data,$this->event->getJsonAllPartEventListforMt($unit,array_keys($types),$this));
        }else if($this->part_type == 'review_passage_summary'){
            $data['eventLists'] = array($this->event->getJsonForReviewSummaryEventList($this),$this->event->getJsonForReviewSummaryEventList($this,"sr_readings"));
        }else if(in_array($this->part_type,$part_types)){
            $return = $this->event->getJsonPartEventList($this->id,$this,$lesson);
            $data['dataList'] = $return['events'];
        } else{
            $data = array_merge($data,$this->event->getJsonPartEventList($this->id,$this,$lesson));
        }

        return $data;
    }

    public function getMediaFileList(){
        $data = array();
        if(!empty($this->file_id)){
            $file_ids = explode(",",$this->file_id);
            foreach($file_ids as $file_id){
                $file = $this->wetalkfile->getFile($file_id);
                if($file->id != 0){
                    $data[] =  $file->getLessonFileInfo();
                }

            }
        }
        return $data;
    }


    public function  updateKey($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->where("id", $this->id);
            $this->db->update("lessons_part", $data);
            //更新record数据
            if(isset($data['part_type'])){
                $this->db->where("part_id",$this->id);
                $this->db->update("users_record",array("part_type"=>$data['part_type'],"weight"=>$data['weight']));
            }
        }
        return $this;
    }

    public function  savePart($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->insert("lessons_part", $data);
            return $this->db->insert_id();
        }
        return 0;
    }

    public function getFileUrl(){
        //   return base_url().'media/assets/lessonparts/part'.$this->lesson_id.'.png';
        if(!empty($this->filename)){
            $picture = $this->storage->setMinxer($this)->getFileName($this->filename,"origin");
            return $picture;
        }
        return base_url().'media/assets/parts/'.$this->type.'.png';
    }


    public function getBackGroundFileUrl(){
        if(!empty($this->back_file_id)){
            $file = $this->wetalkfile->getFile($this->back_file_id);
            if($file->id != 0){
                $fileinfo = $file->getLessonFileInfo();
                return $fileinfo['originurl'];
            }
        }
        return "";
    }






    public function getLessonpartList($user,$lesson_id=0,$flag=0){
        $post = $this->input->get();
        //$lesson = $this->db->where("id",(int)$lesson_id)->get("lessons")->row();

        if(($user && $user->id == 53) || $flag == 1){
            $lessons = $this->db->select('id')->where("lesson_id",(int)$lesson_id)->order_by("sort","asc")->get("lessons_part")->result();
        }else{

            $event_part_id = $this->db->select("part_id as id")->where("type","speech")->get("lessons_part_events")->result();
            $lessons = $this->db->select('id')->where("status",1)
                ->where("lesson_id",(int)$lesson_id);

            if($event_part_id && ($post['device_platform'] == "android" || $post['device_platform'] == "pc" ) && $post['app_version'] < "1.1.0"){
                $lessons = $lessons->where_not_in("id",$this->toIdArray($event_part_id));
            }

            if($event_part_id && $post['device_platform'] == "iphone" && $post['app_version'] < "1.1.1"){
                $lessons = $lessons->where_not_in("id",$this->toIdArray($event_part_id));
            }
            $lessons = $lessons->order_by("sort","asc")
                ->get("lessons_part")->result();
        }
        $result = array();
        foreach($lessons as $lesson){

            $result[] = $this->getLessonpart($lesson->id)->getLessonpartInfo($user);
        }

        $this->returncode['data'] = $result;
        return $this;
    }

    public function getLessonparItem($lesson_id=0){

        $lessons = $this->db->select('id')->where("lesson_id",(int)$lesson_id)->order_by("sort","asc")->get("lessons_part")->result();
        $result = array();
        foreach($lessons as $lesson){
            $result[] = $this->getLessonpart($lesson->id);
        }

        $this->returncode['data'] = $result;
        return $this;
    }


    public function getLessonPartCount($lesson_id=0){
        $lesson = $this->db->select("count(*) as num")->where("lesson_id",(int)$lesson_id)->get("lessons_part")->row();
        return $lesson->num;
    }


    public function getMyPartDetails($user=null,$part_id=0){
        $result = array(
            "scores"          => 0,
            "completion_rate" =>0,  //完成率
            "accuracy"        =>0,  //正确率
            "last_score"      =>0,  //上一次得分
            "learning_times"  =>0,  //学习次数
            "time"            =>0,  //总学习时间
            "learning_evaluation" => "", //学习评价
            "study_tips"        => ""  //学习建议
        );
        if($user){
            $this->recordmanager->initialize()->user_id = $user->id;
            $this->recordmanager->part_id = $part_id;

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
                $scores = 2;
                $study_tips  = "请注意一定按照教师要求，确保课程的完成率达标，提高答题的正确率和达标率，及时复习，提高MT的正确率和得分，提高学习得分.";
            }else if($StudyReuslt >=12 && $StudyReuslt <=14){
                $StudyReusltString = "学习效果，处于标准水平.";
                $scores = 3;
                $study_tips = "请继续按照教师要求，确保课程的完成率达标，提高答题的正确率和达标率，及时复习，提高MT的正确率和得分，提高学习得分；";
            }else if($StudyReuslt > 14 && $StudyReuslt <=16){
                $scores = 4;
                $StudyReusltString = "学习效果良好.";
                $study_tips  = "请继续按照教师要求，确保课程的完成率达标，提高答题的正确率和达标率，及时复习，提高MT的正确率和得分，提高学习得分.";
            }else if($StudyReuslt > 16){
                $StudyReusltString = "学习效果，远高于标准水平.";
                $scores = 5;
                $study_tips  = "请继续保持良好的练习习惯，继续提升练习效果.";

            }

            $this->recordmanager->initialize()->user_id = $user->id;
            $this->recordmanager->part_id = $part_id;
            $this->recordmanager->start_time = null;
            $this->recordmanager->end_time  = null;
            $result = array(
                "scores"          => $scores,
                "completion_rate" => $this->recordmanager->getMyCompletion(),  //完成率
                "accuracy"        => $this->recordmanager->getMyCorrection(),  //正确率
                "last_score"      => $this->recordmanager->getUserPartScores(),
                "learning_times"  => $this->recordmanager->getLearningTimes(),  //学习次数
                "time"            => $this->recordmanager->getLearningTime(),  //总学习时间
                "learning_evaluation" => $StudyReusltString, //学习评价
                "study_tips"          => $study_tips  //学习建议
            );
        }
        if($result['completion_rate'] > 1)  $result['completion_rate'] = 1;
        $this->returncode['data'] = $result;
        return $this;
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

    public function uploadBackgroundpicture()
    {

        $file = $this->storage->setMinxer($this)->uploadBackGroundFile();
        if ($file->errorCode == 0) {
            $data['background_file_name'] = $file->data['file_name'];
            $this->updateKey($data);
            $this->returncode['data'] = $this->getFileUrl();
        } else {
            $this->returncode['errcode'] = 1000003;
            $this->returncode['errdesc'] = "头像上传失败";
            $this->returncode['data'] = $file;
        }
        return $this;
    }


    public function getPartSpeechComments(){
        $data = array();
        $speechs = $this->db
            ->where("comment_type","speech")
            ->where("category","1")
            ->get("lessons_part_speech_comments")->result();
        $performances = $this->db
            ->where("comment_type","speech")
            ->where("category","2")
            ->get("lessons_part_speech_comments")->result();
        $data['speech']['content']      = $speechs;
        $data['speech']['performance']  = $performances;


        $texts = $this->db
            ->where("comment_type","text")
            ->where("category","1")
            ->get("lessons_part_speech_comments")->result();
        $textperformances = $this->db
            ->where("comment_type","text")
            ->where("category","2")
            ->get("lessons_part_speech_comments")->result();
        $data['text']['content']      = $texts;
        $data['text']['performance']  = $textperformances;
        $this->returncode['data'] = $data;
        return $this;

    }


    public function addCommentsForSpeech($user,$record_id=0){
        $post = $this->input->post();
        $record = $this->db
            ->where("id",$record_id)
            ->get("users_record")->row();
        if($record){
            if(isset($post['type']) && $post['type'] == "speech"){
                $data=array(
                    "comment_speech_content_id"    =>isset($post['comment_speech_content_id']) ? $post['comment_speech_content_id'] : 0,
                    "comment_speech_performance_id" =>isset($post['comment_speech_performance_id']) ? $post['comment_speech_performance_id'] : 0,
                    "comment_user_id"=>$user->id,
                    "comment_speech_status"=>1
                );
            }elseif(isset($post['type']) && $post['type'] == "all"){
                $data=array(
                    "comment_speech_content_id"    =>isset($post['comment_speech_content_id']) ? $post['comment_speech_content_id'] : 0,
                    "comment_speech_performance_id" =>isset($post['comment_speech_performance_id']) ? $post['comment_speech_performance_id'] : 0,
                    "comment_user_id"=>$user->id,
                    "comment_speech_status"=>1,
                    "comment_text_content_id"       =>isset($post['comment_text_content_id']) ? $post['comment_text_content_id'] : 0,
                    "comment_text_performance_id"   =>isset($post['comment_text_performance_id']) ? $post['comment_text_performance_id'] : 0,
                    "comment_text_status"=>1
                );
            }else{
                $data=array(
                    "comment_text_content_id"       =>isset($post['comment_text_content_id']) ? $post['comment_text_content_id'] : 0,
                    "comment_text_performance_id"   =>isset($post['comment_text_performance_id']) ? $post['comment_text_performance_id'] : 0,
                    "comment_user_id"=>$user->id,
                    "comment_text_status"=>1
                );
            }
            $this->db->where("id",$record->id);
            $this->db->update("users_record",$data);
        }else{
            $this->returncode['errcode'] = 3000001;
            $this->returncode['errdesc'] = "未找到对应记录";
        }
        return $this;
    }


    public function getSpeechContentInfo($comment_id=0){
        $speech = new stdClass();
        $speech->score = 0;
        $speech->body = "";
        if($comment_id != 0){
            $speech = $this->db
                ->where("id",$comment_id)
                ->get("lessons_part_speech_comments")->row();
        }
        return $speech;
    }


    public function getSpeechContentList($user,$limit=20,$start=0){
        $records = array();

        //获取所有是event的part_id

        $event_part_id = $this->db->select("part_id as id")->where("type","speech")->get("lessons_part_events")->result();

        $is_read_papers = $this->input->get("is_read_papers"); //是否已批阅
        $time_sort = $this->input->get("time_sort"); //时间排序
        if($user->user_type == "teacher"){
            //获取班级下所有学生
            $class_user_relationships =  $this->db
                ->select("class_id as id")
                ->where("user_id",$user->id)
                //->limit($limit,$start)
                ->get('class_user_relationship')->result();
            if($class_user_relationships){
                $recordItems = $this->db
                    ->select("users_record.*,class_user_relationship.class_id,classes.name as ClassName,grades.name as GradeName,users.name as Username")
                    ->where_in("class_user_relationship.class_id",$this->toIdArray($class_user_relationships))
                    // ->where("class_user_relationship.user_type","student")
                    ->where("users_record.type","speech")
                    ->where_in("users_record.part_id",$this->toIdArray($event_part_id))
                    ->join('users_record','class_user_relationship.user_id = users_record.user_id', 'left')
                    ->join('classes', 'classes.id = class_user_relationship.class_id', 'left')
                    ->join('grades', 'classes.grade_id = grades.id', 'left')
                    ->join('users', 'users.id = users_record.user_id', 'left')
                ;

                if($is_read_papers !== false){
                    if($is_read_papers == 1){
                        $recordItems = $recordItems
                            ->where("users_record.comment_text_status",1)
                            ->where("users_record.comment_speech_status",1);
                    }else{
                        $recordItems = $recordItems
                            ->where("users_record.comment_text_status",0)
                            ->where("users_record.comment_speech_status",0);
                    }
                }

                if($time_sort !== false ){
                    if($time_sort == 1){
                        $recordItems = $recordItems->order_by("users_record.start_time","desc");
                    }else{
                        $recordItems = $recordItems->order_by("users_record.start_time","asc");
                    }
                }else{
                    $recordItems = $recordItems->order_by("users_record.start_time","desc");

                }

                $recordItems = $recordItems->limit($limit,$start)
                    ->get('class_user_relationship')->result();

                //echo $this->db->last_query();
                foreach($recordItems as $recordItem){
                    $record = $this->getRecordItem($recordItem,$user);
//                    $class =  $this->classes->getGrade($recordItem->class_id);
//                    if($class) $record->gradeName = $class->nickname;
//                    else $record->gradeName = "";
                    $records[] = $record;
                }
            }
        }else{
            $recordItems = $this->db
                ->select("users_record.*,class_user_relationship.class_id,users.name as Username,classes.name as ClassName,grades.name as GradeName")
                ->where("users_record.type","speech")
                ->where_in("users_record.part_id",$this->toIdArray($event_part_id))
                ->join('class_user_relationship','class_user_relationship.user_id = users_record.user_id', 'left')
                ->join('classes', 'classes.id = class_user_relationship.class_id', 'left')
                ->join('grades', 'classes.grade_id = grades.id', 'left')
                ->join('users', 'users.id = users_record.user_id', 'left')

                ->where("users_record.user_id",$user->id);
            if($time_sort !== false){
                if($time_sort == 1){
                    $recordItems = $recordItems->order_by("users_record.start_time","desc");
                }else{
                    $recordItems = $recordItems->order_by("users_record.start_time","asc");
                }
            }else{
                $recordItems = $recordItems->order_by("users_record.start_time","desc");

            }

            $recordItems = $recordItems->limit($limit,$start)->get('users_record')->result();
            foreach($recordItems as $recordItem){
                $record = $this->getRecordItem($recordItem,$user);
                $record->gradeName = "";
                $records[] = $record;
            }
        }
        $this->returncode['data'] = $records;
        return $this;
    }

    public function getRecordItem($record,$user){
        // $record  = new stdClass();
        if(isset($record->id) && $record->id != 0 ){

            if(empty( $record->content))  $record->content = "";
            if(empty( $record->filename))  $record->filename = "";
            if(empty( $record->device_platform))  $record->device_platform = "";


            $record->name = $record->Username;
            $record->comment_speech_totalScores = 0;
            $record->comment_speech_content_info = $this->getSpeechContentInfo($record->comment_speech_content_id);
            $record->comment_speech_performance_info = $this->getSpeechContentInfo($record->comment_speech_performance_id);

            $record->comment_speech_totalScores = $record->comment_speech_content_info->score+$record->comment_speech_performance_info->score;

            $record->comment_text_totalScores = 0;
            $record->comment_text_content_info = $this->getSpeechContentInfo($record->comment_text_content_id);
            $record->comment_text_performance_info = $this->getSpeechContentInfo($record->comment_text_performance_id);
            $record->comment_text_totalScores = $record->comment_text_content_info->score+$record->comment_text_performance_info->score;
            $unit = $this->unit->getUnit($record->unit_id);
            if($unit->id !=0){
                $record->unitName = $unit->name;
            }else{
                $record->unitName = "";
            }
            $record->objectType = "speech";
            $record->fileurl = $this->storage->setMinxer($record)->getFileName($record->filename,'origin');
            $record->isComment = false;
            if($user->user_type == "teacher"){
                $record->isComment = true;
            }
            if($record->comment_speech_status == 1 && $record->comment_text_status == 1){
                $record->hasComment = 1;
            }else{
                $record->hasComment = 0;
            }
//            $class =  $this->classes->getGrade($record->class_id);
//            if($class) $record->gradeName = $class->nickname;
//            else $record->gradeName = "";
            $record->gradeName = $record->GradeName. $record->ClassName;
            return $record;
        }
        return $record;
    }


    public function getRecordDetail($user,$record_id=0){


        $record1 = $this->db
            ->select("users_record.*,class_user_relationship.class_id,users.name as Username,classes.name as ClassName,grades.name as GradeName")
            ->where("users_record.id",$record_id)
            ->join('class_user_relationship','class_user_relationship.user_id = users_record.user_id', 'left')
            ->join('classes', 'classes.id = class_user_relationship.class_id', 'left')
            ->join('grades', 'classes.grade_id = grades.id', 'left')
            ->join('users', 'users.id = users_record.user_id', 'left')
            ->get('users_record')->row();

        $record = $this->getRecordItem($record1,$user);
        if(isset($record->id) && !empty($record->id)){

            $this->returncode['data'] = $record;
        }else{
            $this->returncode['errcode'] = 3000001;
            $this->returncode['errdesc'] = "未找到对应记录";
        }
        return $this;
    }


    public function delete($part_id=0){
        $part = $this->getLessonpart($part_id);
        if($part->id != 0){
            $this->event->removeAllEvents($part);
            $this->db->where("id",$part->id);
            $this->db->delete("lessons_part");
        }
        return $this;
    }


    public function deleteLessonparts($lesson_id=0){

        $parts = $this->db->select('id')->where("lesson_id",(int)$lesson_id)->get("lessons_part")->result();
        $result = array();
        foreach($parts as $part){
            $partItem = $this->getLessonpart($part->id);
            $partItem->delete($part->id);
        }

        $this->returncode['data'] = $result;
        return $this;
    }

    public function removeAllevents(){
        $this->event->removeAllEvents($this);
        return $this;
    }


}
