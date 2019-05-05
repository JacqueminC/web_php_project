<?php
if($_GET['action'] == 'create'){
  if(!empty($_POST['firstName']) 
    && !empty($_POST['lastName']) 
    && !empty($_POST['email']) 
    && !empty($_POST['login']) 
    && !empty($_POST['password'])
    && !empty($_POST['roleId'])){
      require 'models/user.php';

      $user = new User();  
      $user = $user->myConstruct($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['login'], $_POST['password'], $_POST['roleId']);
      
      User::newUser($user);
      
      header('Location: admin?case=employee');  
  }  
  else {
    require 'views/addEmployee.php';
  }  
}
else if ($_GET['action'] == 'modify'){
  require 'views/modifyEmployee.php';
}
else if ($_GET['action'] == 'delete') {
  require 'views/deleteEmployee.php';
}

  
?>