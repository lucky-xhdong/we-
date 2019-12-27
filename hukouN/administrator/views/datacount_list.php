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
                    <li><?= anchor('datacount/index/', '统计列表', 'class="current"') ?></li>
                </ul>
            </nav>
            <div class="cf-a"></div>

            <div class="carema-lists count-lists">
                <div class="li-table li-width-a li-ul-pad bor-a li-manage">
                    <ul>
                        <li>
                            <div class="dis-e ver-a-b it-tab-caption"> <span>序号</span> </div>
                            <div class="dis-e ver-a-b it-tab-caption"> <span>部门</span> </div>
                            <div class="dis-e ver-a-b it-tab-caption"> <span>摄像头</span> </div>
                            <div class="dis-e ver-a-b it-tab-caption"> <span>时间</span> </div>
                            <div class="dis-e ver-a-b it-tab-caption"> <span>操作</span> </div>
                        </li>
                        <?php $i=0; foreach($alerms as $alerm):?>
                        <li class="alermlist" id="alermlist-<?=$alerm->alarm_id?>">
                            <!--序号-->
                            <div class="dis-e ver-a-b it-id">
                                <span><?=++$i?></span>
                            </div>
                            <!--文章-->
                            <div class="dis-e ver-a-b it-article">
                                <span><?=$alerm->department_title?></span>
                            </div>
                            <!--简介-->
                            <div class="dis-e ver-a-b it-check">
                                <span><?=$alerm->caremas_title?></span>
                            </div>
                            <!--简介-->
                            <div class="dis-e ver-a-b it-check">
                                <span><?=$alerm->create_time?></span>
                            </div>
                            <!--删除文章按钮-->
                            <div class="dis-e ver-a-b it-id" id="alerm-<?=$alerm->alarm_id?>">
                                <?php if($alerm->status == 1):?>
                                    <a href="javascript:;"  class="btn btn-default pad-h-b remove" data-id="<?=$alerm->alarm_id?>" data-url="<?=anchorurl('datacount/resolvealerm/'.$alerm->alarm_id)?>" >解除警报</a>
                                <?php else:?>
                                    <a href="javascript:;"  class="pad-h-b">已解除</a>

                                <?php endif;?>
                                <button type="button" class="btn btn-danger deleteitem" data-id="<?=$alerm->alarm_id?>" data-url="<?=anchorurl('datacount/removerecord/'.$alerm->alarm_id)?>">删除</button>
                            </div>
                        </li>
                       <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
<script>
$(document).ready(function(e) {
    $('.remove').click(function(){
        var url = $(this).data('url');
        var id  = $(this).data('id');
        bootbox.dialog({
            message: "确定要发送吗？",
            title: "解除警报",
            buttons: {
                cancel: {
                    label: "取消",
                    className: "btn-success",
                    callback: function() {
                    }
                },
                confirm: {
                    label: "解除",
                    className: "btn-danger",
                    callback: function() {
                        $.ajax({
                            type :'GET',
                            url :url,
                            success: function(){
                                $("#alerm-"+id).html('<a href="javascript:;"  class="pad-h-b">已解除</a><button type="button" class="btn btn-danger deleteitem" >删除</button>');
                            }
                        });
                    }
                }
            }
        });
    });

    $(".alermlist").undelegate(".deleteitem", 'click').delegate(".deleteitem", 'click', function(){
        var url = $(this).data('url');
        var id = $(this).data('id');
        bootbox.dialog({
            message: "您确定要删除吗？",
            title: "删除警报",
            buttons: {
                cancel: {
                    label: "取消",
                    className: "btn-success",
                    callback: function() {
                    }
                },
                confirm: {
                    label: "删除",
                    className: "btn-danger",
                    callback: function() {
                        $.ajax({
                            type :'GET',
                            url :url,
                            success: function(){
                                $("#alermlist-"+id).remove();
                            }
                        });
                    }
                }
            }
        });
    });

});
</script>
</html>