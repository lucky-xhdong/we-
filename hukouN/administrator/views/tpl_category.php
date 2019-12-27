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
                    <li><?=anchor('homepage/index/','栏目列表')?></li>
                    <li><?=anchor('homepage/add/','添加栏目', 'class="current"')?></li>
                </ul>
            </nav>
            <!--右厕内容 start-->
            <div class="carema-lists">
                <div class="inspect-new-panel">
                    <!--表格左厕 start-->
                    <?php if (isset($category->id)): ?>
                        <?php echo form_open('homepage/addcontent/' . $category->id, 'class="form-category"'); ?>
                    <?php else: ?>
                        <?php echo form_open('homepage/addcontent/', 'class="form-category"'); ?>
                    <?php endif; ?>
                    <div class="cf-h"></div>
                    <div class="col-sm-12 form-lists">
                        <!--标题-->
                        <ul>
                            <li data-before="所属分类：">
                                <select name="parent_id" class="form-control">
                                    <option value="0">无</option>
                                    <?php foreach ($categorys as $category1): ?>
                                        <?php if (isset($category->id) && $category->parent_id == $category1->id): ?>
                                            <option value="<?= $category1->id ?>" selected>
                                                <?= $category1->name ?>
                                            </option>
                                        <?php else: ?>
                                            <option value="<?= $category1->id ?>"> <?= $category1->name ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="栏目名称：">
                                <input type="text" class="form-control" id="name" name="name" placeholder="请输入标题" required=""
                                       value="<?php if (isset($category->id)) echo $category->name; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="栏目别名：">
                                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="请输入别名"
                                       value="<?php if (isset($category->id)) echo $category->nickname; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="ICON/图标：">
                                <div class="dis-table-cell cover-image">
                                    <button type="button" class="btn btn-default v-align-top" id="cover">选取</button>
                                    <figure class="dis-c v-align-top pad-h-b" id="coverimage">
                                        <?php if (isset($category->id) && !empty($category->picture_url)): ?>
                                            <?php
                                            $picture = pictureurlsizeipregnant('big', $category->picture_url);
                                            ?>
                                            <img src="<?= $picture ?>" width="100">
                                        <?php endif; ?>
                                    </figure>
                                </div>
                            </li>
                            <div class="cf-h"></div>
                            <li class="text-b">
                                <input type="hidden" name="picture_url" id="urls" value="<?php if (isset($category->id)) echo $category->picture_url; ?>">
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
        $(".form-category").validate();
        $("#cover").click(function () {
            $('#file').click();
        });

        $('#file').on('change', function () {
            $("#imageform").ajaxForm({
                dataType: 'json',
                success: function (data) {
                        $("#coverimage").html('<img src="<?=base_url().pictureurl(0)?>' + data.filename + '" width="100">');
                        $("#rawname").val(data.rawname);
                        $("#urls").val(data.filename);
                }
            }).submit();
        });
    })
</script>
<?php echo form_open('articles/addimage', 'name="imageform" id="imageform" enctype="multipart/form-data"'); ?>
<input type="file" name="file" id="file" style="display:none">
<?php echo form_close(); ?>
</body>
</html>
