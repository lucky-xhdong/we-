<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="无忧产检" />
<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible"content="IE=9; IE=8; IE=7; IE=EDGE">
<!--<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />-->
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="generator" content="Joomla! - Open Source Content Management" />
<title>无忧产检</title>
<link rel="stylesheet" href="<?=base_url()?>media/css/common.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/css/style.css" type="text/css" />  
<link rel="stylesheet" href="<?=base_url()?>media/css/default.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/css/template.css" type="text/css" />
<script type="text/javascript" src="<?=base_url()?>media/js/jquery-1.10.2.min.js"></script>
<!--[if lt IE 9]>
    <script src="/joomla/media/jui/js/html5.js"></script>
<![endif]-->
</head>
<body class="site com_content view-category no-layout no-task itemid-115">
	<!-- Body -->
	<div class="body">
		<div class="container pad-v-d">
			<!-- Header start-->
			<div class="header">
				<div class="header-inner clearfix">
					<a class="brand pull-left" href="javascript:void(0)">
						<span class="site-title" title="<?=$item->title?>"><?=$item->title?></span>
                    </a>
					<div class="header-search pull-right">
						
					</div>
				</div>
			</div>
			<!-- Header end-->
			<div class="row-fluid">
            	<!--左边 start-->
                <div id="content" class="span12">
					<!-- Begin Content -->
					<div class="blog">
                        <div class="items-leading">
                            <div class="leading-0" id="article-content">                              
                               <?php /*?> <p class="img-com text-b article-content">
                                <?php if(!empty($item->header_picture_url)):?>
                                		<img src="<?=pictureurl2(0).$item->header_picture_url?>">
                                   <?php endif;?>       
                                	<span></span>
                                </p>
                              <?php */?>
                                <p class="img-com article-content">
                                	<?=$item->content?>
                                </p>
                            </div>
                            <div class="cf-e"></div>
                            <!--<div class="cf-e"></div>
                            <div class="well">
                                <p>
                                    <span class="color-h">
                                        style 
                                            <br>
                                            script type="text/javascript" function getEventObject(W3CEvent){//事件标准化函数
                                            <br>
                                            return W3CEventwindow.event;
                                            <br>
                                        }
                                        <br>
                                        var y = e.pageY || (e.clientY+document.body.scrollTop);
                                    </span> 
                                </p>
                            </div>-->
                            <div class="clearfix"></div>
                        </div><!-- end items-leading -->
                    </div>
                    <!-- End Content -->
                </div>
                <!--左边 end-->
            </div>
        </div>
    </div>
</body>
<script>
		if (/iPhone|iPod|iPad/.test(navigator.userAgent) && !(/safari/.test(navigator.userAgent.toLowerCase()))){
		  window.onload=function(){
			var bridge = false;
			document.addEventListener('WebViewJavascriptBridgeReady', function(event) {
				bridge = event.bridge;
				// Start using the bridge
			}, false);
            $("#article-content").find("a").each(function(index, element) {
                $(this).attr('data-url',$(this).attr('href'));
				$(this).attr('href','javascript:;')
				$(this).click(function(){
					 var data = {'title':$(this).html().replace(/<[^>]+>/g,""),'article_url':$(this).data('url')};
					bridge.send( data, function(responseData) {
						alert("I got a response!");
					});
				});
			});	
		  }
		}	
	</script>
</html>
