<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Regionoperateplan extends CI_Model{



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
            "status"    => array("require" => false),
            "refusal"    => array("require" => false),
            "auditor"    => array("require" => false),
            "refuse_time"    => array("require" => false),
            "plan_detail_id"    => array("require" => false),

        );
        parent::_initialize($config);
    }


    public function getRegionOperatePlan($id){
        $region = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("region_operate_plan")->row_array();
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

    /*
    *
    * 区域运营计划
    *
    * */

    public function getRegionOperatePlanInfo($operate_plan_id=0){
        $item = $this->db->select("*");
        $item = $item->where("id",$operate_plan_id)
            ->get("region_operate_plan")
            ->row();
         if($item){
            $minxer             = new stdClass();
            $minxer->id         = $item->region_id;
            $minxer->objectType = "region_operate_plan";
            $item->userInfo         = $this->user->getUser($item->user_id)->getUserInfoNotToken();
            $item->verify =  $this->userpermission->hasPermission(getAdminViewer(),"/serviceaudit/");
            if(!empty($item->file_name)){
                $item->fileUrl = $this->storage->setMinxer($minxer)->getMeidiaFileName($item->file_name,'origin');
            }else{
                $item->fileUrl = "";
            }
        }
        return $item;
    }

    public function getUserInfo(){
        return $this->user->getUser($this->user_id);
    }


    public function getFileUrl (){
        $minxer             = new stdClass();
        $minxer->id         = $this->id;
        $minxer->objectType = "region_operate_plan";
        if(!empty($this->file_name)){
            return $this->storage->setMinxer($minxer)->getMeidiaFileName($this->file_name,'origin');
        }

        return "";
    }


    public function getRegionOperatePlanList($limit=20,$start=0,$plan_detail_id=0){
        $items = $this->db->select("*")->where("plan_detail_id",$plan_detail_id);
        $entity = $this->input->get();
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $items = $items->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $items = $items->where("created_time <=",$entity['end_date']);
        }
        $items = $items->limit($limit,$start)
            ->order_by("id","desc")
            ->get("region_operate_plan")
            ->result();
        foreach($items as $item){
            $minxer             = new stdClass();
            $minxer->id         = $item->id;
            $minxer->objectType = "region_operate_plan";
            $item->userInfo         = $this->user->getUser($item->user_id)->getUserInfoNotToken();
            $item->verify =  $this->userpermission->hasPermission(getAdminViewer(),"/serviceaudit/");
            if(!empty($item->file_name)){
                $item->fileUrl = $this->storage->setMinxer($minxer)->getMeidiaFileName($item->file_name,'origin');
            }else{
                $item->fileUrl = "";
            }
        }
        return $items;
    }



    public function getRegionOperatePlanCount($plan_detail_id){
        $entity = $this->input->get();
        $item = $this->db->select("*")->where("plan_detail_id",$plan_detail_id);
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $item = $item->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $item = $item->where("created_time <=",$entity['end_date']);
        }
        return $item->get('region_operate_plan')->num_rows();

    }

    public function addRegionOperatePlan($data=array()){
        $entity = $this->config['attributes'];
        foreach($data as $key => $val){
            if(!in_array($key,array_keys($entity))){
                unset($data[$key]);
            }
        }
       // if(!empty( $this->id)) $data['region_id'] = $this->id;
        if(isset($data['id']) && !empty($data['id'])){
            if(isset($data['refusal']) && !empty($data['refusal'])){
                $data['auditor'] = getAdminViewer()->id;
                $data['refuse_time'] =  date('Y-m-d H:i:s');
            }
            $this->db->where("id",$data['id']);
            $this->db->update('region_operate_plan',$data);
        }else{
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $this->db->insert('region_operate_plan',$data);
            $data['id'] = $this->db->insert_id();
        }
        $regionBusiness = $this->db->where('id',$data['id'])->get("region_operate_plan")->row();
        return $regionBusiness;
    }


    public function uploadRegionOperatePlanFile($regionServicePlan){
        $regionServicePlan->objectType = "region_operate_plan";
        $file = $this->storage->setMinxer($regionServicePlan)->uploadDocMediaFile();
        if ($file->errorCode == 0) {
            $data['file_name'] = $file->data['file_name'];
            $this->db->where("id",$regionServicePlan->id);
            $this->db->update('region_operate_plan',$data);
        } else {
            $this->returncode['errcode'] = 1000003;
            $this->returncode['errdesc'] = "附件上传失败";
            $this->returncode['data'] = $file;
        }
        return $this;
    }

}  
