<?php 
if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 3){
  header('Location: index');
}
require 'layout/header.php';
require 'models/product.php';
?>

<h1 class="text-center">Ajouter produit</h1>

<div class="d-flex justify-content-center">

  <form action="product?action=create" method="post">
      <div class="form-group">
        <div class="col">
          <input type="text" name="productName" class="form-control" value="<?php echo @$_POST['productName'] ?>" placeholder="Nom" required>
          <input type="text" name="price" class="form-control" value="<?php echo @$_POST['price'] ?>" placeholder="Prix" required> 
          <select name="categorieId" class="custom-select">
            <option  selected="">Choisir une catégorie</option>
            <option value="1">Jeux de société</option>
            <option value="2">Jeux de rôle</option>
            <option value="3">Jeux de plateau</option>
          </select>
          <div class="form-group">
            <label for="exampleTextarea" >Description</label>
            <textarea class="form-control" name="description" value="<?php echo @$_POST['description'] ?>" placeHolder="Description" rows="3" style="height: 107px;"></textarea>
          </div>  
        </div>

      </div>
      <div class="row">
        <div class="col offset-1">          
          <a href="admin?case=product"><button type="button" class="btn btn-secondary">Retour</button></a>
          <button type="submit" class="btn btn-success">Ajouter</button>
        </div>        
      </div>
  </form>
</div>

<?php 
require 'layout/footer.php';
?>
