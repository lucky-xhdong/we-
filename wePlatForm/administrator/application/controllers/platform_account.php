<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Platform_account extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('region');
        $this->load->model('school');
        $this->load->model('roles');
        $this->load->model('permission');

        $this->load->model('course');


        if(!getAdminViewer()->id){
            redirect('login');
        }else{
            $permissions = getAdminViewer()->getUserRolePermission();
            $permission_urls = array();
            foreach($permissions as $permission){
                $permission_urls[] = $permission->url;
            }
            if(!in_array("/platform_account/",$permission_urls)){
                redirect('error');
            }
        }
    }

    //平台账户
    public function index(){
        $data['regions'] = $this->region->getRegionList();
        $data['roles'] = $this->roles->getRoleList();
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();
        $data['school'] = $this->school->getSchool(24);
        $data['school_id'] = 24;
        $data['schoolPropertys'] = $this->school->getSchoolPropertyList();
        $data['courses'] = $this->course->getCourseList()->returncode['data'];
        if (isset($data['school']) && !empty($data['school']->course_ids)) {
            $coursearry = explode(",", $data['school']->course_ids);
        } else {
            $coursearry = array();
        }
        foreach ($data['courses'] as $key=> $course) {
            if (in_array($course["id"],$coursearry)){
                $data['courses'][$key]['isSelected'] = 1;
            }else{
                $data['courses'][$key]['isSelected'] = 0;
            }
        }

        $this->load->view('platform_account',$data);
    }


    public function getPlatformAccountList(){
        $data = $this->input->get();
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$this->user->getPlatformAccount($limit,$limit*($page-1))->returncode['data'],
            'totalCount'=>$this->user->getPlatformAccountCount(),
        ));
    }


    public function getUserInfo($id)
    {
        $data['user'] = $this->user->getUser($id);
        $data['courses'] = $this->course->getCourseList()->returncode['data'];
        $data['roles'] = $this->roles->getRoleList();
        if (!empty($data['user']->course_ids)) {
            $coursearry = explode(",", $data['user']->course_ids);
        } else {
            $coursearry = array();
        }
        foreach ($data['courses'] as $key=> $course) {
            if (in_array($course["id"],$coursearry)){
                $data['courses'][$key]['isSelected'] = 1;
            }else{
                $data['courses'][$key]['isSelected'] = 0;
            }
        }

        $this->load->view('tmpl/userPlatFormBasicEdit',$data);
    }

}
