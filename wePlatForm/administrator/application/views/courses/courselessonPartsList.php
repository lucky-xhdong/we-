<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('meta');?>
  <?php $this->load->view('tmpl/mmgrid');?>
    <?php $this->load->view('tmpl/fileupload');?>
    <?php $this->load->view('tmpl/jqueryvalidate'); ?>
<!--    --><?php //$this->load->view('tmpl/audiojs'); ?>
    <link rel="stylesheet" href="<?=base_url()?>media/administrator/css/audio.css" type="text/css" />

</head>
<style>
  .jqx-chart-legend-text{
     opacity: 0 !important;
  }
  .bar {
      height: 12px;
      background: green;
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
          <p>
              <a href="<?=anchorurl('courses')?>">课程管理</a><span>&nbsp;&gt;&nbsp;</span>
              <a href="<?=anchorurl('courses/getCourseUnit/'.$course->id)?>"><?=$course->name?></a><span>&nbsp;&gt;&nbsp;</span>
              <a href="<?=anchorurl('courses/getUnitLessons/'.$unit->id)?>"><?=$unit->name?></a><span>&nbsp;&gt;&nbsp;</span>
              <a href="javascript:;"><?=$lesson->name?></a>
          </p>
      </div>
      <div class="col-md-4">
          <a href="javascript:;" class="btn btn-success update-icon pull-right" data-toggle="modal" data-target=".new-icon-box">
              新建
          </a>
          <a href="javascript:;" class="btn btn-success update-icon pull-right" data-toggle="modal" data-target=".update-icon-box">
              资源库
          </a>
      </div>
        <!-- 模态框（Modal） -->
    </div>
      <div class="modal fade update-icon-box"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width:800px;">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          &times;
                      </button>

                  </div>
                  <div class="modal-body">
                      <h4 class="modal-title" id="myModalLabel">
                          多媒体文件管理
                      </h4>
                      <div class="update-body">
                          <div class="clear">
                              <div id="progress" class="progress-set">
                                  <div class="progress-bg">
                                      <div class="bar" style="width: 0%;"></div>
                                  </div>
                                  <span class="progress-per" id="progress-per"></span>
                              </div>
                              <form class="navbar-form navbar-form-sm navbar-left shift" action="" onkeydown="if(event.keyCode==13){return false;}">
                                  <div class="form-group">
                                      <div class="input-group ">
                                          <input type="text"  id="filekey" class="form-control input-sm bg-light no-border rounded padder" placeholder="输入要查找到的信息">
                                            <span class="input-group-btn">
                                            <a type="button" class="btn btn-sm bg-light rounded" id="searchFiles">
                                                <i class="fa fa-search"></i>
                                            </a>
                                         </span>
                                      </div>
                                  </div>
                              </form>
                              <div class="update-file">
                                  <a href="javascript:;" class="btn-update-file btn btn-info">上传文件</a>
                                  <input id="fileupload" type="file" name="file" data-url="<?=anchorurl("fileupload/addFile/".$lesson_id)?>" multiple class="input-file">
                              </div>

                          </div>
                          <div class="updated-list" id="fileList">
                          </div>
                          <div id="paginatorFile"></div>
                      </div>
                  </div>
                  <div class="modal-footer mg-5">
                      <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                      </button>
                    <button type="button" class="btn btn-success" id="saveFiles">
                          确定
                      </button>
                  </div>
              </div><!-- /.modal-content -->
          </div><!-- /.modal -->
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
<a  data-toggle="modal" style="display: none" id="selectImage" data-target=".update-icon-box"></a>
<div class="modal fade new-icon-box" role="dialog">
    <div class="modal-dialog">
        <?php echo form_open('courses/updatePart', 'class="form login-form" id="formContent" enctype="multipart/form-data"'); ?>
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

<div class="modal fade event-list-box"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:800px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>

            </div>
            <div class="modal-body">
                <h4 class="modal-title" id="myModalLabel">
                    文件试听
                </h4>
                <div class="update-body">
                    <div class="updated-list" id="eventList">
                    </div>
                    <div id="paginatorEventList"></div>
                </div>
            </div>
            <div class="modal-footer mg-5">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<a  data-toggle="modal" style="display: none" id="selectEventList" data-target=".event-list-box"></a>
<script>
  var lesson_id = <?=$lesson_id?>;
  var isShowSubmtButton = false;
  var part_id = 0;
  var file = null;
</script>
<input id="fileeditupload" type="file" name="file" class="input-file">
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/lessonparts.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/filelist.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/testeventlist.js"></script>
<script>
    var media_type = null;
  $(function() {
      $('.update-icon-box').on('shown.bs.modal', function() {
         // alert(1);
          getFileList(false);
          console.log(isShowSubmtButton);
          if(isShowSubmtButton){
              $("#saveFiles").show();
          }else{
              $("#saveFiles").hide();
          }
          isShowSubmtButton = false;

         // fileList.load({page: 1});
     });

      $('.event-list-box').on('shown.bs.modal', function() {
          // alert(1);
          part_id = eventItem.id;
          gettestEventList();
      });
      $(".event-list-box").on("hidden.bs.modal", function() {
          $(this).removeData();
      });

      $("#saveFiles").click(function(){
          var selectedRows =  fileList.selectedRows();
          var index_array = new Array();
          console.log(selectedRows);
          for(var i=0;i<selectedRows.length;i++){
              index_array.push(selectedRows[i].id);
          }
          console.log(eventItem);
          if(eventItem != null && index_array.length > 0){
              var data = {
                  "file_id":index_array.join(","),
                  "id":eventItem.id
              };
              $.ajax({
                  type: "POST",
                  async: false,
                  url: '<?=anchorurl('courses/partSave')?>',
                  data: {
                      data:JSON.stringify(data),
                  },
                  beforeSend:function(){
                      $("#saveFiles").showLoading();
                  },
                  success: function (data){
                      $("#saveFiles").hideLoading();
                      retisterLimitTip("保存成功");
                      $(".update-icon-box").modal("hide");
                      mmg.load();
                  }
              });
          }
      });

      $('#fileeditupload').fileupload({
          dataType: 'json',
          autoUpload: true,
          add: function (e, data) {
              var url = '<?=anchorurl("fileupload/addFile/".$lesson_id)?>/'+file.id;
              $(this).fileupload('option', 'url', url);
              data.submit();
          },
          progressall: function (e, data) {
              var progress = parseInt(data.loaded / data.total * 100, 10);
              if(progress == 0 || progress == 100){
                  $("#progress").hide();
              }else{
                  $("#progress").show();
              }

              $('#progress .bar').css(
                  'width',
                  progress + '%'
              );
              $("#progress-per").html( progress + '%');
          },
          done: function (e, data) {
//              $.each(data.result.files, function (index, file) {
//                  $('<p/>').text(file.name).appendTo(document.body);
//              });
              $("#progress").hide();

              fileList.load({page: 1});
          }
      });

      $('#fileupload').fileupload({
          dataType: 'json',
          progressall: function (e, data) {
              var progress = parseInt(data.loaded / data.total * 100, 10);
              if(progress == 0 || progress == 100){
                  $("#progress").hide();
              }else{
                  $("#progress").show();
              }

              $('#progress .bar').css(
                  'width',
                  progress + '%'
              );
              $("#progress-per").html( progress + '%');
          },
          done: function (e, data) {
//              $.each(data.result.files, function (index, file) {
//                  $('<p/>').text(file.name).appendTo(document.body);
//              });
              $("#progress").hide();

              fileList.load({page: 1});
          }
      });

  });
</script>
<script>
    var PartItem = {};
    PartItem.id = 0;
    PartItem.lesson_id = <?=$lesson_id?>;
    $(function() {
        $("#formContent").validate();
        $('.new-icon-box').on('shown.bs.modal', function() {
            $.ajax({
                type: "GET",
                url: '<?=anchorurl('courses/getPartDetail')?>/'+PartItem.id+'/'+PartItem.lesson_id,
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
        $(document).keyup(function(event){
            if(event.keyCode ==13){
                fileList.load({key:$("#filekey").val()});
            }
        });
        $("#searchFiles").click(function(){
            fileList.load({key:$("#filekey").val()});
        });
    });
</script>
</body>
</html>
