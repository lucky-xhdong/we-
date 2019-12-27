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
    <?=$this->load->view("exam/tmpl/header")?>
	<div class="wrapper">
		<div class="part-item-con ">
			<div class="review-paper-list bg-ed directions-type" data-type="阅卷">
                <?php if($usePaperMarkingList[0]['testStuCounting'] > 0 && $usePaperMarkingList[0]['testStuCounted'] > 0) {?>
				<div class="review-paper-item">
					<h1 class="clear review-paper-item-tit">
                        <?=$usePaperMarkingList[0]['exam_paper_name']?>
						<span class="fn-r"><?=$usePaperMarkingList[0]['data_time']?></span>
					</h1>
					<div class="review-paper-item-con">
						<div class="review-paper-item-l col-fe9 text-center">未批阅完成</div>
						<ul class="review-paper-item-c">
							<li >
								<div class="col-fe9">Part<i>I</i>「写作」已批阅<?=$usePaperMarkingList[0]['testStuCounted']?>人（共<?=$usePaperMarkingList[0]['testStuCounted']+$usePaperMarkingList[0]['testStuCounting']?>人）</div>
								<button class="bg-fe9">批阅此部分</button>
							</li>
							<li >
								<div class="col-4ba">Part<i>II</i>「翻译」已批阅28人（共40人）</div>
								<button class="bg-4ba">查看批阅结果</button>
							</li>
						</ul>
						<div class="review-paper-item-r text-center ">
							<span class="col-fe9 ">完全批阅完成28人（共四十人）</span>
							<button class="bg-fe9 marking">按人员批阅</button>
						</div>
					</div>
				</div>
                <?php }else if($usePaperMarkingList[0]['testStuCounted'] == 0 && $usePaperMarkingList[0]['testStuCounting'] != 0){?>
                    <div class="review-paper-item">
                        <h1 class="clear review-paper-item-tit">
                            <?=$usePaperMarkingList[0]['exam_paper_name']?>
                            <span class="fn-r"><?=$usePaperMarkingList[0]['data_time']?></span>
                        </h1>
                        <div class="review-paper-item-con">
                            <div class="review-paper-item-l col-4ba text-center">已批阅完成</div>
                            <ul class="review-paper-item-c">
                                <li >
                                    <?php if($usePaperMarkingList[0]['writestate'][0]->model_score_all!=0){?>
                                        <div class="col-4ba">Part<i>I</i>「写作」已批阅完成（共<?=$usePaperMarkingList[0]['testStuCounted']+$usePaperMarkingList[0]['testStuCounting']?>人）</div>
<!--                                        <button class="bg-4ba review_write">复审</button>-->
                                    <?php }else{?>
                                        <div class="col-ec5">Part<i>I</i>「写作」未批阅完成（共<?=$usePaperMarkingList[0]['testStuCounted']+$usePaperMarkingList[0]['testStuCounting']?>人）</div>
                                        <button class="bg-ec5 marke_write">批阅此部分</button>
                                    <?php }?>
                                </li>
                                <li >
                                    <?php if($usePaperMarkingList[0]['translatestate'][0]->model_score_all!=0){?>
                                        <div class="col-4ba">Part<i>II</i>「翻译」已批阅完成（共<?=$usePaperMarkingList[0]['testStuCounted']+$usePaperMarkingList[0]['testStuCounting']?>人）</div>
<!--                                        <button class="bg-4ba review_translate">复审</button>-->
                                    <?php }else{?>
                                        <div class="col-ec5">Part<i>II</i>「翻译」未批阅完成（共<?=$usePaperMarkingList[0]['testStuCounted']+$usePaperMarkingList[0]['testStuCounting']?>人）</div>
                                        <button class="bg-ec5 marke_translate">批阅此部分</button>
                                    <?php }?>
                                </li>
                            </ul>
                            <div class="review-paper-item-r text-center ">
                                <span class="col-4ba ">完全批阅完成<?=$usePaperMarkingList[0]['testStuCounted']+$usePaperMarkingList[0]['testStuCounting']?>人（共<?=$usePaperMarkingList[0]['testStuCounted']+$usePaperMarkingList[0]['testStuCounting']?>人）</span>
                            </div>
                        </div>
                    </div>
                <?php }else if($usePaperMarkingList[0]['testStuCounting'] == 0 ){?>
				<div class="review-paper-item">
					<h1 class="clear review-paper-item-tit">
                        <?=$usePaperMarkingList[0]['exam_paper_name']?>
						<span class="fn-r"><?=$usePaperMarkingList[0]['data_time']?></span>
					</h1>
					<div class="review-paper-item-con">
						<div class="review-paper-item-l col-ec5 text-center">未开始批阅</div>
						<ul class="review-paper-item-c">
							<li >
								<div class="col-ec5">Part<i>I</i>「写作」已批阅0人（共<?=$usePaperMarkingList[0]['testStuCounted']+$usePaperMarkingList[0]['testStuCounting']?>人）</div>
								<button class="bg-ec5 marke_write">批阅此部分</button>
							</li>
							<li >
								<div class="col-ec5">Part<i>II</i>「翻译」已批阅0人（共<?=$usePaperMarkingList[0]['testStuCounted']+$usePaperMarkingList[0]['testStuCounting']?>人）</div>
								<button class="bg-ec5 marke_translate">批阅此部分</button>
							</li>
						</ul>
						<div class="review-paper-item-r text-center ">
							<span class="col-ec5 ">完全批阅完成0人（共<?=$usePaperMarkingList[0]['testStuCounted']+$usePaperMarkingList[0]['testStuCounting']?>人）</span>
						</div>
					</div>
				</div>
                <?php }?>
			</div>
		</div>
	</div>
    <?=$this->load->view("exam/tmpl/foot")?>
</body>
<script>
    $(function () {

        $(".marke_write").on('click',function () {
            window.location.href="<?=anchorurl('teacher/marking_paper')?>/"+"<?=$paper_id?>/"+"<?=$group_id?>"+"/6/0";
        })
        $(".marke_translate").on('click',function () {
            window.location.href="<?=anchorurl('teacher/marking_paper')?>/"+"<?=$paper_id?>/"+"<?=$group_id?>"+"/3/0";
        })
        $(".review_write").on('click',function () {
            window.location.href="<?=anchorurl('teacher/review')?>/"+"<?=$paper_id?>/"+"<?=$group_id?>"+"/6/0";
        })
        $(".review_translate").on('click',function () {
            window.location.href="<?=anchorurl('teacher/review')?>/"+"<?=$paper_id?>/"+"<?=$group_id?>"+"/3/0";
        })
    })
</script>
</html>