<header class="header">
    <div class="header-container">
        <div class="header-container_left">
            <h1>
                <span class="logo">logo</span>
                <a href="<?=anchorurl("")?>" class="txt">英语学科发展服务网</a>
            </h1>
        </div>
        <ul class="header-container_right">
            <li>
                <div class="form-group">
                    <form action="<?=anchorurl('home/search/')?>" method="post">
                        <input type="text" name="key" value="<?php if(isset($key))  echo $key;?>" class="form-control">
                        <button class="btn-search" type="submit">
                            <i class="icon icon-search"></i>
                        </button>
                    </form>
                </div>
            </li>
            <li>
                <a href="<?=anchorurl("/service")?>/">
                    <span class="txt">服务平台登录</span>
                </a>
            </li>
            <li>
                <a href="<?=anchorurl("/login")?>">
                    <span class="txt">学生报告</span>
                </a>
            </li>
<!--            <li>-->
<!--                <a href="javascript:;">-->
<!--                    <span class="txt">帮助</span>-->
<!--                    <i class="icon icon-arrow-down"></i>-->
<!--                </a>-->
<!--                <div class="dropdown-menu hide">-->
<!--                    <ul>-->
<!--                        <li><a href="--><?//=anchorurl("item/index/424")?><!--" class="txt">技术支持</a></li>-->
<!--                        <li><a href="--><?//=anchorurl("item/index/431")?><!--" class="txt">课程介绍</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </li>-->
        </ul>
    </div>
</header>
<script>
    $(document).ready(function () {
        $(".header-container_right li").hover(function () {
            $(this).find('.dropdown-menu') && $(this).find('.dropdown-menu').removeClass('hide');
        }, function () {
            $(this).find('.dropdown-menu') && $(this).find('.dropdown-menu').addClass('hide');
        })
    })
</script>
