<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * 班级
 *
 **/

class Participationdegree extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('recordmanager');


    }


    public function getParticipationDegreeInfoList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        //  $user = $this->user->getUser(158);

        if($user){
            $post = $this->input->post();
//            $post['start_date'] = "2019-05-27";
//            $post['end_date'] = "2019-06-02";
//            $post['class_id'] = 8;

            if(!isset($post['start_date']) || ! isset($post['end_date'])){
                return $this;
            }else{
                $this->recordmanager->user_id = $user->id;
                $user_id = isset($post['user_id'])?$post['user_id']:0;
                $class_id = isset($post['class_id'])?$post['class_id']:0;
                if($user_id != 0 )  {
                    $this->recordmanager->user_id = (int)$user_id;
                    $class_id = 0;
                }
                $this->recordmanager->start_time = $post['start_date'];
                $this->recordmanager->end_time = $post['end_date'];
                return $this->recordmanager->getMyParticipationDegreeTime($class_id);
            }
        }
        return $this;
    }




}
