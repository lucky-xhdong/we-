<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ignore_user_abort(true);
set_time_limit(0);
class Teacherexams extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('teachertestexam');
        $this->load->model('teacherexamrecordmanager');

    }


    public function getTeacherExam(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            return $this->teachertestexam->getTeachertestexamRow($user,$argus[0]);
        }
        return $this;
    }


    public function getTeacherExamHistoryList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            return $this->teachertestexam->getTeacherExamHistoryList($user,$argus[0]);
        }
        return $this;
    }

    public function examReusult($exam_id = 0,$user_id=0){
        $data['errcode'] = 0;
        $data['errdesc'] = "";
        $data['exam_id'] = $exam_id;
        $data['user_id'] = $user_id;
        $data['exam'] = $this->teachertestexam->getTeachertestexam($exam_id);
        if($access_token = $this->input->get('access_token')){
            $token = $this->wetalkjwthelp->decodeToken($access_token);
            if(empty($token->userid)){
                $data['errcode'] = 999998;
                $data['errdesc'] = "非法token";
            }else{
                $user = $this->user->getUser($token->userid);
                if(isset($user->id)){
                    $data["user"] = $user;
                }else{
                    $data['errcode'] = 999999;
                    $data['errdesc'] = "授权失败";
                }
            }
        }else if($user_id !=0 ){
            $user = $this->user->getUser($user_id);
        }else{
            $data['errcode'] = 999999;
            $data['errdesc'] = "授权失败";
        }
        $data['user'] = $user;
        if(!isset($user->id) || $user->id ==0 || !isset( $data['exam']->id)){
            echo "数据请求错误!";exit;
        }
        $class = $data['user']->getUserSchoolGradeClassRealtionShip();
        if(!isset($class->id) ){
            echo "数据请求错误!";exit;
        }
        $teacherexamrecordmanager = $this->teacherexamrecordmanager->initialize();
        $teacherexamrecordmanager->user_id =  $data['user']->id;
        $teacherexamrecordmanager->teacher_exam_id =  $exam_id;
        $data['result'] = $teacherexamrecordmanager->getUserExamResult();
        $school = $this->db->select("name")->where("id", $class->school_id)->get("school")->row();
        $data['schoolName'] = $school->name;
        $data['firstComments'] =  $teacherexamrecordmanager->analysisData($data['exam']);
        $data['firstSecondComments'] =  $teacherexamrecordmanager->analysisSecondData($data['exam']);
        $data['totalScores'] = $teacherexamrecordmanager->getExamTotalScore($data['exam']);
        $this->load->view('evaluation/evaluation',$data);
    }


    public function examReusult2($exam_id = 0,$user_id=0){
        $data['errcode'] = 0;
        $data['errdesc'] = "";
        $data['exam_id'] = $exam_id;
        $data['user_id'] = $user_id;
        $data['exam']    = $this->teachertestexam->getTeachertestexam($exam_id);
        if($access_token = $this->input->get('access_token')){
            $token = $this->wetalkjwthelp->decodeToken($access_token);
            if(empty($token->userid)){
                $data['errcode'] = 999998;
                $data['errdesc'] = "非法token";
            }else{
                $user = $this->user->getUser($token->userid);
                if(isset($user->id)){
                    $data["user"] = $user;
                }else{
                    $data['errcode'] = 999999;
                    $data['errdesc'] = "授权失败";
                }
            }
        }else if($user_id !=0 ){
            $user = $this->user->getUser($user_id);
        }else{
            $data['errcode'] = 999999;
            $data['errdesc'] = "授权失败";
        }
        $data['user'] = $user;
        if(!isset($user->id) || $user->id ==0 || !isset( $data['exam']->id)){
            echo "数据请求错误!";exit;
        }
        $class = $data['user']->getUserSchoolGradeClassRealtionShip();
        if(!isset($class->id) ){
            echo "数据请求错误!";exit;
        }
        $teacherexamrecordmanager = $this->teacherexamrecordmanager->initialize();
        $teacherexamrecordmanager->user_id =  $data['user']->id;
        $teacherexamrecordmanager->teacher_exam_id =  $exam_id;
        $data['result'] = $teacherexamrecordmanager->getUserExamResult();
        $data['rank'] = $teacherexamrecordmanager->getUserExamResultRank();

        $school = $this->db->select("name")->where("id", $class->school_id)->get("school")->row();
        $data['schoolName'] = $school->name;
        $data['firstComments'] =  $teacherexamrecordmanager->analysisData($data['exam']);
        $data['firstSecondComments'] =  $teacherexamrecordmanager->analysisSecondData($data['exam']);
        $data['totalScores'] = $teacherexamrecordmanager->getExamTotalScore($data['exam']);
        $this->load->view('evaluation/evaluation2',$data);
    }


    public function savePicture(){
        $post = $this->input->post();
        $exam_id  = $post['exam_id'];
        $user_id  = $post['user_id'];
        $image    = $post['image'];
        $return = array();
        $imageName = $user_id.'_'.$exam_id.'.png';
        if (strstr($image,",")){
            $image = explode(',',$image);
            $image = $image[1];
        }
        $filename = "assets/".'examPicturePath/n'.$exam_id.'/'. $imageName;
        $path = UPLOADFILEPATH.'examPicturePath/n'.$exam_id.'/';
        if (!is_dir($path)){ //判断目录是否存在 不存在就创建
            mkdir($path,0755,true);
        }
        $imageSrc= $path."/". $imageName; //图片名字
        $r = file_put_contents($imageSrc, base64_decode($image));//返回的是字节数
        $return['fileURl'] = "http://47.99.171.103/".$filename;
        if (!$r) {

        }else{

        }
        echo json_encode($return);
    }

    public function getteacherexamsDataOfUser($exam_id = 0,$user_id=0){
        echo json_encode(array());
    }

}
