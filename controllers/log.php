<?php
require 'models/user.php';

if(!empty($_POST['login']) && !empty($_POST['password'])){
  // :: pour un object static
  $user = User::getLog($_POST['login']);
  
  // -> pour un objet instancié
  if($user && $user->validatePassword($_POST['password'])){     
    $_SESSION['login'] = $user->getLogin();
    $_SESSION['roleId'] = $user->getRoleId(); 
    header('Location: index');
  } 
  else {    
    header('Location: login');   
    //mauvais mot de passe ou login
  }
}

?>