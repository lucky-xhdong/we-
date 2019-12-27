<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页--英语学科发展服务网</title>
    <?=$this->load->view("tmpl/meta")?>
</head>
<body>
<?=$this->load->view("tmpl/header")?>
<div class="wrapper ">
    <div class="banner-img">
        <img src="<?=base_url()?>media/wePlatForm/images/banner-index.jpg" alt="img">
    </div>
    <div class="index-nav-list">
        <ul class="wrp-con fn">
            <li>
                <span class="txt" data-after="学生数"><?=$service_count->student_count?></span>
            </li>
            <li>
                <span class="txt" data-after="教师数"><?=$service_count->teacher_count?></span>
            </li>
            <li>
                <span class="txt" data-after="学校数"><?=$service_count->school_count?></span>
            </li>
            <li>
                <span class="txt" data-after="区域数"><?=$service_count->region_count?></span>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="news-box">
            <div class="wrp-con">
                <div class="box-tit news-tit"><span data-after="NEWS" class="txt">新闻</span></div>
                <div class="news-con">
                    <div class="news-carousel fn">
                        <ul class="news-carousel-index tab-tit">
                            <?php foreach($RecommendCategorys as $key=>$RecommendCategory):?>
                                <li <?php if($key == 0) echo 'class="active" ';?>><?=$RecommendCategory->name?></li>
                            <?php endforeach;?>
                        </ul>
                        <div class="news-carousel-box">
                            <div class="news-carousel-list tab-con">
                                <?php foreach($RecommendCategorys as $key=>$RecommendCategory):?>
                                <div class="news-carousel-item <?php if($key == 0) echo 'active';?>">
                                    <div class="news-des-list showCon">
<!--                                        --><?php //foreach($RecommendCategory->RecommendArticles as $key1 => $RecommendArticle):?>
                                            <div class="news-des active">
                                                <div class="news-des-img">
                                                    <img src="<?=$RecommendCategory->StickArticle->picture_url?>" alt="img">
                                                </div>
                                                <div class="news-des-con">
                                                    <h2 class="news-des-tit"><?=$RecommendCategory->StickArticle->title?></h2>
                                                    <div class="news-des-time"><?=date('Y-m-d',strtotime($RecommendCategory->StickArticle->create_time));?></div>
                                                    <div class="news-des-art">
                                                        <p>
                                                            <?=$RecommendCategory->StickArticle->description?>
                                                        </p>
                                                    </div>
                                                    <a href="<?=anchorurl("show/index/".$RecommendCategory->StickArticle->id)?>" class="news-des-btn">了解详情</a>

                                                </div>
                                            </div>
<!--                                        --><?php //endforeach;?>
                                    </div>
                                    <div class="news-art-list fn">
                                        <a href="<?=anchorurl("alist")?>" class="news-art-list-btn fn-r">更多></a>
                                        <div class="news-art-list-con">
                                            <ul class="news-art-ul hovItem fn">
                                                <?php foreach($RecommendCategory->RecommendArticles as $key2 => $RecommendArticle):?>
                                                <li class="<?php if($key2 == 0) echo 'active';?>">
                                                    <img src="<?=$RecommendArticle->picture_url?>" alt="img">
                                                    <div class="news-art-hide">
                                                        <h2 class="news-art-sm-tit"><?=$RecommendArticle->title?></h2>
                                                        <div class="news-art-sm-time">
                                                            <span><?=date('Y-m-d',strtotime($RecommendArticle->create_time));?></span>
                                                        </div>
                                                        <div class="news-art-sm-con">
                                                            <p>
                                                                <?=$RecommendArticle->description?>
                                                            </p>
                                                        </div>
                                                        <a href="<?=anchorurl("show/index/".$RecommendArticle->id)?>" class="news-des-sm-btn">了解更多></a>
                                                    </div>

                                                </li>
                                                <?php endforeach;?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mien-box bg-f5">
            <div class="wrp-con">
                <div class="box-tit mien-tit"><span data-after="MIEN" class="txt">风采</span></div>
                <ul class="mien-list fn">
                    <?php foreach($RecommendCategorysArticles as $RecommendCategorysArticle):?>
                        <li>
                            <div class="mien-item-video">
                                <a    <?php if(!empty($RecommendCategorysArticle->videourl)) echo 'class="video-icon";';?> href="<?=anchorurl("show/index/".$RecommendCategorysArticle->id)?>" target="_blank">
                                    <img src="<?=$RecommendCategorysArticle->picture_url?>" alt="">
                                </a>
                            </div>
                            <a href="javascript:;" class="mien-item-tit"><?=$RecommendCategorysArticle->title?></a>
                            <div class="mien-item-des">
                                <?=$RecommendCategorysArticle->description?>
                            </div>
                        </li>
                    <?php endforeach?>
                </ul>
            </div>
        </div>
        <div class="region-box">
            <div class="wrp-con">
                <div class="box-tit region-tit">
                    <span data-after="REGION" class="txt">示范区域</span>
                </div>
                <ul class="region-list fn" id="region-list">
                    <?php  foreach($regions as $key=> $region):?>
                        <?php if($key == 0):?>
                            <li class="region-list_item">
                                <a href="<?=anchorurl("regional/index/".$region->id)?>">
                                <img src="<?=$region->getFileUrl("region_small")?>" alt="<?=$region->name?>">
                                <div class="op-region-name">
                                    <span><?=$region->name?></span>
                                </div>
                                </a>
                            </li>
                        <?php elseif($key == 1):?>
                            <li class="region-list_item">
                                <a href="<?=anchorurl("regional/index/".$region->id)?>">
                                <img src="<?=$region->getFileUrl("square")?>" alt="<?=$region->name?>">
                                <div class="op-region-name">
                                    <span><?=$region->name?></span>
                                </div>
                                </a>
                            </li>
                        <?php elseif($key == 2):?>
                            <li class="region-list_item">
                                <a href="<?=anchorurl("regional/index/".$region->id)?>">
                                <img src="<?=$region->getFileUrl("region_large")?>" alt="<?=$region->name?>">
                                <div class="op-region-name">
                                    <span><?=$region->name?></span>
                                </div>
                                </a>
                            </li>
                        <?php elseif($key == 3):?>
                            <li class="region-list_item">
                                <a href="<?=anchorurl("regional/index/".$region->id)?>">
                                <img src="<?=$region->getFileUrl("region_large")?>" alt="<?=$region->name?>">
                                <div class="op-region-name">
                                    <span><?=$region->name?></span>
                                </div>
                                </a>
                            </li>
                        <?php elseif($key == 4):?>
                            <li class="region-list_item">
                                <a href="<?=anchorurl("regional/index/".$region->id)?>">
                                <img src="<?=$region->getFileUrl("square")?>" alt="<?=$region->name?>">
                                <div class="op-region-name">
                                    <span><?=$region->name?></span>
                                </div>
                                </a>
                            </li>
                        <?php endif;?>
                    <?php endforeach;?>
                </ul>
                <div class="common-page"> <ul id="pageLimit"></ul> </div>
            </div>
        </div>
    </div>

</div>
<?=$this->load->view("tmpl/foot")?>
<script>
    $(function(){
        tabBox({});
        tabBox({box:'.news-carousel',carousel:true,children:'true'});
        fnHover(0);
        $('#pageLimit').bootstrapPaginator({
            currentPage: 1,
            totalPages: <?=$totalPages?>,
            size: "normal",
            bootstrapMajorVersion: 3,
            alignment: "right",
            numberOfPages: 8,
            itemTexts: function (type, page, current) {
                switch (type) {
                    case "first":
                        return "首页";
                    case "prev":
                        return "上一页";
                    case "next":
                        return "下一页";
                    case "last":
                        return "末页";
                    case "page":
                        return page;
                }//默认显示的是第一页。
            },
            //给每个页眉绑定一个事件，其实就是ajax请求，其中page变量为当前点击的页上的数字。
            onPageClicked: function (event, originalEvent, type, page) {
                $.ajax({
                    url: '<?=anchorurl("home/gerRegionList/")?>',
                    type: 'POST',
                    data: {
                        'page': page,
                        'count': 5
                    },
                    success: function (data) {
                        $("#region-list").html(data);
                    }
                })
            }
        });
    })
</script>
</body>
</html>