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
                    <li class="breadcrumb-item active" aria-current="page">学生列表</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="ra--main__content" data-before="学生列表">
                <div class="form-row">
                    <div class="col-3 form-row__item" data-before="选择年级：">
                        <select class="form-control form-control-sm" name="grade_id" id="grade_filter">
                            <option value="0">--选择年级--</option>
                            <?php foreach ($grades as $grade): ?>
                                <option value="<?= $grade->id ?>"><?= $grade->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-3 form-row__item" data-before="选择班级：">
                        <select class="form-control form-control-sm" name="class_id" id="class_filter">
                            <option value="0">--选择班级--</option>
                            <?php foreach ($classes as $class): ?>
                                <option value="<?= $class->id ?>"><?= $class->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-3 form-row__item form-row__search" data-before="搜索：">
                        <input type="text" class="form-control form-control-sm"  placeholder="学生姓名" id="searchName">
                        <button type="button" class="btn btn-light btn-search" id="searchbtn">
                            <i class="icon-search"></i>
                        </button>
                    </div>
                </div>
                <div class="btn-group-end">
                    <a href="javascript:;"  data-toggle="modal" data-target="#user_modal" class="btn btn-outline-primary btn-sm">
                        新建学生
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
<div class="modal fade commonModal" id="user_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">学生新建编辑</h5>
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
<div class="modal fade commonModal" id="student_check" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">学生基本信息</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="userinfoform" class="form-group needs-validation" novalidate method="post">
                <div class="modal-body" id="userinfobody">

                </div>
            </form>
        </div>
    </div>
</div>
<a href="#" class="btn btn-info setting-icon" id="student_freeze" style="display: none">
    基本设置
</a>
<a href="#" class="btn btn-info setting-icon" id="student_initpassword" style="display: none">
    基本设置
</a>

<script type="text/javascript">
    var userItem = null;
    var grade_id = 0;
    var class_id = 0;
    var province_id = 0;
    var city_id  = 0;
    var district_id = 0;
    var school_id = <?=$school->id?>;
    $(function() {
        function getNewData(){
            mmg.load({key: $("#searchName").val(),grade_id:grade_id,class_id:class_id});
        }
        $("#student_freeze").click(function(){
            if(userItem == null){
                alert("请选择学生!");
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
        $("#student_initpassword").click(function(){
            if(userItem == null){
                alert("请选择学生!");
            }else{
                $.ajax({
                    type: "GET",
                    url: '<?=anchorurl('schools/initAccountPassword')?>/'+userItem.id,
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

        $("#grade_filter").change(function(){
            var string = '';
            var _this = $(this);
            grade_id = $(this).val();
            $.ajax({
                url: "<?=anchorurl('schools/getClasses')?>/"+school_id+'/'+$(this).val(),
                type: "get",
                dataType: 'json',
                async: false,
                success: function (data, textstatus) {
                    var string = '';
                    $(data).each(function(index,element){
                        string += '<option value="'+element.id+'">'+element.name+'</option>';
                    });
                    $("#class_filter").html(string);
                }
            });
            getNewData();
        });

        $("#class_filter").change(function(){
            class_id = $(this).val();
            getNewData();
        });


        $("#province_new1").change(function(){
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
                    $("#city_new1").html(string);
                    var districts = "";
                    $(data.districts).each(function(index,element){
                        districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
                    });
                    $("#district_new1").html(districts);
                }
            });
            getNewData();
        });

        $("#city_new1").change(function(){
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
                    $("#district_new1").html(districts);
                }
            });
            getNewData();
        });

        $("#district_new1").change(function(){
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



        $('.input-daterange').datepicker({});
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
        $('.source-sel span').click(function(){
            var oClass = $(this).attr('class');
            if(oClass == 'on'){
                $(this).removeClass('on');
            }else{
                $(this).addClass('on');
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


        $("#school-info-body").undelegate('#courseListEdit span', 'click').delegate('#courseListEdit span', 'click', function () {
            if($(this).hasClass("on")){
                $(this).removeClass("on");
            }else{
                $(this).addClass("on");
            }
            addEditStudentCourseIds();
        });

        function addEditStudentCourseIds(){
            var course_id_array = new Array();
            $("#school-info-body #courseListEdit span").each(function(index,element){
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

        $('#student_check').on('shown.bs.modal', function () {
            if(userItem == null){
                userItem = {id:0};
            }
            if(userItem == null){
                alert("请选择用户!");
            }else{
                $.ajax({
                    type: "GET",
                    url: '<?=anchorurl('schools/checkUserInfo')?>/'+userItem.id+'/'+school_id,
                    beforeSend:function(){
                        $("#userinfoform").showLoading();
                    },
                    success: function (data){
                        $("#userinfobody").html(data);
                        $("#userinfoform").hideLoading();
                    }
                });
            }
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

        $("body").undelegate('#grade_update_ids', 'change').delegate('#grade_update_ids', 'change', function () {
            var id = $(this).val();
            $.ajax({
                url: "<?=anchorurl('schools/getClass')?>/"+id,
                type: "GET",
                dataType: 'json',
                success: function (data, textstatus) {
                    var string = "";
                    $(data).each(function(index,element){
                        string += '<option value="'+element.id+'">'+element.name+'</option>';
                    });
                    $("#class_update_ids").html(string);
                }
            });
        });
    });
</script>
<script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/school_students.js"></script>
</body>
</html>
