<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AccountManage extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('amoeba');
        $this->load->model('region');
        $this->load->model('school');
        $this->load->model('grades');
        $this->load->model('group');
        $this->load->model('classes');
        $this->load->model('course');
        $this->load->model('lesson');
        $this->load->model('courseauth');
        if(!getAdminViewer()->id){
            redirect('login');
        }else{
            $permissions = getAdminViewer()->getUserRolePermission();
            $permission_urls = array();
            foreach($permissions as $permission){
                $permission_urls[] = $permission->url;
            }
            if(!in_array("/AccountManage/",$permission_urls)){
                redirect('error');
            }
        }
    }
//账号管理--公司
    public function creatCompany(){
        $this->load->view('creatCompany');
    }
//账号管理--巴
    public function creatComBranch(){
        $this->load->view('creatComBranch');
    }
//账号管理--省
    public function creatComCity(){
        $this->load->view('creatComCity');
    }
//账号管理--市
    public function creatComCounty(){
        $this->load->view('creatComCounty');
    }
//账号管理--學校
    public function index(){
//        $data['amoebas'] = $this->amoeba->getAmoebaList();
        $data['regions'] = $this->region->getRegionList();
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();
        $data['schoolPropertys'] = $this->school->getSchoolPropertyList();
        $data['courses'] = $this->course->getCourseList()->returncode['data'];
        if (isset($data['school']) && !empty($data['school']->course_ids)) {
            $coursearry = explode(",", $data['school']->course_ids);
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

        $this->load->view('creatComSchool',$data);
    }

    public function getSchoolInfo($school_id){
        $data['amoebas'] = $this->amoeba->getAmoebaList();
        $data['regions'] = $this->region->getRegionList();
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();
        $data['schoolPropertys'] = $this->school->getSchoolPropertyList();
        $data['school'] = $this->school->getSchool($school_id);

        $data['courses'] = $this->course->getCourseList()->returncode['data'];
        if (!empty($data['school']->course_ids)) {
            $coursearry = explode(",", $data['school']->course_ids);
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

        $this->load->view('tmpl/schoolBasicEdit',$data);
    }

    public function getSchoolList(){

        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        $data = $this->input->get();
        echo json_encode(array(
            'items'=>$this->school->getSchoolInfoList($limit,($page-1)*$limit,$data),
            'totalCount'=>$this->school->getSchoolDataCount($data),
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

    public function setSchoolHomeAuthTime(){
        $data = $this->input->post();
        $school = $this->school->getSchool($data['school_id']);
        if(isset($school->id) && !empty($school)) $school->setSchoolTime($data);
        echo json_encode($this->returncode);
    }

    public function DeleteSchool(){
        $data = $this->input->post();
        $school = $this->school->getSchool($data['school_id']);
        if(isset($school->id) && !empty($school)) $school->delete();
        echo json_encode($this->returncode);
    }

    public function setSchoolBlock(){
        $data = $this->input->post();
        $school = $this->school->getSchool($data['school_id']);
        if(isset($school->id) && !empty($school)) $school->updateKey(array('block'=>$data['block']));
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


    public function addSchool(){
        $data = $this->input->post();
        $this->school->save($data);
        echo true;
    }
//账号管理--年级
    public function creatComClass($school_id=0){
        $data['school'] = $this->school->getSchool($school_id);
        $data['school_id'] = $school_id;
        //$data['courses'] = $this->course->getCourseList()->returncode['data'];
        $data['courses'] = $this->classes->getSchoolCourse($school_id,0);
        $this->load->view('creatComClass',$data);
    }

    public function  getSchoolCourses($school_id=0){
        $data = $this->classes->getSchoolCourse($school_id,0);
        echo json_encode($data);
    }
//账号管理--学生
    public function creatStudent(){
        $this->load->view('creatStudent');
    }
//账号管理--班级--创建班级
    public function creatClass(){
        $this->load->view('creatClass');
    }
//账号管理--班级--创建班级下一步
    public function nextCreatClass(){
        $this->load->view('nextCreatClass');
    }
//账号管理--班级--添加人员
    public function addPeople(){
        $this->load->view('addPeople');
    }
//账号管理--班级--添加人员
    public function classCourseReport(){
        $this->load->view('classCourseReport');
    }
//角色管理
    public function importUser(){
        $this->load->view('importUser');
    }
//批量添加之后数据展示页
    public function accountAdd(){
        $this->load->view('accountAdd');
    }

    public function studyDetailDataClass(){
        $this->load->view('studyDetailDataClass');
    }
}
