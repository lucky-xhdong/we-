<?php foreach($articles as $article):?>
    <li>
        <h3> <a href="<?=anchorurl('show/index/'.$article->id)?>"><?=$article->title?></a></h3>
                                <span class="path-time">
                                    <i><?=$article->origin?></i>
                                    <i><?=$article->create_time?></i>
                                </span>
        <div>
            <?php if(!empty($article->picture_url)):?>
                <div class="breviary-l">
                    <cite>
                        <img src="<?=$article->picture_url?>" alt="img"/>
                    </cite>
                </div>
            <?php endif;?>
            <div class="breviary-r">
                <p>
                    <?php if(empty($article->description)):?>
                        <?=mb_substr(strip_tags($article->body),0,100)?>
                    <?php else:?>
                        <?=$article->description?>
                    <?php endif;?>
                    <a href="<?=anchorurl('show/index/'.$article->id)?>">[阅读更多]</a>
                </p>
            </div>

        </div>
    </li>
<?php endforeach;?>