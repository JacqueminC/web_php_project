<?php
if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 3){
  header('Location: index');
}
require 'models/database.php';
require 'models/product.php';
Product::delete($_GET['id']);

header ('Location: admin?case=product');

?>