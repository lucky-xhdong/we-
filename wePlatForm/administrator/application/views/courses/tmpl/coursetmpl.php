<?php
    $coursetypes = array("high_school"=>"高中","middle_school"=>"初中","primary_school"=>"小学");
?>
<ul id="content" xmlns="http://www.w3.org/1999/html">
    <li class="col-md-12">
        <span class="col-md-4">课程类型</span>
        <div class="col-md-8">
            <select name="type">
                <?php foreach($coursetypes as $key=>$coursetype):?>
                     <?php if(isset($course->id) && $key == $course->type):?>
                            <option value="<?=$key?>" selected><?=$coursetype?></option>
                        <?php else:?>
                            <option value="<?=$key?>"><?=$coursetype?></option>
                     <?php endif?>
                <?php endforeach;?>
            </select>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">课程名称</span>
        <div class="col-md-8">
            <input type="text"  value="<?php if(isset($course->id)) echo $course->name;?>" required name="name" placeholder="课程名称" />
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">使用对象</span>
        <div class="col-md-8">
            <textarea type="text" rows="3" name="suitable_object" ><?php if(isset($course->id)) echo $course->suitable_object;?></textarea>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">学习目标</span>
        <div class="col-md-8">
            <textarea type="text" class="col-md-8" rows="3" name="learning_goals" placeholder="学习目标" ><?php if(isset($course->id)) echo $course->learning_goals;?></textarea>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">课程性质</span>
        <div class="col-md-8">
            <textarea type="text" class="col-md-8" rows="3"  name="nature_course" ><?php if(isset($course->id)) echo $course->nature_course;?></textarea>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">是否发布</span>
        <div class="col-md-8">
            发布 <input type="radio"  value="1"  name="status"  style="width: 60px" <?php if(isset($course->id) && $course->status == 1 ) echo "checked";?>/>
            不发布<input type="radio"  value="0"  name="status" style="width: 60px" <?php if((isset($course->id) && $course->status == 0) || !isset($course->id)) echo "checked";?>/>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">封面图</span>
        <div class="col-md-8">
            <label for="" class=" upload-btn">
                <input type="file" class="img-upload" name="file">
                <span class="img-upload-btn">上传封面图</span>
            </label>
        </div>

    </li>
    <input type="hidden" name="id" value="<?php if(isset($course->id)) echo $course->id;else echo 0;?>">
</ul>