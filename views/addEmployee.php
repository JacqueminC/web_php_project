<?php 
if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 2){
  header('Location: index');
}
require 'layout/header.php';
require 'models/user.php';
?>

<h1 class="text-center">Ajouter</h1>

<div class="d-flex justify-content-center">

  <form action="employee?action=create" method="post">
      <div class="form-group">
        <div class="col">
          <input type="text" name="firstName" class="form-control" value="<?php echo @$_POST['firstName'] ?>" placeholder="Prénom" required>
          <input type="text" name="lastName" class="form-control" value="<?php echo @$_POST['lastName'] ?>" placeholder="Nom" required> 
          <input type="email" name="email" class="form-control" value="<?php echo @$_POST['email'] ?>" aria-describedby="emailHelp" placeholder="Email" required> 
          <input type="text" name="login" class="form-control" placeholder="Login" required> 
          <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
          <select name="roleId" class="custom-select">
            <option  selected="">Choisir un rôle</option>
<?php
 $avalaibleRole = User::SelectRole($_SESSION['roleId']);
  echo $avalaibleRole;
?>
          </select>      
        </div>

      </div>
      <div class="row">
        <div class="col offset-1">          
          <a href="admin?case=employee"><button type="button" class="btn btn-secondary">Retour</button></a>
          <button type="submit" class="btn btn-success">Ajouter</button>
        </div>        
      </div>
  </form>
</div>

<?php 
require 'layout/footer.php';
?>
