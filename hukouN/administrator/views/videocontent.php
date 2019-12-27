<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/common.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/itgenius.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/spectrum.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/responsive/video-content.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/video-js.css">

    <script type="text/javascript" src="<?= base_url() ?>media/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/video.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>唯佳教育集团-后台管理系统</title>
</head>
<body>
<script>
    videojs.options.flash.swf = "<?=base_url()?>media/js/video-js.swf";
</script>

<!--navbar start-->
<div class="topheader video-topheader">
    <div class="toplogo">
        <img src="<?= base_url() ?>media/images/logo(1).png" class="pad-r-a"/>
        <!--        <h2 class="ver-a-b"> 医诊卫士云监管</h2>-->
        <span class="ver-a-c">唯佳教育集团-后台管理系统</span>
    </div>
    <div class="text-c topusername">
        <span></span>
    </div>
</div>
<!--navbar end-->
<div class="cf-a"></div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row">
        <!--右厕内容 start-->
        <section class="video-content">
            <hgroup>
                <h4 class="mar-a">摄像头</h4>
                <h5>
                    <span>部门：<em><?=$carema->department_title?></em></span>
                    <span>摄像头名称：<em><?=$carema->title?></em></span>
                    <span>触发日期：<em><?=$alarm->create_time?></em></span>
                </h5>
            </hgroup>
            <article>

                <video id="myVideo" width="320" height="240" controls autoplay="autoplay">
                    <source src="http://www.lasuntech.net:8090/test.webm" type="video/ogg">>
                </video>
            </article>
        </section>
    </div>
</div>
</body>
</html>