<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php $this->load->view('wePlatForm/tmpl/title'); ?>
  <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
  <?php $this->load->view('wePlatForm/meta'); ?>
  <?php $this->load->view('tmpl/mmgrid');?>
  <?php $this->load->view('tmpl/fileupload');?>
  <?php $this->load->view('tmpl/jqueryvalidate');?>
</head>
<body>
<div class="container-fluid RegionalArchives">
    <div class="row">
        <!-- 左侧菜单 start -->
        <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
        <!-- 左侧菜单 end -->
        <div class="col-md-9 ra--main-wrapper">
            <!--菜单切换 start-->
            <?=$this->load->view("wePlatForm/tmpl/headernav")?>
            <!--菜单切换 end-->
            <!--面包屑 start-->
            <nav class="common-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
                    <li class="breadcrumb-item"><a href="<?=anchorurl("schools")?>">学校列表</a></li>
                    <li class="breadcrumb-item active" aria-current="page">教师列表</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="ra--main__content" data-before="教师列表">
                <div class="form-row">
                    <div class="col-5 form-row__item" data-before="创建时间：">
                        <input type="text" id="startdate" class="form-control form-control-sm" placeholder="开始时间">
                        至
                        <input type="text" id="enddate" class="form-control form-control-sm" placeholder="结束时间">
                    </div>
                    <div class="col-3 form-row__item" data-before="教师姓名：">
                        <input type="text" class="form-control form-control-sm"  placeholder="教师姓名" id="searchName">
                    </div>
                    <div class="col-1">
                        <a href="javascript:;" class="btn btn-outline-primary btn-sm btn-oprate" id="searchbtn">搜索</a>
                    </div>
                </div>
                <div class="btn-group-end">
                    <a href="javascript:;"  data-toggle="modal" data-target="#user_modal" class="btn btn-outline-primary btn-sm">
                        新建教师
                    </a>
                </div>
                <div class="common-table">
                    <div id="mmGrid"></div>
                    <div id="paginator"></div>
                </div>
            </div>
            <!--主体内容 end-->
        </div>
    </div>
</div>
<div class="modal fade commonModal teacher-check-box"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">基本信息</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('materialResources/addResource', 'class="form login-form" id="check-body-form" enctype="multipart/form-data"'); ?>
            <div class="modal-body">
                <div id="teacher-check-body"></div>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade commonModal" id="user_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">教师新建编辑</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=anchorurl('register/addNewUser')?>" id="user_form" class="form-group needs-validation" novalidate method="post">
                <div class="modal-body" id="userBody">

                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary btn-save"    id="saveUser">保存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<a href="#" class="btn btn-info setting-icon" id="teacher_edit" style="display: none">
    基本设置
</a>
<a href="#" class="btn btn-info setting-icon" id="teacher_freeze" style="display: none">
    基本设置
</a>
<script type="text/javascript">
    var userItem = null;

    var province_id = 0;
    var city_id  = 0;
    var district_id = 0;
    var startdate = "";
    var enddate = "";
    var school_id = <?=$school->id?>;
    $(function() {
        function getNewData(){
            mmg.load({key: $("#searchName").val(),startdate:startdate,enddate:enddate});
        }

        $("#teacher_edit").click(function(){
            if(userItem == null){
                alert("请选择教师!");
            }else{
                $('.teacher-check-box').modal('show');
                $.ajax({
                    type: "GET",
                    url: '<?=anchorurl('schools/getTeacherInfo')?>/'+school_id+'/'+userItem.id,
                    beforeSend:function(){
                        $("#check-body-form").showLoading();
                    },
                    success: function (data){
                        $("#teacher-check-body").html(data);
                        $("#check-body-form").hideLoading();
                    }
                });
            }
        });
        $("#teacher_freeze").click(function(){
            if(userItem == null){
                alert("请选择教师!");
            }else{
                $.ajax({
                    type: "GET",
                    url: '<?=anchorurl('schools/freezeAccount')?>/'+userItem.id,
                    beforeSend:function(){
                        $("#mmGrid").showLoading();
                    },
                    success: function (data){
                        $("#mmGrid").hideLoading();
                        getNewData();
                    }
                });
            }
        });
        $("#updateSchool").click(function(){
            $("#region-edit-form").validate();
            if (!$("#region-edit-form").valid()) {
                return;
            }
            $("#region-edit-form").showLoading();
            $("#region-edit-form").ajaxForm({
                dataType: 'json',
                success: function (data) {
                    $("#region-edit-form").hideLoading();
                    $(".setting-icon-box").modal('hide');
                    getNewData();
                }
            }).submit();
        });
        $("#searchbtn").click(function() {

            getNewData();
        });

        $("#timesearch").click(function(){
            startdate = $("#startdate").val();
            enddate = $("#enddate").val();
            getNewData();
        });


        $("#province_filter").change(function(){
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
                    $("#city_filter").html(string);
                    var districts = "";
                    $(data.districts).each(function(index,element){
                        districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
                    });
                    $("#district_filter").html(districts);
                }
            });
            getNewData();
        });

        $("#city_filter").change(function(){
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
                    $("#district_filter").html(districts);
                }
            });
            getNewData();
        });

        $("#district_filter").change(function(){
            district_id = $(this).val();
            getNewData();
        });


        $(document).keypress(function(e) {
            // 回车键事件
            if(e.which == 13) {
                getNewData();
            }
        });

        $("#province_new").change(function(){
            var string = '';
            var _this = $(this);
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
        });

        $("#city_new").change(function(){
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
        });

        $('#user_modal').on('shown.bs.modal', function () {
            if(userItem == null){
                userItem = {id:0};
            }
            if(userItem == null){
                alert("请选择用户!");
            }else{
                $.ajax({
                    type: "GET",
                    url: '<?=anchorurl('schools/getUserInfo')?>/'+userItem.id+'/'+school_id,
                    beforeSend:function(){
                        $("#user_form").showLoading();
                    },
                    success: function (data){
                        $("#userBody").html(data);
                        $("#user_form").hideLoading();
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
            $("#saveUser").unbind('click').click(function () {
                if( $("#user_form").valid()){
                    $("#user_form").showLoading();
                    $("#user_form").ajaxForm({
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            $("#user_form").hideLoading();
                            if (data.errcode == 0) {
                                retisterLimitTip("更新成功");
                                $('#user_modal').modal('hide');

                                mmg.load();
                            }
                        }
                    }).submit();
                }
            });
        }

        $('#user_modal').on('hide.bs.modal', function () {
            userItem = null;
        });

        $("body").undelegate('#province_edit', 'change').delegate('#province_edit', 'change', function () {
            var string = '';
            var _this = $(this);
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
                    $("#city_edit").html(string);
                    var districts = "";
                    $(data.districts).each(function(index,element){
                        districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
                    });
                    $("#district_edit").html(districts);
                }
            });
        });

        $("body").undelegate('#city_edit', 'change').delegate('#city_edit', 'change', function () {
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
                    $("#district_edit").html(districts);
                }
            });
        });



        $("#createRegion").click(function(){
            $("#region-form").validate();
            if (!$("#region-form").valid()) {
                return;
            }
            $("#region-form").showLoading();
            $("#region-form").ajaxForm({
                dataType: 'json',
                success: function (data) {
                    $("#region-form").hideLoading();
                    $(".new-icon-box").modal('hide');
                    mmg.load();
                }
            }).submit();
        });


        $('#startdate').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#enddate').datepicker({
            format: 'yyyy-mm-dd'
        });
//    基本信息修改

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
    });
</script>
<script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/school_teachers.js"></script>
</body>
</html>
