<?php 
require 'views/graph.php';
?>

<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart']});
  google.charts.setOnLoadCallback(drawVisualization);

  // function drawChart() {
  //   var data = new google.visualization.DataTable();
  //   data.addColumn('string', 'month');
  //   data.addColumn('number', 'sale');
  //   data.addRows([
  //     ['jeux 1', 35],
  //     ['jeux 2', 25],
  //     ['jeux 3', 22],
  //     ['Autres', 18]
  //   ]);
    

  //   var options = {
  //     title: 'Company Performance',
  //     hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
  //     vAxis: {minValue: 0}
  //   };

  // var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
  //     chart.draw(data, null);

  //   // var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
  //   // chart.draw(data, options);
  // }
  function drawVisualization() {
    var query = new google.visualization.Query(
        'http://spreadsheets.google.com/tq?key=pCQbetd-CptGXxxQIG7VFIQ&pub=1');

    // Apply query language statement.
    query.setQuery('SELECT A,D WHERE D > 100 ORDER BY D');
    
    // Send the query with a callback function.
    query.send(handleQueryResponse);
  }

  function handleQueryResponse(response) {
    if (response.isError()) {
      alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
      return;
    }

    var data = response.getDataTable();
    visualization = new google.visualization.LineChart(document.getElementById('myPieChart'));
    visualization.draw(data, {legend: 'bottom'});
  }
</script>

