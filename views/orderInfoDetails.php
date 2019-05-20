<?php 
require 'layout/header.php';
?>

<h2>Commande en cours</h2>

<?php 
  if ($stautId != 6){
?>
<p>Choisisez un statut</p>
<form action="updateOrder?orderId=<?php echo $orderId ?>" method="post">
  <select name="statutId" class="custom-select">
    <option selected="" value="<?php echo $stautId ?>"><?php echo $statut ?></option>
    <option value="1">En attente</option>
    <option value="2">En Préparation</option>
    <option value="3">Expédiée</option>
    <option value="4">Refusé</option>
    <option value="6">Terminé</option>
  </select>  
  <div class="row">
  <div class="col">          
    <button type="submit" class="btn btn-success">Modifier</button>
  </div>     
</form>
<?php
}
?>

   
</div>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Produits</th>
      <th scope="col">Prix</th>
    </tr>
  </thead>
  <tbody>
<?php 

foreach($orderDetails as $line){
  $product = Product::getProduct($line->getProductId());
  echo '<tr>';
    echo '<td>' . $line->getOrderId() . '</td>';
    echo '<td>' . $product->getProductName() . '</td>';
    echo '<td>' . number_format($line->getPrice(), 2, ',', ' ') . '€</td>';
    echo '</tr>';
}
echo '<tr>';
echo '<td></td>';
echo '<td>Total</td>';
echo '<td>' . number_format($total, 2, ',', ' ') . '€</td>';
echo '</tr>';
echo '<a href="orderInfo"><button type="button" class="btn btn-secondary">Retour</button></a>';

?>
  </tbody>
</table>

<?php 
require 'layout/footer.php';
?>
