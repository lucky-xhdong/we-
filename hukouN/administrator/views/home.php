<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/font-awesome-4.0.3/css/font-awesome.css">
    <link rel="stylesheet" type="text/css"
          href="<?= base_url() ?>media/css/font-awesome-4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/common.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/itgenius.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/spectrum.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/common-cheaa.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/icon.css">
    <script type="text/javascript" src="<?= base_url() ?>media/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/jquery.form.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/spectrum.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/jquery.tmpl.js"></script>
    <script src="<?=base_url()?>media/js/framework.js"></script>
    <script src="<?=base_url()?>media/js/global.js"></script>
    <script type="text/javascript">
        tinyMCE.init({
            // General options
            mode: "textareas",
            theme: "advanced",
            relative_urls: false,
            remove_script_host: false,
            plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks,syntaxhl,syntaxhighlighter",

            // Theme options
            theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen|,syntaxhl|,syntaxhighlighter",
            theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
            theme_advanced_toolbar_location: "top",
            theme_advanced_toolbar_align: "left",
            theme_advanced_statusbar_location: "bottom",
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
    <meta charset="utf-8">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?=base_url()?>media/js/html5shiv.min.js"></script>
    <script src="<?=base_url()?>media/js/respond.min.js"></script>
    <![endif]-->
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>唯佳教育集团-后台管理系统</title>
</head>
<body>
<!--navbar start-->
<?php $this->load->view('topheader');?>
<!--navbar end-->

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row">
        <!--左厕菜单 start-->
        <?php $this->load->view('aside');?>
        <!--左厕菜单 end-->
        <section class="main-carema-list">
            <nav class="nav-section">
                <ul>
                    <li><?=anchor('homepage/index/','摄像头列表')?></li>
                    <li><?=anchor('homepage/add/','增加摄像头', 'class="current"')?></li>
                </ul>
            </nav>
            <!--右厕内容 start-->
            <div class="carema-lists">
                <div class="inspect-new-panel">
                    <!--表格左厕 start-->
                    <?php if (isset($carema->carema_id)): ?>
                        <?php echo form_open('homepage/addcontent/' . $carema->carema_id, 'id="ipregnantform" enctype="multipart/form-data"'); ?>
                    <?php else: ?>
                        <?php echo form_open('homepage/addcontent/', 'id="ipregnantform" enctype="multipart/form-data"'); ?>
                    <?php endif; ?>
                    <div class="cf-h"></div>
                    <div class="col-sm-8 form-lists">
                        <!--标题-->
                        <ul>
                            <li>
                                <span>标题:</span>
                                <input type="text" class="form-control" id="title" name="title" placeholder="请输入标题"
                                       value="<?php if (isset($carema->carema_id)) echo $carema->title; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li>
                                <span>部门:</span>
                                <select name="department_id" class="form-control">
                                    <?php foreach ($departments as $department): ?>
                                        <?php if (isset($carema->carema_id) && $carema->department_id == $department->department_id): ?>
                                            <option value="<?= $department->department_id ?>" selected>
                                                <?= $department->title ?>
                                            </option>
                                        <?php else: ?>
                                            <option value="<?= $department->department_id ?>"> <?= $department->title ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </li>
                            <div class="cf-h"></div>
                            <li>
                                <span>rtsp_url:</span>
                                <input type="text" name="rtsp_url" class="form-control" placeholder="请输入rtsp_url"
                                       value="<?php if (isset($carema)) echo $carema->rtsp_url; ?>">
                            </li>
                            <div class="cf-h"></div>
                            <li>
                                <span>服务器url:</span>
                                <input type="text" name="server_name" class="form-control" placeholder="请输入服务器url"
                                       value="<?php if (isset($carema)) echo $carema->server_name; ?>">
                            </li>
                            <div class="cf-h"></div>
                            <li>
                                <span>描述:</span>
                                <input class="form-control it-rule" type="text" name="description" placeholder="说点儿什么吧。。。"
                                       value="<?php if (isset($carema)) echo $carema->description; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li>
                                <span>封面图: </span>
                                <div class="dis-table-cell cover-image">
                                    <button type="button" class="btn btn-default" id="cover">选取</button>
                                    <figure class="dis-c pad-h-b" id="coverimage">
                                        <?php if (isset($carema) && !empty($carema->picture_url)): ?>
                                            <?php
                                            $picture = pictureurlsizeipregnant('big', $carema->picture_url);
                                            ?>
                                            <img src="<?= $picture ?>" width="100">
                                        <?php endif; ?>
                                    </figure>
                                </div>
                            </li>
                            <div class="cf-h"></div>
                            <li class="text-b">
                                <input type="hidden" name="picture_url" id="urls"
                                       value="<?php if (isset($carema)) echo $carema->picture_url; ?>">
                                <button class="btn btn-default btn-new-c" type="submit">保存</button>
                                <button class="btn btn-primary mar-l-a btn-new-c" type="button" id="publish"> 发布</button>
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
    <?php echo form_open('homepage/addimage', 'name="imageform" id="imageform" enctype="multipart/form-data"'); ?>
    <input type="file" name="file" id="file" style="display:none">
    <?php echo form_close(); ?>
</div>
<script>
    $(document).ready(function (e) {
        $(".inspect-new-panel").undelegate("#btn-inspect-preview", "click").delegate("#btn-inspect-preview", "click", function () {
            var data = {};
            data.content = tinymce.get('body').getContent();
            data.title = $("#title").val();
            /*var picture = $("#coverimage").find('img').attr('src');
             if(picture){
             $("#headpicture").html('<img src="'+picture+'">');
             }*/
            $(".site-title").html(data.title);
            $("#article-content").html(data.content);
            $("#inspect-preview").removeClass("display-none");
            $("#btn-cancel-inspect-preview").removeClass("display-none");
        })
        $(".inspect-new-panel").undelegate("#btn-cancel-inspect-preview", "click").delegate("#btn-cancel-inspect-preview", "click", function () {
            $(this).addClass("display-none");
            $("#inspect-preview").addClass("display-none");
        })

        $("#publish").click(function () {
            //$("#ispublished").val(1);
            $("#ipregnantform").submit();

        });

    });
    <?php if(isset($carema->carema_id)):?>
    window.onload = function () {
        <?php if(isset($carema) && !empty($carema->header_picture_url)):?>
        var picture = '<?=pictureurlsizeipregnant('big',$carema->header_picture_url)?>';
        <?php else:?>
        var picture = false;
        <?php endif;?>
        var data = {};
        data.content = tinymce.get('body').getContent();
        data.title = $("#title").val();
        $(".site-title").html(data.title);
        $("#article-content").html(data.content);
        /*if(picture){
         $("#headpicture").html('<img src="'+picture+'">');
         }*/
        $("#inspect-preview").removeClass("display-none");
        $("#btn-cancel-inspect-preview").removeClass("display-none");
    }
    <?php endif;?>
</script>
</body>
</html>
