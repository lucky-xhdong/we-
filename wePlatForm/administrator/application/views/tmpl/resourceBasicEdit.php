<div class="_input-group">
    <div class="form-row" data-before="素材名称：">
        <div class="form-group col-md-8">
            <input class="form-control form-control-sm"name="name" type="text" value="<?=$resource->name?>"  placeholder="素材名称" required>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="素材类型：">
        <div class="form-group col-md-6">
            <select name="resource_type_id" id="resource_type_edit" class="form-control form-control-sm">
                <?php foreach($types as $type):?>
                    <?php if($type->id == $resource->resource_type_id):?>
                        <option value="<?=$type->id?>" selected><?=$type->name?></option>
                    <?php else:?>
                        <option value="<?=$type->id?>"><?=$type->name?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </div>
</div>

<div class="_input-group">
    <div class="form-row" data-before="区域选择：">
        <div class="form-group col-md-6">
            <select name="region_id" id="region_edit"  class="form-control form-control-sm">
                <?php foreach($regions as $region):?>
                    <?php if($region->id == $resource->region_id):?>
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
        <div class="form-group col-md-6">
            <select name="school_id" id="school_edit" class="form-control form-control-sm">
                <?php foreach($schools as $school):?>
                <?php if($school->id  == $resource->school_id):?>
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
    <div class="form-row" data-before="素材介绍：">
        <div class="form-group col-md-8">
            <textarea type="text" rows="3" name="description" placeholder="素材介绍" class="form-control form-control-sm"><?=$resource->description?></textarea>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="附件：">
        <div class="custom-file-control">
            <input type="file" name="file">
        </div>
    </div>
</div>
<input type="hidden" name="id" value="<?=$resource->id?>">