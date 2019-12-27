<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('meta');?>
  <?php $this->load->view('jsgrid'); ?>
  <?php $this->load->view('tmpl/heightCharts'); ?>
  <link rel="stylesheet" href="<?=base_url()?>media/administrator/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <script type="text/javascript" src="<?=base_url()?>media/administrator/js/basichighchatpie.js"></script>
  <script type="text/javascript" src="<?=base_url()?>media/administrator/js/basichighchatpieinner.js"></script>
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
              <a href="<?=anchorurl('home')?>">学习数据</a><span>&nbsp;&gt;&nbsp;</span>
              <a href="<?=anchorurl('home/studyDataGrade/'.$school->id)?>"><?=$school->name?></a><span>&nbsp;&gt;&nbsp;</span>
              <a href="<?=anchorurl('home/studyDataClass/'.$grade->id)?>"><?=$grade->name?></a><span>&nbsp;&gt;&nbsp;</span>
              <a href="javascript:;"><?=$class->name?></a>
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
          <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
            <!-- 图标区域 开始-->
            <div class="chart-box">
              <!-- 图标排名 开始-->
              <div class="chart-ranking col-md-2">
                <h1>综合得分排名</h1>
                <div class="chart-ranking-list">
                  <div class="div_scroll ranking-list">
                    <?php foreach($users as $user):?>
                      <div class="ranking-list-item">
                        <p><?=$user->name?></p>
                        <?php
                        $score = $user->getScore();
                        $pencent = 144*$score/100;
                        if($score >= 80){
                          $class = "lev-1";
                        }else if($score >= 60 && $score < 80){
                          $class = "lev-2";
                        }else{
                          $class = "lev-3";
                        }
                        ?>
                        <div class="ranking-score">
                          <div style="width:<?=$pencent?>px" class="<?=$class?>"></div>
                          <span><?=$score?>分</span>
                        </div>
                      </div>
                    <?php endforeach;?>
                  </div>
                </div>
              </div>
              <!-- 图标排名 结束-->
              <!-- 图标展现 开始-->
              <div class="chart-show col-md-10">
                <div class="chart-show-con">
                  <div class="col-md-12 chart-show-tit">
                    <div class="col-md-6">
                      <select name="" id="">
                        <option value="">全部成员综合信息</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <div class="analyse-btn btn-primary">数据分析</div>
                      <div class="export-btn btn-success">导出</div>
                    </div>
                  </div>
                  <div class="col-md-12 chart-show-main">
                    <div class="col-md-6 " id="chartContainer">

                    </div>
<!--                    <div class="col-md-6 " id="chartContainer" style="display: none">-->
<!---->
<!--                    </div>-->
                    <div class="chart-show-text col-md-6">
                      <div class="col-md-6">
                        <div class="col-course">综合得分:<?=(int)$LearningSituationOverview['totalScores']?>分</div>
                        <div class="col-data">
                          <h6>综合数据</h6>
                          <div>
                            <p>学习效果：  <?=$LearningSituationOverview['StudyReuslt']*100?>%</p>
                            <p>时间和频率：<?=$LearningSituationOverview['StudyTimeAndFrequency']*100?>%</p>
                            <p>学习进度：  <?=$LearningSituationOverview['StudyCourseAverage']*100?>%</p>
                            <p>技能情况：  <?=$LearningSituationOverview['SkillAverage']*100?>%</p>
                            <p>学习方法：  <?=$LearningSituationOverview['StudyComprehensive']*100?>%</p>
                          </div>
                        </div>
                        <div class="col-active">
                          <h6>活跃度</h6>
                          <div>
                            <p>总人数：1500人</p>
                            <p>活跃人数：1200人</p>
                            <p>活跃度：90%</p>
                            <p>不活跃人数：300人</p>
                            <p>只做pt人数：50人</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="col-time">
                          <h6>学习时间、频率</h6>
                          <div>
                            <p>总学习天数：60天</p>
                            <p>总学习时间：160:50</p>
                            <p>周学习天数：2天</p>
                            <p>总学习时间：2:05</p>
                          </div>
                        </div>
                        <div class="col-ability">
                          <h6>能力概念</h6>
                          <div>
                            <p>听力能力：23%</p>
                            <p>口语能力：50%</p>
                            <p>语法能力：89%</p>
                          </div>
                        </div>
                        <div class="col-fun">
                          <h6>功能键平均使用次数</h6>
                          <div>
                            <p>重复键：54次	 </p>
                            <p>录音键：30次</p>
                            <p>文字键：10次	</p>
                            <p>文字键：10次	</p>
                            <p>回听键：35次</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- 图标结束 开始-->
            </div>
            <!-- 图标区域 结束 -->
            <!--学习要求达标概念 开始-->
            <div class="study-require">
              <div class="table-tit-box">
                <div class="col-md-6">
                  <h1 class="table-tit">学习要求达标概念</h1>
                </div>
                <div class="col-md-6">
                  <div class="history-btn btn-info">数据分析</div>
                  <div class="export-btn btn-success">概述报告</div>
                </div>
              </div>
              <div class="study-require-box">
                <div class="col-md-5 average-box">
                  <div class="col-md-4">
                    <div id="innerpie" class="rate-situ ">
                    </div>
                    <div class="rate-info">主课平均分67分</div>
                  </div>
                  <div class="col-md-4">
                    <div id="innerpie1" class="rate-situ ">
                    </div>
                    <div class="rate-info">辅课平均分67分</div>
                  </div>
                  <div class="col-md-4">
                    <div id="innerpie2" class="rate-situ ">
                    </div>
                    <div class="rate-info">测试课平均分67分</div>
                  </div>
                </div>
                <div class="col-md-5 rate-box" id="heightChatPie">

                </div>
                <div class="col-md-2 course-study-btn">
                  <div >
                    <a href="<?=anchorurl('home/setClassSave/'.$class_id)?>" class="btn-default">课程设置 </a>
                    <a href="<?=anchorurl('home/setClassLearn/'.$class_id)?>" class=btn-default>学习要求设置</a>
                  </div>
                </div>
              </div>
            </div>

            <!--学习要求达标概念 结束-->
            <!-- tasks -->
            <div class="row">
              <div class="col-md-12">
                <div class="app-content" role="main" style="margin-left: 0">
                  <div class="app-content-body ">
                    <div class=" panel-default">
                      <div class="table-responsive tab-box studyDetailData-box">
                        <div class="tab-tit">
                          <div class="on" data-type="course">课程概览</div>
                          <div data-type="test">测试成绩</div>
                          <div data-type="studyMethod">学习方法</div>
                        </div>
                        <div class="table-con">
                          <div class="tab-con">
                           <!-- 课程概览 开始 -->
                            <div class="on">
                              <div class="table-tit-box">
                                <div class="col-md-8">
                                  <select name="" id="">
                                    <option value="">主课</option>
                                  </select>
                                  <select name="" id="">
                                    <option value="">We Talk</option>
                                    <option value="">We TalkTalkTalkTalkTalk</option>
                                  </select>
                                  <select name="" id="">
                                    <option value="">unit1</option>
                                  </select>
                                  <select name="" id="">
                                    <option value="">passa</option>
                                  </select>
                                  <select name="" id="">
                                    <option value="">全部</option>
                                  </select>
                                  <label for=""><input type="checkbox">四级</label>
                                  <label for=""><input type="checkbox">六级</label>
                                </div>
                                <div class="col-md-4 pull-right">
                                  <div class="history-btn btn-info">数据分析</div>
                                  <div class="export-btn btn-success">导出</div>
                                  <div class="input-group" style="float: right;">
                                    <input type="text" class="form-control input-type-name rounded" placeholder="输入姓名">
                                    <a class="fa fa-search pos"></a>
                                  </div>
                                </div>
                              </div>
                              <div id="jsGrid" class="jsgrid jsgrid-sort"></div>
                            </div>
                            <!-- 课程概览 结束 -->
                            <!-- 测试成绩 开始 -->
                            <div>
                              <div class="table-tit-box">
                                <div class="col-md-8">
                                  <select name="" id="">
                                    <option value="">测试成绩</option>
                                  </select>
                                  <label for=""><input type="checkbox">Placemaent Test</label>
                                  <label for=""><input type="checkbox">主课和辅课Mt平均分</label>
                                  <label for=""><input type="checkbox">ST测试</label>
                                  <label for=""><input type="checkbox">四级</label>
                                  <label for=""><input type="checkbox">六级</label>
                                  <label for=""><input type="checkbox">显示全部</label>
                                </div>
                                <div class="col-md-4 pull-right">
                                  <div class="history-btn btn-info">数据分析</div>
                                  <div class="export-btn btn-success">导出</div>
                                  <div class="input-group" style="float: right;">
                                    <input type="text" class="form-control input-type-name rounded" placeholder="输入姓名">
                                    <a class="fa fa-search pos"></a>
                                  </div>
                                </div>
                              </div>
                              <div class="testScore-table-box">
                                <div class="testScore-table">
                                  <table  cellpadding="0" cellspacing="0">
                                    <thead>
                                      <tr>
                                        <td class="td-pagver">姓名</td>
                                        <td class="td-pagl">
                                          <div>
                                            <span></span>
                                            <div class="input-daterange input-group ">
                                              <input type="text" class="input-sm form-control" name="start" value="2016-12-19 ">
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <div>
                                            <span>Placement Test</span>
                                            <div class="input-daterange input-group">
                                              <input type="text" class="input-sm form-control" name="end" value="2019-12-24 ">
                                            </div>
                                          </div>
                                        </td>
                                        <td class="td-pagr">
                                          <div>
                                            <span></span>
                                            <div>两次测试涨幅</div>
                                          </div>
                                        </td>
                                        <td class="td-pagver">
                                          <div>
                                            <span>主课</span>
                                            <div>平均分</div>
                                          </div>
                                        </td>
                                        <td class="td-pagver">
                                          <div>
                                            <span>辅课</span>
                                            <div>平均分</div>
                                          </div>
                                        </td>
                                        <td class="td-pagl">
                                          <div>
                                            <span></span>
                                            <div class="input-daterange input-group ">
                                              <input type="text" class="input-sm form-control" name="start" value="2016-12-19 ">
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <div>
                                            <span>ST</span>
                                            <div class="input-daterange input-group ">
                                              <input type="text" class="input-sm form-control" name="end" value="2016-12-19 ">
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <div>
                                            <span></span>
                                            <div>两次测试涨幅</div>
                                          </div>
                                        </td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr class="tr-average">
                                        <td >平均分</td>
                                        <td>22</td>
                                        <td>12<i class="fa fa-arrow-down fa-1 fa-down" aria-hidden="true"></i></td>
                                        <td>27</td>
                                        <td>22</td>
                                        <td>12</td>
                                        <td>27</td>
                                        <td>22</td>
                                        <td>56</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div id="jsGrid1" class="jsgrid jsgrid-no-thead"></div>
                            </div>
                            <!-- 测试成绩 结束 -->
                            <!-- 学习方法 开始 -->
                            <div>
                              <div class="table-tit-box">
                                <div class="col-md-4 pull-right">
                                  <div class="history-btn btn-info">数据分析</div>
                                  <div class="export-btn btn-success">导出</div>
                                  <div class="input-group" style="float: right;">
                                    <input type="text" class="form-control input-type-name rounded" placeholder="输入姓名">
                                    <a class="fa fa-search pos"></a>
                                  </div>
                                </div>
                              </div>
                              <div id="jsGrid2" class="jsgrid"></div>
                            </div>
                            <!-- 学习方法 结束 -->
                          </div>
                          <div class="select-num">
                            <span>每页显示</span>
                            <select class="input-sm form-control w-sm inline v-middle" style="width: 70px">
                              <option value="0">10</option>
                              <option value="1">20</option>
                              <option value="2">30</option>
                              <option value="3">40</option>
                            </select>
                            <span>条</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / tasks -->
          </div>
        </div>
        <!-- / main -->
        <!-- right col -->
        <!-- / right col -->
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
//    Highcharts.chart('chartContainer1', {
//      chart: {
//        polar: true,
//        type: 'line'
//      },
//      title: {
//        text: '',
//        x: -80
//      },
//      pane: {
//        size: '90%'
//      },
//      xAxis: {
//        categories: [
//          '学习效果',
//          '时间和频率',
//          '学习进度',
//          '技能情况',
//          '学习方法'],
//        tickmarkPlacement: 'on',
//        lineWidth: 0,
//        gridLineWidth:0,
//        labels: {
//          style: { // 这里指定了样式
//
//            fontSize: '12',
//            color: '#fff'
//          }
//        }
//      },
//      yAxis: {
//        gridLineInterpolation: 'polygon',
//        lineWidth: 0,
//        min: 0,
//        gridLineWidth:1,
//        gridLineColor:'#fff',
//        gridLineDashStyle:'Dash',
//        labels: {
//          style: { // 这里指定了样式
//            fontSize: '12',
//            color: '#fff'
//          }
//        }
//
//      },
//
//      tooltip: {
//        shared: true,
//        pointFormat: '<span>{series.name}: <b>{point.y:,.0f}</b><br/>',
//        backgroundColor: '#72a29f',
//        style: {                      // 文字内容相关样式
//          color: "#ffF",
//          fontSize: "12px"
//        }
//      },
//
//      legend: {
//        align: 'right',
//        verticalAlign: 'top',
//        y: 70,
//        layout: 'vertical'
//
//      },
//
//      series: [{
//        name: '平均得分',
//        data:[1,5,15,5,2],
//        pointPlacement: 'on',
//        showInLegend: false,
//        type: 'area',
//        color:'#9fd7d4',
//        lineWidth:1,
//        lineColor:'#fff',
//        marker:{//线上数据点
//          radius:4,
//          lineWidth:2,
//          lineColor:'#fff',
//          fillColor:'#9fd7d4',
//          states:{
//            hover:{
//              enabled:true,
//              lineWidth:6,
//              lineColor:'#9fd7d4',
//              fillColor:'#fff'
//            }
//          }
//        }
//
//      }],
//      exporting: {
//        enabled:true
//      },
//      credits: {
//        enabled: false
//      },
//      lang:{
//        contextButtonTitle:"图表导出菜单",
//        decimalPoint:".",
//        downloadJPEG:"下载JPEG图片",
//        downloadPDF:"下载PDF文件",
//        downloadPNG:"下载PNG文件",
//        downloadSVG:"下载SVG文件",
//        drillUpText:"返回 {series.name}",
//        loading:"加载中",
//        months:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
//        noData:"没有数据",
//        numericSymbols: [ "千" , "兆" , "G" , "T" , "P" , "E"],
//        printChart:"打印图表",
//        resetZoom:"恢复缩放",
//        resetZoomTitle:"恢复图表",
//        shortMonths: [ "Jan" , "Feb" , "Mar" , "Apr" , "May" , "Jun" , "Jul" , "Aug" , "Sep" , "Oct" , "Nov" , "Dec"],
//        thousandsSep:",",
//        weekdays: ["星期一", "星期二", "星期三", "星期四", "星期五", "星期六","星期天"]
//      }
//
//    });
  });
  $(function() {

    $("#jsGrid").jsGrid({
      height: "auto",
      width: "100%",
      confirmDeleting: false,
      paging: true,
      autoload: true,
      pageLoading:true,
      pageSize: 10,
      pageButtonCount: 5,
      pagerFormat: "{first} {prev} {pages} {next} {last} &nbsp;&nbsp; {pageIndex} / {pageCount}",
      pagePrevText: "上一页",
      pageNextText: "下一页",
      pageFirstText: "首页",
      pageLastText: "最后一页",
      sorting:true,
      controller: {
        loadData: function(filter) {
          return $.ajax({
            type: "GET",
            url: "<?=anchorurl('home/getClassUserScoreDataList?class_id='.$class_id)?>",
            dataType:"json",
            data: filter
          });
        },
        loadParams: function() {},
      },
      fields: [
        { name: "name", title: "学生姓名", type: "text", width: 80 ,align: "center",sorting: false},
        { name: "course_rate", title: "课程进度",type: "number", width: 80 ,align: "center",sorting: false},
        { name: "unit_rate",title: "单元进度", type: "number", width: 80,align: "center",sorting: false },
        { name: "day_count",title: "总天数", type: "number", width: 70,align: "center"},
        { name: "study_count",title: "总学时", type: "number", width: 70,align: "center",sorting: false},
        { name: "weekStudy_count",title: "周学习天数", type: "number", width: 80,align: "center",sorting: false},
        { name: "weekStudy_time",title: "周学习时间", type: "text", width: 80,align: "center",sorting: false },
        { name: "finish",title: "完成率", type: "text", width: 70 ,align: "center",sorting: false},
        { name: "accuracy",title: "正确率", type: "text", width:70 ,align: "center",sorting: false},
        { name: "voice",title: "语音识别率", type: "text", width: 80 ,align: "center",sorting: false},
        { name: "skill",title: "技能概览", type: "text", width: 80 ,align: "center",sorting: false},
        { name: "unitTestAverage",title: "单元测试平均分", type: "text", width: 100 ,align: "center",sorting: false},
        { name: "unlearn_count",title: "未学习天数", type: "text", width: 80 ,align: "center",sorting: false},
      ]
    });



    $("#jsGrid1").jsGrid({
      height: "auto",
      width: "100%",
      confirmDeleting: false,
      paging: true,
      autoload: true,
      pageLoading:false,
      pageSize: 10,
      pageButtonCount: 5,
      pagerFormat: "{first} {prev} {pages} {next} {last} &nbsp;&nbsp; {pageIndex} / {pageCount}",
      pagePrevText: "上一页",
      pageNextText: "下一页",
      pageFirstText: "首页",
      pageLastText: "最后一页",
      controller:{
        loadData: function(){
          return[
            {
              "name":"哈哈",
              "pt_startTime":"12",
              "pt_endTime":"23",
              "pt_index":"+23",
              "main_subject":"253",
              "subsidiary_subject":"89",
              "st_startTime":"128",
              "st_endTime":"128",
              "st_index":"+28"
            },
            {
              "name":"哈哈",
              "pt_startTime":"12",
              "pt_endTime":"23",
              "pt_index":"+23",
              "main_subject":"253",
              "subsidiary_subject":"89",
              "st_startTime":"128",
              "st_endTime":"128",
              "st_index":"+28"
            },
            {
              "name":"哈哈",
              "pt_startTime":"12",
              "pt_endTime":"23",
              "pt_index":"+23",
              "main_subject":"253",
              "subsidiary_subject":"89",
              "st_startTime":"128",
              "st_endTime":"128",
              "st_index":"+28"
            }
          ]
        }
      },
      fields: [
        { name: "name", title: " ", type: "text", width: 62 ,align: "center"},
        { name: "pt_startTime", title: " ",type: "number", width: 62 ,align: "center"},
        { name: "pt_endTime",title: " ", type: "number", width: 62,align: "center" },
        { name: "pt_index",title: " ", type: "number", width: 62,align: "center"},
        { name: "main_subject",title: " ", type: "number", width: 62,align: "center"},
        { name: "subsidiary_subject",title: " ", type: "number", width: 62,align: "center"},
        { name: "st_startTime",title: " ", type: "number", width: 62,align: "center"},
        { name: "st_endTime",title: " ", type: "number", width: 62,align: "center"},
        { name: "st_index",title: " ", type: "number", width: 62,align: "center"}

      ]
    });
    $("#jsGrid2").jsGrid({
      height: "auto",
      width: "100%",
      confirmDeleting: false,
      paging: true,
      autoload: true,
      pageLoading:true,
      pageSize: 10,
      pageButtonCount: 5,
      pagerFormat: "{first} {prev} {pages} {next} {last} &nbsp;&nbsp; {pageIndex} / {pageCount}",
      pagePrevText: "上一页",
      pageNextText: "下一页",
      pageFirstText: "首页",
      pageLastText: "最后一页",
      sorting:true,
      controller: {
        loadData: function(filter) {
          return $.ajax({
            type: "GET",
            url: "<?=anchorurl('home/getClassUserMethodScoreDataList?class_id='.$class_id)?>",
            dataType:"json",
            data: filter
          });
        },
        loadParams: function() {},
      },
      fields: [
        { name: "name", title: "学生姓名", type: "text", width: 120 ,align: "center"},
        { name: "course_rate", title: "学习方法得分",type: "number", width: 120 ,align: "center"},
        { name: "repeat_key",title: "重复键", type: "number", width: 120,align: "center" },
        { name: "record_key",title: "录音键", type: "number", width: 100,align: "center"},
        { name: "listen_key",title: "回听键", type: "number", width: 100,align: "center"},
        { name: "word_key",title: "文字键", type: "number", width: 120,align: "center"},
        { name: "translate_key",title: "翻译键", type: "number", width: 120,align: "center"}

      ]
    });


    var selectedItems = [];

    var selectItem = function(item) {
      selectedItems.push(item);
    };

    var unselectItem = function(item) {
      selectedItems = $.grep(selectedItems, function(i) {
        return i !== item;
      });
    };

    var deleteSelectedItems = function() {
      if(!selectedItems.length || !confirm("Are you sure?"))
        return;

      deleteClientsFromDb(selectedItems);

      var $grid = $("#jsGrid");
      $grid.jsGrid("option", "pageIndex", 1);
      $grid.jsGrid("loadData");

      selectedItems = [];
    };

    var deleteClientsFromDb = function(deletingClients) {
      db.clients = $.map(db.clients, function(client) {
        return ($.inArray(client, deletingClients) > -1) ? null : client;
      });
    };
//    表单降序展示
 //   $("#jsGrid").jsGrid("sort", { field: "day_count", order: "desc" });
//    鼠标滑过'完成率、正确率'时展现详细内容
    $("[data-toggle='popover']").popover({html : true });
    $("[data-toggle='popover']").hover(function(){
      $(this).popover('show');
    },function(){
      $(this).popover('hide');
    });

    $('.input-daterange').datepicker({});
//    基本信息修改

    $('.div_scroll').scroll_absolute({arrows:false});

    //tab 切换
    $('.tab-tit div').click(function(){
      var oEleSib = $(this).parents('.tab-box').find('.tab-con>div'),
          oInd = $(this).index();
      $(this).addClass('on').siblings('div').removeClass('on');
      oEleSib.eq(oInd).addClass('on').siblings('div').removeClass('on');
      if($(this).data("type") == "course"){
        $("#jsGrid").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
        });
      }else if($(this).data("type") == "test"){
        $("#jsGrid1").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
        });
      }else if($(this).data("type") == "studyMethod"){
        $("#jsGrid2").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
        });
      }
    });


//    圆环
    $('#innerpie').highcharts({
      chart:{
        type:'pie'
      },
      exporting: {
        enabled:false
      },
      credits: {
        enabled: false
      },
      title:{
        text:'<div ><p class="rate-per">78%</p><p class="rate-text">达标率</p></div>',
        verticalAlign:'middle',
        y:0,
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
      title:{
        text:'<div ><p class="rate-per">78%</p><p class="rate-text">达标率</p></div>',
        verticalAlign:'middle',
        y:0,
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
      exporting: {
        enabled:false
      },
      credits: {
        enabled: false
      },
      title:{
        text:'<div ><p class="rate-per">76%</p><p class="rate-text">达标率</p></div>',
        verticalAlign:'middle',
        y:0,
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
          ['合格区域',   76],
          ['不合格区域', 24]
        ]
      }]
    });

  });
</script>
</body>
</html>
