<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EntClientes */

$this->title = 'Cliente: '.$model->txt_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<header class="panel-heading">
				<h2 class="panel-title">
					<?=Html::encode($this->title )?>
				</h2>
			</header>
			<div class="panel-body">
				
				<p>
					<strong>Descripción</strong>
				</p>
				<p><?=Html::encode($model->txt_descripcion)?></p>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-center">
			        	<?= Html::a('Actualizar', ['update', 'id' => $model->id_cliente], ['class' => 'btn btn-primary'])?>
			        	<?=Html::a ( 'Eliminar', [ 'delete','id' => $model->id_cliente ], [ 'class' => 'btn btn-danger','data' => [ 'confirm' => 'Estas seguro de que quieres eliminar este elemento?','method' => 'post' ] ] )?>
			        </div>
    			</div>
			</div>
		</div>
	</div>
</div>

