<?php
require 'models/user.php';
if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 3){
  header('Location: index');
}
?>

<div class="row">
  <div class="col-0">
  
<?php
  if($_SESSION['roleId'] <= 2){
    echo '<a href="addEmployee"><button type="button" class="btn btn-success">Ajouter</button> </a>';
  }
  else {
    echo '<button type="button" class="btn btn-success disabled">Ajouter</button>';
  }
?>
  </div>    
</div>

<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Login</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col" class="tr-right">Action</th>
    </tr>
  </thead>
  <tbody>
<?php
$data = new User();
$data = $data->getAllUsers(2);
$row = FALSE;

foreach($data as $line){
  
  if($row == FALSE){
    echo '<tr> <td>' . 
    $line['id'] . '</td> <td>' .
    $line['firstName'] . '</td> <td>' .
    $line['lastName'] . '</td> <td>' .
    $line['login'] . '</td> <td>' .
    $line['email'] . '</td> <td>' .
    $role = User::roleConvert($line['roleId']) . '</td> <td class="td-right">';
    if($_SESSION['roleId'] <= 3){
      echo '<a href="modifyUser?id=' .  $line['id'] .'"><button type="button" class="btn btn-warning"> Modifier</button></a>';
    }
    else{
      echo '<button type="button" class="btn btn-warning disabled"> Modifier</button>';
    }
        
    if($_SESSION['roleId'] <=2){
      echo '<a href="viewUser?id= ' .  $line['id'] .'"><button type="button" class="btn btn-danger"> Supprimer</button></a>';
    }
    else {
      echo '<button type="button" class="btn btn-danger disabled"> Supprimer</button>';
    }
    echo '</td> </tr>';
  }

  if($row == TRUE){
    echo '<tr class="table-light"> <td>' . 
    $line['id'] . '</td> <td>' .
    $line['firstName'] . '</td> <td>' .
    $line['lastName'] . '</td> <td>' .
    $line['login'] . '</td> <td>' .
    $line['email'] . '</td> <td>' .
    $role = User::roleConvert($line['roleId']) . '</td> <td class="td-right">';
    if($_SESSION['roleId'] <= 3){
      echo '<a href="modifyUser?id=' .  $line['id'] .'"><button type="button" class="btn btn-warning"> Modifier</button></a>';
    }
    else{
      echo '<button type="button" class="btn btn-warning disabled"> Modifier</button>';
    }
        
    if($_SESSION['roleId'] <=2){
      echo '<a href="viewUser?id= ' .  $line['id'] .'"><button type="button" class="btn btn-danger"> Supprimer</button></a>';
    }
    else {
      echo '<button type="button" class="btn btn-danger disabled"> Supprimer</button>';
    }
    echo '</td> </tr>';
  }

  if($row == FALSE){
    $row = TRUE;
  } 
  else{
    $row = FALSE;
  } 
}
?>  
  </tbody>
</table> 