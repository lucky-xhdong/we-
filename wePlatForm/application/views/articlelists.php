<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>英语学科发展服务网</title>
    <?=$this->load->view("tmpl/meta")?>
</head>
<body>
<?=$this->load->view("tmpl/header")?>
<div class="wrapper ">
    <div class="banner-alist">
        <img src="<?=base_url()?>media/wePlatForm/images/news-banner.jpg" alt="img">
    </div>
    <div class="news-container">
        <div class="tab-box">
            <div class="news-nav ">
                <ul class="wrp-con news-tab-tit tab-tit fn">
                    <?php foreach($categorys as $key=>$category):?>
                    <li <?php if($category_id == $category->id || ($key == 0 && $category_id == 0)) echo 'class="active"';?>>
                       <a href="<?=anchorurl("alist/index/".$category->id)?>"> <?=$category->name?></a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="wrp-con">
                <div class="news-tab-con tab-con mgb-30">
                    <ul class="fn active">
                        <?php foreach($articles as $article):?>
                        <li>
                            <p class="news-tab-time"><span><?=date('d',strtotime($article->create_time));?></span><?=date('Y-m',strtotime($article->create_time));?></p>
                            <div class="news-tab-img">
                                <img src="<?=$article->picture_url?>" alt="img">
                            </div>
                            <div class="news-tab-des fn">
                                <h1 class="news-dt-tit"><a href="<?=anchorurl("show/index/".$article->id)?>"><?=$article->title?></a></h1>
                                <div class="news-tab-info">
                                    <p>
                                        <?=$article->description?>
                                    </p>
                                </div>
                                <a href="<?=anchorurl("show/index/".$article->id)?>" class="fn-r news-tab-btn"></a>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="page">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view("tmpl/foot")?>
<script>
    $(function(){
       // tabBox({})
    })
</script>
</body>
</html>