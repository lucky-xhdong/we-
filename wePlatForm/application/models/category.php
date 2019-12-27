<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Model{
    

	public function __construct(){
		parent::__construct();
		//$this->load->model('article') ;
	}


	public function getCategoryList(){
		$categorys = $this->db->where('type',0)->where('parent_id',0)->where('is_menu',1)->order_by('sort','asc')->get('category')->result();
		foreach($categorys as $key => $category){
			$secondCategory = $this->db->where('type',0)->where('parent_id',$category->id)->get('category')->result();
			$categorys[$key]->children = $secondCategory;
		}
		return $categorys;
	}

	public function getPlatformCategoryList(){
		$categorys = $this->db->where('is_platform',1)->order_by('sort','asc')->get('category')->result();
		return $categorys;
	}

	public function getCategorySecondList($catid){
		$category = $this->db->where('type',0)->where('id',$catid)->get('category')->row();
		if($category->parent_id == 0){
			$secondCategory = $this->db->where('type',0)->where('parent_id',$category->id)->order_by('sort','asc')->get('category')->result();
		}else{
			$secondCategory = $this->db->where('type',0)->where('parent_id',$category->parent_id)->order_by('sort','asc')->get('category')->result();
			$category = $this->db->where('type',0)->where('id',$category->parent_id)->get('category')->row();
		}
		$category->children = $secondCategory;
		return $category;
    }

	public function getCategory($catid){
		$category = $this->db->where('id',$catid)->get('category')->row();
		if($category){
			if($category->parent_id ==0){
				$category->parent = new stdClass();
				$category->parent->id = 0;
			}else{
				$first = $this->db->where('id',$category->parent_id)->get('category')->row();
				$category->parent = $first;

			}
			return $category;
		}else{
			show_404();
		}
	}

	public function addArticleCount($catid){
		$count = $this->db->select('count(*) as num')->where("catid",$catid)->get('content')->row();
		$this->db->where('id',$catid);
		$this->db->set('article_count',$count->num,FALSE);
		$this->db->update('category');
	}

	public function getRecommendCategoryArticles($catid=0){
		$categorys = $this->db->where('is_publish',1)->where('parent_id',$catid)->order_by('sort','asc')->get('category')->result();
		foreach($categorys as $key=> $category){
			$category->StickArticle = $this->article->getStickArticle($category->id);
			$category->RecommendArticles = $this->article->getRecommendArticleList($category->id);
		}
		return $categorys;
	}


	public function getRecommendSecondCategoryArticles($catid=0){
		$categorys = $this->db->where('is_publish',1)->order_by('sort','asc')->get('category')->result();
		foreach($categorys as $key=> $category){
			$categorys[$key]->articles = $this->article->getArticleList($category->id);
		}
		return $categorys;
	}


	public function getArticlesForList($id,$start=0,$limit=6){
		$category = $this->db->where('id',$id)->get('category')->row();
		$articles = $this->article->getArticleForList($category->id,$limit,$start);
		return $articles;
     }

	public function getArticleForClientList($id,$start=0,$limit=6){
		$category = $this->db->where('id',$id)->get('category')->row();
		$articles = $this->article->getArticleForClientList($category->id,$limit,$start);
		return $articles;
	}



	public function getArticlesForListCount($id){
		return $this->article->getArticleForListCount($id);
	}


	public function getArticleForCategory($id){
		$category = $this->db->where('id',$id)->get('category')->row();
		$article = $this->article->getCategoryArticle($category->id);
		return $article;
	}

	public function getHotArticles(){
		$categorys = $this->db->where_in('parent_id',array(58,64))->or_where_in('id',array(58,64))->get('category')->result();
		$articles = $this->article->getCategoryForartileList($this->toArray($categorys));
		return $articles;
	}

	public function toArray($result){
		$data = array();
		foreach($result as $val){
			$data[] = $val->id;
		}
		return $data;
	}

	public function getFriendList(){
		$content = $this->db
			->select('*')
			->order_by('sort','asc')
			->get('friendlink')
			->result();
		return $content;
	}

	public function getFormList(){
		return $this->article->getArticleFormList(5);
	}

	public function getAdminLink(){
		$content = $this->db
			->select('*')
			->get('adminlink')
			->row();
		if($content){
			$content->picture_url = originpictureurl(0,$content->picture_url);
		}
		return $content;
	}

	public function getCategoryArticleList($catid){
		$categorys = $this->db->where('type',0)->where('parent_id',$catid)->order_by('sort','asc')->get('category')->result();
		foreach($categorys as $key => $category){
			//$secondCategory = $this->db->where('type',0)->where('parent_id',$category->id)->get('category')->result();
			//$categorys[$key]->children = $secondCategory;
			$category->articles = $this->article->getArticleListasc($category->id);
		}
		return $categorys;
	}

	public function getRegiosList(){
		$regions= $this->db->limit(8)->get('region')->result();
		foreach($regions as $key => $region){
			$region->picture_url =  pictureurlsize(0,$region->picture_url,'android');
		}
		return $regions;
	}

	public function getMenuCategoryArticleList($catid){
		$categorys = $this->db->where('is_menu',1)->where('parent_id',$catid)->order_by('sort','asc')->get('category')->result();
		foreach($categorys as $key => $category){
			//$secondCategory = $this->db->where('type',0)->where('parent_id',$category->id)->get('category')->result();
			//$categorys[$key]->children = $secondCategory;
			$category->articles = $this->article->getArticleListasc($category->id);
		}
		return $categorys;
	}



	public function getSchoolArticlesForListCount($region,$school,$id){
		return $this->article->getSchoolArticleForListCount($region,$school,$id);
	}


	public function getSchoolArticleForCategory($region,$school,$id,$limit=10,$start=0){
		$category = $this->db->where('id',$id)->get('category')->row();
		$articles = $this->article->getSchoolCategoryArticle($region,$school,$category->id,$limit,$start);
		return $articles;
	}
}  
