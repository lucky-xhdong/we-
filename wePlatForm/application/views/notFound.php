<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
    <?=$this->load->view("tmpl/meta")?>
</head>
<body>
<?=$this->load->view("tmpl/header")?>
<div class="wrapper bg-e">
    <div class="container">
        <div class="common-error-wrapper">
            <div class="common-error-container">
                <div class="common-error__tip">
                    <p class="tip-txt">再联系不上我就要<a href="<?=anchorurl("")?>" class="tip-link">返回地球</a></p>
                </div>
                <div class="common-error__img">
                    <img src="<?=base_url()?>media/wePlatForm/images/404.png" alt="404">
                </div>
                <div class="common-error__txt">
                    <p class="txt">你现在进入地球无线电盲区，与服务器失去了联系。</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view("tmpl/foot")?>
</body>
</html>