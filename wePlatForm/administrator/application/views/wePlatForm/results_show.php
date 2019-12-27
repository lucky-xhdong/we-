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
                    <li class="breadcrumb-item active" aria-current="page">成果展示</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="rs--main__content">
                <div class="tabs" data-before="成果展示">
                    <div class="tabs-nav">
                        <ul>
                            <?php foreach($categorys->children as $key=>$category1):?>
                                <li class="<?php if($category_id == $category1->id || ($category_id ==0 && $key == 0)) echo 'active';?>"><a href="<?=anchorurl("results_show/index/".$category1->id)?>"><?=$category1->name?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tabs-content_item first">
                            <ul>
                                <?php foreach($articles as $article):?>
                                    <li><a href="<?=anchorurl("results_show/show/".$article->id)?>"><span>【<?=$category->name?>】</span><?=$article->title?></a></li>
                                <?php endforeach;?>
                            </ul>
                            <div id="paginator" class="custom-pager">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>
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
</body>
</html>
