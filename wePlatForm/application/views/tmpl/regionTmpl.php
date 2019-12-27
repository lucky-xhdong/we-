<?php  foreach($regions as $key=> $region):?>
    <?php if($key == 0):?>
        <li class="region-list_item">
            <a href="<?=anchorurl("regional/index/".$region->id)?>">
                <img src="<?=$region->getFileUrl("region_small")?>" alt="<?=$region->name?>">
                <div class="op-region-name">
                    <span><?=$region->name?></span>
                </div>
            </a>
        </li>
    <?php elseif($key == 1):?>
        <li class="region-list_item">
            <a href="<?=anchorurl("regional/index/".$region->id)?>">
                <img src="<?=$region->getFileUrl("square")?>" alt="<?=$region->name?>">
                <div class="op-region-name">
                    <span><?=$region->name?></span>
                </div>
            </a>
        </li>
    <?php elseif($key == 2):?>
        <li class="region-list_item">
            <a href="<?=anchorurl("regional/index/".$region->id)?>">
                <img src="<?=$region->getFileUrl("region_large")?>" alt="<?=$region->name?>">
                <div class="op-region-name">
                    <span><?=$region->name?></span>
                </div>
            </a>
        </li>
    <?php elseif($key == 3):?>
        <li class="region-list_item">
            <a href="<?=anchorurl("regional/index/".$region->id)?>">
                <img src="<?=$region->getFileUrl("region_large")?>" alt="<?=$region->name?>">
                <div class="op-region-name">
                    <span><?=$region->name?></span>
                </div>
            </a>
        </li>
    <?php elseif($key == 4):?>
        <li class="region-list_item">
            <a href="<?=anchorurl("regional/index/".$region->id)?>">
                <img src="<?=$region->getFileUrl("square")?>" alt="<?=$region->name?>">
                <div class="op-region-name">
                    <span><?=$region->name?></span>
                </div>
            </a>
        </li>
    <?php endif;?>
<?php endforeach;?>