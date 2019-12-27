<!DOCTYPE html>
<html lang="en" class="">
<!-- 创建公司区域 -->
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('jsgrid'); ?>
  <?php $this->load->view('tmpl/mmgrid');?>
  <?php $this->load->view('meta'); ?>
  <?php $this->load->view('tmpl/jqueryvalidate'); ?>
</head>

<body>
<div class="app app-header-fixed ">

    <!-- header -->
  <?php $this->load->view('header'); ?>
  <!-- / header -->


    <!-- aside -->
  <?php $this->load->view('aside'); ?>
  <!-- / aside -->

  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">
      <div class="bg-light lter b-b wrapper-md" style="height: auto">
        <div class="col-md-8">
          <p>
            <a href="<?=anchorurl('materialResources')?>">素材管理</a><span>&nbsp;&nbsp;</span>
          </p>
        </div>
        <div class="col-md-4">
          <a href="javascript:;" class="btn btn-success update-icon pull-right" data-toggle="modal" data-target=".new-icon-box">
            上传
          </a>
        </div>
      </div>

      <div class="wrapper-md">
        <div class="panel panel-default">
          <div class="wrap-tit">
            <div class="row ">
              <div class="col-sm-6">
                <div class="linkage-con">
                  <span>按素材类型:</span>
                  <select name="resource_type_id" id="type_filter">
                    <option value="0">--请选择--</option>
                      <?php foreach($types as $type):?>
                          <option value="<?=$type->id?>"><?=$type->name?></option>
                      <?php endforeach;?>
                  </select>
                    <span>按区域学校:</span>
                  <select name="region_id" id="region_filter">
                    <option value="0">--请选择--</option>
                      <?php foreach($regions as $region):?>
                          <option value="<?=$region->id?>"><?=$region->name?></option>
                      <?php endforeach;?>
                  </select>
                  <select name="school_id" id="shcool_filter">
                    <option value="0">--请选择--</option>
                      <?php foreach($schools as $school):?>
                          <option value="<?=$school->id?>"><?=$school->name?></option>
                      <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="col-sm-1" style="float: right;">
                  <div class="input-daterange" id="datepicker">
                  <span>按上传时间:</span>
                  <input type="text" class="input-sm form-control" id="startdate" name="start_date" value="" required/>
                  <span>至</span>
                  <input type="text" class="input-sm form-control" id="enddate" name="end_date"  value="" required/>
                  <button type="button" class="btn btn-default" id="queryResource">查询</button>
                  </div>
              </div>
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
  <!-- /content -->
  
  <!-- footer -->
  <?php $this->load->view('tmpl/foot')?>
  <!-- / footer -->

<!--新建 开始-->
  <div class="modal fade new-icon-box" role="dialog">
    <div class="modal-dialog">
      <?php echo form_open('materialResources/addResource', 'class="form login-form" id="resource-form" enctype="multipart/form-data"'); ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
          <!--基本信息 开始-->
          <div class="basic-box">
            <h4 class="modal-title" >资源上传</h4>
            <div class="text-center basic-info pag-15 minH-200">
              <ul>
                  <li class="col-md-12">
                      <span class="col-md-4">素材名称</span>
                      <div class="col-md-8">
                          <label for="" ><input name="name" type="text" placeholder="素材名称" required/></label>
                      </div>
                  </li>
                  <li class="col-md-12">
                      <span class="col-md-4">素材类型</span>
                      <div class="col-md-8">
                        <select name="resource_type_id" id="resource_type_new">
                            <option value="0">--类型选择--</option>
                            <?php foreach($types as $type):?>
                                <option value="<?=$type->id?>"><?=$type->name?></option>
                            <?php endforeach;?>
                        </select>
                      </div>
                    </li>
                  <li class="col-md-12">
                      <span class="col-md-4">区域选择</span>
                      <div class="col-md-8">
                          <select name="region_id" id="region_new">
                              <option value="0">--区域选择--</option>
                              <?php foreach($regions as $region):?>
                                  <option value="<?=$region->id?>"><?=$region->name?></option>
                              <?php endforeach;?>
                          </select>
                      </div>
                  </li>
                  <li class="col-md-12">
                      <span class="col-md-4">学校选择</span>
                      <div class="col-md-8">
                          <select name="school_id" id="school_new">
                              <option value="0">--学校选择--</option>
                              <?php foreach($schools as $school):?>
                                  <option value="<?=$school->id?>"><?=$school->name?></option>
                              <?php endforeach;?>
                          </select>
                      </div>
                  </li>
                  <li class="col-md-12">
                      <span class="col-md-4">素材介绍</span>
                      <div class="col-md-8">
                          <textarea type="text" rows="3" name="description" placeholder=""></textarea>
                      </div>
                  </li>
                  <li class="col-md-12">
                      <span class="col-md-4">上传素材</span>
                      <div class="col-md-8">
                          <label for="" class=" upload-btn">
                              <input type="file" class="img-upload" name="file">
                              <span class="img-upload-btn">浏览</span>
                          </label>
                      </div>
                  </li>
              </ul>
            </div>
          </div>
          <!--基本信息 结束-->
        </div>
        <div class="modal-footer text-center">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-success" id="createResource">保存</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
<!--新建 结束-->
<!--基本设置 开始-->
<div class="modal fade setting-icon-box modal-nor" data-type = 1 role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open('materialResources/addResource', 'class="form login-form" id="resource-edit-form" enctype="multipart/form-data"'); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
          <div class="basic-box">
            <h4 class="modal-title" >基本信息</h4>
            <div id="resource-info-body" class="text-center basic-info pag-15 minH-200">

            </div>
          </div>
          <div class=" text-center type-show">
            <button class="btn change-btn" data-type="show" type="button">修改</button>
          </div>
        </div>
        <div class="modal-footer text-center type-hide">
          <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal" data-type="hide">取消</button>
          <button type="button" class="btn btn-success btn-modify-save" id="updateResource">保存</button>
        </div>
        <?php echo form_close(); ?>
      </div>

    </div>
  </div>
<div class="modal fade check-icon-box modal-nor" data-type = 1 role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php echo form_open('', 'class="form login-form" id="resource-check-form"'); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <div class="basic-box">
                        <h4 class="modal-title" >素材</h4>
                        <div id="check-info-body" class="text-center basic-info pag-15 minH-200">
                            <img src="$url" />
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>
<a href="#" class="btn btn-info setting-icon" id="resource_settings" style="display: none">
  基本设置
</a>
<a href="#" class="btn btn-info setting-icon" id="resource_file_check" style="display: none">

</a>
<script src="<?=base_url()?>media/administrator/js/bootbox.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/materialResource.js"></script>
<script>
  var userItem = null;
  $(function() {

    var resource_type_id = 0;
    var region_id  = 0;
    var school_id = 0;
    var startdate = "";
    var enddate = "";

    $("#resource_settings").click(function(){
      if(userItem == null){
        alert("请选择素材!");
      }else{
        $('.setting-icon-box').modal('show');
        $.ajax({
          type: "GET",
          url: '<?=anchorurl('materialResources/getResourceInfo')?>/'+userItem.id,
          beforeSend:function(){
            $("#resource-edit-form").showLoading();
          },
          success: function (data){
            $("#resource-info-body").html(data);
            $("#resource-edit-form").hideLoading();
          }
        });
      }
    });

    $("#updateResource").click(function(){
      $("#resource-edit-form").validate();
      if (!$("#resource-edit-form").valid()) {
        return;
      }
      $("#resource-edit-form").showLoading();
      $("#resource-edit-form").ajaxForm({
        dataType: 'json',
        success: function (data) {
          $("#resource-edit-form").hideLoading();
          $(".setting-icon-box").modal('hide');

          getNewData();
        }
      }).submit();
    });

    $("#type_filter").change(function(){
      var string = '';
      var _this = $(this);
      resource_type_id = $(this).val();
      getNewData();
    });

    $("#region_filter").change(function(){
        region_id = $(this).val();
        $.ajax({
            url: "<?=anchorurl('materialResources/getSchoolList')?>/"+$(this).val(),
            type: "get",
            dataType: 'json',
            async: false,
            success: function (data, textstatus) {
                var schools = "";
                $(data).each(function(index,element){
                    schools += '<option value="'+element.id+'">'+element.name+'</option>';
                });
                $("#shcool_filter").html(schools);
            }
        });
      getNewData();
    });

    $("#shcool_filter").change(function(){
        school_id = $(this).val();
      getNewData();
    });

    $("#queryResource").click(function(){
        startdate = $("#startdate").val();
        enddate = $("#enddate").val();
        getNewData();
    });

    function getNewData(){

      mmg.load({resource_type_id:resource_type_id,region_id:region_id,school_id:school_id,startdate:startdate,enddate:enddate});
    }

    $(document).keypress(function(e) {
      // 回车键事件
      if(e.which == 13) {
        getNewData();
      }
    });

    $("#region_new").change(function(){
      $.ajax({
        url: "<?=anchorurl('materialResources/getSchoolList')?>/"+$(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var schools = "";
          $(data).each(function(index,element){
              schools += '<option value="'+element.id+'">'+element.name+'</option>';
          });
          $("#school_new").html(schools);
        }
      });
    });

    $("#createResource").click(function(){
      $("#resource-form").validate();
      if (!$("#resource-form").valid()) {
        return;
      }
      $("#resource-form").showLoading();
      $("#resource-form").ajaxForm({
        dataType: 'json',
        success: function (data) {
          $("#resource-form").hideLoading();
          $(".new-icon-box").modal('hide');
          mmg.load();
        }
      }).submit();
    });

    $("body").undelegate('#region_edit', 'change').delegate('#region_edit', 'change', function () {

          $.ajax({
            url: "<?=anchorurl('materialResources/getSchoolList')?>/"+$(this).val(),
            type: "get",
            dataType: 'json',
            async: false,
            success: function (data, textstatus) {
                var schools = "";
                $(data).each(function(index,element){
                    schools += '<option value="'+element.id+'">'+element.name+'</option>';
                });
                $("#school_edit").html(schools);
            }
        });
      });

    $('.input-daterange').datepicker({

    });
//    基本信息修改

    $('.change-btn,.btn-cancel').click(function(){
      var oParents = $(this).closest('div.modal'),
          _this = $(this).attr('data-type');
      oPFun(oParents,_this);
    });
    function oPFun(config,_this){
     var  oHide = config.find('.type-hide'),
          oShow = config.find('.type-show');
     if( _this == 'show'){
        oShow.fadeOut();
        oHide.fadeIn();
     }else if(_this =='hide'){
       oShow.fadeIn();
       oHide.fadeOut();
     }
    }
    $('.source-sel span').click(function(){
      var oClass = $(this).attr('class');
      if(oClass == 'on'){
        $(this).removeClass('on');
      }else{
        $(this).addClass('on');
      }
    });

    $("#resource_file_check").click(function(){
          if(userItem == null){
              alert("请选择素材!");
          }else{
              $('.check-icon-box').modal('show');
              $.ajax({
                  type: "GET",
                  url: '<?=anchorurl('materialResources/getResourceFileInfo')?>/'+userItem.id,
                  beforeSend:function(){
                      $("#resource-check-form").showLoading();
                  },
                  success: function (data){
                      $("#check-info-body").html(data);
                      $("#resource-check-form").hideLoading();
                  }
              });
          }
      });
      $("body").undelegate('#downloadfile', 'click').delegate('#downloadfile', 'click', function () {

           window.open($(this).val());
      });
      $('.check-icon-box').on('hidden.bs.modal', function () {
          alert(1);
          var myAudio = document.getElementById("audiofile");
          if(myAudio!==null){
              myAudio.pause();
          }
        });
//      $('.check-icon-box').on('hide.bs.modal', function () {
//          alert(1);
//          $("#check-info-body").html("");
//      });
  });
</script>
</body>
</html>
