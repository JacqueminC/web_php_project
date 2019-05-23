<?php
if(empty($_SESSION['roleId'])){
  header('Location: index');
}
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

require 'views/orderInfoDetailsCustomer.php';
?>