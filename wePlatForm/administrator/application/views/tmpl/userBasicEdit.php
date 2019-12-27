    <div class="basic-box">
        <h4 class="modal-title" >基本信息</h4>
        <div class="text-center basic-info pag-15">
            <ul>
                <li class="col-md-12">
                    <span class="col-md-6">所在年级</span>
                    <div class="col-md-6">
                        <select name="grade_id" id="grade_update_ids" required>
                            <?php foreach($grades as $grade):?>
                                <?php if(isset($userRelation->id) && $userRelation->grade_id == $grade['id']):?>
                                    <option value="<?=$grade['id']?>" selected><?=$grade['name']?></option>
                                <?php else:?>
                                    <option value="<?=$grade['id']?>"><?=$grade['name']?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
                    </div>
                </li>
                <li class="col-md-12">
                    <span class="col-md-6">所在班级</span>
                    <div class="col-md-6">
                        <select name="class_id" id="class_update_ids" required>
                            <?php foreach($classes as $class):?>
                                <?php if(isset($userRelation->id) && $userRelation->class_id == $class['id']):?>
                                    <option value="<?=$class['id']?>" selected><?=$class['name']?></option>
                                <?php else:?>
                                    <option value="<?=$class['id']?>"><?=$class['name']?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
                    </div>
                </li>
            </ul>
            <ul>
                <li class="col-md-12">
                    <span class="col-md-6">用户角色</span>
                    <div class="col-md-6">
                        <select name="user_type">
                            <option value="student" <?php if(isset($userRelation->id) && $userRelation->user_type == "student") echo "selected";?>>学生</option>
                            <option value="teacher" <?php if(isset($userRelation->id) && $userRelation->user_type == "teacher") echo "selected";?>>老师</option>
                        </select>
                    </div>
                </li>

                <li class="col-md-12">
                    <span class="col-md-6">成员姓名</span>
                    <label for="" class="col-md-6"><input type="text" required name="name" placeholder="成员姓名" value="<?=$user->name?>"/></label>
                </li>
                <li class="col-md-12">
                    <span class="col-md-6">账号</span>
                    <label for="" class="col-md-6"><input type="text" required id="username" name="username" value="<?=$user->username?>" placeholder="账号" readonly/></label>
                </li>
                <li class="col-md-12">
                    <span class="col-md-6">密码</span>
                    <label for=""class="col-md-6" ><input type="password"   name="password1" id="password1" placeholder="密码" /></label>
                </li>
                <li class="col-md-12">
                    <span class="col-md-6">确认密码</span>
                    <label for="" class="col-md-6"><input type="password" name="confirm_password1" id="confirm_password1" placeholder="确认密码" /></label>
                </li>
            </ul>
            <ul>
                <li class="col-md-12">
                    <span class="col-md-6">手机号</span>
                    <label for="" class="col-md-6"><input type="text" name="mobile" value="<?=$user->mobile?>"  placeholder="手机号" /></label>
                </li>
                <li class="col-md-12">
                    <span class="col-md-6">E-Mail</span>
                    <label for="" class="col-md-6"><input type="text" name="email" value="<?=$user->email?>"  placeholder="E-Mail" /></label>
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
                    <span class="col-md-6">头像</span>
                    <div for="" class="col-md-6 user-info">
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
    <input type="hidden" name="school_id" value="<?=$school_id1?>">
    <input type="hidden" name="course_ids" value="<?=$user->course_ids?>" id="course_ids_edit">