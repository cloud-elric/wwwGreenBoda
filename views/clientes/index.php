<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntClientesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params ['breadcrumbs'] [] = $this->title;
?>
<?php \yii\widgets\Pjax::begin(); ?>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-primary">
			<header class="panel-heading">
				<h2 class="panel-title">Clientes</h2>
			</header>
			<div class="panel-body"></div>
			
    		<?php
						echo GridView::widget ( [ 
								'dataProvider' => $dataProvider,
								'filterModel' => $searchModel,
								'layout' => "{items}\n<div class='row'><div class='col-md-10 col-md-offset-1 text-center'>{pager}</div></div>\n<div class='row'><div class='col-md-10 col-md-offset-1'>{summary}</div></div>",
								'tableOptions' => [ 
										'class' => 'table table-striped table-hover' 
								],
								'summaryOptions' => [ 
										'class' => 'pull-right' 
								],
								'columns' => [ 
										[ 
												'class' => 'yii\grid\SerialColumn' 
										],
										[ 
												'attribute' => 'txt_nombre',
												'format' => 'raw',
												'value' => function ($data) {
													return Html::a ( $data->txt_nombre, [ 
															'eventos/index',
															'id' => $data->id_cliente 
													], [ 
															'data-pjax' => '0' 
													] );
												} 
										],
										[ 
												'class' => 'yii\grid\ActionColumn',
											//	'buttons' => [
												//		'delete' => function ($url, $model) {
// 														return Html::a('', $url, [
// 																'class' => '... popup-modal',
// 																'data-toggle' => 'modal',
// 																'data-target' => '#modal',
// 																'data-id' => $model->id_cliente,
// 																'id' => 'popupModal-'. $model->id_cliente
// 														]);
														//},
									//]
										] 
								] 
						] );
						
						?>
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-center">
					 <?= Html::a('Crear clientes', ['create'], ['class' => 'btn btn-success'])?>
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php \yii\widgets\Pjax::end ();?>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
       
    
