<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
    <meta content="no-siteapp" http-equiv="Cache-Control">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="format-detection" content="telephone=no" />
    <title>中国家用电器商业协会-<?=$category_bar->name?></title>
    <link href="<?= base_url() ?>media/css/bootstrap1.css" rel="stylesheet">
    <link href="<?= base_url() ?>media/css/webcommon.css" rel="stylesheet">
    <link href="<?= base_url() ?>media/css/stagepage.css" rel="stylesheet">
    <link href="<?= base_url() ?>media/css/showloading.css" rel="stylesheet">
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?=base_url()?>media/css/ie8.css"/>
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
                <div class="col-md-9">
                    <div class="main-box breviary">
                        <h2>
                            <a href="<?=base_url()?>">首页</a>>
                            <?php if($category_bar):?>
                                    <?php if(empty($category_bar->parent->id)):?>
                                        <a href="<?=anchorurl('alist/index/'.$category_bar->id)?>"  class="active"><?=$category_bar->name?></a>
                                    <?php else:?>
                                        <a href="<?=anchorurl('alist/index/'.$category_bar->parent->id)?>"><?=$category_bar->parent->name?></a>>
                                        <a href="<?=anchorurl('alist/index/'.$category_bar->id)?>" class="active"><?=$category_bar->name?></a>
                                    <?php endif;?>
                            <?php endif;?>
                        </h2>
                        <ul id="articleList">
                            <?php foreach($articles as $article):?>
                            <li>
                                <h3> <a href="<?=anchorurl('show/index/'.$article->id)?>"><?=$article->title?></a></h3>
                                <span class="path-time">
                                    <i><?=$article->origin?></i>
                                    <i><?=$article->create_time?></i>
                                </span>
                                <div>
                                    <?php if(!empty($article->picture_url)):?>
                                        <div class="breviary-l">
                                            <cite>
                                                <img src="<?=$article->picture_url?>" alt="img"/>
                                            </cite>
                                        </div>
                                    <?php endif;?>
                                    <div class="breviary-r">
                                        <p>
                                            <?php if(empty($article->description)):?>
                                                <?=mb_substr(strip_tags($article->body),0,100)?>...
                                           <?php else:?>
                                                <?=$article->description?>
                                            <?php endif;?>
                                          <a href="<?=anchorurl('show/index/'.$article->id)?>">[阅读更多]</a>
                                        </p>
<!--                                        <dl class="keyword">-->
<!--                                            <dt>关键词</dt>-->
<!--                                            <dd><a href="javascript:;">贾跃亭</a></dd>-->
<!--                                            <dd><a href="javascript:;">减持计划</a></dd>-->
<!--                                            <dd><a href="javascript:;">乐视网</a></dd>-->
<!--                                        </dl>-->
                                    </div>

                                </div>
                            </li>
                            <?php endforeach;?>
                        </ul>
                        <p class="load-more" id="loadmore">点击加载更多</p>
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
    <script src="<?= base_url() ?>media/js/fakeLoader.js"></script>
    <script>
        var start = 5;
        $(document).ready(function(){
            $("#loadmore").click(function(){
                $.ajax({
                    url: "<?=anchorurl('alist/getArticleList/'.$categoryid)?>/"+start,
                    type: "get",
                    async: false,
                    beforeSend:function(){
                        $("#loadmore").showLoading();
                    },
                    success: function (data, textstatus) {
                        if(data){
                            $("#articleList").append(data);
                            start +=5;
                        }else{
                            $("#loadmore").html('已没有更多数据');
                        }
                        $("#loadmore").hideLoading();
                    },
                    error:function(){
                        $("#loadmore").hideLoading();
                    }
                });
            })
        });
    </script>
</body>
</html>
