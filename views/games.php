<?php 
if(empty($_SESSION['roleId'])){
  header('Location: index');
}
require 'layout/header.php';
require 'models/product.php';
?>

<h2>Jeux</h2>


<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Produit</th>
      <th scope="col">Catégories</th>
      <th scope="col">Prix</th>
      <th scope="col" class="tr-right">Action</th>
    </tr>
  </thead>
  <tbody>
<?php 
$produit = Product::GetAll();
$row = FALSE;

foreach($produit as $line){
  
  if($row == FALSE){
    echo '<tr> <td>' . 
    $line->getImageLink() . '</td> <td>' .
    $line->getProductName() . '</td> <td>' .
    Product::categorieConvert($line->getCategorieId()) . '</td> <td>' .
    number_format($line->getPrice(), 2, ',', ' ') . '€</td> <td>';
    
    echo '</td> </tr>';
  }

  if($row == TRUE){
    echo '<tr> <td>' . 
    $line->getImageLink() . '</td> <td>' .
    $line->getProductName() . '</td> <td>' .
    Product::categorieConvert($line->getCategorieId()) . '</td> <td>' .
    number_format($line->getPrice(), 2, ',', ' ') . '€</td> <td>';
    
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
  </tbody>
</table>

<?php 
require 'layout/footer.php';
?>
