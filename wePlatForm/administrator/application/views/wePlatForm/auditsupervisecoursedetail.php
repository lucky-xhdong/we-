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
                    <li class="breadcrumb-item"><a href="<?=anchorurl("/serviceaudit/education/")?>">教学计划审核</a></li>
                    <li class="breadcrumb-item"><a href="<?=anchorurl("serviceaudit/educationPlan/".$region_education_plan->plan_detail_id)?>">教学计划</a></li>
                    <li class="breadcrumb-item"><a href="<?=anchorurl("/serviceaudit/supervisecourses/".$SuperviseCourse->region_education_plan_id)?>">督课表列表</a></li>
                    <li class="breadcrumb-item active" aria-current="page">督课详情</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="ct--main__content">
                <div id="accordion">
<!--                    <div class="select-group">-->
<!--                        <select name="" id="" class="form-control">-->
<!--                            <option value="请选择督课日期">请选择督课日期</option>-->
<!--                            <option value="请选择督课日期">请选择督课日期</option>-->
<!--                            <option value="请选择督课日期">请选择督课日期</option>-->
<!--                            <option value="请选择督课日期">请选择督课日期</option>-->
<!--                        </select>-->
<!--                    </div>-->
                    <?php
                        $superviseCourseDetail = $SuperviseCourse->getSupervisecourseInfo();
                    ?>
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
                                <div class="col-6 ct--main__basic_item" data-before="区域："><?php if(isset($region->name)) echo $region->name;?></div>
                                <div class="col-6 ct--main__basic_item" data-before="学 校："><?=$superviseCourseDetail['schoolInfo']->name?></div>
                                <div class="col-6 ct--main__basic_item" data-before="班 级："><?php if(isset($superviseCourseDetail['classInfo']->name)) echo $superviseCourseDetail['classInfo']->name?></div>
                                <div class="col-6 ct--main__basic_item" data-before="教师："><?php if(isset($superviseCourseDetail['teacherInfo']->name)) echo $superviseCourseDetail['teacherInfo']->name?></div>
                                <div class="col-6 ct--main__basic_item" data-before="督课日期："><?=$SuperviseCourse->date?></div>
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
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="table-group">
                                    <table class="table table-teacher table-striped" data-before="老师">
                                        <tbody>
                                        <tr>
                                            <th scope="row"><span>时间分配</span></th>
                                            <td><span><?=$SuperviseCourse->teacher_time_distribution?></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>指令清晰度</span></th>
                                            <td><span><?=$SuperviseCourse->teacher_instruction_definition?></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>TTT&TET</span></th>
                                            <td><span><?=$SuperviseCourse->teacher_ttt_tet?></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>节奏把握</span></th>
                                            <td><span><?=$SuperviseCourse->teacher_rhythm_control?></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>参与项目热情度</span></th>
                                            <td><span><?=$SuperviseCourse->teacher_enthusiasm?></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>角色转换度</span></th>
                                            <td><span><?=$SuperviseCourse->teacher_role_transformation?></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>对学生指导</span></th>
                                            <td><span><?=$SuperviseCourse->teacher_instructing_students?></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>其他</span></th>
                                            <td><span><?=$SuperviseCourse->teacher_others?></span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-student table-striped" data-before="学生">
                                        <tbody>
                                        <tr>
                                            <th scope="row"><span>兴趣</span></th>
                                            <td><span><?=$SuperviseCourse->student_interest?></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>参与度</span></th>
                                            <td><span><?=$SuperviseCourse->student_participation_degree?></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>是否开口大声</span></th>
                                            <td><span><?=$SuperviseCourse->student_is_speak_loudly?></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>其他</span></th>
                                            <td><span><?=$SuperviseCourse->student_others?></span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="txt-group" data-before="课堂教学环节">
                                    <p><?=$SuperviseCourse->classroom_teaching?></p>
                                </div>
                                <div class="txt-group" data-before="教学亮点">
                                    <p><?=$SuperviseCourse->teaching_bright?></p>
                                </div>
                                <div class="txt-group" data-before="随堂建议">
                                    <p><?=$SuperviseCourse->teaching_advise?></p>
                                </div>
                                <div class="txt-group" data-before="机房&技术">
                                    <p><?=$SuperviseCourse->technology?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--督课评价 end-->
                    <!--课堂打分 start-->
                    <div class="card ct--main__score">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed " data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    课堂打分
                                    <i class="icon icon-expand"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
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
                                        <?php
                                        $SuperviseCourseCategorys = $SuperviseCourse->getSuperviseCourseScoreCategory();
                                         $scores = 0;
                                        ?>
                                        <?php foreach($SuperviseCourseCategorys as $SuperviseCourseCategory):?>
                                            <tr>
                                                <td><span><?=$SuperviseCourseCategory->name?></span></td>
                                                <td>
                                                    <?php foreach($SuperviseCourseCategory->childs as $child):?>
                                                        <p><?=$child->name?></p>
                                                    <?php endforeach;?>
                                                </td>
                                                <td>
                                                    <?php foreach($SuperviseCourseCategory->childs as $child):?>
                                                        <p><?=$child->weight?></p>
                                                    <?php endforeach;?>
                                                </td>
                                                <td>
                                                    <?php foreach($SuperviseCourseCategory->childs as $child):?>
                                                        <span><?=$child->score?>分</span>
                                                    <?php $scores +=$child->score;  endforeach;?>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        <tr>
                                            <td colspan="3"><span>总分</span></td>
                                            <td>
                                                <p><?=$scores?>分</p>
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
                        <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body row">
                                <div class="txt-group">
                                    <p><?=$SuperviseCourse->supervise_course_advise?></p>
                                </div>
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
