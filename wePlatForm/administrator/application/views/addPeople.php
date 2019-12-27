<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('meta')?>
</head>

<body>
<div class="app app-header-fixed ">
  

    <!-- header -->
  <?php $this->load->view('header')?>
  <!-- / header -->


    <!-- aside -->
  <?php $this->load->view('aside')?>
  <!-- / aside -->


  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">

      <div class="wrapper-md">
        <div class="panel panel-default" style="position: relative;min-height: 500px">
        <div class="panel-heading">
          <span class="label bg-danger pull-right m-t-xs">4 left</span>
          成员管理
        </div>
        <div class="table-responsive">

          <table class="table table-striped b-t b-light">
            <thead >
            <tr >
              <th style="text-align: center">成员姓名</th>
              <th style="text-align: center">账号</th>
              <th style="text-align: center">密码</th>
              <th style="text-align: center">手机号</th>
              <th style="text-align: center">E-mail</th>
              <th style="text-align: center">微信号</th>
              <th style="text-align: center">qq号</th>
              <th style="text-align: center">自己修改密码</th>
              <th style="text-align: center">修改姓名</th>
              <th style="text-align: center">备注</th>
            </tr>
            </thead>

            <tbody>
            <tr style="text-align: center" id="people" >
              <td>
                <div class="form-group" style="margin-bottom: 0">
                <div class="col-sm-12">
                  <input type="text" class="form-control">
                </div>
              </div></td>
              <td>
                <div class="form-group" style="margin-bottom: 0">
                  <div class="col-sm-12">
                    <input type="text" class="form-control">
                  </div>
                </div>
              </td>
              <td>
                <div class="form-group" style="margin-bottom: 0">
                  <div class="col-sm-12">
                    <input type="text" class="form-control">
                  </div>
                </div>
              </td>
              <td><div class="form-group" style="margin-bottom: 0">
                <div class="col-sm-12">
                  <input type="text" class="form-control">
                </div>
              </div></td>
              <td><div class="form-group" style="margin-bottom: 0">
                <div class="col-sm-12">
                  <input type="text" class="form-control">
                </div>
              </div></td>
              <td><div class="form-group" style="margin-bottom: 0">
                <div class="col-sm-12">
                  <input type="text" class="form-control">
                </div>
              </div></td>
              <td><div class="form-group" style="margin-bottom: 0">
                <div class="col-sm-12">
                  <input type="text" class="form-control">
                </div>
              </div>
              </td>
              <td>
                <select name="account" class="form-control m-b" style="margin-bottom: 0;width: 60px">
                <option>是</option>
                <option>否</option>
              </select>
              </td>
              <td> <select name="account" class="form-control m-b" style="margin-bottom: 0;width: 60px">
                <option>是</option>
                <option>否</option>
              </select> </td>
              <td> <input type="text" class="form-control"></td>
            </tr>
            </tbody>
          </table>
         <p style="padding: 10px;color: #a1a1a1" id="addNewClass"> <span>+添加新账号</span><span style="margin-left: 30px">批量导入</span> </p>

        </div>

          <footer style="position: absolute;bottom: 0;text-align: center;left: 45%;padding-bottom: 10px">
            <a class="btn btn-black" style="background-color: #d9d9d9;border-color: #d9d9d9;"> 取 消 </a>
            <a class="btn btn-black" style="background-color: #74a92d;border-color: #74a92d;" href="<?=site_url('AccountManage/nextCreatClass')?>"> 确定 </a>
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

<?php $this->load->view('javaScript')?>

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
    $("#people").before("<tr style='text-align: center'>"+
    "<td><div class='form-group' style='margin-bottom: 0'><div class='col-sm-12'> <input type='text' class='form-control'> </div> </div></td>"+
    "<td><div class='form-group' style='margin-bottom: 0'><div class='col-sm-12'> <input type='text' class='form-control'> </div> </div></td>"+
    "<td><div class='form-group' style='margin-bottom: 0'><div class='col-sm-12'> <input type='text' class='form-control'> </div> </div></td>"+
    "<td><div class='form-group' style='margin-bottom: 0'><div class='col-sm-12'> <input type='text' class='form-control'> </div> </div></td>"+
    "<td><div class='form-group' style='margin-bottom: 0'><div class='col-sm-12'> <input type='text' class='form-control'> </div> </div></td>"+
    "<td><div class='form-group' style='margin-bottom: 0'><div class='col-sm-12'> <input type='text' class='form-control'> </div> </div></td>"+
    "<td><div class='form-group' style='margin-bottom: 0'><div class='col-sm-12'> <input type='text' class='form-control'> </div> </div></td>"+
    "<td><select name='account' class='form-control m-b' style='margin-bottom: 0;width: 60px'><option>是</option><option>否</option></select></td>"+
    "<td><select name='account' class='form-control m-b' style='margin-bottom: 0;width: 60px'><option>是</option><option>否</option></select> </td>"+
    "<td> <input type='text' class='form-control'></td>"+
    "</tr>"
    );
  });

</script>
</body>
</html>
