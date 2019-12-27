<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 *学生报表数据
 *
 *
 **/


class StudentReport extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model("classes");
        $this->load->model("unit");
        if(!getViewer()->id){
            redirect('login');
        }
    }

    public function index(){
        $data['user'] = getViewer();
        $classrelationship = $data['user']->getUserSchoolGradeClassRealtionShip();
        $data['courses'] = $this->classes->getSchoolCourse($classrelationship->school_id,$classrelationship->class_id);
        $data["units"] = $this->unit->getUnits($data['courses'][0]->id);
        $data['userRecordInfo'] = $data['user']->getUserRecordDataInfo();
        $data['userDataLine']  = $data['user']->getStudentPerweekStudyUserCount();
        $data['LearningSituationOverview'] = $data['user']->getLearningSituationOverview();
        $data['studyCourse'] = $this->db->where("user_id",$data['user']->id)->group_by("course_id")->get("users_record")->num_rows();
        $data['unit'] = $this->db->where("user_id",$data['user']->id)->where("course_id",$data['courses'][0]->id)->group_by("unit_id")->get("users_record")->num_rows();
        if(count($data['courses'] >0)){
            $data["progress_course"] = ($data['studyCourse']/count($data['courses'])) >1?1:$data['studyCourse']/count($data['courses']);
        }else{
            $data["progress_course"] = 0;
        }
        if(count($data['units'] >0)){
            $data["progress_unit"] = ($data['unit']/count($data['units'])) >1?1:$data['unit']/count($data['units']);
        }else{
            $data["progress_unit"] = 0;
        }
        $this->load->view('studentReport',$data);
    }

    public function getCourseUnits($course_id){
        $data["units"] = $this->unit->getUnits($course_id);
        echo json_encode( $data);
    }

    public function getStudentdetail(){
        $data['user'] = getViewer();
        $this->recordmanager->user_id    = $data['user']->id;
        $end_time       = date('Y-m-d');
        $this->recordmanager->date = date('Y-m-d',strtotime($end_time. '-14 days'));;
        $this->recordmanager->date   =$end_time;
        $return_array['result'] = array(
            round($this->recordmanager->getUserPartsCompletion(),2),
            round($this->recordmanager->getUserPartsCorrect(),2),
            round($this->recordmanager->getUserPartsPass(),2),
            round($this->recordmanager->getUserMTaverage(),2),
            round($this->recordmanager->getUserSrPecent(),2),
        );
        echo json_encode($return_array);
    }


    public function getStudentdetailText(){
        $data['user'] = getViewer();
        $this->recordmanager->user_id    = $data['user']->id;
        $end_time       = date('Y-m-d');
        $this->recordmanager->start_time = date('Y-m-d',strtotime($end_time. '-14 days'));;
        $this->recordmanager->end_time   =$end_time;
        $return_array['result'] = array(
           "AveragePerWeekDays"=>round($this->recordmanager->getUserAveragePerWeekDays(),2),
           "AveragePerWeekTime"=>round($this->recordmanager->getUserAveragePerWeekTime(),2),
            "UserRecordDataInfo"=>$data['user']->getUserRecordDataInfo(), //totalTime,//totalday //studyscore
            "UserRepeatRatioAbc"=>round($this->recordmanager->getUserRepeatRatioAbc(),2),
            "UserMicRatioHead"   => round($this->recordmanager->getUserMicRatioHead(),2),
            "UserRepeatRatioMicRatioHead"=> round($this->recordmanager->getUserRepeatRatioMicRatioHead(),2),
            "UserSkillListen"   =>  $this->recordmanager->getUserSkillListen(),
            "UserSkillSPeak"   =>  $this->recordmanager->getUserSkillSPeak(),
            "UserSkillGrammer" =>  $this->recordmanager->getUserSkillGrammer(),
            "UserPartsPass"    => round($this->recordmanager->getUserPartsPass(),2)
        );
        echo json_encode($return_array);
    }

    public function getLearningSituationOverview(){
        $data['user'] = getViewer();
        $data['userRecordInfo'] = $data['user']->getUserRecordDataInfo();
        $data['userDataLine']  = $data['user']->getStudentPerweekStudyUserCount();
        $data['dateLine'] = array_keys($data['userDataLine']);
        $data['dateLineValue'] = array_values($data['userDataLine']);
        $data['LearningSituationOverview'] = $data['user']->getLearningSituationOverview();
        echo json_encode($data);
    }

}
