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
            <li><a href="javascript:;"><?=$region->name?></a></li>
        </ul>
    </div>
</div>
<?php
   $school_id = 0;
?>
<!--breadcrumb end-->
<!--synopsis:简介 start-->
<div class="synopsis-wrapper">
    <div class="synopsis-container">
        <div class="synopsis synopsis-lg">
            <div class="img-wrapper">
                <a href="javascript:;">  <?php
                    $bg_url = $region->getFileBgUrl();
                    ?>
                    <?php if(!empty($bg_url)):?>
                        <img src="<?=$bg_url?>" alt="">
                    <?php else:?>
                        <img src="<?=base_url()?>media/wePlatForm/images/img-cases.jpg" alt="">
                    <?php endif;?></a>
            </div>
            <?php
            $leaders = $region->getRegionUserBody();
            ?>
            <div class="txt-wrapper">
                <h2 class="txt-title">领导寄语</h2>

                <p class="txt-content"><?php if(count($leaders) >0) echo $leaders[0]->getUserBody();?></p>
            </div>
        </div>
    </div>
</div>
<!--synopsis:简介 end-->
<!--synopsis:简介 start-->
<div class="synopsis-wrapper">
    <div class="synopsis-container">
        <?php
        $instructors = $region->getRegionUserBody("instructor");
        ?>
        <?php foreach($instructors as $instructor):?>
        <div class="synopsis synopsis-md">
            <div class="img-wrapper">
                <a href="javascript:;"><img src="<?=$instructor->getAvatarUrl(true)?>" alt=""></a>
            </div>
            <div class="txt-wrapper">
                <h2 class="txt-title" data-before="教研员"><?=$instructor->name?></h2>
                <p class="txt-content"><?=$instructor->getUserBody()?></p>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<!--synopsis:简介 end-->
<!--news start-->
<div class="news-wrapper">
    <div class="news-container region-news-container">
        <div class="news-left">
            <div class="news-left__nav">
                <div class="news-left__nav_left">
                    <ul>
                        <li class="active">
                            <a href="javascript:;" class="txt" id="regionnew">最新</a>
                        </li>
                    </ul>
                </div>
                <div class="news-left__nav_right">
                    <a href="javascript:;" class="txt">选择学校&emsp;</a>
                    <i class="icon icon-arrow-down"></i>
                    <div class="dropdown-menu">
                        <ul>
                            <?php foreach($schools as $key1=> $school):?>

                                <li  data-trigger="school" data-id="<?=$school->id?>"><a href="javascript:;"><?=$school->name?></a></li>
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
                                            <img src="<?=pictureurlsize(0,$article->picturename,'large')?>" alt="">
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
            <?php if(count($articles) >=3):?>
            <div class="btn-group"><a href="javascript:;" id="getmore" class="btn-enter">加载更多</a></div>
            <?php endif;?>
        </div>
        <div class="news-right" data-before="快讯">
            <ul>
                <?php foreach($newsFlashArticles as $newsFlashArticle):?>
                    <li>
                        <p class="txt-title">
                            <a href="javascript:;" class="txt"><?=$newsFlashArticle->title?></a>
                        </p>
<!--                        <p class="txt-time">--><?//=date("Y-m-d")?><!--</p>-->
<!--                        <div class="pop-tips">-->
<!--                            <p class="txt">-->
<!--                                --><?php //if(!empty($newsFlashArticle->description)):?>
<!--                                    --><?//=$newsFlashArticle->description?>
<!--                                --><?php //else:?>
<!--                                    --><?//=$newsFlashArticle->title?>
<!--                                --><?php //endif;?>
<!--                            </p>-->
<!--                        </div>-->
                    </li>
                <?php endforeach;?>
            </ul>
<!--            <p class="txt-more"><a href="javascript:;" class="txt" >更多 <i class="icon icon-arrow-right"></i></a></p>-->
        </div>
    </div>
</div>
<!--news end-->
<!--chart start-->
<div class="chart-wrapper">
    <div class="chart-container">
        <div class="nav">
            <ul>
                <li class="active"><a href="javascript:;">数据动态</a></li>
            </ul>
        </div>
        <div class="chart">
            <div class="chart-image">
                <ul>
                    <li data-before="<?php if(isset($schoolDataPicture[0]['name']) && $schoolDataPicture[0]['region_id'] == $region->id) echo $schoolDataPicture[0]['name'];?>"><a href="javascript:;">
                            <?php if(isset($schoolDataPicture[0]['resourceInfo'])):?>
                                <img src="<?=$schoolDataPicture[0]['resourceInfo']['url']?>" alt="">
                            <?php endif;?>
                        </a>
                    </li>
                    <li data-before="<?php if(isset($classDataPicture[0]['name']) && $classDataPicture[0]['region_id'] == $region->id) echo $classDataPicture[0]['name'];?>"><a href="javascript:;">
                            <?php if(isset($classDataPicture[0]['resourceInfo'])):?>
                                <img src="<?=$classDataPicture[0]['resourceInfo']['url']?>" alt="">
                            <?php endif;?></a>
                    </li>
                    <li data-before="<?php if(isset($studentDataPicture[0]['name']) && $studentDataPicture[0]['region_id'] == $region->id) echo $studentDataPicture[0]['name'];?>"><a href="javascript:;">
                            <?php if(isset($studentDataPicture[0]['resourceInfo'])):?>
                                <img src="<?=$studentDataPicture[0]['resourceInfo']['url']?>" alt="">
                            <?php endif;?></a>
                    </li>
                </ul>
            </div>
            <div class="chart-login">
                <div class="chart-login__txt">
                    <a href="javascript:;" class="txt-login">登录</a>
                    <span class="txt-view">后查看</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--chart end-->
<?=$this->load->view("tmpl/wePlatForm1.0.0/footer")?>
<script>
    $(function(){
        tabBox({});
        tabBox({box:'.news-carousel',carousel:true,children:'true'});
        fnHover(0);
    })
</script>
<script src="<?= base_url() ?>media/js/jquery.showLoading.js"></script>
<script>
    var school_id = <?=$school_id?>;
    var region_id = <?=$region->id?>;
    var start = 3;
    $(function(){
//        $(".news-left__nav_left li").on('click', function () {
//            var index = $(this).index();
//            $(this).addClass('active').siblings().removeClass('active');
//            $(".news-left__con > div").eq(index).show().siblings().hide();
//        })

        $("li[data-trigger='school']").click(function(){
            $("li[data-trigger='school']").removeClass('active');
            $(this).addClass('active');
            start = 0;
            school_id = $(this).data("id");
            getAticleList(school_id);
            $("#getmore").parent("div").show();

        });

        $("#regionnew").click(function(){
            school_id = 0;
            getAticleList(school_id);
            $("li[data-trigger='school']").removeClass('active');
        });

        function getAticleList(school_id){
            $.ajax({
                url: "<?=anchorurl('regions/getArticleList/')?>/"+school_id+"/"+region_id+"/"+start,
                type: "get",
                async: false,
                beforeSend:function(){
                    $("#articleList").showLoading();
                },
                success: function (data, textstatus) {
                    if(data){
                        if(start == 0)  {
                            $("#articleList").html(data);
                        }
                        else{

                            $("#articleList").append(data);
                        }
                        start += 3;
                    }else{
                        $("#getmore").parent("div").hide();
                    }
                    $("#articleList").hideLoading();
                },
                error:function(){
                    $("#articleList").hideLoading();
                }
            });
        }
        $("#getmore").click(function(){
            getAticleList(school_id);
        });
    })
</script>
</body>
</html>