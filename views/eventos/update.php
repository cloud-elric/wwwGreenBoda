<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EntEventos */

$this->title = 'Actualizar evento: ' . $model->txt_titulo;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['eventos/index/'.$model->id_cliente]];
$this->params['breadcrumbs'][] = ['label' => $model->txt_titulo, 'url' => ['view', 'id' => $model->id_convencion]];
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