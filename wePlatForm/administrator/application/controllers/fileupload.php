<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fileupload extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('wetalkfile');

    }


    public function addFile($lesson_id = 0,$file_id = 0){
        $user = getAdminViewer();
        if($user) {
            $lesson = new stdClass();
            $lesson->id = $lesson_id;
            $lesson->objectType = "lesson";
            $file = $this->storage->setMinxer($lesson)->uploadMediaFile();
            if($file->errorCode == 0){
                $filename              = $file->data['file_name'];
                $data['media_name']    =  $file->data['file_name'];
                $data['filename']      =  $file->data['file_name'];
                $data['object_id']      =   $lesson->id;
                $data['object_type']    =   $lesson->objectType;
                $extestion = str_replace(".","",$file->data['file_ext']);
                $data['duration']      =  isset($post['duration'])?$post['duration']:0;
                $data['body']          =  isset($post['body'])?$post['body']:" ";
                $data['filetype']      =  $file->data['is_image']?"image":$extestion;
                $data['orig_name']     =  $file->data['orig_name'];

                if($extestion == "mp4"){
                    $data['type'] = "video";
                }else if($extestion == "mp3"){
                    $data['type'] = "audio";
                }

                if(count($data)){
                    //TODO
                    if($file_id == 0){
                        $this->wetalkfile->addFile($user,$data);
                    }else{
                        $this->wetalkfile->editFile($file_id,$data);
                    }
                }
                $this->returncode['data'] = $this->storage->setMinxer($lesson)->getFileName($filename,'origin');
            }else{
                $this->returncode['errcode'] = 1000003;
                $this->returncode['errdesc'] = "文件上传失败";
                $this->returncode['data']    = $file;
            }
        }
        echo  json_encode($this->returncode);
    }



    public function addTypeFile($region_id = 0,$file_id = 0,$type="region_document"){
        $user = getAdminViewer();
        if($user) {
            $region = new stdClass();
            $region->id = $region_id;
            $region->objectType = $type;
            $file = $this->storage->setMinxer($region)->uploadDocMediaFile();
            if($file->errorCode == 0){
                $filename              = $file->data['file_name'];
                $data['media_name']    =  $file->data['file_name'];
                $data['filename']      =  $file->data['file_name'];
                $data['object_id']      =   $region->id;
                $data['object_type']    =   $region->objectType;
                $extestion = str_replace(".","",$file->data['file_ext']);
                $data['duration']      =  isset($post['duration'])?$post['duration']:0;
                $data['body']          =  isset($post['body'])?$post['body']:" ";
                $data['filetype']      =  $file->data['is_image']?"image":$extestion;
                $data['orig_name']     =  $file->data['orig_name'];

                if($extestion == "mp4"){
                    $data['type'] = "video";
                }else if($extestion == "mp3"){
                    $data['type'] = "audio";
                }

                if(count($data)){
                    //TODO
                    if($file_id == 0){
                        $this->wetalkfile->addFile($user,$data);
                    }else{
                        $this->wetalkfile->editFile($file_id,$data);
                    }
                }
                $this->returncode['data'] = $this->storage->setMinxer($region)->getFileName($filename,'origin');
            }else{
                $this->returncode['errcode'] = 1000003;
                $this->returncode['errdesc'] = "文件上传失败";
                $this->returncode['data']    = $file;
            }
        }
        echo  json_encode($this->returncode);
    }


    public function addTeachingscheduleTypeFile($teachingschedule = 0,$file_id = 0,$type="teachingschedule"){
        $user = getAdminViewer();
        if($user) {
            $region = new stdClass();
            $region->id = $teachingschedule;
            $region->objectType = $type;
            $file = $this->storage->setMinxer($region)->uploadDocMediaFile();
            if($file->errorCode == 0){
                $filename              = $file->data['file_name'];
                $data['media_name']    =  $file->data['file_name'];
                $data['filename']      =  $file->data['file_name'];
                $data['object_id']      =   $region->id;
                $data['object_type']    =   $region->objectType;
                $extestion = str_replace(".","",$file->data['file_ext']);
                $data['duration']      =  isset($post['duration'])?$post['duration']:0;
                $data['body']          =  isset($post['body'])?$post['body']:" ";
                $data['filetype']      =  $file->data['is_image']?"image":$extestion;
                $data['orig_name']     =  $file->data['orig_name'];

                if($extestion == "mp4"){
                    $data['type'] = "video";
                }else if($extestion == "mp3"){
                    $data['type'] = "audio";
                }else {
                    $data['type'] = "file";
                }
                if(count($data)){
                    //TODO
                    if($file_id == 0){
                       $wetalkfile =  $this->wetalkfile->addFile($user,$data)->returncode['data'];
                    }else{
                        $wetalkfile = $this->wetalkfile->editFile($file_id,$data)->returncode['data'];
                    }
                    if(isset($wetalkfile['id'])){
                        $this->db->where("id",$teachingschedule);
                        $this->db->update("teaching_schedule_task",array("file_id"=>$wetalkfile["id"]));
                    }
                }
                $this->returncode['data'] = $this->storage->setMinxer($region)->getFileName($filename,'origin');
            }else{
                $this->returncode['errcode'] = 1000003;
                $this->returncode['errdesc'] = "文件上传失败";
                $this->returncode['data']    = $file;
            }
        }
        echo  json_encode($this->returncode);
    }


    public function removeFile($id=0){
         $this->wetalkfile->removeFile($id);
        echo  json_encode($this->returncode);
    }

    public function updateFile($id = 0){
        $this->wetalkfile->updateFile($id,$this->input->post());
        echo  json_encode($this->returncode);
    }

}
