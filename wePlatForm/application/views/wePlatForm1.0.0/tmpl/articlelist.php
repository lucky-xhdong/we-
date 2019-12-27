<?php foreach($articles as $key=>$article):?>
    <li>
        <?php if(!empty($article->picturename)):?>
            <div class="img-wrapper">
                <a href="<?=anchorurl("item/index/".$article->id)?>">
                    <img src="<?=pictureurlsize(0,$article->picturename,'school')?>" alt="">
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
<script>
    $(function(){
        <?php if(count($articles) <3):?>
                $("#getmore").hide();
         <?php else:?>
        $("#getmore").show();
        <?php endif;?>

    });
</script>
