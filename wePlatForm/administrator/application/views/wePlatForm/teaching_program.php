<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php $this->load->view('wePlatForm/tmpl/title'); ?>
    <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
    <?php $this->load->view('wePlatForm/meta'); ?>
    <?php $this->load->view('tmpl/mmgrid');?>
    <?php $this->load->view('tmpl/fileupload');?>
</head>
<body>
<div class="container-fluid TeachingProgram">
    <div class="row">
        <!-- 左侧菜单 start -->
        <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
        <!-- 左侧菜单 end -->
        <div class="col-md-9 tp--main-wrapper">
            <!--菜单切换 start-->
            <?=$this->load->view("wePlatForm/tmpl/headernav")?>
            <!--菜单切换 end-->
            <!--面包屑 start-->
            <nav class="common-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
                    <li class="breadcrumb-item active" aria-current="page">教学计划</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="tp--main__content">
                <form action="" class="form-validate" id="programForm">
                    <div class="content__moudle1">
                        <div class="create-wrapper" data-before="教学计划创建">
                            <div class="input-group">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control form-control-sm" placeholder="计划标题" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="introduce" rows="3" placeholder="计划介绍" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="choosedate-wrapper" data-before="日期选择">
                            <div class="radio-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" checked id="day" name="feature" class="custom-control-input">
                                    <label class="custom-control-label" for="day">按日创建计划</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" checked id="week" name="feature" class="custom-control-input">
                                    <label class="custom-control-label" for="week">按周创建计划</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" checked id="month" name="feature" class="custom-control-input">
                                    <label class="custom-control-label" for="month">按月创建计划</label>
                                </div>
                            </div>
                            <div class="choose-handle" data-after=">" data-toggle="modal" data-target=".teaching-program__choose_date"><a href="javascript:;" class="txt-date">2018-23-23 至 2018-23-23</a></div>
                            <div class="add-handle"><a href="<?=anchorurl("class_timetable/edit")?>" class="txt-add">添加督课记录</a></div>
                        </div>
                    </div>
                    <div class="content__moudle2">
                        <div class="service-wrapper" data-before="服务内容">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <select id="inputState" class="form-control form-control-sm">
                                            <option selected>学校</option>
                                            <option>学校1</option>
                                            <option>学校2</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <select id="inputState1" class="form-control form-control-sm">
                                            <option selected>发布范围</option>
                                            <option>发布范围1</option>
                                            <option>发布范围2</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <select id="inputState2" class="form-control form-control-sm">
                                            <option selected>计划类型</option>
                                            <option>计划类型1</option>
                                            <option>计划类型2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <textarea name="a" class="form-control" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="btn-group-upload">
                                        <a href="javascript:;" class="btn btn-outline-primary btn-sm btn-add">
                                            <i class="icon-add">
                                                <i class="path1"></i>
                                                <i class="path2"></i>
                                            </i>上传文档
                                            <input type="file" class="upload-file form-control-file">
                                        </a>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary btn-save">保存</button>
                                    <button type="submit" class="btn btn-primary btn-submit">提交审核</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
            <!--主体内容 end-->
        </div>
    </div>
    <div class="modal fade teaching-program__choose_date" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">选择日期</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="select-group">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="" id="datetimepicker_start"  data-date-format="yyyy-dd-mm">
                                        <input class="form-control" size="16" type="text" value="">
                                        <span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-append date form_datetime" id="datetimepicker_end" data-date-format="yyyy-dd-mm">
                                        <input class="form-control" size="16" type="text" value="">
                                        <span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary btn-confirm">确定</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#programForm').validate();
            $('#datetimepicker_start input').datepicker({
                format: 'yyyy-mm-dd hh:ii',
//                orientation: "bottom left"
            });

            $('#datetimepicker_end input').datepicker({});
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
        })
    </script>
</body>
</html>
