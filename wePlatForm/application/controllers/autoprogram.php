<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

set_time_limit(0);
class Autoprogram extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('calculationrecord') ;
        $this->load->model('recordmanager');
        $this->load->model('lessonpart');
        $this->load->model('courseauth');
        $this->load->model('unit');
        $this->load->model('lesson');

    }

    public function calculationrecord()
    {
        echo "start_date".date('Y-m-d H:i:s')."\n";
        $this->calculationrecord->calculationUserResult();
        echo "success".date('Y-m-d H:i:s')."\n";
    }

    public function calculationrecordClassItem($id)
    {

        $this->calculationrecord->calculationrecordClassItem($id);
        echo 111;exit;
    }

    public function calculationrecordClass()
    {
        echo "timeCLASSJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->get("classes")->result();
        foreach($classes as $classeItem) {
            $url = base_url("autoprogram/calculationrecordClassItem/".$classeItem->id);
            sleep($time);
            file_get_contents($url);
        }
        echo "timeCLASSJobstart_date".date('Y-m-d H:i:s')."\n";
    }


    public function calculationUserResultPesronal($user_id=0)
    {
        echo "start_date".date('Y-m-d H:i:s')."\n";
        $this->calculationrecord->calculationUserResultPesronal($user_id);
        echo "success".date('Y-m-d H:i:s')."\n";
    }


    public function calculationUserResultClassPesronal($class_id=0)
    {
        echo "calculationUserResultClassPesronal".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $userrelationships = $this->db->where("class_id", $class_id)->get("class_user_relationship")->result();
        foreach($userrelationships as $userrelationship){
            $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
            sleep($time);
            file_get_contents($url);
        }
        echo "calculationUserResultClassPesronal".date('Y-m-d H:i:s')."\n";
    }


    public function timeJob1()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id <=",50)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob1_1()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where(">",50)->where("id <=",100)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob2()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",100)->where("id <=",150)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob2_2()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",150)->where("id <=",200)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob3()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",200)->where("id <=",250)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob3_3()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",250)->where("id <=",300)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }



    public function timeJob4()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",300)->where("id <=",350)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob4_4()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",350)->where("id <=",400)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }


    public function timeJob5()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",400)->where("id <=",450)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob5_5()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",450)->where("id <=",500)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }


    public function timeJob6()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",500)->where("id <=",550)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob6_6()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",550)->where("id <=",600)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob7()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",600)->where("id <=",650)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob7_7()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",650)->where("id <=",700)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob8()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",700)->where("id <=",750)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob8_8()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",750)->where("id <=",800)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob9()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",800)->where("id <=",850)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob9_9()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",850)->where("id <=",900)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob10()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",900)->where("id <=",950)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob10_10()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",950)->where("id <=",1000)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob11()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",1000)->where("id <=",1050)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob11_11()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",1050)->where("id <=",1100)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }


    public function timeJob12()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",1100)->where("id <=",1150)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob12_12()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",1150)->where("id <=",1200)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }


    public function timeJob13()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",1200)->where("id <=",1250)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob13_13()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",1250)->where("id <=",1300)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob14()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",1300)->where("id <=",1350)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob14_14()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",1350)->where("id <=",1400)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }


    public function timeJob15()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",1400)->where("id <=",1500)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }

    public function timeJob15_15()
    {
        echo "timeJobstart_date".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $classes = $this->db->where("id >",1500)->get("classes")->result();
        foreach($classes as $classeItem) {
            $userrelationships = $this->db->where("class_id", $classeItem->id)->get("class_user_relationship")->result();
            foreach($userrelationships as $userrelationship){
                $url = base_url("autoprogram/calculationUserResultPesronal/".$userrelationship->user_id);
                sleep($time);
                file_get_contents($url);
            }
        }
        echo "timeJobsuccess".date('Y-m-d H:i:s')."\n";
    }



    public function addtime2()
    {
        echo "addtime2".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $usres = $this->db->select("user_id")
            ->where("date >","2018-10-21")
            ->where("version","1.1.0")
            ->group_by("user_id")
            ->where("platform","android")
            ->get("user_agent")->result();
        foreach($usres as $usre) {

                $url = base_url("autoprogram/addTimeForUser/".$usre->user_id);
                sleep($time);
                file_get_contents($url);
        }
        echo "addtime2".date('Y-m-d H:i:s')."\n";
    }

    public function addTimeForUser($user_id=0){
        echo "addtime2".date('Y-m-d H:i:s')."\n";
        $this->calculationrecord->addTimeForUser($user_id);
        echo "addtime2".date('Y-m-d H:i:s')."\n";
        return true;
    }


    public function  calculationregion()
    {
        echo "calculationregion".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $usres = $this->db->select("id")
            ->where("id !=",32)
            ->get("region")->result();
        foreach($usres as $usre) {
            $url = base_url("autoprogram/calculationrecordSchoolRegion/".$usre->id);
            sleep($time);
            file_get_contents($url);
        }
        echo "calculationregion".date('Y-m-d H:i:s')."\n";
    }

    public function calculationrecordSchoolRegion($region_id=0){
        echo "addtime2".date('Y-m-d H:i:s')."\n";
        $this->calculationrecord->calculationrecordSchoolRegion($region_id);
        echo "addtime2".date('Y-m-d H:i:s')."\n";
        return true;
    }


    public function syncCourseLesson($user_id=0){
        echo "syncCourseLesson".date('Y-m-d H:i:s')."\n";
        $user= $this->user->getUser($user_id);

        $courses = $this->db->get("courses")->result();
        foreach($courses as $course){

            $this->courseauth->syncStudentCourseData($user,$course->id);
        }
        echo "syncCourseLesson".date('Y-m-d H:i:s')."\n";
        return true;
    }


    public function  syncCourseLessongetUser()
    {
        echo "syncCourseLessongetUserstart".date('Y-m-d H:i:s')."\n";
        $time = 1;
        $usres = $this->db->select("id")
            ->get("users")->result();
        foreach($usres as $usre) {
            $url = base_url("autoprogram/syncCourseLesson/".$usre->id);
            sleep($time);
            file_get_contents($url);
        }
        echo "syncCourseLessongetUserstop".date('Y-m-d H:i:s')."\n";
    }
}
