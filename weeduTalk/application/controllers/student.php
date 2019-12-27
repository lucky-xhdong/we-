<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);
class Student extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('classes');
        $this->load->model('question');
        $this->load->model('paper');
        $this->load->model('teachers');
        $this->load->model('students');
        $this->load->model('stuanswer');
//        if(getViewer()->id == 0){
//            redirect("login/index");
//        }
    }

    //考试单元1
    public function part1($test_id=0){
        $data['testrelationship'] = $this->db->where("id",$test_id)->get("exam_paper_class_user_relationship")->row();
        if($data['testrelationship']){
            $data['paper_id'] = $data['testrelationship']->paper_id;
            $data['group_id'] = $data['testrelationship']->group_id;
            $data['relationship_id'] = $test_id;
        }else{
            $data['paper_id'] = 0;
            $data['group_id']  =0;
        }
        $this->students->start_test($test_id);
        $this->load->view('exam/part1',$data);
    }

    //获取考试单元
    public function getPart(){
        $data = $this->input->get();
        $con = $this->paper->gePaperDetailModelQuesById($data['paper_id']);
        $paperModelCount = count($con['paperModel']);
        if ($data['count']>=$paperModelCount){
            echo '0';
        }else{
            echo json_encode(array(
                'data' => $con['paperModel'][$data['count']]
            ));
        }
    }

    //考上交卷
    public function uploadAnswer(){
        $result=$this->input->post();
        $obj=json_decode($result['answer']);
        //上传考试问题并返回分数
       $model_score =  $this->students->get_exam_scores($obj);
       //插入用户考试记录
       $model_scores = $this->students->set_exam_scores($obj,$model_score,1);
        echo json_encode(array(
            'data' => $model_scores,
        ));
    }

    //获取考生考试详情
    public function getExamDetail($paper_id,$group_id){
//        $data['testrelationship'] = $this->db->where("id",$relationship_id)->get("exam_paper_class_user_relationship")->row();
        $con = $this->stuanswer->getexam($paper_id,getViewer()->id,$group_id);
       $data['list'] = $con['paperModel'];
        $this->load->view('exam/view_test_detail',$data);
    }


    public function exportPdf($paperid,$gropid){
        $url = base_url('student/getExamDetail/'.$paperid.'/'.$gropid);
        require_once (MPDF . "/mpdf.php");
        $mpdf = new mPDF('zh-CN');
        $mpdf->useAdobeCJK = true;
        $mpdf->SetDisplayMode('fullpage');
        $mpdf=new \mPDF('zh-cn','A4', 0, '宋体', 0, 0);
//        $url = 'http://112.124.2.173/weeduTalk/index.php/student/getExamDetail/50/1';
        $strContent = file_get_contents($url);
        $mpdf=new \mPDF('+aCJK','A4','','',32,25,27,25,16,13);
        $mpdf->showWatermarkText = true;
        $mpdf->useDefaultCSS2 = true;
        $mpdf->WriteHTML($strContent);
        $mpdf->Output(); //直接输出pdf内容
        //$mpdf->Output('tmp.pdf',true);//保存成pdf文件
    }

    //考试单元2
    public function part2(){
        $this->load->view('exam/part2');
    }
    //考试单元2
    public function part3(){
        $this->load->view('exam/part3');
    }
    //考试单元2
    public function part4(){
        $this->load->view('exam/part4');
    }
    //考试单元2
    public function mp3(){
        $this->load->view('exam/mp3');
    }
    //选词填空
    public function xctk(){
        $this->load->view('exam/xctk');
    }
    //考试完成
    public function exam_com($test_id){
//        $data['testrelationship'] = $this->db->where("id",$test_id)->get("exam_paper_class_user_relationship")->row();
        //根据试卷id 拿出该考生模块 分数 以及做对题的数量
        $this->students->end_test($test_id);
        $data['exam_user'] = $this->students->getUserExamScore($test_id);
         $this->load->view('exam/exam_com',$data);
    }
}


