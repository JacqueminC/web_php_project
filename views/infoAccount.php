<?php 
if(empty($_SESSION['login'])){
  header('Location: index');
}
require 'models/user.php';
$user = User::getLog($_SESSION['login']);
?>

<h2 class="text-center">Mes infos</h2>

<div class="d-flex justify-content-center">

<div class="row">
    <table class="table table-sm">
<?php
echo '<tr>
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
</tr>';
?>  
  </table>
</div>
</div>

<div class="d-flex justify-content-center">
  <div class="row">   
    <?php     
    echo '<a href="updateAccount?state=wait"><button type="submit" class="btn btn-warning">Modifier</button></a>';
    ?>
  </div> 
</div>
  

