am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

/* Create chart instance */
var chart = am4core.create("radiallinegraphChart", am4charts.RadarChart);

var data = [];
var value1 = 500;
var value2 = 600;

for(var i = 0; i < 12; i++){
  let date = new Date();
  date.setMonth(i, 1);
  value1 -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 50);
  value2 -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 50);
  data.push({date:date, value1:value1, value2:value2})
}

chart.data = data;

/* Create axes */
var categoryAxis = chart.xAxes.push(new am4charts.DateAxis());

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.extraMin = 0.2;
valueAxis.extraMax = 0.2;
valueAxis.tooltip.disabled = true;

/* Create and configure series */
var series1 = chart.series.push(new am4charts.RadarSeries());
series1.dataFields.valueY = "value1";
series1.dataFields.dateX = "date";
series1.strokeWidth = 3;
series1.tooltipText = "{valueY}";
series1.name = "Series 2";
series1.bullets.create(am4charts.CircleBullet);

var series2 = chart.series.push(new am4charts.RadarSeries());
series2.dataFields.valueY = "value2";
series2.dataFields.dateX = "date";
series2.strokeWidth = 3;
series2.tooltipText = "{valueY}";
series2.name = "Series 2";
series2.bullets.create(am4charts.CircleBullet);

chart.scrollbarX = new am4core.Scrollbar();
chart.scrollbarY = new am4core.Scrollbar();

chart.cursor = new am4charts.RadarCursor();

chart.legend = new am4charts.Legend();
 

}); // end am4core.ready()