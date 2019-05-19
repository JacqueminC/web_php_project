<?php
require 'layout/header.php';
?>

<div class="row">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="?case=employee">Employées</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?case=customer">Clients</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?case=product">Produits</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="orderInfo">Commandes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="saleGraph">Ventes</a>
    </li>
  </ul>
</div>

<div class="row">  
  <div class="col">
  <?php
    if(isset($_GET['case'])){
        switch ($_GET['case']) {
            case 'employee':
              include 'views/employee.php';
              break;            
            case 'customer':
              include 'views/customer.php';
              break;            
            case 'product':
              include 'views/product.php';
              break;
        }
    }
?>
  </div>
</div>

<?php
  require 'layout/footer.php';
?>