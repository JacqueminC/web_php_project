<?php
if(empty($_SESSION['roleId'])){
  header('Location: index');
}
require 'views/account.php';
?>