<?php
if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 2){
  header('Location: index');
}

require 'models/user.php';


if($_GET['action'] == 'create'){
  if(!empty($_POST['firstName']) 
    && !empty($_POST['lastName']) 
    && !empty($_POST['email']) 
    && !empty($_POST['login']) 
    && !empty($_POST['password'])
    && !empty($_POST['roleId'])){
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
  
  $id = $_GET['id'];
  $user = User::getUser($id);
  require 'views/updateEmployee.php';
}
else if ($_GET['action'] == 'delete') {
  $id = $_GET['id'];
  $user = User::getUser($id);
  require 'views/deleteEmployee.php';
}

  
?>