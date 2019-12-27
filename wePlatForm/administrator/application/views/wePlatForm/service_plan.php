<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php $this->load->view('wePlatForm/tmpl/title'); ?>
    <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
    <?php $this->load->view('wePlatForm/meta'); ?>
    <?php $this->load->view('tmpl/mmgrid');?>
    <?php $this->load->view('tmpl/fileupload');?>
</head>
<body>
<div class="container-fluid ServicePlan">
    <div class="row">
        <!-- 左侧菜单 start -->
        <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
        <!-- 左侧菜单 end -->
        <div class="col-md-9 sp--main-wrapper">
            <!--菜单切换 start-->
            <?=$this->load->view("wePlatForm/tmpl/headernav")?>
            <!--菜单切换 end-->
            <!--面包屑 start-->
            <nav class="common-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
                    <li class="breadcrumb-item"><a href="<?=anchorurl("service_plan")?>">服务计划</a></li>
                    <li class="breadcrumb-item active" aria-current="page">服务计划日程安排</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="sp--main__content">
                <!--选择日期 start-->
                <div class="choose-date" data-before="选择日期">
                    <form action="" id="dateForm">
                        <div class="form-row" data-before="选择日期：">
                            <div class="_input-group _input-date-group">
                                <div class="form-group col-md-5">
                                    <input type="text" value="<?php if(!empty($start_date) ) echo $start_date; ?>" id="startTime" class="form-control form-control-sm" placeholder="请选择开始日期">
                                </div>至
                                <div class="form-group col-md-5">
                                    <input type="text" value="<?php if(!empty($end_date) ) echo $end_date; ?>" id="endTime" class="form-control form-control-sm" placeholder="请选择结束日期">
                                </div>
                            </div>
                            <div class="btn-group">
                                <a href="javascript:;" class="btn-confirm" id="searchButton">确定</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!--选择日期 end-->
                <!--服务计划 start-->
                <?php foreach($plans as $plan):?>
                <div class="service-plan" data-before="服务时间:<?=$plan->start_date?>至<?=$plan->end_date?>">
                    <div class="sp_content">
                        <h2 class="title">
                            <?php if($plan_detail->school_id == 0):?>
                                【<?=$plan_detail->regionInfo->name?>】
                            <?php else:?>
                                【<?=$plan_detail->regionInfo->name?>--<?=$plan_detail->schoolInfo->name?>】
                            <?php endif;?>
                        </h2>
                        <p class="content">
                            <?=$plan->body?>
                        </p>
                        <?php if(!empty($plan->fileUrl)):?>
                        <div class="link-group">
                            <a href="<?=$plan->fileUrl?>" class="btn-download">下载附件</a>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <?php endforeach;?>
                <div id="paginator" class="custom-pager">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
                <!--服务计划 end-->
            </div>
            <!--主体内容 end-->
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#startTime').datepicker({format: 'yyyy-mm-dd'});
            $('#endTime').datepicker({format: 'yyyy-mm-dd'});
            $("#searchButton").click(function(){
                window.location.href = "<?=anchorurl('service_plan/detail/'.$plan_id);?>?start_date="+$("#startTime").val()+'&end_date='+$("#endTime").val();
            });


            $(document).keypress(function(e) {
                // 回车键事件

                if(e.which == 13) {
                    $("#searchButton").click();
                }
            });
        })
    </script>
</body>
</html>
