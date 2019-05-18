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
      <th scope="col">Fast Panier</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php 

$row = FALSE;

foreach($produit as $line){
  echo '<tr>';
  if($row == FALSE){
    echo '<td class="drag"> <img class="smallImg" src="./images/jeux/'. $line->getImageLink() . '"></td>';
    echo '<td>' . $line->getProductName() . '</td>';
    echo '<td>' . Product::categorieConvert($line->getCategorieId()) . '</td>';
    echo '<td>' . number_format($line->getPrice(), 2, ',', ' ') . '€</td> ';
    echo '<td> <div class="dropZone"><p class="drop">déplacer l\'image ici pour ajouter au panier</p></div> </td>';  
    echo '<td> <a href="detailGame?id='. $line->getId() .'"><button class="btn btn-info">Details</button></a> </td>'; 
  }

  if($row == TRUE){
    echo '<td class="drag"> <img class="smallImg" src="./images/jeux/'. $line->getImageLink() . '"></td>';
    echo '<td>' . $line->getProductName() . '</td>';
    echo '<td>' . Product::categorieConvert($line->getCategorieId()) . '</td>';
    echo '<td>' . number_format($line->getPrice(), 2, ',', ' ') . '€</td> ';
    echo '<td> <div class="dropZone"><p class="drop">déplacer l\'image ici pour ajouter au panier</p></div> </td>';
    echo '<td> <a href="detailGame?id='. $line->getId() .'"><button class="btn btn-info">Details</button></a> </td>';
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
