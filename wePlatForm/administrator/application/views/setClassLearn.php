<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('meta');?>
  <?php $this->load->view('jsgrid'); ?>
  <link rel="stylesheet" href="<?=base_url()?>media/administrator/css/font-awesome.min.css">
  <!--  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">-->
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
          <div class="wrapper-md " >
            <div class="course-set-box border-cf">
              <h1 class="course-set-tit">三班课程设置</h1>
              <div class="row">
                <div class="col-md-12">
                  <div class="app-content" role="main" style="margin-left: 0">
                    <div class="app-content-body ">
                      <!--学习基本要求 开始-->
                      <div class="panel panel-default panel-no-mg">
                        <div class="table-tit-box borb-cf">
                          <div class="col-md-6">
                            <h1 class="table-tit">学习基本要求</h1>
                          </div>
                          <div class="col-md-6">
                            <div class="btn btn-default save-btn type-show">保存</div>
                            <div class="btn btn-default cancel-btn type-show">取消</div>
                            <div class="edit-btn btn-info type-hide">编辑</div>
                          </div>
                        </div>
                        <div>
                          <ul class="basic-info clearfix pag-15">
                            <li class="col-md-12">
                              <span class="col-md-6" style="padding-right:45px;">学习时段:</span>
                              <div class="col-md-6">
                                <div class="learn-input input-daterange input-group  data-datepicker">
                                  <input type="text" class="input-sm form-control" name="start" value=" ">
                                  <span class="input-group-addon">至</span>
                                  <input type="text" class="input-sm form-control" name="end" value=" " disabled >
                                </div>
                              </div>
                            </li>
                            <li class="col-md-12">
                              <span class="col-md-6">周学习天数不低于：</span>
                              <div class="col-md-6">
                                <p class="type-show pull-left">2天</p>
                                <div  class="type-hide pull-left w-50">
                                  <input type="number">天
                                </div>
                                <i class="col-99">（总学习天数最少30天）</i>
                              </div>
                            </li>
                            <li class="col-md-12">
                              <span class="col-md-6">周学习时间不低于：</span>
                              <div class="col-md-6">
                                <p class="type-show pull-left">2小时</p>
                                <div  class="type-hide pull-left ">
                                  <input type="number">小时
                                </div>
                                <i class="col-99">（总学习天数最少100小时）</i>
                              </div>
                            </li>
                            <li class="col-md-12">
                              <span class="col-md-6">每次学习时间最少：</span>
                              <div class="col-md-6">
                                <p class="type-show pull-left">2小时</p>
                                <div class="type-hide pull-left w-50">
                                  <input type="number">小时
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <!--基本设置 结束-->
                      <!--学习成绩达标要求 开始-->
                      <div class="panel panel-default panel-no-mg">
                        <div class="table-tit-box borb-cf">
                          <div class="col-md-6">
                            <h1 class="table-tit">学习成绩达标要求（满分100分）</h1>
                          </div>
                          <div class="col-md-6">
                            <div class="btn btn-default save-btn type-show">保存</div>
                            <div class="btn btn-default cancel-btn type-show">取消</div>
                            <div class="edit-btn btn-info type-hide">编辑</div>
                          </div>
                        </div>
                        <div>
                          <div class="clearfix pag-15">
                            <h1 class="course-set-tit text-center">主课(占30%)</h1>
                            <ul class="basic-info clearfix pag-15">
                              <li class="col-md-12">
                                <span class="col-md-6">课程名称：</span>
                                <div class="col-md-6">
                                  <p class="type-show">First English</p>
                                  <select name="" id="" class="type-hide">

                                  </select>
                                </div>
                              </li>
                              <li class="col-md-12">
                                <span class="col-md-6">权重百分比：</span>
                                <div class="col-md-6">
                                  <p class="type-show">30%</p>
                                  <div class="type-hide">
                                    <select name="" id="" ></select>
                                    %
                                  </div>
                                </div>
                              </li>
                              <li class="col-md-12">
                                <span class="col-md-6">单元测试平均分：</span>
                                <div class="col-md-6">
                                  <p class="type-show">87分</p>
                                  <div class="type-hide">
                                    <select name="" id="" ></select>
                                    分
                                  </div>
                                </div>
                              </li>
                              <li class="col-md-12">
                                <span class="col-md-6">学习方法得分：</span>
                                <div class="col-md-6">
                                  <p class="type-show">23分</p>
                                  <div class="type-hide">
                                    <select name="" id="" ></select>
                                    分
                                  </div>
                                </div>
                              </li>
                              <li class="col-md-12">
                                <span class="col-md-6">平均单元正确率：</span>
                                <div class="col-md-6">
                                  <p class="type-show">87%</p>
                                  <div class="type-hide">
                                    <select name="" id="" ></select>
                                    %
                                  </div>
                                </div>
                              </li>
                              <li class="col-md-12">
                                <span class="col-md-6">平均单元完成率：</span>
                                <div class="col-md-6">
                                  <p class="type-show">89%</p>
                                  <div class="type-hide">
                                    <select name="" id="" ></select>
                                    %
                                  </div>
                                </div>
                              </li>
                              <li class="col-md-12">
                                <span class="col-md-6">计划学习单元总数：</span>
                                <div class="col-md-6">
                                  <p class="type-show">12个</p>
                                  <div class="type-hide">
                                    <select name="" id="" ></select>
                                    个
                                  </div>
                                </div>
                              </li>
                            </ul>
                            <div class="col-md-12 type-hide">
                              <div class="col-md-6 text-right">
                                <a href="javascript:;" class="add-course">添加辅课+</a>
                              </div>
                            </div>
                          </div>
                          <div class="clearfix pag-15">
                            <h1 class="course-set-tit text-center">辅课(占40%)</h1>
                            <div class="col-md-12 type-hide">
                              <div class="col-md-6 text-right">
                                <a href="javascript:;" class="add-course">添加辅课+</a>
                              </div>
                            </div>
                          </div>
                          <div class="clearfix pag-15">
                            <h1 class="course-set-tit text-center">测试课(占40%)</h1>
                            <div class="col-md-12 type-hide">
                              <div class="col-md-6 text-right">
                                <a href="javascript:;" class="add-course">添加辅课+</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--学习成绩达标要求 结束-->
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
  $(function(){
    $('.input-daterange').datepicker({});
  });
</script>
</body>
</html>
