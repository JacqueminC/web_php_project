<?php
require 'models/user.php';
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Login</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php
$data = new User();
$data = $data->getAllUsers(1);
$row = FALSE;

foreach($data as $line){
  
  if($row == FALSE){
    echo '<tr> <td>' . 
    $line['roleId'] . '</td> <td>' .
    $line['firstName'] . '</td> <td>' .
    $line['lastName'] . '</td> <td>' .
    $line['login'] . '</td> <td>' .
    $line['email'] . '</td> <td>' .
    $role = User::roleConvert($line['roleId']) . '</td> <td> </tr>';
  }

  if($row == TRUE){
    echo '<tr class="table-light"> <td>' . 
    $line['roleId'] . '</td> <td>' .
    $line['firstName'] . '</td> <td>' .
    $line['lastName'] . '</td> <td>' .
    $line['login'] . '</td> <td>' .
    $line['email'] . '</td> <td>' .
    $role = User::roleConvert($line['roleId']) . '</td> <td> </tr>';    
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