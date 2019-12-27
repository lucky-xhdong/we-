<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Classes extends CI_Model{



    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'classes.id'                => array("require" => false),
            'classes.name'              => array("require" => true),
            "classes.user_id"           => array("require" => false),
            "classes.created_time"      => array("require" => false),
            "classes.follower_count"    => array("require" => false),
            "classes.start_date"        => array("require" => false),
            "classes.end_date"          => array("require" => false),
            "classes.school_user_count" => array("require" => false),
            "classes.home_user_count"   => array("require" => false),
            "classes.block"             => array("require" => false),
            "classes.school_id"         => array("require" => false),
            "classes.grade_id"          => array("require" => false),
            "classes.enteryear"          => array("require" => false),
            "classes.course_ids"          => array("require" => false),
            "classes.study_day_time"    => array("require" => false),
            "classes.week_day_time"     => array("require" => false),
            "classes.times"             => array("require" => false),
            "classes.mt_completion_rate_status"   => array("require" => false),
            "classes.unit_test_score"   => array("require" => false),
            "classes.unit_test_day"   => array("require" => false),
            "classes.lock_status"   => array("require" => false),
            "classes.study_num_time"   => array("require" => false),
            "classes.study_num_day"   => array("require" => false),
            "classes.study_num_week_time"   => array("require" => false),
        );
        parent::_initialize($config);
    }

    public function getClass($id){
        $amoeba = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)).',school.name as schoolName')
            ->where("classes.id",$id)
            ->join('school', 'school.id = classes.school_id', 'left')
            ->get("classes")
            ->row_array();
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

    public function getClassInfo(){
        $follower_count =  $this->db
            ->where("class_user_relationship.class_id",$this->id)
            ->where("class_user_relationship.status",1)
            ->get('class_user_relationship')->num_rows();
        $data = array(
            'id'                => $this->id,
            'name'              => $this->name,
            "username"          => $this->getUserInfo()->name,
            "created_time"      => $this->created_time,
            "follower_count"    => $follower_count,
            "school_user_count" => $this->school_user_count?$this->school_user_count:0,
            "home_user_count"   => $this->home_user_count?$this->home_user_count:0,
            "start_date"        => $this->start_date,
            "end_date"          => $this->end_date,
            "livenessClass"     =>0,
            'livenessHome'      => 0,
            "block"             => $this->block,
            "grade_id"          => $this->grade_id,
            "enteryear"                  => $this->enteryear,
            'schoolName'                => $this->schoolName,
            'class_charts_url'          => anchorurl('components/groups/getClassDataWebView/' . $this->id),
            'my_ranking_list_url'  => anchorurl('components/users/getStudentRankingList/' . $this->id),
            'my_unchain_list_url' => anchorurl('components/users/unLockLesson/' . $this->id),
            'per_day_study_user_count'  =>$this->getClassPerDayStudyUserCount(),
            'per_day_study_top_user'    =>$this->getClassPerDayStudyTop()

        );
        $LearningSituationOverviewForClass = $this->getLearningSituationOverviewForClass($this->id);
        $data['totalScores'] = $LearningSituationOverviewForClass['totalScores'];
        $data['StudyReuslt'] = $LearningSituationOverviewForClass['StudyReuslt'];

        return $data;
    }


    public function getClassInfo1(){
        $data = array(
            'id'                => $this->id,
            'name'              => $this->name,
            "username"          => "",
            "created_time"      => $this->created_time,
            "follower_count"    => $this->follower_count,
            "school_user_count" => $this->school_user_count?$this->school_user_count:0,
            "home_user_count"   => $this->home_user_count?$this->home_user_count:0,
            "start_date"        => $this->start_date,
            "end_date"          => $this->end_date,
            "livenessClass"     =>0,
            'livenessHome'      => 0,
            "block"             => $this->block,
            "grade_id"          => $this->grade_id,
            "enteryear"                  => $this->enteryear,
            'schoolName'                => $this->schoolName,
            'class_charts_url'          => anchorurl('components/groups/getClassDataWebView/' . $this->id),
            'my_ranking_list_url'  => anchorurl('components/users/getStudentRankingList/' . $this->id),
            'my_unchain_list_url' => anchorurl('components/users/unLockLesson/' . $this->id),
            'per_day_study_user_count'  =>$this->getClassPerDayStudyUserCount(),
            'per_day_study_top_user'    =>$this->getClassPerDayStudyTop()

        );
        $LearningSituationOverviewForClass = $this->getLearningSituationOverviewForClass($this->id);
        $data['totalScores'] = $LearningSituationOverviewForClass['totalScores'];
        $data['StudyReuslt'] = $LearningSituationOverviewForClass['StudyReuslt'];

        return $data;
    }

    public function getClassObject($classObject)
    {
        $class = new self;
        $class->id = $classObject->id;
        $class->name = $classObject->name;
        $class->username = "";
        $class->created_time = $classObject->created_time;
        $class->follower_count = $classObject->follower_count;
        $class->school_user_count = $classObject->school_user_count;
        $class->home_user_count = $classObject->home_user_count;
        $class->start_date = $classObject->start_date;
        $class->end_date = $classObject->end_date;
        $class->block = $classObject->block;
        $class->grade_id = $classObject->grade_id;
        $class->enteryear = $classObject->enteryear;
        $class->schoolName = $classObject->schoolName;
        return $class;
    }


    public function getClassUserIds($class_id=0,$type="student"){
        $user_ids = $this->db->select('class_user_relationship.*')->where('class_user_relationship.user_type',$type);
        if($class_id){
            $user_ids = $user_ids->where("class_user_relationship.class_id",$class_id);
        }
        $user_ids =  $user_ids->get('class_user_relationship')->result();
        $users = array();
        foreach($user_ids as $val){
            $users[] = $val->user_id;
        }
        return $users;
    }

    /**
     * 获取今日班级学习人数
     * @return mixed
     */

    public function getClassPerDayStudyUserCount(){
        return $this->recordmanager->initialize()->getClassPerDayStudyUserCount($this->getClassUserIds($this->id));
    }


    public function isTeacherAdministratorStudent($teacher,$student){
        $studnetAuth = $this->db->select('class_user_relationship.*')
            ->where('class_user_relationship.user_type',"student")
            ->where("class_user_relationship.user_id",$student->id)
            ->get('class_user_relationship')->row();
        if($studnetAuth){
            $teacherAuth = $this->db->select('class_user_relationship.*')
                ->where('class_user_relationship.user_type',"teacher")
                ->where("class_user_relationship.user_id",$teacher->id)
                ->where("class_user_relationship.class_id",$studnetAuth->class_id)
                ->get('class_user_relationship')->row();
            if($teacherAuth){
                return true;
            }
        }
        return false;
    }

    /**
     * 获取今日学习之星
     * @return mixed
     */

    public function getClassPerDayStudyTop(){
        return $this->recordmanager->initialize()->getClassPerDayStudyUserTop($this->getClassUserIds($this->id));
    }


    public function getClassUsers($class_id=0,$type="student"){
        $user_ids = $this->db->select('class_user_relationship.*')->where('class_user_relationship.user_type',$type);
        if($class_id){
            $user_ids = $user_ids->where("class_user_relationship.class_id",$class_id);
        }
        $user_ids =  $user_ids->get('class_user_relationship')->result();
        $users = array();
        foreach($user_ids as $val){
            $user = $this->user->getUser($val->user_id);
            $users[] = $user;
        }
        return $users;
    }


    /**
     *
     * 获取班级的总学习时间
     *
     **/

    public function getClassDataInfo($class_id=0,$type="student"){

        $studytime = $this->db->where('class_user_relationship.user_type',$type)
            ->where("class_user_relationship.class_id",$class_id)
            ->join('users_record', 'class_user_relationship.user_id = users_record.user_id', 'left')
            ->select("SUM(time) as totalTime")
            ->get('class_user_relationship')->row();

        $totalday = $this->db->where('class_user_relationship.user_type',$type)
            ->where("class_user_relationship.class_id",$class_id)
            ->join('users_record','class_user_relationship.user_id = users_record.user_id', 'left')
            ->select("count(*) as totalday")
            ->group_by("users_record.date")
            ->group_by("users_record.user_id")
            ->get('class_user_relationship')->num_rows();


        $studyscore = $this->db->where('class_user_relationship.user_type',$type)
            ->where("class_user_relationship.class_id",$class_id)
            ->join('users_record','class_user_relationship.user_id = users_record.user_id', 'left')
            ->select("SUM(scores) as studyscore")
            ->get('class_user_relationship')->row();



        $val = new stdClass();
        if(isset($studytime->totalTime) && !empty($studytime->totalTime))  $val->totalTime = round($studytime->totalTime/3600,2);
        else $val->totalTime = 0;
        if(isset($totalday) && !empty($totalday))  $val->totalday = $totalday;
        else $val->totalday = 0;
        if(isset($studyscore->studyscore) && !empty($studyscore->studyscore))  $val->studyscore = $studyscore->studyscore;
        else $val->studyscore = 0;
        // 获取本周学习时间
        $end_time       = date('Y-m-d');
        $start_time     = date('Y-m-d',strtotime($end_time. '-7 days'));
        $val2 = $this
            ->db->select("SUM(time) as totalTime")
            ->join('users_record', 'class_user_relationship.user_id = users_record.user_id', 'left')
            ->where("users_record.date >=",$start_time)
            ->where("users_record.date <=",$end_time)
            ->where('class_user_relationship.user_type',$type)
            ->where("class_user_relationship.class_id",$class_id)
            ->get('class_user_relationship')->row();
        if($val2 && !empty($val2->totalTime)) $val->weekTotalTime = round($val2->totalTime/3600,2);
        else $val->weekTotalTime = 0;
        return $val;
    }



    public function getClassPerweekStudyUserCount($users = array()){
        $end_time       = date('Y-m-d');
        $start_date = date('Y-m-d',strtotime($end_time. '-7 days'));
        $return = array();
        for($i=1;$i<=7;$i++){
            $date = date('Y-m-d',strtotime($start_date. '+'.$i.' days'));
            if(count($users) > 0){
                $count = $this->db->select("id")
                    ->where_in("user_id",$this->toIdArray($users))
                    ->where("date",$date)
                    ->group_by("user_id")
                    ->get('users_record')->num_rows();
                $return[date('m/d',strtotime($date))] = $count;
            }else{
                $return[date('m/d',strtotime($date))] = 0;
            }
        }
        return $return;
    }



    public function getStudentRankingList($userItem){
        $userRelationShip = $userItem->getUserSchoolGradeClassRealtionShip();
        $users = array();
        $return = array();

        $post = $this->input->post();
        // $post['sort_group_model'] = "school";
        if($userRelationShip){
            if(!isset($post['sort_study_model']) || empty($post['sort_study_model'])){
                $post['sort_study_model'] = "studytime";
            }
            if(!isset($post['sort_group_model']) || empty($post['sort_group_model'])){
                $post['sort_group_model'] = "class";
            }
            // $post['sort_study_model'] = 'studyscore';
            $post['sort_group_model'] = "class";
            if($post['sort_group_model'] == "class"){
                $where = "wetalk_class_user_relationship.status =1 and wetalk_class_user_relationship.user_type !='teacher' and wetalk_class_user_relationship.class_id = ".$userRelationShip->class_id;
            }else if($post['sort_group_model'] == "grade"){
                $where = "wetalk_class_user_relationship.status =1 and wetalk_class_user_relationship.user_type !='teacher' and wetalk_class_user_relationship.grade_id = ".$userRelationShip->grade_id;
            }else if($post['sort_group_model'] == "school"){
                $where = "wetalk_class_user_relationship.status =1 and wetalk_class_user_relationship.user_type !='teacher' and wetalk_class_user_relationship.school_id = ".$userRelationShip->school_id;
            }
            if(isset($post['sort_study_model']) || !empty($post['sort_study_model'])){
                if($post['sort_study_model'] == 'studytime'){
                    $query  = "select * FROM
                             (
                                 SELECT A.*,@rank:=@rank+1 as rank
                                 FROM
                                 (
                                  SELECT wetalk_class_user_relationship.*,SUM(wetalk_users_record.time) as totalTime FROM wetalk_class_user_relationship left join wetalk_users_record on wetalk_users_record.user_id = wetalk_class_user_relationship.user_id where $where GROUP BY wetalk_class_user_relationship.user_id  ORDER BY totalTime DESC
                                 ) A ,(SELECT @rank:=0) B
                             ) M
                             ORDER BY M.rank asc ";
                }

                if($post['sort_study_model'] == 'studyday'){
                    $query  = "select * FROM
                             (
                                 SELECT A.*,@rank:=@rank+1 as rank
                                 FROM
                                 (
                                  SELECT wetalk_class_user_relationship.*,count(distinct date) as totalday  FROM wetalk_class_user_relationship left join wetalk_users_record on  wetalk_class_user_relationship.user_id =  wetalk_users_record.user_id where $where GROUP BY wetalk_class_user_relationship.user_id ORDER BY totalday DESC
                                 ) A ,(SELECT @rank:=0) B
                             ) M
                             ORDER BY M.rank asc ";
                }

                if($post['sort_study_model'] == 'studyscore'){
                    // $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));

                    // $month_frist_day = date("Y-m-d",strtotime("-1 day"));
                    $month_frist_day = date("Y-m-d");
                    $day =  date("d");
                    if($day <20){
                        $month_frist_day = date('Y-m-d', strtotime(date('Y-m-01') . ' -1 day'));
                    }

                    $query  = "select * FROM
                             (
                                 SELECT A.*,@rank:=@rank+1 as rank
                                 FROM
                                 (
                                  SELECT wetalk_class_user_relationship.*,SUM(totalScore)/count(*) as studyscore FROM wetalk_class_user_relationship left join wetalk_user_record_result on wetalk_user_record_result.user_id = wetalk_class_user_relationship.user_id where $where and wetalk_user_record_result.start_date = '".$month_frist_day."' GROUP BY wetalk_class_user_relationship.user_id ORDER BY studyscore DESC
                                 ) A ,(SELECT @rank:=0) B
                             ) M
                             ORDER BY M.rank asc ";
                }
            }
            $user_ids =  $this->db->query($query)->result();

            //修改userinfo
            $users = array();
            $user_array_ids = array();
            foreach($user_ids as $item1){
                $user_array_ids[] = $item1->user_id;
            }
            if(count($user_array_ids) > 0){
                $items = $this->db->select("id,name,user_type,username,avatar")->where_in("id", $user_array_ids)->get("users")->result();
                foreach($items as $item){
                    $item->avatar_url = $this->user->getAvatarUrlFormAvatar($item);
                    $users[$item->id] = $item;
                }
            }
            $returnusers = array();
            foreach($user_ids as $val){
                $user = $users[$val->user_id];
                if(isset($val->totalTime) && !empty($val->totalTime))  $user->studyTime = sprintf("%.2f",$val->totalTime/3600);
                else  $user->studyTime = 0;
                if(isset($val->totalday) && !empty($val->totalday))  $user->totalDay = $val->totalday;
                else $user->totalDay = 0;
                if(isset($val->studyscore) && !empty($val->studyscore))  $user->totalScore =  floor($val->studyscore);
                else  $user->totalScore = 0;
                $user->rank = $val->rank;
                if($val->user_id == $userItem->id){
                    $return['myRank'] = $user;
                }
                if( $user->studyTime < 0)   $user->studyTime = 0;
                if( $user->totalScore  < 0) $user->totalScore = 0;
                if( $user->totalDay < 0)   $user->totalDay = 0;
                $returnusers[] = $user;

            }


            //  echo $this->db->last_query();
//            foreach($user_ids as $val){
//                $user = $this->user->getUser($val->user_id)->getUserInfoNotToken();
//                if(isset($val->totalTime) && !empty($val->totalTime))  $user['studyTime'] = sprintf("%.2f",$val->totalTime/3600);
//                else $user['studyTime'] = 0;
//                if(isset($val->totalday) && !empty($val->totalday))  $user['totalDay'] = $val->totalday;
//                else $user['totalDay'] = 0;
//                if(isset($val->studyscore) && !empty($val->studyscore))  $user['totalScore'] =  floor($val->studyscore);
//                else $user['totalScore'] = 0;
//                $user['rank'] = $val->rank;
//                $users[] = $user;
//                if($val->user_id == $userItem->id){
//                    $return['myRank'] = $user;
//                }
//                if($user['studyTime'] < 0)  $user['studyTime'] = 0;
//                if($user['totalScore'] < 0)  $user['totalScore'] = 0;
//                if($user['totalDay'] < 0)  $user['totalDay'] = 0;
//            }
            $return['ranks'] = $returnusers;
            return $return;
        }
        return $return;
    }



    public function getClassUsersInfo($class_id=0,$type="student"){
        // return array();
        $post = $this->input->post();
        $user_ids = $this->db->select('class_user_relationship.*')->where("class_user_relationship.status",1);

        if(isset($post['type']) && !empty($post['type'])){
            if($post['type'] == "student") $user_ids = $user_ids->where('class_user_relationship.user_type',"student");
        }

        if(!isset($post['device_platform'])){
            $post['device_platform'] = "iphone";
        }
//            ->where('class_user_relationship.user_type',$type);
        if($class_id){
            $user_ids = $user_ids->where("class_user_relationship.class_id",$class_id);
        }
        $month_frist_day = date("Y-m-d");
        if(isset($post['sort']) && $post['sort'] == "lastMonthstudyscore"){
            $month_frist_day = date('Y-m-d', strtotime(date('Y-m-01') . ' -1 day'));
            $post['sort'] = "studyscore";
        }
        if(!isset($post['sort']) || empty($post['sort']) || !in_array($post['sort'],array("studytime","studyday","studyscore","studyToadyTime"))){
            $post['sort'] = "studytime";
        }
        // $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
        // $month_frist_day = date("Y-m-d",strtotime("-1 day"));

        //$post['sort'] = "studyToadyTime";
        if(isset($post['sort']) || !empty($post['sort'])){
            $user_ids = $user_ids;
            $end_time = date('Y-m-d');
            $start_time   = date('Y-m-d',strtotime($end_time. '- 14 days'));
            if($post['sort'] == 'studytime'){
                $user_ids = $user_ids
                    ->select("SUM(time) as totalTime");

                if($post['device_platform'] != "iphone" && $post['device_platform'] != "android"){
                    $user_ids = $user_ids->select("count(distinct date) as totalday");
                }
//                    ->select("count(distinct date) as totalday")
                $user_ids = $user_ids->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                    ->group_by("class_user_relationship.user_id")
                    ->order_by("totalTime","desc");
            }

            if($post['sort'] == 'studyday'){
                if($post['device_platform'] != "iphone" && $post['device_platform'] != "android"){
                    $user_ids = $user_ids->select("SUM(time) as totalTime");
                }
//
                $user_ids = $user_ids->select("count(distinct date) as totalday")
                    ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                    ->group_by("class_user_relationship.user_id")
                    ->order_by("totalday","desc");
            }

            if($post['sort'] == 'studyscore'){
                $user_ids = $user_ids
                    ->select("totalScore as studyscore")
                    ->where("user_record_result.start_date",$month_frist_day)
                    ->join('user_record_result', 'class_user_relationship.user_id=user_record_result.user_id', 'left')
//                    ->group_by("class_user_relationship.user_id")
                    ->order_by("studyscore","desc");
            }

            if($post['sort'] == 'studyToadyTime'){
                $user_ids = $user_ids
                    ->select("SUM(time) as totalTodyTime")
                    ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                    ->where("users_record.date",$month_frist_day)
                    ->group_by("class_user_relationship.user_id")
                    ->order_by("totalTodyTime","desc");
            }
        }

        //$post['key'] = "wx";
        if(isset($post['key']) && !empty($post['key'])){
            $user_ids = $user_ids->join('users', 'class_user_relationship.user_id = users.id', 'left');
            $where = "(`wetalk_users`.`name` LIKE '%{$post['key']}%' OR `wetalk_users`.`username` LIKE '%{$post['key']}%' OR `wetalk_users`.`mobile` LIKE '%{$post['key']}%' OR `wetalk_users`.`email` LIKE '%{$post['key']}%' OR `wetalk_users`.`weixin` LIKE '%{$post['key']}%' OR `wetalk_users`.`qq` LIKE '%{$post['key']}%')";
            $user_ids = $user_ids->where($where);
//            $user_ids = $user_ids->like("users.name",$post['key'])
//                ->or_like("users.username",$post['key'])
//                ->or_like("users.mobile",$post['key'])
//                ->or_like("users.email",$post['key'])
//                ->or_like("users.weixin",$post['key'])
//                ->or_like("users.qq",$post['key']);
        }

        $score = array();
        $user_ids =  $user_ids->get('class_user_relationship')->result();

        if($post['sort'] == 'studytime' || $post['sort'] == 'studyday' || $post['sort'] == 'studyToadyTime'){
            //计算学习得分
            $user_id1s = $this->db->select('class_user_relationship.*');
//            ->where('class_user_relationship.user_type',$type);
            if($class_id){
                $user_id1s = $user_id1s->where("class_user_relationship.class_id",$class_id);
            }
            $user_id1s = $user_id1s
                ->select("totalScore as studyscore")
                ->where("user_record_result.start_date",$month_frist_day)
                ->join('user_record_result', 'class_user_relationship.user_id=user_record_result.user_id', 'left')
                ->group_by("class_user_relationship.user_id")
                ->order_by("studyscore","desc")->get('class_user_relationship')->result();
            foreach($user_id1s as $item){
                $score[$item->user_id] = floor($item->studyscore);
            }
        }

        $scoretime = array();
        $scoretoday = array();
        $scoretodaytime = array();
        if($post['sort'] == 'studyscore' && $post['device_platform'] != "iphone" && $post['device_platform'] != "android"){
            //计算学习得分
            $user_id1s = $this->db->select('class_user_relationship.*');
//            ->where('class_user_relationship.user_type',$type);
            if($class_id){
                $user_id1s = $user_id1s->where("class_user_relationship.class_id",$class_id);
            }
            $user_id1s = $user_id1s
                ->select("SUM(time) as totalTime")
                ->select("count(distinct date) as totalday")
                ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                ->group_by("class_user_relationship.user_id")
                ->order_by("totalday","desc")->get('class_user_relationship')->result();

            foreach($user_id1s as $item){
                $scoretime[$item->user_id] = sprintf("%.2f",$item->totalTime/3600);
                $scoretoday[$item->user_id] = floor($item->totalday);
            }



        }

        if($post['sort'] != 'studyToadyTime') {

            $user_id2s = $this->db->select('class_user_relationship.*');
//            ->where('class_user_relationship.user_type',$type);
            if ($class_id) {
                $user_id2s = $user_id2s->where("class_user_relationship.class_id", $class_id);
            }
            $user_id2s = $user_id2s
                ->select("SUM(time) as totalTodyTime")
                ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                ->where("users_record.date", $month_frist_day)
                ->group_by("class_user_relationship.user_id")
                ->get('class_user_relationship')->result();
            foreach ($user_id2s as $item) {
                $scoretodaytime[$item->user_id] = sprintf("%.2f", $item->totalTodyTime / 3600);
            }
        }
        $users = array();
        $user_array_ids = array();
        foreach($user_ids as $item1){
            $user_array_ids[] = $item1->user_id;
        }
        if(count($user_array_ids) > 0){
            $items = $this->db->select("id,name,user_type,username,avatar")->where_in("id", $user_array_ids)->get("users")->result();
            foreach($items as $item){
                $item->avatar_url = $this->user->getAvatarUrlFormAvatar($item);
                $item->my_radar_charts_url = anchorurl('components/users/getMyRadarWebView/' . $item->id);
                $users[$item->id] = $item;
            }
        }
        $returnusers = array();
        foreach($user_ids as $val){
            $user = $users[$val->user_id];
            if(isset($val->totalTime) && !empty($val->totalTime))  $user->studyTime = sprintf("%.2f",$val->totalTime/3600);
            else  $user->studyTime = 0;
            if(isset($val->totalday) && !empty($val->totalday))  $user->totalDay = $val->totalday;
            else $user->totalDay = 0;
            if(isset($val->studyscore) && !empty($val->studyscore))  $user->totalScore =  floor($val->studyscore);
            else  $user->totalScore = 0;

            if(isset($val->totalTodyTime) && !empty($val->totalTodyTime))  $user->totalTodyTime =  sprintf("%.2f",$val->totalTodyTime/3600);
            else  $user->totalTodyTime = 0;
//            $user->rank = $val->rank;

            if( $user->studyTime < 0)   $user->studyTime = 0;
            if( $user->totalScore  < 0) $user->totalScore = 0;
            if( $user->totalDay < 0)   $user->totalDay = 0;
            if( $user->totalTodyTime < 0)   $user->totalTodyTime = 0;

            if($post['sort'] == 'studytime' || $post['sort'] == 'studyday' || $post['sort'] == 'studyToadyTime'){
                $user->totalScore = isset( $score[$val->user_id])?$score[$val->user_id]:0;
            }

            if($post['sort'] == 'studyscore'){
                $user->studyTime = isset( $scoretime[$val->user_id])?$scoretime[$val->user_id]:0;
                $user->totalDay = isset( $scoretoday[$val->user_id])?$scoretoday[$val->user_id]:0;
            }

            if($post['sort'] != 'studyToadyTime'){
                $user->totalTodyTime = isset( $scoretodaytime[$val->user_id])?$scoretodaytime[$val->user_id]:0;
            }


            $user->totalTodyTime =  $user->totalTodyTime;

            $returnusers[] = $user;

        }

//        $users = array();
//        foreach($user_ids as $val){
//            $user = $this->user->getUser($val->user_id)->getUserInfoNotToken();
//            if(isset($val->totalTime) && !empty($val->totalTime))  $user['studyTime'] = sprintf("%.2f",$val->totalTime/3600);
//            else $user['studyTime'] = 0;
//            if(isset($val->totalday) && !empty($val->totalday))  $user['totalDay'] = $val->totalday;
//            else $user['totalDay'] = 0;
//            if(isset($val->studyscore) && !empty($val->studyscore))  $user['totalScore'] = floor($val->studyscore);
//            else $user['totalScore'] = 0;
//
//            if($user['studyTime'] < 0)  $user['studyTime'] = 0;
//            if($user['totalScore'] < 0)  $user['totalScore'] = 0;
//            if($user['totalDay'] < 0)  $user['totalDay'] = 0;
//            if($post['sort'] == 'studytime' || $post['sort'] == 'studyday'){
//                $user['totalScore'] = isset( $score[$val->user_id])?$score[$val->user_id]:0;
//            }
//
//            if($post['sort'] == 'studyscore'){
//                $user['studyTime'] = isset( $scoretime[$val->user_id])?$scoretime[$val->user_id]:0;
//                $user['totalDay'] = isset( $scoretoday[$val->user_id])?$scoretoday[$val->user_id]:0;
//            }
//            $users[] = $user;
//
//        }
        return $returnusers;
    }



    public function getClassUsersInfoPc($class_id=0,$type="student"){
        $post = $this->input->post();
        $user_ids = $this->db->select('class_user_relationship.*')->where("class_user_relationship.status",1);
        if(isset($post['type']) && !empty($post['type'])){
            if($post['type'] == "student") $user_ids = $user_ids->where('class_user_relationship.user_type',"student");
        }
        if($class_id){
            $user_ids = $user_ids->where("class_user_relationship.class_id",$class_id);
        }else{
            return array();
        }
        $month_frist_day = date("Y-m-d");
        if(isset($post['sort']) && $post['sort'] == "lastMonthstudyscore"){
            $month_frist_day = date('Y-m-d', strtotime(date('Y-m-01') . ' -1 day'));
            $post['sort'] = "studyscore";
        }
        if(!isset($post['sort']) || empty($post['sort']) || !in_array($post['sort'],array("studytime","studyday","studyscore","studyToadyTime"))){
            $post['sort'] = "studytime";
        }

        if(isset($post['sort']) || !empty($post['sort'])){
            if($post['sort'] == 'studytime'){
                $user_ids = $user_ids
                    ->select("SUM(time) as totalTime")
                    ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                    ->group_by("class_user_relationship.user_id")
                    ->order_by("totalTime","desc");
            }
            if($post['sort'] == 'studyday'){
                $user_ids = $user_ids->select("count(distinct date) as totalday")
                    ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                    ->group_by("class_user_relationship.user_id")
                    ->order_by("totalday","desc");
            }

            if($post['sort'] == 'studyscore'){
                $user_ids = $user_ids
                    ->select("totalScore as studyscore")
                    ->where("user_record_result.start_date",$month_frist_day)
                    ->join('user_record_result', 'class_user_relationship.user_id=user_record_result.user_id', 'left')
                    ->order_by("studyscore","desc");
            }

            if($post['sort'] == 'studyToadyTime'){
                $user_ids = $user_ids
                    ->select("SUM(time) as totalTodyTime")
                    ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                    ->where("users_record.date",$month_frist_day)
                    ->group_by("class_user_relationship.user_id")
                    ->order_by("totalTodyTime","desc");
            }
        }

        if(isset($post['key']) && !empty($post['key'])){
            $user_ids = $user_ids->join('users', 'class_user_relationship.user_id = users.id', 'left');
            $where = "(`wetalk_users`.`name` LIKE '%{$post['key']}%' OR `wetalk_users`.`username` LIKE '%{$post['key']}%' OR `wetalk_users`.`mobile` LIKE '%{$post['key']}%' OR `wetalk_users`.`email` LIKE '%{$post['key']}%' OR `wetalk_users`.`weixin` LIKE '%{$post['key']}%' OR `wetalk_users`.`qq` LIKE '%{$post['key']}%')";
            $user_ids = $user_ids->where($where);
        }

        $score = array();
        $user_ids =  $user_ids->get('class_user_relationship')->result();
        if($post['sort'] == 'studytime' || $post['sort'] == 'studyday' || $post['sort'] == 'studyToadyTime'){
            $user_id1s = $this->db->select('class_user_relationship.*');
            if($class_id){
                $user_id1s = $user_id1s->where("class_user_relationship.class_id",$class_id);
            }
            $user_id1s = $user_id1s
                ->select("totalScore as studyscore")
                ->where("user_record_result.start_date",$month_frist_day)
                ->join('user_record_result', 'class_user_relationship.user_id=user_record_result.user_id', 'left')
                ->group_by("class_user_relationship.user_id")
                ->order_by("studyscore","desc")->get('class_user_relationship')->result();
            foreach($user_id1s as $item){
                $score[$item->user_id] = floor($item->studyscore);
            }
        }

        $scoretime = array();
        $scoretoday = array();
        $scoretodaytime = array();
       // $scoretime[$item->user_id] = sprintf("%.2f",$item->totalTime/3600);
        if($post['sort'] == 'studyscore'){
            //计算学习得分
            $user_id1s = $this->db->select('class_user_relationship.*');
            if($class_id){
                $user_id1s = $user_id1s->where("class_user_relationship.class_id",$class_id);
            }
            $user_id1s = $user_id1s
                ->select("count(distinct date) as totalday")
                ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                ->group_by("class_user_relationship.user_id")
                ->get('class_user_relationship')
                ->result();
            foreach($user_id1s as $item){
                $scoretoday[$item->user_id] = floor($item->totalday);
            }

            $user_id3s = $this->db->select('class_user_relationship.*');
            if($class_id){
                $user_id3s = $user_id3s->where("class_user_relationship.class_id",$class_id);
            }
            $user_id3s = $user_id3s
                ->select("SUM(time) as totalTime")
                ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                ->group_by("class_user_relationship.user_id")
                ->get('class_user_relationship')
                ->result();
            foreach($user_id3s as $item){
                $scoretime[$item->user_id] = sprintf("%.2f",$item->totalTime/3600);
            }
        }

        if($post['sort'] == 'studytime'){
            $user_id1s = $this->db->select('class_user_relationship.*');
            if($class_id){
                $user_id1s = $user_id1s->where("class_user_relationship.class_id",$class_id);
            }
            $user_id1s = $user_id1s
                ->select("count(distinct date) as totalday")
                ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                ->group_by("class_user_relationship.user_id")
                ->get('class_user_relationship')
                ->result();
            foreach($user_id1s as $item){
                $scoretoday[$item->user_id] = floor($item->totalday);
            }
        }

        if($post['sort'] == 'studyday'){
            $user_id3s = $this->db->select('class_user_relationship.*');
            if($class_id){
                $user_id3s = $user_id3s->where("class_user_relationship.class_id",$class_id);
            }
            $user_id3s = $user_id3s
                ->select("SUM(time) as totalTime")
                ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                ->group_by("class_user_relationship.user_id")
                ->get('class_user_relationship')
                ->result();
            foreach($user_id3s as $item){
                $scoretime[$item->user_id] = sprintf("%.2f",$item->totalTime/3600);
            }
        }

        if($post['sort'] != 'studyToadyTime') {
            $user_id2s = $this->db->select('class_user_relationship.*');
            if ($class_id) {
                $user_id2s = $user_id2s->where("class_user_relationship.class_id", $class_id);
            }
            $user_id2s = $user_id2s
                ->select("SUM(time) as totalTodyTime")
                ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                ->where("users_record.date", $month_frist_day)
                ->group_by("class_user_relationship.user_id")
                ->get('class_user_relationship')
                ->result();
            foreach ($user_id2s as $item) {
                $scoretodaytime[$item->user_id] = sprintf("%.2f", $item->totalTodyTime / 3600);
            }
        }
        $users = array();
        $user_array_ids = array();
        foreach($user_ids as $item1){
            $user_array_ids[] = $item1->user_id;
        }
        if(count($user_array_ids) > 0){
            $items = $this->db->select("id,name,user_type,username,avatar")->where_in("id", $user_array_ids)->get("users")->result();
            foreach($items as $item){
                $item->avatar_url = $this->user->getAvatarUrlFormAvatar($item);
                $item->my_radar_charts_url = anchorurl('components/users/getMyRadarWebView/' . $item->id);
                $users[$item->id] = $item;
            }
        }
        $returnusers = array();
        foreach($user_ids as $val){
            $user = $users[$val->user_id];
            if(isset($val->totalTime) && !empty($val->totalTime))  $user->studyTime = sprintf("%.2f",$val->totalTime/3600);
            else  $user->studyTime = 0;
            if(isset($val->totalday) && !empty($val->totalday))  $user->totalDay = $val->totalday;
            else $user->totalDay = 0;
            if(isset($val->studyscore) && !empty($val->studyscore))  $user->totalScore =  floor($val->studyscore);
            else  $user->totalScore = 0;

            if(isset($val->totalTodyTime) && !empty($val->totalTodyTime))  $user->totalTodyTime =  sprintf("%.2f",$val->totalTodyTime/3600);
            else  $user->totalTodyTime = 0;

            if( $user->studyTime < 0)   $user->studyTime = 0;
            if( $user->totalScore  < 0) $user->totalScore = 0;
            if( $user->totalDay < 0)   $user->totalDay = 0;
            if( $user->totalTodyTime < 0)   $user->totalTodyTime = 0;

            if(isset( $score[$val->user_id]))  $user->totalScore = $score[$val->user_id];

            if(isset($scoretime[$val->user_id]))  $user->studyTime =$scoretime[$val->user_id];

            if(isset($scoretoday[$val->user_id]))  $user->totalDay =$scoretoday[$val->user_id];

            if(isset($scoretodaytime[$val->user_id]))  $user->totalTodyTime =$scoretodaytime[$val->user_id];
            $returnusers[] = $user;

        }
        return $returnusers;
    }




    public function getClassUsersInfoPc1($class_id=0,$type="student"){
        // return array();
        $post = $this->input->post();
        $user_ids = $this->db->select('class_user_relationship.*')->where("class_user_relationship.status",1);
        if(isset($post['type']) && !empty($post['type'])){
            if($post['type'] == "student") $user_ids = $user_ids->where('class_user_relationship.user_type',"student");
        }
        if($class_id){
            $user_ids = $user_ids->where("class_user_relationship.class_id",$class_id);
        }else{
            return array();
        }
        $month_frist_day = date("Y-m-d");
        if(isset($post['sort']) && $post['sort'] == "lastMonthstudyscore"){
            $month_frist_day = date('Y-m-d', strtotime(date('Y-m-01') . ' -1 day'));
            $post['sort'] = "studyscore";
        }
        if(!isset($post['sort']) || empty($post['sort']) || !in_array($post['sort'],array("studytime","studyday","studyscore","studyToadyTime"))){
            $post['sort'] = "studytime";
        }

        if(isset($post['sort']) || !empty($post['sort'])){
            if($post['sort'] == 'studytime'){
                $user_ids = $user_ids
                    ->select("SUM(time) as totalTime")
                    ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                    ->group_by("class_user_relationship.user_id")
                    ->order_by("totalTime","desc");
            }
            if($post['sort'] == 'studyday'){
                $user_ids = $user_ids->select("count(distinct date) as totalday")
                    ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                    ->group_by("class_user_relationship.user_id")
                    ->order_by("totalday","desc");
            }

            if($post['sort'] == 'studyscore'){
                $user_ids = $user_ids
                    ->select("totalScore as studyscore")
                    ->where("user_record_result.start_date",$month_frist_day)
                    ->join('user_record_result', 'class_user_relationship.user_id=user_record_result.user_id', 'left')
                    ->order_by("studyscore","desc");
            }

            if($post['sort'] == 'studyToadyTime'){
                $user_ids = $user_ids
                    ->select("SUM(time) as totalTodyTime")
                    ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                    ->where("users_record.date",$month_frist_day)
                    ->group_by("class_user_relationship.user_id")
                    ->order_by("totalTodyTime","desc");
            }
        }

        if(isset($post['key']) && !empty($post['key'])){
            $user_ids = $user_ids->join('users', 'class_user_relationship.user_id = users.id', 'left');
            $where = "(`wetalk_users`.`name` LIKE '%{$post['key']}%' OR `wetalk_users`.`username` LIKE '%{$post['key']}%' OR `wetalk_users`.`mobile` LIKE '%{$post['key']}%' OR `wetalk_users`.`email` LIKE '%{$post['key']}%' OR `wetalk_users`.`weixin` LIKE '%{$post['key']}%' OR `wetalk_users`.`qq` LIKE '%{$post['key']}%')";
            $user_ids = $user_ids->where($where);
        }

        $score = array();
        $user_ids =  $user_ids->get('class_user_relationship')->result();
        if($post['sort'] == 'studytime' || $post['sort'] == 'studyday' || $post['sort'] == 'studyToadyTime'){
            $user_id1s = $this->db->select('class_user_relationship.*');
            if($class_id){
                $user_id1s = $user_id1s->where("class_user_relationship.class_id",$class_id);
            }
            $user_id1s = $user_id1s
                ->select("totalScore as studyscore")
                ->where("user_record_result.start_date",$month_frist_day)
                ->join('user_record_result', 'class_user_relationship.user_id=user_record_result.user_id', 'left')
                ->group_by("class_user_relationship.user_id")
                ->order_by("studyscore","desc")->get('class_user_relationship')->result();
            foreach($user_id1s as $item){
                $score[$item->user_id] = floor($item->studyscore);
            }
        }

        $scoretime = array();
        $scoretoday = array();
        $scoretodaytime = array();
        $scoretime[$item->user_id] = sprintf("%.2f",$item->totalTime/3600);
        if($post['sort'] == 'studyscore'){
            //计算学习得分
            $user_id1s = $this->db->select('class_user_relationship.*');
            if($class_id){
                $user_id1s = $user_id1s->where("class_user_relationship.class_id",$class_id);
            }
            $user_id1s = $user_id1s
                ->select("count(distinct date) as totalday")
                ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                ->group_by("class_user_relationship.user_id")
                ->get('class_user_relationship')
                ->result();
            foreach($user_id1s as $item){
                $scoretoday[$item->user_id] = floor($item->totalday);
            }

            $user_id3s = $this->db->select('class_user_relationship.*');
            if($class_id){
                $user_id3s = $user_id3s->where("class_user_relationship.class_id",$class_id);
            }
            $user_id3s = $user_id3s
                ->select("SUM(time) as totalTime")
                ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                ->group_by("class_user_relationship.user_id")
                ->get('class_user_relationship')
                ->result();
            foreach($user_id3s as $item){
                $scoretime[$item->user_id] = sprintf("%.2f",$item->totalTime/3600);
            }
        }

        if($post['sort'] == 'studytime'){
            $user_id1s = $this->db->select('class_user_relationship.*');
            if($class_id){
                $user_id1s = $user_id1s->where("class_user_relationship.class_id",$class_id);
            }
            $user_id1s = $user_id1s
                ->select("count(distinct date) as totalday")
                ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                ->group_by("class_user_relationship.user_id")
                ->get('class_user_relationship')
                ->result();
            foreach($user_id1s as $item){
                $scoretoday[$item->user_id] = floor($item->totalday);
            }
        }

        if($post['sort'] == 'studyday'){
            $user_id3s = $this->db->select('class_user_relationship.*');
            if($class_id){
                $user_id3s = $user_id3s->where("class_user_relationship.class_id",$class_id);
            }
            $user_id3s = $user_id3s
                ->select("SUM(time) as totalTime")
                ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                ->group_by("class_user_relationship.user_id")
                ->get('class_user_relationship')
                ->result();
            foreach($user_id3s as $item){
                $scoretime[$item->user_id] = sprintf("%.2f",$item->totalTime/3600);
            }
        }

        if($post['sort'] != 'studyToadyTime') {
            $user_id2s = $this->db->select('class_user_relationship.*');
            if ($class_id) {
                $user_id2s = $user_id2s->where("class_user_relationship.class_id", $class_id);
            }
            $user_id2s = $user_id2s
                ->select("SUM(time) as totalTodyTime")
                ->join('users_record', 'class_user_relationship.user_id=users_record.user_id', 'left')
                ->where("users_record.date", $month_frist_day)
                ->group_by("class_user_relationship.user_id")
                ->get('class_user_relationship')
                ->result();
            foreach ($user_id2s as $item) {
                $scoretodaytime[$item->user_id] = sprintf("%.2f", $item->totalTodyTime / 3600);
            }
        }
        $users = array();
        $user_array_ids = array();
        foreach($user_ids as $item1){
            $user_array_ids[] = $item1->user_id;
        }
        if(count($user_array_ids) > 0){
            $items = $this->db->select("id,name,user_type,username,avatar")->where_in("id", $user_array_ids)->get("users")->result();
            foreach($items as $item){
                $item->avatar_url = $this->user->getAvatarUrlFormAvatar($item);
                $item->my_radar_charts_url = anchorurl('components/users/getMyRadarWebView/' . $item->id);
                $users[$item->id] = $item;
            }
        }
        $returnusers = array();
        foreach($user_ids as $val){
            $user = $users[$val->user_id];
            if(isset($val->totalTime) && !empty($val->totalTime))  $user->studyTime = sprintf("%.2f",$val->totalTime/3600);
            else  $user->studyTime = 0;
            if(isset($val->totalday) && !empty($val->totalday))  $user->totalDay = $val->totalday;
            else $user->totalDay = 0;
            if(isset($val->studyscore) && !empty($val->studyscore))  $user->totalScore =  floor($val->studyscore);
            else  $user->totalScore = 0;

            if(isset($val->totalTodyTime) && !empty($val->totalTodyTime))  $user->totalTodyTime =  sprintf("%.2f",$val->totalTodyTime/3600);
            else  $user->totalTodyTime = 0;

            if( $user->studyTime < 0)   $user->studyTime = 0;
            if( $user->totalScore  < 0) $user->totalScore = 0;
            if( $user->totalDay < 0)   $user->totalDay = 0;
            if( $user->totalTodyTime < 0)   $user->totalTodyTime = 0;

            if(isset( $score[$val->user_id]))  $user->totalScore = $score[$val->user_id];

            if(isset($scoretime[$val->user_id]))  $user->studyTime =$scoretime[$val->user_id];

            if(isset($scoretoday[$val->user_id]))  $user->totalDay =$scoretoday[$val->user_id];

            if(isset($scoretodaytime[$val->user_id]))  $user->totalTodyTime =$scoretodaytime[$val->user_id];
            $returnusers[] = $user;

        }
        return $returnusers;
    }


    public function getClassInfoDataView(){

        $data = array(
            'id'                => $this->id,
            'name'              => '<a href="'.anchorurl('home/studyDetailDataClass/'.$this->id).'">'.$this->name.'</a>',
            "username"          => $this->getUserInfo()->name,
            "created_time"      => $this->created_time,
            "follower_count"    => $this->follower_count?$this->follower_count:0,
            "school_user_count" => $this->school_user_count?$this->school_user_count:0,
            "home_user_count"   => $this->home_user_count?$this->home_user_count:0,
            "start_date"        => $this->start_date,
            "end_date"          => $this->end_date,
            "livenessClass"     => $this->getLivenessForClass(),
            'livenessHome'      => $this->getLivenessForHome(),
            "block"             => $this->block,
            "grade_id"          => $this->grade_id,
            "enteryear"         => $this->enteryear,
        );
        return $data;
    }


    public function getClassInfoView(){

        $data = array(
            'id'                => $this->id,
            'name'              => $this->name,
            "username"          =>$this->getUserInfo()->name,
            "created_time"      => $this->created_time,
            "follower_count"    => $this->follower_count?$this->follower_count:0,
            "school_user_count" => $this->school_user_count?$this->school_user_count:0,
            "home_user_count"   => $this->home_user_count?$this->home_user_count:0,
            "start_date"        => $this->start_date,
            "end_date"          => $this->end_date,
            "livenessClass"    => $this->getLivenessForClass(),
            'livenessHome'      => $this->getLivenessForHome(),
            "block"             => $this->block,
            "grade_id"          => $this->grade_id,
            "enteryear"         => $this->enteryear,
            "courses"           => $this->getSchoolCourse($this->school_id,$this->id)
        );
        return $data;
    }

    public function getUserInfo(){
        return $this->user->getUser($this->user_id);
    }


    /*
     *
     * 学校安装活跃度
     *
     */

    public function getLivenessForClass(){
        return rand(1,10000);
    }

    /*
    *
    * 家庭安装活跃度
    *
    */

    public function getLivenessForHome(){
        return rand(1,10000);
    }



    //五个维度数据分析

    /*
     * 学习指数 占五个维度的20%
     * 正确率  4% * 实际准确率
     * 完成率  4% *
     * 达标率  4% * 未给
     * MT平均分 4% *
     * 学习方法得分 4% *  未给
     * result:
     */
    public function studyIndex(){

    }


    /*
     * 活跃度 占五个维度的20%
     * 活跃数( 28天内登入系统算1次)/总人数 * 20&
     */
    public function activieRate(){

    }


    /*
     * 学习时间和频率 占五个维度的20%
     * 周学习天数 =  总共学习的天数/7 周1天 10%*5% 2天40%*5% 3天 60%*5% 4天 70%*5% 5天 80%*5% 6天 90%*5% 7天 100&*5%
     * 总学习天数 =  实际学习天数/(选择查询的天数/7) = 周1天 10%*5% 2天40%*5% 3天 60%*5% 4天 70%*5% 5天 80%*5% 6天 90%*5% 7天 100&*5%
     * 周学习时间 =  平均每周小时 周1小时 10%*5% 1.5小时 20%*5% 2小时 40%*5% 2.5小时 60%*5% 3小时 70%*5% 3.5小时 80%*5% 4小时 90%*5% 5小时 100%*5%
     * 总学习时间 =  实际总学时间/(选择查询的天数/7) = 周1小时 10%*5% 1.5小时 20%*5% 2小时 40%*5% 2.5小时 60%*5% 3小时 70%*5% 3.5小时 80%*5% 4小时 90%*5% 5小时 100%*5%
     */

    public function studyTimeAndFreQuency(){

    }


    /*
    * 技能概览 20%
    *
    * 听力理解 : 7% listen 每个part占20% 包括 listening (计算完成率) 和comhension(正确率)的 click
    * 口语能力:  7% sr的计算 正确率
    * 语法能力:  6% grammer 正确率
    */

    public function skillRate(){


    }


    /*
    * 功能键使用次数 20%
    *
    * 重复建比文字建次数  8%  比率 >3 8, >2 6  1<x<=2 4, x==1 2 x <1 0
    * 录音键比回听键     7%  比率 x=1 7,0.6<x<1 6分,0.4<x<=0.6 4分,0.2<x<=0.4 2分, 0<x<=0.2 1分  ,x==0 0分
    *  重复键比录音键:回听键    5% >3 5分,==3 4分,==2 3分,===1,2分,重复建 < 音键:回听键 0分
    */


    public function functionButtionsRate(){


    }



    public function getClassCount($grade_id=0){
        return $this->db->where("grade_id",$grade_id)->get('classes')->num_rows();
    }


    public function  updateKey($data = array()){
        if(count($data)){
            $this->db->where("id",$this->id);
            $this->db->update("classes",$data);
        }
        return true;
    }

    /**
     * @param $teacher
     * @param $student
     * @return 根据学校id获取年级
     */
    public function getGradeBySchoolIdList($school=0){
        $data = $this->db->select("id,name")->where("id",$school)->get("grades")->result();
        return $data;
    }

    /**
     * @param $teacher
     * @param $student
     * @return 根据学校id 年级id获取班级
     */
    public function getClassByGradeList($school=0,$grade=0){
        $data = $this->db->select("id,name")->where("school_id",$school)->where("grade_id",$grade)->get("classes")->result();
        return $data;
    }

    /*
     *
     * 获取学校列表数据
     */

    public function getClassList($grade_id=0,$limit=20,$start=0){
        $data = array();
        $items = $this->db->select("id")->where("grade_id",$grade_id)->limit($limit,$start)->get("classes")->result();
        foreach($items as $item){
            $data[] = $this->getClass($item->id);
        }
        return $data;
    }

    /*
     *
     * 获取学校列表数据
     */

    public function getClassInfoList($grade_id=0,$limit=20,$start=0){
        $data = array();
        $items = $this->db->select("id")->where("grade_id",$grade_id)->limit($limit,$start)->get("classes")->result();
        foreach($items as $item){
            $data[] = $this->getClass($item->id)->getClassInfoView();
        }
        return $data;
    }

    /*
     *
     * 获取学校列表数据
     */

    public function getClassInfoDataList($grade_id=0,$limit=20,$start=0){
        $data = array();
        $items = $this->db->select("id")->where("grade_id",$grade_id)->limit($limit,$start)->get("classes")->result();
        foreach($items as $item){
            $data[] = $this->getClass($item->id)->getClassInfoDataView();
        }
        return $data;
    }


    public function save($data){
        $entity = $this->config['attributes'];
        foreach($data as $key => $val){
            if(!in_array('classes.'.$key,array_keys($entity)) && $key != "class_id"){
                unset($data[$key]);
            }
        }
        // var_dump($data);
        if(!empty($data['class_id']) && count($data) > 1){
            $this->db->where("id",$data['class_id']);
            unset($data['class_id']);
            $this->db->update("classes",$data);
            //echo $this->db->last_query();
        }else{
            unset($data['class_id']);
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $this->db->insert("classes",$data);
        }
        return true;
    }

    public function delete($data){
        if(!empty($data['class_id'])){
            $this->db->where("id",$data['class_id']);
            $this->db->delete("classes");
        }
        return true;
    }
    /*
     *
     * 获取班级学生或者教师
     *
     */

    public function getClassUserList($school_id=0,$grade_id=0,$class_id=0,$type="all",$limit=20,$start=0,$post){
        $user_ids = $this->db->select('class_user_relationship.*')
            ->where("class_user_relationship.school_id",$school_id)
            ->where("class_user_relationship.status",1)
        ;
        if($type != "all"){
            $user_ids = $user_ids->where('class_user_relationship.user_type',$type);
        }
        if($grade_id){
            $user_ids = $user_ids->where("class_user_relationship.grade_id",$grade_id);
        }
        if($class_id){
            $user_ids = $user_ids->where("class_user_relationship.class_id",$class_id);
        }
        if(isset($post['key']) && !empty($post['key'])){
            $user_ids = $user_ids->join('users', 'class_user_relationship.user_id = users.id', 'left');
            $where = "(`wetalk_users`.`name` LIKE '%{$post['key']}%' OR `wetalk_users`.`username` LIKE '%{$post['key']}%' OR `wetalk_users`.`mobile` LIKE '%{$post['key']}%' OR `wetalk_users`.`email` LIKE '%{$post['key']}%' OR `wetalk_users`.`weixin` LIKE '%{$post['key']}%' OR `wetalk_users`.`qq` LIKE '%{$post['key']}%')";
            $user_ids = $user_ids->where($where);
        }

        if($type == 'teacher'){
            $user_ids = $user_ids->group_by('class_user_relationship.user_id');
        }

        $user_ids =  $user_ids->limit($limit,$start)->get('class_user_relationship')->result();

        $users = array();
        $returnusers = array();
        $user_array_ids = array();
        foreach($user_ids as $item1){
            $user_array_ids[] = $item1->user_id;
        }
        if(count($user_array_ids) > 0){
            $items = $this->db->select("id,name,user_type,username,avatar,course_ids,block,status")->where_in("id", $user_array_ids)->get("users")->result();
            foreach($items as $item){
                $item->avatar_url = $this->user->getAvatarUrlFormAvatar($item);
                $item->my_radar_charts_url = anchorurl('components/users/getMyRadarWebView/' . $item->id);
                $users[$item->id] = $item;
            }
        }

        foreach($user_ids as $val){
            $user =$users[$val->user_id];
            if(!empty($user->course_ids)){
                $course_count = count(explode(",",$user->course_ids));
            }else{
                $course_count = 0;
            }
            $returnusers[] = array(
                'id'          => (int)$user->id,
                'username'    => $user->username,
                'name'        => $user->name,
                "class_id"    => $val->class_id,
                "status"      =>  $user->status,
                "avatar_url"  => '<img src="'.$user->avatar_url.'" width="60px">',
                "start_date"  => $val->start_date,
                "end_date"    => $val->end_date,
                "is_open_home"    => $val->is_open_home,
                "home_start_date"  => $val->home_start_date == '0000-00-00' ?'':$val->home_start_date,
                "home_end_date"    => $val->home_end_date == '0000-00-00' ?'':$val->home_end_date,
                "block"       =>  $user->block,
                "course_count" => $course_count,
                'beginDateString'=> $val->start_date.'--'.$val->end_date,
                'homeDateString' =>  $val->is_open_home == 0?'未开通':$val->home_start_date.'--'.$val->home_end_date,
                'blockString'    => (time() < strtotime($val->end_date) && $user->block == 0 )?" <span class='state-progress'>正常</span>":"<span class='state-type'>已停用</span>",
                'teacherAuthString' => '教师权限['.$this->getTeacherAdministratorClass($user->id).']'
            );
        }
        return $returnusers;
    }

    public function getTeacherAdministratorClass($user_id){
        $grades =  $this->db->select('class_user_relationship.*,classes.name as ClassName,grades.name as GradeName')
            ->where("class_user_relationship.user_id",$user_id)
            ->join('classes', 'class_user_relationship.class_id = classes.id', 'left')
            ->join('grades', 'class_user_relationship.grade_id = grades.id', 'left')
            ->get('class_user_relationship')->result();
        $string = array();
        foreach($grades as $grade){
            $string[] = $grade->GradeName.$grade->ClassName;
        }
        return implode('、',$string);
    }

    /*
     *
     * 获取班级学生或者教师
     *
     */

    public function getClassUserListCount($school_id=0,$grade_id=0,$class_id=0,$type="all",$post){
        $user_ids = $this->db->select('*')->where("class_user_relationship.school_id",$school_id)
            ->where("class_user_relationship.status",1);
        if($type != "all"){
            $user_ids = $user_ids->where('class_user_relationship.user_type',$type);
        }

        if($grade_id){
            $user_ids = $user_ids->where("class_user_relationship.grade_id",$grade_id);
        }
        if($class_id){
            $user_ids = $user_ids->where("class_user_relationship.class_id",$class_id);
        }
        if(isset($post['key']) && !empty($post['key'])){
            $user_ids = $user_ids->join('users', 'class_user_relationship.user_id = users.id', 'left');
            $user_ids = $user_ids->like("users.name",$post['key'])
                ->or_like("users.username",$post['key'])
                ->or_like("users.mobile",$post['key'])
                ->or_like("users.email",$post['key'])
                ->or_like("users.weixin",$post['key'])
                ->or_like("users.qq",$post['key']);
        }
        if($type == 'teacher'){
            $user_ids = $user_ids->group_by('class_user_relationship.user_id');
        }
        $user_ids =  $user_ids->get('class_user_relationship')->num_rows();
        return $user_ids?$user_ids:0;
    }

    public function getScore(){
        return rand(0,100);
    }


    /*
     *
     * 获取班级学生或者教师
     *
     */

    public function getClassUserScoreList($class_id=0,$type="student"){
        $user_ids = $this->db->select('class_user_relationship.*')->where('class_user_relationship.user_type',$type);
        if($class_id){
            $user_ids = $user_ids->where("class_user_relationship.class_id",$class_id);
        }
        $user_ids =  $user_ids->limit(10)->get('class_user_relationship')->result();
        $users = array();
        foreach($user_ids as $val){
            $user = $this->user->getUser($val->user_id);
            $users[] = $user;
        }
        return $users;
    }


    /*
     *
     * 获取班级学生的详细数据
     *
     */

    public function getClassUserScoreDataList($limit=20,$start=0,$class_id=0,$type="student"){
        $user_ids = $this->db->select('class_user_relationship.*')->where('class_user_relationship.user_type',$type);
        if($class_id){
            $user_ids = $user_ids->where("class_user_relationship.class_id",$class_id);
        }
        $user_ids =  $user_ids->limit($limit,$start)->get('class_user_relationship')->result();
        $data = array();
        foreach($user_ids as $val){
            $user = $this->user->getUser($val->user_id);
            $data[] = array(
                "name"            => $user->name,
                "course_rate"     => $user->getStudentCoruseProgress(),
                "unit_rate"       => $user->getStudentUnitProgress(),
                "day_count"       => $user->getStudentStudyDays(),
                "study_count"     => $user->getStudentStudyTimes(),
                "weekStudy_count" => $user->getUserAveragePerWeekDays(),
                "weekStudy_time"  => $user->getUserAveragePerWeekTimes(),
                "finish"          => "<div>".(round($user->getMyCompletion(),2)*100)."%<i class='fa fa-arrow-up fa-1 fa-up' aria-hidden='true'></i></div>",
                "accuracy"        => "<div>".(round($user->getMyCorrection(),2)*100)."%</div>",
                "voice"           => "<div>".(round($user->getMySrPecent(),2)*100)."%<i class='fa fa-arrow-down fa-1 fa-down' aria-hidden='true'></i></div>",
                "skill"           => $user->getMySkillAverage(),
                "unitTestAverage" => $user->getMyStudypartQuiz(),
                "unlearn_count"   => $user->getMyNotStudyDays()
            );
        }
        return $data;
    }

    /*
    *
    * 获取班级学生的学习方法得分数据
    *
    */

    public function getClassUserMethodScoreDataList($limit=20,$start=0,$class_id=0,$type="student"){
        $user_ids = $this->db->select('class_user_relationship.*')->where('class_user_relationship.user_type',$type);
        if($class_id){
            $user_ids = $user_ids->where("class_user_relationship.class_id",$class_id);
        }
        $user_ids =  $user_ids->limit($limit,$start)->get('class_user_relationship')->result();
        $data = array();
        foreach($user_ids as $val){
            $user = $this->user->getUser($val->user_id);
            $this->recordmanager->initialize()->user_id    = $user->id;
            $end_time       = date('Y-m-d');
            $this->recordmanager->start_time = date('Y-m-d',strtotime($end_time. '-14 days'));;
            $this->recordmanager->end_time   = $end_time;
            $data[] = array(
                "name"               =>$user->name,
                "course_rate"        => $this->recordmanager->getUserStudyComprehensive()*20,
                "repeat_key"         => $this->recordmanager->getUserButtonCount("repeat_count"),
                "record_key"         => $this->recordmanager->getUserButtonCount("mic_count"),
                "listen_key"         => $this->recordmanager->getUserButtonCount("head_count"),
                "word_key"           => $this->recordmanager->getUserButtonCount("abc_count"),
                "translate_key"      => $this->recordmanager->getUserButtonCount("abc_count"),
            );
        }
        return $data;
    }




    public function geClassUserScoreDataCount($class_id=0,$type="student"){
        $user_ids = $this->db->select('count(*) as num')->where('class_user_relationship.user_type',$type);
        if($class_id){
            $user_ids = $user_ids->where("class_user_relationship.class_id",$class_id);
        }
        $user_ids =  $user_ids->get('class_user_relationship')->row();
        return $user_ids->num?$user_ids->num:0;
    }


    public function geClassUserScoreCount($class_id=0){
        $user_ids = $this->db;
        if($class_id){
            $user_ids = $user_ids->where("class_user_relationship.class_id",$class_id);
        }
        $user_ids =  $user_ids->get('class_user_relationship')->num_rows();
        return $user_ids;
    }


    public function getTeacherClass1($user){
        $grades =  $this->db->select('class_user_relationship.*,classes.name as ClassName,grades.name as GradeName')
            ->where("class_user_relationship.user_id",$user->id)
            ->where("class_user_relationship.status",1)
            ->join('classes', 'class_user_relationship.class_id = classes.id', 'left')
            ->join('grades', 'class_user_relationship.grade_id = grades.id', 'left')
            ->get('class_user_relationship')->result();
        $data = array();
        foreach($grades as $grade){
            $classobj = $this->getClass($grade->class_id);
            if($classobj-> id !=0){
                $class =    $classobj->getClassInfo();
                $class['nickname'] =  $grade->GradeName.$grade->ClassName;
                $data[] = $class;
            }else{
                continue;
            }
        }
        $this->returncode['data'] = $data;
        return $this;
    }

    public function getTeacherClass($user){
        $grades =  $this->db->select('classes.*,classes.name as ClassName,grades.name as GradeName,school.name as schoolName')
            ->where("class_user_relationship.user_id",$user->id)
            ->where("class_user_relationship.status",1)
            ->join('classes', 'class_user_relationship.class_id = classes.id', 'left')
            ->join('school', 'class_user_relationship.school_id = school.id', 'left')
            ->join('grades', 'class_user_relationship.grade_id = grades.id', 'left')
            ->get('class_user_relationship')->result();
        $data = array();
        foreach($grades as $grade){
            $classobj = $this->getClassObject($grade);
            if($classobj-> id !=0){
                $class =    $classobj->getClassInfo1();
                $class['nickname'] =  $grade->GradeName.$grade->ClassName;
                $data[] = $class;
            }else{
                continue;
            }
        }
        $this->returncode['data'] = $data;
        return $this;
    }

    public function getGrade($class_id){
        $class =  $this->db->select('classes.*,classes.name as ClassName,grades.name as GradeName')
            ->join('grades', 'classes.grade_id = grades.id', 'left')
            ->where("classes.id",$class_id)
            ->get('classes')->row();
        if($class)  $class->nickname =  $class->GradeName.$class->ClassName;
        return $class;
    }




    public function getLearningSituationOverviewForClass($class_id){




        $entity            =  $this->db->select("AVG(studyReuslt) as studyReuslt,AVG(studyCourseAverage) as studyCourseAverage,AVG(SkillAverage) as SkillAverage,AVG(StudyTimeAndFrequency) as StudyTimeAndFrequency,AVG(StudyComprehensive) as StudyComprehensive")->where("class_id",$class_id)->order_by("start_date","desc")->limit(1)->get("user_record_result")->row(); //学习效果
        $data['StudyReuslt'] = isset($entity->studyReuslt)?sprintf("%.2f",$entity->studyReuslt):0;
        $data['StudyReuslt'] = $data['StudyReuslt']>20?20:$data['StudyReuslt'];

        if($data['StudyReuslt'] <12){
            $data['StudyReusltString'] = "学习效果为（{$data['StudyReuslt']}）分，低于标准水平，请注意一定按照教师要求，确保课程的完成率达标，提高答题的正确率和达标率，及时复习，提高MT的正确率和得分，提高学习得分;";
        }else if($data['StudyReuslt'] >=12 && $data['StudyReuslt'] <=14){
            $data['StudyReusltString'] = "学习效果为（{$data['StudyReuslt']}）分，处于标准水平，请继续按照教师要求，确保课程的完成率达标，提高答题的正确率和达标率，及时复习，提高MT的正确率和得分，提高学习得分；";

        }else if($data['StudyReuslt'] > 14 && $data['StudyReuslt'] <=16){
            $data['StudyReusltString'] = "学习效果为（{$data['StudyReuslt']}）分，学习效果良好，请继续按照教师要求，确保课程的完成率达标，提高答题的正确率和达标率，及时复习，提高MT的正确率和得分，提高学习得分；";
        }else if($data['StudyReuslt'] > 16){
            $data['StudyReusltString'] = "学习效果为（{$data['StudyReuslt']}）分，远高于标准水平，请继续保持良好的练习习惯，继续提升练习效果；";
        }
        $data['StudyTimeAndFrequency']  =    isset($entity->StudyTimeAndFrequency)?sprintf("%.2f",$entity->StudyTimeAndFrequency):0; //时间与频率

        $data['StudyTimeAndFrequency'] = $data['StudyTimeAndFrequency']>20?20:$data['StudyTimeAndFrequency'];

        if($data['StudyTimeAndFrequency'] <12){
            $data['StudyTimeAndFrequencyString'] = "学习时间和学习频率低于标准要求，请努力练习，确保达到标准要求；";
        }else if($data['StudyTimeAndFrequency'] >=12 && $data['StudyReuslt'] <=14){
            $data['StudyTimeAndFrequencyString'] = "学习时间和频率及格，请继续坚持练习；";

        }else if($data['StudyTimeAndFrequency'] > 14 && $data['StudyReuslt'] <=16){
            $data['StudyTimeAndFrequencyString'] = "学习时间和频率良好，请继续保持；";
        }else if($data['StudyTimeAndFrequency'] > 16){
            $data['StudyTimeAndFrequencyString'] = "学习时间和频率优秀，请继续保持。";
        }

        $data['StudyCourseAverage']     =   isset($entity->studyCourseAverage)?sprintf("%.2f",$entity->studyCourseAverage):0; //学习进度
        $data['StudyCourseAverage'] = $data['StudyCourseAverage']>20?20:$data['StudyCourseAverage'];

        if($data['StudyCourseAverage'] <12 ){
            $data['StudyCourseAverageString'] = "学习进度低于标准要求，请努力练习，确保达到标准要求；";
        }else if($data['StudyCourseAverage'] >=12 && $data['StudyReuslt'] <=14){
            $data['StudyCourseAverageString'] = "学习进度及格，请继续坚持练习；";
        }else if($data['StudyCourseAverage'] > 14 && $data['StudyReuslt'] <=16){
            $data['StudyCourseAverageString'] = "学习进度良好，请继续保持；";
        }else if($data['StudyCourseAverage'] > 16){
            $data['StudyCourseAverageString'] = "学习进度优秀，请继续保持。";
        }

        $data['SkillAverage']           =   isset($entity->SkillAverage)?sprintf("%.2f",$entity->SkillAverage):0;//技能情况
        $data['SkillAverage'] = $data['SkillAverage']>20?20:$data['SkillAverage'];
        if($data['SkillAverage'] <12 ){
            $data['SkillAverageString'] = "能力得分低于标准要求，请加强听力、口语和语法的练习，提高英语听说的流畅度、准确度，确保能力得分不低于标准要求;";
        }else if($data['SkillAverage'] >=12 && $data['StudyReuslt'] <=14){
            $data['SkillAverageString'] = "能力得分达标，请继续坚持多听、多说，继续提升听说的流畅度和准确度;";
        }else if($data['SkillAverage'] > 14 && $data['StudyReuslt'] <=16){
            $data['SkillAverageString'] = "能力得分良好，请继续保持，坚持多听多说，不断提升听说的流畅度和准确度；";
        }else if($data['SkillAverage'] > 16){
            $data['SkillAverageString'] = "能力得分优秀，请继续保持良好的练习习惯，继续提升听说的流畅度和准确度。";
        }

        $data['StudyComprehensive']     =   isset($entity->StudyComprehensive)?sprintf("%.2f",$entity->StudyComprehensive):0; //学习方法
        $data['StudyComprehensive'] = $data['StudyComprehensive']>20?20:$data['StudyComprehensive'];
        if($data['StudyComprehensive'] <12 ){
            $data['StudyComprehensiveString'] = "学习得分为（{$data['StudyComprehensive']}）分，学习得分偏低，请按照教师要求进行练习，提高课程学习的频率和时间，正确合理使用功能键，确保练习时间和频率达标，提高完成率、正确率和语音识别率，逐步提升听力理解能力和口语能力。";
        }else if($data['StudyComprehensive'] >=12 && $data['StudyReuslt'] <=14){
            $data['StudyComprehensiveString'] = "学习得分为（{$data['StudyComprehensive']}）分，学习得分良好，请继续坚持课程学习，强化正确的练习方法和习惯，进一步提升听力和口语能力；";
        }else if($data['StudyComprehensive'] > 14){
            $data['StudyComprehensiveString'] = "学习得分为（{$data['StudyComprehensive']}）分，学习得分优秀，请继续坚持课程学习，整体优化语言质量，提升英语技能。";
        }
        $data['totalScores'] =  $data['StudyReuslt'] +$data['StudyTimeAndFrequency'] + $data['StudyCourseAverage'] +  $data['SkillAverage'] + $data['StudyComprehensive'];
        return $data;
    }

    /**
     * 根据user_id获取classes_id
     */

    public function getClassIdByUserId($user_id){
        return $this->db->where("user_id",$user_id)->get("class_user_relationship")->row();
    }


    //获取school的课程信息

    public function getSchoolCourse($school_id = 0,$class_id=0){
        $courses = array();
        if($school_id != 0){
            $school = $this->db->where("id",$school_id)->get("school")->row();
            $courses = $this->db;
            if($school && !empty($school->course_ids)){
                $course_ids_array = explode(",",$school->course_ids);
                $courses =   $courses->where_in("id",$course_ids_array)->where("status",1);
            }
            $courses = $courses->get("courses")->result();

            $class = $this->getClass($class_id);
            $coursearray = array();
            if(!empty($class->course_ids)){
                $coursearray = explode(",",$class->course_ids);

            }
            foreach($courses as $course){
                if(in_array($course->id,$coursearray)){
                    $course->isSelect = 1;
                }else{
                    $course->isSelect = 0;
                }
            }
        }
        return $courses;
    }


}  
