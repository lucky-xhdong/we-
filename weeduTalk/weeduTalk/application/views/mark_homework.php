<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head lang="en">
    <title>批改作业</title>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?= base_url() ?>media/css/less/mark-homework.css"/>
    <style>
        .limittip {  position: fixed;  text-align: center;  height: 64px;  white-space: nowrap;  padding: 0 20px;  top: 50%;  margin-left: -50px;  margin-top: -32px;  border-radius: 4px;  z-index: 10000;  }
        .limittip:before {  content: '';  position: absolute;  width: 100%;  height: 100%;  border-radius: 4px;  left: 0;  top: 0;  background-color: #000;  opacity: .8;  filter: alpha(opacity=80);  z-index: -1;  }
        .limittip span {  color: #fff;  font-size: 18px;  line-height: 64px;  }
    </style
</head>
<body>
<section class="mark-homework-container">
    <!--操作栏 start-->
    <div class="handle-group">
        <div class="checkbox-group">
            <label class="cg-label cg-label_all">
                <input type="checkbox" id="displayall" checked>
                <span class="txt">显示全部</span>
            </label>
            <label class="cg-label cg-label_unmark">
                <input type="checkbox"  id="displayno">
                <span class="txt">未批阅</span>
            </label>
            <label class="cg-label cg-label_marked">
                <input type="checkbox" id="displayes">
                <span class="txt">已批阅</span>
            </label>
        </div>
        <div class="sort-group">
            <a href="javascript:;" class="txt-sort" id="worksort">时间排序</a>
        </div>
    </div>
    <!--操作栏 end-->
    <div class="mhc-main">
        <!--批阅作业-左 start-->
        <div class="mhc-list">
            <ul id="workList">
                
            </ul>
        </div>
        <!--批阅作业-左 end-->
        <!--批阅作业-右 start-->
        <div class="mhc-detail" id="workContent">

        </div>
        <!--批阅作业-右 end-->
    </div>
</section>
<div id="WorkListTemplate" type="text/x-jquery-tmpl" style="display:none">
    {{each(j,work) works}}
    <li data-id ="${id}" data-indexPath="${j}" class="{{if j == 0}} active {{/if}} {{if hasComment ==1}} marked {{else}} unmark {{/if}} " data-before="{{if hasComment ==1}} 已批阅 {{else}} 未批阅 {{/if}}">
        <div class="mhc-list_title">
            <span class="name" data-after=" (${gradeName}) ">${name}</span>
            <span class="time">${date}</span>
        </div>
        <div class="mhc-list_lesson">
            <span class="name">演讲评价</span>
            <span class="{{if comment_speech_status ==1}} scored {{else}} unscore{{/if}}">{{if comment_speech_status ==1}} ${comment_speech_totalScores} 分 {{else}} 未评分{{/if}}</span>
        </div>
        <div class="mhc-list_lesson">
            <span class="name">作文评价</span>
            <span class="{{if﻿comment_text_status ==1}} scored {{else}} unscore{{/if}}">{{if﻿comment_text_status ==1}}  ${﻿comment_text_totalScores} 分 {{else}} 未评分{{/if}}</span>
        </div>
    </li>
    {{/each}}
</div>
<script type="text/javascript" src="<?=base_url()?>media/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/jquery.showLoading.js"></script>
<link  href="<?=base_url()?>media/css/showloading.css" rel="stylesheet"/>
<script src="<?=base_url()?>media/js/jquery.tmpl.js"></script>
<script>
    var user_id = "<?=$user->id?>";
    var record_id = 0;
    var comment_speech_content_id = 0;
    var comment_speech_performance_id = 0;
    var comment_text_content_id = 0;
    var comment_text_performance_id = 0;
    var record = null;
    var audio = null;
    var postdata= {};
    var is_read_papers = false;
    var time_sort = 1;
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
        function getUserWorkList(){
            if(is_read_papers !== false){
                postdata = {is_read_papers:is_read_papers,time_sort:time_sort};
            }else{
                postdata = {time_sort:time_sort};
            }
            $.ajax({
                type: "GET",
                async: false,
                url: '<?=anchorurl('components/users/getSpeechContentList/'.$user->id)?>',
                dataType:'json',
                data:postdata,
                beforeSend:function(){
                    $("#workList").showLoading();
                },
                success: function (data) {
                    $("#workList").hideLoading();
                    $("#workList").empty();
                    $("#WorkListTemplate").tmpl({works:data}).appendTo('#workList');
                    $(data).each(function(index,element){
                        if(index == 0){
                            record_id = element.id;
                            record = element;
                            getSpeechContentDetail(record_id)
                        }
                    });
                }
            });
        }

        $("body").undelegate('#displayall', 'click').delegate('#displayall', 'click', function () {
            if($(this).is(":checked")){
                is_read_papers = false;
                $("#displayno").removeAttr("checked");
                $("#displayes").removeAttr("checked");
            }
            getUserWorkList();
        });

        $("body").undelegate('#displayes', 'click').delegate('#displayes', 'click', function () {
            if($(this).is(":checked")){
                is_read_papers = 1;
                $("#displayno").removeAttr("checked");
                $("#displayall").removeAttr("checked");
            }else{
                is_read_papers = false;
            }
            getUserWorkList();
        });

        $("body").undelegate('#displayno', 'click').delegate('#displayno', 'click', function () {
            if($(this).is(":checked")){
                is_read_papers = 0;
                $("#displayes").removeAttr("checked");
                $("#displayall").removeAttr("checked");
            }else{
                is_read_papers = false;
            }
            getUserWorkList();
        });

        $("body").undelegate('#worksort', 'click').delegate('#worksort', 'click', function () {
            if($(this).hasClass("reverse")){
                time_sort = 1;
                $(this).removeClass("reverse")
            }else{
                time_sort = 0;
                $(this).addClass("reverse")
            }
            getUserWorkList();
        });



        getUserWorkList();
        $("body #workList").undelegate('li', 'click').delegate('li', 'click', function () {
            var id = $(this).data("id");
            record_id = id;
            $(this).addClass("active").siblings().removeClass("active");
            getSpeechContentDetail(record_id)
        });

        function getSpeechContentDetail(id){
            $.ajax({
                type: "get",
                async: false,
                url: '<?=anchorurl('components/users/getSpeeckWorkDetail/'.$user->id)?>/'+id,
                beforeSend:function(){
                    $("#workContent").showLoading();
                },
                success: function (data) {
                    audio = null;
                    $("#workContent").hideLoading();
                    $("#workContent").html(data);
                }
            });
        }

        $("body").undelegate('#speechContentList li', 'click').delegate('#speechContentList li', 'click', function () {
            $(this).addClass("active").siblings().removeClass("active");
             comment_speech_content_id = $(this).data("id");
        });

        $("body").undelegate('#speechPerformanceList li', 'click').delegate('#speechPerformanceList li', 'click', function () {
            $(this).addClass("active").siblings().removeClass("active");
             comment_speech_performance_id = $(this).data("id");
        });

        $("body").undelegate('#textCommentList li', 'click').delegate('#textCommentList li', 'click', function () {
            $(this).addClass("active").siblings().removeClass("active");
             comment_text_content_id = $(this).data("id");
        });

        $("body").undelegate('#textPerformanceList li', 'click').delegate('#textPerformanceList li', 'click', function () {
            $(this).addClass("active").siblings().removeClass("active");
            comment_text_performance_id =  $(this).data("id");
        });

        $("body").undelegate('#submitWork', 'click').delegate('#submitWork', 'click', function () {
            if(comment_speech_content_id ==0 && comment_speech_performance_id ==0  && comment_text_content_id ==0 && comment_text_performance_id ==0){
                retisterLimitTip("请选择评价内容!");
            }else{
                if((comment_speech_content_id != 0 || comment_speech_performance_id !=0) && (comment_text_performance_id != 0 || comment_text_content_id !=0)) {
                    var data = {
                        type:"all",
                        comment_speech_content_id:comment_speech_content_id,
                        comment_speech_performance_id:comment_speech_performance_id,
                        comment_text_performance_id:comment_text_performance_id,
                        comment_text_content_id:comment_text_content_id
                    }
                }else if(comment_speech_content_id != 0 || comment_speech_performance_id !=0){
                    var data = {
                        type:"speech",
                        comment_speech_content_id:comment_speech_content_id,
                        comment_speech_performance_id:comment_speech_performance_id,
                    }
                }else{
                    var data = {
                        type:"text",
                        comment_text_performance_id:comment_text_performance_id,
                        comment_text_content_id:comment_text_content_id
                    }
                }
                $.ajax({
                    type: "POST",
                    async: false,
                    url: '<?=anchorurl('components/users/addCommentsForSpeech/'.$user->id)?>/'+record_id,
                    dataType:'json',
                    data:data,
                    beforeSend:function(){
                        $("#submitWork").showLoading();
                    },
                    success: function (data) {
                        $("#submitWork").hideLoading();
                        if(data.errcode == 0){
                            retisterLimitTip("评价成功!");
                            getSpeechContentDetail(record_id);
                        }else{
                            retisterLimitTip(data.errdesc);
                        }

                    }
                });
            }
        });

        $("body").undelegate('#playaudio', 'click').delegate('#playaudio', 'click', function () {
            var progress =  $(this).parents(".audio-group").find("#progress-bar");
            var _this = $(this);
            if(audio == null){
                 audio = $(this).parents(".audio-group").find("#workAudio")[0];
                 audio.play();
                $(this).removeClass("btn-play").addClass("btn-pause");
            }else if(audio.paused){
                 audio.play();
                $(this).removeClass("btn-play").addClass("btn-pause");
            }else{
                audio.pause();
                $(this).removeClass("btn-pause").addClass("btn-play");
            }
            audio.addEventListener("timeupdate",function(){
                   var scales=audio.currentTime/audio.duration*100;
                console.log(scales);
                   console.log(audio.currentTime+"----"+audio.duration);
                if(parseInt(scales) >= 100){
                    progress.css("width","0%");
                    _this.removeClass("btn-pause").addClass("btn-play");
                }else{
                    progress.css("width",scales+"%");
                }
            },false);
        });
    });
</script>
</body>
</html>