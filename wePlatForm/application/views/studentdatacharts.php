<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta charset = "utf-8">
    <title>学生学习数据--<?=$user->name?></title>
    <link rel="stylesheet" href="<?=base_url()?>media/wePlatForm/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>media/administrator/css/jsgrid.css" type="text/css" />
    <style type="text/css">
        *{padding:0;margin:0;}
        .study-list{ width:100%;padding:15px;overflow: auto;list-style: none;box-sizing: border-box;}
        .study-list li{float: left;width:33%;position: relative;color:#8e9599;text-align: center;}
        .study-list li:after{content: "";position: absolute;right:0;top:10%;border-right:1px solid #e6e6e6;height:80%;}
        .study-list li:nth-last-of-type(1):after{border-right:none;}
        .study-list li span{display: block;font-size:14px;line-height: 16px;margin-bottom:3px;}
        .study-list li font{display: block;font-size:18px;color:#000030;}
        .study-list li font em{font-weight: normal;font-style: normal;color:#8e9599;font-size:12px;padding-left:3px;}
        .pag-10{padding:10px;}
        .bg-f{background: #fff;}
        .class-info{box-sizing: border-box;background: #dcebf4;}
        .tit-nor{font-size:16px;color:#17b6fe;line-height: 18px;border-left:3px solid #17b6fe;padding-left:5px;margin-bottom:8px;}
        .class-grade{font-size:0;}
        .class-grade span,.class-grade div{display: inline-block;vertical-align: middle;font-size:14px;}
        .class-grade span{width:15%;text-align: center;color:#17b6fe;font-weight: bold;font-size:24px;}
        .class-grade span em{font-style: normal;font-size:12px;}
        .class-grade div{width:85%;line-height: 20px;color:#54778b;}
        .class-info-top{padding-bottom:15px;border-bottom:1px solid #e6e6e6;}

        .portrait-progressbar {
            padding: 10px;
            background-color: #dcebf4;
            position: relative;
        }
        .portrait-progressbar:after {
            content: '';
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            background-color: #fff;
        }
        .portrait-progressbar .txt-title {
            position: relative;
            border-left: 2px solid #17b6fe;
            text-align: right;
            overflow: hidden;
            margin: 10px;
            padding-left: 10px;
            z-index: 1;
        }
        .portrait-progressbar .txt-title:before {
            content: attr(data-before);
            font-size: 16px;
            color: #17b6fe;
            float: left;
        }
        .portrait-progressbar .txt-title .txt {
            font-size: 12px;
            color: #999;
            margin: 2px 0;
            display: inline-block;
        }
        .portrait-progressbar .txt-score {
            text-align: center;
            position: relative;
            z-index: 1;
            margin: 0 5px;
            padding: 10px 0;
        }
        .portrait-progressbar .txt-indicators {
            position: relative;
            z-index: 1;
            margin: 0 15px;
            padding: 10px 0;
            border-bottom: 1px solid #e6e6e6;
        }
        .portrait-progressbar .txt-indicators:before {
            content: attr(data-before);
            display: block;
        }
        .portrait-progressbar .txt-indicators:before,
        .portrait-progressbar .txt-indicators .txt {
            font-size: 14px;
            color: #97bcd3;
        }
        .portrait-progressbar .txt-indicators .txt {
            margin: 0;
        }
        .portrait-progressbar .txt-score .txt {
            font-size: 16px;
            color: #17b6fe;
        }
        .portrait-progressbar .txt-score .txt:after {
            content: attr(data-after);
            font-size: 12px;
            color: #17b6fe;
        }

        .portrait-progressbar__lists {
            position: relative;
            z-index: 1;
        }
        .portrait-progressbar__lists ul {
            display: -webkit-box; /* Chrome 4+, Safari 3.1, iOS Safari 3.2+ */
            display: -moz-box; /* Firefox 17- */
            display: -webkit-flex; /* Chrome 21+, Safari 6.1+, iOS Safari 7+, Opera 15/16 */
            display: -moz-flex; /* Firefox 18+ */
            display: -ms-flexbox; /* IE 10 */
            display: flex; /* Chrome 29+, Firefox 22+, IE 11+, Opera 12.1/17/18, Android 4.4+ */
        }
        .portrait-progressbar__lists ul li {
            -webkit-box-flex: 1;      /* OLD - iOS 6-, Safari 3.1-6 */
            -moz-box-flex: 1;         /* OLD - Firefox 19- */
            -webkit-flex: 1;          /* Chrome */
            -ms-flex: 1;              /* IE 10 */
            flex: 1;                  /* NEW, Spec - Opera 12.1, Firefox 20+ */
            list-style: none;
            position: relative;
        }
        .portrait-progressbar__lists ul li .progressbar-wrapper {
            width: 36px;
            height: 200px;
            background-color: #ecf4f7;
            position: relative;
            margin: 45px auto;
        }
        .portrait-progressbar__lists ul li .progressbar-wrapper:before {
            content: attr(data-before);
            top: -25px;
        }
        .portrait-progressbar__lists ul li .progressbar-wrapper:after {
            content: attr(data-after);
            bottom: -25px;
        }
        .portrait-progressbar__lists ul li .progressbar-wrapper:before,
        .portrait-progressbar__lists ul li .progressbar-wrapper:after {
            font-size: 12px;
            color: #a6e1fb;
            display: block;
            position: absolute;
            white-space: nowrap;
            left: 50%;
            width: 96px;
            text-align: center;
            margin-left: -48px;
        }
        .portrait-progressbar__lists ul li .progressbar-wrapper .progressbar {
            width: 36px;
            position: absolute;
            left: 0;
            bottom: 0;
        }
        .portrait-progressbar__lists ul li .progressbar-wrapper.normal .progressbar {
            background-color: #a6e1fb;
        }
        .portrait-progressbar__lists ul li .progressbar-wrapper.low .progressbar {
            background-color: #ef918a;
        }
        .portrait-progressbar__lists ul li .progressbar-wrapper .txt-standard {
            position: absolute;
            white-space: nowrap;
            text-align: center;
            width: 44px;
            left: 50%;
            top: 40px;
            margin-left: -22px;
            z-index: 1;
        }
        .portrait-progressbar__lists ul li .progressbar-wrapper .txt-standard .txt {
            font-size: 12px;
            color: #fff;
        }
        .portrait-progressbar__lists ul li .progressbar-wrapper .txt-standard .txt:after {
            content: attr(data-after);
            display: block;
            border-top: 1px dashed #fff;
            color: #fff;
        }
        .popover {
            border-color: #29b7fb;
        }
        .popover .arrow:before {
            border-top-color: #29b7fb;
        }
        .portrait-progressbar__lists ul li .pop-progressbar .txt {
            font-size: 12px;
        }
        .portrait-progressbar__lists ul li:hover .progressbar-wrapper.normal .progressbar {
            background-color: #17b6fe;
        }
        .portrait-progressbar__lists ul li:hover .progressbar-wrapper.low .progressbar {
            background-color: #f5564a;
        }
        .portrait-progressbar__lists ul li:hover .progressbar-wrapper:before,
        .portrait-progressbar__lists ul li:hover .progressbar-wrapper:after {
            color: #17b6fe;
        }
        .portrait-progressbar__lists ul li:hover .progressbar-wrapper .txt-standard .txt,
        .portrait-progressbar__lists ul li:hover .progressbar-wrapper .txt-standard .txt:after {
            /*color: #999;*/
        }
        .summary-list {
            padding: 15px 10px;
            background-color: #dcebf4;
            position: relative;
        }
        .summary-list:after {
            content: '';
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            background-color: #fff;
        }
        .summary-list ul {
            position: relative;
            z-index: 1;
            margin: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ccc;
        }
        .summary-list ul:before {
            content: attr(data-before);
            display: block;
            border-left: 2px solid #97bcd3;
            padding: 0 10px;
            font-size: 14px;
            font-weight: bold;
            color: #97bcd3;
            margin-bottom: 5px;
        }
        .summary-list ul li {
            list-style: none;
            padding: 0 30px;
        }
        .summary-list ul li span {
            font-size: 14px;
            color: #97bcd3;
        }
        .summary-list ul.waining:before,
        .summary-list ul li.waining span {
            color: #bf3330;
        }
    </style>
</head>
<body>
<div>
    <div id="container" style="height:300px;"></div>
    <ul class="study-list">
        <li>
            <span>总学习时间</span>
            <font><?=$LearningSituationOverview['totaltime']?><em>H</em></font>
        </li>
        <li>
            <span>总学习天数</span>
            <font><?=$LearningSituationOverview['totalday']?><em>天</em></font>
        </li>
        <li>
            <span>本周学习时间</span>
            <font><?=$userRecordInfo->weekTotalTime?><em>分钟</em></font>
        </li>
    </ul>
</div>

<div class="portrait-progressbar">
    <p class="txt-title" data-before="班级学情概览">
        <span class="txt">9月份数据（每月25日更新数据）</span>
    </p>
    <p class="txt-score"><span class="txt" data-after="分">89</span></p>
    <div class="txt-indicators" data-before="个人学习指数(月):">
        <p class="txt">
            学习指数是学生每月学习的形成性评价得分，总分100分，以分值表示学生的课程学习状态，包括学习效果，学习进度，学习时间与频率，学习方法和语言技能概况五个纬度，每个纬度有各自的得分，五个维度得分之和就是学习指数的得分。
        </p>
        <p class="txt">
            学习指数是动态得分，会随着学生当月的练习情况而增长或降低。建议每月月底查看当月的学习指数，了解当月的学习状态，调整下个月的学习策略。学习指数得分起始为0分。月学习指数得分超过60分，说明学习状态良好；月学习指数得分低于30分，说明学习状态差，需要引起重视。
        </p>
        <p class="txt">
            每个维度的满分都是20分。维度得分高，超过10分，表示学习情况良好；维度得分低，低于5分，表示学习过程中还有需要特别关注的地方，需要进行相应的指导或调整。
        </p>
    </div>
    <div class="portrait-progressbar__lists">
        <ul>
            <li>
                <div class="progressbar-wrapper normal" data-before="18分" data-after="学习效果" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                    <div class="progressbar" style="height: 100px"></div>
                    <div class="txt-standard">
                        <span class="txt" data-after="标准值">14分</span>
                    </div>
                </div>
            </li>
            <li>
                <div class="progressbar-wrapper normal" data-before="18分" data-after="学习效果" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                    <div class="progressbar" style="height: 100px"></div>
                    <div class="txt-standard">
                        <span class="txt" data-after="标准值">14分</span>
                    </div>
                </div>
            </li>
            <li>
                <div class="progressbar-wrapper low" data-before="9分" data-after="学习效果" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                    <div class="progressbar" style="height: 40px"></div>
                    <div class="txt-standard">
                        <span class="txt" data-after="标准值">14分</span>
                    </div>
                </div>
            </li>
            <li>
                <div class="progressbar-wrapper low" data-before="12分" data-after="学习效果" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                    <div class="progressbar" style="height: 50px"></div>
                    <div class="txt-standard">
                        <span class="txt" data-after="标准值">14分</span>
                    </div>
                </div>
            </li>
            <li>
                <div class="progressbar-wrapper normal" data-before="18分" data-after="学习效果" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                    <div class="progressbar" style="height: 100px"></div>
                    <div class="txt-standard">
                        <span class="txt" data-after="标准值">14分</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="summary-list">
    <ul data-before="学习效果">
        <li><span>1、满分20分，你获得了18分。</span></li>
        <li><span>2、练习活动和测试的准确度和完成度越高，则学习效果得分越高。</span></li>
        <li><span>3、建议如何学习。</span></li>
    </ul>
    <ul data-before="时间与频率" class="waining">
        <li class="waining"><span>1、满分20分，你获得了9分。</span></li>
        <li><span>2、每次的学习时间最低不少于1小时，最多不超过5小时。</span></li>
        <li class="waining"><span>3、建议每周学习时间为2-3小时。</span></li>
        <li class="waining"><span>4、每周的学习天数不低于3天，建议每天学习。</span></li>
    </ul>
    <ul data-before="学习进度">
        <li><span>1、满分20分,你获得了18分。</span></li>
        <li><span>2、学习的单元越多，则学习进度得分越高。</span></li>
        <li><span>3、建议如何学习。</span></li>
    </ul>
    <ul data-before="技能情况">
        <li><span>1、满分20分，你获得了2分。</span></li>
        <li><span>2、包括听力理解，口语表达和语法能力。课程内的每个活动侧重训练不同的技能，建议练习全部活动，不要跳过练习；</span></li>
        <li><span>3、建议练习中反馈的得分不低于60分、准确度不低于60%。</span></li>
    </ul>
    <ul data-before="学习方法">
        <li><span>1、满分20分。</span></li>
        <li><span>2、学习方法是学生学习过程的监控与数据反馈。学习方法与学习策略有直接关系。如果精	练之后理解还是有困难，则可以适当使用文字键，帮助理解难长句。</span></li>
        <li><span>3、建议如何学习。</span></li>
    </ul>
</div>
<script type="text/javascript" src="<?=base_url()?>media/administrator/libs/jquery/jquery/dist/jquery-1.10.2.min.js"></script>
<script src="<?=base_url()?>media/administrator/heightchart/highcharts.js"></script>
<script src="<?=base_url()?>media/administrator/heightchart/modules/exporting.js"></script>
<script src="<?=base_url()?>media/wePlatForm/js/popper.min.js"></script>
<script src="<?=base_url()?>media/wePlatForm/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function(){
        var chart = new Highcharts.Chart('container', {
            chart:{
                type: 'areaspline',
                backgroundColor:'#393f4f'
            },
            title: {
                text: '',
                x: -20
            },
            subtitle: {
                text: '',
            },
            xAxis: {
                title: {
                    text: '',
                    align:'high',
                    style: {
                        color: '#bbc9ec'
                    }

                },
                categories:["<?=implode('","',array_keys($userDataLine))?>"],
                labels: {
                    step:1,
                    style: {
                        color: '#bbc9ec'
                    },
                },
                gridLineColor:'#4a566b',
                gridLineDashStyle:'Solid',
                gridLineWidth:1,
                tickWidth:0,
                tickmarkPlacement:'on'
            },
            yAxis: {
                title: {
                    align: 'high',
                    offset: 0,
                    text: '',
                    y: 10,
                    rotation: 0,
                    style: {
                        color: '#bbc9ec'
                    },


                },
                labels: {
                    style: {
                        color: '#bbc9ec'
                    }
                },
                gridLineColor:'#4a566b',
                gridLineDashStyle:'Solid'
            },
            tooltip: {
                useHTML: true,
                headerFormat: '',
                //headerFormat: '<div>平均学习时间：{point.key}</div>',
                pointFormat: '学习时间: <b>{point.y:f} 分钟</b>'
            },
            credits: {
                enabled: false
            },
            exporting:{  //这里配置图表的导出功能为false 没有配置的时候 图表的的右上方会有一个导出的按钮
                enabled:false
            },
            legend:{
                enabled :false
            },
            plotOptions: {
                areaspline: {
                    color:{
                        linearGradient: [0,0,0,500],
                        stops: [
                            [0, 'rgba(80, 138, 161,.6)' ],
                            [1,'rgba(91, 101, 158,1)']
                        ]},
                    // lineColor:'#8a9ba2',
                    // fillOpacity: 0.5
                },
                series: {
                    borderWidth: 0,

                    dataLabels: {
                        enabled: true,
                        format: '{point.y}分钟',
                        color: '#fff',
                    }
                }
            },
            series: [{
                name: '学习时间',
                data: [<?=implode(',',array_values($userDataLine))?>],
                marker:{//线上数据点
                    radius:4,
                    lineWidth:2,
                    lineColor:'#8a9ba2',
                    fillColor:'#fff',
                    states:{
                        hover:{
                            enabled:true,
                            lineWidth:8,
                            lineColor:'#e37306',
                        }
                    }
                }
            }]
        });
        $('#container1').highcharts({
            chart: {
                type: 'column',
                height:300,
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            credits : { //这里配置的是取消右下角  Highcharts版权连接 请允许我这么说
                enabled : false
            },
            exporting:{  //这里配置图表的导出功能为false 没有配置的时候 图表的的右上方会有一个导出的按钮
                enabled:false
            },
            xAxis: {
                type: 'category',
                tickWidth:0,
                title: {
                    text: '',
                    align:'high'
                },
                labels: {
                    style: {
                        //color:"red",
                        fontSize: '11px',
                        fontFamily: 'Verdana, sans-serif'
                    },
                    rotation:0  //x轴刻度值的倾斜程度
                },
                categories:[
                    '学习效果',
                    '时间和频率',
                    '学习进度',
                    '技能情况',
                    '学习方法'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    align: 'high',
                    offset: 0,
                    text: '分数',
                    y: 20,
                    rotation: 0,
                    style: {
                        color: '#17b6fe'
                    }
                },
                gridLineWidth: 0,
                visible: false,
                // gridLineColor:'#4aa85a',
                // gridLineDashStyle:'Dash'
            },

            credits: {
                enabled: false
            },
            legend:{
                enabled :false
            },
            tooltip: {
                useHTML: true,
                //headerFormat: '<div>分数:{point.y}人</div>',
                headerFormat: '', //如果不添加默认带有横坐标的信息描述
                pointFormat: '<b>{point.cont} </b>',
                style:{
                    padding:10,
                    whiteSpace: "nowrap",
                    width:$(window).width()*.8,
                    zIndex:99,
                }
            },

            series: [{
                // name: '总人口',
                data:[
                    {y:<?=$LearningSituationOverview['StudyReuslt']?>,cont:'<?=$LearningSituationOverview['StudyReusltString']?>'},
                    {y:<?=$LearningSituationOverview['StudyTimeAndFrequency']?>,cont:'<?=$LearningSituationOverview['StudyTimeAndFrequencyString']?>'},
                    {y:<?=$LearningSituationOverview['StudyCourseAverage']?>,cont:'<?=$LearningSituationOverview['StudyCourseAverageString']?>'},
                    {y:<?=$LearningSituationOverview['SkillAverage']?>,cont:'<?=$LearningSituationOverview['SkillAverageString']?>'},
                    {y:<?=$LearningSituationOverview['StudyComprehensive']?>,cont:'<?=$LearningSituationOverview['StudyComprehensiveString']?>'}
                ],
                dataLabels: {
                    enabled: true,
                    rotation: 0,
                    color: '#17b6fe',
                    align: 'center',
                    format: '{point.y}分', // one decimal
                    y: 0, // 10 pixels down from the top
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                },
                // data: [24,10,25,16,34,40,4,30],
                color:'#17b6fe',
                pointWidth:30
            }]
        });
    })
</script>
<script>
    $(document).ready(function () {
        $(".progressbar-wrapper").popover({
            trigger: 'click'
        });
    })
</script>
</body>
</html>