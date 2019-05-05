<?php
require 'models/user.php';
User::update($_GET['id']);
header ('location: admin?case=employee');
?>