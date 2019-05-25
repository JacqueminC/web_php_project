<?php
require 'models/dataBase.php';
require 'models/product.php';
$produit = Product::GetAll();
require 'views/games.php';

if(!empty($_SESSION['login'])){
  ?>
<script>
    $(".drag img").draggable({
    containment : ".limite",
    revert: true,
  });
  $(".drop").droppable({
    accept : '.drag img',
    activeClass :'shadow-pop-tr',
    hoverClass : 'shadow-pop-tr-reverse',
    drop : function(event, ui){
      var current = ui.draggable; // on récupère l'élément étant déplacé
      var path = current.attr('src'); // récupération du chemin de l'image déplacée
      var basket = $('#basket'); // on stock l'identifiant qui contiendra nos images
      current.fadeOut(function(){ // nouvelles fonction de callback, qui s'exécutera une fois l'effet terminé
        basket.append('<img src="' + path + ' " class="smallImg" />'); // et enfin, ajout de l'image
        updateOrder(path);
      });
    }
  });

  function updateOrder(data) {
$.ajax({
    url:"ajaxPro.php",
    type:'post',
    data:{position:data},
    success:function(){
        alert('your change successfully saved');
    }
})

}
</script>
<?php
}
?>