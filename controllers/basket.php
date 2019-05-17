<?php
if(empty($_SESSION['roleId'])){
  header('Location: index');
}
require 'models/dataBase.php';
require 'models/product.php';
require 'models/orderDetails.php';
$data = OrderDetails::getOrder($_SESSION['id']);
require 'views/basket.php';
?>