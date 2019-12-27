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
                    <li class="breadcrumb-item"><a href="<?=anchorurl("regions")?>">区域档案</a></li>
                    <li class="breadcrumb-item"><a href="<?=anchorurl()?>">教学计划</a></li>
                    <li class="breadcrumb-item"><a href="<?=anchorurl("supervisecourses/index/".$region_education_plan->id)?>">督课列表</a></li>
                    <li class="breadcrumb-item active" aria-current="page">添加督课表</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="ct--main__content">
                <div id="accordion">
                    <form action="<?=anchorurl("supervisecourses/saveSupervisecourse/".$region_education_plan->id)?>" class="form-group form-validate" id="courseForm" method="post">
                        <!--基本进度 start-->
                        <div class="card ct--main__basic">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <a class="btn btn-link" data-toggle="collapse" data-target="#" aria-expanded="false" aria-controls="collapseOne">
                                        基本进度
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body row">
                                    <div class="basic-progress">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="form-group__item col-md-12" data-before="督课表名称：">
                                                    <input type="text" class="form-control form-control-sm" name="name" placeholder="督课表名称" required>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group__item col-md-12" data-before="区域：">
                                                    <?=$region->name?>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group__item col-md-12" data-before="选择学校：">
                                                    <select class="form-control form-control-sm" name="school_id" id="school_id">
                                                        <option value="0" selected>请选择学校</option>
                                                        <?php foreach($schools as $school):?>
                                                            <option value="<?=$school->id?>"><?=$school->name?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group__item col-md-12" data-before="选择日期：">
                                                    <input type="text" class="form-control form-control-sm datepicker" name="date" placeholder="请选择日期" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group__item col-md-12" data-before="选择班级：">
                                                    <select class="form-control form-control-sm" name="class_id" id="class_id">
                                                        <option value="0" selected>请选择班级</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group__item col-md-12" data-before="选择教师：">
                                                    <select class="form-control form-control-sm" name="teacher_id" id="teacher_id">
                                                        <option value="0" selected>请选择教师</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group__item col-md-12" data-before="出勤人数：">
                                                    <input type="text" class="form-control form-control-sm" name="attendance" placeholder="出勤人数" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group__item col-md-12" data-before="教学进度：">
                                                    <input type="text" class="form-control form-control-sm" name="teaching_progress" placeholder="教学进度" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="radio-group">
                                            <div class="form-row" data-before="是否使用教案：">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="useTeaching" value="0" name="is_teaching_case" class="custom-control-input">
                                                    <label class="custom-control-label" for="useTeaching">是</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="unUseTeaching"  value="1" name="is_teaching_case" class="custom-control-input">
                                                    <label class="custom-control-label" for="unUseTeaching">否</label>
                                                </div>
                                            </div>
                                            <div class="form-row" data-before="是否使用作业单：">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="useTask"  value="0" name="is_assignment_sheet" class="custom-control-input">
                                                    <label class="custom-control-label" for="useTask">是</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="unUseTask"  value="1" name="is_assignment_sheet" class="custom-control-input">
                                                    <label class="custom-control-label" for="unUseTask">否</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="form-group__item col-md-12" data-before="授课内容：">
                                                    <textarea class="form-control" name="content" placeholder="授课内容" required></textarea>
                                                </div>
                                            </div>
                                            <div class="checkbox-group">
                                                <div class="form-row" data-before="跟课人员名单：">
                                                    <?php foreach($educationUsers as $key=>$educationUser):?>
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" name="entourage[]" value="<?=$educationUser['id']?>" class="custom-control-input" id="customCheckDisabled-<?=$key?>">
                                                            <label class="custom-control-label" for="customCheckDisabled-<?=$key?>"><?=$educationUser['name']?></label>
                                                        </div>
                                                    <?php endforeach;?>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group__item col-md-12" data-before="其他跟课人员名单：">
                                                    <input type="text" class="form-control form-control-sm" name="other_entourage" placeholder="其他跟课人员名单" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--基本进度 end-->
                        <!--课堂评价 start-->
                        <div class="card ct--main__appraise">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <a class="btn btn-link" data-toggle="collapse" data-target="#" aria-expanded="true" aria-controls="collapseTwo">
                                        课堂评价
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="course-appraise">
                                        <div class="table-group">
                                            <table class="table table-teacher table-striped" data-before="老师">
                                                <tbody>
                                                <tr>
                                                    <th scope="row"><span>时间分配</span></th>
                                                    <td>
                                                        <input type="text" name="teacher_time_distribution" class="form-control form-control-sm" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><span>指令清晰度</span></th>
                                                    <td>
                                                        <input type="text" name="teacher_instruction_definition" class="form-control form-control-sm" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><span>TTT&TET</span></th>
                                                    <td>
                                                        <input type="text" name="teacher_ttt_tet" class="form-control form-control-sm" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><span>节奏把握</span></th>
                                                    <td>
                                                        <input type="text" name="teacher_rhythm_control" class="form-control form-control-sm" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><span>参与项目热情度</span></th>
                                                    <td>
                                                        <input type="text" name="teacher_enthusiasm" class="form-control form-control-sm" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><span>角色转换度</span></th>
                                                    <td>
                                                        <input type="text" name="teacher_role_transformation" class="form-control form-control-sm" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><span>对学生指导</span></th>
                                                    <td>
                                                        <input type="text" name="teacher_instructing_students" class="form-control form-control-sm" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><span>其他</span></th>
                                                    <td>
                                                        <input type="text" name="teacher_others" class="form-control form-control-sm" required>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-student table-striped" data-before="学生">
                                                <tbody>
                                                <tr>
                                                    <th scope="row"><span>兴趣</span></th>
                                                    <td>
                                                        <input type="text" name="student_interest" class="form-control form-control-sm" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><span>参与度</span></th>
                                                    <td>
                                                        <input type="text" name="student_participation_degree" class="form-control form-control-sm" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><span>是否开口大声</span></th>
                                                    <td>
                                                        <input type="text" name="student_is_speak_loudly" class="form-control form-control-sm" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><span>其他</span></th>
                                                    <td>
                                                        <input type="text" name="student_others" class="form-control form-control-sm" required>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group__item col-md-12" data-before="课堂教学环节评价：">
                                                <textarea class="form-control" name="classroom_teaching" placeholder="课堂教学环节评价" required></textarea>
                                            </div>
                                            <div class="form-group__item col-md-12" data-before="教学亮点：">
                                                <textarea class="form-control" name="teaching_bright" placeholder="教学亮点" required></textarea>
                                            </div>
                                            <div class="form-group__item col-md-12" data-before="随堂建议：">
                                                <textarea class="form-control" name="teaching_advise" placeholder="随堂建议" required></textarea>
                                            </div>
                                            <div class="form-group__item col-md-12" data-before="机房&技术：">
                                                <textarea class="form-control" name="technology" placeholder="机房&技术" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--课堂评价 end-->
                        <!--课堂打分 start-->
                        <div class="card ct--main__score">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <a class="btn btn-link" data-toggle="collapse" data-target="#" aria-expanded="false" aria-controls="collapseThree">
                                        课堂打分
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="score-table score-table_edit">
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
                                            <div class="form-control-group">
                                                <input type="text" name="SuperviseCoursescore[<?=$child->id?>]" min="0" max="<?=$child->weight?>" class="form-control SuperviseCoursescore" required>
                                            </div>
                                        <?php endforeach;?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                <tr>
                                    <td colspan="3"><span>总分</span></td>
                                    <td>
                                        <p id="totalScore">0分</p>
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
                                    <a class="btn btn-link" data-toggle="collapse" data-target="#" aria-expanded="false" aria-controls="collapseFour">
                                        督课建议
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse show" aria-labelledby="headingFour">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group__item col-md-12" data-before="督课建议：">
                                            <textarea class="form-control" name="supervise_course_advise" placeholder="督课建议" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--督课建议 end-->
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary btn-save">保存</button>
<!--                            <button type="submit" class="btn btn-primary btn-submit">提交审核</button>-->
                        </div>
                    </form>
                </div>
            </div>
            <!--主体内容 end-->
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#courseForm").validate();
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd'
            });
            $("#school_id").change(function(){
                var string = '';
                var _this = $(this);
                $.ajax({
                    url: "<?=anchorurl('supervisecourses/getSchoolClassList')?>/"+$(this).val(),
                    type: "get",
                    dataType: 'json',
                    async: false,
                    success: function (data, textstatus) {
                        var string = '';
                        $(data).each(function(index,element){
                            string += '<option value="'+element.id+'">'+element.name+'</option>';
                            if(index == 0){
                                var string1 = '';
                                $(element.teachers).each(function(index2,element2){
                                    string1 += '<option value="'+element2.id+'">'+element2.name+'</option>';
                                });
                                $("#teacher_id").html(string1);
                            }
                        });
                        $("#class_id").html(string);
                    }
                });
            });
//
            $("#class_id").change(function(){
                var string = '';
                var _this = $(this);
                $.ajax({
                    url: "<?=anchorurl('supervisecourses/getClassTeacherList')?>/"+$(this).val(),
                    type: "get",
                    dataType: 'json',
                    async: false,
                    success: function (data, textstatus) {
                        var string = '';
                        $(data).each(function(index,element){
                            string += '<option value="'+element.id+'">'+element.name+'</option>';
                        });
                        $("#teacher_id").html(string);
                    }
                });
            });
//
            $('.SuperviseCoursescore').keyup(function () {
                var score = 0;
                $('.SuperviseCoursescore').each(function(index,element){
                    if($(element).val()){
                        score += parseInt($(element).val());
                    }
                });
                $("#totalScore").html(score + "分");
            });
        })
    </script>
</body>
</html>
