<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生参与度</title>
    <link rel="stylesheet" href="<?=base_url()?>/media/css/wespeak/style.css">
    <script src="<?=base_url()?>media/administrator/libs/jquery/jquery/dist/jquery-1.10.2.min.js"></script>
    <script src="<?=base_url()?>media/js/moment.min.js"></script>
    <script src="<?=base_url()?>media/administrator/js/echarts.min.js"></script>
    <script src="<?=base_url()?>media/js/qwebchannel.js"></script>

</head>
<body>
<div class="chart-container">
    <div class="cc-left">
        <?php if($user):?>
        <div class="user-info">
            <div class="img-wrapper">
                <a href="javascript:;">
                    <img src="<?=$user->getAvatarUrl()?>" alt="">
                </a>
            </div>
            <?php
                $studyData =$user->getUserInfoDetail()->returncode['data'];
            ?>
            <div class="total-learn-times">
                <span class="txt">已经累计学习了<?=round($studyData['study_num_time']/3600,2)?>小时</span>
            </div>
        </div>
        <?php endif;?>
        <div class="time-rate" data-before="时间与频率">
            <div class="tabs">
                <div class="tabs-header">
                    <div class="time-switch">
                        <ul>
                            <li  class="active" data-type="week"><a href="javascript:;" class="txt">按周查看</a></li>
                            <li><a href="javascript:;" class="txt" data-type="month">按月查看</a></li>
                        </ul>
                    </div>
                    <div class="duration-switch">
                        <div class="ds-week">
                            <a href="javascript:;" class="btn-prev" id="time_prev">&lt;</a>
                            <span class="txt" id="transferDate"></span>
                            <a href="javascript:;" class="btn-next" id="time_next">&gt;</a>
                        </div>
<!--                        <div class="ds-month">-->
<!--                            <a href="javascript:;" class="btn-prev">&lt;</a>-->
<!--                            <span class="txt"></span>-->
<!--                            <a href="javascript:;" class="btn-next">&gt;</a>-->
<!--                        </div>-->
                    </div>
                </div>
                <div class="tabs-body">
                    <div class="week-wrapper">
                        <div class="timeline-wrapper">
                            <span class="txt-time">60分钟</span>
                            <span class="txt-time">30分钟</span>
                        </div>
                        <div class="progress-wrapper">
                            <div class="progress" id="timelinelist">
                            </div>
                        </div>
                        <div class="total-wrapper">
                            <span class="txt-date" id="nowData"></span>
                            <span class="txt-time" data-after="分"  id="nowTime"></span>
                            <span class="txt-time" data-after="秒" id="nowSecond" ></span>
                            <a href="javascript:;" class="btn-view" id="timedetail">点击查看详情</a>
                        </div>
                        <div class="appraise">
                            <p class="txt" id="timeBody"></p>
                        </div>
                    </div>
<!--                    <div class="month-wrapper">-->
<!--                        <div class="timeline-wrapper">-->
<!--                            <span class="txt-time">60分钟</span>-->
<!--                            <span class="txt-time">30分钟</span>-->
<!--                        </div>-->
<!--                        <div class="progress-wrapper">-->
<!--                            <div class="progress-scroll"></div>-->
<!--                        </div>-->
<!--                        <div class="total-wrapper">-->
<!--                            <span class="txt-date">4月3日学习时间</span>-->
<!--                            <span class="txt-time" data-after="分钟">60</span>-->
<!--                            <a href="javascript:;" class="btn-view">点击查看详情</a>-->
<!--                        </div>-->
<!--                        <div class="appraise">-->
<!--                            <p class="txt">建议每周至少学习3次，每次时间在30-60分钟之内</p>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <div class="cc-right">
        <div class="txt-header">
            <h1 class="txt" data-before="学习方法">(最近15天)</h1>
        </div>
        <div class="carousel-wrapper">
            <div class="pie-carousel">
                <div class="carousel">
                    <ul>
                        <li id="chart1"></li>
                        <li id="chart2"></li>
                        <li id="chart3"></li>
                        <li id="chart4"></li>
                    </ul>
                </div>
                <div class="dot-lists">
                    <ul>
                        <li class="active"><a href="javascript:;" class="dot"></a></li>
                        <li><a href="javascript:;" class="dot"></a></li>
                        <li><a href="javascript:;" class="dot"></a></li>
                        <li><a href="javascript:;" class="dot"></a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <a href="javascript:;" class="btn btn-prev">&lt;</a>
                    <a href="javascript:;" class="btn btn-next">&gt;</a>
                </div>
            </div>
            <p class="txt" id="functionkeytitle">总共使用功能键</p>
        </div>
        <p class="total-times"><span class="txt" data-after="次" id="functionKeynums"></span></p>
        <div class="appraise">
            <p class="txt" id="functionKeybody"></p>
        </div>
    </div>
</div>
<script>
    var is_select_default = "week";
    var is_define_percent = 65;
    var is_week_names = ["周日","周一","周二","周三","周四","周五","周六"]
    var is_delult_week_nums = 0;
    var is_delult_month_nums = 0;
    var functionKey = false;

    var nowToday = {};

    $("#time_prev").click(function () {
        if(is_select_default == "week"){
            is_delult_week_nums =  is_delult_week_nums- 1;
        }else{
            is_delult_month_nums = is_delult_month_nums - 1;
        }
        getParticipationdegree();
    });

    $("#time_next").click(function () {
        if(is_select_default == "week"){
            is_delult_week_nums =  is_delult_week_nums + 1;
            if(is_delult_week_nums > 0){
                is_delult_week_nums = 0;
            }
        }else{
            is_delult_month_nums = is_delult_month_nums  + 1;
            if(is_delult_month_nums > 0) is_delult_month_nums = 0;
        }
        if(!$("#time_next").hasClass('disabled')) getParticipationdegree();
    });

    $(".time-switch ul").find("li").click(function () {
        if( ! $(this).hasClass("active")){
            $(this).addClass("active").siblings().removeClass("active");
            if($(this).data("type") == "week" ){
                is_select_default = "week";
                is_delult_week_nums = 0;

            }else{
                is_select_default = "month";
                is_delult_month_nums = 0;
            }
            getParticipationdegree();
        }

    });



     function getParticipationdegree(){
         var week_end_date = '', month_end_date = '';
         if(is_select_default == "week" && is_delult_week_nums <=0 ){
             var start_date = moment().week(moment().week() + is_delult_week_nums).startOf('week').format('YYYY-MM-DD');
             var end_date = moment().week(moment().week() + is_delult_week_nums).endOf('week').format('YYYY-MM-DD');
             week_end_date = moment().week(moment().week()).endOf('week').format('YYYY-MM-DD');
             if (end_date === week_end_date) {
                 $("#time_next").addClass('disabled');
             } else {
                 $("#time_next").removeClass('disabled');
             }
             console.log(week_end_date + 'week')
         }else if(is_select_default == "month" && is_delult_month_nums <=0){
             var start_date = moment().month(moment().month() + is_delult_month_nums).startOf('month').format('YYYY-MM-DD');
             var end_date = moment().month(moment().month() + is_delult_month_nums).endOf('month').format('YYYY-MM-DD');
             month_end_date = moment().month(moment().month()).endOf('month').format('YYYY-MM-DD');
             if (end_date === month_end_date) {
                 $("#time_next").addClass('disabled');
             } else {
                 $("#time_next").removeClass('disabled');
             }
             console.log(month_end_date + 'month')
         }
         $("#transferDate").html(start_date + "到" + end_date);
         $.ajax({
             type: "POST",
             url: '<?=base_url()?>components/users/getParticipationDegreeInfoList/<?=$user->id?>',
             data: {
                 start_date:start_date,
                 end_date:end_date,
                 class_id:<?=$class_id?>
             },
             dataType:'json',
             beforeSend:function(){
                console.log(1);
             },
             success: function (data) {
                 console.log(111);
                 renderData(data);
             }
         });

     }
    $(function() {

        $("#timedetail").click(function(){
            new QWebChannel(qt.webChannelTransport,
                function(channel) {
                    var content = channel.objects.webBridge;  // 注意这里的名字与注册时的一致
                    content.slot_recvMessageFromHtml(JSON.stringify({date:nowToday}));
                }
            );

        });

        $("#timelinelist").undelegate('.progress-item', 'click').delegate('.progress-item', 'click', function () {
            console.log($(this).data("date"));
            var date = $(this).data("date");
            var time1 = $(this).data("time");
            var time = parseInt(time1/60);

            var second =  time1%60;
            $("#nowData").html(date+"学习时间");
            $("#nowTime").html(time);
            $("#nowSecond").html(second);
            if(time == 0 && second == 0){
                $("#timedetail").hide();
            }else{
                $("#timedetail").show();
            }
            nowToday = data.data.today.date;
        });



    });



    getParticipationdegree();
    function renderData(data){
        if(data.errcode == 0){
            $("#timeBody").html(data.data.timeBody);
                $("#nowData").html(data.data.today.date+"学习时间");
                var time = parseInt(data.data.today.time/60);

                 var second =  data.data.today.time%60;
            if(time == 0 && second == 0){
                $("#timedetail").hide();
            }else{
                $("#timedetail").show();
            }
                $("#nowTime").html(time);
                $("#nowSecond").html(second);
                nowToday = data.data.today.date;

            if(is_select_default == "week"){
                var string = "";
                $(data.data.timeList).each(function (index,element) {

                    string += '<div class="progress-item" data-date="'+element.date+'" data-time="'+element.time+'">';
                    string += '<span class="txt-time">'+is_week_names[index]+'</span>';
                    var percent = 0;
                    var m = element.time/60;
                    percent = (m/is_define_percent)*100;
                    if(percent > 100) percent =100;
                    if(m < 30){
                        string += ' <div class="progress">';
                    }else{
                        string += ' <div class="progress blue">';
                    }

                    string += '   <div class="progress-bar" style="height: '+percent+'%">进度条</div>';

                    string += '  </div> </div>';
                })
                $("#timelinelist").html(string);
                $("#timelinelist").css({
                    width: $(data.data.timeList).length * 52 + 'px'
                });

            }else{
                var string = "";
                $(data.data.timeList).each(function (index,element) {
                    if(index == 0){
                        $("#nowData").html(element.date+"学习时间");
                        $("#nowTime").html(parseInt(element.time/60));
                    }
                    string += '<div class="progress-item" data-date="'+element.date+'" data-time="'+element.time+'">';
                    string += '<span class="txt-time">'+(index+1)+'</span>';
                    var percent = 0;
                    var m = element.time/60;
                    percent = (m/is_define_percent)*100;
                    if(percent > 100) percent =100;
                    if(m < 30){
                        string += ' <div class="progress">';
                    }else{
                        string += ' <div class="progress blue">';
                    }
                    string += '   <div class="progress-bar" style="height: '+percent+'%">进度条</div>';

                    string += '  </div> </div>';
                })
                $("#timelinelist").html(string);
                $("#timelinelist").css({
                    width: $(data.data.timeList).length * 42 + 'px'
                });

            }
        }
        renderCharts(data.data.functionKey);

        $("#functionkeytitle").html("总共使用功能键");
        $("#functionKeynums").html(parseInt(data.data.functionKey.repeat_count) +  parseInt(data.data.functionKey.mic_count) +  parseInt(data.data.functionKey.head_count));
        $("#functionKeybody").html(data.data.functionKey.body);
        functionKey = data.data.functionKey;
    }

    function pieCarouselTab() {
        var btnPrev = $('.pie-carousel .btn-prev'),
            btnNext = $('.pie-carousel .btn-next'),
            dots = $('.pie-carousel .dot-lists li'),
            pieCarousel = $('.pie-carousel .carousel li');
        var i = 0, len = pieCarousel.length;
        btnPrev.on('click', function () {
            i--;
            if (i === -1) {
                i = len - 1
            }
            pieCarousel.eq(i).show().siblings().hide();
            dots.eq(i).addClass('active').siblings().removeClass('active');
            reanderFunctionKey(i);
        });
        btnNext.on('click', function () {
            i++;
            if (i === len) {
                i = 0
            }
            pieCarousel.eq(i).show().siblings().hide();
            dots.eq(i).addClass('active').siblings().removeClass('active');
            reanderFunctionKey(i);
        });
        dots.on('click', function () {
            var index = dots.index(this);
            $(this).addClass('active').siblings().removeClass('active')
            pieCarousel.eq(index).show().siblings().hide();
            reanderFunctionKey(index);
        })
    }
    function  reanderFunctionKey(index) {
        if(index == 0){
            $("#functionkeytitle").html("总共使用功能键");
            $("#functionKeynums").html(parseInt(functionKey.repeat_count) +  parseInt(functionKey.mic_count) +  parseInt(functionKey.head_count));
        }else if(index == 1){
            $("#functionkeytitle").html("重复键");
            $("#functionKeynums").html(parseInt(functionKey.repeat_count));
        }else if(index == 2){
            $("#functionkeytitle").html("录音键");
            $("#functionKeynums").html(parseInt(functionKey.mic_count));
        }else{
            $("#functionkeytitle").html("回听键");
            $("#functionKeynums").html(parseInt(functionKey.head_count));
        }


    }
    pieCarouselTab();
    renderCharts();
    function renderCharts(data) {
        // 基于准备好的dom，初始化echarts实例
        var chart1 = echarts.init(document.getElementById('chart1'));
        // 指定图表的配置项和数据
        var option1 = {
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b}: {c} ({d}%)"
            },
            legend: {
                orient: 'horizontal',
                x: 'center',
                y: 'bottom',
                data:['重复键','录音键','回听键']
            },
            series: [
                {
                    name:'访问来源',
                    type:'pie',
                    radius: ['50%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                        normal: {
                            show: false,
                            position: 'center'
                        },
                        emphasis: {
                            show: true,
                            textStyle: {
                                fontSize: '30',
                                fontWeight: 'bold'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            show: false
                        }
                    },
                    data:[
                        {value:data.repeat_count, name:'重复键'},
                        {value:data.mic_count, name:'录音键'},
                        {value:data.head_count, name:'回听键'}
                    ]
                }
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                },
                normal:{
                    color:function(params) {
                        //自定义颜色
                        var colorList = [
                            '#eaa844', '#5eaba8', '#b06191'
                        ];
                        return colorList[params.dataIndex]
                    }
                }
            }
        };

        // 基于准备好的dom，初始化echarts实例
        var chart2 = echarts.init(document.getElementById('chart2'));
        // 指定图表的配置项和数据
        var option2 = {
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b}: {c} ({d}%)"
            },
            legend: {
                orient: 'horizontal',
                x: 'center',
                y: 'bottom',
                data:['重复键']
            },
            series: [
                {
                    name:'访问来源',
                    type:'pie',
                    radius: ['50%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                        normal: {
                            show: false,
                            position: 'center'
                        },
                        emphasis: {
                            show: true,
                            textStyle: {
                                fontSize: '30',
                                fontWeight: 'bold'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            show: false
                        }
                    },
                    data:[
                        {value:data.repeat_count, name:'重复键'},
                        {value:data.mic_count, name:'录音键'},
                        {value:data.head_count, name:'回听键'}
                    ],
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        },
                        normal:{
                            color:function(params) {
                                //自定义颜色
                                var colorList = [
                                    '#eaa844','#efeff4','#efeff4'
                                ];
                                return colorList[params.dataIndex]
                            }
                        }
                    }
                }
            ]
        };

        // 基于准备好的dom，初始化echarts实例
        var chart3 = echarts.init(document.getElementById('chart3'));
        // 指定图表的配置项和数据
        var option3 = {
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b}: {c} ({d}%)"
            },
            legend: {
                orient: 'horizontal',
                x: 'center',
                y: 'bottom',
                data:['录音键']
            },
            series: [
                {
                    name:'访问来源',
                    type:'pie',
                    radius: ['50%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                        normal: {
                            show: false,
                            position: 'center'
                        },
                        emphasis: {
                            show: true,
                            textStyle: {
                                fontSize: '30',
                                fontWeight: 'bold'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            show: false
                        }
                    },
                    data:[
                        {value:data.mic_count, name:'录音键'},
                        {value:data.repeat_count, name:'重复键'},
                        {value:data.head_count, name:'回听键'}
                    ],
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        },
                        normal:{
                            color:function(params) {
                                //自定义颜色
                                var colorList = [
                                    '#5eaba8','#efeff4','#efeff4'
                                ];
                                return colorList[params.dataIndex]
                            }
                        }
                    }
                }
            ]
        };

        // 基于准备好的dom，初始化echarts实例
        var chart4 = echarts.init(document.getElementById('chart4'));
        // 指定图表的配置项和数据
        var option4 = {
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b}: {c} ({d}%)"
            },
            legend: {
                orient: 'horizontal',
                x: 'center',
                y: 'bottom',
                data:['回听键']
            },
            series: [
                {
                    name:'访问来源',
                    type:'pie',
                    radius: ['50%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                        normal: {
                            show: false,
                            position: 'center'
                        },
                        emphasis: {
                            show: true,
                            textStyle: {
                                fontSize: '30',
                                fontWeight: 'bold'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            show: false
                        }
                    },
                    data:[
                        {value:data.head_count, name:'回听键'},
                        {value:data.repeat_count, name:'重复键'},
                        {value:data.mic_count, name:'录音键'}

                    ],
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        },
                        normal:{
                            color:function(params) {
                                //自定义颜色
                                var colorList = [
                                    '#b06191','#efeff4','#efeff4'
                                ];
                                return colorList[params.dataIndex]
                            }
                        }
                    }
                }
            ]
        };

        // 使用刚指定的配置项和数据显示图表。
        chart1.setOption(option1);
        chart2.setOption(option2);
        chart3.setOption(option3);
        chart4.setOption(option4);
    }

    // console.log(moment().week(moment().week() - 1).startOf('week').format('YYYY-MM-DD'));
    // console.log(moment().week(moment().week() - 1).endOf('week').format('YYYY-MM-DD'));

</script>
</body>
</html>