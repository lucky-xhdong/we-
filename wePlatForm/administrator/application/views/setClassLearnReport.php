<!DOCTYPE html>
<html lang="en" class="">
<!-- 学习数据-班级学习要求概览报告 -->
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('meta');?>
  <?php $this->load->view('tmpl/reportHeightCharts'); ?>
</head>

<body>
<div class="app app-header-fixed ">
  <!-- header -->
  <?php $this->load->view('header')?>
  <!-- / header -->

  <!-- aside -->
  <?php $this->load->view('aside')?>
  <!-- / aside -->

  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body pag-15">
        <div class="bg-fff">
          <div class="report-tit b-b wrapper-md clearfix">
            <div class="col-md-8">
              <h1 class="report-h1">学习要求达标概览报告</h1>
            </div>
            <div class="col-md-4">
              <div class="input-daterange input-group  data-datepicker">
                <input type="text" class="input-sm form-control" name="start" value="2016.03.12">
                <span class="input-group-addon">至</span>
                <input type="text" class="input-sm form-control" name="end" value="2016.03.15">
              </div>
            </div>
          </div>
          <!--学习成绩达标 开始-->
          <div class="report-score">
            <h2 class="report-level-tit">学习成绩达标情况</h2>
            <div>
              <h4 class="rep-h4 col-md-offset-1">达标分数：60分</h4>
              <div id="report-pie"></div>
              <h5 class="text-center">班级成绩平均分95分<i>(满分100分)</i></h5>
            </div>
          </div>
          <!--学习成绩达标 结束-->
          <!--课程达标情况率 开始-->
          <div class="report-course">
            <h2 class="report-level-tit">学习成绩达标情况</h2>
            <div class="col-md-offset-1">
              <div>
                <h3 class="rep-h3">主课达标率</h3>
                <h4 class="rep-h4">主课达标率占30%权重</h4>
                <div class="progress-list main-progress clearfix">
                  <div class="col-md-12">
                    <div class="col-md-2 text-right">总完成率</div>
                    <div class="progress col-md-7">
                      <div class="progress-bar main-level-4" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      </div>
                    </div>
                    <div class="col-md-2">92人达标 <i>（92%）</i></div>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-2 text-right">Let’s GO</div>
                    <div class="progress col-md-7">
                      <div class="progress-bar main-level-0" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      </div>
                    </div>
                    <div class="col-md-2">0人达标 <i>（0%）</i></div>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-2 text-right">Let’s GO1</div>
                    <div class="progress col-md-7">
                      <div class="progress-bar main-level-1" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      </div>
                    </div>
                    <div class="col-md-2">12人达标 <i>（1-25%）</i></div>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-2 text-right">Let’s GO2</div>
                    <div class="progress col-md-7">
                      <div class="progress-bar main-level-2" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      </div>
                    </div>
                    <div class="col-md-2">26人达标 <i>（26%）</i></div>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-2 text-right">Let’s GO3</div>
                    <div class="progress col-md-7">
                      <div class="progress-bar main-level-3" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      </div>
                    </div>
                    <div class="col-md-2">72人达标 <i>（72%）</i></div>
                  </div>
                </div>
              </div>
              <div>
                <h3 class="rep-h3">辅课达标率</h3>
                <h4 class="rep-h4">辅课达标率占30%权重</h4>
                <div class="progress-list assist-progress clearfix">
                  <div class="col-md-12">
                    <div class="col-md-2 text-right">总完成率</div>
                    <div class="progress col-md-7">
                      <div class="progress-bar assist-level-4" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      </div>
                    </div>
                    <div class="col-md-2">92人达标 <i>（92%）</i></div>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-2 text-right">Let’s GO</div>
                    <div class="progress col-md-7">
                      <div class="progress-bar assist-level-0" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      </div>
                    </div>
                    <div class="col-md-2">0人达标 <i>（0%）</i></div>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-2 text-right">Let’s GO1</div>
                    <div class="progress col-md-7">
                      <div class="progress-bar assist-level-1" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      </div>
                    </div>
                    <div class="col-md-2">12人达标 <i>（1-25%）</i></div>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-2 text-right">Let’s GO2</div>
                    <div class="progress col-md-7">
                      <div class="progress-bar assist-level-2" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      </div>
                    </div>
                    <div class="col-md-2">26人达标 <i>（26%）</i></div>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-2 text-right">Let’s GO3</div>
                    <div class="progress col-md-7">
                      <div class="progress-bar assist-level-3" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      </div>
                    </div>
                    <div class="col-md-2">72人达标 <i>（72%）</i></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--课程达标情况率 结束-->
          <!--测试课成绩 开始-->
          <div class="report-test">
            <h2 class="report-level-tit">测试课成绩</h2>
            <div class="col-md-offset-1">
              <h3 class="rep-h3">学习天数</h3>
              <h4 class="rep-h4">学习天数至少60天</h4>
              <div class="clearfix">
                <div class="col-md-4">
                  <div id="test-ring" class="test-ringcol"></div>
                  <div class="ring-tit text-center">
                    <p>达标率70%</p>
                    <p>Placement Test</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div id="test-ring1" class="test-ringcol"></div>
                  <div class="ring-tit text-center">
                    <p>达标率60%</p>
                    <p>Placement Test</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div id="test-ring2" class="test-ringcol"></div>
                  <div class="ring-tit text-center">
                    <p>达标率50%</p>
                    <p>四六级模考</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--测试课成绩 结束-->

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

<script>
  $(function(){
    $('.input-daterange').datepicker({});
    $('#report-pie').highcharts({
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false
      },
      title: {
        text: ' '
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },

      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            distance:20,
            enabled: true,
            format: '<b>{point.name}</b>:{point.y}人 '
          }
        }
      },
      series: [{
        type: 'pie',
        name: '占比',
        data: [
          {
            name: '达标人数',
            y: 35,
            sliced: true
          },
          ['未达标人数',15]
        ]
      }]
    });
    $('#test-ring').highcharts({
      chart:{
        type:'pie'
      },
      exporting: {
        enabled:false
      },
      title:{
        text:'<div ><p class="rate-per">45人</p><p class="rate-text">达标人数</p></div>',
        verticalAlign:'middle',
        y:0,
        useHTML:true,
        fontFamily:"微软雅黑"
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions:{
        pie:{
          size:'100%',
          innerSize:'87%',
          cursor: 'pointer',
          dataLabels:{
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
        name: '占比',
        data: [
          [ '达标人数', 35],
          ['未达标人数',15]
        ]
      }]
    });
    $('#test-ring1').highcharts({
      chart:{
        type:'pie'
      },
      exporting: {
        enabled:false
      },
      title:{
        text:'<div ><p class="rate-per">38人</p><p class="rate-text">达标人数</p></div>',
        verticalAlign:'middle',
        y:0,
        useHTML:true,
        fontFamily:"微软雅黑"
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions:{
        pie:{
          size:'100%',
          innerSize:'87%',
          dataLabels:{
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
        name: '占比',
        data: [
          ['达标率',   60],
          ['不达标率', 40]
        ]
      }]
    });
    $('#test-ring2').highcharts({
      chart:{
        type:'pie'
      },
      exporting: {
        enabled:false
      },
      title:{
        text:'<div ><p class="rate-per">22人</p><p class="rate-text">达标人数</p></div>',
        verticalAlign:'middle',
        y:0,
        useHTML:true,
        fontFamily:"微软雅黑"
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions:{
        pie:{
          size:'100%',
          innerSize:'87%',
          cursor: 'pointer',
          dataLabels:{
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
        name: '占比',
        data: [
          ['达标率', 90],
          ['不达标率', 10]
        ]
      }]
    });
  })
</script>

</body>
</html>
