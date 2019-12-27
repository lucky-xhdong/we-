<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="UTF-8">
	<title>监考</title>
    <?=$this->load->view("exam/tmpl/meta")?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/exam/css/testSystemTeacher.css">
</head>
<body>
    <?=$this->load->view("exam/tmpl/header")?>
	<div class="wrapper">
		<div class="part-item">
			<div class="part-item-con">
				<div class="proctor-box data-bg-de6 directions-type bg-5a5" data-type="<?=$classDetail->grade->name?><?=$classDetail->name?>监考">
					<h1 class="proctor-detail">
						共<?=$exam_students_count?>人，答题中<?=$exam_students_in_exam_count?>人，未参加考试<?=$exam_students_not_started_count?>人、交卷<?=$exam_students_finish_count?>人
					</h1>
					<ul class="proctor-list clear mgt-20">
						<?php foreach($students as $student):?>
						<li>
							<span class="proctor-head"><img src="<?=$student->getAvatarUrl()?>"></span>
							<div class="testing proctor-con">
								<p class="proctor-username"><?=$student->name?></p>
								<p class="proctor-state">
									<?php if($student->status == 0):?>
										 未开始
								    <?php elseif($student->status == 1):?>
										考试中
								    <?php elseif($student->status == 2):?>
										 已完成
									<?php endif;?>
								</p>
<!--								<p class="proctor-other">剩余时间：134：34</p>-->
							</div>
						</li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?=$this->load->view("exam/tmpl/foot")?>
</body>
</html>