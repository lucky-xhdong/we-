<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$article->title?>--英语学科发展服务网</title>
    <?=$this->load->view("tmpl/meta")?>
</head>
<style>
    .video-player{
        margin-bottom:20px;
    }
    #example_video{
        width: 100%;
    }
</style>
<body>
<?=$this->load->view("tmpl/header")?>
<div class="wrapper ">
    <div class="news-container">
        <div class="mgb-30">
            <div class="wrp-con detail-box">
                <div class="crumb-nav mgb-20">
                    <a href="javascript:;" onclick="history.go(-1)" class="index-icon">返回&nbsp;&gt&nbsp;</a>
<!--                    --><?php //if(isset($category->id) && $category->parent->id == 65):?>
<!--                        <a href="--><?//=anchorurl("reform")?><!--" class="index-icon">返回&nbsp;&gt&nbsp;</a>-->
<!--                      --><?php //elseif(isset($category->id) && in_array($category->id,array(17,28,75))):?>
<!--                        <a href="--><?//=anchorurl("")?><!--" class="index-icon">返回&nbsp;&gt&nbsp;</a>-->
<!--                    --><?php //else:?>
<!--                        <a href="--><?//=anchorurl("alist")?><!--" class="index-icon">返回&nbsp;&gt&nbsp;</a>-->
<!--                    --><?php //endif;?>
                    <?php if(isset($category->id)):?>
                        <?=$category->name?>
                     <?php else:?>
                        新闻列表页
                    <?php endif;?>

                </div>
                <div class="detail-des fn">
                    <div class="detail-wrap">
                        <h1 class="detail-tit">
                            <?=$article->title?>
                        </h1>
                        <p class="detail-time"><?=date('Y/m/d',strtotime($article->create_time))?></p>
                        <div class="detail-des-con mgb-30">
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
                    <div class="groom-box">
                        <h1>相关推荐</h1>
                        <div class="groom-wrapper">
                            <ul class="groom-list ">
                                <?php foreach($hot_articles as $key=>$hot_article):?>
                                    
                                    <li>
                                        <a href="<?=anchorurl("show/index/".$hot_article->id)?>" title="<?=$hot_article->title?>">
                                            <img src="<?=$hot_article->picture_url?>" alt="img">
                                            <div class="groom-des">
                                                <p><?=$hot_article->title?></p>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view("tmpl/foot")?>
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