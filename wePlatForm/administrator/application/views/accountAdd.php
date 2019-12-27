<!DOCTYPE html>
<html lang="en" class="">
<!-- 创建公司学校 -->
<head>
    <meta charset="utf-8" />
    <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
    <?php $this->load->view('jsgrid'); ?>
    <?php $this->load->view('meta'); ?>
    <link rel="stylesheet" href="<?=base_url()?>media/administrator/css/bootstrap-datepicker.min.css" type="text/css" />
    <style>
        .ui-datepicker-calendar {
            display: none;
        }
    </style>
</head>

<body>
<div class="app app-header-fixed ">

    <!-- header -->
    <?php $this->load->view('header'); ?>
    <!-- / header -->


    <!-- aside -->
    <?php $this->load->view('aside'); ?>
    <!-- / aside -->

    <!-- content -->
    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">
            <div class="wrapper-md">
                <div class="panel panel-default">
                    <div class="wrap-tit">
                        <div class="row ">
                            <div class="col-sm-5 ">
                                <p class="">创建班级</p>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="table-con bor-74a">
                            <div class="account-class">
                                <div class="col-md-12 account-class-th">
                                    <div class="col-md-3">班级名称</div>
                                    <div class="col-md-3 indent-20">开始时间</div>
                                    <div class="col-md-3 indent-20">结束时间</div>
                                    <div class="col-md-3 indent-20">班级属性</div>
                                </div>
                                <div class="col-md-12 account-class-tr">
                                    <div class="col-md-3 class-tr-name">四班</div>
                                    <div class="input-daterange input-group col-md-6" id="datepicker">
                                        <div class="col-md-6">
                                            <input type="text" class="input-sm form-control" name="start" value=" ">
                                        </div>
                                       <div class="col-md-6">
                                           <input type="text" class="input-sm form-control" name="end" value=" ">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="" id="">
                                            <option value="">普通班级</option>
                                            <option value="">特级班级</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="account-class-con">
                                <div class="account-course account-bbor">
                                    <div class="account-con-tit">课程授权</div>
                                    <div class="account-course-con">
                                        <span>We Talk</span>
                                        <span>We Talk1</span>
                                        <span>We Talk2</span>
                                    </div>
                                </div>
                                <div class="account-edit ">
                                    <div class="account-con-tit">编辑成员</div>
                                    <div class="account-edit-con">
                                        <div class="account-edit-list account-bbor">
                                            人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1，人名1 <i>(成员36人)</i>
                                        </div>
                                        <div class="account-edit-list-error">
                                            未识别人员数：张三、李四 <a href="javaScript:;" class="account-edit-btn">点击修改>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /content -->

    <!-- footer -->
    <footer id="footer" class="app-footer" role="footer">
        <div class="wrapper b-t bg-light">
            <span class="pull-right">2.2.0 <a href ui-scroll="app" class="m-l-sm text-muted"><i class="fa fa-long-arrow-up"></i></a></span>
            &copy; 2016 Copyright.
        </div>
    </footer>
    <!-- / footer -->

</div>

<script src="<?=base_url()?>media/administrator/js/bootstrap-datepicker.js"></script>
<script>
    $(function() {
        $('.input-daterange').datepicker({});
       /* $('.form-control').datepicker({
            format: 'yyyy-mm',
            autoclose: true,
            startView: 'year',
            minView:'year',
            maxView:'decade'

        });*/
        $('#aa').datepicker({
            flat: true,
            date: '2008-07-31',
            current: '2008-07-31',
            calendars: 1,
            starts: 1
        });


    });
</script>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 16/12/14
 * Time: 14:42
 */