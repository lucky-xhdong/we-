<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/common.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/itgenius.css">
<script type="text/javascript" src="<?=base_url()?>media/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/jquery.form.js"></script>
<meta charset="utf-8">
<title>唯佳教育集团-后台管理系统</title>
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
<?php $this->load->view('topheader');?>
<!--navbar end-->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row">
        <!--左厕菜单 start-->
        <?php $this->load->view('aside');?>
        <!--左厕菜单 end-->
        <!--右厕内容 start-->
        <section class="pt-re main-carema-list">
            <nav class="nav-section">
                <ul>
                    <li><?=anchor('users/useritem/'.$user->id, '用户详情','class="current"')?></li>
                </ul>
            </nav>
            <a class="pad-h-m color-aI pt-ab history-goback" href="javascript:history.go(-1);">返回</a>
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
            <!--右厕内容 start-->
            <div class="col-sm-6 col-md-6  form-user-items">
                <ul>
                    <?php echo form_open('users/updateuser','id="useritemform"');?>
                    <li>
                        <span class="user-item-left">用户名：</span>
                        <span class="form-control user-item-right"><?=$user->user_name?></span>
                    </li>
                    <div class="cf-h"></div>
                    <li>
                        <span class="user-item-left">所属部门：</span>
                        <select name="department_id" class="form-control">
                            <option value="0">全部</option>
                            <?php foreach ($departments as $department): ?>
                                <?php if (isset($department->id) && $department->id == $user->department_id): ?>
                                    <option value="<?= $department->id ?>" selected>
                                        <?= $department->name ?>
                                    </option>
                                <?php else: ?>
                                    <option value="<?= $department->id ?>"> <?= $department->name ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </li>
                    <div class="cf-h"></div>
                    <li>
                        <span class="user-item-left">密码：</span>
                        <input type="password" name="password" class="form-control user-item-right">
                    </li>
                    <div class="cf-h"></div>
                    <li>
                        <span class="user-item-left">注册时间：</span>
                        <span class="form-control user-item-right"><?=$user->create_time?></span>
                    </li>
                    <div class="cf-h"></div>
                    <li>
                        <span class="user-item-left">最后访问时间：</span>
                        <span class="form-control user-item-right"><?=$user->last_login_time?></span>
                    </li>
                    <div class="cf-h"></div>
                    <li>
                        <span class="user-item-left">手机号：</span>
                        <input type="text" name="mobile" class="form-control user-item-right" value="<?=$user->mobile?>">
                    </li>
                    <div class="cf-h"></div>
                    <li>
                        <span class="user-item-left">Email：</span>
                        <span class="form-control user-item-right"><?=$user->email?></span>
                    </li>
                    <div class="cf-h"></div>
                    <li >
                        <span class="user-item-left">角色：</span>
                        <select name="user_type" class="form-control user-item-right">
                            <option value="administrator" <?php if($user->user_type == 'administrator') echo 'selected';?>>管理员</option>
                            <option value="register" <?php if($user->user_type == 'register') echo 'selected';?>>普通用户</option>
                        </select>
                    </li>
                    <div class="cf-h"></div>
                    <?php if($user->user_type == 'doctor'):?>
                        <li>
                            <span class="user-item-left">评分：</span>
                            <span class="user-item-right" id="gradecontent">
                                <?php for($j = 0; $j < $score; $j++):?>
                                    <img src="<?=base_url()?>media/images/star_y.png" class="grade" data-value="<?=$j+1?>">
                                <?php endfor;?>
                                <?php for($j = $score; $j < 5; $j++):?>
                                    <img src="<?=base_url()?>media/images/star_g.png" class="grade" data-value="<?=$j+1?>">
                                <?php endfor;?>

                            </span>
                        </li>
                        <div class="cf-h"></div>
                        <input type="hidden" name="score" id="score" value="<?=$score?>">
                    <?php endif;?>
                    <li class="text-b">
                        <input type="hidden" name="user_id" value="<?=$user->id?>">
                        <button class="btn btn-success btn-new-c" id="useritem" type="submit">提交</button>
                    </li>
                    <div class="cf-h"></div>
                    <?php echo form_close();?>
                </ul>
            </div>
            <!--右厕内容 end-->
        </section>
    </div>
</div>
</body>
<script>
    $(".form-user-items").undelegate(".grade", 'click').delegate(".grade", 'click', function(){
        var value = parseInt($(this).data('value'));
        var string = '';
        for(var i=0;i<value;i++){
            string += ' <img src="<?=base_url()?>media/images/star_y.png" class="grade" data-value="'+(i+1)+'"> ';
        }
        for(var i=value;i< 5;i++){
            string += ' <img src="<?=base_url()?>media/images/star_g.png" class="grade" data-value="'+(i+1)+'"> ';
        }
        $("#gradecontent").html(string);
        $("#score").val(value);
    });
</script>
</html>
