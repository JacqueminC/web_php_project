<?php
if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 2){
  header('Location: admin?case=employee');
}
require 'models/user.php';
$id = $_GET['id'];
$user = new User();
$user = $user->myConstructforUpdate($id, $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['login'], $_POST['roleId']);
if($id == $_SESSION['id']){
  $_SESSION['login'] = $_POST['login'];
}
User::update($user);
header ('location: admin?case=employee');
?>