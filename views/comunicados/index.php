<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatComunicadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comunicados';
$this->params ['breadcrumbs'] [] = [ 
		'label' => 'Evento',
		'url' => [ 
				'administrador/evento/' . $evento->id_convencion 
		] 
];
$this->params ['breadcrumbs'] [] = $this->title;

?>
<?php \yii\widgets\Pjax::begin(); ?>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-primary">
			<header class="panel-heading">
				<h2 class="panel-title">Comunicados</h2>
			</header>
			<div class="panel-body"></div>

    <?php
				echo GridView::widget ( [ 
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'columns' => [ 
								[ 
										'class' => 'yii\grid\SerialColumn' 
								],
								[ 
										'attribute' => 'txt_nombre',
										'format' => 'raw',
										'value' => function ($data) {
											return Html::a ( $data->txt_nombre, [ 
													'comunicados/view',
													'id' => $data->id_comunicado 
											] );
										} 
								],
								[ 
										'class' => 'yii\grid\ActionColumn',
										'template' => '{enviar} {view} {update} {delete}',
										'buttons' => [ 
												'enviar' => function ($url) {
													return Html::a ( '<span class="glyphicon glyphicon-send"></span>', $url, [ 
															'title' => 'enviar',
															'data-pjax' => '0' 
													] );
												} 
										] 
								] 
						] 
				] );
				?>

<div class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-center">
					 <?= Html::a('Crear comunicado', ['create', 'id'=>$evento->id_convencion], ['class' => 'btn btn-success'])?>
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php \yii\widgets\Pjax::end ();?>