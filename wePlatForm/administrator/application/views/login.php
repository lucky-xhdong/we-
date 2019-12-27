<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="utf-8" />
    <?php $this->load->view('title'); ?>
    <?php $this->load->view('tmpl/jsBasicLibirary'); ?>
    <link rel="stylesheet" href="<?=base_url()?>media/administrator/css/login.css" type="text/css" />
</head>
<body>
<div class="app app-header-fixed logindiv">
    <div class="logo">
        <img src="<?=base_url()?>media/administrator/images/develop/logintip.png">
    </div>
    <div ng-controller="SigninFormController" ng-init="app.settings.container = false;" style="position: absolute;right: 5%;bottom: 30%">
        <div class="m-b-lg">
            <?php echo form_open('login/userLogin', 'class="admin-login-form"');?>
                <div class="panel panel-default loginline" style="min-height: 0;width: 300px;margin-bottom: 0;border: 0">
                    <div class="panel-heading font-bold">用户登录</div>
                    <div class="panel-body">
                        <form class="bs-example form-horizontal">
                            <div class="row" id="error" style="display: none">
                                <div class="col-lg-12">
                                    <p class="hidden-login-tips error_tips" style="color:#ff0000; text-align: center; margin-bottom: 15px;">

                                    </p>
                                </div>
                            </div>
                            <div class="row login" >
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control username" name="username" placeholder="请输入你的用户名">
                                </div>
                                <div class="col-lg-1">
                                </div>
                            </div>

                            <div class="row login">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control password" name="password" placeholder="密码" >
                                </div>
                                <div class="col-lg-1">
                                </div>
                            </div>

                            <div class="row login">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control code" name="code" placeholder="验证码">
                                        </div>
                                        <div class="col-lg-6">
                                            <img title="点击刷新" src="<?=anchorurl('login/getPicture')?>" onclick="this.src='<?=anchorurl('login/getPicture')?>?'+Math.random();" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                </div>
                            </div>
                            <div class="row login">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <button type="button" class="btn btn-sm btn-info loginbtn">登录</button>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                            <div class="row" style="margin-top: -15px">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <div class="checkbox">
                                        <label class="i-checks">
                                            <input type="checkbox" checked="" ><i class="remember"></i> 记住用户名
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>

                        </form>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
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
                    code:$(".code").val(),
                    refer:'<?=isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ''?>'
                },
                dataType: 'json',
                success: function (msg) {
                    if(msg.error === true){
                         $(".error_tips").html(msg.errordesc);
                         $("#error").show();
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
