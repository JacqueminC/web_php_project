<?php 
require 'models/product.php';
require 'models/orderDetails.php';
require 'layout/header.php';
?>

<h2>Panier</h2>

<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Catégorie</th>      
      <th scope="col">Prix</th>
      <th scope="col" class="tr-right">Action</th>
    </tr>
  </thead>
  <tbody>

<?php
$data = OrderDetails::getOrder($_SESSION['id']);
$row = FALSE;

foreach($data as $prod){

  $line = Product::getProduct($prod->getId());

  if($row == FALSE){
    echo '<tr> <td>' . 
    $line->getId() . '</td> <td>' .
    $line->getProductName() . '</td> <td>' .
    number_format($line->getPrice(), 2, ',', ' ') . '€</td> <td>' .
    $cat = Product::categorieConvert($line->getCategorieId()) . '</td> <td class="td-right">';

    
    echo '<button type="button" class="btn btn-danger disabled"> Supprimer</button>';
    echo '</td> </tr>';
  }
  
  if($row == TRUE){
    echo '<tr> <td>' . 
    $line->getId() . '</td> <td>' .
    $line->getProductName() . '</td> <td>' .
    number_format($line->getPrice(), 2, ',', ' ') . '€</td> <td>' .
    $cat = Product::categorieConvert($line->getCategorieId()) . '</td> <td class="td-right">';

    echo '<a href="product?action=update&id=' . $line->getId() .'"><button type="button" class="btn btn-warning"> Modifier</button></a>';
        
    if($_SESSION['roleId'] <= 3){
      echo '<a href="product?action=delete&id=' . $line->getId() .'"><button type="button" class="btn btn-danger"> Supprimer</button></a>';
    }
    else {
      echo '<button type="button" class="btn btn-danger disabled"> Supprimer</button>';
    }
    echo '</td> </tr>';
  }

  if($row == FALSE){
    $row = TRUE;
  } 
  else{
    $row = FALSE;
  } 
}
?>

<?php 
require 'layout/footer.php';
?>
