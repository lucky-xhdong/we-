<!--navbar start-->
<?= $this->load->view('topheader'); ?>
<!--navbar end-->
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.form.js"></script>
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.validate.messages_zh.js"></script>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row">
        <!--左厕菜单 start-->
        <?= $this->load->view('aside'); ?>
        <!--左厕菜单 end-->
        <!--右厕内容 start-->
        <section class="main-carema-list">
            <nav class="nav-section">
                <ul>
                    <li><?= anchor('accountsettings/index/', '密码管理', 'class="current"') ?></li>
                    <li><?= anchor('accountsettings/changeavatar/', '更改头像') ?></li>
                </ul>
            </nav>
            <?php if (isset($error) && $error === true): ?>
                <div class="pad-h-d">
                    <span class="hidden-login-tips" style="color:#ff0000">旧密码输入错误！</span>
                </div>
            <?php elseif (isset($error) && $error === false): ?>
                <div class="pad-h-d">
                    <span class="hidden-login-tips" style="color:#3c3">修改成功！</span>
                </div>
            <?php endif; ?>
            <div class="inspect-new-panel">
                <div class="col-sm-12 form-lists">
                    <!--注册输入框 start-->
                    <ul>
                        <?php echo form_open('accountsettings/accountsetpwd/', 'class="form-account"'); ?>
                        <li data-before="用户名：">
                            <span class="form-control"><?= $this->session->userdata('name') ?></span>
                        </li>
                        <div class="cf-h"></div>
                        <li data-before="旧密码：">
                            <input type="password" class="form-control" minlength="6" required="" placeholder="请输入旧密码" name="password">
                        </li>
                        <div class="cf-h"></div>
                        <li data-before="新密码：">
                            <input type="password" class="form-control" minlength="6" required="" equalTo="password" placeholder="请输入新密码" name="password2">
                        </li>
                        <div class="cf-h"></div>
                        <div class="text-b">
                            <button class="btn btn-success btn-new-c" type="submit">提交</button>
                        </div>
                        <div class="cf-h"></div>
                        <?php echo form_close(); ?>
                    </ul>
                    <!--注册输入框 end-->
                </div>
            </div>
            <!--右厕内容 end-->
        </section>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".form-account").validate();
    })
</script>
</body>
</html>
