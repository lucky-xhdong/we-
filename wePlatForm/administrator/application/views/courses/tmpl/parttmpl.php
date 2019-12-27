<?php
    $parttypes = array("listening","click","sr");
    $partscripttypes = array("listening","dialog","questions","summary","task");
    $sr_categorys = array('sentence', 'words','chapter');
    $parttype2s = array(
                        "listening",
                        "comprehension",
                        "interaction",
                        "review_passage_summary",
                        "review_sentence_reading",
                        "review_sentence_formation",
                        "review_sentence_repetition",
                        "grammar_fill_in",
                        "grammar_sentence_ordering",
                        "grammar_sentence_formation",
                        "mt_1",
                        "mt_2",
                        "mt_3",
                        "mt_4",
                        "phonics",
                        "vocabulary"
    );
?>
<ul id="content" xmlns="http://www.w3.org/1999/html">
    <li class="col-md-12">
        <span class="col-md-4">名称</span>
        <div class="col-md-8">
            <input type="text"  value="<?php if(isset($part->id)) echo $part->name;?>" required name="name" placeholder="名称" />
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-4">类型</span>
        <div class="col-md-8">
            <select name="type">
                <?php foreach($parttypes as $parttype):?>
                    <?php if(isset($part->id) && $parttype == $part->type):?>
                        <option value="<?=$parttype?>" selected><?=$parttype?></option>
                    <?php else:?>
                        <option value="<?=$parttype?>"><?=$parttype?></option>
                    <?php endif?>
                <?php endforeach;?>
            </select>
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-4">part_type</span>
        <div class="col-md-8">
            <select name="part_type">
                <?php foreach($parttype2s as $parttype2):?>
                    <?php if(isset($part->id) && $parttype2 == $part->part_type):?>
                        <option value="<?=$parttype2?>" selected><?=$parttype2?></option>
                    <?php else:?>
                        <option value="<?=$parttype2?>"><?=$parttype2?></option>
                    <?php endif?>
                <?php endforeach;?>
            </select>
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-4">语音识别类型</span>
        <div class="col-md-8">
            <select name="sr_category">
                <?php foreach($sr_categorys as $sr_category):?>
                    <?php if(isset($part->id) && $sr_category == $part->sr_category):?>
                        <option value="<?=$sr_category?>" selected><?=$sr_category?></option>
                    <?php else:?>
                        <option value="<?=$sr_category?>"><?=$sr_category?></option>
                    <?php endif?>
                <?php endforeach;?>
            </select>
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-4">脚本类型</span>
        <div class="col-md-8">
            <select name="part_script_type">
                <?php foreach($partscripttypes as $partscripttype):?>
                    <?php if(isset($part->id) && $partscripttype == $part->part_script_type):?>
                        <option value="<?=$partscripttype?>" selected><?=$partscripttype?></option>
                    <?php else:?>
                        <option value="<?=$partscripttype?>"><?=$partscripttype?></option>
                    <?php endif?>
                <?php endforeach;?>
            </select>
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-4">是否有题</span>
        <div class="col-md-8">
            是 <input type="radio"  value="1"  name="have_questions"  style="width: 60px" <?php if(isset($part->id) && (int)$part->have_questions == 1 ) echo "checked";?>/>
            否<input type="radio"  value="0"  name="have_questions" style="width: 60px" <?php if((isset($part->id) && (int)$part->have_questions == 0) || !isset($part->id)) echo "checked";?>/>
        </div>
    </li>


<!--    <li class="col-md-12">-->
<!--        <span class="col-md-4">标题</span>-->
<!--        <div class="col-md-8">-->
<!--            <input type="text"  value="--><?php //if(isset($part->id)) echo $part->title;?><!--" required name="title" placeholder="课程名称" />-->
<!--        </div>-->
<!--    </li>-->
    <li class="col-md-12">
        <span class="col-md-4">描述</span>
        <div class="col-md-8">
            <textarea type="text" rows="3" name="description" ><?php if(isset($part->id)) echo $part->description;?></textarea>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">tips</span>
        <div class="col-md-8">
            <textarea type="text" rows="3" name="tips" ><?php if(isset($part->id)) echo $part->tips;?></textarea>
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-4">kewords</span>
        <div class="col-md-8">
            <textarea type="text" rows="3" name="keywords" placeholder="kewords以英文逗号分隔:如 name,businessman,born,address,avenue,graduate"><?php if(isset($part->id)) echo $part->keywords;?></textarea>
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-4">总题目数:</span>
        <div class="col-md-8">
            <input type="text"  value="<?php if(isset($part->id)) echo $part->content_totalcount;?>"  name="content_totalcount" placeholder="总题目数" />
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-4">显示总页数:</span>
        <div class="col-md-8">
            <input type="text"  value="<?php if(isset($part->id)) echo $part->content_perpage;?>"  name="content_perpage" placeholder="随机抽取总数" />
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-4">Tag Name:</span>
        <div class="col-md-8">
            <input type="text"  value="<?php if(isset($part->id)) echo $part->tag_name;?>"  name="tag_name" placeholder="" />
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-4">Tag Type:</span>
        <div class="col-md-8">
            <input type="text"  value="<?php if(isset($part->id)) echo $part->tag_type;?>"  name="tag_type" placeholder="" />
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-4">每页显示题目数:</span>
        <div class="col-md-8">
            <input type="text"  value="<?php if(isset($part->id)) echo $part->content_perPageCount;?>"  name="content_perPageCount" placeholder="每页显示题目数" />
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-4">MT第一次抽取:</span>
        <div class="col-md-8">
            <input type="text"  value="<?php if(isset($part->id)) echo $part->select_items_1;?>"  name="select_items_1" placeholder="如:1,3,5,7" />
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-4">MT第二次抽取:</span>
        <div class="col-md-8">
            <input type="text"  value="<?php if(isset($part->id)) echo $part->select_items_2;?>"  name="select_items_2" placeholder="如:1,3,5,7" />
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-4">MT第三次抽取:</span>
        <div class="col-md-8">
            <input type="text"  value="<?php if(isset($part->id)) echo $part->select_items_3;?>"  name="select_items_3" placeholder="如:1,3,5,7" />
        </div>
    </li>

    <li class="col-md-12">
        <span class="col-md-4">封面图</span>
        <div class="col-md-8">
            <label for="" class="upload-btn">
                <input type="file" class="img-upload" name="file">
                <span class="img-upload-btn">上传封面图</span>
            </label>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">同步数据源</span>
        <div class="col-md-8">
            <select name="sync_origin_id">
                <option value="0">--select--</option>
                <?php foreach($parts as $partItem):?>
                    <?php if(isset($part->sync_origin_id) && $partItem['id'] == $part->sync_origin_id):?>
                        <option value="<?=$partItem['id']?>" selected><?=$partItem['name']?></option>
                    <?php else:?>
                        <option value="<?=$partItem['id']?>"><?=$partItem['name']?></option>
                    <?php endif?>
                <?php endforeach;?>
            </select>
        </div>
    </li>
    <li class="col-md-12">
        <span class="col-md-4">事件类型</span>
        <div class="col-md-8">
            <select name="event_type_id">
                <option value="0">--select--</option>
                <?php foreach($eventTypes as $eventType):?>
                    <?php if(isset($part->event_type_id) && $eventType->id == $part->event_type_id):?>
                        <option value="<?=$eventType->id?>" selected><?=$eventType->name?></option>
                    <?php else:?>
                        <option value="<?=$eventType->id?>"><?=$eventType->name?></option>
                    <?php endif?>
                <?php endforeach;?>
            </select>
        </div>
    </li>
    <input type="hidden" name="id" value="<?php if(isset($part->id)) echo $part->id;else echo 0;?>">
    <input type="hidden" name="lesson_id" value="<?php if(isset($lesson_id)) echo $lesson_id;else echo 0;?>">
</ul>