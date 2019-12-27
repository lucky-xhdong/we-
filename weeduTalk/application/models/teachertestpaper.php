<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachertestpaper extends CI_Model{


    public $objectType = 'teachertestpaper';
    public $type = 'teachertestpaper';

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
            "status"            => array("require" => false),

        );
        parent::_initialize($config);
    }

    public function getTeachertestpaper($id){
        $unit = new self;
        $data = $this->config['attributes'];
        $row = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("teacher_test_paper")->row_array();
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

    public function initTeachertestpapers($entitys = array()){
        $teacher_test_paper = array();
        foreach($entitys as $entity){
            $lesson = new self;
            foreach($entity as $key=>$val){
                if(empty($val)) $val = "";
                $lesson->$key = $val;
            }
            $teacher_test_paper[] = $lesson;
        }
        return $teacher_test_paper;
    }

    public function getTeachertestpaperObject($lessonitem){
        $lesson = new self;
        if(isset($lessonitem->id)){
            $lesson->id           = $lessonitem->id;
            $lesson->name          = $lessonitem->name;
            $lesson->description  = $lessonitem->description;
            $lesson->status       = $lessonitem->status;
            $lesson->type        = $lessonitem->type;
            $lesson->filename       = $lessonitem->filename;
            $lesson->unit_id       = $lessonitem->unit_id;
            $lesson->update_time       = $lessonitem->update_time;

        }
        return $lesson;
    }

    public function getTeachertestpaperInfo($user=null){
        $data = array(
            'id'              =>(int)$this->id,
            'name'            =>$this->name,
            'description'     =>$this->description,
            'scores'          => 0,
            'type'            =>$this->type,
            'picture_url'     => $this->getFileUrl(),
            "update_time"     =>$this->update_time,
            'zip_url'         => $this->getZipUrl(),
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

    public function calculateTeachertestpaper($user=null){
        if($user){
            $auhtUnit= $this->courseauth->getUserTeachertestpaperRowChain($user,$this->id);
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
            $filePath = FILEPATH.'assets/teacher_test_paper/lesson'.$this->id.'.zip';
            if(is_file($filePath)) return  base_url().'media/assets/teacher_test_paper/lesson'.$this->id.'.zip';
            else return "";
        }

    }




    public function getFileUrl(){
        if(!empty($this->filename)){
            $picture = $this->storage->setMinxer($this)->getFileName($this->filename,"origin");
            return $picture;
        }

        $filename = 'assets/teacher_test_paper/'.strtolower(str_replace(" ","",$this->name)).$this->id.'.png';
        $picture =  FILEPATH.$filename;


        if(is_file($picture)){
            return  base_url().'media/'.$filename;
        }else{
            return  base_url().'media/assets/teacher_test_paper/defaultlesson.png';
        }


        //$picture =  UPLOADFILEPATH.'teacher_test_paper/'.strtolower(str_replace(" ","",$this->name)).$this->id.'.png';


    }

    public function  updateKey($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->where("id", $this->id);
            $this->db->update("teacher_test_paper", $data);
        }
        return true;
    }


    public function  saveTeachertestpaper($data = array())
    {
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->insert("teacher_test_paper", $data);
            return $this->db->insert_id();
        }
        return 0;
    }

    public function getTeachertestpaperList($user=null){
        $teacher_test_paper = $this->db->select('*')->order_by("sort","asc")->get("teacher_test_paper")->result();

        $result = array();
        foreach($teacher_test_paper as $lesson){
            $result[] = $this->getTeachertestpaperObject($lesson)->getTeachertestpaperInfo($user);
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function getPtTeachertestpapers($user=null){
        if($user && $user->id == 0) $user=null;
        $units = $this->db->where("course_id",3)->where("status",1)->get("units")->result();
        $teacher_test_paper = $this->db->select('id')->where("status",1)->where_in("unit_id",$this->toIdArray($units))->where("type","test")->get("teacher_test_paper")->result();
        $result = array();
        foreach($teacher_test_paper as $lesson){
            $result[] = $this->getTeachertestpaper($lesson->id)->getTeachertestpaperInfo($user);
        }
        $this->returncode['data'] = $result;
        return $this;
    }

    public function getTeachertestpaperCount(){
        $lesson = $this->db->select("count(*) as num")->get("teacher_test_paper")->row();
        return $lesson->num;
    }

    public function getTeachertestpapers($unit_id=0){
        $teacher_test_paper = $this->db->select('id')->where("unit_id",(int)$unit_id)->order_by("sort","asc")->get("teacher_test_paper")->result();
        $result = $this->initTeachertestpapers($teacher_test_paper);
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

    public function deleteTeachertestpapers($unit_id){
        $teacher_test_paper = $this->db->select('id')->where("unit_id",(int)$unit_id)->get("teacher_test_paper")->result();;
        $result = array();
        foreach($teacher_test_paper as $lesson){
            $lessonItem = $this->getTeachertestpaper($lesson->id);
            $lessonItem->delete($lesson->id);
        }

        $this->returncode['data'] = $result;
        return $this;
    }

    public function delete($lesson_id=0){
        $lesson = $this->getTeachertestpaper($lesson_id);
        if($lesson->id != 0){
            $this->lessonpart->deleteTeachertestpaperparts($lesson->id);
            $this->db->where("id",$lesson->id);
            $this->db->delete("teacher_test_paper");
            //删除lesson下附件和关系
            $lesson->deleteFiles();
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
}  
