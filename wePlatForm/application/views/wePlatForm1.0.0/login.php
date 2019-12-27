<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页--英语学科发展服务网</title>
    <?=$this->load->view("tmpl/wePlatForm1.0.0/meta")?>
</head>
<body>
<?=$this->load->view("tmpl/wePlatForm1.0.0/header")?>
<div class="login-wrapper">
    <div class="login-container">
        <!--<img src="<?= base_url() ?>media/wePlatForm/images/img-login.png" alt="">-->
        <div class="login-form" data-before="用户登录">
            <form action="<?= anchorurl("login/userLogin") ?>" method="post" id="userform">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="input-group input-group-sm">
                        <input type="text" name="te" class="form-control">
                        <img src="" alt="" class="img-valid">
                    </div>
                    <div class="btn-group"><a href="javascript:;" class="btn-login">登录</a></div>
                </div>
            </form>
        </div>
    </div>
</div>
<?=$this->load->view("tmpl/wePlatForm1.0.0/footer")?>
<script>
    $(function(){
        tabBox({});
        tabBox({box:'.news-carousel',carousel:true,children:'true'});
        fnHover(0);
    })
</script>
</body>
</html>