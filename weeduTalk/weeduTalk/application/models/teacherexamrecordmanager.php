<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacherexamrecordmanager extends CI_Model{


    public     $user_id             = 0;

    public     $group_id            = 0;

    public     $content_id          = 0;

    public     $teacher_exam_id     = 0;

    public     $paper_id            = 0;

    public     $paper_category_id   = 0;

    public     $paper_part_id       = 0;

    public     $start_time          = null;

    public     $date                = null;

    public     $end_time            = null;

    public     $users               = array();

    public  $degrees = array(
                     "easy"       => "简单",
                     "middle"     => "中等",
                     "difficult"  => "困难",
    );

    public  $first_tags = array(
                             "listen"       => "听力练习",
                             "sr"       => "语音识别",
                          );
    public  $second_tags = array(
        "1"       => "辨音能力",
        "2"       => "语音节奏感",
        "3"       => "词汇知识运用能力",
        "4"       => "细节捕获能力",
        "5"       => "英语语音能力",
        "6"       => "情景反应",
        "7"       => "信息转换",
        "8"       => "口语表达",
    );

    public  $third_tags = array(
        "1"       => "辨别听力语音特征",
        "2"       => "听力词汇与语法",
        "3"       => "捕获听力细节信息",
        "4"       => "语音能力",
        "5"       => "英语发音综合能力",
        "6"       => "口语表达能力",
    );



    public function __construct()
    {
        parent::__construct();
    }

    public function initialize()
    {
        $this->group_id          = 0;
        $this->content_id        = 0;
        $this->paper_id          = 0;
        $this->paper_category_id = 0;
        $this->paper_part_id     = 0;
        $this->teacher_exam_id   = 0;
        $this->users             = array();
        return $this;
    }

    /**
     *
     * 获取用户考试成绩
     * */
    public function getUserExamResult(){
        if($this->user_id !=0 && $this->teacher_exam_id != 0){
            $item = $this->db->where("user_id",$this->user_id)
                     ->where("teacher_exam_id",$this->teacher_exam_id)
                     ->get("teacher_test_paper_group_result")
                     ->row();
            return $item;

        }
        return false;
    }

    //获取考试详情

    public function getUserExamResultDetail(){
        if($this->group_id != 0){
            $result = $this->db
                ->select("teacher_test_part_events.*,teacher_test_users_record.scores as userScore")
                ->where("group_id",$this->group_id)
                ->join('teacher_test_part_event_content','teacher_test_users_record.content_id = teacher_test_part_event_content.id', 'left')
                ->join('teacher_test_part_events','teacher_test_part_events.id = teacher_test_part_event_content.event_id', 'left')
                ->get("teacher_test_users_record")->result();
            return $result;
        }
        return false;
    }

    //逐个分析得分数据


    public function  analysisData($result){

    }
}  
