<?php
if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 3){
  header('Location: admin?case=product');
}
require 'models/product.php';
$id = $_GET['id'];
$product = new Product();
$product = $product->myConstruct($id, $_POST['productName'],  $_POST['price'],  $_POST['categorieId'], $_POST['description']);
Product::update($product);
header ('location: admin?case=product');
?>