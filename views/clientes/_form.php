<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntClientes */
/* @var $form yii\widgets\ActiveForm */
?>



    <?php $form = ActiveForm::begin(); ?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		    <?= $form->field($model, 'txt_nombre')->textInput(['maxlength' => true])?>
		
		    <?= $form->field($model, 'txt_descripcion')->textArea(['maxlength' => true])?>
	    
	   	</div>
</div>

<div class="row">
<div class="col-md-12 text-center">
	<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
    </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

