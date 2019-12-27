<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * 班级
 *
 **/

class Groups extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('classes');
        $this->load->model('recordmanager');
        $this->load->model('courseauth');
        $this->load->model('unit');
        $this->load->model('lesson');

    }

    /**
     *
     * 获取老师的所有班级列表
     *
     **/
    public function getTeacherClass(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            return $this->classes->getTeacherClass($user);
        }
        return $this;
    }


    /**
     *
     * 修改学生密码
     *
     **/
    public function modifyPassword(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $post = $this->input->post();
            if(isset($post['user_id'])) {
                $userStudent = $this->user->getUser($post['user_id']);
                if($this->classes->isTeacherAdministratorStudent($user,$userStudent)){
                    if(isset($post['password'])){
                        $userStudent->updatePassword($post['password']);
                    }else{
                        $this->returncode['errcode'] = "9000001";
                        $this->returncode['errdesc'] = "请出入密码";
                    }
                }else{
                    $this->returncode['errcode'] = "9000002";
                    $this->returncode['errdesc'] = "您无权限做此操作";
                }
            }
            return $this->classes->getTeacherClass($user);
        }
        return $this;
    }

    /**
     *
     * 获取班级成员
     *
     **/

    public function getClassUsers(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >1){
            $this->returncode['data'] =  $this->classes->getClassUsersInfo($argus[0]);
        }
        return $this;
    }


    /**
     *
     * 获取学生端排行榜
     *
     **/

    public function getStudentRankingList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $this->returncode['data'] =  $this->classes->getStudentRankingList($user);
        }
        return $this;
    }


    /**
     *
     * 获取我的MT考试成绩
     *
     **/

    public function getStudentMtList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $this->returncode['data'] =  $this->classes->getStudentMtList($user);
        }
        return $this;
    }


    /**
     *
     * 解锁学生课程
     *
     **/

    public function unChainUserLesson(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $post = $this->input->post();
//            $post['user_ids'] = "13";
//            $post['lesson_ids'] = "1,4";
            if(isset($post['user_ids']) && isset($post['lesson_ids'])) {
                $userIds = explode(',', $post['user_ids']);
                $lessonIds = explode(',', $post['lesson_ids']);

               

                $users = array();
                $lessons = array();

                foreach ($userIds as $userId) {
                    $users[] = $this->user->getUser($userId);
                }
                foreach ($lessonIds as $lessonId) {
                    $lessons[] = $this->lesson->getLesson($lessonId);
                }
                return $this->courseauth->unChainUserLesson($user,$users, $lessons, $argus[0]);
            }
        }
        return $this;
    }


    public function getClassDataWebView($id=0){
        $data['classItem'] = $this->classes->getClass($id);
       // $data['classInfo'] = $this->classes->getClassDataInfo($id);
        $data['chatClassLine'] = $this->classes->getClassPerweekStudyUserCount($data['classItem']->getClassUsers($data['classItem']->id));
        $data['LearningSituationOverview'] =  $this->classes->getLearningSituationOverviewForClass($id);
        $this->load->view('datacharts',$data);
    }


    public function syncStudentCourseData(){
        $users =  $this->db->select("id")->get("users")->result();
        foreach($users as $user){
            $userItem = $this->user->getUser($user->id);
            $courses = $this->db->select("id")->get("courses")->result();
            foreach($courses as $course){
                $this->courseauth->syncStudentCourseData($userItem,$course->id);
            }

        }
        return $this;
    }






}
