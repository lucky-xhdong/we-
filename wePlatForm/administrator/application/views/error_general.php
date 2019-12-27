<!DOCTYPE html>
<html lang="en" class="">
<!-- 创建公司学校 -->
<head>
	<meta charset="utf-8" />
	<?php $this->load->view('meta');?>

</head>
<style type="text/css">
	.align-center{
		position:fixed;left:50%;top:30%;margin-left:width/2;
	}
</style>
<body>
<div class="app app-header-fixed ">

	<!-- header -->
	<?php $this->load->view('header'); ?>
	<!-- / header -->


	<!-- aside -->
	<?php $this->load->view('aside'); ?>
	<!-- / aside -->

	<!-- content -->
	<div id="content" class="app-content" role="main">
		<div class="app-content-body align-center">
			<h1>温馨提醒</h1>
			<font style="color: red">您没有权限访问该资源,请联系管理员!</font>
		</div>
	</div>
	<!-- /content -->

	<!-- footer -->
	<?php $this->load->view('tmpl/foot')?>
	<!-- / footer -->

</body>
</html>