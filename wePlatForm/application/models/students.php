<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Students extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }


    public function _initialize($config = array())
    {
        $config['attributes'] = array(
            'id' => array("require" => false),
            'school_id' => array("require" => true),
            'paper_id' => array("require" => true),
            "class_ids" => array("require" => true),
            "user_ids" => array("require" => true),
            "datetime" => array("require" => true),

        );
        parent::_initialize($config);
    }

    /**
     * 根据班级id获取已发布试卷详情
     */
    public function getpaperIdByClassId($class_id)
    {
        return $this->db->select('*')->where("IF( FIND_IN_SET({$class_id}, class_ids), 1, 0)")->get("exam_paper_class_relationship")->result();
    }

    /**
     * 计算考生模块分数并记录
     */
    public function get_exam_scores($obj){
        $this->get_exam_answer($obj);
        if (count($obj->question) > 0) {
            $model_score = "";
            $model_score_all = "";
            for ($i = 0; $i < count($obj->question); $i++) {
                if($obj->model_type == '7'||$obj->model_type == '2'){
                    $ques_score = $this->question->getQuestionConById($obj->question[$i]->ques_content)->sub_score;
                    $object =  json_decode(json_encode($obj->question[$i]),true);
                    $per_num = (count($object)-2)/2;
                    for($j=0;$j < $per_num ;$j++){
                        $item = 'item_id'.$j;
                        $state = 'item_num'.$j;
                        $model_score_all +=$ques_score;
                        $ques_item_state = $this->question->getQuestionItem($obj->question[$i]->$item)->state;
                        if ($ques_item_state == $obj->question[$i]->$state) {
                            $model_score += $ques_score;
                        }
                    }
                }else{
                    $ques_score = $this->question->getQuestionConById($obj->question[$i]->ques_content)->sub_score;
                    $ques_item_state = $this->question->getQuestionItem($obj->question[$i]->item_id)->state;
                    $model_score_all +=$ques_score;
                    if ($ques_item_state == 1) {
                        $model_score += $ques_score;
                    }
                }
            }
            $data = array(
                "model_score" => $model_score,
                "model_score_all" => $model_score_all,
                "created_time" => date('Y-m-d H:i:s')
            );
            $this->db->where("relationship_id", $obj->relationship_id)
                ->where("paper_id", $obj->paper_id)
                ->where("model_id", $obj->model_id)
                ->where("user_id", getViewer()->id);
            $this->db->update('exam_paper_user_score', $data);
        }

            return 1;
    }

    /**
     * 记录考生答题记录
     */
    public function get_exam_answer($obj)
    {
        $nums = $this->db->where("relationship_id",$obj->relationship_id)
                        ->where("paper_id",$obj->paper_id)
                        ->where("model_id",$obj->model_id)
                        ->where("user_id",getViewer()->id)
                        ->where("group_id",$obj->group_id)
                        ->get('exam_paper_user_answer')->num_rows();
        if($nums==0){
        if (count($obj->question) > 0) {
            for ($i = 0; $i < count($obj->question); $i++) {
                if($obj->model_type == '7'||$obj->model_type == '2'){
                $object =  json_decode(json_encode($obj->question[$i]),true);
                $per_num = (count($object)-2)/2;
                for($j=0;$j < $per_num ;$j++){

                        $item = 'item_id'.$j;
                        $state = 'item_num'.$j;
                        $ques_score = $this->question->getQuestionConById($obj->question[$i]->ques_content)->sub_score;
                        $ques_item_state = $this->question->getQuestionItem($obj->question[$i]->$item)->state;
                        if ($ques_item_state == $obj->question[$i]->$state) {
                            $states = 1;
                        }else{
                            $states = 0;
                        }
                    $data = array(
                        "user_id" => getViewer()->id,
                        "paper_id" => $obj->paper_id,
                        "model_id" => $obj->model_id,
                        "ques_content_id"=>$obj->question[$i]->ques_content,
                        "question_id" => $obj->question[$i]->ques_id,
                        "question_score" => $ques_score,
                        "ques_item_id" => $obj->question[$i]->$item,
                        "ques_item_content" => $obj->question[$i]->answer_con,
                        "ques_item_state" => $states,
                        "group_id" => $obj->group_id,
                        "created_time" => date('Y-m-d H:i:s'),
                        "relationship_id" => $obj->relationship_id
                    );
                    $this->db->insert('exam_paper_user_answer', $data);
                }
                }else{
                    $ques_score = $this->question->getQuestionConById($obj->question[$i]->ques_content)->sub_score;
                    $states = $this->question->getQuestionItem($obj->question[$i]->item_id)->state;
                    $data = array(
                        "user_id" => getViewer()->id,
                        "paper_id" => $obj->paper_id,
                        "model_id" => $obj->model_id,
                        "ques_content_id"=>$obj->question[$i]->ques_content,
                        "question_id" => $obj->question[$i]->ques_id,
                        "question_score" => $ques_score,
                        "ques_item_id" => $obj->question[$i]->item_id,
                        "ques_item_content" => $obj->question[$i]->answer_con,
                        "ques_item_state" => $states,
                        "group_id" => $obj->group_id,
                        "created_time" => date('Y-m-d H:i:s'),
                        "relationship_id" => $obj->relationship_id
                    );
                    $this->db->insert('exam_paper_user_answer', $data);
                }
                }
                return true;
            } else {
                return 0;
            }
        }
    }

    /**
     * 根据relationship_id插入学生考试分数并修改考试状态
     */

    public function set_exam_scores($obj,$score,$status){
        if($obj->model_type != '6'&& $obj->model_type != '3'){
//            $user = $this->db->select("*")->where("user_id", getViewer()->id)
//                ->where("paper_id", $obj->paper_id)
//                ->where("group_id", $obj->group_id)
//                ->get('exam_paper_class_user_relationship')->row();
            $user = $this->getRelationship($obj->relationship_id);
            $scored = $user->scores;
            $scoreing = $scored+$score;
            $data = array(
                "scores" => $scoreing,
                "status" => $status,
                "total_time" => '3000'
            );
            $this->db->where("id", $obj->relationship_id);
            $this->db->update('exam_paper_class_user_relationship', $data);
            return $scored;
        }
    }
    /**
     * 开始考试
     */
    public function start_test($test_id){
        $item = $this->db->where("id",$test_id)->get("exam_paper_class_user_relationship")->row();
        if($item->status != 2){
            $data = array(
                "status" => '1'
            );
            $this->db->where("id",$test_id);
            $this->db->update('exam_paper_class_user_relationship', $data);
        }

    }

    /**
     * 考试结束
     */
    public function end_test($test_id){
        $data = array(
            "status" => '2'
        );
        $this->db->where("id",$test_id);
        $this->db->update('exam_paper_class_user_relationship', $data);
    }

    /**
     * @param $test_id
     * @return mixed
     * 根据id获取学生详情
     */
    public function getRelationship($test_id){
        $item = $this->db->where("id",$test_id)->get("exam_paper_class_user_relationship")->row();
        return $item;
    }

    /**
     * 根据user_id和paper_id获取该考生考试详情
     */

    public function getUserExamScore($test_id){
        $data = array();
        $data['paperModel'] = $this->db->select('*')->where("relationship_id",$test_id)->get("exam_paper_user_score")->result();
//        echo $this->db->last_query();
//        var_dump($data);
//        exit;
        foreach($data['paperModel'] as $item){
            $item->model_name =$this->paper->getPaperModelInfo($item->model_id)->title;
            $item->model_type =$this->paper->getPaperModelInfo($item->model_id)->type;
            $item->ques_Num =$this->getUserExamQuesNum($item->model_id,$test_id);
            $item->rightQues_Num =$this->getUserExamRightQuesNum($item->model_id,$test_id);
        }

        return $data;
    }

    /**
     * 根据用户id试卷id模块id 查处这个model有多少道题
     */
    public function getUserExamQuesNum($model_id,$test_id){
        $items = $this->db->where("relationship_id",$test_id)
                        ->where("model_id",$model_id)
                        ->get('exam_paper_user_answer')->num_rows();
        return $items;
    }

    /**
     * 根据用户id试卷id模块id 查出该用户做对了多少道
     */
    public function getUserExamRightQuesNum($model_id,$test_id){
        $items = $this->db->where("relationship_id",$test_id)
                        ->where("ques_item_state",1)
                        ->where("model_id",$model_id)
                        ->get('exam_paper_user_answer')->num_rows();
        return $items;
    }
}
