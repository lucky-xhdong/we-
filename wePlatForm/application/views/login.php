<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>英语学科发展服务网--登陆</title>
    <?= $this->load->view("tmpl/meta") ?>
    <?= $this->load->view("tmpl/layer") ?>
</head>
<body>
<?= $this->load->view("tmpl/header") ?>
<div class="wrapper login-wrapper">
    <div class="login-bg"></div>
    <div class="login-box">
        <img src="<?= base_url() ?>media/wePlatForm/images/img-login.png" alt="">
        <div class="wrp-con fn-r">
            <form action="<?= anchorurl("login/userLogin") ?>" method="post" id="userform">
                <div class="login-con">
                    <h6>账户登陆</h6>
                    <div class="row" id="error" style="display: none">
                        <div class="col-lg-12">
                            <p class="hidden-login-tips error_tips" style="color:#ff0000; text-align: center; margin-bottom: 15px;">

                            </p>
                        </div>
                    </div>
                    <div class="login-name">
                        <i class="icon icon-username"></i>
                        <input type="text" name="username">
                    </div>
                    <div class="login-pas">
                        <i class="icon icon-password"></i>
                        <input type="password" name="password">
                        <a href="" class="forgot-pas fn-r">忘记密码</a>
                    </div>

                    <div class="login-btn" id="submit">登录</div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->load->view("tmpl/foot") ?>
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.form.js"></script>
<script>
    $(function () {
        tabBox({});
        $('#submit').on('click', function () {

            $("#userform").ajaxForm({
                dataType: 'json',
                success: function (data) {
                    if (data.errcode == 0) {
                        window.location.href = "studentReport";
                    } else {
                        $(".error_tips").html(data.errordesc);
                        $("#error").show();
                    }
                }
            }).submit();
        });

        $(document).keypress(function(e) {
            // 回车键事件

            if(e.which == 13) {
                $("#submit").click();
            }
        });
    });
</script>
</body>
</html>