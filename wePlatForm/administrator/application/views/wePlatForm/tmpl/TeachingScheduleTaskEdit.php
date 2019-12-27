<div class="_input-group">
    <div class="form-row" data-before="进度名称：">
        <div class="form-group col-md-8">
            <input class="form-control form-control-sm" value="<?=$teachingscheduleTaks->name?>" name="name" type="text" placeholder="进度名称" required>
        </div>
    </div>
</div>
<div class="_input-group _input-date-group">
    <div class="form-row" data-before="任务截止日期：">
        <div class="form-group col-md-8">
            <input type="text" class="form-control form-control-sm datepicker" value="<?=$teachingscheduleTaks->end_date?>" placeholder="任务截止日期" name="end_date">
        </div>
    </div>
</div>

<div class="_input-group">
    <div class="form-row" data-before="任务描述：">
        <div class="form-group col-md-8">
            <textarea type="text" rows="3" name="description" placeholder="任务描述" class="form-control form-control-sm"><?=$teachingscheduleTaks->description?></textarea>
        </div>
    </div>
</div>
<div class="radio-group">
    <div class="form-row" data-before="是否采集素材：">
        <div class="custom-control custom-radio custom-control-inline">
            <input value="0" id="useTeaching1" name="is_allowed_upload_material" class="custom-control-input"  type="radio" <?php if($teachingscheduleTaks->is_allowed_upload_material == 0) echo "checked";?>>
            <label class="custom-control-label" for="useTeaching1">是</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input value="1" id="unUseTeaching1" name="is_allowed_upload_material" class="custom-control-input" type="radio" <?php if($teachingscheduleTaks->is_allowed_upload_material == 1) echo "checked";?>>
            <label class="custom-control-label" for="unUseTeaching1">否</label>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="附件：">
        <div class="form-group col-md-8">
            <div class="custom-file-control">
                <!--                <input type="file" name="file" class="btn-file">-->
                <a href="javascript:;" class="btn-choose" data-toggle="modal" data-target="#resource_modal">选择</a>
            </div>
            <div class="custom-file-list">
                <ul id="file-list-icon_update">
                    <?php foreach($filelist as $file):?>
                        <?php
                        $resourceInfo = $file['resourceInfo'];
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
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="id" value="<?=$teachingscheduleTaks->id?>">
<input type="hidden" name="material_resource_ids" id="material_resource_ids_update" value="<?=$teachingscheduleTaks->material_resource_ids?>">
