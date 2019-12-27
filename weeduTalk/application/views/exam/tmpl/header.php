<div class="header clear">
<!--    <span><img src="--><?//=base_url()?><!--media/exam/images/we-logo.png" style="height:30px"></span>-->
    <div class="fn-r">
        <?php if(getViewer()->user_type=='teacher') {?>
        <span class="login-username ">你好，<?=getViewer()->name?>  老师！</span>
        <?php }else{?>
        <span class="login-username ">你好，<?=getViewer()->name?>  同学！</span>
        <?php }?>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle"
                    data-toggle="dropdown">
                更多操作 <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
<!--                <li><a href="#">阅卷</a></li>-->
<!--                <li><a href="#">学生页面</a></li>-->
                <li><a href="<?=anchorurl("login/logout")?>">退出登录</a></li>
            </ul>
        </div>
    </div>
  <?=$this->load->view("exam/tmpl/header_bar")?>
</div>