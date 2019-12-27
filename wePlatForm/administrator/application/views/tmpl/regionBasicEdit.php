<ul class="text-center basic-info pag-15 minH-200">
    <li class="col-md-12">
        <span class="col-md-4">所在省</span>
        <div class="col-md-8">
            <p class="type-show"><?=$region->getProvice()->name?></p>
            <select name="province_id" id="province_edit" class="type-hide">
                <?php foreach($provinces as $province):?>
                    <?php if($province->province_id == $region->province_id):?>
                        <option value="<?=$province->province_id?>" selected><?=$province->name?></option>
                    <?php else:?>
                        <option value="<?=$province->province_id?>"><?=$province->name?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">所在市</span>
        <div class="col-md-8">
            <p class="type-show"><?=$region->getCity()->name?></p>
            <select name="city_id" id="city_edit" class="type-hide">
                <?php foreach($citys as $city):?>
                    <?php if($city->city_id == $region->city_id):?>
                        <option value="<?=$city->city_id?>" selected><?=$city->name?></option>
                    <?php else:?>
                        <option value="<?=$city->city_id?>"><?=$city->name?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">所在县/区</span>
        <div class="col-md-8">
            <p class="type-show"><?=$region->getDistrict()->name?></p>
            <select name="district_id" id="district_edit" class="type-hide">
                <?php foreach($districts as $district):?>
                    <?php if($district->district_id  == $region->district_id):?>
                        <option value="<?=$district->district_id?>" selected><?=$district->name?></option>
                    <?php else:?>
                        <option value="<?=$district->district_id?>"><?=$district->name?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">区域名称</span>
        <div class="col-md-8">
            <p class="type-show"><?=$region->name?></p>
            <label for="" class="type-hide"><input type="text" placeholder="区域名称" name="name" value="<?=$region->name?>" required/></label>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">域名</span>
        <div class="col-md-8">
            <p class="type-show"><?=$region->url?></p>
            <label for="" class="type-hide"><input type="text" placeholder="" name="url" value="<?=$region->url?>"/></label>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">区域介绍</span>
        <div class="col-md-8">
            <p class="type-show"><?=$region->description?></p>
            <label for="" class="type-hide" style="width: 100%">
                <textarea type="text" rows="3" name="description" placeholder=""><?=$region->description?></textarea>
            </label>
        </div>
    </li>
</ul>
<input type="hidden" name="id" value="<?=$region->id?>">