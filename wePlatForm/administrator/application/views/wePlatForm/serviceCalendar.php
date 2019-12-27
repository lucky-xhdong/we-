<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php $this->load->view('wePlatForm/tmpl/title'); ?>
    <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
    <?php $this->load->view('wePlatForm/meta'); ?>
    <?php $this->load->view('tmpl/mmgrid');?>
    <?php $this->load->view('tmpl/fileupload');?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
<body>
<div class="container-fluid ServiceCalendar">
    <div class="row">
        <!-- 左侧菜单 start -->
        <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
        <!-- 左侧菜单 end -->
        <div class="col-md-9 sc--main-wrapper">
            <!--菜单切换 start-->
            <?=$this->load->view("wePlatForm/tmpl/headernav")?>
            <!--菜单切换 end-->
            <!--面包屑 start-->
            <nav class="common-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
                    <li class="breadcrumb-item"><a href="<?=anchorurl("service_plan")?>">服务计划</a></li>
                    <li class="breadcrumb-item active" aria-current="page">服务日历</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="sc--main__content">
                <div class="sc--tabs">
                    <ul>
                        <li class="active"><a href="javascript:;">教&emsp;学</a></li>
                        <li><a href="javascript:;">运&emsp;营</a></li>
                        <li><a href="javascript:;">商&emsp;务</a></li>
                    </ul>
                </div>
                <div class="sc--calendar">
                    <div class="sc--calendar_years">
                        <div class="sc--calendar_years_tab">
                            <a href="javascript:;" class="btn-control btn-prev">
                                <i class="icon icon-expand"></i>
                            </a>
                            <span class="txt">2018</span>
                            <a href="javascript:;" class="btn-control btn-next">
                                <i class="icon icon-expand"></i>
                            </a>
                        </div>
                        <div class="sc--calendar_years_months">
                            <ul>
                                <li>
                                    <a href="javascript:;">
                                        <span class="txt">一月</span>
                                        <span class="num">9</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="txt">二月</span>
                                        <span class="num">9</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="txt">三月</span>
                                        <span class="num">9</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="txt">四月</span>
                                        <span class="num">9</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="txt">五月</span>
                                        <span class="num">9</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="txt">六月</span>
                                        <span class="num">9</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="txt">七月</span>
                                        <span class="num">9</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="txt">八月</span>
                                        <span class="num">9</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="txt">九月</span>
                                        <span class="num">9</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="txt">十月</span>
                                        <span class="num">9</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="txt">十一月</span>
                                        <span class="num">9</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="txt">十二月</span>
                                        <span class="num">9</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sc--calendar_months">
                        <div id="datepicker"></div>
                    </div>
                </div>
                <div class="sc--projects">
                    <div class="btn-group btn-group-top">
                        <a href="javascript:;" class="_btn _btn-loadmore">
                            <i class="icon1 icon-expand"></i>
                        </a>
                    </div>
                    <div class="sc--projects-lists">
                        <ul>
                            <li>
                                <div class="pl-left">
                                    <span class="txt">04-01</span>
                                </div>
                                <div class="pl-right">
                                    <p class="txt">落实国家政务信息系统整合共享要求，制定教育部政务信息系统整合实施方案，进一步完善《教育部政务信息资源目录》，初步实现教育部政务信息系统整合、基础数据共享。 </p>
                                    <div class="btn-group">
                                        <a href="javascript:;" class="_btn _btn-download">下载附件</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pl-left">
                                    <span class="txt">04-01</span>
                                </div>
                                <div class="pl-right">
                                    <p class="txt">落实国家政务信息系统整合共享要求，制定教育部政务信息系统整合实施方案，进一步完善《教育部政务信息资源目录》，初步实现教育部政务信息系统整合、基础数据共享。 </p>
                                    <div class="btn-group">
                                        <a href="javascript:;" class="_btn _btn-download">下载附件</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pl-left">
                                    <span class="txt">04-01</span>
                                </div>
                                <div class="pl-right">
                                    <p class="txt">落实国家政务信息系统整合共享要求，制定教育部政务信息系统整合实施方案，进一步完善《教育部政务信息资源目录》，初步实现教育部政务信息系统整合、基础数据共享。 </p>
                                    <div class="btn-group">
                                        <a href="javascript:;" class="_btn _btn-download">下载附件</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pl-left">
                                    <span class="txt">04-01</span>
                                </div>
                                <div class="pl-right">
                                    <p class="txt">落实国家政务信息系统整合共享要求，制定教育部政务信息系统整合实施方案，进一步完善《教育部政务信息资源目录》，初步实现教育部政务信息系统整合、基础数据共享。 </p>
                                    <div class="btn-group">
                                        <a href="javascript:;" class="_btn _btn-download">下载附件</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pl-left">
                                    <span class="txt">04-01</span>
                                </div>
                                <div class="pl-right">
                                    <p class="txt">落实国家政务信息系统整合共享要求，制定教育部政务信息系统整合实施方案，进一步完善《教育部政务信息资源目录》，初步实现教育部政务信息系统整合、基础数据共享。 </p>
                                    <div class="btn-group">
                                        <a href="javascript:;" class="_btn _btn-download">下载附件</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pl-left">
                                    <span class="txt">04-01</span>
                                </div>
                                <div class="pl-right">
                                    <p class="txt">落实国家政务信息系统整合共享要求，制定教育部政务信息系统整合实施方案，进一步完善《教育部政务信息资源目录》，初步实现教育部政务信息系统整合、基础数据共享。 </p>
                                    <div class="btn-group">
                                        <a href="javascript:;" class="_btn _btn-download">下载附件</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="btn-group btn-group-bottom">
                        <a href="javascript:;" class="_btn _btn-loadmore">
                            <i class="icon1 icon-expand"></i>
                            <i class="icon2 icon-expand"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!--主体内容 end-->
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $.datepicker.regional['zh-CN'] = {
                clearText: '清除',
                clearStatus: '清除已选日期',
                closeText: '关闭',
                closeStatus: '不改变当前选择',
                prevText: '< 上月',
                prevStatus: '显示上月',
                prevBigText: '<<',
                prevBigStatus: '显示上一年',
                nextText: '下月>',
                nextStatus: '显示下月',
                nextBigText: '>>',
                nextBigStatus: '显示下一年',
                currentText: '今天',
                currentStatus: '显示本月',
                monthNames: ['一月','二月','三月','四月','五月','六月', '七月','八月','九月','十月','十一月','十二月'],
                monthNamesShort: ['一月','二月','三月','四月','五月','六月', '七月','八月','九月','十月','十一月','十二月'],
                monthStatus: '选择月份',
                yearStatus: '选择年份',
                weekHeader: '周',
                weekStatus: '年内周次',
                dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
                dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
                dayNamesMin: ['日','一','二','三','四','五','六'],
                dayStatus: '设置 DD 为一周起始',
                dateStatus: '选择 m月 d日, DD',
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                initStatus: '请选择日期',
                isRTL: false
            };
            $.datepicker.setDefaults($.datepicker.regional['zh-CN']);
            $( "#datepicker" ).datepicker();
        })
    </script>
</body>
</html>
