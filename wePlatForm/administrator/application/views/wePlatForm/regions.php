<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php $this->load->view('wePlatForm/tmpl/title'); ?>
  <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
  <?php $this->load->view('wePlatForm/meta'); ?>
  <?php $this->load->view('tmpl/mmgrid');?>
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
          <li class="breadcrumb-item active"><a href="javascript:;" aria-current="page">区域档案</a></li>
        </ol>
      </nav>
      <!--面包屑 end-->
      <!--主体内容 start-->
      <div class="ra--main__content" data-before="区域列表（总）">
        <div class="form-row">
          <div class="col-3 form-row__item" data-before="选择省份：">
            <select class="form-control form-control-sm" name="province_id" id="province_new1">
              <option value="0">--选择省份--</option>
              <?php foreach($provinces as $province):?>
                <option value="<?=$province->province_id?>"><?=$province->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-3 form-row__item" data-before="选择城市：">
            <select class="form-control form-control-sm" name="city_id" id="city_new1">
              <option value="0">--选择城市--</option>
              <?php foreach($citys as $city):?>
                <option value="<?=$city->city_id?>"><?=$city->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-3 form-row__item" data-before="选择地区：">
            <select class="form-control form-control-sm" name="district_id" id="district_new1">
              <option value="0">--选择地区--</option>
              <?php foreach($districts as $district):?>
                <option value="<?=$district->district_id?>"><?=$district->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-3 form-row__item form-row__search" data-before="搜索：">
            <input type="text" class="form-control form-control-sm"  placeholder="请输入内容" id="searchName">
            <button type="button" class="btn btn-light btn-search">
              <i class="icon-search"></i>
            </button>
          </div>
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

<script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/region.js"></script>
<script>
  var userItem = null;
  $(function() {

    var amoeba_id = 0;
    var province_id = 0;
    var city_id  = 0;
    var district_id = 0;



    $("#submitRegionTime").click(function(){
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
              mmg.load({key: $("#searchName").val()});
              // $("#jsGrid").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
              // });
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


    $("#region_settings").click(function(){
      if(userItem == null){
        alert("请选择区域!");
      }else{
        $('.setting-icon-box').modal('show');
        $.ajax({
          type: "GET",
          url: '<?=anchorurl('regions/getRegionInfo')?>/'+userItem.id,
          beforeSend:function(){
            $("#region-edit-form").showLoading();
          },
          success: function (data){
            $("#school-info-body").html(data);
            $("#region-edit-form").hideLoading();
          }
        });
      }
    });

    $("#updateSchool").click(function(){
      $("#region-edit-form").validate();
      if (!$("#region-edit-form").valid()) {
        return;
      }
      $("#region-edit-form").showLoading();
      $("#region-edit-form").ajaxForm({
        dataType: 'json',
        success: function (data) {
          $("#region-edit-form").hideLoading();
          $(".setting-icon-box").modal('hide');
          getNewData();
        }
      }).submit();
    });


    $("#amoeba_id_new1").change(function(){
      amoeba_id = $(this).val();
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

      mmg.load({key: $("#searchName").val(),province_id:province_id,city_id:city_id,district_id:district_id});

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



    $("#createRegion").click(function(){
      $("#region-form").validate();
      if (!$("#region-form").valid()) {
        return;
      }
      $("#region-form").showLoading();
      $("#region-form").ajaxForm({
        dataType: 'json',
        success: function (data) {
          $("#region-form").hideLoading();
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
