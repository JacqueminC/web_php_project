<?php 
require 'layout/header.php';
require 'models/product.php';
$id = $_GET['id'];
$product = Product::getProduct($id);

if(empty($_SESSION['roleId']) || $_SESSION['roleId'] > 3){
  header('Location: admin?case=product');
}
?>

<h3 class="text-center">Modifier produit</h3>

<div class="d-flex justify-content-center">

  <form action="updateProduct?id=<?php echo $product->getId() ?>" method="post">
    <div class="row">
      <div class="form-group">
        <div class="col">
          <input type="text" name="productName" class="form-control" value="<?php echo $product->getProductName() ?>" placeholder="Nom" required>
          <input type="text" name="price" class="form-control" value="<?php echo number_format($product->getPrice(), 2, ',', ' ') ?>" placeholder="prix" required> 
          <select name="categorieId" class="custom-select">
            <option selected="" value="<?php echo $product->getCategorieId() ?>" ><?php echo Product::categorieConvert($product->getCategorieId()) ?></option>
            <option value="1">Jeux de société</option>
            <option value="2">Jeux de rôle</option>
            <option value="3">Jeux de plateau</option>
          </select>   
            <label for="exampleTextarea">Description</label>
            <textarea class="form-control"  name="description" id="exampleTextarea" value="<?php echo $product->getDescription() ?>" rows="3" style="height: 107px;"> <?php echo $product->getDescription() ?></textarea>
        </div>
        </div>

      </div>
      <div class="row">
        <div class="col">          
          <a href="admin?case=product"><button type="button" class="btn btn-secondary">Retour</button></a>
          <button type="submit" class="btn btn-success">Modifier</button>
        </div>        
      </div>
  </form>
</div>

<?php 
require 'layout/footer.php';
?>
