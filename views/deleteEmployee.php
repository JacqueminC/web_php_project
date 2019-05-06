<?php 
if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 2){
  header('Location: index');
}
require 'layout/header.php';
require 'models/user.php';
$id = $_GET['id'];
$user = User::getUser($id);
?>

<h1 class="text-center">Détails</h1>

<div class="d-flex justify-content-center">



<div class="row">
    <table class="table table-sm">
<?php
echo '<tr>
<td>Id:</td>
<td>' . $user->getId() .'</td>
</tr>
<tr>
<td>Prénom:</td>
<td>' . $user->getFirstName() .'</td>
</tr>
<tr>
<td>Nom:</td>
<td>' . $user->getLastName() .'</td>
</tr>
<tr>
<td>Login:</td>
<td>' . $user->getLogin() .'</td>
</tr>
<tr>
<td>Email:</td>
<td>' . $user->getEmail() .'</td>
</tr>
<tr>
<td>Rôle:</td>
<td>' . User::roleConvert($user->getRoleId()) .'</td>
</tr>';
?>  
  </table>
</div>
</div>

<div class="d-flex justify-content-center">
  <div class="row">        
    <a href="admin?case=employee"><button type="button" class="btn btn-secondary">Retour</button></a>
    <?php     
    echo '<a href="deleteEmployee?id=' . $id .'"><button type="submit" class="btn btn-danger">Supprimer</button></a>';
    ?>
  </div> 
</div>
  

<?php 
require 'layout/footer.php';
?>
