<?php
if(empty($_SESSION['roleId'])){
  header('Location: index');
}
require 'views/basket.php';
?>