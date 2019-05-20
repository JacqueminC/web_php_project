<?php
if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 3){
  header('Location: index');
}
require 'models/dataBase.php';
require 'models/user.php';
require 'models/product.php';
require 'views/admin.php';

if(isset($_GET['case'])){
  switch ($_GET['case']) {
      case 'employee':    
        $user = User::getAllUsers(1);
        require 'views/employee.php';
        break;            
      case 'customer':
        $user = User::getAllUsers(2);
        require 'views/customer.php';
        break;            
      case 'product':
        $data = Product::getAll();
        require 'views/product.php';
        break;
  }
}
require 'layout/footer.php';
?>