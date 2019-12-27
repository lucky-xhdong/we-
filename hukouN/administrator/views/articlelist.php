<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/common.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/itgenius.css">
<meta charset="utf-8">
<title>天才程序员登录页</title>
</head>

<!--navbar start-->
<div class="navbar navbar-inverse itnavbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-collapse text-b">
        <a href="javascript:void(0)" class="navbar-brand current-a">技术</a>
        <a href="javascript:void(0)" class="navbar-brand ">专题</a>
        <a href="javascript:void(0)" class="navbar-brand ">用户管理</a>
    </div>
  </div>
</div>
<!--navbar end-->
<div class="container login dis-d bor-a">
	<div class="row">
        <!--左侧菜单 start-->
       <div class="col-md-2 bg-color-a pad-a h-o offsetmenu">
       		<button class="btn btn-success bg-color-d color-d bor-none mar-g btn-new-a">新建频道</button>
        	<div class="li-com-fl li-block li-ul-pad li-text-b li-height li-menu">
            	<ul>
                	<li class="current-b"><a href="javascript:void(0)">IOS开发</a></li>
                	<li><a href="javascript:void(0)">IOS开发</a></li>
                	<li><a href="javascript:void(0)">IOS开发</a></li>
                	<li><a href="javascript:void(0)">IOS开发</a></li>
                	<li><a href="javascript:void(0)">IOS开发</a></li>
                	<li><a href="javascript:void(0)">IOS开发</a></li>
                </ul>
            </div>
       </div>
        <!--左侧菜单 end-->
        <!--右侧内容 start-->
		<div class="col-md-10">
            <!--tab切换 start-->
            <div class="cf-h"></div>
            <div class="li-com-fl li-block li-text-b it-nav">
                <ul>
                 <li class="current-c"><?=anchor('tech/articlelist','文章管理')?></li>
                  <li ><?=anchor('tech/content','新建文章')?></li>
                  <li><?=anchor('tech/tag','标签管理')?></li>
                </ul>
            </div>
            <div class="cf-a"></div>
            <!--tab切换 end-->
            <!--表格内容 start-->
            <div class="li-table li-width-a li-ul-pad mar-t1 bor-a li-manage">
                <ul>
                    <!--表格title start-->
                    <li>
                        <div class="dis-e ver-a-b it-tab-caption">
                            <span>全选</span>
                        </div>
                        <div class="dis-e ver-a-b it-tab-caption">
                            <span>操作</span>
                        </div>
                        <div class="dis-e ver-a-b it-tab-caption">
                            <span>文章</span>
                        </div>
                        <div class="dis-e ver-a-b it-tab-caption">
                            <span>标签</span>
                        </div>
                        <div class="dis-e ver-a-b it-tab-caption">
                            <span>时间</span>
                        </div>
                        <div class="dis-e ver-a-b it-tab-caption">
                            <span>id</span>
                        </div>
                    </li>
                    <div class="cf-d"></div>
                    <!--表格title end-->
                    <!--表格body start-->
                    <li>
                    	<!--全选-->
                        <div class="dis-e ver-a-b it-check">
                            <input type="checkbox">
                        </div>
                    	<!--操作-->
                        <div class="dis-e ver-a-b it-handle">
                            <div class="li-com-fl li-block dis-c ver-a-b li-inline li-width-b it-switch">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)"></a>
                                        <div class="cf-a"></div>
                                        <span class="font-s-xs">有效</span>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="current-d"></a>
                                        <div class="cf-a"></div>
                                        <span class="font-s-xs">置顶</span>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"></a>
                                        <div class="cf-a"></div>
                                        <span class="font-s-xs">banner</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    	<!--文章-->
                        <div class="dis-e ver-a-b it-article">
                            文章1
                        </div>
                    	<!--标签-->
                        <div class="dis-e ver-a-b it-label li-inline">
                            <ul>
                                <li><a href="javascript:void(0)" class="label-com label-act-b">标签1</a></li>
                                <li><a href="javascript:void(0)" class="label-com label-act-b">标签1</a></li>
                            </ul>
                        </div>
                    	<!--时间-->
                        <div class="dis-e ver-a-b it-time">
                            <span>2014-2-14</span>
                        </div>
                    	<!--id-->
                        <div class="dis-e ver-a-b it-id">
                            <span>0206</span>
                        </div>
                    </li>
                    <div class="cf-d"></div>
                    <!--表格body start-->
                </ul>
            </div>
            <!--表格内容 end-->
		</div>
        <!--右侧内容 end-->
    </div>
</div>
</body>
</html>
