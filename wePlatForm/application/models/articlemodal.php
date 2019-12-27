<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class articlemodal extends CI_Model{  
    
	public $condation = array();
	
	// 构造用户
	public function __construct(){

	}
	
	// 获取 child 类型
	/*
	 * param type
	 * return array
	*/
	public function getChildType($type){
		return $this->db->select('type_id,name')->where('parent_type',$type)->get('article_type')->result();
	}
	
	// 获取 文章列表
	/*
	 * param $array
	 * return array
	*/
	
	public function getArticleList($context){
		
		if(!empty($context->time_axis)){
			$start_date = $this->getDate($context->time_axis); 
			$end_date   = date('Y-m-d');
			$this->condation[] = " create_time >= $start_date && create_time <= $end_date ";
		}
		if(!empty($context->child_type)){
			$this->condation[] = " child_type IN (".implode(',',$context->child_type).") ";
		}	
		
		return  $this->db->select('*')->where(implode(' AND ',$this->condation))->get('articles')->result();
	}
	
	public function getDate($time_axis){
		switch($time_axis){	
			case 0:
				$date = date('Y-m-d');
				break;
		    case 1:
				$date = date('Y-m-d',strtotime('-1 week'));
				break;
		    case 2:
			   $date = date('Y-m-d',strtotime('-1 month'));
			   break;
		    default:
			  $date = date('Y-m-d');
			  break; 	   	
		}
		return  $date;
	}
	
}  
