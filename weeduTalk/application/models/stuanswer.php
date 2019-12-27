<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Stuanswer extends CI_Model
{
    /**
     * Stuanswer constructor.
     * 获取考生考试详情model
     */

    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }


    public function _initialize($config = array())
    {
        $config['attributes'] = array(
            'id' => array("require" => false),
            'user_id' => array("require" => true),
            'paper_id' => array("require" => true),
            "model_id" => array("require" => true),
            "ques_content_id" => array("require" => true),
            "question_id" => array("require" => true),
            "question_score" => array("require" => true),
            "ques_item_id" => array("require" => true),
            "ques_item_content" => array("require" => true),
            "ques_item_state" => array("require" => true),
            "group_id" => array("require" => true),
            "created_time" => array("require" => true),
        );
        parent::_initialize($config);
    }

    //根据学生id，试卷id，groupid获取考生考试详情
    public function getExamDetailByUser($paper_id,$user_id,$group_id){
            $data = array();
            $items = $this->db->select("id");
            if(isset($paper_id) && $paper_id){
                $items = $items->where("paper_id",$paper_id);
            }
            if(isset($user_id) && $user_id ){
                $items = $items->where("user_id",$user_id);
            }
            if(isset($group_id) && $group_id){
                $items = $items->like("group_id",$group_id);
            }
//            $items = $items->group_by("model_id")->group_by("ques_content_id")->group_by("question_id");
            $items = $items->get("exam_paper_user_answer")->result();
            foreach($items as $item){
                $data[] = $this->getUserExamDetail($item->id)->getUserExamDetailView();
            }
            return $data;
    }

    public function getUserExamDetail($id){
        $amoeba = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("exam_paper_user_answer")->row_array();
        if($item){
            foreach($item as $key=>$val){
                if(empty($val)) $val = "";
                $amoeba->$key = $val;
            }
        }else{
            $amoeba->id = 0;
        }
        return $amoeba;
    }

    //获取问题view
    public function getUserExamDetailView(){
        $data = array(
            'id'                    => $this->id,
            'user_id '              => $this->user_id ,
            'paper_id'              => $this->paper_id ,
            'paper_detail'          => $this->getPaperDetail($this->paper_id)->title,
            "model_id"              => $this->model_id,
            'model_detail'          => $this->getPaperModelDetail($this->model_id)->title,
            "ques_content_id"       => $this->ques_content_id,
            'ques_content_detail'   => $this->getPaperContDetail($this->ques_content_id)->content,
            "question_id"           => $this->question_id,
            'question_id_detail'    => $this->getPaperQuesDetail($this->question_id)->title,
            "ques_item_id"          => $this->ques_item_id,
            'question_item_detail'  => $this->getPaperQuesItemDetail($this->question_id),
            'ques_item_content '    => $this->ques_item_content,
            'ques_item_state'       => $this->ques_item_state,
            'created_time'          => $this->created_time
        );
        return $data;
    }

    //获取考试试卷详情
    public function getPaperDetail($paper_id){
        return $this->db->where("id",$paper_id)->get("exam_paper")->row();
    }

    //获取考试模块详情
    public function getPaperModelDetail($model_id){
        return $this->db->where("id",$model_id)->get("exam_paper_model")->row();
    }

    //获取考试试题详情
    public function getPaperContDetail($con_id){
        return $this->db->where("id",$con_id)->get("exam_questions_content")->row();
    }

    //获取试题以及选项详情
    public function getPaperQuesDetail($ques_id){
        return $this->db->where("id",$ques_id)->get("exam_questions")->row();
    }

    //获取试题以及选项详情
    public function getPaperQuesItemDetail($ques_id){
        return $this->db->select("title")->select("state")->where("question_id",$ques_id)->get("exam_question_items")->result();
    }

    public function getexam($paper_id,$user_id,$group_id){
        $data = array();
        $data['paperModel'] = $this->db->select('*')->where("paper_id",$paper_id)->get("exam_paper_model")->result();
        foreach($data['paperModel'] as $item){
            $serction = $this->db->select('*')->where("model_id",$item->id)->get("exam_paper_model_section")->result();
            $modelQuest= $this->db->select('*')->select('question_id')->where("model_id",$item->id)->get("exam_paper_questions")->result();

            $item->serction =$serction;
            $item->modelQues = $modelQuest;
            $item->modelQues_score = $this->getModelScore($paper_id,$item->id,$user_id,$group_id)->model_score;
            foreach ($modelQuest as $que_con){
                $question = $this->db->select('id')->select('content')->select('skill_id')->where("id",$que_con->question_id)->get("exam_questions_content")->result();
                $que_con->ques_content = $question;

                foreach ($question as $que_ques){
                    if($que_ques->skill_id==6||$que_ques->skill_id==3){
                        $que_con->ques_answer = $this->getTeacherAnswer($paper_id,$user_id,$group_id,$que_ques->id)->ques_item_content;
                        $que_con->teacher_volume = $this->getTeacherAnswer($paper_id,$user_id,$group_id,$que_ques->id)->teacher_volume;
                    }
                    $ques_ques = $this->db->select('id')->select('title')->where("content_id",$que_ques->id)->get("exam_questions")->result();
                    $que_ques->ques_ques = $ques_ques;
                    foreach ($ques_ques as $que_ques_item){
                        $ques = $this->db->select('id')->select('title')->select('state')->where("question_id",$que_ques_item->id)->get("exam_question_items")->result();
                        $que_ques_item->ques_ques_item = $ques;
//                        获取到用户选择的该问题选项
                        $user_choice = $this->getCorrect($paper_id,$user_id,$group_id,$que_ques_item->id)->ques_item_id;
                        //根据item_id获取选项内容
                        $choice_con = $this->getItemChoice($user_choice)->state;
                        foreach ($ques as $q_item){
                            if($que_ques->skill_id==2||$que_ques->skill_id==7){
                                if($user_choice == $q_item->id){
                                    $q_item->choice_state = 1;
                                    $q_item->choice_con = $choice_con;
                                    $q_item->correct_id = $user_choice;
                                    $q_item->correct_title = $q_item->title;
                                }else{
                                    $q_item->choice_state = 0;
                                    $q_item->choice_con = $choice_con;
                                    $q_item->correct_id = $user_choice;
                                    $q_item->correct_title = $q_item->title;
                                }
                            }else{
                                if($user_choice == $q_item->id){
                                    $q_item->choice_state = 1;
                                    $q_item->correct_id = $user_choice;
                                    $q_item->correct_title = $q_item->title;
                                }else{
                                    $q_item->choice_state = 0;
                                    $q_item->correct_id = $user_choice;
                                    $q_item->correct_title = $q_item->title;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $data;
    }

    public function getTeacherAnswer($paper_id,$user_id,$group_id,$ques_id){
        return $this->db->where("paper_id",$paper_id)
                    ->where("user_id",$user_id)
                    ->where("group_id",$group_id)
                    ->where("ques_content_id",$ques_id)
                    ->get("exam_paper_user_answer")->row();
    }

    public function getItemChoice($item_id){
        return $this->db->where("id",$item_id )
            ->get("exam_question_items")->row();
    }

    public function getModelScore($paper_id,$model_id,$user_id,$group_id){
        return $this->db->where("paper_id",$paper_id)
            ->where("model_id ",$model_id)
            ->where("user_id",$user_id)
            ->where("group_id",$group_id)
            ->get("exam_paper_user_score")->row();
    }

    public function getCorrect($paper_id,$user_id,$group_id,$ques_id){
        return $this->db->where("paper_id",$paper_id)
            ->where("user_id",$user_id)
            ->where("group_id",$group_id)
            ->where("question_id",$ques_id)
            ->get("exam_paper_user_answer")->row();
    }
}
