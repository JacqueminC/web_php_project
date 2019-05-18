<?php 
require 'models/dataBase.php';
require 'models/orderDetails.php';
if($_GET['case'] == 1){
  OrderDetails::deleteOrderById($_GET['id']);
  header('Location: basket');
}
elseif ($_GET['case'] == 2) {
  OrderDetails::sendOrder($_GET['id']);
  //require 'Confirm page'
}
?>