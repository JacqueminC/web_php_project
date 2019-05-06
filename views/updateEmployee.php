<?php 
if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 2){
  header('Location: admin?case=employee');
}
require 'layout/header.php';
require 'models/user.php';
$id = $_GET['id'];
$user = User::getUser($id);
?>

<h1 class="text-center">Modifier</h1>

<div class="d-flex justify-content-center">

  <form action="updateEmployee?id=<?php echo $id ?>" method="post">
    <div class="row">
      <div class="form-group">
        <div class="col">
          <input type="text" name="firstName" class="form-control" value="<?php echo $user->getFirstName() ?>" placeholder="Prénom" required>
          <input type="text" name="lastName" class="form-control" value="<?php echo $user->getLastName() ?>" placeholder="Nom" required> 
          <input type="text" name="login" class="form-control" value="<?php echo $user->getLogin() ?>" placeholder="Login" required>
          <input type="email" name="email" class="form-control" value="<?php echo $user->getEmail() ?>" aria-describedby="emailHelp" placeholder="Email" required>             
          <select name="roleId" class="custom-select">
            <option selected="" value="<?php echo $user->getRoleId() ?>" ><?php echo User::roleConvert($user->getRoleId()) ?></option>
<?php
 $avalaibleRole = User::SelectRole($_SESSION['roleId']);
  echo $avalaibleRole;
?>
          </select>      
        </div>
        </div>

      </div>
      <div class="row">
        <div class="col">          
          <a href="admin?case=employee"><button type="button" class="btn btn-secondary">Retour</button></a>
          <button type="submit" class="btn btn-success">Modifier</button>
        </div>        
      </div>
  </form>
</div>

<?php 
require 'layout/footer.php';
?>
