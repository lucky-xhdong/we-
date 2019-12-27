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
            "region_id"          => array("require" => false),
            "filename"          => array("require" => false),
            "publishing_house_id" => array("require" => false),
            "school_key" => array("require" => false),

        );
        parent::_initialize($config);
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

    public function getFileUrl($thumb="school"){
        if(!empty($this->filename)){
            $picture = $this->storage->setMinxer($this)->getFileName($this->filename,$thumb);
            return $picture;
        }

        return  "";


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

    public function getPublishingHouse(){
        $row = $this->db->where("id",$this->publishing_house_id)->get("publishing_house")->row();
        if($row){

        }
        else {
            $row = new stdClass();
            $row->id = 0;$row->name = "";
        }
        return $row;
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
            "publishing_house_id"=>$this->publishing_house_id

        );
        return $data;
    }

    //后台使用
    public function getSchoolInfoView(){
        if(!empty($this->course_ids)){
            $this->course_count = count(explode(',',$this->course_ids));
        }else{
            $this->course_count = 0;
        }
        $data = array(
            'id'                => $this->id,
            'name'              => '<a href="'.anchorurl('AccountManage/creatComClass/'.$this->id).'">'.$this->name.'</a>',
            "username"           =>$this->getUserInfo()->name,
            "origin_name"        => $this->name,
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
            "picture_url"       => $this->getFileUrl(),
            "school_key"        => $this->school_key,
            "publishing_house_id"=>$this->publishing_house_id,
            'blockString'    => (time() < strtotime($this->end_date) && $this->block == 0 )?" <span class='state-progress'>正常</span>":"<span class='state-type'>已停用</span>",
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
            "course_ids"    => $this->course_ids,
            "sr_provider"       => $this->sr_provider,
            "picture_url"       => $this->getFileUrl(),
            "publishing_house_id"=>$this->publishing_house_id,
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
        $data = array();
        $items = $this->db->select("id")->where("region_id",$region_id)->order_by("id","desc")->get("school")->result();
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
            $data['id'] = $this->db->insert_id();
        }
        $this->getSchool($data['id'])->uploadpicture();

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


    public function importSchoolUserVersionDataList(){
        $data = array();
        $start_date = date("Y-m-d",strtotime("-15 days"));
        $region = $this->db->where("id",$this->region_id)->get("region")->row();
        if(!$region){
            $region = new stdClass();
            $region->name = "";
        }
        $query = 'select p.* from (SELECT wetalk_classes.name as ClassName, wetalk_grades.name as GradeName
,wetalk_class_user_relationship.user_id,wetalk_user_agent.agent ,wetalk_user_agent.date,wetalk_user_agent.version,wetalk_user_agent.platform,wetalk_users.name , wetalk_users.username  FROM wetalk_class_user_relationship  LEFT JOIN  wetalk_user_agent  on wetalk_class_user_relationship.user_id  = wetalk_user_agent.user_id LEFT JOIN wetalk_users on wetalk_class_user_relationship.user_id  = wetalk_users.id  LEFT JOIN wetalk_grades on wetalk_class_user_relationship.grade_id  = wetalk_grades.id  LEFT JOIN wetalk_classes
 on wetalk_class_user_relationship.class_id  = wetalk_classes.id  where wetalk_class_user_relationship.user_type = "student" and wetalk_class_user_relationship.school_id  = '.$this->id.' and wetalk_user_agent.date  >="'.$start_date.'"  and wetalk_user_agent.get_method not IN ("getStudentRankingList","getStudentMtList")   ORDER BY  wetalk_user_agent.id desc) p GROUP BY p.user_id ';
        $result = $this->db->query($query)->result();
        foreach($result as $key=>$val){
            $data[] = array(
                "序号"            => $key+1,
                "区域"            => $region->name,
                "学校名称"         => $this->name,
                "年级"            => $val->GradeName,
                "班级"            => $val->ClassName,
                "date"            =>$val->date,
                "version"         => $val->version,
                "platform"        => $val->platform,
                "name"            => $val->name,
                "username"        =>$val->username,
            );
        }

        return $data;
    }


    public function importSchoolUnusualUserList(){
        $data = array();
        $start_date = date("Y-m-d",strtotime("-15 days"));
        $region = $this->db->where("id",$this->region_id)->get("region")->row();
        if(!$region){
            $region = new stdClass();
            $region->name = "";
        }
        $query = 'select p.* from (SELECT SUM(wetalk_users_record.time) as totalTime, wetalk_classes.name as ClassName, wetalk_grades.name as GradeName
,wetalk_class_user_relationship.user_id,wetalk_users_record.date,wetalk_users.name , wetalk_users.username  FROM wetalk_class_user_relationship  LEFT JOIN  wetalk_users_record  on wetalk_class_user_relationship.user_id  = wetalk_users_record.user_id LEFT JOIN wetalk_users on wetalk_class_user_relationship.user_id  = wetalk_users.id  LEFT JOIN wetalk_grades on wetalk_class_user_relationship.grade_id  = wetalk_grades.id  LEFT JOIN wetalk_classes
 on wetalk_class_user_relationship.class_id  = wetalk_classes.id  where wetalk_class_user_relationship.user_type = "student" and wetalk_class_user_relationship.school_id  = '.$this->id.' and wetalk_users_record.date  >="'.$start_date.'" GROUP BY wetalk_users_record.date,wetalk_users_record.user_id) p where p.totalTime > 3600 ';
        $result = $this->db->query($query)->result();
        foreach($result as $key=>$val){
            $data[] = array(
                "序号"            => $key+1,
                "区域"            => $region->name,
                "学校名称"         => $this->name,
                "年级"            => $val->GradeName,
                "班级"            => $val->ClassName,
                "学习时间"            => $val->totalTime,
                "date"            =>$val->date,
                "name"            => $val->name,
                "username"        =>$val->username,
            );
        }

        return $data;
    }


    public function importSchoolUserLoginDataList(){
        $data = array();
        $start_date = date("Y-m-d",strtotime("-15 days"));
        $region = $this->db->where("id",$this->region_id)->get("region")->row();
        if(!$region){
            $region = new stdClass();
            $region->name = "";
        }
        $query = 'select p.* from (SELECT COUNT(1) as loginCount,wetalk_classes.name as ClassName, wetalk_grades.name as GradeName
,wetalk_class_user_relationship.user_id,wetalk_user_agent.agent ,wetalk_user_agent.date,wetalk_user_agent.version,wetalk_user_agent.platform,wetalk_users.name , wetalk_users.username  FROM wetalk_class_user_relationship  LEFT JOIN  wetalk_user_agent  on wetalk_class_user_relationship.user_id  = wetalk_user_agent.user_id LEFT JOIN wetalk_users on wetalk_class_user_relationship.user_id  = wetalk_users.id  LEFT JOIN wetalk_grades on wetalk_class_user_relationship.grade_id  = wetalk_grades.id  LEFT JOIN wetalk_classes
 on wetalk_class_user_relationship.class_id  = wetalk_classes.id  where wetalk_class_user_relationship.user_type = "student" and  wetalk_class_user_relationship.school_id  = '.$this->id.' and wetalk_user_agent.date  >="'.$start_date.'"  and wetalk_user_agent.get_method = "getOssInfo2"  group by wetalk_user_agent.user_id  ORDER BY  wetalk_user_agent.id desc ) p GROUP BY p.user_id ';
        $result = $this->db->query($query)->result();
        foreach($result as $key=>$val){
            $data[] = array(
                "序号"            => $key+1,
                "区域"            => $region->name,
                "学校名称"         => $this->name,
                "年级"            => $val->GradeName,
                "班级"            => $val->ClassName,
                date("m月d日",strtotime($start_date))." 至 ".date("m月d日")."登录课程次数"=> $val->loginCount,
                "date"            =>$val->date,
                "version"         => $val->version,
                "platform"        => $val->platform,
                "name"            => $val->name,
                "username"        =>$val->username,
            );
        }

        return $data;
    }


    public function importSchoolUserScoreDataList(){
        $data = array();
        $impportdte = date('Y-m-d');
        $region = $this->db->where("id",$this->region_id)->get("region")->row();
        if(!$region){
            $region = new stdClass();
            $region->name = "";
        }
        $query = 'select wetalk_user_record_result.*,wetalk_users.username ,wetalk_users.name ,wetalk_school.name  as schoolName,wetalk_grades.name  as gradeName,wetalk_classes.name  as className from wetalk_user_record_result LEFT JOIN wetalk_class_user_relationship ON wetalk_class_user_relationship.user_id  = wetalk_user_record_result.user_id LEFT JOIN wetalk_users on wetalk_user_record_result.user_id  = wetalk_users.id LEFT JOIN  wetalk_classes on  wetalk_user_record_result.class_id  = wetalk_classes.id  LEFT JOIN  wetalk_grades  on wetalk_grades.id = wetalk_user_record_result.grade_id  left join wetalk_school  on wetalk_school.id = wetalk_user_record_result.school_id  left join wetalk_region  on wetalk_school.region_id = wetalk_region.id  where wetalk_class_user_relationship.user_type = "student" and wetalk_school.id = '.$this->id.' and   wetalk_user_record_result.start_date ="'.$impportdte.'" ';
        $result = $this->db->query($query)->result();
        foreach($result as $key=>$val){
            $data[] = array(
                "序号"            => $key+1,
                "区域"            => $region->name,
                "学校名称"         => $this->name,
                "年级"            => $val->gradeName,
                "班级"            => $val->className,
                "姓名"            => $val->name,
                "用户名"           => $val->username,
                "日期"            =>  $impportdte,
                "学习效果"         => $val->studyReuslt,
                "时间与频率"       => $val->StudyTimeAndFrequency,
                "学习进度"         => $val->studyCourseAverage,
                "技能情况"         => $val->SkillAverage,
                "学习方法"         => $val->StudyComprehensive,
                "总分"            => $val->totalScore
            );
        }

        return $data;
    }

    public function importSchoolClassScoreDataList(){
        $data = array();
        $impportdte = date('Y-m-d');
        $region = $this->db->where("id",$this->region_id)->get("region")->row();
        if(!$region){
            $region = new stdClass();
            $region->name = "";
        }
        $classes = $this->db->select("id,name")->where("school_id",$this->id)->get("classes")->result();
        foreach($classes as $key=> $classe){
            $query = 'select  AVG(wetalk_user_record_result.totalScore) AS totalScore, AVG(wetalk_user_record_result.StudyComprehensive) AS StudyComprehensive, AVG(wetalk_user_record_result.SkillAverage) AS SkillAverage, AVG(wetalk_user_record_result.studyCourseAverage) AS studyCourseAverage, AVG(wetalk_user_record_result.studyReuslt) AS studyReuslt,AVG(wetalk_user_record_result.StudyTimeAndFrequency) AS StudyTimeAndFrequency,wetalk_grades.name  as gradeName from wetalk_user_record_result LEFT JOIN  wetalk_classes on  wetalk_user_record_result.class_id  = wetalk_classes.id  LEFT JOIN  wetalk_grades  on wetalk_grades.id = wetalk_user_record_result.grade_id  where  wetalk_classes.id = '.$classe->id.' and   wetalk_user_record_result.start_date ="'.$impportdte.'" ';
            $val = $this->db->query($query)->row();
            $data[] = array(
                "序号"            => $key+1,
                "区域"            => $region->name,
                "学校名称"         => $this->name,
                "年级"            =>  $val->gradeName?$val->gradeName:"",
                "班级"            =>  $classe->name,
                "日期"            =>  $impportdte,
                "学习效果"         => $val->studyReuslt? round($val->studyReuslt,2):0,
                "时间与频率"       => $val->StudyTimeAndFrequency?  round($val->StudyTimeAndFrequency,2):0,
                "学习进度"         => $val->studyCourseAverage? round($val->studyCourseAverage,2):0,
                "技能情况"         => $val->SkillAverage? round($val->SkillAverage,2):0,
                "学习方法"         => $val->StudyComprehensive?  round($val->StudyComprehensive,2):0,
                "总分"            => $val->totalScore?  round($val->totalScore,2):0
            );
        }
        return $data;
    }

}  
