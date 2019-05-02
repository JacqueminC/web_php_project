<?php
require 'dataBase.php';

class User{
	private $id;
	private $firstName;
	private $lastName;
	private $login;
  private $passwordUser;  
	private $email;
  private $roleId;
  

  public function constructorForCreateUser(string $firstName, string $lastName, string $email, string $login, string $password){
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->login = $login;
    $this->passwordUser = password_hash($password, PASSWORD_DEFAULT);

    return $this;
  }

	public static function getLog(string $login){
		$pdo = DataBase::connect();
		
		$response = $pdo->prepare("SELECT * FROM users WHERE login = :login");

		$response->execute(array(':login' => $login));

		// pour récuper un objet User avec le fetch
		$response->setFetchMode(PDO::FETCH_CLASS, 'User');

		$data = $response->fetch();

		$response->closeCursor();
		
		return $data;
  }
  
  /// param int
  /// 1 for get role 1,2 and 3
  /// 2 for get role 4
  public function getAllUsers(int $role){
    $pdo = DataBase::connect();
    
    if($role == 1){      
      $response = $pdo->query("SELECT * FROM users WHERE roleId <= 3");
    }
    else if($role == 2){
      $response = $pdo->query("SELECT * FROM users WHERE roleId LIKE 4");
    }       
    
    return $response;
  }

  public static function roleConvert(int $role){
    switch($role){
      case 1:
        return 'Root';
        break;
      case 2:
        return 'Admin';
        break;
      case 3: 
        return 'Employé';
      case 4:
       return 'Client';
       break;
      default:
        return 'error';
        break;
    }
  }

	public function validatePassword(string $password){
		return password_verify($password, $this->passwordUser);      
	}

	public function getLogin(){
		return $this->login;
  }

  public function getRoleId(){
    return $this->roleId;
  }
  
  public static function newUser(User $newUser){
    $pdo = DataBase::connect();

    $data = [
      'firstName' => $newUser->firstName,
      'lastName' => $newUser->lastName,
      'email' => $newUser->email,
      'login' => $newUser->login,
      'passwordUser' => $newUser->passwordUser,
    ];

    $query = "INSERT INTO users (firstName, lastName, email, login, passwordUser) VALUE (:firstName, :lastName, :email, :login, :passwordUser)";

    $reponse = $pdo->prepare($query);

    $reponse->execute($data);
  }
}

?>