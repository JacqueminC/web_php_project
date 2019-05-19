<?php
require 'models/dataBase.php';
require 'models/product.php';
require 'models/orderDetails.php';
require 'models/orders.php';

$orders = Orders::getAll();

require 'views/orderInfo.php';
?>