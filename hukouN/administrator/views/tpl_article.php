
<!--navbar start-->
<?php $this->load->view('topheader');?>
<!--navbar end-->
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.form.js"></script>
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?= base_url() ?>media/js/jquery.validate.messages_zh.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/course.css">
<script type="text/javascript" src="<?=base_url()?>media/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url()?>media/js/ueditor_mini/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url()?>media/js/ueditor_mini/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url()?>media/js/ueditor_mini/lang/zh-cn/zh-cn.js"></script>

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

            <?php if($category_bar):?>
                <div class="bread-navigation">
                    <a href="javascript:;">内容管理</a>>
                    <?php if(empty($category_bar->parent->id)):?>
                        <a href="javascript:;"  class="active"><?=$category_bar->name?></a>
                    <?php else:?>
                        <a href="javascript:;"><?=$category_bar->parent->name?></a>>
                        <a href="javascript:;" class="active"><?=$category_bar->name?></a>
                    <?php endif;?>
                </div>
            <?php endif;?>

            <nav class="nav-section">
                <ul>
                    <?php if($category_bar->template ==3 || (isset($category_bar->parent->template) && $category_bar->parent->template ==3)):?>
                        <li><?=anchor('articles/add/'.$categoryid,'添加文章', 'class="current"')?></li>
                     <?php else:?>
                        <li><?=anchor('articles/index/'.$categoryid,'文章列表')?></li>
                        <li><?=anchor('articles/add/'.$categoryid,'添加文章', 'class="current"')?></li>
                    <?php endif;?>

                </ul>
            </nav>
            <!--右厕内容 start-->
            <div class="carema-lists">
                <div class="inspect-new-panel">
                    <!--表格左厕 start-->
                    <?php if (isset($article->id)): ?>
                        <?php echo form_open('articles/addcontent/' . $article->id, 'class="form-article"','enctype="multipart/form-data"'); ?>
                    <?php else: ?>
                        <?php echo form_open('articles/addcontent/', 'class="form-article"','enctype="multipart/form-data"'); ?>
                    <?php endif; ?>
                    <div class="cf-h"></div>
                    <div class="form-lists">
                        <!--标题-->
                        <ul>
                            <li data-before="标题：">
                                <input type="text" class="form-control" id="title" name="title" placeholder="请输入标题"
                                      required="" value="<?php if (isset($article->id)) echo $article->title; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="文章栏目：">
                                <select name="catid" class="form-control">
                                    <?php foreach ($categorys as $category1): ?>
                                        <?php if (isset($article->id) && $article->catid == $category1->id): ?>
                                            <option value="<?= $category1->id ?>" selected><?= $category1->name ?></option>
                                        <?php elseif(isset($categoryid) && $categoryid ==  $category1->id):?>
                                            <option value="<?= $category1->id ?>" selected><?= $category1->name ?></option>
                                        <?php else: ?>
                                            <option value="<?= $category1->id ?>"> <?= $category1->name ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="内容：">
                                <textarea id="editor" name="body"  cols="0" style="width: 900px;">
                                    <?php if(isset($article->id)) echo $article->body;?>
                                 </textarea>
                            </li>
<!--                            <div class="cf-h"></div>-->
<!--                            <a href="javascript:;" style="margin-left: 90px" id="inserimage">[插入图片]</a>-->
                            <div class="cf-h"></div>
                            <li data-before="描述：">
                                <input class="form-control it-rule" type="text" name="description" placeholder="说点儿什么吧。。。"
                                       required="" value="<?php if (isset($article->id)) echo $article->description; ?>"/>
                            </li>
                            <div class="cf-h"></div>
                            <li data-before="封面图：">
                                <div class="dis-table-cell cover-image">
                                    <button type="button" class="btn btn-default" id="cover">选取</button>
                                    <figure class="cover-image-list" id="coverimage">
                                        <ul class="clear courseDetail-imgs " id="picture_file_ids">
                                            <?php if (isset($article->id) && !empty($article->picture_url)): ?>
                                            <?php $picture_urls = explode(",",$article->picture_url);?>
                                            <?php foreach ($picture_urls as $picture_url):?>
                                                <?php
                                                $picture = pictureurlsizeipregnant('big', $picture_url);
                                                ?>
                                            <li>
                                                <img src="<?=$picture?>" alt="">
                                                <i class="glyphicon glyphicon-remove removePicture" aria-hidden="true" data-id="<?=$picture_url?>">&times;</i>
                                            </li>
                                            <?php endforeach;;?>
                                            <?php endif; ?>
                                        </ul>
                                    </figure>
                                </div>
                            </li>
                            <div class="cf-h"></div>
                            <li class="text-b">
                                <input type="hidden" name="picture_url" id="urls" value="<?php if (isset($article->id)) echo $article->picture_url; ?>">
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


            $("body").undelegate(".removePicture", 'click').delegate(".removePicture", 'click', function () {
                var id = $(this).data("id");
                if(confirm('你确定要删除该吗?')){
                    var reg = /\S/;
                    var picture_file_ids =  $("#urls").val();
                    if(picture_file_ids){
                        var picture_array = picture_file_ids.split(",");
                        for(var m=0;m<picture_array.length;m++){
                            if(picture_array[m] == id){
                                picture_array.splice(m,1);
                            }
                        }
                        $(this).parent("li").remove();
                        for (var i=0;i<picture_array.length;i++){
                            if(reg.test(picture_array[i]) == "" || reg.test(picture_array[i]) == " "){
                                picture_array.splice(i,1);
                            }
                        }
                        //$("#rawname").val(data.rawname);
                        if(picture_array.length > 0) $("#urls").val(picture_array.join(","));
                    }
                }
            });



            $("#inserimage").click(function () {
                $('#file').click();
                imagetype = 'editor';
            });
            $('#file').on('change', function () {
                $("#imageform").ajaxForm({
                    dataType: 'json',
                    success: function (data) {
                             var string = '<li> <img src="<?=base_url() . pictureurl(0)?>' + data.filename + '" alt=""> <i class="fa fa-close removePicture" aria-hidden="true" data-id="'+data.filename+'">&times;</i> </li>';
                             $("#picture_file_ids").append(string);
                             var reg = /\S/;
                             if(reg.test($("urls").val())){
                                 var urls = $("#urls").val().split(",");
                             }else{
                                 var urls = new Array();
                             }
                              urls.push(data.filename);
                             for (var i=0;i<urls.length;i++){
                                 if(reg.test(urls[i]) == "" || reg.test(urls[i]) == " "){
                                     urls.splice(i,1);
                                 }
                             }

                            //$("#rawname").val(data.rawname);
                             if(urls.length > 0) $("#urls").val(urls.join(","));
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
            $(".form-article").validate();

            var ue = UE.getEditor('editor');
            ue.ready(function(){
                ue.setHeight(300);
            });

            var validator = $("#contentForm").submit(function() {
                UE.getEditor('editor').sync();
                console.log( UE.getEditor('editor'));
            }).validate({
                ignore: "",
                rules: {
                    title: "required",
                    content: "required"
                },
                errorPlacement: function(label, element) {
                    console.log(element);
                    label.insertAfter(element.is("textarea") ? element.next() : element);
                }
            });
            // validator.focusInvalid = function() {
            //     if( this.settings.focusInvalid ) {
            //         try {
            //             var toFocus = $(this.findLastActive() || this.errorList.length && this.errorList[0].element || []);
            //             if (toFocus.is("textarea")) {
            //                 UE.getEditor('editor').focus()
            //             } else {
            //                 toFocus.filter(":visible").focus();
            //             }
            //         } catch(e) {
            //         }
            //     }
            // }

        })
    </script>
</div>
</body>
</html>
