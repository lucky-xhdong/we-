<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="UTF-8">
	<title>北京唯佳未来教育科技有限公司--在线考试系统</title>
	<?=$this->load->view("exam/tmpl/meta")?>

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/exam/css/testSystemTeacher.css">
	<script type="text/javascript" src="<?=base_url()?>media/js/jquery.showLoading.js"></script>
	<link  href="<?=base_url()?>media/css/showloading.css" rel="stylesheet"/>
</head>
<body>

<?=$this->load->view("exam/tmpl/header")?>
	<div class="wrapper">
		<div class="part-item">
			<div class="part-item-con clear">
				<div class="sidebar test-score-box fn-l directions-type bg-ed" data-type="考试成绩">
					<div class="test-score-con sidebar-con">
                        <?php foreach($mePaperList as $mePaper):?>
                            <?php if($mePaper['exam_state']=='待批阅'|| ($mePaper['exam_status']=='2' && $mePaper['exam_state'] != "")): ?>
						<div class="ts-con-item">
							<h1 class="ts-item-tit"><?=$mePaper['exam_paper_name']?><span><?=$mePaper['data_time']?></span></h1>
							<div class="ts-item-con">
								<div class="ts-item-con-l">
									<span>等待</span>
									<?php $totalscore =0; foreach ($mePaper['model_score']['paperModel'] as $modelscore): ?>
											<?php
											  $totalscore += (int)$modelscore->model_score;
											?>
									<?php endforeach; ?>
									总分 <?=$totalscore?> 分
								</div>
								<ul class="ts-item-con-r">
                                    <?php $num=0 ?>
                                    <?php foreach ($mePaper['model_score']['paperModel'] as $model): ?>
                                    <?php $num++?>
                                    <li>
                                        <span class="tsi-r-partnum">part<em><?=$num?></em>:</span>
                                        <?php if($model->model_type==6||$model->model_type==3){ ?>
                                            <span class="tsi-r-partnum" style="width: 115px;">等待老师批阅成绩</span>
                                        <?php }else{?>
                                            <span class="tsi-r-score"><?=$model->model_score?>分</span>
                                        <?php }?>

                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <a style="background-color:#17b6fe;width: 100%;" href="<?=anchorurl('student/getExamDetail/'.$mePaper['exam_paper_id'].'/'.$mePaper['group_id'])?>" class="test-start-btn bg-4ba">查看考试详情</a>
							</div>
						</div>
                            <?php elseif($mePaper['exam_status']=='1'):?>
								<div class="ts-con-item">
									<h1 class="ts-item-tit"><?=$mePaper['exam_paper_name']?><span><?=$mePaper['data_time']?></span></h1>
									<div class="ts-item-con">
										<div class="ts-item-con-l">
											<span style="color: #bb457f">考试中</span>
											<?php $totalscore =0; foreach ($mePaper['model_score']['paperModel'] as $modelscore): ?>
												<?php
												$totalscore += (int)$modelscore->model_score;
												?>
											<?php endforeach; ?>
											总分 <?=$totalscore?> 分
										</div>
										<ul class="ts-item-con-r">
<!--											--><?php //$num=0 ?>
											<?php foreach ($mePaper['model_score']['paperModel'] as $model): ?>
												<?php $num++?>

												<li>
													<span class="tsi-r-partnum">part<em><?=$num?></em>:</span>
														<span class="tsi-r-score"><?=$model->model_score?>分</span>
												</li>
											<?php endforeach; ?>
										</ul>
										<a style="background-color:#17b6fe;width: 100%;" href="<?=anchorurl('student/getExamDetail/'.$mePaper['exam_paper_id'].'/'.$mePaper['group_id'])?>" class="test-start-btn bg-4ba">查看考试详情</a>
									</div>
								</div>
								<?php else:?>
								<div class="ts-con-item">
									<h1 class="ts-item-tit"><?=$mePaper['exam_paper_name']?><span><?=$mePaper['data_time']?></span></h1>
									<div class="ts-item-con">
										<div class="ts-item-con-l">
											<span style="color: #4bda77">已批阅</span>
											<?php $totalscore =0; foreach ($mePaper['model_score']['paperModel'] as $modelscore): ?>
												<?php
												$totalscore += (int)$modelscore->model_score;
												?>
											<?php endforeach; ?>
											总分 <?=$totalscore?> 分
										</div>
										<ul class="ts-item-con-r">
											<!--											--><?php //$num=0 ?>
											<?php foreach ($mePaper['model_score']['paperModel'] as $model): ?>
												<?php $num++?>
												<li>
													<span class="tsi-r-score"><?=$model->model_score?>分</span>
												</li>
											<?php endforeach; ?>
										</ul>
										<a style="background-color:#17b6fe;width: 100%;" href="<?=anchorurl('student/getExamDetail/'.$mePaper['exam_paper_id'].'/'.$mePaper['group_id'])?>" class="test-start-btn bg-4ba">查看考试详情</a>
									</div>
								</div>
						<?php endif;?>
                        <?php endforeach;?>
					</div>
				</div>
				<div class="fn-l main-box">
					<ul class="test-explain directions-type bg-ed mgb-20" data-type="考试说明">
						<li>四级模拟考的试卷结构同最新改革的四级真题结构完全一致，包含如下四部分：Part I  Writing，Part II Listening Comprehension， Part III Reading Comprehension， Part IV Translation；</li>
						<li>
							本次模拟考试总时长为125分钟，其中writing 为30分钟，listening 为25分钟，reading 为40分钟，translation 为30分钟；考生可以提前完成；
						</li>
						<li>
							系统会自动控制每部分的答题时间，到时间后自动进入下一题；
						</li>
						<li>
                            每部分内容在点击“提交”键前，都可检查修改；点击“提交”键后不可返回修改;
						</li>
<!--						<li>-->
<!--							点击“提交”答案按钮前，可以改动 ；-->
<!--						</li>-->
					</ul>
					<div class="test-radio directions-type bg-ed mgb-20" data-type="设备测试">
						<h1>设备测试（点击播放按钮，收听音频输入听到的内容）</h1>
						<div class="test-radio-con">
							<span class="text-radio-btn" id="text-radio-btn">
								<audio class="audio-ele" id="audio_source" src="">
								</audio>
							</span>
							<input type="text" id="test-radio-input" class="test-radio-input" placeholder="输入听到的内容">
							<span  id="success_tip" style="color:green ;padding: 0 10px;height: 36px;width: 224px;font-size: 16px;vertical-align: middle;display: none">
							 您的设备测试正常!
							</span>
							<span id="error_tip" style="color:red;display: none;padding: 0 10px;height: 36px;width: 224px;font-size: 16px;vertical-align: middle;">
							 您的设备运行不正常,请检查!
							</span>
							<audio id="code_source" src="" style="display: none;">
							</audio>
						</div>
					</div>
                    <?php foreach($mePaperList as $mePaper):?>
<!--                    --><?php //if($mePaper['exam_state']=='正在进行' && $mePaper['exam_status']==''){ ?>
						<?php if($mePaper['exam_status'] == 0 || $mePaper['exam_status'] == 1): ?>

							<div class="test-start directions-type bg-ed mgb-20" data-type="开始考试">
								<?php if($mePaper['exam_status'] == 1):?>
									<h1><?=$mePaper['data_time']?>《<?=$mePaper['exam_paper_name']?>》考试已经开始，目前已经进行了<?=$mePaper['dis_data_time']?>。</h1>
									<div class="text-center">
										<a href="<?=anchorurl('student/part1/'.$mePaper['id'])?>" class="test-start-btn bg-4ba">开始测试</a>
									</div>
								<?php else:?>
									<h1>
										<?=$mePaper['data_time']?>《<?=$mePaper['exam_paper_name']?>》<span class="startexamtext">考试即将开始 倒计时:</span>
										<span class="countdown" data-starttime="<?=$mePaper['data_time']?>" data-url="<?=anchorurl('student/part1/'.$mePaper['id'])?>" style="color: blue"><?=$mePaper['dis_data_time']?>
										</span>
									</h1>
									<div class="text-center preparestart">
										<a class="test-start-btn" style="background-color: red" disabled>即将开始</a>
									</div>
								<?php endif;?>
							</div>
                    <?php endif;?>
                    <?php endforeach;?>
				</div>
				
			</div>
		</div>
	</div>
<?=$this->load->view("exam/tmpl/foot")?>
</body>
<script>
	$(document).ready(function(){
		$('#text-radio-btn').click(function(){  //设备测试（音频播放）
			var oRadio = $(this).find(".audio-ele");
			$("#success_tip").hide();
			$("#error_tip").hide();
			$("#test-radio-input").val("");
			var _this = $(this);
			if($(this).hasClass('on')){
				$(this).removeClass('on');
				oRadio[0].pause();
			}else{
				// 发送ajax 获取语音验证码
				$.ajax({
					url: "<?=anchorurl('home/microphoneTest')?>",
					type: "get",
					dataType: 'json',
					async: false,
					beforeSend:function(){
						$("#text-radio-btn").showLoading();
					},
					success: function (data, textstatus) {
						$("#text-radio-btn").hideLoading();
						if(data.result == 1){
							$("#audio_source").attr("src",data.file_url)
							_this.addClass('on');
							oRadio[0].play();
						}
					}
				});
			}
			oRadio.bind('ended',function(){
				$(this).parent('span').removeClass('on');
				$("#test-radio-input").focus();
			});
		});
		$("#test-radio-input").keyup(function(){
			$("#success_tip").hide();
			$("#error_tip").hide();
			var code = $(this).val();
			var codeRadio = $("#code_source")[0];
			if(code.length == 6){
				$.ajax({
					url: "<?=anchorurl('home/microphoneCodeTest')?>/"+code,
					type: "get",
					dataType: 'json',
					async: false,
					beforeSend:function(){
						$("#test-radio-input").showLoading();
					},
					success: function (data, textstatus) {
						$("#test-radio-input").hideLoading();
						$("#code_source").attr("src",data.file_url)
						codeRadio.play();
						if(data.result == 1){
							$("#success_tip").show();
						}else{
							$("#error_tip").show();
						}
					}
				});
			}
		});

		//倒计时方式计算开始时间

		function examStartTime(){
			$(".countdown").each(function(index,element){
				var starttime =  $(this).data("starttime");
				console.log(starttime);
				var EndTime= new Date(starttime.replace(/-/g, "/")); //截止时间
				var NowTime = new Date();
				var t = EndTime.getTime() - NowTime.getTime();
				if(t <= 0){
					$(this).html('');
					//clearInterval(timmer);
					$(this).parents(".test-start").find(".preparestart").html('<a href="'+ $(this).data("url")+'" class="test-start-btn bg-4ba">开始测试</a>');
					$(this).parents(".test-start").find(".startexamtext").html('考试开始');
				}else{
					var d=Math.floor(t/1000/60/60/24);
					var h=Math.floor(t/1000/60/60%24);
					var m=Math.floor(t/1000/60%60);
					var s=Math.floor(t/1000%60);
					if(s < 10){
						s = '0'+s;
					}
					if(m < 10){
						m = '0'+m;
					}
					if(h < 10){
						h = '0'+h;
					}

					if(d==0){
						var string = h+':'+m+':'+s;
					}else if(d<10){
						var string = d + "天 "+h+':'+m+':'+s;
					}

					$(this).html(string);
				}
			 });
		}
		var timmer = setInterval(examStartTime,1000);

	});
</script>
</html>