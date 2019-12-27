<!DOCTYPE html>
<html lang="en" class="">
<!-- 创建公司学校 -->
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('jsgrid'); ?>
  <?php $this->load->view('meta'); ?>
  <link rel="stylesheet" href="<?=base_url()?>media/administrator/css/bootstrap-datepicker.min.css" type="text/css" />

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
        <a href="javascript:;" class="btn btn-success role-icon">
        新增角色
        </a>
      </div>
      <div class="wrapper-md">
        <div class="panel panel-default">
          <div class="wrap-tit">
            <div class="row ">
              <div class="col-sm-5 ">
                <p class="">角色列表</p>
              </div>
              <div class="col-sm-4">
              </div>
              <div class="col-sm-3">
                <div class="input-group"  style="float: right;">
                  <input type="text" class="form-control input-type-name rounded" placeholder="输入姓名" >
                  <a class="fa fa-search pos" ></a>
                </div>
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
  <!-- /content -->
  
  <!-- footer -->
  <footer id="footer" class="app-footer" role="footer">
    <div class="wrapper b-t bg-light">
      <span class="pull-right">2.2.0 <a href ui-scroll="app" class="m-l-sm text-muted"><i class="fa fa-long-arrow-up"></i></a></span>
      &copy; 2016 Copyright.
    </div>
  </footer>
  <!-- / footer -->

<!--创建角色、查看、修改 开始-->
  <div class="modal fade role-alert" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
          <h4 class="modal-title">新增/修改角色</h4>
          <div class="role-handle minH-200">
<!--            角色名称 开始-->
            <div class="role-name col-md-12">
              <div class="col-md-2">角色名称</div>
              <div class="col-md-10">
                <p class="type-hide">年级监管员</p>
                <label for=""><input type="text" placeholder="如：管理员"></label>
              </div>
            </div>
<!--            角色名称 结束-->
            <!--学习数据 开始-->
            <div class="role-data role-check-nor col-md-12">
              <label for="" class="role-nor-label"><input type="checkbox">学习数据</label>
              <div>
                <div class="col-md-12">
                  <div class="col-md-2">基本数据：</div>
                  <div class="col-md-10">
                    <label for="" class="col-md-2"><input type="checkbox">查看</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="col-md-2">学习方法：</div>
                  <div class="col-md-10">
                    <label for="" class="col-md-2"><input type="checkbox">查看</label>
                    <label for="" class="col-md-2"><input type="checkbox">修改</label>
                    <label for="" class="col-md-2"><input type="checkbox">删除</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="col-md-2">课程设置：</div>
                  <div class="col-md-10">
                    <label for="" class="col-md-2"><input type="checkbox">查看</label>
                    <label for="" class="col-md-2"><input type="checkbox">修改</label>
                    <label for="" class="col-md-2"><input type="checkbox">删除</label>
                  </div>
                </div>
              </div>
            </div>
            <!--学习数据 结束-->
            <!--账号设置 开始-->
            <div class="role-setting role-check-nor col-md-12">
              <label for="" class="role-nor-label"><input type="checkbox">账号设置</label>
              <div>
                <div class="col-md-12">
                  <div class="col-md-2 text-center">群主：</div>
                  <div class="col-md-10">
                    <label for="" class="col-md-2"><input type="checkbox">查看</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="col-md-2 text-center">成员：</div>
                  <div class="col-md-10">
                    <label for="" class="col-md-2"><input type="checkbox">查看</label>
                    <label for="" class="col-md-2"><input type="checkbox">修改</label>
                    <label for="" class="col-md-2"><input type="checkbox">删除</label>
                  </div>
                </div>
                <div class="col-md-12 ">
                  <div class="col-md-2 text-center">续费：</div>
                  <div class="col-md-10">
                    <label for="" class="col-md-2"><input type="checkbox">查看</label>
                    <label for="" class="col-md-2"><input type="checkbox">修改</label>
                    <label for="" class="col-md-2"><input type="checkbox">删除</label>
                  </div>
                </div>
              </div>
            </div>
            <!--账号设置 结束-->
          </div>
        </div>
        <div class="modal-footer text-center">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-success">保存</button>
        </div>

      </div>
    </div>
  </div>

<!--创建角色、查看、修改 结束-->
</div>

<script src="<?=base_url()?>media/administrator/js/bootstrap-datepicker.js"></script>
<script>
  $(function() {

    $("#jsGrid").jsGrid({
      height: "auto",
      width: "100%",
      confirmDeleting: false,
      paging: true,
      autoload: true,
      pageSize: 2,
      pageButtonCount: 5,
      controller: {
        loadData: function() {
          return [
            {
              "名称": "最高管理员",
              "操作":"<div class='handle-icon'><span class='role-change'>修改</span><span class='role-del'>删除</span><span class='role-check'>查看</span></div>"
            },
            {
              "名称": "公司财务",
              "操作":"<div class='handle-icon'><span class='role-change'>修改</span><span class='role-del'>删除</span><span class='role-check'>查看</span></div>"
            },
            {
              "名称": "最高管理员",
              "操作":"<div class='handle-icon'><span class='role-change'>修改</span><span class='role-del'>删除</span><span class='role-check'>查看</span></div>"
            }
          ]
        }
      },
      fields: [
        { name: "名称", type: "text", width:100 ,align: "center"},
        { name: "操作", type: "text", width: 100 ,align: "center"}
      ]


    });


    $('.role-icon').click(function(){
      $('.role-alert').modal('show');
    });

    $('.change-btn,.btn-cancel').click(function(){
      var oParents = $(this).closest('div.modal'),
          _this = $(this).attr('data-type');
      oPFun(oParents,_this);
    });
    function oPFun(config,_this){
     var  oHide = config.find('.type-hide'),
          oShow = config.find('.type-show');
     if( _this == 'show'){
        oShow.fadeOut();
        oHide.fadeIn();
     }else if(_this =='hide'){
       oShow.fadeIn();
       oHide.fadeOut();
     }
    }
    $('.source-sel span').click(function(){
      var oClass = $(this).attr('class');
      if(oClass == 'on'){
        $(this).removeClass('on');
      }else{
        $(this).addClass('on');
      }
    });


  });
</script>
</body>
</html>
