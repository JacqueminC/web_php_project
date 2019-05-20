<?php 
require 'views/graph.php';
?>

<script type="text/javascript">
google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // function drawChart() {
    //   // Define the chart to be drawn.
    //   var data = new google.visualization.DataTable();
    //   data.addColumn('string', 'Element');
    //   data.addColumn('number', 'Percentage');
    //   data.addRows([
    //     ['Nitrogen', 0.78],
    //     ['Oxygen', 0.21],
    //     ['Other', 0.01]
    //   ]);

  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'month');
    data.addColumn('number', 'sale');
    data.addRows([
      ['Janvier', 18],
      ['Février', 25],
      ['Mars', 16]
    ]);

    var options = {
      title: 'Company Performance',
      hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
      vAxis: {minValue: 0}
    };

  var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
      chart.draw(data, null);

    // var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    // chart.draw(data, options);
  }
</script>

