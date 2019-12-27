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
<div class="container-fluid TeachingProgress">
    <div class="row">
        <!-- 左侧菜单 start -->
        <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
        <!-- 左侧菜单 end -->
        <div class="col-md-9 tp--main-wrapper">
            <!--菜单切换 start-->
            <?=$this->load->view("wePlatForm/tmpl/headernav")?>
            <!--菜单切换 end-->
            <!--面包屑 start-->
            <nav class="common-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
                    <li class="breadcrumb-item active" aria-current="page">教学进度</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="tp--main__content">
                <!--教学进度 start-->
                <div class="basic-info" data-before="教学进度 -- <?=$teachingschedule->name?>">
                    <ul>
                        <li data-before="计划周期：">
                            <p>
                                <?php if($teachingschedule->start_date != "0000-00-00" && $teachingschedule->end_date != "0000-00-00"):?>
                                    <?=date("Y年n月d日",strtotime($teachingschedule->start_date))?>—— <?=date("Y年n月d日",strtotime($teachingschedule->end_date))?>
                                <?php else:?>
                                      <?=$teachingschedule->start_date?>---<?=$teachingschedule->end_date?>
                                <?php endif;?>
                            </p>
                        </li>
                        <li data-before="计划内容：">
                            <p>
                                <?=$teachingschedule->description?>
                            </p>
                        </li>
                    </ul>
                </div>
                <!--教学进度 end-->
                <!--参考资料 start-->
                <div class="reference-resource" data-before="参考资料">
                    <ul>
                        <?php foreach($filelist as $file):?>
                        <li>
                            <div class="img-wrapper">
                                <a href="javascript:;" date-trigger="fileView" data-id="<?=$file['id']?>">
                                    <img src="<?=base_url()?>media/wePlatForm/images/img-resource-01.jpg" alt="">
                                </a>
                                <span class="img-icon">
                                      <?php
                                      $resourceInfo = $file['resourceInfo'];
                                      ?>
                                    <?php if($resourceInfo['type'] == "image"):?>
                                       <img src="<?=$resourceInfo['url']?>" width="60;" />
                                    <?php elseif($resourceInfo['type'] == "audio"):?>
                                        <i class="icon icon-audio"></i>
                                    <?php elseif($resourceInfo['type'] == "video"):?>
                                        <i class="icon icon-video"></i>
                                    <?php elseif($resourceInfo['type'] == "zip"):?>
                                        <i class="icon icon-zip"></i>
                                    <?php elseif($resourceInfo['type'] == "word"):?>
                                        <i class="icon icon-word"></i>
                                    <?php elseif($resourceInfo['type'] == "ppt"):?>
                                        <i class="icon icon-ppt"></i>
                                    <?php elseif($resourceInfo['type'] == "excel"):?>
                                        <i class="icon icon-excel"></i>
                                    <?php elseif($resourceInfo['type'] == "file"):?>
                                        <i class="icon icon-file"></i>
                                    <?php endif;?>
                                </span>
                                <span class="img-badge"><?=$file['resource_type_name']?></span>
                            </div>
                            <div class="txt-wrapper">
                                <span class="txt"><?=$file['name']?></span>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <!--参考资料 end-->
                <!--教学任务 start-->
                <div class="teaching-task" data-before="教学任务">
                    <ul>
                        <?php foreach($tasks as $task):?>
                            <?php
                           $filelists = $this->materialresource->getResourceInfoListByIds($task['material_resource_ids']);

                            ?>
                        <li>
                            <div class="title-group">
                                <span><?=$task['name']?></span>
                            </div>
                            <div class="txt-group">
                                <p><?=$task['description']?></p>
                            </div>
                            <div class="resource-lists" data-before="配套资料">
                                <?php foreach($filelists as $key=> $file):?>
                                    <?php
                                    if($key >2) break;
                                    ?>
                                <a class="resource-lists_item" href="javascript:;" date-trigger="fileView" data-id="<?=$file['id']?>">
                                    <?php
                                     if($key >2) continue;
                                    $resourceInfo = $file['resourceInfo'];

                                    ?>
                                    <?php if($resourceInfo['type'] == "image"):?>
                                        <img src="<?=$resourceInfo['url']?>" width="23px"  height="23px" />
                                    <?php elseif($resourceInfo['type'] == "audio"):?>
                                        <i class="icon icon-audio"></i>
                                    <?php elseif($resourceInfo['type'] == "video"):?>
                                        <i class="icon icon-video"></i>
                                    <?php elseif($resourceInfo['type'] == "zip"):?>
                                        <i class="icon icon-zip"></i>
                                    <?php elseif($resourceInfo['type'] == "word"):?>
                                        <i class="icon icon-word"></i>
                                    <?php elseif($resourceInfo['type'] == "ppt"):?>
                                        <i class="icon icon-ppt"></i>
                                    <?php elseif($resourceInfo['type'] == "excel"):?>
                                        <i class="icon icon-excel"></i>
                                    <?php elseif($resourceInfo['type'] == "file"):?>
                                        <i class="icon icon-file"></i>
                                    <?php endif;?>
                                </a>
                                <?php endforeach;?>
                            </div>
                            <div class="btn-group fileprogress">
                                <?php if(!empty($task['file_id'])):?>
                                    <a href="javascript:;" class="btn-upload">已上传</a>
                                <?php else:?>
                                <span class="txt-percent" style="display: none"></span>
                                <input type="file" class="btn-upload-file upload-file" name="file"  data-url="<?=anchorurl("fileupload/addTeachingscheduleTypeFile/".$task['id']."/0/teachingschedule")?>" >
                                <a href="javascript:;" class="btn-upload">上传文件</a>
                                <?php endif;?>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <div id="paginator" class="custom-pager">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
                <!--教学任务 end-->
            </div>
            <!--主体内容 end-->
        </div>
    </div>
    <div class="modal fade commonModal check-icon-box modal-nor" data-type = 1 role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php echo form_open('', 'class="form form-group" id="resource-check-form"'); ?>
                <div class="modal-header">
                    <h5 class="modal-title">素材</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-box">
                        <div id="check-info-body" class="text-center basic-info pag-15 minH-200">

                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>
    <script>
        $(document).ready(function () {
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
            });


            $('.upload-file').fileupload({
                dataType: 'json',
                progressall: function (e, data) {
                    console.log($(this));
                    $(this).attr("disabled","disabled");
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    if(progress == 0 || progress == 100){
                        $(this).siblings(".txt-percent").hide();
                    }else{
                        $(this).siblings(".txt-percent").show();
                    }

//                    $('#progress .bar').css(
//                        'width',
//                        progress + '%'
//                    );
                    $(this).siblings(".txt-percent").html( progress + '%');
                },
                done: function (e, data) {
//              $.each(data.result.files, function (index, file) {
//                  $('<p/>').text(file.name).appendTo(document.body);
//              });
                    $(this).siblings(".txt-percent").hide();
                    $(this).parents(".fileprogress").html('<a href="javascript:;" class="btn-upload">已上传</a>');
                    //fileList.load({page: 1});
                }
            });

            $("body").undelegate('a[date-trigger="fileView"]', 'click').delegate('a[date-trigger="fileView"]', 'click', function () {
                $('.check-icon-box').modal('show');
                var file_id = $(this).data("id");
                $.ajax({
                    type: "GET",
                    url: '<?=anchorurl('teaching_progress/getResourceFileInfo')?>/'+file_id,
                    beforeSend:function(){
                        $("#resource-check-form").showLoading();
                    },
                    success: function (data){
                        $("#check-info-body").html(data);
                        $("#resource-check-form").hideLoading();
                    }
                });
            });

            $("body").undelegate('#downloadfile', 'click').delegate('#downloadfile', 'click', function () {
                if($(this).val() != ""){
                    window.open($(this).val());
                }else{
                    retisterLimitTip("文件不存在或者文件无法浏览,请稍后再试");
                }
            });

            $('.check-icon-box').on('hide.bs.modal', function () {
               $("#check-info-body").html("");
            });

        })
    </script>
</body>
</html>
