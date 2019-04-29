<?php 
require 'layout/header.php';
if(!empty($_SESSION['login'])){
  header('Location: index');
}
?>



  <h1 class="text-center">Connexion</h1>

  <div class="d-flex justify-content-center">
  <form action="log" method="post">
    <div class="form-group">
      <div class="col-10">
        <input type="text" class="form-control" name="login" placeholder="Login" required>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>
    </div>

    <div class="col-10"> 
      <button type="submit" class="btn btn-success">Se connecter</button>
    </div>  
  </form>

  </div>


<?php 
require 'layout/footer.php';
?>
