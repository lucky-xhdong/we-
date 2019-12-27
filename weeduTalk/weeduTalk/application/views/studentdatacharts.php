<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta charset = "utf-8">
    <title>学生学习数据--<?=$user->name?></title>
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
<div class="class-info pag-10">
    <div class="class-info-top bg-f pag-10">
        <h1 class="tit-nor">个人学情概览</h1>
        <div class="class-grade">
            <span><?=(int)$LearningSituationOverview['totalScores']?><em>分</em></span>
            <div>
                这里是智能辅导，说一点你的学习情况和建议吧。你以后要如何学习？你根据智能辅导改变自己的学习计划，坚持就是胜利。
            </div>
        </div>
    </div>
    <div class="class-cont">
        <div id="container1"></div>
    </div>
</div>
<script type="text/javascript" src="<?=base_url()?>media/administrator/libs/jquery/jquery/dist/jquery-1.10.2.min.js"></script>
<script src="<?=base_url()?>media/administrator/heightchart/highcharts.js"></script>
<script src="<?=base_url()?>media/media/administrator/heightchart/highcharts-more.js"></script>
<script src="<?=base_url()?>media/administrator/heightchart/modules/exporting.js"></script>
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
</body>
</html>