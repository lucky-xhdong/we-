<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);

class Exampaper extends CI_Controller {

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

//    public function index(){
//        $data['amoebas'] = $this->amoeba->getAmoebaList();
//        $this->load->view('studyData',$data);
//    }

    public function getAmoebaList(){
        echo json_encode(array(
            'data'=>$this->amoeba->getAmoebaInfoList(),
            'itemsCount'=>$this->amoeba->getAmoebaCount(),
        ));
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
    public function studyDataSchool($amoeba_id){
        $data['schools'] = $this->school->getSchoolList($amoeba_id);
        $data['amoebas'] = $this->amoeba->getAmoebaList();
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();
        $this->load->view('studyDataSchool',$data);
    }
    public function getSchoolList(){
        $data = $this->input->get();
        echo json_encode(array(
            'data'=>$this->school->getSchoolInfoDataList($data['pageSize'],$data['pageSize']*($data['pageIndex']-1),$data),
            'itemsCount'=>$this->school->getSchoolDataCount($data),
        ));
    }

//学习数据--年级
    public function studyDataGrade($school_id = 0){
        $data['school_id'] = $school_id;
        $data['school'] = $this->school->getSchool($school_id);
        $data['grades'] = $this->grades->getGradeList($school_id);
        $this->load->view('studyDataGrade',$data);
    }

    public function getGradeList(){
        $data = $this->input->get();
        echo json_encode(array(
            'data'=>$this->grades->getGradeInfoDataList($data['school_id'],$data['pageSize'],$data['pageSize']*($data['pageIndex']-1)),
            'itemsCount'=>$this->grades->getGradeCount($data['school_id']),
        ));
    }

//学习数据--班级
    public function studyDataClass($grade_id=0){
        $data['grade_id'] = $grade_id;
        $data['grade'] = $this->grades->getGrade($grade_id);
        $data['school'] = $this->school->getSchool($data['grade']->school_id);
        $data['classes']   = $this->classes->getClassList($grade_id);
        $this->load->view('studyDataClass',$data);
    }

    public function getClassList(){
        $data = $this->input->get();
        echo json_encode(array(
            'data'=>$this->classes->getClassInfoDataList($data['grade_id'],$data['pageSize'],$data['pageSize']*($data['pageIndex']-1)),
            'itemsCount'=>$this->classes->getClassCount($data['grade_id']),
        ));
    }


//学习数据--班级--班级详细数据
    public function studyDetailDataClass($class_id=0){
        $data['class_id'] = $class_id;
        $data['class'] =  $this->classes->getClass($class_id);
        $data['grade'] = $this->grades->getGrade($data['class']->grade_id);
        $data['school'] = $this->school->getSchool($data['class']->school_id);
        $data['users'] = $this->classes->getClassUserScoreList($class_id);
        $this->load->view('studyDetailDataClass',$data);
    }

    public function getClassUserScoreDataList(){
        $data = $this->input->get();
        echo json_encode(array(
            'data'=>$this->classes->getClassUserScoreDataList($data['pageSize'],$data['pageSize']*($data['pageIndex']-1),$data['class_id']),
            'itemsCount'=>$this->classes->geClassUserScoreDataCount($data['class_id']),
        ));
    }

    public function studyClass($lcass_id=0){
        $this->load->view('studyDetailDataClass');
    }
//学习数据--班级--设置课程
    public function setClass(){
        $this->load->view('setClass');
    }
//学习数据--班级--设置课程
    public function setClassSave($lcass_id=0){ //改
        $data['class_id'] = $lcass_id;
        $data['class'] =  $this->classes->getClass($lcass_id);
        $data['grade'] = $this->grades->getGrade($data['class']->grade_id);
        $data['school'] = $this->school->getSchool($data['class']->school_id);
        $this->load->view('setClassSave',$data);
    }
//学习数据--班级--学习要求设置
    public function setClassLearn($lcass_id=0){//改
        $data['class_id'] = $lcass_id;
        $data['class'] =  $this->classes->getClass($lcass_id);
        $data['grade'] = $this->grades->getGrade($data['class']->grade_id);
        $data['school'] = $this->school->getSchool($data['class']->school_id);
        $this->load->view('setClassLearn',$data);
    }
//全部课程概览报告
public function allCourseReport(){
    $this->load->view('allCourseReport');
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


    //考题主页 题库
    public function examinationQuestion(){
        $data['school'] = $this->school->getSchoolName();//学校名
        $data['skill'] = $this->question->getQuestionsSkill();//技能
        $data['type'] = $this->question->getQuestionsType();//答题类型
        $data['contype'] = $this->question->getQuestionsContype();//内容类型
        $data['theme'] = $this->question->getQuestionsTheme();//主题
        $data['diffculty'] = $this->question->getQuestionsDifficulty();//考题难度
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();
        $this->load->view('examinationQuestion',$data);
    }
//    考卷页
    public function index(){
        $data['school'] = $this->school->getSchoolName();//学校名
        $data['diffculty'] = $this->question->getQuestionsDifficulty();//考题难度
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();
        $this->load->view('examinationPaper',$data);
    }

    //    考卷页
    public function examinationPaper(){
        $data['school'] = $this->school->getSchoolName();//学校名
        $data['diffculty'] = $this->question->getQuestionsDifficulty();//考题难度
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();
        $this->load->view('examinationPaper',$data);
    }

    // 考卷详情页
    public function examPDetail($paperId){
      $data['paperId'] = $paperId;
      $data['school'] = $this->school->getSchoolName();//学校名
      $data['skill'] = $this->question->getQuestionsSkill();//技能
      $data['type'] = $this->question->getQuestionsType();//答题类型
      $data['diffculty'] = $this->question->getQuestionsDifficulty();//考题难度
      $data['paperDetail'] = $this->paper->gePaperDetailById($paperId);
      $data['paperDetailModel'] = $this->paper->gePaperDetailModelById($paperId);
//        echo json_encode(array(
//            'paperDetail'=>$this->paper->gePaperDetailById($paperId),
//            'paperDetailModel'=>$this->paper->gePaperDetailModelById($paperId),
//        ));
      $this->load->view('examPDetail',$data);
//        var_dump($data['paperDetailModel']);
    }

   // 创建考卷  examinationPaper简写 examP
      public function setUpExamP($msg,$score,$time){
        $data['paperId'] = $msg;
        $data['score'] = $score;
        $data['time'] = $time;
        $data['school'] = $this->school->getSchoolName();//学校名
        $data['skill'] = $this->question->getQuestionsSkill();//技能
        $data['type'] = $this->question->getQuestionsType();//答题类型
        $data['diffculty'] = $this->question->getQuestionsDifficulty();//考题难度
        $this->load->view('setUpExamP',$data);
      }
    // 考卷模态框  setUpExamPModal
    public function setUpExamPModal(){
        $this->load->view('setUpExamPModal');
    }

  // 选择考题_考题详情
  public function chooseExam(){
    $this->load->view('chooseExam');
  }

}


