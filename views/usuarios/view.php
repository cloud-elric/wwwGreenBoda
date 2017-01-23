<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EntUsuarios2 */

$this->title = $model->txt_nombre_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['usuarios/index/'.$model->id_evento]];
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
			            'id_usuario',
			            'id_evento',
			            'txt_nombre_usuario',
			            'txt_apellido_paterno',
			            'txt_apellido_materno',
			            'txt_genero',
			            'fch_creacion',
			        	'txt_nombre_estado',
			        	'txt_ciudad',
			        	'txt_nombre_puesto',
			        	'b_telefono_celular',
			        	'b_telefono_fijo',
			        	'txt_extension',
			        	'txt_email',
			        	'asistente',
			        	'b_tel_cel_asistente',
			        	'b_tel_fijo_asistente',
			        	'txt_nombre_alimentacion',
			        	'txt_nombre_sangre',
			        	'alergias',
			        	'txt_alergias',
			        	'capacidades',
			        	'txt_capacidades',
			        	'padecimientos',
			        	'txt_padecimientos'
			        ],
			    ]) ?>

			</div>
		</div>
	</div>
</div>
