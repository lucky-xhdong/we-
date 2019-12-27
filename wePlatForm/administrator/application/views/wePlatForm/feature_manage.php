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
<div class="container-fluid FeatureManage">
    <div class="row">
        <!-- 左侧菜单 start -->
        <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
        <!-- 左侧菜单 end -->
        <div class="col-md-9 fm--main-wrapper">
            <!--菜单切换 start-->
            <?=$this->load->view("wePlatForm/tmpl/headernav")?>
            <!--菜单切换 end-->
            <!--面包屑 start-->
            <nav class="common-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
                    <li class="breadcrumb-item active" aria-current="page">特征管理</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="fm--main__content" data-before="特征管理">
                <!--选项卡标签 start-->
<!--                <ul class="nav nav-tabs fm--main__tabs" id="nav-tabs" role="tablist">-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link active" id="regional-tab" data-toggle="tab" href="#regional" role="tab" aria-controls="区域特征" aria-selected="true">区域特征</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" id="regional-extend-tab" data-toggle="tab" href="#regional-extend" role="tab" aria-controls="区域扩展特征" aria-selected="false">区域扩展特征</a>-->
<!--                    </li>-->
<!--                </ul>-->
                <!--选项卡标签 end-->
                <!--选项卡内容 start-->
                <div class="tab-content fm--main__cons" id="tab-content">
                    <div class="tab-pane fade show active" id="regional" role="tabpanel" aria-labelledby="regional-tab">
                        <div class="form-check-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" checked id="all" value="0" name="feature" class="custom-control-input">
                                <label class="custom-control-label" for="all">全部</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="leadership1" value="leadership" name="feature" class="custom-control-input">
                                <label class="custom-control-label" for="leadership1">区域领导</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="research1" value="research" name="feature" class="custom-control-input">
                                <label class="custom-control-label" for="research1">教研员</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" value="school" id="school1" name="feature" class="custom-control-input">
                                <label class="custom-control-label" for="school1">学校</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" value="teacher" id="teacher1" name="feature" class="custom-control-input">
                                <label class="custom-control-label" for="teacher1">教师</label>
                            </div>
                        </div>
                        <div class="common-table">
                            <div id="tags"></div>
                            <div class="btn-group-upload">
                                <a size="small" class="btn btn-outline-primary btn-sm btn-add"  data-toggle="modal" data-target="#tags_modal ">添加新特征</a>
                            </div>
                            <div id="paginator_tags">

                            </div>
                        </div>
                    </div>
                </div>
                <!--选项卡内容 end-->
            </div>
            <!--主体内容 end-->
        </div>
    </div>

    <div class="modal fade commonModal" id="tags_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">创建特征</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=anchorurl('feature/addTag/')?>" id="tags_form" class="form-group needs-validation" novalidate method="post">
                    <div class="modal-body">
                        <div class="_input-group">
                            <div class="form-row" data-before="特征名称：">
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control form-control-sm" placeholder="特征名称" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="radio-group">
                            <div class="form-row" data-before="特征类型：">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio"  value="leadership" id="leadership" name="type" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="leadership">区域领导</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="research" id="research" name="type" class="custom-control-input">
                                    <label class="custom-control-label" for="research">教研员</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="school" id="school" name="type" class="custom-control-input">
                                    <label class="custom-control-label" for="school">学校</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="teacher" id="teacher" name="type" class="custom-control-input">
                                    <label class="custom-control-label" for="teacher">教师</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
                            <button type="button" class="btn btn-primary btn-save" id="saveTag">保存</button>
                            <!--              <button type="button" class="btn btn-primary btn-submit">提交审核</button>-->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/tags.js"></script>

    <script>
        $(document).ready(function () {
            $('#nav-tabs a').on('click', function (e) {
                e.preventDefault();
                $(this).tab('show');
            })
            $(".nav-item .icon-menu-right").on('click', function () {
                if ($(this).parents('.nav-item').find(".nav-item__sub").hasClass('hide')) {
                    $(this).parents('.nav-item').find(".nav-item__sub").removeClass('hide');
                } else {
                    $(this).parents('.nav-item').find(".nav-item__sub").addClass('hide');
                }
            })

            $("#saveTag").on("click", function(){
                if( $("#tags_form").valid()){
                    $("#saveTag").showLoading();
                    $("#tags_form").ajaxForm({
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            $("#saveTag").hideLoading();
                            $("#tags_modal").modal("hide");
                            if(data.errcode == 0){
                                $("#tags_form")[0].reset();
                            }
                            mmgtags.load();
                        }
                    }).submit();
                }
            });
            $("input[name='feature']").click(function(){
                mmgtags.load({type:$(this).val()});
            });
        })
    </script>
</body>
</html>
