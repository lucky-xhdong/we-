<div class="col-md-3">
    <div class="sidebar">
        <h3>热门文章</h3>
        <ul>
            <?php foreach($hot_articles as $article):?>
            <li><a href="<?=anchorurl('show/index/'.$article->id)?>"><?=$article->title?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>