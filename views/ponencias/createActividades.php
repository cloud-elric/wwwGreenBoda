<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EntPonencias */

$this->title = 'Crear actividades';
$this->params['breadcrumbs'][] = ['label' => 'Actividades', 'url' => ['actividades', 'id' => $evento->id_convencion]];
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
