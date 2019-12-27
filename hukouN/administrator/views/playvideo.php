<?php
$url = $video->server_url.$video->path;
?>
<script type="text/javascript" src="<?= base_url() ?>media/js/video.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/video-js.css">
<script>
    videojs.options.flash.swf = "<?=base_url()?>media/js/video-js.swf";
</script>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">视频回放</h4>
        </div>
        <div class="modal-body">
            <video id="carema_video" class="video-js vjs-default-skin" controls preload="auto" data-setup='{"autoplay":true}' width="430" height="200">
                <source src="<?=$url?>" type='video/x-flv' />
                <track kind="captions" src="<?=base_url()?>media/css/demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
                <track kind="subtitles" src="<?=base_url()?>media/css/demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
                <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
            </video>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->