<!DOCTYPE html>
<html lang="en" class="">
<!-- 学习数据-课程概览报告-->
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('meta'); ?>
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


      <div class="hbox hbox-auto-xs hbox-auto-sm" ng-init=" app.settings.asideFolded = false;  app.settings.asideDock = false;">
        <!-- main -->
        <div class="col">
          <!-- main header -->
          <!-- / main header -->
          <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
            <!-- service -->
            <!-- 课程进度 -->
            <div class="panel hbox hbox-auto-xs no-border">
              <div class="col wrapper" style="padding: 0">
                <div class="panel-heading wrapper b-b b-light" style="padding: 0;background-color: #fafafa">
                  <h4 class="font-thin m-t-none m-b-none text-muted " style="color: #000000;padding: 15px;font-size: 12px">课程进度</h4>
                </div>
                <div class="col-md-2">
                  <h3 style="text-align: center">主课</h3>
                  <h4 style="color: #999999;float: right">主课已完成计划的3/1</h4>
                </div>
                <div class="col-md-8" id="radarChart2" style="text-align: center">
                  <div class="" style="padding: 30px">
                    <div class="">
                      <span class="pull-right text-primary">60%</span>
                      <span>1班</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="60%" style="width: 60%"></div>
                    </div>
                    <div class="">
                      <span class="pull-right text-info">35%</span>
                      <span>1班</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-info" data-toggle="tooltip" data-original-title="35%" style="width: 35%"></div>
                    </div>
                    <div class="">
                      <span class="pull-right text-warning">25%</span>
                      <span>1班</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-danger" data-toggle="tooltip" data-original-title="23%" style="width:25%"></div>
                    </div>

                    <div class="">
                      <span class="pull-right text-warning">99%</span>
                      <span>1班</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-success" data-toggle="tooltip" data-original-title="23%" style="width: 99%"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                <div class="col-md-2">
                  <h3 style="text-align: center">主课</h3>
                  <h4 style="color: #999999;float: right">主课已完成计划的3/1</h4>
                </div>
                <div class="col-md-8" id="" style="text-align: center">
                  <div class="" style="padding: 30px">
                    <div class="">
                      <span class="pull-right text-primary">60%</span>
                      <span>1班</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="60%" style="width: 60%"></div>
                    </div>
                    <div class="">
                      <span class="pull-right text-info">35%</span>
                      <span>1班</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-info" data-toggle="tooltip" data-original-title="35%" style="width: 35%"></div>
                    </div>
                    <div class="">
                      <span class="pull-right text-warning">25%</span>
                      <span>1班</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-danger" data-toggle="tooltip" data-original-title="23%" style="width:25%"></div>
                    </div>

                    <div class="">
                      <span class="pull-right text-warning">99%</span>
                      <span>1班</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-success" data-toggle="tooltip" data-original-title="23%" style="width: 99%"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                </div>
              </div>

            </div>
            <!-- 学习时间 -->
            <div class="panel hbox hbox-auto-xs no-border">
              <div class="col wrapper" style="padding: 0">
                <div class="panel-heading wrapper b-b b-light" style="padding: 0;background-color: #fafafa">
                  <h4 class="font-thin m-t-none m-b-none text-muted " style="color: #000000;padding: 15px;font-size: 12px">学习时间</h4>
                </div>
                <div class="col-md-2">
                  <h3 style="text-align: center">学习天数</h3>
                  <h4 style="color: #999999;float: right">这里需要说点什么吗？</h4>
                </div>
                <div class="col-md-8" style="text-align: center">
                  <canvas id="testScoresCancvs" width="600" height="450" _echarts_instance_="ec_1480475412976" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); -webkit-user-select: none; padding: 0px; margin: 0px; border-width: 0px; position: relative; cursor: default;"><div></div></canvas>
                </div>
                <div class="col-md-2">
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                <div class="col-md-2">
                  <h3 style="float: right">学习时间</h3>
                  <h4 style="color: #999999">主课已完成计划的</h4>
                </div>
                <div class="col-md-8" style="text-align: center">
                <canvas id="Linegraph" width="600" height="450" _echarts_instance_="ec_1480475412976" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); -webkit-user-select: none; padding: 0px; margin: 0px; border-width: 0px; position: relative; cursor: default;"><div></div></canvas>
                </div>
                <div class="col-md-2">
                </div>
              </div>

            </div>
            <!-- 课程完成率&正确率 -->
            <div class="panel hbox hbox-auto-xs no-border">
              <div class="col wrapper" style="padding: 0">
                <div class="panel-heading wrapper b-b b-light" style="padding: 0;background-color: #fafafa">
                  <h4 class="font-thin m-t-none m-b-none text-muted " style="color: #000000;padding: 15px;font-size: 12px">课程进度</h4>
                </div>
                <div class="col-md-2">
                  <h3 style="text-align: center">完成率</h3>
                  <h4 style="color: #999999;float: right">主课已完成计划的3/1</h4>
                </div>
                <div class="col-md-8" style="text-align: center">
                  <div class="" style="padding: 30px">
                    <div class="">
                      <span class="pull-right text-primary">60%</span>
                      <span>总完成率</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="60%" style="width: 60%"></div>
                    </div>
                    <div class="">
                      <span class="pull-right text-info">35%</span>
                      <span>boy</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-info" data-toggle="tooltip" data-original-title="35%" style="width: 35%"></div>
                    </div>
                    <div class="">
                      <span class="pull-right text-warning">25%</span>
                      <span>lows</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-danger" data-toggle="tooltip" data-original-title="23%" style="width:25%"></div>
                    </div>

                  </div>
                </div>
                <div class="col-md-2">
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                <div class="col-md-2">
                  <h3 style="text-align: center">正确率</h3>
                  <h4 style="color: #999999;float: right">主课已完成计划的3/1</h4>
                </div>
                <div class="col-md-8"  style="text-align: center">
                  <div class="" style="padding: 30px">
                    <div class="">
                      <span class="pull-right text-primary">60%</span>
                      <span>1班</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="60%" style="width: 60%"></div>
                    </div>
                    <div class="">
                      <span class="pull-right text-info">35%</span>
                      <span>1班</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-info" data-toggle="tooltip" data-original-title="35%" style="width: 35%"></div>
                    </div>
                    <div class="">
                      <span class="pull-right text-warning">25%</span>
                      <span>1班</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-danger" data-toggle="tooltip" data-original-title="23%" style="width:25%"></div>
                    </div>

                  </div>
                </div>
                <div class="col-md-2">
                </div>
              </div>

            </div>
            <!-- 语音识别率 -->
            <div class="panel hbox hbox-auto-xs no-border">
              <div class="col wrapper" style="padding: 0">
                <div class="panel-heading wrapper b-b b-light" style="padding: 0;background-color: #fafafa">
                  <h4 class="font-thin m-t-none m-b-none text-muted " style="color: #000000;padding: 15px;font-size: 12px">学习成绩达标情况</h4>
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-6" id="testScores" style="min-height: 450px;padding: 30px;text-align: center">
                  <canvas id="piechart" width="600" height="450" _echarts_instance_="ec_1480573253114" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); -webkit-user-select: none; padding: 0px; margin: 0px; border-width: 0px; position: relative; cursor: default;"><div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1), top 0.4s cubic-bezier(0.23, 1, 0.32, 1); background-color: rgba(50, 50, 50, 0.701961); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;; line-height: 21px; padding: 5px; left: 206px; top: 279px;">访问来源 <br>搜索引擎 : 1548 (60.42%)</div></canvas>
                </div>

                <div class="col-md-3">
                </div>
              </div>

            </div>
            <!-- 技能概览 -->
            <div class="panel hbox hbox-auto-xs no-border">
              <div class="col wrapper" style="padding: 0">
                <div class="panel-heading wrapper b-b b-light" style="padding: 0;background-color: #fafafa">
                  <h4 class="font-thin m-t-none m-b-none text-muted " style="color: #000000;padding: 15px;font-size: 12px">技能概览</h4>
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-6" id="radarChart3" style="min-height: 500px;padding: 30px;text-align: center">
                  <div class="wrapper-md">
                    <div class="row text-center">
                      <div class="col-sm-4 col-xs-6 quan">
                        <div ui-jq="easyPieChart" ui-options="{
            percent: 75,
              lineWidth: 4,
              trackColor: '#e8eff0',
              barColor: '#7266ba',
              scaleColor: false,
              size: 115,
              rotate: 90,
              lineCap: 'butt'
            }" class="inline m-t easyPieChart" style="width: 115px;height: 115px;line-height: 115px;">
                          <div class="text-primary"><strong>56分</strong><p>听力理解能力</p></div>
                          <canvas width="115" height="115"></canvas><canvas width="115" height="115"></canvas><canvas width="115" height="115"></canvas></div>
                      </div>
                      <div class="col-sm-4 col-xs-6 quan">
                        <div ui-jq="easyPieChart" ui-options="{
              percent: 35,
              lineWidth: 4,
              trackColor: '#e8eff0',
              barColor: '#23b7e5',
              scaleColor: false,
              size: 115,
              rotate: 0,
              lineCap: 'butt'
            }" class="inline m-t easyPieChart" style="width: 115px; height: 115px; line-height: 115px;">
                          <div class="text-primary"><strong>56分</strong><p>口语综合能力</p></div>
                          <canvas width="115" height="115"></canvas><canvas width="115" height="115"></canvas><canvas width="115" height="115"></canvas></div>
                      </div>
                      <div class="col-sm-4 col-xs-6 quan">
                        <div ui-jq="easyPieChart" ui-options="{
              percent: 50,
              lineWidth: 4,
              trackColor: '#e8eff0',
              barColor: '#fad733',
              scaleColor: false,
              size: 115,
              rotate: 180,
              lineCap: 'butt'
            }" class="inline m-t easyPieChart" style="width: 115px; height: 115px; line-height: 115px;">
                          <div class="text-primary"><strong>56分</strong><p>语法基础能力</p></div>
                          <canvas width="115" height="115"></canvas><canvas width="115" height="115"></canvas><canvas width="115" height="115"></canvas></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                </div>
              </div>

              <!-- / tasks -->
            </div>
            <!-- 测试成绩报告 -->

            <!-- 学习方法 -->
            <div class="panel hbox hbox-auto-xs no-border">
              <div class="col wrapper" style="padding: 0">
                <div class="panel-heading wrapper b-b b-light" style="padding: 0;background-color: #fafafa">
                  <h4 class="font-thin m-t-none m-b-none text-muted " style="color: #000000;padding: 15px;font-size: 12px">课程进度</h4>
                </div>
                <div class="col-md-2">
                  <h3 style="text-align: center">完成率</h3>
                  <h4 style="color: #999999;float: right">主课已完成计划的3/1</h4>
                </div>
                <div class="col-md-8" style="text-align: center">
                  <div class="" style="padding: 30px">
                    <div class="">
                      <span class="pull-right text-primary">60%</span>
                      <span>总完成率</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="60%" style="width: 60%"></div>
                    </div>
                    <div class="">
                      <span class="pull-right text-info">35%</span>
                      <span>boy</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-info" data-toggle="tooltip" data-original-title="35%" style="width: 35%"></div>
                    </div>
                    <div class="">
                      <span class="pull-right text-warning">25%</span>
                      <span>lows</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-danger" data-toggle="tooltip" data-original-title="23%" style="width:25%"></div>
                    </div>

                  </div>
                </div>
                <div class="col-md-2">
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                <div class="col-md-2">
                  <h3 style="text-align: center">正确率</h3>
                  <h4 style="color: #999999;float: right">主课已完成计划的3/1</h4>
                </div>
                <div class="col-md-8"  style="text-align: center">
                  <div class="" style="padding: 30px">
                    <div class="">
                      <span class="pull-right text-primary">60%</span>
                      <span>1班</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="60%" style="width: 60%"></div>
                    </div>
                    <div class="">
                      <span class="pull-right text-info">35%</span>
                      <span>1班</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-info" data-toggle="tooltip" data-original-title="35%" style="width: 35%"></div>
                    </div>
                    <div class="">
                      <span class="pull-right text-warning">25%</span>
                      <span>1班</span>
                    </div>
                    <div class="progress progress-xs m-t-sm bg-white">
                      <div class="progress-bar bg-danger" data-toggle="tooltip" data-original-title="23%" style="width:25%"></div>
                    </div>

                  </div>
                </div>
                <div class="col-md-2">
                </div>
              </div>

            </div>
            <!-- / tasks -->
          </div>
        </div>
        <!-- / right col -->
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

<script src="../libs/jquery/jquery/dist/jquery-1.11.1.min.js"></script>
<script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<script src="js/chart.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/effects.js"></script>
<!--[if lte IE 8]>
<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->
<script src="js/ui-load.js"></script>
<script src="js/ui-jp.config.js"></script>
<script src="js/ui-jp.js"></script>
<script src="js/ui-nav.js"></script>
<script src="js/ui-toggle.js"></script>
<script src="js/ui-client.js"></script>
<script src="js/echarts.min.js"></script>
<script>
  var Linegraph = echarts.init(document.getElementById('Linegraph'));

  option = {
    title: {
      text: '堆叠区域图'
    },
    tooltip : {
      trigger: 'axis'
    },
    legend: {
      data:['邮件营销','联盟广告','视频广告','直接访问','搜索引擎']
    },
    toolbox: {
      feature: {
        saveAsImage: {}
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
        boundaryGap : false,
        data : ['周一','周二','周三','周四','周五','周六','周日']
      }
    ],
    yAxis : [
      {
        type : 'value'
      }
    ],
    series : [
      {
        name:'邮件营销',
        type:'line',
        stack: '总量',
        areaStyle: {normal: {}},
        data:[0, 132, 101, 134, 90, 230, 210]
      }
    ]
  };
  Linegraph.setOption(option);
</script>
<script>
  var ScoresCancvs = echarts.init(document.getElementById('testScoresCancvs'));

  var dataAxis = ['点', '击', '柱', '子', '或', '者', '两', '指', '在', '触', '屏', '上', '滑', '动', '能', '够', '自', '动', '缩', '放'];
  var data = [220, 182, 191, 234, 290, 330, 310, 123, 442, 321, 90, 149, 210, 122, 133, 334, 198, 123, 125, 220];
  var yMax = 500;
  var dataShadow = [];

  for (var i = 0; i < data.length; i++) {
    dataShadow.push(yMax);
  }

  option = {
    title: {
      text: '特性示例：渐变色 阴影 点击缩放',
      subtext: 'Feature Sample: Gradient Color, Shadow, Click Zoom'
    },
    xAxis: {
      data: dataAxis,
      axisLabel: {
        inside: true,
        textStyle: {
          color: '#fff'
        }
      },
      axisTick: {
        show: false
      },
      axisLine: {
        show: false
      },
      z: 10
    },
    yAxis: {
      axisLine: {
        show: false
      },
      axisTick: {
        show: false
      },
      axisLabel: {
        textStyle: {
          color: '#999'
        }
      }
    },
    dataZoom: [
      {
        type: 'inside'
      }
    ],
    series: [
      { // For shadow
        type: 'bar',
        itemStyle: {
          normal: {color: 'rgba(0,0,0,0.05)'}
        },
        barGap:'-100%',
        barCategoryGap:'40%',
        data: dataShadow,
        animation: false
      },
      {
        type: 'bar',
        itemStyle: {
          normal: {
            color: new echarts.graphic.LinearGradient(
                    0, 0, 0, 1,
                    [
                      {offset: 0, color: '#83bff6'},
                      {offset: 0.5, color: '#188df0'},
                      {offset: 1, color: '#188df0'}
                    ]
            )
          },
          emphasis: {
            color: new echarts.graphic.LinearGradient(
                    0, 0, 0, 1,
                    [
                      {offset: 0, color: '#2378f7'},
                      {offset: 0.7, color: '#2378f7'},
                      {offset: 1, color: '#83bff6'}
                    ]
            )
          }
        },
        data: data
      }
    ]
  };

  // Enable data zoom when user click bar.
  var zoomSize = 6;
  ScoresCancvs.on('click', function (params) {
    console.log(dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)]);
    ScoresCancvs.dispatchAction({
      type: 'dataZoom',
      startValue: dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)],
      endValue: dataAxis[Math.min(params.dataIndex + zoomSize / 2, data.length - 1)]
    });
  });

  ScoresCancvs.setOption(option);
</script>
<script>
  var piechart = echarts.init(document.getElementById('piechart'));
  option = {
    title : {
      text: '某站点用户访问来源',
      subtext: '纯属虚构',
      x:'center'
    },
    tooltip : {
      trigger: 'item',
      formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
      orient: 'vertical',
      left: 'left',
      data: ['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']
    },
    series : [
      {
        name: '访问来源',
        type: 'pie',
        radius : '55%',
        center: ['50%', '60%'],
        data:[
          {value:335, name:'直接访问'},
          {value:310, name:'邮件营销'},
          {value:234, name:'联盟广告'},
          {value:135, name:'视频广告'},
          {value:1548, name:'搜索引擎'}
        ],
        itemStyle: {
          emphasis: {
            shadowBlur: 10,
            shadowOffsetX: 0,
            shadowColor: 'rgba(0, 0, 0, 0.5)'
          }
        }
      }
    ]
  };

  piechart.setOption(option);
</script>
</body>
</html>
