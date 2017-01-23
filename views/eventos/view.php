<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Utils;

/* @var $this yii\web\View */
/* @var $model app\models\EntEventos */

$this->title = Html::encode ( $model->txt_titulo );
$this->params ['breadcrumbs'] [] = [ 
		'label' => 'Eventos',
		'url' => [ 
				'eventos/index/' . $model->id_cliente 
		] 
];
$this->params ['breadcrumbs'] [] = $this->title;
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<header class="panel-heading">
				<h2 class="panel-title">
					<?=Html::encode($model->txt_titulo )?>
				</h2>
			</header>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<p class="pull-right">
							<strong>Fecha:</strong> <?=Utils::changeFormatDate($model->fch_inicio)?> a <?=Utils::changeFormatDate($model->fch_fin)?></p>
					</div>
				</div>
				<p>
					<strong>Descripción del evento</strong>
				</p>
				<p><?=Html::encode($model->txt_descripcion)?></p>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-center">
			        	<?= Html::a('Actualizar', ['update', 'id' => $model->id_convencion], ['class' => 'btn btn-primary'])?>
			        	<?=Html::a ( 'Eliminar', [ 'delete','id' => $model->id_convencion ], [ 'class' => 'btn btn-danger','data' => [ 'confirm' => 'Estas seguro de que quieres eliminar este elemento?','method' => 'post' ] ] )?>
			        </div>
    			</div>
			</div>
		</div>
	</div>
</div>
