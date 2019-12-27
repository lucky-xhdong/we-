<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);

set_time_limit(0);
class Analysis extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('article');
        $this->load->model('category');
        $this->load->model('functions');
        $this->load->model('region');
        $this->load->model('school');
        $this->load->model('course');
        $this->load->model('classes');
        $this->load->model('lesson');
        $this->load->model('calculationrecord');
        $this->load->model('recordmanager');
        $this->load->model('publishing_house');
        $this->load->model('publish_hourse_course_unit');


        if(!getAdminViewer()->id){
            redirect('login');
        }else{
            $permissions = getAdminViewer()->getUserRolePermission();
            $permission_urls = array();
            foreach($permissions as $permission){
                $permission_urls[] = $permission->url;
            }
            if(!in_array("/analysis/",$permission_urls)){
                redirect('error');
            }
        }
    }

//    public function index(){
//        $data['data1'] = array(5, 20, 36, 10, 10,20);
//        $this->load->view('wePlatForm/analysis',$data);
//    }


    public function index(){
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();
        $data['data1'] = array(5, 20, 36, 10, 10,20);
        $data['regions'] = $this->region->getRegionListObject(0,0);
        if(count($data['regions']) > 0){
            $data['schools'] = $this->school->getSchoolList($data['regions'][0]->id,0);
        }else{
            $data['schools'] = array();
        }

        if(count($data['schools']) > 0){
            $data['grades'] = $this->classes->getGradeBySchoolIdList($data['schools'][0]->id,0);
        }else{
            $data['grades'] = array();
        }

        if(count($data['grades']) > 0){
            $data['classes'] = $this->classes->getClassGradeList($data['grades'][0]->id);
        }else{
            $data['classes'] = array();
        }

        $this->load->view('wePlatForm/learning_situation',$data);
    }

    public function dataCompare(){
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();
        $data['data1'] = array(5, 20, 36, 10, 10,20);
        $data['regions'] = $this->region->getRegionListObject(0,0);
        if(count($data['regions']) > 0){
            $data['schools'] = $this->school->getSchoolList($data['regions'][0]->id,0);
        }else{
            $data['schools'] = array();
        }

        if(count($data['schools']) > 0){
            $data['grades'] = $this->classes->getGradeBySchoolIdList($data['schools'][0]->id,0);
        }else{
            $data['grades'] = array();
        }

        if(count($data['grades']) > 0){
            $data['classes'] = $this->classes->getClassGradeList($data['grades'][0]->id);
        }else{
            $data['classes'] = array();
        }

        $this->load->view('wePlatForm/dataCompare',$data);
    }


    public function trendCompare(){
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();
        $data['data1'] = array(5, 20, 36, 10, 10,20);
        $data['regions'] = $this->region->getRegionListObject(0,0);
        if(count($data['regions']) > 0){
            $data['schools'] = $this->school->getSchoolList($data['regions'][0]->id,0);
        }else{
            $data['schools'] = array();
        }

        if(count($data['schools']) > 0){
            $data['grades'] = $this->classes->getGradeBySchoolIdList($data['schools'][0]->id,0);
        }else{
            $data['grades'] = array();
        }

        if(count($data['grades']) > 0){
            $data['classes'] = $this->classes->getClassGradeList($data['grades'][0]->id);
        }else{
            $data['classes'] = array();
        }

        $this->load->view('wePlatForm/trendCompare',$data);
    }

    public function getRegionSchoolList($region_id){
        $data['schools'] = $this->school->getSchoolList($region_id,0);
        if(count($data['schools']) > 0){
            $data['grades'] = $this->classes->getGradeBySchoolIdList($data['schools'][0]->id,0);
        }else{
            $data['grades'] = array();
        }

        if(count($data['grades']) > 0){
            $data['classes'] = $this->classes->getClassGradeList($data['grades'][0]->id);
        }else{
            $data['classes'] = array();
        }
        echo json_encode($data);
    }

    public function getSchoolGradeList($school_id)
    {
        $data['grades'] = $this->classes->getGradeBySchoolIdList($school_id, 0);
        if (count($data['grades']) > 0) {
            $data['classes'] = $this->classes->getClassGradeList($data['grades'][0]->id);
        } else {
            $data['classes'] = array();
        }
        echo json_encode($data);
    }


    public function getGradeClassList($grade_id)
    {
        $data['classes'] = $this->classes->getClassGradeList($grade_id);
        echo json_encode($data);
    }

    public function early_warning(){
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();
        $data['regions'] = $this->region->getRegionListObject(0,0);
        if(count($data['regions']) > 0){
            $data['schools'] = $this->school->getSchoolList($data['regions'][0]->id,0);
        }else{
            $data['schools'] = array();
        }

        if(count($data['schools']) > 0){
            $data['grades'] = $this->classes->getGradeBySchoolIdList($data['schools'][0]->id,0);
        }else{
            $data['grades'] = array();
        }

        if(count($data['grades']) > 0){
            $data['classes'] = $this->classes->getClassGradeList($data['grades'][0]->id);
        }else{
            $data['classes'] = array();
        }

        $this->load->view('wePlatForm/early_warning',$data);
    }


    public function getArticleList(){
        $page  = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        $catid = $this->input->get("catid")?$this->input->get("catid"):0;
        echo json_encode(array(
            'items'=>$this->article->getArticleForList($catid,$limit,($page-1)*$limit),
            'totalCount'=>$this->article->getArticleForListCount($catid),
        ));
    }

    public function getContent($id){
        $data['article'] = $this->article->getarticleDetail($id);
        $this->load->view('wePlatForm/tmpl/articleDetail',$data);
    }

    public function save(){
        $post = $this->input->post();
      //  var_dump($post);exit;
        if(isset($post['region_id']) && count($post['region_id']) > 0){
            $post['region_ids'] = implode(",",$post['region_id']);
        }
        unset($post['region_id']);
        $id = $this->article->saveArticle($post);

        redirect("contents");
    }



    public function add($id =0){
        $data = array();

        $data['provinces'] = $this->functions->getProviceList();
        if($id != 0 ){
            $data['article'] = $this->article->getarticleDetail($id);
            $data['citys'] = $this->functions->getCityList($data['article']->province_id);
            $data['districts'] = $this->functions->getAreaList($data['article']->city_id);
        }else{
            $data['citys'] = $this->functions->getCityList();
            $data['districts'] = $this->functions->getAreaList();
        }
        $paramter['province_id'] =  $data['provinces'][0]->province_id;
        $paramter['city_id'] =  $data['citys'][0]->city_id;
        $paramter['district_id'] =  $data['districts'][0]->district_id;
        $data['regions'] = $this->region->getRegionInfoList(1000,0,$paramter);
        $data['categorys'] = $this->category->getPlatformCategoryList();
        $this->load->view('wePlatForm/content',$data);
    }


    public function getRegionList(){
        $data = $this->input->post();
        echo json_encode($this->region->getRegionInfoList(1000,0,$data));
    }


    public function calculationUserResult(){
        $this->calculationrecord->calculationUserResult();
        echo "success";
    }


    public function  gettotalScoreNumOfUser($grade_id){
        $data = $this->calculationrecord->gettotalScoreNumOfUser($grade_id);
        echo json_encode($data);
    }

    public function  getColligationScoreNumOfUser($grade_id){
        $data = $this->calculationrecord->getColligationScoreNumOfUser($grade_id);
        echo json_encode($data);
    }


    public function  getGoodScoreNumOfUser($grade_id){
        $data = $this->calculationrecord->getGoodScoreNumOfUser($grade_id);
        echo json_encode($data);
    }

    public function  gettotalLoginUserOfUser($grade_id){
        $data = $this->calculationrecord->gettotalLoginUserOfUser($grade_id);
        echo json_encode($data);
    }

     //数据比较
    public function  getdataComparetotalLoginUserOfUser($grade_id){
        $get  = $this->input->get();
        if(!isset($get['study_action']) || $get['study_action'] == 0) $get['study_action'] = 1;
        if(($get['study_action'] == 1 || $get['study_action'] == 2)){
            $data = $this->calculationrecord->getCategorytotalLoginUserOfUser($grade_id);
        }else{
            $data = $this->calculationrecord->getCategorytotalOutstandingUserOfUser($grade_id);
        }
        echo json_encode($data);
    }

    public function  getdataComparetotalOutstandingUserOfUser($grade_id){
        $get  = $this->input->get();
        if(!isset($get['study_action']) || $get['study_action'] == 0) $get['study_action'] = 1;
        if(($get['study_action'] == 1)){
            $data = $this->calculationrecord->getCategorytotalOutstandingUserOfUser1($grade_id);
        }else if($get['study_action'] == 2){
            $data = $this->calculationrecord->getCategotyAvgscoreScoreNumOfUser($grade_id);
        }else{
            $data = $this->calculationrecord->getCategorytotalPassUserOfUser1($grade_id);
        }
        echo json_encode($data);
    }

    //学习计划达标率
    public function  getPlanScoreNumOfUser($grade_id){
        $data = $this->calculationrecord->gettotalOutstandingUserOfUser($grade_id);
        echo json_encode($data);
    }


    public function  gettotalOutstandingUserOfUser($grade_id){
        $data = $this->calculationrecord->gettotalOutstandingUserOfUser($grade_id);
        echo json_encode($data);
    }

    public function  getLowscoreScoreNumOfUser($grade_id){
        $data = $this->calculationrecord->getLowscoreScoreNumOfUser($grade_id);
        echo json_encode($data);
    }

    public function getAvgscoreScoreNumOfUser($grade_id){
        $data = $this->calculationrecord->getAvgscoreScoreNumOfUser($grade_id);
        echo json_encode($data);
    }

    //老师 444444 区域领导 555555  校长  666666 教研员 7777777

    public function getWaringData(){
        $post = $this->input->post();
        $data['role'] = getAdminViewer()->getUserRole();
        if(in_array($data['role']->type,array(444444,666666,7777777)));
        if(isset($post['school_id']) && $post['school_id'] == 91){
            $data['region_school_info'] = getAdminViewer()->getPlatFormAccountRegion();
            $data['good_user'] = 12;
            $data['good_user_three'] =3;
            $data['good_plan_user_count'] = 25;
            $data['not_good_user_count'] = 11;
            $data['no_login_count'] = 6;
            $data['poor_user_count'] = 1;
            $data['poor_user_count_20'] = 7;
        }else{
            $data['region_school_info'] = getAdminViewer()->getPlatFormAccountRegion();
            $data['good_user'] = $this->getGoodUserCount($post);
            $data['good_user_three'] = $this->getGoodUserthreeCount($post);
            $data['good_plan_user_count'] = $this->getGoodPlanUserCount($post);
            $data['not_good_user_count'] = $this->getNotGoodUserCount($post);
            $data['no_login_count'] = $this->getnotLoingUserCount($post);
            $data['poor_user_count'] = $this->getpoorUserCount($post);
            $data['poor_user_count_20'] = $this->getpoorUserCount($post);
        }
        echo json_encode($data);


    }

    //成绩下降英语10名
    public function getpoorUserCount($post){
        $item = $this->db;
        if(!isset($post['school_id']) || empty($post['school_id'])) $post['school_id'] = 0;
        if(isset($post['school_id']) && !empty($post['school_id'])){
            $item = $item->where("school_id",$post['school_id']);
        }
        if(isset($post['grade_id']) && !empty($post['grade_id'])){
            $item = $item->where("grade_id",$post['grade_id']);
        }
        if(isset($post['class_id']) && !empty($post['class_id'])){
            $item = $item->where("class_id",$post['class_id']);
        }
        $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
        $item = $item->where("start_date",$month_frist_day);
        return $item->where("totalScore <",60)->get("user_record_result")->num_rows();
    }


    public function toIdArray($objects=array()){
        $data = array();
        foreach($objects as $object){
            $data[] = $object->id;
        }
        return $data;
    }


    public function getnotLoingUserCount($post){
        if(!isset($post['school_id']) || empty($post['school_id'])) $post['school_id'] = 0;
        $item = $this->db->select("user_id as id");
        $item = $item->where("school_id",$post['school_id']);
        if(isset($post['grade_id']) && !empty($post['grade_id'])){
            $item = $item->where("grade_id",$post['grade_id']);
        }
        if(isset($post['class_id']) && !empty($post['class_id'])){
            $item = $item->where("class_id",$post['class_id']);
        }

        $relations = $item->get("class_user_relationship")->result();
        $end_time       = date('Y-m-d');
        $start_date    = date('Y-m-d',strtotime($end_time. '-7 days'));
        if(count($relations)){
            $userCount = $this->db->where_in("id",$this->toIdArray($relations))->where("lastvisitDate >",$start_date)->where("lastvisitDate <=",$end_time)->get("users")->num_rows();
        }else{
            $userCount = 0;
        }
        return count($relations) - $userCount;
    }


    //获取优秀学生数
    public function getNotGoodUserCount($post){
        if(!isset($post['school_id']) || empty($post['school_id'])) $post['school_id'] = 0;
        $item = $this->db;
        $item = $item->where("school_id",$post['school_id']);
        if(isset($post['grade_id']) && !empty($post['grade_id'])){
            $item = $item->where("grade_id",$post['grade_id']);
        }
        if(isset($post['class_id']) && !empty($post['class_id'])){
            $item = $item->where("class_id",$post['class_id']);
        }
        $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
        $item = $item->where("start_date",$month_frist_day);
        return $item->where("totalScore <",60)->get("user_record_result")->num_rows();
    }

    //获取优秀学生数
    public function getGoodUserCount($post){
        if(!isset($post['school_id']) || empty($post['school_id'])) $post['school_id'] = 0;
        $item = $this->db;
        $item = $item->where("school_id",$post['school_id']);
        if(isset($post['grade_id']) && !empty($post['grade_id'])){
            $item = $item->where("grade_id",$post['grade_id']);
        }
        if(isset($post['class_id']) && !empty($post['class_id'])){
            $item = $item->where("class_id",$post['class_id']);
        }
        $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
        $item = $item->where("start_date",$month_frist_day);
       return $item->where("totalScore >=",85)->get("user_record_result")->num_rows();
    }



    //获取连续三次优秀学生数
    public function getGoodUserthreeCount($post){
        if(!isset($post['school_id']) || empty($post['school_id'])) $post['school_id'] = 0;
        $item = $this->db;
        $item = $item->where("school_id",$post['school_id']);
        if(isset($post['grade_id']) && !empty($post['grade_id'])){
            $item = $item->where("grade_id",$post['grade_id']);
        }
        if(isset($post['class_id']) && !empty($post['class_id'])){
            $item = $item->where("class_id",$post['class_id']);
        }
        $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
        $item = $item->where("start_date",$month_frist_day);
        return $item->where("totalScore >=",85)->get("user_record_result")->num_rows();
    }


    //获取学习计划打标
    public function getGoodPlanUserCount($post){
        if(!isset($post['school_id']) || empty($post['school_id'])) $post['school_id'] = 0;
        $item = $this->db;
        $item = $item->where("school_id",$post['school_id']);
        if(isset($post['grade_id']) && !empty($post['grade_id'])){
            $item = $item->where("grade_id",$post['grade_id']);
        }
        if(isset($post['class_id']) && !empty($post['class_id'])){
            $item = $item->where("class_id",$post['class_id']);
        }
        $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));
        $item = $item->where("start_date",$month_frist_day);
        return $item->where("totalScore >=",85)->get("user_record_result")->num_rows();
    }


    public function getClasssStudyDataList(){
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();
        $data['regions'] = $this->region->getRegionListObject(0,0);
        if(count($data['regions']) > 0){
            $data['schools'] = $this->school->getSchoolList($data['regions'][0]->id,0);
        }else{
            $data['schools'] = array();
        }

        if(count($data['schools']) > 0){
            $data['grades'] = $this->classes->getGradeBySchoolIdList($data['schools'][0]->id,0);
        }else{
            $data['grades'] = array();
        }

        if(count($data['grades']) > 0){
            $data['classes'] = $this->classes->getClassGradeList($data['grades'][0]->id);
        }else{
            $data['classes'] = array();
        }

        $this->load->view('wePlatForm/classData',$data);
    }


    public function getClassUserScoreDataList(){
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        $data = $this->input->get();
        echo json_encode(array(
            'items'=>$this->classes->getClassUserScoreDataList($limit,$limit*($page-1),$data['class_id']),
            'totalCount'=>$this->classes->geClassUserScoreDataCount($data['class_id']),
        ));
    }


    public function initAccountPassword($user_id) {
        $this->school->initAccountPassword($user_id);
        echo json_encode($this->returncode);
    }

    public function getClassCourseList($class_id =0){
        $data['courseDetail']  = array();
        if($class_id != 0){
            $class = $this->classes->getClass($class_id);
            $data['courseDetail'] = $this->course->getAdminPublishCoursesDetails(null,$class)->returncode['data'];
        }
        echo json_encode($data);
    }


    public function getLevelCourseUnitList($publishing_house_courses_id =0,$level_id=0){
        $data['units']  = array();
        if($publishing_house_courses_id != 0){
            $data['units'] = $this->publish_hourse_course_unit->getAdminUnitsInfo($publishing_house_courses_id,null,$level_id);
        }
        echo json_encode($data);

    }

    public function getLessonList($unit_id=0){
        $data['lessons'] = $this->lesson->getLessonList(null,$unit_id)->returncode['data'];
        echo json_encode($data);
    }


}


