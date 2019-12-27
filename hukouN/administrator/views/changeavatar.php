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
    <script type="text/javascript" src="<?= base_url() ?>media/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/jquery.form.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/spectrum.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/jquery.tmpl.js"></script>
    <script type="text/javascript">
        tinyMCE.init({
            // General options
            mode: "textareas",
            theme: "advanced",
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
        <!--右厕内容 start-->
        <section class="main-carema-list">
            <nav class="nav-section">
                <ul>
                    <li><?= anchor('accountsettings/index/', '密码管理') ?></li>
                    <li><?= anchor('accountsettings/changeavatar/', '更改头像', 'class="current"') ?></li>
                </ul>
            </nav>
            <div class="col-sm-6 col-md-6 form-lists">
                <ul>
                    <li>
                        <span> 原始头像:</span>
                        <div class="dis-table-cell cover-image">
                            <figure class="dis-c pad-h-b" id="coverimage">
                                <img src="<?= $header_picture_url ?>" width="100">
                            </figure>
                            <button class="btn btn-default" type="button" id="cover">更改头像</button>
                        </div>
                    </li>
                    <div class="cf-h"></div>
                    <?php echo form_open('accountsettings/updateavatar/', 'id="ipregnantform" enctype="multipart/form-data"'); ?>
                    <input type="file" name="image" id="file" style="display:none">
                    <?php echo form_close(); ?>
                </ul>
            </div>
        </section>
        <!--右厕内容 end-->
    </div>
</div>
<script>
    $('#file').on('change', function () {
        $("#ipregnantform").ajaxForm({
            dataType: 'json',
            success: function (data) {
                window.location.reload();
            }
        }).submit();
    });
</script>
</body>
</html>