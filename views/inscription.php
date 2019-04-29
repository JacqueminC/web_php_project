<?php 
require 'layout/header.php';
?>

<h1>Inscription</h1>

<form action="addUser" method="post">
    <div class="form-group">
      <div class="col-3">
        <input type="text" name="firstName" class="form-control" placeholder="Prénom" required>
        <input type="text" name="lastName" class="form-control" placeholder="Nom" required> 
        <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" required> 
        <input type="text" name="login" class="form-control" placeholder="Login" required> 
        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>        
      </div>
    </div>

    <div class="col-3">
      <button type="submit" class="btn btn-success">Inscription</button>
    </div>
</form>

<?php 
require 'layout/footer.php';
?>