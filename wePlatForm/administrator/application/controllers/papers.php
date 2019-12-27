<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);

class Papers extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('amoeba');
        $this->load->model('school');
        $this->load->model('grades');
        $this->load->model('classes');
        $this->load->model('question');
        $this->load->model('paper');
        if(!getAdminViewer()->id){
            redirect('login');
        }else{
            $permissions = getAdminViewer()->getUserRolePermission();
            $permission_urls = array();
            foreach($permissions as $permission){
                $permission_urls[] = $permission->url;
            }
            if(!in_array("/exampaper/",$permission_urls)){
                redirect('error');
            }
        }
    }


    public function savePaper(){
        $result=$this->input->post();
        $paper_id = $this->paper->uploadPaper($result);
        echo $paper_id;
    }

    public function saveModel(){
        $result=$this->input->post();
        $obj=json_decode($result['paper']);
        $paperModel_id = $this->paper->savePaperModel($obj);
        $this->paper->savePaperSection($obj,$paperModel_id);
        echo json_encode(array(
            'modeData'=>$this->paper->getPaperModel($paperModel_id),
            'modeSection'=>$this->paper->getPaperSection($paperModel_id),
            'modeQuesData'=>$this->paper->getPaperModelQues($paperModel_id),
        ));
    }
    //修改model数据
    public function updateModelData(){
        $result=$this->input->post();
        $obj=json_decode($result['paper']);
        $modelid=$result['modelid'];
        $this->paper->updatePaperModel($obj,$modelid);
        $this->paper->updatePaperSection($obj,$modelid);
//        $this->paper->updatePaperQues($obj,$modelid);
        echo json_encode(array(
            'modeData'=>$this->paper->getPaperModel($modelid),
            'modeSection'=>$this->paper->getPaperSection($modelid),
            'modeQuesData'=>$this->paper->getPaperModelQues($modelid),
        ));
    }

    //获取修改model
    public function updataModel(){
        $result=$this->input->post();
        $obj=json_decode($result['modelId']);
        echo json_encode(array(
            'modeData'=>$this->paper->getPaperModel($obj),
            'modeSection'=>$this->paper->getPaperSection($obj),
            'modeQuesData'=>$this->paper->getPaperModelQues($obj),
        ));
    }

    //获取试卷列表
    public function getParperList(){
        $data = $this->input->get();
        echo json_encode(array(
            'data'=>$this->paper->getPaperInfoList($data['pageSize'],$data['pageSize']*($data['pageIndex']-1),$data),
            'itemsCount'=>$this->paper->getParperDataCount(),
        ));
    }

//删除问题
    public function DeletePaper(){
        $data = $this->input->post();
        $paper = $this->paper->getPaper($data['paper_id']);
        if(isset($paper->id) && !empty($paper)) $paper->delete();
        echo json_encode($this->returncode);
    }

}


