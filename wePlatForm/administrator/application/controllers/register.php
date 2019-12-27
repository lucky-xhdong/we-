<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('authenticationwetalk');
        $this->load->model('group');
        $this->load->model('unit');
        $this->load->model('lesson');
        $this->load->model('courseauth');
    }

    public function index(){
        $this->load->view('login');
    }

    public function verifyUser(){
        $data = $this->input->post();
        if(!empty($data['username'])){
            $result = $this->db->where('username', $data['username'])
                ->get('users')
                ->row();
            if($result){
                $return =   'false';
            }else{
                $return =  'true';
            }
        }else{
            $return =  'false';
        }
        echo $return;
    }

    public function addSchoolUser(){
        $data = $this->input->post();
        $salt  = $this->wetalkuserhelper->genRandomPassword(32);
        $crypt = $this->wetalkuserhelper->getCryptedPassword($data['password'], $salt);
        $userentity= array(
            "name"      =>$data['name'],
            "username"  =>$data['username'],
            "course_ids"  =>$data['course_ids'],
            "user_type" =>$data['user_type'],
            "email"     =>$data['email'],
            "mobile"    =>$data['mobile'],
//            "weixin"    =>$data['weixin'],
//            "qq"        =>$data['qq'],
            "end_date"  =>$data['end_date'],
            "start_date"=>$data['start_date'],
            'registerDate'  =>  date('Y-m-d H:i:s'),
            'lastvisitDate' =>  date('Y-m-d H:i:s'),
            'password'      =>  $crypt.':'.$salt,
        );
        $this->db->insert('users',$userentity);
        $user_id = $this->db->insert_id();
        $user = $this->user->getUser($user_id);
        $user->uploadHeadpicture();

        $user->updateKey(array("letter"=>$user->getfirstchar($data['name'])));
        $class_user_relationship = array(
            "class_id"   => $data['class_id'],
            "grade_id"   => $data['grade_id'],
            "school_id"  => $data['school_id'],
            "user_type"  => $data['user_type'],
            "user_id"    => $user_id,
            "end_date"   => $data['end_date'],
            "start_date" => $data['start_date'],
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
        echo json_encode($this->returncode);
    }


    public function addPlatFormUser(){
        $data = $this->input->post();
        $salt  = $this->wetalkuserhelper->genRandomPassword(32);
        $crypt = $this->wetalkuserhelper->getCryptedPassword($data['password'], $salt);
        if(!isset($data['course_ids'])) $data['course_ids'] = "";
        if(!isset($data['user_type'])) $data['user_type'] = "platformAccount";
        $userentity= array(
            "name"      =>$data['name'],
            "username"  =>$data['username'],
            "course_ids"  =>$data['course_ids'],
            "user_type" =>$data['user_type'],
            "email"     =>$data['email'],
            "mobile"    =>$data['mobile'],
            'registerDate'  =>  date('Y-m-d H:i:s'),
            'lastvisitDate' =>  date('Y-m-d H:i:s'),
            'password'      =>  $crypt.':'.$salt,
        );
        $this->db->insert('users',$userentity);
        $user_id = $this->db->insert_id();
        $user = $this->user->getUser($user_id);
        $user->uploadHeadpicture();
        $user->updateKey(array("letter"=>$user->getfirstchar($data['name'])));
        // 查找对应的group
        $courses = $this->db->get("courses")->result();
        foreach($courses as $course){
            //同步所有课程
            $this->courseauth->syncStudentCourseData($user,$course->id);
        }
        if(isset($data['rid']) && !empty($data['rid'])){
            $entity = array(
                "uid"=>$user_id,
                "rid"=>$data['rid']
            );
            $this->db->insert("user_user_role",$entity);
        }
        echo json_encode($this->returncode);
    }


    public function updatePlatFormUser(){
        $data = $this->input->post();
        if(!isset($data['course_ids'])) $data['course_ids'] = "";
        if(!isset($data['user_type'])) $data['user_type'] = "administrator";
        if(isset($data['user_id']) && !empty($data['user_id'])){
            $userentity= array(
                "name"      => $data['name'],
                "user_type" => $data['user_type'],
                "course_ids"  =>$data['course_ids'],
                "email"     => $data['email'],
                "mobile"    => $data['mobile'],
            );
            if(isset($data['password1']) && !empty($data['password1'])){
                $salt  = $this->wetalkuserhelper->genRandomPassword(32);
                $crypt = $this->wetalkuserhelper->getCryptedPassword($data['password1'], $salt);
                $userentity['password']  =  $crypt.':'.$salt;
            }
            $this->db->where('id',$data['user_id'])->update('users',$userentity);
            $user = $this->user->getUser($data['user_id']);
            $user->uploadHeadpicture();
            $user->updateKey(array("letter"=>$user->getfirstchar($data['name'])));
            //同步课程
            $courses = $this->db->get("courses")->result();
            foreach($courses as $course){
                $this->courseauth->syncStudentCourseData($user,$course->id);
            }

            if(isset($data['rid']) && !empty($data['rid'])){
                $entity = array(
                    "uid"=>$data['user_id'],
                    "rid"=>$data['rid']
                );
                $this->db->where("uid",$data['user_id']);
                $this->db->update("user_user_role",$entity);
            }
        }
        echo json_encode($this->returncode);
    }


    public function updateUser(){
        $data = $this->input->post();
        if(isset($data['user_id']) && !empty($data['user_id'])){
            $userentity= array(
                "name"      => $data['name'],
                "user_type" => $data['user_type'],
                "course_ids"  =>$data['course_ids'],
                "email"     => $data['email'],
                "mobile"    => $data['mobile'],
//                "weixin"    => $data['weixin'],
//                "qq"        => $data['qq'],
            );
            if(isset($data['password1']) && !empty($data['password1'])){
                $salt  = $this->wetalkuserhelper->genRandomPassword(32);
                $crypt = $this->wetalkuserhelper->getCryptedPassword($data['password1'], $salt);
                $userentity['password']  =  $crypt.':'.$salt;
            }
            $this->db->where('id',$data['user_id'])->update('users',$userentity);
            $user = $this->user->getUser($data['user_id']);
               $user->uploadHeadpicture();
            $user->updateKey(array("letter"=>$user->getfirstchar($data['name'])));


            //$this->courseauth->syncStudentCourseData($user,1);
            // 从之前班级踢出
            $beforeClass =  $this->db->where("user_id",$data['user_id'])->get('class_user_relationship')->row();
            if($beforeClass){
                if($beforeClass->class_id != $data['class_id']){
                    //踢出之前班级
                    $BeforegroupQuery = $this->db->where('class_id',$data['class_id'])
                        ->get('groups')->row();

                    if($BeforegroupQuery){
                        $beforegroup = $this->group->getGroup($BeforegroupQuery->id);
                        $beforegroup->removeFollower($data['user_id']);
                    }
                    //加入新班级
                    $groupQuery = $this->db->where('class_id',$data['class_id'])
                        ->get('groups')->row();
                    if($groupQuery){
                        $group = $this->group->getGroup($groupQuery->id);
                        if( $data['user_type'] == 'teacher'){
                            $group->addFollower($data['user_id'],1);
                        }else{
                            $group->addFollower($data['user_id']);
                        }
                    }

                }
            }

            $this->db->where("school_id",$data['school_id']);
            $this->db->where("user_id",$data['user_id']);
            $this->db->update('class_user_relationship',
                array(
                    "class_id"   => $data['class_id'],
                    "grade_id"   => $data['grade_id'],
                    "user_type"  => $data['user_type'],
                     )
            );


            //同步课程
            $courses = $this->db->get("courses")->result();
            foreach($courses as $course){
                $this->courseauth->syncStudentCourseData($user,$course->id);
            }


        }
        echo json_encode($this->returncode);
    }

    public function addNewUser(){
        $data = $this->input->post();
        $userentity= array(
            "name"      =>$data['name'],
            "user_type" =>$data['user_type'],
            'lastvisitDate' =>  date('Y-m-d H:i:s'),
        );
        $newpassword = '';
        if(isset($data['password']) && !empty($data['password'])){
            $salt  = $this->wetalkuserhelper->genRandomPassword(32);
            $crypt = $this->wetalkuserhelper->getCryptedPassword($data['password'], $salt);
            $newpassword =  $crypt.':'.$salt;
            $userentity['password'] = $newpassword;
        }
        if(isset($data['id']) && !empty($data['id'])){
            $user_id = $data['id'];
            $this->db->where('id',$data['id'])->update('users',$userentity);
            $user = $this->user->getUser($data['id']);
        }else{
            $userentity= array(
                "name"      =>$data['name'],
                'password'  => $newpassword,
                "user_type" =>$data['user_type'],
                'lastvisitDate' =>  date('Y-m-d H:i:s'),
                "username"  =>$data['username'],
                'registerDate'  =>  date('Y-m-d H:i:s'),
            );
            $this->db->insert('users',$userentity);
            $user_id = $this->db->insert_id();
            $user = $this->user->getUser($user_id);
        }
        $user->uploadHeadpicture();

        $user->updateKey(array("letter"=>$user->getfirstchar($data['name'])));

        // 查找对应的group
        if(isset($data['id']) && !empty($data['id'])){
            $beforeClass =  $this->db->where("user_id",$data['id'])->get('class_user_relationship')->row();
            if($beforeClass){
                if($beforeClass->class_id != $data['class_id']){
                    //踢出之前班级
                    $BeforegroupQuery = $this->db->where('class_id',$data['class_id'])
                        ->get('groups')->row();

                    if($BeforegroupQuery){
                        $beforegroup = $this->group->getGroup($BeforegroupQuery->id);
                        $beforegroup->removeFollower($data['id']);
                    }
                    //加入新班级
                    $groupQuery = $this->db->where('class_id',$data['class_id'])
                        ->get('groups')->row();
                    if($groupQuery){
                        $group = $this->group->getGroup($groupQuery->id);
                        if( $data['user_type'] == 'teacher'){
                            $group->addFollower($data['id'],1);
                        }else{
                            $group->addFollower($data['id']);
                        }
                    }

                }
            }
            $this->db->where("school_id",$data['school_id']);
            $this->db->where("user_id",$data['id']);
            $this->db->update('class_user_relationship',
                array(
                    "class_id"   => $data['class_id'],
                    "grade_id"   => $data['grade_id'],
                    "user_type"  => $data['user_type'],
                )
            );
        }else{
            $class_user_relationship = array(
                "class_id"   => $data['class_id'],
                "grade_id"   => $data['grade_id'],
                "school_id"  => $data['school_id'],
                "user_type"  => $data['user_type'],
                "user_id"    => $user_id,
            );
            $this->db->insert('class_user_relationship',$class_user_relationship);

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
            //同步课程
            $courses = $this->db->get("courses")->result();
            foreach($courses as $course){
                $this->courseauth->syncStudentCourseData($user,$course->id);
            }
        }
        echo json_encode($this->returncode);
    }


}
