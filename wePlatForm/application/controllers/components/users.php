<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('authenticationwetalk');
        $this->load->model('courseauth');
        $this->load->model('lesson');
        $this->load->model('unit');
        $this->load->model('classes');
        $this->load->model('course');
        $this->load->model('publishing_house');
        $this->load->model('publish_hourse_course_unit');
        $this->load->model('lessonpart');

    }


    /*
     * 用户登陆函数
     *
     */
    public function login(){
        $post = $this->input->post();
        if(!isset($post['username'])) $post['username'] = "";
        if(!isset($post['password'])) $post['password'] = "";
        return  $this->authenticationwetalk->onAuthenticate($post['username'],$post['password'],$post);
    }

    public function getUserInfo($user){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user){
            return $user->getUserDetail();
        }
        return $this;
    }

    public function uploadHeadPicture(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user){
            return $user->uploadHeadpicture();
        } else{
            $this->returncode['errcode'] = 1000001;
            $this->returncode['errdesc'] = "无效的用户";
        }
        return $this;
    }


    /*
     *
     * 更新用户信息
     *
     *
     **/
    public function modifyPersonalMessage(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user){
            return $user->modifyPersonalMessage();
        } else{
            $this->returncode['errcode'] = 1000001;
            $this->returncode['errdesc'] = "无效的用户";
        }
        return $this;
    }


    public function checkUserStudy(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user){
            echo $user->id;
            $user->testData();
        } else{
            $this->returncode['errcode'] = 1000001;
            $this->returncode['errdesc'] = "无效的用户";
        }
        return $this;
    }


    /*
     *
     * 用户注册函数
     *
     */

//     public function register(){
//
//         $password = '123456';
//         $salt  = $this->wetalkuserhelper->genRandomPassword(32);
//         $crypt = $this->wetalkuserhelper->getCryptedPassword($password, $salt);
//         $data = array(
//             'username'      => 'heixiaogang',
//             'name'          => '黑小刚',
//             'email'         => '18629332580@163.com',
//             'mobile'        => '18629332580',
//             'password'      =>  $crypt.':'.$salt,
//             'user_type'     => 'student',
//             'registerDate'  =>  date('Y-m-d H:i:s'),
//             'lastvisitDate' =>  date('Y-m-d H:i:s'),
//         );
//        $this->db->insert('users',$data);
//        return $this;
//     }

    public function index(){

    }


    public function getMyRadarWebView($user_id){
        $data['user'] = $this->user->getUser($user_id);
        $data['userRecordInfo'] = $data['user']->getUserRecordDataInfo();

        // $data['userRecordInfo'] = $data['user']->getUserStudyRecordDataInfo();
        $data['userDataLine']  = $data['user']->getStudentPerweekStudyUserCount();
        $data['LearningSituationOverview'] = $data['user']->getLearningSituationOverview();
        // var_dump($data);
        $this->load->view('studentdatacharts',$data);
    }


    public function modifyPassword(){
        $post = $this->input->post();
        if(!isset($post['oldpassword']))   $post['oldpassword'] = "";
        if(!isset($post['password'])) $post['password'] = "";
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
//        $this->returncode['errcode'] = 1000003;
//        $this->returncode['errdesc'] = "修改密码功能暂不可用,请稍后再试!";
//        return $this;
        if($user){
            if($this->authenticationwetalk->checkOldPassword($user,$post['oldpassword'])){
                $user->updatePassword($post['password']);
            }else{
                $this->returncode['errcode'] = 1000002;
                $this->returncode['errdesc'] = "旧密码错误";
            }
        } else{
            $this->returncode['errcode'] = 1000001;
            $this->returncode['errdesc'] = "您无权限修改此密码";
        }
        return $this;
    }

    public function register(){
        $data = $this->input->post();
        $data['class_id'] =1;
        $data['grade_id'] = 1;
        $data['school_id'] = 1;
        $data['course_ids'] = 1;
        $app_version = $this->input->post("app_version");
        if($app_version && $app_version != "1.1.0") {
            $this->returncode['errcode'] = 100003;
            $this->returncode['errdesc'] = "此账户已经存在!";
            return $this;
        }
//        $data['username'] = "小黑2";
//        $data['password'] = "123456";
//        $data['email'] = "wuxi@163.com";
        if(empty($data['password']) || empty($data['username'])){
            $this->returncode['errcode'] = 100001;
            $this->returncode['errdesc'] = "用户名和密码必须填写!";
        }else{

            $row = $this->db->where("username",$data['username'])->get("users")->num_rows();
            if($row >0){
                $this->returncode['errcode'] = 100002;
                $this->returncode['errdesc'] = "用户名已经存在,请重新填写!";
            }else{
                $salt  = $this->wetalkuserhelper->genRandomPassword(32);
                $crypt = $this->wetalkuserhelper->getCryptedPassword($data['password'], $salt);
                $userentity= array(
                    "name"      =>isset($data['name'])?$data['name']:"",
                    "username"  =>$data['username'],
                    "course_ids"  =>isset($data['course_ids'])?$data['course_ids']:1,
                    "user_type" =>"student",
                    "email"     =>isset($data['email'])?$data['email']:"",
                    "mobile"    =>isset($data['mobile'])?$data['mobile']:0,
                    "end_date"  =>isset($data['end_date'])?$data['end_date']:"",
                    "start_date"=>isset($data['start_date'])?$data['start_date']:"",
                    'registerDate'  =>  date('Y-m-d H:i:s'),
                    'lastvisitDate' =>  date('Y-m-d H:i:s'),
                    'password'      =>  $crypt.':'.$salt,
                );
                $this->db->insert('users',$userentity);
                $user_id = $this->db->insert_id();
                $user = $this->user->getUser($user_id);
                $user->uploadHeadpicture();
                if(isset($data['name']) && !empty($data['name'])){
                    $user->updateKey(array("letter"=>$user->getfirstchar($data['name'])));
                }
                $class_user_relationship = array(
                    "class_id"   => $data['class_id'],
                    "grade_id"   => $data['grade_id'],
                    "school_id"  => $data['school_id'],
                    "user_type"  => "student",
                    "user_id"    => $user_id,
                    "end_date"   => isset($data['end_date'])?$data['end_date']:"",
                    "start_date" =>isset($data['end_date'])?$data['end_date']:"",
                );
                $this->db->insert('class_user_relationship',$class_user_relationship);

                // 查找对应的group

                $courses = $this->db->get("courses")->result();
                foreach($courses as $course){
                    $this->courseauth->syncStudentCourseData($user,$course->id);
                }

                $groupQuery = $this->db->where('class_id',$data['class_id'])
                    ->get('groups')->row();
                if($groupQuery){
                    $group = $this->group->getGroup($groupQuery->id);
                    if( $data['user_type'] == 'teacher'){
                        $group->addFollower($user_id,1);
                    }else{
                        $group->addFollower($user_id);
                    }
                }
                $this->returncode['data'] = $user->getUserInfo();
            }
        }
        return $this;

    }

    public function getStudentRankingList($class_id=0){
        $data['errcode'] = 0;
        $data['errdesc'] = "";
        $data['class_id'] = $class_id;
        if($access_token = $this->input->get('access_token')){
            $token = $this->wetalkjwthelp->decodeToken($access_token);
            if(empty($token->userid)){
                $data['errcode'] = 999998;
                $data['errdesc'] = "非法token";
            }else{
                $user = $this->user->getUser($token->userid);
                if(isset($user->id)){
                    $data["user"] = $user;
                }else{
                    $data['errcode'] = 999999;
                    $data['errdesc'] = "授权失败";
                }
            }
        }else{
            $data['errcode'] = 999999;
            $data['errdesc'] = "授权失败";
        }
        $this->load->view('teacher_list',$data);
    }

    public function getStudentRankingListJson($class_id=0){
        echo json_encode($this->classes->getClassUsersInfo($class_id));
        exit;
    }

    public function unLockLesson($class_id=0) {
        $data['errcode'] = 0;
        $data['errdesc'] = "";
        $data['class_id'] = $class_id;
        $data['user'] = null;
        if($access_token = $this->input->get('access_token')){
            $token = $this->wetalkjwthelp->decodeToken($access_token);
            if(empty($token->userid)){
                $data['errcode'] = 999998;
                $data['errdesc'] = "非法token";
            }else{
                $user = $this->user->getUser($token->userid);
                if(isset($user->id)){
                    $data["user"] = $user;
                    $this->session->set_userdata('access_token',$this->input->get('access_token'));

                }else{
                    $data['errcode'] = 999999;
                    $data['errdesc'] = "授权失败";
                }
            }
        }else{
            $data['errcode'] = 999999;
            $data['errdesc'] = "授权失败";
        }
        $this->load->view('unlock_lesson',$data);
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

    public function getUnitLessonList($unit_id){
        $data['lessons'] = $this->lesson->getLessonList(null,$unit_id)->returncode['data'];
        echo json_encode($data);
    }


    public function unchainlesson(){
        $post = $this->input->post();
        if(!isset($post['userid'])){
            $data['errcode'] = 999998;
            $data['errdesc'] = "非法token";
        }else{
            $user = $this->user->getUser($post['userid']);
            if(isset($user->id)){
                if($user->id && $user->isTeacher()){

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
                        $return =  $this->courseauth->pcunChainUserLesson($users, $lessons);
                        echo json_encode($return->returncode);
                        exit;
                    }
                }else{
                    $this->returncode['errcode'] = "9000002";
                    $this->returncode['errdesc'] = "您无权限做此操作";
                }
            }else{
                $data['errcode'] = 999999;
                $data['errdesc'] = "授权失败";
            }
        }
        echo json_encode($this->returncode);
    }


    public function chainlesson(){
        $post = $this->input->post();
        if(!isset($post['userid'])){
            $data['errcode'] = 999998;
            $data['errdesc'] = "非法token";
        }else{
            $user = $this->user->getUser($post['userid']);
            if($user->id && $user->isTeacher()){
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
                    $return =  $this->courseauth->pcChainUserLesson($users, $lessons);
                    echo json_encode($return->returncode);
                    exit;
                }
            }else{
                $this->returncode['errcode'] = "9000002";
                $this->returncode['errdesc'] = "您无权限做此操作";
            }
        }

        echo json_encode($this->returncode);
    }


    public function getusetMTList() {
        $data['errcode'] = 0;
        $data['errdesc'] = "";
        if($access_token = $this->input->get('access_token')){
            $token = $this->wetalkjwthelp->decodeToken($access_token);
            if(empty($token->userid)){
                $data['errcode'] = 999998;
                $data['errdesc'] = "非法token";
            }else{
                $user = $this->user->getUser($token->userid);
                if(isset($user->id)){
                    $data["user"] = $user;
                }else{
                    $data['errcode'] = 999999;
                    $data['errdesc'] = "授权失败";
                }
            }
        }else{
            $data['errcode'] = 999999;
            $data['errdesc'] = "授权失败";
        }
        if(!isset($user->id) || $user->id ==0){
            echo "数据请求错误!";exit;
        }
        $this->load->view('grade_list',$data);
    }


    public function getuserMtCourseList($user_id =0){
        $data['courseDetail']  = array();
        if($user_id != 0){
            $user = $this->user->getUser($user_id);
            $data['courseDetail'] = $this->course->getPublishCoursesMtDetails($user)->returncode['data'];
        }
        echo json_encode($data);
    }


    public function getuserUnitMTList($user_id=0,$publishing_house_courses_id=0,$level_id =0){
        if($user_id != 0){
            $user = $this->user->getUser($user_id);
            $data['units'] =  $this->course->getPublishCoursesMtForLevelDetails($user,$publishing_house_courses_id,$level_id)->returncode['data'];
        }
        echo json_encode($data);
    }

    public function markHomework() {
        $data['errcode'] = 0;
        $data['errdesc'] = "";
        if($access_token = $this->input->get('access_token')){
            $token = $this->wetalkjwthelp->decodeToken($access_token);
            if(empty($token->userid)){
                $data['errcode'] = 999998;
                $data['errdesc'] = "非法token";
            }else{
                $user = $this->user->getUser($token->userid);
                if(isset($user->id)){
                    $data["user"] = $user;
                }else{
                    $data['errcode'] = 999999;
                    $data['errdesc'] = "授权失败";
                }
            }
        }else{
            $data['errcode'] = 999999;
            $data['errdesc'] = "授权失败";
        }
        if(!isset($user->id) || $user->id ==0){
            echo "数据请求错误!";exit;
        }
        $this->load->view('mark_homework',$data);
    }

    public function getSpeechContentList($user_id = 0){
        $user  = $this->user->getUser($user_id);
        $data = array();
        if($user){
            $data =  $this->lessonpart->getSpeechContentList($user,20,0)->returncode['data'];
        }
        echo json_encode($data);
    }

    public function getSpeeckWorkDetail($user_id,$record_id){
        $user  = $this->user->getUser($user_id);
        $data = array();
        if($user){
            $data=   $this->lessonpart->getPartSpeechComments()->returncode['data'];
            $data['record'] =   $this->lessonpart->getRecordDetail($user,$record_id)->returncode['data'];
        }
        $this->load->view('tmpl/worktmpl',$data);
    }

    public function addCommentsForSpeech($user_id,$record_id){
        $user  = $this->user->getUser($user_id);
        if($user){
            $this->returncode =  $this->lessonpart->addCommentsForSpeech($user,$record_id)->returncode;
        }
        echo json_encode($this->returncode);
    }

}
