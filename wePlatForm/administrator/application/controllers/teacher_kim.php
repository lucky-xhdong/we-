<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * @author kim.zhang
 * 老师的所有操作功能
 * 老师列表、老师添加、老师信息修改、老师导入、任务发布、初始化密码等。
 *
 */
class Teacher extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('amoeba');
        //$this->load->model('school');
        $this->load->model('teachers');
        $this->load->model('grades');
        $this->load->model('group');
        $this->load->model('classes');
        $this->load->model('course');
        $this->load->model('lesson');
        $this->load->model('courseauth');
        if(!getAdminViewer()->id){
            redirect('login');
        }else{
           // if($this->userpermission->hasPermissions(getAdminViewer(),array_keys($this->region->initPermission())) === false){
           //     redirect('error');
           // }
        }
    }
    public function test()
    {
    	//$data = $this->teachers->getTeacherList();
    	//print_r($data);
    }

    /**
     * 老师列表搜索按钮操作栏
     * 搜索条件包括学科、职务、姓名
     */
    public function index(){
        $data[''] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();

        $this->load->view('wePlatForm/teacher',$data);
    }

    
    
    public function view(){
        $this->load->view('wePlatForm/schools_business');
    }

    public function getSchoolInfo($school_id){
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();

        $this->load->view('tmpl/regionBasicEdit',$data);
    }
	
}
