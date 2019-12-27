<!doctype html>
<html>
<head>
<?php
	if(isset($article) && !empty($article->colorrgb)){
		$color = @json_decode($article->colorrgb);
		$up_color = "rgb(".$color->r.','.$color->g.','.$color->b.")";
	}else{
		$up_color = "#ECC";
	}
	$chid  = $this->uri->segment(4);
	$catid = $this->uri->segment(3);
?>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/font-awesome-4.0.3/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/font-awesome-4.0.3/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/common.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/itgenius.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/spectrum.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap-datetimepicker.min.css">
<script type="text/javascript" src="<?=base_url()?>media/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap-datetimepicker.min.css">

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
	
         $("#publishtime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
		  $("#deadline").datetimepicker({format: 'yyyy-mm-dd'});
		  $("#tags li a").click(function(){
			if($(this).hasClass('label-act-c')){
				$(this).removeClass('label-act-c');
				$(this).addClass('label-act-b')
			}else{
				$(this).removeClass('label-act-b');
				$(this).addClass('label-act-c')
			}
			gettagids();
		});
		function gettagids(){
			var tagids = new Array();
			var i = 0;
			$("#tags li a").each(function(index, element) {
				 if($(this).hasClass('label-act-c')){
				  tagids[i] = $(this).attr('data-value');
				  i++;
				}
			});
			if($("#tagIds").length > 0){
				$("#tagIds").val(tagids.join(','));
			}else{
				$("#tagIds").val('');
			}
		}
		$("#inserimage").click(function(){
			$('#file').click();
			imagetype = 'editor';
		});
		$('#file').on('change', function() {
            $("#imageform").ajaxForm({
				dataType:'json',
                success : function(data) {
					if(imagetype == 'editor'){
                    	tinyMCE.execCommand('mceInsertContent',true,'<img src="<?=base_url().pictureurl($uid)?>'+data.filename+'" data-mce-src="<?=base_url().pictureurl($uid)?>'+data.filename+'">');	
					}else{
						$("#coverimage").html('<img src="<?=base_url().pictureurl($uid)?>'+data.filename+'" width="100">');
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
		$("#color").spectrum({
    color: "<?=$up_color?>",
    flat: true,
    showInput: false,
    className: "full-spectrum",
    showInitial: false,
    showPalette: true,
    showSelectionPalette: true,
	showPaletteOnly: true,
    maxPaletteSize: 11,
    preferredFormat: "hex",
    localStorageKey: "spectrum.demo",
    move: function (color) {
        
    },
    show: function () {
    
    },
    beforeShow: function () {
    
    },
    hide: function () {
    
    },
    change: function() {
		var t = $("#color").spectrum("get");
        $("#colorrgb").val(JSON.stringify(t.toRgb()));
		console.log(t.toRgb());
    },
    palette: [
        ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
        "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
        ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
        "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
        ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
        "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
        "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
        "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
        "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
        "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
        "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
        "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
        "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
        "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
    ]
});
    });
</script>
<meta charset="utf-8">
<title>天才程序员登录页</title>
</head>
<body>
<div class="navbar navbar-inverse itnavbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-collapse text-b">
        <?php if($catid ==1):?>
    	   <?=anchor('tech/index','技术','class="navbar-brand current-a"')?>
		<?php else:?>
        	<?=anchor('tech/index','技术','class="navbar-brand"')?>
        <?php endif;?>
        <?php if($catid ==2):?>
    	   <?=anchor('special/index','专题','class="navbar-brand current-a"')?>
		<?php else:?>
        	<?=anchor('special/index','专题','class="navbar-brand"')?>
        <?php endif;?>
        <?=anchor('users/index','用户管理','class="navbar-brand"')?>
        <?=anchor('users/logout','退出','class="navbar-brand"')?>
    </div>
  </div>
</div>
<!--navbar end-->

<div class="container dis-d bor-a">
	<div class="row">
        <!--左厕菜单 start-->
       <div class="col-md-2 bg-color-a pad-a h-o offsetmenu">
       		<button class="btn btn-success bg-color-d color-d bor-none mar-g btn-new-a">新建频道</button>
        	<div class="li-com-fl li-block li-ul-pad li-text-b li-height li-menu">
            	<ul>
                	<?php foreach($channel as $item):?>
                    	<?php if($catid ==1):?>
                			<li <?php if($chid  == $item->id) echo 'class="current-b"';?>><?=anchor('tech/index/'.$catid.'/'.$item->id,$item->name)?></li>
                        <?php else:?>
                        	<li <?php if($chid  == $item->id) echo 'class="current-b"';?>><?=anchor('special/index/'.$catid.'/'.$item->id,$item->name)?></li>
                        <?php endif;?>
                    <?php endforeach;?>
                </ul>
            </div>
       </div>	
        <!--左厕菜单 end-->
        <!--右厕内容 start-->
		<div class="col-lg-10 h-o">
        	<!--tab切换 start-->
			<div class="cf-h"></div>            
            <div class="li-com-fl li-block li-text-b it-nav">
                <ul>
                  <?php if($catid ==1):?>
                   <li ><?=anchor('tech/index/'.$catid.'/'.$chid ,'文章管理')?></li>
                 <?php else:?>
                 	<li ><?=anchor('special/index/'.$catid.'/'.$chid ,'文章管理')?></li>
                 <?php endif;?>  
                  
                  <li class="current-c"><?=anchor('tech/content/'.$catid.'/'.$chid ,'新建文章')?></li>
                    <li ><?=anchor('tech/tag/'.$catid.'/'.$chid,'标签管理')?></li>
                  <li >
						 <?=anchor('tech/channel/'.$catid.'/'.$chid,'新建频道')?>
                      </li>
                       <li >
                        <?=anchor('tech/channellist/'.$catid.'/'.$chid,'频道管理')?>
                      </li>
                </ul>
            </div>
            <div class="cf-a"></div>
            <!--tab切换 end-->
            <div class="col-md-12 bor-a mar-t1">
                <div class="cf-h"></div>
                <!--表格左厕 start-->
                  <?php if(isset($article) && isset($article->id)):?>
                   	<?php echo form_open('tech/addcontent/'.$catid.'/'.$chid.'/'.$article->id);?> 
                  <?php else:?>
                     	<?php echo form_open('tech/addcontent/'.$catid.'/'.$chid);?> 
                  <?php endif;?>  
                <div class="col-md-9 h-o">
                	<div class="row">
                    	<!--标题-->
                        <span>标题:</span>
                        <input type="text" class="form-control" name="title" value="<?php if(isset($article)) echo $article->title;?>"/>
                        <div class="cf-h"></div>
                        <!--题目-->
                        <?php if($nowchannel->isquick):?>
                       		 <span>描述:</span>
                        <?php else:?>
                        	 <span>内容:</span>
                        <?php endif;?>
                       	<textarea id="body" name="body" rows="15" cols="80">
							<?php if(isset($article)) echo $article->body;?>
			             </textarea>
                        
                        <a href="javascript:;" id="inserimage">[插入图片]</a>
                        <div class="cf-h"></div>
                         <?php if($nowchannel->isquick):?>
                         <div class="cf-h"></div>
                       		 <!--题目-->
                       	 <span>答案:</span>
                         	<textarea id="answer" name="answer" rows="15" cols="80">
							<?php if(isset($article->answer)) echo $article->answer;?>
			             </textarea>
                         <?php endif;?>
                        <!--规则-->
                       <?php if($nowchannel->isquick):?>
                       <span>规则:</span>
                       <textarea   name="rules" rows="15" cols="80" style="height:50px"/><?php if(isset($article)) echo $article->rules;?></textarea>
                      <?php endif;?>
                        <span>摘要:</span>
                       	<input  class="form-control it-rule" type="text" name="fulltext" value="<?php if(isset($article)) echo $article->fulltext;?>"/>
                       <div class="cf-h"></div>
                       <!--开放/结束时间-->
                       <div class="col-xs-6">
                            <div class="input-group row">
                                <span class="input-group-btn">开放时间：</span>
                                <?php if($chid == 5):?>
                                	   <input type="text" class="form-control it-input-a" name="publishtime" id="publishtime" value="<?php if(isset($article)) echo date('Y-m-d H:i',strtotime($article->gussdate));?>">
                                <?php else:?>
                                	    <input type="text" class="form-control it-input-a" name="publishtime" id="publishtime" value="<?php if(isset($article)) echo $article->publishtime;?>">
                                <?php endif;?> 
                            
                            </div>
                       </div>
                       <div class="col-xs-6">
                            <div class="input-group it-input-row">
                                <span class="input-group-btn">结束时间：</span>
                                <input type="text" class="form-control it-input-a" name="deadline" id="deadline" value="<?php if(isset($article)) echo $article->deadline;?>">
                            </div>
                       </div>
                        <div class="cf-h"></div>
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
                                		<img src="<?=$picture['square']?>" width="100">
                                    <?php endif;?>
                                </span>
                            </div>
                        </div>
                    	<div class="cf-h"></div>
                        <!--按钮-->
                        <div class="text-c">
                        	<input type="hidden" name="colorrgb" id="colorrgb" value='<?php if(isset($article)) echo $article->colorrgb;?>'>
                        	 <input type="hidden" name="rawname" id="rawname" value="">
                             <input type="hidden" name="featured" id="featured" value="<?php if(isset($article)) echo $article->featured;?>">
                             <input type="hidden" name="published" id="published" value="<?php if(isset($article)) echo $article->published;?>">
                             <input type="hidden" name="flashed" id="flashed" value="<?php if(isset($article)) echo $article->flashed;?>">
                       		 <input type="hidden" name="urls"  id="urls" value="<?php if(isset($article)) echo $article->urls;?>">
                        	<input type="hidden" name="tagIds" id="tagIds" value="<?php if(isset($article)) echo $article->tagIds;?>">
                        	<input type="hidden" name="chid" value="<?=$chid?>">
                            <input type="hidden" name="catid" value="<?=$catid?>">
                            <button class="btn btn-default btn-new-b" type="submit">保存</button>
                            
                            <button class="btn btn-primary bg-color-c btn-new-c">发布</button>
                        </div>
                    </div>
               </div>
               <!--表格左厕 end-->
               <!--表格右厕 start-->
                <div class="col-md-3 h-o">
                	<div class="offset-right">
                    	<!--选标签-->
                        <div class="cf-e"></div>
                        <span>选标签</span>
                        <div class="dis-e ver-a-b li-ul-pad li-com-fl li-inline it-label">
                            <ul id="tags">
                            <?php foreach($tags as $tag):?>
                                <li><a href="javascript:void(0)" title="<?=$tag->name?>" class="text-b label-com label-act-b" data-value="<?=$tag->id?>"><?=$tag->name?>
                                	<i class="pad-i"></i>
                                   	</a>
                                </li>
                             <?php endforeach;?>
                            </ul>
                        </div>
                        <!--操作-->
                        <div class="cf-h"></div>
                        <span>操作：</span>
                        <div class="cf-a"></div>
                        <div class="li-com-fl li-block li-inline li-ul-pad li-width-b it-switch">
                            <ul id="ulfeatured">
                                <li>
                                   <?php if(isset($article) && $article->published == 0):?>
                                     <a href="javascript:;" data-value = 1 class="btn btn-default glyphicon glyphicon-remove btn-switch-first" id="selectpublished"></a>
                                  <?php elseif(isset($article) && $article->published == 1):?>  
                                  	 <a href="javascript:;" data-value = 1 class="btn btn-default glyphicon glyphicon-ok btn-switch-first" id="selectpublished"></a>
                                  <?php else:?>
                                    <a href="javascript:;" data-value = 0 class="btn btn-default glyphicon glyphicon-ok btn-switch-first" id="selectpublished"></a>
                                  <?php endif;?>
                                  <script>
							      $(document).ready(function(e) {
                                    $("#selectpublished").click(function(){
										var value = $(this).data('value');
										if(value == 0){
										   $(this).removeClass('glyphicon-ok');
										   $(this).addClass('glyphicon-remove');
										  $(this).data('value',1);
										   $("#published").val(0);
										 }else{
											$(this).addClass('glyphicon-ok');
											 $(this).removeClass('glyphicon-remove');
											 $(this).data('value',0);
											$("#published").val(1);
									 }
									})
									$("#selectflashed").click(function(){
										var value = $(this).data('value');
										if(value == 0){
										   $(this).removeClass('fa-bookmark');
										   $(this).addClass('fa-bookmark-o');
										  $(this).data('value',1);
										   $("#flashed").val(0);
										 }else{
											$(this).addClass('fa-bookmark');
											 $(this).removeClass('fa-bookmark-o');
											 $(this).data('value',0);
											$("#flashed").val(1);
									 }
									})
									$("#selectfeatured").click(function(){
										var value = $(this).data('value');
										if(value == 0){
										   $(this).removeClass('fa-star');
										   $(this).addClass('fa-star-o');
										  $(this).data('value',1);
										   $("#featured").val(0);
										 }else{
											$(this).addClass('fa-star');
											 $(this).removeClass('fa-star-o');
											 $(this).data('value',0);
											$("#featured").val(1);
									 }
									})
                                  });
								  </script>
                                    
                                    <div class="cf-a"></div>
                                    <span class="font-s-xs">有效</span>
                                </li>
                                <li>
                                 <?php if(isset($article) && $article->featured == 0):?>
                                     <a href="javascript:void(0)" data-value = 1 class="btn btn-default fa fa-star-o btn-switch-center" id="selectfeatured"></a>
                                  <?php elseif(isset($article) && $article->featured == 1):?>
                                 	<a href="javascript:void(0)" data-value = 0 class="btn btn-default fa fa-star btn-switch-center" id="selectfeatured"></a>
                                  <?php else:?>
                                     <a href="javascript:void(0)" data-value = 1 class="btn btn-default fa fa-star-o btn-switch-center" id="selectfeatured"></a>
                                  <?php endif;?>
                                    <div class="cf-a"></div>
                                    <span class="font-s-xs">置顶</span>
                                </li>
                                <li>
                                   <?php if(isset($article) &&  $article->flashed == 0):?>
                                     <a hhref="javascript:void(0)" data-value = 1 class="btn btn-default fa fa-bookmark-o btn-switch-last" id="selectflashed"></a>
                                   <?php elseif(isset($article) &&  $article->flashed ==1):?>  
                                   	 <a href="javascript:void(0)" data-value = 0 class="btn btn-default fa fa-bookmark btn-switch-last"  id="selectflashed"></a>
                                  <?php else:?>
                                     <a hhref="javascript:void(0)" data-value = 1 class="btn btn-default fa fa-bookmark-o btn-switch-last"  id="selectflashed"></a>
                                  <?php endif;?>
                                    <div class="cf-a"></div>
                                    <span class="font-s-xs">flash</span>
                                </li>
                            </ul>
                            <input type='text' id="color"/>
                        </div>
                        <!--获得积分-->
                        <div class="cf-h"></div>
                        <span>获得积分：</span>
                        <div class="cf-a"></div>
                        <input type="text" class="form-control" name="points" value="<?php if(isset($article)) echo $article->points;?>"/>
                    </div>
                </div>
                <div class="cf-h"></div>
                <!--表格右厕 end-->
                   <?php echo form_close();?>
            </div>
    	</div>
        <!--右厕内容 end-->
    </div>
      <?php echo form_open('tech/addimage','name="imageform" id="imageform" enctype="multipart/form-data"');?>  
        <input type="file" name="file" id="file" style="display:none">
      <?php echo form_close();?>
</div>
</body>
</html>