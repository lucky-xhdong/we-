<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('meta');?>
  <?php $this->load->view('tmpl/mmgrid');?>
  <?php $this->load->view('tmpl/jqueryvalidate'); ?>

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
        <p>
          <a href="<?=anchorurl('courses')?>">课程管理</a><span>&nbsp;&nbsp;</span>
        </p>
      </div>
      <div class="col-md-4">
        <a href="javascript:;" class="btn btn-success update-icon pull-right" data-toggle="modal" data-target=".new-icon-box">
          新建
        </a>
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
                      <h1 class="table-tit">基本信息</h1>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <div class="table-con">
                      <div id="mmGrid"></div>
                      <div id="paginator"></div>
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
<div class="modal fade new-icon-box" role="dialog">
  <div class="modal-dialog">
    <?php echo form_open('courses/updateCourse', 'class="form login-form" id="formContent" enctype="multipart/form-data"'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <!--基本信息 开始-->
        <div class="basic-box">
          <h4 class="modal-title" >基本信息</h4>
          <div class="text-center basic-info pag-15">
            <ul id="courseContent">

            </ul>
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-success" id="saveContent">提交</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>

</div>
<a  data-toggle="modal" style="display: none" id="selectItem" data-target=".new-icon-box"></a>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/course.js"></script>
<script>
  var courseItem = {};
  courseItem.id = 0;
  $(function() {
    $("#formContent").validate();
    $('.new-icon-box').on('shown.bs.modal', function() {
      $.ajax({
        type: "GET",
        url: '<?=anchorurl('courses/getCourseDetail')?>/'+courseItem.id,
        beforeSend:function(){
          $("#courseContent").showLoading();
        },
        success: function (data){
          $("#courseContent").html(data);
          $("#courseContent").hideLoading();
        }
      });
    });

    $("#saveContent").click(function(){
      $("#saveContent").showLoading();
      $("#formContent").ajaxForm({
        dataType: 'json',
        success: function (data) {
          console.log(data);
          $("#saveContent").hideLoading();
          if (data.errcode == 0) {
            retisterLimitTip("发布成功");
            $('.new-icon-box').modal("hide");
            mmg.load({});
          }
        }
      }).submit();
    });

  });
</script>
</body>
</html>
