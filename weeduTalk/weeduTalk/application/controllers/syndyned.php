<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Syndyned extends CI_Controller {


    function __construct(){
        parent::__construct();


    }

    public function index(){

    }


    public function testDynedGet(){

        $ch = curl_init();
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
        );
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        var_dump($output);
        exit;
    }

    public function testDynedPost(){
        $ch = curl_init();
        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        var_dump($output);
        exit;

    }

    public function testNextClassStanfordPost(){

        $password= base64_encode("stanford-staff:ketizud2e");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $array = array(
            "https://cn2api.records.dyned.com/classes/1db309b4-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/1db9400e-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/1dccacd4-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/1de31a96-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/1cff72ce-2707-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/bcd3b06a-292a-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/8bf2c17e-2c73-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/a6c947de-2c73-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/e034bbde-2c73-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/f8c93238-2c73-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/8c42b252-2d1c-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/4430d92a-3cfe-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/19cfd548-5f61-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/e532372e-6355-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/328d9f46-6373-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/9fddfdca-6373-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/eb894bc4-6375-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/68bdb11e-64e5-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/d24c98fe-650b-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/82739c94-6b4e-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/65e14fca-7fe1-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/1028e5e8-83b0-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/0a59b790-91df-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/0297bd58-9c08-11e6-ac31-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/6b19f7a6-9c2b-11e6-ac31-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/6e305926-f996-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/9fe29da4-f99a-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/4cb3a186-f99b-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/be6df834-f99c-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/31081ca2-f99e-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/f98136e6-f99e-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/b79cf688-f99f-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/b79e28b8-f9a0-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/e785821e-f9a1-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/96ad2454-f9a2-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/64e404dc-f9a3-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/b1bf0094-f9a4-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/931070d2-f9a5-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/a754acde-022e-11e7-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/64dec458-0476-11e7-8358-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/fbf6a95c-0a28-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/3af66a50-0a2b-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/416034fe-0ad8-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/35f1e200-0d41-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/6324b7c4-0d42-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/a3054e94-0d42-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/f5dbee16-0d42-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/571dc9ba-0d43-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/6b5c6574-0e08-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/fe75b432-0e08-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/0c2c3e9c-0e0a-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/ca779aaa-0ec2-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/81bf1a48-0f64-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/d3e54500-12bf-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/005dfda6-1528-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/84145134-1688-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/ead8fe1c-169a-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/7ff7333a-1b3a-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/60a56a96-1b3b-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/d0dc82cc-1b3b-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/7e2623a2-1b3c-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/a890e662-1b3d-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/7d403254-1fea-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/70114c7c-20de-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/bf1c7cdc-20df-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/8a4080ac-20e0-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/2de4b4ee-20e1-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/66370936-231c-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/classes/0af077cc-2332-11e7-b120-782bcb129676/"
        );
        foreach($array as $item) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $item);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $output = curl_exec($ch);
            curl_close($ch);
            $obj = json_decode($output);
            echo $item . $obj->name."<br />";


        }

       // echo $output;
        exit;

    }

    public function testItemGroupsPost(){

        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/groups/1d72dd30-8348-11e5-bc55-782bcb129676/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;
    }


    public function testGroupsPost(){

        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/groups/");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;
    }

    public function testNextGroupsPost(){

        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/groups/1d72dd30-8348-11e5-bc55-782bcb129676/");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;

    }

    public function testNextClassPost(){

        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $array = array(
            "https://cn2api.records.dyned.com/groups/1d717288-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d7174f4-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d72c5d4-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d731fd4-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d7382f8-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d7454f8-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d74620e-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d747ece-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d74ec38-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d758a6c-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d75e714-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d76376e-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d764eca-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d764fc4-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d765b68-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d779ef6-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d77bb70-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d785120-8348-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/a451bb70-e1b5-11e5-bc55-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1d340968-f623-11e5-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/7ab8d774-1cc7-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1fbb0d06-41c0-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/2ae40e1c-41ca-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/a7c8bb74-5f6d-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/b2230eac-6fe5-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1e13a42a-6fee-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/33ca07a2-70aa-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/0dbe01c8-70da-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/c01562fe-7336-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/551ebf9a-74cb-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/7e5e8706-766e-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/3efc8f7a-7a49-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/6c2bc88a-7a49-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/c1d171c8-7e2b-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/1797e3b2-7f03-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/302c664e-8081-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/c90ac570-83a8-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/bca4c06e-8eb7-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/a31c1364-950f-11e6-a1b1-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/56c541a4-a65b-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/bc5a9d84-ab01-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/ff60847a-c73c-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/15d861a6-f806-11e6-af37-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/d0d17d5a-048e-11e7-8358-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/278ae952-0add-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/2ce081de-1382-11e7-b120-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/955eb186-8c63-11e7-a84f-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/4ac46d32-91ea-11e7-a84f-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/9e8ca2e2-92e2-11e7-a84f-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/2e6292e0-98f2-11e7-a84f-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/d6e7c042-99e3-11e7-a84f-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/21ba0036-ae2e-11e7-a84f-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/8958eb06-b7d1-11e7-a84f-782bcb129676/",
            "https://cn2api.records.dyned.com/groups/ef25ed44-c069-11e7-a84f-782bcb129676/"
        );
        $data = array();
        foreach($array as $item) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $item);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $output = curl_exec($ch);
            curl_close($ch);
            $data[] = json_decode($output);
            echo "<pre>";
            //var_dump($output);echo "<br />";
            echo "</pre>";

//            $obj = json_decode($output);
//            if (isset($obj->name)) {
//                echo $item . $obj->name."<br />";
//
//            }else{
//                echo $item . $obj->name."<br />";
//            }
        }

      //  echo $output;
        echo "<pre>";
          print_r($data);
        echo "</pre>";
        exit;

    }

    public function testClassGroupsPost(){
        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/groups/1fbb0d06-41c0-11e6-a1b1-782bcb129676/");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;

    }

    public function testClassItemPost(){
        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $student = array(
            "name"=>"科德学院",
            "teacher"=>"郑文斌",
            "password"=>"123456",
            "teacher_email"=>"12@13.com"
        );
        $data_string = json_encode($student);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/classes/914e8fba-7d89-11e6-a1b1-782bcb129676/");
       // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;

    }

    public function getStudents(){
        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/students/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;

    }


    public function getStudentsSummary(){
        $password= base64_encode("liujing:sdhen%#/wey2f");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/students/32e097e6-167f-11e6-a1b1-782bcb129676/studysummary/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;

    }

    public function addNewStudent(){
        $password= base64_encode("stanford-staff:ketizud2e");
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic $password"
        );
        $student = array(
            "classroom"=>"https://cn2api.records.dyned.com/classes/0af077cc-2332-11e7-b120-782bcb129676/",
            "name"=>"xiaoyun",
            "password"=>"123456",
            "email"=>"xiaoyun@163.com",
            "model_student"=>"https://cn2api.records.dyned.com/students/b67850e4-231c-11e7-b120-782bcb129676/"
        );
        $data_string = json_encode($student);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://cn2api.records.dyned.com/students/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;

    }
}


