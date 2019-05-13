<?php 
require 'layout/header.php';
require 'models/product.php';
$id = $_GET['id'];
$product = Product::getProduct($id);
?>

<h1 class="text-center">Détails</h1>

<div class="d-flex justify-content-center">



<div class="row">
    <table class="table table-sm">
<?php
echo '<tr>
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
    <a href="admin?case=product"><button type="button" class="btn btn-secondary">Retour</button></a>
    <?php     
    echo '<a href="deleteProduct?id=' . $id .'"><button type="submit" class="btn btn-danger">Supprimer</button></a>';
    ?>
  </div> 
</div>
  

<?php 
require 'layout/footer.php';
?>
