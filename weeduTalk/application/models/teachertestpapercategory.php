<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachertestpapercategory extends CI_Model{


    public $objectType = 'TeachertestpaperCategory';
    public $type = 'TeachertestpaperCategory';

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
            "description"         => array("require" => false),
            "update_time"         => array("require" => false),
            "status"             => array("require" => false),
            "paper_id"           => array("require" => false),
            "file_id"            => array("require" => false),
            "second"            => array("require" => false),
            "scores"            => array("require" => false)


        );
        parent::_initialize($config);
    }

    public function getTeachertestpaperCategory($id){
        $unit = new self;
        $data = $this->config['attributes'];
        $row = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("teacher_test_paper_category")->row_array();
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

    public function initTeachertestpaperCategorys($entitys = array()){
        $teacher_test_paper_category = array();
        foreach($entitys as $entity){
            $lesson = new self;
            foreach($entity as $key=>$val){
                if(empty($val)) $val = "";
                $lesson->$key = $val;
            }
            $teacher_test_paper_category[] = $lesson;
        }
        return $teacher_test_paper_category;
    }

    public function getTeachertestpaperCategoryObject($lessonitem){
        $lesson = new self;
        if(isset($lessonitem->id)){
            $lesson->id           = $lessonitem->id;
            $lesson->name          = $lessonitem->name;
            $lesson->description  = $lessonitem->description;
            $lesson->status       = $lessonitem->status;
            $lesson->filename       = $lessonitem->filename;
            $lesson->update_time       = $lessonitem->update_time;
            $lesson->pager_id       = $lessonitem->pager_id;
            $lesson->file_id       = $lessonitem->file_id;

        }
        return $lesson;
    }

    public function getTeachertestpaperCategoryInfo($user=null){
        $data = array(
            'id'              =>(int)$this->id,
            'name'            =>$this->name,
            'description'     =>$this->description,
            'scores'          => 0,
            'type'            =>$this->type,
            'picture_url'     => $this->getFileUrl(),
            "update_time"     =>$this->update_time,
            'zip_url'         => $this->getZipUrl(),
            "media_files"     => $this->getMediaFileList(),
            "object_key"       =>"assets/lesson".$this->id.'.zip',

        );
        if(empty($this->update_time)){
            $data['update_time'] = date("Y-m-d H:i:s");
            $this->updateKey(array("update_time"=> $data['update_time'],"createdTime"=> $data['update_time']));
        }
        $get = $this->input->get();
        if(isset($get['app_version']) && $get['app_version'] >= "1.0.3"){
            $data['zip_url'] = $this->oss->createSignUrlWeSpeak("assets/lesson".$this->id.'.zip');
        }
        return $data;
    }

    public function getMediaFileList(){
        $data = array();
        if(!empty($this->file_id)){

            $file_ids = explode(",",$this->file_id);
            foreach($file_ids as $file_id){
                $file = $this->wetalkfile->getFile($file_id);
                if($file->id != 0){
                    $data[] =  $file->getLessonFileInfo();
                }

            }
        }
        return $data;
    }

    public function calculateTeachertestpaperCategory($user=null){
        if($user){
            $auhtUnit= $this->courseauth->getUserTeachertestpaperCategoryRowChain($user,$this->id);
            if($auhtUnit){
                $this->recordmanager->initialize()->user_id = $user->id;
                $this->recordmanager->lesson_id =$this->id;
                $data['accuracy']        =   $this->recordmanager->getMyCorrection();

                $this->recordmanager->initialize()->user_id = $user->id;

                $this->recordmanager->lesson_id =$this->id;
                $data['completion_rate'] =   $this->recordmanager->getMyCompletion();
                if($data['accuracy'] >=1) $data['accuracy'] = 1;
                if($data['completion_rate'] >= 1)  $data['completion_rate'] = 1;

                $this->recordmanager->user_id = $user->id;
                $this->recordmanager->lesson_id =$this->id;
                $data["mt_score"] = $this->recordmanager->getUserMTScores((int)$this->id);

                $this->db->where("id",$auhtUnit->id)->update("user_relation_unit_lesson",array(
                    "accuracy"=>$data['accuracy'],
                    "completion_rate"=>$data['completion_rate'],
                    "mt_score"=>$data["mt_score"],
                    "calculate_date"=>date("Y-m-d H:i:s")
                ));

            }
        }
        return true;

    }

    public function getZipUrl(){
        $filePath =  UPLOADFILEPATH.'lesson'.$this->id.'.zip';
        if(is_file($filePath)){
            return base_url().'/assets/lesson'.$this->id.'.zip';
        }else{
            $filePath = FILEPATH.'assets/teacher_test_paper_category/lesson'.$this->id.'.zip';
            if(is_file($filePath)) return  base_url().'media/assets/teacher_test_paper_category/lesson'.$this->id.'.zip';
            else return "";
        }

    }




    public function getFileUrl(){
        if(!empty($this->filename)){
            $picture = $this->storage->setMinxer($this)->getFileName($this->filename,"origin");
            return $picture;
        }

        $filename = 'assets/teacher_test_paper_category/'.strtolower(str_replace(" ","",$this->name)).$this->id.'.png';
        $picture =  FILEPATH.$filename;


        if(is_file($picture)){
            return  base_url().'media/'.$filename;
        }else{
            return  base_url().'media/assets/teacher_test_paper_category/defaultlesson.png';
        }


        //$picture =  UPLOADFILEPATH.'teacher_test_paper_category/'.strtolower(str_replace(" ","",$this->name)).$this->id.'.png';


    }

    public function  updateKey($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->where("id", $this->id);
            $this->db->update("teacher_test_paper_category", $data);
        }
        return true;
    }


    public function  saveTeachertestpaperCategory($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->insert("teacher_test_paper_category", $data);
            return $this->db->insert_id();
        }
        return 0;
    }

    public function getTeachertestpaperCategoryList($paper_id=0,$user=null){
        $teacher_test_paper_category = $this->db->select('*')->where("paper_id",$paper_id)->order_by("sort","asc")->get("teacher_test_paper_category")->result();

        $result = array();
        foreach($teacher_test_paper_category as $lesson){
            $result[] = $this->getTeachertestpaperCategoryObject($lesson)->getTeachertestpaperCategoryInfo($user);
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function getPtTeachertestpaperCategorys($user=null){
        if($user && $user->id == 0) $user=null;
        $units = $this->db->where("course_id",3)->where("status",1)->get("units")->result();
        $teacher_test_paper_category = $this->db->select('id')->where("status",1)->where_in("unit_id",$this->toIdArray($units))->where("type","test")->get("teacher_test_paper_category")->result();
        $result = array();
        foreach($teacher_test_paper_category as $lesson){
            $result[] = $this->getTeachertestpaperCategory($lesson->id)->getTeachertestpaperCategoryInfo($user);
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function getTeachertestpaperCategoryCount($paper_id = 0){
        $lesson = $this->db->select("count(*) as num")->where("paper_id",$paper_id)->get("teacher_test_paper_category")->row();
        return $lesson->num;
    }

    public function getTeachertestpaperCategorys($unit_id=0){
        $teacher_test_paper_category = $this->db->select('id')->where("unit_id",(int)$unit_id)->order_by("sort","asc")->get("teacher_test_paper_category")->result();
        $result = $this->initTeachertestpaperCategorys($teacher_test_paper_category);
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

    public function deleteTeachertestpaperCategorys($unit_id){
        $teacher_test_paper_category = $this->db->select('id')->where("unit_id",(int)$unit_id)->get("teacher_test_paper_category")->result();;
        $result = array();
        foreach($teacher_test_paper_category as $lesson){
            $lessonItem = $this->getTeachertestpaperCategory($lesson->id);
            $lessonItem->delete($lesson->id);
        }

        $this->returncode['data'] = $result;
        return $this;
    }

    public function delete($lesson_id=0){
        $lesson = $this->getTeachertestpaperCategory($lesson_id);
        if($lesson->id != 0){
            $this->teacherpaperpart->deleteTeacherpaperparts($lesson->id);
            $this->db->where("id",$lesson->id);
            $this->db->delete("teacher_test_paper_category");
            //删除lesson下附件和关系
            //$lesson->deleteFiles();
        }
        return $this;
    }

    public function deleteFiles(){
        $source  = UPLOADFILEPATH.'lesson/n'.$this->id;
        if(is_dir($source)){
            $this->rmdirs($source);
        }
        //copy 资源库索引
        $this->db
            ->where('object_type',"lesson")
            ->where("object_id",$this->id);
        $this->db ->delete("files");
        return true;
    }

    /**
     * 删除文件夹
     * @param $path
     * @return bool
     */
    public function rmdirs($path)
    {
        $handle = opendir($path);
        while (($item = readdir($handle)) !== false) {
            if ($item == '.' || $item == '..') continue;
            $_path = $path . '/' . $item;
            if (is_file($_path)) unlink($_path);
            if (is_dir($_path)) rmdirs($_path);
        }
        closedir($handle);
        return rmdir($path);
    }



    public function createJson($paper_id)
    {
        $teacher_test_paper_category = $this->db->select('*')->where("paper_id",$paper_id)->order_by("sort","asc")->get("teacher_test_paper_category")->result();
        $result = array();
        foreach($teacher_test_paper_category as $caterogy){
            if(empty($caterogy->second) || $caterogy->second == 0) {
                $caterogy->second = 2500;
            }
            $data = array(
                'id'              =>(int)$caterogy->id,
                'name'            =>$caterogy->name,
                'description'     =>$caterogy->description,
                'second'          =>  $caterogy->second,
                "update_time"     =>$caterogy->update_time,

            );
            $filename = "";
            $filetype = "";
            if(!empty($caterogy->file_id)){
                $file = $this->wetalkfile->getFile($caterogy->file_id);
                if($file->id != 0){
                    $filename = 'media/'.$file->filename;
                    $filetype = $file->type;
                }
            }
            $data['media_filename'] = $filename;
            $data['media_type']     = $filetype;
            $examparts = $this->db->select('id')->where("paper_category_id",(int)$caterogy->id)
                ->order_by("sort","asc")->get("teacher_test_paper_part")->result();
            $parts = array();
            foreach($examparts as $exampart){
                    $part =  $this->teacherpaperpart->getTeacherpaperpart($exampart->id);
                    $json = $part->createJson($caterogy);
                    $parts[] = $json;
            }
            $data['parts'] = $parts;

            $result['category'][] = $data;
        }
        return $result;
    }


    public function getPaperQestionData($teacher_exam_id)
    {

        $return_array = array();
        $teacherExam = $this->db
            ->where("id",$teacher_exam_id)
            ->get("teacher_test_exam")->row();
        if($teacherExam){
            $teacher_test_paper_category = $this->db->select('*')->where("paper_id",$teacherExam->test_paper_id)->order_by("sort","asc")->get("teacher_test_paper_category")->result();
            $question_index = 1;
            foreach($teacher_test_paper_category as $caterogy) {
                $examparts = $this->db->select('id')->where("paper_category_id", (int)$caterogy->id)
                    ->order_by("sort", "asc")->get("teacher_test_paper_part")->result();
                foreach ($examparts as $exampart) {
                    $evnets = $this->db->select('teacher_test_part_events.*,teacher_test_first_tags.name as firstTagName,teacher_test_second_tags.name as secondTagName')
                        ->where("teacher_test_part_events.type !=", "system")
                        ->where("teacher_test_part_events.type !=", "result")
                        ->where("teacher_test_part_events.paper_part_id", $exampart->id)
                        ->join('teacher_test_first_tags','teacher_test_part_events.first_tag = teacher_test_first_tags.id', 'left')
                        ->join('teacher_test_second_tags','teacher_test_part_events.second_tag = teacher_test_second_tags.id', 'left')
                        ->order_by("teacher_test_part_events.sort", "asc")
                        ->get("teacher_test_part_events")->result();
                    $result = array();

                    foreach ($evnets as $key => $eventItem) {
                        $result['一级标签'] = $eventItem->firstTagName;
                        $result['二级标签'] = $eventItem->secondTagName;
                        $result['模块'] = $caterogy->name;
                        if($eventItem->degree == "easy"){
                            $result['难易度'] = "简单";
                        }else if($eventItem->degree == "middle"){
                            $result['难易度'] = "中等";
                        }else{
                            $result['难易度'] = "困难";
                        }
                        if ($eventItem->type == "MTmultipleChoices") {
                            $contents = $this->db->where("event_id",$eventItem->id)->get("teacher_test_part_event_content")->result();
                            foreach($contents as $key=> $content){
                                $result['题号'] = $question_index;
                                $result['分值'] = (int)$content->scores;
                                $result["平均分"] = $this->teacherexamrecordmanager->getContentAVGScore($teacher_exam_id,$content->id);
                                $question_index ++;
                            }
                        } else {
                            $content = $this->db->where("event_id", $eventItem->id)->get("teacher_test_part_event_content")->row();
                            if ($content) {
                                $result['题号'] = $question_index;
                                $result['分值'] = (int)$content->scores;
                                $result["平均分"] = $this->teacherexamrecordmanager->getContentAVGScore($teacher_exam_id,$content->id);
                                $question_index ++;
                            }
                        }
                        $return_array[] = $result;
                    }
                }
            }
        }
        return $return_array;
    }

}  
