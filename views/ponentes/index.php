<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntPonentesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ponentes';
$this->params['breadcrumbs'][] = ['label' => 'Evento', 'url' => ['administrador/evento/'.$evento->id_convencion]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-primary">
			<header class="panel-heading">
				<h2 class="panel-title"><?= Html::encode($this->title) ?></h2>
			</header>
			<div class="panel-body"></div>

		    <?= GridView::widget([
		        'dataProvider' => $dataProvider,
		        'filterModel' => $searchModel,
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],
		
		            'id_ponente',
		            'id_convencion',
		            'txt_nombre',
		            'txt_apellido_p',
		            'txt_apellido_m',
		            // 'txt_job',
		            // 'txt_descripcion',
		            // 'txt_nombre_archivo',
		            // 'b_vip',
		            // 'b_habilitado',
		
		            ['class' => 'yii\grid\ActionColumn'],
		        ],
		    ]); ?>
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-center">
					<?= Html::a('Crear Ponentes', ['create', 'idEvento' => $evento->id_convencion], ['class' => 'btn btn-success']) ?>
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>
