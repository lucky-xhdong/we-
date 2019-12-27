<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页--英语学科发展服务网</title>
    <?=$this->load->view("evaluation/tmpl/wePlatForm1.0.0/meta")?>
    <?php $this->load->view('evaluation/tmpl/echarts'); ?>
    <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
</head>
<body>
<div class="evaluation2-container">
    <!--header start-->
    <div class="header">
        <i class="icon icon-logo"></i>
        <span class="txt"><?=$exam->name?></span>
    </div>
    <!--header end-->
    <!--基本信息 start-->
    <div class="baseinfo">
        <h2 class="title"><?=$exam->name?></h2>
        <div class="baseinfo__left">
            <p class="txt">
                <span class="txt-label">姓&emsp;&emsp;名：</span>
                <span class="txt-info"><?=$user->name?></span>
            </p>
            <p class="txt">
                <span class="txt-label">姓&emsp;&emsp;名：</span>
                <span class="txt-info"><?=$schoolName?></span>
            </p>
<!--            <p class="txt" data-before="测评组别：">小学组</p>-->
        </div>
        <div class="baseinfo__right">
            <span class="total-score">成绩：<?=$result->totalScores?>分</span>
            <span class="txt-time">测试时间:<?=date("Y年m月d日H:i",strtotime($exam->exam_time))?>-<?=date("H:i",strtotime($result->createdTime))?></span>
        </div>
    </div>
    <!--基本信息 end-->
    <!--综合分析 start-->
    <div class="comprehensive-analysis">
        <h2 class="title">综合分析</h2>
        <div class="comment">
            <p class="txt"><?=$user->name?>老师您好，本次考试的总分为<?=$totalScores?>分，您本次测试的得分为<?=$result->totalScores?>分，超过了88%的考生。</p>
        </div>
        <div class="chart">
            <div id="main" style="width: 100%;height:500px;"></div>
        </div>
        <div class="chart-info">
            <?php foreach($firstComments as $firstComment):?>
                <p class="txt">
                    <span class="line"></span>
                    您在<?=$firstComment->name?>模块测试中得分率为<?=$firstComment->ratings*100?>%，
                    <?php if($firstComment->ratings < 0.6):?>
                        <?=$firstComment->a1_comment?>
                    <?php elseif($firstComment->ratings < 0.7):?>
                        <?=$firstComment->a3_comment?>
                    <?php elseif($firstComment->ratings < 0.8):?>
                        <?=$firstComment->a3_comment?>
                     <?php elseif($firstComment->ratings < 0.9):?>
                        <?=$firstComment->a4_comment?>
                    <?php else:?>
                        <?=$firstComment->a5_comment?>
                    <?php endif;?>

                </p>
            <?php endforeach;?>
        </div>
    </div>
    <!--综合分析 end-->
    <!--测评成绩分析与评价 start-->
    <div class="achievement-analysis">
        <h2 class="title">测评成绩分析与评价</h2>
        <div class="analysis-table-wrapper">
            <p class="txt-analysis"><?=$user->name?>老师，根据您本次考试的答题情况，我们得出以下分析结果：</p>
            <table class="analysis-table">
                <thead>
                <tr>
                    <th width="10%"><span class="txt-module">模块</span></th>
                    <th width="20%"><span class="txt-classify">分类</span></th>
                    <th><span class="txt-lavel txt-lavel__A1">A1</span></th>
                    <th><span class="txt-lavel txt-lavel__A2">A2</span></th>
                    <th><span class="txt-lavel txt-lavel__B1">B1</span></th>
                    <th><span class="txt-lavel txt-lavel__B2">B2</span></th>
                    <th><span class="txt-lavel txt-lavel__C1">C1</span></th>
                    <th><span class="txt-lavel txt-lavel__C2">C2</span></th>
                </tr>
                </thead>
                <tbody>
                <!--英语听力 start-->
                <?php foreach($firstSecondComments as $firstSecondComment):?>
                <tr>
                    <td rowspan="<?=count($firstSecondComment->second_tags)?>" class="first"><p class="txt"><?=$firstSecondComment->name?></p></td>
                    <?php foreach($firstSecondComment->second_tags as $key=>$second_tag):?>
                        <?php if($key > 0) break;?>
                    <td><p class="txt"><?=$second_tag->name?></p></td>
                    <td colspan="6">
                        <div class="progress-bar">
                            <?php if($second_tag->ratings <= 0.2):?>
                                <div class="progress-bar__A1" style="width: <?=$second_tag->ratings*100?>%;">进度条</div>
                            <?php elseif($second_tag->ratings <= 0.4):?>
                                <div class="progress-bar__A2" style="width: <?=$second_tag->ratings*100?>%;">进度条</div>
                            <?php elseif($second_tag->ratings <= 0.55):?>
                                <div class="progress-bar__B1" style="width: <?=$second_tag->ratings*100?>%;">进度条</div>
                            <?php elseif($second_tag->ratings <= 0.7):?>
                                <div class="progress-bar__B2" style="width: <?=$second_tag->ratings*100?>%;">进度条</div>
                            <?php elseif($second_tag->ratings <= 0.85):?>
                                <div class="progress-bar__C1" style="width: <?=$second_tag->ratings*100?>%;">进度条</div>
                            <?php else:?>
                                <div class="progress-bar__C2" style="width:  <?=$second_tag->ratings*100?>%;">进度条</div>
                            <?php endif;?>

                        </div>
                    </td>
                    <?php endforeach;?>
                </tr>
                <?php foreach($firstSecondComment->second_tags as $key=>$second_tag):?>
                        <?php if($key <= 0) continue;?>
                <tr>
                    <td><p class="txt"><?=$second_tag->name?></p></td>
                    <td colspan="6">
                        <div class="progress-bar">
                            <?php if($second_tag->ratings <= 0.2):?>
                                <div class="progress-bar__A1" style="width: <?=$second_tag->ratings*100?>%;">进度条</div>
                            <?php elseif($second_tag->ratings <= 0.4):?>
                                <div class="progress-bar__A2" style="width: <?=$second_tag->ratings*100?>%;">进度条</div>
                            <?php elseif($second_tag->ratings <= 0.55):?>
                                <div class="progress-bar__B1" style="width: <?=$second_tag->ratings*100?>%;">进度条</div>
                            <?php elseif($second_tag->ratings <= 0.7):?>
                                <div class="progress-bar__B2" style="width: <?=$second_tag->ratings*100?>%;">进度条</div>
                            <?php elseif($second_tag->ratings <= 0.85):?>
                                <div class="progress-bar__C1" style="width: <?=$second_tag->ratings*100?>%;">进度条</div>
                            <?php else:?>
                                <div class="progress-bar__C2" style="width:  <?=$second_tag->ratings*100?>%;">进度条</div>
                            <?php endif;?>
                        </div>
                    </td>
                </tr>
                    <?php endforeach;?>
                <!--英语听力 end-->
                <?php endforeach;?>
                <!--英语口语 start-->
<!--                <tr>-->
<!--                    <td class="second" rowspan="4"><p class="txt">英语口语</p></td>-->
<!--                    <td><p class="txt">语音能力</p></td>-->
<!--                    <td colspan="6">-->
<!--                        <div class="progress-bar">-->
<!--                            <div class="progress-bar__A1" style="width: 100%;">进度条</div>-->
<!--                        </div>-->
<!--                    </td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td><p class="txt">英语发音综合能力</p></td>-->
<!--                    <td colspan="6">-->
<!--                        <div class="progress-bar">-->
<!--                            <div class="progress-bar__A2" style="width: 90%;">进度条</div>-->
<!--                        </div>-->
<!--                    </td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td><p class="txt">口语表达能力</p></td>-->
<!--                    <td colspan="6">-->
<!--                        <div class="progress-bar">-->
<!--                            <div class="progress-bar__B1" style="width: 60%;">进度条</div>-->
<!--                        </div>-->
<!--                    </td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td><p class="txt">语言组织能力</p></td>-->
<!--                    <td colspan="6">-->
<!--                        <div class="progress-bar">-->
<!--                            <div class="progress-bar__B2" style="width: 20%;">进度条</div>-->
<!--                        </div>-->
<!--                    </td>-->
<!--                </tr>-->
<!--                <!--英语口语 end-->
<!--                <!--教学专业能力 start-->
<!--                <tr>-->
<!--                    <td class="third" rowspan="4"><p class="txt">教学专业能力</p></td>-->
<!--                    <td><p class="txt">教材分析</p></td>-->
<!--                    <td colspan="6">-->
<!--                        <div class="progress-bar">-->
<!--                            <div class="progress-bar__A1" style="width: 100%;">进度条</div>-->
<!--                        </div>-->
<!--                    </td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td><p class="txt">课堂教学设计</p></td>-->
<!--                    <td colspan="6">-->
<!--                        <div class="progress-bar">-->
<!--                            <div class="progress-bar__A2" style="width: 90%;">进度条</div>-->
<!--                        </div>-->
<!--                    </td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td><p class="txt">课堂组织与实施</p></td>-->
<!--                    <td colspan="6">-->
<!--                        <div class="progress-bar">-->
<!--                            <div class="progress-bar__B1" style="width: 60%;">进度条</div>-->
<!--                        </div>-->
<!--                    </td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td><p class="txt">课堂教学评价</p></td>-->
<!--                    <td colspan="6">-->
<!--                        <div class="progress-bar">-->
<!--                            <div class="progress-bar__B2" style="width: 20%;">进度条</div>-->
<!--                        </div>-->
<!--                    </td>-->
<!--                </tr>-->
                <!--教学专业能力 end-->
                </tbody>
            </table>
        </div>
        <div class="analysis-result">
            <p class="txt"><?=$user->name?>老师，根据您本次考试的答题情况，我们得出以下分析结果：</p>
            <p class="txt">您的优势表现为：
                <?php foreach($firstSecondComments as $firstSecondComment):?>
                <?php foreach($firstSecondComment->second_tags as $key=>$second_tag1):?>
                    <?php if($second_tag1->ratings <= 0.2):?>
                        <?=$second_tag1->a1_comment?>
                    <?php elseif($second_tag1->ratings <= 0.4):?>
                        <?=$second_tag1->a2_comment?>
                    <?php elseif($second_tag1->ratings <= 0.55):?>
                        <?=$second_tag1->b1_comment?>
                    <?php elseif($second_tag1->ratings <= 0.7):?>
                        <?=$second_tag1->b2_comment?>
                    <?php elseif($second_tag1->ratings <= 0.85):?>
                        <?=$second_tag1->c1_comment?>
                    <?php else:?>
                        <?=$second_tag1->c2_comment?>
                    <?php endif;?>
            <?php endforeach;?> <?php endforeach;?></p>
        </div>
    </div>
    <!--测评成绩分析与评价 end-->
    <!--培训建议 start-->
    <div class="training-suggestions">
        <h2 class="title">培训建议</h2>
        <div class="txt-wrapper">
            <p class="txt">
                <?php
                    $second = array();

                ?>
                <?php foreach($firstSecondComments as $firstSecondComment):?>
                    <?php foreach($firstSecondComment->second_tags as $key=>$second_tag1):?>
                        <?php if($second_tag1->ratings <= 0.4):?>
                            <?php
                            $second[] = $second_tag1;
                            ?>
                        <?php endif;?>
                    <?php endforeach;?>
                <?php endforeach;?>
                <?php
                        $new_seconds = array_rand($second,3);
                        $new_second2s = array();
                        $new_second2s[] = $second[$new_seconds[0]];
                        $new_second2s[] = $second[$new_seconds[1]];
                        $new_second2s[] = $second[$new_seconds[2]];

                ?>
                <?=$user->name?>老师，您在
                <?php foreach($new_second2s as $key=> $new_second):?>
                    <?=$new_second->name?>、
                <?php endforeach;?>
                部分的能力有待提升。我们建议您：<br />
                <?php foreach($new_second2s as $key=> $new_second):?>
                    <?=$key+1?>.参加<?=$new_second->recommend_course?>课程，<?=$new_second->comments?><br />
                <?php endforeach;?>
            </p>
        </div>
    </div>
    <!--培训建议 end-->
</div>
</body>
<script type="text/javascript">
    var myChart4 = null;

    function getAvgscoreScoreNumOfUser(){
        if(myChart4 == null){
            myChart4 =echarts.init(document.getElementById('main'));
        }
        var data = new Array();
        <?php foreach($firstComments as $firstComment):?>
           var comments = {value:<?=$firstComment->ratings*300?>, name:'<?=$firstComment->name?>'};
             data.push(comments);
        <?php endforeach;?>
        myChart4.clear();
        myChart4.setOption({

            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },

            series : [
                {
                    name:'访问来源',
                    type:'pie',
                    radius : '55%',
                    center: ['50%', '50%'],
                    data:data.sort(function (a, b) { return a.value - b.value; }),
                    roseType: 'radius',
                    label: {
                        normal: {
                            textStyle: {
                                color: 'rgba(0, 0, 0,1)'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            lineStyle: {
                                color: 'rgba(0, 0, 0,1)'
                            },
                            smooth: 0.2,
                            length: 10,
                            length2: 20
                        }
                    },
                    animationType: 'scale',
                    animationEasing: 'elasticOut',
                    animationDelay: function (idx) {
                        return Math.random() * 200;
                    }
                }
            ]
        });
    }

    getAvgscoreScoreNumOfUser(0);

</script>
</html>