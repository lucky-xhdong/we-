<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/common.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/itgenius.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/spectrum.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/css/video-js.css">
    <script type="text/javascript" src="<?= base_url() ?>media/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>media/js/video.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>唯佳教育集团-后台管理系统</title>
    <style>
        .alerm{
         border:2px solid red;
        }
    </style>
</head>
<body>
<script>
    videojs.options.flash.swf = "<?=base_url()?>media/js/video-js.swf";
</script>

<!--navbar start-->
<?php $this->load->view('topheader');?>
<!--navbar end-->

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row">
        <!--左厕菜单 start-->
        <?php $this->load->view('aside');?>
        <!--左厕菜单 end-->
        <!--右厕内容 start-->
        <section class="main-carema-list">
            <nav class="nav-section">
                <ul>
                    <li><?= anchor('onlinevideo/index/', '视频列表', 'class="current"') ?></li>
                </ul>
            </nav>
            <div class="carema-lists">
                <div class="carema-video-lists">
                    <ul>
                        <?php foreach($caremas as $carema):?>
                        <li id = "carema_<?=$carema->carema_id?>">
                            <video id="example_video_<?=$carema->carema_id?>" class="video-js vjs-default-skin" controls preload="auto" data-setup='{"autoplay":true}' width="310" height="280">
                                <source src="<?=$carema->rtsp_url?>" type='video/x-flv' />
                                <track kind="captions" src="<?=base_url()?>media/css/demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
                                <track kind="subtitles" src="<?=base_url()?>media/css/demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
                                <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                            </video>
                            <span><?=$carema->department_title?>:<?=$carema->title?></span>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="text-c">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </section>
    </div>
</div>
<audio src="<?=base_url()?>media/audio/alerm.mp3"  id="audio"></audio>
<script type="text/javascript">
    var flag = 0;
    var int = null;
    var carema = null;
    (function(){
        var audio = document.getElementById("audio");
        var wsServer = 'ws://115.29.99.175:9000';
        var ws = new WebSocket(wsServer);
        var isConnect = false;
        ws.onopen = function (evt) { onOpen(evt) };
        ws.onclose = function (evt) { onClose(evt) };
        ws.onmessage = function (evt) { onMessage(evt) };
        ws.onerror = function (evt) { onError(evt) };
        function onOpen(evt) {
            console.log("连接服务器成功");
            isConnect = true;
        }
        function onClose(evt) {
            //console.log("Disconnected");
        }
        function onMessage(evt) {

            var data = JSON.parse(evt.data);
            switch (data.type) {
                case 'alerm':
                    addMsg(data.msg);
                    break;
                case 'num' :
                    break;
            }

            console.log('Retrieved data from server: ' + evt.data);
        }
        function onError(evt) {
            console.log('Error occured: ' + evt.data);
        }

        function addMsg(msg) {

            carema =  $("#carema_"+msg.carema_id);
            audio.play();
            int=window.setInterval(alerm,500)


        }
        function alerm()
        {  if(carema != null) {
            if (flag == 20) {
                window.clearInterval(int);
                flag = 0;
                audio.pause();
                carema.removeClass('alerm')
            } else if (flag % 2 == 0) {
                carema.addClass('alerm')
                flag ++;
            } else {
                carema.removeClass('alerm')
                flag ++;
            }
        }
        }
    })();
</script>
</body>
</html>