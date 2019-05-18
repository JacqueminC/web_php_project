<?php
if(empty($_SESSION['roleId'])){
  header('Location: index');
}
require 'models/dataBase.php';
require 'models/product.php';
require 'models/orderDetails.php';
$data = OrderDetails::getBasketById($_SESSION['id']);
$total = 0;
foreach ($data as $line) {
  $total = $total + $line->getPrice();
}
require 'views/basket.php';
?>