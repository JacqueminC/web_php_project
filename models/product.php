<?php
require_once 'models/dataBase.php';

Class Product{
  private $id;
  private $productName;
  private $price;
  private $categorieId;
  private $description;
  private $imageLink;


  public function myConstruct(int $id, string $productName, string $price, int $categorieId, string $description){
    $this->id = $id;
    $this->productName = $productName;
    $this->price = $price;
    $this->categorieId = $categorieId;
    $this->description = $description;  
    $this->imageLink = '';  

    return $this;
  }
  
  public static function getAll(){
    $pdo = DataBase::connect();

    $response = $pdo->query("SELECT * FROM products"); 
    $response->setFetchMode( PDO::FETCH_CLASS, "Product");   
    $data = $response->fetchAll();   
    
    return $data;
  }

  public static function getProduct(int $id){
    $pdo = DataBase::connect();		
    $response = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $response->execute(array(':id' => $id));
    $response->setFetchMode( PDO::FETCH_CLASS, "Product");  
    $data = $response->fetch();
    
    return $data;
  }

  public static function categorieConvert(int $cat){
    switch($cat){
      case 1:
        return 'Jeux de société';
        break;
      case 2:
        return 'Jeux de rôle';
        break;
      case 3: 
        return 'Jeux de plateau';
        break;
      default:
        return 'error';
        break;
    }
  }

  public static function newProduct(Product $product){
    $pdo = DataBase::connect();

    $data = [
      'productName' => $product->productName,
      'price' => $product->price,
      'categorieId' => $product->categorieId,
      'description' => $product->description
    ];

    $query = "INSERT INTO products (productName, price, categorieId, description) 
    VALUE (:productName, :price, :categorieId, :description)";

    $response = $pdo->prepare($query);

    $response->execute($data);

    $id = Product::getIdDB($product->getProductName()); 
    $product->setId($id);
  }

  public static function getIdDB($productName){
    $pdo = DataBase::connect();		
    $response = $pdo->prepare("SELECT id FROM products WHERE productName = :productName");
    $response->execute(array(':productName' => $productName)); 
    $data = $response->fetch();
    
    return $data['id'];
  }

  public static function update(Product $product){
    $pdo = DataBase::connect();

    $data = [
      'id' => $product->id,
      'productName' => $product->productName,
      'price' => $product->price,
      'categorieId' => $product->categorieId,
      'description' => $product->description,
      'imageLink' => $product->imageLink
    ];
    $query = "UPDATE products SET productName = :productName, price = :price, categorieId = :categorieId, description = :description, imageLink = :imageLink WHERE id = :id";

    $response = $pdo->prepare($query);

    $response->execute($data);
  }

  public static function addGameBasket(Product $product){
    $id = $_SESSION['id'];
    $pdo = DataBase::connect();		

    // est-ce l'order existe?
    $response = $pdo->prepare("SELECT count(idOrder) FROM orders WHERE userId = :id AND statutId = 5");
    $response->execute(array(':id' => $id)); 
    $data = $response->fetch();

    // si pas on la crée
    if($data[0][0] == 0){
      $query = "INSERT INTO orders (userId, statutId) 
      VALUE (:id, 5)";  
      $response = $pdo->prepare($query);
      $response->execute(array(':id' => $id));
    }

    // ensuite on recupérer l'id de l'order (idOrder)
    $response = $pdo->prepare("SELECT idOrder FROM orders WHERE userId = :id and statutId = 5");
    $response->execute(array(':id' => $id)); 
    $data = $response->fetch();

    // on ajoute l'orderDetail du produit
    $newData = [
      'orderId' => $data['idOrder'],
      'productId' => $product->getId(),
      'price' => $product->getPrice()
    ];

    $query = "INSERT INTO orderDetails (orderId, productId, price) 
    VALUE (:orderId, :productId, :price)";
    $response = $pdo->prepare($query);
    $response->execute($newData);
  }

  public static function delete(int $id){
    $pdo = DataBase::connect();
    $query = "DELETE FROM products WHERE id = :id";
    $response = $pdo->prepare($query);
    $response->execute(array(':id' => $id));
  }

  public function getId(){
    return $this->id;
  }
  public function getProductName(){
    return $this->productName;
  }
  public function getPrice(){
    return $this->price;
  }
  public function getCategorieId(){
    return $this->categorieId;;
  }
  public function getDescription(){
    return $this->description;
  }
  public function getImageLink(){
    return $this->imageLink;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function setImageLink($imageLink){
    $this->imageLink = $imageLink;
  }

}


?>