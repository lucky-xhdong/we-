<link rel="stylesheet" href="<?= base_url() ?>media/js/com_ideaforms/css/vendor.css">
<link rel="stylesheet" href="<?= base_url() ?>media/js/com_ideaforms/css/formbuilder.css">
<link rel="stylesheet" href="<?= base_url() ?>media/js/com_ideaforms/jquery-ui/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/course.css">
<!--navbar start-->
<?php $this->load->view('topheader');?>
<!--navbar end-->
<script type="text/javascript" src="<?= base_url() ?>media/js/tiny_mce/tiny_mce.js"></script>
<script src="<?= base_url() ?>media/js/com_ideaforms/widget.js"></script>
<script src="<?= base_url() ?>media/js/com_ideaforms/jquery.validate.js"></script>
<script src="<?= base_url() ?>media/js/com_ideaforms/js/jquery.ui.widget.js"></script>
<script src="<?= base_url() ?>media/js/com_ideaforms/js/idea_form_builder.js"></script>
<script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/jquery-ui/ui/jquery-ui.js"></script>
<script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/ie8-node-enum/index.js"></script>
<script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/underscore/underscore.js"></script>
<script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/underscore.mixin.deepExtend/index.js"></script>
<script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/jquery.scrollWindowTo/index.js"></script>
<script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/backbone/backbone.js"></script>
<script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/backbone-deep-model/distribution/deep-model.js"></script>
<script src="<?= base_url() ?>media/js/com_ideaforms/bower_components/rivets/dist/rivets.js"></script>
<script src="<?= base_url() ?>media/js/com_ideaforms/js/formbuilder.js"></script>
<?php
$controller = $this->uri->segment(1);
?>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row">
        <!--左厕菜单 start-->
        <?php $this->load->view('aside');?>
        <!--左厕菜单 end-->
        <section class="main-carema-list">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <a href="<?= anchorurl('formarticles') ?>">内容管理</a>
                    </li>
                    <li>
                        <a <?php if ($controller == 'formarticles') echo 'class="active"'; else echo 'class=""'; ?> href="javascript:;">问卷表单</a>
                    </li>
                </ul>
            </div>
            <nav class="nav-section">
                <ul>
                    <li><?=anchor('formarticles/index/','问卷列表')?></li>
                    <li><?=anchor('formarticles/add/','创建问卷', 'class="current"')?></li>
                </ul>
            </nav>
            <!--右厕内容 start-->
            <?php if (isset($article->id)): ?>
                <?php echo form_open('formarticles/addcontent/' . $article->id,'id="formbuild"'); ?>
            <?php else: ?>
                <?php echo form_open('formarticles/addcontent/','id="formbuild"'); ?>
            <?php endif; ?>
            <li>
                <span>标题:</span>
                <input type="text" class="form-control" id="title" name="title" placeholder="请输入标题"
                       value="<?php if (isset($article->id)) echo $article->title; ?>"/>
            </li>
            <div class="cf-h"></div>
            <div class="carema-lists">

                <div class="publish-to" id="form-builder"></div>
            </div>
            <div class="cf-h"></div>
            <li class="text-b">
                <input type="hidden" name="catid" value="<?=$categoryid?>">
                <input type="hidden" name="metadata" id="form_json">
                <button class="btn btn-primary mar-l-a btn-new-c" type="submit" id="btn-save">保存</button>
            </li>
            <div class="cf-h"></div>
            <?php echo form_close(); ?>
    </div>
    </section>
    <!--右厕内容 end-->
</div>
<?php echo form_open('articles/addimage', 'name="imageform" id="imageform" enctype="multipart/form-data"'); ?>
<input type="file" name="file" id="file" style="display:none">
<?php echo form_close(); ?>
<script>
    $(document).ready(function(e) {
        var formbuilder = new Formbuilder({ selector: '#form-builder' ,  bootstrapData : <?= isset($article->id) ? $article->metadata : "[]"?>});
        $("#btn-save").click(function(e){
            //TODO preview now
            e.preventDefault();
            if(!$("#formbuild").valid())
                return;
            bootbox.dialog({
                message: "请确认表单是否正确",
                title: "请确认表单是否正确",
                buttons: {
                    cancel: {
                        label: "我要修改",
                        className: "btn-danger",
                        callback: function() {
                        }
                    },
                    confirm: {
                        label: "没问题，确定",
                        className: "btn-success",
                        callback: function() {
                            $("#form_json").val(JSON.stringify(formbuilder.getForm()));
                            $("#formbuild").submit();
                        }
                    }
                }
            });
            // $(".bootbox-body").buildForm({items: formbuilder.getForm(), preview : true});
        });
        $("#formbuild").validate({messages:false, ignore : ":hidden,#form-builder :input,input[readonly]"});
    });
</script>
</div>
</body>
</html>
