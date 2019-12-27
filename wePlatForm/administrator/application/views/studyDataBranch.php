<!DOCTYPE html>
<html lang="en" class="">
<!-- 学习数据--省 -->
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
              <div class="col-sm-6 col-xs-12 onetitle">
                <ol class="breadcrumb">
                  <li>
                    <a>公司</a>
                  </li>
                  <li>
                    <storg>西部吧</storg>
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
              <div class="col wrapper-lg w-lg bg-light dk r-r" style="padding:0;">
                <div class="row">
                  <div class="col-sm-12 m-b-xs">
                    <p>
                      <button class="btn btn-default btn-sm" style="width: 100%">综合得分排名</button>
                    </p>
                  </div>
                </div>
                <div class="" style="padding: 30px">
                  <div class="">
                    <span class="pull-right text-primary">60%</span>
                    <span>贵州</span>
                  </div>
                  <div class="progress progress-xs m-t-sm bg-white">
                    <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="60%" style="width: 60%"></div>
                  </div>
                  <div class="">
                    <span class="pull-right text-info">35%</span>
                    <span>西藏</span>
                  </div>
                  <div class="progress progress-xs m-t-sm bg-white">
                    <div class="progress-bar bg-info" data-toggle="tooltip" data-original-title="35%" style="width: 35%"></div>
                  </div>
                  <div class="">
                    <span class="pull-right text-warning">25%</span>
                    <span>青海</span>
                  </div>
                  <div class="progress progress-xs m-t-sm bg-white">
                    <div class="progress-bar bg-danger" data-toggle="tooltip" data-original-title="23%" style="width:25%"></div>
                  </div>

                  <div class="">
                    <span class="pull-right text-warning">99%</span>
                    <span>四川</span>
                  </div>
                  <div class="progress progress-xs m-t-sm bg-white">
                    <div class="progress-bar bg-success" data-toggle="tooltip" data-original-title="23%" style="width: 99%"></div>
                  </div>
                </div>
                <!--<p class="text-muted">Dales nisi nec adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis</p>-->
              </div>
              <div class="col wrapper" style="padding: 0">
                <p>
                  <button class="btn btn-default btn-sm" style="width: 100%">综合得分排名</button>
                </p>
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
            <!-- / service -->

            <!-- tasks -->

            <div class="row">
              <div class="col-md-12">
                <div class="app-content" role="main" style="margin-left: 0">
                  <div class="app-content-body ">
                    <div class="wrapper-md">
                      <div class="panel panel-default">
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
                              <th>名称</th>
                              <th>总人数</th>
                              <th>账号总数</th>
                              <th>校装账号总数</th>
                              <th>家装账号总数</th>
                              <th>校装账号活跃度</th>
                              <th>班级老师</th>
                              <th>备注</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr >
                              <td>平均值</td>
                              <td>23412 <a class="text-info-lter icon-pencil" href="<?=site_url('StudyData/studyDataCity')?>"></a> <a class="text-info-lter fa fa-mail-forward"></a></td>
                              <td><span class="text-ellipsis">1456</span></td>
                              <td><span class="text-ellipsis">1632</span></td>
                              <td>1632</td>
                              <td>1632</td>
                              <td><span class="text-ellipsis">2017.3.15 <a class="text-info-lter icon-eye"></a></span> </td>
                              <td><span class="text-ellipsis">李老师 <a class="text-info-lter icon-settings"></a></span> </td>
                            </tr >
                            <tr >
                              <td>贵州</td>
                              <td>23412 <a class="text-info-lter icon-pencil" href="studyDataCity.html"></a> <a class="text-info-lter fa fa-mail-forward"></a></td>
                              <td><span class="text-ellipsis">1456</span></td>
                              <td><span class="text-ellipsis">1632</span></td>
                              <td>1632</td>
                              <td>1632</td>
                              <td><span class="text-ellipsis">2017.3.15 <a class="text-info-lter icon-eye"></a></span> </td>
                              <td><span class="text-ellipsis">李老师 <a class="text-info-lter icon-settings"></a></span> </td>
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
            <!-- / tasks -->
          </div>
        </div>
        <!-- / main -->
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

<?php $this->load->view('javaScript') ?>
</body>
</html>
