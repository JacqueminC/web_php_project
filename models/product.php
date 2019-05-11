<?php
require 'dataBase.php';

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
  }

  public static function update(Product $product){
    $pdo = DataBase::connect();

    $data = [
      'id' => $product->id,
      'productName' => $product->productName,
      'price' => $product->price,
      'categorieId' => $product->categorieId,
      'description' => $product->description
    ];
    $query = "UPDATE products 
              SET productName = :productName, price = :price, categorieId = :categorieId, description = :description
              WHERE id = :id";

    $response = $pdo->prepare($query);

    $response->execute($data);
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

}


?>