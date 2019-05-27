$(document).ready(function(){
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
      var idProd = current.attr('id');
      var basket = $('#basket'); // on stock l'identifiant qui contiendra nos images
      current.fadeOut(function(){ // nouvelles fonction de callback, qui s'exécutera une fois l'effet terminé
        basket.append('<img src="' + path + ' " class="smallImg" />'); // et enfin, ajout de l'image
        updateOrder(idProd);
      });
    }
  });

  function updateOrder(data) {
$.ajax({
    url:"ajaxPro",
    type:'post',
    data:{position:data},
    success:function(){
        alert('your change successfully saved');
    }
})

}
})