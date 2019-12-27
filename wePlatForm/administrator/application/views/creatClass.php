<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('meta'); ?>
</head>

<body>
<div class="app app-header-fixed ">

    <!-- header -->
  <?php $this->load->view('header'); ?>
  <!-- / header -->

    <!-- aside -->
  <?php $this->load->view('aside'); ?>
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
              <th style="text-align: center">巴</th>
              <th style="text-align: center">省</th>
              <th style="text-align: center">市</th>
              <th style="text-align: center">县/区</th>
              <th style="text-align: center">学校</th>
              <th style="text-align: center">年级</th>
              <th style="text-align: center">班级</th>
              <th style="text-align: center"></th>
              <th style="text-align: center"></th>
              <!--<th style="width:30px;"></th>-->
            </tr>
            </thead>

            <tbody>
            <tr>
              <td>
                <div class="m-b-sm" style="margin-bottom:0;">
                  <div class="btn-group" ng-init="checkModel = {option1: true, option2: false}">
                    <label class="btn btn-sm btn-default active " ng-model="checkModel.option1" btn-checkbox id="test">普通添加</label>
                    <label class="btn btn-sm btn-default" ng-model="checkModel.option3" btn-checkbox>批量添加</label>
                  </div>
                </div>
              </td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <!--<td></td>-->
            </tr>

            <tr id="hidd">
              <td>
                <div class="form-group" style="margin-bottom: 0">
                <div class="col-sm-12">
                  <select name="account" class="form-control m-b" style="margin-bottom: 0">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                  </select>
                </div>
              </div></td>
              <td>
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
              <td>
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
              <td><div class="form-group" style="margin-bottom: 0">
                <div class="col-sm-12">
                  <select name="account" class="form-control m-b" style="margin-bottom: 0">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                  </select>
                </div>
              </div></td>
              <td><div class="form-group" style="margin-bottom: 0">
                <div class="col-sm-12">
                  <select name="account" class="form-control m-b" style="margin-bottom: 0">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                  </select>
                </div>
              </div></td>
              <td><div class="form-group" style="margin-bottom: 0">
                <div class="col-sm-12">
                  <select name="account" class="form-control m-b" style="margin-bottom: 0">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                  </select>
                </div>
              </div></td>
              <td><div class="form-group" style="margin-bottom: 0">
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
              <td> <a class="btn btn-success" style="border-color: #74a92d;background-color: #74a92d">上传文件</a> </td>
              <td> <a style="color: red"> 删除 </a> </td>
            </tr>
            <tr>
              <td>
                <div class="form-group" style="margin-bottom: 0">
                  <div class="col-sm-12">
                    <select name="account" class="form-control m-b" style="margin-bottom: 0">
                      <option>option 1</option>
                      <option>option 2</option>
                      <option>option 3</option>
                      <option>option 4</option>
                    </select>
                  </div>
                </div></td>
              <td>
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
              <td>
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
              <td><div class="form-group" style="margin-bottom: 0">
                <div class="col-sm-12">
                  <select name="account" class="form-control m-b" style="margin-bottom: 0">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                  </select>
                </div>
              </div></td>
              <td><div class="form-group" style="margin-bottom: 0">
                <div class="col-sm-12">
                  <select name="account" class="form-control m-b" style="margin-bottom: 0">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                  </select>
                </div>
              </div></td>
              <td><div class="form-group" style="margin-bottom: 0">
                <div class="col-sm-12">
                  <select name="account" class="form-control m-b" style="margin-bottom: 0">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                  </select>
                </div>
              </div></td>
              <td><div class="form-group" style="margin-bottom: 0">
                <div class="col-sm-12">
                  <select name="account" class="form-control m-b" style="margin-bottom: 0">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                  </select>
                </div>
              </div></td>
              <td> <a class="btn btn-success" style="border-color: #74a92d;background-color: #74a92d">上传文件</a> </td>
              <td> <a style="color: red"> 删除 </a> </td>
            </tr>

            </tbody>
          </table>
         <p style="padding: 10px;color: red" id="addNewClass"> +添加新班级 </p>

        </div>

          <footer style="position: absolute;bottom: 0;text-align: center;left: 45%;padding-bottom: 10px">
            <a class="btn btn-black" style="background-color: #d9d9d9;border-color: #d9d9d9;"> 取 消 </a>
            <a class="btn btn-black" style="background-color: #74a92d;border-color: #74a92d;" href="<?=site_url('AccountManage/nextCreatClass')?>"> 下一步 </a>
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
  $(".btn-default").on('click',function(){
      $(".btn-default ").toggleClass("active");
  });
  $(".btn-default").click(function(e){
    $("#hidd").show();
  });
  $(".btn-default.active").click(function(e){
    $("#hidd").hide();
  });
  $("#addNewClass").on('click',function(){
    $("#hidd").before("<tr>"+
    "<td><div class='form-group' style='margin-bottom: 0'><div class='col-sm-12'><select name='account' class='form-control m-b' style='margin-bottom: 0'> <option>option 1</option> <option>option 2</option> <option>option 3</option> <option>option 4</option> </select> </div> </div></td>"+
    "<td><div class='form-group' style='margin-bottom: 0'><div class='col-sm-12'><select name='account' class='form-control m-b' style='margin-bottom: 0'> <option>option 1</option> <option>option 2</option> <option>option 3</option> <option>option 4</option> </select> </div> </div></td>"+
    "<td><div class='form-group' style='margin-bottom: 0'><div class='col-sm-12'><select name='account' class='form-control m-b' style='margin-bottom: 0'> <option>option 1</option> <option>option 2</option> <option>option 3</option> <option>option 4</option> </select> </div> </div></td>"+
    "<td><div class='form-group' style='margin-bottom: 0'><div class='col-sm-12'><select name='account' class='form-control m-b' style='margin-bottom: 0'> <option>option 1</option> <option>option 2</option> <option>option 3</option> <option>option 4</option> </select> </div> </div></td>"+
    "<td><div class='form-group' style='margin-bottom: 0'><div class='col-sm-12'><select name='account' class='form-control m-b' style='margin-bottom: 0'> <option>option 1</option> <option>option 2</option> <option>option 3</option> <option>option 4</option> </select> </div> </div></td>"+
    "<td><div class='form-group' style='margin-bottom: 0'><div class='col-sm-12'><select name='account' class='form-control m-b' style='margin-bottom: 0'> <option>option 1</option> <option>option 2</option> <option>option 3</option> <option>option 4</option> </select> </div> </div></td>"+
    "<td><div class='form-group' style='margin-bottom: 0'><div class='col-sm-12'><select name='account' class='form-control m-b' style='margin-bottom: 0'> <option>option 1</option> <option>option 2</option> <option>option 3</option> <option>option 4</option> </select> </div> </div></td>"+
    "<td><a class='btn btn-success' style='background-color: #74a92d;border-color: #74a92d'>上传文件</a></td>"+
    "<td><a style='color: red'> 删除 </a></td>"+
    "</tr>"
    );
  });

</script>
</body>
</html>
