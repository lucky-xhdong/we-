<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="UTF-8">
	<title></title>
    <?=$this->load->view("exam/tmpl/meta")?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/exam/css/testSystemTeacher.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/exam/css/common.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/exam/css/testSystem.css">
</head>
<body>
<?=$this->load->view("exam/tmpl/header")?>
	<div class="wrapper">
		<div class="part-item">
			<div class="part-item-con ">
				<h1 class="test-tag text-center">谢谢，本次考试结束</h1>
				<div class="test-result bg-ed directions-type" data-type="本次考试成绩">
					<ul class="test-result-list">
                        <?php foreach($exam_user['paperModel'] as $exam):?>
                            <?php if($exam->model_type==3||$exam->model_type==6){?>
                                <li style="margin-bottom: 40px;">
                                    <span><?=$exam->model_name?><em>「满分<?=$exam->model_score_all?>分」：</em></span>
                                    <font class="col-559">待老师批阅</font>
                                </li>
                            <?php }else{?>
                            <li style="margin-bottom: 40px;">
                                <span><?=$exam->model_name?><em>「满分<?=$exam->model_score_all?>分」：</em></span>
                                <font class="col-559">得分<?=$exam->model_score?>分，共<?=$exam->ques_Num?>题，对<?=$exam->rightQues_Num?>题，错<?=$exam->ques_Num-$exam->rightQues_Num?> </font>
                            </li>
                            <?php } ?>
                        <?php endforeach;?>
<!--                        <li>-->
<!--                            <span>part&nbsp;&nbsp;Ⅰ <em>「满分106.5分」：</em></span>-->
<!--                            <font class="col-ccc">等待老师披阅成绩 </font>-->
<!--                        </li>-->
<!--						<li>-->
<!--							<span>part&nbsp;&nbsp;ⅠⅠ <em>「满分245.5分」：</em></span>-->
<!--							 <font class="col-559">得分190分，共35题，对30题，错5 </font>-->
<!--						</li>-->
<!--						<li>-->
<!--							<span>part&nbsp;&nbsp;ⅠⅠⅠ <em>「满分106.5分」：</em></span>-->
<!--							 <font class="col-ccc">等待老师披阅成绩 </font>-->
<!--						</li>-->
<!--						<li>-->
<!--							<span>part&nbsp;&nbsp;ⅠV <em>「满分245.5分」：</em></span>-->
<!--							 <font class="col-559">得分190分，共35题，对30题，错5 </font>-->
<!--						</li>-->
					</ul>
				</div>
			</div>


		</div>
	</div>
<?=$this->load->view("exam/tmpl/foot")?>
</body>
</html>