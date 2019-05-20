<?php 
if(empty($_SESSION['roleId'])){
  header('Location: index');
}
require 'models/dataBase.php';
require 'models/orderDetails.php';
OrderDetails::deleteOrderById($_GET['id']);
header('Location: basket');
?>