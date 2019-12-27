<!--navbar start-->
<?php $this->load->view('topheader'); ?>
<!--navbar end-->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row">
        <!--左厕菜单 start-->
        <?php $this->load->view('aside'); ?>
        <!--左厕菜单 end-->
        <!--右厕内容 start-->
        <section class="main-carema-list">
            <nav class="nav-section">
                <ul>
                    <li><?= anchor('course/index/', '课程列表', 'class="current"') ?></li>
                    <li><?= anchor('course/add/', '添加课程') ?></li>
                </ul>
            </nav>
            <div class="carema-lists">
                <table class="table">
                    <thead>
                    <tr>
                        <td>序号</td>
                        <td>课程名称</td>
                        <td>所属部门</td>
                        <td>创建日期</td>
                        <td>操作</td>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $i = 0;
                    foreach ($courses as $course): ?>
                        <tr id="article-<?= $course->id ?>">
                            <td><span><?= ++$i ?></span></td>
                            <td><?= anchor('course/add/' . $course->id, $course->name) ?></td>
                            <td>
                                <?php if (empty($course->departmentname)): ?>
                                    <span>全部</span>
                                <?php else: ?>
                                    <span><?= $course->departmentname ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?= anchor('course/add/' . $course->id, $course->created_time) ?></td>
                            <td>
                                <a href="<?= anchorurl('course/content/' . $course->id . '/0') ?>" class="btn btn-default pad-h-b">内容管理</a>
                                <button type="button" class="btn btn-danger deleteitem pad-h-b" data-url="<?= anchorurl('course/removerecord/' . $course->id) ?>" data-value="<?= $course->id ?>">删除</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-c">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
            <!--右侧内容 end-->
        </section>
        <!--右厕内容 end-->
    </div>
</div>
</body>
</html>
<script src="<?= base_url() ?>media/js/jquery.ui.min.js"></script>
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
        $("#category_list").sortable({
            handle: '.fa-sort',
            scroll: true,
            scrollSpeed: 100,
            axis: 'y',
            opacity: 0.6,//设置拖动时候的透明度
            revert: true,//缓冲效果
            cursor: 'move',//拖动的时候鼠标样式
            update: function () {
                var sortvalue = new Array;
                $(this).find("li .fa-sort").each(function (index, element) {
                    sortvalue[index] = {id: $(element).data('id'), sign: parseInt(index) + 1};
                });
                $.ajax({
                    url: '<?=anchorurl('homepage/updatesort')?>',
                    type: "post",
                    data: {
                        'requestvalue': JSON.stringify(sortvalue)
                    },
                    beforeSend: function () {

                    },
                    success: function (data) {
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>