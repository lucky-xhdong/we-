<?php $this->load->view('topheader');?>
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.form.js"></script>
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.validate.messages_zh.js"></script>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row">
        <!--左厕菜单 start-->
        <?php $this->load->view('aside');?>
        <!--左厕菜单 end-->
        <section class="main-carema-list">
            <nav class="nav-section">
                <ul>
                    <li><?=anchor('course/index/','课程列表')?></li>
                    <li><?=anchor('course/add/','添加课程', 'class="current"')?></li>
                </ul>
            </nav>
            <!--右厕内容 start-->
            <div class="carema-lists">
                <div class="inspect-new-panel">
                    <!--表格左厕 start-->
                    <?php if (isset($course->id)): ?>
                        <?php echo form_open('course/addcontent/' . $course->id, 'class="form-course"'); ?>
                    <?php else: ?>
                        <?php echo form_open('course/addcontent/', 'class="form-course"'); ?>
                    <?php endif; ?>
                    <div class="cf-h"></div>
                    <div class="col-sm-12 form-lists">
                        <!--标题-->
                        <ul>
                            <li data-before="所属部门：">
                                <select name="department_id" class="form-control">
                                    <option value="0">全部</option>
                                    <?php foreach ($departments as $department): ?>
                                        <?php if (isset($department->id) && $department->id == $course->department_id): ?>
                                            <option value="<?= $department->id ?>" selected>
                                                <?= $department->name ?>
                                            </option>
                                        <?php else: ?>
                                            <option value="<?= $department->id ?>"> <?= $department->name ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="课程名称：">
                                <input type="text" class="form-control" id="name" name="name" placeholder="请输入标题"
                                       required="" value="<?php if (isset($course->id)) echo $course->name; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li class="text-b">
                                <button class="btn btn-success btn-new-c" type="submit">保存</button>
                            </li>
                            <div class="cf-h"></div>
                        </ul>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </section>
        <!--右厕内容 end-->
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".form-course").validate();
    })
</script>
</body>
</html>
