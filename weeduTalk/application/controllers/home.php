<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);
const APP_ID = '10222119';
const API_KEY = 'nGNDsIh06bT9TZrmibeEnoL9';
const SECRET_KEY = 'hIv5xjCNz0HCggzhogPGl6if5ClnMDZQ';

class Home extends CI_Controller {


    function __construct(){
        parent::__construct();

        $this->load->model('classes');
        $this->load->model('question');
        $this->load->model('paper');
        $this->load->model('teachers');
        $this->load->model('students');
//        if(getViewer()->id == 0){
//            redirect("login/index");
//        }
    }

    public function index(){
        if(getViewer()->id == 0){
            $this->load->view('exam/login');
        }else if(getViewer()->user_type == "student"){
            redirect("home/student");
        }else{
            redirect("home/teacher");
        }
    }

    //项目培训
    public function student($start=0)
    {
        //根据userid查询该学生的考试
        $data = array();
        $data['pageSize'] = 5;
        $data['pageIndex'] = $start;

        $this->load->library('pagination'); // 导入分页类
        $config['base_url'] = anchorurl('home/teacher/');

        $config['total_rows'] = $this->teachers->getPaperStudentInfoCount(getViewer()->id);
        // echo $config['total_rows'];exit;
        $config['per_page'] = 5;
        $config['full_tag_open'] = '<ul id="bp-3-element-test" class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = ' <li class="active"><a href="javascript:;">'; // 当前页开始样式
        $config['cur_tag_close'] = '</a></li>';
        $this->pagination->initialize($config);
        $this->pagination->uri_segment = 3;

        $data['classes_id'] =$this->classes->getClassIdByUserId(getViewer()->id)->class_id;
        $data['mePaperList'] = $this->teachers->getPaperStudentInfoList($data,getViewer()->id);
        $this->load->view('exam/student_home',$data);
    }

    public function teacher($start=0)
    {
        $data = array();
        $data['userid'] = getViewer()->id;
        $data['pageSize'] = 5;
        $data['pageIndex'] = $start;

        $this->load->library('pagination'); // 导入分页类
        $config['base_url'] = anchorurl('home/teacher/');



        //获取学校id
        $data['school_id'] = $this->paper->getUserGrade($data['userid'])->school_id;
        //根据老师id获取gradeid
        $data['garde_id'] =  $this->paper->getUserGrade($data['userid'])->grade_id;
        //查询老师所管理的班级
        $classes = $this->classes->getTeacherClass(getViewer())->returncode['data'];

        $config['total_rows'] = $this->teachers->getPaperInfoCount($data,$classes);
       // echo $config['total_rows'];exit;
        $config['per_page'] = 5;
        $config['full_tag_open'] = '<ul id="bp-3-element-test" class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = ' <li class="active"><a href="javascript:;">'; // 当前页开始样式
        $config['cur_tag_close'] = '</a></li>';
        $this->pagination->initialize($config);
        $this->pagination->uri_segment = 3;

        $data['usePaperList'] = $this->teachers->getPaperInfoList($data,$classes);
//        var_dump($data['usePaperList'][0]['exam_classes'][0]['grade']['name'].$data['usePaperList'][0]['exam_classes'][0]['class']['name']);
        //所属学校年级
        $data['gardeList'] = $this->classes->getGradeBySchoolIdList($data['garde_id']);
        //获取试卷库
        $data['paperList'] = $this->paper->getPaperInfoList($data['pageSize'],$data['pageIndex'],$data);
        //获取考卷难度
        $data['diffculty'] = $this->question->getQuestionsDifficulty();//考题难度
        $this->load->view('exam/teacher_home',$data);
    }

    //麦克风测试

    public function  microphoneTest(){
        $this->load->library('validatecode');
        $this->validatecode->doimg();
        $mic_num_code = $this->validatecode->getCode();

        $this->session->set_userdata('micnum_session', $mic_num_code);
        require_once (AIPSPEECH . "/AipSpeech.php");
        $aipSpeech = new AipSpeech(APP_ID, API_KEY, SECRET_KEY);
        $mic_num_code = $mic_num_code;
        $result = $aipSpeech->synthesis($mic_num_code, 'zh', 1, array(
            'vol' => 5,
        ));


// 识别正确返回语音二进制 错误则返回json 参照下面错误码
        if(!is_array($result)){
            file_put_contents('media/audio.mp3', $result);
            $return  = array("file_url"=>base_url('media/audio.mp3?a='.rand()),"result"=>1,"code"=>$mic_num_code);
        }else{
            $return  = array("file_url"=>"","result"=>0,"code"=>$mic_num_code);
        }
        echo json_encode($return);
        exit;
    }

    public function microphoneCodeTest($code=""){
        $this->load->library('validatecode');

        $micnumcode = $this->session->userdata('micnum_session');
        require_once (AIPSPEECH . "/AipSpeech.php");
        $aipSpeech = new AipSpeech(APP_ID, API_KEY, SECRET_KEY);
        if($micnumcode == $code){
            $message = "您的设备测试正常";
            $result1 = 1;
        }else{
            $message = "您的设备运行不正常,请检查";
            $result1 = 0;
        }
        $result = $aipSpeech->synthesis($message, 'zh', 1, array(
            'vol' => 5,
        ));


// 识别正确返回语音二进制 错误则返回json 参照下面错误码
        if(!is_array($result)){
            file_put_contents('media/codemessage.mp3', $result);
            $return  = array("file_url"=>base_url('media/codemessage.mp3?a='.rand()),"result"=>$result1);
        }else{
            $return  = array("file_url"=>"","result"=>0);
        }
        echo json_encode($return);
        exit;
    }


    //根据schoolid gradeid获取class
    public function getClassInfoList($school_id=0,$grade_id=0){
        echo json_encode(array(
            'data'=>$this->classes->getClassByGradeList($school_id,$grade_id)
        ));
    }

    //根据school_id garde_id class_id获取学生信息
    public function getStudentInfoList(){
        $data = $this->input->get();
        echo json_encode(array(
            'data'=>$this->classes->getClassUserList($data['school_id'],$data['garde_id'],$data['class_id'],'student')
        ));
    }

    //异步获取试卷列表
    public function getParperList(){
        $data = $this->input->get();
        echo json_encode(array(
            'data'=>$this->paper->getPaperInfoList($data['pageSize'],$data['pageSize']*($data['pageIndex']-1),$data)
        ));
    }

    //应用试卷
    public function use_paper()
    {
        $this->load->view('exam/use_paper');
    }


    public function testDynedGet(){

        $ch = curl_init();
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
        );
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        var_dump($output);
        exit;
    }

    public function testDynedPost(){
        $ch = curl_init();
        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        var_dump($output);
        exit;

    }

    public function testNextClassStanfordPost(){

        $password= base64_encode("stanford-staff:ketizud2e");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $array = array(
            "https://cn2api.records.dyned.com/classes/1db309b4-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/1db9400e-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/1dccacd4-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/1de31a96-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/1cff72ce-2707-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/bcd3b06a-292a-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/8bf2c17e-2c73-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/a6c947de-2c73-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/e034bbde-2c73-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/f8c93238-2c73-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/8c42b252-2d1c-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/4430d92a-3cfe-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/19cfd548-5f61-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/e532372e-6355-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/328d9f46-6373-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/9fddfdca-6373-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/eb894bc4-6375-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/68bdb11e-64e5-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/d24c98fe-650b-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/82739c94-6b4e-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/65e14fca-7fe1-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/1028e5e8-83b0-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/0a59b790-91df-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/0297bd58-9c08-11e6-ac31-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/6b19f7a6-9c2b-11e6-ac31-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/6e305926-f996-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/9fe29da4-f99a-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/4cb3a186-f99b-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/be6df834-f99c-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/31081ca2-f99e-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/f98136e6-f99e-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/b79cf688-f99f-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/b79e28b8-f9a0-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/e785821e-f9a1-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/96ad2454-f9a2-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/64e404dc-f9a3-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/b1bf0094-f9a4-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/931070d2-f9a5-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/a754acde-022e-11e7-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/64dec458-0476-11e7-8358-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/fbf6a95c-0a28-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/3af66a50-0a2b-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/416034fe-0ad8-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/35f1e200-0d41-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/6324b7c4-0d42-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/a3054e94-0d42-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/f5dbee16-0d42-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/571dc9ba-0d43-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/6b5c6574-0e08-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/fe75b432-0e08-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/0c2c3e9c-0e0a-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/ca779aaa-0ec2-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/81bf1a48-0f64-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/d3e54500-12bf-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/005dfda6-1528-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/84145134-1688-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/ead8fe1c-169a-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/7ff7333a-1b3a-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/60a56a96-1b3b-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/d0dc82cc-1b3b-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/7e2623a2-1b3c-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/a890e662-1b3d-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/7d403254-1fea-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/70114c7c-20de-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/bf1c7cdc-20df-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/8a4080ac-20e0-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/2de4b4ee-20e1-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/66370936-231c-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/0af077cc-2332-11e7-b120-782bcb129676/"
        );
        foreach($array as $item) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $item);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $output = curl_exec($ch);
            curl_close($ch);
            $obj = json_decode($output);
            echo $item . $obj->name."<br />";


        }

       // echo $output;
        exit;

    }

    public function testItemGroupsPost(){

        $password= base64_encode("stanford-staff:ketizud2e");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/classes/66370936-231c-11e7-b120-782bcb129676/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;
    }


    public function testGroupsPost(){

        $password= base64_encode("stanford-staff:ketizud2e");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/groups/");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;
    }

    public function testNextGroupsPost(){

        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/groups/1d72dd30-8348-11e5-bc55-782bcb129676/");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;

    }

    public function testNextClassPost(){

        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $array = array(
            "https://cn2api.records.dyned.com/groups/1d717288-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d7174f4-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d72c5d4-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d731fd4-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d7382f8-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d7454f8-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d74620e-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d747ece-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d74ec38-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d758a6c-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d75e714-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d76376e-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d764eca-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d764fc4-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d765b68-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d779ef6-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d77bb70-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d785120-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/a451bb70-e1b5-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d340968-f623-11e5-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/7ab8d774-1cc7-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1fbb0d06-41c0-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/2ae40e1c-41ca-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/a7c8bb74-5f6d-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/b2230eac-6fe5-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1e13a42a-6fee-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/33ca07a2-70aa-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/0dbe01c8-70da-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/c01562fe-7336-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/551ebf9a-74cb-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/7e5e8706-766e-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/3efc8f7a-7a49-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/6c2bc88a-7a49-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/c1d171c8-7e2b-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1797e3b2-7f03-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/302c664e-8081-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/c90ac570-83a8-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/bca4c06e-8eb7-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/a31c1364-950f-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/56c541a4-a65b-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/bc5a9d84-ab01-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/ff60847a-c73c-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/15d861a6-f806-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/d0d17d5a-048e-11e7-8358-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/278ae952-0add-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/2ce081de-1382-11e7-b120-782bcb129676/"
        );
        foreach($array as $item) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $item);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $output = curl_exec($ch);
            curl_close($ch);
            $obj = json_decode($output);
            if (isset($obj->name)) {
                echo $item . $obj->name."<br />";

            }
        }

        echo $output;
        exit;

    }

    public function testClassGroupsPost(){
        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/groups/3efc8f7a-7a49-11e6-a1b1-782bcb129676/");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;

    }

    public function testClassItemPost(){
        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $student = array(
            "name"=>"科德学院",
            "teacher"=>"郑文斌",
            "password"=>"123456",
            "teacher_email"=>"12@13.com"
        );
        $data_string = json_encode($student);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/classes/914e8fba-7d89-11e6-a1b1-782bcb129676/");
       // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;

    }

    public function getStudents(){
        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/students/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;

    }


    public function getStudentsSummary(){
        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/students/32e097e6-167f-11e6-a1b1-782bcb129676/studysummary/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;

    }

    public function addNewStudent(){
        $password= base64_encode("stanford-staff:ketizud2e");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $student = array(
            "classroom"=>"https://cn2api.records.dyned.com/classes/0af077cc-2332-11e7-b120-782bcb129676/",
            "name"=>"xiaoyun",
            "password"=>"123456",
            "email"=>"xiaoyun@163.com",
            "model_student"=>"https://cn2api.records.dyned.com/students/b67850e4-231c-11e7-b120-782bcb129676/"
        );
        $data_string = json_encode($student);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/students/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;

    }
}


