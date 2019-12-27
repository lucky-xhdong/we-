<!--navbar start-->
<?php $this->load->view('topheader');?>
<!--navbar end-->
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.form.js"></script>
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.validate.messages_zh.js"></script>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row">
        <!--左厕菜单 start-->
        <?php $this->load->view('aside');?>
        <!--左厕菜单 end-->
        <!--右厕内容 start-->
        <section class="main-carema-list">
            <nav class="nav-section">
                <ul>
                    <li><?= anchor('department/index/', '部门列表') ?></li>
                    <li><?= anchor('department/add/', '添加部门', 'class="current"') ?></li>
                </ul>
            </nav>
            <div class="inspect-new-panel">
                <div class="col-sm-12 form-lists">
                    <!--表格左厕 start-->
                    <?php if (isset($department->id)): ?>
                        <?php echo form_open('department/addcontent/' . $department->id, 'class="form-department"', 'id="ipregnantform" enctype="multipart/form-data"'); ?>
                    <?php else: ?>
                        <?php echo form_open('department/addcontent/', 'class="form-department"', 'id="ipregnantform" enctype="multipart/form-data"'); ?>
                    <?php endif; ?>
                    <ul>
                        <li data-before="所属分类：">
                            <select name="parent_id" class="form-control">
                                <option value="0">无</option>
                                <?php foreach ($departments as $departmentItem): ?>
                                    <?php if (isset($departmentItem->id) && $department->parent_id == $departmentItem->id): ?>
                                        <option value="<?= $departmentItem->id ?>" selected>
                                            <?= $departmentItem->name ?>
                                        </option>
                                    <?php else: ?>
                                        <option value="<?= $departmentItem->id ?>"> <?= $departmentItem->name ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </li>
                        <div class="cf-h"></div>
                        <li data-before="部门名称：">
                            <input type="text" class="form-control" id="title" name="name" placeholder="请输入标题"
                                   required="" value="<?php if (isset($department)) echo $department->name; ?>"/>
                        </li>
                        <div class="cf-h"></div>
                        <li class="text-b">
                            <button class="btn btn-success btn-new-c" type="submit">保存</button>
                        </li>
                        <div class="cf-h"></div>
                        <?php echo form_close();?>
                    </ul>
                </div>
            </div>
            </section>
        <!--右厕内容 end-->
    </div>
    <?php echo form_open('department/addimage', 'name="imageform" id="imageform" enctype="multipart/form-data"'); ?>
    <input type="file" name="file" id="file" style="display:none">
    <?php echo form_close(); ?>
</div>
<script>
    $(document).ready(function(){
        $(".form-department").validate();
    })
</script>
</body>
</html>
