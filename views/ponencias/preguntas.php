<?php

use yii\web\View;
use yii\helpers\Url;

$this->title = 'Preguntas';
$this->params['breadcrumbs'][] = ['label' => 'Conferencias', 'url' => ['ponencias/index-preguntas', 'id' => $evento->id_convencion]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">Lista de preguntas de <?= $conferencia->txt_titulo ?></div>
			<div class="panel-body">

				<div id="mostar-preguntas" class="js-intervalo" data-id="<?= $id ?>" data-url="<?= Url::base() ?>" data-evento="<?= $evento->id_convencion ?>">
				
					<?php if($preguntas){ ?>
						
						<?php foreach($preguntas as $pregunta){ ?>
							<input type='checkbox' class='js-checbox-aceptar' data-id="<?= $pregunta->id_pregunta ?>" >
							<?= $pregunta->txt_pregunta ?>
							<?= "<br/>" ?>
						<?php } ?>
						
					<?php }else{ ?>
						<input type='checkbox' class='js-checbox-aceptar' data-id="0" style="display: none">
					<?php } ?>
				
				</div>
				
			</div>
		</div>
		<a href="<?= Url::base() ?>/site/preguntas?idP=<?= $conferencia->id_ponencia ?>">Preguntas filtradas</a>
	</div>
</div>


<?php 
$this->registerJs ( "	
	$(document).on({
		'change': function(e) {
			e.preventDefault();
			var url = $('.js-intervalo').data('url');
			var idPregunta = $(this).data('id');
			console.log('cambio-'+idPregunta);
			$.ajax({
				url: url + '/ponencias/aceptar-pregunta',
				type: 'post',
				data: {preg: idPregunta},
				success: function(){
					console.log('success');
				}
			});
		}
	}, '.js-checbox-aceptar');
", View::POS_END );
?>

<script>

function tiempoPreguntar(){
	var id = $('.js-intervalo').data('id');
	var ultimoId = $('.js-intervalo input.js-checbox-aceptar:last').data('id');
	var url = $('.js-intervalo').data('url');
	var idEvento = $('.js-intervalo').find().end().data('evento');
	console.log("ultimoid-"+ultimoId);
	$.ajax({
		url: url + '/ponencias/preguntas?id='+id+'&idEvento='+idEvento+'&ultimoId='+ultimoId,
		type: 'get',
		success: function(resp){
			if(resp.status == "success"){
				$.each(resp.preguntas, function(k, v) {
						console.log(k);
						$('.js-intervalo').append("<input type='checkbox' class='js-checbox-aceptar' data-id='"+v.id_pregunta+"'>");
						$('.js-intervalo').append(v.txt_pregunta+'<br/>');
					
				});
			}
		}
	});
}	                       	
	
setInterval(function(){
	tiempoPreguntar();	
}, 2000);

</script>


