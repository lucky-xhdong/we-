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
<title>Ibaby</title>
</head>
<body>
<!--navbar start-->
<div class="navbar navbar-inverse itnavbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-collapse">
        <div class="btn-group">
  			<?=anchor('homepage/index','故事列表','class="btn btn-default current-a"')?>
            <?=anchor('homepage/add','添加故事','class="btn btn-default"')?>
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
            <li  class="current-b">
                <?=anchor('homepage/index/','故事列表')?>
            </li>
            <li>
                <?=anchor('homepage/add/','添加故事')?>
            </li>
        </ul>
      </div>
    </div>
     <!--左厕菜单 end-->
    <div class="clear-13"></div>
    <div class="col-md-5 col-lg-5">
      <?php echo form_open('homepage/index','name="userform" id="userform"');?> 
        <div class="input-group">
          <input type="text" class="fl form-control" id="user-search-control" name="key" value="<?php if(isset($key)) echo $key;?>" placeholder="文章标题">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">搜索</button>
          </span>
        </div><!-- /input-group -->
      <?php echo form_close();?>
      </div>
    <div class="mar-l-b col-md-5 col-lg-5">
		  <?=anchor('homepage/index','重置','class="btn btn-default btn-user-reset"')?>
    </div>
            <div class="cf-e"></div>
    <!--左厕菜单 end--> 
    <!--右厕内容 start-->
    <div class="col-md-12 col-sm-12 h-o">
      <div class="li-table li-width-a li-ul-pad bor-a li-manage">
        <ul>
          <li>
            <div class="dis-e ver-a-b it-tab-caption"> <span>序号</span> </div>
            <div class="dis-e ver-a-b it-tab-caption"> <span>标题</span> </div>
            <div class="dis-e ver-a-b it-tab-caption"> <span>简介</span> </div>
            <!-- <div class="dis-e ver-a-b it-tab-caption"> <span>状态</span> </div>-->
            <div class="dis-e ver-a-b it-tab-caption"> <span>操作</span> </div>
          </li>
          <div class="cf-d"></div>
          <?php $i = 0; foreach($stories as $story):?>
          <li id="article-<?=$story->story_id?>"> 
            <!--序号-->
            <div class="dis-e ver-a-b it-id">
            	<span>
              <?=++$i?>
              </span>
           </div>
            <!--文章-->
            <div class="dis-e ver-a-b it-article">
              <?=anchor('homepage/add/'.$story->story_id,$story->story_name)?>
            </div>
            <!--简介-->
            <div class="dis-e ver-a-b it-check">
              <?=anchor('homepage/add/'.$story->story_id,$story->description)?>
            </div>
            <!--删除文章按钮-->
            <div class="dis-e ver-a-b it-id">
              <?php /*?><a href="<?=anchorurl('heredity_disease/item/'.$article->knowledge_id)?>" class="btn btn-default">预览</a><?php */?>
              <button type="button" class="btn btn-danger deleteitem" data-url="<?=anchorurl('homepage/removerecord/'.$story->story_id)?>" data-value="<?=$story->story_id?>">删除</button>
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