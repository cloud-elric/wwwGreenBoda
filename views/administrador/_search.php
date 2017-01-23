<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\CatEstados;
use app\models\CatNivelesPuestos;
use app\models\CatTiposAlimentacion;
use app\models\CatTipoSangre;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\EntUsuariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-usuarios2-search">

    <?php $form = ActiveForm::begin([
        'action' => ['ver-lista-usuarios?id='.$id],
        'method' => 'get',
    ]); ?>
    
    <div class="row">

		<div class="col-md-4">

		    <?= $form->field($model, 'txt_nombre_usuario') ?>
		
		    <?= $form->field($model, 'txt_apellido_paterno') ?>
		
		    <?= $form->field($model, 'txt_apellido_materno') ?>
		    
		    <?= $form->field($model, 'id_estado')->dropDownList(
		            ArrayHelper::map(CatEstados::find()->asArray()->all(), 'id_estado', 'txt_nombre'), ['prompt'=>'seleccionar estado'])?>
    		
    		<?= $form->field($model, 'txt_ciudad') ?>
		    
		    <?= $form->field($model, 'id_puesto')->dropDownList(
		            ArrayHelper::map(CatNivelesPuestos::find()->asArray()->all(), 'id_puesto', 'txt_nombre_puesto'), ['prompt'=>'seleccionar puesto'])?>
    		
    	</div>
    	
    	<div class="col-md-4">
   
		    <?= $form->field($model, 'b_telefono_fijo') ?>
		    
		    <?= $form->field($model, 'b_telefono_celular') ?>
		    
		    <?= $form->field($model, 'txt_extension') ?>
    
		    <?= $form->field($model, 'txt_email') ?>
		    
		    <?= $form->field($model, 'txt_genero') ?>
		
		    <?= $form->field($model, 'fch_creacion') ?>
		    
		</div>
		
		<div class="col-md-4">
    
		    <?= $form->field($model, 'id_alimentacion')->dropDownList(
		            ArrayHelper::map(CatTiposAlimentacion::find()->asArray()->all(), 'id_alimentacion', 'txt_nombre_alimentacion'), ['prompt'=>'seleccionar alimentacion'])?>
		    
		    <?= $form->field($model, 'id_sangre')->dropDownList(
		            ArrayHelper::map(CatTipoSangre::find()->asArray()->all(), 'id_sangre', 'txt_nombre_sangre'), ['prompt'=>'seleccionar tipo sangre'])?>
		    
		    <?= $form->field($model, 'txt_alergias') ?>
		    
		    <?= $form->field($model, 'txt_capacidades') ?>
		    
		    <?= $form->field($model, 'txt_padecimientos') ?>
		
		    <div class="form-group">
		        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
		        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		    </div>
		    
		</div>

    <?php ActiveForm::end(); ?>

</div>
