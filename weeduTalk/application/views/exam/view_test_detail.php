<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="UTF-8">
    <title>考试详情 班级</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/exam/css/common.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>media/exam/css/testSystem.css">
</head>
<body>
<div class="wrapper">
    <script>var s = 'a';</script>
    <?php $s = 'A' ?>
    <?php foreach ($list as $mePaper): ?>
        <h1 class="part-tit"><?=$mePaper->title?></h1>
        <?php if($mePaper->type != 3&&$mePaper->type != 6) { ?>
            <h2 class="part-section" data-section="section <?=$s?>"></h2>
        <?php }?>

        <?php $s = chr(ord($s)+1);?>
        <?php if($mePaper->type == 1) { ?>
            <!-- 阅读理解 -->
            <?php $num = 1; ?>
            <?php foreach ($mePaper->modelQues as $modelQues): ?>
                <div class="part-item">
<!--                    <h2 class="part-section" data-section="section --><?//=$s?><!--"></h2>-->
                    <div class="part-item-con">
                        <div class="part-directions" data-dir="directions">
                            <?=$modelQues->ques_content[0]->content?>
                        </div>
                        <?php foreach ($modelQues->ques_content[0]->ques_ques as $ques_ques): ?>
                        <div class="choose-num-box data-arr">
                            <h6 class="questions-num"><?=$ques_ques->title?> </h6>
                            <div class="choose-num-item" data-arr="<?=$num?>">
                                <?php $num=$num+1;; ?>
                                <!-- <span class="choose-question-num">1</span> -->
                                <ul>
                            <?php foreach ($ques_ques->ques_ques_item as $ques_ques_item): ?>
                                    <li>
                                        <?php if($ques_ques_item->choice_state==1){?>
<!--                                        用户正确选择-->
                                            <?php if($ques_ques_item->state==1){?>
                                                <span class="choose-right"><?=$ques_ques_item->title?></span></li>
                                            <?php }else{?>
                                                <span class="choose-error"><?=$ques_ques_item->title?></span></li>
                                            <?php }?>
                                        <?php }else if($ques_ques_item->choice_state==0){?>
                                            <?php if($ques_ques_item->state == 1){?>
                                                <span class="choose-right-tag"><?=$ques_ques_item->title?></span></li>
                                            <?php }else{?>
                                                <span><?=$ques_ques_item->title?></span></li>
                                            <?php }?>
                                        <?php }?>
                                    <li>
                            <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
                <!-- 段落匹配 -->
            <?php }else if($mePaper->type == 2){ ?>
            <?php $ss = 'A' ?>
            <?php foreach ($mePaper->modelQues as $modelQues): ?>
                <div class="part-item">
<!--                    <h2 class="part-section" data-section="section B"></h2>-->
                    <div class="part-item-con">
                        <div class="part-directions" data-dir="directions">
                            <?=$modelQues->ques_content[0]->content?>
                        </div>
                        <div>
                            <div class="reading-com-box bg-f1f7 pag-20 mgb-30">
                                <ul class="reading-con-article data-arr">
                                <?php foreach (explode('===',$modelQues->ques_content[0]->ques_ques[0]->title) as $ques_ques): ?>
                                    <li data-arr="[<?=$ss?>]">
                                        <?php $ss = chr(ord($ss)+1);?>
                                        <?=$ques_ques?>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                            <ul class="reading-con-list data-arr mgb-30">
                            <?php foreach ($modelQues->ques_content[0]->ques_ques[0]->ques_ques_item as $ques_ques_item): ?>
                                <li data-arr="<?=$ques_ques_item->id?>">
                                    <?=$ques_ques_item->title?>
                                <?php if($ques_ques_item->choice_state==1){?>
                                        <span class="choose-right"><?=$ques_ques_item->choice_con?></span>
                                <?php }else if($ques_ques_item->choice_state==0){?>
                                        <span class="choose-right-tag"><?=$ques_ques_item->state?></span>
                                        <span class="choose-error"><?=$ques_ques_item->choice_con?></span>
                                <?php }?>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
                <!-- 翻译 -->
            <?php }else if($mePaper->type == 3){  ?>
            <?php foreach ($mePaper->modelQues as $modelQues): ?>
                <div class="part-item">
                    <div class="part-item-con">
                        <div class="part-directions" data-dir="directions">
                            <?=$modelQues->ques_content[0]->ques_ques[0]->title?>
                        </div>
                        <div class="write-box mgb-30">
                            <p>
                                <?=$modelQues->ques_answer?>
                            </p>
                        </div>
                        <h6 class="get-score">评语:<?=$modelQues->teacher_volume?></h6>
<!--                        <div class="write-assess" data-arr="评语：">-->
<!--                            --><?//=$modelQues->teacher_volume?>
<!--                        </div>-->
                    </div>
                </div>
            <?php endforeach; ?>
                <!-- 听录音听问题 -->
            <?php }else if($mePaper->type == 4){  ?>
            <?php foreach ($mePaper->modelQues as $modelQues): ?>
                <?php $num=1; ?>
                <div class="part-item">
<!--                    <h2 class="part-section" data-section="section A"></h2>-->
                    <div class="part-item-con">
                        <div class="part-directions" data-dir="directions">
                            <?=$modelQues->ques_content[0]->content?>
                        </div>
                        <?php foreach ($modelQues->ques_content[0]->ques_ques as $ques_ques): ?>
                            <div class="choose-num-box data-arr">
                                <h6 class="questions-num"><?=$ques_ques->title?> </h6>
                                <div class="choose-num-item" data-arr="<?=$num?>">
                                    <?php $num=$num+1; ?>
                                    <!-- <span class="choose-question-num">1</span> -->
                                    <ul>
                                        <?php foreach ($ques_ques->ques_ques_item as $ques_ques_item): ?>
                                        <li>
                                            <?php if($ques_ques_item->choice_state==1){?>
                                            <!--                                        用户正确选择-->
                                            <?php if($ques_ques_item->state==1){?>
                                            <span class="choose-right"><?=$ques_ques_item->title?></span></li>
                                            <?php }else{?>
                                                <span class="choose-error"><?=$ques_ques_item->title?></span></li>
                                            <?php }?>
                                            <?php }else if($ques_ques_item->choice_state==0){?>
                                                <?php if($ques_ques_item->state == 1){?>
                                                    <span class="choose-right-tag"><?=$ques_ques_item->title?></span></li>
                                                <?php }else{?>
                                                    <span><?=$ques_ques_item->title?></span></li>
                                                <?php }?>
                                            <?php }?>
                                        <li>
                                            <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
                <!-- 听录音看问题 -->
            <?php }else if($mePaper->type == 5){  ?>
            <?php $num=1; ?>
            <?php foreach ($mePaper->modelQues as $modelQues): ?>
                <div class="part-item">
                    <div class="part-item-con">
                        <div class="part-directions" data-dir="directions">
                            <?=$modelQues->ques_content[0]->content?>
                        </div>
                        <?php foreach ($modelQues->ques_content[0]->ques_ques as $ques_ques): ?>
                            <div class="choose-num-box data-arr">
                                <h6 class="questions-num"><?=$ques_ques->title?> </h6>
                                <div class="choose-num-item" data-arr="<?=$num?>">
                                    <?php $num++ ?>
                                    <!-- <span class="choose-question-num">1</span> -->
                                    <ul>
                                        <?php foreach ($ques_ques->ques_ques_item as $ques_ques_item): ?>
                                        <li>
                                            <?php if($ques_ques_item->choice_state==1){?>
                                            <!-- 用户正确选择-->
                                            <?php if($ques_ques_item->state==1){?>
                                            <span class="choose-right"><?=$ques_ques_item->title?></span></li>
                                            <?php }else{?>
                                                <span class="choose-error"><?=$ques_ques_item->title?></span></li>
                                            <?php }?>
                                            <?php }else if($ques_ques_item->choice_state==0){?>
                                                <?php if($ques_ques_item->state == 1){?>
                                                    <span class="choose-right-tag"><?=$ques_ques_item->title?></span></li>
                                                <?php }else{?>
                                                    <span><?=$ques_ques_item->title?></span></li>
                                                <?php }?>
                                            <?php }?>
                                                <li>
                                            <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
                <!-- 写作 -->
            <?php }else if($mePaper->type == 6){  ?>
            <?php foreach ($mePaper->modelQues as $modelQues): ?>
                <div class="part-item">
                    <div class="part-item-con">
                        <div class="part-directions" data-dir="directions">
                            <?=$modelQues->ques_content[0]->content?>
                        </div>
                        <div class="banked-cloze-con">
                                <?=$modelQues->ques_answer?>
                        </div>
                        <h6 class="get-score">评语:<?=$modelQues->teacher_volume?></h6>
                    </div>
                </div>
            <?php endforeach; ?>
                <!-- 选词填空 -->
            <?php }else if($mePaper->type == 7){  ?>
            <?php foreach ($mePaper->serction as $serction): ?>
            <?php if($serction->type==7){?>
                <?php foreach ($mePaper->modelQues as $modelQues): ?>
                        <?php if ($serction->id == $modelQues->section_id) {?>
                        <div class="part-item">
        <!--                    <h2 class="part-section" data-section="section A"></h2>-->
                            <div class="part-item-con">
                                <div class="part-directions" data-dir="directions">
                                    <?=$modelQues->ques_content[0]->content?>
                                </div>
                                <div class="banked-cloze-box">
                                    <div class="banked-cloze-con">
                                        <?php foreach (explode("<\/span><\/i><\/div>",$modelQues->ques_content[0]->ques_ques[0]->title) as $ques_ques_content): ?>
                                                <?=$ques_ques_content?>
                                        <?php endforeach; ?>
                                    </div>
                                    <ul class="banked-cloze-list clear">
                                    <?php foreach ($modelQues->ques_content[0]->ques_ques[0]->ques_ques_item as $ques_ques): ?>
                                        <?php if($ques_ques->state != 0){?>
                                            <?php if($ques_ques->choice_state==1){ ?>
                                                <li style="background: #4bda77"><?=$ques_ques->title?></li>
                                            <?php }else{?>
                                                <li style="background: #4bda77"><?=$ques_ques->title?></li>
                                            <?php }?>
                                        <?php }else{?>
                                        <li><?=$ques_ques->title?></li>
                                        <?php } ?>
                                   <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    <?php endforeach; ?>
                <?php }else if($serction->type==1){?>
                    <?php $num = 1; ?>
                    <?php foreach ($mePaper->modelQues as $modelQues): ?>
                        <?php if ($serction->id == $modelQues->section_id) {?>
                        <div class="part-item">
                            <!--                    <h2 class="part-section" data-section="section --><?//=$s?><!--"></h2>-->
                            <div class="part-item-con">
                                <div class="part-directions" data-dir="directions">
                                    <?=$modelQues->ques_content[0]->content?>
                                </div>
                                <?php foreach ($modelQues->ques_content[0]->ques_ques as $ques_ques): ?>
                                    <div class="choose-num-box data-arr">
                                        <h6 class="questions-num"><?=$ques_ques->title?> </h6>
                                        <div class="choose-num-item" data-arr="<?=$num?>">
                                            <?php $num=$num+1;; ?>
                                            <!-- <span class="choose-question-num">1</span> -->
                                            <ul>
                                                <?php foreach ($ques_ques->ques_ques_item as $ques_ques_item): ?>
                                                <li>
                                                    <?php if($ques_ques_item->choice_state==1){?>
                                                    <!--                                        用户正确选择-->
                                                    <?php if($ques_ques_item->state==1){?>
                                                    <span class="choose-right"><?=$ques_ques_item->title?></span></li>
                                            <?php }else{?>
                                                <span class="choose-error"><?=$ques_ques_item->title?></span></li>
                                            <?php }?>
                                            <?php }else if($ques_ques_item->choice_state==0){?>
                                                <?php if($ques_ques_item->state == 1){?>
                                                    <span class="choose-right-tag"><?=$ques_ques_item->title?></span></li>
                                                <?php }else{?>
                                                    <span><?=$ques_ques_item->title?></span></li>
                                                <?php }?>
                                            <?php }?>
                                                <li>
                                                    <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php }?>
                    <?php endforeach; ?>
                <?php }else if($serction->type==2){?>
                    <?php $ss = 'A' ?>
                    <?php foreach ($mePaper->modelQues as $modelQues): ?>
                        <?php if ($serction->id == $modelQues->section_id) {?>
                        <div class="part-item">
                            <!--                    <h2 class="part-section" data-section="section B"></h2>-->
                            <div class="part-item-con">
                                <div class="part-directions" data-dir="directions">
                                    <?=$modelQues->ques_content[0]->content?>
                                </div>
                                <div>
                                    <div class="reading-com-box bg-f1f7 pag-20 mgb-30">
                                        <ul class="reading-con-article data-arr">
                                            <?php foreach (explode('===',$modelQues->ques_content[0]->ques_ques[0]->title) as $ques_ques): ?>
                                                <li data-arr="[<?=$ss?>]">
                                                    <?php $ss = chr(ord($ss)+1);?>
                                                    <?=$ques_ques?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <ul class="reading-con-list data-arr mgb-30">
                                        <?php foreach ($modelQues->ques_content[0]->ques_ques[0]->ques_ques_item as $ques_ques_item): ?>
                                            <li data-arr="<?=$ques_ques_item->id?>">
                                                <?=$ques_ques_item->title?>
                                                <?php if($ques_ques_item->choice_state==1){?>
                                                    <span class="choose-right"><?=$ques_ques_item->choice_con?></span>
                                                <?php }else if($ques_ques_item->choice_state==0){?>
                                                    <span class="choose-right-tag"><?=$ques_ques_item->state?></span>
                                                    <span class="choose-error"><?=$ques_ques_item->choice_con?></span>
                                                <?php }?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    <?php endforeach; ?>

                <?php }?>
                <?php endforeach;?>
            <?php } ?>
        <h6 style="margin-left: 40px" class="get-score">模块得分<?=$mePaper->modelQues_score?>分</h6>
    <?php endforeach; ?>

<!--    <div class="part-item">-->
<!--        <h1 class="part-tit">Part II Listening Comprehension&nbsp;[平均用时34分钟，平均得分34分]</h1>-->
<!--        <h2 class="part-section" data-section="section A"></h2>-->
<!--        <div class="part-item-con">-->
<!--            <div class="part-directions" data-dir="directions">-->
<!--                In this section,there is a passage with ten blanks.You are required to select one word for each blank-->
<!--                from a list of choices given in a word bank following the passage.Read the passage through carefullu-->
<!--                before making your choices. Each choice in the bank is identified by a letter.Please mark the-->
<!--                corresponding letter for each item on Answer sheet 2 wirh a single line through the center. You may not-->
<!--                use any of the words in the bank more than once.-->
<!--            </div>-->
<!--            <div class="banked-cloze-box">-->
<!--                <h6 class="questions-num">Questions 36 to 45 are based on the passage you have just heard.  </h6>-->
<!--                <div class="banked-cloze-con">-->
<!--                    It‘s our guilty pleasure: Watching TV is the most common everyday activity,after work and sleep, in many parts of the world.Americans view five hours of TV each day, and while we know that spending so much time sitting-->
<!--                    <span class="choose-error">36&nbsp;decade</span> <span class="choose-right-tag">determine</span>obesity(肥胖症) and other diseases, researchers have now-->
<!--                    quantified just how being a couch <span class="choose-right">37&nbsp;passlvely</span>potato can be. -->
<!--                </div>-->
<!--                <ul class="banked-cloze-list clear">-->
<!--                    <li>conseme</li>-->
<!--                    <li>decade</li>-->
<!--                    <li>determine</li>-->
<!--                    <li>harmful</li>-->
<!--                    <li>effectIve</li>-->
<!--                    <li>outcomes</li>-->
<!--                    <li>decade</li>-->
<!--                    <li>determine</li>-->
<!--                    <li>harmful</li>-->
<!--                    <li>effectIve</li>-->
<!--                    <li>outcomes</li>-->
<!--                    <li>conseme</li>-->
<!--                    <li>decade</li>-->
<!--                    <li>determine</li>-->
<!--                    <li>harmful</li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <h6 class="get-score">平均得分12分</h6>-->
<!--        </div>-->
<!--        <h2 class="part-section" data-section="section B"></h2>-->
<!--        <div class="part-item-con">-->
<!--            <div class="part-directions" data-dir="directions">-->
<!--                In this section,you are going to read a passage with ten statements attavched to it. Each statement contains information given in one of the paragraphs. Identify the paragraph from which the information is derived. You may choose a paragraph more than once. Each paragraph is marked with a letter. Answer the question by marking the corresponding letter on Answer Sheet 2-->
<!--            </div>-->
<!--            <div>-->
<!--                <h6 class="questions-num">Questions&nbsp;1&nbsp;to&nbsp;2 are&nbsp;based&nbsp;on&nbsp;the&nbsp;passage&nbsp;you&nbsp;have&nbsp;just&nbsp;heard.&nbsp;</h6>-->
<!--                <div class="reading-com-box bg-f1f7 pag-20 mgb-30">-->
<!--                    <h1> Essay -granding Software Officers Professors a Break </h1>-->
<!--                    <ul class="reading-con-article data-arr">-->
<!--                        <li data-arr="[A]">-->
<!--                            Imagine taking a college exam, and instead of handing in a blue book and getting a grade from a professoer a few weeks later, clicking the “send” button when you are done and receiving a grade back instantly,your essay scored by a software program. And then, instead of being done with the exam, imagine that the system would immediately let you rewrite the test to try to improve your grade.-->
<!--                            <span class="choose-right">48</span>-->
<!--                             -->
<!--                        </li>-->
<!--                        <li data-arr="[b]">-->
<!--                            Edx,the nonprofit enterprise founded by Harvard and the Massachusetts Institute of Thnology(MIT)-->
<!--                            to offer courses on the Internet,has just introduced such a system and will make its automated(自动的)software available free on the Web to any institutioons that wants to use it. The software uses artificial intelligence to grade student essays and short written answers, freeing professors for other tasks. <span-->
<!--                                    class="choose-error">45</span><span class="choose-right-tag">47</span>-->
<!--                        </li>-->
<!--                        <li data-arr="[C]">-->
<!--                            The new service will bring the educational consortium(联盟)into a growing conflict over the role of the automation education. Altough automated grading systems for multiple-choice and true-false tests are now widespread, the use of artificial intelligence technology to grade essay answers-->
<!--                            has not yet provided widespread acceptance by educations and has many critics. <span-->
<!--                                    class="choose-right">52</span>-->
<!--                        </li>-->
<!--                        <li data-arr="[D]">-->
<!--                            Anant Agarwal, an electrical engineer who is president of Edx, predicted that the instant grading software would be a useful teachingmated system is no matter for live teachers. One longtime critic, Les Perelman，has drawn national attention several times for putting together nonsense essays that have fooled software grading programs into giving high marks. He has also been highly critical of studies claiming that the software compares well to human grades. <span-->
<!--                                    class="choose-right">47</span>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <ul class="reading-con-list data-arr mgb-30">-->
<!--                    <li data-arr="46">-->
<!--                        Some professors in education are collecting signatures to voice their opposition to automated-->
<!--                        essay grading.-->
<!--                    </li>-->
<!--                    <li data-arr="47">-->
<!--                        using software to grade students essay saves teachers time for other work.-->
<!--                    </li>-->
<!--                    <li data-arr="48">-->
<!--                        the Hewlett contests aim at improving essay grading software.-->
<!--                    </li>-->
<!--                    <li data-arr="49">-->
<!--                        Though the automated grading system is widely used in multiple-choice tests, automated essay-->
<!--                        grading is still criticized by many educators.-->
<!--                    </li>-->
<!--                    <li data-arr="50">-->
<!--                        Some people don’t believe the software grading system can do as-->
<!--                    </li>-->
<!--                    <li data-arr="51">-->
<!--                        Critics of automated essay scoring do not seem to know the true realities in leses famous university. -->
<!--                    </li>-->
<!--                    <li data-arr="52">-->
<!--                        Critics argue many important aspects of effective writing cannot measured by computer rating programs. -->
<!--                    </li>-->
<!--                    <li data-arr="53">-->
<!--                        As class size grows, most teachers are unable to give student valuable comments as to how to improve their writing. -->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <h6 class="get-score">得分：6分（满分8分）</h6>-->
<!--        </div>-->
<!--    </div>-->


</div>
<?=$this->load->view("exam/tmpl/foot")?>
</body>
</html>