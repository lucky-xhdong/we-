
<!doctype html>
<html>
<head>
    <!--<link rel="stylesheet" type="text/css" href="--><?//=base_url()?><!--media/css/bootstrap.css">-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrapv3.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/font-awesome-4.0.3/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/font-awesome-4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/common.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/itgenius.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/qunit-1.11.0.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/icon.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/cheaa/common.css">
    <script src="<?=base_url()?>media/js/jquery-1.10.2.min.js"></script>
    <script src="<?=base_url()?>media/js/bootstrap.js"></script>
    <script src="<?=base_url()?>media/js/bootbox.js"></script>
    <script src="<?=base_url()?>media/js/framework.js"></script>
    <script src="<?=base_url()?>media/js/global.js"></script>
    <script src="<?=base_url()?>media/js/aside.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible"content="IE=9; IE=8; IE=7; IE=EDGE">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />-->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>壶口瀑布-后台管理系统</title>
</head>
<body>
<div class="topheader">
    <div class="toplogo">
        <img src="<?= base_url() ?>media/images/login-logo.png" class="pad-r-a" style="height: 50px;" />
        <span class="ver-a-c">后台管理系统</span>
    </div>
    <div class="text-c topusername">
        <span> 管理员, </span>
        <?=anchor('users/logout','退出')?>
    </div>
</div>
