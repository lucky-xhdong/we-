<!DOCTYPE html>
<html lang="en" class="">
<!-- 学习数据-个人学习成绩报告 -->
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('meta') ?>
</head>
<body>
<div class="app app-header-fixed ">


  <!-- header -->
  <?php $this->load->view('header') ?>
  <!-- / header -->


  <!-- aside -->
  <?php $this->load->view('aside') ?>
  <!-- / aside -->


  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body pag-15">
        <!-- main -->
        <div class="col">
          <!-- main header -->
          <!-- / main header -->
          <div class="bg-fff">
            <!-- service -->
            <div class="panel hbox hbox-auto-xs no-border" >
              <div class="col">
                <div class="panel-heading wrapper">
                  <a class="btn btn-default btn-sm btn-save" style="float: right">导出</a>
                  <h3 class="personal-tit">个人学习成绩报告</h3>
                </div>
                <div class="clearfix recordtext text-center">
                    <div class="col-md-3"><span> 姓 名：</span>王一</div>
                    <div class="col-md-5"><span> 所在班级：</span>灵山县 林山小学 一三级四班</div>
                    <div class="col-md-4"><span>时间范围：</span>2016年9月-2017年9月</div>
                </div>
                <div class="personal-report">
                  <div class="record recordtext">
                    <div class="clearfix">
                      <div class="col-md-4 col-md-offset-1">
                        <h4>学习成绩得分：<span>90分</span><span class="recordspan">(满分100分)</span></h4>
                      </div>
                    </div>
                    <div class="clearfix">
                      <div class="col-md-3 col-md-offset-1">
                        <h5>其中主课得分<span class="recordspan">（满分60分）</span></h5>
                        <h4>50分</h4>
                      </div>
                      <div class="col-md-3 col-md-offset-1">
                        <h5>辅课得分<span class="recordspan">（满分20分）</span></h5>
                        <h4>20分</h4>
                      </div>
                      <div class="col-md-3 col-md-offset-1">
                        <h5>测试得分<span class="recordspan">（满分20分）</span></h5>
                        <h4>20分</h4>
                      </div>
                    </div>
                  </div>
                  <div class="recordtext col-md-10 col-md-offset-1">
                        <h3 class="record-tit">以下是单课学习成绩详情报告</h3>
                        <div class="recordtext-item">
                          <h4>主课1 New DYnamic English得分：<span>30分<i class="recordspan">（满分30分）</i></span></h4>
                          <div class="clearfix">
                            <div class="col-md-4 ">
                              <h5>学习单元数量：8个<span class="recordspan">（应学10个）</span></h5>
                            </div>
                            <div class="col-md-4 ">
                              <h5>学习方法得分：4分<span class="recordspan">（标准分4分）</span></h5>
                            </div>
                            <div class="col-md-4 ">
                              <h5>单元测试平均分：60分<span class="recordspan">（标准分60分）</span></h5>
                            </div>
                            <div class="col-md-4 ">
                              <h5>平均单元完成率：50%<span class="recordspan">（完成率：60%）</span></h5>
                            </div>
                            <div class="col-md-4 ">
                              <h5>评论单元正确率：无<span class="recordspan">（标准无）</span></h5>
                            </div>
                          </div>
                        </div>
                        <div class="recordtext-item">
                          <h4>辅课1 New DYnamic English得分：<span>20分<i class="recordspan">（满分20分）</i></span></h4>
                          <div class="clearfix">
                            <div class="col-md-4 ">
                              <h5>学习单元数量：8个<span class="recordspan">（应学10个）</span></h5>
                            </div>
                            <div class="col-md-4 ">
                              <h5>学习方法得分：4分<span class="recordspan">（标准分4分）</span></h5>
                            </div>
                            <div class="col-md-4 ">
                              <h5>单元测试平均分：60分<span class="recordspan">（标准分60分）</span></h5>
                            </div>
                            <div class="col-md-4 ">
                              <h5>平均单元完成率：50%<span class="recordspan">（完成率：60%）</span></h5>
                            </div>
                            <div class="col-md-4 ">
                              <h5>评论单元正确率：无<span class="recordspan">（标准无）</span></h5>
                            </div>
                          </div>
                        </div>
                        <div class="recordtext-item">
                          <div>
                            <h4>测试课1 四六级模考得分：<span>3分<i class="recordspan">（满分3分）</i></span></h4>
                            <div class="clearfix">
                              <div class="col-md-4 ">
                                学习单元数量：8个<span class="recordspan">（应学10个）</span>
                              </div>
                            </div>
                          </div>
                          <div>
                            <h4>测试课2 Placement Test得分：<span>3分<i class="recordspan">（满分3分）</i></span></h4>
                            <div class="clearfix">
                              <div>
                                <div class="col-md-6 ">
                                  第一次测试得分：1.5分
                                </div>
                                <div class="col-md-6 ">
                                  第一次测试时间：2016.01.01
                                </div>
                              </div>
                              <div>
                                <div class="col-md-6 ">
                                  第二次测试得分：1.5分
                                </div>
                                <div class="col-md-6 ">
                                  第二次测试时间：2016.01.01
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
            </div>
            <!-- 学习成绩达标要求 -->
          </div>
        <!-- / right col -->
        </div>
    </div>
  <!-- /content -->

  <!-- footer -->
  <footer id="footer" class="app-footer" role="footer">
    <div class="wrapper b-t bg-light">
      <span class="pull-right">2.2.0 <a href  class="m-l-sm text-muted"><i class="fa fa-long-arrow-up"></i></a></span>
      &copy; 2016 Copyright.
    </div>
  </footer>
  <!-- / footer -->
  </div>

</body>
</html>
