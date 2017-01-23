<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EntPonencias */

$this->title = 'Crear lista';
$this->params['breadcrumbs'][] = ['label' => 'Listas', 'url' => ['mostrar-lista', 'token' => $evento->txt_token]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading"><?=$this->title?></div>
			<div class="panel-body">

			    <?= $this->render('_form', [
			        'model' => $model,
			    	'evento' => $evento
			    ]) ?>

			</div>
		</div>
	</div>
</div>
