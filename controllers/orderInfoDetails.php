<?php
require 'models/dataBase.php';
require 'models/product.php';
require 'models/orderDetails.php';
require 'models/orders.php';

$orderId = $_GET['id'];
$orderDetails = OrderDetails::getOne($orderId);
$stautId = $_GET['statutId'];
$statut = Orders::convertIdToStatut($stautId);
$total = 0;
foreach ($orderDetails as $info) {
  $total += $info->getPrice();
}

require 'views/orderInfoDetails.php';
?>