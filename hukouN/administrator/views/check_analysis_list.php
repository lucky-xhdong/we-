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
            <?=anchor('inspect/index','我的产检','class="btn btn-default current-a"')?>
            <?=anchor('chat/customer_service','客服平台','class="btn btn-default"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default"')?>
            <?=anchor('users/index','用户管理','class="btn btn-default"')?>
            <?=anchor('users/userfeedback','用户反馈','class="btn btn-default"')?>
             <?=anchor('userbasicsetting/index','基本设置','class="btn btn-default"')?>
            <?php elseif($this->session->userdata('type') == "editor"):?>
            
            <?=anchor('heredity_disease/index','遗传病库','class="btn btn-default"')?>
            <?=anchor('ipregnant_content/index','资料库','class="btn btn-default"')?>
            <?=anchor('inspect/index','我的产检','class="btn btn-default current-a"')?>
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
<div class="container dis-d">
  <div class="row"> 
    <!--左厕菜单 start-->
    <div class="col-md-12 col-sm-12 offsetmenu">
      <div class="h-o li-com-fl bg-color-a li-block li-ul-pad li-text-b li-height li-menu">
          <ul>
             <ul>
             <li>
                <?=anchor('inspect/index/','产检知识列表')?>
            </li>
             <li >
                <?=anchor('inspect/publish_inspect/','发布产检知识')?>
            </li>
           <li>
                <?=anchor('inspect/publish_content/','发布孕周知识')?>
            </li>
            <li >
                <?=anchor('inspect/inspect_record_list/','孕周知识列表')?>
            </li>
            <?php if($type == 'downs'):?>
                <li class="current-b">
                    <?=anchor('inspect/downs_syndrome_list/','唐氏综合症筛查')?>
                </li>
                 <li >
                    <?=anchor('inspect/gestational_diabetes_screening/','妊娠糖尿病筛查')?>
                </li>
                <li>
                <?=anchor('inspect/impaired_glucose_tolerance/','糖耐量受损检查')?>
            	</li>
            <?php elseif($type == 'gestational'):?>
            	  <li>
                    <?=anchor('inspect/downs_syndrome_list/','唐氏综合症筛查')?>
                </li>
                <li class="current-b">
                    <?=anchor('inspect/gestational_diabetes_screening/','妊娠糖尿病筛查')?>
                </li>
                 <li>
                <?=anchor('inspect/impaired_glucose_tolerance/','糖耐量受损检查')?>
            	</li>
            <?php else:?>
            	  <li>
                    <?=anchor('inspect/downs_syndrome_list/','唐氏综合症筛查')?>
                </li>
                <li >
                    <?=anchor('inspect/gestational_diabetes_screening/','妊娠糖尿病筛查')?>
                </li>
            	<li class="current-b">
                <?=anchor('inspect/impaired_glucose_tolerance/','糖耐量受损检查')?>
            	</li>
            <?php endif;?>
        </ul>
        </ul>
      </div>
    </div>
    <!--左厕菜单 end--> 
    
        <div class="cf-e"></div>
        <?php  if($type=='impaired'):?>
        <div class="mar-l-a col-md-12 col-sm-12 checkreference">
        	<h4>检测参考值:</h4>
            <section class="line-h-b">
            	1、空腹血糖：5.8mmol/L（标准值）<br>
                2、服糖后1小时血糖：10.6mmol/L（标准值）<br>
                3、服糖后2小时血糖：9.2mmol/L（标准值）<br>
                4、服糖后3小时血糖：8.1mmol/L（标准值）<br>
            </section>
        </div>
        <?php endif;?>
        <div class="cf-e"></div>
    <!--右厕内容 start-->
    <div class="col-md-12 col-sm-12 h-o">
      <div class="li-table li-width-a li-ul-pad bor-a li-manage li-reference-value">
        <ul>
          <li>
            <div class="dis-e ver-a-b it-tab-caption"> <span>序号</span> </div>
            <div class="dis-e ver-a-b it-tab-caption"> <span>标志</span> </div>
            <div class="dis-e ver-a-b it-tab-caption"> <span>简介</span> </div>
            <div class="dis-e ver-a-b it-tab-caption"> <span>操作</span> </div>
          </li>
          <div class="cf-d"></div>
          <?php $i=1; foreach($analysis as $analysi):?>
          <li id="article-<?=$analysi->id?>"> 
            <!--序号-->
            <div class="dis-e ver-a-b it-id  ip-id"> <span>
              <?=$i++?>
              </span> </div>
              <div class="dis-e ver-a-b it-check">
               <?php if($analysi->type == 'impaired'):?>
               	 <?=$analysi->item?> 项高于标准
               <?php else:?>
				   <?php if($analysi->flag == 'lt'):?>
                      小于
                    <?php elseif($analysi->flag == 'gt'):?>
                       大于  
                    <?php elseif($analysi->flag == 'gte'):?>              
                      大于等于
                    <?php elseif($analysi->flag == 'lte'):?>   
                     小于等于
                   <?php endif;?>   
                   <?=$analysi->value?> 
                 <?php endif;?>            
             </div>
            <!--简介-->
            <div class="dis-e ver-a-b it-check">
              <?=anchor('inspect/publish_check_analysi/'.$analysi->id,strip_tags($analysi->content))?>
            </div>
            <!--状态-->
            <!--删除-->
            <div class="dis-e ver-a-b it-id">
             <?php /*?> <a href="<?=anchorurl('inspect/inspect_item_week/'.$inspect->inspect_record_id)?>" class="btn btn-default">预览</a><?php */?>
              <a type="button" class="btn btn" href="<?=anchorurl('inspect/publish_check_analysi/'.$analysi->id)?>">编辑</a>
            </div>
          </li>
          <div class="cf-d"></div>
          <?php endforeach;?>
        </ul>
      </div>
      <div class="text-b">
        <?php echo $this->pagination->create_links(); ?> </div>
    </div>
    <!--右侧内容 end--> 
  </div>
</div>
<?php /*?><script src="<?=base_url()?>media/js/bootstrap-paginator.js"></script>
<script src="<?=base_url()?>media/js/qunit-1.11.0.js"></script>
<script type="text/javascript">
$(function(){
	test("Test bootstrap v3 rendering", function(){
		var element = $('#bp-3-element-test');
		var options = {
			bootstrapMajorVersion:3,
			currentPage: 3,
			numberOfPages: 5,
			totalPages:11
		}
		element.bootstrapPaginator(options);
		var element = $('#bp-3-element-test');
		ok(!element.hasClass('pagination-lg'),"Root element shouldn't have pagination-lg class");
		ok(!element.hasClass('pagination-sm'),"Root element shouldn't have pagination-sm class");
		var list = element.children();
		for(var i=0;i < list.length;i++)
		{
			var item = $(list[i]);
			ok(item.is("li"),"Element "+i+" should be li");
		}
		options = {
			size:"large",
			bootstrapMajorVersion:3,
			currentPage: 3,
			numberOfPages: 5,
			totalPages:11
		};
		var element = $('#bp-3-element-lg-test');
		element.bootstrapPaginator(options);
		ok(element.hasClass('pagination-lg'),"Root element should have pagination-lg class");
		var element = $('#bp-3-element-sm-test');
		options = {
			size:"small",
			bootstrapMajorVersion:3,
			currentPage: 3,
			numberOfPages: 5,
			totalPages:11
		};
		element.bootstrapPaginator(options);
		ok(element.hasClass('pagination-sm'),"Root element should have pagination-sm class");
	})
});
</script>
<?php */?>
</body>
</html>
<script>
   var url = '<?=anchorurl('inspect/inspect_record_list/')?>';
	$(document).ready(function(e) {
		
		 $(".ip-user-list").undelegate("#user-search-control","keypress").delegate("#user-search-control","keypress",function(event){
		var key = event.which;
		if(key == 13){
			$("#userform").submit();
		}
	});
    });
</script>