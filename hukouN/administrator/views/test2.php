<!DOCTYPE html>
<html dir="ltr" lang="zh" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>websocket聊天室</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="<?=base_url()?>media/css/common.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/css/default.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/css/template.css" type="text/css" />
</head>
<body>
<div class="container">
	<p>在线人数<span id="userNum"></span></p>
	<textarea id="message" rows="10"></textarea>
	<div class="send">
		<p><textarea id="input" placeholder="请输入要发送的内容"></textarea></p>
		<p><button type="button" class="btn btn-primary" id="sub">发送</button></p>
	</div>
</div>
<script type="text/javascript">
(function(){
	var $ = function(id){return document.getElementById(id) || null;}
	var wsServer = 'ws://115.29.99.175:9000'; 
	var ws = new WebSocket(wsServer);
	var isConnect = false;
	ws.onopen = function (evt) { onOpen(evt) }; 
	ws.onclose = function (evt) { onClose(evt) }; 
	ws.onmessage = function (evt) { onMessage(evt) }; 
	ws.onerror = function (evt) { onError(evt) }; 
	function onOpen(evt) { 
		console.log("连接服务器成功");
		isConnect = true;
	} 
	function onClose(evt) { 
		//console.log("Disconnected"); 
	} 
	function onMessage(evt) {
		console.log(evt);
		var data = JSON.parse(evt.data);
		switch (data.type) {
			case 'text':
				addMsg(data.msg);
				break;
			case 'num' :
				updataUserNum(data.msg);
				break;
		}
		
		console.log('Retrieved data from server: ' + evt.data);
	}
	function onError(evt) { 
		console.log('Error occured: ' + evt.data); 
	}
	function sendMsg() {
		if(isConnect){
			ws.send($('input').value);
			$('input').value = '';
		}
	}
	function addMsg(msg) {
		msg = JSON.parse(msg);
		var text = '用户' + msg.user + '说:\n' + msg.text + '\n';
		$('message').value += text;
		$('message').scrollTop = $('message').scrollHeight;
	}
	function updataUserNum(msg) {
		$('userNum').innerText = msg;
	}
	$('sub').addEventListener('click',sendMsg,false);
})();
</script>
</body>
</html>