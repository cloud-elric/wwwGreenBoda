<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntPonenciasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Conferencias';
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
		
		//             'id_ponencia',
		//             'id_evento',
					
		        	[
		        		'attribute' => 'txt_titulo',
		        		'format' => 'raw',
		        		'value' => function ($data) {
		        			return Html::a ( $data->txt_titulo, [
		        				'ponencias/preguntas?id='.$data->id_ponencia.'&idEvento='.$data->id_convencion
		        			]);
		        		}
		        	],
		        	
		            'txt_actividad',
		            'txt_descripcion',
		            'txt_notas',
		            'txt_lugar',
		            // 'num_cupo',
		            // 'num_dia',
		            // 'num_orden',
		            // 'txt_hora_inicio',
		            // 'txt_duracion',
		            // 'txt_imagen_header',
		            // 'txt_grupo',
		            // 'txt_ico',
		            // 'num_asistentes',
		            // 'b_vip',
		            // 'b_receso',
		            // 'b_habilitado',
		
		            //['class' => 'yii\grid\ActionColumn'],
		        ],
		    ]); ?>
		    
		</div>
	</div>
</div>

