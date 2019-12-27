<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Storys extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
            'id'                    => array("require" => false),
            "title"                 => array("require" => false),
            'body'                  => array("require" => true),
            "created_time"          => array("require" => false),
            "user_id"               => array("require" => false),
            "comment_count"         => array("require" => false),
            "last_comment_time"     => array("require" => false),
            "last_comment_body"     => array("require" => false),
            "last_comment_user_id"  => array("require" => false),

        );
        parent::_initialize($config);
    }

    public function getStory($id){
        $unit = new self;
        $data = $this->config['attributes'];
        $row = $this->db->select(implode(',',array_keys($data)))->where("id",$id)->get("storys")->row_array();
        if($row){
            foreach($row as $key=>$val){
                if(empty($val)) $val = "";
                $unit->$key = $val;
            }
        }else{
            $unit->id = 0;
        }
        return $unit;
    }

    public function addStory($user){
        //获取发布的post数据
        $data = $this->input->post();
    }

}  
