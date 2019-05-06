<?php 
require 'layout/header.php';
if(empty($_SESSION['roleId'])){
  header('Location: index');
}
?>

<h1>Jeux</h1>

<?php 
require 'layout/footer.php';
?>
