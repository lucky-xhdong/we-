<!--navbar start-->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/course.css">
<?php
$controller = $this->uri->segment(1);
$action = $this->uri->segment(2);
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
				  <?php if($category_bar):?>
				  <div class="breadcrumbs">
					  <ul>
						  <li>
							  <a href="<?= anchorurl('formarticles/index') ?>">内容管理</a>
						  </li>
						  <li>
							  <?php if(empty($category_bar->parent->id)):?>
								  <a href="javascript:;"  class="active"><?=$category_bar->name?></a>
							  <?php else:?>
								  <a href="javascript:;"><?=$category_bar->parent->name?></a>>
								  <a href="javascript:;" class="active"><?=$category_bar->name?></a>
							  <?php endif;?>
						  </li>
					  </ul>
				  </div>
				  <?php endif;?>
                  <nav class="nav-section">
                      <ul>
                          <li><?=anchor('homepictures/index/'.$categoryid,'图文列表','class="current"')?></li>
                          <li><?=anchor('homepictures/add/'.$categoryid,'添加图文')?></li>
                      </ul>
                  </nav>
                  <div class="carema-lists">
                      <div class="li-table li-width-a li-ul-pad bor-a li-manage li-homepictures">
                          <ul id="picture_list">
                              <li>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>序号</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>标题</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>描述</span> </div>
								  <div class="dis-e ver-a-b it-tab-caption"> <span>排序</span> </div>
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
                                          <?=anchor('homepictures/add/'.$article->catid.'/'.$article->id,$article->title)?>
                                      </div>
                                      <!--简介-->
                                      <div class="dis-e ver-a-b it-check">
                                          <?=anchor('homepictures/add/'.$article->catid.'/'.$article->id,$article->description)?>
                                      </div>
									  <!--置顶首页-->
									  <div class="dis-e ver-a-b it-check">
										  <div class="li-com-fl li-block dis-c ver-a-b li-inline li-width-b it-switch cheaa-switch">
											  <ul>
												  <li>
													  <a href="javascript:;" data-id="<?=$article->id?>"  class="btn btn-default fa fa-sort btn-switch-first" title="排序"></a>
												  </li>
											  </ul>
										  </div>
									  </div>
                                      <!--简介-->
                                      <div class="dis-e ver-a-b it-check">
                                          <?=anchor('homepictures/add/'.$article->catid.'/'.$article->id,$article->create_time)?>
                                      </div>
                                      <!--删除文章按钮-->
                                      <div class="dis-e ver-a-b it-id">
                                          <?php /*?><a href="<?=anchorurl('heredity_disease/item/'.$article->knowledge_id)?>" class="btn btn-default">预览</a><?php */?>
                                          <button type="button" class="btn btn-danger deleteitem" data-url="<?=anchorurl('articles/removerecord/'.$article->id)?>" data-value="<?=$article->id?>">删除</button>
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
<!--    <div class="col-xs-12 col-sm-12 col-md-12 offsetmenu">-->
<!--      <div class="h-o li-com-fl bg-color-a li-block li-ul-pad li-text-b li-height li-menu">-->
<!--          <ul>-->
<!--            <li  class="current-b">-->
<!--                --><?//=anchor('articles/index/','摄像头列表')?>
<!--            </li>-->
<!--            <li>-->
<!--                --><?//=anchor('articles/add/','增加加摄像头')?>
<!--            </li>-->
<!--        </ul>-->
<!--      </div>-->
<!--    </div>-->
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
		$("#picture_list").sortable({
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
					url : '<?=anchorurl('homepictures/updatesort')?>',
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