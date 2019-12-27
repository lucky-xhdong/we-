<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examcontent extends CI_Model{

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
        if(!isset($post['app_version'])) $post['app_version'] = "1.0.2";
        if(isset($post['data'])){
            //TODO  保存数据
            $infos = @json_decode($post['data']);
            $insetarray = array();
            $this->db->insert("teacher_test_paper_group_result",array(
                "user_id" => $user->id,
                "createdTime"=>date("Y-m-d H:i:s")
            ));
            $group_id = $this->db->insert_id();
            $score = 0;
            $paper_id = 0;
            $teacher_exam_id = 0;
            foreach($infos as $info){
                $data = array();
                $part      = $this->db->select("*")->where("id",$info->part_id)->get('teacher_test_paper_part')->row();
                $paper_category = $this->db->select("id,paper_id")->where("id",$part->paper_category_id)->get('teacher_test_paper_category')->row();
                $paper_id =  $paper_category->paper_id;
                if($info->teacher_exam_id != 0 && !empty($info->teacher_exam_id)) $teacher_exam_id = $info->teacher_exam_id;
                $data = array(
                    "user_id"          => $user->id,
                    "content_id"       => isset($info->content_id)?$info->content_id:0,
                    "paper_part_id"    =>  $info->part_id,
                    "paper_category_id" =>  $paper_category->id,
                    'paper_id'          =>   $paper_category->paper_id,
                    "timestamp"         =>  $info->timestamp,
                    "iscorrect"      =>  isset($info->iscorrect)?$info->iscorrect:0,
                    "answer"         =>  isset($info->answer)?$info->answer:"",
                    "file_url"         =>  isset($info->file_url)?$info->file_url:"",
                    "group_id"       =>  $group_id,
                    "scores"         =>  isset($info->scores)?$info->scores:0,
                    "start_time"     =>   date('Y-m-d H:i:s',$info->timestamp),
                    "end_time"       =>   date('Y-m-d H:i:s'),
                    'date'           =>   date('Y-m-d',$info->timestamp),
                    "time"           =>   isset($info->time)?$info->time:0,
                    "num"             =>   isset($info->num)?$info->num:0,
                    "teacher_exam_id" =>   isset($info->teacher_exam_id)?$info->teacher_exam_id:0,
                    "device_platform"=>  isset($post['device_platform'])?$post['device_platform']:""
                );
                $insetarray[] = $data;
                if($info->iscorrect) $score += (int)$data['scores'];
            }
            if(count($insetarray) > 0){
                $this->db->insert_batch('teacher_test_users_record',$insetarray);
            }

            $this->db->where("id",$group_id)->update("teacher_test_paper_group_result",array(
                "totalScores" => $score,
                "paper_id"=>$paper_id,
                "teacher_exam_id"=>$teacher_exam_id
            ));

        }else{
            $this->returncode['errcode'] = 20000001;
            $this->returncode['errdesc'] = "没有内容发现";
        }
        return $this;
    }

}  
