<!--navbar start-->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/course.css">
<?php
	$catid = 5;
    $pagenum = $this->uri->segment(4);
    if(empty($pagenum)){
		$pagenum = 0;
	}
?>
<?php
$controller = $this->uri->segment(1);
?>
<?php $this->load->view('topheader');?>
<!--navbar end-->
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="row">
            <!--左厕菜单 start-->
              <?php $this->load->view('aside');?>
            <!--左厕菜单 end-->
              <!--右厕内容 start-->
              <section class="main-carema-list">
				  <div class="breadcrumbs">
					  <ul>
						  <li>
							  <a href="<?= anchorurl('formarticles') ?>">内容管理</a>
						  </li>
						  <li>
							  <a <?php if ($controller == 'formarticles') echo 'class="active"'; else echo 'class=""'; ?> href="javascript:;">问卷表单</a>
						  </li>
					  </ul>
				  </div>
                  <nav class="nav-section">
                      <ul>
                          <li><?=anchor('formarticles/index/','问卷列表','class="current"')?></li>
                          <li><?=anchor('formarticles/add/','创建问卷')?></li>
                      </ul>
                  </nav>
                  <div class="carema-lists">
                      <div class="li-table li-width-a li-ul-pad bor-a li-manage">
                          <ul>
                              <li>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>序号</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>标题</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>是否发布</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>创建日期</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>操作</span> </div>
                              </li>
                              <?php $i = 0; foreach($articles as $article):?>
                                  <li id="article-<?=$article->id?>">
                                      <!--序号-->
                                      <div class="dis-e ver-a-b it-id">
                                        <span>
                                        <?=++$i?>
                                        </span>
                                      </div>
                                      <!--文章-->
                                      <div class="dis-e ver-a-b it-article">
										  <?=anchor('formarticles/add/'.$article->catid.'/'.$article->id,$article->title)?>
                                      </div>
                                      <!--是否发布-->
									  <div class="dis-e ver-a-b it-check" >
										  <div class="li-com-fl li-block dis-c ver-a-b li-inline li-width-b it-switch cheaa-switch">
											  <ul>
												  <li>
													  <?php if($article->published == 1):?>
														  <a href="<?=anchorurl('formarticles/publish/'.$article->id.'/0/'.$catid.'/'.$pagenum)?>" class="btn btn-default glyphicon glyphicon-ok btn-switch-first" title="是"></a>
													  <?php else:?>
														  <a href="<?=anchorurl('formarticles/publish/'.$article->id.'/1/'.$catid.'/'.$pagenum)?>" class="btn btn-default glyphicon glyphicon-remove btn-switch-first" title="否"></a>
													  <?php endif;?>
												  </li>
											  </ul>
										  </div>
									  </div>
                                      <!--简介-->
                                      <div class="dis-e ver-a-b it-check">
                                          <?=$article->create_time?>
                                      </div>
                                      <!--删除文章按钮-->
                                      <div class="dis-e ver-a-b it-id">
                                          <a data-url="<?=anchorurl('formarticles/importEmail/'.$article->id)?>" class="btn btn-default importemail" href="javascript:;">导出</a>
                                          <button type="button" class="btn btn-danger deleteitem" data-url="<?=anchorurl('formarticles/removerecord/'.$article->id)?>" data-value="<?=$article->id?>">删除</button>
                                      </div>
                                  </li>
                              <?php endforeach;?>
                          </ul>
                      </div>
                      <div class="text-c">
                          <?php echo $this->pagination->create_links(); ?> </div>
                  </div>
                  <!--右侧内容 end-->
              </section>
              <!--右厕内容 end-->
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
					  title: "删除",
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
		$(".importemail").click(function(){
			 var url =  $(this).data('url');
			 var _this = $(this);
			 $.ajax({
				 type :'GET',
				 url :url,
				 success: function(){
					 _this.html('已导出');
				 }
			 });
		 });
    });
</script>