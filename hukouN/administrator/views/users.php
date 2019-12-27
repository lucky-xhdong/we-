<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/font-awesome-4.0.3/css/font-awesome.css">
    <link rel="stylesheet" type="text/css"
          href="<?= base_url() ?>media/css/font-awesome-4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/common.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/itgenius.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/qunit-1.11.0.css">
    <script src="<?= base_url() ?>media/js/jquery-1.10.2.min.js"></script>
    <script src="<?= base_url() ?>media/js/bootstrapv3.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />-->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>唯佳教育集团-后台管理系统</title>
</head>
<body>
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
                    <li><?=anchor('users/index/', '用户列表','class="current"')?></li>
                    <li><?=anchor('users/register', '添加用户')?></li>
                </ul>
            </nav>

            <div class="carema-lists">
                <div class="li-table li-width-a li-ul-pad text-b mar-t1 bor-a li-user-manage">
                    <ul>
                        <li>
                            <div class="dis-e ver-a-b it-tab-caption">
                                <span>序号</span>
                            </div>
                            <div class="dis-e ver-a-b it-tab-caption">
                                <span>用户名</span>
                            </div>
                            <div class="dis-e ver-a-b it-tab-caption">
                                <span>注册时间</span>
                            </div>
                            <div class="dis-e ver-a-b it-tab-caption">
                                <span>最后访问时间</span>
                            </div>
                            <div class="dis-e ver-a-b it-tab-caption">
                                <span>部门</span>
                            </div>
                            <div class="dis-e ver-a-b it-tab-caption">
                                <span>学习进度</span>
                            </div>
                            <div class="dis-e ver-a-b it-tab-caption">
                                <span>操作</span>
                            </div>
                        </li>
                        <?php $i = 1;
                        foreach ($users as $user): ?>
                            <li id="users-<?=$user->id?>">
                                <div class="dis-e ver-a-b it-check">
                                    <?= $i++; ?>
                                </div>
                                <div class="dis-e ver-a-b it-article">
                                    <?= $user->user_name ?>
                                </div>
                                <div class="dis-e ver-a-b it-time">
                                    <span><?= $user->create_time ?></span>
                                </div>
                                <div class="dis-e ver-a-b it-time">
                                    <span><?= $user->last_login_time ?></span>
                                </div>
                                <div class="dis-e ver-a-b it-id">
                                    <span><?= $user->departmentname ?></span>
                                </div>
                                <div class="dis-e ver-a-b it-id">
                                    <?= anchor('users/learning_progress/' . $user->id, '查看学习进度', 'class="color-aI" target="_blank"') ?>
                                </div>
                                <div class="dis-e ver-a-b it-id">
                                    <?= anchor('users/useritem/' . $user->id, '详情', 'class="color-aI"') ?>
                                    <button type="button" class="btn btn-danger deleteitem" data-url="<?=anchorurl('users/removerecord/'.$user->id)?>" data-value="<?=$user->id?>">删除</button>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="text-b">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </section>
        <!--右厕内容 end-->
    </div>
</div>
<script>
    $(document).ready(function (e) {
        $(".ip-user-list").undelegate("#user-search-control", "keypress").delegate("#user-search-control", "keypress", function (event) {
            var key = event.which;
            if (key == 13) {
                $("#userform").submit();
            }
        });
        $('.deleteitem').click(function(){
            var url = $(this).data('url');
            var id = $(this).data('value');
            bootbox.dialog({
                message: "您确定要删除吗？",
                title: "删除",
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
                                    $("#users-"+id).remove();
                                }
                            });
                        }
                    }
                }
            });
        });
    });
</script>
</body>
</html>
