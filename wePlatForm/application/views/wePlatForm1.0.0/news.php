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
            <li><a href="javascript:;">首页</a></li>
            <li><a href="javascript:;">快讯详情</a></li>
        </ul>
    </div>
</div>
<!--breadcrumb end-->
<div class="news-wrapper">
    <div class="news-container news-news-container">
        <div class="news-module">
            <h2 class="txt-date"><?=date("Y-m-d")?></h2>
            <?php foreach($newsFlashArticles as $newsFlashArticle):?>
            <div class="news-module__item">
                <h2 class="txt-title"><?=$newsFlashArticle->title?></h2>
                <p class="txt-time"> <?=$newsFlashArticle->description?></p>
                <div class="txt-content">
                    <p class="txt">
                        <?=$newsFlashArticle->description?>
                    </p>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?=$this->load->view("tmpl/wePlatForm1.0.0/footer")?>
<script>
    $(function(){
        tabBox({});
        tabBox({box:'.news-carousel',carousel:true,children:'true'});
        fnHover(0);
    })
</script>
</body>
</html>