<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页--英语学科发展服务网</title>
    <?=$this->load->view("tmpl/wePlatForm1.0.0/meta")?>
</head>
<body>
<?=$this->load->view("tmpl/wePlatForm1.0.0/header")?>
<!--breadcrumb start-->
<div class="breadcrumb-wrapper">
    <div class="breadcrumb-container">
        <ul>
            <li><a href="<?=anchorurl("")?>">首页</a></li>
            <li><a href="javascript:;">搜索</a></li>
        </ul>
    </div>
</div>
<!--breadcrumb end-->
<!--search start-->
<div class="search-wrapper">
    <div class="search-container">
        <div class="form-group">
            <form action="<?=anchorurl('home/search/')?>" method="post">
            <input type="text" class="form-control" name="key" value="<?php if(isset($key))  echo $key;?>" placeholder="请输入新闻标题或内容">
                <button class="btn-search" type="submit">
                    <i class="icon icon-search"></i>
                </button>
            </form>
        </div>
    </div>
</div>
<!--search end-->

<!--news start-->
<div class="news-wrapper">
    <div class="news-container search-news-container">
        <div class="news-lists" data-before="推荐新闻">

            <ul>
                <?php foreach($articles as $key=>$article):?>
                    <?php
                    if(empty($article->picture_url)) continue;

                    ?>
                    <li>
                        <?php if(!empty($article->picture_url)):?>
                            <div class="img-wrapper">
                                <a href="<?=anchorurl("item/index/".$article->id)?>">
                                    <img src="<?=pictureurlsize(0,$article->picture_url,'school')?>" alt="">
                                </a>
                            </div>
                        <?php endif;?>
                        <div class="txt-wrapper">
                            <h2 class="txt-title"><a href="<?=anchorurl("item/index/".$article->id)?>" class="txt"><?=$article->title?></a></h2>
                            <div class="label-lists">
                                <?php if(!empty($article->catname)):?>
                                    <a href="javascript:;" class="txt" style="background-color:#<?=$article->colorstring?>;" ><?=$article->catname?></a>
                                <? endif;?>
                                <?php if(!empty($article->author)):?>
                                    <a href="javascript:;" class="txt" style="background-color: #cccccc;" ><?=$article->author?></a>
                                <? endif;?>
                            </div>
                            <p class="txt-content"><?=$article->description?></p>
                        </div>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<!--news end-->
<?=$this->load->view("tmpl/wePlatForm1.0.0/footer")?>
<script>
    $(function(){
        tabBox({});
        tabBox({box:'.news-carousel',carousel:true,children:'true'});
        fnHover(0);
    })
</script>
</body>
</html>