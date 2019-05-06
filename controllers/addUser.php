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

      $user = User::getLog($_POST['login'])

      $_SESSION['login'] = $user->getLogin();
      $_SESSION['roleId'] = $role;
      $_SESSION['id'] = $user->getId();

      header('Location: accueil');  
  }
  else {
    $_SESSION['registerSuccess'] = 'empty';
    header('Location: inscription'); 
  }

?>