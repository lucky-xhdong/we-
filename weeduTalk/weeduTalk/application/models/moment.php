<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Moment extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
        $this->load->model('story');
        $this->load->model('vote');
        $this->load->model('comment');
        $this->load->model('wetalkfile');
    }


    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'                => array("require" => false),
            'mobile'            => array("require" => true),
            "email"             => array("require" => false),
            "username" 		    => array("require" => false),
            "name"              => array("require" => false),
            'registerDate'    	=> array("require" => false),
            'lastvisitDate'  	=> array("require" => false),
            'user_type'		    => array("require" => false),
        );
        parent::_initialize($config);
    }

    public function getMomentsList($user,$limit,$start){
           $followers = $user->getFollowerIds();
           return  $this->story->getFollowerStoryList($followers,$limit,$start,$user);
    }


    public function getMomentsUserList($user,$user_id,$limit,$start){
        $other = $this->user->getUser($user_id);
        if(!empty($other->id)){
            $followers = $other->getFollowerIds();
            return  $this->story->getFollowerStoryList($followers,$limit,$start,$user);
        }
        return $this;
    }
}  
