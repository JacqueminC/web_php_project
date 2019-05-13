<?php 
if(empty($_SESSION['roleId'])){
  header('Location: index');
}
require 'layout/header.php';
require 'models/product.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<h2>Jeux</h2>


<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Images</th>
      <th scope="col">Produit</th>
      <th scope="col">Catégories</th>
      <th scope="col">Prix</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php 
$produit = Product::GetAll();
$row = FALSE;

foreach($produit as $line){
  
  if($row == FALSE){
    echo '<tr id="limite"> <td id="drag"> <div class="imgTmp" </div>' . 
    $line->getImageLink() . '</td> <td >' .
    $line->getProductName() . '</td> <td>' .
    Product::categorieConvert($line->getCategorieId()) . '</td> <td>' .
    number_format($line->getPrice(), 2, ',', ' ') . '€</td> <td id="drop">';
    echo ' <div class="dropZone"> déplacer l\'image ici pour ajouter au panier </div> </td>' ;    
    echo '</tr>';
  }

  if($row == TRUE){
    echo '<tr id="limite"> <td id="drag"> <div class="imgTmp" </div>' .  
    $line->getImageLink() . '</td> <td id="drag">' .
    $line->getProductName() . '</td> <td>' .
    Product::categorieConvert($line->getCategorieId()) . '</td> <td>' .
    number_format($line->getPrice(), 2, ',', ' ') . '€</td> <td id="drop">';
    echo ' <div class="dropZone"> déplacer l\'image ici pour ajouter au panier </div> </td>' ;    
    echo '</tr>';
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


<script>
  $("#drag").draggable({
    containment : '#limite',
    revert: true
  });
  $('#drop').droppable({
    drop : function(){
      $("#drop")
         .addClass("colorChange")
         .addClass("bounce");
    }
  });
</script>
    


<?php 
require 'layout/footer.php';
?>
