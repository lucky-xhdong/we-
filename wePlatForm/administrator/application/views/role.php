<!DOCTYPE html>
<html lang="en" class="">
<!-- 创建公司学校 -->
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('jsgrid'); ?>
  <?php $this->load->view('tmpl/mmgrid');?>
  <?php $this->load->view('meta');?>
  <?php $this->load->view('tmpl/jqueryvalidate'); ?>
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
      <div class="bg-light lter b-b wrapper-md" style="height: auto">
        <div class="col-md-8">
          <p>
            <a href="<?=anchorurl('role')?>">角色权限管理</a>
          </p>
        </div>
        <div class="col-md-4">
          <a href="javascript:;" class="btn btn-success role-icon pull-right" id="addRole">
            新增角色
          </a>
          <a href="javascript:;" data-toggle="modal" data-target=".update-icon-box" class="btn btn-primary pull-right" >
            权限管理
          </a>
        </div>
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
                  <input type="text" class="form-control input-type-name rounded" placeholder="输入姓名" id="searchName" >
                  <a class="fa fa-search pos" ></a>
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <div class="table-con">
              <div id="rolesList"></div>
              <div id="rolespaginator"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /content -->

  <!-- footer -->
  <?php $this->load->view('tmpl/foot')?>
  <!-- / footer -->

<!--创建角色、查看、修改 开始-->
  <div class="modal fade role-alert" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <?php echo form_open('role/addRole', 'class="form login-form" id="role-form"'); ?>
        <div class="modal-body">
          <h4 class="modal-title">新增/修改角色</h4>
          <div class="role-handle minH-200">
<!--            角色名称 开始-->
            <div class="role-name col-md-12">
              <div class="col-md-2">角色名称:</div>
              <div class="col-md-10">
<!--                <p class="type-hide">年级监管员</p>-->
                <label for=""><input type="text" name="name" id="roleName" placeholder="如：管理员" required></label>
              </div>
            </div>
            <div class="col-md-12">
              <div>角色选择权限:</div>
              <div class="updated-list" id="permissionAuthList">
              </div>
              <div id="paginatorAuthPermission"></div>
            </div>
<!--            角色名称 结束-->
            <!--学习数据 开始-->
<!--            --><?php //foreach($permissions as $permission):?>
            <!--            <div class="role-data role-check-nor col-md-12">-->
            <!--              <label for="" class="role-nor-label"><input type="checkbox">--><?//=$permission->name?><!--</label>-->
            <!--              <div>-->
            <!--                --><?php //foreach($permission->chlid as $child):?>
            <!--                <div class="col-md-12">-->
            <!--                  <div class="col-md-2">--><?//=$child->name?><!--：</div>-->
            <!--                  <div class="col-md-10">-->
            <!--                    --><?php //foreach($child->child as $item):?>
            <!--                      <label for="" class="col-md-2"><input type="checkbox" name="permissios_id[]" value="--><?//=$item->id?><!--">--><?//=$item->name?><!--</label>-->
            <!--                    --><?php //endforeach;?>
            <!--                  </div>-->
            <!--                </div>-->
            <!--                --><?php //endforeach;?>
            <!--              </div>-->
            <!--            </div>-->
            <!--            --><?php //endforeach;?>
            <!--学习数据 结束-->
          </div>
        </div>
        <div class="modal-footer text-center">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-success" id="submitRole">保存</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>

<!--创建角色、查看、修改 结束-->

  <div class="modal fade" role="dialog" id="setViewRole">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <?php echo form_open('role/addRole', 'class="form login-form" id="role-update-form"'); ?>
        <div class="modal-body" id="Rolebody">

        </div>
        <div class="modal-footer text-center" id="updateButton">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-success" id="submitUpdateRole">保存</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <!--创建角色、查看、修改 结束-->
</div>
<div class="modal fade update-icon-box"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:800px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;
        </button>

      </div>
      <div class="modal-body">
        <h4 class="modal-title" id="myModalLabel">
          权限列表
        </h4>
        <div class="update-body">
          <div class="clear" id="formEntity">
            <div class="class-list" data-type="名称:" style="padding:5px 70px 10px 60px !important;">
              <input name="name" id="permission_name" class="form-control" value="" type="text" style="width: 50% !important;">
            </div>

            <div class="class-list" data-type="地址:" style="padding:5px 70px 10px 60px !important;">
              <input name="url" id="permission_url" class="form-control" value="" type="text" style="width: 50% !important;">
            </div>

            <div class="class-list" data-type="权限所属平台:" >
              <select name="category" id="category" required>
                    <option value="0" selected>工作平台</option>
                    <option value="1">管理后台</option>
              </select>
            </div>



            <div class="class-list" data-type="操作:" style="padding:5px 70px 10px 60px !important;">
              <div class="class-list-span" id="operaiont-list-span">
                  <span style="border: none">
                    <button class="btn btn-success" id="savePermission">保存</button>
                  </span>
              </div>
            </div>
          </div>
          <div class="updated-list" id="permissionList">
          </div>
          <div id="paginatorPermission"></div>
        </div>
      </div>
      <div class="modal-footer mg-5">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭
        </button>
        <button type="button" class="btn btn-success" id="savepermission">
          保存
        </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal -->
</div>

<script src="<?=base_url()?>media/administrator/js/bootbox.min.js"></script>
<script src="<?=base_url()?>media/administrator/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url()?>media/administrator/js/permission.js"></script>
<script src="<?=base_url()?>media/administrator/js/permissionauth.js"></script>
<script src="<?=base_url()?>media/administrator/js/roles.js"></script>

<script>
  var permission_id = 0;
  var role_id = 0;
  var role = null;
  $(function() {




    $('.update-icon-box').on('shown.bs.modal', function () {
      if(mmg == null)    getPermissionList();
      else mmg.load();

    });

    $('.role-alert').on('shown.bs.modal', function () {
      if(mmgAuth == null) getPermissionAuthList();
      else mmgAuth.load();
    });

    $('.role-alert').on('hide.bs.modal', function () {
       role = null;
       role_id = 0;
      $("#roleName").val('');
    });

    $("#savePermission").click(function(){
      if($("#permission_name").val().replace(/\s+/g,"") != "" && $("#permission_url").val().replace(/\s+/g,"") != ""){
      $.ajax({
        type: "POST",
        async: false,
        url: '<?=anchorurl('role/addPermission')?>',
        data: {
          permission_id: permission_id,
          name:$("#permission_name").val(),
          url:$("#permission_url").val(),
          category:$("#category").val(),
        },
        success: function (msg) {
          retisterLimitTip("保存成功");
          $("#permission_name").val('');
          $("#permission_url").val('');
          $("#category").val(0);
          permission_id = 0;
          mmg.load();
        }
      });
      }else{
    retisterLimitTip("请输入正确的内容!");
  }
    });



    $("#submitUpdateRole").click(function(){
      if( $("#role-update-form").valid()) {
        $("#role-update-form").showLoading();
        $("#role-update-form").ajaxForm({
          dataType: 'json',
          success: function (data) {
            console.log(data);
            $("#role-update-form").hideLoading();
            if (data.errcode == 0) {
             // $("#role-update-form")[0].reset();
              retisterLimitTip("更新成功");
              $("#jsGrid").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
              });
//              $("#jsGrid1").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
//              });
              $('#setViewRole').modal('hide');
            }
          }
        }).submit();
      }
    });

    $("#submitRole").click(function(){
      if( $("#role-form").valid()) {
        if($("#roleName").val().replace(/\s+/g,"") != ""){
          var selectedRows =  mmgAuth.selectedRows();
          var index_array = new Array();
          for (var i = 0; i < selectedRows.length; i++) {
            index_array.push(selectedRows[i].id);
          }
          $.ajax({
            type: "POST",
            async: false,
            url: '<?=anchorurl('role/addRole')?>',
            data: {
              role_id: role_id,
              name:$("#roleName").val(),
              permissions:JSON.stringify(index_array)
            },
            success: function (msg) {
              retisterLimitTip("保存成功");
              $("#roleName").val('');
              role_id = 0;
              roles.load();
              $('.role-alert').modal('hide');
            }
          });
        }else{
          retisterLimitTip("请输入角色名称!");
        }
      }
    });

    $("body").undelegate('span[class="role-change"]', 'click').delegate('span[class="role-change"]', 'click', function () {
      $("#updateButton").show();
      $('#setViewRole').modal('show');
      var id = $(this).data('id');
      $.ajax({
        type: "GET",
        url: '<?=anchorurl('role/getRoleInfo')?>/'+id+'/'+0,
        beforeSend:function(){
          $("#role-update-form").showLoading();
        },
        success: function (data){
          $("#Rolebody").html(data);
          $("#role-update-form").hideLoading();
        }
      });
    });

    $("body").undelegate('span[class="role-del"]', 'click').delegate('span[class="role-del"]', 'click', function () {
      var id = $(this).data('id');
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
                url: '<?=anchorurl('role/DeleteRole')?>',
                data: {
                  id: id
                },
                success: function (msg) {
                  retisterLimitTip("设置成功");
                  $("#jsGrid").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
                  });
                }
              });
            }
          }
        }
      });
    });

    $("body").undelegate('span[class="role-check"]', 'click').delegate('span[class="role-check"]', 'click', function () {
      $("#updateButton").hide();
       $('#setViewRole').modal('show');
        var id = $(this).data('id');
        $.ajax({
          type: "GET",
          url: '<?=anchorurl('role/getRoleInfo')?>/'+id+'/'+1,
          beforeSend:function(){
            $("#role-update-form").showLoading();
          },
          success: function (data){
            $("#Rolebody").html(data);
            $("#role-update-form").hideLoading();
          }
        });
    });

    $(document).keypress(function(e) {
      // 回车键事件
      if(e.which == 13) {
        $("#jsGrid").jsGrid("loadData", { key: $("#searchName").val() }).done(function() {

        });
      }
    });


    $("#jsGrid").jsGrid({
      height: "auto",
      width: "100%",
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
            type: "POST",
            url: "<?=anchorurl('role/getRolesList')?>",
            dataType:"json",
            data: filter
          });
        },
      },
      fields: [
        {name:"name",title: "名称", type: "text", width:100 ,align: "center"},
        { name:"operations",title: "操作", type: "text", width: 100 ,align: "center"}
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
