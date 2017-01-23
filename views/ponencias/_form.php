<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntPonencias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-ponencias-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">

		<?= $form->field($model, 'id_convencion')->textInput(['maxlength' => true, 'style' => 'display:none'])->label(false) ?>
		<div class="col-md-4">
		
		    <?= $form->field($model, 'txt_titulo')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'txt_actividad')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'txt_descripcion')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'txt_notas')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'txt_lugar')->textInput(['maxlength' => true]) ?>
		    
		    <?= $form->field($model, 'num_cupo')->textInput(['maxlength' => true]) ?>
		    
		</div>
		
		<div class="col-md-4">
		
		    <?= $form->field($model, 'num_dia')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'num_orden')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'txt_hora_inicio')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'txt_duracion')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'txt_imagen_header')->textInput(['maxlength' => true]) ?>
		    
		    <?= $form->field($model, 'txt_grupo')->textInput(['maxlength' => true]) ?>
		    
		</div>
		
		<div class="col-md-4">
		
		    <?= $form->field($model, 'txt_ico')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'num_asistentes')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'b_vip')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'b_receso')->textInput(['maxlength' => true]) ?>
		
		    <div class="form-group">
		        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>
		    
		</div>
		
	</div>

    <?php ActiveForm::end(); ?>

</div>
