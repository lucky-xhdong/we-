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
                          <li><?=anchor('homepage/index/','摄像头列表','class="current"')?></li>
                          <li><?=anchor('homepage/add/','增加摄像头')?></li>
                      </ul>
                  </nav>

                  <div class="carema-lists">
                      <div class="li-table li-width-a li-ul-pad bor-a li-manage">
                          <ul>
                              <li>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>序号</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>标题</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>简介</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>部门</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>操作</span> </div>
                              </li>
                              <?php $i = 0; foreach($caremas as $carema):?>
                                  <li id="article-<?=$carema->carema_id?>">
                                      <!--序号-->
                                      <div class="dis-e ver-a-b it-id">
                                        <span>
                                        <?=++$i?>
                                        </span>
                                      </div>
                                      <!--文章-->
                                      <div class="dis-e ver-a-b it-article">
                                          <?=anchor('homepage/add/'.$carema->carema_id,$carema->title)?>
                                      </div>
                                      <!--简介-->
                                      <div class="dis-e ver-a-b it-check">
                                          <?=anchor('homepage/add/'.$carema->carema_id,$carema->description)?>
                                      </div>
                                      <!--简介-->
                                      <div class="dis-e ver-a-b it-check">
                                          <?=anchor('homepage/add/'.$carema->carema_id,$carema->department_title)?>
                                      </div>
                                      <!--删除文章按钮-->
                                      <div class="dis-e ver-a-b it-id">
                                          <?php /*?><a href="<?=anchorurl('heredity_disease/item/'.$article->knowledge_id)?>" class="btn btn-default">预览</a><?php */?>
                                          <button type="button" class="btn btn-danger deleteitem" data-url="<?=anchorurl('homepage/removerecord/'.$carema->carema_id)?>" data-value="<?=$carema->carema_id?>">删除</button>
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
<!--                --><?//=anchor('homepage/index/','摄像头列表')?>
<!--            </li>-->
<!--            <li>-->
<!--                --><?//=anchor('homepage/add/','增加加摄像头')?>
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
    });
</script>