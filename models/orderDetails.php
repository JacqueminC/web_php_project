<?php

Class OrderDetails{
  private $id;
  private $orderId;
  private $productId;
  private $price;
  // private $idOrder;
  // private $idUser;
  // private $idStatut;


  public static function getOrder(int $id){
    $pdo = DataBase::connect();		
    $response = $pdo->prepare("SELECT * FROM orderDetails as od INNER JOIN orders AS o WHERE o.id = :id AND o.id = od.orderId");
    $response->execute(array(':id' => $id));
    $response->setFetchMode( PDO::FETCH_CLASS, "OrderDetails");  
    $data = $response->fetchAll(); 
    
    return $data;
  }
}

?>