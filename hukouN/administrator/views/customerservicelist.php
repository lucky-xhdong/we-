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
<div class="container login dis-d bor-a">
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
          <li><?=anchor('users/register','添加用户')?></li>
        </ul>
      </div>
    </div>
    <!--左厕菜单 end-->
    <div class="cf-a"></div>
    <div class="col-sm-6 col-md-10">
        <a class="pad-h-d fl" href="javascript:history.go(-1);">返回</a>
        <div class="fr pad-h-d">
            <span>回答问题总数：<?=$totalquestions?></span>
            <span class="mar-l-a">平均评分：<?php for($m = 1; $m <= $avgscore; $m++):?><img src="<?=base_url()?>media/images/star_y.png"><?php endfor;?></span>
        </div>
    </div>
    <div class="cf-a"></div>
       <!--右厕内容 start-->
       <div class="col-md-10">
        <div class="li-table li-width-a li-ul-pad text-b mar-t1 bor-a li-user-manage">
        	<ul>
            	<li>
                	<div class="dis-e ver-a-b it-tab-caption">
                    	<span>序号</span>
                    </div>
                	<div class="dis-e ver-a-b it-tab-caption">
                    	<span>问题</span>
                    </div>
                    <div class="dis-e ver-a-b it-tab-caption">
                    	<span>提问时间</span>
                    </div>
                	<div class="dis-e ver-a-b it-tab-caption">
                    	<span>评价等级</span>
                    </div>
                    <!--<div class="dis-e ver-a-b it-tab-caption">
                    	<span>操作</span>
                    </div>-->
                </li>
                <div class="cf-d"></div>
                <?php $i = 1; foreach($users as $user):?>
            	<li>
                	<div class="dis-e ver-a-b it-article">
					  <?=$i++;?>
                    </div>
                	<div class="dis-e ver-a-b it-time ip-cs-question">
                    	<span><?=$user->content?></span>
                    </div>
                    <div class="dis-e ver-a-b it-time">
                    	<span><?=$user->create_time?></span>
                    </div>
                	<?php /*?><div class="dis-e ver-a-b it-id">
                    	<span><?=$user->scores?></span>
                    </div><?php */?>
                    <div class="dis-e ver-a-b it-id">
                    	<span>
                        	<?php for($j = 1; $j <= $user->scores; $j++):?>
								<img src="<?=base_url()?>media/images/star_y.png">
                            <?php endfor;?>
                        	<?php for($j = 1; $j <= 5-$user->scores; $j++):?>
                                <img src="<?=base_url()?>media/images/star_g.png">
                            <?php endfor;?>
                        </span>
                    </div>
                    <!--<div class="dis-e ver-a-b it-id">
                    	<button type="button" class="btn btn-danger">删除</button>
                    </div>-->
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
</body>
</html>
