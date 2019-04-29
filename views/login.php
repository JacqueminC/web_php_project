<?php 
require 'layout/header.php';
?>

<h1>Connexion</h1>

<form action="log" method="post">
  <div class="form-group">
		<div class="col-3">
      <input type="text" class="form-control" name="login" placeholder="Login" required>
      <input type="password" class="form-control" name="password" placeholder="Password" required>
		</div>
  </div>

  <div class="col-3"> 
    <button type="submit" class="btn btn-success">Se connecter</button>
  </div>  
</form>

<?php 
require 'layout/footer.php';
?>
