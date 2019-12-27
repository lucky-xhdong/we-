<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
    <meta content="no-siteapp" http-equiv="Cache-Control">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="format-detection" content="telephone=no" />
    <title>国家电网文章页</title>
    <link href="<?= base_url() ?>media/css/bootstrap1.css" rel="stylesheet">
    <link href="<?= base_url() ?>media/css/webcommon.css" rel="stylesheet">
    <link href="<?= base_url() ?>media/css/stagepage.css" rel="stylesheet">
    <!--[if lte IE 9]>
    <script src="<?=base_url()?>media/js/respond.min.js"></script>
    <link href="http://cache.jop.me/s/ij-com/name/bootstrap/js/respond-proxy.html" id="respond-proxy"
          rel="respond-proxy"/>
    <link href="http://www.ijophy.com/joy/name/bootstrap/img/respond.proxy.gif" id="respond-redirect"
          rel="respond-redirect"/>
    <script src="<?= base_url() ?>media/js/respond.proxy.js"></script>
    <script src="<?= base_url() ?>media/css/js/html5.js"></script>
    <![endif]-->
</head>
<body style="background: #f8f8f8">
<div class="wrapper">
    <?=$this->load->view('tmpl/header')?>
    <!--main Start-->
    <div class="main">
        <div class="container">
            <div class="row mt-30"></div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-con">
                        <h2><?=$article->title?></h2>
                        <div id="form" class="idea-form-activity view-form-info">
                        </div>
                    </div>
                    <div class="form-success">
                        <cite>
                            <img src="<?= base_url() ?>media/images/icon-btnSucess.png" alt="img" class="img-responsive" />
                        </cite>
                        <div>
                            <p>您的问卷已提交成功</p>
                            <p>请到其他页面看看吧</p>
                        </div>
                    </div>
                </div>
                <?=$this->load->view('tmpl/hotarticle')?>
            </div>
            <div class="row">
                <div class="col-md-12 two-code-con">
                    <div class="two-code">
                        <h2>微信公共账号</h2>
                        <img src="<?= base_url() ?>media/images/two-code.jpg" alt="img" class="img-responsive"/>
                    </div>
                    <div class="two-code">
                        <h2>微博公共账号</h2>
                        <img src="<?= base_url() ?>media/images/weibo.png" alt="img" class="img-responsive"/>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?=$this->load->view('tmpl/foot')?>
    <link rel="stylesheet" href="<?= base_url() ?>media/js/com_ideaforms/css/vendor.css">
    <link rel="stylesheet" href="<?= base_url() ?>media/js/com_ideaforms/css/formbuilder.css">
    <link rel="stylesheet" href="<?= base_url() ?>media/js/com_ideaforms/jquery-ui/themes/base/jquery-ui.css">
    <script src="<?= base_url() ?>media/js/com_ideaforms/widget.js"></script>
    <script src="<?= base_url() ?>media/js/com_ideaforms/jquery.validate.js"></script>
    <script src="<?= base_url() ?>media/js/com_ideaforms/js/jquery.validate.messages_zh.js"></script>
    <script src="<?= base_url() ?>media/js/com_ideaforms/js/idea_form_builder.js"></script>
    <script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/jquery-ui/ui/jquery-ui.js"></script>
    <script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/ie8-node-enum/index.js"></script>
    <script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/underscore/underscore.js"></script>
    <script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/underscore.mixin.deepExtend/index.js"></script>
    <script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/jquery.scrollWindowTo/index.js"></script>
    <script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/backbone/backbone.js"></script>
    <script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/backbone-deep-model/distribution/deep-model.js"></script>
    <script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/rivets/dist/rivets.js"></script>
    <script src="<?= base_url() ?>media/js/com_ideaforms/js/formbuilder.js"></script>
    <script>
        var formStr = '<?php echo addslashes($article->metadata)?>';
        var formItems = JSON.parse(formStr);
        $("#form").buildForm({items : formItems,
            postUrl : "<?=anchorurl('show/submitform/'.$article->id)?>",
            editUrl : '',
            expired : false,
            pid : "<?=$article->id?>",
            title : "<?=$article->title?>",
            isAdmin : false,
            submitted : false
        });
    </script>
</body>
</html>