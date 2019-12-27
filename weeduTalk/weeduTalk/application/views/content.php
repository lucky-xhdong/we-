<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head lang="en">
  <title>  </title>
<meta charset="UTF-8" >
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
 <?php $this->load->view('tmpl/jsHeighBasicLibirary'); ?>
 <?php $this->load->view('tmpl/heightCharts'); ?>
<style  type="text/css">
    *{padding:0;margin:0;}
    .qgjx-mobile-container{width:100%;margin:0 auto;background: #627879;height:300px;overflow: hidden;}
    #chartContainer{width:98%;margin:0 auto;overflow: auto;background: #627879; }
    #chartContainer svg{overflow: auto !important;padding-left:14px;}

    .highcharts-container{font-size:10px;text-align:center;}
    .highcharts-background{fill:none !important;}
    .highcharts-axis-labels{fill:#fff !important;}
    .highcharts-axis-line{stroke:none !important;}
    .highcharts-grid-line{stroke:#fff !important;stroke-dasharray:4;}
    .highcharts-xaxis-grid .highcharts-grid-line{stroke-dasharray:4;}
    .highcharts-point{stroke-width:3px !important;}
    .highcharts-series path{fill:rgba(167,201,199,.5);}
    .highcharts-color-0{fill:#9fd7d4 !important;stroke:#fff !important;}
    @media screen and (max-width:321px){
        #chartContainer svg{padding-left:20px;}
    }
</style>
 </head>
 <body>
    <section class="qgjx-mobile-container">
        <div id="chartContainer">
        </div>
    </section>
<script>
    $(function () {

//    Highcharts.chart('chartContainer', {
//    chart: {
//    polar: true,
//    type: 'line'
//    },
//    title: {
//    text: '',
//    x: -80
//    },
//    pane: {
//    size: '80%'
//    },
//
//    yAxis: {
//    gridLineInterpolation: 'polygon',
//    lineWidth: 0,
//    min: 0
//    },
//
//    tooltip: {
//    shared: true,
//    pointFormat: '<span style="color:{series.color}">{series.name}: <b>${point.y:,.0f}</b><br/>'
//		},
//
//		legend: {
//			align: 'right',
//			verticalAlign: 'top',
//			y: 70,
//			layout: 'vertical',
//		},
//
//		series: [{
//			name: 'Allocated Budget',
//			data: [43000, 19000, 60000, 35000, 17000, 10000],
//			pointPlacement: 'on',
//			showInLegend: false,
//			type: 'area',
//		}]
//
//	});
});
</script>
</body>
</html>