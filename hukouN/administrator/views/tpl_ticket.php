
<!--navbar start-->
<?php $this->load->view('topheader');?>
<!--navbar end-->
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.form.js"></script>
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.validate.messages_zh.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/course.css">
<script type="text/javascript" src="<?=base_url()?>media/js/bootstrap-datetimepicker.min.js"></script>

<?php
$controller = $this->uri->segment(1);
$action = $this->uri->segment(2);
?>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row">
        <!--左厕菜单 start-->
        <?php $this->load->view('aside');?>
        <!--左厕菜单 end-->
        <section class="main-carema-list">

            <div class="bread-navigation">
                <a href="javascript:;">在线购票</a>
            </div>

            <nav class="nav-section">
                <ul>
                    <li><?=anchor('tickets/index/','在线购票')?></li>
                    <li><?=anchor('tickets/add/','添加购票信息','class="current"')?></li>

                </ul>
            </nav>
            <!--右厕内容 start-->
            <div class="carema-lists">
                <div class="inspect-new-panel">
                    <!--表格左厕 start-->
                    <?php if (isset($article->id)): ?>
                        <?php echo form_open('tickets/addcontent/' . $article->id, 'class="form-article"','enctype="multipart/form-data"'); ?>
                    <?php else: ?>
                        <?php echo form_open('tickets/addcontent/', 'class="form-article"','enctype="multipart/form-data"'); ?>
                    <?php endif; ?>
                    <div class="cf-h"></div>
                    <div class="form-lists">
                        <!--标题-->
                        <ul>
                            <li data-before="标题：">
                                <input type="text" class="form-control" id="title" name="title" placeholder="请输入标题"
                                      required="" value="<?php if (isset($article->id)) echo $article->title; ?>"/>
                            </li>
<!--                            <div class="cf-h"></div>-->
<!--                            <a href="javascript:;" style="margin-left: 90px" id="inserimage">[插入图片]</a>-->
                            <div class="cf-h"></div>
                            <li data-before="描述：">
                                <input class="form-control it-rule" type="text" name="description" placeholder="说点儿什么吧。。。"
                                       required="" value="<?php if (isset($article->id)) echo $article->description; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="星级：">
                                <input class="form-control it-rule" type="text" name="stars" placeholder="AAAAA景区"
                                       required="" value="<?php if (isset($article->id)) echo $article->stars; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="地址：">
                                <input class="form-control it-rule" type="text" name="address" placeholder="地址"
                                       required="" value="<?php if (isset($article->id)) echo $article->address; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="营业时间：">
                                <input class="form-control it-rule" type="text" name="business_hours" placeholder="8:00-19:00"
                                       required="" value="<?php if (isset($article->id)) echo $article->business_hours; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="票价信息来源：">
                                <input class="form-control it-rule" type="text" name="origin" placeholder="票价信息来源"
                                       required="" value="<?php if (isset($article->id)) echo $article->origin; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="跳转url地址：">
                                <input class="form-control it-rule" type="text" name="url" placeholder="跳转url地址"
                                       required="" value="<?php if (isset($article->id)) echo $article->url; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="封面图：">
                                <div class="dis-table-cell cover-image">
                                    <button type="button" class="btn btn-default" id="cover">选取</button>
                                    <figure class="dis-c pad-h-b" id="coverimage">
                                        <?php if (isset($article->id) && !empty($article->picture_url)): ?>
                                            <?php
                                            $picture = pictureurlsizeipregnant('big', $article->picture_url);
                                            ?>
                                            <img src="<?= $picture ?>" width="100">
                                        <?php endif; ?>
                                    </figure>
                                </div>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="二维码：">
                                <div class="dis-table-cell cover-image">
                                    <button type="button" class="btn btn-default" id="qrcode">选取</button>
                                    <figure class="dis-c pad-h-b" id="qrcodeimage">
                                        <?php if (isset($article->id) && !empty($article->qrcode_url)): ?>
                                            <?php
                                            $picture = pictureurlsizeipregnant('big', $article->qrcode_url);
                                            ?>
                                            <img src="<?= $picture ?>" width="100">
                                        <?php endif; ?>
                                    </figure>
                                </div>
                            </li>
                            <div class="cf-h"></div>
                            <li class="text-b">
                                <input type="hidden" name="picture_url" id="urls" value="<?php if (isset($article->id)) echo $article->picture_url; ?>">
                                <input type="hidden" name="qrcode_url" id="qrcode_url" value="<?php if (isset($article->id)) echo $article->qrcode_url; ?>">

                                <button class="btn btn-success mar-l-a btn-new-c" type="submit">保存</button>
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
    <?php echo form_open('articles/addimage', 'name="imageform" id="imageform" enctype="multipart/form-data"'); ?>
    <input type="file" name="file" id="file" style="display:none">
    <?php echo form_close(); ?>
    <script>
        var imagetype = 'editor';
        // tinyMCE.insertImage('11',22);
        $(document).ready(function (e) {


            $("#qrcode").click(function () {
                $('#file').click();
                imagetype = 'editor';
            });

            $('#file').on('change', function () {
                $("#imageform").ajaxForm({
                    dataType: 'json',
                    success: function (data) {
                            if(imagetype == "cover"){
                                $("#coverimage").html('<img src="<?=base_url().pictureurl(0)?>' + data.filename + '" width="100">');
                              //  $("#rawname").val(data.rawname);
                                $("#urls").val(data.filename);
                            }else{
                                $("#qrcodeimage").html('<img src="<?=base_url().pictureurl(0)?>' + data.filename + '" width="100">');
                               // $("#rawname").val(data.rawname);
                                $("#qrcode_url").val(data.filename);
                            }

                    }
                }).submit();
            });
            $("#cover").click(function () {
                imagetype = 'cover';
                $('#file').click();
            });
        });

        $("#create_time").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
        $(document).ready(function(){


        })
    </script>
</div>
</body>
</html>
