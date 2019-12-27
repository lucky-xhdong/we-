<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Regioneducationplan extends CI_Model{



    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'                => array("require" => false),
            'region_id'         => array("require" => true),
            "user_id"           => array("require" => false),
            "created_time" 		=> array("require" => false),
            "file_name"         => array("require" => false),
            "start_date"        => array("require" => false),
            "end_date"          => array("require" => false),
            "name"    => array("require" => false),
            "body"     => array("require" => false),
            "description"  => array("require" => false),
            "school_id"    => array("require" => false),
            "plan_type"    => array("require" => false),
            "plan_range"    => array("require" => false),
            "plan_detail_id"    => array("require" => false),
        );
        parent::_initialize($config);
    }



    public function getRegionEducationPlan($id){
        $region = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("region_education_plan")->row_array();
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


    public function getUserInfo(){
        return $this->user->getUser($this->user_id);
    }


    public function getFileUrl (){
        $minxer             = new stdClass();
        $minxer->id         = $this->id;
        $minxer->objectType = "region_education_plan";
        if(!empty($this->file_name)){
            return $this->storage->setMinxer($minxer)->getMeidiaFileName($this->file_name,'origin');
        }

        return "";
    }


    /*
     *
     * 区域教学计划
     *
     * */
    public function getRegionEducationPlanList($limit=20,$start=0,$plan_detail_id){
        $items = $this->db->select("*");
        $entity = $this->input->get();
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $items = $items->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $items = $items->where("created_time <=",$entity['end_date']);
        }

        $items = $items->where("plan_detail_id",$plan_detail_id)
            ->limit($limit,$start)
            ->order_by("id","desc")
            ->get("region_education_plan")
            ->result();
        foreach($items as $item){
            $minxer             = new stdClass();
            $minxer->id         = $item->id;
            $minxer->objectType = "region_education_plan";
            $item->userInfo         = $this->user->getUser($item->user_id)->getUserInfoNotToken();
            if(!empty($item->file_name)){
                $item->fileUrl = $this->storage->setMinxer($minxer)->getMeidiaFileName($item->file_name,'origin');
            }else{
                $item->fileUrl = "";
            }
            $item->filetype = $this->getFileInfo($item->file_name);
        }
        return $items;
    }

    public function getFileInfo($filename) {
        $fileUrl = "";
        $fileType = "";
        $fileExt = strrchr($filename,'.');
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

        return $fileType;
    }



    public function getEducationPlan($service_plan_id=0){
        $item = $this->db->select("*")->where("id",$service_plan_id)->get("region_education_plan")->row();
        if($item){
            $minxer             = new stdClass();
            $minxer->id         = $item->region_id;
            $minxer->objectType = "region_education_plan";
            //  $item->region = $this->getRegion($item->region_id);
            $item->schoolInfo = $this->school->getSchool($item->school_id);
            $item->userInfo         = $this->user->getUser($item->user_id)->getUserInfoNotToken();
            $item->verify =  $this->userpermission->hasPermission(getAdminViewer(),"/serviceaudit/");
            if(!empty($item->file_name)){
                $item->fileUrl = $this->storage->setMinxer($minxer)->getMeidiaFileName($item->file_name,'origin');
            }else{
                $item->fileUrl = "";
            }
            $item->filetype = $this->getFileInfo($item->file_name);
        }
        return $item;
    }



    public function getRegionEducationPlanCount($plan_detail_id){
        $item = $this->db->select("*");
        $entity = $this->input->get();
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $item = $item->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $item = $item->where("created_time <=",$entity['end_date']);
        }
        $item = $item->where("plan_detail_id",$plan_detail_id);
        return $item->get('region_education_plan')->num_rows();
    }

    public function getRegionId($plan_detail_id=0){
        return $this->db->where('id',$plan_detail_id)->get("region_education_plan_detail")->row();
    }
    public function addRegionEducationPlan($data=array()){
        $entity = $this->config['attributes'];
        foreach($data as $key => $val){
            if(!in_array($key,array_keys($entity))){
                unset($data[$key]);
            }
        }
        $data['region_id'] = $this->getRegionId($data['plan_detail_id'])->region_id;
        if(isset($data['id']) && !empty($data['id'])){
            $this->db->where("id",$data['id']);
            $this->db->update('region_education_plan',$data);
        }else{
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $this->db->insert('region_education_plan',$data);
            $data['id'] = $this->db->insert_id();
        }
        $regionBusiness = $this->db->where('id',$data['id'])->get("region_education_plan")->row();
        return $regionBusiness;
    }


    public function uploadRegionEducationPlanFile($regionServicePlan){
        $regionServicePlan->objectType = "region_education_plan";
        $file = $this->storage->setMinxer($regionServicePlan)->uploadDocMediaFile();
        if ($file->errorCode == 0) {
            $data['file_name'] = $file->data['file_name'];
            $this->db->where("id",$regionServicePlan->id);
            $this->db->update('region_education_plan',$data);
        } else {
            $this->returncode['errcode'] = 1000003;
            $this->returncode['errdesc'] = "附件上传失败";
            $this->returncode['data'] = $file;
        }
        return $this;
    }


}  
