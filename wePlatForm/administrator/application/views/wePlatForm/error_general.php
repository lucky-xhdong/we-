<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php $this->load->view('wePlatForm/tmpl/title'); ?>
	<?php $this->load->view('wePlatForm/meta'); ?>
	<style type="text/css">
		.align-center{
			position:fixed;left:50%;top:30%;margin-left:width/2;
		}
	</style>
</head>
<body>
<div class="container-fluid TeachingProgram">
	<div class="row">
		<!-- 左侧菜单 start -->
		<?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
		<!-- 左侧菜单 end -->
		<div class="col-md-9 tp--main-wrapper">
			<!--菜单切换 start-->
			<?=$this->load->view("wePlatForm/tmpl/headernav")?>
			<br>
			<div class="tp--main__content">
				<div class="content__moudle2">
					<div class="service-wrapper" data-before="温馨提醒">
						<p class="reminder">您没有权限访问该资源,请联系管理员!</p>
					</div>
				</div>
			</div>
			<!--主体内容 end-->
		</div>
	</div>

</body>
</html>