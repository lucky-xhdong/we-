<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php $this->load->view('wePlatForm/tmpl/title'); ?>
    <?php $this->load->view('wePlatForm/tmpl/jsBasicLibirary'); ?>
    <?php $this->load->view('wePlatForm/meta'); ?>
    <?php $this->load->view('tmpl/mmgrid');?>
    <?php $this->load->view('tmpl/fileupload');?>
</head>
<body>
<div class="container-fluid Welcome">
    <div class="row">
        <!-- 左侧菜单 start -->
        <?=$this->load->view("wePlatForm/tmpl/leftmenu")?>
        <!-- 左侧菜单 end -->
        <div class="col-md-9 w--main-wrapper">
            <!--菜单切换 start-->
            <?=$this->load->view("wePlatForm/tmpl/headernav")?>
            <!--菜单切换 end-->
            <!--主体内容 start-->
            <div class="w--main__content">
                <hgroup class="title-group">
                    <h2><?=getAdminViewer()->name?>，您好！</h2>
                </hgroup>
                <article class="sketch-group">
                    <p class="p1">上次登录时间：<?=date("Y年n月d日",strtotime(getAdminViewer()->lastvisitDate))?></p>
                    <figure class="img-lists">
                        <?php if($role->type == "444444"):?>
                        <ul class="class-6">
                            <li data-after="教学资源数目">
                                <a href="javascript:;">
                                    <img src="<?=base_url()?>media/wePlatForm/images/teache1.jpg" alt="">
                                </a>
                                <p class="txt">
                                    <span><?=$teachResource?></span>
                                </p>
                            </li>
                            <li data-after="督课表数">
                                <a href="javascript:;">
                                    <img src="<?=base_url()?>media/wePlatForm/images/teache2.jpg" alt="">
                                </a>
                                <p class="txt">
                                    <span><?=$supervise?></span>
                                </p>
                            </li>
                            <li data-after="教学任务数">
                                <a href="javascript:;">
                                    <img src="<?=base_url()?>media/wePlatForm/images/teache3.jpg" alt="">
                                </a>
                                <p class="txt">
                                    <span><?=$teaching_schedule_task?></span>
                                </p>
                            </li>
                            <li data-after="平均分">
                                <a href="javascript:;">
                                    <img src="<?=base_url()?>media/wePlatForm/images/teache4.jpg" alt="">
                                </a>
                                <p class="txt">
                                    <span><?=$score_avg?></span>
                                </p>
                            </li>
                            <li data-after="优秀率">
                                <a href="javascript:;">
                                    <img src="<?=base_url()?>media/wePlatForm/images/teache5.jpg" alt="">
                                </a>
                                <p class="txt">
                                    <span><?=$Outstanding?>%</span>
                                </p>
                            </li>
                            <li data-after="学习计划达标率">
                                <a href="javascript:;">
                                    <img src="<?=base_url()?>media/wePlatForm/images/teache6.jpg" alt="">
                                </a>
                                <p class="txt">
                                    <span><?=$standard_reaching?>%</span>
                                </p>
                            </li>
                        </ul>
                        <?php elseif($role->type == "666666"):?>
                                <ul  class="class-8">
                                    <li data-after="使用学生人数">
                                        <a href="javascript:;">
                                            <img src="<?=base_url()?>media/wePlatForm/images/principal1.jpg" alt="">
                                        </a>
                                        <p class="txt">
                                            <span><?=$student?></span>
                                        </p>
                                    </li>
                                    <li data-after="老师使用数">
                                        <a href="javascript:;">
                                            <img src="<?=base_url()?>media/wePlatForm/images/principal2.jpg" alt="">
                                        </a>
                                        <p class="txt">
                                            <span><?=$teachers?></span>
                                        </p>
                                    </li>
                                    <li data-after="教学资源数">
                                        <a href="javascript:;">
                                            <img src="<?=base_url()?>media/wePlatForm/images/principal3.jpg" alt="">
                                        </a>
                                        <p class="txt">
                                            <span><?=$teachResource?></span>
                                        </p>
                                    </li>
                                    <li data-after="教学成果">
                                        <a href="javascript:;">
                                            <img src="<?=base_url()?>media/wePlatForm/images/principal4.jpg" alt="">
                                        </a>
                                        <p class="txt">
                                            <span><?=$teachResource?></span>
                                        </p>
                                    </li>
                                    <li data-after="总时长">
                                        <a href="javascript:;">
                                            <img src="<?=base_url()?>media/wePlatForm/images/principal5.jpg" alt="">
                                        </a>
                                        <p class="txt">
                                            <span><?=$totalTime?></span>
                                        </p>
                                    </li>
                                    <li data-after="优秀率">
                                        <a href="javascript:;">
                                            <img src="<?=base_url()?>media/wePlatForm/images/principal6.jpg" alt="">
                                        </a>
                                        <p class="txt">
                                            <span><?=$Outstanding?>%</span>
                                        </p>
                                    </li>
                                    <li data-after="达标率">
                                        <a href="javascript:;">
                                            <img src="<?=base_url()?>media/wePlatForm/images/principal7.jpg" alt="">
                                        </a>
                                        <p class="txt">
                                            <span><?=$standard_reaching?>%</span>
                                        </p>
                                    </li>
                                    <li data-after="平均分">
                                        <a href="javascript:;">
                                            <img src="<?=base_url()?>media/wePlatForm/images/principal8.jpg" alt="">
                                        </a>
                                        <p class="txt">
                                            <span><?=$score_avg?></span>
                                        </p>
                                    </li>
                                </ul>
                            <?php elseif($role->type == "777777" ||  $role->type == 555555):?>
                            <ul  class="class-8">
                                <li data-after="入校人数">
                                    <a href="javascript:;">
                                        <img src="<?=base_url()?>media/wePlatForm/images/instructor1.jpg" alt="">
                                    </a>
                                    <p class="txt">
                                        <span><?=$student+$teachers?></span>
                                    </p>
                                </li>
                                <li data-after="教师人数">
                                    <a href="javascript:;">
                                        <img src="<?=base_url()?>media/wePlatForm/images/instructor2.jpg" alt="">
                                    </a>
                                    <p class="txt">
                                        <span><?=$teachers?></span>
                                    </p>
                                </li>
                                <li data-after="使用学生数">
                                    <a href="javascript:;">
                                        <img src="<?=base_url()?>media/wePlatForm/images/instructor3.jpg" alt="">
                                    </a>
                                    <p class="txt">
                                        <span><?=$student?></span>
                                    </p>
                                </li>
                                <li data-after="使用天数">
                                    <a href="javascript:;">
                                        <img src="<?=base_url()?>media/wePlatForm/images/instructor4.jpg" alt="">
                                    </a>
                                    <p class="txt">
                                        <span><?=$studyDay?></span>
                                    </p>
                                </li>
                                <li data-after="服务计划数">
                                    <a href="javascript:;">
                                        <img src="<?=base_url()?>media/wePlatForm/images/instructor5.jpg" alt="">
                                    </a>
                                    <p class="txt">
                                        <span><?=$plan_count?></span>
                                    </p>
                                </li>
                                <li data-after="教学资源数">
                                    <a href="javascript:;">
                                        <img src="<?=base_url()?>media/wePlatForm/images/instructor6.jpg" alt="">
                                    </a>
                                    <p class="txt">
                                        <span><?=$teachResource?></span>
                                    </p>
                                </li>
                                <li data-after="教学任务数">
                                    <a href="javascript:;">
                                        <img src="<?=base_url()?>media/wePlatForm/images/instructor7.jpg" alt="">
                                    </a>
                                    <p class="txt">
                                        <span><?=$teaching_schedule_task?></span>
                                    </p>
                                </li>
                                <li data-after="教学成果数">
                                    <a href="javascript:;">
                                        <img src="<?=base_url()?>media/wePlatForm/images/instructor8.jpg" alt="">
                                    </a>
                                    <p class="txt">
                                        <span><?=$teachResource?></span>
                                    </p>
                                </li>
                            </ul>
                        <?php endif;?>
                    </figure>
                </article>
            </div>
            <!--主体内容 end-->
        </div>
    </div>
</body>
</html>
