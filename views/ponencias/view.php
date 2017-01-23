<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\EntPonentes;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use app\models\RelConvencionPonente;
use app\models\RelPonenciaPonente;
use yii\web\View;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\EntPonencias */

$this->title = $model->txt_titulo;
$this->params['breadcrumbs'][] = ['label' => 'Conferencias', 'url' => ['index', 'id' => $model->id_convencion]];
$this->params['breadcrumbs'][] = $this->title;

$idPonencia = $model->id_ponencia;
?>
<?php \yii\widgets\Pjax::begin(); ?>
<div class="ent-ponencias-view" data-id="<?= $model->id_ponencia ?>" data-url="<?= Url::base() ?>"></div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading"><?=$this->title?></div>
			<div class="panel-body">
			
			    <?= DetailView::widget([
			        'model' => $model,
			        'attributes' => [
			            'txt_titulo',
			            'txt_actividad',
			            'txt_descripcion',
			            'txt_notas',
			            'txt_lugar',
			            'num_cupo',
			            'num_dia',
			            'num_orden',
			            'txt_hora_inicio',
			            'txt_duracion',
			            'txt_imagen_header',
			            'txt_grupo',
			            'txt_ico',
			            'num_asistentes',
			        ],
			    ]) ?>
			    
			    <p>
			        <?= Html::a('Actualizar', ['update', 'id' => $model->id_ponencia], ['class' => 'btn btn-primary']) ?>
			        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_ponencia], [
			            'class' => 'btn btn-danger',
			            'data' => [
			                'confirm' => 'Estas seguro de que quieres eliminar este elemento?',
			                'method' => 'post',
			            ],
			        ]) ?>
			    </p>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">Elegir ponentes</div>
			<div class="panel-body">
    
			    <?php 
				$dataProvider = new ActiveDataProvider([
					'query' => EntPonentes::find()->where(['id_convencion'=>$model->id_convencion]),
					'pagination' => [
							'pageSize' => 20,
					],
				]);
				echo GridView::widget([
					'dataProvider' => $dataProvider,
					'columns' => [
						// ...
						[
							'class' => 'yii\grid\CheckboxColumn',
							// you may configure additional properties here
							'checkboxOptions' => function($model) use ($idPonencia){	
								if($buscar = RelPonenciaPonente::find()->where(['id_ponente'=>$model->id_ponente])->andWhere(['id_ponencia'=>$idPonencia])->one()){
									return ["checked" => true];							
								}
							},
						],
						'txt_nombre'
					]
				]);
				\yii\widgets\Pjax::end();
				?>
			</div>
		</div>
	</div>
</div>


<?php 
$this->registerJs ( "
	$(document).ready(function(){
		var idPonencia = $('.ent-ponencias-view').data('id');
		var url = $('.ent-ponencias-view').data('url');
		$('input:checkbox').on('change', function() {
			var idPonente = $(this).val();
			//console.log('cambio-'+$(this).val()+' ponencia-'+idPonencia);
			$.ajax({
				url: url + '/ponencias/agregar-ponentes',
				type: 'post',
				data: {ponencia: idPonencia, ponente: idPonente},
				success: function(){
					console.log('success');
				}
			});
		}); 
	});
", View::POS_END );
?>

