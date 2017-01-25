<?php
use yii\helpers\Url;
use yii\web\View;
?>
<input class="js-chekbox-ganador" type="checkbox" data-id="<?= $model->id_usuario ?>" <?= $model->b_ganador?'checked':'' ?>>
<?= $model->txt_nombre_completo ?>  
<?= $model->txt_email ?>
<?= $model->txt_telefono_celular ?>
<a class="js-btn-video" href="<?= Url::base() ?>/admin/ver-video?idUs=<?= $model->id_usuario ?>" data-url="<?= $model->txt_url_video ?>">Video</a>

<?php 
$this->registerJs ( "
	$('.js-chekbox-ganador').on('change', function(){
		var idUsuario = $(this).data('id');
		$.ajax({
			url: '".Url::base()."/admin/user-ganador',
			type: 'post',
			data: {id: idUsuario},
			success: function(){
				console.log('success');
			}
		});
	});
", View::POS_END );
?>
