<div class="_input-group">
    <div class="form-row" data-before="所在年级：">
        <div class="form-group col-md-8">
            <?php foreach($grades as $grade):?>
                <?php if(isset($userRelation->id) && $userRelation->grade_id == $grade['id']):?>
                    <span value="<?=$grade['id']?>"><?=$grade['name']?></span>
                <?php else:?>
                <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="所在班级：">
        <div class="form-group col-md-8">
            <?php foreach($classes as $class):?>
                <?php if(isset($userRelation->id) && $userRelation->class_id == $class['id']):?>
                    <span value="<?=$class['id']?>"><?=$class['name']?></span>
                <?php else:?>
                <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="用户角色：">
        <div class="form-group col-md-8">
            <?php if(isset($userRelation->user_type) && $userRelation->user_type == "student"):?>
                <span>学生</span>
            <?php else:?>
                <span>老师</span>
            <?php endif;?>
        </div>
    </div>
</div>

<div class="_input-group">
    <div class="form-row" data-before="成员姓名：">
        <div class="form-group col-md-8">
            <span><?php if(isset($user->id) && $user->id > 0) echo $user->name; ?></span>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="账号：">
        <div class="form-group col-md-8">
            <?php if(isset($user->id)):?>
                <?=$user->username?>
            <?php else:?>
                <input  class="form-control form-control-sm" type="text"   name="username" id="username" placeholder="账号" />
            <?php endif;?>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="头像：">
        <?php if(isset($user->id)):?>
         <img class="int-userimg" src="<?php if(isset($user->id)) echo $user->getAvatarUrl();?>"/>
        <?php endif;?>
    </div>
</div>
    <!--授权课程 结束-->
<input type="hidden" name="id" value="<?php if(isset($user->id)) echo $user->id;else echo 0;?>">
<input type="hidden" name="school_id" value="<?=$school_id?>">
