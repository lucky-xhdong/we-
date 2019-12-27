<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class School extends CI_Model{



    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }
	//设置学部
	public function setSchoolPart(){
		return $str =  array("小学","初中","高中");
	}
	/**
	 * 
	 * @param unknown $str ,传入学部字符串，输出 学部数组，包含是否 checked 。
	 * 比如传入 小学,初中 or 小学,高中 or ''
	 * @return multitype:
	 */
	public function SchoolPartChecked($str)
	{
		$array = $this->setSchoolPart();
		$result = array();
		for($i=0;$i<count($array);$i++)
		{
			if(strpos($str,$array[$i])===false){
				$checked="  "; //如果不存在，checkbox则是未选中状态
			}else{
				$checked="checked";//如果存在，checkbox则是选中状态
			}
			$result[$i] = array("name"=>$array[$i],"checkstatus"=>$checked);
		
		}
		return $result;
		
		
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
            "school_user_count" => array("require" => false),
            "home_user_count"   => array("require" => false),
            "school_property_id"=> array("require" => false),
            "block"             => array("require" => false),
            'course_count'      => array("require" => false),
            "course_ids"        => array("require" => false),
            "sr_provider"       => array("require" => false),
            "region_id"         => array("require" => false),
        	"tags"				=> array("require" => false),//学校特征
        	"is_serviceSchool"  => array("require" => false),//是否服务学校
        	"extends_tags"  	=> array("require"	=> false), //学校扩展特征
        	"school_part"  		=> array("require"	=> false), //所属学部
        	"project_manager"	=> array("require"	=> false),//项目负责人
        	"tech_manager"		=> array("require"	=> false),//技术负责人
        	"teaching_manager"	=> array("require"	=> false),//教学负责人
        	"description"		=> array("require"	=> false),//学校介绍school_nature
        	"school_nature"		=> array("require"	=> false),//公立还是私立
        	"is_cooperation"	=> array("require"	=> false),//是否合作学校
        	"contact"			=> array("require"	=> false),//学校联系方式
        	"principal_name"	=> array("require"	=> false),//校长姓名
        	"address"			=> array("require"	=> false)
        		
         );
        parent::_initialize($config);
    }
    public function initPermission(){
    	return array(
    			"/schools/schoolEdit/"        	=>'<a href="javascript:;" class="btn-normal view"><i class="icon-view"></i>编辑</a>',
    			"/schools/schoolStudent/"    	=>'<a href="javascript:;" class="btn-normal business"><i class="icon-view"></i>学生</a>',
    			"/schools/schoolTeacher/"   	=>'<a href="javascript:;" class="btn-normal education"><i class="icon-view"></i>教师</a>',
    			"/schools/schoolRight/"      	=>'<a href="javascript:;" class="btn-normal freeze"><i class="icon-lock"></i>授权</a>',
    			"/schools/schoolStudyRequire/"  =>'<a href="javascript:;" class="btn-normal freeze"><i class="icon-lock"></i>学习要求</a>',
    			"/schools/"             		=>'',
    	);
    }
    
    
    public function  initoperationButtion(){
    	$permissions = $this->initPermission();
    	$opertaionButtion = "";
    	foreach($permissions as $key=>$permission){
    		//if($this->userpermission->hasPermission(getAdminViewer(),$key)){
    			$opertaionButtion .= $permission;
    		//}
    	}
    	return $opertaionButtion;
    }
    public function getSchool($id){
        $amoeba = new self;
        $data = $this->config['attributes'];
        $item = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("school")->row_array();
        if($item){
            foreach($item as $key=>$val){
                if(empty($val)) $val = "";
                $amoeba->$key = $val;
            }
        }else{
            $amoeba->id = 0;
        }
        return $amoeba;
    }
	/**
	 * 获取某个学校老师数量,已经从关系表里去重。
	 * 返回数量
	 */
    function getSchoolTeachersCount($school_id)
    {
    	$num = $this->db->query("select distinct(user_id) from wetalk_class_user_relationship where school_id='".$school_id."'")->num_rows();
    	return $num;
    }
    
    
    public function getAmoeba(){
        return $this->db->where('id',$this->amoeba_id)->get('amoeba')->row();
    }

    public function getRegion(){
        if(!empty($this->region_id)){
            $region =  $this->db->where('id',$this->region_id)->get('region')->row();
            if($region) return $region;
        }
        $region = new stdClass();
        $region->id = 0;
        $region->name = "";
        return $region;
    }


    public function getProvice(){
        return $this->functions->getProvice($this->province_id);
    }


    public function getCity(){
        return $this->functions->getCity($this->city_id);
    }


    public function getDistrict(){
        return $this->functions->getDistrict($this->district_id);
    }

    public function getPropertyRow(){
        return $this->db->where("id",$this->school_property_id)->get("school_property")->row();
    }



    public function getSchoolInfo(){
	
        $data = array(
            'id'                => $this->id,
            'name'              => $this->name,
            "username"          =>$this->getUserInfo()->name,
            "province" 		    => $this->functions->getProvice($this->province_id),
            "city" 		        => $this->functions->getCity($this->city_id),
            "district" 		    => $this->functions->getDistrict($this->district_id),
            "created_time"      => $this->created_time,
            "follower_count"    => $this->follower_count?$this->follower_count:0,
            "school_user_count" => $this->school_user_count?$this->school_user_count:0,
            "home_user_count"   => $this->home_user_count?$this->home_user_count:0,
            "start_date"        => $this->start_date,
            "end_date"          => $this->end_date,
            "livenessSchool"    => $this->getLivenessForSchool(),
            'livenessHome'      => $this->getLivenessForHome(),
            "property"          => $this->getSchoolPropertyRow($this->school_property_id),
            "block"             => $this->block,
            'course_count'      => $this->course_count,
            "course_ids"        => $this->course_ids,
            "sr_provider"       => $this->sr_provider,
        	"is_serviceSchool"  => $this->is_serviceSchool,
        	"tags"				=> $this->tags,
        	"extends_tags"  	=> $this->extends_tags,//学校扩展特征school_part
        	"school_part"  		=> $this->school_part,//所属学部
        	"project_manager"	=> $this->project_manager,//项目负责人
        	"tech_manager"		=> $this->tech_manager,//技术负责人
        	"teaching_manager"	=> $this->teaching_manager,//教学负责人
        	"description"		=> $this->description,//学校介绍
        	"school_nature"		=> $this->school_nature,//公立还是私立
        	"is_cooperation"	=> $this->is_cooperation,//是否合作学校
        	"contact"			=> $this->contact,//学校联系方式
        	"principal_name"	=> $this->principal_name,//校长姓名
        	"address"			=> $this->address,//学校联系地址


        );
        return $data;
    }
    
    /**
     * 
     * 传入学校ID
     */
    public function SchoolDetail($id)
    {
    	$arr = $this->db->where("id",$id)->get("school")->row();
    	$data = array(
    			'id'                => $id,
    			'name'              => $arr->name,
    			//"username"          =>$this->getUserInfo()->name,
    			"province" 		    => $this->functions->getProvice($arr->province_id),
    			"city" 		        => $this->functions->getCity($arr->city_id),
    			"district" 		    => $this->functions->getDistrict($arr->district_id),
    			"created_time"      => $arr->created_time,
    			"follower_count"    => $arr->follower_count?$arr->follower_count:0,
    			"school_user_count" => $arr->school_user_count?$arr->school_user_count:0,
    			"home_user_count"   => $arr->home_user_count?$arr->home_user_count:0,
    			"start_date"        => $arr->start_date,
    			"end_date"          => $arr->end_date,
    			//"livenessSchool"    => $this->getLivenessForSchool(),
    			//'livenessHome'      => $this->getLivenessForHome(),
    			"property"          => $this->getSchoolPropertyRow($arr->school_property_id),
    			"block"             => $arr->block,
    			'course_count'      => $arr->course_count,
    			"course_ids"        => $arr->course_ids,
    			"sr_provider"       => $arr->sr_provider,
    			"is_serviceSchool"  => $arr->is_serviceSchool,
    			"tags"				=> $arr->tags,
    			"extends_tags"  	=> $arr->extends_tags,//学校扩展特征school_part
    			"school_part"  		=> $arr->school_part,
    			"project_manager"	=> $arr->project_manager,//项目负责人
    			"tech_manager"		=> $arr->tech_manager,//技术负责人
    			"teaching_manager"	=> $arr->teaching_manager,//教学负责人
    			"description"		=> $arr->description,//学校介绍
    			"school_nature"		=> $arr->school_nature,//公立还是私立
    			"is_cooperation"	=> $arr->is_cooperation,//是否合作学校
    			"contact"			=> $arr->contact,//学校联系方式
    			"address"			=> $arr->address,//学校联系地址
    			"principal_name"	=> $arr->principal_name,//校长姓名
    
    
    	);
    	return $data;
    }

    public function getSchoolInfoView(){
        if(!empty($this->course_ids)){
            $this->course_count = count(explode(',',$this->course_ids));
        }else{
            $this->course_count = 0;
        }
        $data = array(
            'id'                => $this->id,
            'name'              => '<a href="'.anchorurl('/schools/schoolDetail/'.$this->id).'">'.$this->name.'</a>',
            "username"           =>$this->getUserInfo()->name,
            "created_time"      => $this->created_time,
            "follower_count"    => $this->follower_count?$this->follower_count:0,
            "school_user_count" => $this->school_user_count?$this->school_user_count:0,
            "home_user_count"   => $this->home_user_count?$this->home_user_count:0,
            "start_date"        => $this->start_date,
            "end_date"          => $this->end_date,
            "livenessSchool"    => $this->getLivenessForSchool(),
            'livenessHome'      => $this->getLivenessForHome(),
            "property"          => $this->getSchoolPropertyRow($this->school_property_id)->name,
            "block"             => $this->block,
            'course_count'      => $this->course_count?$this->course_count:0,
            'dateString'        => $this->start_date.'--'.$this->end_date,
            "course_ids"        => $this->course_ids,
            "sr_provider"       => $this->sr_provider,
        	"is_serviceSchool"  => $this->is_serviceSchool,
        	"tags"  			=> $this->tags, //学校特征
        	"extends_tags"  	=> $this->extends_tags,//学校扩展特征
        	"province" 		    => $this->functions->getProvice($this->province_id),//省
        	"city" 		        => $this->functions->getCity($this->city_id),       //市
        	"district" 		    => $this->functions->getDistrict($this->district_id), //区
        	"school_part"  		=> $this->school_part,
            'blockString'    => (time() < strtotime($this->end_date) && $this->block == 0 )?" <span class='state-progress'>正常</span>":"<span class='state-type'>已停用</span>",
        	"operationButton"    => $this->initoperationButtion(),
        );
        return $data;
    }

    public function getSchoolInfoDataView(){
        if(!empty($this->course_ids)){
            $this->course_count = count(explode(',',$this->course_ids));
        }else{
            $this->course_count = 0;
        }
        $data = array(
            'id'                => $this->id,
            'name'              => '<a href="'.anchorurl('home/studyDataGrade/'.$this->id).'">'.$this->name.'</a>',
            "username"           =>$this->getUserInfo()->name,
            "created_time"      => $this->created_time,
            "follower_count"    => $this->follower_count?$this->follower_count:0,
            "school_user_count" => $this->school_user_count?$this->school_user_count:0,
            "home_user_count"   => $this->home_user_count?$this->home_user_count:0,
            "start_date"        => $this->start_date,
            "end_date"          => $this->end_date,
            "livenessSchool"    => $this->getLivenessForSchool(),
            'livenessHome'      => $this->getLivenessForHome(),
            "property"          => $this->getSchoolPropertyRow($this->school_property_id)->name,
            "block"             => $this->block,
            'course_count'      => $this->course_count?$this->course_count:0,
            'dateString'        => $this->start_date.'--'.$this->end_date,
            "course_ids"    	=> $this->course_ids,
            "sr_provider"       => $this->sr_provider,
        	"is_serviceSchool"  => $this->is_serviceSchool, //是否服务学校
        	"tags"  			=> $this->tags, //学校特征
        	"extends_tags"  	=> $this->extends_tags,//学校扩展特征
        	"province" 		    => $this->functions->getProvice($this->province_id),//省
        	"city" 		        => $this->functions->getCity($this->city_id),       //市
        	"district" 		    => $this->functions->getDistrict($this->district_id), //区
            'blockString'       => $this->block ? "<span class='state-type'>被停用</span>>":'激活'
        );
        return $data;
    }

    public function getUserInfo(){
        return $this->user->getUser($this->user_id);
    }


    /*
     *
     * 学校安装活跃度
     *
     */

    public function getLivenessForSchool(){
        return rand(1,10000);
    }

    /*
    *
    * 家庭安装活跃度
    *
    */

    public function getLivenessForHome(){
        return rand(1,10000);
    }



    //五个维度数据分析

    /*
     * 学习指数 占五个维度的20%
     * 正确率  4% * 实际准确率
     * 完成率  4% *
     * 达标率  4% * 未给
     * MT平均分 4% *
     * 学习方法得分 4% *  未给
     * result:
     */
    public function studyIndex(){

    }


    /*
     * 活跃度 占五个维度的20%
     * 活跃数( 28天内登入系统算1次)/总人数 * 20&
     */
    public function activieRate(){

    }


    /*
     * 学习时间和频率 占五个维度的20%
     * 周学习天数 =  总共学习的天数/7 周1天 10%*5% 2天40%*5% 3天 60%*5% 4天 70%*5% 5天 80%*5% 6天 90%*5% 7天 100&*5%
     * 总学习天数 =  实际学习天数/(选择查询的天数/7) = 周1天 10%*5% 2天40%*5% 3天 60%*5% 4天 70%*5% 5天 80%*5% 6天 90%*5% 7天 100&*5%
     * 周学习时间 =  平均每周小时 周1小时 10%*5% 1.5小时 20%*5% 2小时 40%*5% 2.5小时 60%*5% 3小时 70%*5% 3.5小时 80%*5% 4小时 90%*5% 5小时 100%*5%
     * 总学习时间 =  实际总学时间/(选择查询的天数/7) = 周1小时 10%*5% 1.5小时 20%*5% 2小时 40%*5% 2.5小时 60%*5% 3小时 70%*5% 3.5小时 80%*5% 4小时 90%*5% 5小时 100%*5%
     */

    public function studyTimeAndFreQuency(){

    }


    /*
    * 技能概览 20%
    *
    * 听力理解 : 7% listen 每个part占20% 包括 listening (计算完成率) 和comhension(正确率)的 click
    * 口语能力:  7% sr的计算 正确率
    * 语法能力:  6% grammer 正确率
    */

    public function skillRate(){


    }


    /*
    * 功能键使用次数 20%
    *
    * 重复建比文字建次数  8%  比率 >3 8, >2 6  1<x<=2 4, x==1 2 x <1 0
    * 录音键比回听键     7%  比率 x=1 7,0.6<x<1 6分,0.4<x<=0.6 4分,0.2<x<=0.4 2分, 0<x<=0.2 1分  ,x==0 0分
    *  重复键比录音键:回听键    5% >3 5分,==3 4分,==2 3分,===1,2分,重复建 < 音键:回听键 0分
    */


    public function functionButtionsRate(){


    }



    public function getSchoolCount(){
        return $this->db->get('school')->num_rows();
    }

    public function getSchoolDataCount($post){
        $items = $this->db;
        if(isset($post['region_id']) && $post['region_id']){
            $items = $items->where("region_id",$post['region_id']);
        }
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
        return $items->get('school')->num_rows();
    }


    public function  updateKey($data = array()){
        if(count($data)){
            $this->db->where("id",$this->id);
            $this->db->update("school",$data);
        }
        return true;
    }

    /*
     *
     * 获取学校列表数据
     */

    public function getSchoolList($amoeba_id,$limit=20,$start=0){
        $data = array();
        $items = $this->db->select("id")->where("amoeba_id",$amoeba_id)->order_by("id","desc")->limit($limit,$start)->get("school")->result();
        foreach($items as $item){
            $data[] = $this->getSchool($item->id);
        }
        return $data;
    }

    /**
     * @param int $limit
     * @param int $start
     * @param $post
     * @return array
     * 获取所有学校id和name
     */
    public function getSchoolName(){
        $result = $this->db->get('school')->result();

        return $result;
    }

    /*
     *
     * 获取学校列表数据
     */

    public function getSchoolInfoList($limit=20,$start=0,$post){
        $data = array();
        $items = $this->db->select("id");
        if(isset($post['region_id']) && $post['region_id']){
            $items = $items->where("region_id",$post['region_id']);
        }
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
        $items = $items->limit($limit,$start)->order_by("id","desc")->get("school")->result();
        foreach($items as $item){
            $data[] = $this->getSchool($item->id)->getSchoolInfoView();
        }
        return $data;
    }

    public function getSchoolInfoDataList($limit=20,$start=0,$post){
        $data = array();
        $items = $this->db->select("id");
        if(isset($post['region_id']) && $post['region_id']){
            $items = $items->where("region_id",$post['region_id']);
        }
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
        $items = $items->limit($limit,$start)->get("school")->result();
        foreach($items as $item){
            $data[] = $this->getSchool($item->id)->getSchoolInfoDataView();
        }
        return $data;
    }


    public function getSchoolPropertyList(){
        return $this->db->get("school_property")->result();
    }

    public function getSchoolPropertyRow($property_id){
        return $this->db->where("id",$property_id)->get("school_property")->row();
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
            $this->db->update('school',$data);
        }else{
            $data['course_count']   = 1;
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $data['follower_count'] = 1;
            $this->db->insert('school',$data);
        }
        return true;
    }

    public function getScore(){
        return rand(0,100);
    }

    public function setSchoolTime($data){
        if(!isset($this->id) || !isset($data['month'])){
            return false;
        }else{
            $enddate = date('Y-m-d', strtotime ("+".$data['month']." month", strtotime($this->end_date)));
            $this->db->where("id",$this->id);
            $this->db->update("school",array("end_date"=>$enddate));
        }
        return true;
    }

    public function delete(){
        if(!isset($this->id)){
            return false;
        }else{
            $this->db->where("id",$this->id);
            $this->db->delete("school");
        }
        return true;
    }


}  
