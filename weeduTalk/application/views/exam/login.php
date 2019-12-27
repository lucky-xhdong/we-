<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="UTF-8">
	<title>唯佳未来考试系统---登录</title>
	<?=$this->load->view("exam/tmpl/meta")?>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/exam/css/testSystemLogin.css">
</head>
<body>
	<div class="wrapper">
		<div class="main">
			<div class="header">积跬步畅行天下，致良知深耕教育</div>
			<?php echo form_open('login/userLogin', 'class="user-login-form"');?>
			<?php if (isset($error) && $error === true): ?>
				<div class="row" >
					<div class="col-lg-12">
						<p class="hidden-login-tips" style="color:#ff0000; text-align: center; margin-bottom: 15px;">
							<?=$errordesc?>
						</p>
					</div>
				</div>
			<?php endif; ?>
			<div class="con-box">
				<div class="login-bg">
					<img src="<?=base_url()?>media/exam/images/login-bg.png" >
				</div>
				<div class="login-box">
					<label for=""><input type="text" name="username" placeholder="账号"></label>
					<label for=""><input type="password" name="password" placeholder="密码"></label>
					<button type="submit">登录</button>
<!--					<div class="clear forget-pass">-->
<!--						<label><input type="checkbox">忘记密码</label>-->
<!--						<a href="" class="fn-r">忘记密码？</a>-->
<!--					</div>-->
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
	<div class="footer">
		北京唯佳未来教育科技有限公司
	</div>
</body>
</html>