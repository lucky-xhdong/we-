<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recordmanager extends CI_Model{


    public     $user_id          = 0;

    public     $group_id         = null;

    public     $content_id       = 0;

    public     $unit_id          = 0;

    public     $lesson_id        = 0;

    public     $part_id          = 0;

    public     $part_type        = null;

    public     $questions_type  = null;

    public     $start_time      = null;

    public     $end_time        = null;

    public     $course_id       = 0;

    public     $users = array();

    public    $partTypes = array(
                "listening",
                "comprehension",
                "interaction",
                "review_passage_summary",
                "review_sentence_reading",
                "review_sentence_formation",
                "review_sentence_repetition",
                "grammar_fill_in",
                "grammar_sentence_ordering",
                "grammar_sentence_formation",
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('lessonpart');
    }


    /**
     *
     * 获取我的完成率
     *
     */

    public function getMyCompletion(){
        $percentCompletion = 0;
        if($this->user_id){
            foreach($this->partTypes as $part_type){
                $this->part_type = $part_type;
                $percentCompletion += $this->getPartCompletion();
            }
        }
        return $percentCompletion/count($this->partTypes);
    }

    /*
     *
     * 获取我的正确率
     *
     */

    public function getMyCorrection(){
        $percentCorrection = 0;
        if($this->user_id){
            foreach($this->partTypes as $part_type){
                $this->part_type = $part_type;
                $percentCorrection += $this->getPartCorrection();
            }
        }
        return $percentCorrection/count($this->partTypes);
    }


   /**
    *
    * 完成率
    *
    */

    public function getPartCompletion(){
        $function = $this->part_type.'Completion';
        return  $this->$function();
    }

    public function getWhere($db){
        if($this->unit_id)         $db->where("unit_id",$this->unit_id);
        if($this->part_id)         $db->where("part_id ",$this->part_id);
        if($this->lesson_id)       $db->where("lesson_id ",$this->lesson_id);
        if($this->user_id)         $db->where("user_id  ",$this->user_id);
        if($this->course_id)       $db->where("course_id  ",$this->course_id );
        if($this->start_time)      $db->where("start_time  ",$this->start_time );
        return $db;
       // if(count($this->users))    $db->where_in("user_id  ",$this->users);
    }


    /*
     *
     * listen 完成率
     *
     */

    public function listeningCompletion(){
        $record = $this->db->select('count(*) as listenCount');
        $record  = $this->getWhere($record)->where("part_type",$this->part_type)->group_by("part_id")->get('users_record')->row();
        if($record){
            if($record->listenCount == 1) return 0.3;
            else if($record->listenCount == 2) return 0.6;
            else if($record->listenCount == 3) return 1;
        }else{
            return 0;
        }
    }


    /*
     *
     * comprehension 完成率
     *
     */

    public function comprehensionCompletion(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();
            if($part->total_items != 0 ){
                return count($records)/$part->total_items?count($records)/$part->total_items:0;
            }

        }
        return 0;
    }


    /*
    *
    * interaction 完成率
    *
    */

    public function interactionCompletion(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();
            if($part->total_items != 0 ) {
                return count($records) / $part->total_items ? count($records) / $part->total_items : 0;
            }
        }
        return 0;
    }


    /*
    *
    * review_passage_summary  完成率
    *
    */

    public function review_passage_summaryCompletion(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();
            if($part->total_items != 0 ) {
                return count($records) / $part->total_items ? count($records) / $part->total_items : 0;
            }
        }
        return 0;
    }


    /*
    *
    * review_sentence_reading  完成率
    *
    */

    public function review_sentence_readingCompletion(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();
            if($part->total_items != 0 ) {
                return count($records) / $part->total_items ? count($records) / $part->total_items : 0;
            }
        }
        return 0;
    }


    /*
    *
    * review_sentence_formation  完成率
    *
    */

    public function review_sentence_formationCompletion(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();
            if($part->total_items != 0 ) {
                return count($records) / $part->total_items ? count($records) / $part->total_items : 0;
            }
        }
        return 0;
    }


    /*
    *
    * review_sentence_repetition  完成率
    *
    */

    public function review_sentence_repetitionCompletion(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();
            if($part->total_items != 0 ) {
                return count($records) / $part->total_items ? count($records) / $part->total_items : 0;
            }
        }
        return 0;
    }

    /*
    *
    * grammar_fill_in  完成率
    *
    */

    public function grammar_fill_inCompletion(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();
            if($part->total_items != 0 ) {
                return count($records) / $part->total_items ? count($records) / $part->total_items : 0;
            }
        }
        return 0;
    }


    /*
    *
    * grammar_sentence_ordering  完成率
    *
    */

    public function grammar_sentence_orderingCompletion(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();
            if($part->total_items != 0 ) {
                return count($records) / $part->total_items ? count($records) / $part->total_items : 0;
            }
        }
        return 0;
    }


    /*
    *
    * grammar_sentence_formation  完成率
    *
    */

    public function grammar_sentence_formationCompletion(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();
            if($part->total_items != 0 ) {
                return count($records) / $part->total_items ? count($records) / $part->total_items : 0;
            }
        }
        return 0;
    }


    /*
    *
    * mt_1  完成率
    *
    */

    public function mt_1Completion(){
        return 0;
    }


    /*
    *
    * mt_2  完成率
    *
    */

    public function mt_2Completion(){
        return 0;
    }

    /*
    *
    * mt_3  完成率
    *
    */

    public function mt_3Completion(){
        return 0;
    }

    /*
    *
    * mt_4  完成率
    *
    */

    public function mt_4Completion(){
        return 0;
    }

    /*
     *
     * 正确率
     *
     */

    public function getPartCorrection(){
        $function = $this->part_type.'Correction';
        return  $this->$function();
    }

    /*
     *
     * listen 正确率
     *
     */

    public function listeningCorrection(){
        $record = $this->db->select('count(*) as listenCount');
        $record  = $this->getWhere($record)->where("part_type",$this->part_type)->group_by("part_id")->get('users_record')->row();
        if($record){
            if($record->listenCount == 1) return 0.3;
            else if($record->listenCount == 2) return 0.6;
            else if($record->listenCount == 3) return 1;
        }else{
            return 0;
        }
    }

    /*
     *
     * comprehension 完成率
     *
     */

    public function comprehensionCorrection(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();

            //正确题目数
            $correctrecords = $this->db->select('*');
            $correctrecords  = $this->getWhere($correctrecords)->where("part_type",$this->part_type)->where("iscorrect",1)->group_by("content_id")->get('users_record')->row();

            if($records && $correctrecords){
                return count($correctrecords)/count($records)?count($correctrecords)/count($records):0;
            }

        }
        return 0;
    }


    /*
     *
     * interaction 正确率
     *
     */

    public function interactionCorrection(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();

            //总题目数
            $correctrecords = $this->db->select('*');
            $correctrecords  = $this->getWhere($correctrecords)->where("part_type",$this->part_type)->where("iscorrect",1)->group_by("content_id")->get('users_record')->row();

            if($records && $correctrecords){
                return count($correctrecords)/count($records)?count($correctrecords)/count($records):0;
            }

        }
        return 0;
    }


    /*
     *
     * review_passage_summary 正确率
     *
     */

    public function review_passage_summaryCorrection(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();

            //总题目数
            $correctrecords = $this->db->select('*');
            $correctrecords  = $this->getWhere($correctrecords)->where("part_type",$this->part_type)->where("iscorrect",1)->group_by("content_id")->get('users_record')->row();

            if($records && $correctrecords){
                return count($correctrecords)/count($records)?count($correctrecords)/count($records):0;
            }

        }
        return 0;
    }


    /*
     *
     * review_sentence_reading 正确率
     *
     */

    public function review_sentence_readingCorrection(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();

            //总题目数
            $correctrecords = $this->db->select('*');
            $correctrecords  = $this->getWhere($correctrecords)->where("part_type",$this->part_type)->where("iscorrect",1)->group_by("content_id")->get('users_record')->row();
            if($records && $correctrecords){
                return count($correctrecords)/count($records)?count($correctrecords)/count($records):0;
            }

        }
        return 0;
    }


    /*
     *
     * review_sentence_formation 正确率
     *
     */

    public function review_sentence_formationCorrection(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();

            //总题目数
            $correctrecords = $this->db->select('*');
            $correctrecords  = $this->getWhere($correctrecords)->where("part_type",$this->part_type)->where("iscorrect",1)->group_by("content_id")->get('users_record')->row();
            if($records && $correctrecords){
                return count($correctrecords)/count($records)?count($correctrecords)/count($records):0;
            }

        }
        return 0;
    }


    /*
     *
     * review_sentence_repetition 正确率
     *
     */

    public function review_sentence_repetitionCorrection(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();

            //总题目数
            $correctrecords = $this->db->select('*');
            $correctrecords  = $this->getWhere($correctrecords)->where("part_type",$this->part_type)->where("iscorrect",1)->group_by("content_id")->get('users_record')->row();

            if($records && $correctrecords){
                return count($correctrecords)/count($records)?count($correctrecords)/count($records):0;
            }

        }
        return 0;
    }


    /*
     *
     * grammar_fill_in 正确率
     *
     */

    public function grammar_fill_inCorrection(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();

            //总题目数
            $correctrecords = $this->db->select('*');
            $correctrecords  = $this->getWhere($correctrecords)->where("part_type",$this->part_type)->where("iscorrect",1)->group_by("content_id")->get('users_record')->row();

            if($records && $correctrecords){
                return count($correctrecords)/count($records)?count($correctrecords)/count($records):0;
            }

        }
        return 0;
    }

    /*
     *
     * grammar_sentence_ordering 正确率
     *
     */

    public function grammar_sentence_orderingCorrection(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();

            //总题目数
            $correctrecords = $this->db->select('*');
            $correctrecords  = $this->getWhere($correctrecords)->where("part_type",$this->part_type)->where("iscorrect",1)->group_by("content_id")->get('users_record')->row();

            if($records && $correctrecords){
                return count($correctrecords)/count($records)?count($correctrecords)/count($records):0;
            }

        }
        return 0;
    }

    /*
     *
     * grammar_sentence_formation	练习介词和复合句 正确率
     *
     */

    public function grammar_sentence_formationCorrection(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("part_type",$this->part_type)->group_by("content_id")->get('users_record')->row();

            //总题目数
            $correctrecords = $this->db->select('*');
            $correctrecords  = $this->getWhere($correctrecords)->where("part_type",$this->part_type)->where("iscorrect",1)->group_by("content_id")->get('users_record')->row();

            if($records && $correctrecords){
                return count($correctrecords)/count($records)?count($correctrecords)/count($records):0;
            }

        }
        return 0;
    }

    /*
     *
     * mt_1	练习介词和复合句 正确率
     *
     */

    public function mt_1Correction(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);

            //总题目数
            $correctrecords = $this->db->select('*');
            $correctrecords  = $this->getWhere($correctrecords)->where("part_type",$this->part_type)->where("iscorrect",1)->group_by("content_id")->get('users_record')->row();
            return count($correctrecords)*5;

        }
        return 0;
    }

    /*
     *
     * mt_2	练习介词和复合句 正确率
     *
     */

    public function mt_2Correction(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);

            //总题目数
            $correctrecords = $this->db->select('*');
            $correctrecords  = $this->getWhere($correctrecords)->where("part_type",$this->part_type)->where("iscorrect",1)->group_by("content_id")->get('users_record')->row();
            return count($correctrecords)*7;

        }
        return 0;
    }

    /*
     *
     * mt_3	练习介词和复合句 正确率
     *
     */

    public function mt_3Correction(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);

            //总题目数
            $correctrecords = $this->db->select('*');
            $correctrecords  = $this->getWhere($correctrecords)->where("part_type",$this->part_type)->where("iscorrect",1)->group_by("content_id")->get('users_record')->row();
            return count($correctrecords)*3;

        }
        return 0;
    }


    /*
     *
     * mt_4	练习介词和复合句 正确率
     *
     */

    public function mt_4Correction(){
        if($this->part_id){
            $part = $this->lessonpart->getLessonpart($this->part_id);

            //总题目数
            $correctrecords = $this->db->select('*');
            $correctrecords  = $this->getWhere($correctrecords)->where("part_type",$this->part_type)->where("iscorrect",1)->group_by("content_id")->get('users_record')->row();
            return count($correctrecords)*5;

        }
        return 0;
    }


    /*
     *  学情指数评价维度
     *
     * 单个学生完成率
     */

    public function getUserPartsCompletion(){
        if($this->user_id){
            $parts = $this->db->where("user_id",$this->user_id)->group_by("part_id")->get('users_record')->result();
            $percent = 0;
            foreach($parts as $part){
                if(empty($part->part_type) || !in_array($part->part_type,$this->partTypes)) continue;
                $this->part_type = $part->part_type;
                $this->part_id = $part->part_id;
                $percent += $this->getPartCompletion();
            }
            if(count($parts)){
                return $percent/count($parts);
            }
        }
        return 0;
    }


    /*
     *  学情指数评价维度
     *
     * 单个学生正确率
     */

    public function getUserPartsCorrect(){
        if($this->user_id){
            $parts = $this->db->where("user_id",$this->user_id)->group_by("part_id")->get('users_record')->result();
            $percent = 0;
            foreach($parts as $part){
                $this->part_type = $part->part_type;
                if(empty($part->part_type) || !in_array($part->part_type,$this->partTypes)) continue;
                $this->part_id = $part->part_id;
                $percent += $this->getPartCorrection();
            }
            if(count($parts)){
                return $percent/count($parts);
            }
        }
        return 0;
    }


    /*
     *  学情指数评价维度
     *
     * 单个学生达标率
     */

    public function getUserPartsPass(){
        if($this->user_id){
            $parts = $this->db->where("user_id",$this->user_id)->group_by("part_id")->get('users_record')->result();
            $percent = 0;
            foreach($parts as $part){
                $this->part_type = $part->part_type;
                if(empty($part->part_type) || !in_array($part->part_type,$this->partTypes)) continue;
                $this->part_id = $part->part_id;
                $percent += $this->getPartCorrection();
            }
            if(count($parts)){
                return $percent/count($parts);
            }
        }
        return 0;
    }


    /*
     *
     * MT 平均分
     *
     */


    public function getUserMTaverage(){
        if($this->user_id){
            $parts = $this->db->where("user_id",$this->user_id)->group_by("part_id")->get('users_record')->result();
            $totalPoint = 0;
            foreach($parts as $part){
                $totalPoint += $this->mt_1Correction()+$this->mt_2Correction()+$this->mt_3Correction()+$this->mt_4Completion();
            }
            if(count($parts)){
                return $totalPoint/count($parts);
            }
        }
        return 0;
    }


    /**
     *
     * MT 个人单元最高得分
     *
     */


    public function getUserMTScores($lesson_id){
        if($this->user_id){
            $row = $this->db->select("SUM(scores) as totalScore")->where("user_id",$this->user_id)->where("iscorrect",1)->where("lesson_id",$lesson_id)->order_by("totalScore","desc")->group_by("group_id")->get('users_record')->row();
            if($row){
                return $row->totalScore;
            }
        }
        return 0;
    }

    /**
     *
     * MT 个人得分LIST
     *
     */


    public function getUserMTScoresList($lesson_id){
        $data = array();
        if($this->user_id){
            $rows = $this->db->select("users_record.*,SUM(scores) as totalScore")->where("user_id",$this->user_id)->where("iscorrect",1)->where("lesson_id",$lesson_id)->group_by("group_id")->get('users_record')->result();
            foreach($rows as $row){
                if( $row->date == '0000-00-00') continue;
                $data[] = array(
                    "date"=>$row->date,
                    "scores"=>$row->totalScore,
                );
            }
        }
        return $data;
    }



    /*
     *
     * 语音识别率
     *
     */


    public function getUserSrPecent(){
        if($this->user_id){
            $totalitems = $this->db
                ->select("count(*) as num")
                ->where("user_id",$this->user_id)
                ->where("questions_type",'sr')
                ->group_by("content_id")
                ->get('users_record')->result();

            $correst = $this->db
                ->select("count(*) as num")
                ->where("user_id",$this->user_id)
                ->where("questions_type",'sr')
                ->where("iscorrect",1)
                ->group_by("content_id")
                ->get('users_record')->result();
            if($correst){
                return count($correst)/count($totalitems);
            }
        }
        return 0;
    }


   /**
    *
    *  学习效果 20%;
    */
    public function getUserStudyReuslt(){
        if($this->user_id){
            $Completion  = $this->getUserPartsCompletion();
            $Correct    = $this->getUserPartsCorrect();
            $Pass       = $this->getUserPartsPass();
            $mt         = $this->getUserMTaverage();
            $sr         = $this->getUserSrPecent();
            return ($Completion+ $Correct+ $Pass+$mt+$sr)*0.04;
        }
        return 0;
    }

    /**
     *
     * 学习进度 20%
     *
     */

    /*
     * 已学课程数目
     *
     */
    public function getUserStudyCourse(){
        $course = $this->db->select("count(*) as num")->where("course_id !=",0)->where("user_id",$this->user_id)->group_by("course_id")->get('users_record')->result();
        return count($course)?count($course)/1:0;
    }

    /*
     * 已学单元数目
     *
     */
    public function getUserSchedule(){
        $unit = $this->db->select("id")->where("unit_id >",0)->where("user_id",$this->user_id)->group_by("unit_id")->get('users_record')->result();
        return count($unit)?count($unit)/6:0;
    }

    /**
     *  学习进度计算结果 20%
     */
    public function getUserStudyCourseAverage(){
        return  $this->getUserStudyCourse()*0.04+ $this->getUserSchedule()*0.16;
    }


    /**
     *
     * 学习方法 20%
     *
     */


    public function getUserButtonCount($type='repeat_count'){
        $count = $this->db->select("SUM("+$type+") as num")
                 ->where("user_id",$this->user_id)
                ->get('users_record')->row();
        return $count->num?$count->num:0;
    }


    /*
     *
     * 重复键比文文字建
     */
    public function getUserRepeatRatioAbc(){
        $repeat = $this->db->select("SUM(repeat_count) as num")->where("user_id",$this->user_id)->get('users_record')->row();
        $abc = $this->db->select("SUM(abc_count) as num")->where("user_id",$this->user_id)->get('users_record')->row();
        if($abc && $abc->num != 0){
            $pencent = $repeat/$abc;
            if($pencent > 3) return 0.07;
            else if($pencent >2 && $pencent <= 3) 0.05;
            else if($pencent >1 && $pencent <= 2) 0.03;
            else if($pencent == 1) 0.02;
            else if($pencent < 1) 0;
            else 0;
        }
        return 0;
    }

    /**
     *
     * 录音键和回听键比例
     */
    public function getUserMicRatioHead(){
        $repeat = $this->db->select("SUM(mic_count) as num")->where("user_id",$this->user_id)->get('users_record')->row();
        $abc = $this->db->select("SUM(head_count) as num")->where("user_id",$this->user_id)->get('users_record')->row();
        if($abc && $abc->num != 0){
            $pencent = $repeat/$abc;
            if($pencent == 1) return 0.05;
            else if($pencent >0.6 && $pencent <1 ) 0.04;
            else if($pencent >0.4 && $pencent <= 0.6) 0.03;
            else if($pencent > 0.2 && $pencent <= 0.4 ) 0.02;
            else if($pencent <= 0.2) 0.01;
            else 0;
        }
        return 0;
    }

    /**
     * 重复建录音键比回听键
     *
     */
    public function getUserRepeatRatioMicRatioHead(){
        $repeat  = $this->db->select("SUM(repeat_count) as num")->where("user_id",$this->user_id)->get('users_record')->row();
        $mic     = $this->db->select("SUM(mic_count) as num")->where("user_id",$this->user_id)->get('users_record')->row();
        $head    = $this->db->select("SUM(head_count) as num")->where("user_id",$this->user_id)->get('users_record')->row();
        if($mic && $head && $mic->num != 0 && $head->num != 0){
            $pencent = $repeat/$mic/$head;
            if($pencent >3 ) return 0.04;
            else if($pencent ==3 ) 0.03;
            else if($pencent >=2 && $pencent <= 3) 0.02;
            else if($pencent >= 1 && $pencent < 2 ) 0.01;
            else if($pencent < 1) 0;
            else 0;
        }
        return 0;
    }

    /*
     *
     * 学习方法得分
     */

    /*
     *
     * 学习时间
     * 系统默认最高学习时间 14天12小时,最低 2小时
     */

    public function getUserStudyTime(){
        $point = 0;
        $count = 0;
        $totalPoint = 0;
        if($this->start_time && $this->end_time){
            while(true){
                $end_time = date('Y-m-d',strtotime($this->start_time. '+ 14 days'));
                $totalTime  = $this->db->select("SUM(time) as num")
                    ->where("user_id",$this->user_id)
                    ->where("start_time >=",$this->start_time)
                    ->where("end_time <=",$end_time)
                    ->get('users_record')->row();
                if($totalTime){
                    $total = $totalTime->num?$totalTime->num:0;
                    $point = 3/2*(round($total/60*60,2)/2-1);
                    if($point > 1.5) $point = 1.5;
                    elseif($point < -1.5) $point = -1.5;
                }else{
                    $point = 0;
                }
                $totalPoint += $point;
                $count++;
                $this->start_time = $end_time;
                if($this->start_time > $this->end_time){
                    break;
                }
            }
        }
       return round($totalPoint/$count,2);
    }


    /*
     *
     * 总学习时间
     *
     */

    public function getUserStudyTimeS(){
            $totalTime  = $this->db->select("SUM(time) as num")
                ->where("user_id",$this->user_id)
                ->get('users_record')->row();
        return $totalTime->num?$totalTime->num:0;
    }


    /*
     *
     * 学习频率
     *
     */

    public function getUserStudyFrequency(){
        $point = 0;
        $count = 0;
        $totalPoint = 0;
        if($this->start_time && $this->end_time){
            while(true){
                $end_time = date('Y-m-d',strtotime($this->start_time. '+ 14 days'));
                $totalTime  = $this->db->select("count(*) as num")
                    ->where("user_id",$this->user_id)
                    ->where("start_time >=",$this->start_time)
                    ->where("end_time <=",$end_time)
                    ->group_by('date')
                    ->get('users_record')->row();
                if($totalTime){
                    $total = $totalTime->num?$totalTime->num:0;
                    $point = 3/2*($total/2-2);
                    if($point > 1.5) $point = 1.5;
                    elseif($point < -1.5) $point = -1.5;
                }else{
                    $point = 0;
                }
                $totalPoint += $point;
                $count++;
                $this->start_time = $end_time;
                if($this->start_time > $this->end_time){
                    break;
                }
            }
        }
        return round($totalPoint/$count,2);
    }

   /*
    *
    * 获取学生学习总天数
    */

    public function getStudentStudyDays(){
        $totalTime  = $this->db->select("id")
            ->where("user_id",$this->user_id)
            ->group_by('date')
            ->get('users_record')->result();
        return $totalTime?count($totalTime):0;
    }


    /*
     *
     * 平均单天次学习时间
     *
     */

    public function getUserStudyTimePerDay(){
        $point = 0;
        $count = 0;
        $totalPoint = 0;
        if($this->start_time && $this->end_time){
            while(true){
                $end_time = date('Y-m-d',strtotime($this->start_time. '+ 14 days'));
                $totalTime  = $this->db->select("SUM(time) as num")
                    ->where("user_id",$this->user_id)
                    ->where("start_time >=",$this->start_time)
                    ->where("end_time <=",$end_time)
                    ->group_by('date')
                    ->get('users_record')->row();


                $totalday  = $this->db->select("count(*) as num")
                    ->where("user_id",$this->user_id)
                    ->where("start_time >=",$this->start_time)
                    ->where("end_time <=",$end_time)
                    ->group_by('date')
                    ->get('users_record')->row();

                if($totalTime && $totalday){
                    $total = $totalTime->num?$totalTime->num:0;
                    $totald = $totalday->num?$totalday->num:0;
                    if($totald){
                        $point = 2/25*($total/2/($totald/2)-7/5)*4/2;
                        if($point > 2) $point = 2;
                        elseif($point < -2) $point = -2;
                    }else{
                        $point = -2;
                    }
                }else{
                    $point = 0;
                }
                $totalPoint += $point;
                $count++;
                $this->start_time = $end_time;
                if($this->start_time > $this->end_time){
                    break;
                }
            }
        }
        return round($totalPoint/$count,2);
    }


    /*
     *
     * 正确率
     *
     */

    public function getUserStudyCorrectionWight(){
        $point = 0;
        $count = 0;
        $totalPoint = 0;
        if($this->start_time && $this->end_time){
            while(true){
                $end_time   = date('Y-m-d',strtotime($this->start_time. '+ 14 days'));
                $total_content  = $this->db->select("count(*) as num")
                    ->where("user_id",$this->user_id)
                    ->where("start_time >=",$this->start_time)
                    ->where("end_time <=",$end_time)
                    ->group_by('content_id')
                    ->get('users_record')->row();


                $correct_content  = $this->db->select("count(*) as num")
                    ->where("user_id",$this->user_id)
                    ->where("start_time >=",$this->start_time)
                    ->where("end_time <=",$end_time)
                    ->where("iscorrect",1)
                    ->group_by('content_id')
                    ->get('users_record')->row();

                if($total_content && $correct_content){
                    $total   = $total_content->num?$total_content->num:0;
                    $correct = $correct_content->num?$correct_content->num:0;
                    if($correct){
                        $point = 3/80*(round($correct/$total)*100-60);
                        if($point > 1.5) $point = 1.5;
                        elseif($point < -1.5) $point = -1.5;
                    }else{
                        $point = -1.5;
                    }
                }else{
                    $point = 0;
                }
                $totalPoint += $point;
                $count++;
                $this->start_time = $end_time;
                if($this->start_time > $this->end_time){
                    break;
                }
            }
        }
        return round($totalPoint/$count,2);
    }

    /*
   *
   * 正确率
   *
   */

    public function getUserStudyCorrection(){
        $point = 0;
        $count = 0;
        $totalPoint = 0;
        if($this->start_time && $this->end_time){
            while(true){
                $end_time   = date('Y-m-d',strtotime($this->start_time. '+ 14 days'));
                $total_content  = $this->db->select("count(*) as num")
                    ->where("user_id",$this->user_id)
                    ->where("start_time >=",$this->start_time)
                    ->where("end_time <=",$end_time)
                    ->group_by('content_id')
                    ->get('users_record')->row();


                $correct_content  = $this->db->select("count(*) as num")
                    ->where("user_id",$this->user_id)
                    ->where("start_time >=",$this->start_time)
                    ->where("end_time <=",$end_time)
                    ->where("iscorrect",1)
                    ->group_by('content_id')
                    ->get('users_record')->row();

                if($total_content && $correct_content){
                    $total   = $total_content->num?$total_content->num:0;
                    $correct = $correct_content->num?$correct_content->num:0;
                    if($correct) {
                        $point = round($correct / $total);
                    }else{
                        $point = 0;
                    }
                }else{
                    $point = 0;
                }
                $totalPoint += $point;
                $count++;
                $this->start_time = $end_time;
                if($this->start_time > $this->end_time){
                    break;
                }
            }
        }
        return round($totalPoint/$count,2);
    }


    /*
     *
     * 语音识别率
     *
     */

    public function getUserStudySrCorrectionWeight(){
        $point = 0;
        $count = 0;
        $totalPoint = 0;
        if($this->start_time && $this->end_time){
            while(true){
                $end_time   = date('Y-m-d',strtotime($this->start_time. '+ 14 days'));
                $total_content  = $this->db->select("count(*) as num")
                    ->where("user_id",$this->user_id)
                    ->where("start_time >=",$this->start_time)
                    ->where("end_time <=",$end_time)
                    ->where("questions_type","sr")
                    ->group_by('content_id')
                    ->get('users_record')->row();


                $correct_content  = $this->db->select("count(*) as num")
                    ->where("user_id",$this->user_id)
                    ->where("start_time >=",$this->start_time)
                    ->where("end_time <=",$end_time)
                    ->where("questions_type","sr")
                    ->where("iscorrect",1)
                    ->group_by('content_id')
                    ->get('users_record')->row();

                if($total_content && $correct_content){
                    $total   = $total_content->num?$total_content->num:0;
                    $correct = $correct_content->num?$correct_content->num:0;
                    if($correct){
                        $point = 3/80*(round($correct/$total)*100-60);
                        if($point > 1.5) $point = 1.5;
                        elseif($point < -1.5) $point = -1.5;
                    }else{
                        $point = -1.5;
                    }
                }else{
                    $point = 0;
                }
                $totalPoint += $point;
                $count++;
                $this->start_time = $end_time;
                if($this->start_time > $this->end_time){
                    break;
                }
            }
        }
        return round($totalPoint/$count,2);
    }

    public function getUserStudySrCorrection(){
        $point = 0;
        $count = 0;
        $totalPoint = 0;
        if($this->start_time && $this->end_time) {
            while (true) {
                $end_time = date('Y-m-d', strtotime($this->start_time . '+ 14 days'));
                $total_content = $this->db->select("count(*) as num")
                    ->where("user_id", $this->user_id)
                    ->where("start_time >=", $this->start_time)
                    ->where("end_time <=", $end_time)
                    ->where("questions_type", "sr")
                    ->group_by('content_id')
                    ->get('users_record')->row();


                $correct_content = $this->db->select("count(*) as num")
                    ->where("user_id", $this->user_id)
                    ->where("start_time >=", $this->start_time)
                    ->where("end_time <=", $end_time)
                    ->where("questions_type", "sr")
                    ->where("iscorrect", 1)
                    ->group_by('content_id')
                    ->get('users_record')->row();
                if($total_content && $correct_content){
                    $total   = $total_content->num?$total_content->num:0;
                    $correct = $correct_content->num?$correct_content->num:0;
                    $point = ceil($correct/$total);
                }else{
                    $point = 0;
                }
                $totalPoint += $point;
                $count++;
                $this->start_time = $end_time;
                if($this->start_time > $this->end_time){
                    break;
                }
            }
        }
        return round($totalPoint/$count,2);
    }


    /*
     *
     * 完成率
     *
     */



    public function getUserStudyCompletion(){
        $point = 0;
        $count = 0;
        $totalPoint = 0;
        $totalCompetion = 0;
        if($this->start_time && $this->end_time){
            while(true){
                $end_time   = date('Y-m-d',strtotime($this->start_time. '+ 14 days'));
                $parts  = $this->db->select("*")
                    ->where("user_id",$this->user_id)
                    ->where("start_time >=",$this->start_time)
                    ->where("end_time <=",$end_time)
                    ->group_by('part_id')
                    ->get('users_record')->result();
                $Completion = 0;
                $totalCompetion = 0;
                foreach($parts as $part){
                    $this->part_id = $part->part_id;
                    $this->part_type = $part->part_type;
                    $this->start_time = null;
                    $Completion +=$this->getPartCompletion();
                }
                if(count($parts) > 0) $totalCompetion =  $Completion/count($parts);
                else $totalCompetion = 0;
                if($totalCompetion){
                    if($totalCompetion){
                        $point = 3/80*(round($totalCompetion)*100-60);
                        if($point > 1.5) $point = 1.5;
                        elseif($point < -1.5) $point = -1.5;
                    }else{
                        $point = -1.5;
                    }
                }else{
                    $point = 0;
                }
                $totalPoint += $point;
                $count++;
                $this->start_time = $end_time;
                if($this->start_time > $this->end_time){
                    break;
                }

            }
        }
        return round($totalPoint/$count,2);
    }


    /*
     *
     * 单元测试
     *
     */

    public function getUserStudypartQuiz(){
        $point = 0;
        $count = 0;
        $totalPoint = 0;
        if($this->start_time && $this->end_time){
            while(true){
                $end_time   = date('Y-m-d',strtotime($this->start_time. '+ 14 days'));
                $total_content  = $this->db->select("count(*) as num")
                    ->where("user_id",$this->user_id)
                    ->where("start_time >=",$this->start_time)
                    ->where("end_time <=",$end_time)
                    ->where_in("part_type",array("mt_1","mt_2","mt_3","mt_4"))
                    ->group_by('unit_id')
                    ->get('users_record')->row();


                $totalpoint  = $this->db->select("count(scores) as num")
                    ->where("user_id",$this->user_id)
                    ->where("start_time >=",$this->start_time)
                    ->where("end_time <=",$end_time)
                    ->where_in("part_type",array("mt_1","mt_2","mt_3","mt_4"))
                    ->where("iscorrect",1)
                    ->group_by('content_id')
                    ->get('users_record')->row();

                if($total_content && $totalpoint){
                    $total   = $total_content->num?$total_content->num:0;
                    $correct = $totalpoint->num?$totalpoint->num:0;
                    if($correct){
                        $point = 2/80*(round($correct/$total)-60);
                        if($point > 1) $point = 1;
                        elseif($point < -1) $point = -1;
                    }else{
                        $point = -1;
                    }
                }else{
                    $point = 0;
                }
                $totalPoint += $point;
                $count++;
                $this->start_time = $end_time;
                if($this->start_time > $this->end_time){
                    break;
                }
            }
        }
        return round($totalPoint/$count,2);
    }


    /*
     *
     * 功能键得分
     *
     */

    public function getUserStudyButtons(){
        $point = 0;
        $count = 0;
        $totalPoint = 0;
        if($this->start_time && $this->end_time){
            while(true){
                $end_time   = date('Y-m-d',strtotime($this->start_time. '+ 14 days'));

                $repeat  = $this->db->select("SUM(repeat_count) as num,SUM(mic_count) as num1,SUM(head_count) as num2")->where("start_time >=",$this->start_time)
                    ->where("end_time <=",$end_time)->where("user_id",$this->user_id)->get('users_record')->row();

//                $mic     = $this->db->select("SUM(mic_count) as num")->where("start_time >=",$this->start_time)
//                    ->where("end_time <=",$end_time)->where("user_id",$this->user_id)->get('users_record')->row();
//                $head    = $this->db->select("SUM(head_count) as num")->where("start_time >=",$this->start_time)
//                    ->where("end_time <=",$end_time)->where("user_id",$this->user_id)->get('users_record')->row();
                $correactionRation = $this->getUserStudyCorrection();
                $correactionSrRation = $this->getUserStudySrCorrection();

                $repeatCount = $repeat->num?$repeat->num:0;

                $miccount    = $repeat->num1?$repeat->num1:0;

                $headcount   = $repeat->num2?$repeat->num2:0;

                $totalButtonCount = $repeatCount+ $miccount+$headcount;


                $minCorrect = $correactionRation>$correactionSrRation?$correactionSrRation:$correactionRation;

                if($miccount > 0){
                    if($minCorrect > 60 && $minCorrect< 100){
                        $totalButtonCount = $totalButtonCount>18?18:$totalButtonCount;
                        $point = 3*($totalButtonCount-9)/18-(1-$headcount/$miccount);
                    }elseif($minCorrect <= 60){
                        $totalButtonCount = $totalButtonCount>36?36:$totalButtonCount;
                        $point = 3*($totalButtonCount-18)/36-(1-$headcount/$miccount);
                    }else{
                        $point = 0;
                    }
                }else{
                    $point = 0;
                }

                if($point > 1.5) $point = 1.5;
                elseif($point < -1.5) $point = -1.5;

                $totalPoint += $point;
                $count++;
                $this->start_time = $end_time;
                if($this->start_time > $this->end_time){
                    break;
                }
            }
        }
        return round($totalPoint/$count,2);
    }

    public function getUserStudyScores(){
        $ponit = 0;
        $total = $this->getUserStudyTime() + $this->getUserStudyFrequency() + $this->getUserStudyTimePerDay() +
                 $this->getUserStudyCorrectionWight() + $this->getUserStudyCorrectionWight() + $this->getUserStudyCompletion()
                + $this->getUserMTaverage() + $this->getUserStudyButtons();
        if($total >= -12 && $total <= -2){
            $ponit = 0;
        }else if($total > -2 && $total <= 1){
            $ponit = 0.01;
        }else if($total > 1 && $total <= 4){
            $ponit = 0.02;
        }else if($total > 4 && $total <= 8){
            $ponit = 0.03;
        }else if($total > 8 && $total <= 12){
            $ponit = 0.04;
        }else{
            $ponit = 0;
        }
        return $ponit;
    }

    /*
     *  学习方法功能键和SS得分
     *
     *
     */

    public function getUserStudyComprehensive(){
        return $this->getUserStudyScores() + $this->getUserRepeatRatioAbc() + $this->getUserMicRatioHead() + $this->getUserRepeatRatioMicRatioHead();
    }

    /**
     *
     * 技能得分
     *
     */


    /*
     *
     * 听力理解得分
     */

    public function getUserSkillListen(){
        if($this->user_id){
            $parts = $this->db
                ->where("user_id",$this->user_id)
                ->where("skill_type",'listen_comprehension')
                ->group_by("part_id")->get('users_record')->result();
            $point = 0;
            foreach($parts as $part){
                $this->part_type = $part->part_type;
                $this->part_id = $part->part_id;
                $point += $this->getPartCorrection()*$part->weight;
            }
            return $point;
        }
        return 0;
    }

    /*
     *
     * 口语能力得分
     *
     */

    public function getUserSkillSPeak(){
        if($this->user_id){
            $parts = $this->db->where("user_id",$this->user_id)
                ->where("skill_type",'speak')
                ->group_by("part_id")->get('users_record')->result();
            $point = 0;
            foreach($parts as $part){
                $this->part_type = $part->part_type;
                $this->part_id = $part->part_id;
                $point += $this->getPartCorrection()*$part->weight;
            }
            return $point;
        }
        return 0;
    }

    /*
     *
     * 语法能力得分
     *
     */

    public function getUserSkillGrammer(){
        if($this->user_id){
            $parts = $this->db->where("user_id",$this->user_id)
                ->where("skill_type",'grammer')
                ->group_by("part_id")->get('users_record')->result();
            $point = 0;
            foreach($parts as $part){
                $this->part_type = $part->part_type;
                $this->part_id = $part->part_id;
                $point += $this->getPartCorrection()*$part->weight;
            }
            return $point;
        }
        return 0;
    }

    /**
     * 技能20分权重得分 技能情况
     *
     */
    public function getUserSkillAverage(){
        return $this->getUserSkillListen()*0.07 + $this->getUserSkillSPeak()*0.07 + $this->getUserSkillGrammer()*0.06;
    }


    /**
     *
     *
     * 学习时间与频率 20%;
     *
     * */

     /*
      *
      * 平均每周学习天次
      *
      */

    public function getUserAveragePerWeekDays(){
        $weight = 0;
        if($this->start_time && $this->end_time){
           $totaldays = $this->getDays();
           $totalweek =  intval($totaldays/7);

            //学习总天数
            $studyDays  = $this->db->select("count(*) as num")
                ->where("user_id",$this->user_id)
                ->where("start_time >=",$this->start_time)
                ->where("end_time <=",$this->end_time)
                ->group_by('date')
                ->get('users_record')->row();
            if($studyDays){
                $studyDays = $studyDays->num?$studyDays->num:0;
                if($totalweek > 0) $weekStudyDays = intval($studyDays/$totalweek);
                else  $weekStudyDays = 0;
                switch($weekStudyDays){
                    case 1:
                        $weight = 0.1*0.05;
                        break;
                    case 2:
                        $weight = 0.4*0.05;
                        break;
                    case 3:
                        $weight = 0.6*0.05;
                        break;
                    case 4:
                        $weight = 0.7*0.05;
                        break;
                    case 5:
                        $weight = 0.8*0.05;
                        break;
                    case 6:
                        $weight = 0.9*0.05;
                        break;
                    case 7:
                        $weight = 1*0.05;
                        break;
                    default:
                        $weight = 0;
                }
            }
        }
        return $weight;
    }


    /*
     *
     * 平均每周学习时间
     *
     */

    public function getUserAveragePerWeekTime(){
        $weight = 0;
        if($this->start_time && $this->end_time){
            $totaldays = $this->getDays();
            $totalweek =  intval($totaldays/7);

            //学习总天数
            $studyDays  = $this->db->select("count(time) as num")
                ->where("user_id",$this->user_id)
                ->where("start_time >=",$this->start_time)
                ->where("end_time <=",$this->end_time)
                ->get('users_record')->row();
            if($studyDays){
                $studyTime = $studyDays->num?$studyDays->num:0;
                if($totalweek >0) $weekStudyDays = round(intval($studyTime/$totalweek)/60*60,1);
                else $weekStudyDays =0;
               // $weekStudyDays = intval($studyDays/$totalweek);
                if($weekStudyDays > 0 && $weekStudyDays <=1){
                    $weight = 0.1*0.05;
                }else if($weekStudyDays > 1 && $weekStudyDays <=2){
                    $weight = 0.4*0.05;
                }else if($weekStudyDays > 2 && $weekStudyDays <=3){
                    $weight = 0.6*0.05;
                }else if($weekStudyDays > 3 && $weekStudyDays <=4){
                    $weight = 0.7*0.05;
                }else if($weekStudyDays > 4 && $weekStudyDays <= 5){
                    $weight = 0.8*0.05;
                }else if($weekStudyDays > 5 && $weekStudyDays <=6){
                    $weight = 0.9*0.05;
                }else if($weekStudyDays > 6 && $weekStudyDays <=7){
                    $weight = 1*0.05;
                }else{
                    $weight = 0;
                }
            }
        }
        return $weight;
    }


    /*
     *
     * 平均总学习天次
     *
     */

    public function getUserAverageTotalDays(){
        $weight = 0;
        if($this->start_time && $this->end_time){
            $totaldays = $this->getDays();
            $totalweek =  intval($totaldays/7);

            //学习总天数
            $studyDays  = $this->db->select("count(*) as num")
                ->where("user_id",$this->user_id)
                ->where("start_time >=",$this->start_time)
                ->where("end_time <=",$this->end_time)
                ->group_by('date')
                ->get('users_record')->row();

            $studyTime  = $this->db->select("SUM(time) as num")
                ->where("user_id",$this->user_id)
                ->where("start_time >=",$this->start_time)
                ->where("end_time <=",$this->end_time)
                ->get('users_record')->row();

            if($studyDays){
                $studyTime = $studyTime->num?$studyTime->num:0;
                if($totalweek >0) $weekStudyTimes = round(intval($studyTime/$totalweek)/60,1);
                else $weekStudyTimes = 0;
                if($weekStudyTimes > 0 && $weekStudyTimes <=1){
                    $weight = 0.1*0.05;
                }else if($weekStudyTimes > 1 && $weekStudyTimes <=1.5){
                    $weight = 0.2*0.05;
                }else if($weekStudyTimes > 1.5 && $weekStudyTimes <=2){
                    $weight = 0.4*0.05;
                }else if($weekStudyTimes > 2 && $weekStudyTimes <=2.5){
                    $weight = 0.6*0.05;
                }else if($weekStudyTimes > 2.5 && $weekStudyTimes <=3){
                    $weight = 0.7*0.05;
                }else if($weekStudyTimes > 3 && $weekStudyTimes <=3.5){
                    $weight = 0.8*0.05;
                }else if($weekStudyTimes > 3.5 && $weekStudyTimes <=4){
                    $weight = 0.9*0.05;
                }else if($weekStudyTimes >4 && $weekStudyTimes <=4.5){
                    $weight = 0.95*0.05;
                }else if($weekStudyTimes >4.5){
                    $weight = 1*0.05;
                }else{
                    $weight = 0;
                }
            }
        }
        return $weight;
    }


    /*
    *
    * 平均总学习时间
    *
    */

    public function getUserAverageTotalTime(){
        $weight = 0;
        if($this->start_time && $this->end_time){
            $totaldays = $this->getDays();
            $totalweek =  intval($totaldays/7);

            //学习总天数
            $studyDays  = $this->db->select("count(*) as num")
                ->where("user_id",$this->user_id)
                ->where("start_time >=",$this->start_time)
                ->where("end_time <=",$this->end_time)
                ->group_by('date')
                ->get('users_record')->row();

            $studyTime  = $this->db->select("SUM(time) as num")
                ->where("user_id",$this->user_id)
                ->where("start_time >=",$this->start_time)
                ->where("end_time <=",$this->end_time)
                ->get('users_record')->row();

            if($studyDays){
                $studyTime = $studyTime->num?$studyTime->num:0;

                if($studyTime >= $totalweek*1 && $studyTime <=$totalweek*1.5){
                    $weight = 0.1*0.05;
                }else if($studyTime > $totalweek*1 && $studyTime <= $totalweek*1.5){
                    $weight = 0.2*0.05;
                }else if($studyTime > $totalweek*1.5 && $studyTime <=$totalweek*2){
                    $weight = 0.4*0.05;
                }else if($studyTime > $totalweek*2 && $studyTime <=$totalweek*2.5){
                    $weight = 0.6*0.05;
                }else if($studyTime > $totalweek*2.5 && $studyTime <=$totalweek*3){
                    $weight = 0.7*0.05;
                }else if($studyTime > $totalweek*3 && $studyTime <=$totalweek*3.5){
                    $weight = 0.8*0.05;
                }else if($studyTime > $totalweek*3.5 && $studyTime <=$totalweek*4){
                    $weight = 0.9*0.05;
                }else if($studyTime >$totalweek*4 && $studyTime <=$totalweek*4.5){
                    $weight = 0.95*0.05;
                }else if($studyTime >$totalweek*4.5){
                    $weight = 1*0.05;
                }else{
                    $weight = 0;
                }
            }
        }
        return $weight;
    }


    public function getDays(){
        $begin_time = $this->start_time;
        $end_time    = $this->end_time;
        if ( $begin_time < $end_time ) {
            $starttime = $begin_time;
            $endtime = $end_time;
        } else {
            $starttime = $end_time;
            $endtime = $begin_time;
        }
        $timediff = $endtime - $starttime;
        $days = intval( $timediff / 86400 );
        return $days;
    }

    /**
     *
     * 时间与频率 20%
     */

    public function getUserStudyTimeAndFrequency()
    {
        return $this->getUserAveragePerWeekDays() + $this->getUserAveragePerWeekTime() + $this->getUserAverageTotalDays() + $this->getUserAverageTotalTime();
    }

    /*
     *
     * 获取我学习的单元进度
     */

    public function getMyStudyUnit(){
        $studyDays  = $this->db->select("id")
            ->where("user_id",$this->user_id)
            ->group_by('unit_id')
            ->get('users_record')->result();
        return $studyDays?count($studyDays):0;
    }


    /**
     * 获取今日班级学习人数
     * @return mixed
     */
    public function getClassPerDayStudyUserCount($users = array()){
        if(count($users)){
            return $this->db->select("id")
                ->where_in("user_id",$this->toIdArray($users))
                ->where("date",date("Y-m-d"))
                ->group_by("user_id")
                ->get('users_record')->num_rows();
        }
        return 0;
    }


    /**
     * 获取今日学习之星
     * @return mixed
     */

    public function getClassPerDayStudyUserTop($users = array()){
        $data = array();
        if(count($users)){
            $topusers =  $this->db->select("SUM(time) as totaltime,user_id")
                        ->where_in("user_id",$this->toIdArray($users))
                        ->where("date",date("Y-m-d"))
                        ->group_by("user_id")
                        ->order_by("totaltime","desc")
                        ->get('users_record')->result();
             foreach($topusers as $topuser){
                $user = $this->user->getUser($topuser->user_id)->getUserInfo();
                $user['studyTime'] = sprintf("%.2f",$topuser->totaltime/3600);
                 $data[] = $user;
             }
            if(!count($data)){
                $userids = $this->db->select("id")->limit(3)->get("users")->result();
                foreach($userids as $userid){
                    $user = $this->user->getUser($userid->id)->getUserInfo();
                    $user['studyTime'] = 0;
                    $data[] = $user;
                }
            }
        }
        return $data;
    }


}  
