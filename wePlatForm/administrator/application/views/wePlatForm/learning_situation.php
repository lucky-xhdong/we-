<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php $this->load->view('wePlatForm/tmpl/title'); ?>
    <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
    <?php $this->load->view('wePlatForm/meta'); ?>
    <?php $this->load->view('tmpl/mmgrid');?>
    <?php $this->load->view('tmpl/fileupload');?>
    <?php $this->load->view('wePlatForm/tmpl/echarts'); ?>
</head>
<body>
<div class="container-fluid LearningSituation">
    <div class="row">
        <!-- 左侧菜单 start -->
        <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
        <!-- 左侧菜单 end -->
        <div class="col-md-9 ls--main-wrapper">
            <!--菜单切换 start-->
            <?=$this->load->view("wePlatForm/tmpl/headernav")?>
            <!--菜单切换 end-->
            <!--面包屑 start-->
            <nav class="common-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
                    <li class="breadcrumb-item active" aria-current="page">学情分析</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="ls--main__content" data-before="数据分析">
                <div class="select-group">
                    <div class="form-row">
                        <div class="col-4 form-row__item" data-before="选择区域：">
                            <select name="region_id" id="region_id" class="form-control form-control-sm">
                                <?php foreach($regions as $region):?>
                                    <option value="<?=$region->id?>"><?=$region->name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-4 form-row__item" data-before="选择学校：">
                            <select name="school_id" id="school_id" class="form-control form-control-sm">
                                <option value="0">-请选择学校-</option>
                                <?php foreach($schools as $school):?>
                                    <option value="<?=$school->id?>"><?=$school->name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-4 form-row__item" data-before="选择年级：">
                            <select name="grade_id" id="grade_id" class="form-control form-control-sm">
                                <option value="0">--选择年级--</option>
                                <?php foreach($grades as $grade):?>
                                    <option value="<?=$grade->id?>"><?=$grade->name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

<!--                        <select name="class_id" id="class_id" class="col-md-2 form-control form-row__item">-->
<!--                            <option value="0">--选择班级--</option>-->
<!--                            --><?php //foreach($classes as $classe):?>
<!--                                <option value="--><?//=$classe->id?><!--">--><?//=$classe->name?><!--</option>-->
<!--                            --><?php //endforeach;?>
<!--                        </select>-->
<!--                        <select name="grade_id" id="grade_id" class="col-md-2 form-control form-row__item">-->
<!--                            <option value="请选择年级">请选择</option>-->
<!--                        </select>-->
                    </div>
                </div>
                <div class="learn-behavior" data-before="学业等级分布">

                    <div class="chart-wrapper" id="main" style="width: 100%;height:400px;"></div>
                </div>
                <div class="learn-result" data-before="学习计划达标率">
                    <div class="chart-wrapper" id="Line" style="width: 100%;height:400px;"></div>
                </div>
                <div class="learn-result" data-before="综合得分">
                    <div class="chart-wrapper" id="Line1" style="width: 100%;height:400px;"></div>
                </div>
                <div class="learn-result" data-before="优秀学生数">
                    <div class="chart-wrapper" id="Line2" style="width: 100%;height:400px;"></div>
                </div>
            </div>
            <!--主体内容 end-->
        </div>
    </div>
    <script type="text/javascript">
        var myChart1 = null;
        var myChart2 = null;
        var myChart3 = null;
        var myChart4 = null;
        $(document).ready(function(e) {
            $("#startTime").datepicker({
                format: 'yyyy-mm-dd'
            });
            $("#endTime").datepicker({
                format: 'yyyy-mm-dd'
            });
            $("#region_id").change(function(){
                $.ajax({
                    url: "<?=anchorurl('analysis/getRegionSchoolList')?>/"+$(this).val(),
                    type: "get",
                    dataType: 'json',
                    async: false,
                    success: function (data, textstatus) {
                        var string = ' <option value="0">-请选择学校-</option>';
                        $(data.schools).each(function(index,element){
                            string += '<option value="'+element.id+'">'+element.name+'</option>';
                        });
                        $("#school_id").html(string);

                        var string2 = "";
                        $(data.grades).each(function(index1,element){
                            string2 += '<option value="'+element.id+'">'+element.name+'</option>';
                            if(index1 == 0){
                                gettotalScoreNumOfUser(element.id);
                                getColligationScoreNumOfUser(element.id);
                                getGoodScoreNumOfUser(element.id);
                                getPlanScoreNumOfUser(element.id);
                            }
                        });
                        $("#grade_id").html(string2);
//                        var string3 = "";
//                        $(data.classes).each(function(index,element){
//                            string3 += '<option value="'+element.id+'">'+element.name+'</option>';
//                        });
//                        $("#class_id").html(string3);
                    }
                });
            });

            $("#school_id").change(function(){

                if($(this).val() != 0){
                    $.ajax({
                        url: "<?=anchorurl('analysis/getSchoolGradeList')?>/"+$(this).val(),
                        type: "get",
                        dataType: 'json',
                        async: false,
                        success: function (data, textstatus) {
                            var string2 = "";
                            $(data.grades).each(function(index,element){
                                string2 += '<option value="'+element.id+'">'+element.name+'</option>';
                                if(index == 0){
                                    gettotalScoreNumOfUser(element.id);
                                    getColligationScoreNumOfUser(element.id);
                                    getGoodScoreNumOfUser(element.id);
                                    getPlanScoreNumOfUser(element.id);
                                }
                            });
                            $("#grade_id").html(string2);
//                        var string3 = "";
//                        $(data.classes).each(function(index,element){
//                            string3 += '<option value="'+element.id+'">'+element.name+'</option>';
//                        });
//                        $("#class_id").html(string3);
                        }
                    });
                }else{
                    gettotalScoreNumOfUser(0);
                    getColligationScoreNumOfUser(0);
                    getGoodScoreNumOfUser(0);
                    getPlanScoreNumOfUser(0);
                }

            });

            $("#grade_id").change(function(){
                gettotalScoreNumOfUser($(this).val());
                getColligationScoreNumOfUser($(this).val());
                getGoodScoreNumOfUser($(this).val());
                getPlanScoreNumOfUser($(this).val());
//                $.ajax({
//                    url: "<?//=anchorurl('analysis/getGradeClassList')?>///"+$(this).val(),
//                    type: "get",
//                    dataType: 'json',
//                    async: false,
//                    success: function (data, textstatus) {
//                        var string3 = "";
//                        $(data.classes).each(function(index,element){
//                            string3 += '<option value="'+element.id+'">'+element.name+'</option>';
//                        });
//                        $("#class_id").html(string3);
//                    }
//                });
            });
        });
        function gettotalScoreNumOfUser(grade_id){
            if(myChart1 == null){
                myChart1 = echarts.init(document.getElementById('main'));
            }
            $.get('<?=anchorurl("analysis/gettotalScoreNumOfUser/")?>/'+grade_id,{school_id: $("#school_id").val(),region_id:$("#region_id").val()}).done(function (data) {
                console.log(data);
                data = JSON.parse(data);
                myChart1.setOption({
                    tooltip : {
                        trigger: 'axis',
                        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                        }
                    },
                    legend: {
                        data: ['优秀','良好','及格','不及格']
                    },
                    grid: {
                        left: '3%',
                        right: '4%',
                        bottom: '3%',
                        containLabel: true
                    },
                    xAxis:  {
                        type: 'category',
                        data: data.className
                    },
                    yAxis: {
                        type: 'value'
                    },
                    series: [
                        {
                            name: '优秀',
                            type: 'bar',
                            stack: '总量',
                            label: {
                                normal: {
                                    show: true,
                                    position: 'insideRight'
                                }
                            },
                            data: data.excellent
                        },
                        {
                            name: '良好',
                            type: 'bar',
                            stack: '总量',
                            label: {
                                normal: {
                                    show: true,
                                    position: 'insideRight'
                                }
                            },
                            data: data.good
                        },
                        {
                            name: '及格',
                            type: 'bar',
                            stack: '总量',
                            label: {
                                normal: {
                                    show: true,
                                    position: 'insideRight'
                                }
                            },
                            data:data.pass
                        },
                        {
                            name: '不及格',
                            type: 'bar',
                            stack: '总量',
                            label: {
                                normal: {
                                    show: true,
                                    position: 'insideRight'
                                }
                            },
                            data: data.Fail
                        }
                    ]
                });
            });
        }
        //综合得分
        function getColligationScoreNumOfUser(grade_id){
            if(myChart2 == null){
                myChart2 =echarts.init(document.getElementById('Line1'));
            }
            $.get('<?=anchorurl("analysis/getColligationScoreNumOfUser/")?>/'+grade_id,{school_id: $("#school_id").val(),region_id:$("#region_id").val()}).done(function (data) {
                data = JSON.parse(data);
                myChart2.setOption({
//                    title : {
//                        text: '班级综合得分',
//                        subtext: '班级综合得分'
//                    },
                    tooltip : {
                        trigger: 'axis'
                    },
                    legend: {
                        data:['综合得分']
                    },
                    toolbox: {
                        show : true,
//                        feature : {
//                            dataView : {show: true, readOnly: false},
//                            magicType : {show: true, type: ['line', 'bar']},
//                            restore : {show: true},
//                            saveAsImage : {show: true}
//                        }
                    },
                    calculable : true,
                    xAxis : [
                        {
                            type : 'category',
                            data : data.className
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : [
                        {
                            name:'综合得分',
                            type:'bar',
                            data:data.scores,
                            markPoint : {
                                data : [
                                    {type : 'max', name: '最大值'},
                                    {type : 'min', name: '最小值'}
                                ]
                            },
                            markLine : {
                                data : [
                                    {type : 'average', name: '平均值'}
                                ]
                            }
                        },

                    ]
                });
            });
        }

        function getGoodScoreNumOfUser(grade_id){
            if(myChart3 == null){
                 myChart3 = echarts.init(document.getElementById('Line2'));
            }
            $.get('<?=anchorurl("analysis/getGoodScoreNumOfUser/")?>/'+grade_id,{school_id: $("#school_id").val(),region_id:$("#region_id").val()}).done(function (data) {
                data = JSON.parse(data);
                myChart3.setOption({
//                    title : {
//                        text: '优秀学生数',
//                        subtext: '优秀学生数'
//                    },
                    tooltip : {
                        trigger: 'axis'
                    },
                    legend: {
                        data:['优秀学生数']
                    },
                    toolbox: {
                        show : true,
//                        feature : {
//                            dataView : {show: true, readOnly: false},
//                            magicType : {show: true, type: ['line', 'bar']},
//                            restore : {show: true},
//                            saveAsImage : {show: true}
//                        }
                    },
                    calculable : true,
                    xAxis : [
                        {
                            type : 'category',
                            data : data.className
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : [
                        {
                            name:'优秀学生数',
                            type:'bar',
                            data:data.nums,
                            markPoint : {
                                data : [
                                    {type : 'max', name: '最大值'},
                                    {type : 'min', name: '最小值'}
                                ]
                            },
                            markLine : {
                                data : [
                                    {type : 'average', name: '平均值'}
                                ]
                            }
                        },

                    ]
                });
            });
        }
        function getPlanScoreNumOfUser(grade_id){
            if(myChart4 == null){
                myChart4 = echarts.init(document.getElementById('Line'));
            }
            myChart4.clear();
            $.get('<?=anchorurl("analysis/getPlanScoreNumOfUser/")?>/'+grade_id,{school_id: $("#school_id").val(),region_id:$("#region_id").val()}).done(function (data) {
                console.log(11111);
               data = JSON.parse(data);
                myChart4.setOption({
                    tooltip : {
                        trigger: 'axis',
                        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                        }
                    },
                    calculable : true,
                    legend: {
                        data: data.className
                    },
                    grid: {
                        left: '3%',
                        right: '4%',
                        bottom: '3%',
                        containLabel: true
                    },
                    xAxis:  {
                        type: 'category',
                        data: data.dates
                    },
                    yAxis: {
                        type: 'value'
                    },
                    series: data.series
                });
            });
           // myChart4.refresh();
        }
        getPlanScoreNumOfUser($("#grade_id").val());
        gettotalScoreNumOfUser($("#grade_id").val());
        getColligationScoreNumOfUser($("#grade_id").val());
        getGoodScoreNumOfUser($("#grade_id").val());
    </script>
</body>
</html>
