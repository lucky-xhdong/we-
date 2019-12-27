<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alist extends CI_Controller {

	function __construct(){
	   parent::__construct();
       $this->load->model('category') ;
        $this->load->model('article') ;

    }

	public function index($category_id = 0,$start = 0)
	{
        $data['category_id'] = (int)$category_id;
        $data['categorys'] = $this->category->getMenuCategoryArticleList(58);
        if((int)$category_id != 0 ){
            $data['category']  = $this->category->getCategory((int)$category_id);
        }else if(count($data['categorys'])){
            $data['category']  = $this->category->getCategory($data['categorys'][0]->id);
        }
        $this->load->library('pagination');
        $config['base_url'] = anchorurl('alist/index/'.$category_id.'/');
        $config['total_rows'] = $this->category->getArticlesForListCount($data['category']->id);
        $config['per_page'] = 6;
        $config['full_tag_open'] = '<ul id="bp-3-element-test" class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = ' <li class="active"><a href="javascript:;">'; // 当前页开始样式
        $config['cur_tag_close'] = '</a></li>';
        $this->pagination->initialize($config);
        $data['articles'] = $this->category->getArticlesForList($data['category']->id,$start,$config['per_page']);
        $this->load->view('articlelists',$data);

	}

    public function article($id=0)
    {   $data['menu_categorys'] = $this->category->getCategoryList();
        $data['category_bar'] = $this->category->getCategory($id);
        $data['hot_articles'] = $this->category->getHotArticles();
        $data['category'] = $this->category->getCategorySecondList($id);
        if($data['category']->id == $id && isset( $data['category']->children[0]->id)){
            $data['article']   = $this->category->getArticleForCategory($data['category']->children[0]->id);
        }else{
            $data['article']   = $this->category->getArticleForCategory($id);
        }
        $data['categoryid'] = $id;
        $this->load->view('train',$data);
    }

    public function getArticleList($id,$start=0){
        $data['articles']   = $this->category->getArticlesForList($id,$start);
        $this->load->view('tmpl/articlelist',$data);
    }

    //二级页(今日热点、热门文章)
    public function hotNews()
    {
        $this->load->view('hotNews');
    }

    //三级页(文章详情页)
    public function articleDetail()
    {
        $this->load->view('articleDetail');
    }

    //搜索页
    public function searchPage()
    {
        $this->load->view('searchPage');
    }

    //搜索页
    public function articlesearch()
    {
        $this->load->view('articlesearch');
    }

    public function forms(){
        $data['menu_categorys'] = $this->category->getCategoryList();
        $data['froms']   = $this->category->getFormList();
        $data['hot_articles'] = $this->category->getHotArticles();
        $data['formbuild']             = $this->article->getARticleForm();
        $this->load->view('listPage',$data);
    }
}
