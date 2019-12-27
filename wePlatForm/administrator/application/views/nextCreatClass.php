<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('meta');?>
</head>

<body>
<div class="app app-header-fixed ">

    <!-- header -->
  <?php $this->load->view('meta');?>
  <!-- / header -->

    <!-- aside -->
  <?php $this->load->view('meta');?>
  <!-- / aside -->

  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">

      <div class="wrapper-md">
        <div class="panel panel-default" style="position: relative;min-height: 500px">
        <div class="panel-heading">
          <span class="label bg-danger pull-right m-t-xs">4 left</span>
          创建班级
        </div>
        <div class="table-responsive">

          <table class="table table-striped b-t b-light">
            <thead >
            <tr >
              <th style="text-align: center">班级名称</th>
              <th style="text-align: center">开始时间</th>
              <th style="text-align: center">到期时间</th>
              <th style="text-align: center">管理员</th>
              <th style="text-align: center">班级属性</th>
            </tr>
            </thead>

            <tbody>
            <tr style="text-align: center">
              <td> <span> 四班 </span> </td>
              <td>
                <!--<div class="form-group" id="data_1">-->
                  <!--<div class="col-sm-10 input-group date">-->
                    <!--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>-->
                    <!--<input type="text"  class="form-control" name="huankuanriqi" placeholder="应还款日期必填" required="">-->
                  <!--</div>-->
                  <select name="account" class="form-control m-b" style="margin-bottom: 0">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                  </select>

              </td>
              <td colspan=”2″>
                <div class="form-group" style="margin-bottom: 0">
                  <div class="col-sm-12">
                    <select name="account" class="form-control m-b" style="margin-bottom: 0">
                      <option>option 1</option>
                      <option>option 2</option>
                      <option>option 3</option>
                      <option>option 4</option>
                    </select>
                  </div>
                </div>
              </td>
              <td colspan=”2″> <span> 李尔 </span> </td>
              <td colspan=”2″><div class="form-group" style="margin-bottom: 0">
                <div class="col-sm-12">
                  <select name="account" class="form-control m-b" style="margin-bottom: 0">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                  </select>
                </div>
              </div></td>
            </tr>
            <tr >
              <td colspan="5"  style="background-color:#eeeeee;padding-bottom: 0">
                <div class="m-b-sm" style="margin-bottom:0;">
                  <div class="btn-group" style="border-bottom: 1px #cccccc solid;width: 100%;padding: 10px;">
                    <a class="btn btn-black" style="background-color: #74a92d;border-color: #74a92d;" href="<?=site_url('AccountManage/addPeople')?>" >编辑成员</a>
                    <span style="margin-left: 20px"> we Tal; </span>
                  </div>
                  <div >
                    <div class="btn-group" style="border-bottom: 1px #cccccc solid;width: 100%;padding: 10px">
                    <a class="btn btn-black" style="background-color: #74a92d;border-color: #74a92d;" href="<?=site_url('AccountManage/addPeople')?>" >编辑成员</a>
                    <span style="margin-left: 20px"> we Tal; </span>
                    <span> lat go; </span>
                    <span> we Tal; </span>
                    <span> lat go; </span><span> we Tal; </span>
                    <span> lat go; </span><span> we Tal; </span>
                    <span> lat go; </span><span> we Tal; </span>
                    <span> lat go; </span><span> we Tal; </span>
                    <span> lat go; </span><span> we Tal; </span>
                    <span> lat go; </span>
                    <span> we Tal; </span>
                    <span> lat go; </span>
                    </div>
                    <div  style="border-bottom: 1px #cccccc solid;width: 100%;padding: 10px 10px 50px 10px;color: red">
                    <span >未识别人员：</span><span> 张三，王麻子 </span>
                    <a> 点击修改>> </a>
                    </div>

                  </div>
                </div>
              </td>

            </tr>
            <tr style="text-align: center">
              <td colspan=”2″> <span> 四班 </span> </td>
              <td colspan=”2″>
                <div class="form-group" style="margin-bottom: 0">
                  <div class="col-sm-12">
                    <select name="account" class="form-control m-b" style="margin-bottom: 0">
                      <option>option 1</option>
                      <option>option 2</option>
                      <option>option 3</option>
                      <option>option 4</option>
                    </select>
                  </div>
                </div>
              </td>
              <td colspan=”2″>
                <div class="form-group" style="margin-bottom: 0">
                  <div class="col-sm-12">
                    <select name="account" class="form-control m-b" style="margin-bottom: 0">
                      <option>option 1</option>
                      <option>option 2</option>
                      <option>option 3</option>
                      <option>option 4</option>
                    </select>
                  </div>
                </div>
              </td>
              <td colspan=”2″> <span> 李尔 </span> </td>
              <td colspan=”2″><div class="form-group" style="margin-bottom: 0">
                <div class="col-sm-12">
                  <select name="account" class="form-control m-b" style="margin-bottom: 0">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                  </select>
                </div>
              </div></td>
            </tr>
            <tr>
              <td colspan="5"  style="background-color:#eeeeee;padding-bottom: 0">
                <div class="m-b-sm" style="margin-bottom:0;">
                  <div class="btn-group" style="border-bottom: 1px #cccccc solid;width: 100%;padding: 10px;">
                    <a class="btn btn-black" style="background-color: #74a92d;border-color: #74a92d;" href="addPeople.html" >编辑成员</a>
                    <span style="margin-left: 20px"> we Tal; </span>
                  </div>
                  <div >
                    <div class="btn-group" style="border-bottom: 1px #cccccc solid;width: 100%;padding: 10px">
                      <a class="btn btn-black" style="background-color: #74a92d;border-color: #74a92d;" href="addPeople.html" >编辑成员</a>
                      <span style="margin-left: 20px"> we Tal; </span>
                      <span> lat go; </span>
                      <span> we Tal; </span>
                      <span> lat go; </span><span> we Tal; </span>
                      <span> lat go; </span><span> we Tal; </span>
                      <span> lat go; </span><span> we Tal; </span>
                      <span> lat go; </span><span> we Tal; </span>
                      <span> lat go; </span><span> we Tal; </span>
                      <span> lat go; </span>
                      <span> we Tal; </span>
                      <span> lat go; </span>
                    </div>
                    <div  style="border-bottom: 1px #cccccc solid;width: 100%;padding: 10px 10px 50px 10px;color: red">
                      <span >未识别人员：</span><span> 张三，王麻子 </span>
                      <a> 点击修改>> </a>
                    </div>

                  </div>
                </div>
              </td>

            </tr>


            </tbody>
          </table>

        </div>

          <footer style="position: absolute;bottom: 0;text-align: center;left: 45%;padding-bottom: 10px">
            <a class="btn btn-black" style="background-color: #d9d9d9;border-color: #d9d9d9;"> 取 消 </a>
            <a class="btn btn-black" style="background-color: #74a92d;border-color: #74a92d;" href=""> 确定 </a>
          </footer>
      </div>
      </div>
    </div>
  </div>
  <!-- /content -->

  <!-- footer -->
  <footer id="footer" class="app-footer" role="footer" >
    <div class="wrapper b-t bg-light">
      <span class="pull-right">2.2.0 <a href ui-scroll="app" class="m-l-sm text-muted"><i class="fa fa-long-arrow-up"></i></a></span>
      &copy; 2016 Copyright.
    </div>
  </footer>
  <!-- / footer -->

</div>
<?php $this->load->view('javaScript');?>
<script>
  $(document).ready(function () {

    $('#data_1 .input-group.date').datepicker({
      todayBtn: "linked",
      keyboardNavigation: false,
      forceParse: false,
      calendarWeeks: true,
      autoclose: true
    });
  });
</script>
</body>
</html>
