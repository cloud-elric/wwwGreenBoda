<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CatTemplatesHtml;

/* @var $this yii\web\View */
/* @var $model app\models\CatComunicados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-comunicados-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">

		<div class="col-md-6">
			
			<?= $form->field($model, 'txt_nombre')->textInput(['maxlength' => true]) ?>
			
		</div>
		
			<div class="col-md-6">
    
			<?= $form->field($model, 'id_template')->dropDownList(
		            ArrayHelper::map(CatTemplatesHtml::find()->asArray()->all(), 'id_template_html', 'txt_nombre'), ['prompt'=>'Seleccionar template'])?>
			
		</div>
			
		<div class="col-md-12">

    		<?= $form->field($model, 'txt_descripcion')->textarea(['maxlength' => true]) ?>

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

</div>
