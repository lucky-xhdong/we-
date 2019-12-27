<!--navbar start-->
<?php $this->load->view('topheader'); ?>
<!--navbar end-->
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.form.js"></script>
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.validate.messages_zh.js"></script>
<script>
    var imagetype = 'editor';
    $(document).ready(function (e) {
        $("#inserimage").click(function () {
            $('#file').click();
            imagetype = 'editor';
        });
        $('#file').on('change', function () {
            $("#imageform").ajaxForm({
                dataType: 'json',
                success: function (data) {
                    if (imagetype == 'editor') {
                        tinyMCE.execCommand('mceInsertContent', true, '<img src="<?=base_url().pictureurl(0)?>' + data.filename + '" data-mce-src="<?=base_url().pictureurl(0)?>' + data.filename + '">');
                    } else {
                        $("#coverimage").html('<img src="<?=base_url().pictureurl(0)?>' + data.filename + '" width="100">');
                        $("#rawname").val(data.rawname);
                        $("#urls").val(data.filename);
                    }
                }
            }).submit();
        });
        $("#cover").click(function () {
            imagetype = 'cover';
            $('#file').click();
        });
    });
</script>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row">
        <!--左厕菜单 start-->
        <?php $this->load->view('aside'); ?>
        <!--左厕菜单 end-->
        <!--右厕内容 start-->
        <section class="main-carema-list">
            <nav class="nav-section">
                <ul>
                    <li><?= anchor('users/index/', '管理员列表') ?></li>
                    <li><?= anchor('users/register', '添加用户', 'class="current"') ?></li>
                </ul>
            </nav>
            <?php if (isset($error) && $error === true): ?>
                <div class="pad-h-d">
                    <span class="hidden-login-tips" style="color:#ff0000">资料不完全或者用户已存在！</span>
                </div>
            <?php endif; ?>
            <div class="clear-13"></div>
            <!--右厕内容 start-->
            <div class="inspect-new-panel">
                <div class="col-sm-12 form-lists">
                    <ul>
                        <?php echo form_open('users/adduser/', 'class="form-register"'); ?>
                        <li data-before="用户名：">
                            <input type="text" class="form-control" required="" placeholder="请输入用户名" name="user_name">
                        </li>
                        <div class="cf-h"></div>
                        <li data-before="密码：">
                            <input type="password" class="form-control" minlength="6" required="" placeholder="请输入密码" name="password">
                        </li>
                        <div class="cf-h"></div>
                        <li data-before="所属部门：">
                            <select name="department_id" class="form-control">
                                <option value="0">全部</option>
                                <?php foreach ($departments as $department): ?>
                                    <?php if (isset($department->id) && $department->id == $course->department_id): ?>
                                        <option value="<?= $department->id ?>" selected>
                                            <?= $department->name ?>
                                        </option>
                                    <?php else: ?>
                                        <option value="<?= $department->id ?>"> <?= $department->name ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </li>
                        <div class="cf-h"></div>
                        <li data-before="角色：">
                            <select name="user_type" class="form-control">
                                <option value="administrator">管理员</option>
                                <option value="register">普通用户</option>
                            </select>
                        </li>
                        <div class="cf-h"></div>
                        <li data-before="封面图：">
                            <div class="dis-table-cell cover-image">
                                <button type="button" class="btn btn-default" id="cover">选取</button>
                                <figure class="dis-c pad-h-b" id="coverimage">
                                    <?php if (isset($customer) && !empty($customer->header_picture_url)): ?>
                                        <?php
                                        $picture = pictureurl(0, $customer->header_picture_url);
                                        ?>
                                        <img src="<?= $picture ?>" width="100">
                                    <?php endif; ?>
                                </figure>
                            </div>
                        </li>
                        <div class="cf-h"></div>
                        <li class="text-b">
                            <input type="hidden" name="header_picture_url" id="urls"
                                   value="<?php if (isset($customer)) echo $customer->urls; ?>">
                            <button class="btn btn-success btn-new-c" type="submit">注册</button>
                        </li>
                        <div class="cf-h"></div>
                        <?php echo form_close(); ?>
                        <?php echo form_open('inspect/addimage', 'name="imageform" id="imageform" enctype="multipart/form-data"'); ?>
                        <input type="file" name="file" id="file" style="display:none">
                        <?php echo form_close(); ?>
                    </ul>
                    <!--右厕内容 end-->
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".form-register").validate();
    })
</script>
</body>
</html>
