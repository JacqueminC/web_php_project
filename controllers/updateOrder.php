<?php 
require 'models/dataBase.php';
require 'models/orders.php';

$orders = Orders::getONe($_GET['orderId']);
$orders->setStatutId($_POST['statutId']);
Orders::updateOrder($orders);

header('Location: orderInfo');
?>