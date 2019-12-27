<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 *
 * 朋友圈
 *
 * */

class Moments extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('moment');
    }

    /*
     * 获取个人豆豆圈
     *
     */

    public function getMomentsList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $limit = isset($argus[0])?$argus[0]:20;
            $start = isset($argus[1])?$argus[1]:0;
            return $this->moment->getMomentsList($user,$limit,$start);
        }
        return $this;
    }


    /*
     * 获取其他人朋友圈
     *
     */

    public function getMomentsUserList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $user_id = isset($argus[0])?$argus[0]:0;
            $limit = isset($argus[1])?$argus[1]:20;
            $start = isset($argus[2])?$argus[2]:0;
            return $this->moment->getMomentsUserList($user,$user_id,$limit,$start);
        }
        return $this;
    }


}
