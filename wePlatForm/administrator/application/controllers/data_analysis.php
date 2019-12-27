<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 *教学进度
 *
 *
 **/


class Data_analysis extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('school');
        $this->load->model('region');
        $this->load->model('grades');
        $this->load->model('group');
        $this->load->model('classes');
        $this->load->model('course');
        $this->load->model('lesson');
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
        $this->load->view('wePlatForm/planaudit');
    }

    public function plan(){
        $this->load->view('wePlatForm/planaudit');
    }

    public function getPlanCount(){
        $entity = $this->input->get();


        $row_business['business_total'] = $this->db;
         if(isset($entity['start_date']) && !empty($entity['start_date']) ){
             $row_business['business_total'] = $row_business['business_total']->where("created_time >=",$entity['start_date']);
         }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $row_business['business_total'] = $row_business['business_total']->where("created_time <=",$entity['end_date']);
        }
         $row_business['business_total'] = $row_business['business_total']->get("region_service_plan_detail")
            ->num_rows();

        $row_business['business_1'] = $this->db;
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $row_business['business_1'] = $row_business['business_1']->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $row_business['business_1'] = $row_business['business_1']->where("created_time <=",$entity['end_date']);
        }
        $row_business['business_1'] = $row_business['business_1']->where("status",2)->get("region_service_plan_detail")
            ->num_rows();

        $row_business['business_2'] = $this->db;
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $row_business['business_2'] = $row_business['business_2']->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $row_business['business_2'] = $row_business['business_2']->where("created_time <=",$entity['end_date']);
        }
        $row_business['business_2'] = $row_business['business_2']->where("status",3)->get("region_service_plan_detail")
            ->num_rows();


        $row_business['business_3'] = $this->db;
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $row_business['business_3'] = $row_business['business_3']->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $row_business['business_3'] = $row_business['business_3']->where("created_time <=",$entity['end_date']);
        }
        $row_business['business_3'] = $row_business['business_3']->where("status",1)->get("region_service_plan_detail")
            ->num_rows();




        $row_business['education_total'] = $this->db;
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $row_business['education_total'] = $row_business['education_total']->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $row_business['education_total'] = $row_business['education_total']->where("created_time <=",$entity['end_date']);
        }
        $row_business['education_total'] = $row_business['education_total']->get("region_education_plan_detail")
            ->num_rows();

        $row_business['education_1'] = $this->db;
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $row_business['education_1'] = $row_business['education_1']->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $row_business['education_1'] = $row_business['education_1']->where("created_time <=",$entity['end_date']);
        }
        $row_business['education_1'] = $row_business['education_1']->where("status",2)->get("region_education_plan_detail")
            ->num_rows();

        $row_business['education_2'] = $this->db;
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $row_business['education_2'] = $row_business['education_2']->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $row_business['education_2'] = $row_business['education_2']->where("created_time <=",$entity['end_date']);
        }
        $row_business['education_2'] = $row_business['education_2']->where("status",3)->get("region_education_plan_detail")
            ->num_rows();


        $row_business['education_3'] = $this->db;
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $row_business['education_3'] = $row_business['education_3']->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $row_business['education_3'] = $row_business['education_3']->where("created_time <=",$entity['end_date']);
        }
        $row_business['education_3'] = $row_business['education_3']->where("status",1)->get("region_education_plan_detail")
            ->num_rows();




        $row_business['operate_total'] = $this->db;
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $row_business['operate_total'] = $row_business['operate_total']->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $row_business['operate_total'] = $row_business['operate_total']->where("created_time <=",$entity['end_date']);
        }
        $row_business['operate_total'] = $row_business['operate_total']->get("region_operate_plan_detail")
            ->num_rows();

        $row_business['operate_1'] = $this->db;
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $row_business['operate_1'] = $row_business['operate_1']->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $row_business['operate_1'] = $row_business['operate_1']->where("created_time <=",$entity['end_date']);
        }
        $row_business['operate_1'] = $row_business['operate_1']->where("status",2)->get("region_operate_plan_detail")
            ->num_rows();

        $row_business['operate_2'] = $this->db;
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $row_business['operate_2'] = $row_business['operate_2']->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $row_business['operate_2'] = $row_business['operate_2']->where("created_time <=",$entity['end_date']);
        }
        $row_business['operate_2'] = $row_business['operate_2']->where("status",3)->get("region_operate_plan_detail")
            ->num_rows();


        $row_business['operate_3'] = $this->db;
        if(isset($entity['start_date']) && !empty($entity['start_date']) ){
            $row_business['operate_3'] = $row_business['operate_3']->where("created_time >=",$entity['start_date']);
        }
        if(isset($entity['end_date']) && !empty($entity['end_date']) ){
            $row_business['operate_3'] = $row_business['operate_3']->where("created_time <=",$entity['end_date']);
        }
        $row_business['operate_3'] = $row_business['operate_3']->where("status",1)->get("region_operate_plan_detail")
            ->num_rows();

        echo json_encode(array(
            'items'=>array($row_business),
            'totalCount'=>1,
        ));
    }


    public function planPublish(){
        $this->load->view('wePlatForm/planaudit');
    }
    public function account(){
        $data['regions'] = $this->region->getRegionList();
        $data['provinces'] = $this->functions->getProviceList();
        $data['citys'] = $this->functions->getCityList();
        $data['districts'] = $this->functions->getAreaList();
        $this->load->view('wePlatForm/anaAccount',$data);
    }
}
