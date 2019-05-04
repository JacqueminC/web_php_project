<?php
require 'dataBase.php';

Class Product{
  private $id;
  private $productName;
  private $price;
  private $categorieId;

  public function getAll(){
    $pdo = DataBase::connect();

    $data = $pdo->query("SELECT * FROM products");    
    
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

}


?>