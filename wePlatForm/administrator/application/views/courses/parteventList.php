<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('meta');?>
  <?php $this->load->view('tmpl/mmgrid');?>
  <?php $this->load->view('tmpl/fileupload');?>
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
          <a href="<?=anchorurl('courses')?>">课程管理</a><span>&nbsp;&gt;&nbsp;</span>
          <a href="<?=anchorurl('courses/getCourseUnit/'.$course->id)?>"><?=$course->name?></a><span>&nbsp;&gt;&nbsp;</span>
          <a href="<?=anchorurl('courses/getUnitLessons/'.$unit->id)?>"><?=$unit->name?></a><span>&nbsp;&gt;&nbsp;</span>
          <a href="<?=anchorurl('courses/getLessonparts/'.$lesson->id)?>"><?=$lesson->name?></a><span>&nbsp;&gt;&nbsp;</span>
          <a href="javascript:;"><?=$part->name?></a>
        </p>
      </div>
      <div class="col-md-4">
        <a href="<?=anchorurl("parts/getEventDetail/0/".$part->id)?>" class="btn btn-success update-icon pull-right">
          新建事件
        </a>
        <?php if(!empty($part->sync_origin_id) && !empty($part->event_type_id)):?>
          <a id="syncEvents" href="javascript:;" data-url="<?=anchorurl("parts/syncEvents/".$part->id)?>" class="btn btn-primary update-icon pull-right">
            同步事件
          </a>
        <?php endif;?>
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
                      <h1 class="table-tit">Event List</h1>
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
              <a href="javascript:;" class="btn-update-file btn btn-info">上传文件</a>
              <input id="fileupload" type="file" name="file" data-url="<?=anchorurl("fileupload/addFile/".$lesson->id)?>" multiple class="input-file">
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


<script>
  var part_id = <?=$part_id?>;
  var lesson_id = <?=$lesson->id?>;
  var file = null;
</script>
<input id="fileeditupload" type="file" name="file" class="input-file">
<a  data-toggle="modal" style="display: none" id="selectImage" data-target=".update-icon-box"></a>

<script type="text/javascript" src="<?=base_url()?>media/administrator/js/eventlist.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/filelist.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/jquery.ui.min.js"></script>
<script>
  var media_type = "image";
  $(function() {
    $('.update-icon-box').on('shown.bs.modal', function() {
      // alert(1);
      getFileList(true);

      // fileList.load({page: 1});
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
          "picture_file_ids":index_array.join(","),
          "media_file_ids":eventItem.media_file_ids,
          "timeRange":eventItem.timeRange,
          "text":eventItem.text,
          "type":eventItem.type,
          "id":eventItem.id,
        };
        $.ajax({
          type: "POST",
          async: false,
          url: '<?=anchorurl('parts/save')?>',
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

    $("#syncEvents").click(function(){
      var url = $(this).data("url");
      $.ajax({
        type: "GET",
        async: false,
        url: url,
        beforeSend:function(){
          $("#syncEvents").showLoading();
        },
        success: function (data){
          $("#syncEvents").hideLoading();
          retisterLimitTip("同步成功");
          mmg.load();
        }
      });
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

    $('#fileeditupload').fileupload({
      dataType: 'json',
      autoUpload: true,
      add: function (e, data) {
        var url = '<?=anchorurl("fileupload/addFile/".$lesson->id)?>/'+file.id;
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

  });
</script>
</body>
</html>
