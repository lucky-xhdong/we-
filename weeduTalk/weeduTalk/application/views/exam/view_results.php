<!DOCTYPE html>
<html lang="en">
<!--//查看成绩-->
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
			<div class="part-item-con">
				<div class="exam-report-box data-bg-de6 directions-type  bg-ed" data-type="考试成绩">
					<div class="exam-report-average">
						<div class="ex-re-aver-tit">
							<span>平均得分<?=$average['average']?>分</span>
							<span>平均答题时间34分钟</span>
						</div>
						<div class="ex-re-aver-con clear">
							<div class="aver-score-box">
								<ul>
									<li>
										<i class="great-score"></i>
										优秀人数<?=$average['A']?>人
										<em>（0%）</em>
									</li>
									<li>
										<i class="just-pass"></i>
										刚及格人数<?=$average['B']?>人
										<em>（0%）</em>
									</li>
									<li>
										<i class="fail-score"></i>
										未及格人数<?=$average['C']?>人
										<em>（100%）</em>
									</li>
								</ul>
								<div class="aver-score high-pie"></div>	
							</div>
							<div class="aver-time-box">
								<ul>
									<li>
										<i class="part-one"></i>
										Part&nbsp;I&nbsp;30分钟
										<em>（32.5%）</em>
									</li>
									<li>
										<i class="part-two"></i>
										Part&nbsp;II&nbsp;30分钟
										<em>（30.5%）</em>
									</li>
									<li>
										<i class="part-three"></i>
										Part&nbsp;III&nbsp;30分钟
										<em>（37%）</em>
									</li>
								</ul>
								<div class="aver-time high-pie"></div>	
							</div>
							<div class="accuracy-box">
								<ul>
									<li>
										<i class="part-one"></i>
										Part&nbsp;I&nbsp;正确率60%
									</li>
									<li>
										<i class="part-two"></i>
										Part&nbsp;II&nbsp;正确率30%
									</li>
									<li>
										<i class="part-three"></i>
										Part&nbsp;III&nbsp;正确率60%
									</li>
								</ul>
								<ul class="accuracy-table">
									<li><span class="part-one" style="width:80%"></span></li>
									<li><span class="part-two" style="width:50%"></span></li>
									<li><span class="part-three" style="width:30%"></span></li>
								</ul>	
							</div>
							<a href="javascript:;" class="detail-btn fn-r view_classes_details">查看详情</a>
						</div>
					</div>
					<ul class="proctor-list clear mgt-20">
                        <?php foreach($studentList as $key=>$value):?>
<!--						<li data-toggle="modal" data-target="#myModal">-->
                        <li>
							<span class="proctor-head"><img src="<?=$value->getAvatarUrl()?>"></span>
							<div class="great-score proctor-con">
								<p class="proctor-username"><?=$value->name?></p>
<!--								<p class="proctor-state">90分</p>-->
<!--								<p class="proctor-other">剩余时间：134：34</p>-->
							</div>
						</li>
                        <? endforeach;?>
<!--						<li>-->
<!--							<span class="proctor-head"><img src=""></span>-->
<!--							<div class="great-score proctor-con">-->
<!--								<p class="proctor-username">于二</p>-->
<!--								<p class="proctor-state">89分</p>-->
<!--								<p class="proctor-other">用时：134：34</p>-->
<!--							</div>-->
<!--						</li>-->
<!--						<li>-->
<!--							<span class="proctor-head"><img src=""></span>-->
<!--							<div class="great-score proctor-con">-->
<!--								<p class="proctor-username">王五</p>-->
<!--								<p class="proctor-state">84分</p>-->
<!--								<p class="proctor-other">用时：134：34</p>-->
<!--							</div>-->
<!--						</li>-->
<!--						<li>-->
<!--							<span class="proctor-head"><img src=""></span>-->
<!--							<div class="fail-score proctor-con">-->
<!--								<p class="proctor-username">呜呜</p>-->
<!--								<p class="proctor-state">34分</p>-->
<!--								<p class="proctor-other">用时：19：35</p>-->
<!--							</div>-->
<!--						</li>-->
<!--						<li>-->
<!--							<span class="proctor-head"><img src=""></span>-->
<!--							<div class="great-score proctor-con">-->
<!--								<p class="proctor-username">张一</p>-->
<!--								<p class="proctor-state">87分</p>-->
<!--								<p class="proctor-other">用时：19：35</p>-->
<!--							</div>-->
<!--						</li>-->
<!--						<li>-->
<!--							<span class="proctor-head"><img src=""></span>-->
<!--							<div class="just-pass proctor-con">-->
<!--								<p class="proctor-username">张一</p>-->
<!--								<p class="proctor-state">69分</p>-->
<!--								<p class="proctor-other">用时：19：35</p>-->
<!--							</div>-->
<!--						</li>-->
<!--						<li>-->
<!--							<span class="proctor-head"><img src=""></span>-->
<!--							<div class="fail-score proctor-con">-->
<!--								<p class="proctor-username">张一</p>-->
<!--								<p class="proctor-state">59分</p>-->
<!--								<p class="proctor-other">用时：19：35</p>-->
<!--							</div>-->
<!--						</li>-->
					</ul>
				</div>
			</div>
		</div>
	</div>
    <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog detail-dialog">
            <div class="modal-content ">
                <div class="modal-header bg-589 detail-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <div class="detail-header-con">
                        <div class="detail-userimg">
                            <img src="">
                        </div>
                        <div class="detail-info">
                            <h1>鱼儿</h1>
                            <p>本次考试成绩：72分</p>
                            <p>本次考试用时：92：00</p>
                            <p>本次考试排名：12名</p>
                        </div>
                        <a href="javascript:;" class="check-paper-btn">查看考卷</a>
                    </div>
                </div>
                <div class="modal-body ">
                    <div class="detail-body">
                        <ul class="detail-body-text">
                            <li>
                                <h1>PartI&nbsp;&nbsp;听力</h1>
                                <div>
                                    <span class="detail-text-l">得分：12分（满分34分）</span>
                                    <span class="detail-text-c">正确率：95%</span>
                                    <span class="detail-text-r">用时：24分钟（平均25分钟）</span>
                                </div>
                            </li>
                            <li>
                                <h1>PartIII&nbsp;&nbsp;阅读</h1>
                                <div>
                                    <span class="detail-text-l">得分：12分（满分34分）</span>
                                    <span class="detail-text-c">正确率：95%</span>
                                    <span class="detail-text-r">用时：24分钟（平均25分钟）</span>
                                </div>
                            </li>
                            <li>
                                <h1>PartI&nbsp;&nbsp;写作</h1>
                                <div>
                                    <span class="detail-text-l">得分：12分（满分34分）</span>
                                    <span class="detail-text-c">正确率：95%</span>
                                    <span class="detail-text-r">用时：24分钟（平均25分钟）</span>
                                </div>
                            </li>
                        </ul>
                        <div class="detail-body-table">
                            <h1>历史排名</h1>
                            <div class="detail-table-info"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?=$this->load->view("exam/tmpl/foot")?>
	<script type="text/javascript" src="<?=base_url()?>media/exam/js/highcharts.js"></script>
    <script type="text/javascript" src="<?=base_url()?>media/exam/js/testSystem.js"></script>
	<script type="text/javascript">
		$(function(){
		    $(".view_classes_details").on('click',function () {
//               window.location.href="<?//=anchorurl('teacher/view_classes_details')?>//"
                window.location.href="<?=anchorurl('student/getExamDetail')?>/"+"<?=$paper_id?>/"+<?=$group_id?>;
            });
		    $('.aver-score').highcharts({
		        chart: {
		            type:'pie'
		        },
		        title: {
		            text: ''
		        },
		        tooltip: {
		           	headerFormat: '{point.key}<br>',
		            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		        },
		        colors:[ //设置扇形的背景色
		        	"#589cbb",
		        	"#de9a39",
		        	"#c45243"

		        ],
		        credits: {  
			        enabled: false 
			    },  
			    legend:{
			        enabled :false
			    },
			    exporting: { 
			        enabled:false
				},
		        plotOptions: {
		            pie: {
		                allowPointSelect: true,
		                slicedOffset: 10,
		                cursor: 'pointer',
		                dataLabels: {
		                    enabled: false,  
		                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
		                    style: {
		                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
		                    }
		                }
		            }
		        },
		        series: [{
		            name: '占比',
		            data: [
		                ['优秀人数',<?=$average['A']?>],
		                ['刚及格人数',<?=$average['B']?>],
		                ['未及格人数',<?=$average['C']?>]
		            ]
		        }]
		    });
			$('.aver-time').highcharts({
		        chart: {
		           type:"pie"
		        },
		        title: {
		            text: ''
		        },
		        tooltip: {
		           	headerFormat: '{series.name}<br>',
		            pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
		        },
		        colors:[ //设置扇形的背景色
		        	"#df72d6",
		        	"#3faebe",
		        	"#98c097"

		        ],
		        credits: {  
			        enabled: false 
			    },  
			    legend:{
			        enabled :false
			    },
			    exporting: { 
			        enabled:false
				},
		        plotOptions: {
		            pie: {
		                allowPointSelect: true,
		                slicedOffset: 10,
		                cursor: 'pointer',
		                dataLabels: {
		                    enabled: false,
		                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
		                    style: {
		                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
		                    }
		                }
		            }
		        },
		        series: [{
		            name: '答题时间',
		            data: [
		                ['Part I',32.5],
		                ['Part II',30.5],
		                ['Part III',37]
		            ]
		        }]
		    });
		})

        $('.aver-score').highcharts({
            chart: {
                type:'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                headerFormat: '{point.key}<br>',
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            colors:[ //设置扇形的背景色
                "#589cbb",
                "#de9a39",
                "#c45243"

            ],
            credits: {
                enabled: false
            },
            legend:{
                enabled :false
            },
            exporting: {
                enabled:false
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    slicedOffset: 10,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: '占比',
                data: [
                    ['优秀人数',62.5],
                    ['刚及格人数',12.5],
                    ['未及格人数',25]
                ]
            }]
        });
        $('.aver-time').highcharts({
            chart: {
                type:"pie"
            },
            title: {
                text: ''
            },
            tooltip: {
                headerFormat: '{series.name}<br>',
                pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
            },
            colors:[ //设置扇形的背景色
                "#df72d6",
                "#3faebe",
                "#98c097"

            ],
            credits: {
                enabled: false
            },
            legend:{
                enabled :false
            },
            exporting: {
                enabled:false
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    slicedOffset: 10,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: '答题时间',
                data: [
                    ['Part I',32.5],
                    ['Part II',30.5],
                    ['Part III',37]
                ]
            }]
        });
        $('.detail-table-info').highcharts({
            chart:{
                type: 'area',
                backgroundColor:'#f4f6f9'
            },
            title: {
                text: '',
                x: -20
            },
            subtitle: {
                text: '',
            },
            xAxis: {
                title: {
                    text: '日期',
                    align:'high',
                    style: {
                        color: '#000'
                    }

                },
                type: 'category',
                labels: {
                    //step:,
                    style: {
                        color: '#000'
                    },
                },
                // gridLineColor:'#4aa85a',
                // gridLineDashStyle:'Solid',
                gridLineWidth:0,
                // tickWidth:0,
                //tickmarkPlacement:'on'
            },
            yAxis: {
                title: {
                    align: 'high',
                    offset: 0,
                    text: '排名',
                    y: 20,
                    rotation: 0,
                    style: {
                        color: '#000'
                    },


                },
                labels: {
                    style: {
                        color: '#000'
                    }
                },

                // plotLines: [{
                //     value: 0,
                //     width: 1,
                //     color: '#f00'
                // }],
                gridLineColor:'#e9e9e9',
                gridLineDashStyle:'Solid'
            },
            tooltip: {
                useHTML: true,
                headerFormat: '<div>班级排名：{point.y:f}</div><br/>',
                pointFormat: '<b>点击圆点可以查看考卷</b>',
                backgroundColor:"#abb7d7",
                style:{'color':"#fff"}

            },
            credits: {
                enabled: false
            },
            legend:{
                enabled :false
            },
            plotOptions: {
                area: {
                    // color:{
                    //     linearGradient: [0,0,0,500],
                    //     stops: [
                    //         [0, 'rgba(80, 138, 161,.6)' ],
                    //         [1,'rgba(91, 101, 158,1)']
                    //     ]},
                    color:'#dfe5f2', //折线区域的背景色

                    lineColor:'#9babda',

                    // fillOpacity: 0.5
                },
                series: {
                    cursor: 'pointer',
                    point:{
                        events: {
                            click: function (event) {
                                //alert(this.options.name)
                                window.open(this.options.key)  //点击折线图中的某个点位的时候查看对应日期的考卷信息
                            }
                        }
                    }
                }
            },
            series: [{
                // name: '排名',
                data:[{
                    y:40, //排名
                    name:'01-02', //日期
                    key:'<?=anchorurl('teacher/view_test_detail')?>'  //对应日期的考卷地址
                },
                    {
                        y:24,
                        name:'02-02',
                        key:'<?=anchorurl('teacher/view_test_detail')?>'
                    },
                    {
                        y:20,
                        name:'03-02',
                        key:'<?=anchorurl('teacher/view_test_detail')?>'
                    },
                    {
                        y:21,
                        name:'06-02',
                        key:'<?=anchorurl('teacher/view_test_detail')?>'
                    },
                    {
                        y:32,
                        name:'06-12',
                        key:'http://www.baidu.com'
                    },
                    {
                        y:25,
                        name:'07-02',
                        key:'http://www.baidu.com'
                    },
                    {
                        y:15,
                        name:'07-08',
                        key:'http://www.baidu.com'
                    },
                    {
                        y:10,
                        name:'07-22',
                        key:'http://www.baidu.com'
                    }],
                // [40, 24, 20, 21, 32, 25, 15,10],
                marker:{//线上数据点
                    radius:4,
                    lineWidth:2,
                    lineColor:'#9babda',
                    fillColor:'#fff',
                    states:{
                        hover:{
                            enabled:true,
                            lineWidth:8,
                            lineColor:'#9babda',
                        }
                    }
                }
            }]
        });
	</script>
</body>
</html>