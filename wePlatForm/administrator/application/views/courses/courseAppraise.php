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
        <div class="col-md-9">
            <div class="ca--main-wrapper">
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
                    <div class="table-group" data-before="课堂评价">
                        <form action="" class="form-group needs-validation" novalidate>
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
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary btn-submit">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--主体内容 end-->
            </div>
        </div>
    </div>
</body>
</html>
