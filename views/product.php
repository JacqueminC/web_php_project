<?php
require 'models/product.php'
?>

<div class="row">
  <div class="col-0">
  
<?php
  if($_SESSION['roleId'] <= 2){
    echo '<a href="addEmployee"><button type="button" class="btn btn-success">Ajouter</button> </a>';
  }
  else {
    echo '<button type="button" class="btn btn-success disabled">Ajouter</button>';
  }
?>
  </div>    
</div>

<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
      <th scope="col">Catégorie</th>
      <th scope="col" class="tr-right">Action</th>
    </tr>
  </thead>
  <tbody>
<?php
$data = new Product();
$data = $data->getAll();
$row = FALSE;

foreach($data as $line){


  if($row == FALSE){
    echo '<tr> <td>' . 
    $line['id'] . '</td> <td>' .
    $line['productName'] . '</td> <td>' .
    number_format($line['price'], 2, ',', ' ') . '€</td> <td>' .
    $cat = Product::categorieConvert($line['categorieId']) . '</td> <td class="td-right">';

    echo '<a href=""><button type="button" class="btn btn-warning"> Modifier</button></a>';
        
    if($_SESSION['roleId'] <= 3){
      echo '<a href=""><button type="button" class="btn btn-danger"> Supprimer</button></a>';
    }
    else {
      echo '<button type="button" class="btn btn-danger disabled"> Supprimer</button>';
    }
    echo '</td> </tr>';
  }
  
  if($row == TRUE){
    echo '<tr class="table-light"> <td>' . 
    $line['id'] . '</td> <td>' .
    $line['productName'] . '</td> <td>' .
    number_format($line['price'], 2, ',', ' ') . '€</td> <td>' .
    $cat = Product::categorieConvert($line['categorieId']) . '</td> <td class="td-right">';

    echo '<a href=""><button type="button" class="btn btn-warning"> Modifier</button></a>';
        
    if($_SESSION['roleId'] <= 3){
      echo '<a href=""><button type="button" class="btn btn-danger"> Supprimer</button></a>';
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
  </tbody>
</table> 