<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 *教学进度
 *
 *
 **/


class Teaching_progress extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('teachingschedule');
        $this->load->model('teachingscheduletask');
        $this->load->model('materialresource');
        $this->load->model('school');
        if(!getAdminViewer()->id){
            redirect('login');
        }else{
            $permissions = getAdminViewer()->getUserRolePermission();
            $permission_urls = array();
            foreach($permissions as $permission){
                $permission_urls[] = $permission->url;
            }
        }
    }

    public function index(){
        $this->load->view('wePlatForm/teachings_progresss');
    }


    public function task($teachingschedule_id=0,$start=0){
        $data['teachingschedule'] = $this->teachingschedule->getTeachingSchedule($teachingschedule_id);
        $data['filelist'] = $this->materialresource->getResourceInfoListByIds($data['teachingschedule']->material_resource_ids);
        $this->load->library('pagination');
        $this->pagination->uri_segment = 4;
        $config['base_url'] = anchorurl('teaching_progress/task/'.$teachingschedule_id);
        $config['total_rows'] = $this->teachingscheduletask->getTeachingScheduleTaskCount($teachingschedule_id);
        $config['per_page'] = 3;
        $config['full_tag_open'] = '<ul id="bp-3-element-test" class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = ' <li class="active"><a href="javascript:;">'; // 当前页开始样式
        $config['cur_tag_close'] = '</a></li>';
        $this->pagination->initialize($config);
        $data['tasks']  = $this->teachingscheduletask->getTeachingScheduleTaskList($teachingschedule_id,$config['per_page'],$start);
        $this->load->view('wePlatForm/teaching_progress',$data);
    }

    public function getTeachingScheduleList(){
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$this->teachingschedule->getTeachingScheduleList($limit,($page-1)*$limit),
            'totalCount'=>$this->teachingschedule->getTeachingScheduleCount(),
        ));
    }

    public function getResourceFileInfo($resource_id){

        $fileInfo = $this->materialresource->getFileInfo($resource_id);
        $this->load->view('wePlatForm/tmpl/resourceFileInfo', $fileInfo);
    }
}
