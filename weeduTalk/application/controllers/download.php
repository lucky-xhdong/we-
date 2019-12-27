<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE^E_WARNING);

class Download extends CI_Controller {


    function __construct(){
        parent::__construct();
        $this->load->helper("download");

    }

    public function index(){

    }

    public function macApp(){
        $macapp = UPLOADFILEPATH.'app/WeSpeak.dmg';
        if(is_file($macapp)){
            force_download("WeSpeak.dmg",$macapp);
        }else{
            echo "无法查到对应程序";
            exit;
        }
    }


    public function windowsApp(){
        $macapp = UPLOADFILEPATH.'app/WeSpeak.exe';
        if(is_file($macapp)){
            force_download($macapp);
        }else{
            echo "无法查到对应程序";
            exit;
        }
    }

}


