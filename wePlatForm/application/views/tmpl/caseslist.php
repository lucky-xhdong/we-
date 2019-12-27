<?php foreach($articles as $article):?>
    <li>
        <div class="cr-lists_left">
            <a href="<?=anchorurl("show/index/".$article->id)?>">
                <img src="<?=$article->picture_url?>" alt="" style="width: 300px;">
            </a>
        </div>
        <div class="cr-lists_right">
            <div class="title-wrapper">
                <h2 class="title"><a class="txt" href="<?= anchorurl("show/index/" . $article->id) ?>"><?=$article->title?></a></h2>
                <p class="time"><?=date("Y/m/d",strtotime($article->create_time))?></p>
            </div>
            <div class="content-wrapper">
                <p class="txt"><?=$article->description?></p>
            </div>
        </div>
    </li>
<?php endforeach;?>