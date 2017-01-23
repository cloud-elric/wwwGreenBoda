<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntPonentes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-ponentes-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
    
		<?= $form->field($model, 'id_convencion')->textInput(['maxlength' => true, 'style' => 'display:none'])->label(false) ?>
		
		<div class="col-md-4">
		
		    <?= $form->field($model, 'txt_nombre')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'txt_apellido_p')->textInput(['maxlength' => true]) ?>
		    
		    <?= $form->field($model, 'txt_apellido_m')->textInput(['maxlength' => true]) ?>
		    
		</div>
		
		<div class="col-md-4">
		
		    <?= $form->field($model, 'txt_job')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'txt_descripcion')->textInput(['maxlength' => true]) ?>
		    
		    <?= $form->field($model, 'txt_nombre_archivo')->textInput(['maxlength' => true]) ?>
		    
		</div>
		
		<div class="col-md-4">
		
		    <?= $form->field($model, 'b_vip')->textInput(['maxlength' => true]) ?>
		
		    <div class="form-group">
		        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>
		    
		</div>
	
	</div>

    <?php ActiveForm::end(); ?>

</div>
