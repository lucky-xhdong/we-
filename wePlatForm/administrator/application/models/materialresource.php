<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Materialresource extends CI_Model{

    public $objectType = 'materialresource';
    public $type = 'materialresource';

    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            "id"                => array("require" => false),
            "name"              => array("require" => true),
            "created_time"      => array("require" => false),
            "user_id"           => array("require" => false),
            "resource_type_id"  => array("require" => false),
            "region_id"         => array("require" => false),
            "school_id"         => array("require" => false),
            "description"       => array("require" => false),
            "filename"          => array("require" => false)
        );
        parent::_initialize($config);
    }


    /*
     * 获取所有类型列表
     * @param
     * @return array
     */
    public function getResourceTypeList(){
        return $this->db->get('material_resource_type')->result();
    }

    /*
     *
     * 获取区域列表数据
     */

    public function getRegionList(){
        return $this->db->select('id, name')->get("region")->result();
    }

    /*
     *
     * 获取学校列表数据
     */

    public function getSchoolList($region_id=0){
        if ($region_id) {
            return $this->db->select('id, name')->where('region_id', $region_id)->get("school")->result();
        }
        return $this->db->select('id, name')->get("school")->result();
    }

    public function getResource($id){
        $resource = new self;
        $data = $this->config['attributes'];
        $row = $this->db->select(implode(',', array_keys($data)))->where("id", $id)->get("material_resource")->row_array();
        if ($row) {
            foreach ($row as $key => $val) {
                if (empty($val)) $val = "";
                $resource->$key = $val;
            }
        } else {
            $resource->id = 0;
        }
        return $resource;
    }

    public function saveResource($data = array()){
        if (count($data)) {
            $data['created_time'] = date('Y-m-d H:i:s');
            $data['user_id'] = getAdminViewer()->id;
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->insert("material_resource", $data);
            return $this->db->insert_id();
        }
        return 0;
    }

    public function updateKey($data = array()){
        if (count($data)) {
            foreach ($data as $key => $val) {
                $this->$key = $val;
            }
            $this->db->where("id", $this->id);
            $this->db->update("material_resource", $data);
        }
        return true;
    }

    public function uploadpicture(){

        $file = $this->storage->setMinxer($this)->uploadMediaFile();
        if ($file->errorCode == 0) {
            $extestion = str_replace(".","",$file->data['file_ext']);
            $data['filename'] = $file->data['file_name'];
            $this->updateKey($data);
            $this->returncode['data'] = $this->getFileUrl();
        } else {
            $this->returncode['errcode'] = 1000003;
            $this->returncode['errdesc'] = "上传失败";
            $this->returncode['data'] = $file;
        }
        return $this;
    }

    public function getFileUrl(){
        if(!empty($this->filename)){
            $picture = $this->storage->setMinxer($this)->getMeidiaFileName($this->filename);
            return $picture;
        }else{
            return "";
        }
        return base_url().'media/assets/materialresource/'.$this->filename;
    }

    public function getRegionInfo(){

        $data = array(
//            'id'                => $this->id,
//            'name'              => $this->name,
//            "username"          => $this->getUserInfo()->name,
//            "province" 		    => $this->functions->getProvice($this->province_id),
//            "city" 		        => $this->functions->getCity($this->city_id),
//            "district" 		    => $this->functions->getDistrict($this->district_id),
//            "created_time"      => $this->created_time,
//            "start_date"        => $this->start_date,
//            "end_date"          => $this->end_date,
//            "status"            => $this->status,
//            'description'        => $this->description,
//            "url"               => $this->url,
        );
        return $data;
    }

    /*
     *
     * 获取区域列表数据
     */

    public function getResourceInfoList($limit=20,$start=0,$post=array()){
        $data = array();
        $items = $this->db->select("id");
        if(isset($post['resource_type_id']) && $post['resource_type_id']){
            $items = $items->where("resource_type_id",$post['resource_type_id']);
        }
        if(isset($post['region_id']) && $post['region_id']){
            $items = $items->where("region_id",$post['region_id']);
        }
        if(isset($post['school_id']) && $post['school_id']){
            $items = $items->where("school_id",$post['school_id']);
        }
        if(isset($post['startdate']) && $post['startdate']){
            $items = $items->where("created_time >=", $post['startdate']);
        }
        if(isset($post['enddate']) && $post['enddate']){
            $end = $post['enddate'];
            $enddate = date('Y-m-d',strtotime("$end +1 day"));
            $items = $items->where("created_time <=", $enddate);
        }

        $items = $items->limit($limit,$start)->order_by("id","asc")->get("material_resource")->result();
        foreach($items as $item){
            $data[] = $this->getResource($item->id)->getResourceInfoView();
        }
        return $data;
    }

    public function getResourceDataCount($post){
        $items = $this->db;
        if(isset($post['resource_type_id']) && $post['resource_type_id']){
            $items = $items->where("resource_type_id",$post['resource_type_id']);
        }
        if(isset($post['region_id']) && $post['region_id']){
            $items = $items->where("region_id",$post['region_id']);
        }
        if(isset($post['school_id']) && $post['school_id']){
            $items = $items->where("school_id",$post['school_id']);
        }
        if(isset($post['startdate']) && $post['startdate']){
            $items = $items->where("created_time >=", $post['startdate']);
        }
        if(isset($post['enddate']) && $post['enddate']){
            $end = $post['enddate'];
            $enddate = date('Y-m-d',strtotime("$end +1 day"));
            $items = $items->where("created_time <=", $enddate);
        }
        return $items->get('material_resource')->num_rows();
    }

    public function getResourceInfoView(){
        if(!empty($this->course_ids)){
            $this->course_count = count(explode(',',$this->course_ids));
        }else{
            $this->course_count = 0;
        }
        $data = array(
            'id'                => $this->id,
            'name'              => $this->name,
            "resource_type_name"=> $this->getTypeName($this->resource_type_id),
            "region_name"       => $this->getRegionName($this->region_id),
            "school_name"       => $this->getSchoolName($this->school_id),
            "created_time"      => $this->created_time,
            "user_name"         => $this->getUserName(),
            "description"       => $this->description,
            "resourceInfo"       => $this->getFileInfo($this->id)
        );
        return $data;
    }

    public function getTypeName($resource_id=0) {
        if ($resource_id > 0) {
            $row = $this->db->select('name')->where('id', $resource_id)->get("material_resource_type")->row();
            if ($row && $row->name) {
                return $row->name;
            }
        }
        return "";
    }

    public function getSchoolName($school_id=0) {
        if ($school_id > 0) {
            $row = $this->db->select('name')->where('id', $school_id)->get("school")->row();
            if ($row && $row->name) {
                return $row->name;
            }
        }
        return "";
    }

    public function getRegionName($region_id=0) {
        if ($region_id > 0) {
            $row = $this->db->select('name')->where('id', $region_id)->get("region")->row();
            if ($row && $row->name) {
                return $row->name;
            }
        }
        return "";
    }

    public function getUserName(){
        $user = $this->user->getUser($this->user_id);
        if ($user && isset($user->name)) {
            return $user->name;
        }
        return "";
    }

    public function delete(){
        if(!isset($this->id)){
            return false;
        }else{
            $this->db->where("id",$this->id);
            $this->db->delete("material_resource");
        }
        return true;
    }

    public function getFileInfo($resource_id) {
        $resouce = $this->getResource($resource_id);
        $fileUrl = "";
        $fileType = "";
        if ($resouce->id > 0) {
            $fileUrl = $resouce->getFileUrl();
            $fileExt = strrchr($resouce->filename,'.');
            if (!empty($fileExt)) {
                if (strcasecmp($fileExt, '.jpg')==0 || strcasecmp($fileExt, '.jpeg')==0 || strcasecmp($fileExt, '.png')==0) {
                    $fileType = "image";
                } else if (strcasecmp($fileExt, '.mp3')==0 || strcasecmp($fileExt, '.wav')==0 || strcasecmp($fileExt, '.caf')==0) {
                    $fileType = "audio";
                } else if (strcasecmp($fileExt, '.mp4')==0) {
                    $fileType = "video";
                }else if (strcasecmp($fileExt, '.doc')==0 || strcasecmp($fileExt, '.docx')==0) {
                    $fileType = "word";
                }else if (strcasecmp($fileExt, '.ppt')==0 || strcasecmp($fileExt, '.pptx')==0) {
                    $fileType = "ppt";
                }else if (strcasecmp($fileExt, '.zip')==0) {
                    $fileType = "zip";
                }else if (strcasecmp($fileExt, '.xls')==0 || strcasecmp($fileExt, '.xlsx')==0) {
                    $fileType = "excel";
                }else{
                    $fileType = "file";
                }
            }else{
                $fileType = "file";
            }
        }
        $data = array(
            "url" => $fileUrl,
            "type" => $fileType
        );
        return $data;
    }


    public function getResourceInfoListByIds($resources_ids=""){
        $data = array();
        $items = $this->db->select("id");

        if(isset($resources_ids) && !empty($resources_ids)){
            $items = $items->where_in("id",explode(",",$resources_ids));
        }else{
            return $data;
        }
        $items = $items->order_by("id","asc")->get("material_resource")->result();
        foreach($items as $item){
            $data[] = $this->getResource($item->id)->getResourceInfoView();
        }
        return $data;
    }
}  
