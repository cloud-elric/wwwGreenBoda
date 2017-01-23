<?php
use yii\helpers\Url;
?>

<style>

.js-pregunta-aceptada{
    width: 80%;
    /* display: flex; */
    margin: 0 auto;
    border: 1px solid black;
    background: white;
    margin-top: 25px;
    padding-top: 30px;
    padding-bottom: 30px;
    font-size: 30pt;
    font-weight: bold;
    -webkit-box-shadow: 7px 7px 5px 0px rgba(0,0,0,0.5);
-moz-box-shadow: 7px 7px 5px 0px rgba(0,0,0,0.5);
box-shadow: 7px 7px  5px 0px rgba(0,0,0,0.5);

border-radius: 10px 10px 10px 10px;
-moz-border-radius: 10px 10px 10px 10px;
-webkit-border-radius: 10px 10px 10px 10px;
border: 0px solid #fff;
}

</style>
                
                
<div class="js-contenedor-preguntas-aceptadas" data-id="<?= $idP ?>" data-url="<?= Url::base() ?>" style="
    width: 100%;
">

	<?php if($preguntas){ ?>
		<?php foreach($preguntas as $pregunta){ ?>
			<p class='js-pregunta-aceptada' data-id="<?= $pregunta->id_pregunta ?>" ><?= $pregunta->txt_pregunta ?></p>
		<?php } ?>
	<?php }else{ ?>
		<p class='js-pregunta-aceptada' data-id="0" style="display: none"></p>
	<?php } ?>
	
</div>

<script>
	function tiempoPreguntar(){
		var arreglo = [];
		$('.js-pregunta-aceptada').each(function(get){
			var idPreg = $(this).data('id');  
			arreglo.push(idPreg);
		});
		console.log(arreglo);
		
		var id = $('.js-contenedor-preguntas-aceptadas').data('id');
		var url = $('.js-contenedor-preguntas-aceptadas').data('url');

		$.ajax({
			url: url + '/site/preguntas-ajax?idP='+id,
			type: 'get',
			success: function(resp){
				$.each(resp.preguntas, function(k, v) {
					
						$('.js-contenedor-preguntas-aceptadas').prepend("<p class='js-pregunta-aceptada' data-id="+v.id_pregunta+">"+v.txt_pregunta+"</p>");
				
				});
			}
		});
	}	                       	
		
	setInterval(function(){
		tiempoPreguntar();	
	}, 5000);
</script>

                   