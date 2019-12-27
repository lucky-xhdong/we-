<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Vote extends CI_Model
{

	public $id 	   = 0;

	public $_minxer = null;

    public function __construct()
    {
        parent::__construct();
    }

	/*
	 * 赞
	 */

	public function setMinxer($minxer){
		$this->_minxer = $minxer;
		return $this;
	}

	public function isVoted($user){
		$row =  $this->db->select('*')
			->where("user_id",$user->id)
			->where('object_type',$this->_minxer->object_type)
			->where("object_id",$this->_minxer->id)
			->get("story_vote")->row();
		if($row){
			if($row->isvote == 1){
				return true;
			}else{
				return false;
			}
		}
		return false;
	}


	public function voteUpStory($user){
		$row =  $this->db->select('*')
			->where("user_id",$user->id)
			->where('object_type',$this->_minxer->object_type)
			->where("object_id",$this->_minxer->id)
			->get("story_vote")->row();
		if($row){
			if($row->isvote == 1){
				$this->db->where('object_id',$this->_minxer->id)->where("user_id",$user->id);
				$this->db->set('isvote',0,false);
				$this->db->update('story_vote');
			}else{
				$this->db->where('object_id',$this->_minxer->id)->where("user_id",$user->id);
				$this->db->set('isvote',1,false);
				$this->db->update('story_vote');
			}
		}else{
			$data = array(
			   'created_time' => date('Y-m-d H:i:s'),
				'isvote' 	  => 1,
				'user_id' 	  => $user->id,
				'object_type' => $this->_minxer->object_type,
				'object_id'   =>$this->_minxer->id
			);
			$this->db->insert('story_vote',$data);
		}
		$this->resetStatus();
		$this->returncode['data'] = $this->getVoterList();
		return $this;
	}


	public function getVoterList(){
		    $result = $this->db->select("user_id")
			->where('object_type',$this->_minxer->object_type)
			->where('isvote',1)->where("object_id",$this->_minxer->id)
			->get("story_vote")->result();
		$users = array();
		foreach($result as $item){
			$users[] = $this->user->getUser($item->user_id)->getUserInfoNotToken();
		}
		return $users;
	}

	/*
	 *
	 * 更新赞状态
	 *
	 *
	 */

	public function resetStatus(){
			$row =  $this->db->select('count(*) as num')->where('object_type',$this->_minxer->object_type)
				->where('isvote',1)->where("object_id",$this->_minxer->id)->get("story_vote")->row();
			$this->_minxer->updateColumn(array('vote_up_count'=>$row->num));
		return true;
	}

}