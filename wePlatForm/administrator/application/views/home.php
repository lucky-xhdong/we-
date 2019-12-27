<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="utf-8" />
    <title>豌豆英语--后台管理系统</title>
    <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="<?=base_url()?>media/administrator/libs/assets/animate.css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>media/administrator/libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>media/administrator/libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>media/administrator/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>media/administrator/css/font.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>media/administrator/css/app.css" type="text/css" />
    <script src="<?=base_url()?>media/administrator/js/html5.js"></script>
    <script src="<?=base_url()?>media/administrator/js/respond.src.js"></script>

</head>
<style>
    .i-checks input:checked + i::before{
        background-color: #74a92d;
    }
    .i-checks input:checked + i{
        border-color: #74a92d;
    }
    .logindiv{
        background-image: url(<?=base_url()?>media/administrator/images/develop/loginbg.jpg);
        position: relative;
    }
    .logo{
        text-align: center;margin-top: 15%
    }
    .logo img{
        width: 450px;height: 180px
    }
</style>
<body>
<div class="app app-header-fixed logindiv">
    <div class="logo">
        <img src="<?=base_url()?>media/administrator/images/develop/logintip.png">
    </div>
    <div class="container w-xxl w-auto-xs" ng-controller="SigninFormController" ng-init="app.settings.container = false;" style="position: absolute;right: 5%;bottom: 30%">
        <div class="m-b-lg">
            <form name="form" class="form-validation">
                <div class="panel panel-default" style="min-height: 300px">
                    <div class="panel-heading font-bold">用户登录</div>
                    <div class="panel-body">
                        <form class="bs-example form-horizontal">

                            <div class="row login" >
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="请输入你的用户名">
                                </div>
                                <div class="col-lg-1">
                                </div>
                            </div>

                            <div class="row login">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="密码">
                                </div>
                                <div class="col-lg-1">
                                </div>
                            </div>

                            <div class="row login">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="验证码">
                                </div>
                                <div class="col-lg-6">
                                </div>
                            </div>
                            <div class="row login">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <!--<a href="studyData.html" class="btn btn-sm btn-info loginbtn">登录</a>-->
                                    <a data-toggle="modal" class="btn btn-sm btn-info loginbtn" href="form_basic.html#modal-form">登录</a>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                            <div class="row" style="margin-top: -15px">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <div class="checkbox">
                                        <label class="i-checks">
                                            <input type="checkbox" checked=""><i class="remember"></i> 记住用户名
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>

                        </form>
                    </div>
                </div>
            </form>
        </div>
        <div id="modal-form" class="modal fade" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 b-r">
                                <h3 class="m-t-none m-b " style="background-color: #f2f2f2">提示</h3>
                                <p> 您正在删除伊丽莎白，删除后信息不可恢复。是否要继续删除？ </p>
                                <div style="text-align: center;border-top:1px #f2f2f2 solid ">
                                    <div class="col-sm-6" style="border-right:1px #f2f2f2 solid ">
                                        <a style="padding: 5px 0;" href="studyData.html">确定</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a>删除</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url()?>media/administrator/libs/jquery/jquery/dist/jquery-1.10.2.min.js"></script>
<script src="<?=base_url()?>media/administrator/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?=base_url()?>media/administrator/js/ui-load.js"></script>
<script src="<?=base_url()?>media/administrator/js/ui-jp.config.js"></script>
<script src="<?=base_url()?>media/administrator/js/ui-jp.js"></script>
<script src="<?=base_url()?>media/administrator/js/ui-nav.js"></script>
<script src="<?=base_url()?>media/administrator/js/ui-toggle.js"></script>
<script src="<?=base_url()?>media/administrator/js/ui-client.js"></script>

</body>
</html>
