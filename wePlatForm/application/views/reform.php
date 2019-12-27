<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>课改项目</title>
    <?=$this->load->view("tmpl/meta")?>
</head>
<body>
<?=$this->load->view("tmpl/header")?>
<div class="wrapper ">
    <div class="banner-img">
        <img src="<?=base_url()?>media/wePlatForm/images/kg-banner.jpg" alt="img">
    </div>
    <div class="container">
        <div class="mgb-30 wrp-con">
            <div class="reform-box">
                <div class="crumb-nav">
                    <a href="<?=anchorurl("")?>" class="index-icon">首页&nbsp;&gt&nbsp;</a>
                    课改项目
                </div>
                <div class="reform-con">
                    <?php foreach($categorys as $category):?>
                    <div class="reform-item">
                        <h2 class="reform-item-tit"><span><?=$category->name?></span></h2>
                        <div class="reform-item-tab tab-box">
                            <div class="reform-item-tit">
                                <ul class="reform-tab-tit tab-tit">
                                    <?php foreach($category->articles as $key=> $article):?>
                                        <li <?php if($key == 0) echo 'class="active" ';?>><?=$article->title?></li>
                                    <?php endforeach;?>
                                </ul>
                                <a href="<?=anchorurl('apply')?>" class="apply-btn" target="_blank">我要申请</a>
                            </div>
                            <div class="reform-tab-con">
                                <ul class="reform-tabCon-item tab-con">
                                    <?php foreach($category->articles as $key=> $article):?>
                                        <li <?php if($key == 0) echo 'class="active" ';?>>
                                            <div class="reform-tabCon-img">
                                                <img src="<?=base_url()?>media/wePlatForm/images/reform-img1.jpg" alt="img">
                                            </div>
                                            <div class="reform-tabCon-des">
                                                <div class="reform-des-con">
                                                    <?=$article->description?>
                                                </div>
                                                 <a href="<?=anchorurl("show/index/".$article->id)?>" class="news-des-btn">了解详情</a>
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
<?=$this->load->view("tmpl/foot")?>
<script>
    $(function(){
        tabBox({})
    })
</script>
</body>
</html>