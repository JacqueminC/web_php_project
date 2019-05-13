<?php 
require 'layout/header.php';
?>

<h2>Mon compte</h2>


<div class="row">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="?case=infoAccount">Compte</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?case=orders">Commandes</a>
    </li>
  </ul>
</div>

<div class="row">  
  <div class="col">
<?php
  if(isset($_GET['case'])){
      switch ($_GET['case']) {
          case 'infoAccount':
              include 'views/infoAccount.php';
              break;            
          case 'orders':
              include 'views/orders.php';
              break;
      }
  }
?>
  </div>
</div>

<?php 
require 'layout/footer.php';
?>
