<?php
    $lessontypes = array("passage","dialog","review","grammar","test")
?>
<ul id="content" xmlns="http://www.w3.org/1999/html">
    <li class="col-md-12">
        <span class="col-md-4">名称</span>
        <div class="col-md-8">
            <input type="text"  value="<?php if(isset($lesson->id)) echo $lesson->name;?>" required name="name" placeholder="名称" />
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">lesson 类型</span>
        <div class="col-md-8">
            <select name="type">
                <?php foreach($lessontypes as $lessontype):?>
                    <?php if(isset($lesson->id) && $lessontype == $lesson->type):?>
                        <option value="<?=$lessontype?>" selected><?=$lessontype?></option>
                    <?php else:?>
                        <option value="<?=$lessontype?>"><?=$lessontype?></option>
                    <?php endif?>
                <?php endforeach;?>
            </select>
        </div>
    </li>
<!--    <li class="col-md-12">-->
<!--        <span class="col-md-4">标题</span>-->
<!--        <div class="col-md-8">-->
<!--            <input type="text"  value="--><?php //if(isset($lesson->id)) echo $lesson->title;?><!--" required name="title" placeholder="课程名称" />-->
<!--        </div>-->
<!--    </li>-->
    <li class="col-md-12">
        <span class="col-md-4">描述</span>
        <div class="col-md-8">
            <textarea type="text" rows="3" name="description" ><?php if(isset($lesson->id)) echo $lesson->description;?></textarea>
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
    <input type="hidden" name="id" value="<?php if(isset($lesson->id)) echo $lesson->id;else echo 0;?>">
    <input type="hidden" name="unit_id" value="<?php if($unit_id) echo $unit_id;else echo 0;?>">
</ul>
