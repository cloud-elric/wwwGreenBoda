<?php
use yii\helpers\Url;
use yii\web\View;
?>



<div class="card-wrapper">
	<div class="card">
		<div class="card-header">
			<p>Marcar como posible Ganador</p>
			<input class="js-chekbox-ganador" type="checkbox" data-id="<?= $model->id_usuario ?>" <?= $model->b_ganador?'checked':'' ?>>
		</div>
		<div class="card-img" style="background-image:url('<?= Url::base() ?>/uploads/<?=$model->txt_url_video?>')">
		</div>
		<div class="usr-data">
			<div class="data-row">
				<i class="icon ion-ios-person"></i><h3> <?= $model->txt_nombre_completo ?></h3>
			</div>
			<div class="data-row">
				<i class="icon ion-email"></i><h4><?= $model->txt_email ?></h4>
			</div>
			<div class="data-row">
				<i class="icon ion-iphone"></i><h4><?= $model->txt_telefono_celular ?></h4>
			</div>
			<div class="data-row">
				<i class="icon ion-ios-telephone"></i><h4><?= $model->txt_telefono_casa ?></h4>
			</div>
			<div class="data-row">
				<i class="icon ion-briefcase"></i><h4><?= $model->txt_ocupacion ?></h4>
			</div>
		</div>
		<div class="img-desc">
			<p><?= $model->txt_descripcion ?></p>
		</div>
	</div>
</div>

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
