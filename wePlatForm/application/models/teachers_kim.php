<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Teachers extends CI_Model{



    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'                 => array("require" => false),
            'school_id'          => array("require" => true),
            'paper_id'           => array("require" => true),
            "class_id"          => array("require" => true),
            "user_id"           => array("require" => true),
            "datetime"           => array("require" => true),
            "group_id"           => array("require" => true),
            "status"           => array("require" => true),
            "marking_status" => array("require" => true),


         );
        parent::_initialize($config);
    }

    /**
     * 上传试卷属性
     */
    public function uploadPaperClass($obj){
        $data = array(
            "school_id" => $obj->school_id,
            "paper_id" => $obj->paper_id,
            "class_id" => $obj->classes_ids,
            "user_id" => $obj->student_ids,
            "datetime" => $obj->starttime,
        );
        $this->db->insert('exam_paper_class_user_relationship',$data);
        $id = $this->db->insert_id();
        return $id;
    }

    /**
     * @param $post
     * @return array
     * 上传每个用户
     */
    public function uploadUserRelationship($obj){
        $group = $this->db->select("MAX(group_id) as maxgroupid")->get('exam_paper_class_user_relationship')->row();
        if($group){
            $group_id =  $group->maxgroupid +1;
        }else{
            $group_id = 1;
        }
        //根据试卷id查处各个模块的考试时间
        $items = $this->db->select("*")->where('paper_id',$obj->paper_id)->get('exam_paper_model')->result();
        $model_time="";
        foreach($items as $item){
            $model_time += $item->model_time;
        }

        for ($i = 0; $i < count($obj->relationship); $i++) {
            $data = array(
                "school_id" => $obj->school_id,
                "paper_id" => $obj->paper_id,
                "class_id" => $obj->relationship[$i]->classes,
                "grade_id" => $obj->relationship[$i]->grade,
                "user_id"  => $obj->relationship[$i]->student,
                "datetime" => $obj->starttime,
                "endtime"  => $this->getExamEndTime($obj->starttime,$model_time),
                "group_id" =>$group_id,
            );
            $this->db->insert('exam_paper_class_user_relationship',$data);
            $id = $this->db->insert_id();
            $this->saveUserScore($data,$id,$group_id);
        }
        return $id;
    }


    public function saveUserScore($data,$relationship_id,$group_id){
        $items = $this->db->select("*")->where('paper_id',$data['paper_id'])->get('exam_paper_model')->result();
        foreach($items as $item){
            $data = array(
                "user_id"  => $data['user_id'],
                "paper_id" => $data['paper_id'],
                "model_id" => $item->id,
                "model_score" => 0,
                "group_id" => $group_id,
                "created_time" =>  date('Y-m-d H:i:s'),
                "relationship_id"=>$relationship_id
            );
            $this->db->insert('exam_paper_user_score',$data);
            $id = $this->db->insert_id();
        }
        return $id;
    }


    /**
     * @param $post
     * @return array
     * 上传每个用户的score
     */
    public function uploadUserScore($obj){
        $group = $this->db->select("MAX(group_id) as maxgroupid")->get('exam_paper_class_user_relationship')->row();
        if($group){
            $group_id =  $group->maxgroupid +1;
        }else{
            $group_id = 1;
        }
        for ($i = 0; $i < count($obj->relationship); $i++) {
            $items = $this->db->select("*")->where('paper_id',$obj->paper_id)->get('exam_paper_model')->result();
                foreach($items as $item){
                    $data = array(
                        "user_id"  => $obj->relationship[$i]->student,
                        "paper_id" => $obj->paper_id,
                        "model_id" => $item->id,
                        "model_score" => 0,
                        "group_id" => $group_id,
                        "created_time" =>  date('Y-m-d H:i:s'),
                    );
                    $this->db->insert('exam_paper_user_score',$data);
                    $id = $this->db->insert_id();
                }
            return $id;
        }
    }


    public function getPaperStudentInfoList($post,$user_id){
//        $data = array();
//        $items = $this->db->select("id")->where("school_id",$school_id)->get("exam_paper_class_relationship")->result();
//        foreach($items as $item){
//            $data[] = $this->getPaper($item->id)->getPaperInfoView();
//        }
//        return $data;
        $data = array();
        $items = $this->db->select("id,datetime,endtime,status");
        $items = $items->where("user_id",$user_id);

//        if(isset($post['classes_id']) && $post['classes_id']!=0){
//            $items = $items->where("IF( FIND_IN_SET({$post['classes_id']}, class_id), 1, 0)");
//        }
        $items = $items->order_by("id","desc")->limit($post['pageSize'],$post['pageIndex'])->get("exam_paper_class_user_relationship")->result();

        foreach($items as $item){
            //判断时间,
            if(strtotime($item->endtime) - time() < 0){
               //考试时间结束,置状态位
                $this->db->where("id",$item->id);
                $this->db->update("exam_paper_class_user_relationship",array("status"=>2));
            }else if( time() - strtotime($item->datetime) >=0 && $item->status !=2 ){
                $this->db->where("id",$item->id);
                $this->db->update("exam_paper_class_user_relationship",array("status"=>1));
        }
//elseif( time() - strtotime($item->datetime) >=0 && $item->status !=2 ){
//                $this->db->where("id",$item->id);
//                $this->db->update("exam_paper_class_user_relationship",array("status"=>0));
//            }
            //echo $item->id."++";
            $data[] = $this->getPaper($item->id)->getPaperInfoView();
        }
        return $data;
    }

    //获取本次考生列表
    public function getPaperStudentList($paper_id,$group_id){
        $data = array();
        $items = $this->db->select("user_id")
            ->where("paper_id",$paper_id)
            ->where("group_id",$group_id)
            ->get("exam_paper_class_user_relationship")->result();
        foreach($items as $item){
            $data[] = $this->user->getUser($item->user_id);
        }
        return $data;
    }
    //获取平均分
    public function getPaperStudentAverage($paper_id,$group_id){
        $data = array();
        $data['studentNum'] = $this->db->select("*")
            ->where("paper_id",$paper_id)
            ->where("group_id",$group_id)
            ->get("exam_paper_class_user_relationship")->num_rows();
       $items = $this->db->select("*")
            ->where("paper_id",$paper_id)
            ->where("group_id",$group_id)
            ->get("exam_paper_user_score")->result();
       $score = 0;
        foreach($items as $item){
            $score += $item->model_score;
        }
        $data['scoreNum'] = $score;//总分数
        $data['average'] = $data['scoreNum']/$data['studentNum'];//平均分

        $items =$this->db->select("*")->where("paper_id",$paper_id)->where("group_id",$group_id)->get("exam_paper_class_user_relationship")->result();
        $data['A'] = 0;
        $data['B'] = 0;
        $data['C'] = 0;
        foreach($items as $item){
            $user_score = $this->getUserScore($paper_id,$group_id,$items->user_id)->model_score;
            if($user_score >= 80){
                $data['A']++;
            }else if($user_score < 80&&$user_score >= 60){
                $data['B']++;
            }else{
                $data['C']++;
            }
        }

        return $data;
    }

    //获取用户总分
    public function getUserScore($paper_id,$group_id,$user_id){
        return $this->db->where("paper_id",$paper_id)->where("group_id",$group_id)->where("user_id",$user_id)->get("exam_paper_user_score")->row();
    }
    //获取用户
//    public function getUser($id){
//        return $this->db->where("id",$id)->get("users")->row();
//    }

    //获取考试情况
    public function getPaperStudentInfoCount($user_id){
        $item = $this->db->select("count(*) as num")->where("user_id",$user_id);
        $item = $item->get("exam_paper_class_user_relationship")->row();
        return isset($item->num)?$item->num:0;
    }



    //获取考试情况
    public function getPaperInfoList($post,$classes=array()){
//        $data = array();
//        $items = $this->db->select("id")->where("school_id",$school_id)->get("exam_paper_class_relationship")->result();
//        foreach($items as $item){
//            $data[] = $this->getPaper($item->id)->getPaperInfoView();
//        }
//        return $data;
        $data = array();
        $items = $this->db->select("id");
        if(isset($post['school_id']) && $post['school_id']!=0){
            $items = $items->where("school_id",$post['school_id']);
        }

        //这必须查老师有权限的班级
        if(count($classes)){
            $items = $items->where_in("class_id",$this->toArrayIdArray($classes));
        }

//        if(isset($post['classes_id']) && $post['classes_id']!=0){
//            $items = $items->where("IF( FIND_IN_SET({$post['classes_id']}, class_id), 1, 0)");
//        }
        $items = $items->group_by("group_id")->group_by("class_id")->order_by("id","desc")->limit($post['pageSize'],$post['pageIndex'])->get("exam_paper_class_user_relationship")->result();
        foreach($items as $item){
            $data[] = $this->getPaper($item->id)->getPaperInfoView();
        }
        return $data;
    }

    //获取考试情况
    public function getPaperInfoCount($post,$classes=array()){
//        $data = array();
//        $items = $this->db->select("id")->where("school_id",$school_id)->get("exam_paper_class_relationship")->result();
//        foreach($items as $item){
//            $data[] = $this->getPaper($item->id)->getPaperInfoView();
//        }
//        return $data;
        $data = array();
        $item = $this->db->select("count(*) as num");
        if(isset($post['school_id']) && $post['school_id']!=0){
            $item = $item->where("school_id",$post['school_id']);
        }

        //这必须查老师有权限的班级
        if(count($classes)){
            $item = $item->where_in("class_id",$this->toArrayIdArray($classes));
        }

//        if(isset($post['classes_id']) && $post['classes_id']!=0){
//            $items = $items->where("IF( FIND_IN_SET({$post['classes_id']}, class_id), 1, 0)");
//        }
        $item = $item->get("exam_paper_class_user_relationship")->row();

        return isset($item->num)?$item->num:0;
    }

    //获取本次考试用户以及考试状态
    public function getPaperInfoAnswerList($paperid,$group_id){
        $data = array();
        $items = $this->db->select("id")
                ->where("paper_id",$paperid)
                ->where("group_id",$group_id)
                ->get("exam_paper_class_user_relationship")->result();
        foreach($items as $item){
            $data[] = $this->getPaper($item->id)->getPaperAnswerInfoView();
        }
        return $data;
    }

    public function getPaper($id){
        $amoeba = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("exam_paper_class_user_relationship")->row_array();
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

    //获取已发布考试试卷view
    public function getPaperInfoView(){
        $data = array(
            'id'                    => $this->id,
            "exam_paper_id"         => $this->paper_id,
            "exam_state"            => $this->getExamState($this->datetime,$this->paper->getPaperInfo($this->paper_id)->time),
            "exam_paper_name"       => $this->paper->getPaperInfo($this->paper_id)->title,
            "exam_paper_time"       => $this->paper->getPaperInfo($this->paper_id)->time,
            "exam_paper_score"      => $this->paper->getPaperInfo($this->paper_id)->scores,
            "exam_diffcultyid"      => $this->paper->getPaperInfo($this->paper_id)->difficulty_id,
            "exam_paper_diffculty"  => $this->paper->getDifficultyInfo($this->paper->getPaperInfo($this->paper_id)->difficulty_id)->difficulty_name,
            "exam_classes"          => $this->getClassName(),
            "exam_students_count"   => $this->getStuCount(),
            "model_score"           => $this->students->getUserExamScore($this->id),
            "exam_status"           => $this->status,
            "exam_students_not_started_count"=>$this->getStuStatusCount(0), //未开始
            "exam_students_finish_count"=>$this->getStuStatusCount(2), //已完成
            "exam_students_in_exam_count"=>$this->getStuStatusCount(1), //考试中
            "exam_students"         => $this->user_id,
            "group_id"              => $this->group_id,
            "data_time"             => $this->datetime,//考试开始时间
            "end_data_time"         => $this->getExamEndTime($this->datetime,$this->paper->getPaperInfo($this->paper_id)->time),//考试结束时间
            "dis_data_time"         => $this->getExamDisTime($this->datetime),//还有多久开始考试
        );
        return $data;
    }

    //获取试卷详情view
    public function getPaperAnswerInfoView(){
        $data = array(
            'id'                    => $this->id,
            "exam_paper_name"       => $this->paper->getPaperInfo($this->paper_id)->title,
            "marking_status"        => $this->marking_status,
            "group_id"              => $this->group_id,
            "testStuCounted"        => $this->getTestStuCount(0),
            "testStuCounting"       => $this->getTestStuCount(1),
            "writestate"        => $this->getMarkingPaperStatus($this->paper_id,$this->group_id,$this->user_id,6),//获取该试卷 阅读模块是否批阅完成
            "translatestate"        => $this->getMarkingPaperStatus($this->paper_id,$this->group_id,$this->user_id,3),//获取该试卷 阅读模块是否批阅完成
            "data_time"             => $this->datetime,//考试开始时间
        );
        return $data;
    }

    //考试结束时间
    public function getExamEndTime($time,$paper_time){
        return date('Y-m-d H:i:s', strtotime("+$paper_time minute",strtotime($time))).PHP_EOL;
    }
    //距离考试时间
    public function getExamDisTime($time){
        $now = date("Y-m-d H:i:s");//现在时间
        $start_time=$time;
        if(strtotime($now)<strtotime($start_time)) {
            $date = floor((strtotime($start_time) - strtotime($now)) / 86400);
            $hour = floor((strtotime($start_time) - strtotime($now)) % 86400 / 3600);
            $minute = floor((strtotime($start_time) - strtotime($now)) % 3600 / 60);
            return $date . "天".$hour . "小时".$minute . "分钟";
        }else{
            $date = floor((strtotime($now) - strtotime($start_time)) / 86400);
            $hour = floor((strtotime($now) - strtotime($start_time)) % 86400 / 3600);
            $minute = floor((strtotime($now) - strtotime($start_time)) % 3600 / 60);
            return $hour . "小时".$minute . "分钟";
        }
    }
    //获取已发布试卷状态
    public function getExamState($time,$paper_time){
        $state="";
        $now = strtotime(date("Y-m-d H:i:s"));//现在时间
        $exam_date = strtotime($time);//考试开始时间
        $exam_time = strtotime("+$paper_time minute",strtotime($time));//考试结束时间

        if(($now > $exam_time || $this->status == 2) && $this->marking_status == 0){
            $state="待批阅";

        }else if($now > $exam_date && $now < $exam_time && $this->status != 2){
            $state="正在进行";
        }else if($now < $exam_date){
            //距离考试考试24小时显示
            $state="未开始";
        }
        return $state;
    }

    //获取本次考试学生数量
    public function getTestStuCount($status){
        $item = $this->db->select("count(*) as num")
            ->where("paper_id",$this->paper_id)
            ->where("group_id",$this->group_id)
            ->where("marking_status",$status)
            ->get("exam_paper_class_user_relationship")
            ->row();

        return isset($item->num)?$item->num:0;
    }

    //获取考试学生的数量
    public function getStuCount()
    {
        $item = $this->db->select("count(*) as num")
            ->where("class_id",$this->class_id)
            ->where("group_id",$this->group_id)
            ->get("exam_paper_class_user_relationship")
            ->row();

        return isset($item->num)?$item->num:0;
    }

    public function getStuStatusCount($status=0)
    {
        $item = $this->db->select("count(*) as num")
            ->where("class_id",$this->class_id)
            ->where("group_id",$this->group_id)
            ->where("status",$status)
            ->get("exam_paper_class_user_relationship")
            ->row();
        return isset($item->num)?$item->num:0;
    }


    //获取classes name
    public function getClassName(){
        $data = array();
        $class_id = $this->db->select("class_id")
            ->where("group_id",$this->group_id)
            ->group_by("class_id")
            ->get("exam_paper_class_user_relationship")
            ->result();
        foreach($class_id as $key => $value){
            $items = $this->db->select("grade_id")->where("id",$value->class_id)->get("classes")->result();
            $data[$key]['class_id'] = $value->class_id;
            foreach($items as $a => $b){
                $data[$key]['grade'] = $this->db->select("name")->where("id",$b->grade_id)->get("grades")->row_array();
            }
            $data[$key]['class'] = $this->db->select("name")->where("id",$value->class_id)->get("classes")->row_array();
        }
        return $data;
    }

    //获取classes name
    public function getClassItemName(){
        $item = $this->db->select("*")->where("id",$this->class_id)->get("classes")->row();
        $grade = $this->db->select("*")->where("id",$item->grade_id)->get("grades")->row();
        $item->grade = $grade;
        return $item;
    }


    public function getUserClassExamDetail($group_id=0,$class_id=0){
        $data = $this->config['attributes'];
        $return  = array();
        $return['students'] = array();
        $items = $this->db->select(implode(',',array_keys($data)))
            ->where("class_id",$class_id)
            ->where("group_id",$group_id)
            ->get("exam_paper_class_user_relationship")
            ->result();
        if(count($items) > 0){
            $examClass = $this->getPaper($items[0]->id);
            $return =  $examClass->getPaperInfoView();
            $return['classDetail'] = $examClass->getClassItemName();
            foreach($items as $item){
                $student = $this->user->getUser($item->user_id);
                $student->status = $item->status;
                $return['students'][] = $student;
            }
        }
        return $return;
    }

    //获取用户模块是否批阅完成
    public function getMarkingPaperStatus($paper_id,$group_id,$user_id,$status){
        $mark_status="";
        $items = $this->db->select('model_id')->where("paper_id",$paper_id)->where("group_id",$group_id)->where("user_id",$user_id)->get("exam_paper_user_score")->result();
        foreach($items as $item){
            $type = $this->getModelSkillid($item->model_id)->type;
            if($type==$status){
                $mark_status = $this->db->select('model_score_all')->where("paper_id",$paper_id)->where("group_id",$group_id)->where("user_id",$user_id)->where("model_id",$item->model_id)->get("exam_paper_user_score")->result();
            }
        }
        return $mark_status;
    }

    public function markingPaper($paper_id,$group_id,$status,$num=0){
        $data = array();
     //通过group_id获取所有答题用户

        $relationships = $this->db->select("*")->where("group_id",$group_id)->get('exam_paper_class_user_relationship')->result();
        if(isset($relationships[$num]) && !empty($relationships[$num])){
            $items = $this->db->select('*')
                ->where("paper_id",$paper_id)
                ->where("relationship_id",$relationships[$num]->id)
                ->where("user_id",$relationships[$num]->user_id)
                ->get("exam_paper_user_answer")->result();
            foreach($items as $item){
                $skill_id = $this->getContentSkillid($item->ques_content_id)->skill_id;
                if($skill_id==$status){
                    $data['answer'] = $this->db->select('*')
                        ->where("paper_id",$paper_id)
                        ->where("relationship_id",$relationships[$num]->id)
                        ->where("ques_content_id",$item->ques_content_id)
                        ->where("user_id",$relationships[$num]->user_id)
                        ->get("exam_paper_user_answer")->result();
                    $data['answer']['model_score'] = $this->db->select('model_score_all')->where("paper_id",$paper_id)
                        ->where("group_id",$group_id)
                        ->where("model_id",$item->model_id)
                        ->where("user_id",$item->user_id)
                        ->get("exam_paper_user_score")->result();;
                }
            }
            $data['user'] = $this->user->getUser($relationships[$num]->user_id);
        }
        return $data;
    }

    //获取model的type
    public function getModelSkillid($id){
        return $this->db->where("id",$id)->get("exam_paper_model")->row();
    }

    //根据contentid获取类型
    public function getContentSkillid($content_id){
        return $this->db->where("id",$content_id)->get("exam_questions_content")->row();
    }

    //修改作文和翻译分数
    public function updateScore($result){
//添加老师评分
        $data1 = array(
            "model_score" => $result['score']
        );
        //通过section的model id 查找 真正的model id

        $modelsection = $this->db->where("id",$result['model_id'])->get("exam_paper_model_section")->row();
        if($modelsection){
            $this->db->where("user_id",$result['user_id'])
                ->where("paper_id",$result['paper_id'])
                ->where("model_id",$modelsection->id)
                ->where("relationship_id",$result['relationship_id'])
                ->where("group_id",$result['group_id']);

            $this->db->update('exam_paper_user_score',$data1);
        }


//修改批阅状态
        $data2 = array(
            "marking_status" => '1',
            "teacher_id" => getAdminViewer()->id,
        );
        $this->db->where("user_id",$result['user_id'])
            ->where("paper_id",$result['paper_id'])
            ->where("id",$result['relationship_id']);
        $this->db->update('exam_paper_class_user_relationship',$data2);
//添加老师评语
        $data = array(
            "teacher_volume" => $result['score_con']
        );
        $this->db->where("id",$result['id']);
        $this->db->update('exam_paper_user_answer',$data);
        return true;
    }
    /**
     * 取得全部学科列表,语文，数学、英语等
     */
    
    public function getTeacherSubjectList(){
    	return $this->db->get("wetalk_subject")->result();
    }
    /**
     * 取得教师全部职务列表，校长、副校长、班主任等
     */
    public function getTeacherJob(){
    	return $this->db->get("wetalk_teacher_job")->result();
    }
    /**
     * 
     * @param 传递参数：学校id $school_id
     * 
     */
    public function getTeacherListOfSchool($school_id)
    {
    	$sql = "select distinct(user_id) from  wetalk_class_user_relationship where school_id='".$school_id."'";
    	$result = $this->db->query($sql)->result();
    	foreach ($result as $key)
    	{
    		
    	}
    	return $result;
    }
    /**
     * 取的全部老师，不关联学校
     */
    public function getTeacherList()
    {
    	$sql = "select a.id,a.name,a.username,a.email,a.mobile,a.user_type,a.status";
    	$sql.=",b.professional_title,b.tags,b.extends_tags,b.jobs,b.subject,b.experience_year ";
    	$sql.=" from wetalk_users as a left join wetalk_teacher_attr as b on a.id =b.user_id ";
    	$sql.=" where a.user_type='teacher' order by id desc";
    	$result = $this->db->query($sql)->result();
    	return $result;
    }
    /**
     * 取得老师的基本信息，包括职称、职位、联系方式、教龄、所教年级、教授学科、特征和扩展特征、教龄等
     */
    public function getTeacherInfo($user_id)
    {
    	$sql = "select a.id,a.name,a.username,a.email,a.mobile,a.user_type,a.status";
    	$sql.=",b.professional_title,b.tags,b.extends_tags,b.jobs,b.subject ,b.subject,b.experience_year";
    	$sql.=" from wetalk_users as a left join wetalk_teacher_attr as b on a.id =b.user_id where id='".$user_id."'";
    	$result = $this->db->query($sql)->row();
    	return $result;
    }

}
