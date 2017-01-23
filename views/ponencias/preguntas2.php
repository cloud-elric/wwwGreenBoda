<?php
use yii\helpers\Url;
use yii\web\View;
?>

<?= "<input type='checkbox' class='js-checbox-aceptar' data-id=".$model->id_pregunta." data-url=".Url::base().">";?>
<?= "$model->txt_pregunta";?> 

<?php 
$this->registerJs ( "
	$(document).ready(function(){
		var url = $('.js-checbox-aceptar').data('url');
		$('input:checkbox').on('change', function() {
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
		}); 
	});
", View::POS_END );
?>
