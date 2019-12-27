<div class="_input-group">
    <div class="form-row" data-before="报告编号：">
        <div class="form-group col-md-8">
            <input type="text" class="form-control form-control-sm" value="<?php if(isset($report->id)) echo $report->service_ids;?>"  placeholder="编号规则：区域编号（ID号）+部门编号（部门ID号）+顺序号" name="service_ids" required>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="报告名称：">
        <div class="form-group col-md-8">
            <input type="text" class="form-control form-control-sm" value="<?php if(isset($report->id)) echo $report->name;?>"  placeholder="报告名称" name="name" required>
        </div>
    </div>
</div>

<div class="_input-group">
    <div class="form-row" data-before="报告部门：">
        <div class="form-group col-md-8">
            <select class="form-control form-control-sm" placeholder="报告部门" name="service_type">
                <option value="0" <?php if(isset($business->id) && $report->service_type == 0 ) echo "selected";?>>运营</option>
                <option value="1" <?php if(isset($business->id) && $report->service_type == 1 ) echo "selected";?>>教学</option>
                <option value="2" <?php if(isset($business->id) && $report->service_type == 2) echo "selected";?>>商务</option>
            </select>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="报告类型：">
        <div class="form-group col-md-8">
            <select class="form-control form-control-sm" placeholder="属性" name="report_type">
                <option value="0" <?php if(isset($business->id) && $report->report_type == 0 ) echo "selected";?>>常规报告</option>
                <option value="1"  <?php if(isset($business->id) && $report->report_type == 1) echo "selected";?>>总结报告</option>
            </select>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="报告范围：">
        <div class="form-group col-md-2">
            <select class="form-control form-control-sm" placeholder="发布范围" name="plan_range">
                <option value="<?=$region->id?>"><?=$region->name?></option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <select class="form-control form-control-sm" placeholder="学校" name="school_id">
                <option value="0">请选择学校</option>
                <?php foreach($schools as $school):?>
                    <?php if(isset($report->id) && $school->id == $report->school_id):?>
                        <option value="<?=$school->id?>" selected><?=$school->name?></option>
                    <?php else:?>
                        <option value="<?=$school->id?>"><?=$school->name?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="附件：">
        <div class="form-group col-md-8">
            <div class="custom-file-control">
                <input type="file" name="file">
            </div>
            <?php if(isset($report->id)&& !empty($report->fileUrl)):?>
            <div class="custom-file-list">
                <ul id="file-list-icon_update">
                    <?php
                    $resourceInfo['type'] =  $report->filetype;
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
<input type="hidden" value="<?php if(isset($report->id)) echo $report->id;else echo 0;?>" class="form-control form-control-sm" name="id">
