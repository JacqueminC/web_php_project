<?php
if(empty($_SESSION['roleId'])){
  header('Location: index');
}
require 'views/account.php';
require 'models/user.php';
require 'models/orders.php';

if(isset($_GET['case'])){
  switch ($_GET['case']) {
    case 'infoAccount':
      $user = User::getLog($_SESSION['login']);
      require 'views/infoAccount.php';
      break;            
    case 'orders':
      $orders = Orders::getONe($_SESSION['id']);
      require 'views/ordersCustomer.php';
      break;
  }
}
?>