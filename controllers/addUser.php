<?php
require 'models/user.php';

if(!empty($_POST['firstName']) 
  && !empty($_POST['lastName']) 
  && !empty($_POST['email']) 
  && !empty($_POST['login']) 
  && !empty($_POST['password'])){
    
      //ajout user
      $role = 4; 
      $user = new User();
      $user = $user->myConstruct($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['login'], $_POST['password'], $role);
      User::newUser($user);

      $_SESSION['login'] = $_POST['login'];

      header('Location: accueil');  
  }
  else {
    $_SESSION['registerSuccess'] = 'empty';
    header('Location: inscription'); 
  }

?>