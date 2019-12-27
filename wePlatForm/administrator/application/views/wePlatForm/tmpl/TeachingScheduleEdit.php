<div class="_input-group">
    <div class="form-row" data-before="进度名称：">
        <div class="form-group col-md-8">
            <input class="form-control form-control-sm" value="<?=$teachingschedule->name?>" name="name" type="text" placeholder="进度名称" required>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="区域选择：">
        <div class="form-group col-md-8">
            <select name="region_id" id="region_new"  class="form-control form-control-sm">
                <option value="0">--区域选择--</option>
                <?php foreach($regions as $region):?>
                    <?php if($teachingschedule->region_id == $region->id):?>
                        <option value="<?=$region->id?>" selected><?=$region->name?></option>
                    <?php else:?>
                        <option value="<?=$region->id?>"><?=$region->name?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </div>
</div>

<div class="_input-group">
    <div class="form-row" data-before="学校选择：">
        <div class="form-group col-md-8">
            <select name="school_id" id="school_new" class="form-control form-control-sm">
                <option value="0">--学校选择--</option>
                <?php foreach($schools as $school):?>
                    <?php if($teachingschedule->school_id == $school->id):?>
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
    <div class="form-row" data-before="选择老师：">
        <div class="form-group col-md-8">
            <select name="teacher_ids[]" id="teacher_new" class="form-control form-control-sm" size="2" multiple>
                <option value="0">--选择老师--</option>
                <?php
                    $teacher_array = explode(",",$teachingschedule->teacher_ids);
                ?>
                <?php foreach($teachers as $teacher):?>
                    <?php if(in_array($teacher['id'],$teacher_array)):?>
                        <option value="<?=$teacher['id']?>" selected><?=$teacher['school_name']."-".$teacher['name']?></option>
                    <?php else:?>
                        <option value="<?=$teacher['id']?>"><?=$teacher['school_name']."-".$teacher['name']?></option>
                    <?php endif;?>

                <?php endforeach;?>
            </select>
        </div>
    </div>
</div>

<div class="_input-group _input-date-group">
    <div class="form-row" data-before="任务周期：">
        <div class="form-group col-md-4">
            <input type="text" class="form-control form-control-sm datepicker"  value="<?=$teachingschedule->start_date?>" placeholder="开始日期" name="start_date">
        </div>至
        <div class="form-group col-md-4">
            <input type="text" class="form-control form-control-sm datepicker"  value="<?=$teachingschedule->end_date?>" placeholder="结束日期" name="end_date">
        </div>
    </div>
</div>

<div class="_input-group">
    <div class="form-row" data-before="任务描述：">
        <div class="form-group col-md-8">
            <textarea type="text" rows="3"  name="description" placeholder="任务描述" class="form-control form-control-sm"><?=$teachingschedule->description?></textarea>
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
<input type="hidden" name="material_resource_ids" id="material_resource_ids_update" value="<?=$teachingschedule->material_resource_ids?>">
<input type="hidden" name="id" value="<?=$teachingschedule->id?>">