<div class="mhc-detail_hgroup">
    <div class="mhc-list_title">
        <span class="name" data-after="（<?=$record->gradeName?>）"><?=$record->name?></span>
        <span class="time"><?=$record->date?></span>
    </div>
</div>
<!--未批阅 start-->
<div class="mhc-detail_unmark mhc-detail_unmark_audio">
    <!--打分 start-->
    <div class="score-wrapper">
        <div class="work-type">
            <!--录音 start-->
            <div class="marked-type_audio" data-before="点击收听录音">
                <div class="audio-group">
                    <a href="javascript:;" class="btn btn-play" id="playaudio">播放</a>
                    <div class="progress">
                        <div class="progress-bar" id="progress-bar" style="width: 0%;">进度条</div>
                    </div>
                    <?php if(!empty($record->fileurl)):?>
                    <audio src="<?=$record->fileurl?>" class="audio" id="workAudio">您的浏览器不支持 audio 标签。</audio>
                    <?php endif;?>
                </div>
            </div>
            <!--录音 end-->
        </div>
        <div class="score-group" data-before="演讲评分">
            <?php if($record->comment_speech_status == 1):?>
                <p class="txt"><?=$record->comment_speech_totalScores?>分</p>
            <?php else:?>
                 <p class="txt">未评分</p>
            <?php endif;?>
        </div>
    </div>
    <!--打分 end-->
    <!--评价 start-->
    <div class="comment-wrapper" data-before="演讲评价">
        <p class="txt">
            <?php if(isset($record->comment_speech_content_info->body) && isset($record->comment_speech_performance_info->body)):?>
                <?=$record->comment_speech_content_info->body?> <?=$record->comment_speech_performance_info->body?>
            <?php endif;?>
        </p>
    </div>
    <!--评价 end-->
    <!--演讲内容评价 start-->
    <?php if($record->comment_speech_status == 0):?>
    <div class="comment-level" data-before="演讲内容评价：">
        <ul id="speechContentList">
            <?php foreach($speech['content'] as $content):?>
            <li  data-id="<?=$content->id?>"><a href="javascript:;" class="txt"><?=$content->score?>分：<?=$content->body?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="comment-level" data-before="语言运用：">
        <ul id="speechPerformanceList">
            <?php foreach($speech['performance'] as $performance):?>
                <li  data-id="<?=$performance->id?>"><a href="javascript:;" class="txt"><?=$performance->score?>分：<?=$performance->body?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
    <?php endif;?>
    <!--演讲内容评价 end-->
</div>
<div class="mhc-detail_unmark mhc-detail_unmark_composition">
    <!--打分 start-->
    <div class="score-wrapper">
        <div class="work-type">
            <!--作文 start-->
            <div class="marked-type_txt" data-before="作文">
                <p class="txt">
                    <?=$record->content?>
                </p>
            </div>
            <!--作文 end-->﻿content
        </div>
        <div class="score-group" data-before="作文评分">
            <?php if($record->comment_text_status == 1):?>
                <p class="txt"><?=$record->comment_text_totalScores?>分</p>
            <?php else:?>
                <p class="txt">未评分</p>
            <?php endif;?>
        </div>
    </div>
    <!--打分 end-->
    <!--评价 start-->
    <div class="comment-wrapper" data-before="文字评价">
        <p class="txt">
            <?php if(isset($record->comment_text_content_info->body) && isset($record->comment_text_performance_info->body)):?>
                 <?=$record->comment_text_content_info->body?> <?=$record->comment_text_performance_info->body?>
            <?php endif;?>
        </p>
    </div>
    <!--评价 end-->
    <?php if($record->comment_text_status == 0):?>
    <!--语言运用 start-->
    <div class="comment-level" data-before="文字内容评价：">
        <ul id="textCommentList">
            <?php foreach($text['content'] as $content):?>
                <li  data-id="<?=$content->id?>"><a href="javascript:;" class="txt"><?=$content->score?>分：<?=$content->body?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="comment-level" data-before="语言运用：">
        <ul id="textPerformanceList">
            <?php foreach($text['performance'] as $performance):?>
                <li  data-id="<?=$performance->id?>"><a href="javascript:;" class="txt"><?=$performance->score?>分：<?=$performance->body?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
    <?php endif;?>
    <!--语言运用 end-->
</div>
<!--未批阅 end-->
<!--按钮 start-->
<?php if(($record->comment_text_status == 0 || $record->comment_speech_status == 0) && $record->isComment === true):?>
<div class="btn-group"><a href="javascript:;" class="btn btn-submit" id="submitWork">提交</a></div>
<?php endif;?>
<!--按钮 end-->