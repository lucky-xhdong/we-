<div class="_input-group">
    <div class="form-row" data-before="计划名称：">
        <div class="form-group col-md-8">
            <input type="text" class="form-control form-control-sm" value="<?php if(isset($regionEducationPlan->id)) echo $regionEducationPlan->name;?>" placeholder="计划名称" name="name" required>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="计划介绍：">
        <div class="form-group col-md-8">
            <textarea type="text" class="form-control form-control-sm" placeholder="计划介绍" name="description"><?php if(isset($regionEducationPlan->id)) echo $regionEducationPlan->description;?></textarea>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="计划属性：">
        <div class="form-group col-md-2">
            <select class="form-control form-control-sm" placeholder="发布范围" name="plan_range">
                <option value="<?=$region->id?>"><?=$region->name?></option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <select class="form-control form-control-sm" placeholder="学校" name="school_id">
                <option value="0">请选择学校</option>
                <?php foreach($schools as $school):?>
                    <?php if(isset($regionEducationPlan->id) && $school->id == $regionEducationPlan->school_id):?>
                        <option value="<?=$school->id?>" selected><?=$school->name?></option>
                    <?php else:?>
                        <option value="<?=$school->id?>"><?=$school->name?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </div>
</div>
<!--<div class="_input-group _input-date-group">-->
<!--    <div class="form-row" data-before="计划周期：">-->
<!--        <div class="form-group col-md-4">-->
<!--            <input type="text" class="form-control form-control-sm datepicker" value="--><?php //if(isset($regionEducationPlan->id)) echo $regionEducationPlan->start_date;?><!--" placeholder="开始日期" name="start_date">-->
<!--        </div>至-->
<!--        <div class="form-group col-md-4">-->
<!--            <input type="text" class="form-control form-control-sm datepicker" value="--><?php //if(isset($regionEducationPlan->id)) echo $regionEducationPlan->end_date?><!--" placeholder="结束日期" name="end_date">-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="_input-group">-->
<!--    <div class="form-row" data-before="计划内容：">-->
<!--        <div class="form-group col-md-8">-->
<!--            <textarea type="text" class="form-control form-control-sm"  placeholder="计划内容" name="body">--><?php //if(isset($regionEducationPlan->id)) echo $regionEducationPlan->body?><!--</textarea>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="_input-group">-->
<!--    <div class="form-row" data-before="附件：">-->
<!--        <div class="custom-file-control">-->
<!--            <input type="file" name="file">-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<input type="hidden" name="id" value="<?php if(isset($regionEducationPlan->id)) echo $regionEducationPlan->id;else 0; ?>">