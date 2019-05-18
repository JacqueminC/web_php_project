<?php
if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 3){
  header('Location: admin?case=product');
}
require 'models/dataBase.php';
require 'models/product.php';

if (!empty($_FILES['img']['name'])) {
  $extensions_valides = array( 'jpg' , 'jpeg', 'png' );
  //1. strrchr renvoie l'extension avec le point (« . »).
  //2. substr(chaine,1) ignore le premier caractère de chaine.
  //3. strtolower met l'extension en minuscules.
  $extension_upload = strtolower(  substr(  strrchr($_FILES['img']['name'], '.')  ,1)  );
  $image_sizes = getimagesize($_FILES['img']['tmp_name']);     
  $maxsize = 1048576;
  $maxwidth = 2048;
  $maxheight = 2048;

  if ($_FILES['img']['error'] > 0){
    echo "Erreur lors du transfert";
  } 
  if ($_FILES['img']['size'] > $maxsize){
    echo "Le fichier est trop gros"; 
  }    
  if (in_array($extension_upload,$extensions_valides)){
    echo "Extension correcte"; 
  }    
  if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight){
    echo "Image trop grande"; 
  }    

  $product = new Product();   
  $product = $product->myConstruct($_GET['id'],$_POST['productName'], $_POST['price'], $_POST['categorieId'], $_POST['description']);

  $name = $product->getId() . $_FILES['img']['name'];
  $path = "./Images/jeux/" . $name;

  $resultat = move_uploaded_file($_FILES['img']['tmp_name'],$path);
  echo $path;
  Product::update($product); 
  if ($resultat){
    $product->setImageLink($name);
    Product::update($product);      
  }
  header('Location: admin?case=product');
}
else {
  $product = new Product();  
  $temp = Product::getProduct($_GET['id']);
  $product = $product->myConstruct($_GET['id'],$_POST['productName'], $_POST['price'], $_POST['categorieId'], $_POST['description']);
  $product ->setImageLink($temp->getImageLink());
  Product::update($product);
  header('Location: admin?case=product');
}


?>