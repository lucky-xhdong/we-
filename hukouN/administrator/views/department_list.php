<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/bootstrapv3.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/font-awesome-4.0.3/css/font-awesome.css">
    <link rel="stylesheet" type="text/css"
          href="<?= base_url() ?>media/css/font-awesome-4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/common.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/itgenius.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/qunit-1.11.0.css">
    <script src="<?= base_url() ?>media/js/jquery-1.10.2.min.js"></script>
    <script src="<?= base_url() ?>media/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>media/js/bootbox.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />-->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>唯佳教育集团-后台管理系统</title>
</head>
<body>
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
                    <li><?= anchor('department/index/', '部门列表', 'class="current"') ?></li>
                    <li><?= anchor('department/add/', '部门编辑') ?></li>
                </ul>
            </nav>
            <div class="carema-lists">
                <div class="li-table li-width-a li-ul-pad bor-a li-manage">
                    <ul>
                        <li>
                            <div class="dis-e ver-a-b it-tab-caption"><span>序号</span></div>
                            <div class="dis-e ver-a-b it-tab-caption"><span>名称</span></div>
                            <div class="dis-e ver-a-b it-tab-caption"><span>所属部门</span></div>
                            <!-- <div class="dis-e ver-a-b it-tab-caption"> <span>状态</span> </div>-->
                            <div class="dis-e ver-a-b it-tab-caption"><span>操作</span></div>
                        </li>
                        <?php $i = 0;
                        foreach ($departments as $department): ?>
                            <li id="article-<?= $department->id ?>">
                                <!--序号-->
                                <div class="dis-e ver-a-b it-id">
                                    <span>
                                  <?= ++$i ?>
                                  </span>
                                </div>
                                <!--文章-->
                                <div class="dis-e ver-a-b it-article">
                                    <?= anchor('department/add/' . $department->id, $department->name) ?>
                                </div>
                                <div class="dis-e ver-a-b it-article">
                                    <?= anchor('department/add/' . $department->id, $department->name) ?>
                                </div>

                                <!--删除文章按钮-->
                                <div class="dis-e ver-a-b it-id">
                                    <?php /*?><a href="<?=anchorurl('heredity_disease/item/'.$article->knowledge_id)?>" class="btn btn-default">预览</a><?php */ ?>
                                    <button type="button" class="btn btn-danger deleteitem"
                                            data-url="<?= anchorurl('department/removerecord/' . $department->id) ?>"
                                            data-value="<?= $department->id ?>">删除
                                    </button>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="text-b"><?php echo $this->pagination->create_links(); ?> </div>
            </div>
        </section>
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
<?php */
?>
</body>
</html>
<script>
    $(document).ready(function (e) {
        $('.deleteitem').click(function () {
            var url = $(this).data('url');
            var id = $(this).data('value');
            bootbox.dialog({
                message: "您确定要删除吗？",
                title: "删除",
                buttons: {
                    cancel: {
                        label: "取消",
                        className: "btn-success",
                        callback: function () {
                        }
                    },
                    confirm: {
                        label: "删除",
                        className: "btn-danger",
                        callback: function () {
                            $.ajax({
                                type: 'GET',
                                url: url,
                                success: function () {
                                    $("#article-" + id).remove();
                                }
                            });
                        }
                    }
                }
            });
        });

        $(".ip-user-list").undelegate("#user-search-control", "keypress").delegate("#user-search-control", "keypress", function (event) {
            var key = event.which;
            if (key == 13) {
                $("#userform").submit();
            }
        });
    });
</script>