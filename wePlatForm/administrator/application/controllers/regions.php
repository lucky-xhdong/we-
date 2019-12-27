<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regions extends CI_Controller {

    public $permission_url = array();
    function __construct(){
        parent::__construct();
        $this->load->model('amoeba');
        $this->load->model('region');
        $this->load->model('grades');
        $this->load->model('group');
        $this->load->model('classes');
        $this->load->model('course');
        $this->load->model('lesson');
        $this->load->model('courseauth');
        $this->load->model('wetalkfile');
        $this->load->model('school');
        $this->load->model('regionbusinessplan');
        $this->load->model('regioneducationplan');
        $this->load->model('regionoperateplan');
        if(!getAdminViewer()->id){
            redirect('login');
        }else{
            $permissions = getAdminViewer()->getUserRolePermission();
            foreach($permissions as $permission){
                $this->permission_url = $permission->url;
            }

            if($this->userpermission->hasPermissions(getAdminViewer(),array_keys($this->region->initPermission())) === false){
                redirect('error');
            }
        }
    }

//账号管理--學校
    public function index(){
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();

        $this->load->view('wePlatForm/regions',$data);
    }

       /*
        *
        *
        *  $type : view 查看,business 商务,education 教学, operate 运营
        *
        * */
    public function detail($region_id=0,$type="view"){
        $role = getAdminViewer()->getUserRole();
        if($role->type == "111111"){
            $data['type'] ="business";
        }else if($role->type == "222222"){
            $data['type'] ="operate";
        }else if($role->type == "333333"){
            $data['type'] ="education";
        }else{
            $data['type'] ="view";
        }
        $data['region'] = $this->region->getregion($region_id);
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList($data['region']->province_id);
        $data['districts'] = $this->functions->getAreaList($data['region']->city_id);
        $data['businessusers'] = $this->user->getPlatformRoleUsers()->returncode['data'];
        $data['schools'] = $this->school->getSchoolList($region_id);

        $this->load->view('wePlatForm/regions_business',$data);
    }

    //商务
    public function business($region_id=0){
        $data['region'] = $this->region->getregion($region_id);
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList($data['region']->province_id);
        $data['districts'] = $this->functions->getAreaList($data['citys'][0]->city_id);
        $data['businessusers'] = $this->user->getPlatformRoleUsers()->returncode['data'];
        $data['schools'] = $this->school->getSchoolList($region_id);
        redirect("regions");

        $this->load->view('wePlatForm/regions_business',$data);
    }
    public function education($region_id=0){
        $data['region'] = $this->region->getregion($region_id);
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList($data['region']->province_id);
        $data['districts'] = $this->functions->getAreaList($data['citys'][0]->city_id);
        $data['businessusers'] = $this->user->getPlatformRoleUsers()->returncode['data'];
        $data['schools'] = $this->school->getSchoolList($region_id);
        redirect("regions");

        $this->load->view('wePlatForm/regions_business',$data);
    }


    public function getRegionBusinessInfo($business_id =0){
        $data['business']  =  $this->region->getRegionBusinessInfo($business_id);
        $this->load->view('wePlatForm/tmpl/regionBusinessFormEdit',$data);
    }

    public function addRegionBusiness($region_id=0){
        $region = $this->region->getregion($region_id);
        $data = $this->input->post();
        $regionBusiness = $region->addRegionBusiness($data);
        $region->uploadRegionBusinessFile($regionBusiness);
        echo json_encode($regionBusiness);
    }



    public function getRegionServicePlanInfo($service_plan_id =0,$region_id=0){
        $data['regionServicePlan']  = $this->region->getRegionServicePlan($service_plan_id);
        if($data['regionServicePlan']){
            $data['region'] = $this->region->getregion($data['regionServicePlan']->region_id);
            $data['schools'] = $this->school->getSchoolList($data['regionServicePlan']->region_id);

        }else{
            $data['region'] = $this->region->getregion($region_id);
            $data['schools'] = $this->school->getSchoolList($region_id);
        }
        $this->load->view('wePlatForm/tmpl/RegionServicePlanInfo',$data);
    }


    public function addRegionServicePlan($region_id=0){
        $region = $this->region->getregion($region_id);
        $data = $this->input->post();
        $regionServicePlan = $region->addRegionServicePlan($data);
        $region->uploadRegionServicePlanFile($regionServicePlan);
        echo json_encode($regionServicePlan);
    }


    public function getRegionServicePlanList($region_id = 0){
        $region = $this->region->getregion($region_id);
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$region->getRegionServicePlanList($limit,($page-1)*$limit,$this->input->get("status")),
            'totalCount'=>$region->getRegionServicePlanCount($this->input->get("status")),
        ));
    }

    public function getRegionServiceInfo($report_id =0,$region_id=0){
        $data['region'] = $this->region->getregion($region_id);
        $data['schools'] = $this->school->getSchoolList($region_id);
        $data['report']  =  $this->region->getRegionServiceInfo($report_id);
        $this->load->view('wePlatForm/tmpl/regionServiceFormEdit',$data);
    }



    public function addRegionServiceReport($region_id=0){
        $region = $this->region->getregion($region_id);
        $data = $this->input->post();
        $regionServicePlan = $region->addRegionServiceReport($data);
        $region->uploadRRegionServiceReportFile($regionServicePlan);
        echo json_encode($regionServicePlan);
    }


    public function getRegionServiceReportList($region_id = 0){
        $region = $this->region->getregion($region_id);
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$region->getRegionServiceReportList($limit,($page-1)*$limit),
            'totalCount'=>$region->getRegionServiceReportCount(),
        ));
    }


    public function addTeachingAchievement($region_id=0){
        $region = $this->region->getregion($region_id);
        $data = $this->input->post();
        $regionServicePlan = $region->addRegionTeachingAchievement($data);
        $region->uploadRRegionTeachingAchievementFile($regionServicePlan);
        echo json_encode($regionServicePlan);
    }


    public function getTeachingAchievementList($region_id = 0){
        $region = $this->region->getregion($region_id);
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$region->getRegionTeachingAchievementList($limit,($page-1)*$limit),
            'totalCount'=>$region->getRegionTeachingAchievementCount(),
        ));
    }

   /*
    * 教学计划
    *
    * */

    public function getRegionEducationPlanInfo($education_plan_id =0,$region_id=0){
        $data['regionEducationPlan']  = $this->region->getRegionEducationPlanInfo($education_plan_id);
        if($data['regionEducationPlan']){
            $data['region'] = $this->region->getregion($data['regionEducationPlan']->region_id);
            $data['schools'] = $this->school->getSchoolList($data['regionEducationPlan']->region_id);

        }else{
            $data['region'] = $this->region->getregion($region_id);
            $data['schools'] = $this->school->getSchoolList($region_id);
        }
        $this->load->view('wePlatForm/tmpl/RegionEducationPlanInfo',$data);
    }

    public function addRegionEducationPlan($region_id=0){
        $region = $this->region->getregion($region_id);
        $data = $this->input->post();
        $regionServicePlan = $region->addRegionEducationPlan($data);
        $region->uploadRegionEducationPlanFile($regionServicePlan);
        echo json_encode($regionServicePlan);
    }


    public function getRegionEducationPlanList($region_id = 0){
        $region = $this->region->getregion($region_id);
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$region->getRegionEducationPlanList($limit,($page-1)*$limit,$this->input->get("status")),
            'totalCount'=>$region->getRegionEducationPlanCount($this->input->get("status")),
        ));
    }



    /*
   * 运营计划
   *
   * */



    public function getRegionOperatePlanInfo($operate_plan_id =0,$region_id=0){
        $data['regionOperatePlan']  = $this->region->getRegionOperatePlanInfo($operate_plan_id);
        if($data['regionOperatePlan']){
            $data['region'] = $this->region->getregion($data['regionOperatePlan']->region_id);
            $data['schools'] = $this->school->getSchoolList($data['regionOperatePlan']->region_id);

        }else{
            $data['region'] = $this->region->getregion($region_id);
            $data['schools'] = $this->school->getSchoolList($region_id);
        }
        $this->load->view('wePlatForm/tmpl/RegionOperatePlanInfo',$data);
    }

    public function addRegionOperatePlan($region_id=0){
        $region = $this->region->getregion($region_id);
        $data = $this->input->post();
        $regionServicePlan = $region->addRegionOperatePlan($data);
        $region->uploadRegionOperatePlanFile($regionServicePlan);
        echo json_encode($regionServicePlan);
    }


    public function getRegionOperatePlanList($region_id = 0){
        $region = $this->region->getregion($region_id);
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$region->getRegionOperatePlanList($limit,($page-1)*$limit,$this->input->get("status")),
            'totalCount'=>$region->getRegionOperatePlanCount($this->input->get("status")),
        ));
    }


    //商务
    public function view(){
        redirect("regions");
        $this->load->view('wePlatForm/regions_business');
    }

    public function getfilelist($region_id=0,$type="region_document"){
        $lesson = new stdClass();
        $lesson->id = $region_id;
        $lesson->object_type = $type;
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):5;
        $data['items'] = $this->wetalkfile->setMinxer($lesson)->getLessonFileList($limit,($page-1)*$limit)->returncode['data'];
        $data['totalCount'] = $this->wetalkfile->setMinxer($lesson)->getFilesCount();
        echo json_encode($data);
    }

    public function getRegionInfo($school_id){
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();
        $data['region'] = $this->region->getregion($school_id);
        $this->load->view('tmpl/regionBasicEdit',$data);
    }

    public function getRegionList(){

        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        $data = $this->input->get();
        echo json_encode(array(
            'items'=>$this->region->getRegionInfoList($limit,($page-1)*$limit,$data),
            'totalCount'=>$this->region->getRegionDataCount($data),
        ));
    }


    public function getRegionBusinessList($region_id = 0){
        $region = $this->region->getregion($region_id);
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$region->getRegionBusinessList($limit,($page-1)*$limit),
            'totalCount'=>$region->getRegionBusinessListCount(),
        ));
    }


    public function getLessonList(){

        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        $unit_id = $this->input->get("unit_id")?$this->input->get("unit_id"):0;
        $user_id = $this->input->get("user_id")?$this->input->get("user_id"):0;
        $data = $this->input->get();
        $user = $this->user->getUser($user_id);
        echo json_encode(array(
            'items'=>$this->lesson->getLessonList($user,$unit_id)->returncode['data'],
            'totalCount'=>$this->lesson->getLessonCount($unit_id),
        ));
    }


    public function unChainUserLesson(){
        $post = $this->input->post();
        $users = array();
        if(isset($post['user_ids']) && isset($post['lesson_ids'])) {
            if(!empty($post['lesson_ids'])){
                $lessonIds = explode(',', $post['lesson_ids']);
            }else{
                $lessonIds = array();
            }

            if(!empty($post['user_ids'])){
                $userIds = explode(',', $post['user_ids']);
            }else{
                $userIds = array();
            }
            $lessons = array();
            foreach ($userIds as $userId) {
                $users[] = $this->user->getUser($userId);
            }
            foreach ($lessonIds as $lessonId) {
                $lessons[] = $this->lesson->getLesson($lessonId);
            }
            $return =  $this->courseauth->serverunChainUserLesson(getAdminViewer(),$users, $lessons, $post['course_id'],$post['unit_id'],$post);
            echo json_encode($return->returncode);
        }
        echo json_encode($this->returncode);
    }



    public function unChainAllCourse(){
        $post = $this->input->post();
        $users = array();
        if(isset($post['user_ids'])) {
            if(!empty($post['user_ids'])){
                $userIds = explode(',', $post['user_ids']);
            }else{
                $userIds = array();
            }
            foreach ($userIds as $userId) {
                $users[] = $this->user->getUser($userId);
            }
            $return =  $this->courseauth->unChainAllCourse(getAdminViewer(),$users,$post['course_id'],$post);
            echo json_encode($return->returncode);
        }
        echo json_encode($this->returncode);
    }


    public function saveChainAllCourse(){
        $post = $this->input->post();
        $users = array();
        if(isset($post['user_ids'])) {
            if(!empty($post['user_ids'])){
                $userIds = explode(',', $post['user_ids']);
            }else{
                $userIds = array();
            }
            foreach ($userIds as $userId) {
                $users[] = $this->user->getUser($userId);
            }
            $return =  $this->courseauth->saveChainAllCourse(getAdminViewer(),$users,$post['course_id'],$post);
            echo json_encode($return->returncode);
        }
        echo json_encode($this->returncode);
    }


    public function unChainAllCourseUnit(){
        $post = $this->input->post();
        $users = array();
        if(isset($post['user_ids']) ) {
            if(!empty($post['user_ids'])){
                $userIds = explode(',', $post['user_ids']);
            }else{
                $userIds = array();
            }
            foreach ($userIds as $userId) {
                $users[] = $this->user->getUser($userId);
            }
            $return =  $this->courseauth->unChainAllCourseUnit(getAdminViewer(),$users,$post['course_id'],$post['unit_id'],$post);
            echo json_encode($return->returncode);
        }
        echo json_encode($this->returncode);
    }


    public function saveChainAllCourseUnit(){
        $post = $this->input->post();
        $users = array();
        if(isset($post['user_ids'])) {
            if(!empty($post['user_ids'])){
                $userIds = explode(',', $post['user_ids']);
            }else{
                $userIds = array();
            }
            foreach ($userIds as $userId) {
                $users[] = $this->user->getUser($userId);
            }
            $return =  $this->courseauth->saveChainAllCourseUnit(getAdminViewer(),$users,$post['course_id'],$post['unit_id'],$post);
            echo json_encode($return->returncode);
        }
        echo json_encode($this->returncode);
    }


    public function setUserAuthTime(){
        $data = $this->input->post();
        $user = $this->user->getUser($data['user_id']);
        if(isset($user->id) && !empty($user)) $user->setSchoolTime($data);
        echo json_encode($this->returncode);
    }

    public function setUserHomeAuthTime(){
        $data = $this->input->post();
        $user = $this->user->getUser($data['user_id']);
        if(isset($user->id) && !empty($user)) $user->setSchoolHomeTime($data);
        echo json_encode($this->returncode);
    }

    public function setRegionHomeAuthTime(){
        $data = $this->input->post();
        $region = $this->region->getRegion($data['school_id']);
        if(isset($region->id) && !empty($region)) $region->setRegionTime($data);
        echo json_encode($this->returncode);
    }

    public function DeleteRegion(){
        $data = $this->input->post();
        $region = $this->region->getRegion($data['region_id']);
        if(isset($region->id) && !empty($region)) $region->delete();
        echo json_encode($this->returncode);
    }

    public function setRegionBlock(){
        $data = $this->input->post();
        $region = $this->region->getRegion($data['region_id']);
        if(isset($region->id) && !empty($region)) $region->updateKey(array('status'=>$data['status']));
        echo json_encode($this->returncode);
    }


    public function setUserBlock(){
        $data = $this->input->post();
        $user = $this->user->getUser($data['userid']);
        if(isset($user->id) && !empty($user)) $user->updateKey(array('block'=>$data['block']));
        echo json_encode($this->returncode);
    }

    public function DeleteUserSchoolRelationShip(){
        $data = $this->input->post();
        $user = $this->user->getUser($data['userid']);
        if(isset($user->id) && !empty($user)) $user->DeleteUserSchoolRelationShip($data);
        echo json_encode($this->returncode);
    }

    public function addGrades($school_id=0){
        $this->grades->save($this->input->post());
        echo json_encode($this->grades->getGradeInfoList($school_id));

    }

    public function getGrades($school_id=0){
        echo json_encode($this->grades->getGradeInfoList($school_id));
    }

    public function deleteGrade($school_id=0){
        $this->grades->delete($this->input->post());
        echo json_encode($this->grades->getClassInfoList($school_id));

    }

    public function addClass($school_id=0){
        $this->classes->save($this->input->post());
        echo json_encode($this->classes->getClassInfoList($school_id));

    }

    public function getClass($grade_id=0){
        echo json_encode($this->classes->getClassInfoList($grade_id));
    }

    public function deleteClass($school_id=0){
        $this->classes->delete($this->input->post());
        echo json_encode($this->classes->getClassInfoList($school_id));
    }

    public function getUserInfo($id,$school_id)
    {
        $data['user'] = $this->user->getUser($id);
        $data['grades'] = $this->grades->getGradeInfoList($school_id);
        $userRelation = $data['user']->getUserSchoolGradeClassRealtionShip();
        if (isset($userRelation->id)) {
            $data['classes'] = $this->classes->getClassInfoList($userRelation->grade_id);
        } else {
            $data['classes'] = array();
        }
        $data['school_id1'] = $school_id;
        $data['userRelation'] = $userRelation;
        $data['courses'] = $this->course->getCourseList()->returncode['data'];
        if (!empty($data['user']->course_ids)) {
            $coursearry = explode(",", $data['user']->course_ids);
        } else {
            $coursearry = array();
        }
        foreach ($data['courses'] as $key=> $course) {
            if (in_array($course["id"],$coursearry)){
                $data['courses'][$key]['isSelected'] = 1;
            }else{
                $data['courses'][$key]['isSelected'] = 0;
            }
        }

        $this->load->view('tmpl/userBasicEdit',$data);
    }



    public function getClassFollowerList(){
        $data = $this->input->get();
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        if(!isset($data['school_id'])) $data['school_id'] = 0;
        if(!isset($data['grade_id'])) $data['grade_id'] = 0;
        if(!isset($data['class_id'])) $data['class_id'] = 0;
        if(!isset($data['type'])) $data['type'] = "student";
        echo json_encode(array(
            'items'=>$this->classes->getClassUserList($data['school_id'],$data['grade_id'],$data['class_id'],$data['type'],$limit,$limit*($page-1),$data),
            'totalCount'=>$this->classes->getClassUserListCount($data['school_id'],$data['grade_id'],$data['class_id'],$data['type'],$data),
        ));
    }


    public function getUserCourseList($user_id =0){
        $data['courseDetail']  = array();
        if($user_id != 0){
            $user = $this->user->getUser($user_id);
            $data['courseDetail'] = $this->course->getCoursesDetails($user)->returncode['data'];
        }
        echo json_encode($data);
    }


    public function getClassCourseList($class_id =0){
        $data['courseDetail']  = array();
        if($class_id != 0){
            $class = $this->classes->getClass($class_id);
            $data['courseDetail'] = $this->course->getClassCoursesDetails($class)->returncode['data'];
        }
        echo json_encode($data);
    }


    public function addRegion(){
        $data = $this->input->post();
        $this->region->save($data);
        echo true;
    }
//账号管理--年级
    public function creatComClass($school_id=0){
        $data['school'] = $this->region->getSchool($school_id);
        $data['school_id'] = $school_id;
        //$data['courses'] = $this->course->getCourseList()->returncode['data'];
        $data['courses'] = $this->classes->getSchoolCourse($school_id,0);
        $this->load->view('creatComClass',$data);
    }

    public function  getSchoolCourses($school_id=0){
        $data = $this->classes->getSchoolCourse($school_id,0);
        echo json_encode($data);
    }


    //服务计划

    public function businessPlan($plan_detail_id=0){
        $data['plan_detail'] = $this->region->getRegionServicePlan($plan_detail_id);
        $this->load->view('wePlatForm/businessPlanList',$data);
    }

    public function getRegionBusinessServicePlanInfo($service_plan_id =0){
        $data['regionServicePlan']  =  $this->regionbusinessplan->getRegionServicePlan($service_plan_id);
        $this->load->view('wePlatForm/tmpl/RegionBusinessServicePlanInfo',$data);
    }


    public function addRegionBusinessServicePlan($plan_detail=0){
        $data = $this->input->post();
        $regionServicePlan = $this->regionbusinessplan->addRegionServicePlan($data);
        $this->regionbusinessplan->uploadRegionServicePlanFile($regionServicePlan);
        echo json_encode($regionServicePlan);
    }


    public function getRegionBusinessServicePlanList($plan_detail = 0){
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$this->regionbusinessplan->getRegionServicePlanList($limit,($page-1)*$limit,$plan_detail),
            'totalCount'=>$this->regionbusinessplan->getRegionServicePlanCount($plan_detail),
        ));
    }



    public function operatePlan($plan_detail_id=0){
        $data['plan_detail'] = $this->region->getRegionOperatePlanInfo($plan_detail_id);
        $this->load->view('wePlatForm/operatePlanList',$data);
    }

    public function getRegionServiceOperatePlanInfo($operate_plan_id =0){
        $data['regionServicePlan']  = $this->regionoperateplan->getRegionOperatePlanInfo($operate_plan_id);
        $this->load->view('wePlatForm/tmpl/ServiceRegionOperatePlanInfo',$data);
    }

    public function addRegionServiceOperatePlan($plan_detail_id = 0){
        $data = $this->input->post();
        $regionServicePlan = $this->regionoperateplan->addRegionOperatePlan($data,$plan_detail_id);
        $this->regionoperateplan->uploadRegionOperatePlanFile($regionServicePlan);
        echo json_encode($regionServicePlan);
    }


    public function getRegionServiceOperatePlanList($plan_detail_id=0){
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$this->regionoperateplan->getRegionOperatePlanList($limit,($page-1)*$limit,$plan_detail_id),
            'totalCount'=>$this->regionoperateplan->getRegionOperatePlanCount($plan_detail_id),
        ));
    }




    public function educationPlan($plan_detail_id=0){
        $data['plan_detail'] = $this->region->getRegionEducationPlanInfo($plan_detail_id);
        $this->load->view('wePlatForm/educationPlanList',$data);
    }


    public function getRegionServiceEducationPlanInfo($education_plan_id =0){
        $data['regionServicePlan']  = $this->regioneducationplan->getEducationPlan($education_plan_id);
        $this->load->view('wePlatForm/tmpl/RegionServiceEducationPlanInfo',$data);
    }

    public function addRegionServiceEducationPlan($plan_detail_id=0){
        $data = $this->input->post();
        $regionServicePlan = $this->regioneducationplan->addRegionEducationPlan($data);
        $this->regioneducationplan->uploadRegionEducationPlanFile($regionServicePlan);
        echo json_encode($regionServicePlan);
    }


    public function getRegionServiceEducationPlanList($plan_detail_id = 0){
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$this->regioneducationplan->getRegionEducationPlanList($limit,($page-1)*$limit,$plan_detail_id),
            'totalCount'=>$this->regioneducationplan->getRegionEducationPlanCount($plan_detail_id),
        ));
    }
}
