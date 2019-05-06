<?php
require 'models/product.php';
Product::delete($_GET['id']);

header ('Location: admin?case=product');

?>