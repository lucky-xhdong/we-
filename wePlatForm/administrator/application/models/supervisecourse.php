<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
 *
 *
 *  读课表
 *
 * */

class Supervisecourse extends CI_Model{



    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
                "id"                        => array("require" => false),
                "region_education_plan_id"  => array("require" => false),
                "created_time"              => array("require" => false),
                "user_id"                   => array("require" => false),
                "name"                      => array("require" => false),
                "school_id"                 => array("require" => false),
                "date"                      => array("require" => false),
                "teacher_id"                => array("require" => false),
                "class_id"                  => array("require" => false),
                "attendance"                => array("require" => false), //'出勤人数',
                "teaching_progress"         => array("require" => false), // '教学进度',
                "is_teaching_case"          => array("require" => false), // '是否使用教案 0 不使用 1 使用',
                "is_assignment_sheet"       => array("require" => false), // '是否使用作业单 0 不使用 1 使用',
                "content"                   => array("require" => false), // '授课内容：',
                "entourage"                 => array("require" => false), // '跟课人员',
                "other_entourage"           => array("require" => false), // '其他跟课人员',
                "teacher_time_distribution" => array("require" => false), // '时间分配',
                "teacher_instruction_definition"    => array("require" => false), // '指令清晰度',
                "teacher_ttt_tet"                   => array("require" => false), // ' TTT&TET',
                "teacher_rhythm_control"            => array("require" => false),// '节奏把握',
                "teacher_enthusiasm"                => array("require" => false), // '参与项目热情度',
                "teacher_role_transformation"       => array("require" => false), // '角色转换度',
                "teacher_instructing_students"      => array("require" => false), // '对学生指导',
                "teacher_others"                    => array("require" => false), // '其他',
                "student_interest"                  => array("require" => false),// '兴趣',
                "student_participation_degree"      => array("require" => false),// '参与度',
                "student_is_speak_loudly"           => array("require" => false),// '是否开口大声',
                "student_others"                    => array("require" => false),
                "classroom_teaching"                => array("require" => false), // '课堂教学环节：',
                "teaching_bright"                   => array("require" => false), // '教学亮点',
                "teaching_advise"                   => array("require" => false), // '随堂建议',
                "technology"                        => array("require" => false), // '机房&技术',
                "supervise_course_advise"           => array("require" => false), // '督课建议',
        );
        parent::_initialize($config);
    }




    public function getSupervisecourse($id){
        $region = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("supervise_course")->row_array();
        if($item){
            foreach($item as $key=>$val){
                if(empty($val) && $val != 0) $val = "";
                $region->$key = $val;
            }
        }else{
            $region->id = 0;
        }
        return $region;
    }




    public function getSupervisecourseInfo(){

        $data = array(
            "id"                        => $this->id,
            "region_education_plan_id"  =>  $this->region_education_plan_id,
            "name"                      =>  $this->name,
            "school_id"                 =>  $this->school_id,
            "schoolInfo"                =>  $this->school->getSchool($this->school_id),
            "date"                      =>  $this->date,
            "teacher_id"                =>  $this->teacher_id,
            "teacherInfo"               =>  $this->user->getUser($this->teacher_id),
            "class_id"                  =>  $this->class_id,
            "classInfo"                 =>  $this->classes->getClass($this->class_id),
            "attendance"                =>  $this->attendance,
            "is_teaching_case"          =>  $this->is_teaching_case,
            "content"                   =>  $this->content,
            "entourage"                 =>  $this->entourage,
            "other_entourage"           =>  $this->other_entourage,
            "teacher_time_distribution" =>  $this->teacher_time_distribution,
            "teacher_instruction_definition"    =>  $this->teacher_instruction_definition,
            "teacher_ttt_tet"                   =>  $this->teacher_ttt_tet,
            "teacher_rhythm_control"            =>  $this->teacher_rhythm_control,
            "teacher_enthusiasm"                =>  $this->teacher_enthusiasm,
            "teacher_role_transformation"       => $this->teacher_role_transformation,
            "teacher_instructing_students"      =>  $this->teacher_instructing_students,
            "teacher_others"                    =>  $this->teacher_others,
            "student_interest"                  =>  $this->student_interest,
            "student_participation_degree"      => $this->student_participation_degree,
            "student_is_speak_loudly"           =>  $this->student_is_speak_loudly,
            "student_others"                    =>  $this->student_others,
            "classroom_teaching"                =>  $this->classroom_teaching,
            "teaching_bright"                   =>  $this->teaching_bright,
            "teaching_advise"                   =>  $this->teaching_advise,
            "technology"                        =>  $this->technology,
            "supervise_course_advise"           =>  $this->supervise_course_advise,
            "created_time"                      =>$this->created_time,
            "userInfo"                          => $this->getUserInfo(),
            "superviseCourseScore"              => $this->getSuperviseCourseScoreCategory(),
            "totalScore"                        => $this->getSuperviseCourseScore()

        );
        return $data;
    }


    public function getUserInfo(){
        return $this->user->getUser($this->user_id)->getUserInfoNotToken();
    }




    public function getSupervisecourseCount($region_education_plan_id=0,$entity=array()){
        $region_relation_ship = getAdminViewer()->getPlatFormAccountRegion();
        $role = getAdminViewer()->getUserRole();
        if(count($region_relation_ship) == 0 && $role->type != "444444") return 0;


        $item = $this->db->select("supervise_course.id");
        if($region_education_plan_id !=0 && (int)$region_education_plan_id !=0 ){
            $item = $item->where("supervise_course.region_education_plan_id",$region_education_plan_id);
        }
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $item = $item->where("supervise_course.created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $item = $item->where("supervise_course.created_time <=",$entity['end_date']);
        }
        if(isset($entity['key']) && !empty($entity['key']) ){
            $item = $item->join('users','supervise_course.teacher_id = users.id', 'left')
                ->like("users.name",$entity['key']);
        }
        if(count($region_relation_ship) > 0) $item = $item->join('region_education_plan','supervise_course.region_education_plan_id = region_education_plan.id', 'left')->where_in("region_education_plan.region_id",$this->toArrayRegionIdArray($region_relation_ship));

        if($role->type == "444444"){
            $item = $item->where("supervise_course.teacher_id",getAdminViewer()->id);
        }


        return $item->get('supervise_course')->num_rows();
    }


    public function  updateKey($data = array()){
        if(count($data)){
            $this->db->where("id",$this->id);
            $this->db->update("supervise_course",$data);
        }
        return true;
    }

    /*
     *
     * 获取区域列表数据
     */

    public function getSupervisecourseList($region_education_plan_id=0,$limit=20,$start=0,$entity=array()){

        $region_relation_ship = getAdminViewer()->getPlatFormAccountRegion();
        $role = getAdminViewer()->getUserRole();
        if(count($region_relation_ship) == 0 && $role->type != "444444") return array();
        $data = array();
        $items = $this->db->select("supervise_course.id");
        if($region_education_plan_id !=0 && (int)$region_education_plan_id !=0 ){
           $items = $items->where("supervise_course.region_education_plan_id",$region_education_plan_id);
        }
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $items = $items->where("supervise_course.created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $items = $items->where("supervise_course.created_time <=",$entity['end_date']);
        }
        if(isset($entity['key']) && !empty($entity['key']) ){
            $items = $items->join('users','supervise_course.teacher_id = users.id', 'left')
                            ->like("users.name",$entity['key']);
        }
        if(count($region_relation_ship) > 0) $items = $items->join('region_education_plan','supervise_course.region_education_plan_id = region_education_plan.id', 'left')->where_in("region_education_plan.region_id",$this->toArrayRegionIdArray($region_relation_ship));

        if($role->type == "444444"){
            $items = $items->where("supervise_course.teacher_id",getAdminViewer()->id);
        }

        $items = $items->order_by("id","desc")->limit($limit,$start)->get("supervise_course")->result();
        foreach($items as $item){
            $data[] = $this->getSupervisecourse($item->id)->getSupervisecourseInfo();
        }
        return $data;
    }


    public function getSupervisecourseInfoList($limit=20,$start=0,$post){
        $data = array();
        $items = $this->db->select("id");
        if(isset($post['key']) && !empty($post['key'])){
            $items = $items->like("name",$post['key']);
        }
        $items = $items->limit($limit,$start)->order_by("id","desc")->get("supervise_course")->result();
        foreach($items as $item){
            $data[] = $this->getSupervisecourse($item->id)->getSupervisecourseInfo();
        }
        return $data;
    }



    public function save($data){
        $entity = $this->config['attributes'];
        if(isset($data['SuperviseCoursescore']) && count($data['SuperviseCoursescore'])){
            $SuperviseCoursescore = $data['SuperviseCoursescore'];
        }
        foreach($data as $key => $val){
            if(!in_array($key,array_keys($entity))){
                unset($data[$key]);
            }
        }
        if(isset($data['entourage']) && !empty($data['entourage'])){
            $data['entourage'] = implode(",",$data['entourage']);
        }
        if(isset($data['id']) && !empty($data['id'])){
            $this->db->where("id",$data['id']);
            $this->db->update('supervise_course',$data);
        }else{
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $this->db->insert('supervise_course',$data);
            $data['id']= $this->db->insert_id();
        }

        if(isset($SuperviseCoursescore) && count($SuperviseCoursescore)){
            $SuperviseCourse = $this->getSupervisecourse( $data['id']);
            $SuperviseCourse->saveSuperviseCourseScore($SuperviseCoursescore);
        }
        return true;
    }

    public function saveSuperviseCourseScore($data =array()){
        if(count($data)){
            foreach($data as $key=>$item){
                $supervise_course_category_child = $this->db->where("id",$key)->get("supervise_course_category_child")->row();
                if($supervise_course_category_child){
                    $entity = array(
                        "supervise_course_id"=>$this->id,
                        "supervise_course_category_id"=>$supervise_course_category_child->supervise_course_category_id,
                        "supervise_course_category_child_id"=>$supervise_course_category_child->id,
                         "score"=>$item
                    );
                    $this->db->insert('supervise_course_score',$entity);
                }
            }
        }
        return true;
    }

    public function delete(){
        if(!isset($this->id)){
            return false;
        }else{
            $this->db->where("id",$this->id);
            $this->db->delete("supervise_course");
        }
        return true;
    }


    public function getSuperviseCourseCategory(){
        $items = $this->db->get("supervise_course_category")->result();
        foreach($items as $item){
            $childs = $this->db->where("supervise_course_category_id",$item->id)->get("supervise_course_category_child")->result();
            $item->childs = $childs;
        }
        return $items;
    }


    public function getSuperviseCourseScoreCategory(){
        $items = $this->db->get("supervise_course_category")->result();
        foreach($items as $item){
            $childs = $this->db->select("supervise_course_category_child.*,supervise_course_score.score")
                         ->where("supervise_course_category_child.supervise_course_category_id",$item->id)
                         ->where("supervise_course_score.supervise_course_id",$this->id)
                        ->join('supervise_course_score','supervise_course_score.supervise_course_category_child_id = supervise_course_category_child.id', 'left')
                        ->get("supervise_course_category_child")->result();
            $item->childs = $childs;
        }
        return $items;
    }


    public function getSuperviseCourseScore(){
        $item = $this->db->select("SUM(score) as scores")->where("supervise_course_id",$this->id)->get("supervise_course_score")->row();
        return isset($item->scores)?$item->scores:0;
    }

//    public function saveSuperviseCourseScore($data){
//        if(isset($data['supervise_course_category_child_id']) &&isset($data['score']) ){
//            if(isset($data['id']) && !empty($data['id'])){
//                $this->db->where("id",$data['id']);
//                $this->db->update('supervise_course_score',$data);
//            }else{
//                $this->db->insert('supervise_course_score',$data);
//            }
//        }
//        return true;
//    }

}  
