<?php

use yii\grid\GridView;
use app\models\EntEventos;
use app\models\RelListasUsuarios;
use yii\helpers\Url;
use yii\web\View;

$this->title = 'Agregar Usuarios';
$this->params['breadcrumbs'][] = ['label' => 'Listas', 'url' => ['administrador/mostrar-lista?token='.$evento->txt_token]];
$this->params['breadcrumbs'][] = $this->title;

$eventos = EntEventos::find()->where(['id_cliente'=>$evento->id_cliente])->all();
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading"><?=$this->title?></div>
			<div class="panel-body">

				<?php echo $this->render('_search', ['model' => $searchModel, 'id' => $lista->id_lista_usuario_registrado]); ?>
				
				<?php
				
				$arrayEventos = array();
				foreach($eventos as $eve){
					array_push($arrayEventos, $eve->id_convencion);
				}
				?>
	
				<div class="js_agregar_usuarios" data-url="<?= Url::base() ?>" data-id="<?= $lista->id_lista_usuario_registrado ?>">Nombre: <?= $lista->txt_nombre ?></div>
	
	
				<?php \yii\widgets\Pjax::begin(); ?>
				<?php 
				
				echo GridView::widget([
						//'dataProvider' => $dataProvider,
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'columns' => [
								// ...
								[
									'class' => 'yii\grid\CheckboxColumn',
									// you may configure additional properties here
									'checkboxOptions' => function($model) use ($lista) {	
										if($buscar = RelListasUsuarios::find()->where(['id_usuario'=>$model->id_usuario])->andWhere(['id_lista'=>$lista->id_lista_usuario_registrado])->one()){
											return ["checked" => true];							
										}else{
											return ['value' => $model->id_usuario, 'class' => 'js-agregar-usuario'];
										}
									},
								],
								'txt_nombre_usuario'
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
	$(document).on({
		'change' : function(e){
			e.preventDefault();
			var url = $('.js_agregar_usuarios').data('url');
			var idLista = $('.js_agregar_usuarios').data('id');
			var idUsuario = $(this).val();
			console.log('cambio-'+idUsuario);
			$.ajax({
				url: url + '/administrador/agregar-user',
				type: 'post',
				data: {lista: idLista, user: idUsuario},
				success: function(){
					console.log('success');
				}
			});
		}
	}, '.js-agregar-usuario');
", View::POS_END );
?>


