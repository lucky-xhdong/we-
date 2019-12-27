<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachertestexam extends CI_Model{


    public $objectType = 'teachertestexam';
    public $type = 'teachertestexam';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('oss');
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'                  => array("require" => false),
            "name"                => array("require" => false),
            "createdTime"         => array("require" => false),
            "filename"            => array("require" => false),
            "type"                => array("require" => false),
            "description"         => array("require" => false),
            "update_time"         => array("require" => false),
            "status"              => array("require" => false),
            "region_id"           => array("require" => false),
            "school_id"           => array("require" => false),
            "exam_time"           => array("require" => false),
            "test_paper_id"      => array("require" => false),

        );
        parent::_initialize($config);
    }

    public function getTeachertestexam($id){
        $unit = new self;
        $data = $this->config['attributes'];
        $row = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("teacher_test_exam")->row_array();
        if($row){
            foreach($row as $key=>$val){
                if(empty($val)) $val = "";
                $unit->$key = $val;
            }
        }else{
            $unit->id = 0;
        }
        return $unit;
    }

    public function initTeachertestexams($entitys = array()){
        $teacher_test_exam = array();
        foreach($entitys as $entity){
            $lesson = new self;
            foreach($entity as $key=>$val){
                if(empty($val)) $val = "";
                $lesson->$key = $val;
            }
            $teacher_test_exam[] = $lesson;
        }
        return $teacher_test_exam;
    }

    public function getTeachertestexamObject($lessonitem){
        $lesson = new self;
        if(isset($lessonitem->id)){
            $lesson->id             = $lessonitem->id;
            $lesson->name           = $lessonitem->name;
            $lesson->description    = $lessonitem->description;
            $lesson->status         = $lessonitem->status;
            $lesson->type           = $lessonitem->type;
            $lesson->filename       = $lessonitem->filename;
            $lesson->region_id      = $lessonitem->region_id;
            $lesson->school_id      = $lessonitem->school_id;
            $lesson->exam_time      = $lessonitem->exam_time;
            $lesson->update_time    = $lessonitem->update_time;
            $lesson->test_paper_id  = $lessonitem->test_paper_id;

        }
        return $lesson;
    }

    public function getTeachertestexamInfo($user=null){
        $data = array(
            'id'              => (int)$this->id,
            'name'            => $this->name,
            'description'     => $this->description,
            'scores'          => 0,
            'type'            => $this->type,
            'picture_url'     => $this->getFileUrl(),
            "update_time"     => $this->update_time,
            "region_id"       => $this->region_id,
            "school_id"       => $this->school_id,
            "exam_time"       => $this->exam_time,
            "examTimeStamp"   => strtotime($this->exam_time),
            "dateTimeStamp"   => time(),
            "test_paper_id"   => $this->test_paper_id,
            "result_url"      => base_url("components/teacherexams/examReusult/".$this->id),
        );
        $data['result_url'] = "";
        $data['status'] = 0;
        if( ( time() -  strtotime($this->exam_time) ) > 900 ){
            $data['status'] = 1; //超过15分钟
        }else if(time() -  strtotime($this->exam_time)  < 0 ){
            $data['status'] = 3; //未开考
        }

        $item = $this->db->where("user_id",$user->id)
            ->where("teacher_exam_id",$this->id)
            ->get("teacher_test_paper_group_result")->num_rows();
        if($item != 0){
            $data['status'] = 2;
        }

        if(empty($this->update_time)){
            $data['update_time'] = date("Y-m-d H:i:s");
            $this->updateKey(array("update_time"=> $data['update_time'],"createdTime"=> $data['update_time']));
        }
        $paper = $this->db->select("update_time")->where("id",$this->test_paper_id)->get("teacher_test_paper")->row();
        if($paper && isset($paper->update_time)){
            $data['update_time'] = $paper->update_time;
        }
        $data['zip_url'] = $this->oss->createSignUrlTeacheExam("assets/teacherexam".$this->test_paper_id.'.zip');
        return $data;
    }


    public function getTeachertestexamRow($user=null,$data= array()){
        $result = array();
        $teacher_test_exam = false;
        //查看我的考试范围
        $class = $user->getUserSchoolGradeClassRealtionShip();
        if($class){
            $school = $this->db->select("id,region_id")->where("id", $class->school_id)->get("school")->row();
            if($school){
                $teacher_test_exam = $this->db
                    ->select('*')
                    ->where("school_id", $school->id)
                    ->order_by("exam_time","desc")
                    ->get("teacher_test_exam")->row();
            }
            if(!$teacher_test_exam){
                $teacher_test_exam = $this->db
                    ->select('*')
                    ->where("region_id", $school->region_id)
                    ->order_by("exam_time","desc")
                    ->get("teacher_test_exam")->row();
            }
        }
        if($teacher_test_exam){
            $result = $this->getTeachertestexamObject($teacher_test_exam)->getTeachertestexamInfo($user);

            $this->returncode['data'] = $result;
        }else{
            $this->returncode['errcode'] = 400001;
            $this->returncode['errdesc'] = "没有符合您的考试!";
        }

        return $this;
    }



    public function getFileUrl(){
        if(!empty($this->filename)){
            $picture = $this->storage->setMinxer($this)->getFileName($this->filename,"origin");
            return $picture;
        }

        $filename = 'assets/teacher_test_exam/'.strtolower(str_replace(" ","",$this->name)).$this->id.'.png';
        $picture =  FILEPATH.$filename;


        if(is_file($picture)){
            return  base_url().'media/'.$filename;
        }else{
            return  base_url().'media/assets/teacher_test_exam/defaultlesson.png';
        }


        //$picture =  UPLOADFILEPATH.'teacher_test_exam/'.strtolower(str_replace(" ","",$this->name)).$this->id.'.png';


    }

    public function  updateKey($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->where("id", $this->id);
            $this->db->update("teacher_test_exam", $data);
        }
        return true;
    }


    public function  saveTeachertestexam($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->insert("teacher_test_exam", $data);
            return $this->db->insert_id();
        }
        return 0;
    }

    public function getTeachertestexamList($user=null,$limit=20,$start=0){
        $teacher_test_exam = $this->db->select('*')->where("status",1)->limit($limit,$start)->order_by("sort","asc")->get("teacher_test_exam")->result();

        $result = array();
        foreach($teacher_test_exam as $lesson){
            $result[] = $this->getTeachertestexamObject($lesson)->getTeachertestexamInfo($user);
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function getTeachertestexamCount(){
        $lesson = $this->db->select("count(*) as num")->get("teacher_test_exam")->row();
        return $lesson->num;
    }

    public function getTeachertestexams($unit_id=0){
        $teacher_test_exam = $this->db->select('id')->where("unit_id",(int)$unit_id)->order_by("sort","asc")->get("teacher_test_exam")->result();
        $result = $this->initTeachertestexams($teacher_test_exam);
        return $result;
    }

    public function uploadpicture()
    {

        $file = $this->storage->setMinxer($this)->uploadFile();
        if ($file->errorCode == 0) {
            $data['filename'] = $file->data['file_name'];
            $this->updateKey($data);
            $this->returncode['data'] = $this->getFileUrl();
        } else {
            $this->returncode['errcode'] = 1000003;
            $this->returncode['errdesc'] = "头像上传失败";
            $this->returncode['data'] = $file;
        }
        return $this;
    }

    public function deleteTeachertestexams($unit_id){
        $teacher_test_exam = $this->db->select('id')->where("unit_id",(int)$unit_id)->get("teacher_test_exam")->result();;
        $result = array();
        foreach($teacher_test_exam as $lesson){
            $lessonItem = $this->getTeachertestexam($lesson->id);
            $lessonItem->delete($lesson->id);
        }

        $this->returncode['data'] = $result;
        return $this;
    }

    public function delete($lesson_id=0){
        $lesson = $this->getTeachertestexam($lesson_id);
        if($lesson->id != 0){
            $this->lessonpart->deleteTeachertestexamparts($lesson->id);
            $this->db->where("id",$lesson->id);
            $this->db->delete("teacher_test_exam");
            //删除lesson下附件和关系
            $lesson->deleteFiles();
        }
        return $this;
    }

    public function getTeacherExamHistoryList($user){
        $teacher_test_exam = $this->db->select('teacher_test_exam.*,teacher_test_paper_group_result.totalScores,teacher_test_paper_group_result.createdTime as end_test_time')
            ->join('teacher_test_exam','teacher_test_exam.id = teacher_test_paper_group_result.teacher_exam_id', 'left')
            ->where("teacher_test_paper_group_result.user_id",$user->id)
            ->get("teacher_test_paper_group_result")->result();
        $result = array();
        foreach($teacher_test_exam as $lesson){
            $item = $this->getTeachertestexamObject($lesson)->getTeachertestexamInfo($user);
            $item['end_test_time'] = $lesson->end_test_time;
            $item['totalScores'] = $lesson->totalScores;
            unset( $item['zip_url']);
            unset( $item['update_time']);
            $result[] =$item;
        }
        $this->returncode['data'] = $result;
        return $this;
    }


}  
