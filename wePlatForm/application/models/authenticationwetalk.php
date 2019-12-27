<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Authenticationwetalk extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    /*
     *
     * 验证用户登录
     *
     */

    public function onAuthenticate($username="",$password=""){
        if(empty($username) || empty($password)){
            $this->returncode['errcode'] = 100001;
            $this->returncode['errdesc'] = "请输入正确的用户名和密码";
        }else{
            $row = $this->db->where('username',$username)->or_where('mobile',$username)->or_where('email',$username)->get('users')->row();
            if($row){
                $parts  = explode( ':', $row->password );
                $crypt  = $parts[0];
                $salt   = @$parts[1];
                $testcrypt = $this->wetalkuserhelper->getCryptedPassword($password, $salt);
                if ($crypt == $testcrypt){
                    $user = $this->user->getUser($row->id);
                    $user->updateKey(array("lastvisitDate"=>date('Y-m-d H:i:s')));
                    $this->returncode['data'] = $user->getUserInfo();
                }else{
                    $this->returncode['errcode'] = 100003;
                    $this->returncode['errdesc'] = "用户名密码错误";
                }
            }else{
                $this->returncode['errcode'] = 100002;
                $this->returncode['errdesc'] = "用户不存在";
            }
        }
        return $this;
    }


    /*
     *
     * 后台验证登陆
     *
     */

    public function onAdministratorAuthenticate($username="",$password=""){
        if(empty($username) || empty($password)){
            $this->returncode['errcode'] = 100001;
            $this->returncode['errdesc'] = "请输入正确的用户名和密码";
        }else{
            $row = $this->db
                ->where('username',$username)
                ->or_where('mobile',$username)
                ->or_where('email',$username)
                ->get('users')->row();
            if($row){
                $parts  = explode( ':', $row->password );
                $crypt  = $parts[0];
                $salt   = @$parts[1];
                $testcrypt = $this->wetalkuserhelper->getCryptedPassword($password, $salt);
                if ($crypt == $testcrypt){
                    $user = $this->user->getUser($row->id);
                    //用户名和密码验证正确后,验证权限信息
                    $permissions = $user->getUserRolePermission();
                    if(count($permissions) >0){
                        $user->redirect_url = anchorurl($permissions[0]->url);
                        $user->updateKey(array("lastvisitDate"=>date('Y-m-d H:i:s')));
                        $this->returncode['data'] = $user;
                    }else{
                        $this->returncode['errcode'] = 100004;
                        $this->returncode['errdesc'] = "您没有权限登陆该系统!";
                    }
                }else{
                    $this->returncode['errcode'] = 100003;
                    $this->returncode['errdesc'] = "用户名密码错误";
                }
            }else{
                $this->returncode['errcode'] = 100002;
                $this->returncode['errdesc'] = "用户不存在";
            }
        }
        return $this;
    }

    /*
     *
     * 验证用户旧密码
     *
     */

    public function  checkOldPassword($user="",$oldappword=""){
        if(empty($oldappword)){
            return false;
        }else{
            $row = $this->db->where('id',$user->id)->get('users')->row();
            if($row){
                $parts  = explode( ':', $row->password );
                $crypt  = $parts[0];
                $salt   = @$parts[1];
                $testcrypt = $this->wetalkuserhelper->getCryptedPassword($oldappword, $salt);
                if (($crypt == $testcrypt) || $row->password == md5($oldappword)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        return false;
    }


    public function onAuthenticateRegional($username="",$password=""){
        if(empty($username) || empty($password)){
            $this->returncode['errcode'] = 100001;
            $this->returncode['errdesc'] = "请输入正确的用户名和密码";
        }else{
            $row = $this->db->where('username',$username)->or_where('mobile',$username)->or_where('email',$username)->get('users')->row();
            if($row){
                $parts  = explode( ':', $row->password );
                $crypt  = $parts[0];
                $salt   = @$parts[1];
                $testcrypt = $this->wetalkuserhelper->getCryptedPassword($password, $salt);
                if ($crypt == $testcrypt){
                    $user = $this->user->getUser($row->id);
                     //判断是否学生关系
                    $relation_ship = $this->db->where('user_id',$user->id)->where('user_type',"student")->get('class_user_relationship')->row();

                    if($relation_ship){
                        $user->updateKey(array("lastvisitDate"=>date('Y-m-d H:i:s')));
                        $this->returncode['data'] = $user;
                    }else{
                        $this->returncode['errcode'] = 100004;
                        $this->returncode['errdesc'] = "您无权登陆本系统!";
                    }

                }else{
                    $this->returncode['errcode'] = 100003;
                    $this->returncode['errdesc'] = "用户名密码错误";
                }
            }else{
                $this->returncode['errcode'] = 100002;
                $this->returncode['errdesc'] = "用户不存在";
            }
        }
        return $this;
    }
}


