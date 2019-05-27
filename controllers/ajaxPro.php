<?php
require 'models/product.php';
$data = $_POST['position'];
$product = Product::getProduct($data);
Product::addGameBasket($product);
?>