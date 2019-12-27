<div class="radio-group">
    <div class="form-row" data-before="签约状态：">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio"  value="0" id="useTeaching" name="signed_status" class="custom-control-input" <?php if((isset($business->id) && $business->signed_status == 0) || !isset($business->id)) echo "checked";?>>
            <label class="custom-control-label" for="useTeaching">未签约</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" value="1" id="unUseTeaching" name="signed_status" class="custom-control-input" <?php if(isset($business->id) && $business->signed_status == 1) echo "checked";?>>
            <label class="custom-control-label" for="unUseTeaching">已经签约</label>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="签约人：">
        <div class="form-group col-md-8">
            <select class="form-control form-control-sm" placeholder="签约人" name="signed_user_id">
                <option value="0">请选择</option>
                <?php foreach($businessusers as $businessuser):?>
                    <?php if(isset($business->id) && $businessuser['id'] == $business->signed_user_id):?>
                        <option value="<?=$businessuser['id']?>" selected><?=$businessuser['name']?></option>
                    <?php else:?>
                        <option value="<?=$businessuser['id']?>"><?=$businessuser['name']?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </div>
</div>
<div class="_input-group _input-date-group">
    <div class="form-row" data-before="有效期：">
        <div class="form-group col-md-4">
            <input type="text" class="form-control form-control-sm datepicker"  value="<?php if(isset($business->id)) echo $business->start_date;?>" placeholder="开始日期" name="start_date">
        </div>至
        <div class="form-group col-md-4">
            <input type="text" class="form-control form-control-sm datepicker"  value="<?php if(isset($business->id)) echo $business->end_date;?>" placeholder="结束日期" name="end_date">
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="合同金额：">
        <div class="form-group col-md-8">
            <input type="text" value="<?php if(isset($business->id)) echo $business->contracted_value;?>" class="form-control form-control-sm" placeholder="合同金额" name="contracted_value" required>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="合同页码：">
        <div class="form-group col-md-8">
            <input type="text" class="form-control form-control-sm" value="<?php if(isset($business->id)) echo $business->contract_pages;?>" placeholder="合同页码" name="contract_pages" required>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="合同附件：">
        <div class="form-group col-md-8">
            <div class="custom-file-control">
                <input type="file" name="file">
            </div>
            <?php if(isset($business->id)&& !empty($business->fileUrl)):?>
            <div class="custom-file-list">
                <ul id="file-list-icon_update">
                    <?php
                    $resourceInfo['type'] =  $business->filetype;
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
<input type="hidden" value="<?php if(isset($business->id)) echo $business->id;else echo 0;?>" class="form-control form-control-sm" name="id">
