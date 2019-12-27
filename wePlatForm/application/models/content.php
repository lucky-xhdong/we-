<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
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


        if(isset($post['data'])){
            //生成最新的groupid
            $group = $this->db->select("MAX(group_id) as maxgroupid")->get('users_record')->row();
            if($group){
               $group_id =  $group->maxgroupid +1;
            }else{
                $group_id = 1;
            }
            //TODO  保存数据
            $infos = @json_decode($post['data']);

//            $fp = fopen("json.txt","a+");
//            fwrite($fp,json_encode($infos));
//            fclose($fp);

            foreach($infos as $info){
                // 获取part类型
                $data = array();
                $part      = $this->db->select("*")->where("id",$info->part_id)->get('lessons_part')->row();
                $lesson = $this->db->select("id,unit_id")->where("id",$part->lesson_id)->get('lessons')->row();

                if($lesson && $part){
                    $unit  = $this->db->select("course_id,level_id")->where("id",$lesson->unit_id)->get('units')->row();

                   // $info->timestamp = (string)($info->timestamp)/1000;
                    $data = array(
                        "user_id"         => $user->id,
                        "course_id"       => isset($unit->course_id)?$unit->course_id:0,
                        "content_id"      => isset($info->content_id)?$info->content_id:0,
                        "level_id"        => isset($unit->level_id)?$unit->level_id:0,
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
                    );
//                    $fp = fopen("json.txt","a+");
//                    fwrite($fp,json_encode($data));
//                    fclose($fp);
                    $this->db->insert('users_record',$data);
                }
            }
        }else{
            $this->returncode['errcode'] = 20000001;
            $this->returncode['errdesc'] = "没有内容发现";
        }
        return $this;
    }



    public function saveSpeechContent($user){
        $post = $this->input->post();
        //$post['part_id'] = 281;
        if(isset($post['part_id']) ){
            $group = $this->db->select("MAX(group_id) as maxgroupid")->get('users_record')->row();
            if($group){
                $group_id =  $group->maxgroupid +1;
            }else{
                $group_id = 1;
            }
            $part      = $this->db->select("*")->where("id",$post['part_id'])->get('lessons_part')->row();
            $lesson = $this->db->select("unit_id,id")->where("id",$part->lesson_id)->get('lessons')->row();
            $post['timestamp'] = time();
            if($lesson && $part) {
                $unit = $this->db->select("course_id,level_id")->where("id", $lesson->unit_id)->get('units')->row();
                $data = array(
                    "user_id"    => $user->id,
                    "content"    => isset($post['content']) ? $post['content'] : "",
                    "course_id"  => isset($unit->course_id) ? $unit->course_id : 0,
                    "content_id" => isset($post['content_id']) ? $post['content_id'] : 0,
                    "level_id"   => isset($unit->level_id) ? $unit->level_id : 0,
                    "part_id"    => $post['part_id'],
                    "lesson_id"  => $lesson->id,
                    "timestamp"  => $post['timestamp'],
                    "type"       => "speech",
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
                    $this->db->update('users_record',$data);
                }else{
                    $this->db->insert('users_record',$data);
                    $post['id'] = $this->db->insert_id();
                }
                $record = $this->db->where("id",$post['id'])->get('users_record')->row();
                $record->fileurl = "";
                if($record){
                    $record->objectType = "speech";
                    $file = $this->storage->setMinxer($record)->uploadMediaFile();
                    if($file->errorCode == 0){
                        $dataItem['filename'] =  $file->data['file_name'];
                        $dataItem['duration'] =  isset($post['duration'])?$post['duration']:0;
                        $this->db->where("id",$record->id);
                        $this->db->update('users_record',$dataItem);
                        $record->fileurl = $this->storage->setMinxer($record)->getFileName($dataItem['filename'],'origin');
                    }else{
                        $this->returncode['errdesc'] = $file->errorMessage;
                    }
                }
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

}  
