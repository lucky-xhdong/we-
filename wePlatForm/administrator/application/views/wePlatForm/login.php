<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="utf-8" />
    <?php $this->load->view('wePlatForm/tmpl/title'); ?>
    <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
    <?php $this->load->view('wePlatForm/meta'); ?>
</head>
<body>
<div class="login-wrapper">
    <?=$this->load->view("wePlatForm/tmpl/header")?>
    <div class="login-container">
        <!--登录框 start-->
        <div class="login-form-wrapper">
            <div class="logo-wrapper">
                <span class="txt-logo">服务平台登录</span>
            </div>
            <?php echo form_open('login/userLogin', 'class="login-form"');?>
            <p class="error_tips"></p>
            <div class="form-group">
                <i class="icon icon-username"></i>
                <input type="text" class="form-control username"  name="username" id="inputEmail"  placeholder="用户名">
            </div>
            <div class="form-group">
                <i class="icon icon-password"></i>
                <input type="password" class="form-control password" id="password" name="password" placeholder="密码">
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-validcode code" name="code" id="code" placeholder="验证码">
                </div>
                <div class="col-sm-6">
                    <img title="点击刷新" style="width: 108px;" src="<?=anchorurl('login/getPicture')?>" onclick="this.src='<?=anchorurl('login/getPicture')?>?'+Math.random();" />
                </div>
            </div>
<!--            <div class="form-check">-->
<!--                <label class="form-check-label" for="remberPwd"><input type="checkbox" class="form-check-input" id="remberPwd">记住密码</label>-->
<!--                <a href="javascript:;" class="a-forget-pwd">忘记密码？</a>-->
<!--            </div>-->
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-primary btn-login-submit loginbtn">登&emsp;录</button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!--登录框 end-->
    </div>
</div>
<?=$this->load->view("wePlatForm/tmpl/footer")?>
<script>
    $(document).ready(function(){
        $(".loginbtn").click(function(){
            $.ajax({
                type: "POST",
                async: false,
                url: '<?=anchorurl('login/userLogin')?>',
                data: {
                    username: $(".username").val(),
                    password:$(".password").val(),
                    "code":$(".code").val(),
                    refer:'<?=isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ''?>'
                },
                dataType: 'json',
                success: function (msg) {
                    if(msg.error === true){
                        $(".error_tips").html(msg.errordesc).show();
                    }else{
                        window.location.href = msg.redirect_url;
                    }
                }
            });
        });

        $(document).keypress(function(e) {
            // 回车键事件

            if(e.which == 13) {
                $(".loginbtn").click();
            }
        });
    });
</script>
</body>
</html>
