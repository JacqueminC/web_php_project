<?php
if (!empty($_SESSION['login']))
{
  session_unset();
  session_destroy();
}
header('location: accueil');
?>