<?php foreach($schools as $school):?>
    <li class="cases-lists_item">
        <a href="<?=anchorurl("schools/index/".$school->id)?>">
            <img src="<?=$school->getFileUrl()?>" alt="" >
        </a>
        <div class="cases-lists_mask">
            <div class="txt-group">
                <p class="txt"><?=$school->name?></p>
                <a href="<?=anchorurl("schools/index/".$school->id)?>" class="link">查看更多<i class="icon"></i></a>
            </div>
        </div>
    </li>
<?php endforeach;?>