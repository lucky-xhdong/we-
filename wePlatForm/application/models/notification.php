<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Notification extends CI_Model
{


	public $folder 		= "notification";

	public $objectType  = 'notification';

	public $id 	   		= 0;

	public $_minxer 	= null;

	public $subtypes     = array('user','follow', 'unfollow','group','unchain','speech');


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
			"a_id"   		=> array("require" => false),
			"a_type" 		=> array("require" => false),
			"b_id"			=> array("require" => false),
			"b_type"		=> array("require" => false),
			"object_id" 	=> array("require" => false),
			"object_type" 	=> array("require" => false),
			"status"		=> array("require" => false),
			"unread"		=> array("require" => false),
			'object_ids'	=> array("require" => false),
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
			->where('object_type','user')
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
		$this->returncode['data'] = $data;
		return $this;
	}

	/*
	 * $user 当前登录人
	 * 同意好友请求
	 */

	public function confirmFollower($user,$notificationId){
		$notification = $this->init($notificationId);
		if($notification->type == 'follow'){
			$user_a = $this->user->getUser($notification->a_id);
			$row = $this->db->where('user_id',$user_a->id)
				->where('follower_id',$user->id)
				->get('relationship')->num_rows();
			$notification->updateColumn(array("status"=>1));
			if(!$row){
				if(isset($user_a->id) && !empty($user_a->id)){
					$data = array(
						'user_id'     => $user_a->id,
						'follower_id' => $user->id,
						'created_time'=> date('Y-m-d H:i:s'),
						'status'      => 1
					);
					$this->db->insert('relationship',$data);
				}else{
					$this->returncode['errcode'] = 100031;
					$this->returncode['errdesc'] = "用户不存在";
				}
			}else{
//				$this->returncode['errcode'] = 100033;
//				$this->returncode['errdesc'] = "你已经关注了他";
			}
		}
		return $this;
	}



	/*
	 * 添加一个notification
	 *
	 */
	public function addNotification($user1,$user2,$type='',$body="",$object=null){
		if($this->_minxer && isset($user1->id) && isset($user2->id) && in_array($type,$this->subtypes)){
			$data = array(
				'type'      	=> $type,
				'created_time'  => date('Y-m-d H:i:s'),
				"body"  	    => $body,
				"a_id"   		=> $user1->id,
				"a_type" 		=> $user1->type,
				"b_id"			=> $user2->id,
				"b_type"		=> $user2->type,
				"object_id" 	=> $this->_minxer->id,
				"object_type"	=> $this->_minxer->type,
				"status"		=> 0,
				"unread"		=> 1,
			);
			if($object){
				$data['object_type'] = $object->object_type;
				$data['object_ids']  = isset($object->object_ids)?$object->object_ids:"";
			}
			$this->db->insert('notifications',$data);
			$text = $this->init($this->db->insert_id())->setMinxer($user2)->getNotificationText();
			if(!empty($user2->push_channel_id)){
				//$this->pushMsgToSingleDevice_All_Msg($user2, $text,$this->_minxer->type,$this->db->insert_id());
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
			if ($this->_minxer->id == $this->a_id && $this->_minxer->type == 'user') {
				$user1 = $this->user->getUser($this->b_id);

				switch ($this->type) {
					case 'follow':
						$body = "你关注了{$user1->name}";
						break;
					case 'unfollow':
						$body = "你取消关注了{$user1->name}";
						break;
					case 'unchain':
						if(!empty($this->object_ids)){
							$lessoarray = explode(',',$this->object_ids);
//							if(count($lessoarray)){
//							  $rowbody = $this->db->select("")->where_in("id",$lessoarray)->get("lessons")->result();
//							}
						}
						$body = "{$this->_minxer->name}给你解锁了课程";
						break;
					case 'speech':
						if(!empty($this->object_ids)){
							$lessoarray = explode(',',$this->object_ids);
//							if(count($lessoarray)){
//							  $rowbody = $this->db->select("")->where_in("id",$lessoarray)->get("lessons")->result();
//							}
						}
						$body = "{$this->_minxer->name}提交了speech作业!";
						break;
				}
			} else if ($this->_minxer->id == $this->b_id) {
				if($this->_minxer->type == "group"){
					$mixer = $this->_minxer;
					$word= "群";
				}else{
					$mixer = $this->user->getUser($this->a_id);
					$word= "你";
				}

				switch ($this->type) {
					case 'follow':
						$body = "{$mixer->name}关注了".$word;
						break;
					case 'unfollow':
						$body = "{$mixer->name}取消关注".$word;
						break;
					case 'unchain':
						if(!empty($this->object_ids)){
							$lessoarray = explode(',',$this->object_ids);
//							if(count($lessoarray)){
//							  $rowbody = $this->db->select("")->where_in("id",$lessoarray)->get("lessons")->result();
//							}
						}
						$body = "{$mixer->name}给你解锁了课程";
						break;
					case 'speech':
						if(!empty($this->object_ids)){
							$lessoarray = explode(',',$this->object_ids);
//							if(count($lessoarray)){
//							  $rowbody = $this->db->select("")->where_in("id",$lessoarray)->get("lessons")->result();
//							}
						}
						$body = "{$mixer->name}提交了speech作业!";
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

	public function getNotificationList($limit=20,$start=0){
		$entity = $this->config['attributes'];
		$return = array();
		$data = array();
		$notifications = $this->db->select(implode(',',array_keys($entity)))->where('b_id',$this->_minxer->id)->where("status",0)->order_by("id","desc")->limit($limit,$start)->get("notifications")->result();
		foreach($notifications as $notification){
			$userItem  = $this->user->getUser($notification->a_id);
			if(empty($userItem->id)) continue;
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
		$return['notifications'] = $data;
		$return['unreadCount'] = $this->getNotificationUnreadCount();
		// 所有通知设置成已读
		$this->db->where('b_id',$this->_minxer->id);
		$this->db->update("notifications", array("unread"=>0));
		$this->returncode['data'] = $return;
		return $this;
	}

	public function getNotificationUnreadCount(){
		$notification = $this->db->select('count(*) as num')->where('unread',1)->where('b_id',$this->_minxer->id)->where("status",0)->get("notifications")->row();
		if(empty($notification->num)){
			return 0;
		}else{
			return $notification->num;
		}
	}


	public function getMyNotificationUnreadCount(){
		$entity = $this->config['attributes'];
		$return = array();
		$data = array();
		$notifications = $this->db->select(implode(',',array_keys($entity)))->where('b_id',$this->_minxer->id)->order_by("id","desc")->limit(1)->get("notifications")->result();
		foreach($notifications as $notification){
			$userItem  = $this->user->getUser($notification->a_id);
			if(empty($userItem->id)) continue;
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
		$return['notifications'] = $data;
		$return['unreadCount'] = $this->getNotificationUnreadCount();
		$this->returncode['data'] = $return;
		return $this;
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

	public function pushMsgToSingleDevice_All_Msg($user, $msg,$msg_type,$msgid,$count=1)
	{
		include_once API_ROOT_PATH . '/configure_Android.php';
		require_once (API_ROOT_PATH . "/sdk.php");
		$sdk = new PushSdk();
		if($user->device_type == 3)
		{
			$sdk->setSecretKey("LouEBbHxNGZjRjCPoFc4HuGiKsAVF5Cd");
			$sdk->setApiKey("GtwLeGyvhcGK92kbOQ4eBw4Z");
			$sdk->setDeviceType(3);
		}else{
			$sdk->setSecretKey("k1rVDQ0Wj24ds4IWS1fv0AyDIaHVQfYQ");
			$sdk->setApiKey("YrFXhOScb9meFoXHmZ3Gobm4");
			$sdk->setDeviceType(4);
		}
		$title = $msg;
		if($user->device_type == 3)
		{
			$message = '{
							"title":"'.$title.'",
							"custom_content":{
							   	"msg_id":"'.$msgid.'",
							   	"msg_type":"'.$msg_type.'"
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
          						"badge":"'.((int)$count+(int)$this->getNotificationUnreadCount()).'"
							},
							"msg_id":"'.$msgid.'",
							"msg_type":"'.$msg_type.'"
					 	}';
			// 设置消息类型为 通知类型.•0：透传消息 •1：通知
			//deploy_status int 可取值 1（开发状态）和 2（生产状态）仅iOS推送使用。
			$opts = array(
				'msg_type' => 1,
				'deploy_status'=>1
			);
		}
//		echo "+++---".$user->push_channel_id."<br />";
//		print_r($message);
//		print_r($opts);

		$rs = $sdk->pushMsgToSingleDevice($user->push_channel_id, $message, $opts);
		//var_dump($rs);
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


	/*广播推送消息
	 * 发布百度推送
	 */

	public function pushMsgToAll($device_type,$msg,$msg_type,$msgid)
	{
		include_once API_ROOT_PATH . '/configure_Android.php';
		require_once (API_ROOT_PATH . "/sdk.php");
		$sdk = new PushSdk();
		if($device_type == 3)
		{
			$sdk->setSecretKey("LouEBbHxNGZjRjCPoFc4HuGiKsAVF5Cd");
			$sdk->setApiKey("GtwLeGyvhcGK92kbOQ4eBw4Z");
			$sdk->setDeviceType(3);
		}else{
			$sdk->setSecretKey("k1rVDQ0Wj24ds4IWS1fv0AyDIaHVQfYQ");
			$sdk->setApiKey("YrFXhOScb9meFoXHmZ3Gobm4");
			$sdk->setDeviceType(4);
		}
		$title = $msg;
		if($device_type == 3)
		{
			$message = '{
							"title":"'.$title.'",
							"custom_content":{
							   	"msg_id":"'.$msgid.'",
							   	"msg_type":"'.$msg_type.'"
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
							"msg_type":"'.$msg_type.'"
					 	}';
			// 设置消息类型为 通知类型.•0：透传消息 •1：通知
			//deploy_status int 可取值 1（开发状态）和 2（生产状态）仅iOS推送使用。
			$opts = array(
				'msg_type' => 1,
				'deploy_status'=>1
			);
		}
//		echo "+++---".$user->push_channel_id."<br />";
//		print_r($message);
//		print_r($opts);
		$rs = $sdk->pushMsgToAll($message, $opts);

		if ($rs === false)
		{
 			print_r($sdk->getLastErrorCode());
			print_r($sdk->getLastErrorMsg());
		} else
		{
			//将打印出消息的id,发送时间等相关信息.
			echo "<pre>";
   			print_r($rs);
			echo "</pre>";
		}


	}



	/*广播推送消息
	 * 发布百度推送
	 */

	public function pushMsgToAllArticle($msg,$msg_type,$msgid)
	{
		include_once API_ROOT_PATH . '/configure_Android.php';
		require_once (API_ROOT_PATH . "/sdk.php");
		$sdk = new PushSdk();

		//推送Android
		$sdk->setSecretKey("LouEBbHxNGZjRjCPoFc4HuGiKsAVF5Cd");
		$sdk->setApiKey("GtwLeGyvhcGK92kbOQ4eBw4Z");
		$sdk->setDeviceType(3);

		$message = '{
							"title":"'.$msg.'",
							"custom_content":{
							   	"msg_id":"'.$msgid.'",
							   	"msg_type":"'.$msg_type.'"
							}
				 		}';
		// 设置消息类型为 通知类型.•0：透传消息 •1：通知
		//msg_expires int 过期时间，默认 3600 x 5 秒(5小时)，仅android有效
		$opts = array(
			'msg_type' => 0,
			'msg_expires'=>604800
		);

		$rs = $sdk->pushMsgToAll($message, $opts);

		//推送IOS

		$sdk->setSecretKey("k1rVDQ0Wj24ds4IWS1fv0AyDIaHVQfYQ");
		$sdk->setApiKey("YrFXhOScb9meFoXHmZ3Gobm4");
		$sdk->setDeviceType(4);

		$message = '{
							"aps":{
								"alert":"'.$msg.'",
								"sound":"",
          						"badge":"1"
							},
							"msg_id":"'.$msgid.'",
							"msg_type":"'.$msg_type.'"
					 	}';
		// 设置消息类型为 通知类型.•0：透传消息 •1：通知
		//deploy_status int 可取值 1（开发状态）和 2（生产状态）仅iOS推送使用。
		$opts = array(
			'msg_type' => 1,
			'deploy_status'=>1
		);

		$rs = $sdk->pushMsgToAll($message, $opts);

		if ($rs === false)
		{
			print_r($sdk->getLastErrorCode());
			print_r($sdk->getLastErrorMsg());
		} else
		{
			//将打印出消息的id,发送时间等相关信息.
			echo "<pre>";
			print_r($rs);
			echo "</pre>";
		}


	}
}