<?php
if($_GET['action'] == 'create'){
  if(!empty($_POST['productName']) &&
  !empty($_POST['price']) &&
  !empty($_POST['categorieId'])){
    require 'models/product.php';

      $product = new Product();  
      $product = $product->myConstruct(0,$_POST['productName'], $_POST['price'], $_POST['categorieId'], $_POST['description']);
      
      Product::newProduct($product);
      
      header('Location: admin?case=product');
  }
  else {
    require 'views/addProduct.php';
  }
}
else if($_GET['action'] == 'update'){
  require 'views/updateProduct.php';
}
else if($_GET['action'] == 'delete'){
  require 'views/deleteProduct.php';
}
?>