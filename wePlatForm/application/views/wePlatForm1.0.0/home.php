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
<!--banner start-->
<div class="banner-wrapper">
    <div class="banner-container">
        <div class="banner-module-01">
            <div class="banner-module__left">
                <?php foreach($touTiaoArticles as $key=>$touTiaoArticle):?>
                    <?php
                      if($key >0) break;
                    ?>
                <div class="img-wrapper">
                    <div class="img">
                        <a href="<?=anchorurl("item/index/".$touTiaoArticle->id)?>"><img src="<?=pictureurlsize(0,$touTiaoArticle->picturename,'article_big')?>" alt=""></a>
                    </div>
                    <div class="mask"><a href="<?=anchorurl("item/index/".$touTiaoArticle->id)?>" class="txt"><?=$touTiaoArticle->title?></a></div>
                </div>
                <?php endforeach;?>
            </div>
            <div class="banner-module__right">
                <?php foreach($touTiaoArticles as $key=>$touTiaoArticle):?>
                    <?php
                    if($key == 0 ) continue;
                    ?>
                <div class="img-wrapper">
                    <div class="img">
                        <a href="<?=anchorurl("item/index/".$touTiaoArticle->id)?>"><img src="<?=pictureurlsize(0,$touTiaoArticle->picturename,'article_large')?>" alt=""></a>
                    </div>
                    <div class="mask"><a href="<?=anchorurl("item/index/".$touTiaoArticle->id)?>" class="txt"><?=$touTiaoArticle->title?></a></div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <div class="banner-module-02">
            <?php foreach($peopleArticles as $key=>$peopleArticle):?>
            <div class="img-wrapper">
                <div class="img">
                    <a href="<?=anchorurl("item/index/".$peopleArticle->id)?>"><img src="<?=pictureurlsize(0,$peopleArticle->picturename,'article_large_1')?>" alt=""></a>
                </div>
                <div class="mask"><a href="<?=anchorurl("item/index/".$peopleArticle->id)?>" class="txt"><?=$peopleArticle->title?></a></div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<!--banner end-->
<!--news start-->
<div class="news-wrapper">
    <div class="news-container home-news-container">
        <div class="news-left">
            <div class="news-left__nav">
                <div class="news-left__nav_left">
                    <ul>
                        <?php foreach($regions as $key1=> $region):?>
                            <?php
                            if($key1 >3 ) break;
                            if($key1 == 0){
                                $region_id = $region->id;
                            }
                            ?>
                        <li class="<?php if($key1 ==0 ) echo 'active';?>" data-trigger="region" data-id="<?=$region->id?>">
                            <a href="javascript:;"   class="txt"><?=$region->name?></a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="news-left__nav_right">
                    <a href="javascript:;" class="txt">更多&emsp;</a>
                    <i class="icon icon-arrow-down"></i>
                    <div class="dropdown-menu">
                        <ul>
                            <?php foreach($regions as $key1=> $region):?>
                                <?php
                                if($key1 <=3 ) continue;
                                ?>
                                <li  data-trigger="region" data-id="<?=$region->id?>"><a href="javascript:;"><?=$region->name?></a></li>
                            <?php endforeach;?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="news-left__con">
                <div class="news-left__module01">
                    <ul id="articleList">
                        <?php foreach($articles as $key=>$article):?>
                            <li>
                                <?php if(!empty($article->picturename)):?>
                                    <div class="img-wrapper">
                                        <a href="<?=anchorurl("item/index/".$article->id)?>">
                                            <img src="<?=pictureurlsize(0,$article->picturename,'school')?>" alt="">
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
            <div class="btn-group"><a href="javascript:;" id="enterRegion" class="btn-enter">进入主页</a></div>
        </div>
        <div class="news-right" data-before="快讯">
            <ul>
                <?php foreach($newsFlashArticles as $newsFlashArticle):?>
                <li>
                    <p class="txt-title">
                        <a href="javascript:;" class="txt"><?=$newsFlashArticle->title?></a>
                    </p>
<!--                    <p class="txt-time">--><?//=date("Y-m-d")?><!--</p>-->
                    <!--<div class="pop-tips">-->
                        <!--<p class="txt">-->
                            <!--<?php if(!empty($newsFlashArticle->description)):?>-->
                                <!--<?=$newsFlashArticle->description?>-->
                           <!--<?php else:?>-->
                                <!--<?=$newsFlashArticle->title?>-->
                           <!--<?php endif;?>-->
                        <!--</p>-->
                    <!--</div>-->
                </li>
                <?php endforeach;?>
            </ul>
<!--            <p class="txt-more"><a href="--><?//=anchorurl("home/news/")?><!--" class="txt">更多 <i class="icon icon-arrow-right"></i></a></p>-->
        </div>
    </div>
</div>
<!--news end-->
<!--carousel start-->
<div class="carousel-wrapper">
    <div class="carousel-container">
        <div class="carousel-lists">
            <ul>
                <?php foreach($teacherarticles as $key=>$article):?>
                      <li data-after="<?=$article->title?>"><a href="<?=anchorurl("item/index/".$article->id)?>"><img src="<?=pictureurlsize(0,$article->picturename,'article_large_2')?>" alt=""></a></li>
                <?php endforeach;?>
                <?php foreach($techrticles as $key=>$article):?>
                    <li data-after="<?=$article->title?>"><a href="<?=anchorurl("item/index/".$article->id)?>"><img src="<?=pictureurlsize(0,$article->picturename,'article_large_2')?>" alt=""></a></li>
                <?php endforeach;?>
                <?php foreach($foreignTeacherArticles as $key=>$article):?>
                    <li data-after="<?=$article->title?>"><a href="<?=anchorurl("item/index/".$article->id)?>"><img src="<?=pictureurlsize(0,$article->picturename,'article_large_2')?>" alt=""></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<!--carousel end-->
<?=$this->load->view("tmpl/wePlatForm1.0.0/footer")?>
<script src="<?= base_url() ?>media/js/jquery.showLoading.js"></script>
<script>
    var region_id = <?=$region_id?>;
    $(function(){
//        $(".news-left__nav_left li").on('click', function () {
//            var index = $(this).index();
//            $(this).addClass('active').siblings().removeClass('active');
//            $(".news-left__con > div").eq(index).show().siblings().hide();
//        })

        $("li[data-trigger='region']").click(function(){
            $("li[data-trigger='region']").removeClass('active');
            $(this).addClass('active');
             region_id = $(this).data("id");
            getAticleList(region_id);

        });

        $("#enterRegion").click(function(){
            window.location.href = "<?=anchorurl("regions/index/")?>/"+region_id;
        });

        function getAticleList(region_id){
            $.ajax({
                url: "<?=anchorurl('home/getArticleList/')?>/"+region_id,
                type: "get",
                async: false,
                beforeSend:function(){
                    $("#articleList").showLoading();
                },
                success: function (data, textstatus) {
                    $("#articleList").html(data);
                    $("#articleList").hideLoading();
                },
                error:function(){
                    $("#articleList").hideLoading();
                }
            });
        }
    })
</script>
</body>
</html>