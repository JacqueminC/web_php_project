<?php 
require 'layout/header.php';
?>

<h2>Panier</h2>

<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nom</th>   
      <th scope="col">Prix</th>
      <th scope="col" class="tr-right">Action</th>
    </tr>
  </thead>
  <tbody>

<?php

$row = FALSE;

foreach($data as $prod){  

  if($row == FALSE){
    echo '<tr> <td>' . 
    $prod->getProductNameById($prod->getProductId()) . '</td> <td>' .
    number_format($prod->getPrice(), 2, ',', ' ') . '€</td> <td class="td-right">';
    echo '<a href="OrderDelete?case=1&id='. $prod->getId() .'"><button type="button" class="btn btn-danger"> Supprimer</button></a>';

    echo '</td> </tr>';
  }
  
  if($row == TRUE){
    echo '<tr> <td>' . 
    $prod->getProductNameById($prod->getProductId()) . '</td> <td>' .
    number_format($prod->getPrice(), 2, ',', ' ') . '€</td> <td class="td-right">';
    echo '<a href=""><button type="button" class="btn btn-danger"> Supprimer</button></a>';

    echo '</td> </tr>';
  }

  if($row == FALSE){
    $row = TRUE;
  } 
  else{
    $row = FALSE;
  } 
}
  echo '<tr> <td> TOTAL </td>
  <td>' . number_format($total, 2, ',', ' ') . '€</td>
  <td class="td-right"> <a href=""><button type="button" class="btn btn-success">Commander</button> </a></td> </tr>';
?>
  </tbody>
</table>


<?php 
require 'layout/footer.php';
?>
