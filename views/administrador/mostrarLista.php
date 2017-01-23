<?php
use yii\grid\GridView;
use app\models\EntListasUsuariosRegistrados;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;

$this->title = 'Mostrar lista';
$this->params['breadcrumbs'][] = ['label' => 'Evento', 'url' => ['administrador/evento/'.$evento->id_convencion]];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php \yii\widgets\Pjax::begin(); ?>

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-primary">
			<header class="panel-heading">
				<h2 class="panel-title"><?= Html::encode($this->title) ?></h2>
			</header>
			<div class="panel-body"></div>

			<?php
			$dataProvider = new ActiveDataProvider([
					'query' => EntListasUsuariosRegistrados::find()->where(['id_evento'=>$evento->id_convencion]),
					'pagination' => [
							'pageSize' => 20,
					],
			]);
			?>
			
			<?= GridView::widget([
			    'dataProvider' => $dataProvider,
			    'columns' => [
			    	[
				    	'attribute'=>'txt_titulo',
				    	'format'=>'raw',
				    	'value' => function($data)
				    	{
				    		return
				    		Html::a($data->txt_nombre, ['ver-lista-usuarios','id'=>$data->id_lista_usuario_registrado]);
				    	}
			    	],
			    	['class' => 'yii\grid\ActionColumn']
			    ],
			]); ?>

			<div class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-center">
						<?= Html::a('Crear lista', ['create', 'idEvento' => $evento->id_convencion], ['class' => 'btn btn-success']) ?>
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php \yii\widgets\Pjax::end(); ?>
