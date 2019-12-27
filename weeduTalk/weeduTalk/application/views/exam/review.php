<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="UTF-8">
	<title></title>
    <?=$this->load->view("exam/tmpl/meta")?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>media/exam/css/testSystemTeacher.css">
</head>
<body>
<?//=$this->load->view("exam/tmpl/header")?>
	<div class="wrapper">
		<div class="part-item">
			<div class="part-item-con bg-ed">
				<div class="part-directions directions-type pag-l-115" data-dir="directions" data-type="阅卷">
					For this part, you are allowed 30 minutes to write an essay. Suppose you have two options upon graduation: one is to find a job somewhere and the other to start a business of your own. You are to make a decision. Write an essay to explain the reasons for your decision. You should write at least 120 words but no more than 180 words.
				</div>
				<div class="pag-20 clear">
					<div class="write-box mgb-30">
						<p><?=$answer->ques_item_content?></p>
					</div>
					<div class=" write-score-assess">
						<p>
							<input type="text" class="hide-ele score" value="10">
							<span class="show-ele "><?=$sss?></span>
							分（总分<?=$answer->question_score?>分）</p>
						<p>
							<input type="text" class="hide-ele w-per85 score_con" value="<?=$answer->teacher_volume?>">
							<span class="show-ele"><?=$answer->teacher_volume?></span>
							评语（可不填）</p>
					</div>
					<div class="write-btn text-center">
						<button class="btn change-btn">修改</button>
						<button class="btn sub-btn bg-4ba Submit">提交</button>
					</div>
					<p class="text-center review-count">part Ⅰ 「写作」当前复审第<?=$num+1?>人（共<?=$count?>人）
</p>
				</div>
				
			</div>
		</div>
	</div>
<?=$this->load->view("exam/tmpl/foot")?>
<script>
    $(function () {

        $(".change-btn").on('click',function () {
            $(".score").css('display','block');
            $(".score_con").css('display','block');
        });

        if(<?=$msg?>=='0'){
            alert('复审完成');
            window.location.href="<?=anchorurl('teacher/marking')?>/"+"<?=$paper_id?>/"+"<?=$group_id?>";
        }else{
            //发送异步请求传输问题
            $(".Submit").on('click',function () {
                $.ajax({
                    url: '<?=anchorurl('teacher/marking_paper_score')?>',
                    type: "POST",
                    async: false,
                    data: {
                        id: <?=isset($answer->id) ?$answer->id : 0?>,
                        score: $(".score").val(),
                        score_con: $(".score_con").val(),
                        user_id: <?=isset($answer->user_id) ? $answer->user_id : 0?>,
                        paper_id: <?=isset($answer->paper_id) ? $answer->paper_id : 0?>,
                        model_id: <?=isset($answer->model_id) ? $answer->model_id : 0?>,
                        group_id: <?=isset($answer->group_id) ? $answer->group_id : 0?>
                    },
                    success: function (msg) {
                        console.log(msg);
                        if(msg){
                            var num = <?=$num?>;
                            num++;
                            window.location.href="<?=anchorurl('teacher/review')?>/"+"<?=$paper_id?>/"+"<?=$group_id?>/"+"<?=$ques_status?>/"+num;
                        }else{
                            alert('批阅失败');
                        }
                    }
                });
            })

        }
    })
</script>
</body>
</html>