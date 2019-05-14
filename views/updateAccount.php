<?php 
require 'layout/header.php';
require 'models/user.php';
$user = User::getLog($_SESSION['login']);
?>

<h3 class="text-center">Modifier</h3>

<div class="d-flex justify-content-center">

  <form action="updateAccount?state=ok" method="post">
    <div class="row">
      <div class="form-group">
        <div class="col">
          <input type="text" name="firstName" class="form-control" value="<?php echo $user->getFirstName() ?>" placeholder="Prénom" required>
          <input type="text" name="lastName" class="form-control" value="<?php echo $user->getLastName() ?>" placeholder="Nom" required> 
          <input type="text" name="login" class="form-control" value="<?php echo $user->getLogin() ?>" placeholder="Login" required>
          <input type="email" name="email" class="form-control" value="<?php echo $user->getEmail() ?>" aria-describedby="emailHelp" placeholder="Email" required> 
                           
        </div>
        </div>

      </div>
      <div class="row">
        <div class="col offset">          
          <a href="account?case=infoAccount"><button type="button" class="btn btn-secondary">Retour</button></a>
          <button type="submit" class="btn btn-success">Modifier</button>
        </div>        
      </div>
  </form>
</div>

<?php 
require 'layout/footer.php';
?>
