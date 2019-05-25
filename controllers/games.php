<?php
require 'models/dataBase.php';
require 'models/product.php';
$produit = Product::GetAll();
require 'views/games.php';

if(!empty($_SESSION['login'])){
  ?>
<script>
  $(document).reload(function(){
    $(".drag").draggable({
    containment : ".limite",
    revert: true
    ,
    drag : function(){
      $(".drop")
      .addClass("shadow-pop-tr");
    }
  });
  $(".drop").droppable({
    drop : function(){
      $(".drop").addClass("shadow-pop-tr-reverse");
    }
  });
});
</script>
<?php
}
?>