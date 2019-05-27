<?php 
require 'layout/header.php';
?>

<div class="d-flex justify-content-center">

<div class="row">
    <table class="table table-sm">
<?php
echo '<tr>
<td>image:</td>
<td> <img class="mediumImg" src="./images/jeux/'. $product->getImageLink() .'"> </td>
</tr>
<tr>
<td>Id:</td>
<td>' . $product->getId() .'</td>
</tr>
<tr>
<td>Nom:</td>
<td>' . $product->getProductName() .'</td>
</tr>
<tr>
<td>Prix:</td>
<td>' . number_format($product->getPrice(), 2, ',', ' ') .'€</td>
</tr>
<td>Catégorie:</td>
<td>' . Product::categorieConvert($product->getCategorieId()) .'</td>
</tr>
<td>Description:</td>
<td>' . $product->getDescription() .'</td>
</tr>';
?>  
  </table>
</div>
</div>

<div class="d-flex justify-content-center">
  <div class="row">        
    <a href="games"><button type="button" class="btn btn-secondary">Retour</button></a>
    <?php  
    if (!empty($_SESSION['id'])) {
      echo '<a href="addBasket?id=' . $product->getId() .'"><button type="submit" class="btn btn-success">Ajouter au panier</button></a>';
    }   
    
    ?>
  </div> 
</div>

</div>


<?php 
require 'layout/footer.php';
?>
