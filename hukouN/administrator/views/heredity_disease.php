<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/font-awesome-4.0.3/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/font-awesome-4.0.3/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/common.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/itgenius.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/spectrum.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap-datetimepicker.min.css">
<script type="text/javascript" src="<?=base_url()?>media/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/bootstrap.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/jquery.form.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/spectrum.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/jquery.tmpl.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		relative_urls:false,
		remove_script_host:false,
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks,syntaxhl,syntaxhighlighter",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen|,syntaxhl|,syntaxhighlighter",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "<?=base_url()?>media/css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "<?=base_url()?>media/js/lists/template_list.js",
		external_link_list_url : "<?=base_url()?>media/js/lists/link_list.js",
		external_image_list_url : "<?=base_url()?>media/js/lists/image_list.js",
		media_external_list_url : "<?=base_url()?>media/js/lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
	var imagetype = 'editor';
	// tinyMCE.insertImage('11',22);
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
						$("#rawname").val(data.rawname);
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
<meta charset="utf-8">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="<?=base_url()?>media/js/html5shiv.min.js"></script>
  <script src="<?=base_url()?>media/js/respond.min.js"></script>
<![endif]-->
<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible"content="IE=9; IE=8; IE=7; IE=EDGE">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>无忧产检</title>
</head>
<body>
<div class="navbar navbar-inverse itnavbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-collapse">
        <div class="btn-group">
        	<?php if($this->session->userdata('type') == "administrator"):?>
            
            <?=anchor('heredity_disease/index','遗传病库','class="btn btn-default current-a"')?>
            <?=anchor('ipregnant_content/index','资料库','class="btn btn-default"')?>
            <?=anchor('inspect/index','我的产检','class="btn btn-default"')?>
            <?=anchor('chat/customer_service','客服平台','class="btn btn-default"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default"')?>
            <?=anchor('users/index','用户管理','class="btn btn-default"')?>
            <?=anchor('users/userfeedback','用户反馈','class="btn btn-default"')?>
             <?=anchor('userbasicsetting/index','基本设置','class="btn btn-default"')?>
            <?php elseif($this->session->userdata('type') == "editor"):?>
            
            <?=anchor('heredity_disease/index','遗传病库','class="btn btn-default current-a"')?>
            <?=anchor('ipregnant_content/index','资料库','class="btn btn-default"')?>
            <?=anchor('inspect/index','我的产检','class="btn btn-default"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default"')?>
            <?php elseif($this->session->userdata('type') == "service"):?>
            
            <?=anchor('chat/customer_service','客服平台','class="btn btn-default current-a"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default"')?>
            
            <?php endif;?>
            <?=anchor('accountsettings/index','账号设置','class="btn btn-default"')?>
            <?=anchor('users/logout','退出','class="btn btn-default"')?>
        </div>
    </div>
  </div>
</div>
<!--navbar end-->

<div class="container dis-d">
	<div class="row">
        <!--左厕菜单 start-->
    <div class="col-md-12 col-sm-12 offsetmenu">
      <div class="h-o li-com-fl bg-color-a li-block li-ul-pad li-text-b li-height li-menu">
          <ul>
            <li>
                <?=anchor('heredity_disease/index/','遗传病库')?>
            </li>
            <li class="current-b">
                <?=anchor('heredity_disease/content/','添加内容')?>
            </li>
        </ul>
      </div>
    </div>
    <!--左厕菜单 end--> 
        <!--右厕内容 start-->
		<div class="col-md-12 col-sm-12">
            <div class="bor-a h-o inspect-new-panel">
                <!--表格左厕 start-->
				<?php if(isset($article->knowledge_id)):?>
                        <?php echo form_open('heredity_disease/addcontent/'.$article->knowledge_id,'id="ipregnantform"');?> 
                <?php else:?>
                        <?php echo form_open('heredity_disease/addcontent/','id="ipregnantform"');?> 
                <?php endif;?>
                <div class="cf-h"></div>
                <div class="col-sm-8 h-o">
                    <!--标题-->
                    <span>标题:</span>
                    <input type="text" class="form-control" id="title" name="title" value="<?php if(isset($article)) echo $article->title;?>"/>
                    <div class="cf-h"></div>
                    <!--题目-->
                    <span>内容:</span>
                    <textarea id="body" name="content" rows="10" cols="10">
                        <?php if(isset($article)) echo $article->content; ?>
                    </textarea>
                    <a href="javascript:;" id="inserimage">[插入图片]</a>
                    <div class="cf-h"></div>
                    
                    <!--规则-->
                    <span>摘要:</span>
                    <input  class="form-control it-rule" type="text" name="introduction" value="<?php if(isset($article)) echo $article->introduction;?>"/>
                   <div class="cf-h"></div>
                   <span>关键字:</span>
                    <input  class="form-control it-rule" type="text" name="key" value="<?php if(isset($article)) echo $article->key;?>"/>
                   <div class="cf-h"></div>
                    <!--开放/结束时间-->
                    <!--封面图-->
                    <div class="col-sm-6">
                        <div class="input-group row">
                            <span class="input-group-btn line-h-b ver-a-a">
                                封面图：
                                <div class="cf-a"></div>
                                <button type="button" class="btn btn-default font-s-xs bor-ra-a btn-md-c" id="cover">选取</button>
                                
                            </span>
                            <span class="input-group-btn pad-b ver-a-a input-thumb" id="coverimage">
                                <?php if(isset($article) && !empty($article->header_picture_url)):?>
                                    <?php 
                                        $picture = pictureurlsizeipregnant('big',$article->header_picture_url);
                                    ?>
                                    <img src="<?=$picture?>" width="100">
                                <?php endif;?>
                            </span>
                        </div>
                    </div>
                    <div class="cf-h"></div>
                    <!--按钮-->
                    <div class="text-c">
                        <input type="hidden" name="header_picture_url"  id="urls" value="<?php if(isset($article)) echo $article->header_picture_url;?>">
                        <input type="hidden" name="ispublished" value="0" id="ispublished">
                        <button class="btn btn-default btn-new-c" type="submit">保存</button>     
                        <button class="btn btn-primary bg-color-c bor-b mar-l-a btn-new-c" type="button" id="publish">发布</button>
                    </div>
                    <div class="cf-h"></div>
               </div>
    
               <div class="col-sm-4">
               	<div class="row">
                	<div class="text-b btn-handle-preview">
                    	<a href="javascript:;" class="btn btn-default" id="btn-inspect-preview">预览</a>
                    	<a href="javascript:;" class="display-none btn btn-default" id="btn-cancel-inspect-preview">取消</a>
                    </div>
                	<div class="display-none bg-preview" id="inspect-preview">
                    	<div class="list-content">
                        	<div class="pad-v-d">
                                <!-- Header start-->
                                <div class="header">
                                    <div class="header-inner text-b clearfix">
                                        <a href="javascript:void(0)" class="brand">
                                            <span class="site-title"></span>
                                        </a>
                                        <div class="header-search pull-right"></div>
                                    </div>
                                </div>
                                <!-- Header end-->
                                <div class="row-fluid">
                                    <!--左边 start-->
                                    <div class="span12" id="content">
                                        <!-- Begin Content -->
                                        <div class="blog">
                                            <div class="items-leading">
                                            	 <!--<p class="img-com text-b article-content" id="headpicture">     
                                                    <span></span>
                                                </p>-->
                                                <div class="leading-0 article-content" id="article-content"> 
                                                	
                                                </div>
                                                <div class="clearfix"></div>
                                            </div><!-- end items-leading -->
                                        </div>
                                        <!-- End Content -->
                                    </div>
                                    <!--左边 end--> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
             
               <?php echo form_close();?>
            </div>
    	</div>
        <!--右厕内容 end-->
    </div>
      <?php echo form_open('heredity_disease/addimage','name="imageform" id="imageform" enctype="multipart/form-data"');?>  
        <input type="file" name="file" id="file" style="display:none">
      <?php echo form_close();?>
</div>
<script>
$(document).ready(function(e) {
    $(".inspect-new-panel").undelegate("#btn-inspect-preview","click").delegate("#btn-inspect-preview","click",function(){
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
    $(".inspect-new-panel").undelegate("#btn-cancel-inspect-preview","click").delegate("#btn-cancel-inspect-preview","click",function(){
		$(this).addClass("display-none");
		$("#inspect-preview").addClass("display-none");
	})
	
	$("#publish").click(function(){
		$("#ispublished").val(1);
		$("#ipregnantform").submit();
		
	});
	
});
<?php if(isset($article->knowledge_id)):?>
window.onload = function(){
	 <?php if(isset($article) && !empty($article->header_picture_url)):?>
		var picture = '<?=pictureurlsizeipregnant('big',$article->header_picture_url)?>';
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
