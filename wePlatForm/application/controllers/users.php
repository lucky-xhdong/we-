<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('authenticationwetalk');
        $this->load->model('school');
        $this->load->model('group');
        $this->load->model('unit');
        $this->load->model('lesson');
        $this->load->model('courseauth');
        $this->load->model('region');
        if(!getViewer()->id){
            redirect('login');
        }
    }

    public function index()
    {
        $this->load->view('changePassword');
    }

    public function changePassword(){
        $this->load->view('changePassword');
    }

    public function resetPassword(){
        $post = $this->input->post();
        $oldpassword = isset($post['oldpassword'])?$post['oldpassword']:"";
        $password = isset($post['password'])?$post['password']:"";
        $verfity = $this->authenticationwetalk->checkOldPassword(getViewer(),$oldpassword);
        if($verfity){
            if(!empty($password)) {
                getViewer()->updatePassword($password);
            }
            else{
                $this->returncode['errcode'] = 100010;
                $this->returncode['errdesc'] = "新密码不能为空!";
            }
        }else{
            $this->returncode['errcode'] = 100009;
            $this->returncode['errdesc'] = "旧密码有误!";
        }
        echo json_encode($this->returncode);
    }

    public function schoolRegister(){
        $post = $this->input->post();
        $data = array();
        if(isset($post['school_id']) && !empty($post['school_id']) && isset($post['user_type']) && !empty($post['user_type'])){
            $school = $this->school->getSchool($post['school_id']);
            $value = isset($post['value'])?$post['value']:"";
            if(!empty($value) && $school->id != 0){
                $userarray = json_decode($value,true);
                if(count($userarray) == 7){
                    $userentity = array(
                        "username"=> $userarray[0],
                        "name"    =>  $userarray[3],
                        "email"    =>  $userarray[4],
                        "password"    =>  $userarray[5],
                    );
                    $user = $this->register($userentity)->returncode;
                    if($user['errcode'] == 0){
                        $graderName = $userarray[1];
                        $grade = $this->db->where("school_id",$post['school_id'])->where("name",$graderName)->get("grades")->row();
                        if(!$grade){
                            $gradeEntity = array(
                                "school_id" => $post['school_id'],
                                "user_id"   => getAdminViewer()->id,
                                "name"      => $graderName,
                                "created_time"=>date('Y-m-d H:i:s'),
                            );
                            $this->db->insert("grades",$gradeEntity);
                            $grade = $this->db->where("id",$this->db->insert_id())->get("grades")->row();
                        }
                        $class_name_array = explode(",",$userarray[2]);
                        $useer_course_ids = array();
                        foreach($class_name_array as $class_name){
                            $class = $this->db
                                ->where("school_id",$post['school_id'])
                                ->where("grade_id",$grade->id)
                                ->where("name",$class_name)->get("classes")->row();
                            if(!$class){
                                $classntity = array(
                                    "school_id" => $post['school_id'],
                                    "user_id"   => getAdminViewer()->id,
                                    "name"      => $graderName,
                                    "grade_id"  =>$grade->id,
                                    "created_time"=>date('Y-m-d H:i:s'),
                                );
                                $this->db->insert("classes",$classntity);
                                $class = $this->db->where("id",$this->db->insert_id())->get("classes")->row();
                            }

                            //查询class中的courseID
                            $couser_nick_names = explode(",",$userarray[6]);
                            $school_course_array = explode(",",$school->course_ids);
                            $course_ids = array();
                            if(count($couser_nick_names) > 0){
                                $results = $this->db->where_in("nickname",$couser_nick_names)->get("courses")->result();
                                foreach($results as $result){
                                    if(in_array($result->id,$school_course_array)){
                                        $course_ids[] = $result->id;
                                    }
                                }
                                if(count($course_ids) >0 && $post['user_type'] == "student"){
                                    $this->db->where("id",$class->id);
                                    $this->db->update("classes",array("course_ids"=>implode(",",$course_ids)));
                                }
                                $useer_course_ids = array_merge($useer_course_ids,$course_ids);
                            }
                            $data = array(
                                "class_id"=>$class->id,
                                "school_id"=>$school->id,
                                "grade_id"=>$grade->id
                            );
                            $this->addRelationShipUser($data,$user->id,$post['user_type']);
                        }
                        if($post['user_type'] == "teacher"){
                            if(count($useer_course_ids) >0){
                                $user->updateKey(array("course_ids"=>implode(",",$useer_course_ids)));
                            }

                        }
                    }else{
                        $this->returncode = $user;
                    }
                }
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
        $row = $this->db->where("class_id",$data['class_id'])
                ->where("grade_id",$data['grade_id'])
                ->where("school_id",$data['school_id'])
                ->where("user_type",$data['user_type'])
                 ->where("user_id",$user_id)->get("class_user_relationship")->row();

        if(!$row){
            $this->db->insert('class_user_relationship',$class_user_relationship);
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



    public function register($data){
        if(empty($data['password']) || empty($data['username'])){
            $this->returncode['errcode'] = 100001;
            $this->returncode['errdesc'] = "用户名和密码必须填写!";
        }else{
            $row = $this->db->where("username",$data['username'])->get("users")->row();
            if($row){
                $user = $this->user->getUser($row->id);
                if(isset($data['name']) && !empty($data['name'])){
                    $user->updateKey(array("letter"=>$user->getfirstchar($data['name'])));
                }
                $courses = $this->db->get("courses")->result();
                foreach($courses as $course){
                    $this->courseauth->syncStudentCourseData($user,$course->id);
                }
                $this->returncode['data'] = $user;
//                $this->returncode['errcode'] = 100002;
//                $this->returncode['errdesc'] = "用户名已经存在,请重新填写!";
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
                if(isset($data['name']) && !empty($data['name'])){
                    $user->updateKey(array("letter"=>$user->getfirstchar($data['name'])));
                }
                $courses = $this->db->get("courses")->result();
                foreach($courses as $course){
                    $this->courseauth->syncStudentCourseData($user,$course->id);
                }
                $this->returncode['data'] = $user;
            }
        }
        return $this;

    }
}
