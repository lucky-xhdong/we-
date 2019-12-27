<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/common.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/itgenius.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/spectrum.css">
<script type="text/javascript" src="<?=base_url()?>media/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/spectrum.js"></script>
<meta charset="utf-8">
<title>天才程序员登录页</title>
<script>
	 $(document).ready(function(e) {
$("#color").spectrum({
    color: "rgb(0, 0, 0)",
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
</head>
<?php
	$chid  = $this->uri->segment(4);
	$catid = $this->uri->segment(3);
?>

<body>
<!--navbar start-->
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
        <div class="col-md-10 h-o">
            <div class="cf-h"></div>
            <div class="li-com-fl li-block li-text-b it-nav">
                <ul>
                <?php if($catid ==1):?>
                   <li ><?=anchor('tech/index/'.$catid.'/'.$chid ,'文章管理')?></li>
                 <?php else:?>
                 	<li ><?=anchor('special/index/'.$catid.'/'.$chid ,'文章管理')?></li>
                 <?php endif;?>  
                  <li ><?=anchor('tech/content/'.$catid.'/'.$chid ,'新建文章')?></li>
                  <li class="current-c"><?=anchor('tech/tag/'.$catid.'/'.$chid,'标签管理')?></li>
                 <li >
            <?=anchor('tech/channel/'.$catid.'/'.$chid,'新建频道')?>
          </li>
           <li >
            <?=anchor('tech/channellist/'.$catid.'/'.$chid,'频道管理')?>
          </li>
                </ul>
            </div>
            <div class="cf-a"></div>
           <div class="col-sm-10 bor-a mar-t1">
               <span class="line-h-d">已有标签:</span>
               <div class="cf-a"></div>
                <div class="dis-e ver-a-b li-com-fl li-ul-pad li-block li-inline it-label-manage">
                    <ul>
                    	<?php foreach($tags as $tag):?>
                            <li><a href="javascript:void(0)" class="label-com label-act-b"><?=$tag->name?></a>
                                <?=anchor('tech/deletetag/'.$catid.'/'.$chid.'/'.$tag->id,' ','class="fl pad-i del-label-a"')?>
                            </li>
                         <?php endforeach;?>   
                    </ul>
                </div>
               <div class="cf-h"></div>
              <?php echo form_open('tech/addtag/'.$catid.'/'.$chid);?>  
               <div class="col-xs-6">
                    <div class="input-group">
                        <span class="input-group-btn">新建标签：</span>
                        <input type="text" class="form-control it-input-a" name="name">
                    </div>
                </div>
               <div class="col-xs-6">
                    <div class="input-group">
                        <span class="input-group-btn line-h-d">
                           <input type="checkbox" name="important" value="1">
                            重点标签
                        </span>
                    </div>
                </div>
               <div class="cf-h"></div>
                  <input type='text' id="color"/>
                <div class="text-c">
                	<input type="hidden" name="colorrgb" id="colorrgb" value="">
                	<input type="hidden" name="chid" value="<?=$chid?>">
                    <button class="btn btn-default btn-new-b" type="submit">保存</button>
                    <button class="btn btn-primary bg-color-c btn-new-c">发布</button>
                </div>
               <div class="cf-h"></div>
                <?php echo form_close();?>
           </div>
        </div>
    　　<!--右厕内容 end-->
    </div>
</div>
</body>
</html>
