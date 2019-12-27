$(function () {

	Highcharts.chart('chartContainer', {
		chart: {
			polar: true,
			type: 'line',
			height:340,
			marginTop:-20


		},
		title: {
			text: '',
			x: -80
		},
		pane: {
			center: ['50%', '50%'],
			size: '69%'
		},
		xAxis: {
			categories: ['综合数据', '活跃度', '学习时间 频率', '能力概念',
				'功能键使用次数'],
			tickmarkPlacement: 'on',
			lineWidth: 0
		},

		yAxis: {
			gridLineInterpolation: 'polygon',
			lineWidth: 0,
			min: 0
		},

		tooltip: {
			shared: true,
			pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
		},
/*
		legend: {
			align: 'right',
			verticalAlign: 'top',
			y: 70,
			layout: 'vertical',
		},*/

		series: [{
			name: '平均得分',
			data: [18, 7, 16, 20, 15],
			pointPlacement: 'on',
			showInLegend: false,
			type: 'area',
		}],
		exporting: {
			enabled:false
		},
		lang:{
			contextButtonTitle:"图表导出菜单",
			decimalPoint:".",
			downloadJPEG:"下载JPEG图片",
			downloadPDF:"下载PDF文件",
			downloadPNG:"下载PNG文件",
			downloadSVG:"下载SVG文件",
			drillUpText:"返回 {series.name}",
			loading:"加载中",
			months:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
			noData:"没有数据",
			numericSymbols: [ "千" , "兆" , "G" , "T" , "P" , "E"],
			printChart:"打印图表",
			resetZoom:"恢复缩放",
			resetZoomTitle:"恢复图表",
			shortMonths: [ "Jan" , "Feb" , "Mar" , "Apr" , "May" , "Jun" , "Jul" , "Aug" , "Sep" , "Oct" , "Nov" , "Dec"],
			thousandsSep:",",
			weekdays: ["星期一", "星期二", "星期三", "星期四", "星期五", "星期六","星期天"]
		}

	});
});