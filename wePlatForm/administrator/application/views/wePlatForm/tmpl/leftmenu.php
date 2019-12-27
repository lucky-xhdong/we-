<?php
$action = $this->uri->segment(1);
$action2 = $this->uri->segment(2);
$permissions = getAdminViewer()->getUserRolePermission();
$permission_urls = array();
foreach($permissions as $permission){
    $permission_urls[] = $permission->url;
}

?>
<div class="col-md-3">
    <div class="common-left-menu">
        <div class="logo-wrapper">
            <i class="icon-logo"></i>
            <span class="txt-logo">唯佳教育平台</span>
        </div>
        <ul class="nav flex-column">
            <?php if(in_array("/materialResources/",$permission_urls)):?>
            <li class="nav-item <?php if ($action == "materialResources") echo 'active' ?>">
                <div class="nav-item__main">
                    <i class="icon-menu-left icon-teaching-resource"></i>
                    <a class="nav-link" href="<?=anchorurl("materialResources")?>">素材库</a>
                    <i class="icon-menu-right icon-expand"></i>
                </div>
            </li>
            <?php endif;?>
            <?php if(in_array("/feature/",$permission_urls)):?>
            <li class="nav-item <?php if ($action == "feature") echo 'active' ?>">
                <div class="nav-item__main">
                    <i class="icon-menu-left icon-feature-manager"></i>
                    <a class="nav-link" href="<?=anchorurl("feature")?>">特征管理</a>
                    <i class="icon-menu-right icon-expand"></i>
                </div>
            </li>
            <?php endif;?>
            <?php if(in_array("/regions/",$permission_urls)):?>
            <li class="nav-item <?php if ($action == "regions") echo 'active' ?>">
                <div class="nav-item__main">
                    <i class="icon-menu-left icon-regional-archive"></i>
                    <a class="nav-link active" href="<?=anchorurl("regions")?>">区域档案</a>
                    <i class="icon-menu-right icon-expand"></i>
                </div>
<!--                <ul class="nav-item__sub hide">-->
<!--                    <li class="nav-item__sub_item"><a href="javascript:;" class="nav-link__sub">选项1</a></li>-->
<!--                    <li class="nav-item__sub_item"><a href="javascript:;" class="nav-link__sub">选项2</a></li>-->
<!--                </ul>-->
            </li>
            <?php endif;?>
<!--            <li class="nav-item --><?php //if ($action == "class_timetable") echo 'active' ?><!--">-->
<!--                <div class="nav-item__main">-->
<!--                    <i class="icon-menu-left icon-regional-archive"></i>-->
<!--                    <a class="nav-link" href="--><?//=anchorurl("class_timetable")?><!--">督课表</a>-->
<!--                    <i class="icon-menu-right icon-expand"></i>-->
<!--                </div>-->
<!--            </li>-->
            <?php if(in_array("/schools/",$permission_urls)):?>
            <li class="nav-item <?php if ($action == "schools") echo 'active' ?>">
                <div class="nav-item__main">
                    <i class="icon-menu-left icon-school-manage"></i>
                    <a class="nav-link" href="<?=anchorurl("schools")?>">学校管理</a>
                    <i class="icon-menu-right icon-expand"></i>
                </div>
<!--                <ul class="nav-item__sub hide">-->
<!--                    <li class="nav-item__sub_item"><a href="--><?//=anchorurl("schools")?><!--" class="nav-link__sub">学校</a></li>-->
<!--                    <li class="nav-item__sub_item"><a href="--><?//=anchorurl("teachers")?><!--" class="nav-link__sub">老师</a></li>-->
<!--                    <li class="nav-item__sub_item"><a href="--><?//=anchorurl("students")?><!--" class="nav-link__sub">学生</a></li>-->
<!--                </ul>-->

            </li>
            <?php endif;?>
            <?php if(in_array("/contents/",$permission_urls)):?>
            <li class="nav-item <?php if ($action == "contents") echo 'active' ?>">
                <div class="nav-item__main">
                    <i class="icon-menu-left icon-content-manage"></i>
                    <a class="nav-link" href="<?=anchorurl("contents")?>">内容管理</a>
                    <i class="icon-menu-right icon-expand"></i>
                </div>
                <ul class="nav-item__sub <?php if($action != "contents") echo 'hide';?>">
                    <li class="nav-item__sub_item <?php if (!$action2) echo 'active' ?>"><a href="<?=anchorurl("contents")?>" class="nav-link__sub">文章管理</a></li>
                <?php if(in_array("/contents/about_us/",$permission_urls)):?>
                    <li class="nav-item__sub_item <?php if ($action2 == "about_us") echo 'active' ?>"><a href="<?=anchorurl("contents/about_us")?>" class="nav-link__sub">关于我们</a></li>
                <?php endif;?>
                    <?php if(in_array("/contents/contact_us/",$permission_urls)):?>
                    <li class="nav-item__sub_item <?php if ($action2 == "contact_us") echo 'active' ?>"><a href="<?=anchorurl("contents/contact_us")?>" class="nav-link__sub">联系我们</a></li>
                    <?php endif;?>
                    <?php if(in_array("/contents/privacy_policy/",$permission_urls)):?>
                    <li class="nav-item__sub_item <?php if ($action2 == "privacy_policy") echo 'active' ?>"><a href="<?=anchorurl("contents/privacy_policy")?>" class="nav-link__sub">隐私政策</a></li>
                    <?php endif;?>
                </ul>
            </li>
            <?php endif;?>
<!--            <li class="nav-item --><?php //if ($action == "teaching_program") echo 'active' ?><!--">-->
<!--                <div class="nav-item__main">-->
<!--                    <i class="icon-menu-left icon-teaching-resource"></i>-->
<!--                    <a class="nav-link" href="--><?//=anchorurl("teaching_program")?><!--">教学资源</a>-->
<!--                    <i class="icon-menu-right icon-expand"></i>-->
<!--                </div>-->
<!--            </li>-->
            <?php if(in_array("/teachingschedules/",$permission_urls)):?>
            <li class="nav-item <?php if ($action == "teachingschedules" || $action == "teachingscheduletasks") echo 'active' ?>">
                <div class="nav-item__main">
                    <i class="icon-menu-left icon-progress-manage"></i>
                    <a class="nav-link" href="<?=anchorurl("teachingschedules")?>">教学进度管理</a>
                    <i class="icon-menu-right icon-expand"></i>
                </div>
            </li>
            <?php endif;?>
            <?php if(in_array("/teaching_progress/",$permission_urls)):?>
            <li class="nav-item <?php if ($action == "teaching_progress") echo 'active' ?>">
                <div class="nav-item__main">
                    <i class="icon-menu-left icon-progress-manage"></i>
                    <a class="nav-link" href="<?=anchorurl("teaching_progress")?>">教学进度</a>
                    <i class="icon-menu-right icon-expand"></i>
                </div>
            </li>
            <?php endif;?>
            <?php if(in_array("/myserviceaudit/",$permission_urls) || in_array("/myserviceaudit/operate/",$permission_urls) || in_array("/myserviceaudit/education/",$permission_urls) || in_array("/myserviceaudit/business/",$permission_urls)):?>
                <li class="nav-item <?php if ($action == "myserviceaudit") echo 'active' ?>">
                    <div class="nav-item__main">
                        <i class="icon-menu-left icon-plan-audit"></i>
                        <a class="nav-link" href="<?=anchorurl("myserviceaudit")?>">我提交的计划审核</a>
                        <i class="icon-menu-right icon-expand"></i>
                    </div>
                    <ul class="nav-item__sub <?php if($action != "myserviceaudit") echo 'hide';?>">
                        <?php if(in_array("/myserviceaudit/business/",$permission_urls)):?>
                            <li class="nav-item__sub_item <?php if ($action2 == "business") echo 'active' ?>"><a href="<?=anchorurl("myserviceaudit/business")?>"  class="nav-link__sub">商务计划</a></li>
                        <?php endif;?>
                        <?php if(in_array("/myserviceaudit/operate/",$permission_urls)):?>
                            <li class="nav-item__sub_item <?php if ($action2 == "operate") echo 'active' ?>"><a href="<?=anchorurl("myserviceaudit/operate")?>"   class="nav-link__sub">运营计划</a></li>
                        <?php endif;?>
                        <?php if(in_array("/myserviceaudit/education/",$permission_urls)):?>
                            <li class="nav-item__sub_item <?php if ($action2 == "education") echo 'active' ?>"><a href="<?=anchorurl("myserviceaudit/education")?>" class="nav-link__sub">教学计划</a></li>
                        <?php endif;?>
                    </ul>
                </li>
            <?php endif;?>

            <?php if(in_array("/serviceaudit/",$permission_urls)):?>
            <li class="nav-item <?php if ($action == "serviceaudit") echo 'active' ?>">
                <div class="nav-item__main">
                    <i class="icon-menu-left icon-plan-audit"></i>
                    <a class="nav-link" href="<?=anchorurl("serviceaudit")?>">计划审核</a>
                    <i class="icon-menu-right icon-expand"></i>
                </div>
                <ul class="nav-item__sub <?php if($action != "serviceaudit") echo 'hide';?>">
                     <?php if(in_array("/serviceaudit/business/",$permission_urls)):?>
                    <li class="nav-item__sub_item <?php if ($action2 == "business") echo 'active' ?>"><a href="<?=anchorurl("serviceaudit/business")?>"  class="nav-link__sub">商务计划</a></li>
                    <?php endif;?>
                    <?php if(in_array("/serviceaudit/operate/",$permission_urls)):?>
                    <li class="nav-item__sub_item <?php if ($action2 == "operate") echo 'active' ?>"><a href="<?=anchorurl("serviceaudit/operate")?>"   class="nav-link__sub">运营计划</a></li>
                    <?php endif;?>
                    <?php if(in_array("/serviceaudit/education/",$permission_urls)):?>
                    <li class="nav-item__sub_item <?php if ($action2 == "education") echo 'active' ?>"><a href="<?=anchorurl("serviceaudit/education")?>" class="nav-link__sub">教学计划</a></li>
                    <?php endif;?>
                </ul>
            </li>
            <?php endif;?>
            <?php if(in_array("/service_plan/",$permission_urls)):?>
            <li class="nav-item <?php if ($action == "service_plan") echo 'active' ?>">
                <div class="nav-item__main">
                    <i class="icon-menu-left icon-plan-audit"></i>
                    <a class="nav-link" href="<?=anchorurl("service_plan")?>">服务计划</a>
                    <i class="icon-menu-right icon-expand"></i>
                </div>
                <ul class="nav-item__sub <?php if($action != "service_plan") echo 'hide';?>">
                    <li class="nav-item__sub_item <?php if ($action2 == "calendar") echo 'active' ?>"><a href="<?=anchorurl("service_plan/service_calendar")?>" class="nav-link__sub">服务日历</a></li>
                </ul>
            </li>
            <?php endif;?>
            <?php if(in_array("/data_analysis/",$permission_urls)):?>
            <li class="nav-item <?php if ($action == "data_analysis") echo 'active' ?>">
                <div class="nav-item__main">
                    <i class="icon-menu-left icon-data-statistic"></i>
                    <a class="nav-link" href="<?=anchorurl("data_analysis")?>">数据统计</a>
                    <i class="icon-menu-right icon-expand"></i>
                </div>
                <ul class="nav-item__sub <?php if($action != "data_analysis") echo 'hide';?>">
                    <li class="nav-item__sub_item <?php if ($action2 == "plan") echo 'active' ?>"><a href="<?=anchorurl("data_analysis/plan")?>" class="nav-link__sub">计划审核统计</a></li>
<!--                    <li class="nav-item__sub_item"><a href="--><?//=anchorurl("data_analysis/planPublish")?><!--" class="nav-link__sub">计划发布统计</a></li>-->
                    <li class="nav-item__sub_item <?php if ($action2 == "account") echo 'active' ?>"><a href="<?=anchorurl("data_analysis/account")?>" class="nav-link__sub">账号使用统计</a></li>
                </ul>
            </li>
            <?php endif;?>
            <?php if(in_array("/analysis/",$permission_urls)):?>
            <li class="nav-item <?php if ($action == "analysis") echo 'active' ?>">
                <div class="nav-item__main">
                    <i class="icon-menu-left icon-chart-bar"></i>
                    <a class="nav-link" href="<?=anchorurl("analysis")?>">数据分析</a>
                    <i class="icon-menu-right icon-expand"></i>
                </div>
                <ul class="nav-item__sub <?php if($action != "analysis") echo 'hide';?>">
                    <li class="nav-item__sub_item <?php if (!$action2 || $action2 == "index") echo 'active' ?>"><a href="<?=anchorurl("analysis")?>" class="nav-link__sub">学情分析</a></li>
                    <li class="nav-item__sub_item <?php if ($action2 == "dataCompare") echo 'active' ?>"><a href="<?=anchorurl("analysis/dataCompare")?>" class="nav-link__sub">数据对比</a></li>
                    <li class="nav-item__sub_item <?php if ($action2 == "trendCompare") echo 'active' ?>"><a href="<?=anchorurl("analysis/trendCompare")?>" class="nav-link__sub">趋势对比</a></li>
                    <li class="nav-item__sub_item <?php if ($action2 == "early_warning") echo 'active' ?>"><a href="<?=anchorurl("analysis/early_warning")?>" class="nav-link__sub">示范与预警</a></li>
                    <li class="nav-item__sub_item <?php if ($action2 == "getClasssStudyDataList") echo 'active' ?>"><a href="<?=anchorurl("analysis/getClasssStudyDataList")?>" class="nav-link__sub">学习数据详情</a></li>
                </ul>
            </li>
            <?php endif;?>
            <?php if(in_array("/results_show/",$permission_urls)):?>
            <li class="nav-item <?php if ($action == "results_show") echo 'active' ?>">
                <div class="nav-item__main">
                    <i class="icon-menu-left icon-report-import"></i>
                    <a class="nav-link" href="<?=anchorurl("results_show")?>">成果展示</a>
                    <i class="icon-menu-right icon-expand"></i>
                </div>
            </li>
            <?php endif;?>
            <?php if(in_array("/supervisecourselist/",$permission_urls)):?>
            <li class="nav-item <?php if ($action == "supervisecourselist") echo 'active' ?>">
                <div class="nav-item__main">
                    <i class="icon-menu-left icon-report-import"></i>
                    <a class="nav-link" href="<?=anchorurl("supervisecourselist")?>">督课表</a>
                    <i class="icon-menu-right icon-expand"></i>
                </div>
            </li>
            <?php endif;?>
        </ul>
    </div>
</div>