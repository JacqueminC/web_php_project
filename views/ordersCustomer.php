
<h2>Commande en cours</h2>

<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Numéro</th>
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
    echo '<td>' . $line->convertIdToStatut($line->getStatutId()) . '</td>';
    echo '<td class="td-right"> <a href="orderInfoDetailsCustomer?id='. $line->getIdOrder() .'&statutId=' . $line->getStatutId() . '"><button class="btn btn-info">Voir</button></a> </td>';
  }

  if($row == TRUE){
    echo '<td>' . $line->getIdOrder() . '</td>';
    echo '<td>' . $line->convertIdToStatut($line->getStatutId()) . '</td>';
    echo '<td class="td-right"> <a href="orderInfoDetailsCustomer?id='. $line->getIdOrder() .'&statutId=' . $line->getStatutId() . '"><button class="btn btn-info">Voir</button></a> </td>';
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

