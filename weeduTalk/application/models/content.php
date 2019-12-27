<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Model{


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

    public     $table_user_record = "users_record";
    public     $table_user_record_last = "users_record";

    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
        $this->table_user_record =  $this->table_user_record.' '.'PARTITION('.implode(",",$this->getPartitions()).')';
        $this->table_user_record_last =  $this->table_user_record_last.' '.'PARTITION('.implode(",",$this->getLastPartitions()).')';

    }

    public function getLastPartitions(){
        $date = date("Y-m");
        $lastMonth = date("Y-m", strtotime("-1 month"));
        $partitions = array();
        foreach($this->partitions as $key=> $partition){
            if($key ==  $date){
                $partitions[] = $partition;
            }
        }
        return $partitions;
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



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'               => array("require" => false),
            "user_id"          => array("require" => false),
            'content_id'       => array("require" => true),
            "part_id"          => array("require" => false),
            "lesson_id"        => array("require" => false),
            "timestamp"        => array("require" => false),
            "iscorrect"        => array("require" => false),
            "answer"           => array("require" => false),
            "group_id"         => array("require" => false),
            "scores"          => array("require" => false),
        );
        parent::_initialize($config);
    }




    public function saveDataContent($user){
        $post = $this->input->post();
        // sleep(2);
        if(!isset($post['app_version'])) $post['app_version'] = "1.0.2";
        if(isset($post['data'])){
            //生成最新的groupid
//            $group = $this->db->select("MAX(group_id) as maxgroupid")->get('users_record')->row();
//            if($group){
//                $group_id =  $group->maxgroupid +1;
//            }else{
//                $group_id = 1;
//            }
            $group_id =  rand(1,999999).substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 12);
            //TODO  保存数据
            $infos = @json_decode($post['data']);

//            $fp = fopen("json.txt","a+");
//            fwrite($fp,json_encode($infos));
//            fclose($fp);
            $insetarray = array();
            $lesson_id = 0;
            $unit_id = 0;
            $is_time = false;
            $lesson = false;
            $course = false;
            $timestamp = "";
            $part_id = 0;
            $course_id = 0;
            foreach($infos as $info){
                // 获取part类型
                $data = array();
                $part      = $this->db->select("*")->where("id",$info->part_id)->get('lessons_part')->row();
                $lesson = $this->db->select("id,unit_id,type")->where("id",$part->lesson_id)->get('lessons')->row();
                $part_id =    $info->part_id;

                if($lesson && $part){
                    $unit  = $this->db->select("course_id,level_id")->where("id",$lesson->unit_id)->get('units')->row();
                    $course_id = $unit->course_id;
                    $course = $this->db->select("type")->where("id",$unit->course_id)->get('courses')->row();
                    //查询教材版本
                    $UserSchoolGradeClassRealtionShip = $user->getUserSchoolGradeClassRealtionShip();
                    if($UserSchoolGradeClassRealtionShip){
                        //与学校关系存在
                        if(isset($UserSchoolGradeClassRealtionShip->school_id) && !empty($UserSchoolGradeClassRealtionShip->school_id)){
                            $school = $this->school->getSchool($UserSchoolGradeClassRealtionShip->school_id);
                            if($school->id != 0){
                                $publishing_house_id = $school->publishing_house_id;
                                $publisUnit = $this->db->select("*")->where("publishing_house_id",$publishing_house_id)->where("unit_id",$lesson->unit_id)->get('publishing_house_course_units')->row();
                            }
                        }
                    }

                    if(empty($part->skill_type)){
                        if( $part->type == "sr"){
                            $part->skill_type = "speak";
                        }else if($part->type == "listening"){
                            $part->skill_type = "listen_comprehension";
                        }else{
                            $part->skill_type = "grammer";
                        }
                    }
                    if(isset($info->time) && $info->time < 0 ){
                        $info->time = 0;
                    }

                    if(empty( $info->timestamp)) continue;
                    if($post['app_version'] < "1.2.0"){
                        if(isset($info->time) && $info->time < 0 ){
                            $info->time = time()-$info->timestamp;
                            if( $info->time < 0 ||  $info->time > 3600){
                                $info->time = 3600;
                            }
                        }
                    }

//                    if($info->timestamp > time()){
//                        $info->timestamp =  time();
//                        $info->time = 0;
//                    }

                    $timestamp = $info->timestamp;

                    // $info->timestamp = (string)($info->timestamp)/1000;

                    //检查值是否存在
                    $user_records = $this->db
                        ->where("user_id",$user->id)
                        ->where("part_id",$info->part_id)
                        // ->where("lesson_id",$info->lesson_id)
                        ->where("content_id",isset($info->content_id)?$info->content_id:0)
                        ->where("timestamp",$info->timestamp)
                        ->get($this->table_user_record_last)->num_rows();
                    $timestamp = $info->timestamp;
                    if($user_records >0){
                        if($post['device_platform'] != "iphone"){
                            $this->returncode['errcode'] = 20000002;
                            $this->returncode['errdesc'] = "内容重复上传";
                        }
                        return $this;
                        continue;
                    }


//                    if($user_records >0){
//                        if($post['device_platform'] == "iphone" && ( $lesson && $lesson->type != "test" )){
//                            return $this;
//                        }else if($post['device_platform'] != "iphone"){
//                            $this->returncode['errcode'] = 20000002;
//                            $this->returncode['errdesc'] = "内容重复上传";
//                            return $this;
//                        }
//
//                    }

                    if($post['app_version'] < "1.2.0"){
                        if(date('Y-m-d',$info->timestamp) != date('Y-m-d')){
                            if($info->time  > 3600){
                                $info->time = 3600;
                            }
                        }else if($info->time  > 3600 && (time() - $info->timestamp) < 3600){
                            $info->time = time() - $info->timestamp;
                            if( $info->time < 0){
                                $info->time = abc( $info->time);
                            }
                            if($info->time  > 3600 && ($post['app_version'] <= "1.1.0" || ( $course && $course->type == "high_school"))){
                                $info->time = 3600;
                            }
                        }
                    }


//                    if($info->time  > 3600 && $post['app_version'] <= "1.1.0"){
//                        $timeCorrect = time() - $info->timestamp;
//                        if($timeCorrect < 0) {
//
//                        }
//                    }
                    if($post['app_version'] < "1.2.0"){
                        $answerstring = preg_replace('# #','',$info->answer);
                        if($answerstring && $answerstring != "" && $post['device_platform'] == "android" && $post['app_version'] <= "1.1.0"){
                            if($info->iscorrect != 1){
                                $info->iscorrect = 1;
                            }
                        }

                    }

                    if( $info->time > 0){
                        $is_time = true;
                    }

                    if($info->time >= 7200){
                        $info->time = 0;
                    }
                    if(date('Y-m-d',$info->timestamp) > date('Y-m-d')){
                        $info->time = 0;
                    }
                    $data = array(
                        "user_id"         => $user->id,
                        "course_id"       => isset($publisUnit->publishing_house_course_id)?$publisUnit->publishing_house_course_id:$course_id,
                        "content_id"      => isset($info->content_id)?$info->content_id:0,
                        "level_id"        => isset($publisUnit->publishing_house_course_level_id)?$publisUnit->publishing_house_course_level_id:0,
                        "part_id"         => $info->part_id,
                        "lesson_id"      =>  $lesson->id,
                        "timestamp"      =>  $info->timestamp,
                        "iscorrect"      =>  isset($info->iscorrect)?$info->iscorrect:0,
                        "answer"         =>  isset($info->answer)?$info->answer:"",
                        "group_id"       =>  $group_id,
                        "scores"         =>  isset($info->scores)?$info->scores:0,
                        "start_time"     =>   date('Y-m-d H:i:s',$info->timestamp),
                        "end_time"       =>   date('Y-m-d H:i:s'),
                        'questions_type' =>   $part->type,
                        'part_type'      =>   $part->part_type,
                        'unit_id'        =>   $lesson->unit_id,
                        'skill_type'     =>   $part->skill_type,
                        'date'           =>   date('Y-m-d',$info->timestamp),
                        "weight"         =>   $part->weight,
                        "time"           =>   isset($info->time)?$info->time:0,
                        "repeat_count"   =>   isset($info->repeat_count)?$info->repeat_count:0,
                        "abc_count"      =>   isset($info->abc_count)?$info->abc_count:0,
                        "mic_count"      =>   isset($info->mic_count)?$info->mic_count:0,
                        "head_count"     =>   isset($info->head_count)?$info->head_count:0,
                        "device_platform"=>  isset($post['device_platform'])?$post['device_platform']:""
                    );

                    $lesson_id =  $lesson->id;
                    $unit_id = $lesson->unit_id;
                    $insetarray[] = $data;
//                    $fp = fopen("json.txt","a+");
//                    fwrite($fp,json_encode($data));
//                    fclose($fp);

                }
            }
            if(count($insetarray) > 0){
                $this->db->insert_batch('users_record',$insetarray);
            }

//            if( isset($post['device_platform']) && $post['device_platform'] == "iphone" && $post['app_version'] <= "1.1.0"){
            //


            if( isset($post['device_platform']) && $post['device_platform'] == "iphone" && ( ($course && $course->type == "high_school") || $post['app_version'] <= "1.1.0") ){
                sleep(2);
                $row = $this->db->where("group_id",$group_id)->where("user_id",$user->id)->order_by("time","desc")->get("users_record")->row();
                if($row && !empty($row->time)){
                    $this->db->where("group_id",$group_id)->where("id !=",$row->id);
                    $this->db->update("users_record",array("time"=>0));

                }
            }
            if(!$is_time && $post['app_version'] < "1.2.0"){
                sleep(1);
                $row = $this->db->where("group_id",$group_id)->where("user_id",$user->id)->order_by("time","desc")->get("users_record")->row();
                if($row && empty($row->time)){
                    $row1 = $this->db
                        ->select("MAX(end_time) as start2,MIN(start_time) as start")
                        ->where("group_id",$group_id)
                        ->get("users_record")
                        ->row();
                    if($row1){
                        $time = strtotime($row1->start2) - strtotime($row1->start);
                        if($time > 0){
                            if($time > 3600) $time = 3600;

                            //凡是杀程序等问题,全部以1s处理
                            if($post['app_version'] > "1.1.0" &&  $course && $course->type != "high_school"){
                                $time = 1;
                            }
                            $this->db->where("id",$row->id);
                            $this->db->update("users_record",array("time"=>$time));
                        }
                    }

                }
            }

            //测试完锁定MT
            if($lesson && $lesson->type == "test"){
                //  $this->db->where("user_id", $user->id)->where("lesson_id",$lesson->id)->update("user_relation_unit_lesson",array("islock"=>1));
            }
            if(!empty($timestamp) &&  (date('Y-m-d',$timestamp) ==  date('Y-m-d'))){
//                $this->calculationrecordUnit($user->id,$unit_id);
                $this->calculationrecordLesson($user->id,$lesson_id);
            }

            if(isset($post['device_platform']) && $post['device_platform'] == "android" && $post['app_version'] < "1.2.3"){
                $this->calculationrecordTime(0,$lesson_id,$unit_id,$group_id,$user->id);
            }else{
                $this->calculationrecordTime($part_id,0,$unit_id,$group_id,$user->id);
            }


            // exec("php /var/www/wePlatform/crontab.php autoprogram calculationUserResultPesronal ".$user->id);
        }else{
            $this->returncode['errcode'] = 20000001;
            $this->returncode['errdesc'] = "没有内容发现";
        }
        return $this;
    }

    public function calculationrecordUnit($user_id=0,$unit_id=0)
    {
        $time = 1;
        $url = base_url("components/units/getUnitInfo/".$unit_id.'/'.$user_id);
        sleep($time);
        file_get_contents($url);

    }

    public function calculationrecordLesson($user_id=0,$lesson_id=0)
    {
        $time = 1;
        $url = base_url("components/lessons/getLessonInfo/".$lesson_id.'/'.$user_id);
        sleep($time);
        file_get_contents($url);

    }

    public function calculationrecordTime($part_id=0,$lesson_id=0,$unit_id=0,$group_id=0,$user_id = 0)
    {
        $time = 1;
        $url = base_url("components/lessons/calculationrecordTime/".$part_id.'/'.$lesson_id.'/'.$unit_id.'/'.$group_id.'/'.$user_id);
        sleep($time);
        file_get_contents($url);

    }




    public function saveSpeechContent($user){
        $post = $this->input->post();
        //$post['part_id'] = 281;
        if(isset($post['part_id']) ){
            $group_id =  rand(1,999999).substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 12);
            $part      = $this->db->select("*")->where("id",$post['part_id'])->get('lessons_part')->row();
            $lesson = $this->db->select("unit_id,id")->where("id",$part->lesson_id)->get('lessons')->row();
            $post['timestamp'] = time();
            if(!isset($post['type']) || empty($post['type'])){
                $post['type'] = "speech";
            }
            if($lesson && $part) {
                $unit = $this->db->select("course_id,level_id")->where("id", $lesson->unit_id)->get('units')->row();
                $data = array(
                    "user_id"    => $user->id,
                    "content"    => isset($post['content']) ? $post['content'] : "",
                    "course_id"  => isset($unit->course_id) ? $unit->course_id : 0,
                    "content_id" => isset($post['content_id']) ? $post['content_id'] : 0,
                    "level_id"   => isset($unit->level_id) ? $unit->level_id : 0,
                    "category_first_id" => isset($post['category_first_id']) ? $post['category_first_id'] : 0,
                    "part_id"    => $post['part_id'],
                    "lesson_id"  => $lesson->id,
                    "timestamp"  => $post['timestamp'],
                    "type"       =>  $post['type'],
                    "iscorrect"  =>  0,
                    "answer"     =>  "",
                    "group_id"   => $group_id,
                    "scores"     => 0,
                    "start_time" => date('Y-m-d H:i:s', $post['timestamp']),
                    "end_time"   => date('Y-m-d H:i:s'),
                    'questions_type' => $part->type,
                    'part_type'      => $part->part_type,
                    'unit_id'        => $lesson->unit_id,
                    'skill_type'     => $part->skill_type,
                    'date'           => date('Y-m-d', $post['timestamp']),
                    "weight"         => $part->weight,
                    "time"           =>  0,
                    "comment_text_status" =>  0,
                    "comment_speech_status" =>  0
                );
                if(isset($post['id']) && !empty($post['id'])){
                    $this->db->where("id",$post['id']);
                    $this->db->update('users_record_speech',$data);
                }else{
                    $this->db->insert('users_record_speech',$data);
                    $post['id'] = $this->db->insert_id();
                    //sleep(2);
                    //$query = "insert into `wetalk_users_record_speech` select * FROM `wetalk_users_record` where id =". $post['id'];
                }
                $this->returncode['fileid'] = $post['id'];
                $record = $this->db->where("id",$post['id'])->get('users_record_speech')->row();
                $record->fileurl = "";
                if($record){
                    if( $post['type'] == "speech"){
                        $record->objectType = "speechNew";
                    }else{
                        $record->objectType = "writing";
                    }

                    $file = $this->storage->setMinxer($record)->uploadMediaFile();
                    if($file->errorCode == 0){
                        $dataItem['filename'] =  $file->data['file_name'];
                        $dataItem['duration'] =  isset($post['duration'])?$post['duration']:0;
                        $this->db->where("id",$record->id);
                        $this->db->update('users_record_speech',$dataItem);
                        $record->fileurl = $this->storage->setMinxer($record)->getFileName($dataItem['filename'],'origin');
                    }else{
                        $this->returncode['errdesc'] = $file->errorMessage;
                    }
                }
                if( $post['type'] == "speech"){
                    $record->object_type = "speech";
                    $record->type = "speech";
                    $class_user_relationship = $this->db->where("user_id",$user->id)->get('class_user_relationship')->row();
                    if($class_user_relationship){
                        $users = $this->db
                            ->where("class_id",$class_user_relationship->class_id)
                            ->where("user_type","teacher")
                            ->get('class_user_relationship')->result();
                        foreach($users as $userItem){
                            $userItemObjec = $this->user->getUser($userItem->user_id);
                            $this->notification->setMinxer($record)->addNotification($user, $userItemObjec,'speech','',$record);
                        }
                    }
                }

                // 同步数据



                $this->returncode['data'] = $record;
            }
        }else{
            $this->returncode['errcode'] = 20000001;
            $this->returncode['errdesc'] = "没有内容发现";
        }
        return $this;
    }


    public function saveFeedback($user){
        $post = $this->input->post();
        $data = array(
            "type"  =>$post['type'],
            "contact" =>$post['contact'],
            "content"=>$post['content'],
            "user_id"=>$user->id
        );
        $this->db->insert("feedback",$data);
        return $this;
    }




    public function saveDataContent2($user){
        $post = $this->input->post();
        $agents = $this->db->where("user_id",$user->id)->where("id",2190241)->get("user_agent_data")->result();

        foreach($agents as $agent){
            if(!isset($post['app_version'])) $post['app_version'] =$agent->version;
            $post['data'] = $agent->postdata;
            if(isset($post['data'])){
                $group_id =  rand(1,999999).substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 12);
                //TODO  保存数据

                $infos = @json_decode($post['data']);
                $insetarray = array();

                $lesson_id = 0;
                $unit_id = 0;
                $is_time = false;
                $lesson = false;
                $course = false;
                foreach($infos as $info){

                    // 获取part类型
                    $data = array();
                    $part      = $this->db->select("*")->where("id",$info->part_id)->get('lessons_part')->row();
                    $lesson = $this->db->select("id,unit_id,type")->where("id",$part->lesson_id)->get('lessons')->row();


                    if($lesson && $part){
                        $unit  = $this->db->select("course_id,level_id")->where("id",$lesson->unit_id)->get('units')->row();
                        $course = $this->db->select("type")->where("id",$unit->course_id)->get('courses')->row();
                        //查询教材版本
                        $UserSchoolGradeClassRealtionShip = $user->getUserSchoolGradeClassRealtionShip();
                        if($UserSchoolGradeClassRealtionShip){
                            //与学校关系存在
                            if(isset($UserSchoolGradeClassRealtionShip->school_id) && !empty($UserSchoolGradeClassRealtionShip->school_id)){
                                $school = $this->school->getSchool($UserSchoolGradeClassRealtionShip->school_id);
                                if($school->id != 0){
                                    $publishing_house_id = $school->publishing_house_id;
                                    $publisUnit = $this->db->select("*")->where("publishing_house_id",$publishing_house_id)->where("unit_id",$lesson->unit_id)->get('publishing_house_course_units')->row();
                                }
                            }
                        }

                        if(empty($part->skill_type)){
                            if( $part->type == "sr"){
                                $part->skill_type = "speak";
                            }else if($part->type == "listening"){
                                $part->skill_type = "listen_comprehension";
                            }else{
                                $part->skill_type = "grammer";
                            }
                        }


                        if(empty( $info->timestamp)) continue;
                        if(isset($info->time) && $info->time <0 ){
                            $info->time = time()-$info->timestamp;
                            if( $info->time < 0 ||  $info->time > 3600){
                                $info->time = 3600;
                            }
                        }
//                    if($info->timestamp > time()){
//                        $info->timestamp =  time();
//                        $info->time = 0;
//                    }

                        // $info->timestamp = (string)($info->timestamp)/1000;

                        //检查值是否存在
                        $user_records = $this->db
                            ->where("user_id",$user->id)
                            ->where("part_id",$info->part_id)
                            ->where("lesson_id",$part->lesson_id)
                            ->where("content_id",isset($info->content_id)?$info->content_id:0)
                            ->where("timestamp",$info->timestamp)
                            ->get('users_record')->num_rows();
                        if($user_records >0){
                            continue;
                            // return;

                        }


//                        if(!in_array(date('Y-m-d',$info->timestamp),array("2018-12-04","2018-12-05"))){
//                            continue;
//                        }

                        if(date('Y-m-d',$info->timestamp) != date('Y-m-d')){
                            if($info->time  > 3600){
                                $info->time = 3600;
                            }
                        }else if($info->time  > 3600 && (time() - $info->timestamp) < 3600){
                            $info->time = time() - $info->timestamp;
                            if( $info->time < 0){
                                $info->time = abc( $info->time);
                            }
                            if($info->time  > 3600 && ($post['app_version'] <= "1.1.0" || ( $course && $course->type == "high_school"))){
                                $info->time = 3600;
                            }
                        }





//                    if($info->time  > 3600 && $post['app_version'] <= "1.1.0"){
//                        $timeCorrect = time() - $info->timestamp;
//                        if($timeCorrect < 0) {
//
//                        }
//                    }

                        $answerstring = preg_replace('# #','',$info->answer);
                        if($answerstring && $answerstring != "" && $post['device_platform'] == "android" && $post['app_version'] <= "1.1.0"){
                            if($info->iscorrect != 1){
                                $info->iscorrect = 1;
                            }
                        }

                        if( $info->time > 0){
                            $is_time = true;
                        }


                        $data = array(
                            "user_id"         => $user->id,
                            "course_id"       => isset($publisUnit->publishing_house_course_id)?$publisUnit->publishing_house_course_id:0,
                            "content_id"      => isset($info->content_id)?$info->content_id:0,
                            "level_id"        => isset($publisUnit->publishing_house_course_level_id)?$publisUnit->publishing_house_course_level_id:0,
                            "part_id"         =>  $info->part_id,
                            "lesson_id"      =>  $lesson->id,
                            "timestamp"      =>  $info->timestamp,
                            "iscorrect"      =>  isset($info->iscorrect)?$info->iscorrect:0,
                            "answer"         =>  isset($info->answer)?$info->answer:"",
                            "group_id"       =>  $group_id,
                            "scores"         =>  isset($info->scores)?$info->scores:0,
                            "start_time"     =>   date('Y-m-d H:i:s',$info->timestamp),
                            "end_time"       =>   date('Y-m-d H:i:s'),
                            'questions_type' =>   $part->type,
                            'part_type'      =>   $part->part_type,
                            'unit_id'        =>   $lesson->unit_id,
                            'skill_type'     =>   $part->skill_type,
                            'date'           =>   date('Y-m-d',$info->timestamp),
                            "weight"         =>   $part->weight,
                            "time"           =>   isset($info->time)?$info->time:0,
                            "repeat_count"   =>   isset($info->repeat_count)?$info->repeat_count:0,
                            "abc_count"      =>   isset($info->abc_count)?$info->abc_count:0,
                            "mic_count"      =>   isset($info->mic_count)?$info->mic_count:0,
                            "head_count"     =>   isset($info->head_count)?$info->head_count:0,
                            "device_platform"=>  isset($post['device_platform'])?$post['device_platform']:""
                        );

                        $lesson_id =  $lesson->id;
                        $unit_id = $lesson->unit_id;
                        $insetarray[] = $data;
//                    $fp = fopen("json.txt","a+");
//                    fwrite($fp,json_encode($data));
//                    fclose($fp);

                    }
                }
                if(count($insetarray) == 0){
                    continue;
                }
                if(count($insetarray) > 0){
                    $this->db->insert_batch('users_record',$insetarray);
                }


//            if( isset($post['device_platform']) && $post['device_platform'] == "iphone" && $post['app_version'] <= "1.1.0"){
                //


                if( isset($post['device_platform']) && $post['device_platform'] == "iphone" && $course && $course->type == "high_school"){
                    sleep(2);
                    $row = $this->db->where("group_id",$group_id)->where("user_id",$user->id)->order_by("time","desc")->get("users_record")->row();
                    if($row && !empty($row->time)){
                        $this->db->where("group_id",$group_id)->where("id !=",$row->id);
                        $this->db->update("users_record",array("time"=>0));

                    }
                }
                if(!$is_time){
                    sleep(1);
                    $row = $this->db->where("group_id",$group_id)->where("user_id",$user->id)->order_by("time","desc")->get("users_record")->row();
                    if($row && empty($row->time)){
                        $row1 = $this->db
                            ->select("MAX(end_time) as start2,MIN(start_time) as start")
                            ->where("group_id",$group_id)
                            ->get("users_record")
                            ->row();
                        if($row1){
                            $time = strtotime($row1->start2) - strtotime($row1->start);
                            if($time > 0){
                                if($time > 3600) $time = 3600;

                                //凡是杀程序等问题,全部以1s处理
                                if($post['app_version'] > "1.1.0" &&  $course && $course->type != "high_school"){
                                    $time = 1;
                                }
                                $this->db->where("id",$row->id);
                                $this->db->update("users_record",array("time"=>$time));
                            }
                        }

                    }
                }

                //测试完锁定MT
                if($lesson && $lesson->type == "test"){
                    $this->db->where("user_id", $user->id)->where("lesson_id",$lesson->id)->update("user_relation_unit_lesson",array("islock"=>1));
                }

                $this->calculationrecordUnit($user->id,$unit_id);
                $this->calculationrecordLesson($user->id,$lesson_id);
            }else{
                $this->returncode['errcode'] = 20000001;
                $this->returncode['errdesc'] = "没有内容发现";
            }
        }

        return $this;
    }

}  
