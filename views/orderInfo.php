<?php 
require 'layout/header.php';
?>

<h2>Commande en cours</h2>

<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">utilisateur</th>
      <th scope="col">Statut</th>
      <th  class="tr-right" scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php 

$row = FALSE;

foreach($orders as $line){
  echo '<tr>';
  if($row == FALSE){
    echo '<td>' . $line->getIdOrder() . '</td>';
    echo '<td>' . $line->convertIdToUser($line->getUserId()) . '</td>';
    echo '<td>' . $line->convertIdToStatut($line->getStatutId()) . '</td>';
    echo '<td class="td-right"> <a href="orderInfoDetails?id='. $line->getIdOrder() .'&statutId=' . $line->getStatutId() . '"><button class="btn btn-info">Voir</button></a> </td>';
  }

  if($row == TRUE){
    echo '<td>' . $line->getIdOrder() . '</td>';
    echo '<td>' . $line->convertIdToUser($line->getUserId()) . '</td>';
    echo '<td>' . $line->convertIdToStatut($line->getStatutId()) . '</td>';
    echo '<td class="td-right"> <a href="orderInfoDetails?id='. $line->getIdOrder() .'&statutId=' . $line->getStatutId() . '"><button class="btn btn-info">Voir</button></a> </td>';
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
require 'layout/footer.php';
?>
