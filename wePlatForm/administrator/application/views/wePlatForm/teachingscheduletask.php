<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php $this->load->view('wePlatForm/tmpl/title'); ?>
    <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
    <?php $this->load->view('wePlatForm/meta'); ?>
    <?php $this->load->view('tmpl/mmgrid'); ?>
    <?php $this->load->view('tmpl/jqueryvalidate'); ?>
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
                    <li class="breadcrumb-item"><a href="<?= anchorurl("teachingschedules") ?>">教学进度</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:;" aria-current="page">任务列表</a></li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="ra--main__content" data-before="任务列表">
<!--                <div class="form-row">-->
                    <!--          <div class="col-2 form-row__item">-->
                    <!--            <input type="text" class="form-control form-control-sm" name="name"  placeholder="名称" id="searchName">-->
                    <!--          </div>-->
                    <!--          <div class="col-2 form-row__item">-->
                    <!--            <input type="text" class="form-control form-control-sm" name="name"  placeholder="教师名称" id="searchName">-->
                    <!--          </div>-->
                    <!--          <div class="col-2 form-row__item">-->
                    <!--            <input type="text" class="form-control form-control-sm" name="name"  placeholder="发布时间" id="searchName">-->
                    <!--          </div>-->
                    <!--          <div class="col-2 form-row__item form-row__search">-->
                    <!--            <input type="text" class="form-control form-control-sm"  placeholder="请输入内容" id="searchName">-->
                    <!--            <button type="button" class="btn btn-light btn-search">-->
                    <!--              <i class="icon-search"></i>-->
                    <!--            </button>-->
                    <!--          </div>-->
                    <!--          <div class="col-2 form-row__item ">-->
<!--                </div>-->
                <div class="btn-group-end">
                    <a href="javascript:;" class="btn btn-outline-primary btn-sm btn-add" data-toggle="modal"
                       data-target="#materia_resources_modal">
                        创建任务
                    </a>
                </div>
                <div class="common-table">
                    <div id="mmGrid"></div>
                    <div id="paginator"></div>
                </div>
            </div>
        </div>
        <!--主体内容 end-->
    </div>
</div>

<div class="modal fade commonModal new-icon-box" id="materia_resources_modal" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">创建任务</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('teachingscheduletasks/addteachingscheduletask', 'class="form form-group" id="resource-form" enctype="multipart/form-data"'); ?>
            <div class="modal-body">
                <div class="_input-group">
                    <div class="form-row" data-before="任务名称：">
                        <div class="form-group col-md-8">
                            <input class="form-control form-control-sm" name="name" type="text" placeholder="任务名称"
                                   required>
                        </div>
                    </div>
                </div>

                <div class="_input-group _input-date-group">
                    <div class="form-row" data-before="任务截止日期：">
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control form-control-sm datepicker" placeholder="任务截止日期"
                                   name="end_date">
                        </div>
                    </div>
                </div>

                <div class="_input-group">
                    <div class="form-row" data-before="任务描述：">
                        <div class="form-group col-md-8">
                            <textarea type="text" rows="3" name="description" placeholder="任务描述"
                                      class="form-control form-control-sm"></textarea>
                        </div>
                    </div>
                </div>
                <div class="radio-group">
                    <div class="form-row" data-before="是否采集素材：">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input value="0" id="useTeaching" name="is_allowed_upload_material" class="custom-control-input" checked=""
                                   type="radio">
                            <label class="custom-control-label" for="useTeaching">是</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input value="1" id="unUseTeaching" name="is_allowed_upload_material" class="custom-control-input"
                                   type="radio">
                            <label class="custom-control-label" for="unUseTeaching">否</label>
                        </div>
                    </div>
                </div>
                <div class="_input-group">
                    <div class="form-row" data-before="附件：">
                        <div class="form-group col-md-8">
                            <div class="custom-file-control">
                                <!--                <input type="file" name="file" class="btn-file">-->
                                <a href="javascript:;" class="btn-choose" data-toggle="modal" data-target="#resource_modal">选择</a>
                            </div>
                            <div class="custom-file-list">
                                <ul id="file-list-icon">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <div class="btn-group">
                    <input type="hidden" name="material_resource_ids" id="material_resource_ids">
                    <input type="hidden" name="teaching_schedule_id" value="<?= $teachingschedule->id ?>">
                    <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary btn-save" id="createTeachingSchedule">保存</button>
                    <!--              <button type="button" class="btn btn-primary btn-submit">提交审核</button>-->
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

</div>
    <div class="modal fade commonModal new-icon-box" id="materia_edit_resources_modal" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">任务编辑</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('teachingscheduletasks/updateteachingscheduletask', 'class="form form-group" id="resource_edit_form" enctype="multipart/form-data"'); ?>
                <div class="modal-body" id="teachingschedulesbody">


                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary btn-save" id="updateTeachingSchedule">保存</button>
                        <!--              <button type="button" class="btn btn-primary btn-submit">提交审核</button>-->
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade commonModal new-icon-box" id="resource_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">选取资源文件</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="resourceBody">
                    <div id="mmGridSelectResource"></div>
                    <div id="paginatorSelectResource"></div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary btn-save" id="saveResource">保存</button>
                        <!--              <button type="button" class="btn btn-primary btn-submit">提交审核</button>-->
                    </div>
                </div>
            </div>
        </div>
    </div>



    <a href="#" class="btn btn-info setting-icon" id="teachingschedule_settings" data-toggle="modal"
   data-target="#materia_edit_resources_modal" style="display: none">
    基本设置
</a>
<script>
    var userItem = null;
    var teachingschedule_id = "<?=$teachingschedule->id?>";
    $(document).ready(function () {

        $('#materia_edit_resources_modal').on('hide.bs.modal', function () {
            userItem = null;
        });

        $('#materia_resources_modal').on('shown.bs.modal', function () {
            $("#file-list-icon").html("");
        });


        $("#teachingschedule_settings").click(function () {
            if (userItem == null) {
                alert("请选择教学进度!");
            } else {
                $.ajax({
                    type: "GET",
                    url: '<?=anchorurl('teachingscheduletasks/getTeachingscheduleTaskInfo')?>/' + userItem.id,
                    beforeSend: function () {
                        $("#resource_edit_form").showLoading();
                    },
                    success: function (data) {
                        $("#teachingschedulesbody").html(data);
                        $("#resource_edit_form").hideLoading();
                        $(".datepicker").datepicker({  format: 'yyyy-mm-dd'});
                    }
                });
            }
        });

        $("#resource-form").validate();
        $(".datepicker").datepicker({  format: 'yyyy-mm-dd'});
        $("#region_new").change(function () {
            $.ajax({
                url: "<?=anchorurl('teachingschedules/getSchoolList')?>/" + $(this).val(),
                type: "get",
                dataType: 'json',
                async: false,
                success: function (data, textstatus) {
                    var schools = '<option value="0">--请选择学校--</option>';
                    $(data.schools).each(function (index, element) {
                        schools += '<option value="' + element.id + '">' + element.name + '</option>';
                    });
                    $("#school_new").html(schools);

                    var teachers = "";
                    $(data.teachers).each(function (index, element) {
                        teachers += '<option value="' + element.id + '">' + element.school_name + "-" + element.name + '</option>';
                    });
                    $("#teacher_new").html(teachers);

                }
            });
        });

        $("#school_new").change(function () {
            $.ajax({
                url: "<?=anchorurl('teachingschedules/getTeacherList')?>/" + $("#region_new").val() + "/" + $(this).val(),
                type: "get",
                dataType: 'json',
                async: false,
                success: function (data, textstatus) {
                    var teachers = "";
                    $(data.teachers).each(function (index, element) {
                        teachers += '<option value="' + element.id + '">' + element.school_name + "-" + element.name + '</option>';
                    });
                    $("#teacher_new").html(teachers);

                }
            });
        });

        $("#createTeachingSchedule").on("click", function () {
            if ($("#resource-form").valid()) {
                $("#createTeachingSchedule").showLoading();
                $("#resource-form").ajaxForm({
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $("#createTeachingSchedule").hideLoading();
                        $("#materia_resources_modal").modal("hide");
                        $("#resource-form")[0].reset();
                        mmg.load();
                    }
                }).submit();
            }
        });

        $("#updateTeachingSchedule").on("click", function () {
            if ($("#resource_edit_form").valid()) {
                $("#updateTeachingSchedule").showLoading();
                $("#resource_edit_form").ajaxForm({
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $("#updateTeachingSchedule").hideLoading();
                        $("#materia_edit_resources_modal").modal("hide");
                        $("#resource_edit_form")[0].reset();
                        mmg.load();
                    }
                }).submit();
            }
        });

        $('#resource_modal').on('shown.bs.modal', function () {
            if(mmGridSelectResource == null){
                getmmGridSelectResource();
            }

        });

        $('#resource_modal').on('hide.bs.modal', function () {

        });

        $("#saveResource").click(function(){
            var selectedRows =  mmGridSelectResource.selectedRows();
            var index_array = new Array();
            var String = "";
            if(selectedRows.length >3){
                alert("最多可选择3个文件");
                return ;
            }
            for(var i=0;i<selectedRows.length;i++){
                index_array.push(selectedRows[i].id);
                console.log(selectedRows[i]);
                var resourceInfo = selectedRows[i].resourceInfo;
                if(resourceInfo.type == "image"){
                    String += '<li><img src="'+resourceInfo.url+'" width="60;" /></li>';
                }else if(resourceInfo.type == "audio"){
                    String += '<li class="icon-wrapper"><i class="icon icon-audio"></i></li>';
                }else if(resourceInfo.type == "video"){
                    String += '<li class="icon-wrapper"><i class="icon icon-video"></i></li>';
                }else if(resourceInfo.type == "zip"){
                    String += '<li class="icon-wrapper"><i class="icon icon-zip"></i></li>';
                }else if(resourceInfo.type == "word"){
                    String += '<li class="icon-wrapper"><i class="icon icon-word"></i></li>';
                }else if(resourceInfo.type == "ppt"){
                    String += '<li class="icon-wrapper"><i class="icon icon-ppt"></i></li>';
                }else if(resourceInfo.type == "excel"){
                    String += '<li class="icon-wrapper"><i class="icon icon-excel"></i></li>';
                }else if(resourceInfo.type == "file"){
                    String += '<li class="icon-wrapper"><i class="icon icon-file"></i></li>';
                }
                console.log(String);
            }
            if(userItem == null){
                $("#file-list-icon").html(String);
                if(index_array.length > 0){
                    $("#material_resource_ids").val(index_array.join(","));
                }else{
                    $("#material_resource_ids").val("");
                }
            }else{
                $("#file-list-icon_update").html(String);
                if(index_array.length > 0){
                    $("#material_resource_ids_update").val(index_array.join(","));
                }else{
                    $("#material_resource_ids_update").val("");
                }
            }
            $("#resource_modal").modal("hide");
        });


    })
</script>
<script type="text/javascript" src="<?= base_url() ?>media/wePlatForm/js/teachingscheduletask.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/materialResourceselect.js"></script>


</body>
</html>
