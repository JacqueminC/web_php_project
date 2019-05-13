<?php
if($_GET['action'] == 'create'){
  if(!empty($_POST['productName']) &&
  !empty($_POST['price']) &&
  !empty($_POST['categorieId'])){
    require 'models/product.php';

    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
    //1. strrchr renvoie l'extension avec le point (« . »).
    //2. substr(chaine,1) ignore le premier caractère de chaine.
    //3. strtolower met l'extension en minuscules.
    $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
    $image_sizes = getimagesize($_FILES['image']['tmp_name']);
    $path = "./Images/jeux";
    $name = $_FILES['image']['name'];
    $maxsize = 1048576;
    $maxwidth = 2048;
    $maxheight = 2048;
    

    if ($_FILES['image']['error'] > 0){
      echo "Erreur lors du transfert";
      header('Location: admin?info=transfert');
    } 
    if ($_FILES['image']['size'] > $maxsize){
      echo "Le fichier est trop gros"; 
    }    
    if (in_array($extension_upload,$extensions_valides)) echo "Extension correcte";    
    if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) echo "Image trop grande";    
    $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$path);
    if ($resultat) echo "Transfert réussi de " . $_FILES['image']['tmp_name'];


    $product = new Product();   
    $product = $product->myConstruct(0,$_POST['productName'], $_POST['price'], $_POST['categorieId'], $_POST['description']);
    $product->addPath($name);
    //$product = $product->addPath($name);
    
    Product::newProduct($product);
    
    header('Location: admin?case=product');
  }
  else {
    require 'views/addProduct.php';
  }
}
else if($_GET['action'] == 'update'){
  require 'views/updateProduct.php';
}
else if($_GET['action'] == 'delete'){
  require 'views/deleteProduct.php';
}
?>