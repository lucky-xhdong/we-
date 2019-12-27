<!--<header class="common-header">-->
<!--    <div class="header-container">-->
<!--        <div class="header-container_left">-->
<!--            <span class="txt">英语学科发展服务平台</span>-->
<!--        </div>-->
<!--        <div class="header-container_right">-->
<!--            <i class="icon icon-username"></i>-->
<!--            <span class="txt">服务平台登录</span>-->
<!--        </div>-->
<!--    </div>-->
<!--</header>-->
<header class="header">
    <div class="wrp-con fn">
        <div class="header-tit text-l fn-l">
            <h1><a href="<?=anchorurl("")?>" class="txt">英语学科发展服务网</a></h1>
<!--            <span>基于大数据下英语教改平台 </span>-->
        </div>
        <ul class="header-nav fn fn-r">
            <li>
                <a href="<?=anchorurl("")?>">
                    <i class="icon icon-home"></i>
                    <span class="txt">首页</span>
                </a>
            </li>
            <li>
                <a href="<?=anchorurl("/service")?>/">
                    <i class="icon icon-username-o"></i>
                    <span class="txt">服务平台登录</span>
                </a>
            </li>
            <li>
                <a href="<?=anchorurl("/login")?>">
                    <i class="icon icon-username-o"></i>
                    <span class="txt">学生报告</span>
                </a>
            </li>
            <?php if(getViewer()->id !=0 ):?>
            <li>
                <a href="javascript:;">
                    <img class="avatar" src="<?=base_url()?>media/wePlatForm/images/img1.jpg" alt="">
                </a>
                <div class="dropdown-menu hide">
                    <a class="dropdown-menu__item" href="<?=anchorurl("users/changePassword")?>">
                        <i class="icon icon-password-o"></i>
                        <span class="txt">修改密码</span>
                    </a>
                    <a class="dropdown-menu__item" href="<?=anchorurl("login/logout")?>">
                        <i class="icon icon-logout-o"></i>
                        <span class="txt">退出登录</span>
                    </a>
                </div>
            </li>
            <?php endif;?>
<!--            <li><a href="--><?//=anchorurl("")?><!--"><i></i>首页</a></li>-->
<!--            <li><a href="--><?//=anchorurl("regional")?><!--"><i></i>区域管理平台</a></li>-->
        </ul>
    </div>
</header>
<script>
    $(document).ready(function () {
        $(".header-nav li").hover(function () {
            $(this).find('.dropdown-menu') && $(this).find('.dropdown-menu').removeClass('hide');
        }, function () {
            $(this).find('.dropdown-menu') && $(this).find('.dropdown-menu').addClass('hide');
        })
    })
</script>
