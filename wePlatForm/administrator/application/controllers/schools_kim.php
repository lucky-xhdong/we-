<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * @author kim.zhang
 * 学校管理，包含学校列表、学生、老师的所有操作功能
 *
 */
class Schools extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('amoeba');
        $this->load->model('school');
       // $this->load->model('region');
        $this->load->model('grades');
        $this->load->model('group');
        $this->load->model('classes');
        $this->load->model('course');
        $this->load->model('lesson');
        $this->load->model('courseauth');
        if(!getAdminViewer()->id){
            redirect('login');
        }else{
           // if($this->userpermission->hasPermissions(getAdminViewer(),array_keys($this->region->initPermission())) === false){
           //     redirect('error');
           // }
        }
    }

    /**
     * 学校列表，取得省市区联动信息
     */
    public function index(){
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();

        $this->load->view('wePlatForm/schools',$data);
    }

    /**
     * 取得学校的列表数据
     * 
     */
    public function business($region_id=0){
        //$data['region'] = $this->school->getSchool($region_id);

        //$data['provinces'] = $this->functions->getProviceList();
        //$data['citys'] = $this->functions->getCityList($data['region']->province_id);
        //$data['districts'] = $this->functions->getAreaList($data['citys'][0]->city_id);
       // $this->load->view('wePlatForm/regions_business',$data);
    }

    //商务
    public function view(){
        $this->load->view('wePlatForm/schools_business');
    }

    public function getSchoolInfo($school_id){
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();

        $this->load->view('tmpl/regionBasicEdit',$data);
    }
	/**
	 * 学校列表数据
	 */
    public function getSchoolList(){

        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        $data = $this->input->get();
//         $arr = array(
//             'items'=>$this->school->getSchoolInfoList($limit,($page-1)*$limit,$data),
//             'totalCount'=>$this->school->getSchoolDataCount($data),
//         );
//         print_r($arr);
//         exit;
        echo json_encode(array(
            'items'=>$this->school->getSchoolInfoList($limit,($page-1)*$limit,$data),
            'totalCount'=>$this->school->getSchoolDataCount($data),
        ));
    }
    /**
     * 学校详情
     * 
     */
    public function schoolDetail($school_id)
    {
    	$arr = $this->school->SchoolDetail($school_id);
    	//$info = $this->school->getSchoolInfo();
    	print_r($arr);
    }
    public function test(){
    	//$result= $this->school->SchoolPartChecked();
    	//print_r($result) ;
    	//$this->load->view('tmpl/test');
    }
    /**
     * 学校列表----》添加学校
     * 说明：所属学部、特征、扩展特征采用,分隔字符串
     */
    public function schoolAdd()
    {
    	$data = $this->input->post();
    	$result = $this->school->save($data);
    }
    /**
     * 学校列表----》删除学校
     */
    public function schoolDelete()
    {
    	$this->school->delete();
    	
    }
    
    /**
     * 学校列表----》编辑，编辑数据显示。
     * 提交时，调用schoolAdd();
     */
	public function schoolEdit($school_id)
	{
		$data = $this->school->SchoolDetail($school_id);

		$this->load->view('wePlatForm/schoolEdit',$data);
	}
	/**
	 * 学校列表----》学生功能
	 */
	public function schoolStudent($school_id)
	{
	
	}
	/**
	 *学校列表----》老师功能
	 */
	public function schoolTeacher($school_id)
	{
	
	}
	/**
	 *学校列表----》授权功能
	 */
	public function schoolRight($school_id)
	{
	
	}
	/**
	 *学校列表----》学习要求
	 */
	public function schoolStudyRequire($school_id)
	{
	
	}
	/**
	 *学校列表----》导入学校数据，excel数据导入
	 *数据导入，要查重
	 */
	public function schoolInputToData()
	{
	
	}
	/**
	 *学校列表----》导出学校数据，excel数据导出
	 */
	public function schoolOutputToData()
	{
	
	}
/**
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
    **/
	/**
	 * 删除学校某条数据，传入学校id号
	 */
    public function DeleteSchool(){
        $data = $this->input->post();
        //$region = $this->region->getRegion($data['region_id']);
        //if(isset($region->id) && !empty($region)) $region->delete();
        echo json_encode($this->returncode);
    }
	/**
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
    */
}
