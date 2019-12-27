<?php $this->load->view('topheader'); ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/course.css">
<?php
$controller = $this->uri->segment(1);
$action = $this->uri->segment(2);
?>
<section class="course-pubish-content">
    <?php $this->load->view('aside'); ?>
    <main class="main-carema-list">
        <div class="course-content-body">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <a href="<?= anchorurl('course/index') ?>">课程列表</a>
                    </li>
                    <li>
                        <a href="<?= anchorurl('course/content/'.$courseid) ?>">内容管理</a>
                    </li>
                    <li>
                        <a <?php if ($controller == 'course' && $action == 'contentmanage') echo 'class="active"'; else echo 'class=""'; ?> href="javascript:;">内容列表</a>
                    </li>
                </ul>
            </div>
            <div class="course-outline-list">
                <ul>
                    <?php foreach($contents as $content):?>
                    <li id="article-<?= $content->id ?>">
                        <a href="javascript:;" class="handle deleteitem"  data-url="<?= anchorurl('course/removeContentrecord/' . $content->id) ?>"
                           data-value="<?= $content->id ?>"><i class="fa fa-times"></i></a>
                        <a href="<?=anchorurl('course/publishcontent/'.$syllabus_id.'/'.$content->id)?>" class="content" target="_blank"><?=$content->title?></a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </main>
</section>
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
    });
</script>