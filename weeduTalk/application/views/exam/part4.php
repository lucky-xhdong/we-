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
	<div class="header clear">
		<div class="fn-l">
			<span>Part IV Translation</span>
		</div>
		<div class="fn-r">
			<div class="timing-con">
				<div class="surplus-time">剩余时间：<i>17:00</i>	</div>
				<div class="count-time">总共时间：<i>25:00</i>	</div>
			</div>
		</div>
	</div>
	<div class="wrapper mgt-102">
		<div class="part-item">
			<div class="part-item-con">
				<div class="part-directions" data-dir="directions">
					For this part, you are allowed 30 minutes to translate a passage from Chinese into English. You should write your answer on Answer Sheet2.
				</div>
				<div class=" clear">
					<div class="trans-con mgb-20">
						中国是图书产量最多(the most prolific)的国家之一，但国人的阅读量却相对偏低。近几十年，书籍供应量大大增加，但人们对书籍的兴趣却未同步增长。调查显示，国人年平均读书量仅为4．39本，与发达国家有很大差距。如美国人年均读书7本，法国人8．4本。调查数据还显示，只有1.3%的国人认为自己的阅读量多，53.1%的国人则认为自己的阅读量很少。
					</div>
					<div class="write-box mgb-30">
						<p>
							Living in the 21st century offers certain advantages,such
						</p>
						<span class="write-word-num">（已经输入9个单词）</span>
					</div>
					<div class="bor-bg"></div>
					<div class="write-btn text-right mgt-20">
						<button class="btn sub-btn bg-77b">提交</button>
					</div>
					
				</div>
			</div>
		</div>
	</div>
<?=$this->load->view("exam/tmpl/foot")?>
</body>
</html>