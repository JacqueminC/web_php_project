<?php
require 'models/user.php';
User::delete($_GET['id']);

header ('Location: admin?case=employee');

?>