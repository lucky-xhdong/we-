<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2016/12/3
 * Time: 11:25
 * 引入样式
 */
?>
<title>豌豆英语--后台管理系统</title>
<meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no, email=no" />
<link rel="stylesheet" href="<?=base_url()?>media/administrator/css/bootstrap-datepicker.min.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/administrator/libs/assets/animate.css/animate.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/administrator/libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/administrator/libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/administrator/libs/jquery/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/administrator/libs/jquery/bootstrap/dist/css/bootstrap-datetimepicker.min.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/administrator/css/font.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/administrator/css/app.css" type="text/css" />
<script src="<?=base_url()?>media/administrator/js/html5.js"></script>
<script src="<?=base_url()?>media/administrator/js/respond.src.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?=base_url()?>media/administrator/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url()?>media/js/jquery.tmpl.js"></script>
<script>
    function retisterLimitTip(str){
        var timer;
        var html = '';
        html += '<div class="limittip"><span>';
        html += str;
        html += '</span></div>';
        clearTimeout(timer);
        if($(".limittip").length == 0) {
            $(document.body).append(html);
            var width = $(".limittip").outerWidth();
            var left = ($(window).width() - $(".limittip").outerWidth()) / 2;
            $(".limittip").css({
                width: width + 'px',
                marginLeft: left + 'px'
            })
        }
        timer = setTimeout(function(){
            $(".limittip").remove();
        }, 1000)
    }
</script>


