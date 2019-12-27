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
      <div class="ra--main__content" data-before="计划审核统计">
        <div class="form-row">

          <div class="col-5 form-row__item" data-before="选择时间：">
            <input type="text" id="startTime" class="form-control form-control-sm" placeholder="开始时间">
            至
            <input type="text" id="endTime" class="form-control form-control-sm" placeholder="结束时间">
          </div>
          <div class="col-1">
            <a href="javascript:;" class="btn btn-outline-primary btn-sm btn-oprate" id="searchButton">搜索</a>
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

<script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/data_ananlysis_plan.js"></script>
<script>
  var userItem  = null;
  $(document).ready(function () {

    $("#startTime").datepicker({
      format: 'yyyy-mm-dd'
    });
    $("#endTime").datepicker({
      format: 'yyyy-mm-dd'
    });

    $("#searchButton").click(function(){
      mmg.load({
        "start_date":$("#startTime").val(),
        "end_date":$("#endTime").val(),
        "teacherName":$("#teacherName").val(),
        "searchName":$("#searchName").val(),
      });
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
