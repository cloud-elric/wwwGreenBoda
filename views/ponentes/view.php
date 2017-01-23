<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EntPonentes */

$this->title = $model->txt_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Ponentes', 'url' => ['index', "id"=>$model->id_convencion]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading"><?=$this->title?></div>
			<div class="panel-body">

			    <?= DetailView::widget([
			        'model' => $model,
			        'attributes' => [
			            'id_ponente',
			            'id_convencion',
			            'txt_nombre',
			            'txt_apellido_p',
			            'txt_apellido_m',
			            'txt_job',
			            'txt_descripcion',
			            'txt_nombre_archivo',
			            'b_vip',
			            'b_habilitado',
			        ],
			    ]) ?>
			    
			    <p>
			        <?= Html::a('Actualizar', ['update', 'id' => $model->id_ponente], ['class' => 'btn btn-primary']) ?>
			        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_ponente], [
			            'class' => 'btn btn-danger',
			            'data' => [
			                'confirm' => 'Estas seguro de eliminar este elemento?',
			                'method' => 'post',
			            ],
			        ]) ?>
			    </p>

			</div>
		</div>
	</div>
</div>
