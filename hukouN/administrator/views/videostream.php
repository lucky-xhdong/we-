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
                    <li><?= anchor('history/index/', '回放列表', 'class="current"') ?></li>
                </ul>
            </nav>
            <div class="col-xs-10 col-sm-10 col-md-10">
                    <?php echo form_open('history/index/');?>
                    <div class="row">
                        <ul class="pad-a h-o">
                            <li class="dis-d col-xs-4 col-sm-4 col-md-4">
                                <span class="w-t-o dis-table-cell">开始时间：</span>
                                <input type="text" class="form-control dis-table-cell" name="starttime" id="starttime" placeholder="开始时间" value="<?php if(isset($starttime)) echo $starttime;?>">
                            </li>
                            <li class="dis-d col-xs-4 col-sm-4 col-md-4">
                                <span class="w-t-o dis-table-cell">结束时间：</span>
                                <input type="text" class="form-control dis-table-cell" name="endtime" id="endtime" value="<?php if(isset($endtime)) echo $endtime;?>" placeholder="结束时间">
                            </li>
                            <li class="dis-d w-t-o col-xs-2 col-sm-2 col-md-2">
                                <button type="submit"  class="btn btn-default dis-table-cell ver-a-b mar-v-b pad-h-b" >查询</button>
                                <button onclick="document.getElementById('endtime').value='';document.getElementById('starttime').value='';this.form.submit();"  class="btn btn-default dis-table-cell ver-a-b mar-v-b pad-h-b" >重置</button>
                            </li>
                        </ul>
                    </div>
                    <?php echo form_close();?>
            </div>
            <div class="cf-a"></div>

            <div class="carema-lists">
                <div class="li-table li-width-a li-ul-pad bor-a li-manage">
                    <ul>
                        <li>
                            <div class="dis-e ver-a-b it-tab-caption"> <span>序号</span> </div>
                            <div class="dis-e ver-a-b it-tab-caption"> <span>部门</span> </div>
                            <div class="dis-e ver-a-b it-tab-caption"> <span>摄像头</span> </div>
                            <div class="dis-e ver-a-b it-tab-caption"> <span>时间</span> </div>
                            <div class="dis-e ver-a-b it-tab-caption"> <span>操作</span> </div>
                        </li>
                        <?php $i=0;foreach($videos as $video):?>
                        <li class="videolist" id="videolist-<?=$video->video_id?>">
                            <!--序号-->
                            <div class="dis-e ver-a-b it-id">
                                <span><?=++$i?></span>
                            </div>
                            <!--文章-->
                            <div class="dis-e ver-a-b it-article">
                                <span><?=$video->department_title?></span>
                            </div>
                            <!--简介-->
                            <div class="dis-e ver-a-b it-check">
                                <span><?=$video->caremas_title?></span>
                            </div>
                            <!--简介-->
                            <div class="dis-e ver-a-b it-check">
                                <span><?=$video->create_time?></span>
                            </div>
                            <!--删除文章按钮-->
                            <div class="dis-e ver-a-b it-id">
                                <?php /*?><a href="<?=anchorurl('heredity_disease/item/'.$article->knowledge_id)?>" class="btn btn-default">预览</a><?php */?>
                                <a href="<?=anchorurl('onlinevideo/playvideo/'.$video->video_id)?>"  class="btn btn-default pad-h-b" data-toggle="modal" data-target="#videoModal">播放</a>
                                <button type="button" data-id = "<?=$video->video_id?>"class="btn btn-danger deleteitem" data-url="<?=anchorurl('history/removerecord/'.$video->video_id)?>">删除</button>
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
    $("#starttime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
    $("#endtime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
    $('#videoModal').on('hidden.bs.modal', function (e) {
        window.location.reload(true);
    })

    $(".videolist").undelegate(".deleteitem", 'click').delegate(".deleteitem", 'click', function(){
        var url = $(this).data('url');
        var id = $(this).data('id');
        bootbox.dialog({
            message: "您确定要删除吗？",
            title: "删除视频",
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
                                $("#videolist-"+id).remove();
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