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
            <a href="<?=anchorurl('platform_account')?>">平台账户</a>
<!--            <span>&nbsp;&gt;&nbsp;--><?//=$school->name?>
<!--            </span>-->
          </p>
        </div>
        <div class="col-md-4">
          <a href="javascript:;" class="btn btn-success new-icon new-student pull-right" id="add-new-student">
            添加账户
          </a>
        </div>


<!--        <a href="" class="btn btn-success bacth-icon" data-toggle="modal" data-target=".bacth-icon-box" >-->
<!--          批量添加-->
<!--        </a>-->
<!--        <a href="javascript:;" class="btn btn-info export-icon"  >-->
<!--          导出账号-->
<!--        </a>-->
<!--        <a href="#" class="btn btn-info user-info-icon" id="user-info-edit">-->
<!--          基本资料-->
<!--        </a>-->
<!--        <a href="#" class="btn btn-warning give-time-icon" id="give-time-school">-->
<!--          授权时间-->
<!--        </a>-->
<!--        <a href="#" class="btn btn-warning give-course-icon" data-toggle="modal" data-target=".give-course-icon-box" >-->
<!--          授权课程-->
<!--        </a>-->
<!--        <a href="#" class="btn btn-primary diy-icon" id="give-home-school">-->
<!--          设置家装-->
<!--        </a>-->
<!--        <a href="#" class="btn btn-primary root-icon "  data-toggle="modal" data-target=".root-icon-box">-->
<!--          权限管理-->
<!--        </a>-->
<!--        <a href="#" class="btn btn-danger btn-del" style="float:right " id="DeleteUserBlock">-->
<!--          删除-->
<!--        </a>-->
<!--        <a href="#" class="btn btn-danger btn-recover" style="float: right;right;margin-right: 10px;" id="setUserBlock">-->
<!--          停用/恢复-->
<!--        </a>-->
      </div>
      <div class="wrapper-md">
        <div class="panel panel-default">
          <div class="wrap-tit">
            <div class="row ">
<!--              <div class="col-sm-5 ">-->
<!--                <p><a href="--><?//=anchorurl('AccountManage/creatComSchool')?><!--">学校列表</a><span>&nbsp;&gt;&nbsp;--><?//=$school->name?><!--</span></p>-->
<!--              </div>-->
<!--              <div class="col-sm-4">-->
<!--              </div>-->
              <div class="col-sm-12">
                <div class="input-group"  style="float: right;">
                  <input type="text" id="searchName" class="form-control input-type-name rounded" placeholder="输入姓名" >
                  <a class="fa fa-search pos" ></a>
                </div>
              </div>
            </div>
          </div>

          <div class="table-responsive tab-box stu-tea-box">
            <div class="table-con">
              <div class="tab-con stu-tea-con">
                <div class="on">
                  <div id="mmGrid"></div>
                  <div id="paginator"></div>
                </div>
              </div>
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

  <div class="modal fade new-icon-box" role="dialog">
    <div class="modal-dialog">
      <?php echo form_open('register/addPlatFormUser', 'class="form login-form" id="register-form" enctype="multipart/form-data"'); ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
          <!--基本信息 开始-->
          <div class="basic-box">
            <h4 class="modal-title" >基本信息</h4>
            <div class="text-center basic-info pag-15">

              <ul>
                <li class="col-md-12">
                  <span class="col-md-4">用户角色</span>
                  <div class="col-md-8">
                    <select name="rid" id="rid" required>
                      <?php foreach($roles as $role):?>
                          <option value="<?=$role['id']?>"><?=$role['name']?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-4">账号</span>
                  <label for="" class="col-md-8"><input type="text" required id="username" name="username" placeholder="账号" /></label>
                </li>
                <li class="col-md-12">
                  <span class="col-md-4">姓名</span>
                  <label for="" class="col-md-8"><input type="text" required name="name" placeholder="成员姓名" /></label>
                </li>
                <li class="col-md-12">
                  <span class="col-md-4">密码</span>
                  <label for=""class="col-md-8" ><input type="password" required  name="password" id="password" placeholder="密码" /></label>
                </li>
                <li class="col-md-12">
                  <span class="col-md-4">确认密码</span>
                  <label for="" class="col-md-8"><input type="password" name="confirm_password" id="confirm_password" placeholder="确认密码" /></label>
                </li>
              </ul>
              <ul>
                <li class="col-md-12">
                  <span class="col-md-4">手机号</span>
                  <label for="" class="col-md-8"><input type="text" name="mobile" placeholder="手机号" /></label>
                </li>
                <li class="col-md-12">
                  <span class="col-md-4">E-Mail</span>
                  <label for="" class="col-md-8"><input type="text" name="email" placeholder="E-Mail" /></label>
                </li>
                <li class="col-md-12">
                  <span class="col-md-4">头像</span>
                  <label for="" class="col-md-8 upload-btn">
                    <input type="file" class="img-upload" name="file">
                    <span class="img-upload-btn">上传头像</span>
                  </label>
                </li>
              </ul>
            </div>
          </div>
          <!--授权课程 开始-->
          <div class="give-source-box">
            <h4 class="modal-title">授权课程</h4>
            <div class="source-list">
              <div class="source-unsel-sel">
                <div class="source-unsel" id="courseList" style="width:100% !important;">
                  <?php foreach($courses as $course):?>
                    <span data-id="<?=$course['id']?>"><?=$course['name']?></span>
                  <?php endforeach;?>
                </div>
              </div>
            </div>
          </div>
          <!--授权课程 结束-->
        </div>
        <div class="modal-footer text-center">
          <input type="hidden" name="course_ids" value="" id="course_ids_new">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-success" id="submitregister">完成</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>

  </div>
  <!--基本资料 开始-->
  <div class="modal fade user-info-icon-box modal-nor" data-type = 1  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <?php echo form_open('register/updatePlatFormUser', 'class="form login-form" id="update-user-form" enctype="multipart/form-data"'); ?>
        <div class="modal-body" id="user-info-body">
        </div>
        <div class="modal-footer text-center ">
          <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal" data-type="hide">取消</button>
          <button type="button" class="btn btn-success" id="submitUpdateUser">保存</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>


</div>



<a href="#" class="btn btn-warning give-time-icon" id="give-time-school" style="display: none">
  授权时间
</a>
<a href="#" class="btn btn-info user-info-icon" id="user-info-edit" style="display: none">



<script src="<?=base_url()?>media/administrator/js/bootbox.min.js"></script>


<script>
  var grade_id = 0;
  var class_id = 0;
  var school_id = '<?=$school_id?>';
  var userItem = {id:0};
  var user_type = "all";
  var course_id = 0;
  var courseData = null;
  var unit_id = 0;
  var is_class = false;



  $(function() {


    /*
     *
     * 删除用户
     *
     */

    $("#DeleteUserBlock").click(function(){
      if(userItem == null){
        alert("请选择用户!");
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
                  url: '<?=anchorurl('AccountManage/DeleteUserSchoolRelationShip')?>',
                  data: {
                    userid: userItem.id,
                    school_id: '<?=$school_id?>',
                  },
                  success: function (msg) {
                    retisterLimitTip("设置成功");
                    userItem = null;
                    mmg.load({key: $("#searchName").val()});
//                    $("#jsGrid").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
//                    });
                  }
                });
              }
            }
          }
        });
      }
    });


    $("#user-info-edit").click(function(){
      if(userItem == null){
         alert("请选择用户!");
      }else{
        $('.user-info-icon-box').modal('show');
        $.ajax({
          type: "GET",
          url: '<?=anchorurl('platform_account/getUserInfo')?>/'+userItem.id,
          beforeSend:function(){
            $("#update-user-form").showLoading();
          },
          success: function (data){
            $("#user-info-body").html(data);
            $("#update-user-form").hideLoading();
            updateValidata();
          }
        });
      }
    });

    function updateValidUserForm(){
      $("#update-user-form").validate({
        rules: {
          captcha: {
            required: true,
            minlength: 4,
            maxlength: 4
          },
          email: {
            email: true
          },
          password1: {
            minlength: 6,
            maxlength: 20,
            strongPsw: true
          },
          confirm_password1: {
            minlength: 6,
            maxlength: 20,
            equalTo: "#password1"
          }

        },
        messages: {
          captcha: {
            required: "请输入验证码",
            minlength: $.validator.format("请输入4位验证码"),
            maxlength: $.validator.format("请输入4位验证码")
          },
          email: {
            required: "请填写邮箱",
            email: $.validator.format("请输入正确的邮箱格式")
          },
          password1: {
            required: "请输入密码",
            minlength: $.validator.format("密码不能小于{0}个字符"),
            maxlength: $.validator.format("密码不能大于{0}个字符")

          },
          confirm_password1: {
            required: "请输入确认密码",
            minlength: $.validator.format("确认密码不能小于8个字符"),
            maxlength: $.validator.format("确认密码不能大于16个字符"),
            equalTo: "两次输入密码不一致不一致"
          }
        }
      });
    }

    function updateValidata() {
      updateValidUserForm();
      $("#submitUpdateUser").unbind('click').click(function () {
        if( $("#update-user-form").valid()){
          $("#update-user-form").showLoading();
          $("#update-user-form").ajaxForm({
            dataType: 'json',
            success: function (data) {
              console.log(data);
              $("#update-user-form").hideLoading();
              if (data.errcode == 0) {
                //$("#update-user-form")[0].reset();
                retisterLimitTip("更新成功");
                mmg.load({key: $("#searchName").val()});
               // $("#jsGrid").jsGrid("loadData", { key: $("#searchName").val() }).done(function() {});
                //$("#jsGrid1").jsGrid("loadData", { key: $("#searchName").val() }).done(function() {});
                $('.user-info-icon-box').modal('hide');
              }
            }
          }).submit();
        }
      });
    }


    $("#add-new-student").click(function(){
       $('.new-icon-box').modal('show');

       registerValidata();
    });

      function passwordLevel(password) {
        var Modes = 0;
        for (var i = 0; i < password.length; i++) {
          Modes |= CharMode(password.charCodeAt(i));
        }
        return bitTotal(Modes);

        //CharMode函数
        function CharMode(iN) {
          if (iN >= 48 && iN <= 57)//数字
            return 1;
          if (iN >= 65 && iN <= 90) //大写字母
            return 2;
          if ((iN >= 97 && iN <= 122) || (iN >= 65 && iN <= 90)) //大小写
            return 4;
          else
            return 8; //特殊字符
        }

        //bitTotal函数
        function bitTotal(num) {
          modes = 0;
          for (i = 0; i < 4; i++) {
            if (num & 1) modes++;
            num >>>= 1;
          }
          return modes;
        }
      };

      jQuery.validator.addMethod("verfiYuser", function (value, element) {
        var return1 =false;
        $.ajax({
          type: "POST",
          async:false,
          url: '<?=anchorurl('register/verifyUser')?>',
          data: {
            username:$("#username").val()
          },
          success: function (msg){
            if(msg == 'false'){
              return1 = false;
            }else{
              return1 = true;
            }
          }
        });
        return return1;
      }, "账号已经被注册");
      jQuery.validator.addMethod("strongPsw", function (value, element) {
        if (passwordLevel(value) == 1) {
          return false;
        }
        return true
      }, "字母、数字、字符至少包含两种");


    function registerValidata(){
      $("#submitregister").unbind('click').click(function(){
        if( $("#register-form").valid()){
          $("#register-form").showLoading();
          $("#register-form").ajaxForm({
            dataType: 'json',
            success: function (data) {
              console.log(data);
              $("#register-form").hideLoading();
              if(data.errcode == 0){
                $("#register-form")[0].reset();
                retisterLimitTip("注册成功");
                mmg.load({key: $("#searchName").val()});
//                $("#jsGrid").jsGrid("loadData", { key: $("#searchName").val() }).done(function() {});
//                $("#jsGrid1").jsGrid("loadData", { key: $("#searchName").val() }).done(function() {});
                $('.new-icon-box').modal('hide');
              }
            }
          }).submit();
        }
      });
      $("#register-form").validate({
        rules: {
          username: {
            required: true,
            verfiYuser:true
          },
          captcha: {
            required: true,
            minlength: 4,
            maxlength: 4
          },
          email: {
            email: true

          },
          password: {
            required: true,
            minlength: 6,
            maxlength: 20,
            strongPsw: true
          },
          confirm_password: {
            required: true,
            minlength: 6,
            maxlength: 20,
            equalTo: "#password"
          }

        },
        messages: {
          username: {
            required: "请填写用户名",
            verfiYuser:$.validator.format("用户名已被注册!")
          },
          captcha: {
            required: "请输入验证码",
            minlength: $.validator.format("请输入4位验证码"),
            maxlength: $.validator.format("请输入4位验证码")
          },
          email: {
            required: "请填写邮箱",
            email: $.validator.format("请输入正确的邮箱格式")
          },
          password: {
            required: "请输入密码",
            minlength: $.validator.format("密码不能小于{0}个字符"),
            maxlength: $.validator.format("密码不能大于{0}个字符")

          },
          confirm_password: {
            required: "请输入确认密码",
            minlength: $.validator.format("确认密码不能小于8个字符"),
            maxlength: $.validator.format("确认密码不能大于16个字符"),
            equalTo: "两次输入密码不一致不一致"
          }
        }
      });
    }

    /*
    * 搜索用户
    *
    */

    $(document).keypress(function(e) {
      // 回车键事件

      if(e.which == 13) {
        mmg.load({key: $("#searchName").val()});
//        $("#jsGrid").jsGrid("loadData", { key: $("#searchName").val() }).done(function() {
//
//        });
      }
    });

    //添加学生时选择课程
    $("#courseList span").click(function(){
      if($(this).hasClass("on")){
        $(this).removeClass("on");
      }else{
        $(this).addClass("on");
      }
      addnewStudentCourseIds();
    });


    $("#user-info-body").undelegate('#courseListEdit span', 'click').delegate('#courseListEdit span', 'click', function () {
      if($(this).hasClass("on")){
        $(this).removeClass("on");
      }else{
        $(this).addClass("on");
      }
      addEditStudentCourseIds();
    });

    function addEditStudentCourseIds(){
      var course_id_array = new Array();
      $("#user-info-body #courseListEdit span").each(function(index,element){
        if($(element).hasClass("on")){
          course_id_array.push($(element).data("id"));
        }
      });
      if(course_id_array.length >0){
        $("#course_ids_edit").val(course_id_array.join(","));
      }else{
        $("#course_ids_edit").val("");
      }
    }

    function addnewStudentCourseIds(){
      var course_id_array = new Array();
      $("#courseList span").each(function(index,element){
        if($(element).hasClass("on")){
          course_id_array.push($(element).data("id"));
        }
      });
      if(course_id_array.length >0){
        $("#course_ids_new").val(course_id_array.join(","));
      }else{
        $("#course_ids_new").val("");
      }
    }


  });
</script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/platform_users.js"></script>
</body>
</html>