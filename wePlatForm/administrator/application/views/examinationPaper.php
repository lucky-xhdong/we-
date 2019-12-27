<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('meta');?>
  <?php $this->load->view('jsgrid'); ?>
  <?php $this->load->view('tmpl/jqueryvalidate'); ?>
  <style>
    .jqx-chart-legend-text{
      opacity: 0 !important;
    }
  </style>
</head>
<body>
<div class="app app-header-fixed">
  <!-- header -->
  <?php $this->load->view('header');?>
  <!-- / header -->

  <!-- aside -->
  <?php $this->load->view('aside');?>
  <!-- / aside -->
  <!-- content-->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">
      <div class="hbox hbox-auto-xs hbox-auto-sm" >
        <div class="col">
          <!-- main header -->
          <div class="bg-light lter b-b wrapper-md" style="height: auto">
            <a href="javascript:;" class="btn btn-info new-icon" data-toggle="modal" data-target=".new-test-box">
              新建考卷
            </a>
            <a href="javascript:;" class="btn btn-primary del-icon">
              复制考卷
            </a>
            <a href="javascript:;" class="btn btn-danger del-icon" id="DeleteQuestionBlock">
              删除考卷
            </a>
<!--            <a href="javascript:;" class="btn btn-success del-icon pull-right">-->
<!--              草稿箱-->
<!--            </a>-->
          </div>
          <!-- / main header -->
          <div class="wrapper-md">
            <div class="panel panel-default">
              <div class="wrap-tit exap-tit">
                <div class="row ">
                  <div class="col-sm-6">
                    <div class="col-sm-6 ">
                      <p class="">题库</p>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-group" style="float: right;">
                        <input class="form-control input-type-name rounded" placeholder="输入名称" id="searchName" type="text">
                        <a class="fa fa-search pos"></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="col-sm-3">
                        <select name="province_id" id="province_new1">
                            <option value="0">--请选择--</option>
                            <?php foreach($provinces as $province):?>
                                <option value="<?=$province->province_id?>"><?=$province->name?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select name="city_id" id="city_new1">
                            <option value="0">--请选择--</option>
                            <?php foreach($citys as $city):?>
                                <option value="<?=$city->city_id?>"><?=$city->name?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select name="district_id" id="district_new1">
                            <option value="0">--请选择--</option>
                            <?php foreach($districts as $district):?>
                                <option value="<?=$district->district_id?>"><?=$district->name?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select name="schools_new1" id="schools_new1">
                            <option value="0">--请选择--</option>
                        </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-responsive">
                <div class="table-con">
                  <div id="jsGrid" class="jsgrid"></div>
                  <div class="select-num">
                    <span>每页显示</span>
                    <select class="input-sm form-control w-sm inline v-middle" style="width: 70px">
                      <option value="0">10</option>
                    </select>
                    <span>条</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /content-->
  <!-- footer-->
  <footer id="footer" class="app-footer" role="footer">
    <div class="wrapper b-t bg-light">
        <span class="pull-right">1.0.0 <a href="" ui-scroll="app" class="m-l-sm text-muted">
            <i class="fa fa-long-arrow-up"></i></a></span>
      北京唯佳未来教育科技有限公司 © 2016 Copyright.
    </div>
  </footer>
  <!-- / footer-->

  <!--新建考卷的模态框-->
  <div class="new-test-box modal fade" role="dialog" >
    <div class="modal-dialog modal-nor">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">设置考卷基本资料</h4>
        </div>
        <div class="modal-body test-int-body">
          <div class="clearfix">
              <div class="mgb-10 clearfix">
                  <div class="col-sm-3 text-right">试卷名称</div>
                  <div class="col-sm-4">
                      <input type="text" name="paper_title" placeholder="设置试题名">
                  </div>
              </div>
              <div class="mgb-10 clearfix">
                  <div class="col-sm-3 text-right">试卷描述</div>
                  <div class="col-sm-4">
                      <input type="text" name="paper_description" placeholder="简述该试卷">
                  </div>
              </div>
            <div class="mgb-10 clearfix">
              <div class="col-sm-3 text-right">所属学校</div>
                <div class="col-sm-4">
                    <select name="" id="school">
                        <?php
                        foreach($school as $key=>$value):
                            ?>
                            <option value="<?=$value->id?>"><?=$value->name?></option>
                        <? endforeach;?>
                    </select>
                </div>
            </div>
            <div class="mgb-10 clearfix">
              <div class="col-sm-3 text-right">使用范围</div>
              <div class="col-sm-4">
                <select name="" id="paper_range">
                  <option value="0">公开模拟考</option>
                </select>
              </div>
            </div>
            <div class="mgb-10 clearfix">
              <div class="col-sm-3 text-right">考试难度</div>
              <div class="col-sm-4">
                  <select name="diffculty" id="diffculty">
                      <?php
                      foreach($diffculty as $key=>$value):
                          ?>
                          <option value="<?=$value->id?>"><?=$value->difficulty_name?></option>
                      <? endforeach;?>
                  </select>
              </div>
            </div>
            <div class="mgb-10 clearfix">
              <div class="col-sm-3 text-right">考试时间</div>
                <div class="col-sm-4">
                <input type="text" name="paper_time" placeholder="设置考试时间（单位分钟）">
              </div>
            </div>

              <div class="mgb-10 clearfix">
                  <div class="col-sm-3 text-right">试题分数</div>
                  <div class="col-sm-4">
                      <input type="text" name="paper_score" placeholder="设置试题分数">
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer text-center">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" id="save_paper" class="btn btn-success" >下一步</button>
<!--          <a  class="btn btn-success" href="--><?//=site_url('home/setUpExamP')?><!--">下一步</a>-->
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?=base_url()?>media/administrator/js/bootbox.min.js"></script>
<script>
  $(function() {
      var province_id = 0;
      var city_id  = 0;
      var district_id = 0;
      var school_id = 0;
      var userItem = null;
      $("#DeleteQuestionBlock").click(function(){
          console.log(userItem);
          if(userItem == null){
              alert("请选择考题!");
          }else{
              bootbox.dialog({
                  message: "您确定要删除吗？",
                  title: "",
                  buttons: {
                      cancel: {
                          label: "取消",
                          className: "btn-success",
                          callback: function () {
                          }
                      },
                      confirm: {
                          label: "删除",
                          className: "btn-danger",
                          callback: function () {
                              $.ajax({
                                  type: "POST",
                                  async: false,
                                  url: '<?=anchorurl('papers/DeletePaper')?>',
                                  data: {
                                      paper_id: userItem.subject_num,
                                  },
                                  success: function (msg) {
                                      retisterLimitTip("删除成功");
                                      userItem = null;
                                      $("#jsGrid").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
                                      });
                                  }
                              });
                          }
                      }
                  }
              });
          }
      });

      //省份选择
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
//                getNewData();
      });
      //市选择
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
//                getNewData();
      });
      //区选择
      $("#district_new1").change(function(){
          district_id = $(this).val();
          $.ajax({
              url: "<?=anchorurl('categorys/getSchool')?>/"+$("#province_new1").val()+"/"+$("#city_new1").val()+"/"+$(this).val(),
              type: "get",
              dataType: 'json',
              async: false,
              success: function (data, textstatus) {
                  console.log(data);
                  var schools = "";
                  $(data).each(function(index,element){
                      schools += '<option value="'+element.id+'">'+element.name+'</option>';
                  });
                  $("#schools_new1").html(schools);
              }
          });
//                getNewData();
      });
      //学校选择 刷新洁面
      $("#schools_new1").change(function () {
          school_id = $(this).val();

          getNewData();
      });

      function getNewData(){
          $("#jsGrid").jsGrid("loadData", {key: $("#searchName").val(),school_id:school_id}).done(function () {

          });
      }

      $("#jsGrid").jsGrid({
          height: "auto",
          width: "100%",
          paging: true,
          deleteConfirm: "Do you really want to delete the client?",
          autoload: true,
          pageLoading:true,
          pageSize: 10,
          pageButtonCount: 5,
          pagerFormat: "{first} {prev} {pages} {next} {last} &nbsp;&nbsp; {pageIndex} / {pageCount}",
          pagePrevText: "上一页",
          pageNextText: "下一页",
          pageFirstText: "首页",
          pageLastText: "最后一页",
          controller: {
              loadData: function(filter) {
                  console.log(filter)
                  return $.ajax({
                      type: "GET",
                      url: "<?=anchorurl('papers/getParperList')?>",
                      dataType:"json",
                      data: filter,
                      success:function (msg) {
                          console.log(msg);
                      }
                  });
              },
              deleteItem: function(item) {
                  console.log(item);
              }
          },
          fields: [
              {
                  headerTemplate: function() {
                      return $("<input>").attr("type", "checkbox").text("选中")
                          .on("click", function () {
                              if(this.checked){
                                  $(".jsgrid-cell  :checkbox").prop("checked", true);

                              }else{
                                  $(".jsgrid-cell  :checkbox").prop("checked", false);

                              }
                              deleteSelectedItems();
                          });
                  },
                  itemTemplate: function(_, item) {
                      return $("<input>").attr("type", "checkbox")
                          .prop("checked", $.inArray(item, selectedItems) > -1)
                          .on("change", function () {
                              $(this).is(":checked") ? selectItem(item) : unselectItem(item);
                          });
                  },
                  align: "center",
                  width: 60
              },
              { name: "subject_num",title:"考卷编号",  type: "number", width: 150,align:"center" },
              { name: "paper_name",title:"考卷名称",  type: "text", width: 150,align:"center" },
              { name: "paper_diff", title:"考试难度" ,type:"text", width: 150,align:"center" },
              { name: "countTime",title:"考试时长" , type: "text", width: 200,align:"center"},
              { name: "full_marks",title:"满分分值" , type: "text", width: 200,align:"center" },
              { name: "build_time",title:"创建时间" , type: "number", width: 200,align:"center" },
              { name: "build_user",title:"创建人" , type: "text",align:"center" },
              { name: "school",title:"所属学校" , type: "text", width: 200 ,align:"center"},
              { name: "use_count",title:"使用次数" , type: "number", width: 200,align:"center" },
              { name: "remarks",title:"备注" , type: "text", width: 200,align:"center" }
          ]
      });


      var selectedItems = [];

      var selectItem = function(item) {
          userItem = item;
          selectedItems.push(item);
      };

      var unselectItem = function(item) {
          userItem = null;
          selectedItems = $.grep(selectedItems, function(i) {
              return i !== item;
          });
      };

      var deleteSelectedItems = function() {
          if(!selectedItems.length || !confirm("Are you sure?"))
              return;

          deleteClientsFromDb(selectedItems);

          var $grid = $("#jsGrid");
          $grid.jsGrid("option", "pageIndex", 1);
          $grid.jsGrid("loadData");

          selectedItems = [];
      };

      var deleteClientsFromDb = function(deletingClients) {
          db.clients = $.map(db.clients, function(client) {
              return ($.inArray(client, deletingClients) > -1) ? null : client;
          });
      };

//    保存试卷属性
      $("#save_paper").on('click',function () {
          $(".modal-content").showLoading();
          var school,diffculty,paper_range,paper_time,paper_score,paper_title,paper_description;
          school = $("#school").val();
          paper_range = $("#paper_range").val();
          diffculty = $("#diffculty").val();
          paper_time = $("input[name='paper_time']").val();
          paper_score = $("input[name='paper_score']").val();
          paper_title = $("input[name='paper_title']").val();
          paper_description = $("input[name='paper_description']").val();
          if(paper_time==''||paper_score==''||paper_title==''||paper_description==''){
              retisterLimitTip("请补充完整数据后提交");
              $(".modal-content").hideLoading();
          }else{
              $.ajax({
                  url: "<?=anchorurl('papers/savePaper')?>",
                  type: "POST",
                  async: false,
                  data:{
                      'school':school,
                      'paper_range':paper_range,
                      'diffculty':diffculty,
                      'paper_time':paper_time,
                      'paper_score':paper_score,
                      'paper_title':paper_title,
                      'paper_description':paper_description
                  },
                  success: function (data) {
                      $(".modal-content").hideLoading();
                      console.log(data);
                      if(data){
                          window.location.href="<?=site_url('home/setUpExamP')?>/"+data+"/"+paper_score+"/"+paper_time;
                      }else{
                          retisterLimitTip("新建考卷失败");
                      }
                  }
              });
          }
      });
  });
</script>
</body>
</html>