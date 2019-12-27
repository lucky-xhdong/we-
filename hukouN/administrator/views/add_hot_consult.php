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
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
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
<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible"content="IE=9; IE=8; IE=7; IE=EDGE">
<!--<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />-->
<meta content="width=device-width, initial-scale=1.0" name="viewport">
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
            <?=anchor('users/index','客服平台','class="btn btn-default"')?>
            <?=anchor('add_hot_consult/index','热点咨询','class="btn btn-default"')?>
            <?=anchor('users/index','用户管理','class="btn btn-default"')?>
            <?=anchor('users/userfeedback','用户反馈','class="btn btn-default"')?>
            <?=anchor('users/logout','退出','class="btn btn-default"')?>
            
            <?php elseif($this->session->userdata('type') == "editor"):?>
            
            <?=anchor('heredity_disease/index','遗传病库','class="btn btn-default"')?>
            <?=anchor('ipregnant_content/index','资料库','class="btn btn-default"')?>
            <?=anchor('inspect/index','我的产检','class="btn btn-default"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default current-a"')?>
            <?php elseif($this->session->userdata('type') == "service"):?>
            
            <?=anchor('users/index','客服平台','class="btn btn-default current-a"')?>
            <?=anchor('add_hot_consult/index','热点咨询','class="btn btn-default"')?>
            
            <?php endif;?>
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
                <?=anchor('inspect/index/','孕周列表')?>
            </li>
             <li>
                <?=anchor('inspect/publish_inspect/','发布孕周')?>
            </li>
            <li class="current-b">
                <?=anchor('inspect/publish_content/','发布文章')?>
            </li>
            <li>
                <?=anchor('inspect/content/','文章列表')?>
            </li>
        </ul>
      </div>
    </div>
    <!--左厕菜单 end--> 
        <!--右厕内容 start-->
		<div class="col-md-12 col-sm-12">
            <div class="bor-a h-o">
                <!--表格左厕 start-->
                   	<?php echo form_open('inspect/addrecord/');?> 
                        <div class="cf-h"></div>
                <div class="col-sm-9 h-o">
                    	<!--标题-->
                        <span>标题:</span>
                        <input type="text" class="form-control" name="title" value="<?php if(isset($article)) echo $article->title;?>"/>
                        <div class="cf-h"></div>
                        
                        <span>孕周:</span>
                        孕 <select name="knowledge_id">
                        	<?php foreach($weeks as $week):?>
                        	<option value="<?=$week->knowledge_id?>"><?=$week->week?></option>
                        	<?php endforeach;?>
                        </select> 周
                        <div class="cf-h"></div>
                        <!--题目-->
                        	 <span>内容:</span>
                        
                       	<textarea id="body" name="content" rows="15" cols="80">
							<?php if(isset($article)) echo $article->body;?>
			             </textarea>
                        
                        <a href="javascript:;" id="inserimage">[插入图片]</a>
                        <div class="cf-h"></div>
                        
                        <!--规则-->
                        <span>摘要:</span>
                       	<input  class="form-control it-rule" type="text" name="introduction" value="<?php if(isset($article)) echo $article->fulltext;?>"/>
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
                                	<?php if(isset($article) && !empty($article->urls)):?>
                                    	<?php 
											$picture = pictureurl($uid,$article->urls);
										?>
                                		<img src="<?=$picture?>" width="100">
                                    <?php endif;?>
                                </span>
                            </div>
                        </div>
                    	<div class="cf-h"></div>
                        <!--按钮-->
                        <div class="text-c">
                            <input type="hidden" name="header_picture_url"  id="urls" value="<?php if(isset($article)) echo $article->urls;?>">
                            <button class="btn btn-default btn-new-b" type="submit">保存</button>    
                            <button class="btn btn-primary bg-color-c btn-new-c">发布</button>
                        </div>
                        <div class="cf-h"></div>
               </div>
                   <?php echo form_close();?>
            </div>
    	</div>
        <!--右厕内容 end-->
    </div>
      <?php echo form_open('inspect/addimage','name="imageform" id="imageform" enctype="multipart/form-data"');?>  
        <input type="file" name="file" id="file" style="display:none">
      <?php echo form_close();?>
</div>
</body>
</html>