
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/exam/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/exam/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/exam/css/common.css">
<!--[if lt IE 9]>
<script src="<?=base_url()?>media/exam/js/html5.js"></script>
<script src="<?=base_url()?>media/exam/js/respond.js"></script>
<![endif]-->
<script type="text/javascript" src="<?=base_url()?>media/exam/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/exam/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/exam/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/exam/js/bootstrap-datetimepicker.zh-CN.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/exam/js/testSystemTeacher.js"></script>
<script>
    function retisterLimitTip(str){
        var timer;
        var html = '';
        html += '<div class=""><span>';
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