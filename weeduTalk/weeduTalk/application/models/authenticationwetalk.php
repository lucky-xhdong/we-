<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Authenticationwetalk extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    /*
     *
     * 验证用户登录
     *
     */

    public function onAuthenticate($username="",$password="",$post=array()){
        if(empty($username) || empty($password)){
            $this->returncode['errcode'] = 100001;
            $this->returncode['errdesc'] = "请输入正确的用户名和密码";
        }else{
            $row = $this->db->where('username',$username)->or_where('mobile',$username)->or_where('email',$username)->get('users')->row();
            if($row){
                $parts  = explode( ':', $row->password );
                $crypt  = $parts[0];
                $salt   = @$parts[1];
                $testcrypt = $this->wetalkuserhelper->getCryptedPassword($password, $salt);
                if ($crypt == $testcrypt){
                    $user = $this->user->getUser($row->id);
                    //检查班级权限
                    $getUserSchoolGradeClassRealtionShip = $user->getUserSchoolGradeClassRealtionShipStatus();
                    if($getUserSchoolGradeClassRealtionShip){
                        if($user->status == 3){
                            $this->returncode['errcode'] = 999998;
                            $this->returncode['errdesc'] = "您账户存在异常已被强制停用!";
                        }else if($user->status == 0 && $user->id != 26403 && $getUserSchoolGradeClassRealtionShip->class_id == 912){
                            $this->returncode['errcode'] = 999998;
                            $this->returncode['errdesc'] = "此账户未启用,请联系管理员!";
                        }else{
                            $entity = array("lastvisitDate"=>date('Y-m-d H:i:s'));
                            if(isset($post['uuid']) && !empty($post['uuid'])){
                                $entity['uuid'] = $post['uuid'];
                            }
                            $user->updateKey($entity);
                            $post = $this->input->post();
                            if(isset($post['type']) && $post['type'] == "evaluation"){
                                $this->returncode['data'] = $user->getEvaluationUserInfo();
                            }else{
                                $this->returncode['data'] = $user->getUserInfo();
                            }

                        }
                    }else{
                        $this->returncode['errcode'] = 100004;
                        $this->returncode['errdesc'] = "账号已经被删除或者禁止登陆";
                    }
                }else{
                    $this->returncode['errcode'] = 100003;
                    $this->returncode['errdesc'] = "用户名密码错误";
                }
            }else{
                $this->returncode['errcode'] = 100002;
                $this->returncode['errdesc'] = "用户不存在";
            }
        }
        return $this;
    }




    public function onAuthenticateThird($post=array()){
        if(empty($post['uuid']) || empty($post['type']) || empty($post['password'])){
            $this->returncode['errcode'] = 100001;
            $this->returncode['errdesc'] = "授权失败";
        }else{
            $row = $this->db->where('uuid',$post['uuid'])->get('users')->row();
            if($row){
                if ($post['password'] == md5($row->uuid."wespeak")){
                    $user = $this->user->getUser($row->id);
                    //检查班级权限
                    $getUserSchoolGradeClassRealtionShip = $user->getUserSchoolGradeClassRealtionShipStatus();
                    if($getUserSchoolGradeClassRealtionShip){
                        if($user->status == 3){
                            $this->returncode['errcode'] = 999998;
                            $this->returncode['errdesc'] = "您账户存在异常已被强制停用!";
                        }else if($user->status == 0 && $user->id != 26403 && $getUserSchoolGradeClassRealtionShip->class_id == 912){
                            $this->returncode['errcode'] = 999998;
                            $this->returncode['errdesc'] = "此账户未启用,请联系管理员!";
                        }else{
                            $entity = array("lastvisitDate"=>date('Y-m-d H:i:s'));
                            if(isset($post['uuid']) && !empty($post['uuid'])){
                                $entity['uuid'] = $post['uuid'];
                            }
                            $user->updateKey($entity);
                            $this->returncode['data'] = $user->getUserInfo();
                        }
                    }else{
                        $this->returncode['errcode'] = 100004;
                        $this->returncode['errdesc'] = "账号已经被删除或者禁止登陆";
                    }
                }

            }else{

                //重新走注册程序
                $post['school_id'] = 156;
                $post['grade_id'] = 254;
                $post['user_type'] = "student";

                if ($post['password'] == md5($post['uuid']."wespeak")){
                    $user = $this->schoolRegister($post);
                    if($user){
                        $entity = array("lastvisitDate"=>date('Y-m-d H:i:s'));
                        if(isset($post['uuid']) && !empty($post['uuid'])){
                            $entity['uuid'] = $post['uuid'];
                        }
                        $user->updateKey($entity);
                        $this->returncode['data'] = $user->getUserInfo();
                    }else{
                        $this->returncode['errcode'] = 100002;
                        $this->returncode['errdesc'] = "授权失败,请稍后再试";
                    }
                }else{
                    $this->returncode['errcode'] = 100003;
                    $this->returncode['errdesc'] = "授权失败,请稍后再试";
                }

            }
        }
        return $this;
    }

    public function generate_user_name( $length = 15 ) {
// 密码字符集，可任意添加你需要的字符
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $username = "";
        for ( $i = 0; $i < $length; $i++ )
        {
            $username .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
            $username .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        return $username;
    }

    public function schoolRegister($post){
        $user = null;
        if(isset($post['school_id']) && !empty($post['school_id']) && isset($post['user_type']) && !empty($post['user_type'])){
            $school = $this->school->getSchool($post['school_id']);
            $userentity = array(
                "username"   => $this->generate_user_name(),
                "name"       => $this->generate_user_name(),
                "email"      => "guanlin@email.com",
                "password"   => 123456,
                "user_type"  => $post['user_type'],
                'uuid'      =>  $post['uuid'],

            );
            $userreturn = $this->register($userentity,$post['school_id'])->returncode;
            if($userreturn['errcode'] == 0){
                $user  = $userreturn['data'];
                $class = $this->db
                    ->select("*")
                    ->where("grade_id",$post['grade_id'])
                    ->order_by("RAND()")
                    ->limit(1)
                    ->get('classes')->row();
                if($class){
                    $follower_count =  $this->db
                        ->where("class_user_relationship.class_id",$class->id)
                        ->where("class_user_relationship.status",1)
                        ->get('class_user_relationship')->num_rows();
                    if($follower_count > 60){
                        $input = array ("A", "B", "C", "D", "E","F","G");
                        $rand_keys = array_rand ($input, 1);
                        $classntity = array(
                            "school_id" => $post['school_id'],
                            "user_id"   => "1",
                            "name"      => $input[$rand_keys],
                            "grade_id"  =>$post['grade_id'],
                            "created_time"=>date('Y-m-d H:i:s'),
                        );
                        $this->db->insert("classes",$classntity);
                        $class = $this->db->where("id",$this->db->insert_id())->get("classes")->row();
                    }
                }else{
                    $input = array ("A", "B", "C", "D", "E","F","G");
                    $rand_keys = array_rand ($input, 1);
                    $classntity = array(
                        "school_id" => $post['school_id'],
                        "user_id"   => "1",
                        "name"      => $input[$rand_keys],
                        "grade_id"  =>$post['grade_id'],
                        "created_time"=>date('Y-m-d H:i:s'),
                    );
                    $this->db->insert("classes",$classntity);
                    $class = $this->db->where("id",$this->db->insert_id())->get("classes")->row();
                }

                $this->db->where("id",$class->id);
                $this->db->update("classes",array("course_ids"=> $school->course_ids));


                $data = array(
                    "class_id"=>$class->id,
                    "school_id"=>$school->id,
                    "grade_id"=>$post['grade_id'],
                );
                $this->addRelationShipUser($data,$user->id,$post['user_type']);
                $this->copyPermissionToUserReleations(implode(",",$school->course_ids),$user->id);
            }
        }else{

        }
        return $user;
    }


    public function register($data,$school_id=0){
        if(empty($data['password']) || empty($data['username'])){
            $this->returncode['errcode'] = 100001;
            $this->returncode['errdesc'] = "用户名和密码必须填写!";
        }else{
            $row = $this->db->where("uuid",$data['uuid'])->get("users")->row();
            if($row){
                $row2 = $this->db
                    ->where("school_id",$school_id)
                    ->where("user_id",$row->id)->get("class_user_relationship")->row();
//                $user = $this->user->getUser($row->id);
////                if(isset($data['name']) && !empty($data['name'])){
////                    $user->updateKey(array("letter"=>$user->getfirstchar($data['name'])));
////                }
//                $courses = $this->db->get("courses")->result();
//                foreach($courses as $course){
//                    $this->courseauth->syncStudentCourseData($user,$course->id);
//                }
//                $this->returncode['data'] = $user;

                if($row2){
                    $user = $this->user->getUser($row->id);
                    $this->returncode['data'] = $user;
                }else{
                    $this->returncode['errcode'] = 100002;
                    $this->returncode['errdesc'] = "用户名已经存在,请重新填写!";
                }

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
                    'uuid'      =>  $data['uuid'],
                );
                $this->db->insert('users',$userentity);
                $user_id = $this->db->insert_id();
                $user = $this->user->getUser($user_id);
                if(isset($data['name']) && !empty($data['name'])){
                    $user->updateKey(array("letter"=>$user->getfirstchar($data['name'])));
                }
//                $courses = $this->db->get("courses")->result();
//                foreach($courses as $course){
//                    $this->courseauth->syncStudentCourseData($user,$course->id);
//                }
                $this->returncode['data'] = $user;
            }
        }
        return $this;
    }


    public function addRelationShipUser($data= array(),$user_id,$user_type="student"){
        $class_user_relationship = array(
            "class_id"   => $data['class_id'],
            "grade_id"   => $data['grade_id'],
            "school_id"  => $data['school_id'],
            "user_type"  => $user_type,
            "user_id"    => $user_id,
        );
        if($user_type == "teacher"){
            $row = $this->db->where("class_id",$data['class_id'])
                ->where("grade_id",$data['grade_id'])
                ->where("school_id",$data['school_id'])
                ->where("user_type",$user_type)
                ->where("user_id",$user_id)->get("class_user_relationship")->row();

            if(!$row){
                $this->db->insert('class_user_relationship',$class_user_relationship);
            }
        }else{
            $row = $this->db
                ->where("user_type",$user_type)
                ->where("user_id",$user_id)->get("class_user_relationship")->row();
            if(!$row){
                $this->db->insert('class_user_relationship',$class_user_relationship);
            }else{
                $this->db->where("user_id",$user_id)->where("user_type",$user_type)->delete("class_user_relationship");
                $this->db->insert('class_user_relationship',$class_user_relationship);
            }
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
        return true;
    }



    public function copyPermissionToUserReleations($course_array=array(),$user_id=0){
        //首先更新表权限
        $this->db->update("user_relation_course_unit_buffer",array("user_id"=>$user_id,"islock"=>0));
        $this->db->update("user_relation_unit_lesson_buffer",array("user_id"=>$user_id,"islock"=>0));
        //然后更新权限
        //开通所有需要的课程权限
        if(count($course_array) > 0){
            $this->db->where_in("course_id",$course_array)->where_not_in("unit_id",array(81,96,36,1))->update("user_relation_course_unit_buffer",array("islock"=>1));
            $result = $this->db->where_in("course_id",$course_array)->get("units")->result();
            if($result){
                $this->db->where_in("unit_id",$this->toIdArray($result))->where_not_in("unit_id",array(81,96,36,1))->update("user_relation_unit_lesson_buffer",array("islock"=>1));
            }
        }
        //copy数据走起
        $query1 = 'INSERT INTO wetalk_user_relation_course_unit (course_id,user_id, unit_id,islock,created_time,modify_time) SELECT course_id , user_id, unit_id,islock,created_time,modify_time FROM wetalk_user_relation_course_unit_buffer';

        $query2 = 'INSERT INTO wetalk_user_relation_unit_lesson (lesson_id,user_id, unit_id,islock,created_time,modify_time,course_id) SELECT lesson_id , user_id, unit_id,islock,created_time,modify_time,course_id FROM wetalk_user_relation_unit_lesson_buffer';
        $this->db->query($query1);
        $this->db->query($query2);


    }



    public function syncCourseUnit(){
        $courses = $this->db->get("courses")->result();
        $user = new stdClass();
        $user->id = 0;
        foreach($courses as $course){
            $courser_id = $course->id;
            $units = $this->unit->getUnits($courser_id);
            foreach($units as $unit){
                $unit_relation_num = $this->db->where("course_id",$courser_id)
                    ->where("unit_id",$unit->id)
                    ->where("user_id",$user->id)
                    ->get('user_relation_course_unit_buffer')->num_rows();
                if($unit_relation_num == 0){
                    $relation_course_unit = array(
                        "course_id" =>$courser_id,
                        "unit_id"   => $unit->id,
                        "user_id"   => $user->id,
                        "islock"    => 1,
                        "created_time" => date("Y-m-d H:i:s")
                    );
                    $this->db->insert("user_relation_course_unit_buffer",$relation_course_unit);
                }
                $lessons = $this->lesson->getLessons($unit->id);
                foreach($lessons as $lesson){
                    $lesson_relation_num = $this->db->where("lesson_id",$lesson->id)
                        ->where("unit_id",$unit->id)
                        ->where("user_id",$user->id)
                        ->get('user_relation_unit_lesson_buffer')->num_rows();
                    if($lesson_relation_num == 0){
                        $relation_course_unit = array(
                            "lesson_id" => $lesson->id,
                            "unit_id"   => $unit->id,
                            "user_id"   => $user->id,
                            "course_id" =>$courser_id,
                            "islock"    => 1,
                            "created_time" => date("Y-m-d H:i:s")
                        );
                        $this->db->insert("user_relation_unit_lesson_buffer",$relation_course_unit);
                    }
                }
            }
            //return true;
        }
    }

    /*
     *
     * 后台验证登陆
     *
     */

    public function onAdministratorAuthenticate($username="",$password=""){
        if(empty($username) || empty($password)){
            $this->returncode['errcode'] = 100001;
            $this->returncode['errdesc'] = "请输入正确的用户名和密码";
        }else{
            $row = $this->db
                ->where('username',$username)
                ->or_where('mobile',$username)
                ->or_where('email',$username)
                ->get('users')->row();
            if($row){
                $parts  = explode( ':', $row->password );
                $crypt  = $parts[0];
                $salt   = @$parts[1];
                $testcrypt = $this->wetalkuserhelper->getCryptedPassword($password, $salt);
                if ($crypt == $testcrypt){
                    $user = $this->user->getUser($row->id);
                    //用户名和密码验证正确后,验证权限信息
                    $permissions = $user->getUserRolePermission();
                    if(count($permissions) >0){
                        $user->redirect_url = anchorurl($permissions[0]->url);
                        $user->updateKey(array("lastvisitDate"=>date('Y-m-d H:i:s')));
                        $this->returncode['data'] = $user;
                    }else{
                        $this->returncode['errcode'] = 100004;
                        $this->returncode['errdesc'] = "您没有权限登陆该系统!";
                    }
                }else{
                    $this->returncode['errcode'] = 100003;
                    $this->returncode['errdesc'] = "用户名密码错误";
                }
            }else{
                $this->returncode['errcode'] = 100002;
                $this->returncode['errdesc'] = "用户不存在";
            }
        }
        return $this;
    }

    /*
     *
     * 验证用户旧密码
     *
     */

    public function  checkOldPassword($user="",$oldappword=""){
        if(empty($oldappword)){
            return false;
        }else{
            $row = $this->db->where('id',$user->id)->get('users')->row();
            if($row){
                $parts  = explode( ':', $row->password );
                $crypt  = $parts[0];
                $salt   = @$parts[1];
                $testcrypt = $this->wetalkuserhelper->getCryptedPassword($oldappword, $salt);
                if (($crypt == $testcrypt) || $row->password == md5($oldappword)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        return false;
    }
}  

