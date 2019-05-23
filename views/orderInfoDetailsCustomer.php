<?php 
require 'layout/header.php';
?>

<h2>Commande en cours</h2>

   
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
    echo '<td>' . $line->getId() . '</td>';
    echo '<td>' . $product->getProductName() . '</td>';
    echo '<td>' . number_format($line->getPrice(), 2, ',', ' ') . '€</td>';
    echo '</tr>';
}
echo '<tr>';
echo '<td></td>';
echo '<td>Total</td>';
echo '<td>' . number_format($total, 2, ',', ' ') . '€</td>';
echo '</tr>';
echo '<a href="account?case=orders"><button type="button" class="btn btn-secondary">Retour</button></a>';

?>
  </tbody>
</table>

<?php 
require 'layout/footer.php';
?>
