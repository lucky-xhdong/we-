<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/common.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/itgenius.css">
<script type="text/javascript" src="<?=base_url()?>media/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/jquery.form.js"></script>
<script>
     var type = 'cover';
	 $(document).ready(function(e) {
		$('#file').on('change', function() {
            $("#imageform").ajaxForm({
					dataType:'json',
                success : function(data) {	
				      if(type == 'cover'){				
						$("#coverimage").html('<img src="<?=pictureurl2($uid)?>'+data.filename+'" width="100">');
						$("#urls").val(data.filename);
					  }else if(type == 'background'){
					  	$("#backgroundcoverimage").html('<img src="<?=pictureurl2($uid)?>'+data.filename+'" width="100">');
						$("#background").val(data.filename);
					  }
                }
            }).submit();
        });
		$("#cover").click(function(){
			type = 'cover';
			$('#file').click();
		});
		$("#backgroundcover").click(function(){
			type = 'background'
			$('#file').click();
		});
    });
</script>
<meta charset="utf-8">
<title>天才程序员登录页</title>
</head>
<?php
	$chid  = $this->uri->segment(4);
	$catid = $this->uri->segment(3);
?>
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

<div class="container login dis-d bor-a">
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
		<div class="col-lg-10">
        	<!--tab切换 start-->
			<div class="cf-h"></div>            
            <div class="li-com-fl li-block li-text-b it-nav">
                <ul>
                  <?php if($catid ==1):?>
                   <li ><?=anchor('tech/index/'.$catid.'/'.$chid ,'文章管理')?></li>
                 <?php else:?>
                 	<li ><?=anchor('special/index/'.$catid.'/'.$chid ,'文章管理')?></li>
                 <?php endif;?>  
                  <li><?=anchor('tech/content/'.$catid.'/'.$chid ,'新建文章')?></li>
                  <li ><?=anchor('tech/tag/'.$catid.'/'.$chid,'标签管理')?></li>
                  <li class="current-c"> <?=anchor('tech/channel/'.$catid.'/'.$chid,'新建频道')?></li>
                  <li >
           			 <?=anchor('tech/channellist/'.$catid.'/'.$chid,'频道管理')?> </li>
                  
                </ul>
            </div>
            <div class="cf-a"></div>
            <!--tab切换 end-->
            <div class="col-md-12 bor-a mar-t1">
                <div class="cf-h"></div>
                <!--表格左厕 start-->
                 <?php if(isset($channels) && isset($channels->id)):?>
                   	<?php echo form_open('tech/addchannel/'.$catid.'/'.$chid.'/'.$channels->id);?> 
                  <?php else:?>
                     	<?php echo form_open('tech/addchannel/'.$catid.'/'.$chid);?> 
                  <?php endif;?> 
                <div class="col-md-9 h-o">
                	<div class="row">
                    	<!--标题-->
                        <span>标题:</span>
                        <input type="text" class="form-control" name="name" value="<?php if(isset($channels)) echo $channels->name;?>"/>
                        <div class="cf-h"></div>
                        <!--规则-->
                       <span>描述:</span>
                       <input  class="form-control it-rule" type="text" name="fulltext" value="<?php if(isset($channels)) echo $channels->fulltext;?>"/>
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
                                	<?php if(isset($channels) && !empty($channels->urls)):?>
                                		<img src="<?=pictureurl2($uid,$channels->urls)?>" width="100">
                                    <?php endif;?>
                                </span>
                            </div>
                        </div>
                         <!--封面图-->
                        <div class="col-sm-6">
                            <div class="input-group row">
                                <span class="input-group-btn line-h-b ver-a-a">
                                    背景图：
                                    <div class="cf-a"></div>
                                    <button type="button" class="btn btn-default font-s-xs bor-ra-a btn-md-c" id="backgroundcover">选取</button>
                                    
                                </span>
                                <span class="input-group-btn pad-b ver-a-a input-thumb" id="backgroundcoverimage">
                                	<?php if(isset($channels) && !empty($channels->background)):?>
                                		<img src="<?=pictureurl2($uid,$channels->background)?>" width="100">
                                    <?php endif;?>
                                </span>
                            </div>
                        </div>
                    	<div class="cf-h"></div>
                        <!--按钮-->
                        <div class="text-c">
                       		 <input type="hidden" name="urls" value="<?php if(isset($channels)) echo $channels->urls;?>" id="urls">
                        	 <input type="hidden" name="background" value="<?php if(isset($channels)) echo $channels->background;?>" id="background">
                        	<input type="hidden" name="catid" value="<?=$catid?>">
                            <button class="btn btn-default btn-new-b" type="submit">保存</button>
                            <button class="btn btn-primary bg-color-c btn-new-c">发布</button>
                        </div>
                    </div>
                    <div class="cf-h"></div>
               </div>
               <!--表格左厕 end-->
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