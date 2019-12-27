<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2016/12/3
 * Time: 11:25
 * 引入样式
 */
?>
<title>唯佳教育平台</title>
<meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no, email=no" />
<script src="<?=base_url()?>media/wePlatForm/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>media/wePlatForm/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/wePlatForm/css/icomoon.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/wePlatForm/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/administrator/css/bootstrap-datepicker.min.css" type="text/css" />

<script src="<?=base_url()?>media/administrator/js/html5.js"></script>
<script src="<?=base_url()?>media/administrator/js/respond.src.js"></script>
<script src="<?=base_url()?>media/administrator/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url()?>media/js/jquery.tmpl.js"></script>
<!--<script src="--><?//=base_url()?><!--media/js/jquery.validate.js"></script>-->
<!--<script src="--><?//=base_url()?><!--media/js/jquery.validate.messages_zh.js"></script>-->
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
    $(document).ready(function () {
        $('#nav-tabs a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        })
        $(".nav-item .icon-menu-right").on('click', function () {
            if ($(this).parents('.nav-item').find(".nav-item__sub").hasClass('hide')) {
                $(this).parents('.nav-item').find(".nav-item__sub").removeClass('hide');
            } else {
                $(this).parents('.nav-item').find(".nav-item__sub").addClass('hide');
            }
        });

        var dates = $.fn.datepicker.dates = {
            "en": {
                days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
                months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                today: "Today",
                clear: "Clear"
            },
            "cn": {
                days: ["周日", "周一", "周二", "周三", "周四", "周五", "周六", "周日"],
                daysShort: ["日", "一", "二", "三", "四", "五", "六", "七"],
                daysMin: ["日", "一", "二", "三", "四", "五", "六", "七"],
                months: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
                monthsShort: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
                today: "今天",
                clear: "清除"
            }
        };
        console.log( $.fn.datepicker.dates);
        var defaults = $.fn.datepicker.defaults = {
            autoclose: false,
            beforeShowDay: $.noop,
            calendarWeeks: false,
            clearBtn: false,
            daysOfWeekDisabled: [],
            endDate: Infinity,
            forceParse: true,
            format: 'yyyy-mm-dd',
            keyboardNavigation: true,
            language: 'cn',
            minViewMode: 0,
            multidate: false,
            multidateSeparator: ',',
            orientation: "auto",
            rtl: false,
            startDate: -Infinity,
            startView: 0,
            todayBtn: false,
            todayHighlight: false,
            weekStart: 0
        };
    });

</script>


