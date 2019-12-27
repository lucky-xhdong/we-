<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorys extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('functions');
        $this->load->model('region');
        if(!getAdminViewer()->id){
            redirect('login');
        }
    }

    public function index(){
       // $this->load->view('role');
    }

    public function getProvice($country_id=0){
        echo json_encode($this->functions->getProviceList());
    }

    public function getCity($provice=1){
        $city = $this->functions->getCityList($provice);
        $districts = $this->functions->getAreaList($city[0]->city_id);
        echo json_encode(array('citys'=>$city,'districts'=>$districts));
    }

    public function getArea($cityid=1){
        echo json_encode($this->functions->getAreaList($cityid));
    }

    public  function getSchool($provice,$cith,$district){
        echo json_encode($this->functions->getSchool($provice,$cith,$district));
    }
    




}
