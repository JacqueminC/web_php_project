<?php
require 'models/dataBase.php';
require 'models/product.php';
$id = $_GET['id'];
$product = Product::getProduct($id);
Product::addGameBasket($product);
header ('Location: games');
?>