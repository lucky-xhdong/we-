<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dyneds extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model("dyned");
    }

    /*
     *
     *
     *  获取产品list
     */

    public function getProuctList(){
        echo json_encode($this->dyned->getProuductList());
    }

    /*
     *
     * 注册新用户
     */

    public function addUser(){
      echo  json_encode($this->dyned->addNewStudent()->returncode);
    }

}


