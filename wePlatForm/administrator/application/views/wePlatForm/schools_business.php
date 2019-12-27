<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php $this->load->view('wePlatForm/tmpl/title'); ?>
  <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
  <?php $this->load->view('wePlatForm/meta'); ?>
  <?php $this->load->view('tmpl/mmgrid');?>
  <?php $this->load->view('tmpl/fileupload');?>
</head>
<body>
<div class="container-fluid BusinessArchives">
  <div class="row">
    <!-- 左侧菜单 start -->
    <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
    <!-- 左侧菜单 end -->
    <div class="col-md-9">
      <div class="ba--main-wrapper">
        <!--菜单切换 start-->
        <?=$this->load->view("wePlatForm/tmpl/headernav")?>
        <!--菜单切换 end-->
        <!--面包屑 start-->
        <nav class="common-breadcrumb" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">学校管理</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">学校管理</a></li>
            <li class="breadcrumb-item active" aria-current="page">教研员</li>
          </ol>
        </nav>
        <!--面包屑 end-->
        <!--主体内容 start-->
        <div class="ba--main__content">
          <div id="accordion">
            <!--区域基本信息 start-->
            <div class="card ba--main__basic">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    区域基本信息
                  </button>
                </h5>
              </div>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <form>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <input type="text" class="form-control form-control-sm" value="<?php if(isset($region->id)) echo $region->name;?>" placeholder="选择区域姓名"/>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <select class="form-control form-control-sm" placeholder="选择省份" name="province_id" id="province_new1">
                          <option value="0">--选择省份--</option>
                          <?php foreach($provinces as $province):?>
                              <?php if(isset($region->id) && $region->province_id ==$province->province_id):?>
                                  <option value="<?=$province->province_id?>" selected><?=$province->name?></option>
                              <?php else:?>
                                 <option value="<?=$province->province_id?>"><?=$province->name?></option>
                              <?php endif;?>
                          <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <select class="form-control form-control-sm" placeholder="选择城市" name="city_id" id="city_new1">
                          <option value="0">--选择城市--</option>
                            <?php foreach($citys as $city):?>
                              <?php if(isset($region->id) && $region->city_id ==$city->city_id):?>
                                <option value="<?=$city->city_id?>" selected><?=$city->name?></option>
                              <?php else:?>
                                <option value="<?=$city->city_id?>"><?=$city->name?></option>
                              <?php endif;?>

                            <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <select class="form-control form-control-sm" placeholder="选择区县" name="district_id" id="district_new1">
                          <option value="0">--选择地区--</option>
                          <?php foreach($districts as $district):?>
                            <?php if(isset($region->id) && $region->district_id ==$district->district_id):?>
                              <option value="<?=$district->district_id?>" selected><?=$district->name?></option>
                            <?php else:?>
                              <option value="<?=$district->district_id?>"><?=$district->name?></option>
                            <?php endif;?>
                          <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <input type="text" class="form-control form-control-sm" placeholder="区域标题"/>
                      </div>
                    </div>
<!--                    <div class="form-row">-->
<!--                      <div class="tags-group">-->
<!--                        <ul data-before="区域特征">-->
<!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
<!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
<!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
<!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
<!--                          <li>-->
<!--                            <button type="button" class="tags-group__new">添加</button>-->
<!--                            <input type="text" class="tags-group__input">-->
<!--                          </li>-->
<!--                        </ul>-->
<!--                        <ul data-before="扩展特征">-->
<!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
<!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
<!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
<!--                          <li><span class="tags-group__span">标签1<a href="javascript:;" class="tags-group__delete">&times;</a></span></li>-->
<!--                          <li>-->
<!--                            <button type="button" class="tags-group__new">添加</button>-->
<!--                            <input type="text" class="tags-group__input">-->
<!--                          </li>-->
<!--                        </ul>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                    <div class="form-row">-->
<!--                      <div class="form-group col-md-12">-->
<!--                        <textarea class="form-control form-control-sm" name=description" placeholder="区域介绍">--><?php //if(isset($region->id)) echo $region->description;?><!--</textarea>-->
<!--                      </div>-->
<!--                    </div>-->
                    <div class="btn-group">
                      <button type="submit" class="btn btn-light btn-cancel">取消</button>
                      <button type="submit" class="btn btn-light btn-save">保存</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--区域基本信息 end-->
            <!--区域档案信息 start-->
            <div class="card ba--main__archives">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    区域档案信息
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                  <ul class="nav nav-tabs ba--main__tabs" id="nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="regional-tab" data-toggle="tab" href="#regional" role="tab" aria-controls="资料文档" aria-selected="true">资料文档</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="regional-extend-tab" data-toggle="tab" href="#regional-extend" role="tab" aria-controls="解决方案" aria-selected="false">解决方案</a>
                    </li>
                  </ul>
                  <div class="tab-content ba--main__cons" id="tab-content">
                    <div class="tab-pane fade show active" id="regional" role="tabpanel" aria-labelledby="regional-tab">
                      <div class="common-table">
                        <table class="table">
                          <thead>
                          <tr>
                            <th scope="col">领导特征</th>
                            <th scope="col">创建人</th>
                            <th scope="col">创建时间</th>
                            <th scope="col">操作</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <th>校长</th>
                            <td>文武贝</td>
                            <td>2018-2-3</td>
                            <td>
                              <a href="#/feature_manage" class="btn-normal">
                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                              </a>
                              <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                            </td>
                          </tr>
                          <tr>
                            <th>校长</th>
                            <td>文武贝</td>
                            <td>2018-2-3</td>
                            <td>
                              <a href="#/feature_manage" class="btn-normal">
                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                              </a>
                              <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                            </td>
                          </tr>
                          <tr>
                            <th>校长</th>
                            <td>文武贝</td>
                            <td>2018-2-3</td>
                            <td>
                              <a href="#/feature_manage" class="btn-normal">
                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                              </a>
                              <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                            </td>
                          </tr>
                          <tr>
                            <th>校长</th>
                            <td>文武贝</td>
                            <td>2018-2-3</td>
                            <td>
                              <a href="#/feature_manage" class="btn-normal">
                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                              </a>
                              <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                        <div class="btn-group-upload">
                          <a href="javascript:;" class="btn btn-outline-primary btn-sm btn-add">
                            <i class="icon-add">
                              <i class="path1"></i>
                              <i class="path2"></i>
                            </i>上传文档
                            <input type="file" class="upload-file">
                          </a>
                        </div>
                        <nav aria-label="Page navigation">
                          <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="javascript:;">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:;">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:;">Next</a></li>
                          </ul>
                        </nav>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="regional-extend" role="tabpanel" aria-labelledby="regional-extend-tab">
                      <div class="common-table">
                        <table class="table">
                          <thead>
                          <tr>
                            <th scope="col">领导特征</th>
                            <th scope="col">创建人</th>
                            <th scope="col">创建时间</th>
                            <th scope="col">操作</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <th>校长</th>
                            <td>文武贝</td>
                            <td>2018-2-3</td>
                            <td>
                              <a href="#/feature_manage" class="btn-normal">
                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                              </a>
                              <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                            </td>
                          </tr>
                          <tr>
                            <th>校长</th>
                            <td>文武贝</td>
                            <td>2018-2-3</td>
                            <td>
                              <a href="#/feature_manage" class="btn-normal">
                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                              </a>
                              <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                            </td>
                          </tr>
                          <tr>
                            <th>校长</th>
                            <td>文武贝</td>
                            <td>2018-2-3</td>
                            <td>
                              <a href="#/feature_manage" class="btn-normal">
                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                              </a>
                              <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                            </td>
                          </tr>
                          <tr>
                            <th>校长</th>
                            <td>文武贝</td>
                            <td>2018-2-3</td>
                            <td>
                              <a href="#/feature_manage" class="btn-normal">
                                <i class="icon-view"><i class="path1"></i> <i class="path2"></i> <i class="path3"></i></i>查看
                              </a>
                              <a href="#/feature_manage" class="btn-normal"><i class="icon-lock"></i>冻结</a>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                        <div class="btn-group-upload">
                          <a href="javascript:;" class="btn btn-outline-primary btn-sm btn-add">
                            <i class="icon-add">
                              <i class="path1"></i>
                              <i class="path2"></i>
                            </i>上传文档
                            <input type="file" class="upload-file">
                          </a>
                        </div>
                        <nav aria-label="Page navigation">
                          <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="javascript:;">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:;">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:;">Next</a></li>
                          </ul>
                        </nav>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--区域档案信息 end-->
            <!--区域教学服务 start-->
            <div class="card ba--main__teachingservice">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    区域教学服务
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                </div>
              </div>
            </div>
            <!--区域教学服务 end-->
            <!--区域商务信息 start-->
            <div class="card ba--main__business">
              <div class="card-header" id="headingFour">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    区域商务信息
                  </button>
                </h5>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-body row">
                  <div class="col-6 ba--main__business_item" data-before="签约状态：">未签约</div>
                  <div class="col-6 ba--main__business_item" data-before="签 约 人：">王小二</div>
                  <div class="col-6 ba--main__business_item" data-before="有 效 期：">2016-03-23至2018-03-23</div>
                  <div class="col-6 ba--main__business_item" data-before="合同金额：">2323232323.00元</div>
                  <div class="col-6 ba--main__business_item" data-before="合同页码：">23页</div>
                  <div class="col-6 ba--main__business_item" data-before="查看合同：">点击查看合同</div>
                </div>
              </div>
            </div>
            <!--区域商务信息 end-->
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
</body>
</html>
