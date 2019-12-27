<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
    <meta content="no-siteapp" http-equiv="Cache-Control">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="format-detection" content="telephone=no" />
    <title>中国家用电器商业协会<?php if(isset($key)) echo '-'.$key;?></title>
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
    <!--main Start-->
    <div class="main">
        <div class="container">
            <div class="row mt-30"></div>
            <div class="row">
                <div class="col-md-9">
                    <div class="search-main">
                        <span class="sea-loc"><a href="<?=base_url()?>">首页</a>>检索结果</span>
                        <div class="search-con">
                            <h2>检索结果 <span>关键词：“<cite><?php if(isset($key)) echo $key;?></cite>”</span></h2>
                            <ul>
                            <?php foreach($searcharticles as $key=>$article):?>
                                <li><cite>[<?=$article->catname?>]</cite><a href="<?=anchorurl('show/index/'.$article->id)?>"><?=$article->title?></a></li>
                              <?php if($key !=0 && ($key+1)%5 == 0 && ($key+1) != count($searcharticles)):?>
                                </ul><ul>
                               <?php elseif(($key+1) == count($searcharticles)):?>
                                </ul>
                              <?php endif;?>
                             <?php endforeach;?>
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
</body>
</html>