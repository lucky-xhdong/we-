<!--navbar start-->
<?php $this->load->view('topheader');?>
<!--navbar end-->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/course.css">
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="row">
            <!--左厕菜单 start-->
              <?php $this->load->view('aside');?>
            <!--左厕菜单 end-->
              <!--右厕内容 start-->
              <section class="main-carema-list dbmanage">
                  <nav class="nav-section">
                      <ul>
                          <li><?=anchor('userbasicsetting/dbmanage/','数据备份', 'class="current"')?></li>
<!--                          <li>--><?//=anchor('adminlink/','后台登陆地址')?><!--</li>-->
                      </ul>
                  </nav>
                  <div class="complex-select">
                      <ul>
                          <li>
                              <a href="<?=anchorurl('userbasicsetting/backup/')?>" class="btn btn-success btn-new-c">数据库备份</a>
                          </li>
                      </ul>
                  </div>
                  <div class="carema-lists">
                      <div class="li-table li-width-a li-ul-pad bor-a li-manage">
                          <ul>
                              <li>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>序号</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>文件名</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>创建日期</span> </div>
                                  <div class="dis-e ver-a-b it-tab-caption"> <span>操作</span> </div>
                              </li>
                              <?php $i = 0; foreach($dbfiles as $file):?>
                                  <li id="article-<?=$file->id?>">
                                      <!--序号-->
                                      <div class="dis-e ver-a-b it-id">
                                        <span>
                                        <?=++$i?>
                                        </span>
                                      </div>
                                      <!--文章-->
                                      <div class="dis-e ver-a-b it-article">
                                          <?=$file->path?>
                                      </div>
                                      <!--简介-->
                                      <div class="dis-e ver-a-b it-check">
                                          <?=$file->create_time?>
                                      </div>
                                      <!--删除文章按钮-->
                                      <div class="dis-e ver-a-b it-id">
                                          <a href="<?=anchorurl('userbasicsetting/download/'.$file->id)?>" class="btn btn-default pad-h-b">下载</a>
                                          <button type="button" class="btn btn-danger deleteitem" data-url="<?=anchorurl('userbasicsetting/remove/'.$file->id)?>" data-value="<?=$file->id?>">删除</button>
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
    });
</script>