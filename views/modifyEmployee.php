<?php 

require 'layout/header.php';
require 'models/user.php';
$id = $_GET['id'];
$user = User::getUser($id);

if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 2 || $_SESSION['roleId'] != $user['roleId']){
  header('Location: admin?case=employee');
}
?>

<h1 class="text-center">Modifier</h1>

<div class="d-flex justify-content-center">

  <form action="modifyEmployee?id=<?php echo $id ?>" method="post">
    <div class="row border">
      <div class="form-group">
        <div class="col">
          <input type="text" name="firstName" class="form-control" value="<?php echo $user['firstName'] ?>" placeholder="Prénom" required>
          <input type="text" name="lastName" class="form-control" value="<?php echo $user['lastName'] ?>" placeholder="Nom" required> 
          <input type="email" name="email" class="form-control" value="<?php echo $user['email'] ?>" aria-describedby="emailHelp" placeholder="Email" required> 
          <input type="text" name="login" class="form-control" value="<?php echo $user['login']?>" placeholder="Login" required>  
          <select name="roleId" class="custom-select" value="<?php echo $user['roleId']?>">
            <option selected="">Choisir un rôle</option>
<?php
 $avalaibleRole = User::SelectRole($_SESSION['roleId']);
  echo $avalaibleRole;
?>
          </select>      
        </div>
        </div>

      </div>
      <div class="row">
        <div class="col offset-1">          
          <a href="admin?case=employee"><button type="button" class="btn btn-secondary">Retour</button></a>
          <button type="submit" class="btn btn-success">Modifier</button>
        </div>        
      </div>
  </form>
</div>

<?php 
require 'layout/footer.php';
?>
