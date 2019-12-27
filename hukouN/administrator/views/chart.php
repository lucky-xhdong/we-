<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/common.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/itgenius.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/spectrum.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap-datetimepicker.min.css">

    <script type="text/javascript" src="<?= base_url() ?>media/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?=base_url()?>media/js/bootbox.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>唯佳教育集团-后台管理系统</title>
</head>
<body>
<div class="modal fade" id="videoModal">

</div><!-- /.modal -->

<!--navbar start-->
<?php $this->load->view('topheader');?>
<!--navbar end-->

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row">
        <!--左厕菜单 start-->
        <?php $this->load->view('aside');?>
        <!--左厕菜单 end-->
        <!--右厕内容 start-->
        <section class="main-carema-list">
            <nav class="nav-section">
                <ul>
                    <li><?= anchor('chart/', '统计报表', 'class="current"') ?></li>
                </ul>
            </nav>
            <div class="cf-a"></div>

            <div class="carema-lists count-lists">
                <img src="<?= base_url() ?>media/images/datatotal.png" class="pad-r-a" style="width: 100%;"/>
            </div>
        </section>
    </div>
</div>
</body>
</html>