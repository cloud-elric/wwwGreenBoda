<?php

use yii\helpers\Html;
use app\models\EntEventos;

/* @var $this yii\web\View */
/* @var $model app\models\EntClientes */

$evento = EntEventos::find()->where(['id_convencion'=>$model->id_evento])->one();

$this->title = 'Actualizar Listas: ' . $model->txt_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Listas', 'url' => ['administrador/mostrar-lista?token='.$evento->txt_token]];
$this->params['breadcrumbs'][] = ['label' => $model->txt_nombre, 'url' => ['view', 'id' => $model->id_lista_usuario_registrado]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading"><?=$this->title?></div>
			<div class="panel-body">

			    <?= $this->render('_form', [
			        'model' => $model,
			    ]) ?>

			</div>
		</div>
	</div>
</div>
