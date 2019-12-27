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
    <div class="banner-cases">
        <img src="<?=base_url()?>media/wePlatForm/images/banner-cases.jpg" alt="img">
    </div>
    <div class="container cases-container">
        <aside class="cases-left">
            <div class="cases-left_icon">
                <a href="javascript:;" class="icon-txt" data-after="优秀案例">
                    <i class="icon icon-case"></i>
                </a>
            </div>
            <div class="cases-left_nav">
                <ul id="categorys">
                    <?php foreach($categorys->children as $key=>$category1):?>
                    <li data-id="<?=$category1->id?>" class="<?php if($category_id == $category1->id || ($category_id ==0 && $key == 0)) echo 'active';?>"><a href="javascript:;"><?=$category1->name?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </aside>
        <main class="cases-right">
            <h2 class="cr-title">
                <span class="cr-title_left"><?=$category->name?></span>
                <div class="cr-title_right" data-before="当前位置：">
                    <a href="<?=anchorurl("regional/index/".$region->id)?>" class="txt"><?=$region->name?></a>
                    <em class="symbol">></em>
                    <a href="javascript:;" class="txt"><?=$school->name?></a>
                </div>
            </h2>
            <div class="cr-lists">
                <ul id="articleList">
<!--                    --><?php //foreach($articles as $article):?>
<!--                    <li>-->
<!--                        <div class="cr-lists_left">-->
<!--                            <a href="--><?//=anchorurl("show/index/".$article->id)?><!--">-->
<!--                                <img src="--><?//=$article->picture_url?><!--" alt="" style="width: 300px;">-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div class="cr-lists_right">-->
<!--                            <div class="title-wrapper">-->
<!--                                <h2 class="title"><a class="txt" href="--><?//= anchorurl("show/index/" . $article->id) ?><!--">--><?//=$article->title?><!--</a></h2>-->
<!--                                <p class="time">--><?//=date("Y/m/d",strtotime($article->create_time))?><!--</p>-->
<!--                            </div>-->
<!--                            <div class="content-wrapper">-->
<!--                                <p class="txt">--><?//=$article->description?><!--</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                    --><?php //endforeach;?>
                </ul>
<!--                <div id="paginator"> --><?php //echo $this->pagination->create_links(); ?><!--</div>-->
<!--                <div class="page">-->
<!---->
<!--                </div>-->
            </div>
        </main>
    </div>
</div>
<?=$this->load->view("tmpl/foot")?>
<script src="<?= base_url() ?>media/js/jquery.showLoading.js"></script>
<script>
    var start = 0;
    var category_id = '<?=$category_id?>';
    $(document).ready(function(){
        function getAticleList(){
            $.ajax({
                url: "<?=anchorurl('schools/getArticleList/'.$school->id)?>/"+category_id+'/'+start,
                type: "get",
                async: false,
                beforeSend:function(){
                    $("#articleList").showLoading();
                },
                success: function (data, textstatus) {
                    if(data){
                        if(start == 0) $("#articleList").html(data);
                        else  $("#articleList").append(data);
                        start +=5;
                    }
                    $("#articleList").hideLoading();
                },
                error:function(){
                    $("#articleList").hideLoading();
                }
            });
        }
        getAticleList();
        $("#categorys li").click(function(){
            category_id= $(this).data("id");
            $(this).addClass("active").siblings().removeClass("active");
            start = 0;
            getAticleList();
        });
        $(window).scroll(function() {

            if ($(document).scrollTop() <= 0) {
               //滚动到顶部
            }
          //  console.log($(document).scrollTop());
//            console.log($(document).height() - $(window).height());
//            console.log($(document).scrollTop());
           // console.log($(document).height() - $(window).height());
            if (parseInt($(document).scrollTop()) >= (parseInt($(document).height()) -5- parseInt($(window).height()))) {
                //滚动到底部
                getAticleList();
            }
        });
    });
</script>
</body>
</html>