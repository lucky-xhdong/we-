<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class School extends CI_Model{

    public $objectType = 'schools';
    public $type = 'schools';

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
            "school_user_count" => array("require" => false),
            "home_user_count"   => array("require" => false),
            "school_property_id"=> array("require" => false),
            "block"             => array("require" => false),
            'course_count'      => array("require" => false),
            "course_ids"        => array("require" => false),
            "sr_provider"       => array("require" => false),
            "region_id"         => array("require" => false),
        	"tags"				=> array("require" => false),//学校特征
        	"is_serviceSchool"  => array("is_serviceSchool" => false),//是否服务学校
        	"extends_tags"  	=> array("extends_tags"	=> false), //学校扩展特征
        	"school_part"  		=> array("school_part"	=> false), //学校扩展特征
            "filename"          => array("require" => false),
            "publishing_house_id"          => array("require" => false),
         );
        parent::_initialize($config);
    }
    public function initPermission(){
    	return array(
    			"/schools/schoolEdit/"        	=>'<a href="javascript:;" class="btn-normal btn-view schooledit"></i>编辑</a>',
    			"/schools/schoolStudent/"    	=>'<a href="javascript:;" class="btn-normal  btn-schoolstudent schoolstudent">学生</a>',
    			"/schools/schoolTeacher/"   	=>'<a href="javascript:;" class="btn-normal  btn-schoolteacher schoolteacher">教师</a>',
    			"/schools/schoolRight/"      	=>'<a href="javascript:;" class="btn-normal  btn-upload upload">上传</a>',
//                "/schools/schoolStudyRequire/"  =>'<a href="javascript:;" class="btn-normal freeze"><i class="icon-lock"></i>学习要求</a>',
//                "/schools/"             		=>'',
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
        	"school_part"  		=> $this->school_part,


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
            'name'              => $this->name,
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
            "teacherCount"      => $this->getSchoolUserCount("teacher"),
            "studentCount"      => $this->getSchoolUserCount("student"),
           // 'blockString'    => (time() < strtotime($this->end_date) && $this->block == 0 )?" <span class='state-progress'>正常</span>":"<span class='state-type'>已停用</span>",
        	"operationButton"    => $this->initoperationButtion(),
            "notLoginCount"     =>$this->getUserStatus(),
        );
        $data['totalUser'] = $data["teacherCount"]+$data["studentCount"];
        $data['loginCount'] =  $data['totalUser'] -  $data['notLoginCount'];
        return $data;
    }

    public function getSchoolUserCount($type = ""){
        $row = $this->db->select("distinct(user_id)")
            ->where("school_id",$this->id)->where("class_user_relationship.status",1);
        if(!empty($type)){
            $row = $row->where("user_type",$type);
        }
        $row =  $row->get("class_user_relationship")->num_rows();
        return $row;
    }

    public function getUserStatus(){
        $row = $this->db->where("school_id",$this->id)->where("class_user_relationship.status",1)
               ->join('users','class_user_relationship.user_id = users.id', 'left')
               ->where("(wetalk_users.registerDate = wetalk_users.lastvisitDate)")
              ->get("class_user_relationship")->num_rows();
        return $row;
    }



    public function getSchoolInfoImportList($post){
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
        $items = $items->order_by("id","desc")->get("school")->result();
        foreach($items as $item){
            $data[] = $this->getSchool($item->id)->getImportSchoolData();
        }
        return $data;
    }


    public function getImportSchoolData(){
        $data = array(
            '学校名称'              => $this->name,
            "学校性质"          => $this->getSchoolPropertyRow($this->school_property_id)->name,
            "是否服务校"  => $this->is_serviceSchool,
            "所在区"    =>  $this->functions->getProvice($this->province_id)->name.".". $this->functions->getCity($this->city_id)->name.".". $this->functions->getDistrict($this->district_id)->name,
            "教师数"      => $this->getSchoolUserCount("teacher"),
            "学生数"      => $this->getSchoolUserCount("student"),
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
            'name'              => $this->name,
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

    public function getSchoolList($region_id,$limit=20,$start=0){
        if(getAdminViewer()->id != 0) $role = getAdminViewer()->getUserRole();
        $data = array();
        $region_school_info = array();
        if(getAdminViewer()->id != 0 && $role->type == 444444){
            $user_relation_ship = getAdminViewer()->getUserSchoolGradeClassRealtionShip();
        }else if(getAdminViewer()->id != 0 &&  $role->type == 666666){
            $region_school_info = getAdminViewer()->getPlatFormAccountRegion();
        }

        $items = $this->db->select("id")->where("region_id",$region_id)->order_by("id","desc");
        if(getAdminViewer()->id != 0 &&  $role->type == 444444){
            $items = $items->where("id",$user_relation_ship->school_id);
        }else if(getAdminViewer()->id != 0 && $role->type == 666666){
            if(count($region_school_info) > 0) $region_school_info = $region_school_info[0];
            if($region_school_info){
                $items = $items->where("id",$region_school_info->school_id);
            }

        }

        if($limit == 0){
            $items =    $items->get("school")->result();
        }else{
            $items =    $items->limit($limit,$start)->get("school")->result();
        }
       // echo $this->db->last_query();
        foreach($items as $item){
            $data[] = $this->getSchool($item->id);
        }
        return $data;
    }

    public function getSchoolListCount($region_id){
        return $this->db->where("region_id",$region_id)->get('school')->num_rows();
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
        $items = $items->order_by("id","desc")->limit($limit,$start)->get("school")->result();
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
            if (isset($data['course_ids'])) {
                $courseids = $data['course_ids'];
                $courseinsertids = '';

                for($i=0;$i<count($courseids);$i++){
                    if ($i == count($courseids) - 1) {
                        $courseinsertids .= $courseids[$i];
                    } else {
                        $courseinsertids .= $courseids[$i].",";
                    }
                }
                $data['course_ids'] = $courseinsertids;
            }
            $this->db->where("id",$data['id']);
            $this->db->update('school',$data);
            $this->getSchool($data['id'])->uploadpicture();
        }else{
            if (isset($data['course_ids'])) {
                $courseids = $data['course_ids'];
                $courseinsertids = '';

                for($i=0;$i<count($courseids);$i++){
                    if ($i == count($courseids) - 1) {
                        $courseinsertids .= $courseids[$i];
                    } else {
                        $courseinsertids .= $courseids[$i].",";
                    }
                }
                $data['course_ids'] = $courseinsertids;
            }
            $data['course_count']   = 1;
            $data['status']   = 1;
            $data['created_time']   = date('Y-m-d H:i:s');
            $data['user_id']        = getAdminViewer()->id;
            $data['follower_count'] = 1;
            $this->db->insert('school',$data);
            $this->getSchool($this->db->insert_id())->uploadpicture();
        }
        return true;
    }

    public function getFileUrl($thumb="school"){
        if(!empty($this->filename)){
            $picture = $this->storage->setMinxer($this)->getFileName($this->filename,$thumb);
            return $picture;
        }

        return  anchorurl("media/assets/school/school_default.jpg");
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


    public function getStudentInfoList($school_id, $limit=20,$start=0,$post=array()){
        $data = array();
        $items = $this->db->select("users.id, users.name, users.username, users.status, grades.name as gradename, classes.name as classname")->from('class_user_relationship')
        ->join('users', 'users.id=class_user_relationship.user_id')
        ->join('grades', 'grades.id=class_user_relationship.grade_id')
        ->join('classes', 'classes.id=class_user_relationship.class_id')
        ->where('class_user_relationship.school_id', $school_id)->where("class_user_relationship.status",1)->where('class_user_relationship.user_type', 'student');
        if(isset($post['grade_id']) && $post['grade_id']){
            $items = $items->where("class_user_relationship.grade_id",$post['grade_id']);
        }
        if(isset($post['class_id']) && $post['class_id']){
            $items = $items->where("class_user_relationship.class_id",$post['class_id']);
        }
        if(isset($post['key']) && !empty($post['key'])){
            $items = $items->like("users.name",$post['key']);
        }

        $items = $items->limit($limit,$start)->order_by("id","asc")->get()->result();
        foreach($items as $item){
            $data[] = array(
                'id'                => $item->id,
                'name'              => $item->name,
                "username"          => $item->username,
                "status"            => $item->status,
                "gradename"         => $item->gradename,
                "classname"         => $item->classname,

            );
        }
        return $data;
    }

    public function getStudentInfo($student_id) {
        $row = $this->db->select("users.id, users.name, users.username, users.status, grades.name as gradename, classes.name as classname")->from('class_user_relationship')
            ->join('users', 'users.id=class_user_relationship.user_id')
            ->join('grades', 'grades.id=class_user_relationship.grade_id')
            ->join('classes', 'classes.id=class_user_relationship.class_id')
            ->where('class_user_relationship.user_id', $student_id)->where('class_user_relationship.user_type', 'student')->get()->row();
        $data = array(
            'id' => $row->id,
            'schoolname' => $this->name,
            'name' => $row->name,
            'username'  => $row->username,
            'gradename' => $row->gradename,
            'classname' => $row->classname
        );
        return $data;
    }

    public function getStudentDataCount($school_id, $post){
        $items = $this->db->select("class_user_relationship.id")->from('class_user_relationship')
            ->join('users', 'users.id=class_user_relationship.user_id')
            ->where('class_user_relationship.school_id', $school_id)->where("class_user_relationship.status",1)->where('class_user_relationship.user_type', 'student');
        if(isset($post['grade_id']) && $post['grade_id']){
            $items = $items->where("class_user_relationship.grade_id",$post['grade_id']);
        }
        if(isset($post['class_id']) && $post['class_id']){
            $items = $items->where("class_user_relationship.class_id",$post['class_id']);
        }

        if(isset($post['key']) && !empty($post['key'])){
            $items = $items->like("users.name",$post['key']);
        }
        return $items->get()->num_rows();
    }

    public function getTeacherInfoList($school_id, $limit=20,$start=0,$post=array()){
        $data = array();
        $items = $this->db->select("distinct(wetalk_class_user_relationship.user_id),users.id, users.name,users.username, users.mobile, users.status, teacher_attr.jobs")
            ->from('class_user_relationship')
            ->join('users', 'users.id=class_user_relationship.user_id')
            ->join('teacher_attr', 'teacher_attr.user_id=class_user_relationship.user_id', 'left')
            ->where('class_user_relationship.school_id', $school_id)
            ->where("class_user_relationship.status",1)->where('class_user_relationship.user_type', 'teacher');
        if(isset($post['startdate']) && $post['startdate']){
            $items = $items->where("users.registerDate >=", $post['startdate']);
        }
        if(isset($post['enddate']) && $post['enddate']){
            $end = $post['enddate'];
            $enddate = date('Y-m-d',strtotime("$end +1 day"));
            $items = $items->where("users.registerDate <=", $enddate);
        }
        if(isset($post['key']) && !empty($post['key'])){
            $items = $items->like("users.name",$post['key']);
        }

        $items = $items->limit($limit,$start)->order_by("id","asc")->get()->result();
        foreach($items as $item){
            $data[] = array(
                'id'                => $item->id,
                'name'              => $item->name,
                'schoolname'        => $this->name,
                "mobile"            => $item->mobile,
                "username"          =>$item->username,
                "status"            => $item->status,
                "jobs"              => $item->jobs,
                "province" 		    => $this->functions->getProvice($this->province_id),//省
                "city" 		        => $this->functions->getCity($this->city_id),       //市
                "district" 		    => $this->functions->getDistrict($this->district_id), //区
                "gradeName"         =>$this->getTeacherAdministratorClass($item->id)
            );
        }
        return $data;
    }


    public function getTeacherAdministratorClass($user_id){
        $grades =  $this->db->select('class_user_relationship.*,classes.name as ClassName,grades.name as GradeName')
            ->where("class_user_relationship.user_id",$user_id)
            ->where("class_user_relationship.status",1)
            ->join('classes', 'class_user_relationship.class_id = classes.id', 'left')
            ->join('grades', 'class_user_relationship.grade_id = grades.id', 'left')
            ->get('class_user_relationship')->result();
        $string = array();
        foreach($grades as $grade){
            $string[] = $grade->GradeName.$grade->ClassName;
        }
        return implode(',',$string);
    }

    public function getTeacherInfo($teacher_id) {
        $row = $this->db->select("users.id, users.name, users.username, users.mobile, users.status, teacher_attr.jobs")->from('class_user_relationship')
            ->join('users', 'users.id=class_user_relationship.user_id')
            ->join('teacher_attr', 'teacher_attr.user_id=class_user_relationship.user_id', 'left')
            ->join('school', 'school.id = class_user_relationship.school_id')
            ->where('class_user_relationship.user_id', $teacher_id)->where('class_user_relationship.user_type', 'teacher')->get()->row();
        $data = array(
            'id' => $row->id,
            'schoolname' => $this->name,
            'name' => $row->name,
            'username'  => $row->username,
            "mobile"          => $row->mobile,
            'jobs' => $row->jobs,
            "province" 		    => $this->functions->getProvice($this->province_id),//省
            "city" 		        => $this->functions->getCity($this->city_id),       //市
            "district" 		    => $this->functions->getDistrict($this->district_id), //区
        );
        return $data;
    }

    public function getTeacherDataCount($school_id, $post){
        $items = $this->db->select("distinct(wetalk_class_user_relationship.user_id)")->from('class_user_relationship')
            ->join('users', 'users.id=class_user_relationship.user_id')
            ->where('class_user_relationship.school_id', $school_id)->where("class_user_relationship.status",1)->where('class_user_relationship.user_type', 'teacher');
        if(isset($post['startdate']) && $post['startdate']){
            $items = $items->where("users.registerDate >=", $post['startdate']);
        }
        if(isset($post['enddate']) && $post['enddate']){
            $end = $post['enddate'];
            $enddate = date('Y-m-d',strtotime("$end +1 day"));
            $items = $items->where("users.registerDate <=", $enddate);
        }
        if(isset($post['key']) && !empty($post['key'])){
            $items = $items->like("users.name",$post['key']);
        }
        return $items->get()->num_rows();
    }

    public function getGrades($school_id) {
        if (empty($school_id)) {
            return array();
        }
        $results = $this->db->select('id, name')->from('grades')->where('school_id', $school_id)->get()->result();
        return $results;
    }

    public function getClasses($school_id, $grade_id=0) {
        if (empty($school_id) && empty($grade_id)) {
            return array();
        }
        $results = $this->db->select('id, name')->from('classes')->where('school_id', $school_id);
        if ($grade_id != 0) {
            $results = $results->where('grade_id', $grade_id);
        }
        $results = $results->get()->result();
        return $results;
    }

    public function freezeAccount($user_id) {
        $row = $this->db->select('status')->where('id', $user_id)->get('users')->row();
        if ($row != null) {
            $value = $row->status == '1' ? '0' : '1';
            $data = array(
                'status' => $value
            );

            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
        }
    }

    public function initAccountPassword($user_id) {
        $row = $this->db->select('id, username')->where('id', $user_id)->get('users')->row();
        if ($row != null) {
            $salt  = $this->wetalkuserhelper->genRandomPassword(32);
            $crypt = $this->wetalkuserhelper->getCryptedPassword('123456', $salt);
            $data = array(
                'password' => $crypt.':'.$salt
            );

            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
        }
    }
}
