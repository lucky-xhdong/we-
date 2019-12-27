$(function () {
	$('#innerpie').highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie',
			height:180
		},
		plotOptions: {
			pie: {
				innerSize: '90%', //也可以配置为10%的百分比形式
				dataLabels:{
					enabled:false
				}
			}
		},
		title: {
			text: ''
		},
		pane: {
			size: '50%'
		},
		colors:[
			'red',
			'blue'
		],
		series: [{
			name: '班级达标率',
			colorByPoint: true,
			data: [{
				name: '达标率',
				y: 80,
			},
				{
					name: '不达标率',
					y: 20,

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
	$('#innerpie1').highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie',
			height:180
		},
		plotOptions: {
			pie: {
				innerSize: '90%', //也可以配置为10%的百分比形式
				dataLabels:{
					enabled:false
				}
			}
		},
		title: {
			text: ''
		},
		pane: {
			size: '50%'
		},
		colors:[
			'red',
			'blue'
		],
		series: [{
			name: '班级达标率',
			colorByPoint: true,
			data: [{
				name: '达标率',
				y: 70,

			},
				{
					name: '不达标率',
					y: 30,

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
	$('#innerpie2').highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie',
			height:180
		},
		plotOptions: {
			pie: {
				innerSize: '90%', //也可以配置为10%的百分比形式
				dataLabels:{
					enabled:false
				}
			}
		},
		title: {
			text: ''
		},
		pane: {
			size: '50%'
		},
		colors:[
			'red',
			'blue'
		],
		series: [{
			name: '班级达标率',
			colorByPoint: true,
			data: [{
				name: '达标率',
				y: 90,
			},
				{
					name: '不达标率',
					y: 10,

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