<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 *
 * 朋友圈
 *
 * */

class Notifications extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('notification');
//         $this->notification->pushMsgToAll(4,"tex2t","audio",rand(1,1000000));
//        $user = $this->user->getUser(33);
//        $this->notification->setMinxer($user)->pushMsgToSingleDevice_All_Msg($user,"text","audio",rand(1,1000000));

        //$this->notification->pushMsgToAllArticle("text","audio",rand(1,1000000));

    }

    public function pushMessage(){

    }


    /*
     * 获取我的通知列表
     *
     */

    public function getnotificationList(){

        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $limit = isset($argus[0])?$argus[0]:20;
            $start = isset($argus[1])?$argus[1]:0;
            return $this->notification->setMinxer($user)->getNotificationList($limit,$start);
        }
        return $this;
    }


    /*
     * 获取我未读消息数
     *
     */

    public function getnotificationUnreadCount(){

        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            return  $this->notification->setMinxer($user)->getMyNotificationUnreadCount();
        }
        return $this;
    }

    /*
     * 获取我的好友通知列表
     *
     */

    public function getNotificationForFriendList(){
        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $limit = isset($argus[0])?$argus[0]:20;
            $start = isset($argus[1])?$argus[1]:0;
            return $this->notification->setMinxer($user)->getNotificationForFriendList($limit,$start);
        }
        return $this;
    }

    /*
     * 同意好友请求
     *
     */

    public function confirmFollowNotification(){

        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $notification_id = isset($argus[0])?$argus[0]:0;
            return $this->notification->confirmFollower($user,$notification_id);
        }
        return $this;
    }

    /*
     * 删除通知
     *
     */

    public function removeNotification(){

        $argus = func_get_args();
        $user = func_get_arg(count($argus)-1);
        if($user && count($argus) >=1){
            $notification_id = isset($argus[0])?$argus[0]:0;
            return $this->notification->init($notification_id)->RemoveNotification();
        }
        return $this;
    }

    /*
     *
     * push baidu
     */

    public function pushService(){
        $pData = file_get_contents ( "php://input");
        $postObj = json_decode ( $pData );
        $userids = explode(',',$postObj->People);
        if(isset($postObj->Count)){
            $counts  = explode(',',$postObj->Count);
        }else{
            $counts = array();
        }
        if(isset($postObj->contentType)){
            $contentType = $postObj->contentType;
        }else{
            $contentType = "text";
        }
        $body = $postObj->Body;
        if($contentType == "audio"){
            $body = "你收到一个音频消息";
        }
        if($contentType == "image"){
            $body = "你收到一个图片消息";
        }

        if($contentType == "video"){
            $body = "你收到一个视频消息";
        }

        $fp = fopen("push.txt","a+");
        fwrite($fp,$pData);
        fclose($fp);

        foreach($userids as $key => $user_id){
            $user = $this->db->select("*")->where("id", $user_id)->get("users")->row();
            $count = isset($counts[$key])?$counts[$key]:1;

            $fp = fopen("push.txt","a+");
            fwrite($fp,json_encode($user));
            fclose($fp);

            if(!empty($user->push_channel_id)){
                $this->notification->setMinxer($user)->pushMsgToSingleDevice_All_Msg($user,$body,$contentType,rand(1,1000000),$count);
            }
        }
        return $this;
    }

}
