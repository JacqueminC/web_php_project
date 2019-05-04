<?php 
require 'layout/header.php';

if(!empty($_SESSION['login'])){
  header('Location: index');
}
if(isset($_SESSION['cnxSuccess']) && $_SESSION['cnxSuccess'] == 'error'){
  echo '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <p class="mb-0">Login ou mot de passe incorrect</p></div>';
}	
else if (isset($_SESSION['cnxSuccess']) && $_SESSION['cnxSuccess'] == 'empty') {
  echo '<div class="alert alert-dismissible alert-secondary">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<p class="mb-0">Veuillez entrer un mot de passe et un login pour vous connecter !</p></div>';
}  
?>

  <h1 class="text-center">Connexion</h1>

  <div class="d-flex justify-content-center">
    <form action="login" method="post">
      <div class="form-group">
        <div class="col-10">
          <input type="text" class="form-control" name="login" placeholder="Login">
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
      </div>

      <div class="col-10"> 
        <button type="submit" class="btn btn-success">Se connecter</button>
      </div>  
    </form>
  </div> 


<?php 
$_SESSION['cnxSuccess'] = 'no';
require 'layout/footer.php';
?>
