<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('meta');?>
  <?php $this->load->view('jsgrid'); ?>
  <link rel="stylesheet" href="<?=base_url()?>media/administrator/css/font-awesome.min.css">
<!--  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">-->
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
            <div class="col-md-8">
              <a href="<?=anchorurl('home')?>">学习数据</a><span>&nbsp;&gt;&nbsp;</span>
              <a href="<?=anchorurl('home/studyDataGrade/'.$school->id)?>"><?=$school->name?></a><span>&nbsp;&gt;&nbsp;</span>
              <a href="<?=anchorurl('home/studyDataClass/'.$grade->id)?>"><?=$grade->name?></a><span>&nbsp;&gt;&nbsp;</span>
              <a href="javascript:;"><?=$class->name?></a>
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
          <div class="wrapper-md " >
            <div class="course-set-box border-cf">
              <h1 class="course-set-tit">三班课程设置</h1>
              <div class="row">
                <div class="col-md-12">
                  <div class="app-content" role="main" style="margin-left: 0">
                    <div class="app-content-body ">
                      <!--基本设置 开始-->
                      <div class="panel panel-default panel-no-mg">
                        <div class="table-tit-box">
                          <div class="col-md-6">
                            <h1 class="table-tit">课程基本设置</h1>
                          </div>
                          <div class="col-md-6">
                            <div class="edit-btn btn-info">编辑</div>
                          </div>
                        </div>
                        <div class="table-responsive">
                          <div class="table-con">
                            <div id="jsGrid"></div>
                          </div>
                        </div>
                      </div>
                      <!--基本设置 结束-->
                      <!--解锁设置 开始-->
                      <div class="panel panel-default panel-no-mg">
                        <div class="table-tit-box ">
                          <div class="col-md-6">
                            <h1 class="table-tit">课程解锁设置</h1>
                          </div>
                          <div class="col-md-6">
                            <div class="edit-btn btn-info">编辑</div>
                          </div>
                        </div>
                        <div class="clear-setting">
                          <div class="row">
                            <div class="col-md-6 text-right">当前解锁状态：</div>
                            <div class="col-md-6">按学习计划解锁</div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 text-right">  MT解锁状态：</div>
                            <div class="col-md-6">
                              <p>单元完成率达80%，自动解锁单元测试</p>
                              <p>单元测试低于60分，7天后重测</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--解锁设置 结束-->
                      <!--课程解锁状态 开始-->
                      <div class="panel panel-default panel-no-mg">
                        <div class="table-tit-box">
                          <div class="col-md-6">
                            <h1 class="table-tit">课程基本设置</h1>
                          </div>
                          <div class="col-md-6">
                            <div class="edit-btn btn-info">编辑</div>
                          </div>
                        </div>
                        <div class="table-responsive">
                          <div class="table-con">
                            <div id="jsGrid1"></div>
                          </div>
                        </div>
                      </div>
                      <!--课程解锁状态 结束-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / main -->
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
  $(function(){
    $("#jsGrid").jsGrid({
      height: "auto",
      width: "100%",
      confirmDeleting: false,
      paging: true,
      autoload: true,
      pageLoading:false,
      pageSize: 10,
      pageButtonCount: 5,
      pagerFormat: "{first} {prev} {pages} {next} {last} &nbsp;&nbsp; {pageIndex} / {pageCount}",
      pagePrevText: "上一页",
      pageNextText: "下一页",
      pageFirstText: "首页",
      pageLastText: "最后一页",
      controller:{
        loadData: function(){
          return[
            {
              "choice_type":"Let's go",
              "main_sub":"主课",
              "study_time":"70%",
              "word_key":" ",
              "translate_key":" "
            },
            {
              "choice_type":"Dyed kids",
              "main_sub":"辅课",
              "study_time":"70%",
              "word_key":"35%",
              "translate_key":"45%"
            },
            {
              "choice_type":"We talk",
              "main_sub":"辅课",
              "study_time":"70%",
              "word_key":"35%",
              "translate_key":"45%"
            }
          ]
        }
      },
      fields: [
        { name: "choice_type", title: "选择课程", type: "text",align: "center"},
        { name: "main_sub", title: "主/辅课", type: "text",align: "center"},
        { name: "study_time", title: "设置学习时间", type: "text",align: "center"},
        { name: "word_key", title: "完成率激活文字键", type: "text",align: "center"},
        { name: "translate_key", title: "完成率激活翻译键", type: "text",align: "center"}
      ]
    });
    $("#jsGrid1").jsGrid({
      height: "auto",
      width: "100%",
      confirmDeleting: false,
      paging: true,
      autoload: true,
      pageLoading:false,
      pageSize: 10,
      pageButtonCount: 5,
      pagerFormat: "{first} {prev} {pages} {next} {last} &nbsp;&nbsp; {pageIndex} / {pageCount}",
      pagePrevText: "上一页",
      pageNextText: "下一页",
      pageFirstText: "首页",
      pageLastText: "最后一页",
      controller:{
        loadData: function(){
          return[
            {
              "choice_type":"Let's go",
              "module":"",
              "unit":"",
              "course":" ",
              "sum":" ",
              "type":"<span class='lock-icon'></span>",
            },
            {
              "choice_type":"",
              "module":"midele1",
              "unit":"",
              "course":" ",
              "sum":" ",
              "type":"<span class='lock-icon'></span>",
            },
            {
              "choice_type":"",
              "module":"",
              "unit":"names&places",
              "course":" ",
              "sum":" ",
              "type":"<span class='lock-icon'></span>",
            },
            {
              "choice_type":"",
              "module":"",
              "unit":"",
              "course":" lesson1",
              "sum":" ",
              "type":"<span class='lock-icon'></span>",
            },
            {
              "choice_type":"",
              "module":"",
              "unit":"",
              "course":" ",
              "sum":"part1",
              "type":"<span class='lock-icon on'></span>"
            }
          ]
        }
      },
      fields: [
        { name: "choice_type", title: "选择课程", type: "text",align: "center"},
        { name: "module", title: "模块", type: "text",align: "center"},
        { name: "unit", title: "单元", type: "text",align: "center"},
        { name: "course", title: "课", type: "text",align: "center"},
        { name: "sum", title: "小结", type: "text",align: "center"},
        { name: "type", title: "状态", type: "text",align: "center"}
      ]
    });
    $('.lock-icon').click(function(){
        $(this).toggleClass('on');
    });
    function tdeach(){
      var eleTr = $('#jsGrid1 .jsgrid-grid-body table').find('tr'),
          trLen = eleTr.length,
          eleTd = '',
          tdlen = '';
          for(var i= 0;i<trLen;i++){
            var eleTd = eleTr.eq(i).find('td'),
                tdlen = eleTd.length;
            for(var j=0;j<tdlen;j++){
              var tdhtml = eleTd.eq(j).text();
              if(tdhtml && tdhtml != " "){
                var oTr = 'tr'+j;
                eleTr.eq(i).addClass(oTr);
              }
            }
          }
    }
    tdeach();
  });
</script>
</body>
</html>
