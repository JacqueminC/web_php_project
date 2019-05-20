<?php
if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 3){
  header('Location: index');
}
require 'models/product.php';

if($_GET['action'] == 'create'){
  if(!empty($_POST['productName']) &&
  !empty($_POST['price']) &&
  !empty($_POST['categorieId'])){
    

    $extensions_valides = array( 'jpg' , 'jpeg', 'png' );
    //1. strrchr renvoie l'extension avec le point (« . »).
    //2. substr(chaine,1) ignore le premier caractère de chaine.
    //3. strtolower met l'extension en minuscules.
    $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
    $image_sizes = getimagesize($_FILES['image']['tmp_name']);     
    $maxsize = 1048576;
    $maxwidth = 2048;
    $maxheight = 2048;
    

    if ($_FILES['image']['error'] > 0){
      echo "Erreur lors du transfert";
      header('Location: admin?case=product');
    } 
    if ($_FILES['image']['size'] > $maxsize){
      echo "Le fichier est trop gros"; 
    }    
    if (in_array($extension_upload,$extensions_valides)) echo "Extension correcte";    
    if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) echo "Image trop grande";    
    


    $product = new Product();   
    $product = $product->myConstruct(0,$_POST['productName'], $_POST['price'], $_POST['categorieId'], $_POST['description']);
    
    Product::newProduct($product);

    $name = $product->getId() . $_FILES['image']['name'];
    $path = "./Images/jeux/" . $name;

    $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$path);
    if ($resultat){
      echo "Transfert réussi de " . $name;
      $product->setImageLink($name);
      echo $product->getImageLink();
      Product::update($product);      
    }
    header('Location: admin?case=product');
  }
  else {
    require 'views/addProduct.php';
  }
}
else if($_GET['action'] == 'update'){
  $id = $_GET['id'];
  $product = Product::getProduct($id);
  require 'views/updateProduct.php';
}
else if($_GET['action'] == 'delete'){
  $id = $_GET['id'];
  $product = Product::getProduct($id);
  require 'views/deleteProduct.php';
}
?>