<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntUsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = ['label' => 'Evento', 'url' => ['administrador/evento/'.$evento->id_convencion]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-md-14 col-md-offset">
		<div class="panel panel-primary">
			<header class="panel-heading">
				<h2 class="panel-title"><?= Html::encode($this->title) ?></h2>
			</header>
			<div class="panel-body"></div>

		    <?php echo $this->render('_search', ['model' => $searchModel, 'id' => $evento->id_convencion]); ?>
		
		    <?= GridView::widget([
		        'dataProvider' => $dataProvider,
		    	'filterModel' => $searchModel,
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],
		
		            'txt_nombre_usuario',
		            'txt_apellido_paterno',
		            'txt_apellido_materno',
		            'txt_genero',
		            'txt_email',
		        	'b_telefono_fijo',
		        	'b_telefono_celular',
		
		            [
		            	'class' => 'yii\grid\ActionColumn',
		            	'buttons' => [
			            	//view button
			            	'view' => function ($url, $model) {
			                	return Html::a('View', $url."/".$model->id_usuario);
			            	},
			            	'update' => function($url, $model) {
			            		return "";
			            	},
			            	'delete' => function($url, $model) {
			            	return "";
			            	}
		        		],	
		    		],
		        ],
		    ]); ?>
		    
		</div>
	</div>
</div>
