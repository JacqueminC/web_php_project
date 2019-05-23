<?php 
require 'views/graph.php';
require 'models/product.php';
require 'models/orderDetails.php';
$info = OrderDetails::getThreebest();
// print_r($info);

// echo $info[0][0];
// Array ( [0] => Array ( [productId] => 1 [0] => 1 [COUNT(productId)] => 8 [1] => 8 ) [1] => Array ( [productId] => 5 [0] => 5 [COUNT(productId)] => 5 [1] => 5 ) [2] => Array ( [productId] => 4 [0] => 4 [COUNT(productId)] => 4 [1] => 4 ) ) 
// foreach ($info as $line) {
//   $test = $line->getProductId();
// }
?>

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);


  function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'month');
    data.addColumn('number', 'sale');
    data.addRows([
      ['<?php echo Product::getProduct($info[0][0])->getProductName() ?>', <?php echo $info[0][1] ?>],
      ['<?php echo Product::getProduct($info[1][0])->getProductName() ?>', <?php echo $info[1][1] ?>],
      ['<?php echo Product::getProduct($info[2][0])->getProductName() ?>', <?php echo $info[2][1] ?>]
    ]);

  var chart = new google.visualization.PieChart(document.getElementById('myChart'));
      chart.draw(data, null);
  }

</script>

