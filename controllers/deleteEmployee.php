<?php
if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 2){
  header('Location: index');
}
require 'models/user.php';
User::delete($_GET['id']);

header ('Location: admin?case=employee');

?>