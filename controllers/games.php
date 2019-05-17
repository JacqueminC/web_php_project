<?php
require 'models/dataBase.php';
require 'models/product.php';
$produit = Product::GetAll();
require 'views/games.php';
?>