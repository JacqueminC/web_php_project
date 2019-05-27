<?php
require 'models/product.php';
$position = $_POST['position'];
$product = Product::getProduct(1);
Product::addGameBasket($product);

?>