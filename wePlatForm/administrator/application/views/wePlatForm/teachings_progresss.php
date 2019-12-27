<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php $this->load->view('wePlatForm/tmpl/title'); ?>
  <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
  <?php $this->load->view('wePlatForm/meta'); ?>
  <?php $this->load->view('tmpl/mmgrid');?>
  <?php $this->load->view('tmpl/jqueryvalidate');?>
</head>
<body>
<div class="container-fluid RegionalArchives">
  <div class="row">
    <!-- 左侧菜单 start -->
    <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
    <!-- 左侧菜单 end -->
    <div class="col-md-9 ra--main-wrapper">
      <!--菜单切换 start-->
      <?=$this->load->view("wePlatForm/tmpl/headernav")?>
      <!--菜单切换 end-->
      <!--面包屑 start-->
      <nav class="common-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
          <li class="breadcrumb-item active"><a href="javascript:;" aria-current="page">教学进度管理</a></li>
        </ol>
      </nav>
      <!--面包屑 end-->
      <!--主体内容 start-->
      <div class="ra--main__content" data-before="教学进度列表（总）">
        <div class="form-row">
          <div class="col-3 form-row__item" data-before="教师名称：">
            <input type="text" class="form-control form-control-sm" name="name"  placeholder="教师名称" id="teacherName">
          </div>
          <div class="col-5 form-row__item" data-before="选择时间：">
            <input type="text" id="startTime" class="form-control form-control-sm" placeholder="开始时间">
            至
            <input type="text" id="endTime" class="form-control form-control-sm" placeholder="结束时间">
          </div>
          <div class="col-3 form-row__item form-row__search" data-before="进度名称：">
            <input type="text" class="form-control form-control-sm"  placeholder="进度名称" id="searchName">
            <button type="button" class="btn btn-light btn-search" id="searchButton">
              <i class="icon-search"></i>
            </button>
          </div>
        </div>
        <div class="common-table">
          <div id="mmGrid"></div>
          <div id="paginator"></div>
        </div>
      </div>
      <!--主体内容 end-->
    </div>
  </div>
</div>
<div class="modal fade commonModal new-icon-box" id="materia_resources_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">创建教学进度</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open('teachingschedules/addteachingschedule', 'class="form form-group" id="resource-form" enctype="multipart/form-data"'); ?>
      <div class="modal-body">
        <div class="_input-group">
          <div class="form-row" data-before="进度名称：">
            <div class="form-group col-md-8">
              <input class="form-control form-control-sm" name="name" type="text" placeholder="进度名称" required>
            </div>
          </div>
        </div>
        <div class="_input-group">
          <div class="form-row" data-before="区域选择：">
            <div class="form-group col-md-8">
              <select name="region_id" id="region_new"  class="form-control form-control-sm">
                <option value="0">--区域选择--</option>
                <?php foreach($regions as $region):?>
                  <option value="<?=$region->id?>"><?=$region->name?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
        </div>

        <div class="_input-group">
          <div class="form-row" data-before="学校选择：">
            <div class="form-group col-md-8">
              <select name="school_id" id="school_new" class="form-control form-control-sm">
                <option value="0">--学校选择--</option>
                <?php foreach($schools as $school):?>
                  <option value="<?=$school->id?>"><?=$school->name?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
        </div>

        <div class="_input-group">
          <div class="form-row" data-before="选择老师：">
            <div class="form-group col-md-8">
              <select name="teacher_ids[]" id="teacher_new" class="form-control form-control-sm" size="2" multiple>
                <option value="0">--选择老师--</option>
                <?php foreach($teachers as $teacher):?>
                  <option value="<?=$teacher['id']?>"><?=$teacher['school_name']."-".$teacher['name']?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
        </div>

        <div class="_input-group _input-date-group">
          <div class="form-row" data-before="任务周期：">
            <div class="form-group col-md-4">
              <input type="text" class="form-control form-control-sm datepicker" placeholder="开始日期" name="start_date">
            </div>
            至
            <div class="form-group col-md-4">
              <input type="text" class="form-control form-control-sm datepicker" placeholder="结束日期" name="end_date">
            </div>
          </div>
        </div>

        <div class="_input-group">
          <div class="form-row" data-before="任务描述：">
            <div class="form-group col-md-8">
              <textarea type="text" rows="3" name="description" placeholder="任务描述" class="form-control form-control-sm"></textarea>
            </div>
          </div>
        </div>
        <div class="_input-group">
          <div class="form-row" data-before="附件：">
            <div class="form-group col-md-8">
              <div class="custom-file-control">
                <input type="file" name="file" class="btn-file">
                <a href="javascript:;" class="btn-choose">选择</a>
              </div>
              <div class="custom-file-list">
                <ul>
                  <li title="zip">
                    <i class="icon icon-zip">
                      <b class="path3"></b>
                    </i>
                  </li>
                  <li title="word">
                    <i class="icon icon-word"></i>
                  </li>
                  <li title="ppt">
                    <i class="icon icon-ppt"></i>
                  </li>
                  <li title="file">
                    <i class="icon icon-file"></i>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-primary btn-save" id="createTeachingSchedule">保存</button>
          <!--              <button type="button" class="btn btn-primary btn-submit">提交审核</button>-->
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade commonModal new-icon-box" id="materia_edit_resources_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">创建教学进度</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open('teachingschedules/updateteachingschedule', 'class="form form-group" id="resource_edit_form" enctype="multipart/form-data"'); ?>
      <div class="modal-body" id="teachingschedulesbody">


      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-primary btn-save" id="updateTeachingSchedule">保存</button>
          <!--              <button type="button" class="btn btn-primary btn-submit">提交审核</button>-->
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

<a href="#" class="btn btn-info setting-icon" id="teachingschedule_settings" data-toggle="modal" data-target="#materia_edit_resources_modal" style="display: none">
  基本设置
</a>
<script type="text/javascript" src="<?=base_url()?>media/wePlatForm/js/teachingprogress.js"></script>
<script>
  var userItem  = null;
  $(document).ready(function () {

    $("#teachingschedule_settings").click(function(){
      if(userItem == null){
        alert("请选择教学进度!");
      }else{
        $.ajax({
          type: "GET",
          url: '<?=anchorurl('teachingschedules/getTeachingscheduleInfo')?>/'+userItem.id,
          beforeSend:function(){
            $("#resource_edit_form").showLoading();
          },
          success: function (data){
            $("#teachingschedulesbody").html(data);
            $("#resource_edit_form").hideLoading();
          }
        });
      }
    });

    $("#resource-form").validate();
    $(".datepicker").datepicker({

    });
    $("#region_new").change(function(){
      $.ajax({
        url: "<?=anchorurl('teachingschedules/getSchoolList')?>/"+$(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var schools = '<option value="0">--请选择学校--</option>';
          $(data.schools).each(function(index,element){
            schools += '<option value="'+element.id+'">'+element.name+'</option>';
          });
          $("#school_new").html(schools);

          var teachers = "";
          $(data.teachers).each(function(index,element){
            teachers += '<option value="'+element.id+'">'+element.school_name+"-"+element.name+'</option>';
          });
          $("#teacher_new").html(teachers);

        }
      });
    });

    $("#school_new").change(function(){
      $.ajax({
        url: "<?=anchorurl('teachingschedules/getTeacherList')?>/"+$("#region_new").val()+"/"+$(this).val(),
        type: "get",
        dataType: 'json',
        async: false,
        success: function (data, textstatus) {
          var teachers = "";
          $(data.teachers).each(function(index,element){
            teachers += '<option value="'+element.id+'">'+element.school_name+"-"+element.name+'</option>';
          });
          $("#teacher_new").html(teachers);

        }
      });
    });

    $("#createTeachingSchedule").on("click", function(){
      if( $("#resource-form").valid()){
        $("#createTeachingSchedule").showLoading();
        $("#resource-form").ajaxForm({
          dataType: 'json',
          success: function (data) {
            console.log(data);
            $("#createTeachingSchedule").hideLoading();
            $("#materia_resources_modal").modal("hide");
              $("#resource-form")[0].reset();
            mmg.load();
          }
        }).submit();
      }
    });

    $("#updateTeachingSchedule").on("click", function(){
      if( $("#resource_edit_form").valid()){
        $("#updateTeachingSchedule").showLoading();
        $("#resource_edit_form").ajaxForm({
          dataType: 'json',
          success: function (data) {
            console.log(data);
            $("#updateTeachingSchedule").hideLoading();
            $("#materia_edit_resources_modal").modal("hide");
            $("#resource_edit_form")[0].reset();
            mmg.load();
          }
        }).submit();
      }
    });

    $("#startTime").datepicker({
      format: 'yyyy-mm-dd'
    });
    $("#endTime").datepicker({
      format: 'yyyy-mm-dd'
    });

    $("#searchButton").click(function(){
      mmg.load({
        "start_date":$("#startTime").val(),
        "end_date":$("#endTime").val(),
        "teacherName":$("#teacherName").val(),
        "searchName":$("#searchName").val(),
      });
    });


    $(document).keypress(function(e) {
      // 回车键事件

      if(e.which == 13) {
        $("#searchButton").click();
      }
    });


  })
</script>
</body>
</html>
