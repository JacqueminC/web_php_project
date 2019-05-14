<?php 
if(empty($_SESSION['roleId'])){
  header('Location: account?case=infoAccount');
}
if($_GET['state'] == 'ok'){
  if(!empty($_POST['firstName']) 
  && !empty($_POST['lastName']) 
  && !empty($_POST['email']) 
  && !empty($_POST['login'])){
    require 'models/user.php';
    $user = new User();
    $userTmp = User::getLog($_SESSION['login']); 
    $user = $user->myConstructforUpdate($userTmp->getId(), $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['login'], $userTmp->getRoleId());

    $_SESSION['login'] = $_POST['login'];
    User::update($user);
    $_GET['state'] = 'wait';
    header ('location: account?case=infoAccount');
  }
  else {
    header('Location: updateAccount');
  }
}
else{
  require 'views/updateAccount.php';
}

?>