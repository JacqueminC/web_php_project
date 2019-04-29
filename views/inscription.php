<?php 
require 'layout/header.php';
if(!empty($_SESSION['login'])){
  header('Location: index');
}
?>
<div></div>
<div></div>
<div></div>



<h1 class="text-center">Inscription</h1>

<div class="d-flex justify-content-center">

  <form action="addUser" method="post">
      <div class="form-group">
        <div class="col">
          <input type="text" name="firstName" class="form-control" value="<?php echo @$_POST['firstName'] ?>" placeholder="Prénom" required>
          <input type="text" name="lastName" class="form-control" value="<?php echo @$_POST['lastName'] ?>" placeholder="Nom" required> 
          <input type="email" name="email" class="form-control" value="<?php echo @$_POST['email'] ?>" aria-describedby="emailHelp" placeholder="Email" required> 
          <input type="text" name="login" class="form-control"  placeholder="Login" required> 
          <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>        
        </div>
      </div>

      <div class="col-3">
        <button type="submit" class="btn btn-success">Inscription</button>
      </div>
  </form>
  </div>


<?php 
require 'layout/footer.php';
?>