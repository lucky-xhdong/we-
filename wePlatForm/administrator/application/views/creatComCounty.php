<!DOCTYPE html>
<html lang="en" class="">
<!-- 创建公司县 -->
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('meta') ?>
</head>

<body>
<div class="app app-header-fixed ">

    <!-- header -->
  <?php $this->load->view('header') ?>
  <!-- / header -->

    <!-- aside -->
  <?php $this->load->view('aside') ?>
  <!-- / aside -->

  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">

      <div class="wrapper-md">
        <div class="panel panel-default">
        <div class="row wrapper">
          <div class="col-sm-5 m-b-xs">
            <ol class="breadcrumb">
              <li>
                <a>公司</a>
              </li>
              <li>
                <a>西部吧</a>
              </li>
              <li>
                <a>山南省</a>
              </li>
              <li>
                <a>山南市</a>
              </li>
              <li>
                <strong>灵光县</strong>
              </li>
            </ol>
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <div class="input-group"  style="float: right;">
              <input type="text" class="form-control rounded" placeholder="输入姓名" >
              <a class="fa fa-search pos" ></a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>名称</th>
              <th>人数</th>
              <th>开始时间</th>
              <th>到期时间</th>
              <th>授权课程数量</th>
              <th>管理员</th>
              <th>属性</th>
            </tr>
            </thead>
            <tbody>
            <tr >
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>学校 <a class="text-info-lter icon-pencil" href="<?=site_url('AccountManage/creatComSchool')?>"></a> <a class="text-info-lter fa fa-mail-forward"></a></td>
              <td><span class="text-ellipsis">60</span></td>
              <td><span class="text-ellipsis">16.10.12</span></td>
              <td>17.10.12 <a class="text-info-lter icon-eye"></a></td>

              <td><span class="text-ellipsis">3 <a class="text-info-lter icon-eye"></a></span> </td>
              <td><span class="text-ellipsis">球球 <a class="text-info-lter icon-settings"></a></span> </td>
              <td><span class="text-ellipsis">六年制小学 <a class="text-info-lter icon-settings"></a></span> </td>
            </tr >
            </tbody>
          </table>
        </div>
        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-4 hidden-xs">
              <span>每页显示</span>
              <select class="input-sm form-control w-sm inline v-middle" style="width: 70px">
                <option value="0">10</option>
                <option value="1">20</option>
                <option value="2">30</option>
                <option value="3">40</option>
              </select>
              <span>条</span>
            </div>
            <div class="col-sm-4 text-center">
              <ul class="pagination pagination-sm m-t-none m-b-none">
                <li><a href><i class="fa fa-chevron-left"></i></a></li>
                <li><a href>1</a></li>
                <li><a href>2</a></li>
                <li><a href>3</a></li>
                <li><a href>4</a></li>
                <li><a href>5</a></li>
                <li><a href><i class="fa fa-chevron-right"></i></a></li>
              </ul>
            </div>
            <div class="col-sm-4 text-right text-center-xs">
            </div>
          </div>
        </footer>
      </div>
      </div>
    </div>
  </div>
  <!-- /content -->
  
  <!-- footer -->
  <footer id="footer" class="app-footer" role="footer">
    <div class="wrapper b-t bg-light">
      <span class="pull-right">2.2.0 <a href ui-scroll="app" class="m-l-sm text-muted"><i class="fa fa-long-arrow-up"></i></a></span>
      &copy; 2016 Copyright.
    </div>
  </footer>
  <!-- / footer -->

</div>

<?php $this->load->view('javaScript') ?>
</body>
</html>
