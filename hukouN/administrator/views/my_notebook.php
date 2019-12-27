<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrapv3.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/font-awesome-4.0.3/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/font-awesome-4.0.3/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/common.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/itgenius.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/qunit-1.11.0.css">
<script src="<?=base_url()?>media/js/jquery-1.10.2.min.js"></script>
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
            
            <?=anchor('heredity_disease/index','遗传病库','class="btn btn-default current-a"')?>
            <?=anchor('ipregnant_content/index','资料库','class="btn btn-default"')?>
            <?=anchor('inspect/index','我的产检','class="btn btn-default"')?>
            <?=anchor('chat/customer_service','客服平台','class="btn btn-default"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default"')?>
            <?=anchor('users/index','用户管理','class="btn btn-default"')?>
            <?=anchor('users/userfeedback','用户反馈','class="btn btn-default"')?>
            
            <?php elseif($this->session->userdata('type') == "editor"):?>
            
            <?=anchor('heredity_disease/index','遗传病库','class="btn btn-default current-a"')?>
            <?=anchor('ipregnant_content/index','资料库','class="btn btn-default"')?>
            <?=anchor('inspect/index','我的产检','class="btn btn-default"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default"')?>
            <?php elseif($this->session->userdata('type') == "service"):?>
            
            <?=anchor('chat/customer_service','客服平台','class="btn btn-default current-a"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default"')?>
            
            <?php endif;?>
            <?=anchor('users/logout','退出','class="btn btn-default"')?>
        </div>
    </div>
  </div>
</div>
<!--navbar end-->
<div class="container dis-d bor-a">
  <div class="row"> 
   
    <!--右厕内容 start-->
    <div class="col-md-12 h-o">
      <div class="cf-h"></div>
      <div class="li-com-fl li-block li-text-b it-nav">
        <ul>
          <li class="current-c">
            <?=anchor('tech/index/','文章管理')?>
          </li>
          <li >
            <?=anchor('tech/content/','新建文章')?>
          </li>
          <li>
            <?=anchor('tech/tag/','标签管理')?>
          </li>
       	 <li >
            <?=anchor('tech/channel/','新建频道')?>
          </li>
           <li >
            <?=anchor('tech/channellist/','频道管理')?>
          </li>
        </ul>
      </div>
      <div class="cf-a"></div>
      <div class="li-table li-width-a li-ul-pad mar-t1 bor-a li-manage">
        <ul>
          <li>
            <div class="dis-e ver-a-b it-tab-caption"> <span>全选</span> </div>
            <div class="dis-e ver-a-b it-tab-caption"> <span>操作</span> </div>
            <div class="dis-e ver-a-b it-tab-caption"> <span>文章</span> </div>
            <div class="dis-e ver-a-b it-tab-caption"> <span>标签</span> </div>
            <div class="dis-e ver-a-b it-tab-caption"> <span>时间</span> </div>
            <div class="dis-e ver-a-b it-tab-caption"> <span>id</span> </div>
            <div class="dis-e ver-a-b it-tab-caption"> <span>删除</span> </div>
          </li>
          <div class="cf-d"></div>
          <li id="article-"> 
            <!--全选-->
            <div class="dis-e ver-a-b it-check">
              <input type="checkbox">
            </div>
            <!--操作-->
            <div class="dis-e ver-a-b it-handle">
              <div class="li-com-fl li-block dis-c ver-a-b li-inline li-width-b it-switch">
                <ul id="">
                  <li> 
                 
                    <div class="cf-a"></div>
                    <span class="font-s-xs">flash</span> </li>
                </ul>
              </div>
            </div>
            <!--文章-->
            <div class="dis-e ver-a-b it-article">
             111
            </div>
            <!--标签-->
            <div class="dis-e ver-a-b it-label li-inline">
              <ul>
                
                <li><a href="javascript:void(0)" class="label-com label-act-b">
                
                  </a></li>
               
              </ul>
            </div>
            <!--时间-->
            <div class="dis-e ver-a-b it-time"> <span>
            
              </span> </div>
            <!--id-->
            <div class="dis-e ver-a-b it-id"> <span>
         >
              </span> </div>
            <div class="dis-e ver-a-b it-id">
              <button type="button" class="btn btn-danger deleteitem" data-url="<?=anchorurl('tech/deletearticle/')?>" data-value="">删除</button>
            </div>
          </li>
          <div class="cf-d"></div>
        </ul>
      </div>
      <div class="text-b">
        
    </div>
    <!--右侧内容 end--> 
  </div>
</div>
</body>
</html>
<script>
	$(document).ready(function(e) {
        $('.deleteitem').click(function(){
			var url = $(this).data('url');
			var id = $(this).data('value');
			bootbox.dialog({
					  message: "您确定要删除吗？",
					  title: "删除文章",
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