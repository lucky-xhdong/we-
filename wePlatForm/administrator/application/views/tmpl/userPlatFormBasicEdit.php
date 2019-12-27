    <div class="basic-box">
        <h4 class="modal-title" >基本信息</h4>
        <div class="text-center basic-info pag-15">
            <ul>
                <li class="col-md-12">
                    <span class="col-md-4">用户角色</span>
                    <div class="col-md-8">
                        <select name="rid" required>
                            <?php foreach($roles as $role):?>
                                <?php if(isset($user->getUserRole()->id) && $user->getUserRole()->id == $role['id']):?>
                                    <option value="<?=$role['id']?>" selected><?=$role['name']?></option>
                                <?php else:?>
                                    <option value="<?=$role['id']?>"><?=$role['name']?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
                    </div>
                </li>
                <li class="col-md-12">
                    <span class="col-md-4">成员姓名</span>
                    <label for="" class="col-md-8"><input type="text" required name="name" placeholder="成员姓名" value="<?=$user->name?>"/></label>
                </li>
                <li class="col-md-12">
                    <span class="col-md-4">账号</span>
                    <label for="" class="col-md-8"><input type="text" required id="username" name="username" value="<?=$user->username?>" placeholder="账号" readonly/></label>
                </li>
                <li class="col-md-12">
                    <span class="col-md-4">密码</span>
                    <label for=""class="col-md-8" ><input type="password"   name="password1" id="password1" placeholder="密码" /></label>
                </li>
                <li class="col-md-12">
                    <span class="col-md-4">确认密码</span>
                    <label for="" class="col-md-8"><input type="password" name="confirm_password1" id="confirm_password1" placeholder="确认密码" /></label>
                </li>
            </ul>
            <ul>
                <li class="col-md-12">
                    <span class="col-md-4">手机号</span>
                    <label for="" class="col-md-8"><input type="text" name="mobile" value="<?=$user->mobile?>"  placeholder="手机号" /></label>
                </li>
                <li class="col-md-12">
                    <span class="col-md-4">E-Mail</span>
                    <label for="" class="col-md-8"><input type="text" name="email" value="<?=$user->email?>"  placeholder="E-Mail" /></label>
                </li>
<!--                <li class="col-md-12">-->
<!--                    <span class="col-md-6">微信号</span>-->
<!--                    <label for="" class="col-md-6"><input type="text" name="weixin" value="--><?//=$user->weixin?><!--"   placeholder="微信号" /></label>-->
<!--                </li>-->
<!--                <li class="col-md-12">-->
<!--                    <span class="col-md-6">QQ号</span>-->
<!--                    <label for="" class="col-md-6"><input type="text" name="qq" value="--><?//=$user->qq?><!--"  placeholder="QQ号" /></label>-->
<!--                </li>-->
                <li class="col-md-12">
                    <span class="col-md-4">头像</span>
                    <div for="" class="col-md-8 user-info">
                        <img class="int-userimg" src="<?=$user->getAvatarUrl()?>" />
                        <lable class="upload-btn">
                            <input type="file" class="img-upload" name="file">
                            <span class="img-upload-btn">修改头像</span>
                        </lable>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--授权课程 开始-->
    <div class="give-source-box">
        <h4 class="modal-title">授权课程</h4>
        <div class="source-list">
            <div class="source-unsel-sel" style="width: 100% !important;">
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
    <!--授权课程 结束-->
    <input type="hidden" name="user_id" value="<?=$user->id?>">
    <input type="hidden" name="course_ids" value="<?=$user->course_ids?>" id="course_ids_edit">