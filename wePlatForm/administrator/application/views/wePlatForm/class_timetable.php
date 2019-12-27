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
                    <li class="breadcrumb-item active" aria-current="page">教研员</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="ct--main__content">
                <div id="accordion">
                    <div class="select-group">
                        <select name="" id="" class="form-control">
                            <option value="请选择督课日期">请选择督课日期</option>
                            <option value="请选择督课日期">请选择督课日期</option>
                            <option value="请选择督课日期">请选择督课日期</option>
                            <option value="请选择督课日期">请选择督课日期</option>
                        </select>
                    </div>
                    <!--基本信息 start-->
                    <div class="card ct--main__basic">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    基本信息
                                    <i class="icon icon-expand"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body row">
                                <div class="col-6 ct--main__basic_item" data-before="签约状态：">未签约</div>
                                <div class="col-6 ct--main__basic_item" data-before="签 约 人：">王小二</div>
                                <div class="col-6 ct--main__basic_item" data-before="有 效 期：">2016-03-23至2018-03-23</div>
                                <div class="col-6 ct--main__basic_item" data-before="合同金额：">2323232323.00元</div>
                                <div class="col-6 ct--main__basic_item" data-before="合同页码：">23页</div>
                                <div class="col-6 ct--main__basic_item" data-before="查看合同：">点击查看合同</div>
                            </div>
                        </div>
                    </div>
                    <!--基本信息 end-->
                    <!--督课评价 start-->
                    <div class="card ct--main__appraise">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    督课评价
                                    <i class="icon icon-expand"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="table-group">
                                    <table class="table table-teacher table-striped" data-before="老师">
                                        <tbody>
                                        <tr>
                                            <th scope="row"><span>时间分配</span></th>
                                            <td><span>数学点评2分钟，上机自学15分钟</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>时间分配</span></th>
                                            <td><span>数学点评2分钟，上机自学15分钟</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>时间分配</span></th>
                                            <td><span>数学点评2分钟，上机自学15分钟</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>时间分配</span></th>
                                            <td><span>数学点评2分钟，上机自学15分钟</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>时间分配</span></th>
                                            <td><span>数学点评2分钟，上机自学15分钟</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>时间分配</span></th>
                                            <td><span>数学点评2分钟，上机自学15分钟</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-student table-striped" data-before="学生">
                                        <tbody>
                                        <tr>
                                            <th scope="row"><span>时间分配</span></th>
                                            <td><span>数学点评2分钟，上机自学15分钟</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>时间分配</span></th>
                                            <td><span>数学点评2分钟，上机自学15分钟</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>时间分配</span></th>
                                            <td><span>数学点评2分钟，上机自学15分钟</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>时间分配</span></th>
                                            <td><span>数学点评2分钟，上机自学15分钟</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="txt-group" data-before="课堂教学环节">
                                    <ul>
                                        <li><p>上周学习数据点评</p></li>
                                        <li><p>上周学习数据点评</p></li>
                                        <li><p>上周学习数据点评</p></li>
                                        <li><p>上周学习数据点评</p></li>
                                        <li><p>上周学习数据点评</p></li>
                                        <li><p>上周学习数据点评</p></li>
                                        <li><p>上周学习数据点评</p></li>
                                    </ul>
                                </div>
                                <div class="txt-group" data-before="课堂教学环节">
                                    <ul>
                                        <li><p>上周学习数据点评</p></li>
                                        <li><p>上周学习数据点评</p></li>
                                        <li><p>上周学习数据点评</p></li>
                                        <li><p>上周学习数据点评</p></li>
                                        <li><p>上周学习数据点评</p></li>
                                        <li><p>上周学习数据点评</p></li>
                                        <li><p>上周学习数据点评</p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--督课评价 end-->
                    <!--课堂打分 start-->
                    <div class="card ct--main__score">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    课堂打分
                                    <i class="icon icon-expand"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <div class="score-table">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th><span>重点观察项目</span></th>
                                            <th><span>督课要点梳理</span></th>
                                            <th><span>权重</span></th>
                                            <th><span>得分</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><span>时间分配</span></td>
                                            <td>
                                                <p>数学点评2分钟，上机自学15分钟</p>
                                                <p>数学点评2分钟，上机自学15分钟</p>
                                                <p>数学点评2分钟，上机自学15分钟</p>
                                            </td>
                                            <td>
                                                <p>3分</p>
                                                <p>3分</p>
                                                <p>3分</p>
                                            </td>
                                            <td>
                                                <span>3分</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>时间分配</span></td>
                                            <td>
                                                <p>数学点评2分钟，上机自学15分钟</p>
                                                <p>数学点评2分钟，上机自学15分钟</p>
                                                <p>数学点评2分钟，上机自学15分钟</p>
                                            </td>
                                            <td>
                                                <p>3分</p>
                                                <p>3分</p>
                                                <p>3分</p>
                                            </td>
                                            <td>
                                                <span>3分</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>时间分配</span></td>
                                            <td>
                                                <p>数学点评2分钟，上机自学15分钟</p>
                                                <p>数学点评2分钟，上机自学15分钟</p>
                                                <p>数学点评2分钟，上机自学15分钟</p>
                                            </td>
                                            <td>
                                                <p>3分</p>
                                                <p>3分</p>
                                                <p>3分</p>
                                            </td>
                                            <td>
                                                <span>3分</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><span>总分</span></td>
                                            <td>
                                                <p>80分</p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--课堂打分 end-->
                    <!--督课建议 start-->
                    <div class="card ct--main__suggest">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    督课建议
                                    <i class="icon icon-expand"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body row">

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
