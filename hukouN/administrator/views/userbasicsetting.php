<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/common.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/itgenius.css">
<script type="text/javascript" src="<?=base_url()?>media/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/jquery.form.js"></script>
<meta charset="utf-8">
<title>无忧产检</title>
<script>
var imagetype = 'editor';
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
                    <li class="current-b"><?=anchor('userbasicsetting/index','积分管理')?></li>
                    <li><?=anchor('userbasicsetting/dbmanage','数据库管理')?></li>
                </ul>
            </div>
        </div>
        <div class="cf-a"></div>
		<?php if(isset($error) && $error === true):?>
        <div class="pad-h-d">
        	<span class="hidden-login-tips" style="color:#ff0000">旧密码输入错误！</span>
        </div>
        <?php elseif(isset($error) && $error === false):?>
        <div class="pad-h-d">
        	<span class="hidden-login-tips" style="color:#3c3">修改成功！</span>
        </div>
        <?php endif;?>
		<div class="clear-13"></div>
        <!--右厕内容 start-->
        <div class="col-sm-6 col-md-6">
        	<!--注册输入框 start-->
            <?php echo form_open('userbasicsetting/updatescore/');?> 
          	<div class="input-group">
              <span class="input-group-btn role-input-group">
                <a href="javascript:;" class="btn btn-default span-user-basicset">下载APP：</a>
              </span>
              <input type="text" class="form-control" name="download_app" value="<?=$scores->download_app?>">
          	</div>
            <div class="cf-e"></div>
          	<div class="input-group">
              <span class="input-group-btn role-input-group">
              	<a href="javascript:;" class="btn btn-default span-user-basicset">设置预产期：</a>
              </span>
              <input type="text" class="form-control" name="set_child_birth_date" value="<?=$scores->set_child_birth_date?>">
          	</div>
            <div class="cf-e"></div>
          	<div class="input-group">
              <span class="input-group-btn role-input-group">
              	<a href="javascript:;" class="btn btn-default span-user-basicset">上传头像：</a>
              </span>
              <input type="text" class="form-control" name="upload_avatar" value="<?=$scores->upload_avatar?>">
          	</div>
            <div class="cf-e"></div>
          	<div class="input-group">
              <span class="input-group-btn role-input-group">
              	<a href="javascript:;" class="btn btn-default span-user-basicset">记录孕期短语：</a>
              </span>
              <input type="text" class="form-control" name="record_pregnancy_phrases" value="<?=$scores->record_pregnancy_phrases?>">
          	</div>
            <div class="cf-e"></div>
          	<div class="input-group">
              <span class="input-group-btn role-input-group">
              	<a href="javascript:;" class="btn btn-default span-user-basicset">分享孕期日记至社交圈：</a>
              </span>
              <input type="text" class="form-control" name="share_note_social" value="<?=$scores->share_note_social?>">
          	</div>
            <div class="cf-e"></div>
          	<div class="input-group">
              <span class="input-group-btn role-input-group">
              	<a href="javascript:;" class="btn btn-default span-user-basicset">记录身形图：</a>
              </span>
              <input type="text" class="form-control" name="record_body_shape" value="<?=$scores->record_body_shape?>">
          	</div>
            <div class="cf-e"></div>
          	<div class="input-group">
              <span class="input-group-btn role-input-group">
              	<a href="javascript:;" class="btn btn-default span-user-basicset">分享身形拼图至社交圈：</a>
              </span>
              <input type="text" class="form-control" name="share_body_shape_social" value="<?=$scores->share_body_shape_social?>">
          	</div>
            <!--注册输入框 end-->
            <!--注册按钮 start-->
            <div class="cf-i"></div>
            <div class="col-sm-4 text-b">
            	<div class="row">
            		<button class="btn btn-default btn-md-a btn-it-md bg-color-b line-h-b it-btn-a" type="submit">提交</button>
                </div>
            </div>
             <?php echo form_close();?>
            <!--注册按钮 end-->
     
   　　<!--右厕内容 end-->
    </div>
</div>
</body>
</html>
