<!doctype html>
<html>
<head>
    <?= $this->load->view('meta') ?>
</head>
<body>
    <div class="login-body">
        <!--登录 start-->
        <?php echo form_open('login/auth', 'class="admin-login-form"'); ?>
        <div class="login" data-before="壶口瀑布后台管理系统 ！">
            <?php if (isset($error) && $error === true): ?>
                <p class="hidden-login-tips" style="color:#ff0000; text-align: center; margin-bottom: 15px;">用户名或密码不正确！</p>
            <?php endif; ?>
            <!--登录输入框 start-->
            <div class="input-group">
                <?= form_input('username', set_value('username'), 'id="username" placeholder="用户名" autofocus'); ?>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="密码">
            </div>
            <!--登录输入框 end-->
            <!--登录按钮 start-->
            <div class="btn-group">
                <button type="submit" class="btn-admin-login"> 登录</button>
            </div>
            <!--登录按钮 end-->
        </div>
        <?php echo form_close(); ?>
        <div class="bg-bubbles">
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <!--登录 end-->
    </div>
</body>
</html>
