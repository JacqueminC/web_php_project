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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <title>MyProject</title>
</head>
<?php
//$hash = password_hash('', PASSWORD_DEFAULT);
//print_r($hash)
?>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="accueil">My web site</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="accueil">Accueil</a>
      </li>
    </ul>
    <?php       
      if(empty($_SESSION['login'])){
        echo "<a href=\"login\"> <button type=\"button\" class=\"btn btn-outline-success\">Connexion</button> </a>";
        echo "<a href=\"inscription\"> <button type=\"button\" class=\"btn btn-outline-info\">Inscription</button> </a>";
      }
      else 
      {
        echo '<h4>'. $_SESSION['login'] . '</h4>';
        echo "<a href=\"logout\"> <button type=\"button\" class=\"btn btn-outline-warning\">Déconnexion</button> </a>";
      }
    ?>
  </div>
</nav>
  <div class="container">


        
