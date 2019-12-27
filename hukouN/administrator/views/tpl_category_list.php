<!--navbar start-->
<?php $this->load->view('topheader');?>
<!--navbar end-->
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="row">
            <!--左厕菜单 start-->
              <?php $this->load->view('aside');?>
            <!--左厕菜单 end-->
              <!--右厕内容 start-->
              <section class="main-carema-list">
                  <nav class="nav-section">
                      <ul>
                          <li><?=anchor('homepage/index/','栏目列表','class="current"')?></li>
                          <li><?=anchor('homepage/add/','添加栏目')?></li>
                      </ul>
                  </nav>
                  <div class="carema-lists">
                      <div class="li-table li-width-a li-ul-pad bor-a li-manage li-category">
                          <ul id="category_list">
                              <li>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>序号</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>名称</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>文章数</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>选择模板</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>创建日期</span> </div>
								  <div class="dis-e ver-a-b it-tab-caption"> <span>置顶首页</span> </div>
								  <div class="dis-e ver-a-b it-tab-caption"> <span>显示导航</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>操作</span> </div>
                              </li>
                              <?php $i = 0; foreach($categorys as $category):?>
                                  <li id="article-<?=$category->id?>">
                                      <!--序号-->
                                      <div class="dis-e ver-a-b it-id">
                                        <span>
                                        <?=++$i?>
                                        </span>
                                      </div>
                                      <!--文章-->
                                      <div class="dis-e ver-a-b it-article">
                                          <?=anchor('homepage/add/'.$category->id,$category->name)?>
                                      </div>
                                      <!--简介-->
                                      <div class="dis-e ver-a-b it-check">
                                          <?=anchor('homepage/add/'.$category->id,$category->article_count)?>
                                      </div>
                                      <div class="dis-e ver-a-b it-check it-choose-tpl">
<!--                                          --><?//=anchor('模板1')?>
<!--										  --><?php //if($category->parent_id == 0):?>
                                          <a <?php if($category->template == 1) echo 'class="active"';?> href="<?=anchorurl('homepage/selecttemplate/'.$category->id.'/1')?>">模板1</a>
                                          <a <?php if($category->template == 2) echo 'class="active"';?> href="<?=anchorurl('homepage/selecttemplate/'.$category->id.'/2')?>">模板2</a>
                                          <a <?php if($category->template == 3) echo 'class="active"';?> href="<?=anchorurl('homepage/selecttemplate/'.$category->id.'/3')?>">模板3</a>
<!--                                      	  --><?php //else:?>
<!---->
<!--										  --><?php //endif;?>
									  </div>
                                      <!--简介-->
                                      <div class="dis-e ver-a-b it-check">
                                          <?=anchor('homepage/add/'.$category->id,$category->create_time)?>
                                      </div>
									  <!--置顶首页-->
									  <div class="dis-e ver-a-b it-check">
										  <div class="li-com-fl li-block dis-c ver-a-b li-inline li-width-b it-switch cheaa-switch">
											  <ul>
												  <li>
													  <?php if($category->is_publish == 1):?>
														  <a href="<?=anchorurl('homepage/publish/'.$category->id.'/0')?>" class="btn btn-default glyphicon glyphicon-ok btn-switch-first" title="是"></a>
													  <?php else:?>
													 	 <a href="<?=anchorurl('homepage/publish/'.$category->id.'/1')?>" class="btn btn-default glyphicon glyphicon-remove btn-switch-first" title="否"></a>
									                  <?php endif;?>
													  <a href="javascript:;" data-id="<?=$category->id?>" class="btn btn-default fa fa-sort btn-switch-first" title="排序"></a>
												  </li>
											  </ul>
										  </div>
									  </div>
									  <!--显示导航-->
									  <div class="dis-e ver-a-b it-check">
										  <div class="li-com-fl li-block dis-c ver-a-b li-inline li-width-b it-switch cheaa-switch">
											  <ul>
												  <li>
													  <?php if($category->is_menu == 1):?>
														  <a href="<?=anchorurl('homepage/publishmenu/'.$category->id.'/0')?>" class="btn btn-default glyphicon glyphicon-ok btn-switch-first" title="是"></a>
													  <?php else:?>
													 	 <a href="<?=anchorurl('homepage/publishmenu/'.$category->id.'/1')?>" class="btn btn-default glyphicon glyphicon-remove btn-switch-first" title="否"></a>
									                  <?php endif;?>
												  </li>
											  </ul>
										  </div>
									  </div>
                                      <!--删除文章按钮-->
                                      <div class="dis-e ver-a-b it-id">
                                          <?php /*?><a href="<?=anchorurl('heredity_disease/item/'.$article->knowledge_id)?>" class="btn btn-default">预览</a><?php */?>
                                          <button type="button" class="btn btn-danger deleteitem" data-url="<?=anchorurl('homepage/removerecord/'.$category->id)?>" data-value="<?=$category->id?>">删除</button>
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
<script src="<?=base_url()?>media/js/jquery.ui.min.js"></script>
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
		$("#category_list").sortable({
			handle:'.fa-sort',
			scroll: true,
			scrollSpeed: 100,
			axis:'y',
			opacity: 0.6,//设置拖动时候的透明度
			revert: true,//缓冲效果
			cursor: 'move',//拖动的时候鼠标样式
			update: function() {
				var sortvalue = new Array;
				$(this).find("li .fa-sort").each(function(index,element){
					sortvalue[index] = {id:$(element).data('id'),sign:parseInt(index)+1};
				});
				$.ajax({
					url : '<?=anchorurl('homepage/updatesort')?>',
					type : "post",
					data :{
						'requestvalue':JSON.stringify(sortvalue)
					},
					beforeSend: function(){

					},
					success:function(data){
						window.location.reload();
					}
				});
			}
		});
    });
</script>
