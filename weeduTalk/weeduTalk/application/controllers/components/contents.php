<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('content');
        $this->load->model('school');
        $this->load->model('publishing_house');
        $this->load->model('publishing_house_course');
    }


    public function saveData(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            return $this->content->saveDataContent($user);
        }
        return $this;
    }

    public function saveSpeechContent(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            return $this->content->saveSpeechContent($user);
        }
        return $this;
    }


    public function addFeedBack(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            return $this->content->saveFeedback($user);
        }
        return $this;
    }

    public function resetTime(){
//        $result = $this->db->where("time <",0)->get("users_record")->result();
//        foreach($result as $item){
//            $entity = array();
//            if($item->date == "1970-01-01"){
//                $entity['time'] = 0;
//            }else if($item->start_time >$item->end_time ){
//                $entity['time'] = 0;
//            }else{
//                $entity['time'] = strtotime($item->end_time) -  strtotime($item->start_time);
//            }
//            $this->db->where("id",$item->id);
//            $this->db->where("group_id",$item->group_id);
//            $this->db->where("part_id",$item->part_id);
//            $this->db->update("users_record",$entity);
//        }
//        echo "sucess";
    }

}
