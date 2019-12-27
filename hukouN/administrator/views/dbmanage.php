<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/common.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/itgenius.css">
<script type="text/javascript" src="<?=base_url()?>media/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url()?>media/js/bootstrap.js"></script>
<script src="<?=base_url()?>media/js/bootbox.js"></script>
<meta charset="utf-8">
<title>无忧产检</title>
</head>
<body>
<!--navbar start-->
<div class="navbar navbar-inverse itnavbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-collapse">
        <div class="btn-group">
        	<?php if($this->session->userdata('type') == "administrator"):?>
            <?=anchor('heredity_disease/index','遗传病库','class="btn btn-default"')?>
            <?=anchor('ipregnant_content/index','资料库','class="btn btn-default"')?>
            <?=anchor('inspect/index','我的产检','class="btn btn-default"')?>
            <?=anchor('chat/customer_service','客服平台','class="btn btn-default"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default"')?>
            <?=anchor('users/index','用户管理','class="btn btn-default"')?>
            <?=anchor('users/userfeedback','用户反馈','class="btn btn-default"')?>
             <?=anchor('userbasicsetting/index','基本设置','class="btn btn-default current-a"')?>
            <?php elseif($this->session->userdata('type') == "editor"):?>
            
            <?=anchor('heredity_disease/index','遗传病库','class="btn btn-default"')?>
            <?=anchor('ipregnant_content/index','资料库','class="btn btn-default"')?>
            <?=anchor('inspect/index','我的产检','class="btn btn-default"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default"')?>
            <?php elseif($this->session->userdata('type') == "service"):?>
            
            <?=anchor('chat/customer_service','客服平台','class="btn btn-default"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default"')?>
            
            <?php endif;?>
            <?=anchor('accountsettings/index','账号设置','class="btn btn-default"')?>
            <?=anchor('users/logout','退出','class="btn btn-default"')?>
        </div>
    </div>
  </div>
</div>
<!--navbar end-->
<div class="container login dis-d bor-a">
	<div class="row">
        <div class="col-sm-6 col-md-12 offsetmenu">
            <div class="h-o li-com-fl bg-color-a li-block li-ul-pad li-text-b li-height li-menu">
                <ul>
                    <li><?=anchor('userbasicsetting/index','积分管理')?></li>
                    <li class="current-b"><?=anchor('userbasicsetting/dbmanage','数据库管理')?></li>
                </ul>
            </div>
        </div>
		<div class="clear-13"></div>
		<div class="col-md-5 col-lg-5">
		  <?=anchor('userbasicsetting/backup','导出','class="btn btn-default btn-user-reset"')?>
        </div>
		<div class="clear-13"></div>
       	<div class="col-md-12 col-sm-12 h-o">
		<div class="li-table li-width-a li-ul-pad bor-a li-manage">
            <ul>
				<li>
                <div class="dis-e ver-a-b it-tab-caption"> <span>序号</span> </div>
                <div class="dis-e ver-a-b it-tab-caption"> <span>文件名</span> </div>
                <div class="dis-e ver-a-b it-tab-caption"> <span>时间</span> </div>
                <div class="dis-e ver-a-b it-tab-caption"> <span>操作</span> </div>
				</li>
                <div class="cf-d"></div>
                <?php $i=1; foreach($dbfiles as $dbfile):?>
                <li id="article-<?=$dbfile->id?>"> 
                    <!--序号-->
                    <div class="dis-e ver-a-b it-id">
                        <span>
                        <?=$i?>
                        </span>
                    </div>
                    <!--文章-->
                    <div class="dis-e ver-a-b it-article">
                        <span>
                        <?=$dbfile->path?>
                        </span>
                    </div>
                    <!--简介-->
                    <div class="dis-e ver-a-b it-check">
                    	<span>
                        <?=$dbfile->create_time?>
                        </span>
                    </div>
                    <!--操作-->
                    <div class="dis-e ver-a-b it-id">
                    <?=anchor('userbasicsetting/download/'.$dbfile->id,'下载','class="btn btn-default btn-user-reset"')?>
                
                    <button type="button" class="btn btn-danger deleteitem" data-url="<?=anchorurl('userbasicsetting/remove/'.$dbfile->id)?>" data-value="<?=$dbfile->id?>">删除</button>
                    </div>
                </li>
                <?php $i++; endforeach;?>
        	</ul>
        </div>
        <div class="text-b">
        <?php echo $this->pagination->create_links(); ?> 
        </div>
    </div>
</div>
<script>
	$(document).ready(function(e) {
        $('.deleteitem').click(function(){
			var url = $(this).data('url');
			var id = $(this).data('value');
			bootbox.dialog({
			  message: "您确定要删除吗？",
			  title: "删除文件",
			  buttons: {
				cancel: {
				  label: "取消",
				  className: "btn-success",
				  callback: function() {
				  }
				},
				confirm: {
				  label: "删除",
				  className: "btn-danger",
				  callback: function() {
					 $.ajax({
						 type :'GET',
						 url :url,
						 success: function(){
							$("#article-"+id).remove();
						 }
					 });
				  }
				}
			  }
			});
		});
    });
</script>
</body>
</html>
