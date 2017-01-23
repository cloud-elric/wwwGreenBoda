<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\EntEventos;

/* @var $this yii\web\View */
/* @var $model app\models\EntClientes */

$evento = EntEventos::find()->where(['id_convencion'=>$model->id_evento])->one();

$this->title = $model->txt_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Listas', 'url' => ['administrador/mostrar-lista?token='.$evento->txt_token]];
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
			            //'id_lista_usuario_registrado',
			            'txt_nombre',
			            //'b_habilitado',
			        ],
			    ]) ?>
			    
			     <p>
			        <?= Html::a('Actializar', ['update', 'id' => $model->id_lista_usuario_registrado], ['class' => 'btn btn-primary']) ?>
			        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_lista_usuario_registrado], [
			            'class' => 'btn btn-danger',
			            'data' => [
			                'confirm' => 'Estas seguro de que quieres eliminar este elemeneto?',
			                'method' => 'post',
			            ],
			        ]) ?>
			    </p>

			</div>
		</div>
	</div>
</div>

