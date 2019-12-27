<!DOCTYPE html>
<html lang="en" class="">
<!-- 创建公司学校 -->
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
            <a href="<?=anchorurl('AccountManage/creatComSchool')?>">学校管理</a><span>&nbsp;&nbsp;</span>
          </p>
        </div>
        <div class="col-md-4">
          <a href="javascript:;" class="btn btn-success update-icon pull-right" data-toggle="modal" data-target=".new-icon-box">
            新建
          </a>
        </div>
      </div>

      <div class="wrapper-md">
        <div class="panel panel-default">
          <div class="wrap-tit">
            <div class="row ">
              <div class="col-sm-6">
                <div class="linkage-con">
                  <span>过滤条件:</span>
                  <select name="region_id" id="amoeba_id_new1">
                    <option value="0">--请选择--</option>
                    <?php foreach($regions as $region):?>
                      <option value="<?=$region->id?>"><?=$region->name?></option>
                    <?php endforeach;?>
                  </select>
                  <select name="province_id" id="province_new1">
                    <option value="0">--请选择--</option>
                    <?php foreach($provinces as $province):?>
                      <option value="<?=$province->province_id?>"><?=$province->name?></option>
                    <?php endforeach;?>
                  </select>
                  <select name="city_id" id="city_new1">
                    <option value="0">--请选择--</option>
                    <?php foreach($citys as $city):?>
                      <option value="<?=$city->city_id?>"><?=$city->name?></option>
                    <?php endforeach;?>
                  </select>
                  <select name="district_id" id="district_new1">
                    <option value="0">--请选择--</option>
                    <?php foreach($districts as $district):?>
                      <option value="<?=$district->district_id?>"><?=$district->name?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="col-sm-3">
              </div>
              <div class="col-sm-3">
                <div class="input-group"  style="float: right;">
                  <input type="text" class="form-control input-type-name rounded" placeholder="输入名称" id="searchName">
                  <a class="fa fa-search pos" ></a>
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
      <?php echo form_open('AccountManage/addSchool', 'class="form login-form" id="school-form"'); ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
          <!--基本信息 开始-->
          <div class="basic-box">
            <h4 class="modal-title" >基本信息</h4>
            <div class="text-center basic-info pag-15 minH-200">
              <ul>
                <li class="col-md-12">
                  <span class="col-md-6">所在区域</span>
                  <div class="col-md-6">
                    <select name="region_id" id="amoeba">
                      <?php foreach($regions as $region):?>
                        <option value="<?=$region->id?>"><?=$region->name?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">所在省</span>
                  <div class="col-md-6">
                    <select name="province_id" id="province_new">
                      <?php foreach($provinces as $province):?>
                        <option value="<?=$province->province_id?>"><?=$province->name?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">所在市</span>
                  <div class="col-md-6">
                    <select name="city_id" id="city_new">
                      <?php foreach($citys as $city):?>
                        <option value="<?=$city->city_id?>"><?=$city->name?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">所在县/区</span>
                  <div class="col-md-6">
                    <select name="district_id" id="district_new">
                      <?php foreach($districts as $district):?>
                        <option value="<?=$district->district_id?>"><?=$district->name?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">学校属性</span>
                  <div class="col-md-6">
                    <select name="school_property_id" id="">
                      <?php foreach($schoolPropertys as $schoolProperty):?>
                        <option value="<?=$schoolProperty->id?>"><?=$schoolProperty->name?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </li>
                <?php
                  $sr_providers = array("chivox"=>"驰声","iflytek"=>"科大讯飞");
                ?>
                <li class="col-md-12">
                  <span class="col-md-6">语音识别服务商</span>
                  <div class="col-md-6">
                    <select name="sr_provider">
                      <?php foreach($sr_providers as $key=>$sr_provider):?>
                        <option value="<?=$key?>"><?=$sr_provider?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </li>

                <li class="col-md-12">
                  <span class="col-md-6">学校名称</span>
                  <div class="col-md-6">
                    <label for="" ><input name="name" type="text" placeholder="学校名称" required/></label>
                  </div>

                </li>
              </ul>
            </div>
          </div>
          <!--基本信息 结束-->
          <!--授权时间 开始-->
          <div class="give-time-box">
            <h4 class="modal-title">授权时间</h4>
            <div class="text-center">
              <div class="time-start-end">
                <p>开始时间</p>
                <p>结束时间 </p>
              </div>
              <div class="input-daterange input-group" id="datepicker">
                <div>
                  <input type="text" class="input-sm form-control" name="start_date" value="" required/>
                </div>
                <div>
                  <input type="text" class="input-sm form-control" name="end_date"  value="" required/>
                </div>
              </div>
            </div>
          </div>
          <!--授权时间 结束-->
          <!--授权课程 开始-->
          <div class="give-source-box">
            <h4 class="modal-title">授权课程</h4>
           <div class="source-list">
             <div class="source-unsel-sel">
               <div class="source-unsel" id="courseList" style="width:100% !important;">
                 <?php foreach($courses as $course):?>
                   <span data-id="<?=$course['id']?>"><?=$course['name']?></span>
                 <?php endforeach;?>
               </div>
             </div>
           </div>
          </div>
          <!--授权课程 结束-->
        </div>
        <div class="modal-footer text-center">
          <input type="hidden" name="course_ids" value="" id="course_ids_new">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-success" id="createSchool">完成</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
<!--新建 结束-->
<!--基本设置 开始-->
  <div class="modal fade setting-icon-box modal-nor" data-type = 1  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open('AccountManage/addSchool', 'class="form login-form" id="school-edit-form"'); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
          <div class="basic-box">
            <h4 class="modal-title" >基本信息</h4>
            <div id="school-info-body">
              <ul class="text-center basic-info pag-15 minH-200">
                <li class="col-md-12">
                  <span class="col-md-6">所在区域</span>
                  <div class="col-md-6">
                    <p class="type-show">--</p>
                    <select name="region_id" id="amoeba" class="type-hide">
                      <?php foreach($regions as $region):?>
                      <option value="<?=$region->id?>"><?=$region->name?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">所在省</span>
                  <div class="col-md-6">
                    <p class="type-show">华北</p>
                    <select name="province_id" id="province" class="type-hide">
                      <?php foreach($provinces as $province):?>
                      <option value="<?=$province->province_id?>"><?=$province->name?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">所在市</span>
                  <div class="col-md-6">
                    <p class="type-show">华北</p>
                    <select name="city_id" id="city" class="type-hide">
                      <?php foreach($citys as $city):?>
                        <option value="<?=$city->city_id?>"><?=$city->name?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">所在县/区</span>
                  <div class="col-md-6">
                    <p class="type-show">华北</p>
                    <select name="district_id" id="district" class="type-hide">
                      <?php foreach($districts as $district):?>
                        <option value="<?=$district->district_id?>"><?=$district->name?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">学校属性</span>
                  <div class="col-md-6">
                    <p class="type-show">华北</p>
                    <select name="" id="" class="type-hide">
                      <option value="">九年一贯</option>
                      <option value="">花呗</option>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">学校名称</span>
                  <div class="col-md-6">
                    <p class="type-show">实验小学</p>
                    <label for="" class="type-hide"><input type="text" placeholder="学校名称" /></label>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class=" text-center type-show">
            <button class="btn change-btn" data-type="show" type="button">修改</button>
          </div>
        </div>
        <div class="modal-footer text-center type-hide">
          <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal" data-type="hide">取消</button>
          <button type="button" class="btn btn-success" id="updateSchool">保存</button>
        </div>
        <?php echo form_close(); ?>
      </div>

    </div>
  </div>

<!--基本设置 结束-->
<!--授权时间 开始-->
  <div class="modal fade give-time-icon-box modal-nor"  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open('AccountManage/setSchoolHomeAuthTime', 'class="form login-form" id="set-school-auth-form"'); ?>

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
          <div class="give-time-con">
            <h4 class="modal-title" >授权时间</h4>
            <div class="give-time-text minH-200">
              <ul id="school-time-body">
                <li class="col-md-12">
                  <div class="col-md-6 text-right">开始时间</div>
                  <div class="col-md-6">2016.03.12</div>
                </li>
                <li class="col-md-12 col-999">
                  <div class="col-md-6 text-right">李某某</div>
                  <div class="col-md-6">+24月（操作时间2016.07.04）</div>
                </li>
                <li class="col-md-12 col-999">
                  <div class="col-md-6 text-right">王某某</div>
                  <div class="col-md-6">+24月（操作时间2016.07.04）</div>
                </li>
                <li class="col-md-12">
                  <div class="col-md-6 text-right">结束时间</div>
                  <div class="col-md-6">2016.07.12</div>
                </li>
                <li class="col-md-12 give-time-input type-hide" >
                  <div class="col-md-6 text-right">续期</div>
                  <div class="col-md-6" data-trigger="input"><input type="text">月</div>
                </li>
              </ul>
            </div>
          </div>
          <div class=" text-center type-show">
            <button class="btn change-btn" data-type="show" type="button">修改</button>
          </div>
        </div>
        <div class="modal-footer text-center type-hide">
          <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal" data-type="hide">取消</button>
          <button type="button" class="btn btn-success" id="submitSchoolTime">保存</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
<!--授权时间 结束-->
<!--授权课程 开始-->
  <div class="modal fade give-course-icon-box modal-nor"  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
          <div class="give-time-con">
            <h4 class="modal-title" >授权课程</h4>
            <div class="give-course-text minH-200">
              <div class="source-list">
                <h2>课程</h2>
                <div class="source-unsel-sel">
                  <div class="source-unsel type-show">
                    <span class="on">We Talk</span>
                    <span>New Eenlish</span>
                    <span>课程一</span>
                    <span>课程一仨</span>
                  </div>
                  <div class="source-sel type-hide">
                    <span>We Talk</span>
                    <span>New Eenlish</span>
                    <span>课程一</span>
                    <span>课程一仨</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class=" text-center type-show">
            <button class="btn change-btn" data-type="show" >修改</button>
          </div>
        </div>
        <div class="modal-footer text-center type-hide">
          <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal" data-type="hide">取消</button>
          <button type="button" class="btn btn-success">保存</button>
        </div>
      </div>
    </div>
  </div>
<!--授权课程 结束-->
</div>
<div id="setSchoolTimeTemplate" type="text/x-jquery-tmpl" style="display:none">
  <li class="col-md-12">
    <div class="col-md-6 text-right">开始时间</div>
    <div class="col-md-6">${start_date}</div>
  </li>
  <li class="col-md-12">
    <div class="col-md-6 text-right">结束时间</div>
    <div class="col-md-6">${end_date}</div>
  </li>
  <li class="col-md-12 give-time-input type-hide" >
    <div class="col-md-6 text-right">续期</div>
    <div class="col-md-6" data-trigger="input"><input type="text" name="month" number="true" required>月</div>
    <input type="hidden" name="school_id" value="${id}">
  </li>
</div>
<a href="#" class="btn btn-info setting-icon" id="school_settings" style="display: none">
  基本设置
</a>
<a href="#" class="btn btn-warning give-time-icon" id="give-time-school" style="display: none">
  授权时间
</a>
<a href="#" class="btn btn-warning give-course-icon" data-toggle="modal" data-target=".give-course-icon-box" style="display: none">
  授权课程
</a>
<script src="<?=base_url()?>media/administrator/js/bootbox.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/school.js"></script>
<script>
  var userItem = null;
  $(function() {

    var region_id = 0;
    var province_id = 0;
    var city_id  = 0;
    var district_id = 0;



    $("#submitSchoolTime").click(function(){
      if( $("#set-school-auth-form").valid()) {
        $("#set-school-auth-form").showLoading();
        $("#set-school-auth-form").ajaxForm({
          dataType: 'json',
          success: function (data) {
            console.log(data);
            $("#set-school-auth-form").hideLoading();
            if (data.errcode == 0) {
              //$("#update-user-form")[0].reset();
              retisterLimitTip("设置成功");
//              $("#jsGrid").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
//              });
              mmg.load({key: $("#searchName").val()});
              $('.give-time-icon-box').modal('hide');
            }
          }
        }).submit();
      }
    });

    $("#give-time-school").click(function(){
      if(userItem == null){
        alert("请选择用户!");
      }else{
        $('#school-time-body').empty();
        $("#setSchoolTimeTemplate").tmpl(userItem).appendTo('#school-time-body');
        $('.give-time-icon-box').modal('show');
      }
    });


    $("#school_settings").click(function(){
      if(userItem == null){
        alert("请选择学校!");
      }else{
        $('.setting-icon-box').modal('show');
        $.ajax({
          type: "GET",
          url: '<?=anchorurl('AccountManage/getSchoolInfo')?>/'+userItem.id,
          beforeSend:function(){
            $("#school-edit-form").showLoading();
          },
          success: function (data){
            $("#school-info-body").html(data);
            $("#school-edit-form").hideLoading();
          }
        });
      }
    });

    $("#updateSchool").click(function(){
      $("#school-edit-form").validate();
      if (!$("#school-edit-form").valid()) {
        return;
      }
      $("#school-edit-form").showLoading();
      $("#school-edit-form").ajaxForm({
        dataType: 'json',
        success: function (data) {
          $("#school-edit-form").hideLoading();
          $(".setting-icon-box").modal('hide');
          getNewData();
        }
      }).submit();
    });


    $("#amoeba_id_new1").change(function(){
      region_id = $(this).val();
      getNewData();
    });

    $("#province_new1").change(function(){
      var string = '';
      var _this = $(this);
      province_id = $(this).val();
      $.ajax({
        url: "<?=anchorurl('categorys/getCity')?>/"+$(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var string = '';
          $(data.citys).each(function(index,element){
            string += '<option value="'+element.city_id+'">'+element.name+'</option>';
          });
          $("#city_new1").html(string);
          var districts = "";
          $(data.districts).each(function(index,element){
            districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
          });
          $("#district_new1").html(districts);
        }
      });
      getNewData();
    });

    $("#city_new1").change(function(){
      city_id = $(this).val();
      $.ajax({
        url: "<?=anchorurl('categorys/getArea')?>/"+$(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var districts = "";
          $(data).each(function(index,element){
            districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
          });
          $("#district_new1").html(districts);
        }
      });
      getNewData();
    });

    $("#district_new1").change(function(){
      district_id = $(this).val();
      getNewData();
    });

    function getNewData(){

      mmg.load({key: $("#searchName").val(),region_id:region_id,province_id:province_id,city_id:city_id,district_id:district_id});

//      $("#jsGrid").jsGrid("loadData", {key: $("#searchName").val(),amoeba_id:amoeba_id,province_id:province_id,city_id:city_id,district_id:district_id}).done(function () {
//
//      });
    }

    $(document).keypress(function(e) {
      // 回车键事件
      if(e.which == 13) {
        getNewData();
      }
    });

    $("#province_new").change(function(){
      var string = '';
      var _this = $(this);
      $.ajax({
        url: "<?=anchorurl('categorys/getCity')?>/"+$(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
         var string = '';
          $(data.citys).each(function(index,element){
            string += '<option value="'+element.city_id+'">'+element.name+'</option>';
          });
          $("#city_new").html(string);
          var districts = "";
          $(data.districts).each(function(index,element){
            districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
          });
          $("#district_new").html(districts);
        }
      });
    });

    $("#city_new").change(function(){
      $.ajax({
        url: "<?=anchorurl('categorys/getArea')?>/"+$(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var districts = "";
          $(data).each(function(index,element){
            districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
          });
          $("#district_new").html(districts);
        }
      });
    });

    $("body").undelegate('#province_edit', 'change').delegate('#province_edit', 'change', function () {
      var string = '';
      var _this = $(this);
      $.ajax({
        url: "<?=anchorurl('categorys/getCity')?>/"+$(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var string = '';
          $(data.citys).each(function(index,element){
            string += '<option value="'+element.city_id+'">'+element.name+'</option>';
          });
          $("#city_edit").html(string);
          var districts = "";
          $(data.districts).each(function(index,element){
            districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
          });
          $("#district_edit").html(districts);
        }
      });
    });

    $("body").undelegate('#city_edit', 'change').delegate('#city_edit', 'change', function () {
      $.ajax({
        url: "<?=anchorurl('categorys/getArea')?>/"+$(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var districts = "";
          $(data).each(function(index,element){
            districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
          });
          $("#district_edit").html(districts);
        }
      });
    });



    $("#createSchool").click(function(){
      $("#school-form").validate();
      if (!$("#school-form").valid()) {
        return;
      }
      $("#school-form").showLoading();
      $("#school-form").ajaxForm({
        dataType: 'json',
        success: function (data) {
          $("#school-form").hideLoading();
          $(".new-icon-box").modal('hide');
          mmg.load();
        }
      }).submit();
    });



    $('.input-daterange').datepicker({});
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



    //添加学生时选择课程
    $("#courseList span").click(function(){
      if($(this).hasClass("on")){
        $(this).removeClass("on");
      }else{
        $(this).addClass("on");
      }
      addnewStudentCourseIds();
    });


    $("#school-info-body").undelegate('#courseListEdit span', 'click').delegate('#courseListEdit span', 'click', function () {
      if($(this).hasClass("on")){
        $(this).removeClass("on");
      }else{
        $(this).addClass("on");
      }
      addEditStudentCourseIds();
    });

    function addEditStudentCourseIds(){
      var course_id_array = new Array();
      $("#school-info-body #courseListEdit span").each(function(index,element){
        if($(element).hasClass("on")){
          course_id_array.push($(element).data("id"));
        }
      });
      if(course_id_array.length >0){
        $("#course_ids_edit").val(course_id_array.join(","));
      }else{
        $("#course_ids_edit").val("");
      }
    }

    function addnewStudentCourseIds(){
      var course_id_array = new Array();
      $("#courseList span").each(function(index,element){
        if($(element).hasClass("on")){
          course_id_array.push($(element).data("id"));
        }
      });
      if(course_id_array.length >0){
        $("#course_ids_new").val(course_id_array.join(","));
      }else{
        $("#course_ids_new").val("");
      }
    }


  });
</script>
</body>
</html>
