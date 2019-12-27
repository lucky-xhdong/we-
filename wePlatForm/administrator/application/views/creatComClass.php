<!DOCTYPE html>
<html lang="en" class="">
<!-- 创建公司学校 -->
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
  <?php $this->load->view('jsgrid'); ?>
  <?php $this->load->view('tmpl/mmgrid');?>
  <?php $this->load->view('meta');?>
  <?php $this->load->view('tmpl/jqueryvalidate'); ?>
</head>

<body>
<div class="app app-header-fixed ">

  <!-- header -->
  <?php $this->load->view('header'); ?>
  <!-- / header -->


  <!-- aside -->
  <?php $this->load->view('aside'); ?>
  <!-- / aside -->

  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">
      <div class="bg-light lter b-b wrapper-md" style="height: auto">
        <div class="col-md-8">
          <p>
            <a href="<?=anchorurl('AccountManage/creatComSchool')?>">学校列表</a>
            <span>&nbsp;&gt;&nbsp;<?=$school->name?>
            </span>
          </p>
        </div>
        <div class="col-md-4">
          <a href="javascript:;" class="btn btn-success new-icon new-student pull-right" id="add-new-student">
            添加学生
          </a>
          <a href="javascript:;" class="btn btn-primary new-icon new-student pull-right" id="UnchainClass">
            解锁班级课程
          </a>
        </div>


<!--        <a href="" class="btn btn-success bacth-icon" data-toggle="modal" data-target=".bacth-icon-box" >-->
<!--          批量添加-->
<!--        </a>-->
<!--        <a href="javascript:;" class="btn btn-info export-icon"  >-->
<!--          导出账号-->
<!--        </a>-->
<!--        <a href="#" class="btn btn-info user-info-icon" id="user-info-edit">-->
<!--          基本资料-->
<!--        </a>-->
<!--        <a href="#" class="btn btn-warning give-time-icon" id="give-time-school">-->
<!--          授权时间-->
<!--        </a>-->
<!--        <a href="#" class="btn btn-warning give-course-icon" data-toggle="modal" data-target=".give-course-icon-box" >-->
<!--          授权课程-->
<!--        </a>-->
<!--        <a href="#" class="btn btn-primary diy-icon" id="give-home-school">-->
<!--          设置家装-->
<!--        </a>-->
<!--        <a href="#" class="btn btn-primary root-icon "  data-toggle="modal" data-target=".root-icon-box">-->
<!--          权限管理-->
<!--        </a>-->
<!--        <a href="#" class="btn btn-danger btn-del" style="float:right " id="DeleteUserBlock">-->
<!--          删除-->
<!--        </a>-->
<!--        <a href="#" class="btn btn-danger btn-recover" style="float: right;right;margin-right: 10px;" id="setUserBlock">-->
<!--          停用/恢复-->
<!--        </a>-->
      </div>
      <div class="wrapper-md">
        <div class="panel panel-default">
          <div class="wrap-tit">
            <div class="row ">
<!--              <div class="col-sm-5 ">-->
<!--                <p><a href="--><?//=anchorurl('AccountManage/creatComSchool')?><!--">学校列表</a><span>&nbsp;&gt;&nbsp;--><?//=$school->name?><!--</span></p>-->
<!--              </div>-->
<!--              <div class="col-sm-4">-->
<!--              </div>-->
              <div class="col-sm-12">
                <div class="input-group"  style="float: right;">
                  <input type="text" id="searchName" class="form-control input-type-name rounded" placeholder="输入姓名" >
                  <a class="fa fa-search pos" ></a>
                </div>
              </div>
            </div>
          </div>

          <div class="table-responsive tab-box stu-tea-box">

            <div class="table-con">
              <div>
                <div class="class-list" data-type="角色">
                  <span class="span-all on" data-trigger="role" data-type="all">全部</span>
                  <div class="class-list-span" id="role-list-span">
                    <span class="" data-trigger="role" data-type="student">学生</span>
                    <span class="" data-trigger="role" data-type="teacher">老师</span>
                  </div>
                </div>
                <!--年级-->
                <div class="class-list" data-type="年级">
                  <span class="span-all on" data-trigger="grade" data-id="0">全部</span>
                  <div class="class-list-span" id="grade-list-span">
                  </div>
                  <button type="button" class="btn btn-primary edit-class-btn" data-toggle="modal" data-target=".edit-class">
                    编辑年级
                  </button>
                  <div class="modal fade edit-class"  role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        </div>
                        <div class="modal-body">
                          <div class="edit-start edit-class-start">
                            <h4 class="modal-title">编辑年级</h4>
                            <div class="edit-main ">
                              <div class="row">
                                <div class="edit-th">
                                  <span class="col-md-5">年级名称</span>
                                  <span class="col-md-5">入学时间</span>
                                  <span class="col-md-2">操作</span>
                                </div>
                                <div id="gradeList">

                                </div>
                              </div>
                              <span class="edit-add" id="addgrade">新增年级</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--班级-->
                <div class="grade-list" data-type="班级">
<!--                  <span class="span-all" data-id="0" data-trigger="class">全部</span>-->
                  <div class="grade-list-span" id="class-list-span">
                  </div>
                  <button type="button" class="btn btn-primary edit-grade-btn" id="classmodel">
                    编辑班级
                  </button>
                  <div class="modal fade edit-grade"  role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        </div>
                        <div class="modal-body">
                          <div class="modal-edit-class edit-start edit-grade-start">
                            <h4 class="modal-title">编辑班级</h4>
                            <div class="modal-edit__main">
                              <div class="row">
                                <div class="modal-edit__th">
                                  <span class="col-md-2">班级名称</span>
                                  <span class="col-md-2">入学时间</span>
                                  <span class="col-md-6">课程</span>
                                  <span class="col-md-2">操作</span>
                                </div>
                                <div id="classList">
                                </div>
                              </div>
                              <span class="edit-add" id="addclass">新增班级</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-con stu-tea-con">
                <div class="on">
                  <div id="mmGrid"></div>
                  <div id="paginator"></div>
                </div>
<!--                <div>-->
<!--                  <div id="jsGrid1"></div>-->
<!--                </div>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /content -->

  <!-- footer -->
  <?php $this->load->view('tmpl/foot')?>
  <!-- / footer -->

  <!--新建 开始-->
  <div class="modal fade new-icon-box" role="dialog">
    <div class="modal-dialog">
      <?php echo form_open('register/addSchoolUser', 'class="form login-form" id="register-form" enctype="multipart/form-data"'); ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
          <!--基本信息 开始-->
          <div class="basic-box">
            <h4 class="modal-title" >基本信息</h4>
            <div class="text-center basic-info pag-15">
              <ul>
<!--                <li class="col-md-12">-->
<!--                  <span class="col-md-6">所在巴</span>-->
<!--                  <div class="col-md-6">-->
<!--                    <select name="" id="">-->
<!--                      <option value="">华北</option>-->
<!--                      <option value="">花呗</option>-->
<!--                    </select>-->
<!--                  </div>-->
<!--                </li>-->
<!--                <li class="col-md-12">-->
<!--                  <span class="col-md-6">所在省</span>-->
<!--                  <div class="col-md-6">-->
<!--                    <select name="" id="">-->
<!--                      <option value="">华北</option>-->
<!--                      <option value="">花呗</option>-->
<!--                    </select>-->
<!--                  </div>-->
<!--                </li>-->
<!--                <li class="col-md-12">-->
<!--                  <span class="col-md-6">所在市</span>-->
<!--                  <div class="col-md-6">-->
<!--                    <select name="" id="">-->
<!--                      <option value="">华北</option>-->
<!--                      <option value="">花呗</option>-->
<!--                    </select>-->
<!--                  </div>-->
<!--                </li>-->
<!--                <li class="col-md-12">-->
<!--                  <span class="col-md-6">所在县/区</span>-->
<!--                  <div class="col-md-6">-->
<!--                    <select name="" id="">-->
<!--                      <option value="">华北</option>-->
<!--                      <option value="">花呗</option>-->
<!--                    </select>-->
<!--                  </div>-->
<!--                </li>-->
<!--                <li class="col-md-12">-->
<!--                  <span class="col-md-6">所在学校</span>-->
<!--                  <div class="col-md-6">-->
<!--                    <select name="" id="">-->
<!--                      <option value="">天津市中营小学</option>-->
<!--                      <option value="">花呗</option>-->
<!--                    </select>-->
<!--                  </div>-->
<!--                </li>-->
                <li class="col-md-12">
                  <span class="col-md-6">所在年级</span>
                  <div class="col-md-6">
                    <select name="grade_id" id="grade_ids" required>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">所在班级</span>
                  <div class="col-md-6">
                    <select name="class_id" id="class_ids" required>
                    </select>
                  </div>
                </li>
              </ul>
              <ul>
                <li class="col-md-12">
                  <span class="col-md-6">用户角色</span>
                  <div class="col-md-6">
                    <select name="user_type">
                       <option value="student">学生</option>
                       <option value="teacher">老师</option>
                    </select>
                  </div>
                </li>

                <li class="col-md-12">
                  <span class="col-md-6">成员姓名</span>
                  <label for="" class="col-md-6"><input type="text" required name="name" placeholder="成员姓名" /></label>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">账号</span>
                  <label for="" class="col-md-6"><input type="text" required id="username" name="username" placeholder="账号" /></label>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">密码</span>
                  <label for=""class="col-md-6" ><input type="password" required  name="password" id="password" placeholder="密码" /></label>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">确认密码</span>
                  <label for="" class="col-md-6"><input type="password" name="confirm_password" id="confirm_password" placeholder="确认密码" /></label>
                </li>
              </ul>
              <ul>
                <li class="col-md-12">
                  <span class="col-md-6">手机号</span>
                  <label for="" class="col-md-6"><input type="text" name="mobile" placeholder="手机号" /></label>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">E-Mail</span>
                  <label for="" class="col-md-6"><input type="text" name="email" placeholder="E-Mail" /></label>
                </li>
<!--                <li class="col-md-12">-->
<!--                  <span class="col-md-6">微信号</span>-->
<!--                  <label for="" class="col-md-6"><input type="text" name="weixin" placeholder="微信号" /></label>-->
<!--                </li>-->
<!--                <li class="col-md-12">-->
<!--                  <span class="col-md-6">QQ号</span>-->
<!--                  <label for="" class="col-md-6"><input type="text" name="qq" placeholder="QQ号" /></label>-->
<!--                </li>-->
                <li class="col-md-12">
                  <span class="col-md-6">头像</span>
                  <label for="" class="col-md-6 upload-btn">
                    <input type="file" class="img-upload" name="file">
                    <span class="img-upload-btn">上传头像</span>
                  </label>
                </li>
              </ul>
            </div>
          </div>
          <!--基本信息 结束-->
          <!--授权时间 开始-->
          <div class="give-time-box">
            <h4 class="modal-title">授权时间</h4>
            <div class="text-center">
              <div class="time-start-end">
                <p>开始时间</p>
                <p>结束时间 </p>
              </div>
              <div class="input-daterange input-group" id="datepicker">
                <div>
                  <input type="text" class="input-sm form-control" name="start_date" value=" " required/>
                </div>
                <div>
                  <input type="text" class="input-sm form-control" name="end_date"  value=" " required/>
                </div>
              </div>
            </div>
          </div>
          <!--授权时间 结束-->
          <!--授权课程 开始-->
          <div class="give-source-box">
            <h4 class="modal-title">授权课程</h4>
            <div class="source-list">
              <div class="source-unsel-sel" style="width: 100% !important;">
                <div class="source-unsel" id="courseList">
                  <?php foreach($courses as $course):?>
                    <span data-id="<?=$course->id?>"><?=$course->name?></span>
                  <?php endforeach;?>
                </div>
              </div>
            </div>
          </div>
          <!--授权课程 结束-->
        </div>
        <div class="modal-footer text-center">
          <input type="hidden" name="school_id" value="<?=$school_id?>">
          <input type="hidden" name="course_ids" value="" id="course_ids_new">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-success" id="submitregister">完成</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>

  </div>
  <!--新建 结束-->
  <!--批量添加 开始-->
  <div class="modal fade bacth-icon-box" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
          <!--基本信息 开始-->
          <div class="basic-box">
            <h4 class="modal-title" >成员管理</h4>
            <div class="text-center basic-info pag-15">
              <ul>
                <li class="col-md-12">
                  <span class="col-md-6">所在巴</span>
                  <div class="col-md-6">
                    <select name="" id="" >
                      <option value="">华北</option>
                      <option value="">花呗</option>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">所在省</span>
                  <div class="col-md-6">
                    <select name="" id="">
                      <option value="">华北</option>
                      <option value="">花呗</option>
                    </select>
                  </div>

                </li>
                <li class="col-md-12">
                  <span class="col-md-6">所在市</span>
                  <div class="col-md-6">
                    <select name="" id="">
                      <option value="">华北</option>
                      <option value="">花呗</option>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">所在县/区</span>
                  <div class="col-md-6">
                    <select name="" id="">
                      <option value="">华北</option>
                      <option value="">花呗</option>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">所在学校</span>
                  <div class="col-md-6">
                    <select name="" id="">
                      <option value="">天津市中营小学</option>
                      <option value="">花呗</option>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">所在年级</span>
                  <div class="col-md-6">
                    <select name="" id="">
                      <option value="">一年级</option>
                      <option value="">二年级</option>
                    </select>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!--基本信息 结束-->
          <a class="up-file btn btn-success" href="<?=anchorurl('AccountManage/accountAdd')?>">上传文件</a>
        </div>
        <div class="modal-footer text-center">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        </div>

      </div>
    </div>

  </div>
  <!--批量添加 结束-->

  <!--基本资料 开始-->
  <div class="modal fade user-info-icon-box modal-nor" data-type = 1  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <?php echo form_open('register/updateUser', 'class="form login-form" id="update-user-form" enctype="multipart/form-data"'); ?>
        <div class="modal-body" id="user-info-body">
          <div class="basic-box">
            <h4 class="modal-title" >基本信息</h4>
            <div class="text-center basic-info pag-15">
              <ul>
                <li class="col-md-12">
                  <span class="col-md-6">所在年级</span>
                  <div class="col-md-6">
                    <select name="" id="">
                      <option value="">一年级</option>
                      <option value="">二年级</option>
                    </select>
                  </div>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">所在班级</span>
                  <div class="col-md-6">
                    <select name="" id="">
                      <option value="">三班</option>
                      <option value="">四班</option>
                    </select>
                  </div>
                </li>
              </ul>
              <ul>
                <li class="col-md-12">
                  <span class="col-md-6">成员姓名</span>
                  <label for="" class="col-md-6"><input type="text" placeholder="成员姓名" /></label>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">账号</span>
                  <label for="" class="col-md-6"><input type="text" placeholder="账号" /></label>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">密码</span>
                  <label for=""class="col-md-6" ><input type="password" placeholder="密码" /></label>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">确认密码</span>
                  <label for="" class="col-md-6"><input type="password" placeholder="确认密码" /></label>
                </li>
              </ul>
              <ul>
                <li class="col-md-12">
                  <span class="col-md-6">手机号</span>
                  <label for="" class="col-md-6"><input type="text" placeholder="手机号" /></label>
                </li>
                <li class="col-md-12">
                  <span class="col-md-6">E-Mail</span>
                  <label for="" class="col-md-6"><input type="text" placeholder="E-Mail" /></label>
                </li>
<!--                <li class="col-md-12">-->
<!--                  <span class="col-md-6">微信号</span>-->
<!--                  <label for="" class="col-md-6"><input type="text" placeholder="微信号" /></label>-->
<!--                </li>-->
<!--                <li class="col-md-12">-->
<!--                  <span class="col-md-6">QQ号</span>-->
<!--                  <label for="" class="col-md-6"><input type="text" placeholder="QQ号" /></label>-->
<!--                </li>-->
                <li class="col-md-12">
                  <span class="col-md-6">头像</span>
                  <div for="" class="col-md-6 user-info">
                    <span class="int-userimg"></span>
                    <lable class="upload-btn">
                      <input type="file" class="img-upload" name="file">
                      <span class="img-upload-btn">修改头像</span>
                    </lable>

                  </div>
                </li>
              </ul>
            </div>
          </div>

        </div>
        <div class="modal-footer text-center ">
          <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal" data-type="hide">取消</button>
          <button type="button" class="btn btn-success" id="submitUpdateUser">保存</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <!--基本资料 结束-->
  <!--授权时间 开始-->
  <div class="modal fade give-time-icon-box modal-nor"  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open('AccountManage/setUserAuthTime', 'class="form login-form" id="set-user-auth-form"'); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
          <div class="give-time-con">
            <h4 class="modal-title" >授权时间</h4>
            <div class="give-time-text minH-200 pag-15">
              <ul id="school-time-body">
                <li class="col-md-12">
                  <div class="col-md-6 text-right">开始时间</div>
                  <div class="col-md-6">2016.03.12</div>
                </li>
<!--                <li class="col-md-12 col-999">-->
<!--                  <div class="col-md-6 text-right">李某某</div>-->
<!--                  <div class="col-md-6">+24月（操作时间2016.07.04）</div>-->
<!--                </li>-->
<!--                <li class="col-md-12 col-999">-->
<!--                  <div class="col-md-6 text-right">王某某</div>-->
<!--                  <div class="col-md-6">+24月（操作时间2016.07.04）</div>-->
<!--                </li>-->
                <li class="col-md-12">
                  <div class="col-md-6 text-right">结束时间</div>
                  <div class="col-md-6">2016.07.12</div>
                </li>
                <li class="col-md-12 give-time-input type-hide" >
                  <div class="col-md-6 text-right">续期</div>
                  <div class="col-md-6" data-trigger="input"><input type="text">月</div>
                </li>
              </ul>
            </div>
          </div>
          <div class=" text-center type-show">
            <button class="btn change-btn" data-type="show" type="button">修改</button>
          </div>
        </div>
        <div class="modal-footer text-center type-hide">
          <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal" data-type="hide">取消</button>
          <button type="button" class="btn btn-success" id="submitSchoolTime">保存</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <!--授权时间 结束-->
  <!--授权课程 开始-->
  <div class="modal fade give-course-icon-box modal-nor"  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
          <div class="give-time-con">
            <h4 class="modal-title" >授权课程</h4>
            <div class="give-course-text minH-200 pag-15">
              <div class="source-list">
                <h2>课程</h2>
                <div class="source-unsel-sel">
                  <div class="source-unsel type-show">
                    <span class="on">We Talk</span>
                    <span>New Eenlish</span>
                    <span>课程一</span>
                    <span>课程一仨</span>
                  </div>
                  <div class="source-sel type-hide">
                    <span>We Talk</span>
                    <span>New Eenlish</span>
                    <span>课程一</span>
                    <span>课程一仨</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class=" text-center type-show">
            <button class="btn change-btn" data-type="show" >修改</button>
          </div>
        </div>
        <div class="modal-footer text-center type-hide">
          <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal" data-type="hide">取消</button>
          <button type="button" class="btn btn-success">保存</button>
        </div>
      </div>
    </div>
  </div>
  <!--授权课程 结束-->
  <!--设置家装 开始-->
  <div class="modal fade diy-icon-box modal-nor"  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open('AccountManage/setUserHomeAuthTime', 'class="form login-form" id="set-user-auth--home-form"'); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
          <div class="give-time-con">
            <h4 class="modal-title" >家装</h4>
            <div class="give-time-text minH-200">
              <ul id="home-time-body">
                <li class="col-md-12">
                  <div class="col-md-6 text-right">家装</div>
                  <div class="col-md-6">
                    <p class="type-show">已开通</p>
                    <select name="" id="" class="type-hide">
                      <option value="">开通</option>
                      <option value="">未开通</option>
                    </select>
                  </div>
                </li>

                <li class="col-md-12 give-time-box">
                  <div class="col-md-6 text-right">
                    <div class="time-start-end ">
                      <p>开始时间</p>
                      <p>结束时间 </p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-daterange input-group">
                      <div>
                        <input type="text" class="input-sm form-control" name="start_date" value=" " required="">
                      </div>
                      <div>
                        <input type="text" class="input-sm form-control" name="end_date" value=" " required="">
                      </div>
                    </div>
                  </div>
                </li>

<!--                <li class="col-md-12 col-999">-->
<!--                  <div class="col-md-6 text-right">李某某</div>-->
<!--                  <div class="col-md-6">+24月（操作时间2016.07.04）</div>-->
<!--                </li>-->
<!--                <li class="col-md-12 col-999">-->
<!--                  <div class="col-md-6 text-right">王某某</div>-->
<!--                  <div class="col-md-6">+24月（操作时间2016.07.04）</div>-->
<!--                </li>-->
                <li class="col-md-12 give-time-input type-hide" >
                  <div class="col-md-6 text-right">续期</div>
                  <div class="col-md-6" data-trigger="input"><input type="text">月</div>
                </li>
              </ul>
            </div>
          </div>
          <div class=" text-center type-show">
            <button class="btn change-btn" data-type="show" type="button">修改</button>
          </div>
        </div>
        <div class="modal-footer text-center type-hide">
          <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal" data-type="hide">取消</button>
          <button type="button" class="btn btn-success" id="sumbitAuthHomeTime">保存</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
  <!--设置家装 结束-->
  <!--权限管理 开始-->
  <div class="modal fade root-icon-box modal-nor"  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
          <div class="give-time-con">
            <h4 class="modal-title" >权限</h4>
            <div class="minH-200 pag-15">
              <div class="root-sel col-md-12">
                <span class="col-md-2">权限</span>
                <div class="root-sel-con col-md-5">
                  <select name="" id="" >
                    <option value="">教师权限</option>
                    <option value="">教师1权限</option>
                  </select>
                </div>
              </div>
              <div class="root-check col-md-12">
                <h2>选择权限范围</h2>
                <ul class="root-check-con">
                  <li class="col-md-12">
                    <span class="col-md-2">一年级</span>
                    <div class="col-md-10">
                      <span>1班</span>
                      <span class="on">2班</span>
                      <span>3班</span>
                      <span>4班</span>
                      <span>5班</span>
                      <span>6班</span>
                      <span>7班</span>
                      <span>8班</span>
                      <span>9班</span>
                      <span>10班</span>
                      <span>11班</span>
                    </div>
                  </li>
                  <li class="col-md-12">
                    <span class="col-md-2">二年级</span>
                    <div class="col-md-10">
                      <span>1班</span>
                      <span class="on">2班</span>
                      <span>3班</span>
                      <span>4班</span>
                      <span>5班</span>
                      <span>6班</span>
                      <span>7班</span>
                      <span>8班</span>
                      <span>9班</span>
                      <span>10班</span>
                    </div>
                  </li>
                  <li class="col-md-12">
                    <span class="col-md-2">三年级</span>
                    <div class="col-md-10">
                      <span>1班</span>
                      <span class="on">2班</span>
                      <span>3班</span>
                      <span>4班</span>
                      <span>5班</span>
                      <span>6班</span>
                      <span>7班</span>
                      <span>8班</span>
                      <span>9班</span>
                      <span>10班</span>
                      <span>11班</span>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer text-center type-show">
          <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal" data-type="hide">取消</button>
          <button type="button" class="btn btn-success">确定</button>
        </div>
      </div>
    </div>
  </div>
  <!--权限管理 结束-->


</div>

<!--添加年级模板-->
<div id="gradeTemplate" type="text/x-jquery-tmpl" style="display:none">
  <div class="edit-tr">
    <div class="col-md-5">
      <input type="text" name="name" value="${name}">
    </div>
    <div class="col-md-5">
      <input type="text" name="enteryear" class="datepicker" value="${enteryear}">
    </div>
    <input type="hidden" name="school_id" value="${school_id}">
    <input type="hidden" name="grade_id" value="${id}">
    <div class="col-md-2 del-icon">
      <span class="keep-btn savegrade" data-id="${id}">保存</span>
      <span class="del-btn delgrade" data-id="${id}">删除</span>
    </div>
  </div>
</div>
<div id="gradeSimepleTemplate" type="text/x-jquery-tmpl" style="display:none">
  <span data-id="${id}" data-trigger="grade">${name}</span>
</div>

<!--添加班级模板-->
<div id="ClassTemplate" type="text/x-jquery-tmpl" style="display:none">
  <div class="modal-edit__tr">
    <div class="col-md-2">
      <input type="text" name="name" class="form-control" value="${name}">
    </div>
    <div class="col-md-2">
      <input type="text" name="enteryear" class="datepicker form-control" value="${enteryear}">
    </div>
    <div class="col-md-6 ">
      <div class="modal-source-list">
        <div class="modal-source-sel">
          <div class="modal-source-unsel classcourseList">
            {{each(j,course) courses}}
            {{if course.isSelect==1}}
               <span data-id="${course.id}" class="on">${course.name}</span>
            {{else}}
               <span data-id="${course.id}">${course.name}</span>
            {{/if}}
            {{/each}}
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="school_id" value="${school_id}">
    <input type="hidden" name="grade_id" value="${grade_id}">
    <div class="col-md-2 del-icon">
      <span class="keep-btn saveclass" data-id="${id}">保存</span>
      <span class="del-btn delclass" data-id="${id}">删除</span>
    </div>
  </div>
</div>
<div id="ClassSimepleTemplate" type="text/x-jquery-tmpl" style="display:none">
  <span data-id="${id}" data-trigger="class">${name}</span>
</div>
<div id="GradeSelectTemplate" type="text/x-jquery-tmpl" style="display:none">
  <option value="${id}">${name}</option>
</div>

<div id="ClassSelectTemplate" type="text/x-jquery-tmpl" style="display:none">
  <option value="${id}">${name}</option>
</div>

<div id="setSchoolTimeTemplate" type="text/x-jquery-tmpl" style="display:none">
  <li class="col-md-12">
    <div class="col-md-6 text-right">开始时间</div>
    <div class="col-md-6">${start_date}</div>
  </li>
  <li class="col-md-12">
    <div class="col-md-6 text-right">结束时间</div>
    <div class="col-md-6">${end_date}</div>
  </li>
  <li class="col-md-12 give-time-input type-hide" >
    <div class="col-md-6 text-right">续期</div>
    <div class="col-md-6" data-trigger="input"><input type="text" name="month" number="true" required>月</div>
    <input type="hidden" name="user_id" value="${id}">
    <input type="hidden" name="school_id" value="<?=$school_id?>">
  </li>
</div>

<div id="setHomeTimeTemplate" type="text/x-jquery-tmpl" style="display:none">
  <li class="col-md-12">
    <div class="col-md-6 text-right">家装</div>
    <div class="col-md-6">
      <p class="type-show">
        {{if is_open_home == 1}}
          已开通
        {{else}}
           未开通
        {{/if}}
      </p>
      <select name="is_open_home" id="" class="type-hide">
        <option value="1">开通</option>
        <option value="0">关闭</option>
      </select>
    </div>
  </li>

  <li class="col-md-12 give-time-box">
    <div class="col-md-6 text-right">
      <div class="time-start-end ">
        <p>开始时间</p>
        <p>结束时间 </p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-daterange input-group" id="datepickerHome">
        <div>
          <input type="text" class="input-sm form-control" name="home_start_date" value="${home_start_date}" required="">
        </div>
        <div>
          <input type="text" class="input-sm form-control" name="home_end_date" value="${home_end_date}" required="">
        </div>
      </div>
    </div>
  </li>
    <li class="col-md-12 give-time-input type-hide" >
      <div class="col-md-6 text-right">续期</div>
      <div class="col-md-6" data-trigger="input"><input type="text" name="month" number="true">月</div>
      <input type="hidden" name="user_id" value="${id}">
      <input type="hidden" name="school_id" value="<?=$school_id?>">
    </li>
</div>


<div class="modal fade update-icon-box"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:800px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;
        </button>

      </div>
      <div class="modal-body">
        <h4 class="modal-title" id="myModalLabel">
          解锁课程
        </h4>
        <div class="update-body">
          <div class="clear">
              <div class="class-list" data-type="课程:" style="padding:5px 70px 10px 60px !important;">
                <div class="class-list-span" id="course-list-span">
                  <span class="" data-trigger="role" data-type="student">学生</span>
                  <span class="" data-trigger="role" data-type="teacher">老师</span>
                </div>
              </div>

            <div class="class-list" data-type="单元:" style="padding:5px 70px 10px 60px !important;">
              <div class="class-list-span" id="unit-list-span">
                <span class="" data-trigger="role" data-type="student">学生</span>
                <span class="" data-trigger="role" data-type="teacher">老师</span>
              </div>
            </div>

            <div class="class-list" data-type="操作:" style="padding:5px 70px 10px 60px !important;">
              <div class="class-list-span" id="operaiont-list-span">
                <span style="border: none"><button class="btn btn-success" id="unchainCourse">解锁选中课程</button></span>
                <span style="border: none"><button class="btn btn-primary" id="savechainCourse">锁止选中课程</button></span>
                <span style="border: none"><button class="btn btn-danger" id="unchainCourseUnit">解锁选中单元</button></span>
                <span style="border: none"><button class="btn btn-warning" id="savechainCourseUnit">锁止选中单元</button></span>
              </div>
            </div>
          </div>
          <div class="updated-list" id="lessonList">
          </div>
          <div id="paginatorlesson"></div>
        </div>
      </div>
      <div class="modal-footer mg-5">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭
        </button>
        <button type="button" class="btn btn-success" id="unchianLesson">
          确认解锁
        </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal -->
</div>

<a href="javascript:;" id="unchian" data-toggle="modal" data-target=".update-icon-box" style="display: none">选取文件</a>


<a href="#" class="btn btn-warning give-time-icon" id="give-time-school" style="display: none">
  授权时间
</a>
<a href="#" class="btn btn-info user-info-icon" id="user-info-edit" style="display: none">



<script src="<?=base_url()?>media/administrator/js/bootbox.min.js"></script>


<script>
  var grade_id = 0;
  var class_id = 0;
  var school_id = '<?=$school_id?>';
  var userItem = {id:0};
  var user_type = "all";
  var course_id = 0;
  var courseData = null;
  var unit_id = 0;
  var is_class = false;

  function getCourseList(){
    $("#course-list-span").empty();
    $("#unit-list-span").empty();
    is_class = false;
    if(userItem != null){
      $.ajax({
        type: "GET",
        async: false,
        url: '<?=anchorurl('AccountManage/getUserCourseList')?>/'+userItem.id,
        dataType:'json',
        success: function (data) {
          var coursestring = "";
          var unitstring = "";
          courseData = data;
          $(data.courseDetail).each(function(index,course){
            if(index == 0){
              course_id = course.id;
              coursestring += '<span class="on" data-trigger="course" data-id="'+course.id+'">'+course.name+'</span>';
              $(course.units).each(function(index2,unit){
                 if(index2 == 0){
                   unitstring += '<span class="on" data-trigger="unit" data-id="'+unit.id+'">'+unit.name+'</span>';
                   if(lessonList == null){
                     getLessonList(unit.id,userItem.id);
                   }else{
                     lessonList.load({
                       unit_id:unit.id,
                       user_id:userItem.id
                     });
                   }
                   unit_id = unit.id;
                 }else{
                   unitstring += '<span class="" data-trigger="unit" data-id="'+unit.id+'">'+unit.name+'</span>';
                 }
              });
            }else{
              coursestring += '<span class="" data-trigger="course" data-id="'+course.id+'">'+course.name+'</span>';
            }
          });
          $("#course-list-span").html(coursestring);
          $("#unit-list-span").html(unitstring);
          //console.log(msg);
        }
      });
    }
  }



  function getClassCourseList(){
    $("#course-list-span").empty();
    $("#unit-list-span").empty();
    is_class = true;
    userItem.id = 0;
    if(class_id != 0){
      $.ajax({
        type: "GET",
        async: false,
        url: '<?=anchorurl('AccountManage/getClassCourseList')?>/'+class_id,
        dataType:'json',
        success: function (data) {
          var coursestring = "";
          var unitstring = "";
          courseData = data;
          $(data.courseDetail).each(function(index,course){
            if(index == 0){
              course_id = course.id;
              coursestring += '<span class="on" data-trigger="course" data-id="'+course.id+'">'+course.name+'</span>';
              $(course.units).each(function(index2,unit){
                if(index2 == 0){
                  unitstring += '<span class="on" data-trigger="unit" data-id="'+unit.id+'">'+unit.name+'</span>';
                  if(lessonList == null){
                    getLessonList(unit.id,userItem.id);
                  }else{
                    lessonList.load({
                      unit_id:unit.id,
                      user_id:userItem.id
                    });
                  }
                  unit_id = unit.id;
                }else{
                  unitstring += '<span class="" data-trigger="unit" data-id="'+unit.id+'">'+unit.name+'</span>';
                }
              });
            }else{
              coursestring += '<span class="" data-trigger="course" data-id="'+course.id+'">'+course.name+'</span>';
            }
          });
          $("#course-list-span").html(coursestring);
          $("#unit-list-span").html(unitstring);
          //console.log(msg);
        }
      });
    }
  }



  $("body").undelegate('span[data-trigger="course"]', 'click').delegate('span[data-trigger="course"]', 'click', function () {
    if(!$(this).hasClass('on')) {
      $('span[data-trigger="course"]').removeClass('on');
      $(this).addClass('on');
      var id = $(this).data("id");
      course_id = id;
      if(courseData != null){
        var unitstring = "";
        $(courseData.courseDetail).each(function(index,course){
          if(course.id == id){
            $(course.units).each(function(index2,unit){
              if(index2 == 0){
                unitstring += '<span class="on" data-trigger="unit" data-id="'+unit.id+'">'+unit.name+'</span>';
                lessonList.load({
                  unit_id:unit.id,
                  user_id:userItem.id
                });
                unit_id = unit.id;
              }else{
                unitstring += '<span class="" data-trigger="unit" data-id="'+unit.id+'">'+unit.name+'</span>';
              }
            });
          }
        });
        $("#unit-list-span").html(unitstring);
      }
    }
  });


  $("body").undelegate('span[data-trigger="unit"]', 'click').delegate('span[data-trigger="unit"]', 'click', function () {
    if(!$(this).hasClass('on')) {
      $('span[data-trigger="unit"]').removeClass('on');
      $(this).addClass('on');
      var id = $(this).data("id");
      unit_id = id;
      lessonList.load({
        unit_id:id,
        user_id:userItem.id
      });
    }
  });


  $(function() {

    $("#UnchainClass").click(function(){
       if(class_id == 0){
         retisterLimitTip("请选择班级!");
       }else{
         $("#unchian").click();
         getClassCourseList();
       }
    });

    $("#unchianLesson").click(function(){
      var selectedRows =  lessonList.selectedRows();
      var index_array = new Array();
        for (var i = 0; i < selectedRows.length; i++) {
          index_array.push(selectedRows[i].id);
        }


        var selectedUserRows =  mmg.selectedRows();
        var user_array = new Array();
        for (var i = 0; i < selectedUserRows.length; i++) {
          user_array.push(selectedUserRows[i].id);
        }
        if(userItem.id != 0 ){
          user_array.push(userItem.id);
        }


          $.ajax({
            type: "POST",
            async: false,
            url: '<?=anchorurl('AccountManage/unChainUserLesson')?>',
            data: {
              user_ids: user_array.join(","),
              lesson_ids: index_array.join(","),
              course_id:course_id,
              unit_id:unit_id,
              class_id:class_id,
              is_class:is_class
            },
            success: function (msg) {
              retisterLimitTip("解锁成功");
            }
          });

      });


    $("#unchainCourse").click(function(){
      var selectedUserRows =  mmg.selectedRows();
      var user_array = new Array();
      for (var i = 0; i < selectedUserRows.length; i++) {
        user_array.push(selectedUserRows[i].id);
      }
      if(userItem.id != 0 ){
        user_array.push(userItem.id);
      }

      $.ajax({
        type: "POST",
        async: false,
        url: '<?=anchorurl('AccountManage/unChainAllCourse')?>',
        data: {
          user_ids: user_array.join(","),
          course_id:course_id,
          class_id:class_id,
          is_class:is_class
        },
        success: function (msg) {
          retisterLimitTip("解锁成功");
          lessonList.load();
        }
      });

    });


    $("#savechainCourse").click(function(){
      var selectedUserRows =  mmg.selectedRows();
      var user_array = new Array();
      for (var i = 0; i < selectedUserRows.length; i++) {
        user_array.push(selectedUserRows[i].id);
      }
      if(userItem.id != 0 ){
        user_array.push(userItem.id);
      }
      $.ajax({
        type: "POST",
        async: false,
        url: '<?=anchorurl('AccountManage/saveChainAllCourse')?>',
        data: {
          user_ids: user_array.join(","),
          course_id:course_id,
          class_id:class_id,
          is_class:is_class,
          unit_id:unit_id
        },
        success: function (msg) {
          retisterLimitTip("已经禁止使用课程全部内容");
          lessonList.load();
        }
      });

    });


    $("#unchainCourseUnit").click(function(){
      var selectedUserRows =  mmg.selectedRows();
      var user_array = new Array();
      for (var i = 0; i < selectedUserRows.length; i++) {
        user_array.push(selectedUserRows[i].id);
      }
      if(userItem.id != 0 ){
        user_array.push(userItem.id);
      }
      $.ajax({
        type: "POST",
        async: false,
        url: '<?=anchorurl('AccountManage/unChainAllCourseUnit')?>',
        data: {
          user_ids: user_array.join(","),
          course_id:course_id,
          class_id:class_id,
          is_class:is_class,
          unit_id:unit_id
        },
        success: function (msg) {
          retisterLimitTip("解锁成功");
          lessonList.load();
        }
      });

    });


    $("#savechainCourseUnit").click(function(){
      var selectedUserRows =  mmg.selectedRows();
      var user_array = new Array();
      for (var i = 0; i < selectedUserRows.length; i++) {
        user_array.push(selectedUserRows[i].id);
      }
      if(userItem.id != 0 ){
        user_array.push(userItem.id);
      }
      $.ajax({
        type: "POST",
        async: false,
        url: '<?=anchorurl('AccountManage/saveChainAllCourseUnit')?>',
        data: {
          user_ids: user_array.join(","),
          course_id:course_id,
          class_id:class_id,
          is_class:is_class,
          unit_id:unit_id
        },
        success: function (msg) {
          retisterLimitTip("已经禁止使用课本单元全部内容");
          lessonList.load();
        }
      });

    });


    /*
     *
     * 删除用户
     *
     */

    $("#DeleteUserBlock").click(function(){
      if(userItem == null){
        alert("请选择用户!");
      }else{
        bootbox.dialog({
          message: "您确定要删除吗？",
          title: "",
          buttons: {
            cancel: {
              label: "取消",
              className: "btn-success",
              callback: function () {
              }
            },
            confirm: {
              label: "删除",
              className: "btn-danger",
              callback: function () {
                $.ajax({
                  type: "POST",
                  async: false,
                  url: '<?=anchorurl('AccountManage/DeleteUserSchoolRelationShip')?>',
                  data: {
                    userid: userItem.id,
                    school_id: '<?=$school_id?>',
                  },
                  success: function (msg) {
                    retisterLimitTip("设置成功");
                    userItem = null;
                    mmg.load({key: $("#searchName").val()});
//                    $("#jsGrid").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
//                    });
                  }
                });
              }
            }
          }
        });
      }
    });

    /*
    *
    * 停用或者恢复单个用户
    *
    */

    $("#setUserBlock").click(function(){
      if(userItem == null){
        alert("请选择用户!");
      }else{
        $.ajax({
          type: "POST",
          async:false,
          url: '<?=anchorurl('AccountManage/setUserBlock')?>',
          data: {
            userid:userItem.id,
            block:userItem.block==1?0:1,
          },
          success: function (msg){
            retisterLimitTip("设置成功");
            if(userItem.block == 0){
              $("#setUserBlock").html('停用/恢复');
            }
            userItem = null;
            mmg.load({key: $("#searchName").val()});
//            $("#jsGrid").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
//            });
          }
        });
      }
    });


    /*设置家装学习时间*/

    $("#give-home-school").click(function(){
      if(userItem == null){
        alert("请选择用户!");
      }else{
        $('#home-time-body').empty();
        $("#setHomeTimeTemplate").tmpl(userItem).appendTo('#home-time-body');
        $('.diy-icon-box').modal('show');
        $("#datepickerHome").datepicker({
        });
      }
    });

    $("#sumbitAuthHomeTime").click(function(){
      if( $("#set-user-auth--home-form").valid()) {
        $("#set-user-auth--home-form").showLoading();
        $("#set-user-auth--home-form").ajaxForm({
          dataType: 'json',
          success: function (data) {
            console.log(data);
            $("#set-user-auth--home-form").hideLoading();
            if (data.errcode == 0) {
              //$("#update-user-form")[0].reset();
              retisterLimitTip("设置成功");
              mmg.load({key: $("#searchName").val()});
//              $("#jsGrid").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
//              });
//              $("#jsGrid1").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
//              });
              $('.diy-icon-box').modal('hide');
            }
          }
        }).submit();
      }
    });



    /*设置学习时间*/
    $("#give-time-school").click(function(){
      if(userItem == null){
        alert("请选择用户!");
      }else{
        $('#school-time-body').empty();
        $("#setSchoolTimeTemplate").tmpl(userItem).appendTo('#school-time-body');
        $('.give-time-icon-box').modal('show');
      }
    });

    $("#submitSchoolTime").click(function(){
      if( $("#set-user-auth-form").valid()) {
        $("#set-user-auth-form").showLoading();
        $("#set-user-auth-form").ajaxForm({
          dataType: 'json',
          success: function (data) {
            console.log(data);
            $("#set-user-auth-form").hideLoading();
            if (data.errcode == 0) {
              //$("#update-user-form")[0].reset();
              retisterLimitTip("设置成功");
              $("#jsGrid").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
              });
//              $("#jsGrid1").jsGrid("loadData", {key: $("#searchName").val()}).done(function () {
//              });
              $('.give-time-icon-box').modal('hide');
            }
          }
        }).submit();
      }
    });

    $("#user-info-edit").click(function(){
      if(userItem == null){
         alert("请选择用户!");
      }else{
        $('.user-info-icon-box').modal('show');
        $.ajax({
          type: "GET",
          url: '<?=anchorurl('AccountManage/getUserInfo')?>/'+userItem.id+'/<?=$school_id?>',
          beforeSend:function(){
            $("#update-user-form").showLoading();
          },
          success: function (data){
            $("#user-info-body").html(data);
            $("#update-user-form").hideLoading();
            updateValidata();
          }
        });
      }
    });

    function updateValidUserForm(){
      $("#update-user-form").validate({
        rules: {
          captcha: {
            required: true,
            minlength: 4,
            maxlength: 4
          },
          email: {
            email: true
          },
          password1: {
            minlength: 6,
            maxlength: 20,
            strongPsw: true
          },
          confirm_password1: {
            minlength: 6,
            maxlength: 20,
            equalTo: "#password1"
          }

        },
        messages: {
          captcha: {
            required: "请输入验证码",
            minlength: $.validator.format("请输入4位验证码"),
            maxlength: $.validator.format("请输入4位验证码")
          },
          email: {
            required: "请填写邮箱",
            email: $.validator.format("请输入正确的邮箱格式")
          },
          password1: {
            required: "请输入密码",
            minlength: $.validator.format("密码不能小于{0}个字符"),
            maxlength: $.validator.format("密码不能大于{0}个字符")

          },
          confirm_password1: {
            required: "请输入确认密码",
            minlength: $.validator.format("确认密码不能小于8个字符"),
            maxlength: $.validator.format("确认密码不能大于16个字符"),
            equalTo: "两次输入密码不一致不一致"
          }
        }
      });
    }

    function updateValidata() {
      updateValidUserForm();
      $("#submitUpdateUser").unbind('click').click(function () {
        if( $("#update-user-form").valid()){
          $("#update-user-form").showLoading();
          $("#update-user-form").ajaxForm({
            dataType: 'json',
            success: function (data) {
              console.log(data);
              $("#update-user-form").hideLoading();
              if (data.errcode == 0) {
                //$("#update-user-form")[0].reset();
                retisterLimitTip("更新成功");
                mmg.load({key: $("#searchName").val()});
               // $("#jsGrid").jsGrid("loadData", { key: $("#searchName").val() }).done(function() {});
                //$("#jsGrid1").jsGrid("loadData", { key: $("#searchName").val() }).done(function() {});
                $('.user-info-icon-box').modal('hide');
              }
            }
          }).submit();
        }
      });
    }


    $("#add-new-student").click(function(){
       $('.new-icon-box').modal('show');

       registerValidata();
    });
    //添加学生时选择课程
    $("#courseList span").click(function(){
       if($(this).hasClass("on")){
         $(this).removeClass("on");
       }else{
         $(this).addClass("on");
       }
      addnewStudentCourseIds();
    });


    $("#user-info-body").undelegate('#courseListEdit span', 'click').delegate('#courseListEdit span', 'click', function () {
        if($(this).hasClass("on")){
          $(this).removeClass("on");
        }else{
          $(this).addClass("on");
        }
        addEditStudentCourseIds();
    });

    function addEditStudentCourseIds(){
      var course_id_array = new Array();
      $("#user-info-body #courseListEdit span").each(function(index,element){
        if($(element).hasClass("on")){
          course_id_array.push($(element).data("id"));
        }
      });
      if(course_id_array.length >0){
        $("#course_ids_edit").val(course_id_array.join(","));
      }else{
        $("#course_ids_edit").val("");
      }
    }

    function addnewStudentCourseIds(){
      var course_id_array = new Array();
      $("#courseList span").each(function(index,element){
         if($(element).hasClass("on")){
           course_id_array.push($(element).data("id"));
         }
      });
      if(course_id_array.length >0){
        $("#course_ids_new").val(course_id_array.join(","));
      }else{
        $("#course_ids_new").val("");
      }
    }


      function passwordLevel(password) {
        var Modes = 0;
        for (var i = 0; i < password.length; i++) {
          Modes |= CharMode(password.charCodeAt(i));
        }
        return bitTotal(Modes);

        //CharMode函数
        function CharMode(iN) {
          if (iN >= 48 && iN <= 57)//数字
            return 1;
          if (iN >= 65 && iN <= 90) //大写字母
            return 2;
          if ((iN >= 97 && iN <= 122) || (iN >= 65 && iN <= 90)) //大小写
            return 4;
          else
            return 8; //特殊字符
        }

        //bitTotal函数
        function bitTotal(num) {
          modes = 0;
          for (i = 0; i < 4; i++) {
            if (num & 1) modes++;
            num >>>= 1;
          }
          return modes;
        }
      };

      jQuery.validator.addMethod("verfiYuser", function (value, element) {
        var return1 =false;
        $.ajax({
          type: "POST",
          async:false,
          url: '<?=anchorurl('register/verifyUser')?>',
          data: {
            username:$("#username").val()
          },
          success: function (msg){
            if(msg == 'false'){
              return1 = false;
            }else{
              return1 = true;
            }
          }
        });
        return return1;
      }, "账号已经被注册");
      jQuery.validator.addMethod("strongPsw", function (value, element) {
        if (passwordLevel(value) == 1) {
          return false;
        }
        return true
      }, "字母、数字、字符至少包含两种");


    function registerValidata(){
      $("#submitregister").unbind('click').click(function(){
        if( $("#register-form").valid()){
          $("#register-form").showLoading();
          $("#register-form").ajaxForm({
            dataType: 'json',
            success: function (data) {
              console.log(data);
              $("#register-form").hideLoading();
              if(data.errcode == 0){
                $("#register-form")[0].reset();
                retisterLimitTip("注册成功");
                mmg.load({key: $("#searchName").val()});
//                $("#jsGrid").jsGrid("loadData", { key: $("#searchName").val() }).done(function() {});
//                $("#jsGrid1").jsGrid("loadData", { key: $("#searchName").val() }).done(function() {});
                $('.new-icon-box').modal('hide');
              }
            }
          }).submit();
        }
      });
      $("#register-form").validate({
        rules: {
          username: {
            required: true,
            verfiYuser:true
          },
          captcha: {
            required: true,
            minlength: 4,
            maxlength: 4
          },
          email: {
            email: true

          },
          password: {
            required: true,
            minlength: 6,
            maxlength: 20,
            strongPsw: true
          },
          confirm_password: {
            required: true,
            minlength: 6,
            maxlength: 20,
            equalTo: "#password"
          }

        },
        messages: {
          username: {
            required: "请填写用户名",
            verfiYuser:$.validator.format("用户名已被注册!")
          },
          captcha: {
            required: "请输入验证码",
            minlength: $.validator.format("请输入4位验证码"),
            maxlength: $.validator.format("请输入4位验证码")
          },
          email: {
            required: "请填写邮箱",
            email: $.validator.format("请输入正确的邮箱格式")
          },
          password: {
            required: "请输入密码",
            minlength: $.validator.format("密码不能小于{0}个字符"),
            maxlength: $.validator.format("密码不能大于{0}个字符")

          },
          confirm_password: {
            required: "请输入确认密码",
            minlength: $.validator.format("确认密码不能小于8个字符"),
            maxlength: $.validator.format("确认密码不能大于16个字符"),
            equalTo: "两次输入密码不一致不一致"
          }
        }
      });
    }

    function getGradeList(){
      $.ajax({
        url: "<?=anchorurl('AccountManage/getGrades/'.$school_id)?>",
        type: "GET",
        dataType: 'json',
        success: function (data, textstatus) {
          $("#gradeList").empty();
          $("#gradeTemplate").tmpl(data).appendTo('#gradeList');
          $("#grade-list-span").empty();
          $("#gradeSimepleTemplate").tmpl(data).appendTo('#grade-list-span');
          $("#grade_ids").empty();
          $("#GradeSelectTemplate").tmpl(data).appendTo('#grade_ids');
          $.ajax({
            url: "<?=anchorurl('AccountManage/getClass')?>/"+grade_id,
            type: "GET",
            dataType: 'json',
            success: function (data, textstatus) {
              $("#class_ids").empty();
              $("#ClassSelectTemplate").tmpl(data).appendTo('#class_ids');

            }
          });
        }
      });
    }
    getGradeList();


    $("body").undelegate('#grade_update_ids', 'change').delegate('#grade_update_ids', 'change', function () {
      var id = $(this).val();
      $.ajax({
        url: "<?=anchorurl('AccountManage/getClass')?>/"+id,
        type: "GET",
        dataType: 'json',
        success: function (data, textstatus) {
          $("#class_update_ids").empty();
          $("#ClassSelectTemplate").tmpl(data).appendTo('#class_update_ids');

        }
      });
    });

    $("body").undelegate('#grade_ids', 'change').delegate('#grade_ids', 'change', function () {
      var id = $(this).val();
      $.ajax({
        url: "<?=anchorurl('AccountManage/getClass')?>/"+id,
        type: "GET",
        dataType: 'json',
        success: function (data, textstatus) {
          $("#class_ids").empty();
          $("#ClassSelectTemplate").tmpl(data).appendTo('#class_ids');

        }
      });
    });


    $("#classList").undelegate('.classcourseList span', 'click').delegate('.classcourseList span', 'click', function () {
      if($(this).hasClass("on")){
        $(this).removeClass("on");
      }else{
        $(this).addClass("on");
      }
    });


    function getClassList(){
      if(grade_id != 0 ){
        $.ajax({
          url: "<?=anchorurl('AccountManage/getClass')?>/"+grade_id,
          type: "GET",
          dataType: 'json',
          success: function (data, textstatus) {
            $("#classList").empty();
            $("#ClassTemplate").tmpl(data).appendTo('#classList');
            $("#class-list-span").empty();
            $("#ClassSimepleTemplate").tmpl(data).appendTo('#class-list-span');
          }
        });
      }
    }
    getClassList(grade_id);

    $("#classmodel").click(function(){
      if(grade_id == 0){
          alert("请选择年级");
      }else{
        $(".edit-grade").modal('show');
      }
    });
    $('.edit-class-btn,#classmodel').click(function() {
      $(".datepicker").datepicker({
        format: 'yyyy',
        autoclose: true,
        startView: 'decade',
        minView:'decade',
        maxView:'decade'
      });
    });

    $("#addgrade").click(function(){
      var data = {
        name:"",
        enteryear:"",
        id:0,
        school_id:'<?=$school_id?>',
      };
      $("#gradeTemplate").tmpl(data).appendTo('#gradeList');
      $(".datepicker").datepicker({
        format: 'yyyy',
        autoclose: true,
        startView: 'decade',
        minView:'decade',
        maxView:'decade'
      });
    });

    $("#addclass").click(function(){

      $.ajax({
        url: "<?=anchorurl('AccountManage/getSchoolCourses/'.$school_id)?>",
        type: "GET",
        dataType: 'json',
        async: false,
        success: function (courses, textstatus) {
          var data = {
            name:"",
            enteryear:"",
            id:0,
            school_id:'<?=$school_id?>',
            grade_id:grade_id,
            courses:courses
          };
          $("#ClassTemplate").tmpl(data).appendTo('#classList');
        }
      });


      $(".datepicker").datepicker({
        format: 'yyyy',
        autoclose: true,
        startView: 'decade',
        minView:'decade',
        maxView:'decade'
      });
    });

    $("#classList").undelegate('.delclass', 'click').delegate('.delclass', 'click', function () {
      var class_id = $(this).data('id');
      if(class_id == 0){
        $(this).parents('.modal-edit__tr').remove();
      }else{
        bootbox.dialog({
          message: "您确定要删除吗？",
          title: "",
          buttons: {
            cancel: {
              label: "取消",
              className: "btn-success",
              callback: function() {
              }
            },
            confirm: {
              label: "删除",
              className: "btn-danger",
              callback: function() {
                $.ajax({
                  url: "<?=anchorurl('AccountManage/deleteClass/'.$school_id)?>",
                  type: "POST",
                  dataType: 'json',
                  data:{
                    class_id:class_id,
                  },
                  async: false,
                  success: function (data, textstatus) {
                    $("#classList").empty();
                    $("#ClassTemplate").tmpl(data).appendTo('#classList');
                    $("#class-list-span").empty();
                    $("#ClassSimepleTemplate").tmpl(data).appendTo('#class-list-span');
                  }
                });
              }
            }
          }
        });
      }
    });


    $("#classList").undelegate('.saveclass', 'click').delegate('.saveclass', 'click', function () {
      var class_id_new = $(this).data('id');
      var name = $(this).parents('.modal-edit__tr').find("input[name='name']").val();
      var enteryear = $(this).parents('.modal-edit__tr').find("input[name='enteryear']").val();
      var school_id = <?=$school_id?>;
      var grade_id_new = $(this).parents('.modal-edit__tr').find("input[name='grade_id']").val();
      var coursearry = new Array();
      $(this).parents('.modal-edit__tr').find(".classcourseList span").each(function(index,element){
        if($(element).hasClass("on")){
           var course_id = $(element).data("id");
           coursearry.push(course_id);
        }
      });
      if(name.replace(/\s+/g,"") != "" && enteryear.replace(/\s+/g,"") != ""){
        $.ajax({
          url: "<?=anchorurl('AccountManage/addClass')?>/"+grade_id_new,
          type: "POST",
          dataType: 'json',
          data:{
            grade_id:grade_id_new,
            class_id:class_id_new,
            name:name,
            enteryear:enteryear,
            school_id:school_id,
            course_ids:coursearry.join(",")
          },
          async: false,
          success: function (data, textstatus) {
            $("#classList").empty();
            $("#ClassTemplate").tmpl(data).appendTo('#classList');
            $("#class-list-span").empty();
            $("#ClassSimepleTemplate").tmpl(data).appendTo('#class-list-span');
            retisterLimitTip("保存成功");
          }
        });
      }else{
        retisterLimitTip("请输入正确的内容!");
      }
    });



    $("body").undelegate('span[data-trigger="grade"]', 'click').delegate('span[data-trigger="grade"]', 'click', function () {
       if(!$(this).hasClass('on')) {
          $('span[data-trigger="grade"]').removeClass('on');
          $(this).addClass('on');
          grade_id = $(this).data('id');
          class_id = 0;

         mmg.load({"grade_id":grade_id,"class_id":class_id,"page":1});

         getClassList();
//         if(user_type == "student"){
//           $("#jsGrid").jsGrid("loadData", {page: 1}).done(function () {
//           });
//         }else{
//           $("#jsGrid1").jsGrid("loadData", {page: 1}).done(function () {
//           });
//         }
       }
    });



    $("body").undelegate('span[data-trigger="role"]', 'click').delegate('span[data-trigger="role"]', 'click', function () {
      if(!$(this).hasClass('on')) {
        $('span[data-trigger="role"]').removeClass('on');
        $(this).addClass('on');
        user_type = $(this).data('type');
        mmg.load({"type":user_type,"page":1});
      }
    });


    $("body").undelegate('span[data-trigger="class"]', 'click').delegate('span[data-trigger="class"]', 'click', function () {
      if(!$(this).hasClass('on')) {
        $('span[data-trigger="class"]').removeClass('on');
        $(this).addClass('on');
        class_id = $(this).data('id');
        mmg.load({"class_id":class_id,"page":1});
//        if(user_type == "student"){
//          $("#jsGrid").jsGrid("loadData", {page: 1}).done(function () {
//          });
//        }else{
//          $("#jsGrid1").jsGrid("loadData", {page: 1}).done(function () {
//          });
//        }
      }
    });


    $("#gradeList").undelegate('.delgrade', 'click').delegate('.delgrade', 'click', function () {
      var grade_id_new = $(this).data('id');
      if(grade_id_new == 0){
        $(this).parents('.edit-tr').remove();
      }else{
        bootbox.dialog({
          message: "您确定要删除吗？",
          title: "",
          buttons: {
            cancel: {
              label: "取消",
              className: "btn-success",
              callback: function() {
              }
            },
            confirm: {
              label: "删除",
              className: "btn-danger",
              callback: function() {
                $.ajax({
                  url: "<?=anchorurl('AccountManage/deleteGrade/'.$school_id)?>",
                  type: "POST",
                  dataType: 'json',
                  data:{
                    grade_id:grade_id_new,
                  },
                  async: false,
                  success: function (data, textstatus) {
                    $("#gradeList").empty();
                    $("#gradeTemplate").tmpl(data).appendTo('#gradeList');
                    $("#grade-list-span").empty();
                    $("#gradeSimepleTemplate").tmpl(data).appendTo('#grade-list-span');
                  }
                });
              }
            }
          }
        });
      }
    });


    $("#gradeList").undelegate('.savegrade', 'click').delegate('.savegrade', 'click', function () {
        var grade_id_new = $(this).data('id');
        var name = $(this).parents('.edit-tr').find("input[name='name']").val();
        var enteryear = $(this).parents('.edit-tr').find("input[name='enteryear']").val();
        var school_id = $(this).parents('.edit-tr').find("input[name='school_id']").val();
        $.ajax({
          url: "<?=anchorurl('AccountManage/addGrades/'.$school_id)?>",
          type: "POST",
          dataType: 'json',
          data:{
            grade_id:grade_id_new,
            name:name,
            enteryear:enteryear,
            school_id:school_id
          },
          async: false,
          success: function (data, textstatus) {
            $("#gradeList").empty();
            $("#gradeTemplate").tmpl(data).appendTo('#gradeList');
            $("#grade-list-span").empty();
            $("#gradeSimepleTemplate").tmpl(data).appendTo('#grade-list-span');
            retisterLimitTip("保存成功");
          }
        });
    });

    /*
    * 搜索用户
    *
    */

    $(document).keypress(function(e) {
      // 回车键事件

      if(e.which == 13) {
        mmg.load({key: $("#searchName").val()});
//        $("#jsGrid").jsGrid("loadData", { key: $("#searchName").val() }).done(function() {
//
//        });
      }
    });





    $('.input-daterange').datepicker({});
//    基本信息修改

    $('.change-btn,.btn-cancel').click(function(){
      var oParents = $(this).parents('div.modal'),
          _this = $(this).attr('data-type');
      oPFun(oParents,_this);
    });
    function oPFun(config,_this){
      var  oHide = config.find('.type-hide'),
          oShow = config.find('.type-show');
      if( _this == 'show'){
        oShow.fadeOut();
        oHide.fadeIn();
      }else if(_this =='hide'){
        oShow.fadeIn();
        oHide.fadeOut();
      }
    }
//    课程选择
    $('.source-sel span,.root-class-list span').click(function(){
      var oClass = $(this).attr('class');
      if(oClass == 'on'){
        $(this).removeClass('on');
      }else{
        $(this).addClass('on');
      }
    });
//    tab切换
    var clicki = 0;
    $('.tab-tit div').click(function(){
      var oEleSib = $(this).parents('.tab-box').find('.tab-con>div'),
          oInd = $(this).index();
          $(this).addClass('on').siblings('div').removeClass('on');
          oEleSib.eq(oInd).addClass('on').siblings('div').removeClass('on');
        user_type = "student";
        if($(this).data('type') == 'teacher' && clicki ==0){
          getTeacherList();
          user_type = "teacher";
          clicki++;
        }
    });


  });
</script>
<script type="text/javascript" src="<?=base_url()?>media/administrator/js/users.js"></script>
  <script type="text/javascript" src="<?=base_url()?>media/administrator/js/chainlessonlist.js"></script>
</body>
</html>