<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EntClientes */

$this->title = 'Actualizar cliente: ' . $model->txt_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->txt_nombre, 'url' => ['view', 'id' => $model->id_cliente]];
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
