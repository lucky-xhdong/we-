<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

set_time_limit(0);
class Commons extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('recordmanager');
        $this->load->model('group');
    }

    public function help(){
        $content = $this->db->where("id",424)->get("content")->row();
        if($content){
            $data['content'] = $content;
        }else{
            $data['content'] = false;
        }
        $this->load->view("default",$data);
    }



    public function aboutUs(){
        $this->load->view("aboutUs");
    }


    public function getSystemSetting(){
        $app_version = $this->input->get("app_version");
        if($app_version && $app_version == "1.1.2"){
            $this->returncode['data'] = array(
                "is_register"=>true
            );
        }else{
            $this->returncode['data'] = array(
                "is_register"=>false
            );
        }

        return $this;
    }



    public function getOssInfo(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && $user->id != 0){
            $this->returncode['data'] = array(
                "OSS_ACCESS_ID" =>'LTAIyy470R7cz5eX',
                "OSS_ACCESS_KEY"=> 'sIR1gl6qX2DDotH9MZj7NekW7YNTlg',
                "OSS_ENDPOINT"  => 'https://oss-cn-hangzhou.aliyuncs.com',
                "OSS_TEST_BUCKET" =>'weedutalk'
            );
        }
        return $this;
    }


    public function getOssInfo2(){
        $this->load->library('sts');
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        $get = $this->input->get();
        if($user && $user->id != 0){

            if($user->id == 53){
                $OSS_TEST_BUCKET = "wespeak";
                $response = $this->sts->getOssMessage1();
            }else{
                $OSS_TEST_BUCKET = "weedutalk";
                $response = $this->sts->getOssMessage();
            }

            if(isset($get['school_key']) && !empty($get['school_key']) && $get['school_key'] != "" && $get['device_platform'] =="pc"){
                $app_version = "1.1.0";
            }else{
                $app_version = "1.1.1";
            }
            $app_version = "1.2.2";
            $this->returncode['data'] = array(
                "OSS_ACCESS_ID" =>$response->Credentials->AccessKeyId,
                "OSS_ACCESS_KEY"=> $response->Credentials->AccessKeySecret,
                "OSS_SecurityToken"  => $response->Credentials->SecurityToken,
                "OSS_Expiration"    => $response->Credentials->Expiration,
                "OSS_ENDPOINT"      => 'https://oss-cn-hangzhou.aliyuncs.com',
                "OSS_TEST_BUCKET"   => $OSS_TEST_BUCKET,
                "app_version"       =>  $app_version,
                "app_update_url"    => "http://file.weedu.net.cn/assets/WeSpeak.exe",
                "repair_url"        => "http://file.weedu.net.cn/assets/DirectX_Repair_3.5_Enhanced_XiaZaiBa.zip",
                "date" =>date("Y-m-d H:i:s"),
                "timestamp"=>time()
            );

        }

        return $this;
    }


    public function testSkill(){
        $user = $this->user->getUser(4514);
        $this->recordmanager->user_id = $user->id;
        $month_frist_day = date('Y-m-01', strtotime(date("Y-m-d")));;
        //获取今天的值
        $month_last_day = date('Y-m-d');
        $this->recordmanager->start_time = $month_frist_day;
        $this->recordmanager->end_time   =$month_last_day;
        echo   $this->recordmanager->initialize()->getUserSkillAverage();
        exit;

    }


    public function syncClass(){
        $classes = $this->db->select("classes.*,grades.name as gradename")->join('grades', 'classes.grade_id = grades.id', 'left')->get("classes")->result();
        $user = $this->user->getUser(153);
        foreach($classes as $classe){
            $groupQuery = $this->db->where('class_id',$classe->id)
                ->get('groups')->row();
            if(!$groupQuery){
                $entity['name'] = $classe->gradename.$classe->name;
                $entity['class_id'] = $classe->id;
                $group = $this->group->createNewGroup($entity,$user);
            }else{
                $group = $this->group->getGroup($groupQuery->id);
            }
            // $group->addFollower(153,1);
            $users =  $this->db->select('user_id,user_type')
                ->where("class_user_relationship.user_type",'teacher')
                ->where("class_user_relationship.class_id",$classe->id)
                ->get('class_user_relationship')->result();
            foreach($users as $item){
                if( $item->user_type == 'teacher'){
                    $group->addFollower($item->user_id,1);
                }else{
                    $group->addFollower($item->user_id);
                }
            }

        }
        echo "success";

    }


    public function getIosUpdate(){
        $this->returncode['data'] = array(
            "app_version"       =>  "1.1.1",
            "app_update_url"    => "https://itunes.apple.com/cn/app/We-Speak/id1398177617?mt=8",
            "content" =>"",
        );
        echo json_encode($this->returncode);
    }


    public function getAndroidUpdate(){
        $this->returncode['data'] = array(
            "app_version"       =>  "1.1.1",
            "app_update_url"    => "https://a.app.qq.com/o/simple.jsp?pkgname=com.we.wonderenglish",
            "content" =>"",
        );
        echo json_encode($this->returncode);
    }

}
