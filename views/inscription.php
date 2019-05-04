<?php 
require 'layout/header.php';
if(!empty($_SESSION['login'])){
  header('Location: index');
}

if(isset($_SESSION['registerSuccess']) && $_SESSION['registerSuccess'] == 'error'){
echo '<div class="alert alert-dismissible alert-warning">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<p class="mb-0">Erreur inscription!</p></div>';
}
if(isset($_SESSION['registerSuccess']) && $_SESSION['registerSuccess'] == 'empty')
echo '<div class="alert alert-dismissible alert-secondary">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<p class="mb-0">Veuillez remplir les champs!</p></div>';
?>



<h1 class="text-center">Inscription</h1>

<div class="d-flex justify-content-center">

  <form action="addUser" method="post">
      <div class="form-group">
        <div class="col">
          <input type="text" name="firstName" class="form-control" value="<?php echo @$_POST['firstName'] ?>" placeholder="Prénom">
          <input type="text" name="lastName" class="form-control" value="<?php echo @$_POST['lastName'] ?>" placeholder="Nom"> 
          <input type="email" name="email" class="form-control" value="<?php echo @$_POST['email'] ?>" aria-describedby="emailHelp" placeholder="Email"> 
          <input type="text" name="login" class="form-control"  placeholder="Login"> 
          <input type="password" name="password" class="form-control" placeholder="Mot de passe">        
        </div>
      </div>

      <div class="col-3">
        <button type="submit" class="btn btn-success">Inscription</button>
      </div>
  </form>
  </div>


<?php 
$_SESSION['registerSuccess'] = 'no';
require 'layout/footer.php';
?>