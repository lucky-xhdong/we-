<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/common.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/itgenius.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/spectrum.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/video-js.css">
	<script type="text/javascript" src="<?=base_url()?>media/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>media/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?=base_url()?>media/js/video.js"></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible"content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>唯佳教育集团-后台管理系统</title>
</head>
<body>
<script>
	videojs.options.flash.swf = "<?=base_url()?>media/js/video-js.swf";
</script>

<div class="navbar navbar-inverse itnavbar navbar-fixed-top">
	<div class="container">
		<div class="navbar-collapse">
			<div class="btn-group">
				<?=anchor('homepage/index','摄像头管理','class="btn btn-default current-a"')?>
				<?=anchor('department/index','部门管理','class="btn btn-default"')?>
				<?=anchor('users/index','用户管理','class="btn btn-default"')?>
				<?=anchor('accountsettings/index','账号设置','class="btn btn-default"')?>
				<?php /*?> <?=anchor('homepage/add','增加加摄像头','class="btn btn-default"')?><?php */?>
				<?=anchor('users/logout','退出','class="btn btn-default"')?>
			</div>
		</div>
	</div>
</div>
<!--navbar end-->

<div class="container dis-d">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="bor-a h-o inspect-new-panel">
				<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="264"
					   poster="http://video-js.zencoder.com/oceans-clip.png"
					   data-setup="{}">
					<source src="http://www.lasuntech.net:8090/test12.flv?date=111" type='video/x-flv' />

					<track kind="captions" src="<?=base_url()?>media/css/demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
					<track kind="subtitles" src="<?=base_url()?>media/css/demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
					<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
				</video>
			</div>
		</div>
	</div>
</div>
</body>
</html>
