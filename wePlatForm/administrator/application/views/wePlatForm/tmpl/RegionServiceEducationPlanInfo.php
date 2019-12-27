<div class="_input-group _input-date-group">
    <div class="form-row" data-before="计划周期：">
        <div class="form-group col-md-4">
            <input type="text" class="form-control form-control-sm datepicker" value="<?php if(isset($regionServicePlan->id)) echo $regionServicePlan->start_date;?>" placeholder="开始日期" name="start_date">
        </div>至
        <div class="form-group col-md-4">
            <input type="text" class="form-control form-control-sm datepicker" value="<?php if(isset($regionServicePlan->id)) echo $regionServicePlan->end_date?>" placeholder="结束日期" name="end_date">
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="计划内容：">
        <div class="form-group col-md-8">
            <textarea type="text" class="form-control form-control-sm"  placeholder="计划内容" name="body" required><?php if(isset($regionServicePlan->id)) echo $regionServicePlan->body?></textarea>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="附件：">
        <div class="form-group col-md-8">
            <div class="custom-file-control">
                <input type="file" name="file">
            </div>
            <?php if(isset($regionServicePlan->id)&& !empty($regionServicePlan->fileUrl)):?>
                <div class="custom-file-list">
                    <ul id="file-list-icon_update">
                        <?php
                        $resourceInfo['type'] =  $regionServicePlan->filetype;
                        ?>
                        <?php if($resourceInfo['type'] == "image"):?>
                            <li><img src="<?=$resourceInfo['url']?>" width="60;" /></li>
                        <?php elseif($resourceInfo['type'] == "audio"):?>
                            <li class="icon-wrapper"><i class="icon icon-audio"></i></li>
                        <?php elseif($resourceInfo['type'] == "video"):?>
                            <li class="icon-wrapper"><i class="icon icon-video"></i></li>
                        <?php elseif($resourceInfo['type'] == "zip"):?>
                            <li class="icon-wrapper"><i class="icon icon-zip"></i></li>
                        <?php elseif($resourceInfo['type'] == "word"):?>
                            <li class="icon-wrapper"><i class="icon icon-word"></i></li>
                        <?php elseif($resourceInfo['type'] == "ppt"):?>
                            <li class="icon-wrapper"><i class="icon icon-ppt"></i></li>
                        <?php elseif($resourceInfo['type'] == "excel"):?>
                            <li class="icon-wrapper"><i class="icon icon-excel"></i></li>
                        <?php elseif($resourceInfo['type'] == "file"):?>
                            <li class="icon-wrapper"><i class="icon icon-file"></i></li>
                        <?php endif;?>
                    </ul>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>
<input type="hidden" name="id" value="<?php if(isset($regionServicePlan->id)) echo $regionServicePlan->id;else 0; ?>">