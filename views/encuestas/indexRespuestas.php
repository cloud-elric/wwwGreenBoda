<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntEncuestasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listas';
$this->params['breadcrumbs'][] = ['label' => 'Evento', 'url' => ['administrador/evento/'.$encuesta->id_convencion]];
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
		
		            [ 
						'attribute' => 'Fecha',
						'format' => 'raw',
						'value' => function ($data) use ($encuesta) {
							return Html::a ( $data->fch_creacion, [ 
								'encuestas/index-respuestas-encuestas?idR='.$data->id_respuesta.'&idEv='.$encuesta->id_convencion
							]);
						} 
					],
		        ],
		    ]); ?>
		    
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-center">
				 		
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>
		    