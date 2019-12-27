<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Model{


	public $entity = array();
	// 构造用户
	public function __construct(){
		parent::__construct();
		$this->entity = $this->_initialize();
	}

	public function _initialize($config=array())
	{
		$config['attributes'] = array(
			'id'	    	=> 0,
			'title' 	    => NULL,
			'create_time' 	=> NULL,
			'description' 	=> NULL,
			'picture_url'	=> NULL,
//			'origin'		=> NULL,
			'body'			=> NULL,
			'catid'			=> NULL,
			'url'			=> NULL,
			'metadata'		=> NULL,
			'videourl'		=> NULL,
			'fileurl'		=> NULL,
			'type'			=> NULL,
			'is_stick'		=> NULL,
			'home_recommend'=> NULL,
			'status'		=> NULL,
			'region_ids'	=> NULL,
			'region_id'	=> NULL,
			'school_id'		=> NULL,
			'province_id'	=> NULL,
			'city_id'		=> NULL,
			'district_id'	=> NULL,
			'author'	=> NULL,

		);
		return $config['attributes'];
		//parent::_initialize($config);
	}



	public function saveArticle($data=array()){

		foreach($data as $key => $val){
			if(!in_array($key,array_keys($this->entity))){
				unset($data[$key]);
			}
		}
		if(isset($data['id']) && !empty($data['id'])){
			$this->db->where("id",$data['id']);
			$this->db->update('content',$data);
		}else{
			$data['create_time']   = date('Y-m-d H:i:s');
			$data['user_id']        = getAdminViewer()->id;
			$this->db->insert('content',$data);
			$data['id'] = $this->db->insert_id();
		}
		$file = $this->storage->uploadContentFile();
		if ($file->errorCode == 0) {
			$data1['picture_url'] = $file->data['file_name'];
			$this->db->where("id",$data['id']);
			$this->db->update('content',$data1);
		}
		return $data['id'];
	}


	public function getArticleList($catid=0){
		return $this->db->select(implode(',',array_keys($this->entity)))->where('catid',$catid)->order_by('create_time','desc')->limit(10)->get('content')->result();
	}

	public function getArticleFormList($catid=0){
		return $this->db->select(implode(',',array_keys($this->entity)))->where('published',1)->where('catid',$catid)->order_by('create_time','desc')->limit(9)->get('content')->result();
	}

	public function getArticleForList($catid=0,$limit=0,$start=20){
		$data = $this->entity;
		unset($data["body"]);
			$articles = $this->db->select(implode(',',array_keys($data)));
			if($catid != 0){
				$articles = $articles->where('catid',$catid);
			}
		    $entity = $this->input->get();
			if(isset($entity['start_date']) && !empty($entity['start_date']) ){
				$articles = $articles->where("create_time >=",$entity['start_date']);
			}
			if(isset($entity['end_date']) && !empty($entity['end_date']) ){
				$articles = $articles->where("create_time <=",$entity['end_date']);
			}
			if(isset($entity['key']) && !empty($entity['key']) ){
				$articles = $articles->like("title",$entity['key']);
			}
			if(isset($entity['catid']) && !empty($entity['catid']) ){
				$articles = $articles->where("catid",$entity['catid']);
			}
			$articles = $articles->order_by('create_time','desc')->get('content',$limit,$start)->result();

			foreach($articles as $key=> $article){
				$articles[$key]->picturename = $article->picture_url;
				if(!empty($article->picture_url)){
						$articles[$key]->picture_url =  originpictureurl(0,$article->picture_url,'large');
				}else{
					$articles[$key]->picture_url = "";
				}
				if(!empty($article->user_id)){
					$articles[$key]->userInfo =  $this->user->getUser($article->user_id)->getUserInfoNotToken();;
				}else{
					$userInfo = new stdClass();
					$userInfo->id = 0;
					$userInfo->name = "";
					$articles[$key]->userInfo = $userInfo;
				}
				if(!empty($article->catid)){
					$articles[$key]->category  =  $this->category->getCategory($article->catid);
				}else{
					$category = new stdClass();
					$category->id = 0;
					$category->name = "";
					$articles[$key]->category = $category;
				}

			}
		return $articles;
	}



	public function getArticleForClientList($catid=0,$limit=0,$start=20){
		$data = $this->entity;
		unset($data["body"]);
		$articles = $this->db->select(implode(',',array_keys($data)));
		if($catid != 0){
			$articles = $articles->where('catid',$catid);
		}
		$entity = $this->input->get();
		if(isset($entity['start_date']) && !empty($entity['start_date']) ){
			$articles = $articles->where("create_time >=",$entity['start_date']);
		}
		if(isset($entity['end_date']) && !empty($entity['end_date']) ){
			$articles = $articles->where("create_time <=",$entity['end_date']);
		}
		if(isset($entity['key']) && !empty($entity['key']) ){
			$articles = $articles->like("title",$entity['key']);
		}
		if(isset($entity['catid']) && !empty($entity['catid']) ){
			$articles = $articles->where("catid",$entity['catid']);
		}
		$articles = $articles->where("status",1)->order_by('create_time','desc')->get('content',$limit,$start)->result();

		foreach($articles as $key=> $article){
			$articles[$key]->picturename = $article->picture_url;
			if(!empty($article->picture_url)){
				$articles[$key]->picture_url =  originpictureurl(0,$article->picture_url,'large');
			}else{
				$articles[$key]->picture_url = "";
			}
			if(!empty($article->user_id)){
				$articles[$key]->userInfo =  $this->user->getUser($article->user_id)->getUserInfoNotToken();;
			}else{
				$userInfo = new stdClass();
				$userInfo->id = 0;
				$userInfo->name = "";
				$articles[$key]->userInfo = $userInfo;
			}
			if(!empty($article->catid)){
				$articles[$key]->category  =  $this->category->getCategory($article->catid);
			}else{
				$category = new stdClass();
				$category->id = 0;
				$category->name = "";
				$articles[$key]->category = $category;
			}

		}
		return $articles;
	}

	public function getArticleForListCount($catid=0){

		$article = $this->db;
		if($catid != 0){
			$article = $article->where('catid',$catid);
		}
		$entity = $this->input->get();
		if(isset($entity['start_date']) && !empty($entity['start_date']) ){
			$article = $article->where("create_time >=",$entity['start_date']);
		}
		if(isset($entity['end_date']) && !empty($entity['end_date']) ){
			$article = $article->where("create_time <=",$entity['end_date']);
		}
		if(isset($entity['key']) && !empty($entity['key']) ){
			$article = $article->like("title",$entity['key']);
		}
		if(isset($entity['catid']) && !empty($entity['catid']) ){
			$article = $article->where("catid",$entity['catid']);
		}

		return $article->where("status",1)->get('content')->num_rows();
	}

//	public function getArticleForList($catid=0,$start=0,$limit=4){
//		$category = $this->db->where('id',$catid)->get('category')->row();
//		$articles = $this->db->select(implode(',',array_keys($this->entity)))->where('catid',$catid)->order_by('create_time','desc')->get('content',$limit,$start)->result();
//		foreach($articles as $key=> $article){
//			if(!empty($article->picture_url)){
//				if($category->template == 2){
//					$articles[$key]->picture_url =  originpictureurl(0,$article->picture_url,'large');
//				}else{
//					$articles[$key]->picture_url =  pictureurlsize(0,$article->picture_url,'big');
//				}
//			}else{
//				$articles[$key]->picture_url = "";
//			}
//		}
//		return $articles;
//	}

	public function getarticleDetail($id){
		$this->addHits($id);
		$article =  $this->db->select(implode(',',array_keys($this->entity)))->where('id',$id)->get('content')->row();
		if(!empty($article->fileurl)){
			$article->fileurl = anchorurl('show/download/'.$article->id);
		}else{
			$article->fileurl = "";
		}
		if(!empty($article->videourl)){
			$article->videourl = base_url().'media/assets/files/'.$article->videourl;
		}else{
			$article->videourl = "";
		}
		if(!empty($article->picture_url)){
			$article->picture_url =  originpictureurl(0,$article->picture_url,'large');
		}else{
			$article->picture_url = "";
		}
		return $article;
	}

	public function addHits($id){
		$this->db->where('id',$id);
		$this->db->set('hits','hits + 1',FALSE);
		$this->db->update('content');
	}

	public function getCategoryForartileList($categorys){
		$articles = $this->db->select(implode(',',array_keys($this->entity)))
			->where_in('catid',$categorys)
			->where("picture_url !=","")
			->order_by('hits','desc')
			->limit(9)->get('content')->result();
		foreach($articles as $key=> $article){
			if(!empty($article->picture_url)){
				$article->picture_url =  originpictureurl(0,$article->picture_url,'large');
			}else{
				$article->picture_url =  "";
			}
		}
		return $articles;
	}

	public function getSearchArticleList($post,$limit=10,$start=0){
		$keyarrays = explode(' ',$post['key']);
		$condition = array();
		foreach($keyarrays as $key=>$val){
			if(!empty($val))
			$condition[]= '`title` like "%'.urldecode($val).'%" OR `body` like "%'.urldecode($val).'%" OR `author` like "%'.urldecode($val).'%" ';
		}
		$conditionstring   = implode(' OR ',$condition);
		$articles = $this->db
					->select('content.*,category.name as catname')
					->where("category.is_platform",1)
					->where_not_in("category.id",array(75))
					->join('category','category.id=content.catid','left');
					if(count($condition)){
						$articles = $articles->where("(".$conditionstring.")");
					}
		$articles = $articles->where("status",1)->order_by('hits','desc')
					->limit($limit,$start)->get('content',$limit,$start)->result();
		return $articles;
	}

	public function getHomePictureList(){
		$articles = $this->db->select(implode(',',array_keys($this->entity)))->where('catid',6)->order_by('sort','asc')->limit(4)->get('content')->result();
		foreach($articles as $key=> $article){
			$articles[$key]->picture_url =  pictureurlsize(0,$article->picture_url,'scientist');
		}
		return $articles;
	}

	public function getARticleForm(){
		$article = $this->db->select(implode(',',array_keys($this->entity)))->where('published',1)->where('catid',5)->order_by('create_time','desc')->limit(1)->get('content')->row();
		return $article;
	}
	public function getCategoryArticle($catid){
		$article = $this->db->select(implode(',',array_keys($this->entity)))->where('catid',$catid)->order_by('create_time','desc')->limit(1)->get('content')->row();
		if(isset($article->id)){
			if(!empty($article->fileurl)){
				$article->fileurl = anchorurl('show/download/'.$article->id);
			}else{
				$article->fileurl = "";
			}
			if(!empty($article->videourl)){
				$article->videourl = base_url().'media/assets/files/'.$article->videourl;
			}else{
				$article->videourl = "";
			}
		}
		return $article;
	}

	public function getArticleListasc($catid=0){
		return $this->db->select(implode(',',array_keys($this->entity)))->where('catid',$catid)->where("status",1)->order_by('id','asc')->limit(10)->get('content')->result();
	}


	public function getStickArticle($catid=0){
		$article = $this->db->select(implode(',',array_keys($this->entity)))->where('catid',$catid)->where("status",1)->order_by('create_time','desc')->get('content')->row();
		if($article){
			$article->picture_url =  originpictureurl(0,$article->picture_url,'large');
		}
		return $article;
	}

	public function getRecommendArticleList($catid=0,$start=1,$limit=3){
		$category = $this->db->where('id',$catid)->get('category')->row();
		$articles = $this->db->select(implode(',',array_keys($this->entity)))->where("status",1)->where('catid',$catid)->order_by('create_time','desc')->get('content',$limit,$start)->result();
		foreach($articles as $key=> $article){
			if(!empty($article->picture_url)){
				if($category->template == 2){
					$articles[$key]->picture_url =  originpictureurl(0,$article->picture_url,'large');
				}else{
					$articles[$key]->picture_url =  pictureurlsize(0,$article->picture_url,'large');
				}
			}else{
				$articles[$key]->picture_url = "";
			}
		}
		return $articles;
	}


	public function getSchoolCategoryArticle($region,$school,$catid,$limit=10,$start=0){

		$articles = $this->db
			->where("status",1)
			->select('content.*,category.name as catname,category.colorstring')
			->join('category','category.id=content.catid','left');;
			if($catid){
				$articles = $articles->where('catid',$catid);
			}
			if(isset($school->id)){
				$articles = $articles->where('school_id',$school->id);
			}
			if(isset($region->id)){
				$articles = $articles->where('region_id',$region->id);
			}

			//$articles = $articles->or_where('region_id',0);
			//$articles = $articles->or_where('school_id',0)
		$articles = $articles->order_by('create_time','desc')
			->limit($limit,$start)->get('content')->result();
		foreach($articles as $article){
				$article->picturename = $article->picture_url;
				if(!empty($article->fileurl)){
					$article->fileurl = anchorurl('show/download/'.$article->id);
				}else{
					$article->fileurl = "";
				}
				if(!empty($article->videourl)){
					$article->videourl = base_url().'media/assets/files/'.$article->videourl;
				}else{
					$article->videourl = "";
				}
				if(!empty($article->picture_url)){
					$article->picture_url =  originpictureurl(0,$article->picture_url,'large');
				}else{
					$article->picture_url =  "";
				}
		}
		return $articles;
	}


	public function getSchoolArticleForListCount($region,$school,$catid=0){

		$article = $this->db;
		if($catid != 0){
			$article = $article->where('catid',$catid)->where("status",1);
			if(isset($school->id)){
				$article = $article->where('school_id',$school->id);
			}
			if(isset($region->id)){
				$article = $article->where('region_id',$region->id);
			}

			//$article = $article->or_where('region_id',0);
			//$article = $article->or_where('school_id',0);
			return $article->get('content')->num_rows();
		}
		return 0;
	}



	public function getRegionNewestCategoryArticle($region,$limit=3,$start=0){
		$articles = $this->db->select(implode(',',array_keys($this->entity)))
			->where('region_id',$region->id)->where("status",1)
			->order_by('create_time','desc')
			->limit($limit,$start)->get('content')->result();
		foreach($articles as $article){
			if(isset($article->id)){
				if(!empty($article->fileurl)){
					$article->fileurl = anchorurl('show/download/'.$article->id);
				}else{
					$article->fileurl = "";
				}
				if(!empty($article->videourl)){
					$article->videourl = base_url().'media/assets/files/'.$article->videourl;
				}else{
					$article->videourl = "";
				}
				if(!empty($article->picture_url)){
					$article->picture_url =  originpictureurl(0,$article->picture_url,'large');
				}else{
					$article->picture_url =  "";
				}
			}
		}
		return $articles;
	}

}  
