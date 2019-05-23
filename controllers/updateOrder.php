<?php 
require 'models/dataBase.php';
require 'models/orders.php';
echo $_GET['orderId'];
$orders = Orders::getONe($_GET['orderId']);
echo $orders->getIdOrder();
$orders->setStatutId($_POST['statutId']);
Orders::updateOrder($orders);

header('Location: orderInfo');
?>