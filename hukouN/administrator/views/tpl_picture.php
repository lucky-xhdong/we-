<!--navbar start-->
<?php $this->load->view('topheader'); ?>
<!--navbar end-->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/course.css">
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.form.js"></script>
<script type="text/javascript" src="<?= base_url() ?>media/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode: "textareas",
        theme: "advanced",
        relative_urls: false,
        remove_script_host: false,
        plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

        // Theme options
        theme_advanced_buttons1: "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: false,
        theme_advanced_resizing: true,

        // Example content CSS (should be your site CSS)
        content_css: "<?=base_url()?>media/css/content.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url: "<?=base_url()?>media/js/lists/template_list.js",
        external_link_list_url: "<?=base_url()?>media/js/lists/link_list.js",
        external_image_list_url: "<?=base_url()?>media/js/lists/image_list.js",
        media_external_list_url: "<?=base_url()?>media/js/lists/media_list.js",

        // Style formats
        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],

        // Replace values for the template plugin
        template_replace_values: {
            username: "Some User",
            staffid: "991234"
        }
    });
    var imagetype = 'editor';
    // tinyMCE.insertImage('11',22);
    $(document).ready(function (e) {


        $("#inserimage").click(function () {
            $('#file').click();
            imagetype = 'editor';
        });
        $('#file').on('change', function () {
            $("#imageform").ajaxForm({
                dataType: 'json',
                success: function (data) {
                    if (imagetype == 'editor') {
                        tinyMCE.execCommand('mceInsertContent', true, '<img src="<?=base_url().pictureurl(0)?>' + data.filename + '" data-mce-src="<?=base_url().pictureurl(0)?>' + data.filename + '">');
                    } else {
                        $("#coverimage").html('<img src="<?=base_url().pictureurl(0)?>' + data.filename + '" width="100">');
                        $("#rawname").val(data.rawname);
                        $("#urls").val(data.filename);
                    }
                }
            }).submit();
        });
        $("#cover").click(function () {
            imagetype = 'cover';
            $('#file').click();
        });
    });
</script>
<?php
$controller = $this->uri->segment(1);
$action = $this->uri->segment(2);
?>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row">
        <!--左厕菜单 start-->
        <?php $this->load->view('aside'); ?>
        <!--左厕菜单 end-->
        <section class="main-carema-list">
            <?php if ($category_bar): ?>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="<?= anchorurl('formarticles/index') ?>">内容管理</a>
                        </li>
                        <?php if (empty($category_bar->parent->id)): ?>
                            <li>
                                <a <?php if ($controller == 'homepictures' && $action == 'add') echo 'class="active"'; else echo 'class=""'; ?> href="javascript:;">
                                    <?= $category_bar->name ?>
                                </a>
                            </li>
                        <?php else: ?>
                            <li>
                                <a <?php if ($controller == 'homepictures' && $action == 'add') echo 'class="active"'; else echo 'class=""'; ?> href="javascript:;">
                                    <?= $category_bar->parent->name ?>
                                </a>
                            </li>
                            <li>
                                <a <?php if ($controller == 'homepictures' && $action == 'add') echo 'class="active"'; else echo 'class=""'; ?> href="javascript:;">
                                    <?= $category_bar->name ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <nav class="nav-section">
                <ul>
                    <li><?= anchor('homepictures/index/' . $categoryid, '图文列表') ?></li>
                    <li><?= anchor('homepictures/add/' . $categoryid, '添加图文', 'class="current"') ?></li>
                </ul>
            </nav>
            <!--右厕内容 start-->
            <div class="carema-lists">
                <div class="inspect-new-panel">
                    <!--表格左厕 start-->
                    <?php if (isset($article->id)): ?>
                        <?php echo form_open('homepictures/addcontent/' . $article->id); ?>
                    <?php else: ?>
                        <?php echo form_open('homepictures/addcontent/'); ?>
                    <?php endif; ?>
                    <div class="cf-h"></div>
                    <div class="col-sm-12 form-lists">
                        <!--标题-->
                        <ul>
                            <li data-before="标题：">
                                <input type="text" class="form-control" id="title" name="title" placeholder="请输入标题"
                                       value="<?php if (isset($article->id)) echo $article->title; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="作者：">
                                <input type="text" class="form-control" id="author" name="author" placeholder="作者名"
                                       value="<?php if (isset($article->id)) echo $article->author; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="文章来源：">
                                <input type="text" class="form-control" id="origin" name="origin" placeholder="文章来源"
                                       value="<?php if (isset($article->id)) echo $article->origin; ?>"/>
                            </li>

                            <div class="cf-h"></div>
                            <li data-before="文章地址：">
                                <input type="text" class="form-control" id="url" name="url" placeholder="文章来源"
                                       value="<?php if (isset($article->url)) echo $article->url; else echo "http://"; ?>"/>
                            </li>

                            <div class="cf-h"></div>
                            <li data-before="描述：">
                                <input class="form-control it-rule" type="text" name="description"
                                       placeholder="说点儿什么吧。。。"
                                       value="<?php if (isset($article)) echo $article->description; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="图片：">
                                <div class="dis-table-cell cover-image">
                                    <button type="button" class="btn btn-default" id="cover">选取</button>
                                    <figure class="dis-c pad-h-b" id="coverimage">
                                        <?php if (isset($article) && !empty($article->picture_url)): ?>
                                            <?php
                                            $picture = pictureurlsizeipregnant('big', $article->picture_url);
                                            ?>
                                            <img src="<?= $picture ?>" width="100">
                                        <?php endif; ?>
                                    </figure>
                                </div>
                            </li>
                            <div class="cf-h"></div>
                            <li class="text-b">
                                <input type="hidden" name="picture_url" id="urls"
                                       value="<?php if (isset($article->id)) echo $article->picture_url; ?>">
                                <input type="hidden" name="catid" value="<?= $categoryid ?>">
                                <button class="btn btn-primary mar-l-a btn-new-c" type="submit">保存</button>
                            </li>
                            <div class="cf-h"></div>
                        </ul>
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </section>
        <!--右厕内容 end-->
    </div>
    <?php echo form_open('homepictures/addimage', 'name="imageform" id="imageform" enctype="multipart/form-data"'); ?>
    <input type="file" name="file" id="file" style="display:none">
    <?php echo form_close(); ?>
</div>
</body>
</html>
