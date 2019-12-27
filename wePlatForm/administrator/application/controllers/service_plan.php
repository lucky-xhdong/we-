<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 *服务计划
 *
 *
 **/


class Service_plan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('region');
        $this->load->model('school');
        $this->load->model('regioneducationplan');
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
        $this->load->view('wePlatForm/educationPlan');
    }

    public function detail($plan_id = 0,$start=0){

        $data['start_date'] = $this->input->get("start_date");
        $data['end_date'] = $this->input->get("end_date");
        $data['plan_id'] =  $plan_id;
        $data['plan_detail'] = $this->region->getRegionEducationPlanInfo($plan_id);
        $this->load->library('pagination');
        $this->pagination->uri_segment = 4;
        $config['base_url'] = anchorurl('service_plan/detail/'.$plan_id.'/');
        $config['total_rows'] = $this->regioneducationplan->getRegionEducationPlanCount($plan_id,$data);
        $config['per_page'] = 5;
        $config['full_tag_open'] = '<ul id="bp-3-element-test" class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = ' <li class="active"><a href="javascript:;">'; // 当前页开始样式
        $config['cur_tag_close'] = '</a></li>';
        $this->pagination->initialize($config);
        $data['plans'] =   $this->regioneducationplan->getRegionEducationPlanList($config['per_page'],$start,$plan_id,$data);

        $this->load->view('wePlatForm/service_plan',$data);
    }

    public function getRegionEducationPlanList($region_id = 0){
        $data['region_school_info'] = getAdminViewer()->getPlatFormAccountRegion();
        if(count($data['region_school_info']) >=1){
            $data['region_school_info'] = $data['region_school_info'][0];
            $region = $this->region->getregion($data['region_school_info']->region_id);
        }else{
            $region = $this->region->getregion($region_id);
        }
        $page = $this->input->get("page")?$this->input->get("page"):1;
        $limit = $this->input->get("limit")?$this->input->get("limit"):20;
        echo json_encode(array(
            'items'=>$region->getRegionEducationPlanList($limit,($page-1)*$limit,$this->input->get("status")),
            'totalCount'=>$region->getRegionEducationPlanCount($this->input->get("status")),
        ));
    }
    
    public function service_calendar(){
        $this->load->view('wePlatForm/serviceCalendar');
    }
}
