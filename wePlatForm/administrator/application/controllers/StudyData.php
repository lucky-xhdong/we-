<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StudyData extends CI_Controller {

    function __construct(){
        parent::__construct();
    }
//学习数据--公司
    public function index(){
        $this->load->view('studyData');
    }
//学习数据--巴
    public function studyDataBranch(){
        $this->load->view('studyDataBranch');
    }
//学习数据--省
    public function studyDataCity(){
        $this->load->view('studyDataCity');
    }
//学习数据--市
    public function studyDataCounty(){
        $this->load->view('studyDataCounty');
    }
//学习数据--學校
    public function studyDataSchool(){
        $this->load->view('studyDataSchool');
    }
//学习数据--年级
    public function studyDataGrade(){
        $this->load->view('studyDataGrade');
    }
//学习数据--班级
    public function studyDataClass(){
        $this->load->view('studyDataClass');
    }
//学习数据--班级--班级详细数据
    public function studyDetailDataClass(){
        $this->load->view('studyDetailDataClass');
    }
//学习数据--班级--设置课程
    public function setClass(){
        $this->load->view('setClass');
    }
//学习数据--班级--设置课程
    public function setClassSave(){
        $this->load->view('setClassSave');
    }
//学习数据--班级--学习要求设置
    public function setClassLearn(){
        $this->load->view('setClassLearn');
    }
//学习数据--班级--学习报告
    public function setClassLearnReport(){
        $this->load->view('setClassLearnReport');
    }
//学习数据--学生数据
    public function studentData(){
        $this->load->view('studentData');
    }
//学习数据--学生数据--学生详细数据
    public function studyDataPeople(){
        $this->load->view('studyDataPeople');
    }
//学习数据--学生数据--成绩报告
    public function personalLearnReport(){
        $this->load->view('personalLearnReport');
    }
}
