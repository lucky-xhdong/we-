<nav class="navbar navbar-expand-lg navbar-light common-top-menu">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
<!--            <li class="nav-item active">-->
<!--                <a class="nav-link" href="--><?//=anchorurl("materialResources")?><!--">素材库</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="javascript:;">消息管理</a>-->
<!--            </li>-->
        </ul>
        <ul class="navbar-nav__right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">我的工作台</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?=anchorurl("login/logout")?>">退出</a>
                </div>
            </li>
            <li class="nav-item">
                <div class="avatar-wrapper">
                    <a href="javascript:;">
                        <img src="<?=getAdminViewer()->getAvatarUrl()?>" alt="">
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>