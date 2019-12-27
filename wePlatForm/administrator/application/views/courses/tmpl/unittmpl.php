
<ul id="content" xmlns="http://www.w3.org/1999/html">
    <li class="col-md-12">
        <span class="col-md-4">单元名称</span>
        <div class="col-md-8">
            <input type="text"  value="<?php if(isset($unit->id)) echo $unit->name;?>" required name="name" placeholder="单元名称" />
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">标题</span>
        <div class="col-md-8">
            <input type="text"  value="<?php if(isset($unit->id)) echo $unit->title;?>"  name="title" placeholder="单元名称" />
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">描述</span>
        <div class="col-md-8">
            <textarea type="text" rows="3" name="description" ><?php if(isset($unit->id)) echo $unit->description;?></textarea>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">是否发布</span>
        <div class="col-md-8">
                发布 <input type="radio"  value="1"  name="status"  style="width: 60px" <?php if(isset($unit->id) && $unit->status == 1 ) echo "checked";?>/>
                不发布<input type="radio"  value="0"  name="status" style="width: 60px" <?php if((isset($unit->id) && $unit->status == 0) || !isset($unit->id)) echo "checked";?>/>
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
    <input type="hidden" name="id" value="<?php if(isset($unit->id)) echo $unit->id;else echo 0;?>">
    <input type="hidden" name="level_id" value="<?php if(isset($level_id)) echo$level_id;else echo 0;?>">
    <input type="hidden" name="course_id" value="<?php if(isset($course_id)) echo $course_id;else echo 0;?>">
</ul>