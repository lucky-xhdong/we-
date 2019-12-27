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
<div class="container-fluid CourseAppraise">
    <div class="row">
        <!-- 左侧菜单 start -->
        <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
        <!-- 左侧菜单 end -->
        <div class="col-md-9 ca--main-wrapper">
            <!--菜单切换 start-->
            <?=$this->load->view("wePlatForm/tmpl/headernav")?>
            <!--菜单切换 end-->
            <!--面包屑 start-->
            <nav class="common-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;">首页</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">学校管理</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">学校管理</a></li>
                    <li class="breadcrumb-item active" aria-current="page">教研员</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="ca--main__content">
                <div id="accordion">
                    <!--区域基本信息 start-->
                    <div class="card ca--main__basic">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    区域基本信息
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <form action="" class="form-group needs-validation" novalidate>
                                    <div class="table-group" data-before="课堂评价">
                                        <table class="table table-teacher table-striped" data-before="老师">
                                            <tbody>
                                            <tr>
                                                <th scope="row"><span>时间分配</span></th>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><span>时间分配</span></th>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><span>时间分配</span></th>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><span>时间分配</span></th>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><span>时间分配</span></th>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><span>时间分配</span></th>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><span>时间分配</span></th>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-student table-striped" data-before="学生">
                                            <tbody>
                                            <tr>
                                                <th scope="row"><span>时间分配</span></th>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><span>时间分配</span></th>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><span>时间分配</span></th>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary btn-submit">提交</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--区域基本信息 end-->
                    <!--区域档案信息 start-->
                    <div class="card ca--main__archives">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    区域档案信息
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <ul class="nav nav-tabs ca--main__tabs" id="nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="regional-tab" data-toggle="tab" href="#regional" role="tab" aria-controls="资料文档" aria-selected="true">资料文档</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="regional-extend-tab" data-toggle="tab" href="#regional-extend" role="tab" aria-controls="解决方案" aria-selected="false">解决方案</a>
                                    </li>
                                </ul>
                                <div class="tab-content ca--main__cons" id="tab-content">
                                    <div class="tab-pane fade show active" id="regional" role="tabpanel" aria-labelledby="regional-tab">
                                        <div class="common-table">
                                            <div id="region_document"></div>
                                            <div class="btn-group-upload">
                                                <a href="javascript:;" class="btn btn-outline-primary btn-sm btn-add">
                                                    <i class="icon-add">
                                                        <i class="path1"></i>
                                                        <i class="path2"></i>
                                                    </i>上传文档
                                                    <!--                          <input type="file" class="upload-file" name="file" data-url="--><?//=anchorurl("fileupload/addTypeFile/".$region->id.'/0/region_document')?><!--" multiple>-->
                                                </a>
                                            </div>
                                            <div id="paginator_region_document"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="regional-extend" role="tabpanel" aria-labelledby="regional-extend-tab">
                                        <div class="common-table">
                                            <div id="region_solution"></div>
                                            <div class="btn-group-upload">
                                                <a href="javascript:;" class="btn btn-outline-primary btn-sm btn-add">
                                                    <i class="icon-add">
                                                        <i class="path1"></i>
                                                        <i class="path2"></i>
                                                    </i>上传文档
                                                    <!--                          <input type="file" class="upload-file" name="file" data-url="--><?//=anchorurl("fileupload/addTypeFile/".$region->id.'/0/region_solution')?><!--" multiple>-->
                                                </a>
                                            </div>
                                            <div id="paginator_region_solution"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--区域档案信息 end-->
                    <!--区域教学服务 start-->
                    <div class="card ca--main__teachingservice">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    区域教学服务计划
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                            </div>
                            <div class="common-table">
                                <div id="region_service_plan"></div>
                                <div class="btn-group-upload">
                                    <a href="javascript:;"  data-toggle="modal" data-target="#region_service_plan_modal" class="btn btn-outline-primary btn-sm btn-add">
                                        <i class="icon-add">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                        </i>添加计划
                                    </a>
                                </div>
                                <div id="paginator_region_service_plan"></div>
                            </div>
                        </div>
                    </div>
                    <!--区域教学服务 end-->
                    <!--区域商务信息 start-->
                    <div class="card ca--main__business">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    区域商务信息
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body row">
                                <!--                  <div class="col-6 ca--main__business_item" data-before="签约状态：">未签约</div>-->
                                <!--                  <div class="col-6 ca--main__business_item" data-before="签 约 人：">王小二</div>-->
                                <!--                  <div class="col-6 ca--main__business_item" data-before="有 效 期：">2016-03-23至2018-03-23</div>-->
                                <!--                  <div class="col-6 ca--main__business_item" data-before="合同金额：">2323232323.00元</div>-->
                                <!--                  <div class="col-6 ca--main__business_item" data-before="合同页码：">23页</div>-->
                                <!--                  <div class="col-6 ca--main__business_item" data-before="查看合同：">点击查看合同</div>-->
                            </div>
                            <div class="common-table">
                                <div id="region_business"></div>
                                <div class="btn-group-upload">
                                    <a href="javascript:;"  data-toggle="modal" data-target="#business_modal" class="btn btn-outline-primary btn-sm btn-add">
                                        <i class="icon-add">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                        </i>上传商务信息
                                    </a>
                                </div>
                                <div id="paginator_region_business"></div>
                            </div>
                        </div>
                    </div>
                    <!--区域商务信息 end-->
                    <!--区域商务信息 start-->
                    <div class="card ca--main__business">
                        <div class="card-header" id="headingFive">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    区域服务报告
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body row">
                                <!--                  <div class="col-6 ca--main__business_item" data-before="签约状态：">未签约</div>-->
                                <!--                  <div class="col-6 ca--main__business_item" data-before="签 约 人：">王小二</div>-->
                                <!--                  <div class="col-6 ca--main__business_item" data-before="有 效 期：">2016-03-23至2018-03-23</div>-->
                                <!--                  <div class="col-6 ca--main__business_item" data-before="合同金额：">2323232323.00元</div>-->
                                <!--                  <div class="col-6 ca--main__business_item" data-before="合同页码：">23页</div>-->
                                <!--                  <div class="col-6 ca--main__business_item" data-before="查看合同：">点击查看合同</div>-->
                            </div>
                            <div class="common-table">
                                <div id="region_service_report"></div>
                                <div class="btn-group-upload">
                                    <a href="javascript:;"  data-toggle="modal" data-target="#service_report_modal" class="btn btn-outline-primary btn-sm btn-add">
                                        <i class="icon-add">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                        </i>添加报告
                                    </a>
                                </div>
                                <div id="paginator_region_service_report"></div>
                            </div>
                        </div>
                    </div>
                    <!--区域商务信息 end-->
                </div>
            </div>
            <!--主体内容 end-->
        </div>
    </div>
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>
</html>
