<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Paper extends CI_Model{



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
            'difficulty_id'  => array("require" => true),
            "title"          => array("require" => true),
            "description"    => array("require" => true),
            "type"           => array("require" => true),
            "scores"         => array("require" => true),
            "time"           => array("require" => true),
            "created_time"   => array("require" => true)
         );
        parent::_initialize($config);
    }

    /**
     * 上传试卷属性
     */
    public function uploadPaper($obj){
        $data = array(
            "school_id" =>  $obj['school'],
            "difficulty_id" => $obj['diffculty'],
            "title" => $obj['paper_title'],
            "description" => $obj['paper_description'],
            "type" => $obj['paper_range'],
            "scores" => $obj['paper_score'],
            "time" => $obj['paper_time'],
            "created_time" => date('Y-m-d H:i:s')
        );
        $this->db->insert('exam_paper',$data);
        $id = $this->db->insert_id();

        return $id;
    }

    /**
     * 上传试卷模块
     */
    public function savePaperModel($obj){
        $data = array(
            "paper_id" =>  $obj->paperId,
            "title" => $obj->modelName,
            "type" => $obj->skill,
            "model_time" => $obj->model_time,
            "section_name" => $obj->section_name,
            "answer_guide" => $obj->answer,
            "created_time" => date('Y-m-d H:i:s')
        );
        $this->db->insert('exam_paper_model',$data);
        $id = $this->db->insert_id();
        return $id;
    }

    /**
     * 上传试卷小节名称
     */
    public function savePaperSection($obj,$model_id){
        if(count($obj->per)>0){
            for($i=0;$i<count($obj->per);$i++){
                    $data = array(
                        "paper_id" =>  $obj->paperId,
                        "model_id" => $model_id,
                        "title" => $obj->modelName,
                        "type" => $obj->skill,
                        "model_time" => $obj->model_time,
                        "section_name" =>$obj->per[$i]->section_name,
                        "answer_guide" => $obj->per[$i]->answer,
                        "created_time" => date('Y-m-d H:i:s')
                    );
                    //插入试卷小节
                    $this->db->insert('exam_paper_model_section',$data);
                    $section_id = $this->db->insert_id();
                    $this->savePaperQues($obj,$model_id,$section_id,$i);
                }

            return true;
        }else{
            return 0;
        }
    }
    /**
     * 上传试卷模块问题
     */
    public function savePaperQues($obj,$model_id,$section_id,$i){
        if(count($obj->per)>0){
//            for($i=0;$i<count($obj->per);$i++){
                for($j=0;$j<count($obj->per[$i]->section);$j++) {
                    $data = array(
                        "model_id" => $model_id,
                        "section_id" => $section_id,
                        "question_id" => $obj->per[$i]->section[$j]->ques_id,
                        "question_item" => $obj->per[$i]->section[$j]->ques_them,
                        "scores" => $obj->per[$i]->section[$j]->ques_score,
                        "question_time" => $obj->per[$i]->section[$j]->ques_time,
                        "type" => $obj->per[$i]->section[$j]->type,
                        "created_time" => date('Y-m-d H:i:s')
                    );
                    //插入试卷问题
                    $this->db->insert('exam_paper_questions', $data);
                    $this->db->insert_id();
                }
//            }
            return true;
        }else{
            return 0;
        }
    }
    /**
     * @param int $limit
     * @param int $start
     * @param $post
     * @return array
     * 修改试卷模块
     */
    public function updatePaperModel($obj,$modelid){
        $data = array(
            "paper_id" =>  $obj->paperId,
            "title" => $obj->modelName,
            "type" => $obj->skill,
            "model_time" => $obj->model_time,
            "section_name" => $obj->section_name,
            "answer_guide" => $obj->answer,
            "created_time" => date('Y-m-d H:i:s')
        );
        $this->db->where("id",$modelid);
        $this->db->update('exam_paper_model',$data);
        return true;
    }

    /**
     * 修改试卷section
     */
    public function updatePaperSection($obj,$model_id){
        for($i=0;$i<count($obj->per);$i++){
            $data = array(
                "paper_id" =>  $obj->paperId,
                "model_id" => $model_id,
                "title" => $obj->modelName,
                "type" => $obj->skill,
                "model_time" => $obj->model_time,
                "section_name" =>$obj->per[$i]->section_name,
                "answer_guide" => $obj->per[$i]->answer,
                "created_time" => date('Y-m-d H:i:s')
            );
            //插入试卷小节
            $this->db->where("id",$obj->per[$i]->section_id);
            $this->db->update('exam_paper_model_section',$data);
            $this->updatePaperQues($obj,$model_id,$i);
        }
        return true;
    }

    /**
     * @param int $limit
     * @param int $start
     * @param $post
     * @return array
     * 修改试卷模块问题
     */
    public function updatePaperQues($obj,$model_id,$i){
        if(count($obj->per)>0){
            for($j=0;$j<count($obj->per[$i]->section);$j++) {
                $data = array(
                    "model_id" => $model_id,
                    "question_id" => $obj->per[$i]->section[$j]->ques_id,
                    "question_item" => $obj->per[$i]->section[$j]->ques_them,
                    "scores" => $obj->per[$i]->section[$j]->ques_score,
                    "question_time" => $obj->per[$i]->section[$j]->ques_time,
                    "type" => $obj->per[$i]->section[$j]->type,
                    "created_time" => date('Y-m-d H:i:s')
                );
                //插入试卷问题
                $this->db->where("id",$obj->per[$i]->section[$j]->model_ques_id);
                $this->db->update('exam_paper_questions',$data);
            }
//
//            for($i=0;$i<count($obj->per);$i++){
//                $data = array(
//                    "model_id" => $model_id,
//                    "question_id" => $obj->per[$i]->ques_id,
//                    "question_item" =>$obj->per[$i]->ques_them,
//                    "scores" => $obj->per[$i]->ques_score,
//                    "question_time" => $obj->per[$i]->ques_time,
//                    "type" => $obj->per[$i]->type,
//                    "created_time" => date('Y-m-d H:i:s')
//                );
//                //修改试卷问题
//                $this->db->where("id",$obj->per[$i]->model_ques_id);
//                $this->db->update('exam_paper_questions',$data);
//            }
            return true;
        }else{
            return 0;
        }
    }

    /*
     *
     * 获取问题列表数据
     */

    public function getPaperInfoList($limit=20,$start=0,$post){
        $data = array();
        $items = $this->db->select("id");
        if(isset($post['school_id']) && $post['school_id']){
            $items = $items->where("school_id",$post['school_id']);
        }
        if(isset($post['key']) && !empty($post['key'])){
            $items = $items->like("name",$post['key']);
        }
        $items = $items->limit($limit,$start)->get("exam_paper")->result();
        foreach($items as $item){
            $data[] = $this->getPaper($item->id)->getPaperInfoView();
        }
        return $data;
    }

    //获取问题view
    public function getPaperInfoView(){

        $data = array(
            'subject_num'    => $this->id,
            'paper_name'    => '<a href="'.anchorurl('home/examPDetail/'.$this->id).'">'.$this->title.'</a>',
            "paper_diff"    => $this->getDifficultyInfo($this->difficulty_id)->difficulty_name,
            "countTime"     => $this->time,
            "full_marks"    => $this->scores,
            "build_time"    => $this->created_time,
            "build_user"    => '周斌',
            'school'        => $this->getSchoolName($this->school_id)->name,
            "use_count"     => '',
            'remarks'       => '',
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


    //获得问题数量

    public function getParperDataCount(){
        $items = $this->db;
        return $items->get('exam_paper')->num_rows();
    }

    //根据id获取问题
    public function getPaper($id){
        $amoeba = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("exam_paper")->row_array();
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

    public function getParperModelList($model_id){
        $data = array();
        $data[] = $this->getPaperModel($model_id)->getPaperModelView();
        return $data;
    }

    //根据试卷id获取试卷内容
    public function gePaperDetailById($paperid){
        $data = array();
        $data[] = $this->getPaper($paperid)->getPaperInfoView();
        return $data;
    }

    //根据试卷获取模块和模块下的问题
    public function gePaperDetailModelById($paperid){
        $data = array();
        $data['paperModel'] = $this->db->select('*')->where("paper_id",$paperid)->get("exam_paper_model")->result();
        foreach($data['paperModel'] as $item){
            $item->name = $this->getType($item->type)->skill_name;
            $item->modelQues = $this->db->select('*')->where("model_id",$item->id)->get("exam_paper_questions")->result();
        }
        return $data;
    }

    //根据modeid获取新插入的model
    public function getPaperModel($id){
        $result= $this->db->select('*')->where("id",$id)->get("exam_paper_model")->row_array();
        return $result;
    }

    //根据modeid获取新插入的serction
    public function getPaperSection($id){
        $data = $this->db->select('*')->where("model_id",$id)->get("exam_paper_model_section")->result();
        return $data;
    }

    //根据类型id获取name
    public function getType($id){
        return $this->db->where("id",$id)->get("exam_questions_skill")->row();
    }

    //根据modeid获取新插入的model
    public function getPaperModelQues($id){
        $data = $this->db->select('*')->where("model_id",$id)->get("exam_paper_questions")->result();
        return $data;
    }

    //根据试卷id获取试卷详情

    //获取问题view
    public function getPaperModelView(){

        $data = array(
            'id'              => $this->id,
            'paper_id'        => $this->paper_id,
            "title"           => $this->title,
            "type"            => $this->getSkillInfo($this->type)->skill_name,
            "model_time"      => $this->model_time,
            "section_name`"   => $this->section_name,
            "answer_guide"    => $this->answer_guide,
            'created_time'    => $this->created_time,
        );
        return $data;
    }

    public function delete(){
        if(!isset($this->id)){
            return false;
        }else{
            $this->db->where("id",$this->id);
            $this->db->delete("exam_paper");
        }
        return true;
    }
}  
