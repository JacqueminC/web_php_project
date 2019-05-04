<?php	


if(!empty($_POST['login']) && !empty($_POST['password'])){
  require 'models/user.php';
  // :: pour un object static
  $user = User::getLog($_POST['login']);
  
  // -> pour un objet instancié
  if($user && $user->validatePassword($_POST['password'])){     
    $_SESSION['login'] = $user->getLogin();
    $_SESSION['roleId'] = $user->getRoleId(); 
    header('Location: accueil'); 
  } 
  else {   
    $_SESSION['cnxSuccess'] = 'error';
    // header('Location: login');    
  }
}
else{
  $_SESSION['cnxSuccess'] = 'empty';
  // header('Location: login');
}

require 'views/login.php';
?>