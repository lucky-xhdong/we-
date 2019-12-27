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
            <textarea type="text" class="form-control form-control-sm"  placeholder="计划内容" name="body"><?php if(isset($regionServicePlan->id)) echo $regionServicePlan->body?></textarea>
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
<input type="hidden" name="id" value="<?php if(isset($regionServicePlan->id)) echo $regionServicePlan->id;else 0; ?>">