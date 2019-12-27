<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);
class Teacher extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('classes');
        $this->load->model('question');
        $this->load->model('paper');
        $this->load->model('teachers');
        $this->load->model('students');
        if(getViewer()->id == 0){
            redirect("login/index");
        }
    }

    public function use_paper(){
        $result=$this->input->post();
        $obj=json_decode($result['relationship']);
//        $this->teachers->uploadPaperClass($obj);
       // $this->teachers->uploadUserScore($obj);
        $paper_class_id = $this->teachers->uploadUserRelationship($obj);
        echo $paper_class_id;
    }

    //监考
    public function invigilator($group_id=0,$class_id=0){
        $data = $this->teachers->getUserClassExamDetail($group_id,$class_id);
        $this->load->view('exam/invigilator',$data);
    }

    //查看成绩
    public function view_results($paper_id,$group_id){
        $data['paper_id'] = $paper_id;
        $data['group_id'] = $group_id;
       $data['studentList'] = $this->teachers->getPaperStudentList($paper_id,$group_id);

       $data['average'] = $this->teachers->getPaperStudentAverage($paper_id,$group_id);
        $this->load->view('exam/view_results',$data);
    }
    //阅卷列表
    public function marking($paper_id,$group_id){
        $data['paper_id'] = $paper_id;
        $data['group_id'] = $group_id;
        $data['usePaperMarkingList']  = $this->teachers->getPaperInfoAnswerList($paper_id,$group_id);
        $this->load->view('exam/marking',$data);
    }
    //查看班级考试详情
    public function view_classes_details(){
        $this->load->view('exam/view_classes_details');
    }
    //查看个人考试详情
    public function view_test_detail(){
        $this->load->view('exam/view_test_detail');
    }
    //复审
    public function review($paper_id,$group_id,$ques_status,$num){
        $data  = $this->teachers->markingPaper($paper_id,$group_id,$ques_status);
        $data['sss'] = $data['answer']['model_score'][0]->model_score_all;
        $data['answer'] = $data['answer'][$num];
        $data['count'] = count($data['answer']);

        if($data['answer']!=null){
            $data['msg'] = 1;
        }else{
            $data['msg'] = 0;
        }
        $data['paper_id'] = $paper_id;
        $data['group_id'] = $group_id;
        $data['ques_status'] = $ques_status;
        $data['num'] = $num;
        $this->load->view('exam/review',$data);
    }
    //作文阅卷
    public function marking_paper($paper_id,$group_id,$ques_status,$num){
        $data  = $this->teachers->markingPaper($paper_id,$group_id,3);
        $data_write  = $this->teachers->markingPaper($paper_id,$group_id,6);
        $data['answer'] = $data['answer'][$num];
        $data['answer_write'] = $data_write['answer'][$num];
        $data['count'] = count($data['answer']);
        if($data['answer']!=null){
            $data['msg'] = 1;
        }else{
            $data['msg'] = 0;
        }

        $data['paper_id'] = $paper_id;
        $data['group_id'] = $group_id;
        $data['ques_status'] = $ques_status;
        $data['num'] = $num;
        $this->load->view('exam/marking_paper',$data);
    }
    //修改分数和批阅状态
    public function marking_paper_score(){
        $result=$this->input->post();
        $data  = $this->teachers->updateScore($result);
        echo $data;
    }
}


