<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>英语学科发展服务网数据中心--学生</title>
    <?=$this->load->view("tmpl/meta")?>
    <?=$this->load->view("tmpl/echarts")?>
</head>
<body>
<?=$this->load->view("tmpl/header")?>
<div class="body-student">
    <div class="normal-wrapper">
        <div class="container">
<!--            <div class="select-group-end">-->
<!--                <select name="" id="" class="form-control">-->
<!--                    <option value="报告周期">报告周期</option>-->
<!--                </select>-->
<!--            </div>-->
        </div>
    </div>
    <div class="report-wrapper">
        <div class="title-wrapper">
            <div class="container">
                <h1 class="title"><?=date("Y年n月d日")?>学习数据报告</h1>
            </div>
        </div>
        <div class="container">
            <!--课程标签 start-->
            <div class="class-tags common-tags__student">
                <ul data-before="课程：" id="courses">
                    <?php foreach($courses as  $key=>$course):?>
                        <?php
                            if($course->isSelect ==0 ) continue;
                        ?>
                        <li <?php if($key == 0 ) echo 'class = active' ?> data-id="<?=$course->id?>"><a href="javascript:;"><?=$course->name?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <!--课程标签 end-->
            <!--单元标签 start-->
            <div class="unit-tags common-tags__student">
                <ul data-before="单元：" id="units">
                    <?php foreach($units as  $key=>$unit):?>
                        <li <?php if($key == 0 ) echo 'class = active' ?> data-id="<?=$unit->id?>"><a href="javascript:;"><?=$unit->name?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <!--单元标签 end-->
            <!--学习概况 start-->
            <div class="study-summary">
                <h1 class="title">学习概况</h1>
                <div class="study-summary__chart"  id="data1">

                </div>
            </div>
            <!--学习概况 end-->
            <!--维度详情 start-->
            <div class="dimension-details">
                <h1 class="title">各维度详情</h1>
                <!--学习效果 start-->
                <div class="study-effects">
                    <h2 class="title">学习效果</h2>
                    <div class="study-effects__chart" id="data2">

                    </div>
                </div>
                <!--学习效果 end-->
                <!--学习进度 start-->
                <div class="student-progress">
                    <h2 class="title">学习进度</h2>
                    <div class="total-progress">
                        <ul>
                            <li data-before="课程进度：" class="unit">
                                <div class="progress-bar">
                                    <div class="progress-bar__inner" style="width: <?=$progress_course*100?>%"></div>
                                </div>
                            </li>
                            <li data-before="单元进度：" class="lesson">
                                <div class="progress-bar">
                                    <div class="progress-bar__inner" style="width: <?=$progress_unit*100?>%"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
<!--                    <div class="ceil-progress" data-before="各单元学习进度">-->
<!--                        <ul>-->
<!--                            <li data-before="Unit：" class="unit">-->
<!--                                <div class="progress-bar">-->
<!--                                    <div class="progress-bar__inner"></div>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                            <li data-before="Lesson：" class="lesson">-->
<!--                                <div class="progress-bar">-->
<!--                                    <div class="progress-bar__inner"></div>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
                </div>
                <!--学习进度 end-->
                <div class="dimension-details__item">
                    <!--学习时间与频率 start-->
                    <div class="student-times" data-before="学习时间与频率">
                        <ul data-before="本周期间">
                            <li><span id="text1"></span></li>
                            <li><span id="text2"></span></li>
                        </ul>
                        <ul data-before="历史累计">
                            <li><span id="text3"></span></li>
                            <li><span id="text4"></span></li>
                        </ul>
                    </div>
                    <!--学习时间与频率 end-->
                    <!--功能键使用比 start-->
                    <div class="feature-percent" data-before="功能键使用比">
                        <ul data-before="本周期功能键使用得分">
                            <li><span id="text5"></span></li>
                            <li><span id="text6"></span></li>
                            <li><span id="text7"></span></li>
                        </ul>
                    </div>
                    <!--功能键使用比 end-->
                    <!--技能评价 start-->
                    <div class="skills-appraise" data-before="技能评价">
                        <ul data-before="本周期内各项技能评价如下">
                            <li><span id="text8"></span></li>
                            <li><span id="text9"></span></li>
                            <li><span id="text10"></span></li>
                        </ul>
                    </div>
                    <!--技能评价 end-->
                </div>
            </div>
            <!--维度详情 end-->
        </div>
    </div>
    <div class="report-wrapper">
        <div class="title-wrapper">
            <div class="container">
                <h1 class="title"><?=date("Y年n月d日")?>督导报告</h1>
            </div>
        </div>
        <div class="container">
            <div class="score-wrapper">
                <!--得分报表 start-->
                <div class="score-chart-wrapper">
                    <h1 class="title" id="totalScore"></h1>
                    <div class="score-chart" id="data3">

                    </div>
                </div>
                <!--得分报表 end-->
                <!--得分详情 start-->
                <div class="score-details">
                    <ul>
                        <li>
                            <p data-before="学习效果：" id="detail_1"></p>
                        </li>
                        <li>
                            <p data-before="时间和频率：" id="detail_2"></p>
                        </li>
                        <li>
                            <p data-before="学习进度：" id="detail_3"></p>
                        </li>
                        <li>
                            <p data-before="技能情况：" id="detail_4"></p>
                        </li>
                        <li>
                            <p data-before="学习方法：" id="detail_5">
                            </p>
                        </li>
                    </ul>
                </div>
                <!--得分详情 end-->
            </div>
        </div>
    </div>
</div>
<?=$this->load->view("tmpl/foot")?>
<script>
    $(function(){
        $(document).ready(function () {
            $(".data-left li").on('click', function () {
                var index = $(this).index();
                $(this).addClass('active').siblings().removeClass('active');
                $(".data-right .data-right_chart").eq(index).show().siblings().hide();

                if(index == 0) getData1();
                else if(index == 1) getData2();
                else if(index == 2) getData3();
            });
            $(".tm-lists").wePlatFormSlider({
                "ul": $(".tm-lists ul"),
                "li": $(".tm-lists li"),
                "margin": 10,
                control: true
            });
            $(".news-lists").wePlatFormSlider({
                "ul": $(".news-lists ul"),
                "li": $(".news-lists li"),
                "margin": 15,
            });
            function getData1(){
                var myChart1 = echarts.init(document.getElementById('data1'));
                // 指定图表的配置项和数据
                var  option1 = {
                    tooltip: {},
//                    legend: {
//                        data: ['预算分配（Allocated Budget）', '实际开销（Actual Spending）']
//                    },
                    radar: {
                        // shape: 'circle',
                        name: {
                            textStyle: {
                                color: '#fff',
                                backgroundColor: '#999',
                                borderRadius: 3,
                                padding: [3, 5]
                            }
                        },
                        indicator: [
                            { name: '学习效果', max: 20},
                            { name: '学习时间和学习频率）', max: 20},
                            { name: '学习进度', max: 20},
                            { name: '能力得分）', max: 20},
                            { name: '学习得分', max: 20},
                        ]
                    },
                    series: [{
                        name: '学习各技能得分',
                        type: 'radar',
                        // areaStyle: {normal: {}},
                        data : [
                            {
                                value : [<?=$LearningSituationOverview['StudyReuslt']?>, <?=$LearningSituationOverview['StudyTimeAndFrequency']?>, <?=$LearningSituationOverview['StudyCourseAverage']?>, <?=$LearningSituationOverview['SkillAverage']?>, <?=$LearningSituationOverview['StudyComprehensive']?>],
                                name : '学习各技能得分'
                            },
                        ]
                    }]
                };
                myChart1.setOption(option1);
            }
            getData1();


            function getData2(){
                var myChart2 = echarts.init(document.getElementById('data2'));
                $.get('<?=anchorurl("studentReport/getStudentdetail/")?>/').done(function (data) {
                    console.log(data);
                    data = JSON.parse(data);
                    myChart2.setOption({
                        tooltip: {},
                        radar: {
                            // shape: 'circle',
                            name: {
                                textStyle: {
                                    color: '#fff',
                                    backgroundColor: '#999',
                                    borderRadius: 3,
                                    padding: [3, 5]
                                }
                            },
                            indicator: [
                                { name: '完成率', max: 1},
                                { name: '达标率', max: 1},
                                { name: '课程进度', max: 1},
                                { name: 'MT平均分', max: 1},
                                { name: '语音识别率', max: 1},
                            ]
                        },
                        series: [{
                            name: '学习各技能得分',
                            type: 'radar',
                            // areaStyle: {normal: {}},
                            data : [
                                {
                                    value : data.result,
                                    name : '学习各技能得分'
                                },
                            ]
                        }]
                    });
                });
            }
            getData2();

            function getData3(){
                var myChart3 = echarts.init(document.getElementById('data3'));
                $.get('<?=anchorurl("studentReport/getLearningSituationOverview/")?>/').done(function (data) {
                    console.log(data);
                    data = JSON.parse(data);
                    //一部分渲染下部分数据
                    displayText(data);

                    myChart3.setOption({
                        xAxis: {
                            type: 'category',
                            boundaryGap: false,
                            data: data.dateLine
                        },
                        yAxis: {
                            type: 'value',
                            name:"H"
                        },
                        series: [{
                            data: data.dateLineValue,
                            name: '学习时间',
                            type: 'line',
                            areaStyle: {}
                        }]
                    });
                });
            }
            getData3();

            function displayText(data){

                $("#detail_1").html(data.LearningSituationOverview.StudyReusltString);
                $("#detail_2").html(data.LearningSituationOverview.StudyTimeAndFrequencyString);
                $("#detail_3").html(data.LearningSituationOverview.StudyCourseAverageString);
                $("#detail_4").html(data.LearningSituationOverview.SkillAverageString);
                $("#detail_5").html(data.LearningSituationOverview.StudyComprehensiveString);
                var totalScore = data.LearningSituationOverview.totalScores;
                if(totalScore < 60){
                    $("#totalScore").html('本周综合得分：<span class="txt">'+totalScore+'</span>分，排名在年级中处于较低水平，请努力学习!');

                }else if(totalScore > 60 && totalScore > 80 ){
                    $("#totalScore").html('本周综合得分：<span class="txt">'+totalScore+'</span>分，排名在年级中处于中游，请坚持学习！');
                }else {
                    $("#totalScore").html('本周综合得分：<span class="txt">'+totalScore+'</span>分，排名在年级中处于上游，请继续保持！');
                }


            }

        });

        function getStudentDetail(){
            $.ajax({
                type: "GET",
                async:false,
                dataType:"json",
                url:'<?=anchorurl('/studentReport/getStudentdetailText')?>',
                success: function (data){
                    console.log(data);
                    $("#text1").html("周有效学习天数："+data.result.AveragePerWeekDays+"天");
                    $("#text2").html("周有效学习时长："+data.result.AveragePerWeekTime+"小时");
                    $("#text3").html("累计有效学习天数："+data.result.UserRecordDataInfo.totalday+"天");
                    $("#text4").html("累计有效学习时长："+data.result.UserRecordDataInfo.totalTime+"小时");
                    $("#text5").html("重复键与文字键使用比："+data.result.UserRepeatRatioAbc);
                    $("#text6").html("录音键与回听键使用比："+data.result.UserMicRatioHead);
                    $("#text7").html("录音键与重复键使用比："+data.result.UserRepeatRatioMicRatioHead);
                    $("#text8").html("听力理解能力："+data.result.UserSkillListen)
                    $("#text9").html("口语能力："+data.result.UserSkillSPeak);
                    $("#text10").html("语法能力："+data.result.UserSkillGrammer);
                }
            });
        }
        getStudentDetail();

        $("#courses li").click(function(){
            $(this).addClass('active').siblings().removeClass('active');
            $.ajax({
                type: "GET",
                async:false,
                dataType:"json",
                url:'<?=anchorurl('/studentReport/getCourseUnits')?>/'+$(this).data("id"),
                success: function (data){
                    var string = "";
                    $(data.units).each(function(index,element){
                        if(index == 0){
                            string += '<li class="active"><a href="javascript:;" data-id="'+element.id+'">'+element.name+'</a></li>';
                        }else{
                            string += '<li><a href="javascript:;" data-id="'+element.id+'">'+element.name+'</a></li>';
                        }
                    });

                    $("#units").html(string);
                    $("#units li").click(function(){
                        $(this).addClass('active').siblings().removeClass('active');
                    });

                }
            });
        });

        $("#units li").click(function(){
            $(this).addClass('active').siblings().removeClass('active');
        });

    });
</script>
</body>
</html>