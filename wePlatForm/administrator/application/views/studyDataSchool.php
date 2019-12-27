<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('meta');?>
  <?php $this->load->view('jsgrid'); ?>
  <?php $this->load->view('tmpl/heightCharts'); ?>
</head>
<style>
  .jqx-chart-legend-text{
    opacity: 0 !important;
  }
</style>
<body>
<div class="app app-header-fixed ">
  <!-- header -->
  <?php $this->load->view('header');?>
  <!-- / header -->

  <!-- aside -->
  <?php $this->load->view('aside');?>
  <!-- / aside -->

  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">


      <div class="hbox hbox-auto-xs hbox-auto-sm" ng-init=" app.settings.asideFolded = false;  app.settings.asideDock = false;">
        <!-- main -->
        <div class="col">
          <!-- main header -->
          <div class="bg-light lter b-b wrapper-md" style="height: auto">
            <div class="data-select col-md-8">
              <select name="amoeba_id" id="amoeba_id">
                <option value="0">--请选择--</option>
                <?php foreach($amoebas as $amoeba):?>
                <option value="<?=$amoeba->id?>"><?=$amoeba->name?></option>
                <?php endforeach;?>
              </select>
              <select name="province_id" id="province_new">
                <option value="0">--请选择--</option>
                <?php foreach($provinces as $province):?>
                  <option value="<?=$province->province_id?>"><?=$province->name?></option>
                <?php endforeach;?>
              </select>
              <select name="city_id" id="city_new">
                <option value="0">--请选择--</option>
                <?php foreach($citys as $city):?>
                  <option value="<?=$city->city_id?>"><?=$city->name?></option>
                <?php endforeach;?>
              </select>
              <select name="district_id" id="district_new">
                 <option value="0">--请选择--</option>
                <?php foreach($districts as $district):?>
                  <option value="<?=$district->district_id?>"><?=$district->name?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="col-md-4">
              <div class="input-daterange input-group  data-datepicker" >
                <input type="text" class="input-sm form-control" name="start" value=" ">
                <span class="input-group-addon">至</span>
                <input type="text" class="input-sm form-control" name="end" value=" ">
              </div>
            </div>
          </div>
          <!-- / main header -->
          <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
            <!-- 图标区域 开始-->
            <div class="chart-box">
              <!-- 图标排名 开始-->
              <div class="chart-ranking col-md-2">
                <h1>综合得分排名</h1>
                <div class="chart-ranking-list">
                  <div class="div_scroll ranking-list">
                    <?php foreach($schools as $school):?>
                      <div class="ranking-list-item">
                        <p><?=$school->name?></p>
                        <?php
                        $score = $school->getScore();
                        $pencent = 144*$score/100;
                        if($score >= 80){
                          $class = "lev-1";
                        }else if($score >= 60 && $score < 80){
                          $class = "lev-2";
                        }else{
                          $class = "lev-3";
                        }
                        ?>
                        <div class="ranking-score">
                          <div style="width:<?=$pencent?>px" class="<?=$class?>"></div>
                          <span><?=$score?>分</span>
                        </div>
                      </div>
                    <?php endforeach;?>
                  </div>
                </div>
              </div>
              <!-- 图标排名 结束-->
              <!-- 图标展现 开始-->
              <div class="chart-show col-md-10">
                <div class="chart-show-con">
                  <div class="col-md-12 chart-show-tit">
                    <div class="col-md-6">
                      <select name="" id="">
                        <option value="">全部成员综合信息</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <div class="analyse-btn btn-primary">数据分析</div>
                      <div class="export-btn btn-success">导出</div>
                    </div>
                  </div>
                  <div class="col-md-12 chart-show-main">
                    <div class="col-md-6 " id="chartContainer"></div>
                    <div class="chart-show-text col-md-6">
                      <div class="col-md-6">
                        <div class="col-course">综合得分:78分</div>
                        <div class="col-data">
                          <h6>综合数据</h6>
                          <div>
                            <p>完成率：34%  </p>
                            <p>正确率：50%</p>
                            <p>MT平均分：34分</p>
                            <p>达标率：98%</p>
                            <p>学习方法得分：67分</p>
                          </div>
                        </div>
                        <div class="col-active">
                          <h6>活跃度</h6>
                          <div>
                            <p>总人数：1500人</p>
                            <p>活跃人数：1200人</p>
                            <p>活跃度：90%</p>
                            <p>不活跃人数：300人</p>
                            <p>只做pt人数：50人</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="col-time">
                          <h6>学习时间、频率</h6>
                          <div>
                            <p>总学习天数：60天</p>
                            <p>总学习时间：160:50</p>
                            <p>周学习天数：2天</p>
                            <p>总学习时间：2:05</p>
                          </div>
                        </div>
                        <div class="col-ability">
                          <h6>能力概念</h6>
                          <div>
                            <p>听力能力：23%</p>
                            <p>口语能力：50%</p>
                            <p>语法能力：89%</p>
                          </div>
                        </div>
                        <div class="col-fun">
                          <h6>功能键平均使用次数</h6>
                          <div>
                            <p>重复键：54次	 </p>
                            <p>录音键：30次</p>
                            <p>文字键：10次	</p>
                            <p>文字键：10次	</p>
                            <p>回听键：35次</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- 图标结束 开始-->
            </div>
            <!-- 图标区域 结束 -->
            <!-- tasks -->

            <div class="row">
              <div class="col-md-12">
                <div class="app-content" role="main" style="margin-left: 0">
                  <div class="app-content-body ">
                    <div class="panel panel-default">
                      <div class="table-tit-box">
                        <div class="col-md-6">
                          <h1 class="table-tit">基本信息</h1>
                        </div>
                        <div class="col-md-6">
                          <div class="history-btn btn-info">历史班级</div>
                          <div class="export-btn btn-success">导出</div>
                          <div class="input-group" style="float: right;">
                            <input type="text" class="form-control input-type-name rounded" id="searchName" placeholder="输入关键字">
                            <a class="fa fa-search pos"></a>
                          </div>
                        </div>
                      </div>
                      <div class="table-responsive">
                        <div class="table-con">
                          <div id="jsGrid"></div>
                          <div class="select-num">
                            <span>每页显示</span>
                            <select class="input-sm form-control w-sm inline v-middle" style="width: 70px">
                              <option value="0">10</option>
                              <option value="1">20</option>
                              <option value="2">30</option>
                              <option value="3">40</option>
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
            <!-- / tasks -->
          </div>
        </div>
        <!-- / main -->
        <!-- right col -->
        <!-- / right col -->
      </div>



    </div>
  </div>
  <!-- /content -->


  <!-- footer -->
  <?php $this->load->view('tmpl/foot')?>
  <!-- / footer -->



</div>
<script src="<?=base_url()?>media/administrator/js/mousewheel.js"></script>
<script src="<?=base_url()?>media/administrator/js/easyscroll.js"></script>
<script>
  $(function() {
    var amoeba_id = 0;
    var province_id = 0;
    var city_id  = 0;
    var district_id = 0;

    $("#amoeba_id").change(function(){
      amoeba_id = $(this).val();
      getNewData();
    });

    $("#province_new").change(function(){
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
          $("#city_new").html(string);
          var districts = "";
          $(data.districts).each(function(index,element){
            districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
          });
          $("#district_new").html(districts);
        }
      });
      getNewData();
    });

    $("#city_new").change(function(){
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
          $("#district_new").html(districts);
        }
      });
      getNewData();
    });

    $("#district_new").change(function(){
      district_id = $(this).val();
      getNewData();
    });

    function getNewData(){
        $("#jsGrid").jsGrid("loadData", {key: $("#searchName").val(),amoeba_id:amoeba_id,province_id:province_id,city_id:city_id,district_id:district_id}).done(function () {

        });
    }

    $(document).keypress(function(e) {
      // 回车键事件
      if(e.which == 13) {
        getNewData();
      }
    });

    $("#jsGrid").jsGrid({
      height: "auto",
      width: "100%",
      confirmDeleting: false,
      paging: true,
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
          return $.ajax({
            type: "GET",
            url: "<?=anchorurl('home/getSchoolList')?>",
            dataType:"json",
            data: filter
          });
        },
        loadParams: function() {},

      },
      fields: [
        { name: "name", title: "名称", type: "text", width: 140 ,align: "center"},
        { name: "follower_count", title: "人数",type: "number", width: 110 ,align: "center"},
        { name: "school_user_count",title: "校装账号数", type: "number", width: 140,align: "center" },
        { name: "home_user_count",title: "家装账号数", type: "number", width: 140,align: "center"},
        { name: "livenessSchool",title: "校装活跃度", type: "number", width: 160,align: "center"},
        { name: "livenessHome",title: "家装活跃度", type: "number", width: 160,align: "center"},
        { name: "end_date",title: "到期时间", type: "text", width: 180,align: "center" },
        { name: "username",title: "管理员", type: "text", width: 130 ,align: "center"}
      ]
    });


    var selectedItems = [];

    var selectItem = function(item) {
      selectedItems.push(item);
    };

    var unselectItem = function(item) {
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



    $('.input-daterange').datepicker({});
//    基本信息修改

    $('.div_scroll').scroll_absolute({arrows:false});




  });
</script>
</body>
</html>
