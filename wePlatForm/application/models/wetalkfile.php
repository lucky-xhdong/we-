<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wetalkfile extends CI_Model{


    public $_minxer = null;

    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'                  => array("require" => false),
            "filename"            => array("require" => false),
            "meta"                => array("require" => false),
            'object_id'           => array("require" => true),
            "object_type"         => array("require" => false),
            "created_time"        => array("require" => false),
            "type"                => array("require" => false),
            "body"                => array("require" => false),
            "media_name"          => array("require" => false),
            "user_id"             => array("require" => false),
            "duration"            => array("require" => false),
            "filetype"            => array("require" => false),
            "orig_name"            => array("require" => false),
            "tag"            => array("require" => false),



        );
        parent::_initialize($config);
    }


    /*
     * 上传文件后,保存数据
     *
     *
     */
    public function addFile($user,$data=array()){
        if($data && count($data)){
            if(!isset($data['body'])) $data['body'] = "";
            $data['body'] = $this->userTextEncode($data['body']);
            $data['created_time'] = date('Y-m-d H:i:s');
            $data['user_id'] = $user->id;
            $this->db->insert('files',$data);
            $this->returncode['data'] = $this->getFile($this->db->insert_id())->getFileInfo();
        }
        return $this;
    }

    /*
     * 更新文件后,保存数据
     *
     *
     */

    public function editFile($id,$data=array()){
        if(!isset($data['body'])) $data['body'] = "";
        $data['body'] = $this->userTextEncode($data['body']);
        $file = $this->db->select('id')->where("id",$id)->get('files')->row();
        if($file){
            if(isset($data['filename']) && !empty($data['filename'])){
                $fileItem = $this->getFile($id);
                $minxer             = new stdClass();
                $minxer->id         = $fileItem->object_id;
                $minxer->objectType = $fileItem->object_type;
                $this->storage->setMinxer($minxer)->removeFile($fileItem->filename);
            }
            $this->db->where('id',$file->id);
            $this->db->update('files',$data);
            $this->returncode['data'] = $this->getFile($id)->getFileInfo();
        }
        return $this;
    }


    public function updateFile($id,$data=array()){
        $file = $this->db->select('id')->where("id",$id)->get('files')->row();
        if($file){
            $this->db->where('id',$file->id);
            $this->db->update('files',$data);
            $this->returncode['data'] = $this->getFile($id)->getFileInfo();
        }
        return $this;
    }


    public function userTextEncode($str){
        if(!is_string($str))return $str;
        if(!$str || $str=='undefined')return '';

        $text = json_encode($str); //暴露出unicode
        $text = preg_replace_callback("/(\\\u[ed][0-9a-f]{3})/i",function($str){
            return addslashes($str[0]);
        },$text); //将emoji的unicode留下，其他不动，这里的正则比原答案增加了d，因为我发现我很多emoji实际上是\ud开头的，反而暂时没发现有\ue开头。
        return json_decode($text);
    }


    public function getFile($id){
        $unit = new self;
        $data = $this->config['attributes'];
        $row = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("files")->row_array();
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


    /*
     *
     * 获取单个文件详情
     *
     */

    public function getFileInfo(){
        $minxer             = new stdClass();
        $minxer->id         = $this->user_id;
        $minxer->objectType = $this->object_type;
        $data = array(
            'id'                  => $this->id,
            "fileurl"             => $this->storage->setMinxer($minxer)->getFileName($this->filename,'large'),
            "originurl"             => $this->storage->setMinxer($minxer)->getFileName($this->filename,'origin'),
            "meta"                => $this->meta,
            'object_id'           => $this->object_id,
            "object_type"         => $this->object_type,
            "created_time"        => $this->created_time,
            "type"                => $this->type,
            'duration'            => $this->duration,
            'tag'                  => $this->tag,
            "body"                => $this->userTextDecode($this->body),
            "mediafileurl"        => $this->storage->setMinxer($minxer)->getMeidiaFileName($this->media_name,'origin')
        );
        return $data;
    }

    public function userTextDecode($str){
        $text = json_encode($str); //暴露出unicode
        $text = preg_replace_callback('/\\\\\\\\/i',function($str){
            return '\\';
        },$text); //将两条斜杠变成一条，其他不动
        return json_decode($text);
    }

    public function setMinxer($minxer){
        $this->_minxer = $minxer;
        return $this;
    }

    public function getFileList(){
        $entity = array();
        if($this->_minxer){
            $files  = $this->db
                ->select('id')
                ->where('object_type',$this->_minxer->object_type)
                ->where("object_id",$this->_minxer->id);
            $files =	$files->get("files")->result();

            foreach($files as $file){
                $entity[] = $this->getFile($file->id)->getFileInfo();

            }
        }
        $this->returncode['data'] = $entity;
        return $this;
    }


    public function getLessonFileList($limit=20,$start=0){
        $entity = array();
        $key = $this->input->get("key")?$this->input->get("key"):"";
        if($this->_minxer){
            $files  = $this->db
                ->select('id')
                ->where('object_type',$this->_minxer->object_type)
                ->where("object_id",$this->_minxer->id);
              if(!empty($key)){
                  $files = $files->like("orig_name",$key);
              }
            $files =	$files->order_by("id","desc")->limit($limit,$start)->get("files")->result();

            foreach($files as $file){
                $entity[] = $this->getFile($file->id)->getLessonFileInfo();

            }
        }
        $this->returncode['data'] = $entity;
        return $this;
    }

    public function removeFile($id =0){
        $file = $this->getFile($id);
        $minxer             = new stdClass();
        $minxer->id         = $file->object_id;
        $minxer->objectType = $file->object_type;
        $this->storage->setMinxer($minxer)->removeFile($file->filename);
        $this->db->where("id",$file->id);
        $this->db->delete("files");
        return true;
    }

    public function getLessonFileInfo(){
        $minxer             = new stdClass();
        $minxer->id         = $this->object_id;
        $minxer->objectType = $this->object_type;
        if($this->type == "image"){
            $file_url = $this->storage->setMinxer($minxer)->getFileName($this->filename,'origin');
        }else if($this->type == "audio"){
            $file_url =  base_url() . 'media/images/audio.jpg';
        }else{
            $file_url =  base_url() . 'media/images/video_lesson.jpg';
        }
        $data = array(
            'id'                  => $this->id,
            "originurl"           => $this->storage->setMinxer($minxer)->getFileName($this->filename,'origin'),
            "file_url"            =>$file_url,
            "filename"            => $this->filename,
            "meta"                => $this->meta,
            'object_id'           => $this->object_id,
            "object_type"         => $this->object_type,
            "created_time"        => $this->created_time,
            "type"                => $this->type,
            'duration'            => $this->duration,
            "body"                => $this->userTextDecode($this->body),
            "filetype"            =>  $this->filetype,
            "orig_name"           =>  $this->orig_name,
            'tag'                  => $this->tag,
            "mediafileurl"        => $this->storage->setMinxer($minxer)->getMeidiaFileName($this->media_name,'origin'),
            'userInfo'             => $this->user->getUser($this->user_id)->getUserInfoNotToken()
        );
        return $data;
    }

    public function getFilesCount(){
        $key = $this->input->get("key")?$this->input->get("key"):"";
        $files = $this->db->select("count(*) as num")
            ->where('object_type',$this->_minxer->object_type)
            ->where("object_id",$this->_minxer->id);
            if(!empty($key)){
                $files = $files->like("orig_name",$key);
            }
        $files = $files->get("files")->row();
        return $files->num;
    }

}  
