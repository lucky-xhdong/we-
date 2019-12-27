<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php $this->load->view('wePlatForm/tmpl/title'); ?>
  <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
  <?php $this->load->view('wePlatForm/meta'); ?>
  <?php $this->load->view('tmpl/mmgrid');?>
  <?php $this->load->view('tmpl/jqueryvalidate');?>
</head>
<body>
<div class="container-fluid RegionalArchives">
  <div class="row">
    <!-- 左侧菜单 start -->
    <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
    <!-- 左侧菜单 end -->
    <div class="col-md-9 ra--main-wrapper">
      <!--菜单切换 start-->
      <?=$this->load->view("wePlatForm/tmpl/headernav")?>
      <!--菜单切换 end-->
      <!--面包屑 start-->
      <nav class="common-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
          <li class="breadcrumb-item active"><a href="javascript:;" aria-current="page">素材库</a></li>
        </ol>
      </nav>
      <!--面包屑 end-->
      <!--主体内容 start-->
      <div class="ra--main__content" data-before="素材库（总）">
        <div class="form-row form-row__wrap">
          <div class="col-4 form-row__item" data-before="素材类型：">
            <select name="resource_type_id" id="type_filter" class="form-control form-control-sm">
              <option value="0">--请选择素材类型--</option>
              <?php foreach($types as $type):?>
                <option value="<?=$type->id?>"><?=$type->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-4 form-row__item" data-before="区域：">
            <select name="region_id" id="region_filter" class="form-control form-control-sm">
              <option value="0">--请选择区域--</option>
              <?php foreach($regions as $region):?>
                <option value="<?=$region->id?>"><?=$region->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-4 form-row__item" data-before="学校：">
            <select name="school_id" id="shcool_filter" class="form-control form-control-sm">
              <option value="0">--请选择学校--</option>
              <?php foreach($schools as $school):?>
                <option value="<?=$school->id?>"><?=$school->name?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>
        <div class="form-row form-row__wrap">
          <div class="col-4 form-row__item" data-before="开始时间：">
            <input type="text" class="form-control form-control-sm"  placeholder="开始时间" id="startdate" name="start_date" value="" required/>
          </div>
          <div class="col-4 form-row__item" data-before="结束时间：">
            <input type="text" class="form-control form-control-sm"  placeholder="结束时间"  id="enddate" name="end_date"  >
          </div>
          <div class="col-4 form-row__item form-row__search">
            <button type="button" class="btn btn-outline-primary btn-sm btn-search">搜索</button>
          </div>
        </div>
        <div class="btn-group-end">
          <a href="javascript:;"  class="btn btn-outline-primary btn-sm btn-add"  data-toggle="modal" data-target="#materia_resources_modal">
            发布素材
          </a>
        </div>
        <div class="common-table">
          <div id="mmGrid"></div>
          <div id="paginator"></div>
        </div>
      </div>
      <!--主体内容 end-->
    </div>
  </div>
</div>

<div class="modal fade commonModal new-icon-box" id="materia_resources_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">上传新素材</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open('materialResources/addResource', 'class="form form-group" id="resource-form" enctype="multipart/form-data"'); ?>
      <div class="modal-body">
        <div class="_input-group">
          <div class="form-row" data-before="素材名称：">
            <div class="form-group col-md-8">
              <input class="form-control form-control-sm"name="name" type="text" placeholder="素材名称" required>
            </div>
          </div>
        </div>
        <div class="_input-group">
          <div class="form-row" data-before="素材类型：">
            <div class="form-group col-md-6">
              <select name="resource_type_id" id="resource_type_new" class="form-control form-control-sm">
                <option value="0">--类型选择--</option>
                <?php foreach($types as $type):?>
                  <option value="<?=$type->id?>"><?=$type->name?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
        </div>

        <div class="_input-group">
          <div class="form-row" data-before="区域选择：">
            <div class="form-group col-md-6">
              <select name="region_id" id="region_new"  class="form-control form-control-sm">
                <option value="0">--区域选择--</option>
                <?php foreach($regions as $region):?>
                  <option value="<?=$region->id?>"><?=$region->name?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
        </div>

        <div class="_input-group">
          <div class="form-row" data-before="学校选择：">
            <div class="form-group col-md-6">
              <select name="school_id" id="school_new" class="form-control form-control-sm">
                <option value="0">--学校选择--</option>
                <?php foreach($schools as $school):?>
                  <option value="<?=$school->id?>"><?=$school->name?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
        </div>

        <div class="_input-group">
          <div class="form-row" data-before="素材介绍：">
            <div class="form-group col-md-8">
              <textarea type="text" rows="3" name="description" placeholder="素材介绍" class="form-control form-control-sm"></textarea>
            </div>
          </div>
        </div>
        <div class="_input-group">
          <div class="form-row" data-before="附件：">
            <div class="custom-file-control">
              <input type="file" name="file">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-primary btn-save" id="createResource">保存</button>
          <!--              <button type="button" class="btn btn-primary btn-submit">提交审核</button>-->
        </div>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade commonModal setting-icon-box"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">基本信息</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open('materialResources/addResource', 'class="form form-group" id="resource-edit-form" enctype="multipart/form-data"'); ?>
      <div class="modal-body">
        <div id="resource-info-body"></div>
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-primary btn-modify-save" id="updateResource">保存</button>
          <!--              <button type="button" class="btn btn-primary btn-submit">提交审核</button>-->
        </div>
      </div>
      </form>
    </div>
  </div>
</div>


<!--基本设置 开始-->
<div class="modal fade commonModal check-icon-box modal-nor" data-type = 1 role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php echo form_open('', 'class="form form-group" id="resource-check-form"'); ?>
      <div class="modal-header">
        <h5 class="modal-title">素材</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="basic-box">
          <div id="check-info-body" class="text-center basic-info pag-15 minH-200">

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
<script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/materialResource.js"></script>
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

    $(".icon-search").click(function(){
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

      $('#startdate').datepicker({});
      $('#enddate').datepicker({});
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
      $("#check-info-body").html("");
//      var myAudio = document.getElementById("audiofile");
//      if(myAudio!==null){
//        myAudio.pause();
//      }
    });
  });
</script>
</body>
</html>
