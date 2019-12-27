<div class="_input-group">
    <div class="form-row" data-before="所在年级：">
        <div class="form-group col-md-8">
            <select name="grade_id" id="grade_update_ids" required class="form-control form-control-sm">
                <?php foreach($grades as $grade):?>
                    <?php if(isset($userRelation->id) && $userRelation->grade_id == $grade['id']):?>
                        <option value="<?=$grade['id']?>" selected><?=$grade['name']?></option>
                    <?php else:?>
                        <option value="<?=$grade['id']?>"><?=$grade['name']?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="所在班级：">
        <div class="form-group col-md-8">
            <select name="class_id" id="class_update_ids" class="form-control form-control-sm" required>
                <?php foreach($classes as $class):?>
                    <?php if(isset($userRelation->id) && $userRelation->class_id == $class['id']):?>
                        <option value="<?=$class['id']?>" selected><?=$class['name']?></option>
                    <?php else:?>
                        <option value="<?=$class['id']?>"><?=$class['name']?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="用户角色：">
        <div class="form-group col-md-8">
            <select name="user_type" id="user_type" class="form-control form-control-sm" required>>
                <option value="student" <?php if(isset($userRelation->id) && $userRelation->user_type == "student") echo "selected";?>>学生</option>
                <option value="teacher" <?php if(isset($userRelation->id) && $userRelation->user_type == "teacher") echo "selected";?>>老师</option>
            </select>
        </div>
    </div>
</div>

<div class="_input-group">
    <div class="form-row" data-before="成员姓名：">
        <div class="form-group col-md-8">
            <input type="text" class="form-control form-control-sm" required name="name" id="name" placeholder="成员姓名" value="<?php if(isset($user->id) && $user->id > 0) echo $user->name; ?>" />
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
    <div class="form-row" data-before="密码：">
        <div class="form-group col-md-8">
            <input  class="form-control form-control-sm" type="password"   name="password" id="password" placeholder="密码" />
        </div>
    </div>
</div>
<div class="_input-group">
    <div class="form-row" data-before="确认密码：">
        <div class="form-group col-md-8">
            <input class="form-control form-control-sm" type="password" name="confirm_password" id="confirm_password" placeholder="确认密码" />
        </div>
    </div>
</div>

<div class="_input-group">
    <div class="form-row" data-before="头像：">
        <?php if(isset($user->id)):?>
         <img class="int-userimg" src="<?php if(isset($user->id)) echo $user->getAvatarUrl();?>"/>
        <?php endif;?>
        <div class="custom-file-control">
            <input type="file" name="file">
        </div>
    </div>
</div>
    <!--授权课程 结束-->
<input type="hidden" name="id" value="<?php if(isset($user->id)) echo $user->id;else echo 0;?>">
<input type="hidden" name="school_id" value="<?=$school_id?>">
