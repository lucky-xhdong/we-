<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);

class Questions extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('amoeba');
        $this->load->model('school');
        $this->load->model('grades');
        $this->load->model('classes');
        $this->load->model('question');
        if(!getAdminViewer()->id){
            redirect('login');
        }
    }

    public function index(){
        $data['amoebas'] = $this->amoeba->getAmoebaList();
        $this->load->view('studyData',$data);
    }

    public function uploadQuestion(){
        $result=$this->input->post();
        $obj=json_decode($result['question']);
        $question_content_id = $this->question->uploadQuestionContent($obj);
        $question_id = $this->question->uploadQuestion($obj,$question_content_id);
        echo $question_id;
    }

    //修改题目
    public function modifyQuestion(){
        $result=$this->input->post();
        $obj=json_decode($result['question']);
        $this->question->modifyQuestionContent($obj);
        $this->question->modifyQuestionQues($obj);
    }
    //获取问题列表
    public function getQuestionList(){
        $data = $this->input->get();
//        var_dump($this->question->getQuestionInfoList($data['pageSize'],$data['pageSize']*($data['pageIndex']-1),$data));
        echo json_encode(array(
            'data'=>$this->question->getQuestionInfoList($data['pageSize'],$data['pageSize']*($data['pageIndex']-1),$data),
            'itemsCount'=>$this->question->getQuestionDataCount(),
        ));
    }
    //获取音频列表
    public function getVideoList(){
        $data = $this->input->get();
        echo json_encode(array(
            'data'=>$this->question->getVideoInfoList($data['pageSize'],$data['pageSize']*($data['pageIndex']-1),$data)
        ));
    }
    //删除音频根据音频id
    public function delAudioList($id){
        $status = $this->question->audio_delete($id);
        echo json_encode($status);
    }
    //删除问题
    public function DeleteQuestion(){
        $data = $this->input->post();
        $question = $this->question->getQuestion($data['question_id']);
        if(isset($question->id) && !empty($question)) $question->delete();
        echo json_encode($this->returncode);
    }

    //根据问题id获取问题详情
    public function getQuestionById(){
        $data = $this->input->post();
        echo json_encode(array(
            'data' => $this->question->getQuesById($data['quesId']),
            'quesitem' => $this->question->getQuestionItemById($data['quesId']),
        ));
    }

    //音频上传
    public function uploadAudio(){
            // 获取文件基本信息
            $media		= $_FILES["file"];
            $filename 	= $media['name'];//文件名
            $size 		= $media['size'];//文件大小
            $tmp_name 	= $media['tmp_name'];
            $error 		= $media['error'];
            $suffix = explode('.', $filename);

            $md5 = md5(file_get_contents($media["tmp_name"]));
            $target = FILEPATH.'audio/' . $md5 . '.'.$suffix[1];

            $uploadState = $this->question->uploadAudio($filename,$md5.'.'.$suffix[1],$suffix[1]);

            if($uploadState && move_uploaded_file($tmp_name, $target))
            $result = array();
            $result['success'] = true;
            $result['audioName'] = $filename;
            $result['hz'] = $suffix[1];

        echo json_encode($result);
    }

}


