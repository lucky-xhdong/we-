<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Notifications extends CI_Model
{


	public $folder 		= "notification";

	public $objectType  = 'notification';

	public $id 	   		= 0;

	public $_minxer 	= null;

	public $subtypes     = array( 'invite', 'refuse', 'follow', 'unfollow', 'personalletter','fight');


    public function __construct()
    {
        parent::__construct();
        $this->_initialize();
    }



    public function _initialize($config=array())
    {
        $config['attributes'] = array(
			'id'            => array("require" => false),
			'type'      	=> array("require" => true),
			'created_time'  => array("require" => true),
			"body"  	    => array("require" => false),
			"node_a_id"   	=> array("require" => false),
			"node_a_type" 	=> array("require" => false),
			"node_b_id"		=> array("require" => false),
			"node_b_type"	=> array("require" => false),
			"status"		=> array("require" => false),
        );
        parent::_initialize($config);
    }

	/*
	 *
	 * 初始化一个notification 对象
	 *
	 */

	public function init($notification_id=0){
		$notification = new self;
		$data = $this->config['attributes'];
		$notice = $this->db->select(implode(',',array_keys($data)))->where("id",$notification_id)->get("notifications")->row_array();
		if(count($notice)){
			foreach($notice as $key=>$val){
				if(empty($val)) $val = "";
				$notification->$key = $val;
			}
		}
		return $notification;
	}


	public function setMinxer($minxer){
		$this->_minxer = $minxer;
		return $this;
	}



	/*
	 * 添加一个notification
	 *
	 */
	public function addNotification($user1,$user2,$type='',$body=""){
		if($this->_minxer && isset($user1->id) && isset($user2->id) && in_array($type,$this->subtypes)){
			$data = array(
				'type'      	=> $type,
				'created_time'  => date('Y-m-d H:i:s'),
				"body"  	    => $body,
				"a_id"   		=> $user1->id,
				"a_type" 		=> 'user',
				"b_id"			=> $user2->id,
				"b_type"		=> 'user',
				"object_id" 	=> $this->_minxer->id,
				"object_type"	=> $this->_minxer->type,
				"status"		=> 0,
				"unread"		=> 1,
			);
			$this->db->insert('notifications',$data);
			$text = $this->init($this->db->insert_id())->setMinxer($user2)->getNotificationText();
			if(!empty($user2->push_channel_id)){
				//$this->pushMsgToSingleDevice_All_Msg($user2, $text,$this->_minxer->type,$this->db->insert_id(),"message");
			}

			//TODO pushMessage
		}
		return true;
	}


	/*
	 * 创建notification 内容
	 *' invite', 'refuse', 'follow', 'unfollow', 'personalletter','fight'
	 */

	private function getNotificationText(){
		$body = "";
		if($this->_minxer) {
			if ($this->_minxer->id == $this->a_id) {
				$user1 = $this->user->getUser($this->b_id);
				switch ($this->type) {
					case 'follow':
						$body = "你关注了{$user1->name}";
						break;
					case 'unfollow':
						$body = "你取消关注了{$user1->name}";
						break;
					default :
						break;
				}
			} else if ($this->_minxer->id == $this->b_id) {
				$user1 = $this->user->getUser($this->a_id);
				switch ($this->type) {
					case 'follow':
						$body = "{$user1->name}关注了你";
						break;
					case 'unfollow':
						$body = "{$user1->name}取消关注你";
						break;
					default :
						break;
				}
			}
		}
		return $body;
	}

	/*
	 * 获取我的通知列表
	 *
	 */

	public function getNotificationList($start=0,$limit=20){
		$entity = $this->config['attributes'];
		$data = array();
		$notifications = $this->db->select(implode(',',array_keys($entity)))->where('a_id !=',$this->_minxer->id)->where('b_id',$this->_minxer->id)->where("status",0)->order_by("id","desc")->limit($limit,$start)->get("notifications")->result();
		foreach($notifications as $notification){
			$topic = $this->db->where("id",$notification->object_id)->get('topic')->row();
			if($topic){
				$data[] = array(
					'id'			=>	$notification->id,
					"object_id"		=>	$notification->object_id,
					"object_type"	=>	$notification->object_type,
					"created_time"	=>	$notification->created_time,
					"unread"		=>	$notification->unread,
					"type"			=>  $notification->type,
					"userInfo"		=>  $this->user->getUser($notification->a_id)->getUserInfoNotToken(),
					"body"			=>  $this->init($notification->id)->setMinxer($this->_minxer)->getNotificationText(),
				);
			}else{
				continue;
			}
		}

		return $data;
	}


	/*
	 * 获取我的好友通知列表
	 *
	 */

	public function getNotificationForFriendList($limit=20,$start=0){
		$entity = $this->config['attributes'];
		$data = array();
		$notifications = $this->db->select(implode(',',array_keys($entity)))
			->where('a_id !=',$this->_minxer->id)
			->where('b_id',$this->_minxer->id)
			->where('type','follow')
			->where("status",0)
			->order_by("id","desc")
			->limit($limit,$start)->get("notifications")->result();
		foreach($notifications as $notification){
				$data[] = array(
					'id'			=>	$notification->id,
					"object_id"		=>	$notification->object_id,
					"object_type"	=>	$notification->object_type,
					"created_time"	=>	$notification->created_time,
					"unread"		=>	$notification->unread,
					"type"			=>  $notification->type,
					"userInfo"		=>  $this->user->getUser($notification->a_id)->getUserInfoNotToken(),
					"body"			=>  $this->init($notification->id)->setMinxer($this->_minxer)->getNotificationText(),
				);
		}
		return $data;
	}

	/*
	 * $user 当前登录人
	 * 同意好友请求
	 */

	public function confirmFollower($user,$notificationId){
		$notification = $this->init($notificationId);
		if($notification->type == 'follow'){
			$user_b = $this->user->getUser($notification->b_id);
			$row = $this->db->where('user_id',$user->id)
				->where('follower_id',$user_b->id)
				->get('relationship')->num_rows();
			if(!$row){
				if($user_b && !empty($user_b->user_id)){
					$data = array(
						'user_id'     => $user->id,
						'follower_id' => $user_b->id,
						'created_time'=> date('Y-m-d H:i:s'),
						'status'      => 1
					);
					$this->db->insert('relationship',$data);
				}else{
					$this->returncode['errcode'] = 100031;
					$this->returncode['errdesc'] = "用户不存在";
				}
			}else{
				$this->returncode['errcode'] = 100033;
				$this->returncode['errdesc'] = "你已经关注了他";
			}
		}
		return $this;
	}

	public function getNotificationUnreadCount(){
		$notification = $this->db->select('count(*) as num')->where('a_id !=',$this->_minxer->id)->where('unread',1)->where('b_id',$this->_minxer->id)->where("status",0)->get("notifications")->row();
		if(empty($notification->num)){
			return 0;
		}else{
			return $notification->num;
		}
	}

	/*
	 * 获取我的通知列表首页列表下面
	 *
	 */

	public function getInviteNotifications($start=0,$limit=20){
		$entity = $this->config['attributes'];
		$data = array();
		$notifications = $this->db->select(implode(',',array_keys($entity)))->where_in('type', array( 'invite','fight'))->where("status",0)->where('a_id !=',$this->_minxer->id)->where('b_id',$this->_minxer->id)->order_by("id","desc")->limit($limit,$start)->get("notifications")->result();
		foreach($notifications as $notification){
			$topic = $this->db->where("id",$notification->object_id)->get('topic')->row();
			if($topic){
				$data[] = array(
					'id'			=>	$notification->id,
					"object_id"		=>	$notification->object_id,
					"object_type"	=>	$notification->object_type,
					"created_time"	=>	$notification->created_time,
					"unread"		=>	$notification->unread,
					"type"			=>  $notification->type,
					"userInfo"		=> $this->user->getUser($notification->a_id)->getUserInfoNotToken(),
					"body"			=>  $this->init($notification->id)->setMinxer($this->_minxer)->getNotificationText(),
				);
			}else{
				continue;
			}
		}
		return $data;
	}


	public function getInviteNotificationUnreadCount(){
		$notification = $this->db->select('count(*) as num')->where_in('type', array( 'invite','fight'))->where("status",0)->where('a_id !=',$this->_minxer->id)->where('unread',1)->where('b_id',$this->_minxer->id)->get("notifications")->row();
		if(empty($notification->num)){
			return 0;
		}else{
			return $notification->num;
		}
	}

	/*
	 *
	 * 获取单个notification的详情
	 *
	 */

	 public function getNotificationInfo(){
		if($this->type == 'personalletter'){
			$body = $this->body;
		}else{
			$body = $this->getNotificationText();
		}
		 $data = array(
			 'id'            => $this->id,
			 'type'      	 => $this->type,
			 'created_time'  => $this->created_time,
			 "body"  	     => $body,
			 "unread"		 => $this->unread,
			 "object_id" 	 => array("require" => false),
		 );
		return $data;
	 }

	/*
	 *
	 *  更新字段
	 *
	 */
	public function updateColumn($data=array()) {
		$this->db->where('id',$this->id);
		$this->db->update("notifications", $data);
		return true;
	}

	public function RemoveNotification(){
		$this->db->where("id",$this->id);
		$this->db->delete("notifications");
	}

	/*pushMsgToSingleDevice_All_Msg
	 * 发布百度推送
	 */

	public function pushMsgToSingleDevice_All_Msg($user, $msg,$msg_type,$msgid,$sendtype="start")
	{
		include_once API_ROOT_PATH . '/configure_Android.php';
		require_once (API_ROOT_PATH . "/sdk.php");
		$sdk = new PushSdk();
		if($user->device_type == 3)
		{
			$sdk->setSecretKey("FVslVbkS3lRRnEdu33FvGZHypX4g15Hn");
			$sdk->setApiKey("VN5Y2xhFN76G98F957TDNRpF");
			$sdk->setDeviceType(3);
		}else{
			$sdk->setSecretKey("sYUXiGGHxxKxHGAjjH7bCciqC8k5s9QC");
			$sdk->setApiKey("xoZtLtr6LFuIyvcugGZ9AzFV");
			$sdk->setDeviceType(4);
		}
		$title = $msg;
		if($user->device_type == 3)
		{
			$message = '{
							"title":"'.$title.'",
							"custom_content":{
							   	"msg_id":"'.$msgid.'",
							   	"msg_type":"'.$msg_type.'",
							   	"send_type":"'.$sendtype.'"
							}
				 		}';
			// 设置消息类型为 通知类型.•0：透传消息 •1：通知
			//msg_expires int 过期时间，默认 3600 x 5 秒(5小时)，仅android有效
			$opts = array(
				'msg_type' => 0,
				'msg_expires'=>604800
			);
		}
		else {
			$message = '{
							"aps":{
								"alert":"'.$title.'",
								"sound":"",
          						"badge":"1"
							},
							"msg_id":"'.$msgid.'",
							"msg_type":"'.$msg_type.'",
							"send_type":"'.$sendtype.'"
					 	}';
			// 设置消息类型为 通知类型.•0：透传消息 •1：通知
			//deploy_status int 可取值 1（开发状态）和 2（生产状态）仅iOS推送使用。
			$opts = array(
				'msg_type' => 1,
				'deploy_status'=>2
			);
		}
//		echo "+++---".$user->push_channel_id."<br />";
//		print_r($message);
//		print_r($opts);
		$rs = $sdk->pushMsgToSingleDevice($user->push_channel_id, $message, $opts);

		if ($rs === false)
		{
// 			print_r($sdk->getLastErrorCode());
//			print_r($sdk->getLastErrorMsg());
		} else
		{
			 //将打印出消息的id,发送时间等相关信息.
//			echo "<pre>";
//   			print_r($rs);
//			echo "</pre>";
		}

	}
}