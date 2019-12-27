<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Courseauth extends CI_Model{


    public function __construct()
    {
        parent::__construct();

    }


    /**
     * param model user,int courser_id
     * 同步学生学习的单元列表,并分配权限,
     * 只要注册学生,这个权限必须同步
     * 默认所有课程锁定
     */


    public function syncStudentCourseData($user,$courser_id){
        $units = $this->unit->getUnits($courser_id);
        foreach($units as $unit){
            $unit_relation_num = $this->db->where("course_id",$courser_id)
                ->where("unit_id",$unit->id)
                ->where("user_id",$user->id)
                ->get('user_relation_course_unit')->num_rows();
            if($unit_relation_num == 0){
                $relation_course_unit = array(
                    "course_id" =>$courser_id,
                    "unit_id"   => $unit->id,
                    "user_id"   => $user->id,
                    "islock"    => 0,
                    "created_time" => date("Y-m-d H:i:s")
                );
                $this->db->insert("user_relation_course_unit",$relation_course_unit);
            }
            $lessons = $this->lesson->getLessons($unit->id);
            foreach($lessons as $lesson){
                $lesson_relation_num = $this->db->where("lesson_id",$lesson->id)
                    ->where("unit_id",$unit->id)
                    ->where("user_id",$user->id)
                    ->get('user_relation_unit_lesson')->num_rows();
                if($lesson_relation_num == 0){
                    $relation_course_unit = array(
                        "lesson_id" => $lesson->id,
                        "unit_id"   => $unit->id,
                        "user_id"   => $user->id,
                        "course_id" =>$courser_id,
                        "islock"    => 0,
                        "created_time" => date("Y-m-d H:i:s")
                    );
                    $this->db->insert("user_relation_unit_lesson",$relation_course_unit);
                }
            }
        }
        return true;
    }

    /**
     * param model user,model $lesson
     * 同步学生学习的单元列表,并分配权限,
     * 只要注册学生,这个权限必须同步
     * 解锁单个学生和多个学生一样
     */

    public function unChainUserLesson($user,$users=array(),$lessons=array(),$course_id = 0,$post=0){


        if(isset($post['is_class']) && $post['is_class'] ==true){
            //获取全班学生
            if(count($users) == 0 && $post['class_id']){
                $user_ids  = $this->db->select('class_user_relationship.user_id as id')
                    ->where("class_user_relationship.class_id",$post['class_id'])
                    ->get('class_user_relationship')->result();
                foreach($user_ids as $user_id){
                    $users[] = $this->user->getUser($user_id);
                }
            }
        }
        if(count($users) && count($lessons)){
            //还原之前的单元解锁设置
            $this->db->where_in("user_id",$this->toIdArray($users))->where("course_id",$course_id)->update("user_relation_course_unit",array("islock"=>1));
            //还原之前课程解锁设置
            $this->db->where_in("user_id",$this->toIdArray($users))->where("course_id",$course_id)->update("user_relation_unit_lesson",array("islock"=>1));
            //解锁需要的课程单元
//             $fp = fopen("courseauth.txt","a+");
//             fwrite($fp,$this->db->last_query());
//             fclose($fp);

            $this->db->where_in("user_id",$this->toIdArray($users))->where_in("unit_id",$this->toUnitIdArray($lessons))->update("user_relation_course_unit",array("islock"=>0));
//             $fp = fopen("courseauth.txt","a+");
//             fwrite($fp,$this->db->last_query());
//             fclose($fp);
            //解锁需要的lesson
            $this->db->where_in("user_id",$this->toIdArray($users))->where_in("lesson_id",$this->toIdArray($lessons))->update("user_relation_unit_lesson",array("islock"=>0));
//             $fp = fopen("courseauth.txt","a+");
//             fwrite($fp,$this->db->last_query());
//             fclose($fp);
        }
        $object = new stdClass();
        $object->object_type = "lesson";
        $object->object_ids = implode(',',$this->toIdArray($lessons));
        foreach($users as $userItem){
            $this->notification->setMinxer($user)->addNotification($user, $userItem,'unchain','',$object);
            $this->unChainUserLessonToRedis($userItem,$user,$object->object_ids);
        }
        return $this;
    }


    /**
     * param model user,model $lesson
     * 同步学生学习的单元列表,并分配权限,
     * 只要注册学生,这个权限必须同步
     * 解锁单个学生和多个学生一样
     */

    public function serverunChainUserLesson($user,$users=array(),$lessons=array(),$course_id = 0,$unit_id=0,$post){

        if(isset($post['is_class']) && $post['is_class'] ==true){
            //获取全班学生
            if(count($users) == 0 && $post['class_id']){
                $user_ids  = $this->db->select('class_user_relationship.user_id as id')
                    ->where("class_user_relationship.class_id",$post['class_id'])
                    ->get('class_user_relationship')->result();
                foreach($user_ids as $user_id){
                    $users[] = $this->user->getUser($user_id->id);
                }
            }
        }


        if(count($users)){
            //还原之前的单元解锁设置
            if(count($lessons) > 0){
                $this->db->where_in("user_id",$this->toIdArray($users))->where("course_id",$course_id)->where_in("unit_id",$this->toUnitIdArray($lessons))->update("user_relation_course_unit",array("islock"=>1));
                //还原之前课程解锁设置
                $this->db->where_in("user_id",$this->toIdArray($users))->where("course_id",$course_id)->where_in("unit_id",$this->toUnitIdArray($lessons))->update("user_relation_unit_lesson",array("islock"=>1));
                //解锁需要的课程单元

                $this->db->where_in("user_id",$this->toIdArray($users))->where_in("unit_id",$this->toUnitIdArray($lessons))->update("user_relation_course_unit",array("islock"=>0));

                //解锁需要的lesson
                $this->db->where_in("user_id",$this->toIdArray($users))->where_in("lesson_id",$this->toIdArray($lessons))->update("user_relation_unit_lesson",array("islock"=>0));
                $object = new stdClass();
                $object->object_type = "lesson";
                $object->object_ids = implode(',',$this->toIdArray($lessons));
                foreach($users as $userItem){
                    $this->notification->setMinxer($user)->addNotification($user, $userItem,'unchain','',$object);
                    $this->unChainUserLessonToRedis($userItem,$user,$object->object_ids);
                }
            }else{
                $this->db->where_in("user_id",$this->toIdArray($users))->where("course_id",$course_id)->where("unit_id",$unit_id)->update("user_relation_course_unit",array("islock"=>1));
                //还原之前课程解锁设置
                $this->db->where_in("user_id",$this->toIdArray($users))->where("course_id",$course_id)->where("unit_id",$unit_id)->update("user_relation_unit_lesson",array("islock"=>1));
            }
        }
        return $this;
    }


    /*
     *
     * 解锁所有课程
     *
     **/
    public function unChainAllCourse($user,$users=array(),$course_id = 0,$post){

        if(isset($post['is_class']) && $post['is_class'] ==true){
            //获取全班学生
            if(count($users) == 0 && $post['class_id']){
                $user_ids  = $this->db->select('class_user_relationship.user_id as id')
                    ->where("class_user_relationship.class_id",$post['class_id'])
                    ->get('class_user_relationship')->result();
                foreach($user_ids as $user_id){
                    $users[] = $this->user->getUser($user_id->id);
                }
            }
        }

        if($course_id == 0) return $this;
        if(count($users) > 0 ){
            $this->db->where_in("user_id",$this->toIdArray($users))->where("course_id",$course_id)->update("user_relation_course_unit",array("islock"=>0));
            $this->db->where_in("user_id",$this->toIdArray($users))->where("course_id",$course_id)->update("user_relation_unit_lesson",array("islock"=>0));
        }else{
            $this->db->where("course_id",$course_id)->update("user_relation_course_unit",array("islock"=>0));
            $this->db->where("course_id",$course_id)->update("user_relation_unit_lesson",array("islock"=>0));
        }
        return $this;
    }


    /*
    *
    * 锁止所有课程
    *
    **/
    public function saveChainAllCourse($user,$users=array(),$course_id = 0,$post){

        if(isset($post['is_class']) && $post['is_class'] ==true){
            //获取全班学生
            if(count($users) == 0 && $post['class_id']){
                $user_ids  = $this->db->select('class_user_relationship.user_id as id')
                    ->where("class_user_relationship.class_id",$post['class_id'])
                    ->get('class_user_relationship')->result();
                foreach($user_ids as $user_id){
                    $users[] = $this->user->getUser($user_id->id);
                }
            }
        }


        if($course_id == 0) return $this;
        if(count($users) > 0 ){
            $this->db->where_in("user_id",$this->toIdArray($users))->where("course_id",$course_id)->update("user_relation_course_unit",array("islock"=>1));
            $this->db->where_in("user_id",$this->toIdArray($users))->where("course_id",$course_id)->update("user_relation_unit_lesson",array("islock"=>1));
        }else{
            $this->db->where("course_id",$course_id)->update("user_relation_course_unit",array("islock"=>1));
            $this->db->where("course_id",$course_id)->update("user_relation_unit_lesson",array("islock"=>1));
        }
        return $this;
    }



    /*
    *
    * 解锁所有单元
    *
    **/
    public function unChainAllCourseUnit($user,$users=array(),$course_id = 0,$unit_id=0,$post){

        if(isset($post['is_class']) && $post['is_class'] ==true){
            //获取全班学生
            if(count($users) == 0 && $post['class_id']){
                $user_ids  = $this->db->select('class_user_relationship.user_id as id')
                    ->where("class_user_relationship.class_id",$post['class_id'])
                    ->get('class_user_relationship')->result();
                foreach($user_ids as $user_id){
                    $users[] = $this->user->getUser($user_id->id);
                }
            }
        }
        if($course_id == 0 || $unit_id == 0) return $this;
        if(count($users) > 0 ){
            $this->db->where_in("user_id",$this->toIdArray($users))->where("course_id",$course_id)->where("unit_id",$unit_id)->update("user_relation_course_unit",array("islock"=>0));
            $this->db->where_in("user_id",$this->toIdArray($users))->where("course_id",$course_id)->where("unit_id",$unit_id)->update("user_relation_unit_lesson",array("islock"=>0));
        }else{
            $this->db->where("course_id",$course_id)->where("unit_id",$unit_id)->update("user_relation_course_unit",array("islock"=>0));
            $this->db->where("course_id",$course_id)->where("unit_id",$unit_id)->update("user_relation_unit_lesson",array("islock"=>0));
        }
        echo $this->db->last_query();
        return $this;
    }


    /*
    *
    * 锁止所有单元
    *
    **/
    public function saveChainAllCourseUnit($user,$users=array(),$course_id = 0,$unit_id=0,$post){
        if(isset($post['is_class']) && $post['is_class'] ==true){
            //获取全班学生
            if(count($users) == 0 && $post['class_id']){
                $user_ids  = $this->db->select('class_user_relationship.user_id as id')
                    ->where("class_user_relationship.class_id",$post['class_id'])
                    ->get('class_user_relationship')->result();
                foreach($user_ids as $user_id){
                    $users[] = $this->user->getUser($user_id->id);
                }
            }
        }

        if($course_id == 0 || $unit_id == 0) return $this;
        if(count($users) > 0 ){
            $this->db->where_in("user_id",$this->toIdArray($users))->where("course_id",$course_id)->where("unit_id",$unit_id)->update("user_relation_course_unit",array("islock"=>1));
            $this->db->where_in("user_id",$this->toIdArray($users))->where("course_id",$course_id)->where("unit_id",$unit_id)->update("user_relation_unit_lesson",array("islock"=>1));
        }else{
            $this->db->where("course_id",$course_id)->where("unit_id",$unit_id)->update("user_relation_course_unit",array("islock"=>1));
            $this->db->where("course_id",$course_id)->where("unit_id",$unit_id)->update("user_relation_unit_lesson",array("islock"=>1));
        }
        //  echo $this->db->last_query();
        return $this;
    }


    public function unChainUserLessonToRedis($follower,$actor,$lesson_ids){
        $clientServer =  client_url();
        if(isset($clientServer) && !empty($clientServer)){
            $contentType = "unChainUserLesson";
            $data = array(
                "actor"=>$actor->id,
                "actorName"=>$actor->name,
                "follower" =>$follower->id,
                "contentType"=>$contentType,
                "lesson_ids" =>$lesson_ids
            );
            $data_string = json_encode($data);
            $ch = curl_init($clientServer.'chat/unChainUserLesson');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
            curl_setopt($ch, CURLOPT_TIMEOUT,10);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string))
            );
            $result = curl_exec($ch);
        }
    }




    public function toUnitIdArray($objects=array()){
        $data = array();
        foreach($objects as $object){
            $data[] = $object->unit_id;
        }
        return $data;
    }

    /**
     * 获取某个用户单元解锁状态
     *
     */
    public function getUserUintListChain($user,$courser_id=1){
        $unitauths = $this->db->where("course_id",$courser_id)
            ->where("user_id",$user->id)
            ->get('user_relation_course_unit')->result();
        $data = array();
        foreach($unitauths as $unitauth){
//            if($unitauth->unit_id >= 7){
//                $data[$unitauth->unit_id] = 1;
//            }else{
            $data[$unitauth->unit_id] = $unitauth->islock;
            //}
        }
        return $data;
    }


    /**
     * 获取某个用户单元解锁状态
     *
     */
    public function getUserUintRowChain($user,$unit_id=0){
        $unitauth = $this->db->where("unit_id",$unit_id)
            ->where("user_id",$user->id)
            ->get('user_relation_course_unit')->row();
        return $unitauth;
    }


    public function getUserUnitLessonRowAVG($user,$unit_id=0){
        $lessonauths = $this->db
            ->select("AVG(accuracy) as accuracy, AVG(completion_rate) as completion_rate,mt_score")
            ->where("unit_id",$unit_id)
            ->where("user_id",$user->id)
            ->get('user_relation_unit_lesson')->row();
        return $lessonauths;
    }

    public function getUserCourseLessonRowAVG($user,$course_id=0){
        $lessonauths = $this->db
            ->select("AVG(accuracy) as accuracy, AVG(completion_rate) as completion_rate")
            ->where("course_id",$course_id)
            ->where("user_id",$user->id)
            ->get('user_relation_course_unit')->row();
        return $lessonauths;
    }


    public function getUserCourseLevelRowAVG($user,$unit_ids=array()){
        if(count($unit_ids)){
            $lessonauths = $this->db
                ->select("AVG(accuracy) as accuracy, AVG(completion_rate) as completion_rate")
                ->where_in("unit_id",$unit_ids)
                ->where("user_id",$user->id)
                ->get('user_relation_course_unit')->row();
            return $lessonauths;
        }
        return 0;

    }



    /**
     * 获取某个用户课程解锁状态
     *
     */
    public function getUserLessonListChain($user,$unit_id=0){
        $lessonauths = $this->db->where("unit_id",$unit_id)
            ->where("user_id",$user->id)
            ->get('user_relation_unit_lesson')->result();
        $data = array();
        foreach($lessonauths as $lessonauth){
            $data[$lessonauth->lesson_id] = $lessonauth->islock;
        }
        return $data;
    }


    public function getUserLessonRowChain($user,$lesson_id=0){
        $lessonauths = $this->db->where("lesson_id",$lesson_id)
            ->where("user_id",$user->id)
            ->get('user_relation_unit_lesson')->row();
        return $lessonauths;
    }



    public function pcunChainUserLesson($users=array(),$lessons=array()){

        if(count($users)){

            if(count($lessons) > 0){
                $this->db->where_in("user_id",$this->toIdArray($users))->where_in("unit_id",$this->toUnitIdArray($lessons))->update("user_relation_course_unit",array("islock"=>0));

                $this->db->where_in("user_id",$this->toIdArray($users))->where_in("lesson_id",$this->toIdArray($lessons))->update("user_relation_unit_lesson",array("islock"=>0));
            }
        }
        return $this;
    }

    public function pcChainUserLesson($users=array(),$lessons=array()){

        if(count($users)){
            //还原之前的单元解锁设置
            if(count($lessons) > 0){
                //锁住的lesson
                $this->db->where_in("user_id",$this->toIdArray($users))->where_in("lesson_id",$this->toIdArray($lessons))->update("user_relation_unit_lesson",array("islock"=>1));
                $post = $this->input->post();
                if(isset($post['type']) && $post['type'] == "all"){
                    $this->db->where_in("user_id",$this->toIdArray($users))->where_in("unit_id",$this->toUnitIdArray($lessons))->update("user_relation_course_unit",array("islock"=>1));
                }else{
                    $this->db->where_in("user_id",$this->toIdArray($users))->where_in("unit_id",$this->toUnitIdArray($lessons))->update("user_relation_course_unit",array("islock"=>0));
                }
            }
        }
        return $this;
    }
}

