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
                    <li class="breadcrumb-item active" aria-current="page">服务计划</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="fm--main__content" data-before="服务计划">
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
<!--                            <div class="custom-control custom-radio custom-control-inline">-->
<!--                                <input type="radio" checked id="status" name="status" value="0" class="status custom-control-input">-->
<!--                                <label class="custom-control-label" for="status">全部</label>-->
<!--                            </div>-->
<!--                            <div class="custom-control custom-radio custom-control-inline">-->
<!--                                <input type="radio" id="status1" name="status"  value="2" class="status custom-control-input">-->
<!--                                <label class="custom-control-label" for="status1">审核通过</label>-->
<!--                            </div>-->
<!--                            <div class="custom-control custom-radio custom-control-inline">-->
<!--                                <input type="radio" id="status2" name="status" value="3" class="status custom-control-input">-->
<!--                                <label class="custom-control-label" for="status2">未通过</label>-->
<!--                            </div>-->
                        </div>
                        <div class="common-table">
                            <div id="region_education_plan"></div>
<!--                            <div class="btn-group-upload">-->
<!--                                <a size="small" class="btn btn-outline-primary btn-sm btn-add"  data-toggle="modal" data-target="#tags_modal ">-->
<!--                                    <i class="icon-add">-->
<!--                                        <i class="path1"></i>-->
<!--                                        <i class="path2"></i>-->
<!--                                    </i>添加新特征-->
<!--                                </a>-->
<!--                            </div>-->
                            <div id="paginator_region_education_plan">

                            </div>
                        </div>
                    </div>
                </div>
                <!--选项卡内容 end-->
            </div>
            <!--主体内容 end-->
        </div>
    </div>

    <div class="modal fade commonModal" id="audie_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">商务计划拒绝理由</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=anchorurl('regions/addRegionEducationPlan/')?>" id="plan_form" class="form-group needs-validation" novalidate method="post">
                    <div class="modal-body">
                        <div class="_input-group">
                            <div class="form-row" data-before="拒绝理由：">
                                <div class="form-group col-md-8">
                                    <textarea type="text" class="form-control form-control-sm" placeholder="请输入拒绝理由" name="refusal" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <button type="button" class="btn btn-primary btn-save" id="saveRegionService">拒绝</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/region_education_plan_detail_outside.js"></script>

    <script>
        var plan_item = null;
        var region_id = 0;
        $(document).ready(function () {
            getEducationPlanmmgDocument();
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

            $("#saveRegionService").on("click", function(){
                if( $("#plan_form").valid()){
                    $("#saveRegionService").showLoading();
                    $("#plan_form").ajaxForm({
                        dataType: 'json',
                        data:{
                            status:3,
                            id:plan_item.id
                        },
                        success: function (data) {
                            console.log(data);
                            $("#saveRegionService").hideLoading();
                            $("#audie_modal").modal("hide");
                            if(data.errcode == 0){
                                $("#plan_form")[0].reset();
                            }
                            mmgEducationPlanDocument.load();
                        }
                    }).submit();
                }
            });
            $(".status").click(function(){
                if($(this).is(":checked")){
                    mmgEducationPlanDocument.load({status:$(this).val()});
                }
            });
        })
    </script>
</body>
</html>
