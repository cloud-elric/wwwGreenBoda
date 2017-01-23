<?php

use app\models\EntRespuestasEncuestas;
use yii\data\ActiveDataProvider;
use app\models\EntPreguntasEncuestas;
use yii\widgets\DetailView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntEncuestasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Preguntas-respuestas';
$this->params['breadcrumbs'][] = ['label' => 'Listas', 'url' => ['encuestas/index-lista-respuestas?idE='.$idEv]];
$this->params['breadcrumbs'][] = $this->title;

// $searchModel = new EntRespuestasEncuestas();
// $dataProvider = new ActiveDataProvider([
// 		'query' => EntRespuestasEncuestas::find()->where(['id_respuesta_creacion'=>$idR]),
// ]);

$respEncuesta = EntRespuestasEncuestas::find()->where(['id_respuesta_creacion'=>$idR])->all();

?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading"><?=$this->title?></div>
			<div class="panel-body">
				
				<div class="col-md-4"><b>Usuario</b></div>
				<div class="col-md-4"><b>Pregunta</b></div>
				<div class="col-md-4"><b>Respuesta</b></div>
				
				<?php foreach($respEncuesta as $resp){ ?>
				
					<div class="col-md-4">
						<?= $resp->txt_nombre_usuario ?>
					</div>
					<div class="col-md-4">
						<?php 
						$preg = EntPreguntasEncuestas::find()->where(['id_pregunta'=>$resp->id_pregunta])->one();
						echo $preg->txt_pregunta;
						?>
					</div>
					<div class="col-md-4">
						<?= $resp->txt_valor ?>
					</div>
					
				<?php } ?>

			</div>
		</div>
	</div>
</div>

<canvas id="myChart"></canvas>

<?php 
$this->registerJs ( "
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
	  type: 'line',
	  data: {
	    labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
	    datasets: [{
	      label: 'apples',
	      data: [12, 19, 3, 17, 6, 3, 7],
	      backgroundColor: 'rgba(153,255,51,0.4)'
	    }, {
	      label: 'oranges',
	      data: [2, 29, 5, 5, 2, 3, 10],
	      backgroundColor: 'rgba(255,153,0,0.4)'
	    }]
	  }
	});
", View::POS_END );
?>
