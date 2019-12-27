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
<div class="container-fluid ClassTimetable">
    <div class="row">
        <!-- 左侧菜单 start -->
        <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
        <!-- 左侧菜单 end -->
        <div class="col-md-9 ct--main-wrapper">
            <!--菜单切换 start-->
            <?=$this->load->view("wePlatForm/tmpl/headernav")?>
            <!--菜单切换 end-->
            <!--面包屑 start-->
            <nav class="common-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
                    <li class="breadcrumb-item"><a href="<?=anchorurl("/serviceaudit/education/")?>">教学计划审核</a></li>
                    <li class="breadcrumb-item active" aria-current="page">日程安排</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="ct--main__content">
                <div id="accordion">
                    <div class="choose-date" data-before="选择日期">
                        <form action="" id="dateForm">
                            <div class="form-row" data-before="选择日期：">
                                <div class="_input-group _input-date-group">
                                    <div class="form-group col-md-5">
                                        <input type="text" id="startTime" class="form-control form-control-sm" placeholder="请选择开始日期">
                                    </div>至
                                    <div class="form-group col-md-5">
                                        <input type="text" id="endTime" class="form-control form-control-sm" placeholder="请选择结束日期">
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <a href="javascript:;" class="btn-confirm" id="searchButton">确定</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!--基本信息 start-->
                    <div class="card ct--main__basic">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    教学计划日程安排
                                    <i class="icon icon-expand"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body row">
                                <div class="col-6 ct--main__basic_item" data-before="计划名称："><?=$plan_detail->name?></div>
                                <div class="col-6 ct--main__basic_item" data-before="计划类型：">
                                    <?php  if($plan_detail->plan_type == 0):?>
                                        教学
                                    <?php elseif($plan_detail->plan_type == 1):?>
                                        教学
                                    <?php elseif($plan_detail->plan_type == 2):?>
                                        教学
                                    <?php endif;?>
                                </div>
                                <div class="col-6 ct--main__basic_item" data-before="发布范围：">
                                    <?php  if($plan_detail->plan_range == 0):?>
                                        区域
                                    <?php elseif($plan_detail->plan_range == 1):?>
                                        学校
                                    <?php endif;?>
                                </div>
                                <div class="col-6 ct--main__basic_item" data-before="编写人："><?=$plan_detail->userInfo['name']?></div>
                                <div class="col-6 ct--main__basic_item" data-before="上传时间："><?=$plan_detail->created_time?></div>
                                <div class="col-6 ct--main__basic_item" data-before="教学日期："><?=$plan_detail->start_date?>至<?=$plan_detail->end_date?></div>
<!--                                <div class="col-6 ct--main__basic_item" data-before="查看附件：">点击下载附件</div>-->
                            </div>
                        </div>
                    </div>
                    <!--督课建议 start-->
                    <div class="card ct--main__suggest">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    日程安排
                                    <i class="icon icon-expand"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body row">
                            </div>
                            <div class="common-table">
                                <div id="region_education_plan"></div>
                                <div id="paginator_region_education_plan"></div>
                            </div>
                        </div>
                    </div>
                    <!--督课建议 end-->
                </div>
            </div>
            <!--主体内容 end-->
        </div>
    </div>

    <script>
        var plan_id = '<?=$plan_detail->id?>';
        var service_plan_Item = null;
        (function() {
            $("#startTime").datepicker({
                format: 'yyyy-mm-dd'
            });
            $("#endTime").datepicker({
                format: 'yyyy-mm-dd'
            });

            $('#region_service_plan_modal').on('shown.bs.modal', function () {
                service_plan_id = 0;
                if(service_plan_Item != null){
                    service_plan_id = service_plan_Item.id;
                }
                $.ajax({
                    type: "GET",
                    url: '<?=anchorurl('regions/getRegionServiceEducationPlanInfo')?>/'+service_plan_id,
                    beforeSend:function(){
                        $("#region_service_plan_form").showLoading();
                    },
                    success: function (data){
                        $("#RegionServicePlanBody").html(data);
                        $("#region_service_plan_form").hideLoading();
                        $(".datepicker").datepicker({
                            format: 'yyyy-mm-dd'
                        });
                    }
                });
            });

            $('#region_service_plan_modal').on('hide.bs.modal', function () {
                service_plan_Item = null;
            });

            $("#saveRegionServicePlan").on("click", function(){
                if( $("#region_service_plan_form").valid()){
                    $("#saveRegionServicePlan").showLoading();
                    $("#region_service_plan_form").ajaxForm({
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            $("#saveRegionServicePlan").hideLoading();
                            $("#region_service_plan_modal").modal("hide");
                            if(data.errcode == 0){
                                $("#region_service_plan_form")[0].reset();
                            }
                            mmgEducationPlanDocument.load();
                        }
                    }).submit();
                }
            });

            $("#searchButton").click(function(){
                mmgEducationPlanDocument.load({
                    "start_date":$("#startTime").val(),
                    "end_date":$("#endTime").val(),
                });
            });


            $(document).keypress(function(e) {
                // 回车键事件

                if(e.which == 13) {
                    $("#searchButton").click();
                }
            });
        })();
    </script>
    <script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/region_education_audit_plan.js"></script>
</body>
</html>
