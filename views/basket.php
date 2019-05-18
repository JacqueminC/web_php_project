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

foreach($data as $order){  

    echo '<tr> <td>' . 
    $order->getProductNameById($order->getProductId()) . '</td> <td>' .
    number_format($order->getPrice(), 2, ',', ' ') . '€</td> <td class="td-right">';
    echo '<a href="orderDelete?id='. $order->getId() .'"><button type="button" class="btn btn-danger"> Supprimer</button></a>';

    echo '</td> </tr>';

}
  echo '<tr class="table-active"> <td> TOTAL </td>
  <td>' . number_format($total, 2, ',', ' ') . '€</td>';
  echo '<td class="td-right"> ';
  if ($count > 0) {
    echo '<a href="confirmation?orderId=' . $orderId . '"><button type="button" class="btn btn-success">Commander</button> </a>';
  }
  else {
    echo '<button type="button" class="btn btn-success disabled">Panier vide</button>';
  }
  echo '</td> </tr>';
  
?>
  </tbody>
</table>


<?php 
require 'layout/footer.php';
?>
