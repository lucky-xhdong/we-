<!DOCTYPE html>
<html lang="en" class="">
<!-- 学习数据-班级课程设置 -->
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
          <!-- / main header -->
          <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
            <!-- service -->

            <div class="panel hbox hbox-auto-xs no-border" >
              <div class="col wrapper" style="padding: 0">
                <div class="panel-heading wrapper b-b b-light">

                  <h4 class="font-thin m-t-none m-b-none text-muted " style="color: #000000">三班课程设置</h4>
                </div>
                <div class="panel-heading wrapper b-b b-light" style="padding: 0;background-color: #fafafa">
                  <a class="btn btn-default btn-sm btn-save savered" style="" href="<?=site_url('StudyData/setClassSave')?>">保存</a>
                  <a class="btn btn-default btn-sm btn-save">取消</a>
                  <h4 class="font-thin m-t-none m-b-none text-muted " style="color: #000000;padding: 15px;font-size: 12px">三班课程设置</h4>
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-6" id="radarChart" style="min-height: 500px;padding: 30px;text-align: center">
                  <div class="form-group" style="line-height: 35px">
                    <label class="col-sm-4 control-label"><span style="float: right;">学习时段：</span></label>
                    <div class="input-group w-md" style="padding-left: 15px">
            <span class="input-group-btn">
                <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
                      <input ui-jq="daterangepicker" ui-options="{
                format: 'YYYY-MM-DD',
                startDate: '2013-01-01',
                endDate: '2013-12-31'
              }" class="form-control w-md">

                    </div>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group" style="line-height: 35px">
                    <label class="col-sm-4 control-label"><span style="float: right;">周学习天数不低于：</span></label>
                    <div class="col-sm-7">
                      <div class="row">
                        <div class="col-md-2">
                          <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                          天
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group" style="line-height: 35px">
                    <label class="col-sm-4 control-label"><span style="float: right;">周学习时间不低于：</span></label>
                    <div class="col-sm-7">
                      <div class="row">
                        <div class="col-md-2">
                          <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                          小时
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group" style="line-height: 35px">
                    <label class="col-sm-4 control-label"><span style="float: right;">每次学习时间最少：</span></label>
                    <div class="col-sm-7">
                      <div class="row">
                        <div class="col-md-2">
                          <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                          小时
                        </div>
                      </div>
                    </div>
                  </div>


                </div>
                <div class="col-md-3">
                </div>
              </div>

            </div>
            <!-- 学习成绩达标要求 -->
            <div class="panel hbox hbox-auto-xs no-border" >
              <div class="col wrapper" style="padding: 0">
                <div class="panel-heading wrapper b-b b-light" style="padding: 0;background-color: #fafafa">
                  <a class="btn btn-default btn-sm btn-save savered" style="">保存</a>
                  <a class="btn btn-default btn-sm btn-save">取消</a>
                  <h4 class="font-thin m-t-none m-b-none text-muted " style="color: #000000;padding: 15px;font-size: 12px">学习成绩达标要求(满分100分)</h4>
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-6" style="min-height: 500px;padding: 30px;text-align: center">
                  <div class="form-group" style="line-height: 35px">
                    <label class="col-sm-12 control-label"><h2>主课(占30%)</h2></label>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group" style="line-height: 35px">
                    <label class="col-sm-4 control-label"><span style="float: right;">周学习天数不低于：</span></label>
                    <div class="col-sm-7">
                      <div class="row">
                        <div class="col-md-2">
                          <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                          天
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group" style="line-height: 35px">
                    <label class="col-sm-4 control-label"><span style="float: right;">课程名称：</span></label>
                    <div class="col-sm-7">
                      <div class="row">
                        <div class="col-md-4">
                          <select name="account" class="form-control m-b" required>
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group" style="line-height: 35px">
                    <label class="col-sm-4 control-label"><span style="float: right;">权重百分比：</span></label>
                    <div class="col-sm-7">
                      <div class="row">
                        <div class="col-md-3">
                          <select name="account" class="form-control m-b" required>
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                          </select>
                        </div>
                        <div class="col-md-2">
                          %
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group" style="line-height: 35px">
                    <label class="col-sm-4 control-label"><span style="float: right;">单元测试平均分：</span></label>
                    <div class="col-sm-7">
                      <div class="row">
                        <div class="col-md-3">
                          <select name="account" class="form-control m-b" required>
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                          </select>
                        </div>
                        <div class="col-md-2">
                          分
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group" style="line-height: 35px">
                    <label class="col-sm-4 control-label"><span style="float: right;">学习方法得分：</span></label>
                    <div class="col-sm-7">
                      <div class="row">
                        <div class="col-md-3">
                          <select name="account" class="form-control m-b" required>
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                          </select>
                        </div>
                        <div class="col-md-2">
                          分
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group" style="line-height: 35px">
                    <label class="col-sm-4 control-label"><span style="float: right;">平均单元正确率：</span></label>
                    <div class="col-sm-7">
                      <div class="row">
                        <div class="col-md-3">
                          <select name="account" class="form-control m-b" required>
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                          </select>
                        </div>
                        <div class="col-md-2">
                          %
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group" style="line-height: 35px">
                    <label class="col-sm-4 control-label"><span style="float: right;">平均单元完成率：</span></label>
                    <div class="col-sm-7">
                      <div class="row">
                        <div class="col-md-3">
                          <select name="account" class="form-control m-b" required>
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                          </select>
                        </div>
                        <div class="col-md-2">
                          %
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group" style="line-height: 35px">
                    <label class="col-sm-4 control-label"><span style="float: right;">计划学习单元总数：</span></label>
                    <div class="col-sm-7">
                      <div class="row">
                        <div class="col-md-3">
                          <select name="account" class="form-control m-b" required>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
                        </div>
                        <div class="col-md-2">
                         个
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <p><a style="color: red">添加辅课+</a></p>

                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group" style="line-height: 35px">
                    <label class="col-sm-12 control-label"><h2>辅课(占40%)</h2></label>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <p><a style="color: red">添加辅课+</a></p>

                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group" style="line-height: 35px">
                    <label class="col-sm-12 control-label"><h2>测试课(占40%)</h2></label>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <p><a style="color: red">添加辅课+</a></p>

                </div>
                <div class="col-md-3">
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

<?php $this->load->view('javaScript')?>
</body>
</html>
