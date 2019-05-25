<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css"  crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <title>MyProject</title>
</head>
<?php
//$hash = password_hash('', PASSWORD_DEFAULT);
//print_r($hash)
?>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="menu">
  <a class="navbar-brand" href="accueil">Board Game</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="accueil">Accueil</a>
      </li>
      <li class="nav-item">
        <a href="games" class="nav-link">Jeux</a>
      </li>
      
      <?php   
        if(!empty($_SESSION['roleId'])){
          echo '<li class="nav-item">
          <a class="nav-link" href="account">Mon Compte</a>
          </li>';
        }
        if(!empty($_SESSION['roleId']) && $_SESSION['roleId'] <= 3){
          echo '<li class="nav-item">
          <a class="nav-link" href="admin">Administrateur</a>
          </li>';          
        }
      ?>      
    </ul>
    <?php           
      if(empty($_SESSION['login'])){
        echo "<a href=\"login\"> <button type=\"button\" class=\"btn btn-outline-success\">Connexion</button> </a>";
        echo "<a href=\"inscription\"> <button type=\"button\" class=\"btn btn-outline-info\">Inscription</button> </a>";
      }
      else 
      {        
        echo '<h4 class="h4-log">'. $_SESSION['login'] . '</h4>';
        echo '<a href="basket">  <div class drop> <button type="button" class="btn btn-outline-info">Panier</button> </div> </a>';
        echo "<a href=\"logout\"> <button type=\"button\" class=\"btn btn-outline-warning\">Déconnexion</button> </a>";        
      }
    ?>
  </div>
</nav>
  <div class="container">


        
