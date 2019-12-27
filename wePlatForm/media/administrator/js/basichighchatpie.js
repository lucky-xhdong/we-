$(function () {
	Highcharts.chart('heightChatPie', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: ''
		},
		colors:[
			'#4ed3ef',
			'#ddd'

		],
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %',
					style: {
						color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
					}
				}
			}
		},
		series: [{
			name: '班级达标率',
			colorByPoint: true,
			data: [{
				name: '达标率',
				y: 56.33,
				sliced: true
			},
				{
				name: '不达标率',
				y: 24.03,

			}]
		}],
		exporting: {
			enabled:false
		},
		credits: {
			enabled: false
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