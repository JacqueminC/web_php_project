<?php
if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 3){
  header('Location: index');
}
?>

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
$row = FALSE;

foreach($user as $line){
  
  if($row == FALSE){
    echo '<tr> <td>' . 
    $line->getId() . '</td> <td>' .
    $line->getFirstName() . '</td> <td>' .
    $line->getLastName() . '</td> <td>' .
    $line->getLogin() . '</td> <td>' .
    $line->getEmail() . '</td> <td>' .
    $role = User::roleConvert($line->getRoleId()) . '</td> <td class="td-right">';
    if($_SESSION['roleId'] <= 3){
      echo '<a href="modifyUser?id=' .  $line->getId() .'"><button type="button" class="btn btn-warning"> Modifier</button></a>';
    }
    else{
      echo '<button type="button" class="btn btn-warning disabled"> Modifier</button>';
    }
        
    if($_SESSION['roleId'] <=2){
      echo '<a href="viewUser?id= ' .  $line->getId() .'"><button type="button" class="btn btn-danger"> Supprimer</button></a>';
    }
    else {
      echo '<button type="button" class="btn btn-danger disabled"> Supprimer</button>';
    }
    echo '</td> </tr>';
  }

  if($row == TRUE){
    echo '<tr> <td>' . 
    $line->getId() . '</td> <td>' .
    $line->getFirstName() . '</td> <td>' .
    $line->getLastName() . '</td> <td>' .
    $line->getLogin() . '</td> <td>' .
    $line->getEmail() . '</td> <td>' .
    $role = User::roleConvert($line->getRoleId()) . '</td> <td class="td-right">';
    if($_SESSION['roleId'] <= 3){
      echo '<a href="modifyUser?id=' .  $line->getId() .'"><button type="button" class="btn btn-warning"> Modifier</button></a>';
    }
    else{
      echo '<button type="button" class="btn btn-warning disabled"> Modifier</button>';
    }
        
    if($_SESSION['roleId'] <=2){
      echo '<a href="viewUser?id= ' .  $line->getId() .'"><button type="button" class="btn btn-danger"> Supprimer</button></a>';
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