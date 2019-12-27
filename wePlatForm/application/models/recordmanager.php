<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recordmanager extends CI_Model{


    public     $user_id          = 0;

    public     $group_id         = 0;

    public     $content_id       = 0;

    public     $unit_id          = 0;

    public     $lesson_id        = 0;

    public     $part_id          = 0;

    public     $total_items      = 0;

    public     $select_items_1   = 0;

    public     $content_perpage   = 0;

    public     $part_type        = null;

    public     $type       = null;

    public     $questions_type  = null;

    public     $start_time      = null;

    public     $end_time        = null;

    public     $course_id       = 0;

    public     $users = array();

    public     $table_user_record = "users_record";
    public     $table_user_record_origin = "users_record";
    public     $table_user_record_last = "users_record";

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

        $this->table_user_record =  $this->table_user_record.' '.'PARTITION('.implode(",",$this->getPartitions()).')';

        $this->table_user_record_last =  $this->table_user_record_last.' '.'PARTITION('.implode(",",$this->getLastPartitions()).')';


    }




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
        "2020-02"=>"p22",
        "2020-03"=>"p23",
        "2020-04"=>"p24",
        "2020-05"=>"p25",
        "2020-06"=>"p26",
        "2020-07"=>"p27",
        "2020-08"=>"p28",
        "2020-09"=>"p29",
        "2020-10"=>"p30",
        "2020-11"=>"p31",
        "2020-12"=>"p32",
    );

    public function initialize()
    {
        $this->group_id = 0;
        $this->content_id       = 0;
        $this->unit_id          = 0;
        $this->lesson_id        = 0;
        $this->part_id          = 0;
        $this->part_type        = null;
        $this->questions_type  = null;
        $this->course_id       = 0;
        $this->start_time       = null;
        $this->end_time       = null;
        return $this;
    }


    /*
     *
     * 分区
     * */


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

    public function getLastPartitions(){
        $date = date("Y-m");
        $lastMonth = date("Y-m", strtotime("-1 month"));
        $partitions = array();
        foreach($this->partitions as $key=> $partition){
            if($key ==  $date || $lastMonth == $key){
                $partitions[] = $partition;
            }
        }
        return $partitions;
    }

    public function getMyPartitions($time,$end_time=null){
        if(empty($end_time)) $date = date("Y-m");
        else   $date = date("Y-m",strtotime($end_time));

        $date1 = date("Y-m",strtotime($time));
        $partitions = array();
        foreach($this->partitions as $key=> $partition){
            if($key >=  $date1 && $key<= $date){
                $partitions[] = $partition;
            }
        }
        return $partitions;
    }

    /**
     *
     * 获取我的学习总次数
     *
     */

    public function getLearningTimes(){
        if($this->part_id){
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->group_by("group_id")->get($this->table_user_record)->result();
            return count($records) ? count($records) : 0;
        }
        return 0;
    }


    /**
     *
     * 获取我的学习总时间
     *
     */

    public function getLearningTime(){
        if($this->part_id){
            $row = $this->db->select('SUM(time) as totalTime');
            $row  = $this->getWhere($row)->get($this->table_user_record)->row();
            if($row){
                return $row->totalTime?$row->totalTime:0;
            }
        }
        return 0;
    }


    /**
     *
     *  个人part 上一次得分
     *
     */


    public function getUserPartScores(){
        if($this->user_id || count($this->users)){
            $row = $this->db->select('*');
            $row = $this->getWhere($row)
                ->select("SUM(scores) as totalScore")
                ->where("iscorrect",1)
                ->order_by("group_id","desc")
                ->group_by("group_id")
                ->get($this->table_user_record)->row();
            if($row){
                return $row->totalScore?$row->totalScore:0;
            }
        }
        return 0;
    }



    /**
     *
     * 获取我的完成率
     *
     */

    public function getMyCompletion(){
        $percentCompletion = 0;
        if($this->user_id || count($this->users)){
            //判断如果是part_id
            if($this->user_id != 0){
                $user = $this->db->select("registerDate")->where("id", $this->user_id)->get("users")->row();
                if(!empty($this->start_time) && !empty($this->end_time)){
                    $this->table_user_record =  $this->table_user_record_origin.' '.'PARTITION('.implode(",",$this->getMyPartitions($this->start_time,$this->end_time)).')';
                }else if(!empty($this->start_time)){
                    $this->table_user_record =  $this->table_user_record_origin.' '.'PARTITION('.implode(",",$this->getMyPartitions($this->start_time)).')';
                }else{
                    $this->table_user_record =  $this->table_user_record_origin.' '.'PARTITION('.implode(",",$this->getMyPartitions($user->registerDate)).')';
                }
            }

            if($this->part_id != 0){
                $row = $this->db->where("id",$this->part_id)->get("lessons_part")->row();
                if($row){
                    $this->part_type = $row->part_type;
                    $this->total_items = $row->total_items;
                    $this->select_items_1 = $row->select_items_1;
                    $this->type = $row->type;
                    $this->content_perpage = $row->content_perpage;


                    $percentCompletion += $this->getPartCompletion($row);
                }
                //return $percentCompletion;
            }else if($this->lesson_id !=0 ){
                $parts = $this->db->where("lesson_id",$this->lesson_id)->get("lessons_part")->result();
                if($parts){
                    foreach($parts as $part){
                        $this->part_id = $part->id;
                        $this->part_type = $part->part_type;
                        $this->total_items = $part->total_items;
                        $this->select_items_1 = $part->select_items_1;
                        $this->content_perpage = $part->content_perpage;
                        $this->type      = $part->type;
                        $record  = $this->db->select("id")
                            ->where("user_id",$this->user_id)
                            ->where("part_id",$this->part_id)->limit(1)
                            ->get($this->table_user_record)
                            ->num_rows();
                        if($record){
                            $percentCompletion += $this->getPartCompletion($part);
                        }
                    }
                    //return
                }
                 $percentCompletion = $percentCompletion/count($parts);
            }else if($this->unit_id !=0 ){
                $lessons = $this->db->where("unit_id",$this->unit_id)->get("lessons")->result();
                if($lessons){
                    $parts = $this->db->where_in("lesson_id",$this->toIdArray($lessons))->get("lessons_part")->result();
                    if($parts){
                        foreach($parts as $part){
                            $this->part_id = $part->id;
                            $this->part_type = $part->part_type;
                            $this->total_items = $part->total_items;
                            $this->select_items_1 = $part->select_items_1;
                            $this->content_perpage = $part->content_perpage;
                            $this->type      = $part->type;
                            $record  = $this->db->select("id")
                                ->where("user_id",$this->user_id)
                                ->where("part_id",$this->part_id)->limit(1)
                                ->get($this->table_user_record)
                                ->num_rows();
                            if($record){
                                $percentCompletion += $this->getPartCompletion($part);
                            }
                    }
                        //return $percentCompletion/count($parts);
                    }
                }
                 $percentCompletion = $percentCompletion/count($parts);;
            }else{
                //计算所有逇内容
                if(empty($this->start_time) && empty($this->end_time)) {
                    $percentCompletion = $this->getUsersCourseRowAVG($this->user_id);
                }else{
                    $lessons = $this->getWhere($this->db)->select("lesson_id as id")->where("lesson_id !=", 0)->group_by("lesson_id")->get($this->table_user_record)->result();
                    if ($lessons) {
                        $parts = $this->db->where_in("lesson_id", $this->toIdArray($lessons))->get("lessons_part")->result();
                        if ($parts) {
                            foreach ($parts as $part) {
                                $this->part_id = $part->id;
                                $this->part_type = $part->part_type;
                                $this->total_items = $part->total_items;
                                $this->select_items_1 = $part->select_items_1;
                                $this->content_perpage = $part->content_perpage;
                                $this->type = $part->type;
                                $record = $this->db->select("id")
                                    ->where("user_id", $this->user_id)
                                    ->where("part_id", $this->part_id)->limit(1)
                                    ->get($this->table_user_record)
                                    ->num_rows();
                                if ($record) {
                                    // echo "start_".date("Y-m-d H:i:s").'type'.$this->part_type;
                                    $percent = $this->getPartCompletion($part);
                                    // echo "end_".date("Y-m-d H:i:s").'<br />';
                                    //echo $percent.'————'.$part->id.'_lesson_id'.$part->lesson_id.'___'.$this->user_id.'<br />';
                                    $percentCompletion += $percent;
                                }
                            }
                            return $percentCompletion / count($parts);
                        }
                    }
                    $percentCompletion = $percentCompletion / count($parts);
                }

            }
        }
        $percentCompletion = $percentCompletion > 1 ? 1:$percentCompletion;
        return $percentCompletion;
    }



    public function getUsersCourseRowAVG($user_id){
        $lessonauths = $this->db
            ->select("AVG(wetalk_user_relation_course_unit.completion_rate) as completion_rate")
            ->where("user_relation_course_unit.user_id",$user_id)
            ->where("units.level_id !=",0)
            ->where("units.level_id is not null")
            ->join('units','user_relation_course_unit.unit_id = units.id', 'left')
            ->get('user_relation_course_unit')->row();
        return $lessonauths;
    }

    /*
*
* 获取我的最后一次学习进度
*
*/
    public function getLastStudyPart(){
        if($this->user_id){
            $record  = $this->db
                ->select('id,course_id,level_id,part_id,unit_id,lesson_id');
            $record = $this->getWhere($record)->where("user_id",$this->user_id)->order_by("id","desc")
                ->limit(1)->get($this->table_user_record)->row();
            if($record){
                $publisUnit = $this->db->select("courses.name as courseName,publishing_house.name as publishing_house_name,publishing_house_course_levels.name as publishing_house_course_levels_name,publishing_house_course_units.name as publishing_house_course_units_name")
                    ->join('publishing_house_course_levels','publishing_house_course_levels.id = publishing_house_course_units.publishing_house_course_level_id', 'left')
                    ->join('publishing_house','publishing_house.id = publishing_house_course_units.publishing_house_id', 'left')
                    ->join('publishing_house_courses','publishing_house_course_units.publishing_house_course_id = publishing_house_courses.id', 'left')
                    ->join('courses','publishing_house_courses.course_id = courses.id', 'left')
                    ->where("publishing_house_course_units.publishing_house_course_id",$record->course_id)
                    ->where("publishing_house_course_levels.id IS NOT NULL ")
                    ->where("publishing_house_course_units.unit_id",$record->unit_id)
                    ->get('publishing_house_course_units')->row();
                // echo $this->db->last_query();exit;
                if($publisUnit){
                    $record1  = $this->db
                        ->select('lessons.name as LessonName,lessons_part.name as lessons_partName')
                        ->join('lessons','lessons.id = lessons_part.lesson_id', 'left')
                        ->where("lessons_part.id",$record->part_id)
                        ->get("lessons_part")->row();
                    if($record1){
                        return $publisUnit->publishing_house_name.'--'.$publisUnit->courseName.'--'.$publisUnit->publishing_house_course_levels_name.'--'.$publisUnit->publishing_house_course_units_name.'--'.$record1->LessonName.'--'.$record1->lessons_partName;
                    }
                }

            }
        }

        return "";

    }


    /**
     *
     * 获取首次MT测试成绩
     *
     */

    public function getFirstMtScore($first = true)
    {
        $score = 0;
        if ($this->user_id) {
            if ($this->lesson_id != 0) {
                $lesson = $this->db->where("id",$this->lesson_id)->get("lessons")->row();
                if($lesson && $lesson->type == "test"){
                    $group = $this->db->select('group_id,device_platform,date');
                    $group = $this->getWhere($group);
                    if($first){
                        $group = $group->order_by("start_time", "asc");
                    }else{
                        $group = $group->order_by("start_time", "desc");
                    }
                    $group = $group->group_by("group_id")->get($this->table_user_record)->row();
                    if ($group) {
                        if($group->device_platform == "iphone"  && $group->date >= "2018-12-01"){
                            $query1 = "select SUM(scores) as totalScore from (select* from (select *from wetalk_users_record where date ='".$group->date."'  and  lesson_id = $this->lesson_id and user_id = $this->user_id  and iscorrect = 1) as t group by content_id ) as b";
                            $row = $this->db->query($query1)->row();
                        }else{
                            $row = $this->db->select('*')
                                ->where("group_id", $group->group_id)
                                ->select("SUM(scores) as totalScore")
                                ->where("iscorrect", 1)
                                ->where("lesson_id", $this->lesson_id)
                                ->get($this->table_user_record)->row();
                        }

                        if($row && isset($row->totalScore)){
                            if($row->totalScore > 100 ) $row->totalScore = 100;
                            return (int)$row->totalScore;
                        }

                    }
                }
            }else  if ($this->unit_id != 0) {
                $lesson = $this->db->where("type","test")->where("unit_id",$this->unit_id)->get("lessons")->row();
                if($lesson && $lesson->type == "test"){
                    $this->unit_id = 0;
                    $this->lesson_id = $lesson->id;
                    $group = $this->db->select('group_id');
                    $group = $this->getWhere($group);
                    if($first){
                        $group = $group->order_by("start_time", "asc");
                    }else{
                        $group = $group->order_by("start_time", "desc");
                    }
                    $group = $group->group_by("group_id")->get($this->table_user_record)->row();
                    if ($group) {
                        if($group->device_platform == "iphone"  && $group->date >= "2018-12-01"){
                            $query1 = "select SUM(scores) as totalScore from (select* from (select *from wetalk_users_record where date ='".$group->date."'  and  lesson_id = $this->lesson_id and user_id = $this->user_id  and iscorrect = 1) as t group by content_id ) as b";
                            $row = $this->db->query($query1)->row();
                        }else{
                            $row = $this->db->select('*')
                                ->where("group_id", $group->group_id)
                                ->select("SUM(scores) as totalScore")
                                ->where("iscorrect", 1)
                                ->where("lesson_id", $this->lesson_id)
                                ->get($this->table_user_record)->row();
                        }
                        if($row && isset($row->totalScore)){
                            if($row->totalScore > 100 ) $row->totalScore = 100;
                            return (int)$row->totalScore;
                        }

                    }
                }
            }
        }
        return $score;
    }

    /*
     *
     * 获取我的正确率
     *
     */
    public function getMyCorrection(){
        $percentCorrection = 0;
        if($this->user_id || count($this->users)){
            if($this->user_id != 0){
                $user = $this->db->select("registerDate")->where("id", $this->user_id)->get("users")->row();
                if(!empty($this->start_time) && !empty($this->end_time)){
                    $this->table_user_record =  $this->table_user_record_origin.' '.'PARTITION('.implode(",",$this->getMyPartitions($this->start_time,$this->end_time)).')';
                }else if(!empty($this->start_time)){
                    $this->table_user_record =  $this->table_user_record_origin.' '.'PARTITION('.implode(",",$this->getMyPartitions($this->start_time)).')';
                }else{
                    $this->table_user_record =  $this->table_user_record_origin.' '.'PARTITION('.implode(",",$this->getMyPartitions($user->registerDate)).')';
                }
            }
            if($this->part_id != 0){
                $part = $this->db->where("id",$this->part_id)->get("lessons_part")->row();
                if($part->part_type == "listening" || ($part->part_type == "vocabulary" && $part->type == "listening")){
                    return -1;
                }

                $group = $this->db->select('group_id');
                $group = $this->getWhere($group)->where("user_id",$this->user_id)->where("part_id",$this->part_id)->order_by("id","desc")->limit(1)->get($this->table_user_record)->row();

                if($group){
                    //总题目数
                    //$records = $this->db;
                    $records  = $this->db->where("group_id",$group->group_id)->where("content_id !=",0)->get($this->table_user_record)->num_rows();
                    //$correctrecords = $this->db;
                    $correctrecords  = $this->db->where("group_id",$group->group_id)->where("iscorrect",1)->where("content_id !=",0)->get($this->table_user_record)->num_rows();
                    if( $records != 0) {
                        $percentCorrection =  $correctrecords/$records;
                    }
                }
                return $percentCorrection;

//                $group = $this->db->select('group_id');
//                $group  = $this->getWhere($group)->order_by("start_time","desc")->group_by("group_id")->get('users_record')->row();
//                if($group){
//                    //总题目数
//                    $records = $this->db->select('count(*) as num');
//                    $records  = $this->getWhere($records)->where("group_id",$group->group_id)->get('users_record')->row();
//                    $correctrecords = $this->db->select('count(*) as num');
//                    $correctrecords  = $this->getWhere($correctrecords)->where("group_id",$group->group_id)->where("iscorrect",1)->get('users_record')->row();
//                    if($records && $correctrecords){
//                        if(isset($records->num) && isset($correctrecords->num) && $records->num != 0){
//                            $percentCorrection =  $correctrecords->num/$records->num;
//                        }
//                    }
//                }
//                return $percentCorrection;
            }else if($this->lesson_id !=0 ){

                $parts = $this->db->where("lesson_id",$this->lesson_id)->where("part_type !=","listening")->where("status",1)->get("lessons_part")->result();

                if($parts){
                    foreach($parts as $part){
                        $this->part_id = $part->id;
                        // $group = $this->db->select('group_id');
                        $group = $this->db->select('group_id');
                        $group = $this->getWhere($group)->where("user_id",$this->user_id)->where("part_id",$this->part_id)->order_by("id","desc")->limit(1)->get($this->table_user_record)->row();
                        if($group){
                            //总题目数
                            //$records = $this->db;
                            $records  = $this->db->where("group_id",$group->group_id)->where("content_id !=",0)->get($this->table_user_record)->num_rows();
                            // $correctrecords = $this->db;
                            $correctrecords  =  $this->db->where("group_id",$group->group_id)->where("iscorrect",1)->where("content_id !=",0)->get($this->table_user_record)->num_rows();
                            if( $records != 0) {
                                $percentCorrection +=  $correctrecords/$records;
                            }

//                            $records = $this->db->select('count(*) as num');
//                            $records  = $this->getWhere($records)->where("group_id",$group->group_id)->where("content_id !=",0)->get('users_record')->row();
//                            $correctrecords = $this->db->select('count(*) as num');
//                            $correctrecords  = $this->getWhere($correctrecords)->where("group_id",$group->group_id)->where("iscorrect",1)->where("content_id !=",0)->get('users_record')->row();
//                            if($records && $correctrecords){
//                                if(isset($records->num) && isset($correctrecords->num) && $records->num != 0){
//                                    $percentCorrection += $correctrecords->num/$records->num;
//                                }
//                            }
                        }
                    }
                    return $percentCorrection/count($parts);
                }
                return $percentCorrection;

//                $parts = $this->db->where("lesson_id",$this->lesson_id)->where("part_type !=","listening")->where("status",1)->get("lessons_part")->result();
//                if($parts){
//                    foreach($parts as $part){
//                        $this->part_id = $part->id;
//                        $group = $this->db->select('group_id');
//                        $group  = $this->getWhere($group)->order_by("start_time","desc")->group_by("group_id")->get('users_record')->row();
//                        if($group){
//                            //总题目数
//                            $records = $this->db->select('count(*) as num');
//                            $records  = $this->getWhere($records)->where("group_id",$group->group_id)->get('users_record')->row();
//                            $correctrecords = $this->db->select('count(*) as num');
//                            $correctrecords  = $this->getWhere($correctrecords)->where("group_id",$group->group_id)->where("iscorrect",1)->get('users_record')->row();
//                            if($records && $correctrecords){
//                                if(isset($records->num) && isset($correctrecords->num) && $records->num != 0){
//                                    $percentCorrection += $correctrecords->num/$records->num;
//                                }
//                            }
//                        }
//                    }
//                    return $percentCorrection/count($parts);
//                }
//                return $percentCorrection;
            }else if($this->unit_id !=0 ){
                $lessons = $this->db->where("unit_id",$this->unit_id)->get("lessons")->result();
                if($lessons){
                    $parts = $this->db->where_in("lesson_id",$this->toIdArray($lessons))->where("part_type !=","listening")->where("status",1)->get("lessons_part")->result();
                    if($parts){
                        foreach($parts as $part){
                            $this->part_id = $part->id;
                            //       $group = $this->db->select('group_id');
                            $group = $this->db->select('group_id');
                            $group = $this->getWhere($group)->where("user_id",$this->user_id)->where("part_id",$this->part_id)->order_by("id","desc")->limit(1)->get($this->table_user_record)->row();
                            if($group){
                                //总题目数
                                //$records = $this->db;
                                $records  = $this->db->where("group_id",$group->group_id)->where("content_id !=",0)->get($this->table_user_record)->num_rows();
                                // $correctrecords = $this->db;
                                $correctrecords  =  $this->db->where("group_id",$group->group_id)->where("iscorrect",1)->where("content_id !=",0)->get($this->table_user_record)->num_rows();
                                if( $records != 0) {
                                    $percentCorrection +=  $correctrecords/$records;
                                }

//                                $records = $this->db->select('count(*) as num');
//                                $records  = $this->getWhere($records)->where("group_id",$group->group_id)->where("content_id !=",0)->get('users_record')->row();
//                                $correctrecords = $this->db->select('count(*) as num');
//                                $correctrecords  = $this->getWhere($correctrecords)->where("group_id",$group->group_id)->where("iscorrect",1)->where("content_id !=",0)->get('users_record')->row();
//                                if($records && $correctrecords){
//                                    if(isset($records->num) && isset($correctrecords->num) && $records->num != 0){
//                                        $percentCorrection += $correctrecords->num/$records->num;
//                                    }
//                                }
                            }
                        }
                        return $percentCorrection/count($parts);
                    }
                }
                return $percentCorrection;
//                $lessons = $this->db->where("unit_id",$this->unit_id)->get("lessons")->result();
//                if($lessons){
//                    $parts = $this->db->where_in("lesson_id",$this->toIdArray($lessons))->where("part_type !=","listening")->where("status",1)->get("lessons_part")->result();
//                    if($parts){
//                        foreach($parts as $part){
//                            $this->part_id = $part->id;
//                            $group = $this->db->select('group_id');
//                            $group  = $this->getWhere($group)->order_by("start_time","desc")->group_by("group_id")->get('users_record')->row();
//                            if($group){
//                                //总题目数
//                                $records = $this->db->select('count(*) as num');
//                                $records  = $this->getWhere($records)->where("group_id",$group->group_id)->get('users_record')->row();
//                                $correctrecords = $this->db->select('count(*) as num');
//                                $correctrecords  = $this->getWhere($correctrecords)->where("group_id",$group->group_id)->where("iscorrect",1)->get('users_record')->row();
//                                if($records && $correctrecords){
//                                    if(isset($records->num) && isset($correctrecords->num) && $records->num != 0){
//                                        $percentCorrection += $correctrecords->num/$records->num;
//                                    }
//                                }
//                            }
//                        }
//                        return $percentCorrection/count($parts);
//                    }
//                }
                return $percentCorrection;
            }else{
               // $parts = $this->db->where_in("lesson_id",$this->toIdArray($lessons))->where("part_type !=","listening")->where("status",1)->get("lessons_part")->result();
               // echo $this->table_user_record_last;exit;
               // echo $this->table_user_record_last;
                $records = $this->db->select('count(*) as num');
                $records  = $this->getWhere($records)->where("content_id !=",0)->where("part_type !=","listening")->get($this->table_user_record)->row();
                $correctrecords = $this->db->select('count(*) as num');
                $correctrecords  = $this->getWhere($correctrecords)->where("content_id !=",0)->where("part_type !=","listening")->where("iscorrect",1)->get($this->table_user_record)->row();
                if($records && $correctrecords){
                    if(isset($records->num) && isset($correctrecords->num) && $records->num != 0){
                        $percentCorrection = $correctrecords->num/$records->num;
                    }
                }
                return $percentCorrection;
            }


//            foreach($this->partTypes as $part_type){
//                $this->part_type = $part_type;
//                $percentCorrection += $this->getPartCorrection();
//            }
        }
        return 0;
        //return $percentCorrection/count($this->partTypes);
    }


    /**
     *
     * 完成率
     *
     */

    public function getPartCompletion($part){
        $function = $this->part_type.'Completion';
        $class = new Recordmanager();
        if(method_exists($class,$function)){
            return  $this->$function($part);
        }else{
            $function = "comprehensionCompletion";
            return  $this->$function($part);
        }
        return 0;
    }

    public function getWhere($db,$is_check_time=true){
        if($this->unit_id != 0)         $db->where("unit_id",$this->unit_id);
        if($this->part_id != 0)         $db->where("part_id ",$this->part_id);
        if($this->lesson_id != 0)       $db->where("lesson_id ",$this->lesson_id);
        if($this->user_id != 0)         $db->where("user_id ",$this->user_id);
        if(count($this->users))         $db->where_in("user_id",$this->toIdArray($this->users));
        if($this->course_id != 0)       $db->where("course_id ",$this->course_id );
        if($this->start_time && $is_check_time)    $db->where("date >=",$this->start_time );
        if($this->end_time && $is_check_time)     $db->where("date <=",$this->end_time );
        return $db;
        // if(count($this->users))    $db->where_in("user_id  ",$this->users);
    }


    /*
     *
     * listen 完成率
     *
     */

    public function listeningCompletion($part){
        $record = $this->db->select('count(*) as listenCount');
        $record  = $this->getWhere($record)->where("part_type",$this->part_type)->group_by("part_id")->get($this->table_user_record)->row();
        if($record){
            if($record->listenCount == 1) return 0.3;
            else if($record->listenCount == 2) return 0.6;
            else if($record->listenCount == 3) return 1;
            else return 1;
        }else{
            return 0;
        }
    }



    public function vocabularyCompletion($part){
        $record = $this->db->select('count(*) as listenCount');
        $record  = $this->getWhere($record)->where("part_type",$this->part_type)->group_by("part_id")->get($this->table_user_record)->row();
        // echo $this->db->last_query();
        if($record && $this->type == "listening"){
            if($record->listenCount == 1) return 0.3;
            else if($record->listenCount == 2) return 0.6;
            else if($record->listenCount == 3) return 1;
            else return 1;
        }else if($record){
           // $part = $this->lessonpart->getLessonpart($this->part_id);
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->where("part_type",$this->part_type)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($part->total_items != 0){
                return $record/$part->total_items?$record/$part->total_items:0;
            }
        }else{
            return 0;
        }
    }


    /*
   *
   * listen 完成率
   *
   */

    public function phonicsCompletion($part){
        $record = $this->db->select('count(*) as listenCount');
        $record  = $this->getWhere($record)->where("part_type",$this->part_type)->group_by("part_id")->get($this->table_user_record)->row();
        // echo $this->db->last_query();
        if($record && $this->type == "listening"){
            if($record->listenCount == 1) return 0.3;
            else if($record->listenCount == 2) return 0.6;
            else if($record->listenCount == 3) return 1;
            else return 1;
        }else if($record){
           // $part = $this->lessonpart->getLessonpart($this->part_id);
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->where("part_type",$this->part_type)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($part->total_items != 0){
                return $record/$part->total_items?$record/$part->total_items:0;
            }
        }else{
            return 0;
        }
    }



    /*
     *
     * comprehension 完成率
     *
     */

    public function comprehensionCompletion($part){
        if($this->part_id){
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->where("part_type",$this->part_type)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($this->total_items != 0){
                return $record/$this->total_items?$record/$this->total_items:0;
            }

        }
        return 0;
    }


    /*
    *
    * interaction 完成率
    *
    */

    public function interactionCompletion($part){
        if($this->part_id){
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->where("part_type",$this->part_type)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($this->total_items != 0){
                return $record/$this->total_items?$record/$this->total_items:0;
            }
        }
        return 0;
    }


    /*
    *
    * review_passage_summary  完成率
    *
    */

    public function review_passage_summaryCompletion($part){
        if($this->part_id){
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->where("part_type",$this->part_type)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($this->total_items != 0){
                return $record/$this->total_items?$record/$this->total_items:0;
            }
        }
        return 0;
    }


    /*
    *
    * review_sentence_reading  完成率
    *
    */

    public function review_sentence_readingCompletion($part){
        if($this->part_id){
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->where("part_type",$this->part_type)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($this->total_items != 0){
                return $record/$this->total_items?$record/$this->total_items:0;
            }
        }
        return 0;
    }


    /*
    *
    * review_sentence_formation  完成率
    *
    */

    public function review_sentence_formationCompletion($part){
        if($this->part_id){
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->where("part_type",$this->part_type)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($this->total_items != 0){
                return $record/$this->total_items?$record/$this->total_items:0;
            }
        }
        return 0;
    }


    /*
    *
    * review_sentence_repetition  完成率
    *
    */

    public function review_sentence_repetitionCompletion($part){
        if($this->part_id){
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->where("part_type",$this->part_type)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($this->total_items != 0){
                return $record/$this->total_items?$record/$this->total_items:0;
            }
        }
        return 0;
    }

    /*
    *
    * grammar_fill_in  完成率
    *
    */

    public function grammar_fill_inCompletion($part){
        if($this->part_id){
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->where("part_type",$this->part_type)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($this->total_items != 0){
                return $record/$this->total_items?$record/$this->total_items:0;
            }
        }
        return 0;
    }


    /*
    *
    * grammar_sentence_ordering  完成率
    *
    */

    public function grammar_sentence_orderingCompletion($part){
        if($this->part_id){
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->where("part_type",$this->part_type)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($this->total_items != 0){
                return $record/$this->total_items?$record/$this->total_items:0;
            }
        }
        return 0;
    }


    /*
    *
    * grammar_sentence_formation  完成率
    *
    */

    public function grammar_sentence_formationCompletion($part){
        if($this->part_id){
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->where("part_type",$this->part_type)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($this->total_items != 0){
                return $record/$this->total_items?$record/$this->total_items:0;
            }
        }
        return 0;
    }

    /*
    *
    * mt_1  完成率
    *
    */

    public function mt_1Completion($part){
        if($this->part_id){
            $totalCount = count(explode(",",$this->select_items_1));
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($record >0  && $totalCount >0 ){
                return $record/$totalCount;
            }
        }
        return 0;
    }


    /*
    *
    * mt_2  完成率
    *
    */

    public function mt_2Completion($part){
        if($this->part_id){
            $totalCount = count(explode(",",$this->select_items_1));
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($record >0  && $totalCount >0 ){
                return $record/$totalCount;
            }
        }
        return 0;
    }

    /*
    *
    * mt_3  完成率
    *
    */

    public function mt_3Completion($part){
        if($this->part_id){
            $totalCount = $this->content_perpage;
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($record >0  && $totalCount >0 ){
                return $record/$totalCount;
            }
        }
        return 0;
    }

    /*
    *
    * mt_4  完成率
    *
    */

    public function mt_4Completion($part){
        if($this->part_id){
            $totalCount = $this->content_perpage;
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($record >0  && $totalCount >0 ){
                return $record/$totalCount;
            }
        }
        return 0;
    }

    public function mt_middleCompletion($part){
        if($this->part_id){
            $totalCount = 20;
            $record = $this->db->select('*');
            $record  = $this->getWhere($record)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($record >0  && $totalCount >0 ){
                return $record/$totalCount;
            }
        }
        return 0;
    }

    public function mt_primaryCompletion(){
        return 1;
    }

    /*
     *
     * 正确率
     *
     */

    public function getPartCorrection(){
        $function = $this->part_type.'Correction';
        $class = new Recordmanager();
        if(method_exists($class,$function)){
            return  $this->$function();
        }else{
            $function = "comprehensionCorrection";
            return  $this->$function();
        }
        return 0;
    }


    /*
 *
 * listen 正确率
 *
 */

    public function listeningCorrection(){
        $record = $this->db->select('count(*) as listenCount');
        $record  = $this->getWhere($record)->group_by("part_id")->get($this->table_user_record)->row();
        return 1;
        if($record){
            if($record->listenCount == 1) return 0.3;
            else if($record->listenCount == 2) return 0.6;
            else if($record->listenCount == 3) return 1;
            else return 1;
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
            //$part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('id');
            $records  = $this->getWhere($records)->group_by("content_id")->get($this->table_user_record)->num_rows();

            //正确题目数
            $correctrecords = $this->db->select('id');
            $correctrecords  = $this->getWhere($correctrecords)->where("iscorrect",1)->group_by("content_id")->get($this->table_user_record)->num_rows();

            if($records && $correctrecords){
                return $correctrecords/$records;
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
            //$part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('id');
            $records  = $this->getWhere($records)->group_by("content_id")->get($this->table_user_record)->num_rows();

            //正确题目数
            $correctrecords = $this->db->select('id');
            $correctrecords  = $this->getWhere($correctrecords)->where("iscorrect",1)->group_by("content_id")->get($this->table_user_record)->num_rows();

            if($records && $correctrecords){
                return $correctrecords/$records;
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
            //$part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('id');
            $records  = $this->getWhere($records)->group_by("content_id")->get($this->table_user_record)->num_rows();

            //正确题目数
            $correctrecords = $this->db->select('id');
            $correctrecords  = $this->getWhere($correctrecords)->where("iscorrect",1)->group_by("content_id")->get($this->table_user_record)->num_rows();

            if($records && $correctrecords){
                return $correctrecords/$records;
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
            //$part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('id');
            $records  = $this->getWhere($records)->group_by("content_id")->get($this->table_user_record)->num_rows();

            //正确题目数
            $correctrecords = $this->db->select('id');
            $correctrecords  = $this->getWhere($correctrecords)->where("iscorrect",1)->group_by("content_id")->get($this->table_user_record)->num_rows();

            if($records && $correctrecords){
                return $correctrecords/$records;
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
            //$part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('id');
            $records  = $this->getWhere($records)->group_by("content_id")->get($this->table_user_record)->num_rows();

            //正确题目数
            $correctrecords = $this->db->select('id');
            $correctrecords  = $this->getWhere($correctrecords)->where("iscorrect",1)->group_by("content_id")->get($this->table_user_record)->num_rows();

            if($records && $correctrecords){
                return $correctrecords/$records;
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
            //$part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('id');
            $records  = $this->getWhere($records)->group_by("content_id")->get($this->table_user_record)->num_rows();

            //正确题目数
            $correctrecords = $this->db->select('id');
            $correctrecords  = $this->getWhere($correctrecords)->where("iscorrect",1)->group_by("content_id")->get($this->table_user_record)->num_rows();

            if($records && $correctrecords){
                return $correctrecords/$records;
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
            //$part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('id');
            $records  = $this->getWhere($records)->group_by("content_id")->get($this->table_user_record)->num_rows();

            //正确题目数
            $correctrecords = $this->db->select('id');
            $correctrecords  = $this->getWhere($correctrecords)->where("iscorrect",1)->group_by("content_id")->get($this->table_user_record)->num_rows();

            if($records && $correctrecords){
                return $correctrecords/$records;
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
            //$part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('id');
            $records  = $this->getWhere($records)->group_by("content_id")->get($this->table_user_record)->num_rows();

            //正确题目数
            $correctrecords = $this->db->select('id');
            $correctrecords  = $this->getWhere($correctrecords)->where("iscorrect",1)->group_by("content_id")->get($this->table_user_record)->num_rows();

            if($records && $correctrecords){
                return $correctrecords/$records;
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
            //$part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $records = $this->db->select('id');
            $records  = $this->getWhere($records)->group_by("content_id")->get($this->table_user_record)->num_rows();

            //正确题目数
            $correctrecords = $this->db->select('id');
            $correctrecords  = $this->getWhere($correctrecords)->where("iscorrect",1)->group_by("content_id")->get($this->table_user_record)->num_rows();

            if($records && $correctrecords){
                return $correctrecords/$records;
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
            //$part = $this->lessonpart->getLessonpart($this->part_id);
            //总题目数
            $correctrecords = $this->db->select('id');
            $correctrecords  = $this->getWhere($correctrecords)->where("iscorrect",1)->group_by("content_id")->get($this->table_user_record)->num_rows();

            return $correctrecords*5;

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
            // $part = $this->lessonpart->getLessonpart($this->part_id);

            //总题目数
            $correctrecords = $this->db->select('id');
            $correctrecords  = $this->getWhere($correctrecords)->where("iscorrect",1)->group_by("content_id")->get($this->table_user_record)->num_rows();

            return $correctrecords*7;

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
            //  $part = $this->lessonpart->getLessonpart($this->part_id);

            //总题目数
            $correctrecords = $this->db->select('id');
            $correctrecords  = $this->getWhere($correctrecords)->where("iscorrect",1)->group_by("content_id")->get($this->table_user_record)->num_rows();

            return $correctrecords*3;

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
            // $part = $this->lessonpart->getLessonpart($this->part_id);

            //总题目数
            $correctrecords = $this->db->select('id');
            $correctrecords  = $this->getWhere($correctrecords)->where("iscorrect",1)->group_by("content_id")->get($this->table_user_record)->num_rows();

            return $correctrecords*5;

        }
        return 0;
    }


    /*
     *  学情指数评价维度
     *
     * 单个学生完成率
     */


    public function getUserPartsCompletion(){

        if($this->user_id || count($this->users)){
            $parts = $this->db->select('part_type,part_id');
            $parts = $this->getWhere($parts)->group_by("part_id")->get($this->table_user_record)->result();
            $percent = 0;
            foreach($parts as $part){
                if(empty($part->part_type)) continue;
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
        if($this->user_id || count($this->users)){
            $parts = $this->db->select('part_type,part_id');
            $parts = $this->getWhere($parts)->group_by("part_id")->get($this->table_user_record)->result();
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
        if($this->user_id || count($this->users)){
            $parts = $this->db->select('part_type,part_id');
            $parts = $this->getWhere($parts)->group_by("part_id")->get($this->table_user_record)->result();
            $percent = 0;
            foreach($parts as $part){
                $this->part_type = $part->part_type;
              //  if(empty($part->part_type) || !in_array($part->part_type,$this->partTypes)) continue;
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
        if($this->user_id || count($this->users)){
            $parts = $this->db->select('part_type,part_id');
            $parts = $this->getWhere($parts)->group_by("part_id")->get($this->table_user_record)->result();
            $totalPoint = 0;
            foreach($parts as $part){
                $this->part_type = $part->part_type;
                // if(empty($part->part_type) || !in_array($part->part_type,$this->partTypes)) continue;
                $this->part_id = $part->part_id;
                $totalPoint += $this->mt_1Correction()+$this->mt_2Correction()+$this->mt_3Correction()+$this->mt_4Completion();
            }
            if(count($parts)){
                return $totalPoint/count($parts);
            }
        }
        return 0;
    }

    public function getUsercreated_timecreated_timeMTScores($lesson_id){
        if($this->user_id || count($this->users)){
            $row = $this->db->select('*');
            $row = $this->getWhere($row)
                ->select("SUM(scores) as totalScore")
                ->where("iscorrect",1)
                ->where("lesson_id",$lesson_id)
                ->order_by("totalScore","desc")
                ->group_by("group_id")
                ->get($this->table_user_record)->row();
            // echo $this->db->last_query();
            if($row){
                return $row->totalScore;
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
        if($this->user_id || count($this->users)){
            $row = $this->db->select('*');
            $row = $this->getWhere($row)
                ->select("SUM(scores) as totalScore")
                ->where("iscorrect",1)
                ->where("lesson_id",$lesson_id)
                ->order_by("totalScore","desc")
                ->group_by("group_id")
                ->get($this->table_user_record)->row();
            // echo $this->db->last_query();
            if($row){
                return $row->totalScore;
            }
        }
        return 0;
    }

    public function getUserMTScoresDate($lesson_id){
        if($this->user_id || count($this->users)){
            $row = $this->db->select('*');
            $row = $this->getWhere($row)
                ->select("SUM(scores) as totalScore,date")
                ->where("iscorrect",1)
                ->where("lesson_id",$lesson_id)
                ->order_by("totalScore","desc")
                ->group_by("group_id")
                ->get($this->table_user_record)->row();
            // echo $this->db->last_query();
            if($row){
                return $row;
            }
        }
        $row = new stdClass();
        $row->totalScore = 0;
        $row->date = "";
        return $row;
    }

    /**
     *
     * MT 个人得分LIST
     *
     */


    public function getUserMTScoresList($lesson_id){
        $data = array();
        if($this->user_id || count($this->users)){
//            $rows = $this->db->select('*');
//            $rows = $this->getWhere($rows)
//                ->select("users_record.*,SUM(scores) as totalScore")
//                ->where("iscorrect",1)
//                ->where("lesson_id",$lesson_id)
//                ->group_by("group_id")
//                ->order_by("date","desc")
//                ->get('users_record')->result();

            $query = "select t.* from (select *,SUM(scores) as totalScore from wetalk_users_record where lesson_id = $lesson_id and user_id = $this->user_id and iscorrect =1 group by group_id) as t order by end_time desc";
            $rows = $this->db->query($query)->result();
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


    public function getUserMTLimtScoresList($lesson_id){
        $data = array();
        if($this->user_id || count($this->users)){
//            $rows = $this->db->select('*');
//            $rows = $this->getWhere($rows)
//                ->select("users_record.*,SUM(scores) as totalScore")
//                ->where("iscorrect",1)
//                ->where("lesson_id",$lesson_id)
//                ->group_by("group_id")
//                ->order_by("date","desc")
//                ->get('users_record')->result();

            $query = "select t.* from (select *,SUM(scores) as totalScore from wetalk_users_record where lesson_id = $lesson_id and user_id = $this->user_id and iscorrect =1 group by group_id) as t order by end_time desc limit 3";
            $rows = $this->db->query($query)->result();
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
        if($this->user_id || count($this->users)){
            if($this->user_id != 0){
                $user = $this->db->select("registerDate")->where("id", $this->user_id)->get("users")->row();
                if(!empty($this->start_time) && !empty($this->end_time)){
                    $this->table_user_record =  $this->table_user_record_origin.' '.'PARTITION('.implode(",",$this->getMyPartitions($this->start_time,$this->end_time)).')';
                }else if(!empty($this->start_time)){
                    $this->table_user_record =  $this->table_user_record_origin.' '.'PARTITION('.implode(",",$this->getMyPartitions($this->start_time)).')';
                }else{
                    $this->table_user_record =  $this->table_user_record_origin.' '.'PARTITION('.implode(",",$this->getMyPartitions($user->registerDate)).')';
                }
            }

            $totalitems = $this->db;
            $totalitems = $this->getWhere($totalitems);

            $totalitems = $totalitems
                ->select("count(*) as num")
                ->where("questions_type",'sr')
                ->group_by("content_id")
                ->get($this->table_user_record)->num_rows();

            $correst = $this->db;
            $correst = $this->getWhere($correst);

            $correst = $correst
                ->select("count(*) as num")
                ->where("questions_type",'sr')
                ->where("iscorrect",1)
                ->group_by("content_id")
                ->get($this->table_user_record)->num_rows();
            if($correst && $totalitems!=0){
                return $correst/$totalitems;
            }
        }
        return 0;
    }


    /**
     *
     *  学习效果 20%;
     */
    public function getUserStudyReuslt(){
        if($this->user_id || count($this->users)){
            $Completion  = $this->getUserPartsCompletion();
            $Correct    = $this->initialize()->getUserPartsCorrect();
            $Pass       = $this->initialize()->getUserPartsPass();
            $mt         = $this->initialize()->getUserMTaverage();
            $sr         = $this->initialize()->getUserSrPecent();
          //  echo $Completion.'___'.$Correct.'___'.$Pass.'____'.$mt.'___'.$sr;
//            echo  ($Completion+ $Correct+ $Pass+$mt+$sr)*0.04;
//            exit;
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
        $course = $this->db;
        $course = $this->getWhere($course);
        $course = $course->select("count(*) as num")->where("course_id !=",0)->group_by("course_id")->get($this->table_user_record)->result();
        return count($course)?count($course)/1:0;
    }

    /*
     * 已学单元数目
     *
     */
    public function getUserSchedule(){
        $unit = $this->db;
        $unit = $this->getWhere($unit);
        $unit = $unit->select("id")->where("unit_id >",0)->group_by("unit_id")->get($this->table_user_record)->result();
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
        $count = $this->db;
        $count = $this->getWhere($count);
        $count = $count->select("SUM('".$type."') as num")
            ->get($this->table_user_record)->row();
        if(isset($count->num) && !empty($count->num)){
            return $count->num;
        }
        return 0;
    }


    /*
     *
     * 重复键比文文字建
     */
    public function getUserRepeatRatioAbc(){
        $repeat = $this->db;
        $repeat = $this->getWhere($repeat);
        $repeat = $repeat->select("SUM(repeat_count) as num")->get($this->table_user_record)->row();

        $abc = $this->db;
        $abc = $this->getWhere($abc);
        $abc = $abc->select("SUM(abc_count) as num")->get($this->table_user_record)->row();
        if($abc && $abc->num != 0 && !empty($repeat)){
            $pencent = $repeat->num/$abc->num;
            if($pencent > 3) return 0.05;
            else if($pencent >2 && $pencent <= 3) 0.04;
            else if($pencent >1 && $pencent<= 2) 0.03;
            else if($pencent == 1) 0.02;
            else if($pencent < 1 &&  $pencent > 0) 0.01;
            else 0;
        }
        return 0;
    }

    /**
     *
     * 录音键和回听键比例
     */
    public function getUserMicRatioHead(){
        $repeat = $this->db;
        $repeat = $this->getWhere($repeat);
        $repeat = $repeat->select("SUM(mic_count) as num")->get($this->table_user_record)->row();

        $abc = $this->db;
        $abc = $this->getWhere($abc);
        $abc = $abc->select("SUM(head_count) as num")->get($this->table_user_record)->row();
        if($abc && $abc->num != 0 && !empty($repeat)){
            $pencent = $repeat->num/$abc->num;
            if($pencent >= 1) return 0.05;
            else if($pencent >0.6 && $pencent <1 ) 0.04;
            else if($pencent >0.4 && $pencent <= 0.6) 0.03;
            else if($pencent > 0.2 && $pencent <= 0.4 ) 0.02;
            else if($pencent <= 0.2 && $pencent >=0) 0.01;
            else 0;
        }
        return 0;
    }

    /**
     * 重复建录音键比回听键
     *
     */
    public function getUserRepeatRatioMicRatioHead(){
        $repeat = $this->db;
        $repeat = $this->getWhere($repeat);
        $repeat  =$repeat->select("SUM(repeat_count) as num")->get($this->table_user_record)->row();

        $mic = $this->db;
        $mic = $this->getWhere($mic);
        $mic = $mic->select("SUM(mic_count) as num")->get($this->table_user_record)->row();

        $head = $this->db;
        $head = $this->getWhere($head);
        $head = $head->select("SUM(head_count) as num")->get($this->table_user_record)->row();
        if($mic && $head && $repeat && !empty($mic->num) && !empty($head->num) && !empty($repeat->num)){
            $pencent = $repeat->num/$mic->num/$head->num;
            if($pencent >3 ) return 0.05;
            else if($pencent ==3 ) 0.04;
            else if($pencent >=2 && $pencent <= 3) 0.03;
            else if($pencent >= 1 && $pencent < 2 ) 0.02;
            else if($pencent < 1 && $pencent >0) 0.01;
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

                $totalTime = $this->db;
                $totalTime = $this->getWhere($totalTime);
                $totalTime  = $totalTime->select("SUM(time) as num")
                    ->where("date >=",$this->start_time)
                    ->where("date <=",$end_time)
                    ->get($this->table_user_record)->row();
                if($totalTime && !empty($totalTime->num)){
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
        $totalTime  = $this->db;
        $totalTime  = $this->getWhere($totalTime);
        $totalTime  = $totalTime->select("SUM(time) as num")
            ->get($this->table_user_record)->row();
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
                $totalTime  = $this->db;
                $totalTime  = $this->getWhere($totalTime);
                $totalTime  = $totalTime->select("count(*) as num")
                    ->where("date >=",$this->start_time)
                    ->where("date <=",$end_time)
                    ->group_by('date')
                    ->get($this->table_user_record)->row();
                if($totalTime && !empty($totalTime->num)){
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
        $totalTime  = $this->db;
        $totalTime  = $this->getWhere($totalTime);

        $totalTime  = $totalTime->select("id")
            ->group_by('date')
            ->get($this->table_user_record)->result();
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
                $totalTime  = $this->db;
                $totalTime  = $this->getWhere($totalTime);

                $totalTime  = $totalTime->select("SUM(time) as num")
                    ->where("date >=",$this->start_time)
                    ->where("date <=",$end_time)
                    ->group_by('date')
                    ->get($this->table_user_record)->row();


                $totalday  = $this->db;
                $totalday  = $this->getWhere($totalday);

                $totalday  = $totalday->select("count(*) as num")
                    ->where("date >=",$this->start_time)
                    ->where("date <=",$end_time)
                    ->group_by('date')
                    ->get($this->table_user_record)->row();
                if($totalTime && $totalday && !empty($totalTime->num) && !empty($totalday->num)){
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
                $total_content  = $this->db;
                $total_content  = $this->getWhere($total_content);
                $total_content  = $total_content->select("count(*) as num")
                    ->where("date >=",$this->start_time)
                    ->where("date <=",$end_time)
                    ->group_by('content_id')
                    ->get($this->table_user_record)->row();


                $correct_content  = $this->db;
                $correct_content  = $this->getWhere($correct_content);

                $correct_content  = $correct_content->select("count(*) as num")
                    ->where("date >=",$this->start_time)
                    ->where("date <=",$end_time)
                    ->where("iscorrect",1)
                    ->group_by('content_id')
                    ->get($this->table_user_record)->row();

                if($total_content && $correct_content && !empty($total_content->num) && !empty($correct_content->num)){
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
                $total_content  = $this->db;
                $total_content  = $this->getWhere($total_content);

                $total_content  = $total_content->select("count(*) as num")
                    ->where("date >=",$this->start_time)
                    ->where("date <=",$end_time)
                    ->group_by('content_id')
                    ->get($this->table_user_record)->row();


                $correct_content  = $this->db;
                $correct_content  = $this->getWhere($correct_content);

                $correct_content  = $correct_content->select("count(*) as num")
                    ->where("date >=",$this->start_time)
                    ->where("date <=",$end_time)
                    ->where("iscorrect",1)
                    ->group_by('content_id')
                    ->get($this->table_user_record)->row();

                if($total_content && $correct_content && !empty($total_content->num) && !empty($correct_content->num)){
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
                $total_content  = $this->db;
                $total_content  = $this->getWhere($total_content);

                $total_content  = $total_content->select("count(*) as num")
                    ->where("date >=",$this->start_time)
                    ->where("date <=",$end_time)
                    ->where("questions_type","sr")
                    ->group_by('content_id')
                    ->get($this->table_user_record_last)->row();


                $correct_content  = $this->db;
                $correct_content  = $this->getWhere($correct_content);

                $correct_content  = $correct_content->select("count(*) as num")
                    ->where("date >=",$this->start_time)
                    ->where("date <=",$end_time)
                    ->where("questions_type","sr")
                    ->where("iscorrect",1)
                    ->group_by('content_id')
                    ->get($this->table_user_record_last)->row();

                if($total_content && $correct_content && !empty($total_content->num) && !empty($correct_content->num)){
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
                $total_content  = $this->db;
                $total_content  = $this->getWhere($total_content);

                $total_content = $total_content->select("count(*) as num")
                    ->where("date >=", $this->start_time)
                    ->where("date <=", $end_time)
                    ->where("questions_type", "sr")
                    ->group_by('content_id')
                    ->get($this->table_user_record_last)->row();


                $correct_content  = $this->db;
                $correct_content  = $this->getWhere($correct_content);

                $correct_content = $correct_content->select("count(*) as num")
                    ->where("date >=", $this->start_time)
                    ->where("date <=", $end_time)
                    ->where("questions_type", "sr")
                    ->where("iscorrect", 1)
                    ->group_by('content_id')
                    ->get($this->table_user_record_last)->row();
                if($total_content && $correct_content && !empty($total_content->num) && !empty($correct_content->num)){
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
                $parts  = $this->db;
                $parts  = $this->getWhere($parts);

                $parts  = $parts->select("*")
                    ->where("date >=",$this->start_time)
                    ->where("date <=",$end_time)
                    ->group_by('part_id')
                    ->get($this->table_user_record)->result();
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
                $total_content  = $this->db;
                $total_content  = $this->getWhere($total_content);

                $total_content  = $total_content->select("count(*) as num")
                    ->where("date >=",$this->start_time)
                    ->where("date <=",$end_time)
                    ->where_in("part_type",array("mt_1","mt_2","mt_3","mt_4"))
                    ->group_by('unit_id')
                    ->get($this->table_user_record)->row();


                $totalpoint  = $this->db;
                $totalpoint  = $this->getWhere($totalpoint);

                $totalpoint  = $totalpoint->select("count(scores) as num")
                    ->where("date >=",$this->start_time)
                    ->where("date <=",$end_time)
                    ->where_in("part_type",array("mt_1","mt_2","mt_3","mt_4"))
                    ->where("iscorrect",1)
                    ->group_by('content_id')
                    ->get($this->table_user_record)->row();

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

                $repeat  = $this->db;
                $repeat  = $this->getWhere($repeat);

                $repeat  = $repeat->select("SUM(repeat_count) as num,SUM(mic_count) as num1,SUM(head_count) as num2")->where("date >=",$this->start_time)
                    ->where("date <=",$end_time)->get($this->table_user_record)->row();

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
        $total = $this->initialize()->getUserStudyTime() + $this->initialize()->getUserStudyFrequency() + $this->initialize()->getUserStudyTimePerDay() +
            $this->initialize()->getUserStudyCorrectionWight() + $this->initialize()->getUserStudyCorrectionWight() + $this->initialize()->getUserStudyCompletion()
            + $this->initialize()->getUserMTaverage() + $this->initialize()->getUserStudyButtons();
        if($total == 0){
            $ponit = 0;
        }elseif($total >= -12 && $total <= -2){
            $ponit = 0.01;
        }else if($total > -2 && $total <= 1){
            $ponit = 0.02;
        }else if($total > 1 && $total <= 4){
            $ponit = 0.03;
        }else if($total > 4 && $total <= 8){
            $ponit = 0.04;
        }else if($total > 8 && $total <= 12){
            $ponit = 0.05;
        }else{
            $ponit =0.05;
        }
        return $ponit;
    }

    /*
     *  学习方法功能键和SS得分
     *
     *
     */

    public function getUserStudyComprehensive(){
        return $this->initialize()->getUserStudyScores() + $this->initialize()->getUserRepeatRatioAbc() + $this->initialize()->getUserMicRatioHead() + $this->initialize()->getUserRepeatRatioMicRatioHead();
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
        if($this->user_id || count($this->users)){
            $parts  = $this->db;
            $parts  = $this->getWhere($parts);
            $parts = $parts
                ->where("skill_type",'listen_comprehension')
                ->group_by("part_id")->get($this->table_user_record)->result();
            $point = 0;
            foreach($parts as $part){
                $this->part_type = $part->part_type;
                $this->part_id = $part->part_id;
                if(empty($part->weight) || $part->weight = 0) $part->weight = 20;
                $point += $this->getPartCorrection()*$part->weight/100;
            }
            //if(count($parts) > 0) return $point/count($parts);
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
        if($this->user_id || count($this->users)){
            $parts  = $this->db;
            $parts  = $this->getWhere($parts);
            $parts = $parts
                ->where("skill_type",'speak')
                ->group_by("part_id")->get($this->table_user_record)->result();
            $point = 0;
            foreach($parts as $part){
                if(empty($part->weight) || $part->weight = 0) $part->weight = 20;
                $this->part_type = $part->part_type;
                $this->part_id = $part->part_id;
                $point += $this->getPartCorrection()*$part->weight/100;
            }
            //if(count($parts) > 0) return $point/count($parts);
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
        if($this->user_id || count($this->users)){
            $parts  = $this->db;
            $parts  = $this->getWhere($parts);
            $parts = $parts
                ->where("skill_type",'grammer')
                ->group_by("part_id")->get($this->table_user_record)->result();
            $point = 0;
            foreach($parts as $part){
                $this->part_type = $part->part_type;
                $this->part_id = $part->part_id;
                if(empty($part->weight) || $part->weight = 0) $part->weight = 25;
                $point += $this->getPartCorrection()*$part->weight/100;
            }
            //if(count($parts) > 0) return $point/count($parts);
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
        $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
        //获取今天的值
        $month_last_day = date('Y-m-d');

        if(empty($this->start_time)) $this->start_time = $month_frist_day;
        if(empty($this->end_time)) $this->end_time = $month_last_day;

        if($this->start_time && $this->end_time) {
            $totaldays = $this->getDays();
            $totalweek = intval($totaldays / 7)-1;
            if($totalweek <= 0) $totalweek = 1;
            //学习总天数
            $studyDays = $this->db;
            $studyDays = $this->getWhere($studyDays);
            $studyDays = $studyDays
                ->where("date >=", $month_frist_day)
                ->where("date <=", $month_last_day)
                ->group_by('date')
                ->get($this->table_user_record)->num_rows();
            if ($studyDays) {
                $studyDays = $studyDays ? $studyDays : 0;
                if ($totalweek > 0) $weekStudyDays = intval($studyDays / $totalweek);
                else  $weekStudyDays = 0;
             //   echo $weekStudyDays;
                switch ($weekStudyDays) {
                    case 1:
                        $weight = 0.1 * 0.05;
                        break;
                    case 2:
                        $weight = 0.4 * 0.05;
                        break;
                    case 3:
                        $weight = 0.6 * 0.05;
                        break;
                    case 4:
                        $weight = 0.7 * 0.05;
                        break;
                    case 5:
                        $weight = 0.8 * 0.05;
                        break;
                    case 6:
                        $weight = 0.9 * 0.05;
                        break;
                    case 7:
                        $weight = 1 * 0.05;
                        break;
                    case 0:
                        $weight =0;
                        break;
                    default:
                        $weight = 1 * 0.05;
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
        $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
        //获取今天的值
        $month_last_day = date('Y-m-d');
        if(empty($this->start_time)) $this->start_time = $month_frist_day;
        if(empty($this->end_time)) $this->end_time = $month_last_day;

        if($this->start_time && $this->end_time){
            $totaldays = $this->getDays();
            $totalweek = intval($totaldays / 7)-1;
            if($totalweek <= 0) $totalweek = 1;
            //学习总天数
//            $studyDays  = $this->db;
//            $studyDays  = $this->getWhere($studyDays);
//
//            $studyDays  = $studyDays->select("SUM(time) as num")
//                ->where("date >=",$this->start_time)
//                ->where("date <=",$this->end_time)
//                ->get('users_record')->row();

            $studyDays  = $this->db;
            $studyDays  = $this->getWhere($studyDays);
            $studyDays  = $studyDays
                ->where("date >=",$this->start_time)
                ->where("date <=",$this->end_time)
                ->group_by('date')
                ->get($this->table_user_record)->num_rows();

            if($studyDays){
                $studyTime = $studyDays?$studyDays:0;
                if($totalweek >0) $weekStudyDays = round($studyDays/$totalweek,1);
                else $weekStudyDays =0;
             //   echo $weekStudyDays.'$weekStudyDays';
                // $weekStudyDays = intval($studyDays/$totalweek);
                if($weekStudyDays == 0){
                    $weight = 0;
                }else if($weekStudyDays > 0 && $weekStudyDays <=1){
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
                    $weight = 1*0.05;
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
        $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
        //获取今天的值
        $month_last_day = date('Y-m-d');

        if(empty($this->start_time)) $this->start_time = $month_frist_day;
        if(empty($this->end_time)) $this->end_time = $month_last_day;
        if($this->start_time && $this->end_time){
            $totaldays = $this->getDays();
            $totalweek = intval($totaldays / 7)-1;
            if($totalweek <= 0) $totalweek = 1;

            //学习总天数
            $studyDays  = $this->db;
            $studyDays  = $this->getWhere($studyDays);
            $studyDays  = $studyDays
                ->where("date >=",$this->start_time)
                ->where("date <=",$this->end_time)
                ->group_by('date')
                ->get($this->table_user_record)->num_rows();

            $studyTime  = $this->db;
            $studyTime  = $this->getWhere($studyTime);
            $studyTime  = $studyTime->select("SUM(time) as num")
                ->where("date >=",$this->start_time)
                ->where("date <=",$this->end_time)
                ->get($this->table_user_record)->row();

            if($studyDays){
                $studyTime = $studyTime->num?$studyTime->num:0;
                if($totalweek >0) $weekStudyTimes = round(intval($studyTime/$totalweek)/(60*60),1);
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
        $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
        //获取今天的值
        $month_last_day = date('Y-m-d');

        if(empty($this->start_time)) $this->start_time = $month_frist_day;
        if(empty($this->end_time)) $this->end_time = $month_last_day;
        if($this->start_time && $this->end_time){
            $totaldays = $this->getDays();
            $totalweek = intval($totaldays / 7)-1;
            if($totalweek <= 0) $totalweek = 1;

            //学习总天数
            $studyDays  = $this->db;
            $studyDays  = $this->getWhere($studyDays);

            $studyDays  = $studyDays->select("count(*) as num")
                ->where("date >=",$this->start_time)
                ->where("date <=",$this->end_time)
                ->group_by('date')
                ->get($this->table_user_record)->num_rows();

            $studyTime  = $this->db;
            $studyTime  = $this->getWhere($studyTime);

            $studyTime  = $studyTime->select("SUM(time) as num")
                ->where("date >=",$this->start_time)
                ->where("date <=",$this->end_time)
                ->get($this->table_user_record)->row();

            if($studyDays){
                $studyTime = $studyTime->num?$studyTime->num/(60*60):0;


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
        $timediff = strtotime($endtime) - strtotime($starttime);
        $days = intval( $timediff / 86400 );
        return $days;
    }

    /**
     *
     * 时间与频率 20%
     */

    public function getUserStudyTimeAndFrequency()
    {
       // echo $this->getUserAveragePerWeekDays().'+'.$this->getUserAveragePerWeekTime().'+'.$this->getUserAverageTotalDays().'+'. $this->getUserAverageTotalTime();
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
            ->get($this->table_user_record)->result();
        return $studyDays?count($studyDays):0;
    }

    /*
     *
     * 获取我学习的单元进度
     */

    public function getMyStudyCourse(){
        $courses  = $this->db->select("course_id")
            ->where("user_id",$this->user_id)
            ->group_by('course_id')
            ->get($this->table_user_record)->result();
        return $courses;
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
                ->get($this->table_user_record)->num_rows();
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
                ->get($this->table_user_record)->result();
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
