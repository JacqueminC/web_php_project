<?php
require 'models/user.php';
$id = $_GET['id'];
$user = new User();
$user = $user->myConstructforUpdate($_GET['id'], $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['login'], $_POST['roleId']);
// modifier login session
User::update($user);
header ('location: admin?case=employee');
?>