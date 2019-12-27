<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="超级程序员" />
<meta name="generator" content="Joomla! - Open Source Content Management" />
<title>
<?=$article->title?>
<?php
 $heighturl = base_url().'media/js/tiny_mce/plugins/syntaxhighlighter/';
?>
</title>
<script src="../../media/js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>media/css/common.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/css/default.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>media/css/template.css" type="text/css" />
<link href="<?=$heighturl?>styles/core/shCore.css" rel="stylesheet" type="text/css" />
<link href="<?=$heighturl?>styles/themes/shThemeDefault.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=base_url()?>media/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?=$heighturl?>scripts/core/shCore.js" ></script>
<script type="text/javascript" src="<?=$heighturl?>scripts/core/shAutoloader.js" ></script>
<script type="text/javascript" >
    $(document).ready(function () {
        SyntaxHighlighter.autoloader(
            'applescript            <?=$heighturl?>scripts/brushes/shBrushAppleScript.js',
            'actionscript3 as3      <?=$heighturl?>scripts/brushes/shBrushAS3.js', 
            'bash shell            <?=$heighturl?>scripts/brushes/shBrushBash.js', 
            'coldfusion cf          <?=$heighturl?>scripts/brushes/shBrushColdFusion.js', 
            'cpp c                  <?=$heighturl?>scripts/brushes/shBrushCpp.js', 
            'c# c-sharp csharp      <?=$heighturl?>scripts/brushes/shBrushCSharp.js', 
            'css                    <?=$heighturl?>scripts/brushes/shBrushCss.js', 
            'delphi pascal          <?=$heighturl?>scripts/brushes/shBrushDelphi.js', 
            'diff patch pas         <?=$heighturl?>scripts/brushes/shBrushDiff.js', 
            'erl erlang             <?=$heighturl?>scripts/brushes/shBrushErlang.js', 
            'groovy                <?=$heighturl?>scripts/brushes/shBrushGroovy.js', 
            'java                   <?=$heighturl?>scripts/brushes/shBrushJava.js', 
            'jfx javafx             <?=$heighturl?>scripts/brushes/shBrushJavaFX.js', 
            'js jscript javascript  <?=$heighturl?>scripts/brushes/shBrushJScript.js', 
            'perl pl                <?=$heighturl?>scripts/brushes/shBrushPerl.js', 
            'php                   <?=$heighturl?>scripts/brushes/shBrushPhp.js', 
            'text plain             <?=$heighturl?>scripts/brushes/shBrushPlain.js', 
            'py python              <?=$heighturl?>scripts/brushes/shBrushPython.js', 
            'ruby rails ror rb      <?=$heighturl?>scripts/brushes/shBrushRuby.js', 
            'sass scss              <?=$heighturl?>scripts/brushes/shBrushSass.js', 
            'scala                 <?=$heighturl?>scripts/brushes/shBrushScala.js', 
            'sql                    <?=$heighturl?>scripts/brushes/shBrushSql.js', 
            'vb vbnet               <?=$heighturl?>scripts/brushes/shBrushVb.js', 
            'xml xhtml xslt html    <?=$heighturl?>scripts/brushes/shBrushXml.js'
        );
        SyntaxHighlighter.all();
    });
</script>
<!--[if lt IE 9]>
    <script src="/joomla/media/jui/js/html5.js"></script>
<![endif]-->
</head>
<body class="site com_content view-category no-layout no-task itemid-115">
<!-- Body -->
<div class="body">
  <div class="container"> 
    <!-- Header start-->
   <!-- <div class="pad-h-c header">
      <div class="mar-a-auto dis-d ver-a-b li-ul-mar li-ul-pad li-com-fl li-tab1">
        <ul>
          <li class="current-e"> <a href="javascript:void(0)" class="">本期封面</a> </li>
          <li> <a href="javascript:void(0)" class="">往期回顾</a> </li>
        </ul>
      </div>
    </div>-->
    <!-- Header end-->
  </div>
  <div class="pt-re container content-panel"> 
    <p class="pt-ab img-com text-b width12 scientist-content">
		<?php if(!empty($article->urls)):?>
        <img src="<?=pictureurlsize('',$article->urls)?>" class="uploadpicture">
        <?php endif;?>
    </p>
    <div class="pt-ab width12 caption-panel">
      <!-- Header start-->
      <div class="pad-h-c header">
        <div class="header-inner clearfix"> <a class="brand pull-left" href="javascript:void(0)"> <span class="site-title" title="<?=$article->title?>">
          <?=$article->title?>
          </span> </a>
          <div class="header-search pull-right"> </div>
        </div>
        <div class="h-o page-header">
          <div class="fl dis-e ver-a-b li-ul-pad li-com-fl li-inline it-label">
            <ul>
              <?php foreach($article->tags as $tag):?>
              <li><a href="javascript:void(0)" title="<?=$tag->name?>" class="text-b label-com label-act-a">
                <?=$tag->name?>
                </a> </li>
              <?php endforeach;?>
            </ul>
          </div>
          <div class="fr dis-e">
            <span class="dis-e ver-a-b color-b span-time-a">
                <?=$article->publishtime?>
                </span>
          </div>
        </div>
      </div>
      <!-- Header end-->
    </div>
  </div>
    <div class="cf-b"></div>
  <div class="container pad-v-d">
    <div class="row-fluid"> 
      <!--左边 start-->
      <div id="content" class="span12"> 
        <!-- Begin Content -->
        <div class="blog">
          <div class="items-leading">
            <div class="leading-0">
              <p class="img-com article-content">
                <?=$article->body?>
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
          </div>
          <!-- end items-leading --> 
        </div>
        <!-- End Content --> 
      </div>
      <!--左边 end--> 
    </div>
  </div>
  <?php if(count($relatedarticles)):?>
        <div class="container">
        	<div class="li-ul-pad li-table it-list-a">
                <h3 class="bg-color-g color-e font-s-md line-hh-d pad-h-b">相关内容</h3>
                <ul>
                	<?php foreach($relatedarticles as $articles):?>
                      <?php
                    	 if($articles['chid'] == 17){
							$url = base_url().'article/scientist/'.$articles['article_id'];
						 }else{
							$url = base_url().'article/index/'.$articles['article_id'];
						 }
					?>
                    <li>
                        <div class="dis-e ver-a-b pad-v-d it-text-b">
                            <a class="color-f font-w-a title-lg" title="<?=$articles['title']?>" href="<?=$url?>"><?=$articles['title']?></a>
                            <div class="cf-b"></div>
                            <span class="color-b font-s-xs"><?=$articles['date']?></span>
                        </div>
                    </li>
                    <div class="cf-c"></div>
                    <?php endforeach;?>
                    <li>
                </ul>
            </div>
        </div> 
        <?php endif;?>  
</div>
<script>
function getimgpanelheight(){
    $(".content-panel").height($(".uploadpicture").height());
}
$(document).ready(function(e) {
    getimgpanelheight();
});
$(window).resize(function(){
    getimgpanelheight();
})
</script>
</body>
</html>
