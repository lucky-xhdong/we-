<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php $this->load->view('wePlatForm/tmpl/title'); ?>
    <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
    <?php $this->load->view('wePlatForm/meta'); ?>
    <?php $this->load->view('tmpl/mmgrid');?>
    <?php $this->load->view('tmpl/jqueryvalidate');?>
    <?php $this->load->view('wePlatForm/tmpl/ueditor');?>
</head>
<body>
<div class="container-fluid TeachingProgram">
    <div class="row">
        <!-- 左侧菜单 start -->
        <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
        <!-- 左侧菜单 end -->
        <div class="col-md-9 tp--main-wrapper">
            <!--菜单切换 start-->
            <?=$this->load->view("wePlatForm/tmpl/headernav")?>
            <!--菜单切换 end-->
            <!--面包屑 start-->
            <nav class="common-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=anchorurl("home")?>">首页</a></li>
                    <li class="breadcrumb-item"><a href="<?=anchorurl("contents")?>">内容管理</a></li>
                    <li class="breadcrumb-item active" aria-current="page">文章发布</li>
                </ol>
            </nav>
            <!--面包屑 end-->
            <!--主体内容 start-->
            <div class="tp--main__content">
                <div class="content__moudle1">
                    <div class="form-content" data-before="文章发布/编辑">
                        <form action="<?=anchorurl("contents/save")?>" method="post" id="contentForm" enctype="multipart/form-data">
                            <div class="form-row" data-before="文章标题：">
                                <input type="text" name="title" value="<?php if(isset($article->id)) echo $article->title;?>" class="form-control form-control-sm" placeholder="文章标题" required>
                            </div>
                            <?php if(isset($article->catid) && in_array($article->catid,array(17,28,75))):?>
                            <?php else:?>
                                <div class="form-row" data-before="专题栏目：">
                                    <select id="inputState"  name="catid" class="form-control form-control-sm" required>
                                        <?php foreach($categorys as $category):?>
                                            <?php if(isset($article->id) && $article->catid == $category->id):?>
                                                <option value="<?=$category->id?>" selected><?=$category->name?></option>
                                            <?php else:?>
                                                <option value="<?=$category->id?>"><?=$category->name?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            <?php endif;?>
                            <div class="form-row" data-before="区域地址：">
                                <div class="form-row__item">
                                    <select name="province_id" id="province_new1" class="form-control form-control-sm" required>
                                        <option value="0">--城市--</option>
                                        <?php foreach($provinces as $province):?>
                                            <?php if(isset($article->id) && $article->province_id == $province->province_id):?>
                                                <option value="<?=$province->province_id?>" selected><?=$province->name?></option>
                                            <?php else:?>
                                                <option value="<?=$province->province_id?>"><?=$province->name?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-row__item">
                                    <select name="city_id" id="city_new1" class="form-control form-control-sm">
                                        <option value="0">--省会--</option>
                                        <?php foreach($citys as $city):?>
                                            <?php if(isset($article->id) && $article->city_id == $city->city_id):?>
                                                <option value="<?=$city->city_id?>" selected><?=$city->name?></option>
                                            <?php else:?>
                                                <option value="<?=$city->city_id?>"><?=$city->name?></option>
                                            <?php endif;?>

                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-row__item">
                                    <select name="district_id" id="district_new1"  class="form-control form-control-sm">
                                        <option value="0">--区县--</option>
                                        <?php foreach($districts as $district):?>
                                            <?php if(isset($article->id) && $article->district_id == $district->district_id):?>
                                                <option value="<?=$district->district_id?>" selected><?=$district->name?></option>
                                            <?php else:?>
                                                <option value="<?=$district->district_id?>"><?=$district->name?></option>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row" data-before="区域：">
                                <?php
                                $region_ids = array();
                                if(isset($article->id) && !empty($article->region_ids)){
                                    $region_ids = explode(",",$article->region_ids);
                                }
                                ?>
                                <select  class="form-control form-control-sm" name="region_id" id="region_ids" >
                                    <option value="0">--请选择区域--</option>
                                    <?php foreach($regions as $region):?>
                                        <?php if(isset($article->id) && $article->region_id == $region['id'] ):?>
                                            <option value="<?=$region['id']?>" selected><?=$region['name']?></option>
                                        <?php else:?>
                                            <option value="<?=$region['id']?>"><?=$region['name']?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-row" data-before="学校：">
                                <select  class="form-control form-control-sm" name="school_id" id="school_id" >
                                    <option value="0">--请选择学校--</option>
                                    <?php foreach($schools as $school):?>
                                        <?php if(isset($article->id) && $school->id == $article->school_id):?>
                                            <option value="<?=$school->id?>" selected><?=$school->name?></option>
                                        <?php else:?>
                                            <option value="<?=$school->id?>"><?=$school->name?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-row" data-before="撰写人：">
                                <input type="text" class="form-control form-control-sm" value="<?php if(isset($article->id)) echo $article->author;?>" placeholder="撰写人" name="author">
                            </div>
                            <div class="form-row" data-before="文章封面：">
                                <?php if(isset($article->id) && !empty($article->picture_url)):?>
                                    <div class="col-md-2">
                                        <img src="<?=$article->picture_url?>" width="100"/>
                                    </div>
                                <?php endif;?>
                                <div class="col-md-4">
                                    <input type="file" name="file"  placeholder="文章封面">
                                </div>
                            </div>
                            <div class="form-row" data-before="文章摘要：">
                                <textarea class="form-control" rows="3" placeholder="文章摘要" name="description"><?php if(isset($article->id)) echo $article->description;?></textarea>
                            </div>
                            <div class="form-row" data-before="初始阅读量：">
                                <input type="text" value="<?php if(isset($article->id)) echo $article->hits;?>"  class="form-control form-control-sm" placeholder="初始阅读量" name="hits">
                            </div>

                            <div class="form-row" data-before="简介：">
                                <div class="form-editor">
                                    <textarea id="editor" name="body"><?php if(isset($article->id)) echo $article->body;?></textarea>
                                </div>
                            </div>
                            <div class="btn-group">
                                <input type="hidden" name="id" value="<?php if(isset($article->id)) echo $article->id;else echo 0;?>">
                                <button type="submit" class="btn btn-primary btn-save">保存</button>
                                <!--                                        <button type="submit" class="btn btn-primary btn-submit">提交审核</button>-->
                            </div>
                        </form>
                    </div>
                </div>
<!--                    <div class="content__moudle2">-->
<!--                        <div class="service-wrapper" data-before="服务内容">-->
<!--                            <form>-->
<!--                                <div class="form-row">-->
<!--                                    <div class="form-group col-md-4">-->
<!--                                        <select id="inputState" class="form-control form-control-sm">-->
<!--                                            <option selected>学校</option>-->
<!--                                            <option>学校1</option>-->
<!--                                            <option>学校2</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                    <div class="form-group col-md-4">-->
<!--                                        <select id="inputState1" class="form-control form-control-sm">-->
<!--                                            <option selected>发布范围</option>-->
<!--                                            <option>发布范围1</option>-->
<!--                                            <option>发布范围2</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                    <div class="form-group col-md-4">-->
<!--                                        <select id="inputState2" class="form-control form-control-sm">-->
<!--                                            <option selected>计划类型</option>-->
<!--                                            <option>计划类型1</option>-->
<!--                                            <option>计划类型2</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-row">-->
<!--                                    <div class="form-group col-md-12">-->
<!--                                        <textarea class="form-control" rows="3"></textarea>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-row">-->
<!--                                    <div class="btn-group-upload">-->
<!--                                        <a href="javascript:;" class="btn btn-outline-primary btn-sm btn-add">-->
<!--                                            <i class="icon-add">-->
<!--                                                <i class="path1"></i>-->
<!--                                                <i class="path2"></i>-->
<!--                                            </i>上传文档-->
<!--                                            <input type="file" class="upload-file form-control-file">-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="btn-group">-->
<!--                                    <button type="submit" class="btn btn-primary btn-save">保存</button>-->
<!--                                    <button type="submit" class="btn btn-primary btn-submit">提交审核</button>-->
<!--                                </div>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div>-->
            </div>
            <!--主体内容 end-->
        </div>
    </div>
     <script>
         $(document).ready(function () {

             $("#province_new1").change(function(){
                 var string = '';
                 var _this = $(this);
                 province_id = $(this).val();
                 $.ajax({
                     url: "<?=anchorurl('categorys/getCity')?>/"+$(this).val(),
                     type: "get",
                     dataType: 'json',
                     async: false,
                     success: function (data, textstatus) {
                         var string = '';
                         $(data.citys).each(function(index,element){
                             string += '<option value="'+element.city_id+'">'+element.name+'</option>';
                         });
                         $("#city_new1").html(string);
                         var districts = "";
                         $(data.districts).each(function(index,element){
                             districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
                         });
                         $("#district_new1").html(districts);
                     }
                 });
                 getNewData();
             });

             $("#city_new1").change(function(){
                 city_id = $(this).val();
                 $.ajax({
                     url: "<?=anchorurl('categorys/getArea')?>/"+$(this).val(),
                     type: "get",
                     dataType: 'json',
                     async: false,
                     success: function (data, textstatus) {
                         var districts = "";
                         $(data).each(function(index,element){
                             districts += '<option value="'+element.district_id+'">'+element.name+'</option>';
                         });
                         $("#district_new1").html(districts);
                     }
                 });
                 getNewData();
             });

             $("#district_new1").change(function(){
                 district_id = $(this).val();
                 getNewData();
             });

             function getNewData(){
                 $.ajax({
                     url: "<?=anchorurl('contents/getRegionList')?>/",
                     type: "POST",
                     dataType: 'json',
                     data:{
                         city_id:$("#city_new1").val(),
                         province_id:$("#province_new1").val(),
                         district_id:$("#district_new1").val(),
                     },
                     async: false,
                     success: function (data, textstatus) {
                         var region = '<option value="0">--请选择区域--</option>';
                         $(data).each(function(index,element){
                             region += '<option value="'+element.id+'">'+element.name+'</option>';
                         });
                         $("#region_ids").html(region);
                         getSchoolList();
                     }
                 });
             }

             function getSchoolList(){
                 $.ajax({
                     url: "<?=anchorurl('contents/getRegionSchoolList')?>/"+$("#region_ids").val(),
                     type: "get",
                     dataType: 'json',
                     async: false,
                     success: function (data, textstatus) {
                         var school = '<option value="0">--请选择学校--</option>';
                         $(data.schools).each(function(index,element){
                             school += '<option value="'+element.id+'">'+element.name+'</option>';
                         });
                         $("#school_id").html(school);
                     }
                 });
             }
             $("#region_ids").change(function(){
                 $.ajax({
                     url: "<?=anchorurl('contents/getRegionSchoolList')?>/"+$(this).val(),
                     type: "get",
                     dataType: 'json',
                     async: false,
                     success: function (data, textstatus) {
                         var school = '<option value="0">--请选择学校--</option>';
                         $(data.schools).each(function(index,element){
                             school += '<option value="'+element.id+'">'+element.name+'</option>';
                         });
                         $("#school_id").html(school);
                     }
                 });
             });

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
             validator.focusInvalid = function() {
                 if( this.settings.focusInvalid ) {
                     try {
                         var toFocus = $(this.findLastActive() || this.errorList.length && this.errorList[0].element || []);
                         if (toFocus.is("textarea")) {
                             UE.getEditor('editor').focus()
                         } else {
                             toFocus.filter(":visible").focus();
                         }
                     } catch(e) {
                     }
                 }
             }
        })
    </script>
</body>
</html>
