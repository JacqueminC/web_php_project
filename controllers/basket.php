<?php
if(empty($_SESSION['roleId'])){
  header('Location: index');
}
require 'models/dataBase.php';
require 'models/product.php';
require 'models/orderDetails.php';
$data = OrderDetails::getBasketById($_SESSION['id']);
$total = 0;
$count = 0;
$orderId = 0;
foreach ($data as $line) {
  $total = $total + $line->getPrice();
  $count += 1;
  $orderId = $line->getOrderId();
}
require 'views/basket.php';
?>