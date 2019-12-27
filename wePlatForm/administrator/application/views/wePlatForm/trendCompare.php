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
                    <li class="breadcrumb-item active" aria-current="page">趋势对比</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="ls--main__content" data-before="数据分析">
                <div class="select-group">
                    <div class="form-row">
                        <div class="col-4 form-row__item" data-before="选择区域：">
                            <select name="region_id" id="region_id" class="form-control form-control-sm">
<!--                                <option value="0">--选择区域--</option>-->
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
<!--                                <option value="0">--选择年级--</option>-->
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
                <div class="learn-behavior" data-before="登陆人数对比">
                    <div class="chart-wrapper">
                        <div id="main" style="width: 100%;height:400px;"></div>
                    </div>
                </div>
                <div class="learn-result" data-before="优秀率对比">
                    <div class="chart-wrapper">
                        <div id="Line1" style="width: 100%;height:400px;"></div>
                    </div>
                </div>
                <div class="learn-result" data-before="低分率">
                    <div class="chart-wrapper">
                        <div id="Line2" style="width: 100%;height:400px;"></div>
                    </div>
                </div>
                <div class="learn-result" data-before="平均分对比">
                    <div class="chart-wrapper">
                        <div id="Line3" style="width: 100%;height:400px;"></div>
                    </div>
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
                                getLowscoreScoreNumOfUser(element.id);
                                getAvgscoreScoreNumOfUser(element.id);
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
                                getLowscoreScoreNumOfUser(element.id);
                                getAvgscoreScoreNumOfUser(element.id);
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
                    getLowscoreScoreNumOfUser(0);
                    getAvgscoreScoreNumOfUser(0);
                }
            });

            $("#grade_id").change(function(){
                gettotalScoreNumOfUser($(this).val());
                getColligationScoreNumOfUser($(this).val());
                getLowscoreScoreNumOfUser($(this).val());
                getAvgscoreScoreNumOfUser($(this).val());
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
            myChart1.clear();
            $.get('<?=anchorurl("analysis/gettotalLoginUserOfUser/")?>/'+grade_id,{school_id: $("#school_id").val(),region_id:$("#region_id").val()}).done(function (data) {
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
        }
        //综合得分
        function getColligationScoreNumOfUser(grade_id){
            if(myChart2 == null){
                myChart2 =echarts.init(document.getElementById('Line1'));
            }
            myChart2.clear();
            $.get('<?=anchorurl("analysis/gettotalOutstandingUserOfUser/")?>/'+grade_id,{school_id: $("#school_id").val(),region_id:$("#region_id").val()}).done(function (data) {
                data = JSON.parse(data);
                myChart2.setOption({
                    tooltip : {
                        trigger: 'axis',
                        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                        }
                    },
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
        }
//        function getLowscoreScoreNumOfUser(grade_id){
//            if(myChart3 == null){
//                myChart3 =echarts.init(document.getElementById('Line2'));
//            }
//            $.get('<?//=anchorurl("analysis/getLowscoreScoreNumOfUser/")?>///'+grade_id,{school_id: $("#school_id").val(),region_id:$("#region_id").val()}).done(function (data) {
//                data = JSON.parse(data);
//                myChart3.setOption({
//                    tooltip : {
//                        trigger: 'axis',
//                        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
//                            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
//                        }
//                    },
//                    legend: {
//                        data: data.className
//                    },
//                    grid: {
//                        left: '3%',
//                        right: '4%',
//                        bottom: '3%',
//                        containLabel: true
//                    },
//                    xAxis:  {
//                        type: 'category',
//                        data: data.dates
//                    },
//                    yAxis: {
//                        type: 'value'
//                    },
//                    series: data.series
//                });
//            });
//        }


        function getLowscoreScoreNumOfUser(grade_id){
            if(myChart3 == null){
                myChart3 =echarts.init(document.getElementById('Line2'));
            }
            myChart3.clear();
            $.get('<?=anchorurl("analysis/getLowscoreScoreNumOfUser/")?>/'+grade_id,{school_id: $("#school_id").val(),region_id:$("#region_id").val()}).done(function (data) {
                data = JSON.parse(data);
                myChart3.setOption({
                    tooltip : {
                        trigger: 'axis',
                        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                        }
                    },
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
        }


        function getAvgscoreScoreNumOfUser(grade_id){
            if(myChart4 == null){
                myChart4 =echarts.init(document.getElementById('Line3'));
            }
            myChart4.clear();
            $.get('<?=anchorurl("analysis/getAvgscoreScoreNumOfUser/")?>/'+grade_id,{school_id: $("#school_id").val(),region_id:$("#region_id").val()}).done(function (data) {
                data = JSON.parse(data);
                myChart4.setOption({
                    tooltip : {
                        trigger: 'axis',
                        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                        }
                    },
                    xAxis: {
                        type: 'category',
                        data: data.className
                    },
                    yAxis: {
                        type: 'value'
                    },
                    series : [
                        {
                            name:'班级平均分',
                            type:'bar',
                            barWidth: '60%',
                            data:data.scores,
                        }
                    ]
                });
            });
        }

        gettotalScoreNumOfUser(0);
        getColligationScoreNumOfUser(0);
        getLowscoreScoreNumOfUser(0);
        getAvgscoreScoreNumOfUser(0);

    </script>
</body>
</html>
