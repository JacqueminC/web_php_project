<?php
require 'models/dataBase.php';
require 'models/product.php';
require 'models/orderDetails.php';
OrderDetails::sendOrder($_GET['orderId']);
require 'views/confirmation.php';
?>