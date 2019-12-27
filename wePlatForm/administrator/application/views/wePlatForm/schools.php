<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php $this->load->view('wePlatForm/tmpl/title'); ?>
    <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
    <?php $this->load->view('wePlatForm/meta'); ?>
    <?php $this->load->view('tmpl/mmgrid'); ?>
    <?php $this->load->view('tmpl/fileupload');?>
    <?php $this->load->view('tmpl/jqueryvalidate');?>
</head>
<body>
<div class="container-fluid RegionalArchives">
    <div class="row">
        <!-- 左侧菜单 start -->
        <?= $this->load->view("wePlatForm/tmpl/leftmenu") ?>
        <!-- 左侧菜单 end -->
        <div class="col-md-9 ra--main-wrapper">
            <!--菜单切换 start-->
            <?= $this->load->view("wePlatForm/tmpl/headernav") ?>
            <!--菜单切换 end-->
            <!--面包屑 start-->
            <nav class="common-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:;" aria-current="page">学校列表</a></li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="ra--main__content" data-before="学校列表1">
                <div class="form-row">
                    <div class="col-3 form-row__item" data-before="选择省份：">
                        <select class="form-control form-control-sm" name="province_id" id="province_new1">
                            <option value="0">--选择省份--</option>
                            <?php foreach ($provinces as $province): ?>
                                <option value="<?= $province->province_id ?>"><?= $province->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-3 form-row__item" data-before="选择城市：">
                        <select class="form-control form-control-sm" name="city_id" id="city_new1">
                            <option value="0">--选择城市--</option>
                            <?php foreach ($citys as $city): ?>
                                <option value="<?= $city->city_id ?>"><?= $city->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-3 form-row__item" data-before="选择地区：">
                        <select class="form-control form-control-sm" name="district_id" id="district_new1">
                            <option value="0">--选择地区--</option>
                            <?php foreach ($districts as $district): ?>
                                <option value="<?= $district->district_id ?>"><?= $district->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-3 form-row__item form-row__search" data-before="搜索：">
                        <input type="text" class="form-control form-control-sm" placeholder="请输入内容" id="searchName">
                        <button type="button" class="btn btn-light btn-search" id="search">
                            <i class="icon-search"></i>
                        </button>
                    </div>
                </div>
                <div class="btn-group-end">
                    <a href="javascript:;"  data-toggle="modal" data-target="#user_modal" class="btn btn-outline-primary btn-sm">
                        新建学校
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
<div class="modal fade commonModal" id="import_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">学校账户导入</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="form-group">
                <div class="modal-body" id="importBody">

                    <div class="_input-group">
                        <div class="form-row" data-before="导入老师：">
                            <div class="form-group col-md-8">
                                <input type="file" id="teacherfiles" name="teacherfiles">
                            </div>
                        </div>
                    </div>
                    <div class="_input-group">
                        <div class="form-row" data-before="">
                            <div class="form-group col-md-8">
                                <span id="successTeacher">成功：0</span>&emsp;<span id="failTeacher">失败：0</span>
                            </div>
                        </div>
                    </div>
                    <div class="_input-group">
                        <div class="form-row" data-before="导入学生：">
                            <div class="form-group col-md-8">
                                <input type="file"  id="studentfiles" name="studentfiles">
                            </div>
                        </div>
                    </div>
                    <div class="_input-group">
                        <div class="form-row" data-before="">
                            <div class="form-group col-md-8">
                                <span id="successStudent">成功：0</span>&emsp;<span id="failStudent">失败：0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
                        <!--                    <button type="button" class="btn btn-primary btn-save" id="createSchool">保存</button>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade commonModal" id="user_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">学校新建编辑</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=anchorurl('schools/addSchool')?>" id="user_form" class="form-group needs-validation" novalidate method="post">
                <div class="modal-body" id="userBody">

                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary btn-save" id="addschool">保存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url() ?>media/wePlatForm/js/school.js"></script>
<script type="text/javascript" src="<?= base_url() ?>media/wePlatForm/js/xlsx.full.min.js"></script>
<script>
    var userItem = null;
    $(function () {
        var province_id = 0;
        var city_id = 0;
        var district_id = 0;

        $("#province_new1").change(function () {
            var string = '';
            var _this = $(this);
            province_id = $(this).val();
            $.ajax({
                url: "<?=anchorurl('categorys/getCity')?>/" + $(this).val(),
                type: "get",
                dataType: 'json',
                async: false,
                success: function (data, textstatus) {
                    var string = '';
                    $(data.citys).each(function (index, element) {
                        string += '<option value="' + element.city_id + '">' + element.name + '</option>';
                    });
                    $("#city_new1").html(string);
                    var districts = "";
                    $(data.districts).each(function (index, element) {
                        districts += '<option value="' + element.district_id + '">' + element.name + '</option>';
                    });
                    $("#district_new1").html(districts);
                }
            });
            getNewData();
        });

        $("#city_new1").change(function () {
            city_id = $(this).val();
            $.ajax({
                url: "<?=anchorurl('categorys/getArea')?>/" + $(this).val(),
                type: "get",
                dataType: 'json',
                async: false,
                success: function (data, textstatus) {
                    var districts = "";
                    $(data).each(function (index, element) {
                        districts += '<option value="' + element.district_id + '">' + element.name + '</option>';
                    });
                    $("#district_new1").html(districts);
                }
            });
            getNewData();
        });

        $("#district_new1").change(function () {
            district_id = $(this).val();
            getNewData();
        });

        function getNewData () {

            mmg.load({
                key: $("#searchName").val(),
                province_id: province_id,
                city_id: city_id,
                district_id: district_id
            });
        }

        $(document).keypress(function (e) {
            // 回车键事件
            if (e.which == 13) {
                getNewData();
            }
        });

        $("#search").click(function(){
            getNewData();
        });


        $('#start_date').datepicker({
            format: 'yyyy-mm-dd',
        });
        $('#end_date').datepicker({
            format: 'yyyy-mm-dd',
        });
        $('.input-daterange').datepicker({
            format: 'yyyy-mm-dd',
        });



        $('#import_modal').on('shown.bs.modal', function () {

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
                    url: "<?=anchorurl('schools/getSchoolInfo')?>/"+userItem.id,
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
        $('#user_modal').on('hide.bs.modal', function () {
            userItem = null;
        });

        function updateValidata() {
            $("#addschool").unbind('click').click(function () {
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

        $('#import_modal').on('shown.bs.modal', function () {
            $("#successTeacher").html("成功：0");
            $("#failTeacher").html("失败：0");

            $("#successStudent").html("成功：0");
            $("#failStudent").html("失败：0");
        });


        function handleFile(e) {
            var files = e.target.files;
            var i, f;

            var success = 0;
            var fail = 0;

            for (i = 0, f = files[i]; i != files.length; ++i) {
                var reader = new FileReader();
                var name = f.name;
                reader.onload = function(e) {
                    var data = e.target.result;

                    var workbook = XLSX.read(data, {type: 'binary'});
                    var result = {};
                    workbook.SheetNames.forEach(function(sheetName) {
                        var roa = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName], {header:1});
                        if(roa.length){
                            result[sheetName] = roa;
                        }
                        for(var i=1;i<roa.length;i++){
                            //这里向后台发ajax注册账户.
                            if( userItem != null && roa[i].length > 0){
                                $.ajax({
                                    url: "<?=anchorurl('users/schoolRegister')?>",
                                    type: "POST",
                                    data:{
                                        value:JSON.stringify(roa[i]),
                                        school_id:userItem.id,
                                        user_type:"teacher"
                                    },
                                    dataType: 'json',
                                    async: false,
                                    success: function (data, textstatus) {
                                        if(data.errcode == 0){
                                            success ++;
                                        }else{
                                            fail ++;
                                        }
                                        $("#successTeacher").html("成功："+success);
                                        $("#failTeacher").html("失败："+fail);
                                    }
                                });
                            }
                        }
                    });

                    /* DO SOMETHING WITH workbook HERE */
                };
                reader.readAsBinaryString(f);
            }
        }

        function handleFileStudent(e) {
            var files = e.target.files;
            var i, f;

            var success = 0;
            var fail = 0;

            for (i = 0, f = files[i]; i != files.length; ++i) {
                var reader = new FileReader();
                var name = f.name;
                reader.onload = function(e) {
                    var data = e.target.result;

                    var workbook = XLSX.read(data, {type: 'binary'});
                    var result = {};
                    workbook.SheetNames.forEach(function(sheetName) {
                        var roa = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName], {header:1});
                        if(roa.length){
                            result[sheetName] = roa;
                        }
                        for(var i=1;i<roa.length;i++){
                            //这里向后台发ajax注册账户.
                            if( userItem != null && roa[i].length > 0){
                                $.ajax({
                                    url: "<?=anchorurl('users/schoolRegister')?>",
                                    type: "POST",
                                    data:{
                                        value:JSON.stringify(roa[i]),
                                        school_id:userItem.id,
                                        user_type:"student"
                                    },
                                    dataType: 'json',
                                    async: false,
                                    success: function (data, textstatus) {
                                        if(data.errcode == 0){
                                            success ++;
                                        }else{
                                            fail ++;
                                        }
                                        $("#successStudent").html("成功："+success);
                                        $("#failStudent").html("失败："+fail);
                                    }
                                });
                            }
                        }
                    });

                    /* DO SOMETHING WITH workbook HERE */
                };
                reader.readAsBinaryString(f);
            }
        }

        var xlfteacher = document.getElementById('teacherfiles');

        xlfteacher.addEventListener('change', handleFile, false);

        var xlfstudent = document.getElementById('studentfiles');

        xlfstudent.addEventListener('change', handleFileStudent, false);
    });

</script>
</body>
</html>
