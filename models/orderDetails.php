<?php

Class OrderDetails{
  private $id;
  private $orderId;
  private $productId;
  private $price;


  public static function getBasketById(int $id){
    $pdo = DataBase::connect();		
    $response = $pdo->prepare("SELECT od.id, od.orderId, od.productId, od.price FROM orderDetails AS od INNER JOIN orders AS o WHERE o.userId = :id AND o.idOrder = od.orderId AND o.statutId = 5;");
    $response->execute(array(':id' => $id));
    $response->setFetchMode( PDO::FETCH_CLASS, "OrderDetails");  
    $data = $response->fetchAll(); 
    
    return $data;
  }

  public static function deleteOrderById(int $id){
    $pdo = DataBase::connect();
    $query = "DELETE FROM orderDetails WHERE id = :id";
    $response = $pdo->prepare($query);
    $response->execute(array(':id' => $id));
  }

  public static function sendOrder(int $orderId){
    $pdo = DataBase::connect();    
    $query = "UPDATE orders SET statutId = 1 WHERE idOrder = :orderId";
    $response = $pdo->prepare($query);
    $response->execute(array(':orderId' => $orderId));
  }

  public function getId(){
    return $this->id;
  }

  public function getOrderId(){
    return $this->orderId;
  }

  public function getProductId(){
    return $this->productId;
  }
  
  public function getProductNameById(int $id){
    $pdo = DataBase::connect();		
    $response = $pdo->prepare("SELECT productName FROM products WHERE id = :id");
    $response->execute(array(':id' => $id)); 
    $data = $response->fetch();
    
    return $data['productName'];
  }

  public function getPrice(){
    return $this->price;
  }
}

?>