<?php 
require 'layout/header.php';
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

$row = FALSE;

foreach($produit as $line){
  echo '<tr>';
  if($row == FALSE){
    echo '<td class="drag"> <div class="img"> </div> </td>';
    echo '<td>' . $line->getProductName() . '</td>';
    echo '<td>' . Product::categorieConvert($line->getCategorieId()) . '</td>';
    echo '<td>' . number_format($line->getPrice(), 2, ',', ' ') . '€</td> ';
    echo '<td class="drop"> <div class="dropZone"> déplacer l\'image ici pour ajouter au panier </div> </td>' ;  
  }

  if($row == TRUE){
    echo '<td class="drag"> <div class="img"> </div> </td>';
    echo '<td>' . $line->getProductName() . '</td>';
    echo '<td>' . Product::categorieConvert($line->getCategorieId()) . '</td>';
    echo '<td>' . number_format($line->getPrice(), 2, ',', ' ') . '€</td> ';
    echo '<td class="drop"> <div class="dropZone"> déplacer l\'image ici pour ajouter au panier </div> </td>' ;     
  }
  echo '</tr>';

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
if(!empty($_SESSION['login'])){
  echo '<script>
  $(".drag").draggable({
    containment : ".limite",
    revert: true
  });
  $(".drop").droppable({
    drop : function(){
      $(".drop")
         .addClass("colorChange")
         .addClass("bounce");
    }
  });
</script>';
}

?>

    


<?php 
require 'layout/footer.php';
?>
