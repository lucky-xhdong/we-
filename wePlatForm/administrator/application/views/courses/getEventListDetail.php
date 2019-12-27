<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('meta');?>
  <?php $this->load->view('tmpl/mmgrid');?>

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
            <div class="data-select col-md-8">
              <!--        <select name="" id="">-->
              <!--          <option value="">西部吧</option>-->
              <!--        </select>-->
              <!--        <select name="" id="">-->
              <!--          <option value="">甘肃省</option>-->
              <!--        </select>-->
              <!--        <select name="" id="">-->
              <!--          <option value="">兰州市</option>-->
              <!--        </select>-->
              <!--        <select name="" id="">-->
              <!--          <option value="">某某区</option>-->
              <!--        </select>-->
            </div>
            <div class="col-md-4">
              <a href="javascript:;" class="btn btn-success update-icon pull-right" data-toggle="modal" data-target=".update-icon-box">
                上传文件
              </a>
            </div>
            <!-- 模态框（Modal） -->
            <div class="modal fade update-icon-box"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      &times;
                    </button>

                  </div>
                  <div class="modal-body">
                    <h4 class="modal-title" id="myModalLabel">
                      素材上传
                    </h4>
                    <div class="update-body">
                      <div class="clear">
                        <form class="navbar-form navbar-form-sm navbar-left shift" ui-shift="prependTo" data-target=".navbar-collapse" role="search" ng-controller="TypeaheadDemoCtrl">
                          <div class="form-group">
                            <div class="input-group ">
                              <input type="text" ng-model="selected" typeahead="state for state in states | filter:$viewValue | limitTo:8" class="form-control input-sm bg-light no-border rounded padder" placeholder="输入要查找到的信息">
                              <span class="input-group-btn">
                                            <button type="submit" class="btn btn-sm bg-light rounded">
                                                <i class="fa fa-search"></i>
                                            </button>
                                         </span>
                            </div>
                          </div>
                        </form>
                        <div class="update-file">
                          <a href="javascript:;" class="btn-update-file btn btn-info">选择文件</a>
                          <input type="file" class="input-file">
                        </div>
                      </div>
                      <div class="updated-list">
                        <ul>
                          <li>
                            <div class="updated-info">
                              <input type="checkbox">
                              <span>名称：课件一</span>
                              <span>类型：音频</span>
                              <span class="btn-updated-del">删除</span>
                            </div>
                            <div class="updated-img">
                              <img src="https://wonderenglish.weedu.net.cn/media/assets/parts/listening.png" alt="">
                            </div>
                          </li>
                          <li>
                            <div class="updated-info">
                              <input type="checkbox">
                              <span>名称：我们都是乖孩子</span>
                              <span>类型：视频</span>
                              <span class="btn-updated-del">删除</span>
                            </div>
                            <div class="updated-img">
                              <img src="https://wonderenglish.weedu.net.cn/media/assets/parts/listening.png" alt="">
                            </div>
                          </li>
                          <li>
                            <div class="updated-info">
                              <input type="checkbox">
                              <span>名称：课件二</span>
                              <span>类型：音频</span>
                              <span class="btn-updated-del">删除</span>
                            </div>
                            <div class="updated-img">
                              <img src="https://wonderenglish.weedu.net.cn/media/assets/parts/listening.png" alt="">
                            </div>
                          </li>
                          <li>
                            <div class="updated-info">
                              <input type="checkbox">
                              <span>名称：我们都是乖孩子</span>
                              <span>类型：视频</span>
                              <span class="btn-updated-del">删除</span>
                            </div>
                            <div class="updated-img">
                              <img src="https://wonderenglish.weedu.net.cn/media/assets/parts/listening.png" alt="">
                            </div>
                          </li>
                        </ul>
                      </div>

                    </div>
                  </div>
                  <div class="modal-footer mg-5">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                    <button type="button" class="btn btn-primary">
                      提交更改
                    </button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal -->
            </div>
          </div>
          <!-- / main header -->
          <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">

            <!-- 图标区域 结束 -->
            <!-- tasks -->

            <div class="row">
              <div class="col-md-12">
                <div class="app-content" role="main" style="margin-left: 0">
                  <div class="app-content-body ">
                    <div class="panel panel-default">
                      <div class="table-tit-box">
                        <div class="col-md-6">
                          <h1 class="table-tit">详情信息</h1>
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
</body>
</html>

