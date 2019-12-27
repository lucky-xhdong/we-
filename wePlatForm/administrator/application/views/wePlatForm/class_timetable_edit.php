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
                    <li class="breadcrumb-item"><a href="javascript:;">首页</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">学校管理</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">学校管理</a></li>
                    <li class="breadcrumb-item active" aria-current="page">教研员</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="ct--main__content">
                <div id="accordion">
                    <form action="" class="form-group form-validate" id="courseForm">
                        <!--基本进度 start-->
                        <div class="basic-progress" data-before="基本进度">
                            <div class="select-group">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <select class="form-control form-control-sm">
                                            <option selected>请选择区域</option>
                                            <option>请选择区域1</option>
                                            <option>请选择区域2</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select class="form-control form-control-sm">
                                            <option selected>请选择学校</option>
                                            <option>请选择学校1</option>
                                            <option>请选择学校2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <select class="form-control form-control-sm">
                                            <option selected>请选择督课日期</option>
                                            <option>请选择督课日期1</option>
                                            <option>请选择督课日期2</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select class="form-control form-control-sm">
                                            <option selected>请选择学校</option>
                                            <option>请选择学校1</option>
                                            <option>请选择学校2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="_input-group">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control form-control-sm" name="people" placeholder="出勤人数" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control form-control-sm" name="progress" placeholder="教学进度" required>
                                    </div>
                                </div>
                            </div>
                            <div class="radio-group">
                                <div class="form-row" data-before="是否使用教案：">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="useTeaching" name="useTeaching" class="custom-control-input">
                                        <label class="custom-control-label" for="useTeaching">是</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="unUseTeaching" name="useTeaching" class="custom-control-input">
                                        <label class="custom-control-label" for="unUseTeaching">否</label>
                                    </div>
                                </div>
                                <div class="form-row" data-before="是否使用作业单：">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="useTask" name="useTask" class="custom-control-input">
                                        <label class="custom-control-label" for="useTask">是</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="unUseTask" name="useTask" class="custom-control-input">
                                        <label class="custom-control-label" for="unUseTask">否</label>
                                    </div>
                                </div>
                            </div>
                            <div class="_input-group">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control" placeholder="作业单名称" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="checkbox-group">
                                <div class="form-row" data-before="跟课人员名单：">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="customCheckDisabled">
                                        <label class="custom-control-label" for="customCheckDisabled">美食/餐厅线上活动</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="customCheckDisabled1">
                                        <label class="custom-control-label" for="customCheckDisabled1">地推活动</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="customCheckDisabled2">
                                        <label class="custom-control-label" for="customCheckDisabled2">线下主题活动</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="customCheckDisabled3">
                                        <label class="custom-control-label" for="customCheckDisabled3">单纯品牌曝光</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--基本进度 end-->
                        <!--课堂评价 start-->
                        <div class="course-appraise" data-before="课堂评价">
                            <div class="table-group">
                                <table class="table table-teacher table-striped" data-before="老师">
                                    <tbody>
                                    <tr>
                                        <th scope="row"><span>时间分配</span></th>
                                        <td>
                                            <input type="text" name="time1" class="form-control form-control-sm" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><span>时间分配</span></th>
                                        <td>
                                            <input type="text" name="time2" class="form-control form-control-sm" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><span>时间分配</span></th>
                                        <td>
                                            <input type="text" name="time3" class="form-control form-control-sm" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><span>时间分配</span></th>
                                        <td>
                                            <input type="text" name="time4" class="form-control form-control-sm" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><span>时间分配</span></th>
                                        <td>
                                            <input type="text" name="time5" class="form-control form-control-sm" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><span>时间分配</span></th>
                                        <td>
                                            <input type="text" name="time6" class="form-control form-control-sm" required>
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
                                            <input type="text" name="time7" class="form-control form-control-sm" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><span>时间分配</span></th>
                                        <td>
                                            <input type="text" name="time8" class="form-control form-control-sm" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><span>时间分配</span></th>
                                        <td>
                                            <input type="text" name="time9" class="form-control form-control-sm" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="input-group">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="appraise" placeholder="课堂教学环节评价" required></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="import" placeholder="教学亮点" required></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="suggest" placeholder="随堂建议" required></textarea>
                                </div>
                            </div>
                        </div>
                        <!--课堂评价 end-->
                        <!--课堂打分 start-->
                        <div class="score-table score-table_edit" data-before="课堂打分">
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
                                        <div class="form-control-group">
                                            <input type="text" name="score1" class="form-control" required>
                                        </div>
                                        <div class="form-control-group">
                                            <input type="text" name="score2" class="form-control" required>
                                        </div>
                                        <div class="form-control-group">
                                            <input type="text" name="score3" class="form-control" required>
                                        </div>
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
                                        <div class="form-control-group">
                                            <input type="text" name="score4" class="form-control" required>
                                        </div>
                                        <div class="form-control-group">
                                            <input type="text" name="score5" class="form-control" required>
                                        </div>
                                        <div class="form-control-group">
                                            <input type="text" name="score6" class="form-control" required>
                                        </div>
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
                                        <div class="form-control-group">
                                            <input type="text" name="score7" class="form-control" required>
                                        </div>
                                        <div class="form-control-group">
                                            <input type="text" name="score8" class="form-control" required>
                                        </div>
                                        <div class="form-control-group">
                                            <input type="text" name="score9" class="form-control" required>
                                        </div>
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
                        <!--课堂打分 end-->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-save">保存</button>
                            <button type="submit" class="btn btn-primary btn-submit">提交审核</button>
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
        })
    </script>
</body>
</html>
