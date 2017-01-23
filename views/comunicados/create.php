<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CatComunicados */

$this->title = 'Crear comunicado';
$this->params['breadcrumbs'][] = ['label' => 'Comunicados', 'url' => ['index?id='.$model->id_evento]];
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
