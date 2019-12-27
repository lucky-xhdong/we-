<div class="_input-group">
    <div class="form-row" data-before="所在区域：">
        <div class="form-group col-md-8">
            <select name="region_id" id="amoeba" class="form-control form-control-sm">
                <?php foreach ($regions as $region): ?>
                    <?php if(isset($school->region_id) && $school->region_id == $region->id):?>
                        <option value="<?= $region->id ?>" selected><?= $region->name ?></option>
                    <?php else:?>
                        <option value="<?= $region->id ?>"><?= $region->name ?></option>
                    <?php endif;?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="所在省：">
        <div class="form-group col-md-8">
            <select name="province_id" id="province_edit" class="form-control form-control-sm">
                <?php foreach ($provinces as $province): ?>
                    <?php if(isset($school->province_id) && $school->province_id == $province->province_id):?>
                        <option value="<?= $province->province_id ?>" selected><?= $province->name ?></option>
                    <?php else:?>
                        <option value="<?= $province->province_id ?>"><?= $province->name ?></option>
                    <?php endif;?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="所在市：">
        <div class="form-group col-md-8">
            <select name="city_id" id="city_edit" class="form-control form-control-sm">
                <?php foreach ($citys as $city): ?>
                    <?php if(isset($school->city_id) && $school->city_id == $city->city_id):?>
                        <option value="<?= $city->city_id ?>" selected><?= $city->name ?></option>
                    <?php else:?>
                        <option value="<?= $city->city_id ?>"><?= $city->name ?></option>
                    <?php endif;?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="所在县/区：">
        <div class="form-group col-md-8">
            <select name="district_id" id="district_edit" class="form-control form-control-sm">
                <?php foreach ($districts as $district): ?>
                    <?php if(isset($school->district_id) && $school->district_id == $district->district_id):?>
                        <option value="<?= $district->district_id ?>" selected><?= $district->name ?></option>
                    <?php else:?>
                        <option value="<?= $district->district_id ?>"><?= $district->name ?></option>
                    <?php endif;?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="学校属性：">
        <div class="form-group col-md-8">
            <select name="school_property_id" id="" class="form-control form-control-sm">
                <?php foreach ($schoolPropertys as $schoolProperty): ?>
                    <?php if(isset($school->school_property_id) && $school->school_property_id == $schoolProperty->id):?>
                        <option value="<?= $schoolProperty->id ?>" selected><?= $schoolProperty->name ?></option>
                    <?php else:?>
                        <option value="<?= $schoolProperty->id ?>"><?= $schoolProperty->name ?></option>
                    <?php endif;?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>
<?php
$sr_providers = array("chivox" => "驰声", "iflytek" => "科大讯飞");
?>
<div class="_input-group">
    <div class="form-row" data-before="语音识别服务商：">
        <div class="form-group col-md-8">
            <select name="sr_provider" class="form-control form-control-sm">
                <?php foreach ($sr_providers as $key => $sr_provider): ?>
                    <?php if(isset($school->sr_provider) && $school->sr_provider == $key):?>
                        <option value="<?= $key ?>" selected><?= $sr_provider ?></option>
                    <?php else:?>
                        <option value="<?= $key ?>"><?= $sr_provider ?></option>
                    <?php endif;?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="出版社：">
        <div class="form-group col-md-8">
            <select name="publishing_house_id" class="form-control form-control-sm">
                <?php foreach($publishing_houses as $key=>$publishing_house):?>
                    <?php if(isset( $school->publishing_house_id) && ($publishing_house['id'] == $school->publishing_house_id)):?>
                        <option value="<?=$publishing_house['id']?>" selected><?=$publishing_house['name']?></option>
                    <?php else:?>
                        <option value="<?=$publishing_house['id']?>"><?=$publishing_house['name']?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </div>
</div>

<div class="_input-group">
    <div class="form-row" data-before="学校名称：">
        <div class="form-group col-md-8">
            <?php if(isset($school->id)):?>
                <input name="name" type="text" class="form-control form-control-sm" placeholder="学校名称" value="<?=$school->name?>"
                       required/>
            <?php else:?>
                <input name="name" type="text" class="form-control form-control-sm" placeholder="学校名称"
                       required/>
            <?php endif;?>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="封面图：">
        <div class="form-group col-md-8">
            <?php if(isset($school->id)):?>
                <img class="int-userimg" src="<?php if(isset($school->id)) echo $school->getFileUrl();?>"/>
            <?php endif;?>
            <div class="custom-file-control">
                <label for="" class=" upload-btn">
                    <input type="file" class="img-upload" name="file">
                    <span class="img-upload-btn"></span>
                </label>
            </div>
        </div>
    </div>
</div>
<div class="_input-group _input-date-group">
    <div class="form-row" data-before="授权时间：">
        <div class="form-group col-md-4">
            <?php if(isset($school->start_date)):?>
                <input type="text" class="form-control form-control-sm" name="start_date" id="start_date" value="<?=$school->start_date?>"
                       placeholder="开始时间" required/>
            <?php else:?>
                <input type="text" class="form-control form-control-sm" name="start_date" id="start_date" value=""
                       placeholder="开始时间" required/>
            <?php endif;?>
        </div>
        至
        <div class="form-group col-md-4">
            <?php if(isset($school->end_date)):?>
                <input type="text" class="form-control form-control-sm" placeholder="结束时间" name="end_date" id="end_date" value="<?=$school->end_date?>" required/>
            <?php else:?>
                <input type="text" class="form-control form-control-sm" placeholder="结束时间" name="end_date" id="end_date" value="" required/>
            <?php endif;?>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="授权课程：">
        <div class="form-group col-md-8 source-unsel" id="courseList">
            <select name="course_ids[]" id="course_ids" class="form-control form-control-sm" size="2" multiple>
                <option value="0">--选择课程--</option>
                <?php foreach($courses as $course):?>
                    <?php if(isset($school->course_ids) && strstr($school->course_ids, $course['id'])):?>
                        <option value="<?=$course['id']?>" selected><?= $course['name']?></option>
                    <?php else:?>
                        <option value="<?=$course['id']?>"><?= $course['name']?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </div>
</div>
<input type="hidden" name="id" value="<?php if(isset($school->id)) echo $school->id;else echo 0;?>">
<script>
    $('#start_date').datepicker({
        format: 'yyyy-mm-dd',
    });
    $('#end_date').datepicker({
        format: 'yyyy-mm-dd',
    });
</script>