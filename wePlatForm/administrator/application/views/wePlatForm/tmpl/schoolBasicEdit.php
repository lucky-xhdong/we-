<ul class="text-center basic-info pag-15 minH-200">
    <li class="col-md-12">
        <span class="col-md-6">所在区域</span>
        <div class="col-md-6">
            <p class="type-show"><?=$school->getRegion()->name?></p>
            <select name="region_id" id="amoeba_edit" class="type-hide">
                <?php foreach($regions as $region):?>
                    <?php if($region->id == $school->region_id):?>
                        <option value="<?=$region->id?>" selected><?=$region->name?></option>
                    <?php else:?>
                        <option value="<?=$region->id?>"><?=$region->name?></option>
                     <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-6">所在省</span>
        <div class="col-md-6">
            <p class="type-show"><?=$school->getProvice()->name?></p>
            <select name="province_id" id="province_edit" class="type-hide">
                <?php foreach($provinces as $province):?>
                    <?php if($province->id == $school->province_id):?>
                        <option value="<?=$province->province_id?>" selected><?=$province->name?></option>
                    <?php else:?>
                        <option value="<?=$province->province_id?>"><?=$province->name?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-6">所在市</span>
        <div class="col-md-6">
            <p class="type-show"><?=$school->getCity()->name?></p>
            <select name="city_id" id="city_edit" class="type-hide">
                <?php foreach($citys as $city):?>
                    <?php if($city->id == $school->city_id):?>
                        <option value="<?=$city->city_id?>" selected><?=$city->name?></option>
                    <?php else:?>
                        <option value="<?=$city->city_id?>"><?=$city->name?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-6">所在县/区</span>
        <div class="col-md-6">
            <p class="type-show"><?=$school->getDistrict()->name?></p>
            <select name="district_id" id="district_edit" class="type-hide">
                <?php foreach($districts as $district):?>
                    <?php if($district->id == $school->district_id):?>
                        <option value="<?=$district->district_id?>" selected><?=$district->name?></option>
                    <?php else:?>
                        <option value="<?=$district->district_id?>"><?=$district->name?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </li>

    <?php
    $sr_providers = array("chivox"=>"驰声","iflytek"=>"科大讯飞");
    ?>
    <li class="col-md-12">
        <span class="col-md-6">语音识别服务商</span>
        <div class="col-md-6">
            <p class="type-show"><?=$sr_providers[$school->sr_provider]?></p>
            <select name="sr_provider"  class="type-hide">
                <?php foreach($sr_providers as $key=>$sr_provider):?>
                    <?php if($key == $school->sr_provider):?>
                        <option value="<?=$key?>" selected><?=$sr_provider?></option>
                    <?php else:?>
                        <option value="<?=$key?>"><?=$sr_provider?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-6">学校属性</span>
        <div class="col-md-6">
            <p class="type-show"><?=$school->getPropertyRow()->name?></p>
            <select name="school_property_id" class="type-hide">
                <?php foreach($schoolPropertys as $schoolProperty):?>
                    <?php if($schoolProperty->id == $school->school_property_id):?>
                        <option value="<?=$schoolProperty->id?>" selected><?=$schoolProperty->name?></option>
                    <?php else:?>
                        <option value="<?=$schoolProperty->id?>"><?=$schoolProperty->name?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-6">学校名称</span>
        <div class="col-md-6">
            <p class="type-show"><?=$school->name?></p>
            <label for="" class="type-hide"><input type="text" placeholder="学校名称" name="name" value="<?=$school->name?>" required/></label>
        </div>
    </li>
    <!--授权课程 开始-->
    <li class="col-md-12">
    <div class="give-source-box">
        <h4 class="modal-title">授权课程</h4>
        <div class="source-list">
            <div class="source-unsel-sel" style="width:100% !important;">
                <div class="source-unsel" id="courseListEdit">
                    <?php foreach($courses as $course):?>
                        <?php if($course['isSelected'] == 1):?>
                            <span data-id="<?=$course['id']?>" class="on"><?=$course['name']?></span>
                        <?php else:?>
                            <span data-id="<?=$course['id']?>"><?=$course['name']?></span>
                        <?php endif;?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    </li>
</ul>
<input type="hidden" name="id" value="<?=$school->id?>">
<input type="hidden" name="course_ids" value="<?=$school->course_ids?>" id="course_ids_edit">