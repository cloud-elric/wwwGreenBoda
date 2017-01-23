<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EntEventos */

$this->title = 'Crear evento';
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['eventos/index/'.$model->id_cliente]];
$this->params['breadcrumbs'][] = $this->title;
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