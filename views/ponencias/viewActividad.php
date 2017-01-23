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
$this->params['breadcrumbs'][] = ['label' => 'Actividades', 'url' => ['actividades', 'id' => $model->id_convencion]];
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
			            //'id_ponencia',
			            //'id_convencion',
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
			            //'b_vip',
			            //'b_receso',
			            //'b_habilitado',
			        ],
			    ]) ?>
			    
			    <p>
			        <?= Html::a('Actualizar', ['update-actividad', 'id' => $model->id_ponencia], ['class' => 'btn btn-primary']) ?>
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

