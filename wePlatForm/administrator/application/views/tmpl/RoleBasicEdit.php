<h4 class="modal-title">修改角色</h4>
<div class="role-handle minH-200">
    <!--            角色名称 开始-->
    <div class="role-name col-md-12">
        <div class="col-md-2">角色名称</div>
        <div class="col-md-10">
            <p class="type-hide">年级监管员</p>
            <label for=""><input type="text" name="name" value="<?=$role->name?>" placeholder="如：管理员" required <?php if($isView == 1) echo 'readonly';?>></label>
        </div>
    </div>
    <!--            角色名称 结束-->
    <!--学习数据 开始-->
    <?php foreach($permissions as $permission):?>
        <div class="role-data role-check-nor col-md-12">
            <label for="" class="role-nor-label"><input type="checkbox"><?=$permission->name?></label>
            <div>
                <?php foreach($permission->chlid as $child):?>
                    <div class="col-md-12">
                        <div class="col-md-2"><?=$child->name?>：</div>
                        <div class="col-md-10">
                            <?php foreach($child->child as $item):?>
                                <label for="" class="col-md-2"><input type="checkbox" name="permissios_id[]" value="<?=$item->id?>" <?php if($item->ischecked) echo 'checked';?> <?php if($isView == 1) echo 'disabled';?>><?=$item->name?></label>
                            <?php endforeach;?>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    <?php endforeach;?>
    <!--学习数据 结束-->
</div>
<input type="hidden" name="id" value="<?=$role->id?>">