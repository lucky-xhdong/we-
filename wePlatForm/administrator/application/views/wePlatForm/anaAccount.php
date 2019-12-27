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
          <li class="breadcrumb-item active"><a href="javascript:;" aria-current="page">教学进度管理</a></li>
        </ol>
      </nav>
      <!--面包屑 end-->
      <!--主体内容 start-->
      <div class="ra--main__content" data-before="账号使用统计">
        <div class="form-row">

          <div class="col-3 form-row__item" data-before="选择省份：">
            <select class="form-control form-control-sm" name="province_id" id="province_new1">
              <option value="0">--选择省份--</option>
              <?php foreach ($provinces as $province): ?>
                <option value="<?= $province->province_id ?>"><?= $province->name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-3 form-row__item" data-before="选择城市：">
            <select class="form-control form-control-sm" name="city_id" id="city_new1">
              <option value="0">--选择城市--</option>
              <?php foreach ($citys as $city): ?>
                <option value="<?= $city->city_id ?>"><?= $city->name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-3 form-row__item" data-before="选择地区：">
            <select class="form-control form-control-sm" name="district_id" id="district_new1">
              <option value="0">--选择地区--</option>
              <?php foreach ($districts as $district): ?>
                <option value="<?= $district->district_id ?>"><?= $district->name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-3 form-row__item form-row__search" data-before="搜索：">
            <input type="text" class="form-control form-control-sm" placeholder="请输入内容" id="searchName">
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

<script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/school_anan.js"></script>
<script>
  var userItem  = null;
  $(document).ready(function () {

    var province_id = 0;
    var city_id = 0;
    var district_id = 0;

    $("#province_new1").change(function () {
      var string = '';
      var _this = $(this);
      province_id = $(this).val();
      $.ajax({
        url: "<?=anchorurl('categorys/getCity')?>/" + $(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var string = '';
          $(data.citys).each(function (index, element) {
            string += '<option value="' + element.city_id + '">' + element.name + '</option>';
          });
          $("#city_new1").html(string);
          var districts = "";
          $(data.districts).each(function (index, element) {
            districts += '<option value="' + element.district_id + '">' + element.name + '</option>';
          });
          $("#district_new1").html(districts);
        }
      });
      getNewData();
    });

    $("#city_new1").change(function () {
      city_id = $(this).val();
      $.ajax({
        url: "<?=anchorurl('categorys/getArea')?>/" + $(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var districts = "";
          $(data).each(function (index, element) {
            districts += '<option value="' + element.district_id + '">' + element.name + '</option>';
          });
          $("#district_new1").html(districts);
        }
      });
      getNewData();
    });

    $("#district_new1").change(function () {
      district_id = $(this).val();
      getNewData();
    });

    function getNewData () {

      mmg.load({
        key: $("#searchName").val(),
        province_id: province_id,
        city_id: city_id,
        district_id: district_id
      });
    }

    $(document).keypress(function (e) {
      // 回车键事件
      if (e.which == 13) {
        getNewData();
      }
    });
    


  })
</script>
</body>
</html>
