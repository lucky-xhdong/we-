$(document).ready(function () {
	var data = [
		{
			type: 'Organic Search',
			month1: 1725090,
			month2: 3136190
		},
		{
			type: 'Paid Search',
			month1: 925090,
			month2: 2136190
		},
		{
			type: 'Direct',
			month1: 425090,
			month2: 936190
		},
		{
			type: 'Referral',
			month1: 1250900,
			month2: 2536190
		},
		{
			type: 'Twitter',
			month1: 350900,
			month2: 681900
		},
		{
			type: 'Facebook',
			month1: 381900,
			month2: 831500
		}
	];


	// prepare jqxChart settings
	var settings = {
		title: "Website audience acquision by source",
		description: "Month over month comparison",
		enableAnimations: false,
		showLegend: true,
		padding: { left: 5, top: 5, right: 5, bottom: 5 },
		titlePadding: { left: 0, top: 0, right: 0, bottom: 5 },
		source: data,
		colorScheme: 'scheme05',
		xAxis:
		{
			dataField: 'type',
			displayText: 'Traffic source',
			valuesOnTicks: true,
			labels: { autoRotate: false }
		},
		valueAxis:
		{
			unitInterval: 1000000,
			labels: {
				formatSettings: { decimalPlaces: 0 },
				formatFunction: function (value, itemIndex, serieIndex, groupIndex) {
					return Math.round(value / 1000) + ' K';
				}
			}
		},
		seriesGroups:
			[
				{
					spider: true,
					startAngle: 0,
					endAngle: 360,
					radius: 120,
					type: 'spline',
					series: [
						{ dataField: 'month1', displayText: 'January 2014', opacity: 0.7, radius: 2, lineWidth: 2, symbolType: 'circle' },
						{ dataField: 'month2', displayText: 'February 2014', opacity: 0.7, radius: 2, lineWidth: 2, symbolType: 'square' }
					]
				}
			]
	};


	// create the chart
	$('#chartContainer').jqxChart(settings);

	// get the chart's instance
	var chart = $('#chartContainer').jqxChart('getInstance');

	// start angle slider
	$('#sliderStartAngle').jqxSlider({ width: 240, min: 0, max: 360, step: 1, ticksFrequency: 20, mode: 'fixed' });

	$('#sliderStartAngle').on('change', function (event) {
		var value = event.args.value;
		chart.seriesGroups[0].startAngle = value;
		chart.seriesGroups[0].endAngle = value + 360;
		chart.update();
	});

	// radius slider
	$('#sliderRadius').jqxSlider({ width: 240, min: 80, max: 140, value: 120, step: 1, ticksFrequency: 20, mode: 'fixed' });

	$('#sliderRadius').on('change', function (event) {
		var value = event.args.value;
		chart.seriesGroups[0].radius = value;
		chart.update();
	});

	// color scheme drop down
	var colorsSchemesList = ["scheme01", "scheme02", "scheme03", "scheme04", "scheme05", "scheme06", "scheme07", "scheme08"];
	$("#dropDownColors").jqxDropDownList({ source: colorsSchemesList, selectedIndex: 4, width: '200', height: '25', dropDownHeight: 100 });

	$('#dropDownColors').on('change', function (event) {
		var value = event.args.item.value;
		chart.colorScheme = value;
		chart.update();
	});

	// series type drop down
	var seriesList = ["splinearea", "spline", "column", "scatter", "stackedcolumn", "stackedsplinearea", "stackedspline"];
	$("#dropDownSeries").jqxDropDownList({ source: seriesList, selectedIndex: 1, width: '200', height: '25', dropDownHeight: 100 });

	$('#dropDownSeries').on('select', function (event) {
		var args = event.args;
		if (args) {
			var value = args.item.value;

			chart.seriesGroups[0].type = value;
			chart.update();
		}
	});

	// auto-rotate labels checkbox
	$("#cehckBoxAutoRotateLabels").jqxCheckBox({ width: 120, height: 25, hasThreeStates: false, checked: false });
	$("#cehckBoxAutoRotateLabels").on('change', function (event) {
		settings.xAxis.labels.autoRotate = event.args.checked;
		settings.valueAxis.labels.autoRotate = event.args.checked;
		chart.update();
	});

	// ticks between
	$("#checkBoxTicksBetween").jqxCheckBox({ width: 120, height: 25, hasThreeStates: false, checked: false });
	$("#checkBoxTicksBetween").on('change', function (event) {
		settings.xAxis.valuesOnTicks = !event.args.checked;
		chart.update();
	});

});