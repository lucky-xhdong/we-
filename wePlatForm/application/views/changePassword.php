<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>英语学科发展服务网</title>
    <?= $this->load->view("tmpl/meta") ?>
    <?= $this->load->view("tmpl/layer") ?>
</head>
<body>
<?= $this->load->view("tmpl/header") ?>
<div class="wrapper login-wrapper">
    <div class="login-bg"></div>
    <div class="login-box">
        <div class="wrp-con fn">
            <form action="<?= anchorurl("users/resetPassword") ?>" method="post" id="userform">
                <div class="changePwd-con">
                    <h6>修改密码</h6>
                    <div class="row" id="error" style="display: none">
                        <div class="col-lg-12">
                            <p class="hidden-login-tips error_tips" style="color:#ff0000; text-align: center; margin-bottom: 15px;">

                            </p>
                        </div>
                    </div>
                    <div class="login-name" data-before="原密码：">
                        <input type="password" name="oldpassword">
                    </div>
                    <div class="login-pas" data-before="新密码：">
                        <input type="password" name="password">
                        <a href="" class="forgot-pas fn-r">忘记密码</a>
                    </div>

                    <div class="login-btn" id="submit">更新密码</div>
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
                        window.location.href = "<?=anchorurl("studentReport")?>";
                    } else {
                        $(".error_tips").html(data.errdesc);
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