<?php
$controller = $this->uri->segment(1);
$permissions = getAdminViewer()->getUserRolePermission();
$permission_urls = array();
 foreach($permissions as $permission){
     $permission_urls[] = $permission->url;
 }
?>
<aside id="aside" class="app-aside hidden-xs bg-dark">
    <div class="aside-wrap">
        <div class="navi-wrap">
            <!-- user -->
            <div class="clearfix hidden-xs text-center hide" id="aside-user">
                <div class="dropdown wrapper">
                    <a href="app.page.profile">
                <span class="thumb-lg w-auto-folded avatar m-t-sm">
                  <img src="<?=base_url()?>media/administrator/images/a0.jpg" class="img-full" alt="...">
                </span>
                    </a>
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
                <span class="clear">
                  <span class="block m-t-sm">
                    <strong class="font-bold text-lt"><?=getAdminViewer()->name?></strong>
                    <b class="caret"></b>
                  </span>
                  <span class="text-muted text-xs block">Art Director</span>
                </span>
                    </a>
                    <!-- dropdown -->
                    <ul class="dropdown-menu animated fadeInRight w hidden-folded">
                        <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                            <span class="arrow top hidden-folded arrow-info"></span>
                            <div>
                                <p>300mb of 500mb used</p>
                            </div>
                            <div class="progress progress-xs m-b-none dker">
                                <div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                            </div>
                        </li>
                        <li>
                            <a href>Settings</a>
                        </li>
                        <li>
                            <a href="page_profile.html">Profile</a>
                        </li>
                        <li>
                            <a href>
                                <span class="badge bg-danger pull-right">3</span>
                                Notifications
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?=anchorurl('login/logout')?>">退出</a>
                        </li>
                    </ul>
                    <!-- / dropdown -->
                </div>
                <!--<div class="line dk hidden-folded"></div>-->
            </div>
            <!-- / user -->

            <!-- nav -->
            <nav ui-nav class="navi clearfix">
                <ul class="nav">
                    <?php if(in_array("/home/",$permission_urls)):?>
                    <li class="mask"></li>
                    <li style="text-align: center">
                        <a href="<?=site_url('home/index')?>">
                           <?php if($controller == "home"):?>
                              <img src="<?=base_url()?>media/administrator/images/develop/manage_class_native_03.png" >
                            <?php else:?>
                               <img src="<?=base_url()?>media/administrator/images/develop/manage_class_03" >
                            <?php endif;?>
                            <p class="aside <?php if($controller == "home") echo 'active';?>" > 学习数据 </p>
                        </a>
                    </li>
                    <?php endif;?>
                    <?php if(in_array("/regions/",$permission_urls)):?>
                    <li class="mask"></li>
                    <li style="text-align: center">
                        <a href="<?=site_url('regions')?>">
                            <?php if($controller == "regions"):?>
                                <img src="<?=base_url()?>media/administrator/images/develop/region_native.png" >
                            <?php else:?>
                                <img src="<?=base_url()?>media/administrator/images/develop/region.png">
                            <?php endif;?>
                            <p class="aside <?php if($controller == "regions") echo 'active';?>"> 区域管理 </p>
                        </a>
                    </li>
                    <?php endif;?>
                    <?php if(in_array("/AccountManage/",$permission_urls)):?>
                    <li class="mask"></li>
                    <li style="text-align: center">
                        <a href="<?=site_url('AccountManage')?>">
                            <?php if($controller == "AccountManage"):?>
                                <img src="<?=base_url()?>media/administrator/images/develop/account-img-active.png" >
                            <?php else:?>
                                <img src="<?=base_url()?>media/administrator/images/develop/account-img.png">
                            <?php endif;?>
                            <p class="aside <?php if($controller == "AccountManage") echo 'active';?>"> 账号管理 </p>
                        </a>
                    </li>
                    <?php endif;?>
                    <?php if(in_array("/role/",$permission_urls)):?>
                    <li class="mask"></li>
                    <li style="text-align: center">
                        <a href="<?=site_url('role')?>">
                            <?php if($controller == "role"):?>
                                <img src="<?=base_url()?>media/administrator/images/develop/manage_class_11.png" >
                            <?php else:?>
                                <img src="<?=base_url()?>media/administrator/images/develop/manage_class_native_11.png">
                            <?php endif;?>
                            <p class="aside <?php if($controller == "role") echo 'active';?>"> 角色管理 </p>
                        </a>
                    </li>
                    <?php endif;?>
                    <?php if(in_array("/platform_account/",$permission_urls)):?>
                    <li class="mask"></li>
                    <li style="text-align: center">
                        <a href="<?=site_url('platform_account')?>">
                            <?php if($controller == "platform_account"):?>
                                <img src="<?=base_url()?>media/administrator/images/develop/platform_account_native.png" >
                            <?php else:?>
                                <img src="<?=base_url()?>media/administrator/images/develop/platform_account.png">
                            <?php endif;?>
                            <p class="aside <?php if($controller == "platform_account") echo 'active';?>"> 平台账户 </p>
                        </a>
                    </li>
                    <?php endif;?>
<!--                    <li class="mask"></li>-->
<!--                    <li style="text-align: center">-->
<!--                        <a href="javascript:;">-->
<!---->
<!--                            <img src="--><?//=base_url()?><!--media/administrator/images/develop/manage_class_14.png">-->
<!--                            <p class="aside"> 社区管理 </p>-->
<!--                        </a>-->
<!--                    </li>-->
                    <?php if(in_array("/courses/",$permission_urls)):?>
                    <li class="mask"></li>
                    <li style="text-align: center">
                        <a href="<?=site_url('courses/')?>">
                            <?php if($controller == "courses" || $controller == "parts"):?>
                                <img src="<?=base_url()?>media/administrator/images/develop/course_native.png" >
                            <?php else:?>
                                <img src="<?=base_url()?>media/administrator/images/develop/course.png">
                            <?php endif;?>
                            <p class="aside <?php if($controller == "courses") echo 'active';?>"> 课程管理 </p>
                        </a>
                    </li>
                    <?php endif;?>
                    <?php if(in_array("/exam/",$permission_urls)):?>
                    <li class="mask"></li>
                    <li style="text-align: center">
                        <a href="<?=site_url('exam')?>">
                            <?php if($controller == "exam"):?>
                                <img src="<?=base_url()?>media/administrator/images/develop/question_native.png" >
                            <?php else:?>
                                <img src="<?=base_url()?>media/administrator/images/develop/question.png">
                            <?php endif;?>
                            <p class="aside <?php if($controller == "exam") echo 'active';?>"> 考题 </p>
                        </a>
                    </li>
                    <?php endif;?>
                    <?php if(in_array("/exampaper/",$permission_urls)):?>
                    <li class="mask"></li>
                    <li style="text-align: center">
                        <a href="<?=site_url('exampaper')?>">
                            <?php if($controller == "exampaper"):?>
                                <img src="<?=base_url()?>media/administrator/images/develop/paper_native.png" >
                            <?php else:?>
                                <img src="<?=base_url()?>media/administrator/images/develop/paper.png">
                            <?php endif;?>
                            <p class="aside <?php if($controller == "exampaper") echo 'active';?>"> 考卷 </p>
                        </a>
                    </li>
                    <?php endif;?>
                    <li class="mask"></li>
                </ul>
            </nav>
            <!-- nav -->
        </div>
    </div>
</aside>