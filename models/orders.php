<?php
require_once 'models/dataBase.php';

Class Orders{
  private $idOrder;
  private $userId;
  private $statutId;

  public static function getONe(int $id){
    $pdo = DataBase::connect();		
    $response = $pdo->prepare("SELECT * FROM orders WHERE userId = :id");
    $response->execute(array(':id' => $id));
    $response->setFetchMode( PDO::FETCH_CLASS, "Orders");  
    $data = $response->fetchAll();
    
    return $data;
  }

  public static function getAll(){
    $pdo = DataBase::connect();
    $response = $pdo->query("SELECT * FROM orders where statutId != 5"); 
    $response->setFetchMode( PDO::FETCH_CLASS, "Orders");   
    $data = $response->fetchAll();   
    
    return $data;
  }

  public static function convertIdToUser(int $id){
    $pdo = DataBase::connect();		
    $response = $pdo->prepare("SELECT login FROM users WHERE id = :id");
    $response->execute(array(':id' => $id)); 
    $data = $response->fetch();
    
    return $data['login'];
  }

  public static function convertIdToStatut(int $id){
    $pdo = DataBase::connect();		
    $response = $pdo->prepare("SELECT statut FROM statuts WHERE id = :id");
    $response->execute(array(':id' => $id)); 
    $data = $response->fetch();
    
    return $data['statut'];
  }

  public static function updateOrder(Orders $orders){
    $pdo = DataBase::connect();

    $data = [
      'idOrder' => $orders->idOrder,
      'statutId' => $orders->statutId
    ];

    $query = "UPDATE orders SET statutId = :statutId, dateOrder = NOW() WHERE idOrder = :idOrder";
    $response = $pdo->prepare($query);
    $response->execute($data);
  }

  public function getIdOrder(){
    return $this->idOrder;
  }

  public function getUserId(){
    return $this->userId;
  }

  public function getStatutId(){
    return $this->statutId;
  }
  
  public function setStatutId(int $statutId){
    $this->statutId = $statutId;
  }
}

?>