<?php if($type == 'image'):?>
    <img src="<?=$url?>" />
<?php elseif($type == 'audio'):?>
    <audio id="audiofile" src="<?=$url?>" controls="controls" >
        Your browser does not support the audio element.
    </audio>
<?php elseif($type == 'video'):?>
    <video src="<?=$url?>" controls="controls" id="video" style="width: 300px;">
        your browser does not support the video tag
    </video>
<?php else:?>
    <button type="btn-info" id="downloadfile" value="<?=$url?>">下载文件</button>
<?php endif;?>
