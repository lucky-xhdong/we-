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
<title>天才程序员登录页</title>
</head>
<?php
	$catid  = $default_catid;
	$chid = $this->uri->segment(4);
	if(empty($chid)){
		$chid  = $default_chid;
	}
?>
<body>
<!--navbar start-->
<div class="navbar navbar-inverse itnavbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-collapse text-b">
      <?=anchor('tech/index','技术','class="navbar-brand current-a"')?>
      <?=anchor('special/index','专题','class="navbar-brand"')?>
      <?=anchor('users/index','用户管理','class="navbar-brand"')?>
      <?=anchor('users/logout','退出','class="navbar-brand"')?>
    </div>
  </div>
</div>
<!--navbar end-->
<div class="container dis-d bor-a">
  <div class="row"> 
    <!--左厕菜单 start-->
    <div class="col-md-2 bg-color-a pad-a h-o offsetmenu">
      <button class="btn btn-success bg-color-d color-d bor-none mar-g btn-new-a">新建频道</button>
      <div class="li-com-fl li-block li-ul-pad li-text-b li-height li-menu">
        <ul>
          <?php foreach($channel as $item):?>
          <li <?php if($chid  == $item->id) echo 'class="current-b"';?>>
            <?=anchor('tech/index/'.$catid.'/'.$item->id,$item->name)?>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
    </div>
    <!--左厕菜单 end--> 
    <!--右厕内容 start-->
    <div class="col-lg-10 h-o">
      <div class="cf-h"></div>
      <div class="li-com-fl li-block li-text-b it-nav">
        <ul>
          <li class="current-c">
            <?=anchor('tech/index/'.$catid.'/'.$chid,'文章管理')?>
          </li>
          <li >
            <?=anchor('tech/content/'.$catid.'/'.$chid,'新建文章')?>
          </li>
          <li>
            <?=anchor('tech/tag/'.$catid.'/'.$chid,'标签管理')?>
          </li>
       	 <li >
            <?=anchor('tech/channel/'.$catid.'/'.$chid,'新建频道')?>
          </li>
           <li >
            <?=anchor('tech/channellist/'.$catid.'/'.$chid,'频道管理')?>
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
          <?php foreach($articles as $article):?>
          <li id="article-<?=$article->id?>"> 
            <!--全选-->
            <div class="dis-e ver-a-b it-check">
              <input type="checkbox">
            </div>
            <!--操作-->
            <div class="dis-e ver-a-b it-handle">
              <div class="li-com-fl li-block dis-c ver-a-b li-inline li-width-b it-switch">
                <ul id="">
                  <li> 
                  <?php if($article->published == 0):?>
                  	 <a href="<?=anchorurl('tech/published/'.$catid.'/'.$chid.'/'.$article->id.'/1')?>" class="btn btn-default glyphicon glyphicon-remove btn-switch-first"></a>
                  <?php else:?>
                  	 <a href="<?=anchorurl('tech/published/'.$catid.'/'.$chid.'/'.$article->id.'/0')?>" class="btn btn-default glyphicon glyphicon-ok btn-switch-first"></a>
                  <?php endif;?>
                    <div class="cf-a"></div>
                    <span class="font-s-xs">有效</span> </li>
                  <li> 
                   <?php if($article->featured == 0):?>
                  	 <a href="<?=anchorurl('tech/featured/'.$catid.'/'.$chid.'/'.$article->id.'/1')?>" class="btn btn-default fa fa-star-o btn-switch-center"></a>
                  <?php else:?>
                  	 <a href="<?=anchorurl('tech/featured/'.$catid.'/'.$chid.'/'.$article->id.'/0')?>" class="btn btn-default fa fa-star btn-switch-center"></a>
                  <?php endif;?>
                    <div class="cf-a"></div>
                    <span class="font-s-xs">置顶</span> </li>
                  <li> 
                   <?php if($article->flashed == 0):?>
                  	 <a href="<?=anchorurl('tech/flashed/'.$catid.'/'.$chid.'/'.$article->id.'/1')?>" class="btn btn-default fa fa-bookmark-o btn-switch-last"></a>
                  <?php else:?>
                  	 <a href="<?=anchorurl('tech/flashed/'.$catid.'/'.$chid.'/'.$article->id.'/0')?>" class="btn btn-default fa fa-bookmark btn-switch-last"></a>
                  <?php endif;?>
                    <div class="cf-a"></div>
                    <span class="font-s-xs">flash</span> </li>
                </ul>
              </div>
            </div>
            <!--文章-->
            <div class="dis-e ver-a-b it-article">
              <?=anchor('tech/content/'.$catid.'/'.$chid.'/'.$article->id,$article->title)?>
            </div>
            <!--标签-->
            <div class="dis-e ver-a-b it-label li-inline">
              <ul>
                <?php if(isset($article->tags)):?>
                <?php foreach($article->tags as $tag):?>
                <li><a href="javascript:void(0)" class="label-com label-act-b">
                  <?=$tag->name?>
                  </a></li>
                <?php endforeach;?>
                <?php endif;?>
              </ul>
            </div>
            <!--时间-->
            <div class="dis-e ver-a-b it-time"> <span>
              <?=$article->publishtime?>
              </span> </div>
            <!--id-->
            <div class="dis-e ver-a-b it-id"> <span>
              <?=$article->id?>
              </span> </div>
            <div class="dis-e ver-a-b it-id">
              <button type="button" class="btn btn-danger deleteitem" data-url="<?=anchorurl('tech/deletearticle/'.$article->id)?>" data-value="<?=$article->id?>">删除</button>
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
    });
</script>