<?php $this->load->view('topheader');?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/course.css">
<script type="application/javascript">
    var baseUrl='<?= base_url() ?>';
</script>
<script src="<?=base_url()?>media/js/jquery.ui.widget.js"></script>
<script src="<?=base_url()?>media/js/jquery.fileupload.js"></script>
<script src="<?=base_url()?>media/js/tinymce/tinymce.jquery.dev.js"></script>
<script src="<?=base_url()?>media/js/tinymce/idea-editor.js"></script>
<script src="<?=base_url()?>media/js/tinymce/idea-editor-add.js"></script>
<script src="<?=base_url()?>media/js/jquery.form.js"></script>
<script>
    var imagetype = 'editor';
    $(document).ready(function(e) {
        $("#inserimage").click(function(){
            $('#file').click();
            imagetype = 'editor';
        });
        $('#file').on('change', function() {
            $("#imageform").ajaxForm({
                dataType:'json',
                success : function(data) {
                    if(imagetype == 'editor'){
                        tinyMCE.execCommand('mceInsertContent',true,'<img src="<?=base_url().pictureurl(0)?>'+data.filename+'" data-mce-src="<?=base_url().pictureurl(0)?>'+data.filename+'">');
                    }else{
                        $("#coverimage").html('<img src="<?=base_url().pictureurl(0)?>'+data.filename+'" width="100">');
                       // $("#rawname").val(data.rawname);
                        $("#urls").val(data.filename);
                    }
                }
            }).submit();
        });
        $("#cover").click(function(){
            imagetype = 'cover';
            $('#file').click();
        });
    });
</script>
<?php
$controller = $this->uri->segment(1);
$action = $this->uri->segment(2);
?>
<section class="course-pubish-content">
    <?php $this->load->view('aside');?>
    <main class="main-carema-list">
        <div class="course-content-body">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <a href="<?= anchorurl('course/index') ?>">课程列表</a>
                    </li>
                    <li>
                        <a  href="<?= anchorurl('course/content') ?>">内容管理</a>
                    </li>
                    <li>
                        <a <?php if ($controller == 'course' && $action == 'publishcontent') echo 'class="active"'; else echo 'class=""'; ?> href="javascript:;">发内容</a>
                    </li>
                </ul>
            </div>
            <?php if(isset($content->id)):?>
                 <form class="upload-form" id="uploadForm" action="<?=anchorurl('course/addSyllabusContent/'.$content->id)?>"  method="post" enctype="multipart/form-data" data-behavior="FormValidator ComposerForm">
            <?php else:?>
                <form class="upload-form" id="uploadForm" action="<?=anchorurl('course/addSyllabusContent')?>"  method="post" enctype="multipart/form-data" data-behavior="FormValidator ComposerForm">
                <?php endif;?>
                <div class="input-group" data-before="标题：">
                    <input type="text" placeholder="活动标题(可输入50个字，必填)" name="title" class="form-control input-active-caption"
                           value="<?php if(isset($content->id)) echo $content->title; ?>"/>
                </div>
                <div class="input-group" data-before="学习目标：">
                    <textarea name="goal"  cols="30" rows="5" placeholder="学习目标" class="form-control"><?php if(isset($content->id)) echo $content->goal;?></textarea>
                </div>
                <div class="input-group" data-before="考核要求：">
                    <textarea name="assessment" id="" cols="30" rows="5" placeholder="考核要求" class="form-control"><?php if(isset($content->id)) echo $content->assessment;?></textarea>
                </div>
                <div class="input-group" data-before="图片：">
                    <div class="dis-table-cell cover-image">
                        <button type="button" class="btn btn-default" id="cover">选取</button>
                        <figure class="dis-c pad-h-b" id="coverimage">
                            <?php if (isset($content) && !empty($content->fileurl)): ?>
                                <?php
                                $url = pictureurlsizeipregnant('big', $content->fileurl);
                                ?>
                                <img src="<?= $url ?>" width="100">
                            <?php endif; ?>
                        </figure>
                    </div>
                </div>
                <div class="input-group" data-before="内容：">
                    <div class="btn-editor" id="editor_toolbar"></div>
                    <div class="editor" id="body" style="height: 300px;">
                        <?php if(isset($content->id)) echo $content->body;?>
                    </div>
                </div>
                <div class="btn-course-group">
                    <input type="hidden" name="body">
                    <input type="hidden" name="fileurl" id="urls">
                    <input type="hidden" name="syllabus_id" value="<?=$syllabus_id?>">
                    <button type="button" class="btn btn-success" id="idea_content">保存</button>
                    <button type="button" class="btn btn-default" onclick="history.go(-1);">取消</button>
                </div>
            </form>
        </div>
    </main>
</section>
<?php echo form_open('course/addimage/', 'id="imageform" enctype="multipart/form-data"'); ?>
<input type="file" name="file" id="file" style="display:none">
<?php echo form_close(); ?>
<script>
    var  editor="";
    $(document).ready(function (e) {
        editor = new IdeatreeEditor({
            renderTo : "#body",
            toolbar : "#editor_toolbar",
            urlPrefix : '',
            buttons : {
                bold : "btn_bold",
                italic : "btn_italic",
                bullet_list : "btn_sign_dot",
                numbered_list : "btn_sign_num"
            }
        });

        $("#idea_content").click(function(e) {
                e.preventDefault();
             editor.handleContent(function(contentObj) {
                    $("input[name='body']").val(contentObj.content);
                });
            $("#uploadForm").submit();
        });
    });
</script>