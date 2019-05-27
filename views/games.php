<?php 
require 'layout/header.php';
?>

<h2>Jeux</h2>
 
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Images</th>
      <th scope="col">Produit</th>
      <th scope="col">Catégories</th>
      <th scope="col">Prix</th>
      <?php
if (!empty($_SESSION['id'])) {
  echo '<th scope="col">Fast Panier</th>';
}
      ?>      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php 

foreach($produit as $line){
  
    if (!empty($_SESSION['id'])) {
      echo '<tr class="drag">';
        echo '<td><img id=' . $line->getId() . ' class="smallImg" src="./images/jeux/'. $line->getImageLink() . '"></td>';
    }
    else{
      echo '<tr>';
      echo '<td><img class="smallImg" src="./images/jeux/'. $line->getImageLink() . '"></td>';
    }
    
    echo '<td>' . $line->getProductName() . '</td>';
    echo '<td>' . Product::categorieConvert($line->getCategorieId()) . '</td>';
    echo '<td>' . number_format($line->getPrice(), 2, ',', ' ') . '€</td> ';
    if (!empty($_SESSION['id'])) {
      echo '<td class="drop"><div id="basket" class="smallImg"></div></td>';
    }
      
    echo '<td> <a href="detailGame?id='. $line->getId() .'"><button class="btn btn-info">Details</button></a> </td>'; 
  echo '</tr>';  
}
?>
  </tbody>
</table>

<?php 
require 'layout/footer.php';
?>
