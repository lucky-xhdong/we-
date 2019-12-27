<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php $this->load->view('wePlatForm/tmpl/title'); ?>
    <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
    <?php $this->load->view('wePlatForm/meta'); ?>
    <?php $this->load->view('tmpl/mmgrid');?>
    <?php $this->load->view('tmpl/fileupload');?>
</head>
<body>
<div class="container-fluid ResultsShow">
    <div class="row">
        <!-- 左侧菜单 start -->
        <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
        <!-- 左侧菜单 end -->
        <div class="col-md-9 rs--main-wrapper">
            <!--菜单切换 start-->
            <?=$this->load->view("wePlatForm/tmpl/headernav")?>
            <!--菜单切换 end-->
            <!--面包屑 start-->
            <nav class="common-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
                    <li class="breadcrumb-item"><a href="<?=anchorurl("results_show")?>">成果展示</a></li>
                    <li class="breadcrumb-item active" aria-current="page">文章详情</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="rs--main__content">
                <div class="tabs" data-before="<?=$article->title?>">

                    <div class="tabs-content">
                        <div class="tabs-content_item first">
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
            <!--主体内容 end-->
        </div>
    </div>
    <script>
        $(document).ready(function () {
            //成果展示导航切换
//            $(".tabs-nav li").on('click', function () {
//                var index = $(this).index();
//                $(this).addClass('active').siblings().removeClass('active');
//                $(".tabs-content .tabs-content_item").eq(index).show().siblings().hide();
//            })
        })
    </script>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/video-js.css">
    <script type="text/javascript" src="<?= base_url() ?>media/js/video.js"></script>
    <script>
        videojs.options.flash.swf = "<?=base_url()?>media/js/video-js.swf";
    </script>
</body>
</html>
