<?php
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$this->title = 'Enviar comunidado: '.$comunicado->txt_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Comunicados', 'url' => ['index?id='.$comunicado->id_evento]];
$this->params['breadcrumbs'][] = $comunicado->txt_nombre;
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<header class="panel-heading">
				<h2 class="panel-title">
					<?=$comunicado->txt_nombre?>
				</h2>
			</header>
			<div class="panel-body">
			<?php $form = ActiveForm::begin(); ?>
			
			 <?=$form->field ( $comunicadoEnviar, 'id_lista' )->dropDownList ( $listas,[ 'prompt' => 'Seleccione una lista' ] )?>
			 
			 <?php 
			 $i= 0;
			 foreach($optionsTemplate as $option){
			 	?>
			 <div class="form-group">	
			 <?php 
			 echo $form->field($option, '['.$i.']txt_config')->textarea()->label($option->txt_nombre);
			 ?>
			 </div>
			 
			 <?php 
			 $i++;
			 }
			 ?>
			 
			 <div class="row">
					<div class="col-md-12 text-center">
			 <?= Html::submitButton('Enviar comunicado', ['class' => 'btn btn-success']) ?>
			 </div>
			 </div>
			<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>