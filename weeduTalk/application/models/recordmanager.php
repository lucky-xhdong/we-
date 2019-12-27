<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recordmanager extends CI_Model{


    public     $user_id          = 0;

    public     $group_id         = 0;

    public     $content_id       = 0;

    public     $unit_id          = 0;

    public     $lesson_id        = 0;

    public     $part_id          = 0;

    public     $part_type        = null;

    public     $type            = null;


    public     $questions_type  = null;

    public     $start_time      = null;

    public     $date            = null;

    public     $end_time        = null;

    public     $course_id       = 0;

    public     $users           = array();

    public     $table_user_record = "users_record";

    public     $table_user_record_last = "users_record";

    public     $table_user_record_time = "users_record";

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
    );




    public function __construct()
    {
        parent::__construct();
        $this->load->model('lessonpart');
        $this->table_user_record =  $this->table_user_record.' '.'PARTITION('.implode(",",$this->getPartitions()).')';

        $this->table_user_record_last =  $this->table_user_record_last.' '.'PARTITION('.implode(",",$this->getLastPartitions()).')';


    }


    public function getMyDateStudyTimeData($date){
        $return = array();

        //确定查询条件
        $table =  $this->table_user_record_time.' '.'PARTITION('.implode(",",$this->getMyParticipationPartitions($date)).')';
        $record  = $this->db
            ->select('course_id as id');
        $record = $this->getWhere($record)->where("date",$date)->group_by("course_id")->get($table)->result();
        return $record;
    }


    public function getMyDateStudyUnitsTimeData($date){
        $return = array();
        //确定查询条件
        $table =  $this->table_user_record_time.' '.'PARTITION('.implode(",",$this->getMyParticipationPartitions($date)).')';
        $record  = $this->db
            ->select('unit_id as id');
        $record = $this->getWhere($record)->where("date",$date)->where("user_id",$this->user_id)->group_by("unit_id")->get($table)->result();
       // echo $this->db->last_query();
        return $record;
    }


    public function getMyDateStudyLessonsTimeData($date){
        $return = array();
        //确定查询条件
        $table =  $this->table_user_record_time.' '.'PARTITION('.implode(",",$this->getMyParticipationPartitions($date)).')';
        $record  = $this->db
            ->select('lesson_id as id');
        $record = $this->getWhere($record)->where("date",$date)->where("user_id",$this->user_id)->group_by("lesson_id")->get($table)->result();
        return $record;
    }


    public function getMyDateStudypartsTimeData($date){
        $return = array();
        //确定查询条件
        $table =  $this->table_user_record_time.' '.'PARTITION('.implode(",",$this->getMyParticipationPartitions($date)).')';
        $record  = $this->db
            ->select('part_id as id');
        $record = $this->getWhere($record)->where("date",$date)->where("user_id",$this->user_id)->group_by("part_id")->get($table)->result();
        return $record;
    }


    public function getMyTimeData($date){
        $return = array();
        //确定查询条件
        $table =  $this->table_user_record_time.' '.'PARTITION('.implode(",",$this->getMyParticipationPartitions($date)).')';
        $record  = $this->db
            ->select('SUM(time) as totaltime');
        $record = $this->getWhere($record)->where("date",$date)->get($table)->row();
       // echo $this->db->last_query();
        if($record){
            return $record->totaltime;
        }
        return 0;
    }


    //计算学习时间



    public function getLastStudyPart($user=null,$publishing_house_course_id = 0){
        $data = array();
        if($this->user_id){
            $record  = $this->db
                ->select('id,course_id,level_id,part_id,unit_id,lesson_id');
            $record = $this->getWhere($record)->where("course_id",$publishing_house_course_id)->where("user_id",$this->user_id)->order_by("id","desc")
                ->limit(1)->get($this->table_user_record_last)->row();

            if($record){

                if($this->user_id == 53){
                    $publisUnit = $this->db->select("levels.name as levelName,units.name as unitsName")
                        ->join('levels','levels.id = units.level_id', 'left')
                        ->join('courses','units.course_id = courses.id', 'left')
                        ->where("courses.id",$record->course_id)
                        ->where("levels.id IS NOT NULL ")
                        ->where("units.id",$record->unit_id)
                        ->get('units')->row();

                    if($publisUnit){

                        $record1  = $this->db
                            ->select('lessons.name as LessonName,lessons.update_time,lessons_part.name as lessons_partName')
                            ->join('lessons','lessons.id = lessons_part.lesson_id', 'left')
                            ->where("lessons_part.id",$record->part_id)
                            ->get("lessons_part")->row();
                        if($record1){

                            $data = array(
                                "name"=> $publisUnit->levelName.'--'.$publisUnit->unitsName.'--'.$record1->LessonName.'--'.$record1->lessons_partName,
                                "unit_id"=>$record->unit_id,
                                "level_id"=>$record->level_id,
                                "lesson_id"=>$record->lesson_id,
                                "lesson_update_time"=>$record1->update_time,
                                "part_id"=>$record->part_id,
                                "lesson_name"=>$record1->LessonName,
                                "lesson_object_key"   =>"assets/lesson".$record->lesson_id.'.zip',
                                "parts"=>$this->lessonpart->getLessonpartListNew($user,$record->lesson_id,1)
                            );
                        }
                    }
                }else{
                    $publisUnit = $this->db->select("courses.name as courseName,publishing_house_course_levels.name as publishing_house_course_levels_name,publishing_house_course_units.name as publishing_house_course_units_name")
                        ->join('publishing_house_course_levels','publishing_house_course_levels.id = publishing_house_course_units.publishing_house_course_level_id', 'left')
                        ->join('publishing_house_courses','publishing_house_course_units.publishing_house_course_id = publishing_house_courses.id', 'left')
                        ->join('courses','publishing_house_courses.course_id = courses.id', 'left')
                        ->where("publishing_house_course_units.publishing_house_course_id",$record->course_id)
                        ->where("publishing_house_course_levels.id IS NOT NULL ")
                        ->where("publishing_house_course_units.unit_id",$record->unit_id)
                        ->get('publishing_house_course_units')->row();

                    if($publisUnit){
                        $record1  = $this->db
                            ->select('lessons.name as LessonName,lessons.update_time,lessons_part.name as lessons_partName')
                            ->join('lessons','lessons.id = lessons_part.lesson_id', 'left')
                            ->where("lessons_part.id",$record->part_id)
                            ->get("lessons_part")->row();
                        if($record1){
                            $data = array(
                                "name"=> $publisUnit->publishing_house_course_levels_name.'--'.$publisUnit->publishing_house_course_units_name.'--'.$record1->LessonName.'--'.$record1->lessons_partName,
                                "unit_id"=>$record->unit_id,
                                "level_id"=>$record->level_id,
                                "lesson_id"=>$record->lesson_id,
                                "lesson_update_time"=>$record1->update_time,
                                "part_id"=>$record->part_id,
                                "lesson_name"=>$record1->LessonName,
                                "lesson_object_key"   =>"assets/lesson".$record->lesson_id.'.zip',
                                "parts"=>$this->lessonpart->getLessonpartListNew($user,$record->lesson_id)
                            );
                        }
                    }
                }

            }
        }

        return $data;

    }



    public function getMyParticipationDegreeTime($class_id = 0){
        $return = array();
        if($this->user_id && $class_id == 0){


            //主要组装分区数据

            if((strtotime($this->end_time ) - strtotime($this->start_time) > 7*60*60*24) || date("Y-m",strtotime($this->end_time)) == date("Y-m",strtotime($this->start_time)) ){
                $table =  $this->table_user_record_time.' '.'PARTITION('.implode(",",$this->getMyParticipationPartitions($this->end_time)).')';
                // 只选择一个月

                //  echo $table;
                $records = $this->db->select('SUM(time) as timecount,date');
                $records  = $this->getWhere($records)->group_by("date")->get($table)->result();
                // echo $this->db->last_query();exit;
                //组装学习数据
                $timelist = array();
                foreach ($records as $record){
                    $timelist[$record->date] = $record->timecount;
                }



                //循环日期
                $count = $this->getDays();
                for ($i=0 ;$i <= $count; $i++ ){
                    $date1 = date("Y-m-d",strtotime("+".$i." day",strtotime($this->start_time)));
                    if(isset( $timelist[$date1])){
                        $return[] = array(
                            "date"=>  $date1,
                            "time"=>(int)$timelist[$date1]
                        );
                    }else{
                        $return[] = array(
                            "date" =>  $date1,
                            "time" =>  0
                        );
                    }
                }


            }else{
                //选择7天
                $count = $this->getDays();
                for ($i=0 ;$i <= $count; $i++ ){

                    $date1 = date("Y-m-d",strtotime("+".$i." day",strtotime($this->start_time)));
                    $table =  $this->table_user_record_time.' '.'PARTITION('.implode(",",$this->getMyParticipationPartitions($date1)).')';

                    $records = $this->db->select('SUM(time) as timecount')->where("date",$date1)->where("user_id",$this->user_id)->get($table)->row();
                    if(isset( $records->timecount)){
                        $return[] = array(
                            "date"=>  $date1,
                            "time"=> (int)$records->timecount
                        );
                    }else{
                        $return[] = array(
                            "date" =>  $date1,
                            "time" =>  0
                        );
                    }
                }
            }
            $todaytime = date("Y-m-d");
            $table1 =  $this->table_user_record_time.' '.'PARTITION('.implode(",",$this->getMyParticipationPartitions($todaytime)).')';
            $records1 = $this->db->select('SUM(time) as timecount')->where("date",$todaytime)->where("user_id",$this->user_id)->get($table1)->row();
            if(isset( $records1->timecount)){
                $this->returncode['data']['today'] = array(
                    "date"=>  $todaytime,
                    "time"=> (int)$records1->timecount
                );
            }else{
                $this->returncode['data']['today'] = array(
                    "date" =>  $todaytime,
                    "time" =>  0
                );
            }
            $this->returncode['data']['timeList'] = $return;
            $this->returncode['data']['timeBody'] = "学习时间是硬指标，学习时间直接反映学生的学习方法和效果。（学习时间应该是影响学习效果，而不是反映学习效果）建议练习频率：每周至少学习4-5次；每次练习时间不少于20分钟；每周总学习时间不少于2-3机时。\n 这些学习频率和学习时间的建议都是基于大脑的记忆和遗忘规律提出的，也是根据近几十年来多媒体课程使用群体的学习时间和学习效果对比研究后得出的最佳练习时间要求。";
            $this->returncode['data']['functionKey'] = $this->getfunctionKey();
        }else if ($class_id !=0 ){

            $teacherAuth = $this->db->select('class_user_relationship.id')
                ->where('class_user_relationship.user_type',"teacher")
                ->where("class_user_relationship.user_id",$this->user_id)
                ->where("class_user_relationship.class_id",$class_id)
                ->get('class_user_relationship')->row();


            if($teacherAuth){
                //主要组装分区数据

                $users = $this->db->select('class_user_relationship.user_id as id')
                    ->where('class_user_relationship.user_type',"student")
                    ->where("class_user_relationship.class_id",$class_id)
                    ->where("class_user_relationship.status",1)
                    ->get('class_user_relationship')->result();

               if($users){
                   $this->user_id = 0;
                   $this->users = $users;

                   if((strtotime($this->end_time ) - strtotime($this->start_time) > 7*60*60*24) || date("Y-m",strtotime($this->end_time)) == date("Y-m",strtotime($this->start_time)) ){
                       $table =  $this->table_user_record_time.' '.'PARTITION('.implode(",",$this->getMyParticipationPartitions($this->end_time)).')';
                       // 只选择一个月

                       //  echo $table;
                       $records = $this->db->select('SUM(time) as timecount,date');
                       $records  = $this->getWhere($records)
                           ->group_by("date")
                           ->get($table)->result();

                       //组装学习数据
                       $timelist = array();
                       foreach ($records as $record){
                           $timelist[$record->date] =(int) $record->timecount/count($this->users);
                       }



                       //循环日期
                       $count = $this->getDays();
                       for ($i=0 ;$i <= $count; $i++ ){
                           $date1 = date("Y-m-d",strtotime("+".$i." day",strtotime($this->start_time)));
                           if(isset( $timelist[$date1])){
                               $return[] = array(
                                   "date"=>  $date1,
                                   "time"=>(int)$timelist[$date1]
                               );
                           }else{
                               $return[] = array(
                                   "date" =>  $date1,
                                   "time" =>  0
                               );
                           }
                       }


                   }else{
                       //选择7天
                       $count = $this->getDays();

                       for ($i=0 ;$i <= $count; $i++ ){

                           $date1 = date("Y-m-d",strtotime("+".$i." day",strtotime($this->start_time)));
                           $table =  $this->table_user_record_time.' '.'PARTITION('.implode(",",$this->getMyParticipationPartitions($date1)).')';
                           $records = $this->db->select('SUM(time) as timecount')->where_in("user_id",$this->toIdArray($this->users))->where("date",$date1)->get($table)->row();
                           if(isset( $records->timecount)){
                               $return[] = array(
                                   "date"=>  $date1,
                                   "time"=> (int) $records->timecount/count($this->users)
                               );
                           }else{
                               $return[] = array(
                                   "date" =>  $date1,
                                   "time" =>  0
                               );
                           }
                       }
                   }
                   $item = $this->db->select("id,name,study_num_time,study_num_day,study_num_week_time")
                       ->where("id",$class_id)
                       ->get("classes")
                       ->row();
                   if($item){
                       $this->returncode['data']['classInfo'] = $item;
                   }
                   $todaytime = date("Y-m-d");
                   $table1 =  $this->table_user_record_time.' '.'PARTITION('.implode(",",$this->getMyParticipationPartitions($todaytime)).')';
                   $records1 = $this->db->select('SUM(time) as timecount')->where("date",$todaytime)->where_in("user_id",$this->toIdArray($this->users))->get($table1)->row();
                   if(isset( $records1->timecount)){
                       $this->returncode['data']['today'] = array(
                           "date"=>  $todaytime,
                           "time"=> (int)$records1->timecount/count($this->users)
                       );
                   }else{
                       $this->returncode['data']['today'] = array(
                           "date" =>  $todaytime,
                           "time" =>  0
                       );
                   }
                   $this->returncode['data']['timeList'] = $return;
                   $this->returncode['data']['timeBody'] = "学习时间是硬指标，学习时间直接反映学生的学习方法和效果。（学习时间应该是影响学习效果，而不是反映学习效果）建议练习频率：每周至少学习4-5次；每次练习时间不少于20分钟；每周总学习时间不少于2-3机时。\n 这些学习频率和学习时间的建议都是基于大脑的记忆和遗忘规律提出的，也是根据近几十年来多媒体课程使用群体的学习时间和学习效果对比研究后得出的最佳练习时间要求。";
                   $this->returncode['data']['functionKey'] = $this->getfunctionKey();
               }

            }else{
                $this->returncode['errcode'] = 40000001;
                $this->returncode['errdesc'] = "您没有查询权限!";
            }

        }else{
            $this->returncode['errcode'] = 40000002;
            $this->returncode['errdesc'] = "非法参数!";
        }

        return $this;
    }

    // 获取最近15天功能键使用情况

    public function getfunctionKey(){
        $this->start_time = date('Y-m-d',strtotime( '- 15 days'));
        $this->end_time = date('Y-m-d');
        $return['repeat_count'] = 0;
        $return['mic_count'] = 0;
        $return['head_count'] = 0;
        $return['body'] = "主要功能键包括重复键，录音键，回听键和文字键。\n 重复键允许学生反复听，强化输入；\n 录音键帮助学生开口练习，强化输出；\n 回听键是回听自己的录音，通过和系统原声进行对比，有针对性地优化学生自己的语音语调。按照脑认知科学和语音学习规律的要求，重复键：录音键：回听键=3：1：1，保证先输入后输出基础上，合理分配各功能键的使用比，更有利于帮助学生夯实英语语言基础。\n 尽量避免使用文字键，脑认知科学的研究表明，频繁使用文字键会影响学生的听说训练效果。按照上述建议正确合理使用各功能键，能帮助学生养成良好的学习习惯，保证有效的练习效果，并不断提升语言学习质量。因此，在每次学习的时候，必须保证功能键的使用频率。";
        if(date("Y-m",strtotime( $this->end_time)) == date("Y-m",strtotime($this->start_time)) ){
            $table =  $this->table_user_record_time.' '.'PARTITION('.implode(",",$this->getMyParticipationPartitions($this->start_time)).')';
            // 只选择一个月
            //  echo $table;
            $records = $this->db->select('SUM(repeat_count) as repeat_count,SUM(mic_count) as mic_count,SUM(head_count) as head_count');
            $records  = $this->getWhere($records)->get($table)->row();
            $return['repeat_count'] = isset($records->repeat_count)?$records->repeat_count:0;
            $return['mic_count'] = isset($records->mic_count)?$records->mic_count:0;;
            $return['head_count'] = isset($records->head_count)?$records->head_count:0;

        }else{
            $records = $this->db->select('SUM(repeat_count) as repeat_count,SUM(mic_count) as mic_count,SUM(head_count) as head_count');
            $records  = $this->getWhere($records)->get($this->table_user_record_last)->row();
            $return['repeat_count'] = isset($records->repeat_count)?$records->repeat_count:0;
            $return['mic_count'] = isset($records->mic_count)?$records->mic_count:0;;
            $return['head_count'] = isset($records->head_count)?$records->head_count:0;
        }
        if(count($this->users) > 0){
            $return['repeat_count'] = ceil( $return['repeat_count']/count($this->users));
            $return['mic_count'] =   ceil( $return['mic_count']/count($this->users));
            $return['head_count'] =   ceil( $return['head_count']/count($this->users));
        }
        return $return;

    }

    //自定义date
    public function getMyParticipationPartitions($time){
        $date = date("Y-m",strtotime($time));
        $partitions = array();
        foreach($this->partitions as $key=> $partition){
            if($key ==  $date){
                $partitions[] = $partition;
            }
        }
        return $partitions;
    }


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
        $this->users       = array();

        return $this;
    }

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


    /**
     *
     * 获取我的学习时间列表
     *
     */

    public function getLearningTimeList($limt=20,$start=0){
        if(!$this->user_id) return array();

        $version = $this->db
            ->where("user_id",$this->user_id)
            ->where("date",$this->date)
            ->get("user_agent")->row();
        $records = $this->db->select('users_record.*');
        $records  = $records
            ->where("users_record.user_id",$this->user_id)
            ->where("users_record.date",$this->date)
            ->where("users_record.time !=",0)
            ->order_by("users_record.time","desc")
            ->limit($limt,$start)
            ->get($this->table_user_record)->result();
        foreach($records as $record){
            $record->version = $version->version;
        }
        return $records;
    }


    public function getMyLearningTime(){
        if($this->user_id){
            $records = $this->db->select('SUM(time) as timecount');
            $records  = $this->getWhere($records)->where("time !=",0)->get($this->table_user_record)->row();
            if($records && isset($records->timecount)) return  $records->timecount;
        }
        return 0;
    }

    /**
     *
     * 获取我的学习时间总数
     *
     */

    public function getLearningTimeCount(){
        if($this->user_id){
            $records = $this->db->select('*');
            $records  = $this->getWhere($records)->where("date",$this->date)->where("time !=",0)->get($this->table_user_record)->num_rows();
            return $records;
        }
        return 0;
    }

    public function updateTime($record_id=0,$time){
        if($record_id !=0){
            $this->db->where("id",$record_id);
            $this->db->update("users_record",array("time"=>$time));
        }
        return 0;
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



    /*
     *
     *
     * 存储part对应数据
     *
     * */

    public function savePartRecord($user_id=0,$unit_id=0,$lesson_id=0,$part_id=0,$entity=array()){

        if($user_id !=0 && $unit_id !=0 && $lesson_id !=0 && $part_id != 0){
            $data=array(
                "user_id"=>$user_id,
                "unit_id"=>$unit_id,
                "lesson_id"=>$lesson_id,
                "part_id"=>$part_id,
            );
            if(isset($entity['study_of_nums']) && !empty($entity['study_of_nums'])){
                $data['study_of_nums'] = $entity['study_of_nums'];
            }
            if(isset($entity['mt_score']) && !empty($entity['mt_score'])){
                $data['mt_score'] = $entity['mt_score'];
            }
            if(isset($entity['study_number_of_questions']) && !empty($entity['study_number_of_questions'])){
                $data['study_number_of_questions'] = $entity['study_number_of_questions'];
            }
            if(isset($entity['study_of_times']) && !empty($entity['study_of_times'])){
                $data['study_of_times'] = $entity['study_of_times'];
            }

            if(isset($entity['last_group_id']) && !empty($entity['last_group_id'])){
                $data['last_group_id'] = $entity['last_group_id'];
            }

            if(isset($entity['accuracy']) && !empty($entity['accuracy'])){
                $data['accuracy'] = $entity['accuracy'];
                if( $data['accuracy'] > 1)  $data['accuracy'] = 1;
            }

            if(isset($entity['completion_rate']) && !empty($entity['completion_rate'])){
                $data['completion_rate'] = $entity['completion_rate'];
                if( $data['completion_rate'] > 1)  $data['completion_rate'] = 1;
            }


            $row = $this->db->where("user_id",$user_id)->where("part_id",$part_id)->get("user_relation_part")->num_rows();
            if($row == 0){
                $this->db->insert("user_relation_part", $data);
            }else{
                $this->db->where("user_id",$user_id)->where("part_id",$part_id)->update("user_relation_part", $data);
            }
        }
        return true;
    }

    public function getPartRecord($user_id,$part_id){
        return $this->db->where("user_id",$user_id)->where("part_id",$part_id)->get("user_relation_part")->row();

    }


    public function calcuStudyTimes($group_id=0,$unit_id,$lesson_id){
        $data  = array();
        if($this->user_id){
            if($this->part_id != 0 ){
                $part = $this->db->where("id",$this->part_id)->get("lessons_part")->row();
                $lesson_id = $part->lesson_id;
                $recordPart = $this->getPartRecord($this->user_id,$this->part_id);

                if(!$recordPart || empty($recordPart->study_of_times)){
                    $record = $this->db->select('SUM(time) as timecount');
                    $record  = $this->getWhere($record)->where("time !=",0)->get($this->table_user_record)->row();
                    // 再计算最近一次插入的值
                    $row = $this->db->select('SUM(time) as timecount')->where("group_id",$group_id)->where("user_id",$this->user_id)
                        ->get($this->table_user_record_last)->row();
                    if(!isset($record->timecount)) $record->timecount = 0;
                    if(!isset($row->timecount)) $row->timecount = 0;
                    $data["study_of_times"] = $record->timecount + $row->timecount;
                }else{
                    if($recordPart->last_group_id != 0 && $recordPart->last_group_id == $group_id){
                        return false;
                    }
                    $row = $this->db->select('SUM(time) as timecount')->where("group_id",$group_id)->where("user_id",$this->user_id)
                        ->get($this->table_user_record_last)->row();
                    if(!isset($row->timecount)) $row->timecount = 0;

                    $data["study_of_times"] = $recordPart->study_of_times + $row->timecount;
                }
                $data["last_group_id"] = $group_id;
                if(isset($data['study_of_times'])){
                    $this->savePartRecord($this->user_id,$unit_id,$lesson_id,$this->part_id,$data);
                }

            }elseif( $this->lesson_id != 0 ){
                $parts = $this->db->where("lesson_id",$this->lesson_id)->where("status",1)->get("lessons_part")->result();
                if($parts){
                    foreach($parts as $part){
                        $this->part_id   = $part->id;
                        $recordPart = $this->getPartRecord($this->user_id,$this->part_id);

                        if(!$recordPart || empty($recordPart->study_of_times)){
                            $record = $this->db->select('SUM(time) as timecount');
                            $record  = $this->getWhere($record)->where("time !=",0)->get($this->table_user_record)->row();
                            // 再计算最近一次插入的值
                            $row = $this->db->select('SUM(time) as timecount')->where("group_id",$group_id)->where("user_id",$this->user_id)
                                ->get($this->table_user_record_last)->row();
                            if(!isset($record->timecount)) $record->timecount = 0;
                            if(!isset($row->timecount)) $row->timecount = 0;
                            $data["study_of_times"] = $record->timecount + $row->timecount;
                        }else{
                            if($recordPart->last_group_id != 0 && $recordPart->last_group_id == $group_id){
                                return false;
                            }
                            $row = $this->db->select('SUM(time) as timecount')->where("group_id",$group_id)->where("user_id",$this->user_id)
                                ->get($this->table_user_record_last)->row();
                            if(!isset($row->timecount)) $row->timecount = 0;
                            $data["study_of_times"] = $recordPart->study_of_times + $row->timecount;
                        }
                        $data["last_group_id"] = $group_id;
                        if(isset($data['study_of_times'])){
                            $this->savePartRecord($this->user_id,$unit_id,$lesson_id,$this->part_id,$data);
                        }

                    }
                }
            }
//
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

            if($this->part_id != 0){
                $row = $this->db->where("id",$this->part_id)->where("status",1)->get("lessons_part")->row();
                if($row){
                    $this->part_type = $row->part_type;
                    $this->type = $row->type;
                    $record  = $this->db->select("id,unit_id")
                        ->where("user_id",$this->user_id)
                        ->where("part_id",$this->part_id)->limit(1)
                        ->get($this->table_user_record)
                        ->row();

                    if($record){
                        $this->unit_id = $record->unit_id;
                        $this->lesson_id   = $row->lesson_id;
                        $percentCompletion += $this->getPartCompletion($row);
                        $entity['completion_rate'] = $percentCompletion;
                        $this->savePartRecord($this->user_id,$this->unit_id,$row->lesson_id,$this->part_id,$entity);
                    }

                }
                //return $percentCompletion;
            }else if($this->lesson_id !=0 ){
                $parts = $this->db->where("lesson_id",$this->lesson_id)->where("status",1)->get("lessons_part")->result();
                if($parts){
                    foreach($parts as $part){
                        $this->part_id   = $part->id;
                        $this->part_type = $part->part_type;
                        $this->type      = $part->type;
                        $record  = $this->db->select("id,unit_id")
                            ->where("user_id",$this->user_id)
                            ->where("part_id",$this->part_id)->limit(1)
                            ->get($this->table_user_record)
                            ->row();
                        if($record){
                            $this->unit_id = $record->unit_id;
                            $entity['completion_rate'] =  $this->getPartCompletion($part);
                            $this->savePartRecord($this->user_id,$this->unit_id,$this->lesson_id,$this->part_id,$entity);

                            $percentCompletion += $entity['completion_rate'];
                        }

                    }
                    $percentCompletion =  $percentCompletion/count($parts);
                }
                // return $percentCompletion;
            }else if($this->unit_id !=0 ){
                $lessons = $this->db->where("unit_id",$this->unit_id)->where("status",1)->get("lessons")->result();
                if($lessons){
                    $parts = $this->db->where_in("lesson_id",$this->toIdArray($lessons))->where("status",1)->get("lessons_part")->result();
                    if($parts){
                        foreach($parts as $part){
                            $this->part_id      = $part->id;
                            $this->part_type    = $part->part_type;
                            $this->type         = $part->type;
                            $this->lesson_id   = $part->lesson_id;
                            // echo  $part->id.'___'.$this->getPartCompletion().'<br />';
                            $record  = $this->db->select("id")
                                ->where("user_id",$this->user_id)
                                ->where("part_id",$this->part_id)->limit(1)
                                ->get($this->table_user_record)
                                ->row();
                            if($record){
                                $entity['completion_rate'] =  $this->getPartCompletion($part);
                                $this->savePartRecord($this->user_id,$this->unit_id,$part->lesson_id,$this->part_id,$entity);

                                $percentCompletion += $entity['completion_rate'];

                                //$percentCompletion += $this->getPartCompletion($part);
                            }
                        }
                        $percentCompletion =  $percentCompletion/count($parts);
                    }
                }
                // return $percentCompletion;
            }
        }
        if($percentCompletion > 1) $percentCompletion = 1;
        return $percentCompletion;
    }



    public function getMyCompletion1(){
        $percentCompletion = 0;
        if($this->user_id || count($this->users)){
            //判断如果是part_id

            if($this->part_id != 0){
                $row = $this->db->where("id",$this->part_id)->where("status",1)->get("lessons_part")->row();
                if($row){
                    $this->part_type = $row->part_type;
                    $percentCompletion += $this->getPartCompletion();
                }
                return $percentCompletion;
            }else if($this->lesson_id !=0 ){
                $parts = $this->db->where("lesson_id",$this->lesson_id)->where("status",1)->get("lessons_part")->result();
                if($parts){
                    foreach($parts as $part){
                        $this->part_id = $part->id;
                        $this->part_type = $part->part_type;
                        echo  $part->id.'___'.$this->getPartCompletion().'<br />';
                        $percentCompletion += $this->getPartCompletion();
                    }
                    echo "total".$percentCompletion.'count'.count($parts);
                    return $percentCompletion/count($parts);
                }
                return $percentCompletion;
            }else if($this->unit_id !=0 ){
                $lessons = $this->db->where("unit_id",$this->unit_id)->where("status",1)->get("lessons")->result();
                if($lessons){
                    $parts = $this->db->where_in("lesson_id",$this->toIdArray($lessons))->where("status",1)->get("lessons_part")->result();
                    if($parts){
                        foreach($parts as $part){
                            $this->part_id = $part->id;
                            $this->part_type = $part->part_type;
                            echo  $part->id.'___'.$this->getPartCompletion().'<br />';
                            $percentCompletion += $this->getPartCompletion();
                        }
                        echo "total".$percentCompletion.'count'.count($parts);
                        return $percentCompletion/count($parts);
                    }
                }
                return $percentCompletion;
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
        if($this->user_id || count($this->users)){
            if($this->part_id != 0){
                $part = $this->db->where("id",$this->part_id)->get("lessons_part")->row();
                $lesson = $this->db->where("id",$part->lesson_id)->get("lessons")->row();
                if($part->part_type == "listening"){
                    if($lesson){
                        $entity['accuracy'] = 1;
                        $this->savePartRecord($this->user_id,$lesson->unit_id,$part->lesson_id,$this->part_id,$entity);
                    }
                    return 1;
                }
                // $group = $this->db->select('group_id');
                $group  = $this->db->select('group_id')->where("user_id",$this->user_id)->where("part_id",$this->part_id)->order_by("id","desc")->limit(1)->get($this->table_user_record)->row();
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
                if($lesson){
                    $entity['accuracy'] = $percentCorrection;
                    $entity['study_number_of_questions'] =$records;
                    $this->savePartRecord($this->user_id,$lesson->unit_id,$part->lesson_id,$this->part_id,$entity);
                }
                return $percentCorrection;
            }else if($this->lesson_id !=0 ){
                $parts = $this->db->where("lesson_id",$this->lesson_id)->where("(part_type != 'listening' OR type != 'listening') ")->where("status",1)->get("lessons_part")->result();

                if($parts){
                    foreach($parts as $part){
                        $this->part_id = $part->id;
                        // $group = $this->db->select('group_id');
                        $group  = $this->db->select('group_id')->where("user_id",$this->user_id)->where("part_id",$this->part_id)->order_by("id","desc")->limit(1)->get($this->table_user_record)->row();
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
//                            $records  = $this->getWhere($records)->where("group_id",$group->group_id)->where("content_id !=",0)->get($this->table_user_record)->row();
//                            $correctrecords = $this->db->select('count(*) as num');
//                            $correctrecords  = $this->getWhere($correctrecords)->where("group_id",$group->group_id)->where("iscorrect",1)->where("content_id !=",0)->get($this->table_user_record)->row();
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
            }else if($this->unit_id !=0 ){
                $lessons = $this->db->where("unit_id",$this->unit_id)->get("lessons")->result();
                if($lessons){
                    $parts = $this->db->where_in("lesson_id",$this->toIdArray($lessons))->where("(part_type != 'listening' OR type != 'listening') ")->where("status",1)->get("lessons_part")->result();

                    if($parts){
                        foreach($parts as $part){
                            $this->part_id = $part->id;
                            //       $group = $this->db->select('group_id');
                            $group  = $this->db->select('group_id')->where("user_id",$this->user_id)->where("part_id",$this->part_id)->order_by("id","desc")->limit(1)->get($this->table_user_record)->row();
                            // echo $this->db->last_query();
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
//                                $records  = $this->getWhere($records)->where("group_id",$group->group_id)->where("content_id !=",0)->get($this->table_user_record)->row();
//                                $correctrecords = $this->db->select('count(*) as num');
//                                $correctrecords  = $this->getWhere($correctrecords)->where("group_id",$group->group_id)->where("iscorrect",1)->where("content_id !=",0)->get($this->table_user_record)->row();
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
            $function = "listeningCompletion";
            return  $this->$function($part);
        }
        return 0;
    }

    public function getWhere($db,$hasLesson=true){
        if($this->unit_id != 0)         $db->where("unit_id",$this->unit_id);
        if($this->user_id != 0)         $db->where("user_id ",$this->user_id);
        if($this->part_id != 0)         $db->where("part_id ",$this->part_id);
        if($this->lesson_id != 0 && $hasLesson)       $db->where("lesson_id ",$this->lesson_id);
        if(count($this->users))         $db->where_in("user_id",$this->toIdArray($this->users));
        if($this->course_id != 0)       $db->where("course_id ",$this->course_id );
        // if($this->start_time)      $db->where("start_time",$this->start_time );
        return $db;
        // if(count($this->users))    $db->where_in("user_id  ",$this->users);
    }


    /*
     *
     * listen 完成率
     *
     */

    public function listeningCompletion($part){
        $record = $this->db;
        $record  = $record->select("id")->where("user_id",$this->user_id)->where("part_id",$this->part_id)->limit(3)->get($this->table_user_record)->num_rows();
        // echo $this->db->last_query();
        if($record){
            if($record == 1) return 0.3;
            else if($record == 2) return 0.6;
            else if($record == 3) return 1;
            else return 1;
        }else{
            return 0;
        }
    }


    /*
    *
    * listen 完成率
    *
    */

    public function vocabularyCompletion($part){

        $record = $this->db;
        $record  = $record->select("id")->where("user_id",$this->user_id)->where("part_id",$this->part_id)->limit(3)->get($this->table_user_record)->num_rows();
        // echo $this->db->last_query();
        if($this->type == "listening"){
            if($record == 1) return 0.3;
            else if($record== 2) return 0.6;
            else if($record== 3) return 1;
            else return 1;
        }else{
            //       $part = $this->lessonpart->getLessonpart($this->part_id);
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($part->total_items != 0){
                return $record/$part->total_items?$record/$part->total_items:0;
            }
        }
        return 0;
    }


    /*
   *
   * listen 完成率
   *
   */

    public function phonicsCompletion($part){
        $record = $this->db;
        $record  = $record->select("id")->where("user_id",$this->user_id)->where("part_id",$this->part_id)->limit(3)->get($this->table_user_record)->num_rows();
        // echo $this->db->last_query();
        if($this->type == "listening"){
            if($record == 1) return 0.3;
            else if($record== 2) return 0.6;
            else if($record== 3) return 1;
            else return 1;
        }else{
            //        $part = $this->lessonpart->getLessonpart($this->part_id);
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($part->total_items != 0){
                return $record/$part->total_items?$record/$part->total_items:0;
            }
        }
        return 0;
    }


    /*
     *
     * comprehension 完成率
     *
     */

    public function comprehensionCompletion($part){
        if($this->part_id){
            //       $part = $this->lessonpart->getLessonpart($this->part_id);
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($part->total_items != 0){
                return $record/$part->total_items?$record/$part->total_items:0;
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
            //     $part = $this->lessonpart->getLessonpart($this->part_id);
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($part->total_items != 0){
                return $record/$part->total_items?$record/$part->total_items:0;
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
            //     $part = $this->lessonpart->getLessonpart($this->part_id);
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($part->total_items != 0){
                return $record/$part->total_items?$record/$part->total_items:0;
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
            //      $part = $this->lessonpart->getLessonpart($this->part_id);
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($part->total_items != 0){
                return $record/$part->total_items?$record/$part->total_items:0;
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
            //    $part = $this->lessonpart->getLessonpart($this->part_id);
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($part->total_items != 0){
                return $record/$part->total_items?$record/$part->total_items:0;
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
            //     $part = $this->lessonpart->getLessonpart($this->part_id);
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($part->total_items != 0){
                return $record/$part->total_items?$record/$part->total_items:0;
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
            //   $part = $this->lessonpart->getLessonpart($this->part_id);
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($part->total_items != 0){
                return $record/$part->total_items?$record/$part->total_items:0;
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
            //  $part = $this->lessonpart->getLessonpart($this->part_id);
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($part->total_items != 0){
                return $record/$part->total_items?$record/$part->total_items:0;
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
            //   $part = $this->lessonpart->getLessonpart($this->part_id);
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($part->total_items != 0){
                return $record/$part->total_items?$record/$part->total_items:0;
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
            //   $part = $this->lessonpart->getLessonpart($this->part_id);
            $totalCount = count(explode(",",$part->select_items_1));
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
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
            //  $part = $this->lessonpart->getLessonpart($this->part_id);
            $totalCount = count(explode(",",$part->select_items_1));
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
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
            // $part = $this->lessonpart->getLessonpart($this->part_id);
            $totalCount = $part->content_perpage;
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
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
            //$part = $this->lessonpart->getLessonpart($this->part_id);
            $totalCount = $part->content_perpage;
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
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
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($record >0  && $totalCount >0 ){
                return $record/$totalCount;
            }
        }
        return 0;
    }


    public function QuizCompletion($part){
        if($this->part_id){
            // $part = $this->lessonpart->getLessonpart($this->part_id);
            $record = $this->db->select('*');
            $record  = $this->getWhere($record,false)->where("content_id !=",0)->where("part_type",$this->part_type)->group_by("content_id")->get($this->table_user_record)->num_rows();
            if($part->total_items != 0){
                return $record/$part->total_items?$record/$part->total_items:0;
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
            $function = "listeningCorrection";
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
        $record  = $this->getWhere($record)->where("part_type",$this->part_type)->group_by("part_id")->get($this->table_user_record)->row();
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


    /**
     *
     * MT 个人单元最高得分
     *
     */


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

    public function getUserMTScoresDate($lesson_id){
        if($this->user_id || count($this->users)){
            // $row = $this->db;
            $row =  $this->db
                ->select("SUM(scores) as totalScore,date,device_platform")
                ->where("user_id",$this->user_id)
                ->where("iscorrect",1)
                ->where("lesson_id",$lesson_id)
                ->order_by("totalScore","desc")
                ->group_by("group_id")
                ->get($this->table_user_record)->row();
            // echo $this->db->last_query();
            if($row){
                if($row->device_platform == "iphone" && $row->date >= "2018-12-01"){

                    $query1 = "select SUM(scores) as totalScore from (select * from (select *from wetalk_users_record where date ='".$row->date."'  and  lesson_id = $lesson_id and user_id = $this->user_id and iscorrect = 1 ) as t group by content_id) as b";
                    $item = $this->db->query($query1)->row();
                    // echo $this->db->last_query();
                    if($item->totalScore > 100) $item->totalScore = 100;
                    $row->totalScore = $item->totalScore;
                    return $row;
                }else{
                    if($row->totalScore > 100) $row->totalScore = 100;
                    return $row;
                }


            }
        }

        $row = new stdClass();
        $row->totalScore = 0;
        $row->date = "";
        return $row;
    }


    public function getUserMTScores($lesson_id){
        if($this->user_id || count($this->users)){
            $row =  $this->db
                ->select("SUM(scores) as totalScore")
                ->where("user_id",$this->user_id)
                ->where("iscorrect",1)
                ->where("lesson_id",$lesson_id)
                ->order_by("totalScore","desc")
                ->group_by("group_id")
                ->get($this->table_user_record)->row();
            // echo $this->db->last_query();
            if($row){
                if($row->totalScore > 100) $row->totalScore = 100;
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
        if($this->user_id || count($this->users)){
//            $rows = $this->db->select('*');
//            $rows = $this->getWhere($rows)
//                ->select("users_record.*,SUM(scores) as totalScore")
//                ->where("iscorrect",1)
//                ->where("lesson_id",$lesson_id)
//                ->group_by("group_id")
//                ->order_by("date","desc")
//                ->get($this->table_user_record)->result();


            $query = "select t.* from (select *,SUM(scores) as totalScore from wetalk_users_record where lesson_id = $lesson_id and user_id = $this->user_id and iscorrect =1 group by group_id) as t order by end_time desc";
            $rows = $this->db->query($query)->result();
            //  echo $this->db->last_query();
            $date = false;
            foreach($rows as $row){
                if( $row->date == '0000-00-00') continue;
                if($row->totalScore > 100) $row->totalScore = 100;
                if($row->device_platform == "iphone"  && $row->date >= "2018-12-01"){
                    if($date && $date ==  $row->date){
                        continue;
                    }else{
                        $date = $row->date;
                    }

                    $query1 = "select SUM(scores) as totalScore from (select* from (select *from wetalk_users_record where date ='".$row->date."'  and  lesson_id = $lesson_id and user_id = $this->user_id  and iscorrect = 1) as t group by content_id ) as b";
                    $item = $this->db->query($query1)->row();
                    //echo $this->db->last_query();
                    if($item->totalScore > 100) $item->totalScore = 100;
                    $data[] = array(
                        "date"=>$row->date,
                        "scores"=>$item->totalScore,
                    );

                }else{
                    $data[] = array(
                        "date"=>$row->date,
                        "scores"=>$row->totalScore,
                    );
                }

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
//                ->get($this->table_user_record)->result();

            $query = "select t.* from (select *,SUM(scores) as totalScore from wetalk_users_record where lesson_id = $lesson_id and user_id = $this->user_id and iscorrect =1 group by group_id) as t order by end_time desc limit 3";
            $rows = $this->db->query($query)->result();
            foreach($rows as $row){
                if( $row->date == '0000-00-00') continue;
                if($row->totalScore > 100) $row->totalScore = 100;
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
            $totalitems = $this->db;
            $totalitems = $this->getWhere($totalitems);

            $totalitems = $totalitems
                ->select("count(*) as num")
                ->where("questions_type",'sr')
                ->group_by("content_id")
                ->get($this->table_user_record_last)->num_rows();

            $correst = $this->db;
            $correst = $this->getWhere($correst);

            $correst = $correst
                ->select("count(*) as num")
                ->where("questions_type",'sr')
                ->where("iscorrect",1)
                ->group_by("content_id")
                ->get($this->table_user_record_last)->num_rows();
            if($totalitems != 0){
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
            $Correct    = $this->getUserPartsCorrect();
            $Pass       = $this->getUserPartsPass();
            $mt         = $this->getUserMTaverage();
            $sr         = $this->getUserSrPecent();
            return ($Completion+ $Correct+ $Pass+$mt+$sr)*0.04;
        }
        return 0;
    }


    public function getCourseInfoList($user){

        $publishing_house_id = 0;
        $UserSchoolGradeClassRealtionShip = $user->getUserSchoolGradeClassRealtionShip();
        if($UserSchoolGradeClassRealtionShip){
            //与学校关系存在
            if(isset($UserSchoolGradeClassRealtionShip->school_id) && !empty($UserSchoolGradeClassRealtionShip->school_id)){
                $school = $this->school->getSchool($UserSchoolGradeClassRealtionShip->school_id);
                if($school->id != 0){
                    $publishing_house_id = $school->publishing_house_id;
                }
            }
        }

        $result = array();
        $courses = $this->db->select('courses.id,publishing_house_courses.id as publishing_house_course_id')
            ->join('courses','courses.id = publishing_house_courses.course_id', 'left')
            ->where("courses.status",1);
        $coursearray = explode(",",$user->course_ids);
        $courses = $courses->where_in("courses.id",$coursearray);


        $courses = $courses->where("publishing_house_courses.publishing_house_id",$publishing_house_id)
            ->order_by("publishing_house_courses.sort","asc")->get("publishing_house_courses")->result();
        foreach($courses as $course){
            $couseInfo = $this->course->getCourse($course->id)->getCourseInfo($user);
            $couseInfo['orgin_course_id'] = $couseInfo['id'];
            $couseInfo['id'] = $course->publishing_house_course_id;
            $result[] = $couseInfo;
        }
        $this->returncode['data'] = $result;
        return $this;
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
            if($pencent > 3) return 0.07;
            else if($pencent >2 && $pencent <= 3) 0.05;
            else if($pencent >1 && $pencent<= 2) 0.03;
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
        $repeat = $this->db;
        $repeat = $this->getWhere($repeat);
        $repeat = $repeat->select("SUM(mic_count) as num")->get($this->table_user_record)->row();

        $abc = $this->db;
        $abc = $this->getWhere($abc);
        $abc = $abc->select("SUM(head_count) as num")->get($this->table_user_record)->row();
        if($abc && $abc->num != 0 && !empty($repeat)){
            $pencent = $repeat->num/$abc->num;
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
//                    ->where("end_time <=",$end_time)->where("user_id",$this->user_id)->get($this->table_user_record)->row();
//                $head    = $this->db->select("SUM(head_count) as num")->where("start_time >=",$this->start_time)
//                    ->where("end_time <=",$end_time)->where("user_id",$this->user_id)->get($this->table_user_record)->row();
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
        if($total == 0){
            $ponit = 0;
        }elseif($total >= -12 && $total <= -2){
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
            // if(count($parts) > 0) return $point/count($parts);
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
                $this->part_id   = $part->part_id;
                if(empty($part->weight) || $part->weight = 0) $part->weight = 25;
                $point += $this->getPartCorrection()*$part->weight/100;
            }
            // if(count($parts) > 0) return $point/count($parts);
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

        $this->start_time = $month_frist_day;
        $this->end_time = $month_last_day;

        if($this->start_time && $this->end_time) {
            $totaldays = $this->getDays();
            $totalweek = intval($totaldays / 7);

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
        $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
        //获取今天的值
        $month_last_day = date('Y-m-d');

        $this->start_time = $month_frist_day;
        $this->end_time = $month_last_day;
        if($this->start_time && $this->end_time){
            $totaldays = $this->getDays();
            $totalweek =  intval($totaldays/7);

            //学习总天数
            $studyDays  = $this->db;
            $studyDays  = $this->getWhere($studyDays);

            $studyDays  = $studyDays->select("SUM(time) as num")
                ->where("date >=",$this->start_time)
                ->where("date <=",$this->end_time)
                ->get($this->table_user_record)->row();
            if($studyDays){
                $studyTime = $studyDays->num?$studyDays->num:0;
                if($totalweek >0) $weekStudyDays = round(($studyTime/(60*60)/$totalweek),1);
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
        $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
        //获取今天的值
        $month_last_day = date('Y-m-d');

        $this->start_time = $month_frist_day;
        $this->end_time = $month_last_day;
        if($this->start_time && $this->end_time){
            $totaldays = $this->getDays();
            $totalweek =  intval($totaldays/7);

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
        $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
        //获取今天的值
        $month_last_day = date('Y-m-d');

        $this->start_time = $month_frist_day;
        $this->end_time = $month_last_day;
        if($this->start_time && $this->end_time){
            $totaldays = $this->getDays();
            $totalweek =  intval($totaldays/7);

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
                ->where_in("user_id",$users)
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
                ->where_in("user_id",$users)
                ->where("date",date("Y-m-d"))
                ->group_by("user_id")
                ->order_by("totaltime","desc")
                ->limit(3)
                ->get($this->table_user_record)->result();
            foreach($topusers as $topuser){
                $user = $this->user->getUser($topuser->user_id)->getUserInfo();
                $user['studyTime'] = sprintf("%.2f",$topuser->totaltime/3600);
                $data[] = $user;
            }
//            if(!count($data)){
//                $userids = $this->db->select("id")->limit(3)->get("users")->result();
//                foreach($userids as $userid){
//                    $user = $this->user->getUser($userid->id)->getUserInfo();
//                    $user['studyTime'] = 0;
//                    $data[] = $user;
//                }
//            }
        }
        return $data;
    }


}  
