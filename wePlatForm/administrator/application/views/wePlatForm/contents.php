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
          <li class="breadcrumb-item active"><a href="javascript:;" aria-current="page">内容管理</a></li>
        </ol>
      </nav>
      <!--面包屑 end-->
      <!--主体内容 start-->
      <div class="ra--main__content" data-before="文章列表">
        <div class="form-row">
          <div class="col-3 form-row__item" data-before="选择类型：">
            <select class="form-control form-control-sm" name="catid" id="catid">
              <option value="0">--选择类型--</option>
              <?php foreach($categorys as $category):?>
                 <option value="<?=$category->id?>"><?=$category->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-5 form-row__item" data-before="发布时间：">
              <input type="text" id="startTime" class="form-control form-control-sm" placeholder="开始时间">
            至
              <input type="text" id="endTime" class="form-control form-control-sm" placeholder="结束时间">
          </div>
          <div class="col-3 form-row__item form-row__search" data-before="标题名称：">
            <input type="text" class="form-control form-control-sm"  placeholder="标题名称" id="searchName">
            <button type="button" class="btn btn-light btn-search">
              <i class="icon-search"></i>
            </button>
          </div>
        </div>
        <div class="btn-group-end">
          <a href="<?=anchorurl("contents/add")?>"  class="btn btn-outline-primary btn-sm"  target="_blank">
            发布文章
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
<div class="modal fade commonModal" id="content_preview_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">文章预览</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body" id="contentBody">
        </div>
        <div class="modal-footer">
          <div class="btn-group">
          </div>
        </div>
    </div>
  </div>
</div>
<a href="#"  id="preview_article"  data-toggle="modal" data-target="#content_preview_modal" style="display: none">
  预览文章
</a>
<script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/articles.js"></script>
<script>
  var userItem = null;
  var contentItem = null;
  $(function() {

    var province_id = 0;
    var city_id  = 0;
    var district_id = 0;


    $('#content_preview_modal').on('show.bs.modal', function () {
      if(contentItem != null){
        $.ajax({
          url: "<?=anchorurl('contents/getContent')?>/"+contentItem.id,
          type: "get",
          async: false,
          success: function (data, textstatus) {
            $("#contentBody").html(data);
          }
        });
      }
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

    $("#startTime").datepicker({
      format: 'yyyy-mm-dd'
    });
    $("#endTime").datepicker({
      format: 'yyyy-mm-dd'
    });

    function getNewData(){

      mmg.load({
        key: $("#searchName").val(),
        catid:$("#catid").val(),
        "start_date":$("#startTime").val(),
        "end_date":$("#endTime").val()
      });

    }

    $(document).keypress(function(e) {
      // 回车键事件
      if(e.which == 13) {
        getNewData();
      }
    });




  });
</script>
</body>
</html>
