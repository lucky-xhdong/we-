<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/font-awesome-4.0.3/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/font-awesome-4.0.3/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/common.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/itgenius.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/qunit-1.11.0.css">
<script src="<?=base_url()?>media/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url()?>media/js/bootstrapv3.js"></script>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible"content="IE=9; IE=8; IE=7; IE=EDGE">
<!--<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />-->
<meta content="width=device-width, initial-scale=1.0" name="viewport">
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
            <?=anchor('users/index','用户管理','class="btn btn-default current-a"')?>
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
<div class="container login dis-d bor-a ip-user-list">
	<div class="row">
    <!--左厕菜单 start-->
    <div class="col-sm-6 col-md-12 offsetmenu">
      <div class="h-o li-com-fl bg-color-a li-block li-ul-pad li-text-b li-height li-menu">
        <ul>
          <li>
            <?=anchor('users/index/','用户列表')?>
          </li>
          <li class="current-b">
            <?=anchor('users/customerservice/','客服列表')?>
          </li>
          <li>
            <?=anchor('users/editorlist/','内容管理员列表')?>
          </li>
          <li><?=anchor('users/register','添加用户')?></li>
        </ul>
      </div>
    </div>
    <!--左厕菜单 end-->
    <div class="clear-13"></div>
    <div class="col-md-5 col-lg-5">
      <?php echo form_open('users/customerservice','name="userform" id="userform"');?> 
        <div class="input-group">
          <input type="text" class="fl form-control" id="user-search-control" name="key" value="<?php if(isset($key)) echo $key;?>" placeholder="用户名">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">搜索</button>
          </span>
        </div><!-- /input-group -->
      <?php echo form_close();?>
      </div>
    <div class="mar-l-b col-md-5 col-lg-5">
		  <?=anchor('users/customerservice','重置','class="btn btn-default btn-user-reset"')?>
    </div>
      <div class="cf-e"></div>
       <!--右厕内容 start-->
       <div class="col-md-10">
        <div class="li-table li-width-a li-ul-pad text-b mar-t1 bor-a li-user-manage">
        	<ul>
            	<li>
                    <div class="dis-e ver-a-b it-tab-caption">
                    	<span>头像</span>
                    </div>
                	<div class="dis-e ver-a-b it-tab-caption">
                    	<span>用户名</span>
                    </div>
                	<div class="dis-e ver-a-b it-tab-caption">
                    	<span>注册时间</span>
                    </div>
                    <div class="dis-e ver-a-b it-tab-caption">
                    	<span>最后登录时间</span>
                    </div>
                	<div class="dis-e ver-a-b it-tab-caption">
                    	<span>回答问题数</span>
                    </div>
                	<div class="dis-e ver-a-b it-tab-caption">
                    	<span>操作</span>
                    </div>
                </li>
                <div class="cf-d"></div>
                <?php foreach($users as $user):?>
            	<li>
                    <div class="dis-e ver-a-b it-id ip-avatar-1">
                      <span><img src="<?=pictureurlsizeipregnant('square',$user->header_picture_url)?>"></span>
                    </div>
                	<div class="dis-e ver-a-b it-article">
					  <?=anchor('users/customerservicelist/'.$user->user_id,$user->user_name)?>
                    </div>
                	<div class="dis-e ver-a-b it-time">
                    	<span><?=$user->create_time?></span>
                    </div>
                    <div class="dis-e ver-a-b it-time">
                    	<span><?=$user->create_time?></span>
                    </div>
                	<div class="dis-e ver-a-b it-id">
                    	<span><?=$user->servicecount?></span>
                    </div>
                	<div class="dis-e ver-a-b it-id">
                    	<?=anchor('users/useritem/'.$user->user_id,'详情')?>
                    </div>
                </li>
                <div class="cf-d"></div>
                <?php endforeach;?>
            </ul>
        </div>
			<div class="text-b">
               <?php echo $this->pagination->create_links(); ?>
            </div>
       </div>
   　　<!--右厕内容 end-->
    </div>
</div>
<script>
$(document).ready(function(e) {
    $(".ip-user-list").undelegate("#user-search-control","keypress").delegate("#user-search-control","keypress",function(event){
		var key = event.which;
		if(key == 13){
			$("#userform").submit();
		}
	});
});
</script>
</body>
</html>
