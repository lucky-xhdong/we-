<?php if($type == 'image'):?>
    <img src="<?=$url?>" />
<?php elseif($type == 'audio'):?>
    <audio id="audiofile" src="<?=$url?>" controls="controls">
        Your browser does not support the audio element.
    </audio>
<?php elseif($type == 'video'):?>
    <video src="<?=$url?>" controls="controls" style="width:300px;">
        your browser does not support the video tag
    </video>
<?php else:?>
    <?php if(!empty($url)):?>
         <a type="btn-info"  href="<?=$url?>">下载文件</a>
    <?php else:?>
        <a type="btn-info"  href="javascript:;">下载文件</a>
    <?php endif;?>
<?php endif;?>
