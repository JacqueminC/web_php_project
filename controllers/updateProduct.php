<?php
require 'models/product.php';
$id = $_GET['id'];
$product = new Product();
$product = $product->myConstruct($id, $_POST['productName'],  $_POST['price'],  $_POST['categorieId'], $_POST['description']);
Product::update($product);
header ('location: admin?case=product');
?>