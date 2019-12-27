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

    //获取我的排名

    public function getUserExamResultRank(){
        if($this->teacher_exam_id != 0){
            $items = $this->db
                ->where("teacher_exam_id",$this->teacher_exam_id)
                ->order_by("totalScores","desc")
                ->get("teacher_test_paper_group_result")
                ->result();
            $index = 0;
            foreach($items as $key=> $item){
                if($item->user_id == $this->user_id){
                    $index = $key;
                }
            }
            return (count($items)-$index)/count($items);

        }
        return 0;
    }


    public function getUserExamResultList($limit=20,$start=0){
        $data = array();
        if($this->teacher_exam_id != 0){
            $items = $this->db
                ->where("teacher_exam_id",$this->teacher_exam_id)
                ->limit($limit,$start)
                ->get("teacher_test_paper_group_result")
                ->result();

            foreach($items as $key=> $item){
                $user = $this->user->getUser($item->user_id)->getUserInfoNotToken();
                $user['totalScores']     = $item->totalScores;
                $user['createdTime']     = $item->createdTime;
                $user['teacher_exam_id'] = $item->teacher_exam_id;
                $pdfName = $user['id'].'_'.$item->teacher_exam_id.'.pdf';
                $path = UPLOADFILEPATH.'examPicturePath/n'.$item->teacher_exam_id.'/'.$pdfName;
                if(is_file($path)){
                    $user['hasPdf'] = 1;
                }else{
                    $user['hasPdf'] = 0;
                }

                $data[] = $user;
            }

        }
        return $data;
    }


    public function getUserExamResultCount(){
        $count = 0;
        if($this->teacher_exam_id != 0){
            $count = $this->db
                ->where("teacher_exam_id",$this->teacher_exam_id)
                ->get("teacher_test_paper_group_result")
                ->num_rows();
        }
        return $count;
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




    public function getContentAVGScore($teacher_exam_id=0,$content_id=0){
        //计算$content_id总得分
        $row = $this->db
            ->select("SUM(scores) as totalScore")
            ->where("content_id",$content_id)
            ->where("teacher_exam_id",$teacher_exam_id)
            ->where("iscorrect",1)
            ->get("teacher_test_users_record")->row();
        $num_of_students =  $this->db
            ->where("content_id",$content_id)
            ->where("teacher_exam_id",$teacher_exam_id)
            ->get("teacher_test_users_record")->num_rows();
        if($row){
            if($num_of_students != 0){
                return round($row->totalScore / $num_of_students,2);
            }
        }
        return 0;
    }

    public function getContentTotalScoreFotCategory($user_id = 0,$teacher_exam_id=0,$category_id=0,$group_id=0){
        //计算$content_id总得分
        $row = $this->db
            ->select("SUM(scores) as totalScore")
            ->where("paper_category_id",$category_id)
            ->where("teacher_exam_id",$teacher_exam_id)
            ->where("user_id",$user_id)
            ->where("iscorrect",1)
            ->where("group_id",$group_id)
            ->get("teacher_test_users_record")->row();
        if($row && isset($row->totalScore) && !empty($row->totalScore)){
            return $row->totalScore;
        }
        return 0;
    }

    public function getContentScore($user_id=0,$content_id=0,$group_id=0){
        //计算$content_id总得分
        $row = $this->db
            ->select("scores,iscorrect")
            ->where("content_id",$content_id)
            ->where("user_id",$user_id)
            ->where("group_id",$group_id)
            ->get("teacher_test_users_record")->row();
        // echo $this->db->last_query();
        if($row){
            if($row->iscorrect){
                return $row->scores;
            }
        }
        return 0;
    }

    public function importExamData($teacher_exam_id=0){
        //计算$content_id总得分
        $data = array();
        $teacherExam = $this->db
            ->where("id",$teacher_exam_id)
            ->get("teacher_test_exam")->row();
        $return = array();
        $teacher_test_paper_categorys = $this->db->select('*')->where("paper_id",$teacherExam->test_paper_id)->order_by("sort","asc")->get("teacher_test_paper_category")->result();
        if($teacherExam){
            $results =  $this->db
                ->select("users.*,teacher_test_paper_group_result.id as group_id,teacher_test_paper_group_result.totalScores,classes.name as ClassName,grades.name as GradeName,school.name as schoolName,region.name as RegionName")
                ->where("teacher_test_paper_group_result.teacher_exam_id",$teacher_exam_id)
                ->join('users','users.id = teacher_test_paper_group_result.user_id', 'left')
                ->join('class_user_relationship', 'class_user_relationship.user_id = users.id', 'left')
                ->join('classes', 'class_user_relationship.class_id = classes.id', 'left')
                ->join('grades', 'class_user_relationship.grade_id = grades.id', 'left')
                ->join('school', 'class_user_relationship.school_id = school.id', 'left')
                ->join('region', 'school.region_id = region.id', 'left')
                ->order_by("totalScores","desc")
                ->get("teacher_test_paper_group_result")->result();
            foreach($results as $key=> $item){
                $key_index = 1;
                $return = array(
                    "用户名"=>$item->username,
                    "区域"=>$item->RegionName,
                    "学校"=>$item->schoolName,
                    "姓名"=>$item->name,
                    "教龄"=>$item->school_age,
                    "电话号码"=>$item->mobile,
                    "性别"=> ($item->sex == 0) ?"男":"女",
                    "分数"=>$item->totalScores,
                    "名次"=>$key+1,
                );
                foreach ($teacher_test_paper_categorys as $category){
                    $categoryKey = $category->name."(".$category->scores.")"."分";
                    $return[$categoryKey] = $this->getContentTotalScoreFotCategory($item->id,$teacher_exam_id,$category->id,$item->group_id);
                }

                foreach ($teacher_test_paper_categorys as $teacher_test_paper_category){
                    $examparts = $this->db->select('id')->where("paper_category_id", (int)$teacher_test_paper_category->id)
                        ->order_by("sort", "asc")->get("teacher_test_paper_part")->result();
                    foreach ($examparts as $exampart) {
                        $evnets = $this->db->select('teacher_test_part_events.id,teacher_test_part_events.type')
                            ->where("teacher_test_part_events.type !=", "system")
                            ->where("teacher_test_part_events.type !=", "result")
                            ->where("teacher_test_part_events.paper_part_id", $exampart->id)
                            ->order_by("teacher_test_part_events.sort", "asc")
                            ->get("teacher_test_part_events")->result();
                        foreach ($evnets as $key => $eventItem) {
                            if ($eventItem->type == "MTmultipleChoices") {
                                $contents = $this->db->select("id,scores")->where("event_id",$eventItem->id)->get("teacher_test_part_event_content")->result();
                                foreach($contents as $key1=> $content){
                                    $contentKey = $key_index.'.(1)'.'('.(int)$content->scores.')'.'分';
                                    $return[$contentKey] = $this->getContentScore($item->id,$content->id,$item->group_id);
                                    $key_index++;
                                }
                            } else {
                                $content = $this->db->select("id,scores")->where("event_id", $eventItem->id)->get("teacher_test_part_event_content")->row();
                                if ($content) {
                                    $contentKey = $key_index.'.(1)'.'('.(int)$content->scores.')'.'分';
                                    $return[$contentKey] = $this->getContentScore($item->id,$content->id,$item->group_id);
                                    $key_index++;
                                }
                            }
                        }
                    }
                }
                $data[] = $return;
            }

        }
        return $data;
    }

    public function getExamTotalScore($teacherExam){
        $row =  $this->db->select('SUM(scores) as totalScore')->where("paper_id",$teacherExam->test_paper_id)->get("teacher_test_paper_category")->row();
        if($row){
            return $row->totalScore;
        }
        return 0;

    }

    public function getTestPaperTagScore($teacherExam,$first_tag_id=0,$second_tag_id=0){
        $return = new stdClass();
        $teacher_test_paper_categorys = $this->db->select('*')->where("paper_id",$teacherExam->test_paper_id)->order_by("sort","asc")->get("teacher_test_paper_category")->result();
        $totalScore = 0;
        $my_score = 0;
        $item = $this->db->where("user_id",$this->user_id)
            ->where("teacher_exam_id",$this->teacher_exam_id)
            ->get("teacher_test_paper_group_result")
            ->row();
        foreach ($teacher_test_paper_categorys as $teacher_test_paper_category){
            $examparts = $this->db->select('id')->where("paper_category_id", (int)$teacher_test_paper_category->id)
                ->order_by("sort", "asc")->get("teacher_test_paper_part")->result();
            foreach ($examparts as $exampart) {
                $evnets = $this->db->select('teacher_test_part_events.id,teacher_test_part_events.scores,teacher_test_part_events.type')
                    ->where("teacher_test_part_events.type !=", "system")
                    ->where("teacher_test_part_events.type !=", "result")
                    ->where("teacher_test_part_events.paper_part_id", $exampart->id);
                if($first_tag_id != 0){
                    $evnets = $evnets->where("teacher_test_part_events.first_tag",$first_tag_id);
                }
                if($second_tag_id != 0){
                    $evnets = $evnets->where("teacher_test_part_events.second_tag",$second_tag_id);
                }
                $evnets=$evnets->order_by("teacher_test_part_events.sort", "asc")
                    ->get("teacher_test_part_events")->result();
                foreach ($evnets as $key => $eventItem) {
                    if($eventItem->type == "MTmultipleChoices"){
                        $contents = $this->db->where("event_id",$eventItem->id)->get("teacher_test_part_event_content")->num_rows();
                        $totalScore += $eventItem->scores*$contents;
                    }else{
                        $totalScore += $eventItem->scores;
                    }

                    if ($eventItem->type == "MTmultipleChoices") {
                        $contents = $this->db->select("id,scores")->where("event_id",$eventItem->id)->get("teacher_test_part_event_content")->result();
                        foreach($contents as $key1=> $content){
                            $my_score += $this->getContentScore($this->user_id,$content->id,$item->id);
                            // echo $my_score;
                        }
                    } else {
                        $content = $this->db->select("id,scores")->where("event_id", $eventItem->id)->get("teacher_test_part_event_content")->row();
                        if ($content) {
                            $my_score += $this->getContentScore($this->user_id,$content->id,$item->id);
                            //  echo $my_score;
                        }
                    }
                }
            }
        }

        $return->my_score = $my_score;

        $return->totalScore = $totalScore;
        return $return;
    }

    public function getFirstTags(){
        $result = $this->db->get("teacher_test_first_tags")->result();
        return $result;
    }



    public function  analysisData($teacherExam){
        $result = $this->db->get("teacher_test_first_tags")->result();
        foreach($result as $item){
            $detailData = $this->getTestPaperTagScore($teacherExam,$item->id);
            if($detailData->totalScore !=0){
                $item->ratings = round($detailData->my_score/$detailData->totalScore,2);
            }else{
                $item->ratings = 0;
            }
        }
        return $result;
    }


    public function  analysisSecondData($teacherExam){
        $result = $this->db->get("teacher_test_first_tags")->result();
        foreach($result as $item){
            $second_tags =  $this->db->where("first_tags_id",$item->id)->get("teacher_test_second_tags")->result();
            foreach($second_tags as $second_tag){
                $detailData = $this->getTestPaperTagScore($teacherExam,$item->id,$second_tag->id);
                if($detailData->totalScore !=0){
                    $second_tag->ratings = round($detailData->my_score/$detailData->totalScore,2);
                }else{
                    $second_tag->ratings = 0;
                }
                if( $second_tag->ratings == 0)  $second_tag->ratings = 0.1;
            }
            $item->second_tags = $second_tags;
        }
        return $result;
    }
}  
