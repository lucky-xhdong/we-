<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php $this->load->view('wePlatForm/tmpl/title'); ?>
    <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
    <?php $this->load->view('wePlatForm/meta'); ?>
    <?php $this->load->view('tmpl/mmgrid');?>
    <?php $this->load->view('tmpl/fileupload');?>
    <?php $this->load->view('tmpl/jqueryvalidate');?>
</head>
<body>
<div class="container-fluid EarlyWarning">
    <div class="row">
        <!-- 左侧菜单 start -->
        <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
        <!-- 左侧菜单 end -->
        <div class="col-md-9 ew--main-wrapper">
            <!--菜单切换 start-->
            <?=$this->load->view("wePlatForm/tmpl/headernav")?>
            <!--菜单切换 end-->
            <!--面包屑 start-->
            <nav class="common-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
                    <li class="breadcrumb-item active" aria-current="page">示范与预警</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="ew--main__content" data-before="示范与预警">
                <!--选择下拉框 start-->
                <div class="select-group">
                    <div class="form-row">
                        <div class="col-md-4 form-row__item" data-before="区域：">
                            <select name="region_id" id="region_id" class="form-control form-control-sm">
<!--                                <option value="0">--选择区域--</option>-->
                                <?php foreach($regions as $region):?>
                                    <option value="<?=$region->id?>"><?=$region->name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-4 form-row__item" data-before="学校：">
                            <select name="school_id" id="school_id" class="form-control form-control-sm">
                                <option value="0">--选择学校--</option>
                                <?php foreach($schools as $school):?>
                                    <option value="<?=$school->id?>"><?=$school->name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 form-row__item" data-before="年级：">
                            <select name="grade_id" id="grade_id" class="form-control form-control-sm">
                                <option value="0">--选择年级--</option>
                                <?php foreach($grades as $grade):?>
                                    <option value="<?=$grade->id?>"><?=$grade->name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-4 form-row__item" data-before="班级：">
                            <select name="class_id" id="class_id" class="form-control form-control-sm">
                                <option value="0">--选择班级--</option>
                                <?php foreach($classes as $classe):?>
                                    <option value="<?=$classe->id?>"><?=$classe->name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <!--选择下拉框 end-->
                <!--示范管理 start-->

                <div id="userdata">


                <div class="demonstration-manage" data-before="示范管理">
                    <ul>
                        <li class="moudle moudle1">
                            <div class="moudle-top">
                                <span class="moudle-top_txt">优秀学生数</span>
<!--                                <a href="javascript:;" class="moudle-top_link">下载</a>-->
                            </div>
                            <div class="moudle-bottom">
                                <p class="moudle-bottom_txt" id="good_user"></p>
                            </div>
                        </li>
                        <li class="moudle moudle2">
                            <div class="moudle-top">
                                <span class="moudle-top_txt">连续三次优秀学生数</span>
<!--                                <a href="javascript:;" class="moudle-top_link">下载</a>-->
                            </div>
                            <div class="moudle-bottom">
                                <p class="moudle-bottom_txt" id="good_user_three"></p>
                            </div>
                        </li>
                        <li class="moudle moudle3">
                            <div class="moudle-top">
                                <span class="moudle-top_txt">学习计划达标学生数</span>
<!--                                <a href="javascript:;" class="moudle-top_link">下载</a>-->
                            </div>
                            <div class="moudle-bottom">
                                <p class="moudle-bottom_txt" id="good_plan_user_count"></p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--示范管理 end-->
                <!--预警管理 start-->
                <div class="waining-manage" data-before="预警管理">
                    <ul>
                        <li>
                            <a href="javascript:;" class="btn-download">
<!--                                <i class="icon icon-download"></i>-->
                            </a>
                            <p data-after="学习计划不达标人数" class="txt" id="not_good_user_count"></p>
                        </li>
                        <li>
                            <a href="javascript:;" class="btn-download">
<!--                                <i class="icon icon-download"></i>-->
                            </a>
                            <p data-after="未登录学生人数" class="txt" id="no_login_count"></p>
                        </li>
                        <li>
                            <a href="javascript:;" class="btn-download">
<!--                                <i class="icon icon-download"></i>-->
                            </a>
                            <p data-after="综合成绩下降10名学生" class="txt" id="poor_user_count"></p>
                        </li>
                        <li>
                            <a href="javascript:;" class="btn-download">
<!--                                <i class="icon icon-download"></i>-->
                            </a>
                            <p data-after="学习时长下降20%学生" class="txt" id="poor_user_count_20"></p>
                        </li>
                    </ul>
                </div>
                </div>
                <!--预警管理 end-->
            </div>
            <!--主体内容 end-->
        </div>
    </div>
    <script type="text/javascript">

        $(document).ready(function(e) {
            $("#region_id").change(function(){
                $.ajax({
                    url: "<?=anchorurl('analysis/getRegionSchoolList')?>/"+$(this).val(),
                    type: "get",
                    dataType: 'json',
                    async: false,
                    success: function (data, textstatus) {
                        var string = '';
                        $(data.schools).each(function(index,element){
                            string += '<option value="'+element.id+'">'+element.name+'</option>';
                        });
                        $("#school_id").html(string);

                        var string2 = "";
                        $(data.grades).each(function(index1,element){
                            string2 += '<option value="'+element.id+'">'+element.name+'</option>';
                        });
                        $("#grade_id").html(string2);

                        var string3 = "";
                        $(data.classes).each(function(index,element){
                            string3 += '<option value="'+element.id+'">'+element.name+'</option>';
                        });
                        $("#class_id").html(string3);
                        getData();
                    }
                });
            });

            $("#school_id").change(function(){
                $.ajax({
                    url: "<?=anchorurl('analysis/getSchoolGradeList')?>/"+$(this).val(),
                    type: "get",
                    dataType: 'json',
                    async: false,
                    success: function (data, textstatus) {
                        var string2 = "";
                        $(data.grades).each(function(index,element){
                            string2 += '<option value="'+element.id+'">'+element.name+'</option>';
                        });
                        $("#grade_id").html(string2);
                        var string3 = "";
                        $(data.classes).each(function(index,element){
                            string3 += '<option value="'+element.id+'">'+element.name+'</option>';
                        });
                        $("#class_id").html(string3);
                        getData();
                    }
                });
            });

            $("#grade_id").change(function(){
                $.ajax({
                    url: "<?=anchorurl('analysis/getGradeClassList')?>/"+$(this).val(),
                    type: "get",
                    dataType: 'json',
                    async: false,
                    success: function (data, textstatus) {
                        var string3 = "";
                        $(data.classes).each(function(index,element){
                            string3 += '<option value="'+element.id+'">'+element.name+'</option>';
                        });
                        $("#class_id").html(string3);
                        getData();
                    }
                });
            });
        });

        $("#class_id").change(function(){
            getData();
        });

        function getData(){
            $.ajax({
                url: "<?=anchorurl('analysis/getWaringData')?>/",
                type: "POST",
                dataType: 'json',
                async: false,
                beforeSend:function(){
                    $("#userdata").showLoading();
                },
                data:{
                    school_id:$("#school_id").val(),
                    grade_id:$("#grade_id").val(),
                    class_id:$("#class_id").val(),

                },
                success: function (data, textstatus) {
                    $("#userdata").hideLoading();
                    $('#good_user').html(data.good_user);
                    $('#good_user_three').html(data.good_user_three);
                    $('#good_plan_user_count').html(data.good_plan_user_count);
                    $('#not_good_user_count').html(data.not_good_user_count);
                    $('#no_login_count').html(data.no_login_count);
                    $('#poor_user_count').html(data.poor_user_count);
                    $('#poor_user_count_20').html(data.poor_user_count_20);
                }
            });
        }
        getData();


    </script>
</body>
</html>
