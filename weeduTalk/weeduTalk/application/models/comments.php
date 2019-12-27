<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Comments extends CI_Model
{

	public $objectType = 'comment';

	public $id 	   = 0;

	public $_minxer = null;


    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
			'id'           => array("require" => false),
			'user_id'      => array("require" => true),
			'created_time' => array("require" => true),
			"body"  	   => array("require" => false),
			"to_user_id"   => array("require" => false),
			"object_id"    => array("require" => false),
			"object_type"  => array("require" => false),
        );
        parent::_initialize($config);
    }

	public function setMinxer($minxer){
		$this->_minxer = $minxer;
		return $this;
	}

	/*
	 * 如果评论comment，则生成一个comment对象
	 *
	 *
	 */

	public function getComment($id=0){
		$comment = new self;
		$data = $this->config['attributes'];
		$com = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("comments")->row_array();
		if(count($com)){
			foreach($com as $key=>$val){
				if(empty($val)) $val = "";
				$comment->$key = $val;
			}
		}
		return $comment;
	}

	public function  getCommentInfo(){
		$data = array();
		if(isset($this->id)){
			$data = array(
				'id'            => $this->id,
				'userInfo'       => $this->user->getUser($this->user_id)->getUserInfoNotToken(),
				'created_time' =>  date('Y-m-d H:i:s',strtotime($this->created_time)),
				"body"  	    => $this->body,
				'toUserInfo'       => $this->user->getUser($this->to_user_id)->getUserInfoNotToken(),
			);
		}
		return $data;
	}

	/*
	 * 增加一评论
	 *
	 */

	public function addComment($body="",$user=null,$to_user=null){
		if($this->_minxer && !empty($body) && $user){
			if($this->checkAuthForComment($user)){
				$data['object_type'] = $this->_minxer->object_type;
				$data['body']    = $body;
				$data['user_id'] =  $user->id;
				$data['object_id'] = $this->_minxer->id;
				$data['created_time'] = date('Y-m-d H:i:s');
				if($to_user){
					$data['to_user_id'] =  $to_user->id;
				}
				$this->db->insert('comments',$data);
				$commentId = $this->db->insert_id();
				$comment = $this->getComment($commentId);
				$this->returncode['data'] =$comment->getCommentInfo();
				$this->resetStatus($comment);
				return $this;
			}else{
				$this->errorMessage = '没有权限评论';
				$this->errorCode = '400001';
			}
		}
		return $this;
	}

	public function addComments($body="",$user=null){
		return $this->setMinxer($this)->addComment($body,$user);
	}

	/*
	 *
	 *
	 */

	private function checkAuthForComment($user){
		if(isset($user->id) &&  $this->_minxer){
			return true;
		}
		return false;
	}



	public function isReport($comment){
		$row = $this->db->where("object_type","comment")->where("object_id",$comment->id)->get('report')->row();
		if($row){
			return true;
		}else{
			return false;
		}
	}

	/*
	 * 获取评论列表
	 *
	 */

	public function getCommentsList($start=0,$limit=20){
		$data = array();
		if($this->_minxer){
			$entity = $this->config['attributes'];
			$comments  = $this->db
				->select('id')
				->where('object_type',$this->_minxer->object_type)
				->where("object_id",$this->_minxer->id);
			if($limit === false){
				$comments =	$comments->get("comments")->result();
			}else{
				$comments =	$comments->limit($limit,$start)->get("comments")->result();
			}
			foreach($comments as $comment){
				$entity[] = $this->getComment($comment->id)->getCommentInfo();

			}
		}
		$this->returncode['data'] = $entity;
		return $this;
	}

	/*
	 *
	 *  更新字段
	 *
	 */
	public function updateColumn($data=array()) {
		$this->db->where("id", $this->id);
		$this->db->update("comments", $data);
		return true;
	}

	public function resetStatus($comment=null){
		if($this->_minxer->object_type){
			$row =  $this->db->select('count(*) as num')
				->where('object_type',$this->_minxer->object_type)
				->where("object_id",$this->_minxer->id)
				->get("comments")->row();
			$this->_minxer->updateColumn(array(
				        'comment_count'=>$row->num,
						'last_comment_time'=>$comment->created_time,
				        'last_comment_body'=>$comment->body,
				        'last_comment_user_id'=>$comment->user_id)
			);
		}
		return $this;
	}

}