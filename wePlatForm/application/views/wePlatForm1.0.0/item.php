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
            <li><a href="javascript:;"  onclick="history.go(-1)" class="index-icon">返回</a></li>
            <li>
                <a href="javascript:;">
                    <?php if(isset($category->id)):?>
                        <?=$category->name?>
                    <?php else:?>
                        新闻列表页
                    <?php endif;?>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--breadcrumb end-->
<!--item start -->
<div class="item-wrapper">
    <div class="item-container">
        <div class="item-group">
            <div class="hgroup">
                <h2 class="txt-title"> <?=$article->title?></h2>
                <p class="txt-subinfo">
                    <span class="txt-source" data-before="来源："><?=$article->author?></span>
                    <span class="txt-time" data-before="发布时间："><?=date('Y-m-d',strtotime($article->create_time))?></p></span>
                </p>
            </div>
            <div class="article">
                <?php if(!empty($article->videourl)):?>
                <div class="video-player"  style="min-width: 640px">
                    <video id="example_video>" style="min-width:640px" class="video-js vjs-default-skin" controls preload="auto" data-setup='{"autoplay":false}' >
                        <source src="<?= $article->videourl ?>" type='video/mp4' />
                        <track kind="captions" src="<?=base_url()?>media/css/demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                    </video>
                </div>
                <?php endif;?>
                <?=$article->body?>
            </div>
        </div>
    </div>
</div>
<!--item end -->
<!--carousel start-->
<div class="carousel-wrapper">
    <div class="carousel-container item__carousel-container">
        <div class="carousel-lists" data-before="相关阅读">
            <ul>
                <?php foreach($hot_articles as $key=>$hot_article):?>
                    <?php
                    if($key >2) break;
                    ?>
                    <li data-after="<?=$hot_article->title?>"><a href="<?=anchorurl("item/index/".$hot_article->id)?>" title="<?=$hot_article->title?>"> <img src="<?=$hot_article->picture_url?>" alt="img"></a></li>
                <?php endforeach;?>

            </ul>
        </div>
    </div>
</div>
<!--carousel end-->

<?=$this->load->view("tmpl/wePlatForm1.0.0/footer")?>
<script>
    $(function(){
        tabBox({});
        tabBox({box:'.news-carousel',carousel:true,children:'true'});
        fnHover(0);
    })
</script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/video-js.css">
<script type="text/javascript" src="<?= base_url() ?>media/js/video.js"></script>
<script>
    videojs.options.flash.swf = "<?=base_url()?>media/js/video-js.swf";
</script>
<script>
    $(function(){
        tabBox({});
        tabBox({box:'.article-commend-tab',carousel:true});
        tabBox({box:'.article-commend-tab1',carousel:true});
        $(".groom-wrapper").wePlatFormSlider({
            "ul": $(".groom-list"),
            "li": $(".groom-list li"),
            "margin": 10,
            pager: true
        });
    })
</script>
</body>
</html>