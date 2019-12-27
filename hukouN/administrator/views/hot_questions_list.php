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
            <?=anchor('inspect/index','我的产检','class="btn btn-default"')?>
            <?=anchor('chat/customer_service','客服平台','class="btn btn-default"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default current-a"')?>
            <?=anchor('users/index','用户管理','class="btn btn-default"')?>
            <?=anchor('users/userfeedback','用户反馈','class="btn btn-default"')?>
             <?=anchor('userbasicsetting/index','基本设置','class="btn btn-default"')?>
            <?php elseif($this->session->userdata('type') == "editor"):?>
            
            <?=anchor('heredity_disease/index','遗传病库','class="btn btn-default"')?>
            <?=anchor('ipregnant_content/index','资料库','class="btn btn-default"')?>
            <?=anchor('inspect/index','我的产检','class="btn btn-default"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default current-a"')?>
            <?php elseif($this->session->userdata('type') == "service"):?>
            
            <?=anchor('chat/customer_service','客服平台','class="btn btn-default"')?>
            <?=anchor('hot_questions/index','热点咨询','class="btn btn-default current-a"')?>
            
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
            <li>
                <?=anchor('hot_questions/add_hot_questions/','发布问题')?>
            </li>
            <li class="current-b">
                <?=anchor('hot_questions/index/','问题列表')?>
            </li>
        </ul>
      </div>
    </div>
    <!--左厕菜单 end--> 
    			<div class="clear-13"></div>
    <div class="col-md-5 col-lg-5">
      <?php echo form_open('hot_questions/index','name="userform" id="userform"');?> 
        <div class="input-group">
          <input type="text" class="fl form-control" id="user-search-control" name="key" value="<?php if(isset($key)) echo $key;?>" placeholder="问题">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">搜索</button>
          </span>
        </div><!-- /input-group -->
      <?php echo form_close();?>
      </div>
    <div class="mar-l-b col-md-5 col-lg-5">
		  <?=anchor('hot_questions/index','重置','class="btn btn-default btn-user-reset"')?>
    </div>
        <div class="cf-e"></div>
    <!--右厕内容 start-->
    <div class="col-md-12 col-sm-12 h-o">
      <div class="li-table li-ul-pad bor-a li-question">
        <ul>
          <?php foreach($questions as $question):?>
          <?php /*?><li id="article-<?=$question->question_id?>"> 
          
            <!--问题-->
            <div class="dis-e ver-a-b it-article">
              <?=anchor('inspect/content/',$question->title)?>
            </div>
            <!--答案-->
            <div class="dis-e ver-a-b it-article">
              <?=anchor('inspect/content/',$question->answer)?>
            </div>
           
            <!--id-->
            <div class="dis-e ver-a-b it-id"> <span>
              <?=$question->question_id?>
              </span> </div>
            <div class="dis-e ver-a-b it-id">
              <button type="button" class="btn btn-danger deleteitem" data-url="<?=anchorurl('inspect/deletearticle/'.$question->question_id)?>" data-value="<?=$question->question_id?>">删除</button>
            </div>
          </li><?php */?>
          
          <li class="btn-md-c" id="article-<?=$question->question_id?>">
          	<div class="dis-e">
                <div class="dis-d it-q-title"> 
                	<div class="dis-table-cell pad-r-a">
                    	<span class="dis-a mar-t-a color-d pad-h-a bg-color-d">问</span>
                    </div>
                    <div class="dis-table-cell ver-a-a w-b-w">
                    	<?=anchor('hot_questions/add_hot_questions/'.$question->question_id,$question->title,'class="text-ai line-h-d"')?>
                    </div>
                </div>
                <div class="dis-d">
                    <div class="dis-table-cell pad-r-a ver-a-b">
                    	<span class="color-d pad-h-a bg-color-d">答</span>
                    </div>
                    <div class="dis-table-cell text-a w-b-w pt-re it-a-comment">
                    	<span class="pt-ab fa fa-caret-left color-f it-a-caret"></span>
						<div><?=$question->introduction?></div>
                    </div>
                </div>
            </div>
            <!--状态-->
            <div class="dis-e ver-a-b it-handle">
                <div class="li-com-fl li-block dis-c ver-a-b li-inline li-width-b it-switch">
                    <ul>
                      <li> 
                      	<?php if($question->ispublished == 1):?>
                      <a class="btn btn-default glyphicon glyphicon-ok btn-switch-first" href="<?=anchorurl('hot_questions/ispublished/'.$question->question_id.'/0'.'/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>"></a>
                        <div class="cf-a"></div>
                      	<span class="font-s-xs">已发布</span>
                        <?php elseif($question->ispublished == 0):?>
                      	<a class="btn btn-default glyphicon glyphicon-remove btn-switch-first" href="<?=anchorurl('hot_questions/ispublished/'.$question->question_id.'/1'.'/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>"></a>
                        <div class="cf-a"></div>
                      	<span class="font-s-xs">未发布</span>
                        <?php endif;?>
                      </li>
                    </ul>
              </div>
            </div>
          	<div class="dis-e ver-a-b text-b btn-delete-question">
            <?php /*?><a href="<?=anchorurl('chat/item/'.$question->question_id)?>" class="btn btn-default">预览</a><?php */?>
            <button type="button" class="btn btn-danger deleteitem" data-url="<?=anchorurl('hot_questions/removerecord/'.$question->question_id)?>" data-value="<?=$question->question_id?>">删除</button>
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
		 $(".ip-user-list").undelegate("#user-search-control","keypress").delegate("#user-search-control","keypress",function(event){
		var key = event.which;
		if(key == 13){
			$("#userform").submit();
		}
     });
   });	
</script>