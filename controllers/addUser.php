<?php
require 'models/user.php';

if(!empty($_POST['firstName']) 
  && !empty($_POST['lastName']) 
  && !empty($_POST['email']) 
  && !empty($_POST['login']) 
  && !empty($_POST['password'])){
    //ajout user
    $user = new User;
    $user = $user->constructorForCreateUser($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['login'], $_POST['password']);
    
    User::newUser($user);
    
    header('Location: accueil');  
  }

?>