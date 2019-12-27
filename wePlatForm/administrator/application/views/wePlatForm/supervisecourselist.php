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
          <li class="breadcrumb-item active"><a href="javascript:;" aria-current="page">督课表</a></li>
        </ol>
      </nav>
      <!--面包屑 end-->
      <!--主体内容 start-->
      <div class="ra--main__content" data-before="督课表">
        <div class="form-row">
          <div class="col-5 form-row__item" data-before="选择时间：">
            <input type="text" id="startdate" class="form-control form-control-sm" placeholder="开始时间">
            至
            <input type="text" id="enddate" class="form-control form-control-sm" placeholder="结束时间">
          </div>
          <div class="col-3 form-row__item" data-before="教师名称：">
            <input type="text" class="form-control form-control-sm"  placeholder="教师名称" name="teachername" id="teachername">
          </div>
          <div class="col-1">
            <a href="javascript:;" class="btn btn-outline-primary btn-sm btn-oprate" id="searchButton">搜索</a>
          </div>
        </div>
        <div class="common-table">
          <div id="region_education_plan"></div>
          <div id="paginator_region_education_plan"></div>
        </div>
      </div>
      <!--主体内容 end-->
    </div>
  </div>
</div>

<script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/supervisecourselist.js"></script>
<script>
  var userItem  = null;
  $(document).ready(function () {
     $("#searchButton").click(function(){
       mmg.load({
          "start_date":$("#start_date").val(),
          "end_date":$("#start_date").val(),
          "key":$("#teachername").val()
       });
     });
    $("#startdate").datepicker({
      format: 'yyyy-mm-dd'
    });
    $("#enddate").datepicker({
      format: 'yyyy-mm-dd'
    });


    $(document).keypress(function(e) {
      // 回车键事件

      if(e.which == 13) {
        $("#searchButton").click();
      }
    });
  })
</script>
</body>
</html>
