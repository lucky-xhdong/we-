
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
<body>
<div class="wrapper">
    <?=$this->load->view('tmpl/header')?>
    <!--header End-->
    <!--main Start-->
    <div class="main">
        <div class="container">
            <div class="row mt-30"></div>
            <div class="row">
                <div class="col-md-4">
                    <dl class="sidebar-train">
                        <dt><?=$category->name?></dt>
                        <?php foreach($category->children as $secondcategory):?>
                        <dd ><a href="<?=anchorurl('alist/article/'.$secondcategory->id)?>"><?=$secondcategory->name?></a></dd>
                        <?php endforeach;?>
                    </dl>
                </div>
                <div class="col-md-8">
                    <div class="train-box">
                        <?php if(isset($article->id)):?>
                        <div class="train-con">
                            <h1><?=$article->title?></h1>
                            <span class="path-time">
                                <i><?=$article->create_time?></i>
                                <i> 来源：<?=$article->origin?></i>
                            </span>
                            <div class="train-text">
                                <?php if(!empty($article->videourl)):?>
                                    <div class="video-player">
                                        <video id="example_video>" class="video-js vjs-default-skin" controls preload="auto" data-setup='{"autoplay":false}' >
                                            <source src="<?= $article->videourl ?>" type='video/mp4' />
                                            <track kind="captions" src="<?=base_url()?>media/css/demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
                                            <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that
                                                <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                            </p>
                                        </video>
                                    </div>
                                <?php endif;?>
                                <?=$article->body?>
                            </div>
                        </div>
                            <?php if(!empty($article->fileurl)):?>
                                <a href="<?=$article->fileurl?>" class="fj-down"><i>
                                        <img src="<?= base_url() ?>media/images/icon-down.png" alt="img"/></i>下载附件
                                </a>
                            <?php endif;?>
                        <?php else:?>
                            <h1>内容即将呈现</h1>
                        <?php endif;?>
                    </div>
                </div>
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
</div>
<?=$this->load->view('tmpl/foot')?>
</body>
</html>
