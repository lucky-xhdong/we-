<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="utf-8" />
    <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
    <?php $this->load->view('meta');?>
    <?php $this->load->view('jsgrid'); ?>
    <script type="text/javascript" src="<?=base_url()?>media/administrator/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<?=base_url()?>media/administrator/heightchart/highcharts.js"></script>
    <script src="<?=base_url()?>media/administrator/heightchart/highcharts-more.js"></script>
    <script src="<?=base_url()?>media/administrator/heightchart/modules/exporting.js"></script>
</head>
<style>
    .jqx-chart-legend-text{
        opacity: 0 !important;
    }
</style>
<body>
<div class="app app-header-fixed ">
    <!-- header -->
    <?php $this->load->view('header');?>
    <!-- / header -->

    <!-- aside -->
    <?php $this->load->view('aside');?>
    <!-- / aside -->

    <!-- content -->
    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">


            <div class="hbox hbox-auto-xs hbox-auto-sm" ng-init=" app.settings.asideFolded = false;  app.settings.asideDock = false;">
                <!-- main -->
                <div class="col">
                    <!-- main header -->
                    <div class="bg-light lter b-b wrapper-md" style="height: auto">
                        <div class="col-md-8">
                            <select name="" id="">
                                <option value="">全部课程统计概览报告</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="input-daterange input-group  data-datepicker" >
                                <input type="text" class="input-sm form-control" name="start" value=" ">
                                <span class="input-group-addon">至</span>
                                <input type="text" class="input-sm form-control" name="end" value=" ">
                            </div>
                        </div>
                    </div>
                    <!-- / main header -->
                    <div class="wrapper-md" >
                        <div class="all-course-box">
<!--                            课程进度-->
                            <div >
                                <h1 class="all-course-tit">课程进度</h1>
                                <div class="pag-15">
                                    <div>
                                        <h1 class="col-md-offset-1">主课</h1>
                                        <h2 class="col-md-offset-1 col-99 ">主课已完成计划的1/3</h2>
                                        <div class="col-md-offset-1 course-rate clearfix">
                                            <div class="col-md-12">
                                                <div class="col-md-3 text-right">Deyd Kids</div>
                                                <div class="col-md-6 dot-list">
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                                <div class="col-md-3">10/16</div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-3 text-right">Let's Go</div>
                                                <div class="col-md-6 dot-list">
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span class="col-fb66"></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                                <div class="col-md-3">8/12</div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-3 text-right">Let's Go</div>
                                                <div class="col-md-6 dot-list">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                                <div class="col-md-3">8/12</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h1 class="col-md-offset-1">辅课</h1>
                                        <h2 class="col-md-offset-1 col-99 ">说点什么吧？</h2>
                                        <div class="col-md-offset-1 course-rate clearfix">
                                            <div class="col-md-12">
                                                <div class="col-md-3 text-right">Deyd Kids</div>
                                                <div class="col-md-6 dot-list">
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                                <div class="col-md-3">10/16</div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-3 text-right">Let's Go</div>
                                                <div class="col-md-6 dot-list">
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span class="col-d5c"></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                                <div class="col-md-3">8/12</div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-3 text-right">Let's Go</div>
                                                <div class="col-md-6 dot-list">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                                <div class="col-md-3">8/12</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--学习时间-->
                            <div>
                                <h1 class="all-course-tit">学习时间</h1>
                                <div class="pag-15">
                                    <h1 class="col-md-offset-1">学习天数</h1>
                                    <h2 class="col-md-offset-1 col-99 ">说什么呢？</h2>
                                    <div class="col-md-offset-1">
                                        <div id="container1"></div>
                                    </div>
                                </div>
                                <div class="pag-15">
                                    <h1 class="col-md-offset-1">学习时间</h1>
                                    <h2 class="col-md-offset-1 col-99 ">说什么呢？</h2>
                                    <div class="col-md-offset-1">
                                        <div id="container2"></div>
                                    </div>
                                </div>
                            </div>
                            <!--课程完成率&正确率-->
                            <div>
                                <h1 class="all-course-tit">学习时间</h1>
                                <div class="pag-15">
                                    <div>
                                        <h1 class="col-md-offset-1">完成率</h1>
                                        <h2 class="col-md-offset-1 col-99 ">说点什么吧？</h2>
                                        <div class="col-md-offset-1 cleafix">
                                            <div class="progress-list main-progress clearfix">
                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right">总完成率</div>
                                                    <div class="progress col-md-7">
                                                        <div class="progress-bar main-level-4" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">92人达标 <i>（92%）</i></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right">Let’s GO</div>
                                                    <div class="progress col-md-7">
                                                        <div class="progress-bar main-level-0" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">0人达标 <i>（0%）</i></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right">Let’s GO1</div>
                                                    <div class="progress col-md-7">
                                                        <div class="progress-bar main-level-1" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 12%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">12人达标 <i>（1-25%）</i></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right">Let’s GO2</div>
                                                    <div class="progress col-md-7">
                                                        <div class="progress-bar main-level-2" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">26人达标 <i>（26%）</i></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right">Let’s GO3</div>
                                                    <div class="progress col-md-7">
                                                        <div class="progress-bar main-level-3" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">72人达标 <i>（72%）</i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h1 class="col-md-offset-1">正确率</h1>
                                        <h2 class="col-md-offset-1 col-99 ">说点什么吧？</h2>
                                        <div class="col-md-offset-1 cleafix">
                                            <div class="progress-list assist-progress clearfix">
                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right">总完成率</div>
                                                    <div class="progress col-md-7">
                                                        <div class="progress-bar assist-level-4" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 96%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">92人达标 <i>（92%）</i></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right">Let’s GO</div>
                                                    <div class="progress col-md-7">
                                                        <div class="progress-bar assist-level-0" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">0人达标 <i>（0%）</i></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right">Let’s GO1</div>
                                                    <div class="progress col-md-7">
                                                        <div class="progress-bar assist-level-1" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 23%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">12人达标 <i>（1-25%）</i></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right">Let’s GO2</div>
                                                    <div class="progress col-md-7">
                                                        <div class="progress-bar assist-level-2" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">26人达标 <i>（26%）</i></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right">Let’s GO3</div>
                                                    <div class="progress col-md-7">
                                                        <div class="progress-bar assist-level-3" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">72人达标 <i>（72%）</i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--语音识别率-->
                            <div>
                                <h1 class="all-course-tit">语音识别率</h1>
                                <div class="pag-15">
                                    <h2 class="col-md-offset-1 col-99 ">说什么呢？</h2>
                                    <div id="heightChatPie" class="voice-box"></div>
                                </div>
                            </div>
                            <!--技能概览-->
                            <div>
                                <h1 class="all-course-tit">技能概览</h1>
                                <div class="pag-15">
                                    <h2 class="col-md-offset-1 col-99 ">说什么呢？</h2>
                                    <div class="col-md-offset-1 clearfix skill-box">
                                        <div class="col-md-4">
                                            <div id="innerpie" class="rate-situ ">
                                            </div>
                                            <div class="rate-info">听力理解能力</div>
                                        </div>
                                        <div class="col-md-4">
                                            <div id="innerpie1" class="rate-situ ">
                                            </div>
                                            <div class="rate-info">口语综合能力</div>
                                        </div>
                                        <div class="col-md-4">
                                            <div id="innerpie2" class="rate-situ ">
                                            </div>
                                            <div class="rate-info">语法基础能力</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--测试成绩报告-->
                            <div>
                                <h1 class="all-course-tit">测试成绩报告</h1>
                                <div class="pag-15 clearfix">
                                    <div class="clearfix">
                                        <div class="col-md-6 pag-15">
                                            <div class="col-md-offset-1">
                                                <h1 class="col-md-offset-1">主课测试成绩</h1>
                                                <h2 class="col-md-offset-1 col-99 ">说什么呢？</h2>
                                                <div>
                                                    <div id="main-course"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pag-15">
                                            <div class="col-md-offset-1">
                                                <h1 class="col-md-offset-1  ">辅课测试成绩</h1>
                                                <h2 class="col-md-offset-1 col-99 ">说什么呢？</h2>
                                                <div>
                                                    <div id="sub-course"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="clearfix">
                                       <div class="col-md-6 pag-15">
                                           <div class="col-md-offset-1">
                                               <h1 class="col-md-offset-1  ">分级测试成绩</h1>
                                               <h2 class="col-md-offset-1 col-99 ">说什么呢？</h2>
                                               <div>
                                                   <div id="level-test">

                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-md-6 pag-15">
                                           <div class="col-md-offset-1">
                                               <h1 class="col-md-offset-1  ">st测试成绩</h1>
                                               <h2 class="col-md-offset-1 col-99 ">说什么呢？</h2>
                                               <div>
                                                   <div id="st-test">

                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                </div>
                            </div>
                            <!--学习方法-->
                            <div>
                                <h1 class="all-course-tit">测试成绩报告</h1>
                                <div class="pag-15">
                                    <h2 class="col-md-offset-1 col-99 ">说什么呢？</h2>
                                    <div class="col-md-offset-1 cleafix">
                                        <div class="progress-list assist-progress clearfix">
                                            <div class="col-md-12">
                                                <div class="col-md-2 text-right">重复建</div>
                                                <div class="progress col-md-7">
                                                    <div class="progress-bar " role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 80%;background: #38ccde;">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">1241次</div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-2 text-right">录音键</div>
                                                <div class="progress col-md-7">
                                                    <div class="progress-bar " role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 99%;background: #85f6b2;">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">1506次</div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-2 text-right">回听键</div>
                                                <div class="progress col-md-7">
                                                    <div class="progress-bar " role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 23%;background: #93a3e8;">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">112次</i></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-2 text-right">文字键</div>
                                                <div class="progress col-md-7">
                                                    <div class="progress-bar " role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 40%;background: #d5a40d;">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">1300次</i></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-2 text-right">翻译键</div>
                                                <div class="progress col-md-7">
                                                    <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 66%;background: #f371a5;">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">1800次</i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- / main -->
            </div>
        </div>
    </div>
    <!-- /content -->


    <!-- footer -->
    <?php $this->load->view('tmpl/foot')?>
    <!-- / footer -->



</div>
<script src="<?=base_url()?>media/administrator/js/mousewheel.js"></script>
<script src="<?=base_url()?>media/administrator/js/easyscroll.js"></script>
<script>
   $(function () {
       $('#container1').highcharts({
           chart: {
               type: 'column'
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
                   text: '周天数',
                   align:'high'
               },
               labels: {
                   style: {
                       fontSize: '13px',
                       fontFamily: 'Verdana, sans-serif'
                   }
               },
               categories:[
                   '0天<br/>(0天)',
                   '1天<br/>(0-4天)',
                   '2天<br/>(5-8天)',
                   '3天<br/>(9-12天)',
                   '4天<br/>(13-16天)',
                   '5天<br/>(17-20天)',
                   '6天<br/>(21-24天)',
                   '7天<br/>(25天以上)'
               ]
           },
           yAxis: {
               min: 0,
               title: {
                   text: '人数',
                   align:'high'
               },
               gridLineColor:'#ccc',
               gridLineDashStyle:'Dash'
           },
           legend: {
               enabled: false
           },
           tooltip: {
               useHTML: true,
               headerFormat: '<div style="padding-top:15px;">平均学习天数：{point.key}</div>',
               pointFormat: '达标人数: <b>{point.y:.1f} 人</b>'
           },
           series: [{
               name: '总人口',
               data: [24,10,25,16,34,40,4,30],
               color:'#8a9ba2',
               dataLabels: {
                   enabled: false
               },
               pointWidth:15
           }]
       });
       var chart = new Highcharts.Chart('container2', {
           chart:{
               type: 'areaspline',
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
                   text: '周天数<br/>总学习天数',
                   align:'high'
               },
               categories:[
                   '0小时<br/>(0小时)',
                   '1小时<br/>(1-4小时)',
                   '2小时<br/>(5-8小时)',
                   '3小时<br/>(9-12小时)',
                   '4小时<br/>(13-16小时)',
                   '5小时<br/>(17-20小时)',
                   '6小时<br/>(21-24小时)',
                   '7小时<br/>(25-28小时)',
                   '8小时<br/>(29-32小时)',
                   '9小时<br/>(33-36小时)',
                   '9小时<br/>(36小时以上)'
               ],
               labels:{step:2},
               gridLineColor:'#ddd',
               gridLineDashStyle:'Solid',
               gridLineWidth:1,
               tickWidth:0,
               tickmarkPlacement:'on'
           },
           yAxis: {
               title: {
                   text: '人数',
                   align:'high'
               },
               gridLineColor:'#ccc',
               gridLineDashStyle:'Dash'
           },
           tooltip: {
               useHTML: true,
               headerFormat: '<div style="padding-top:15px;">平均学习时间：{point.key}</div>',
               pointFormat: '达标人数: <b>{point.y:.1f} 人</b>'
           },
           credits: {
               enabled: false
           },
           legend:{
               enabled :false
           },
           plotOptions: {
               areaspline: {
                   color:{
                       linearGradient: [0,0,0,500],
                       stops: [
                           [0, 'rgba(235, 244, 247,.6)' ],
                           [1,'rgba(255, 255, 255,.6)']
                       ]},
                   lineColor:'#8a9ba2',
                   fillOpacity: 0.5
               }
           },
           series: [{
               name: '达标人数',
               data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2,33,22,10,4],
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
       $('.input-daterange').datepicker({});
       $('.div_scroll').scroll_absolute({arrows:false});
       //    圆环
       $('#innerpie').highcharts({
           chart:{
               type:'pie'
           },
           exporting: {
               enabled:false
           },
           colors:[
               '#4ed3ef',
               '#fff'
            ],
           credits: {
               enabled: false
           },
           title:{
               text:'<div ><p class="rate-per">78%</p></div>',
               verticalAlign:'middle',
               y:10,
               useHTML:true,
               fontFamily:"微软雅黑"
           },
           plotOptions:{
               pie:{
                   size:100,
                   innerSize:'80%',
                   cursor: 'pointer',
                   dataLabels:{
                       distance:-10,
                       formatter:function(){
                           return this.y+'%';
                       },
                       enabled:false
                   },
               }
           },

           legend:{
               labelFormatter:function(){
                   return this.name + '('+this.percentage+'%)';
               }
           },
           series: [{
               type: 'pie',
               name: ' ',
               data: [
                   ['合格区域',   78],
                   ['不合格区域', 22]
               ]
           }]
       });
       $('#innerpie1').highcharts({
           chart:{
               type:'pie'
           },
           exporting: {
               enabled:false
           },
           credits: {
               enabled: false
           },
           colors:[
               '#f6bb42',
               '#fff'
           ],
           title:{
               text:'<div ><p class="rate-per">78%</p></div>',
               verticalAlign:'middle',
               y:10,
               useHTML:true,
               fontFamily:"微软雅黑"
           },
           plotOptions:{
               pie:{
                   size:100,
                   innerSize:'80%',
                   cursor: 'pointer',
                   dataLabels:{
                       distance:-10,
                       formatter:function(){
                           return this.y+'%';
                       },
                       enabled:false
                   },
               }
           },

           legend:{
               labelFormatter:function(){
                   return this.name + '('+this.percentage+'%)';
               }
           },
           series: [{
               type: 'pie',
               name: ' ',
               data: [
                   ['合格区域',   78],
                   ['不合格区域', 22]
               ]
           }]
       });
       $('#innerpie2').highcharts({
           chart:{
               type:'pie'
           },
           credits: {
               enabled: false
           },
           exporting: {
               enabled:false
           },
           colors:[
               '#80368d',
               '#fff'
           ],
           title:{
               text:'<div><p class="rate-per">76%</p></div>',
               verticalAlign:'middle',
               y:10,
               useHTML:true,
               fontFamily:"微软雅黑"
           },
           plotOptions:{
               pie:{
                   size:100,
                   innerSize:'80%',
                   cursor: 'pointer',
                   dataLabels:{
                       distance:20,
                       formatter:function(){
                           return this.y+'%';
                       },
                       enabled:false
                   },
               }
           },

           legend:{
               labelFormatter:function(){
                   return this.name + '('+this.percentage+'%)';
               }
           },
           series: [{
               type: 'pie',
               name: ' ',
               data: [
                   ['合格区域',   76],
                   ['不合格区域', 24]
               ]
           }]
       });
       Highcharts.chart('heightChatPie', {
           chart: {
               plotBackgroundColor: null,
               plotBorderWidth: null,
               plotShadow: false,
               type: 'pie'
           },
           title:{
               text:'<div style="font-size:12px;margin-top:18px;">总次数：1980</div>',
               verticalAlign:'bottom',
               y:0,
               useHTML:true,
               fontFamily:"微软雅黑"
           },
           colors:[
               '#4ed3ef',
               '#ddd'

           ],
           pane: {
               size: '80%'
           },
           tooltip: {
               pointFormat: '{series.name}: <b>{point.percentage:.1f}</b>'
           },
           plotOptions: {
               pie: {
                   allowPointSelect: true,
                   cursor: 'pointer',
                   dataLabels: {
                       enabled: true,
//                       format: '<b>{point.name}</b>: {point.percentage.toFixed(2):.1f} ',
                       formatter:function(){
                           return '<b>'+this.point.name+'</b>:'+this.point.y;
                       },
                       style: {
                           color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                       }
                   }
               }
           },
           series: [{
               name: '语音识别率',
               colorByPoint: true,
               data: [{
                   name: '识别成功次数',
                   y: 2349,
                   sliced: true
               },
                   {
                       name: '识别失败次数',
                       y: 349,

                   }]
           }],
           exporting: {
               enabled:false
           },
           credits: {
               enabled: false
           },
           lang:{
               contextButtonTitle:"图表导出菜单",
               decimalPoint:".",
               downloadJPEG:"下载JPEG图片",
               downloadPDF:"下载PDF文件",
               downloadPNG:"下载PNG文件",
               downloadSVG:"下载SVG文件",
               drillUpText:"返回 {series.name}",
               loading:"加载中",
               months:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
               noData:"没有数据",
               numericSymbols: [ "千" , "兆" , "G" , "T" , "P" , "E"],
               printChart:"打印图表",
               resetZoom:"恢复缩放",
               resetZoomTitle:"恢复图表",
               shortMonths: [ "Jan" , "Feb" , "Mar" , "Apr" , "May" , "Jun" , "Jul" , "Aug" , "Sep" , "Oct" , "Nov" , "Dec"],
               thousandsSep:",",
               weekdays: ["星期一", "星期二", "星期三", "星期四", "星期五", "星期六","星期天"]
           }
       });
       $('#main-course').highcharts({
           chart: {
               type: 'column'
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
                   text: '课程',
                   align:'high'
               },
               labels: {
                   style: {
                       fontSize: '13px',
                       fontFamily: 'Verdana, sans-serif'
                   }
               },
               categories:[
                   "Let's Go",
                   'We Talk',
               ]
           },
           yAxis: {
               min: 0,
               title: {
                   text: '主课平均分',
                   align:'middle'
               },
               gridLineColor:'#ccc',
               gridLineDashStyle:'Dash'
           },
           legend: {
               enabled: false
           },
           tooltip: {
               useHTML: true,
               headerFormat: '<div style="padding-top:15px;">课程：{point.key}</div>',
               pointFormat: '测试平均分: <b>{point.y:.1f} 分</b>'
           },
           series: [{
               name: ' ',
               data: [90,50],
               color:'#f68590',
               dataLabels: {
                   enabled: false
               },
               pointWidth:15
           }]
       });
       $('#sub-course').highcharts({
           chart: {
               type: 'column'
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
                   text: '课程',
                   align:'high'
               },
               labels: {
                   style: {
                       fontSize: '13px',
                       fontFamily: 'Verdana, sans-serif'
                   }
               },
               categories:[
                   "Bad boy",
                   'We Talk11'
               ]
           },
           yAxis: {
               min: 0,
               title: {
                   text: '主课平均分',
                   align:'middle'
               },
               gridLineColor:'#ccc',
               gridLineDashStyle:'Dash'
           },
           legend: {
               enabled: false
           },
           tooltip: {
               useHTML: true,
               headerFormat: '<div style="padding-top:15px;">课程：{point.key}</div>',
               pointFormat: '测试平均分: <b>{point.y:.1f} 分</b>'
           },
           series: [{
               name: ' ',
               data: [90,50],
               color:'#f3ee71',
               dataLabels: {
                   enabled: false
               },
               pointWidth:15
           }]
       });
       var chart2 = new Highcharts.Chart('level-test', {
           chart:{
               type: 'areaspline',
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
                   text: '平均分',
                   align:'high'
               },
               categories:[
                   '初始pt成绩',
                   '最后一次pt成绩'
               ],
               labels:{step:2},
               gridLineColor:'#ddd',
               gridLineDashStyle:'Solid',
               gridLineWidth:1,
               tickWidth:0,
               tickmarkPlacement:'on'
           },
           yAxis: {
               title: {
                   text: '分数',
                   align:'high'
               },
               gridLineColor:'#ccc',
               gridLineDashStyle:'Dash'
           },
           /*tooltip: {
               useHTML: true,
               headerFormat: '<div style="padding-top:15px;">平均学习时间：{point.key}</div>',
               pointFormat: '达标人数: <b>{point.y:.1f} 人</b>'
           },*/
           credits: {
               enabled: false
           },
           legend:{
               enabled :false
           },
           exporting: {
               enabled:false
           },
           plotOptions: {
               areaspline: {
                   color:{
                       linearGradient: [0,0,0,500],
                       stops: [
                           [0, 'rgba(235, 244, 247,.6)' ],
                           [1,'rgba(255, 255, 255,.6)']
                       ]},
                   lineColor:'#8a9ba2',
                   fillOpacity: 0.5
               }
           },
           series: [{
               name: '平均分',
               data: [1.2,9.4],
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
       var chart3 = new Highcharts.Chart('st-test', {
           chart:{
               type: 'areaspline',
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
                   text: '平均分',
                   align:'high'
               },
               categories:[
                   '初始pt成绩',
                   '最后一次pt成绩'
               ],
               labels:{step:2},
               gridLineColor:'#ddd',
               gridLineDashStyle:'Solid',
               gridLineWidth:1,
               tickWidth:0,
               tickmarkPlacement:'on'
           },
           yAxis: {
               title: {
                   text: '分数',
                   align:'high'
               },
               gridLineColor:'#ccc',
               gridLineDashStyle:'Dash'
           },
           /*tooltip: {
            useHTML: true,
            headerFormat: '<div style="padding-top:15px;">平均学习时间：{point.key}</div>',
            pointFormat: '达标人数: <b>{point.y:.1f} 人</b>'
            },*/
           credits: {
               enabled: false
           },
           legend:{
               enabled :false
           },
           exporting: {
               enabled:false
           },
           plotOptions: {
               areaspline: {
                   color:{
                       linearGradient: [0,0,0,500],
                       stops: [
                           [0, 'rgba(235, 244, 247,.6)' ],
                           [1,'rgba(255, 255, 255,.6)']
                       ]},
                   lineColor:'#8a9ba2',
                   fillOpacity: 0.5
               }
           },
           series: [{
               name: '平均分',
               data: [1.2,4.4],
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
   });
</script>
</body>
</html>
