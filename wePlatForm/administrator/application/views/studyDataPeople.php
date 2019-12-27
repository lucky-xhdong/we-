<!DOCTYPE html>
<html lang="en" class="">
<!-- 学习数据-个人数据 -->
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('meta');?>
</head>
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
            <div class="row">
              <div class="col-sm-6 col-xs-12" style="font-size: 18px">
                <ol class="breadcrumb">
                  <li>
                    <a>公司</a>
                  </li>
                  <li>
                    <a>西部吧</a>
                  </li>
                  <li>
                    <a>贵州省</a>
                  </li>
                  <li>
                    <a>黔南市</a>
                  </li>
                  <li>
                    <a>开阳区</a>
                  </li>
                  <li>
                    <a>第一实验小学</a>
                  </li>
                  <li>
                    <a>一年级</a>
                  </li>
                  <li>
                    <storg>李健</storg>
                  </li>
                </ol>
              </div>
              <div class="col-sm-6 text-right hidden-xs" >
                <div class="input-group w-md" style="float: right">
            <span class="input-group-btn">
                <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
                  <input ui-jq="daterangepicker" ui-options="{
                format: 'YYYY-MM-DD',
                startDate: '2013-01-01',
                endDate: '2013-12-31'
              }" class="form-control w-md"  />

                </div>
              </div>
            </div>
          </div>
          <!-- / main header -->
          <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
            <!-- service -->
            <div class="panel hbox hbox-auto-xs no-border" >
              <div class="col wrapper" style="padding: 0">
                <div class="panel-heading wrapper b-b b-light">
                  <a class="btn btn-default btn-sm" style="float: right">导出</a>
                  <h4 class="font-thin m-t-none m-b-none text-muted ">个人总学习数据概览</h4>
                </div>
                <div class="col-md-3">
                  <div class="btn-group" ng-init="checkModel = {option1: true, option2: false}">
                    <label class="btn btn-sm btn-default" ng-model="checkModel.option1" btn-checkbox="">智能辅导</label>
                    <label class="btn btn-sm btn-default" ng-model="checkModel.option3" btn-checkbox="">详细数据</label>
                  </div>
                </div>
                <div class="col-md-6 radar" id="radarChart">

                </div>
                <div class="col-md-3">
                </div>
              </div>

            </div>
            <div class="panel hbox hbox-auto-xs no-border" >
              <div class="col wrapper" style="padding: 0">
                <div class="panel-heading wrapper b-b b-light" >
                  <a class="btn btn-default btn-sm" style="float: right">导出</a>
                  <a class="btn btn-default btn-sm" style="float: right" href=" <?=site_url('StudyData/personalLearnReport')?>">成绩报告</a>
                  <h4 class="font-thin m-t-none m-b-none text-muted ">个人学习成绩得分</h4>
                </div>
                <div class="col-md-4" style="min-height: 450px;border-right:2.5px #f9f9f9 solid;" id="testSubject">
                </div>
                <div class="col-md-6 radarpie" id="testScores">
                </div>
                <div class="col-md-2" style="min-height: 450px;border-left:2.5px #f9f9f9 solid;display: table;margin: 0 auto;text-align: center">
                  <div style="display: table-cell;vertical-align:middle;">
                    <a class="btn m-b-xs w-sm btn-default">课程设置</a><br/>
                    <a class="btn m-b-xs w-sm btn-default">学习要求设置</a>
                  </div>
                </div>
              </div>

            </div>
            <!-- / service -->

            <!-- tasks -->

            <div class="row">

              <div class="col-md-12">
                <div class="app-content" role="main" style="margin-left: 0">
                  <div class="app-content-body ">
                    <div class="wrapper-md">
                      <div class="panel panel-default">
                        <!-- 表格导航 -->
                        <div class="nav-tabs-alt" >
                          <ul class="nav nav-tabs" role="tablist">
                            <li class="active">
                              <a data-target="#tab-1" role="tab" data-toggle="tab">
                                <i class="glyphicon glyphicon-user text-md text-muted wrapper-sm"></i>
                                <span>按课程查看</span>
                              </a>
                            </li>
                            <li>
                              <a data-target="#tab-2" role="tab" data-toggle="tab">
                                <i class="glyphicon glyphicon-comment text-md text-muted wrapper-sm"></i>
                                <span>按时间查看</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <!-- end表格导航 -->
                        <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab-1">
                        <div class="row wrapper">
                          <div class="col-sm-5 m-b-xs">
                            <ol class="breadcrumb">
                              <li>
                                <strong>基本信息</strong>
                              </li>
                            </ol>
                          </div>
                          <div class="col-sm-5">
                            <div class="input-group" style="float: right">
                              <input type="text" style="width: 30%;float: right" ng-model="selected" typeahead="state for state in states | filter:$viewValue | limitTo:8" class="form-control input-sm bg-light no-border rounded padder" placeholder="输入姓名">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-sm bg-light rounded"><i class="fa fa-search"></i></button>
                        </span>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <a class="btn btn-success"  style="margin: 0 auto"> 导出 </a>
                            <a class="btn btn-success" style="margin: 0 auto"> 历史班级 </a>
                          </div>
                        </div>
                        <div class="table-responsive">
                          <table class="table table-striped b-t b-light">
                            <thead>
                            <tr>
                              <th>模块</th>
                              <th>单元</th>
                              <th>课</th>
                              <th>小结</th>
                              <th>次数</th>
                              <th>状态</th>
                              <th>学习时间</th>
                              <th>学习时长</th>
                              <th>水准级</th>
                              <th>完成率</th>
                              <th>正确率</th>
                              <th>备注</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr >
                              <td>Module</td>
                              <td>unite</a></td>
                              <td><span class="text-ellipsis">pass</span></td>
                              <td><span class="text-ellipsis">listing</span></td>
                              <td>10005</td>
                              <td><i class="icon-lock-open"></i></td>
                              <td><span class="text-ellipsis">2017.3.15 <a class="text-info-lter icon-eye"></a></span> </td>
                              <td><span class="text-ellipsis">02:02:01 <a class="text-info-lter icon-settings"></a></span> </td>
                              <td><span class="text-ellipsis">易</span></td>
                              <td><span class="text-ellipsis">65%</span></td>
                              <td><span class="text-ellipsis">68%</span></td>
                              <td></td>
                            </tr >
                            <tr >
                              <td>一单元</td>
                              <td>unite</a></td>
                              <td><span class="text-ellipsis">pass</span></td>
                              <td><span class="text-ellipsis">listing</span></td>
                              <td>10005</td>
                              <td><i class="icon-lock-open"></i></td>
                              <td><span class="text-ellipsis">2017.3.15 <a class="text-info-lter icon-eye"></a></span> </td>
                              <td><span class="text-ellipsis">02:02:01 <a class="text-info-lter icon-settings"></a></span> </td>
                              <td><span class="text-ellipsis">易</span></td>
                              <td><span class="text-ellipsis">65%</span></td>
                              <td><span class="text-ellipsis">68%</span></td>
                              <td></td>
                            </tr >
                            </tbody>
                          </table>
                        </div>
                          <footer class="panel-footer">
                            <div class="row">
                              <div class="col-sm-4 hidden-xs">
                                <span>每页显示</span>
                                <select class="input-sm form-control w-sm inline v-middle" style="width: 70px">
                                  <option value="0">10</option>
                                  <option value="1">20</option>
                                  <option value="2">30</option>
                                  <option value="3">40</option>
                                </select>
                                <span>条</span>
                              </div>
                              <div class="col-sm-4 text-center">
                                <ul class="pagination pagination-sm m-t-none m-b-none">
                                  <li><a href><i class="fa fa-chevron-left"></i></a></li>
                                  <li><a href>1</a></li>
                                  <li><a href>2</a></li>
                                  <li><a href>3</a></li>
                                  <li><a href>4</a></li>
                                  <li><a href>5</a></li>
                                  <li><a href><i class="fa fa-chevron-right"></i></a></li>
                                </ul>
                              </div>
                              <div class="col-sm-4 text-right text-center-xs">
                              </div>
                            </div>
                          </footer>
                          </div>
                        <div role="tabpanel" class="tab-pane " id="tab-2">
                          <div class="row wrapper">
                            <div class="col-sm-5 m-b-xs">
                            </div>
                            <div class="col-sm-5">

                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-default btn-sm" style="float: right">导出</a>
                            </div>
                          </div>
                          <div class="table-responsive">
                            <table class="table table-striped b-t b-light">
                              <thead>
                              <tr>
                                <th>日期</th>
                                <th>时间</th>
                                <th>学习时长</th>
                                <th>学习内容</th>
                                <th>水准级</th>
                                <th>完成率</th>
                                <th>正确率</th>
                                <th>测试成绩</th>
                                <th>备注</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr >
                                <td>2017.3.15</td>
                                <td>19:14</a></td>
                                <td><span class="text-ellipsis">02:33</span></td>
                                <td><span class="text-ellipsis">没学什么</span></td>
                                <td><span class="text-ellipsis">易</span></td>
                                <td><span class="text-ellipsis">65%</span></td>
                                <td><span class="text-ellipsis">68%</span></td>
                                <td><span class="text-ellipsis">67分</span></td>
                                <td></td>
                              </tr >
                              <tr >
                                <td>2017.3.15</td>
                                <td>19:14</a></td>
                                <td><span class="text-ellipsis">02:33</span></td>
                                <td><span class="text-ellipsis">没学什么</span></td>
                                <td><span class="text-ellipsis">易</span></td>
                                <td><span class="text-ellipsis">65%</span></td>
                                <td><span class="text-ellipsis">68%</span></td>
                                <td><span class="text-ellipsis">67分</span></td>
                                <td></td>
                              </tr >
                              </tbody>
                            </table>
                          </div>
                          <footer class="panel-footer">
                            <div class="row">
                              <div class="col-sm-4 hidden-xs">
                                <span>每页显示</span>
                                <select class="input-sm form-control w-sm inline v-middle" style="width: 70px">
                                  <option value="0">10</option>
                                  <option value="1">20</option>
                                  <option value="2">30</option>
                                  <option value="3">40</option>
                                </select>
                                <span>条</span>
                              </div>
                              <div class="col-sm-4 text-center">
                                <ul class="pagination pagination-sm m-t-none m-b-none">
                                  <li><a href><i class="fa fa-chevron-left"></i></a></li>
                                  <li><a href>1</a></li>
                                  <li><a href>2</a></li>
                                  <li><a href>3</a></li>
                                  <li><a href>4</a></li>
                                  <li><a href>5</a></li>
                                  <li><a href><i class="fa fa-chevron-right"></i></a></li>
                                </ul>
                              </div>
                              <div class="col-sm-4 text-right text-center-xs">
                              </div>
                            </div>
                          </footer>
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
<?php $this->load->view('javaScript')?>
<script>
  // 饼图
  require(
      [
        'echarts',
        'echarts/chart/pie' // 使用柱状图就加载bar模块，按需加载
      ],
      function (ec) {
        // 基于准备好的dom，初始化echarts图表
        var myChart = ec.init(document.getElementById('testScores'));

        var option = {
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
            orient : 'vertical',
            x : 'left',
            data:['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']
          },
          toolbox: {
            show : true,
            feature : {
              mark : {show: true},
              dataView : {show: true, readOnly: false},
              magicType : {
                show: true,
                type: ['pie', 'funnel'],
                option: {
                  funnel: {
                    x: '25%',
                    width: '50%',
                    funnelAlign: 'left',
                    max: 1548
                  }
                }
              },
              restore : {show: true},
              saveAsImage : {show: true}
            }
          },
          calculable : true,
          series : [
            {
              name:'访问来源',
              type:'pie',
              radius : '55%',
              center: ['50%', '60%'],
              data:[
                {value:335, name:'直接访问'},
                {value:310, name:'邮件营销'},
                {value:234, name:'联盟广告'},
                {value:135, name:'视频广告'},
                {value:1548, name:'搜索引擎'}
              ]
            }
          ]
        };

        // 为echarts对象加载数据
        myChart.setOption(option);
      }
  );
  if(BrowserType()== "IE8"){
    $(".radarpie").addClass("radar").removeClass("radarpie");
  }
</script>
<script>
  var testSubject =echarts.init(document.getElementById('testSubject'));
  testSubject.showLoading({
    text: '正在努力的读取数据中...',    //loading话术
  });
  // ajax getting data...............

  // ajax callback
//  myChart.hideLoading();
  var labelTop = {
    normal : {
      label : {
        show : true,
        position : 'center',
        formatter : '{b}',
        textStyle: {
          baseline : 'bottom'
        }
      },
      labelLine : {
        show : false
      }
    }
  };
  var labelFromatter = {
    normal : {
      label : {
        formatter : function (params){
          return 100 - params.value + '%'
        },
        textStyle: {
          baseline : 'top'
        }
      }
    },
  }
  var labelBottom = {
    normal : {
      color: '#ccc',
      label : {
        show : true,
        position : 'center'
      },
      labelLine : {
        show : false
      }
    },
    emphasis: {
      color: 'rgba(0,0,0,0)'
    }
  };
  var radius = [40, 55];
  var options = {
    legend: {
      x : 'center',
      y : 'center',
      data:[
        'GoogleMaps','Facebook','Youtube','Google+','Weixin',
        'Twitter', 'Skype', 'Messenger', 'Whatsapp', 'Instagram'
      ]
    },
    title : {
      text: 'The App World',
      subtext: 'from global web index',
      x: 'center'
    },
    toolbox: {
      show : true,
      feature : {
        dataView : {show: true, readOnly: false},
        magicType : {
          show: true,
          type: ['pie', 'funnel'],
          option: {
            funnel: {
              width: '20%',
              height: '30%',
              itemStyle : {
                normal : {
                  label : {
                    formatter : function (params){
                      return 'other\n' + params.value + '%\n'
                    },
                    textStyle: {
                      baseline : 'middle'
                    }
                  }
                },
              }
            }
          }
        },
        restore : {show: true},
        saveAsImage : {show: true}
      }
    },
    series : [
      {
        type : 'pie',
        center : ['10%', '30%'],
        radius : radius,
        x: '0%', // for funnel
        itemStyle : labelFromatter,
        data : [
          {name:'other', value:46, itemStyle : labelBottom},
          {name:'GoogleMaps', value:54,itemStyle : labelTop}
        ]
      }
    ]
  };
  testSubject.setOption(options);
</script>
</body>
</html>
