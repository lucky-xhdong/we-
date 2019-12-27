<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 *教学进度
 *
 *
 **/


class Results_show extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('category') ;
        $this->load->model('article') ;
        $this->load->model('school') ;
        $this->load->model('region') ;
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

    public function index($category_id=0,$start = 0)
    {
        $role = getAdminViewer()->getUserRole();
        $region_school_info = getAdminViewer()->getPlatFormAccountRegion();
        if(count($region_school_info) > 0){
            $region_info = $region_school_info[0];
        }else{
            $region_info = array();
        }
        $school = 0;
        $region = 0;
        if(count($region_info) > 0){
            if($role->type == 555555 && !empty($region_info->school_id)){
                $school = $this->school->getSchool($region_info->school_id);
            }else{
                $region = $this->region->getRegion($region_info->region_id);
            }
        }

        //$data['region']  = $this->region->getRegion(4);
        $data['categorys'] 	 = $this->category->getCategorySecondList(70);
        if(count($data['categorys']->children) && $category_id == 0){
            $data['category_id'] = $data['categorys']->children[0]->id;
        }else{
            $data['category_id'] = $category_id;
        }
        $data['category'] = $this->category->getCategory($data['category_id']);

        $this->load->library('pagination');
        $this->pagination->uri_segment = 4;
        $config['base_url'] = anchorurl('results_show/index/'.$data['category']->id.'/');
        $config['total_rows'] = $this->category->getSchoolArticlesForListCount($region,$school,$data['category']->id);
        $config['per_page'] = 20;
        $config['full_tag_open'] = '<ul id="bp-3-element-test" class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = ' <li class="active"><a href="javascript:;">'; // 当前页开始样式
        $config['cur_tag_close'] = '</a></li>';
        $this->pagination->initialize($config);
        $data['articles'] = $this->category->getSchoolArticleForCategory($region,$school,$data['category']->id,$config['per_page'],$start);

        $this->load->view('wePlatForm/results_show',$data);
    }

    public function show($id=0){
        $data['article']        = $this->article->getarticleDetail((int)$id);
        if($data['article']){
            $data['category'] = $this->category->getCategory($data['article']->catid);
            $this->load->view('wePlatForm/articleDetail',$data);
        }else{
            show_404();
        }
    }
}
