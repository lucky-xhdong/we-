<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Question extends CI_Model{



    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'             => array("require" => false),
            'school_id'      => array("require" => true),
            "skill_id"       => array("require" => true),
            "type_id"        => array("require" => true),
            "contype_id"     => array("require" => true),
            "theme_id"       => array("require" => true),
            "difficulty_id"  => array("require" => true),
            "content"        => array("require" => true),
            "read_time"      => array("require" => true),
            "answer_time"    => array("require" => true),
            "sub_score"      => array("require" => true),
            "creat_time"     => array("require" => true),
         );
        parent::_initialize($config);
    }
    /**
     * 获取考察技能
     * wetalk_exam_questions_skill
     */
    public function getQuestionsSkill(){
        $result = $this->db->get('exam_questions_skill')->result();

        return $result;
    }

    /**
     * 获取答题类型
     * exam_questions_type
     */
    public function getQuestionsType(){
        $result = $this->db->get('exam_questions_type')->result();

        return $result;
    }

    /**
     * 获取内容类型
     * exam_questions_contype
     */
    public function getQuestionsContype(){
        $result = $this->db->get('exam_questions_contype')->result();

        return $result;
    }

    /**
     * 获取主题
     * exam_questions_theme
     */
    public function getQuestionsTheme(){
        $result = $this->db->get('exam_questions_theme')->result();

        return $result;
    }

    /**
     * 获取考题难度
     */
    public function getQuestionsDifficulty(){
        $result = $this->db->get('exam_questions_difficulty')->result();

        return $result;
    }

    /**
     * 上传考题内容
     */
    public function uploadQuestionContent($obj){
        $data = array(
            "school_id" =>  (int)$obj->school,
            "skill_id" => (int)$obj->skill,
            "type_id" => (int)$obj->type,
            "contype_id" => (int)$obj->contype,
            "theme_id" => (int)$obj->theme,
            "difficulty_id" => (int)$obj->diffculty,
            "content" => $obj->content,
            "subsection" => $obj->subsection,
            "read_time" => $obj->read_time,
            "answer_time" => $obj->answer_time,
            "sub_score" => $obj->sub_score,
            "creat_time" => date('Y-m-d H:i:s')
        );
        $this->db->insert('exam_questions_content',$data);
        $id = $this->db->insert_id();

        return $id;
    }
    /**
     * 上传考题
     */
    public function uploadQuestion($obj,$content_id){
        if(count($obj->per)>0){
            for($i=0;$i<count($obj->per);$i++){
                $data = array(
                    "title" => $obj->per[$i]->Name,
                    "content_id" => $content_id,
                    "subsection" => $obj->per[$i]->subsection,
                    "created_time" => date('Y-m-d H:i:s')
                );
                $this->db->insert('exam_questions',$data);
                $id = $this->db->insert_id();
                $object =  json_decode(json_encode($obj->per[$i]),true);
                $per_num = (count($object)-2)/2;
                //插入问题答案
                for($j=0;$j < $per_num ;$j++){
                    $item = 'item'.$j;
                    $state = 'state'.$j;
                    $item_data = array(
                        "title" => $obj->per[$i]->$item,
                        "state" => $obj->per[$i]->$state,
                        "question_id" => $id,
                        "created_time" => date('Y-m-d H:i:s')
                    );
                    $this->db->insert('exam_question_items', $item_data);
                }

            }
            return true;
        }else{
            return 0;
        }
    }

    /*
     *
     * 获取问题列表数据
     */

    public function getQuestionInfoList($limit=20,$start=0,$post){
        $data = array();
        $items = $this->db->select("id");
        if(isset($post['school_id']) && $post['school_id']!=0){
            $items = $items->where("school_id",$post['school_id']);
        }
        if(isset($post['skill_id']) && $post['skill_id']!=0){
            $items = $items->where("skill_id",$post['skill_id']);
        }
        if(isset($post['diffculty_id']) && $post['diffculty_id']!=0){
            $items = $items->where("difficulty_id",$post['diffculty_id']);
        }

        if(isset($post['key']) && !empty($post['key'])){
            $items = $items->like("name",$post['key']);
        }
        $items = $items->limit($limit,$start)->get("exam_questions_content")->result();
        foreach($items as $item){
            $data[] = $this->getQuestion($item->id)->getQuestionInfoView();
        }
        return $data;
    }

    //获取audio列表
    public function getVideoInfoList($limit=20,$start=0,$post){
        $data = array();
        $items = $this->db->select("id");
        if(isset($post['key']) && $post['key']!=0){
            $items = $items->where("name",$post['key']);
        }
        $data = $this->db->query("SELECT DISTINCT content FROM `wetalk_exam_questions_content`WHERE skill_id =4 OR skill_id =5")->result();
        return $data;
    }

    //获取问题view
    public function getQuestionInfoView(){

        $data = array(
            'subject_num'   => $this->id,
            "exa_skill"     => $this->getSkillInfo($this->skill_id)->skill_name,
            "skill_id"      => $this->skill_id,
            "content"       => $this->content,
            "answer_type"   => $this->getTypeInfo($this->type_id)->question_type,
            "content_type"  => $this->getContypeInfo($this->contype_id)->contype_name,
            "subject_diff"  => $this->getDifficultyInfo($this->difficulty_id)->difficulty_name,
            "build_time"    => $this->creat_time,
            "build_user"    => '周斌',
            "theme"         => $this->getThemeInfo($this->theme_id)->theme_name,
            'school'        => $this->getSchoolName($this->school_id)->name,
            "accuracy"      => '55%',
            'use_count'     => '1112',
        );
        return $data;
    }

    //根据学校id获取学校name
    public function getSchoolName($school_id){
        return $this->db->where("id",$school_id)->get("school")->row();
    }
    //根据考察技能id 查询考察技能name
    public function getSkillInfo($skill_id){
        return $this->db->where("id",$skill_id)->get("exam_questions_skill")->row();
    }
    //根据考察技能id 查询考察技能name
    public function getTypeInfo($type_id){
        return $this->db->where("id",$type_id)->get("exam_questions_type")->row();
    }
    //exam_questions_contype
    public function getContypeInfo($contype_id){
        return $this->db->where("id",$contype_id)->get("exam_questions_contype")->row();
    }
    //exam_questions_theme
    public function getThemeInfo($theme_id){
        return $this->db->where("id",$theme_id)->get("exam_questions_theme")->row();
    }
    //exam_questions_difficulty
    public function getDifficultyInfo($difficulty_id){
        return $this->db->where("id",$difficulty_id)->get("exam_questions_difficulty")->row();
    }

    //根据问题id获取问题详情
    public function getQuestionConById($ques_con_id){
        return $this->db->where("id",$ques_con_id)->get("exam_questions_content")->row();
    }
    //根据问题id获取问题详情
    public function getQuestionById($ques_id){
        return $this->db->where("id",$ques_id)->get("exam_questions")->row();
    }
    //根据问题itemid获取问题item详情
    public function getQuestionItem($ques_item_id){
        return $this->db->where("id",$ques_item_id)->get("exam_question_items")->row();
    }


    //获得问题数量

    public function getQuestionDataCount(){
        $items = $this->db;
        return $items->get('exam_questions_content')->num_rows();
    }

    //单纯根据id获取问题
    public function getQuesById($id){
       $data[] = $this->getQuestion($id)->getQuestionInfoView();
       return $data;
    }
    //根据问题id获取问题item
    public function getQuestionItemById($id){
        $data = array();
        $data['question'] = $this->db->select('*')->where("content_id",$id)->get("exam_questions")->result();
        foreach($data['question'] as $item){
            $item->ques_item = $this->db->select('*')->where("question_id",$item->id)->get("exam_question_items")->result();
        }
        return $data;
    }



    //根据id获取问题
    public function getQuestion($id){
        $amoeba = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("exam_questions_content")->row_array();
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

    public function delete(){
        if(!isset($this->id)){
            return false;
        }else{
            $this->db->where("id",$this->id);
            $this->db->delete("exam_questions_content");
        }
        return true;
    }
}  
