<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="UTF-8">
    <title>北京唯佳未来教育科技有限公司--在线考试系统</title>
    <?=$this->load->view("exam/tmpl/meta")?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/exam/css/testSystemTeacher.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/exam/css/common.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/exam/css/testSystem.css">
    <?php $this->load->view('tmpl/jqueryvalidate'); ?>
</head>
<style>
    .listen_item{
        cursor: pointer;
    }
    /*保存成功之后的弹窗提示*/
    .limittip {  position: fixed;  text-align: center;  height: 64px;  white-space: nowrap;  padding: 0 20px;  top: 50%;  margin-left: -50px;  margin-top: -32px;  border-radius: 4px;  z-index: 10000;  }
    .limittip:before {  content: '';  position: absolute;  width: 100%;  height: 100%;  border-radius: 4px;  left: 0;  top: 0;  background-color: #000;  opacity: .8;  filter: alpha(opacity=80);  z-index: -1;  }
    .limittip span {  color: #fff;  font-size: 18px;  line-height: 64px;  }
</style>
<body>
<?php if($testrelationship && time() >= strtotime($testrelationship->datetime) && time() <= strtotime($testrelationship->endtime) &&  $testrelationship->status != 2):?>
<input type="hidden" id="model_id" />
<input type="hidden" id="model_type" />
<div class="header clear">
    <div class="fn-l">
        <span class="model_title_name">Part III 	Reading Comprehension </span>
    </div>
    <div class="fn-r">
        <div class="timing-con">
            <div class="surplus-times">剩余时间：<i></i>	</div>
            <div class="count-times">总共时间：<i></i>	</div>
        </div>
    </div>
</div>
<div class="wrapper mgt-102">
    <div class="reading_compre">
        <div class="reading_compre_question">

        </div>
        <div class="bor-bg"></div>
        <div class="write-btn text-right mgt-20">
            <button class="btn sub-btn bg-17b save_ques_model">提交</button>
            <!--                <span class="finish-error">题目全部回答完后方可交卷</span>-->
            <!--                <button class="btn sub-btn bg-17b">提交</button>-->
        </div>
    </div>
</div>
<!-- 选词填空model -->
<div class="modal fade" style="overflow: auto"  id="choose-exam-box" tabindex="-2" role="dialog" >
    <div class="modal-dialog modal-nor choose-exam-dialog">
        <div class="modal-content">
            <div class="modal-header pag-15 borb-e5">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">选词填空</h4>
            </div>
            <div class="modal-body pag-15">
                <div class="clearfix chooseExam-header">
                    <div class="col-sm-3 search-keyword">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="chooseExam-cont">
                    <div class="chooseExam-cont-option-one">

                    </div>
                </div>
            </div>
            <div class="modal-footer text-center modal-footer-btn">
                <button type="button" class="btn chooseExam-save modal-btn-save-write">保存</button>
            </div>
        </div>
    </div>
</div>
<!-- 段落匹配model -->
<div class="modal fade" style="overflow: auto"  id="choose-exam-box-duan" tabindex="-2" role="dialog" >
    <div class="modal-dialog modal-nor choose-exam-dialog">
        <div class="modal-content">
            <div class="modal-header pag-15 borb-e5">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">段落匹配</h4>
            </div>
            <div class="modal-body pag-15">
                <div class="clearfix chooseExam-header">
                    <div class="col-sm-3 search-keyword">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="chooseExam-cont">
                    <div class="chooseExam-cont-option-one duanluo">

                    </div>
                </div>
            </div>
            <div class="modal-footer text-center modal-footer-btn">
                <button type="button" class="btn chooseExam-save modal-btn-save-duan">保存</button>
            </div>
        </div>
    </div>
</div>
<!-- 提示model -->
<div class="modal fade warning-modal" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                   温馨提示
                </h4>
            </div>
            <div class="modal-body">
               考试开始的时候您需要进入全屏状态专心答题!谢谢您的支持与理解.
            </div>
            <div class="modal-footer">
                <button type="button" id="view-cancel" class="btn btn-danger">
                    未准备好
                </button>
                <button type="button" id="view-fullscreen" class="btn btn-sure" data-dismiss="modal">
                    开始答题
                </button>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade warning-modal" id="audioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        温馨提示
                    </h4>
                </div>
                <div class="modal-body">
                    由于浏览器限制音频自动播放,请点击按钮播放音频.
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-sure" id="playButton">
                        播放录音
                    </button>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="<?=base_url()?>media/exam/js/testSystem.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/exam/js/audio.min.js"></script>
<script>
    $(function () {
        //禁止刷新
//        $(window).bind('beforeunload',function(){
//            if ( /Firefox[\/\s](\d+)/.test(navigator.userAgent) && new Number(RegExp.$1) >= 4) {
//                if(confirm('您的内容尚未保存，确定要进行刷新吗？')){
//                    history.go();
//                } else{
//                    window.setTimeout(function() { window.stop(); }, 1);
//                }
//            } else{
//                return '您的内容尚未保存，确定要离开本页吗？';
//            }
//        });

        var time1;
        var audio_arr=new Array()
        $("#view-cancel").click(function(){
            window.location.href="<?=anchorurl("home/")?>";
        });
        var screeNum=0;
        $("#alertModal").modal();
        var viewFullScreen = document.getElementById("view-fullscreen");
        if (viewFullScreen) {
            viewFullScreen.addEventListener("click", function () {
                var docElm = document.documentElement;
                if (docElm.requestFullscreen) {
                    docElm.requestFullscreen();
                }
                else if (docElm.msRequestFullscreen) {
                    docElm = document.body; //overwrite the element (for IE)
                    docElm.msRequestFullscreen();
                }
                else if (docElm.mozRequestFullScreen) {
                    docElm.mozRequestFullScreen();
                }
                else if (docElm.webkitRequestFullScreen) {
                    docElm.webkitRequestFullScreen();
                }
            }, false);
        }
        document.addEventListener("fullscreenchange", function(e) {
            screeNum++;
            console.log("退出全屏1");
            if(screeNum%2==0){
                $("#alertModal").modal();
                console.log("退出全屏");
                $("#alertModal").modal();
            }
        });
        document.addEventListener("mozfullscreenchange", function(e) {
            screeNum++;
            if(screeNum%2==0){
                $("#alertModal").modal();
                console.log("退出全屏");
                $("#alertModal").modal();
            }
        });
        document.addEventListener("webkitfullscreenchange", function(e) {
            screeNum++;
            if(screeNum%2==0){
                $("#alertModal").modal();
                console.log("退出全屏");
                $("#alertModal").modal();
            }
        });
        document.addEventListener("msfullscreenchange", function(e) {
            screeNum++;
            if(screeNum%2==0){
                $("#alertModal").modal();
                console.log("退出全屏");
                $("#alertModal").modal();
            }
        });
//      禁止键盘后退
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });
        var ques = $(".chooseExam-cont-option-one");
        var duan = $(".duanluo");
        $('body').delegate('.banked-selected i','click',function () {
            $(this).parents('.banked-selected').find('i').removeAttr('id')
            $(this).attr('id','0');
            ques.empty();
            var ques_item = "";
            ques_item ="<ul class='banked-cloze-list clear' style='width: 600px;'>"
            $(this).parents('.part-item-con').find('ul li').each(function () {
                ques_item += "<li class='li-selected' style='cursor: pointer' data-id='"+$(this).data('id')+"'>"+$(this).text()+"</li>"
            });
            ques_item+= "</ul>"
            ques.append(ques_item);
            $('#choose-exam-box').modal('show');
        });
        //段落匹配选择答案点击
        $('body').delegate('.click-ans-btn','click',function () {
            $('.reading-con-list').find('.click-ans-btn').removeAttr('id')
            $(this).attr('id','0');
            ques.empty();
            var ques_item = "";
            ques_item ="<ul class='banked-cloze-list clear' style='width: 600px;'>"
            $(this).parents('.part-item-con').find('.reading-com-box').find('ul li').each(function () {
                ques_item += "<li class='li-selected' style='cursor: pointer' data-id='"+$(this).data('arr')+"'>"+$(this).text()+"</li>"
            });
            ques_item+= "</ul>"
            duan.append(ques_item);
            $('#choose-exam-box-duan').modal('show');
        });
        //音频播放
//        $("body").delegate('.audio_name_write_listen','click',function () {
//            $('body audio').remove();
//            var audio = document.createElement("audio");
//            audio.id='audio1';
//            audio.src = $(this).data('audio');
//            var duration = $(this).data('duration');
//            duration = duration.split('-');
//            var start_time="",end_time="";
//            if(duration[0].split(':')[0]=='00'){
//                start_time = duration[0].split(':')[1];
//            }else{
//                start_time = duration[0].split(':')[0]*60+duration[0].split(':')[1];
//            }
//
//            if(duration[1].split(':')[0]=='00'){
//                end_time = duration[1].split(':')[1];
//            }else{
//                end_time = duration[1].split(':')[0]*60+duration[0].split(':')[1];
//            }
//            console.log(start_time+'==='+end_time);
//            audio.currentTime = start_time;
//            document.body.appendChild(audio);
//            audio.load();
//            audio.addEventListener("canplay", function () {
//                audio.play();
//            }, false);
//            audio.addEventListener("loadedmetadata", function(){
//                var tol = this.duration;//获取总时长
//            });
//            var timer = window.setInterval(function() {
//                console.log(audio.currentTime)
//                if(audio.currentTime>end_time){
//                    audio.pause();
//                    clearInterval(timer);
//                }
//            },1000)
//        });
//
        $('body').delegate('.chooseExam-cont-option-one .li-selected','click',function () {
            $(this).removeClass();
            $(this).siblings('li').addClass('li-selected');
        });

//        段落匹配model关闭
        $(".modal-btn-save-duan").on('click',function () {
            $("#choose-exam-box-duan").modal('hide');
            $("ul").find('.click-ans-btn').each(function () {
                if($(this).attr('id')==0){
                    $(this).parent().addClass('click-ans-con');
                    $(this).text($(".duanluo").find("li[class='']").data('id'))
                }
            })
        });

        $(".modal-btn-save-write").on('click',function () {
           $("#choose-exam-box").modal('hide');
           $(".banked-selected").find('i').each(function () {
            if($(this).attr('id')==0){
                $(this).prev().addClass('bg-17b');
                $(this).prev().text($("#choose-exam-box").find("li[class='']").text());
                $(this).prev().attr('data-id',$("#choose-exam-box").find("li[class='']").data('id'));
            }
           })
            $(".banked-cloze-list").find('li').each(function () {
                if($(this).data('id')==$("#choose-exam-box").find("li[class='']").data('id')){
                    $(this).addClass('li-selected');
                }
            })
        });

        function chooseItem(){  //复选框与单选框选中时添加的状态
            $(".choose-type .choose-num-item").each(function(ind){
                var eleInput = $(this).find('input'),
                    eleSp = $(this).find('span');
                $(eleInput).click(function(e){
                    var eletype = $(this).attr('type');
                    var eleSpan = $(this).parent('label').next('span');
                    if(eletype === 'radio'){
                        eleSp.removeClass('on');
                        eleSpan.addClass('on');
                    }else if(eletype === 'checkbox'){
                        if($(this).is(':checked')){
                            eleSpan.addClass('on');
                        }else{
                            eleSpan.removeClass('on');
                        }
                    }
                })
            });
        }

        $('body').delegate('.listen_item','click',function () {
            $(this).parents('.choose-num-item').find('.listen_item').removeClass('on');
            $(this).addClass('on');
        });
        var paper_id = "",pageNum=0,group_id="",relationship_id="",serction_count=0;
        paper_id = "<?=$paper_id?>";
        group_id = "<?=$group_id?>";
        relationship_id = "<?=$relationship_id?>";
        getNewData();
        function getNewData(){
            ajaxQuesList({paper_id:paper_id,count:pageNum,serction_count:serction_count})
        }

        $(".save_ques_model").on('click',function () {
            var state = true;
            $(".choose-num-item").each(function () {
                if(typeof ($(this).find('input:radio:checked').val())=="undefined"){
                    state = false;
                }
            });
            if(state){
                save_answer();
            }else {
                alert('题未答完');
            }
        });

        function save_answer() {
            var model_id = $("#model_id").val();
            var model_type = $("#model_type").val();
            var json = new Object();
            json.relationship_id = relationship_id;
            json.paper_id = paper_id;
            json.group_id = group_id;
            json.model_id =model_id;
            json.model_type =model_type;
            var key = "",arr="";
            if(model_type==1){
                $(".choose-num-item").each(function () {
                    key += "{ques_id:" +"\""+ $(this).data("quesid")+"\""+",";
                    key += "ques_content:"+"\"" + $(this).parents('.part-item').data('quesconid')+"\""+ ",";
                    $(this).find("input:radio:checked").each(function (index) {
                        key += "item_id:"+"\"" + $(this).val()+"\""+ ",";
                    })
                    key = key.substring(0,key.length-1);
                    key += "}"
                    key += ','
                });
                key = key.substr(0, key.length - 1);
                arr= eval('([' + key + '])');
            }else if(model_type==2){
                $(".part-item").each(function () {
                    key += "{ques_content:"+"\"" + $(this).data('quesconid')+"\""+ ",";
                    key += "ques_id:" +"\""+ $(this).find(".duanluo_que").data('quesid')+"\""+",";
                    $(this).find(".reading-con-list li").each(function (index) {
                        key += "item_id"+index+":"+"\"" + $(this).data('id')+"\""+ ",";
                        key += "item_num"+index+":"+"\"" + ($(this).find('span[class="click-ans-btn"]').text()).substring(1,2)+"\""+ ",";
                    })
                    key = key.substring(0,key.length-1);
                    key += "}"
                    key += ','
                });
                key = key.substr(0, key.length - 1);
                arr= eval('([' + key + '])');
            }else if(model_type==3){    //翻译模块
                $(".part-item").each(function () {
                    key += "{ques_content:"+"\"" + $(this).data('quesconid')+"\""+ ",";
                    key += "ques_id:" +"\""+ $(this).find(".part-item-con").data("quesid")+"\""+",";
                    key += "answer_con:" +"\""+ $(this).find("textarea").val().replace(/[\r\n]/g,"")+"\""+",";
                    key = key.substring(0,key.length-1);
                    key += "}"
                    key += ','
                });
                key = key.substr(0, key.length - 1);
                arr= eval('([' + key + '])');
            }else if(model_type==4||model_type==5){
                $(".choose-num-item").each(function () {
                    key += "{ques_id:" +"\""+ $(this).data("quesid")+"\""+",";
                    key += "ques_content:"+"\"" + $(this).parents('.part-item').data('quesconid')+"\""+ ",";
                    $(this).find("input:radio:checked").each(function (index) {
                        key += "item_id:"+"\"" + $(this).val()+"\""+ ",";
                    })
                    key = key.substring(0,key.length-1);
                    key += "}"
                    key += ','
                });
                key = key.substr(0, key.length - 1);
                arr= eval('([' + key + '])');
            }else if(model_type==6){    //写作模块
                $(".part-item").each(function () {
                    key += "{ques_content:"+"\"" + $(this).data('quesconid')+"\""+ ",";
                    key += "answer_con:" +"\""+ $(this).find("textarea").val().replace(/[\r\n]/g,"")+"\""+",";
                    key = key.substring(0,key.length-1);
                    key += "}"
                    key += ','
                });
                key = key.substr(0, key.length - 1);
                arr= eval('([' + key + '])');
            }else if(model_type==7){
                $(".part-item-con").each(function () {
                    key += "{ques_content:"+"\"" + $(this).data('quesconid')+"\""+ ",";
                    key += "ques_id:" +"\""+ $(this).find(".banked-selected").data('quesid')+"\""+",";
                    $(this).find("span[class='bg-17b']").each(function (index) {
                        key += "item_id"+index+":"+"\"" + $(this).data('id')+"\""+ ",";
                        key += "item_num"+index+":"+"\"" + $(this).data('num')+"\""+ ",";
                    })
                    key = key.substring(0,key.length-1);
                    key += "}"
                    key += ','
                });
                key = key.substr(0, key.length - 1);
                arr= eval('([' + key + '])');
            }
            json.question =arr;
            console.log(JSON.stringify(json));
            var data = JSON.stringify(json);
            //发送异步请求传输问题
            $.ajax({
                url: '<?=anchorurl('student/uploadAnswer')?>',
                type: "POST",
                async: false,
                data: {
                    answer: data,
                },
                beforeSend: function(){
                    stopAudio();
                },
                success: function (msg) {
                    console.log(msg);
                    pageNum++;
                    getNewData();
                }
            });
        }
        /**
         * 获取该试卷module
         */
        function ajaxQuesList($obj){
            console.log($obj);

            audio_arr = new Array();
            window.clearInterval(time1);
            var question = $(".reading_compre_question")
            var choose_ques = $(".chooseExam-cont-option-one");
            $.ajax({
                type: "GET",
                url: "<?=anchorurl('student/getPart')?>",
                dataType:"json",
                data: $obj,
                success:function (msg) {
                    chooseItem()
                    var data = msg.data;
                    var serction = msg.serction;
                    console.log(data);
                    if(msg=='0'){
                        var r = confirm("试题已全部完成，确认要交卷吗？");
                        if(r==true){
                            window.location.href="<?=anchorurl('student/exam_com/'.$relationship_id)?>"
                        }else{
                            alert("You pressed Cancel!");
                        }
                    }else {
                        var ques_content ="",intDiff=parseInt(data.model_time)*60;
                        timer(intDiff);
                        $("#model_id").val(data.id);
                        $("#model_type").val(data.type);
                        $(".model_title_name").text(data.title);
                        if(data.model_time>10){
                        $(".count-times i").text(data.model_time+":00");
                        }else{
                        $(".count-times i").text("0"+data.model_time+":00");
                        }
                        if(data.type==1){
                            var s="A";
                            $(data.serction).each(function(i,ele) {
                            ques_content += "<h2 class='part-section' data-section='" + ele.section_name + "'></h2>";
                            ques_content += "<div class='part-directions' data-dir='directions' style='margin: 0 80px;margin-bottom: 10px;'>" + ele.answer_guide + "</div>"
                            $(data.modelQues).each(function(index,element) {
                                if (ele.id == element.section_id) {
                                    var ques = "";
                                    $(element.ques_content[0].ques_ques).each(function (index, problem) {
                                        var ques_problem = "";
                                        ques_problem += "<h6 class='questions-num' style='margin-left: 28px;'>" + problem.title + "</h6>";
                                        var ques_item = "<div class='choose-num-item' data-quesid='" + problem.id + "'>"
                                            + "<ul>";
                                        $(problem.ques_ques_item).each(function (index, item) {
                                            ques_item +=
                                                "<li>"
                                                + "<label>"
                                                + "<input type='radio' name='" + problem.id + "' value='" + item.id + "'><i></i>"
                                                + "</label>"
                                                + "<span>" + item.title + "</span>"
                                                + "</li>"
                                        })
                                        ques_item += "</ul>"
                                            + "</div>"
                                        ques += ques_problem + ques_item;
                                    });
                                    ques_content +=
                                        "<div class='part-item' data-quesconid='" + element.ques_content[0].id + "'>"
                                        + "<div class='part-item-con'>"
//                                        + "<div class='part-directions' data-dir='directions'>" + ele.answer_guide + "</div>"
                                        + "<div class='bg-f1f passage-con mgb-20'><p>" + element.ques_content[0].content + "</p></div>"
                                        + "<div class='choose-num-box choose-type data-arr'>"
                                        + ques
                                        + "</div>"
                                        + "</div>"
                                        + "</div>"
                                        }
                                    });
                                s = String.fromCharCode(s.charCodeAt(0) + 1);
                                })
                        }else if(data.type==2){
                            $(data.serction).each(function(i,ele) {


                            $(data.modelQues).each(function(index,element) {
                                var ques="",ques_item="",s="A";
                                $(element.ques_content[0].ques_ques).each(function(index,problem){
                                    ques="<span class='duanluo_que' data-quesid='"+problem.id+"'></span>"
                                    $.each(problem.title.split("==="), function(i,val){
                                        ques += "<li data-arr='["+s+"]'>"+val+"</li>"
                                        s = String.fromCharCode(s.charCodeAt(0) + 1);
                                    });
                                    $(problem.ques_ques_item).each(function (idx,item) {
                                        ques_item +=
                                        "<li data-id='"+item.id+"'>"
                                        + item.title
                                        + "<div>"
                                        + "<span class='click-ans-btn'>点击答案</span>"
                                        + "</div>"
                                        + "</li>"
                                    });
                                });

                                ques_content += "<div class='part-item' data-quesconid='"+element.ques_content[0].id+"'>"
                                    +"<h2 class='part-section' data-section='"+ ele.section_name +"'></h2>"
                                    + "<div class='part-item-con'>"
                                    + "<div class='part-directions' data-dir='directions'>" + data.answer_guide + "</div>"
                                    + "<div>"
//                                    + "<h6 class='questions-num'>" + data.answer_guide + "</h6>"
                                    + "<div class='reading-com-box bg-f1f7 pag-20 mgb-30'>"
                                    + "<ul class='reading-con-article data-arr'>"
                                    + ques
                                    + "</ul>"
                                    + "</div>"
                                    + "<ul class='reading-con-list data-arr mgb-30'>"
                                    + ques_item
                                    + "</ul>"
                                    + "</div>"
                                    + "</div>"
                                    + "</div>"
                                s = String.fromCharCode(s.charCodeAt(0) + 1);
                            });

                            });

                        }else if(data.type==3){
                            $(data.modelQues).each(function(index,element) {
                                var ques_ques="",quesid="";
                                if (element.ques_content[0].ques_ques.length>0){
                                    ques_ques=element.ques_content[0].ques_ques[0].title;
//                                    ques_ques =  element.ques_content[0].content;
                                    quesid = element.ques_content[0].ques_ques[0].id;
                                }else {
                                    ques_ques="暂无译文";
                                    quesid = 0;
                                }
                                ques_content += "<div class='part-item' data-quesconid='"+element.ques_content[0].id+"'>"
//                                    +"<h2 class='part-section' data-section='section B'></h2>"
                                    + "<div class='part-item-con' data-quesid='"+quesid+"'>"
                                    + "<div class='part-directions' data-dir='directions'>" + data.answer_guide + "</div>"
                                    + "<div class='clear'>"
                                    + ques_ques
                                    + "<div class='write-box mgb-30'>"
                                    + "<textarea style='width: 100%;height: 200px;' onkeyup='wordStatic(this);'>"
                                    + "</textarea>"
                                    + "<span class='write-word-num'>（（已经输入<span class='dcs'>0</span>个单词）</span>"
                                    + "</div>"
                                    + "</div>"
                                    + "</div>"
                                    + "</div>"
                            });
                        }else if(data.type==4||data.type==5){

                            $(".mgt-102").addClass('mgt-130');
                            var pdstate = '';
                            var s="A";
                            if(data.type==4){
                                pdstate="点击播放"
                            }
                            var ques_content =""
                            var report = 0;
                            $(data.serction).each(function(i,ele) {
                                ques_content += "<h2 class='part-section' data-section='" + ele.section_name + "'></h2>"
                                             + "<div class='part-directions' data-dir='directions'>"+ele.answer_guide+"</div>";
                                $(data.modelQues).each(function(index,element){
                                    if (ele.id == element.section_id) {
                                    audio_arr.push(element.ques_content[0].content+","+element.ques_content[0].subsection)
                                    report++;
                                    var ques="";
                                    var video_num = 0;
                                    $(element.ques_content[0].ques_ques).each(function(index,problem){
                                        video_num++;
                                        var ques_problem="";
                                        if(data.type==4){
                                            audio_arr.push(problem.title+","+problem.subsection)
                                            ques_problem += "<span class='questions-num' style='margin-left: 30px;'>Number"+problem.id+"</span>"
                                                +"<span class='text-radio-btn' id='text-radio-btn' data-duration='"+problem.subsection+"'>"
                                                +"<audio class='audio-ele' id='audio_source' src='http://112.124.2.173/weeduTalk/media/audio/"+problem.title+"' preload='none'>"
                                                +"</span>"
    //                                    ques_problem += "<a href='javascript:;' style='width:100vh;' class='btn btn-success del-icon questions-num audio_name_write_listen' data-duration='"+problem.subsection+"' data-audio='http://112.124.2.173/weeduTalk/media/audio/"+problem.title+"'>number"+video_num+"<span>"+pdstate+"</span></a>";
                                        }else if(data.type==5){
                                            ques_problem += "<h6 class='questions-num'>Number"+video_num+"</h6>"
                                        }
                                        var ques_item="<div class='choose-num-item' data-quesid='"+problem.id+"'>"
                                            +"<ul>"
                                        $(problem.ques_ques_item).each(function(index,item){
                                            ques_item +=
                                                "<li>"
                                                +"<label>"
                                                +"<input type='radio' name='"+problem.id+"' value='"+item.id+"'><i></i>"
                                                +"</label>"
                                                +"<span>"+item.title+"</span>"
                                                +"</li>"
                                        })
                                        ques_item +="</ul>"
                                            +"</div>"
                                        ques += ques_problem+ques_item;
                                    });
                                    ques_content +=
                                        "<div class='audio-play-icon'><i class='audio_name_write_listen' data-duration='"+element.ques_content[0].subsection+"' data-audio='http://112.124.2.173/weeduTalk/media/audio/"+element.ques_content[0].content+"'></i>News report"+report+"<span class='text-radio-btn' style='margin-right: 30px'></span>录音播放中，请认真听题 </div>"
                                        +"<audio src='http://112.124.2.173/weeduTalk/media/audio/"+element.ques_content[0].content+"'></audio>"
                                        +"<div class='part-item' data-quesconid='"+element.ques_content[0].id+"'>"
                                        +"<div class='part-item-con'>"
                                        +"<div class='choose-num-box choose-type  data-arr'>"
                                        + ques
                                        +"</div>"
                                        +"</div>"
                                        +"</div>";
                                    }
                                });
                                s = String.fromCharCode(s.charCodeAt(0) + 1);
                            })
                            //倒计时播放音频
                            countDown(audio_arr,0);
                        }else if(data.type==6){
                            $(data.modelQues).each(function(index,element){
                                ques_content +=
                                    "<div class='part-item' data-quesconid='"+element.ques_content[0].id+"'>"
//                                    +"<h2 class='part-section' data-section='section A'></h2>"
                                    +"<div class='part-item-con'>"
                                    +"<div class='part-directions' data-dir='directions'>"+data.answer_guide+"</div>"
                                    +"<div class='trans-con mgb-20'>"+element.ques_content[0].content+"</div>"
                                    +"<div class=' clear'>"
                                    +"<div class='write-box mgb-30'>"
                                    +"<textarea class='write_module' style='width: 100%;height: 200px;' onkeyup='wordStatic(this);'></textarea>"
                                    +"<span class='write-word-num'>（已经输入<span class='dcs'>0</span>个单词）</span>"
                                    +"</div>"
                                    +"</div>"
                                    +"</div>"
                                    +"</div>"
                                    +"</div>"
                            });
                        }else if(data.type==7){
                            var s="A";
                            $(data.serction).each(function(i,ele) {
                                ques_content += "<h2 class='part-section' data-section='" + ele.section_name + "'></h2>";
                                ques_content += "<div class='part-directions' data-dir='directions' style='margin: 0 80px;margin-bottom: 10px;'>" + ele.answer_guide + "</div>"
                                if(ele.type==7){
                                    $(data.modelQues).each(function (index, element) {
                                        if (ele.id == element.section_id) {
                                            var ques = "";
                                            $(element.ques_content[0].ques_ques).each(function (index, problem) {
                                                var ques_problem = "";
                                                ques_problem += "<div class='banked-cloze-con banked-selected' data-quesid='" + problem.id + "'>" + problem.title + "</div>";

                                                var ques_item = "<ul class='banked-cloze-list clear'>"
                                                $(problem.ques_ques_item).each(function (index, item) {
                                                    ques_item += "<li data-id='" + item.id + "'>" + item.title + "</li>"
                                                })
                                                ques_item += "</ul>"
                                                ques += ques_problem + ques_item;
                                            });
                                            ques_content +=
                                                "<div class='part-item-con' data-quesconid='" + element.ques_content[0].id + "'>"
                                                + "<div class='banked-cloze-box'>"
                                                + "<h6 class='questions-num'>Questions&nbsp;36&nbsp;to&nbsp;45 are&nbsp;based&nbsp;on&nbsp;the&nbsp;passage&nbsp;you&nbsp;have&nbsp;just&nbsp;heard.&nbsp;&nbsp;</h6>"
                                                + ques
                                                + "</div>"
                                                + "</div>";
                                        }
                                    });
                                }else if(ele.type==1){
                                    $(data.modelQues).each(function(index,element) {
                                        if (ele.id == element.section_id) {
                                            var ques = "";
                                            $(element.ques_content[0].ques_ques).each(function (index, problem) {
                                                var ques_problem = "";
                                                ques_problem += "<h6 class='questions-num' style='margin-left: 28px;'>" + problem.title + "</h6>";
                                                var ques_item = "<div class='choose-num-item' data-quesid='" + problem.id + "'>"
                                                    + "<ul>";
                                                $(problem.ques_ques_item).each(function (index, item) {
                                                    ques_item +=
                                                        "<li>"
                                                        + "<label>"
                                                        + "<input type='radio' name='" + problem.id + "' value='" + item.id + "'><i></i>"
                                                        + "</label>"
                                                        + "<span>" + item.title + "</span>"
                                                        + "</li>"
                                                })
                                                ques_item += "</ul>"
                                                    + "</div>"
                                                ques += ques_problem + ques_item;
                                            });
                                            ques_content +=
                                                 "<div class='part-item' data-quesconid='" + element.ques_content[0].id + "'>"
                                                + "<div class='part-item-con'>"
                                                + "<div class='bg-f1f passage-con mgb-20'><p>" + element.ques_content[0].content + "</p></div>"
                                                + "<div class='choose-num-box choose-type data-arr'>"
                                                + ques
                                                + "</div>"
                                                + "</div>"
                                                + "</div>"
                                        }
                                    });
                                }else if(ele.type==2){
                                    $(data.modelQues).each(function(index,element) {
                                        if (ele.id == element.section_id) {
                                            var ques = "", ques_item = "", s1 = "A";
                                            $(element.ques_content[0].ques_ques).each(function (index, problem) {
                                                ques = "<span class='duanluo_que' data-quesid='" + problem.id + "'></span>"
                                                $.each(problem.title.split("==="), function (i, val) {
                                                    ques += "<li data-arr='[" + s1 + "]'>" + val + "</li>"
                                                    s1 = String.fromCharCode(s1.charCodeAt(0) + 1);
                                                });
                                                $(problem.ques_ques_item).each(function (idx, item) {
                                                    ques_item +=
                                                        "<li data-id='" + item.id + "'>"
                                                        + item.title
                                                        + "<div>"
                                                        + "<span class='click-ans-btn'>点击答案</span>"
                                                        + "</div>"
                                                        + "</li>"
                                                });
                                            });

                                            ques_content += "<div class='part-item' data-quesconid='" + element.ques_content[0].id + "'>"
                                                + "<div class='reading-com-box bg-f1f7 pag-20 mgb-30'>"
                                                + "<ul class='reading-con-article data-arr'>"
                                                + ques
                                                + "</ul>"
                                                + "</div>"
                                                + "<ul class='reading-con-list data-arr mgb-30'>"
                                                + ques_item
                                                + "</ul>"
                                                + "</div>"
                                                + "</div>"
                                                + "</div>"
                                            s1 = String.fromCharCode(s1.charCodeAt(0) + 1);
                                        }
                                    });
                                }

                            })

                        }
                        question.empty();
                        console.log(ques_content);
                        question.append(ques_content);
                        chooseItem();
                    }
                }
            });
        }

        function countDown(audio_arr,i) {
            console.log(i+"==========")
            audio_play_status=false;
            var time = 3;
//            retisterLimitTip('3秒后开始播放');
            var s = window.setInterval(function () {
                if(time>0){
                    console.log(time);
                    time--;
                }else if(time==0){
                    window.clearInterval(s);
                    //添加播放标志
                    var radio = $(".text-radio-btn");
                    radio.eq(i).addClass('on');
                    console.log(audio_arr.length);
                    if(i<audio_arr.length){
                        play(audio_arr[i],i);
                    }else{
                        audio_play_status = true;
                    }
                }
            },1000)
        }

        function stopAudio(){
            $('body audio').stop();
            $('body audio').remove();
        }

        function getSecondFromTime(time) {
            var second = 0;
            var temp = time.split(":");
            if (temp.length >= 2) {
                second += parseInt(temp[0])*60;
                second += parseInt(temp[1]);
                second = second*1000;
                if (temp.length > 2) {
                    second += parseInt(temp[2]);
                }
            }
            return second;
        }


        function play(source,i) {
            console.log(source);
            var src = source.split(',');
            var j = i;
            $('body audio').remove();
            var audio = document.createElement("audio");
            document.body.appendChild(audio);
            audio.id='audio'+Math.random();
            audio.src = "http://112.124.2.173/weeduTalk/media/audio/"+src[0];
            console.log(src[0]);
            var duration = src['1'];
            console.log(duration);
            duration = duration.split('-');
            var start_time="",end_time="";

            var start_time = getSecondFromTime(duration[0]);
            var end_time   = getSecondFromTime(duration[1]);
            var durationTotal = (end_time-start_time)/1000;


//            if(duration[0].split(':')[0]=='00'){
//                start_time = duration[0].split(':')[1];
//            }else{
//                var start_time1 = duration[0].split(':')[0]*60
//                var start_time2 = duration[0].split(':')[1];
//                start_time = parseInt(start_time1)+parseInt(start_time2);
//            }
//
//            if(duration[1].split(':')[0]=='00'){
//                end_time = duration[1].split(':')[1];
//            }else{
//                var end_time1 = duration[1].split(':')[0]*60
//                var end_time2 = duration[1].split(':')[1];
//                end_time = parseInt(end_time1)+parseInt(end_time2);
//            }
            console.log(start_time+'==='+end_time);

            audio.load();
//            if('fastSeek' in audio){
//                audio.fastSeek(start_time/1000);//改变audio.currentTime的值
//            }else{
//                audio.currentTime = start_time/1000;
//            }

            if(isSafari=navigator.userAgent.toLowerCase().indexOf("safari")>0) {
                console.log(1);
                var playPromise = document.querySelector('audio').play();
               // audio.currentTime = start_time/1000;



                if (playPromise !== undefined) {

                    playPromise.then(function() {
                        console.log("success");
                        audio.pause();
                        audio.currentTime = parseInt(start_time/1000);
                        audio.play();
                    }).catch(function(error) {
                        $("#audioModal").modal("show");
                        $("#playButton").click(function(){
                            audio.pause();
                            audio.currentTime = parseInt(start_time/1000);
                            audio.play();
                            $("#audioModal").modal("hide");
                        });
//                    $("#playButton").addEventListener('click', function(){
//
//                    });
//                    if(confirm("请点击确定播放录音")){
//                        document.querySelector('#audio1').play();
//                        // The user interaction requirement is met if
//                        // playback is triggered via a click event.
//                        // playButton.addEventListener('click', startPlayback);
//                    }

                    });
                    console.log(start_time/1000+"audio.currentTime");
                }
            }else{
                console.log(2);
               // audio.currentTime = start_time/1000;
                audio.pause();
                audio.currentTime = parseInt(start_time/1000);
                audio.play();
//                audio.addEventListener("canplay", function () {
//                    audio.play();
//                }, false);
            }



//            audio.addEventListener("loadedmetadata", function(){
//                var tol = this.duration;//获取总时长
//            });
//            audio.addEventListener("timeupdate",function(){
//                console.log(audio.currentTime);
//                if((audio.currentTime >= (end_time/1000)) || audio.ended){
//                    var radio = $(".text-radio-btn");
//                    radio.eq(j).removeClass('on');
//                    radio.eq(j).attr('data-on','1');
//                  //  j++;
//                    console.log('播放完成啦'+ j);
//                    audio.pause();
//                  //  audio.load();
//                   // clearInterval(timer);
//                    countDown(audio_arr,j++);
//                }
//            },false);

            var timer = window.setInterval(function() {
                console.log(audio.currentTime);
                if(audio.currentTime>end_time/1000||audio.ended){
                    var radio = $(".text-radio-btn");
                    radio.eq(j).removeClass('on');
                    radio.eq(j).attr('data-on','1');
                    j++;
                    console.log('播放完成啦');
                    audio.pause();
                    clearInterval(timer);
                    countDown(audio_arr,j++);
                }
            },300)
        }
        function timer(intDiff) {
            time1 = window.setInterval(function() {
                var day = 0,
                    hour = 0,
                    minute = 0,
                    second = 0;//时间默认值
                if (intDiff > 0) {
//                day = Math.floor(intDiff / (60 * 60 * 24));
//                hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
                    minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
                    second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
                }
                if (minute <= 9)
                    minute = '0' + minute;
                if (second <= 9)
                    second = '0' + second;
                $('.surplus-times i').html(minute + ':' + second);
                intDiff--;
                if(minute==0&&second==0){
                    pageNum++;
                    save_answer();
                    window.clearInterval(time1)
                }
            }, 1000);
        }
//        $('body').delegate('#text-radio-btn','click',function () {
//            var oRadio = $(this).find(".audio-ele");
//            $("#test-radio-input").val("");
//            var _this = $(this);
//            if(_this.hasClass('on')){
//                _this.removeClass('on');
//                oRadio[0].pause();
//            }else{
//                _this.addClass('on');
//                oRadio[0].play();
//            }
//            oRadio.bind('ended',function(){
//                _this.parent('span').removeClass('on');
//                $("#test-radio-input").focus();
//            });
//        });

    });
    function wordStatic(input) {
        // 获取文本框对象
        var el = $(".dcs");
        if (el && input) {
            var value = input.value;
            ;
            // 更新计数
            el.text(value.split(" ").length-1);
        }
    }
    audiojs.events.ready(function() {
        var as = audiojs.createAll();
    });
</script>
<?php else:?>
<?=$this->load->view("exam/tmpl/header")?>
<div class="wrapper">
<?=$this->load->view("exam/tmpl/header_bar")?>
    <div class="djs-wrapper">
        <div class="djs-con pos-abs">
            <?php if(getViewer()->id != $testrelationship->user_id || !$testrelationship):?>
                <p id="remindTime" class="countdown" data-before="温馨提示：您没有权限考试或者考试取消">
<!--                    <span><i id="alertday"></i> 天</span>-->
<!--                    <span><i id="alerthours"></i> 时</span>-->
<!--                    <span><i id="alertminutes"></i> 分</span>-->
<!--                    <span><i id="alertseconds"></i> 秒</span>-->
                </p>
            <?php elseif(time() > strtotime($testrelationship->endtime) || $testrelationship->status == 2):?>
                <p id="remindTime" class="countdown" data-before="温馨提示：本次考试以结束">
<!--                    <span><i id="alertday"></i> 天</span>-->
<!--                    <span><i id="alerthours"></i> 时</span>-->
<!--                    <span><i id="alertminutes"></i> 分</span>-->
<!--                    <span><i id="alertseconds"></i> 秒</span>-->
                </p>
            <?php else:?>
                <p id="remindTime" class="countdown" data-before="温馨提示：距离考试开始时间还有">
                    <span><i id="alertday"></i> 天</span>
                    <span><i id="alerthours"></i> 时</span>
                    <span><i id="alertminutes"></i> 分</span>
                    <span><i id="alertseconds"></i> 秒</span>
                </p>
            <?php endif;?>
<!--            <div class="djs-btn text-center">-->
<!--                <a href="javascript:;" class="btn-sure">确认</a>-->
<!--                <a href="javascript:;" class="btn-cancel">取消</a>-->
<!--            </div>-->
        </div>
    </div>
</div>
<?=$this->load->view("exam/tmpl/foot")?>
<?php if($testrelationship &&  $testrelationship->status == 0):?>
    <script type="text/javascript">
        $(document).ready(function(){
            //倒计时
            function GetRTime(){
                var EndTime= new Date('<?=$testrelationship->datetime?>'.replace(/-/g, "/")); //截止时间
                var NowTime = new Date();
                var t = EndTime.getTime() - NowTime.getTime();
                if(t <= 0){
                    window.location.reload();
                }else{
                    var d=Math.floor(t/1000/60/60/24);
                    var h=Math.floor(t/1000/60/60%24);
                    var m=Math.floor(t/1000/60%60);
                    var s=Math.floor(t/1000%60);
                    if(s < 10){
                        s = '0'+s;
                    }
                    if(m < 10){
                        m = '0'+m;
                    }
                    if(h < 10){
                        h = '0'+h;
                    }

                    if(d==0){
                        $("#alertday").parent('span').hide();
                    }else if(d<10){
                        d = '0'+d;
                    }
                    $("#alertday").html(d);
                    $("#alerthours").html(h);
                    $("#alertminutes").html(m);
                    $("#alertseconds").html(s);
                }
            }
            var timmer = setInterval(GetRTime,1000);

        });
    </script>
<?php endif;?>
<?php endif;?>
</body>
</html>