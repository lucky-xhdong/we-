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
  .span-all {
      position: absolute;
      top: 10px;
      left: 58px !important;
  }
  .class-list, .grade-list {
      position: relative;
      padding: 10px 70px 10px 147px !important;
      background: #f5f5f5;
      min-height: 40px;
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
          <a href="<?=anchorurl('courses')?>">课程管理</a><span>&nbsp;&gt;&nbsp;</span>
          <a href="javascript:;"><?=$course->name?></a>
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
                      <div class="clear mgb-10">
                          <div class="col-md-6">
                              <h1 class="table-tit">基本信息</h1>
                          </div>
                      </div>
                    <div >
                        <?php if($course->id > 1):?>
                        <!--level-->
                        <div class="class-list" data-type="Levels:">
                            <span class="span-all on" data-trigger="level" data-id="0">全部</span>
                            <div class="class-list-span" id="level-list-span">

                            </div>
                            <button type="button" class="btn btn-primary edit-class-btn" data-toggle="modal" data-target=".edit-class">
                                编辑 Level
                            </button>
                            <div class="modal fade edit-class"  role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="edit-start edit-class-start">
                                                <h4 class="modal-title">编辑 Level</h4>
                                                <div class="edit-main ">
                                                    <div class="row">
                                                        <div class="edit-th">
                                                            <span class="col-md-5">名称</span>
                                                            <span class="col-md-2">操作</span>
                                                        </div>
                                                        <div id="levelList">
                                                        </div>
                                                    </div>
                                                    <span class="edit-add" id="addlevel">新增Level</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>
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
    <?php echo form_open('courses/updateUnit', 'class="form login-form" id="formContent" enctype="multipart/form-data"'); ?>
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
<div id="levelTemplate" type="text/x-jquery-tmpl" style="display:none">
    <div class="edit-tr">
        <div class="col-md-5">
            <input type="text" name="name" value="${name}">
        </div>
        <input type="hidden" name="level_id" value="${id}">
        <div class="col-md-2 del-icon">
            <span class="keep-btn savelevel" data-id="${id}">保存</span>
            <span class="del-btn dellevel" data-id="${id}">删除</span>
        </div>
    </div>
</div>
<div id="levelSimepleTemplate" type="text/x-jquery-tmpl" style="display:none">
    <span data-id="${id}" data-trigger="level">${name}</span>
</div>

<script>
  var course_id = <?=$course_id?>;
  var level_id = 0;
</script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/courseunit.js"></script>
<script src="<?=base_url()?>media/administrator/js/bootbox.min.js"></script>

<script>
  var UnitItem = {};
  UnitItem.id = 0;
  UnitItem.course_id = <?=$course->id?>;
  $(function() {
    $("#formContent").validate();
    $('.new-icon-box').on('shown.bs.modal', function() {
      $.ajax({
        type: "GET",
        url: '<?=anchorurl('courses/getUnitDetail')?>/'+UnitItem.id+'/'+UnitItem.course_id+'/'+level_id,
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

      function getLevelList(){
          $.ajax({
              url: "<?=anchorurl('courses/getlevels/'.$course->id)?>",
              type: "GET",
              dataType: 'json',
              success: function (data, textstatus) {
                  $("#levelList").empty();
                  $("#levelTemplate").tmpl(data).appendTo('#levelList');
                  $("#level-list-span").empty();
                  $("#levelSimepleTemplate").tmpl(data).appendTo('#level-list-span');
              }
          });
      }
      getLevelList();

      $("#levelList").undelegate('.dellevel', 'click').delegate('.dellevel', 'click', function () {
          var level_id_new = $(this).data('id');
          if(level_id_new == 0){
              $(this).parents('.edit-tr').remove();
          }else{
              bootbox.dialog({
                  message: "您确定要删除吗？",
                  title: "",
                  buttons: {
                      cancel: {
                          label: "取消",
                          className: "btn-success",
                          callback: function() {
                          }
                      },
                      confirm: {
                          label: "删除",
                          className: "btn-danger",
                          callback: function() {
                              $.ajax({
                                  url: "<?=anchorurl('courses/deleteLevel/'.$course->id)?>",
                                  type: "POST",
                                  dataType: 'json',
                                  data:{
                                      level_id:level_id_new,
                                  },
                                  async: false,
                                  success: function (data, textstatus) {
                                      $("#levelList").empty();
                                      $("#levelTemplate").tmpl(data).appendTo('#levelList');
                                      $("#level-list-span").empty();
                                      $("#levelSimepleTemplate").tmpl(data).appendTo('#level-list-span');
                                  }
                              });
                          }
                      }
                  }
              });
          }
      });


      $("#levelList").undelegate('.savelevel', 'click').delegate('.savelevel', 'click', function () {
          var level_id_new = $(this).data('id');
          var name = $(this).parents('.edit-tr').find("input[name='name']").val();

          $.ajax({
              url: "<?=anchorurl('courses/addLevels/'.$course->id)?>",
              type: "POST",
              dataType: 'json',
              data:{
                  level_id:level_id_new,
                  name:name,
                  course_id:<?=$course->id?>
              },
              async: false,
              success: function (data, textstatus) {
                  $("#levelList").empty();
                  $("#levelTemplate").tmpl(data).appendTo('#levelList');
                  $("#level-list-span").empty();
                  $("#levelSimepleTemplate").tmpl(data).appendTo('#level-list-span');
                  retisterLimitTip("保存成功");
              }
          });
      });

      $("#addlevel").click(function(){
          var data = {
              name:"",
              id:0,
          };
          $("#levelTemplate").tmpl(data).appendTo('#levelList');
      });

      $("body").undelegate('span[data-trigger="level"]', 'click').delegate('span[data-trigger="level"]', 'click', function () {
          if(!$(this).hasClass('on')) {
              $('span[data-trigger="level"]').removeClass('on');
              $(this).addClass('on');
              level_id = $(this).data('id');
              mmg.load({"level_id":level_id});
          }
      });

  });
</script>
</body>
</html>
