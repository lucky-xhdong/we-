<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>英语学科发展服务网</title>
    <?=$this->load->view("tmpl/meta")?>
    <?=$this->load->view("tmpl/echarts")?>
</head>
<body>
<?=$this->load->view("tmpl/header")?>
<div class="wrapper ">
    <div class="banner-regional">
        <img src="<?=base_url()?>media/wePlatForm/images/banner-regional.jpg" alt="img">
    </div>
    <div class="regional-container">
        <p class="banner-regional-txt1">英语学科</p>
        <p class="banner-regional-txt2">发展服务平台</p>
    </div>
</div>
<div class="wrapper1">
    <div class="container regional-container">
        <!--领导寄语 start-->
        <div class="leader-message">
            <div class="lm_left">
                <a href="javascript:;">
                    <?php
                        $bg_url = $region->getFileBgUrl();
                    ?>
                    <?php if(!empty($bg_url)):?>
                      <img src="<?=$bg_url?>" alt="">
                    <?php else:?>
                        <img src="<?=base_url()?>media/wePlatForm/images/img-cases.jpg" alt="">
                    <?php endif;?>
                </a>
            </div>
            <div class="lm_right">
                <div class="title-wrapper">
                    <h2 class="title">
                        <i class="icon icon-leader-o"></i>
                        <span class="txt">领导寄语</span>
                    </h2>
                </div>
                <?php
                    $leaders = $region->getRegionUserBody();
                ?>
                <div class="content-wrapper">
                    <p class="txt"><?php if(count($leaders) >0) echo $leaders[0]->getUserBody();?></p>
                    <p class="txt-name">----<?php if(count($leaders)) echo $leaders[0]->name;?></p>
                </div>
            </div>
        </div>
        <!--领导寄语 end-->
    </div>
</div>
<div class="wrapper2">
    <div class="container regional-container">
        <!--教研员寄语 start-->
        <div class="teacher-message">
            <h2 class="title">
                <i class="icon icon-teachers"></i>
                <span class="txt">教研员寄语</span>
            </h2>
            <div class="tm-lists">
                <div class="tm-lists_slider">
                    <ul>
                        <?php
                            $instructors = $region->getRegionUserBody("instructor");
                        ?>
                        <?php foreach($instructors as $instructor):?>
                        <li>
                            <div class="tm-lists_userinfo">
                                <div class="ui-avatar">
                                    <a href="javascript:;"><img src="<?=base_url()?>media/wePlatForm/images/img-cases.jpg" alt=""></a>
                                </div>
                                <div class="ui-name">
                                    <span class="txt"><?=$instructor->name?></span>
                                </div>
                            </div>
                            <div class="tm-lists_txt">
                                <p class="txt"><?=$instructor->getUserBody()?></p>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
        <!--教研员寄语 end-->
    </div>
</div>
<div class="wrapper3">
    <div class="container regional-container">
        <!--新闻动态 start-->
        <div class="regional-news">
            <div class="news-lists">
                <ul>
                    <?php foreach($articles as $article):?>
                    <li>
                        <a href="<?=anchorurl("show/index/".$article->id)?>">
                            <img src="<?=$article->picture_url?>" alt="">
                        </a>
                        <div class="news-lists_mask">
                            <a href="<?=anchorurl("show/index/".$article->id)?>" class="txt"><?=$article->title?></a>
                        </div>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
        <!--新闻动态 end-->
    </div>
</div>
<div class="wrapper4">
    <div class="container regional-container">
        <!--数据动态 start-->
        <div class="regional-data">
            <h2 class="title">
                <i class="icon icon-chart-pie"></i>
                <span class="txt">数据动态</span>
            </h2>
            <div class="data-wrapper">
                <div class="data-left">
                    <ul>
                        <li class="active"><a href="javascript:;">使用数据</a></li>
                        <li><a href="javascript:;">学情分析</a></li>
<!--                        <li><a href="javascript:;">对比数据</a></li>-->
                    </ul>
                </div>
                <div class="data-right">
                    <div class="data-right_chart1 data-right_chart">
                        <div class="tabs">
                            <div class="tabs-nav">
                                <ul>
                                    <li class="active" data-type="studentcount"><a href="javascript:;">学生数量</a></li>
                                    <li data-type="teachercount"><a href="javascript:;" >老师数量</a></li>
                                    <li data-type="resourcecount"><a href="javascript:;" >资源与教师成果</a></li>
                                </ul>
                            </div>
                            <div class="tabs-con">
                                <div class="tabs-con__item tabs-con__item1" id="data1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="data-right_chart2 data-right_chart">
                        <div class="tabs">
                            <div class="tabs-nav">
                                <ul>
                                    <li class="active" data-type="xuexilevel"><a href="javascript:;">学业等级</a></li>
                                    <li data-type="youxiustudent"><a href="javascript:;">优秀学生数</a></li>
                                </ul>
                            </div>
                            <div class="tabs-con">
                                <div class="tabs-con__item tabs-con__item1" id="data2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="data-right_chart3 data-right_chart">
                        <div class="tabs">
                            <div class="tabs-nav">
                                <ul>
                                    <li class="active" data-type="youxiulv"><a href="javascript:;">优秀学生</a></li>
                                    <li data-type="zonghescore"<a href="javascript:;">综合得分</a></li>
                                </ul>
                            </div>
                            <div class="tabs-con">
                                <div class="tabs-con__item tabs-con__item1" id="data3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--数据动态 start-->
    </div>
</div>
<div class="wrapper5">
    <div class="container regional-container">
        <!--优秀案例 start-->
        <div class="regional-cases">
            <div class="cases-lists">
                <h2 class="title">
                    <i class="icon icon-case"></i>
                    <span class="txt">优秀案例</span>
                </h2>
                <ul id="school-list">
                    <?php foreach($schools as $school):?>
                    <li class="cases-lists_item">
                        <a href="<?=anchorurl("schools/index/".$school->id)?>">
                        <img src="<?=$school->getFileUrl()?>" alt="" >
                        </a>
                        <div class="cases-lists_mask">
                            <div class="txt-group">
                                <p class="txt"><?=$school->name?></p>
                                <a href="<?=anchorurl("schools/index/".$school->id)?>" class="link">查看更多<i class="icon"></i></a>
                            </div>
                        </div>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="common-page"> <ul id="pageLimit"></ul> </div>
        </div>
        <!--优秀案例 start-->
    </div>
</div>
<?=$this->load->view("tmpl/foot")?>
<script>
    $(function(){
        tabBox({});
        tabBox({box:'.news-abbr-table',carousel:true});
    })
    $(document).ready(function () {
        $(".data-left li").on('click', function () {
            var index = $(this).index();
            $(this).addClass('active').siblings().removeClass('active');
            $(".data-right .data-right_chart").eq(index).show().siblings().hide();

            if(index == 0) getData1("studentcount");
            else if(index == 1) getData2("xuexilevel");
            else if(index == 2) getData3();
        });
        $(".tabs-nav li").on('click', function () {
            var index = $(this).index();
            $(this).addClass('active').siblings().removeClass('active');
            var type = $(this).data("type");
            if(type == "studentcount" || type == "teachercount" || type == "resourcecount"){
                getData1(type);
               // alert(1);
            }else if(type == "xuexilevel" || type == "youxiustudent"){
                getData2(type);
                // alert(1);
            }
            //$(".tabs-con .tabs-con__item").eq(index).show().siblings().hide();
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
        function getData1(type){
            var myChart1 = echarts.init(document.getElementById('data1'),"light");
            if(type == "studentcount"){
               var url = '<?=anchorurl("regional/getStudentCount/".$region->id)?>';
                var string = "学生数量";
            }else if(type == "teachercount"){
                var url = '<?=anchorurl("regional/getTeacherCount/".$region->id)?>';
                var string = "教师数量";
            }else{
                var url = '<?=anchorurl("regional/getRescorceCount/".$region->id)?>';
                var string = "资源与教师成果";
            }
            $.get(url).done(function (data) {
                console.log(data);
                data = JSON.parse(data);
                myChart1.setOption({
                    color: ['#3398DB'],
                    tooltip : {
                        trigger: 'axis',
                        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                        }
                    },
                    grid: {
                        left: '3%',
                        right: '4%',
                        bottom: '3%',
                        containLabel: true
                    },
                    xAxis : [
                        {
                            type : 'category',
                            data :data.SchoolName,
                            axisTick: {
                                alignWithLabel: true
                            }
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : [
                        {
                            name:string,
                            type:'bar',
                            barWidth: '60%',
                            data:data.studentCount
                        }
                    ]
                });
            });
        }

        getData1("studentcount");

        function getData2(type){
            var myChart2 = echarts.init(document.getElementById('data2'));
            // 指定图表的配置项和数据
            if(type == "xuexilevel"){
                var url = '<?=anchorurl("regional/getStudentlevel/".$region->id)?>';
                var string = "学生数量";
            }else if(type == "youxiustudent"){
                var url = '<?=anchorurl("regional/getStudentyouxie/".$region->id)?>';
                var string = "学生数量";
            }else{
                var url = '<?=anchorurl("regional/getStudentyouxie/".$region->id)?>';
                var string = "学生数量";
            }
            $.get(url).done(function (data) {
                console.log(data);
                data = JSON.parse(data);
                myChart2.setOption({
                    color: ['#3398DB'],
                    tooltip : {
                        trigger: 'axis',
                        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                        }
                    },
                    grid: {
                        left: '3%',
                        right: '4%',
                        bottom: '3%',
                        containLabel: true
                    },
                    xAxis : [
                        {
                            type : 'category',
                            data :data.SchoolName,
                            axisTick: {
                                alignWithLabel: true
                            }
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : [
                        {
                            name:string,
                            type:'bar',
                            barWidth: '60%',
                            data:data.nums
                        }
                    ]
                });
            });
        }

        function getData3(){
            var myChart3 = echarts.init(document.getElementById('data3'));
            // 指定图表的配置项和数据
            var url = '<?=anchorurl("regional/getStudentCompareyouxie/".$region->id)?>';
            var string = "学生数量";
            $.get(url).done(function (data) {
                console.log(data);
                data = JSON.parse(data);
                myChart3.setOption({
                    color: ['#3398DB'],
                    tooltip : {
                        trigger: 'axis',
                        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                        }
                    },
                    grid: {
                        left: '3%',
                        right: '4%',
                        bottom: '3%',
                        containLabel: true
                    },
                    xAxis : [
                        {
                            type : 'category',
                            data :data.SchoolName,
                            axisTick: {
                                alignWithLabel: true
                            }
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : [
                        {
                            name:string,
                            type:'bar',
                            barWidth: '60%',
                            data:data.nums
                        }
                    ]
                });
            });
        }
        $('#pageLimit').bootstrapPaginator({
            currentPage: 1,
            totalPages: <?=$totalPages?>,
            size: "normal",
            bootstrapMajorVersion: 3,
            alignment: "right",
            numberOfPages: 8,
            itemTexts: function (type, page, current) {
                switch (type) {
                    case "first":
                        return "首页";
                    case "prev":
                        return "上一页";
                    case "next":
                        return "下一页";
                    case "last":
                        return "末页";
                    case "page":
                        return page;
                }//默认显示的是第一页。
            },
            //给每个页眉绑定一个事件，其实就是ajax请求，其中page变量为当前点击的页上的数字。
            onPageClicked: function (event, originalEvent, type, page) {
                $.ajax({
                    url: '<?=anchorurl("regional/getSchoolList/".$region->id)?>',
                    type: 'POST',
                    data: {
                        'page': page,
                        'count': 6
                    },
                    success: function (data) {
                        $("#school-list").html(data);
                    }
                })
            }
        });
    })
</script>
</body>
</html>