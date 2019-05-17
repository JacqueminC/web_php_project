<?php
require 'models/product.php';
$produit = Product::GetAll();
require 'views/games.php';
?>