<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Region extends CI_Model{


    public $objectType = 'regions';
    public $type = 'regions';
    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'                => array("require" => false),
            'name'              => array("require" => true),
            "user_id"           => array("require" => false),
            "province_id" 		=> array("require" => false),
            "created_time"      => array("require" => false),
            "follower_count"    => array("require" => false),
            "city_id"           => array("require" => false),
            "district_id"       => array("require" => false),
            "start_date"        => array("require" => false),
            "end_date"          => array("require" => false),
            "description"       => array("require" => false),
            "status"              => array("require" => false),
            "url"                 => array("require" => false),
            "signed_status"       => array("require" => false),
            "signed_school_count" => array("require" => false),
            "signed_time"         => array("require" => false),
            "filename"         => array("require" => false),
            "file_bg"          => array("require" => false),

        );
        parent::_initialize($config);
    }

    public function initPermission(){
        if(isset($this->status) && $this->status == 1){
            return array(
                "/regions/view/"        =>'<a href="javascript:;" class="btn-normal btn-view disabled"></i>查看</a>',
                "/regions/business/"    =>'<a href="javascript:;" class="btn-normal btn-business disabled"></i>商务</a>',
                "/regions/education/"   =>'<a href="javascript:;" class="btn-normal btn-education disabled">教学</a>',
                "/regions/operate/"   =>'<a href="javascript:;" class="btn-normal  btn-operate disabled">运营</a>',
//                "/regions/freeze/"      =>'<a href="javascript:;" class="btn-normal btn-freeze freeze">冻结</a>',
                "/regions/"             =>'',
//            "/regions/delete/"      =>'<a href="javascript:;" class="btn-normal"><i class="icon-uniE910"></i>删除</a>',

            );
        }else{
            return array(
                "/regions/view/"        =>'<a href="javascript:;" class="btn-normal btn-view view"></i>查看</a>',
                "/regions/business/"    =>'<a href="javascript:;" class="btn-normal btn-business business"></i>商务</a>',
                "/regions/education/"   =>'<a href="javascript:;" class="btn-normal btn-education education">教学</a>',
                "/regions/operate/"   =>'<a href="javascript:;" class="btn-normal  btn-operate operate">运营</a>',
//                "/regions/freeze/"      =>'<a href="javascript:;" class="btn-normal btn-freeze freeze">冻结</a>',
                "/regions/"             =>'',
//            "/regions/delete/"      =>'<a href="javascript:;" class="btn-normal"><i class="icon-uniE910"></i>删除</a>',

            );
        }

    }


    public function  initoperationButtion(){
        $permissions = $this->initPermission();
        $opertaionButtion = "";
        foreach($permissions as $key=>$permission){
            if($this->userpermission->hasPermission(getAdminViewer(),$key)){
                $opertaionButtion .= $permission;
            }
        }
        return $opertaionButtion;
    }

    public function getRegion($id){
        $region = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("region")->row_array();
        if($item){
            foreach($item as $key=>$val){
                if(empty($val) && $val != 0) $val = "";
                $region->$key = $val;
            }
        }else{
            $region->id = 0;
            $region->name = "";
        }
        return $region;
    }



    public function getProvice(){
        if(!empty($this->province_id)){
            return $this->functions->getProvice($this->province_id);
        }
        $province = new stdClass();
        $province->name = "";
        return $province;
    }

    public function getFileUrl($thumb="region_large"){
        if(!empty($this->filename)){
            $picture = $this->storage->setMinxer($this)->getFileName($this->filename,$thumb);
            return $picture;
        }else{
            return base_url("media/assets/region/".$thumb.'.jpg');
        }

        return  "";

    }

    public function getFileBgUrl($thumb="region_bg"){
        if(!empty($this->file_bg)){
            $picture = $this->storage->setMinxer($this)->getFileName($this->file_bg,$thumb);
            return $picture;
        }

        return  "";

    }



    public function getCity(){
        if($this->city_id != 0){
            return $this->functions->getCity($this->city_id);
        }

        $city = new stdClass();
        $city->name = "";
        return $city;

    }


    public function getDistrict(){
        if($this->district_id != 0){
            return $this->functions->getDistrict($this->district_id);
        }
        $district = new stdClass();
        $district->name = "";
        return $district;
    }



    public function getRegionInfo(){

        $data = array(
            'id'                => $this->id,
            'name'              => $this->name,
            "username"          =>$this->getUserInfo()->name,
            "province" 		    => $this->functions->getProvice($this->province_id),
            "city" 		        => $this->functions->getCity($this->city_id),
            "district" 		    => $this->functions->getDistrict($this->district_id),
            "created_time"      => $this->created_time,
            "start_date"        => $this->start_date,
            "end_date"          => $this->end_date,
            "status"            => $this->status,
            'description'        => $this->description,
            "url"               => $this->url,
            "signed_status"       => $this->signed_status,
            "signed_school_count" =>$this->signed_school_count,
            "signed_time"         => $this->signed_time,
            "picture_url"          =>$this->getFileUrl(),
            "bg_url"                      =>$this->getFileBgUrl(),

        );
        return $data;
    }




    public function getRegionInfoView(){
        if(!empty($this->course_ids)){
            $this->course_count = count(explode(',',$this->course_ids));
        }else{
            $this->course_count = 0;
        }

        $data = array(
            'id'                  => $this->id,
            'name'                => $this->name,
            "username"            => $this->getUserInfo()->name,
            "created_time"        => $this->created_time,
            "start_date"          => $this->start_date,
            "end_date"            => $this->end_date,
            "status"              => $this->status,
            'dateString'          => $this->start_date.'--'.$this->end_date,
            "description"         => $this->description,
            "url"                 => $this->url,
            "signed_status"       => $this->signed_status,
            "signed_school_count" => $this->signed_school_count,
            "school_count"        => $this->getRegionSchoolCount(),
            "signed_time"         => $this->signed_time,
            "province" 		      => $this->functions->getProvice($this->province_id),
            "city" 		          => $this->functions->getCity($this->city_id),
            "district" 		      => $this->functions->getDistrict($this->district_id),
            'blockString'         => $this->status ? "<span class='state-type'>冻结</span>":'激活',
            "operationButton"    => $this->initoperationButtion(),
            "picture_url"          =>$this->getFileUrl(),
            "bg_url"                      =>$this->getFileBgUrl(),

        );
        return $data;
    }





    public function getRegionSchoolCount(){
        return $this->db->where("region_id",$this->id)->get('school')->num_rows();
    }

    public function getUserInfo(){
        return $this->user->getUser($this->user_id);
    }




    public function getRegionCount(){
        return $this->db->get('region')->num_rows();
    }

    public function getRegionDataCount($post){

        $data = array();
        $region_relation_ship = getAdminViewer()->getPlatFormAccountRegion();
        $items = $this->db->select("id");
        if(isset($post['province_id']) && $post['province_id']){
            $items = $items->where("province_id",$post['province_id']);
        }
        if(isset($post['city_id']) && $post['city_id']){
            $items = $items->where("city_id",$post['city_id']);
        }
        if(isset($post['district_id']) && $post['district_id']){
            $items = $items->where("district_id",$post['district_id']);
        }

        if(count($region_relation_ship) == 0) return 0;
        $items = $items->where_in("id",$this->toArrayRegionIdArray($region_relation_ship));
        if(isset($post['key']) && !empty($post['key'])){
            $items = $items->like("name",$post['key']);
        }
        // $items = $items->where("status",0)->limit($limit,$start)->order_by("id","desc")->get("region")->result();
        return $items->get('region')->num_rows();


//        $items = $this->db;
//        if(isset($post['province_id']) && $post['province_id']){
//            $items = $items->where("province_id",$post['province_id']);
//        }
//        if(isset($post['city_id']) && $post['city_id']){
//            $items = $items->where("city_id",$post['city_id']);
//        }
//        if(isset($post['district_id']) && $post['district_id']){
//            $items = $items->where("district_id",$post['district_id']);
//        }
//
//        if(isset($post['key']) && !empty($post['key'])){
//            $items = $items->like("name",$post['key']);
//        }
//        return $items->get('region')->num_rows();
    }


    public function  updateKey($data = array()){
        if(count($data)){
            $this->db->where("id",$this->id);
            $this->db->update("region",$data);
        }
        return true;
    }

    /*
     *
     * 获取区域列表数据
     */

    public function getRegionList($limit=20,$start=0){
//        if(getAdminViewer()->id !=0){
//            $region_relation_ship = getAdminViewer()->getPlatFormAccountRegion();
//        }
        $data = array();
        $items = $this->db->select("id")->where("id !=",15);
//        if(getAdminViewer()->id !=0){
//            if(count($region_relation_ship) == 0) return array();
//            $items = $items->where_in("id",$this->toArrayRegionIdArray($region_relation_ship));
//        }
        if(isset($post['key']) && !empty($post['key'])){
            $items = $items->like("name",$post['key']);
        }
        if($limit == 0){
            $items = $items->where("status",0)->order_by("sort","asc")->get("region")->result();
        }else{
            $items = $items->where("status",0)->order_by("sort","asc")->limit($limit,$start)->get("region")->result();
        }

        foreach($items as $item){
            $data[] = $this->getRegion($item->id);
        }
        return $data;
    }

    public function getRegionLiteCount(){
        return $this->db->where("status",0)->get('region')->num_rows();
    }

    public function getRegionListObject($limit=20,$start=0,$post){
        $data = array();
        $region_relation_ship = getAdminViewer()->getPlatFormAccountRegion();
        $items = $this->db->select("id");
        if(isset($post['province_id']) && $post['province_id']){
            $items = $items->where("province_id",$post['province_id']);
        }
        if(isset($post['city_id']) && $post['city_id']){
            $items = $items->where("city_id",$post['city_id']);
        }
        if(isset($post['district_id']) && $post['district_id']){
            $items = $items->where("district_id",$post['district_id']);
        }

        if(count($region_relation_ship) == 0) return array();
        $items = $items->where_in("id",$this->toArrayRegionIdArray($region_relation_ship));
        if(isset($post['key']) && !empty($post['key'])){
            $items = $items->like("name",$post['key']);
        }
        if($limit == 0){
            $items = $items->where("status",0)->order_by("id","desc")->get("region")->result();
        }else{
            $items = $items->where("status",0)->order_by("id","desc")->limit($limit,$start)->get("region")->result();
        }
       // echo $this->db->last_query();
        foreach($items as $item){
            $data[] = $this->getRegion($item->id);
        }
        return $data;
    }


    /**
     * @param int $limit
     * @param int $start
     * @param $post
     * @return array
     * 获取所有区域id和name
     */
    public function getRegionName(){
        $result = $this->db->get('region')->result();

        return $result;
    }

    /*
     *
     * 获取区域列表数据
     */

    public function getRegionInfoList($limit=20,$start=0,$post){
        $data = array();
        $region_relation_ship = getAdminViewer()->getPlatFormAccountRegion();
        $items = $this->db->select("id");
        if(isset($post['province_id']) && $post['province_id']){
            $items = $items->where("province_id",$post['province_id']);
        }
        if(isset($post['city_id']) && $post['city_id']){
            $items = $items->where("city_id",$post['city_id']);
        }
        if(isset($post['district_id']) && $post['district_id']){
            $items = $items->where("district_id",$post['district_id']);
        }

        if(count($region_relation_ship) == 0) return array();
        $items = $items->where_in("id",$this->toArrayRegionIdArray($region_relation_ship));
        if(isset($post['key']) && !empty($post['key'])){
            $items = $items->like("name",$post['key']);
        }
       // $items = $items->where("status",0)->limit($limit,$start)->order_by("id","desc")->get("region")->result();
        $items = $items->limit($limit,$start)->order_by("id","desc")->get("region")->result();

        foreach($items as $item){
            $data[] = $this->getRegion($item->id)->getRegionInfoView();
        }
        return $data;
    }


    public function getRegionInfoForCntentList($limit=20,$start=0,$post){
        $data = array();
        $items = $this->db->select("id");
        if(isset($post['province_id']) && $post['province_id']){
            $items = $items->where("province_id",$post['province_id']);
        }
        if(isset($post['city_id']) && $post['city_id']){
            $items = $items->where("city_id",$post['city_id']);
        }
        if(isset($post['district_id']) && $post['district_id']){
            $items = $items->where("district_id",$post['district_id']);
        }

        if(isset($post['key']) && !empty($post['key'])){
            $items = $items->like("name",$post['key']);
        }
        $items = $items->where("status",0)->limit($limit,$start)->order_by("id","desc")->get("region")->result();
       // echo $this->db->last_query();
        foreach($items as $item){
            $data[] = $this->getRegion($item->id)->getRegionInfoView();
        }
        return $data;
    }



    public function save($data){
        $entity = $this->config['attributes'];
        foreach($data as $key => $val){
            if(!in_array($key,array_keys($entity))){
                unset($data[$key]);
            }
        }
        if(isset($data['id']) && !empty($data['id'])){
            $this->db->where("id",$data['id']);
            $this->db->update('region',$data);
        }else{
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $this->db->insert('region',$data);
        }
        return true;
    }

    public function getScore(){
        return rand(0,100);
    }

    public function setRegionTime($data){
        if(!isset($this->id) || !isset($data['month'])){
            return false;
        }else{
            $enddate = date('Y-m-d', strtotime ("+".$data['month']." month", strtotime($this->end_date)));
            $this->db->where("id",$this->id);
            $this->db->update("region",array("end_date"=>$enddate));
        }
        return true;
    }

    public function delete(){
        if(!isset($this->id)){
            return false;
        }else{
            $this->db->where("id",$this->id);
            $this->db->delete("region");
        }
        return true;
    }

    /*
     *
     * 区域商务信息
     *
     * */
    public function getRegionBusinessList($limit=20,$start=0){
        $items = $this->db->select("*");
        $items = $items->where("region_id",$this->id)
            ->limit($limit,$start)
            ->order_by("id","desc")
            ->get("region_business")
            ->result();
        foreach($items as $item){
            $minxer             = new stdClass();
            $minxer->id         = $item->id;
            $minxer->objectType = "region_business";
            $item->userInfo         = $this->user->getUser($item->user_id)->getUserInfoNotToken();
            if(!empty($item->signed_user_id)){
                $item->businessUserInfo = $this->user->getUser($item->signed_user_id)->getUserInfoNotToken();
            }else{
                $item->businessUserInfo = array();
            }
            if(!empty($item->file_name)){
                $item->fileUrl = $this->storage->setMinxer($minxer)->getMeidiaFileName($item->file_name,'origin');
            }else{
                $item->fileUrl = "";
            }
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



    public function getRegionBusinessInfo($RegionEducationPlan_id = 0){
        $item = $this->db->select("*");
        $item = $item->where("id",$RegionEducationPlan_id)
            ->get("region_business")
            ->row();
        if($item){
            $minxer             = new stdClass();
            $minxer->id         = $item->id;
            $minxer->objectType = "region_business";
            $item->regionInfo = $this->getRegion($item->region_id);
            $item->userInfo         = $this->user->getUser($item->user_id)->getUserInfoNotToken();
            if(!empty($item->file_name)){
                $item->fileUrl = $this->storage->setMinxer($minxer)->getMeidiaFileName($item->file_name,'origin');
            }else{
                $item->fileUrl = "";
            }
            $item->filetype = $this->getFileInfo($item->file_name);
        }

        return $item;
    }



    public function getRegionBusinessListCount(){
        return $this->db->where("region_id",$this->id)->get('region_business')->num_rows();
    }

    public function addRegionBusiness($data=array()){
        $entity = array(
            'id'                => array("require" => false),
            'region_id'         => array("require" => true),
            "user_id"           => array("require" => false),
            "created_time" 		=> array("require" => false),
            "file_name"         => array("require" => false),
            "start_date"        => array("require" => false),
            "end_date"          => array("require" => false),
            "signed_user_id"    => array("require" => false),
            "signed_status"     => array("require" => false),
            "contracted_value"  => array("require" => false),
            "contract_pages"    => array("require" => false),
        );
        foreach($data as $key => $val){
            if(!in_array($key,array_keys($entity))){
                unset($data[$key]);
            }
        }
        $data['region_id'] = $this->id;
        if(isset($data['id']) && !empty($data['id'])){
            $this->db->where("id",$data['id']);
            $this->db->update('region_business',$data);
        }else{
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $this->db->insert('region_business',$data);
            $data['id'] = $this->db->insert_id();
        }
        $regionBusiness = $this->db->where('id',$data['id'])->get("region_business")->row();
        return $regionBusiness;
    }


    public function uploadRegionBusinessFile($regionBusiness){
        $regionBusiness->objectType = "region_business";
        $file = $this->storage->setMinxer($regionBusiness)->uploadDocMediaFile();
        if ($file->errorCode == 0) {
            $data['file_name'] = $file->data['file_name'];
            $this->db->where("id",$regionBusiness->id);
            $this->db->update('region_business',$data);
        } else {
            $this->returncode['errcode'] = 1000003;
            $this->returncode['errdesc'] = "附件上传失败";
            $this->returncode['data'] = $file;
        }
        return $this;
    }



    /*
     *
     * 区域教学服务
     *
     * */
    public function getRegionServicePlanList($limit=20,$start=0,$status=0,$entity=array()){
        $items = $this->db->select("*");
        $entity = $this->input->get();
        if($this->id != 0){
            $items = $items->where("region_id",$this->id);
        }else{
            $items = $items->where("status !=",0);
        }
        if($status != 0 && $status ){
            $items = $items->where("status",$status);
        }
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $items = $items->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $items = $items->where("created_time <=",$entity['end_date']);
        }
        if(isset($entity['user_id']) && !empty($entity['user_id']) ){
            $items = $items->where("user_id ",$entity['user_id']);
        }

        $items = $items->limit($limit,$start)
            ->order_by("id","desc")
            ->get("region_service_plan_detail")
            ->result();
      //  echo $this->db->last_query();
        foreach($items as $item){
            $minxer             = new stdClass();
            $minxer->id         = $item->id;
            $minxer->objectType = "region_service_plan";
            $item->region = $this->getRegion($item->region_id);
            $item->schoolInfo = $this->school->getSchool($item->school_id);
            $item->regionInfo = $this->getRegion($item->region_id);
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


    public function getRegionServicePlan($service_plan_id=0){
        $item = $this->db->select("*")->where("id",$service_plan_id)->get("region_service_plan_detail")->row();
        if($item){
            $minxer             = new stdClass();
            $minxer->id         = $item->id;
            $minxer->objectType = "region_service_plan";
            $item->region = $this->getRegion($item->region_id);
            $item->schoolInfo = $this->school->getSchool($item->school_id);
            $item->regionInfo = $this->getRegion($item->region_id);
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


    public function getRegionServicePlanCount($status=0,$entity=array()){
        $entity = $this->input->get();
        $item = $this->db->select("*");
        if($this->id != 0){
            $item = $item->where("region_id",$this->id);
        }else{
            $item= $item->where("status !=",0);
        }
        if($status != 0 && $status ){
            $item = $item->where("status",$status);
        }
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $item = $item->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $item = $item->where("created_time <=",$entity['end_date']);
        }
        if(isset($entity['user_id']) && !empty($entity['user_id']) ){
            $item = $item->where("user_id ",$entity['user_id']);
        }


        return $item->get('region_service_plan_detail')->num_rows();
    }

    public function addRegionServicePlan($data=array()){
        $entity = array(
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
        );
        foreach($data as $key => $val){
            if(!in_array($key,array_keys($entity))){
                unset($data[$key]);
            }
        }
        if(isset($data['id']) && !empty($data['id'])){
            if(isset($data['refusal']) && !empty($data['refusal'])){
                $data['auditor'] = getAdminViewer()->id;
                $data['refuse_time'] =  date('Y-m-d H:i:s');
            }
            $this->db->where("id",$data['id']);
            $this->db->update('region_service_plan_detail',$data);
        }else{
            if(!empty($this->id)) $data['region_id'] = $this->id;
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $this->db->insert('region_service_plan_detail',$data);
            $data['id'] = $this->db->insert_id();
        }
        $regionBusiness = $this->db->where('id',$data['id'])->get("region_service_plan_detail")->row();
        return $regionBusiness;
    }


    public function uploadRegionServicePlanFile($regionServicePlan){
        $regionServicePlan->objectType = "region_service_plan";
        $file = $this->storage->setMinxer($regionServicePlan)->uploadDocMediaFile();
        if ($file->errorCode == 0) {
            $data['file_name'] = $file->data['file_name'];
            $this->db->where("id",$regionServicePlan->id);
            $this->db->update('region_service_plan_detail',$data);
        } else {
            $this->returncode['errcode'] = 1000003;
            $this->returncode['errdesc'] = "附件上传失败";
            $this->returncode['data'] = $file;
        }
        return $this;
    }




    /*
     *
     * 区域服务报告
     *
     * */
    public function getRegionServiceReportList($limit=20,$start=0){
        $items = $this->db->select("*");
        $items = $items->where("region_id",$this->id)
            ->limit($limit,$start)
            ->order_by("id","desc")
            ->get("region_service_report")
            ->result();
        foreach($items as $item){
            $minxer             = new stdClass();
            $minxer->id         = $item->id;
            $minxer->objectType = "region_service_report";
            $item->userInfo         = $this->user->getUser($item->user_id)->getUserInfoNotToken();
            if(!empty($item->file_name)){
                $item->fileUrl = $this->storage->setMinxer($minxer)->getMeidiaFileName($item->file_name,'origin');
            }else{
                $item->fileUrl = "";
            }
        }
        return $items;
    }

    public function getRegionServiceInfo($RegionEducationPlan_id = 0){
        $item = $this->db->select("*");
        $item = $item->where("id",$RegionEducationPlan_id)
            ->get("region_service_report")
            ->row();
        if($item){
            $minxer             = new stdClass();
            $minxer->id         = $item->id;
            $minxer->objectType = "region_service_report";
            $item->regionInfo = $this->getRegion($item->region_id);
            $item->userInfo         = $this->user->getUser($item->user_id)->getUserInfoNotToken();
            if(!empty($item->file_name)){
                $item->fileUrl = $this->storage->setMinxer($minxer)->getMeidiaFileName($item->file_name,'origin');
            }else{
                $item->fileUrl = "";
            }
            $item->filetype = $this->getFileInfo($item->file_name);
        }

        return $item;
    }




    public function getRegionServiceReportCount(){
        return $this->db->where("region_id",$this->id)->get('region_service_report')->num_rows();
    }

    public function addRegionServiceReport($data=array()){
        $entity = array(
            'id'                => array("require" => false),
            'region_id'         => array("require" => true),
            "user_id"           => array("require" => false),
            "created_time" 		=> array("require" => false),
            "file_name"         => array("require" => false),
            "report_type"        => array("require" => false),
            "name"              => array("require" => false),
            "service_ids"     => array("require" => false),
            "service_range"    => array("require" => false),
            "service_type"    => array("require" => false),
            "school_id"    => array("require" => false),

        );
        foreach($data as $key => $val){
            if(!in_array($key,array_keys($entity))){
                unset($data[$key]);
            }
        }
        $data['region_id'] = $this->id;
        if(isset($data['id']) && !empty($data['id'])){
            $this->db->where("id",$data['id']);
            $this->db->update('region_service_report',$data);
        }else{
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $this->db->insert('region_service_report',$data);
            $data['id'] = $this->db->insert_id();
        }
        $regionBusiness = $this->db->where('id',$data['id'])->get("region_service_report")->row();
        return $regionBusiness;
    }


    public function uploadRRegionServiceReportFile($regionServicePlan){
        $regionServicePlan->objectType = "region_service_report";
        $file = $this->storage->setMinxer($regionServicePlan)->uploadDocMediaFile();
        if ($file->errorCode == 0) {
            $data['file_name'] = $file->data['file_name'];
            $this->db->where("id",$regionServicePlan->id);
            $this->db->update('region_service_report',$data);
        } else {
            $this->returncode['errcode'] = 1000003;
            $this->returncode['errdesc'] = "附件上传失败";
            $this->returncode['data'] = $file;
        }
        return $this;
    }





    /*
     *
     * 教学成果
     *
     * */
    public function getRegionTeachingAchievementList($limit=20,$start=0){
        $items = $this->db->select("*");
        $items = $items->where("region_id",$this->id)
            ->limit($limit,$start)
            ->order_by("id","desc")
            ->get("region_teaching_achievement")
            ->result();
        foreach($items as $item){
            $minxer             = new stdClass();
            $minxer->id         = $item->id;
            $minxer->objectType = "region_teaching_achievement";
            $item->userInfo         = $this->user->getUser($item->user_id)->getUserInfoNotToken();
            if(!empty($item->file_name)){
                $item->fileUrl = $this->storage->setMinxer($minxer)->getMeidiaFileName($item->file_name,'origin');
            }else{
                $item->fileUrl = "";
            }
        }
        return $items;
    }


    public function getRegionTeachingAchievementCount(){
        return $this->db->where("region_id",$this->id)->get('region_teaching_achievement')->num_rows();
    }

    public function addRegionTeachingAchievement($data=array()){
        $entity = array(
            'id'                => array("require" => false),
            'region_id'         => array("require" => true),
            "user_id"           => array("require" => false),
            "created_time" 		=> array("require" => false),
            "file_name"         => array("require" => false),
            "type"              => array("require" => false),
            "name"              => array("require" => false),
            "school_id"         => array("require" => false),
            "teacher_id"        => array("require" => false),
            "post_type"         => array("require" => false),
            "file_id"           => array("require" => false),

        );
        foreach($data as $key => $val){
            if(!in_array($key,array_keys($entity))){
                unset($data[$key]);
            }
        }
        $data['region_id'] = $this->id;
        if(isset($data['id']) && !empty($data['id'])){
            $this->db->where("id",$data['id']);
            $this->db->update('region_teaching_achievement',$data);
        }else{
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $this->db->insert('region_teaching_achievement',$data);
            $data['id'] = $this->db->insert_id();
        }
        $regionBusiness = $this->db->where('id',$data['id'])->get("region_teaching_achievement")->row();
        return $regionBusiness;
    }


    public function uploadRRegionTeachingAchievementFile($regionServicePlan){
        $regionServicePlan->objectType = "region_teaching_achievement";
        $file = $this->storage->setMinxer($regionServicePlan)->uploadDocMediaFile();
        if ($file->errorCode == 0) {
            $data['file_name'] = $file->data['file_name'];
            $this->db->where("id",$regionServicePlan->id);
            $this->db->update('region_teaching_achievement',$data);
        } else {
            $this->returncode['errcode'] = 1000003;
            $this->returncode['errdesc'] = "附件上传失败";
            $this->returncode['data'] = $file;
        }
        return $this;
    }




    /*
     *
     * 区域教学计划
     *
     * */
    public function getRegionEducationPlanList($limit=20,$start=0,$status=0,$entity=array()){
        $role = getAdminViewer()->getUserRole();
        $region_school_info = getAdminViewer()->getPlatFormAccountRegion();
        $entity = $this->input->get();
        $items = $this->db->select("*");
        if($this->id != 0){
            $items = $items->where("region_id",$this->id);
        }else{
            $items = $items->where("status !=",0);
        }
        if($status != 0 && $status ){
            $items = $items->where("status",$status);
        }
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $items = $items->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $items = $items->where("created_time <=",$entity['end_date']);
        }
        if($role->type == 666666 || $role->type == 7777777){
            if(count($region_school_info) > 0) $region_school_info = $region_school_info[0];
            $items = $items->where("school_id",$region_school_info->school_id);
        }
        if($role->type == 444444){
            $items = $items->where("IF( FIND_IN_SET(".getAdminViewer()->id.",teacher_ids),1, 0)");
        }
        if(isset($entity['user_id']) && !empty($entity['user_id']) ){
            $items = $items->where("user_id ",$entity['user_id']);
        }
        $items = $items->limit($limit,$start)
            ->order_by("id","desc")
            ->get("region_education_plan_detail")
            ->result();
        foreach($items as $item){
            $minxer             = new stdClass();
            $minxer->id         = $item->id;
            $minxer->objectType = "region_education_plan";
            $item->schoolInfo = $this->school->getSchool($item->school_id);
            $item->regionInfo = $this->getRegion($item->region_id);
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


    public function getRegionEducationPlanInfo($RegionEducationPlan_id = 0){
        $item = $this->db->select("*");
        $item = $item->where("id",$RegionEducationPlan_id)
            ->get("region_education_plan_detail")
            ->row();
        if($item){
            $minxer             = new stdClass();
            $minxer->id         = $item->id;
            $minxer->objectType = "region_education_plan";
            $item->schoolInfo = $this->school->getSchool($item->school_id);
            $item->regionInfo = $this->getRegion($item->region_id);
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


    public function getRegionEducationPlanCount($status=0,$entity=array()){
        $entity = $this->input->get();
        $role = getAdminViewer()->getUserRole();
        $region_school_info = getAdminViewer()->getPlatFormAccountRegion();
        $item = $this->db->select("*");
        if($this->id != 0){
            $item = $item->where("region_id",$this->id);
        }else{
            $item= $item->where("status !=",0);
        }
        if($status != 0 && $status ){
            $item = $item->where("status",$status);
        }

        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $item = $item->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $item = $item->where("created_time <=",$entity['end_date']);
        }
        if($role->type == 666666 || $role->type == 7777777){
            if(count($region_school_info) > 0) $region_school_info = $region_school_info[0];
            $item = $item->where("school_id",$region_school_info->school_id);
        }
        if($role->type == 444444){
            $item = $item->where("IF( FIND_IN_SET(".getAdminViewer()->id.",teacher_ids),1, 0)");
        }
        if(isset($entity['user_id']) && !empty($entity['user_id']) ){
            $item = $item->where("user_id ",$entity['user_id']);
        }

        return $item->get('region_education_plan_detail')->num_rows();
    }

    public function addRegionEducationPlan($data=array()){
        $entity = array(
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
        );
        foreach($data as $key => $val){
            if(!in_array($key,array_keys($entity))){
                unset($data[$key]);
            }
        }
        if(isset($data['id']) && !empty($data['id'])){
            if(isset($data['refusal']) && !empty($data['refusal'])){
                $data['auditor'] = getAdminViewer()->id;
                $data['refuse_time'] =  date('Y-m-d H:i:s');
            }
            $this->db->where("id",$data['id']);
            $this->db->update('region_education_plan_detail',$data);
        }else{
            if(!empty( $this->id)) $data['region_id'] = $this->id;
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $this->db->insert('region_education_plan_detail',$data);
            $data['id'] = $this->db->insert_id();
        }
        $regionBusiness = $this->db->where('id',$data['id'])->get("region_education_plan_detail")->row();
        return $regionBusiness;
    }


    public function uploadRegionEducationPlanFile($regionServicePlan){
        $regionServicePlan->objectType = "region_education_plan";
        $file = $this->storage->setMinxer($regionServicePlan)->uploadDocMediaFile();
        if ($file->errorCode == 0) {
            $data['file_name'] = $file->data['file_name'];
            $this->db->where("id",$regionServicePlan->id);
            $this->db->update('region_education_plan_detail',$data);
        } else {
            $this->returncode['errcode'] = 1000003;
            $this->returncode['errdesc'] = "附件上传失败";
            $this->returncode['data'] = $file;
        }
        return $this;
    }




    /*
    *
    * 区域运营计划
    *
    * */

    public function getRegionOperatePlanInfo($operate_plan_id=0){
        $item = $this->db->select("*");
        $item = $item->where("id",$operate_plan_id)
            ->get("region_operate_plan_detail")
            ->row();
        if($item){
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
        return $item;
    }

    public function getRegionOperatePlanList($limit=20,$start=0,$status=0,$entity=array()){
        $entity = $this->input->get();
        $items = $this->db->select("*");
        if($this->id != 0){
            $items = $items->where("region_id",$this->id);
        }else{
            $items = $items->where("status !=",0);
        }
        if($status != 0 && $status ){
            $items = $items->where("status",$status);
        }
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $items = $items->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $items = $items->where("created_time <=",$entity['end_date']);
        }
        if(isset($entity['user_id']) && !empty($entity['user_id']) ){
            $items = $items->where("user_id ",$entity['user_id']);
        }
        $items = $items->limit($limit,$start)
            ->order_by("id","desc")
            ->get("region_operate_plan_detail")
            ->result();
        foreach($items as $item){
            $minxer             = new stdClass();
            $minxer->id         = $item->id;
            $minxer->objectType = "region_operate_plan";
            $item->userInfo         = $this->user->getUser($item->user_id)->getUserInfoNotToken();
            $item->schoolInfo = $this->school->getSchool($item->school_id);
            $item->regionInfo = $this->getRegion($item->region_id);
            $item->verify =  $this->userpermission->hasPermission(getAdminViewer(),"/serviceaudit/");
            if(!empty($item->file_name)){
                $item->fileUrl = $this->storage->setMinxer($minxer)->getMeidiaFileName($item->file_name,'origin');
            }else{
                $item->fileUrl = "";
            }
        }
        return $items;
    }



    public function getRegionOperatePlanCount($status=0,$entity=array()){
        $entity = $this->input->get();
        $item = $this->db->select("*");
        if($this->id != 0){
            $item = $item->where("region_id",$this->id);
        }else{
            $item= $item->where("status !=",0);
        }
        if($status != 0 && $status ){
            $item = $item->where("status",$status);
        }
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $item = $item->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $item = $item->where("created_time <=",$entity['end_date']);
        }
        if(isset($entity['user_id']) && !empty($entity['user_id']) ){
            $item = $item->where("user_id ",$entity['user_id']);
        }

        return $item->get('region_operate_plan_detail')->num_rows();
    }

    public function addRegionOperatePlan($data=array()){
        $entity = array(
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
        );
        foreach($data as $key => $val){
            if(!in_array($key,array_keys($entity))){
                unset($data[$key]);
            }
        }
        if(isset($data['id']) && !empty($data['id'])){
            if(isset($data['refusal']) && !empty($data['refusal'])){
                $data['auditor'] = getAdminViewer()->id;
                $data['refuse_time'] =  date('Y-m-d H:i:s');
            }
            $this->db->where("id",$data['id']);
            $this->db->update('region_operate_plan_detail',$data);
        }else{
            if(!empty( $this->id)) $data['region_id'] = $this->id;
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $this->db->insert('region_operate_plan_detail',$data);
            $data['id'] = $this->db->insert_id();
        }
        $regionBusiness = $this->db->where('id',$data['id'])->get("region_operate_plan_detail")->row();
        return $regionBusiness;
    }


    public function uploadRegionOperatePlanFile($regionServicePlan){
        $regionServicePlan->objectType = "region_operate_plan";
        $file = $this->storage->setMinxer($regionServicePlan)->uploadDocMediaFile();
        if ($file->errorCode == 0) {
            $data['file_name'] = $file->data['file_name'];
            $this->db->where("id",$regionServicePlan->id);
            $this->db->update('region_operate_plan_detail',$data);
        } else {
            $this->returncode['errcode'] = 1000003;
            $this->returncode['errdesc'] = "附件上传失败";
            $this->returncode['data'] = $file;
        }
        return $this;
    }

    //获取区域领导寄语言 regionalleadership principal instructor
    public function  getRegionUserBody($usertype="regionalleadership"){
        $users = array();
        $rows = $this->db
            ->where("user_type",$usertype)
            ->where("region_id",$this->id)
            ->limit(3)
            ->get("region_user_relationship")->result();
        if($rows){
            foreach($rows as $row){
                $users[] = $this->user->getUser($row->user_id);
            }
        }
        return $users;
    }

}
