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


      <div class="bg-light lter b-b wrapper-md">
        <a href="<?=site_url('AccountManage/creatClass')?>" class="btn btn-success ">
        添加学生
        </a>
        <a href="#" class="btn btn-info">
        导出账号
        </a>
        <a href="#" class="btn btn-danger" style="float: right">
          删除班级
        </a>
      </div>
      <div class="wrapper-md">
        <div class="panel panel-default">
        <div class="panel-heading">
          <ol class="breadcrumb">
            <li>
              <a href="index.php">山南省</a>
            </li>
            <li>
              <a>山南市</a>
            </li>
            <li>
              <a>灵光县</a>
            </li>
            <li>
              <a>三中</a>
            </li>
            <li>
              <a>13级</a>
            </li>
            <li>
              <strong>三班</strong>
            </li>
          </ol>
        </div>
        <div class="row wrapper">
          <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
              <option value="0">Bulk action</option>
              <option value="1">Delete selected</option>
              <option value="2">Bulk edit</option>
              <option value="3">Export</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
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
              <th>学生名称</th>
              <th>是否开通家装</th>
              <th>开始时间</th>
              <th>到期时间</th>
              <th>授权课程数量</th>
              <th>账号</th>
              <th>联系电话</th>
              <th style="width:30px;"></th>
            </tr>
            </thead>
            <tbody>
            <tr onmouseover="over(this)" onmouseout="out(this)">
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>奥巴马1 <i class="glyphicon glyphicon-edit icon text-info-lter" id="icon"></i> <i class="glyphicon icon-action-undo icon text-info-lter"></i></td>
              <td><span class="text-ellipsis">是</span></td>
              <td><span class="text-ellipsis">16.10.12</span></td>
              <td>17.10.12 <i class="glyphicon icon-eye icon text-info-lter"></i></td>

              <td><span class="text-ellipsis">3 <i class="glyphicon icon-eye icon text-info-lter"></i></span> </td>
              <td><span class="text-ellipsis">aobama <i class="glyphicon icon-pointer icon text-info-lter"></i></span> </td>
              <td><span class="text-ellipsis">18895623226</span></td>
              <td>
                <a href class="active" ui-toggle-class><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr >
            <tr onmouseover="over(this)" onmouseout="out(this)">
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>奥巴马1 <i class="glyphicon glyphicon-edit icon text-info-lter" id="icon"></i> <i class="glyphicon icon-action-undo icon text-info-lter"></i></td>
              <td><span class="text-ellipsis">是</span></td>
              <td><span class="text-ellipsis">16.10.12</span></td>
              <td>17.10.12 <i class="glyphicon icon-eye icon text-info-lter"></i></td>

              <td><span class="text-ellipsis">3 <i class="glyphicon icon-eye icon text-info-lter"></i></span> </td>
              <td><span class="text-ellipsis">aobama <i class="glyphicon icon-pointer icon text-info-lter"></i></span> </td>
              <td><span class="text-ellipsis">18895623226</span></td>
              <td>
                <a href class="active" ui-toggle-class><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr >
            <tr onmouseover="over(this)" onmouseout="out(this)">
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>奥巴马1 <i class="glyphicon glyphicon-edit icon text-info-lter" id="icon"></i> <i class="glyphicon icon-action-undo icon text-info-lter"></i></td>
              <td><span class="text-ellipsis">是</span></td>
              <td><span class="text-ellipsis">16.10.12</span></td>
              <td>17.10.12 <i class="glyphicon icon-eye icon text-info-lter"></i></td>

              <td><span class="text-ellipsis">3 <i class="glyphicon icon-eye icon text-info-lter"></i></span> </td>
              <td><span class="text-ellipsis">aobama <i class="glyphicon icon-pointer icon text-info-lter"></i></span> </td>
              <td><span class="text-ellipsis">18895623226</span></td>
              <td>
                <a href class="active" ui-toggle-class><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
              </td>
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
              <!--<button class="btn btn-sm btn-default">Apply</button>-->
            </div>
            <div class="col-sm-4 text-center">
              <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
            </div>
            <div class="col-sm-4 text-right text-center-xs">
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

<?php $this->load->view('javaScript'); ?>
</body>
</html>
