<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schools extends CI_Controller {

	function __construct(){
	   parent::__construct();
       $this->load->model('category') ;
        $this->load->model('article') ;
		$this->load->model('school') ;
		$this->load->model('region') ;

    }

	public function index($school_id = 0,$category_id=0,$start = 0)
	{
		$data['school'] = $this->school->getSchool($school_id);
		$data['region']  = $this->region->getRegion($data['school']->region_id);
		$data['categorys'] 	 = $this->category->getCategorySecondList(70);
		if(count($data['categorys']->children) && $category_id == 0){
			$data['category_id'] = $data['categorys']->children[0]->id;
		}else{
			$data['category_id'] = $category_id;
		}
        $data['category'] = $this->category->getCategory($data['category_id']);

		$this->load->library('pagination');
		$this->pagination->uri_segment = 5;
		$config['base_url'] = anchorurl('schools/index/'.$data['school']->id.'/'.$data['category']->id.'/');
		$config['total_rows'] = $this->category->getSchoolArticlesForListCount($data['region'],$data['school'],$data['category']->id);
		$config['per_page'] = 5;
		$config['full_tag_open'] = '<ul id="bp-3-element-test" class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['cur_tag_open'] = ' <li class="active"><a href="javascript:;">'; // 当前页开始样式
		$config['cur_tag_close'] = '</a></li>';
		$this->pagination->initialize($config);
		$data['articles'] = $this->category->getSchoolArticleForCategory($data['region'],$data['school'],$data['category']->id,$config['per_page'],$start);

	    $this->load->view('cases',$data);
	}

	public function getArticleList($school_id = 0,$category_id=0,$start = 0){
		$data['school'] = $this->school->getSchool($school_id);
		$data['region']  = $this->region->getRegion($data['school']->region_id);
		$config['per_page'] = 5;
		$data['articles'] = $this->category->getSchoolArticleForCategory($data['region'],$data['school'],$category_id,$config['per_page'],$start);
		$this->load->view('tmpl/caseslist',$data);
	}

}
