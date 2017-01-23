<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$form = ActiveForm::begin ( [
		'options' => [
				'enctype' => 'multipart/form-data',
				'id' => 'form_publiza'
		],
		"action" => Yii::$app->urlManager->createAbsoluteUrl ( ['site/guardar-datos'] ),
] );

?>

	<?= $form->field($usuario, 'txt_nombre')->textInput(['maxlength' => true])?>
	
	<?= $form->field($usuario, 'txt_apellido_paterno')->textInput(['maxlength' => true])?>
	
	<?= $form->field($usuario, 'txt_apellido_materno')->textInput(['maxlength' => true])?>
	
	<?= $form->field($usuario, 'txt_genero')->textInput(['maxlength' => true])?>
	
	
	<?= $form->field($ubicacion, 'txt_pais')->textInput(['maxlength' => true])?>
	
	<?= $form->field($ubicacion, 'txt_estado')->textInput(['maxlength' => true])?>
	
	<?= $form->field($ubicacion, 'txt_ciudad')->textInput(['maxlength' => true])?>
	
	<?= $form->field($ubicacion, 'b_visa')->checkbox([],false)?>
	
	
	<?= $form->field($generales, 'id_alimentacion')->dropDownList(ArrayHelper::map($alimentos, 'id_alimentacion', 'txt_nombre_alimentacion'))?>
	
	<?= $form->field($generales, 'id_sangre2')->dropDownList(ArrayHelper::map($sangre, 'id_sangre', 'txt_nombre_sangre'))?>
	
	<?= $form->field($generales, 'b_alergias')->checkbox([],false)?>
	
	<?= $form->field($generales, 'b_capacidades_diferentes')->checkbox([],false)?>
	
	<?= $form->field($generales, 'b_padecimientos_especiales')->checkbox([],false)?>
	
	
	<?= $form->field($laborales, 'id_puesto')->dropDownList(ArrayHelper::map($puestos, 'id_puesto', 'txt_nombre_puesto'))?>
	
	<?= $form->field($laborales, 'txt_canal')->textInput(['maxlength' => true])?>
	
	
	<?= $form->field($contacto, 'b_telefono_celular')->textInput(['maxlength' => true])?>
	
	<?= $form->field($contacto, 'b_telefono_fijo')->textInput(['maxlength' => true])?>
	
	<?= $form->field($contacto, 'txt_email')->textInput(['maxlength' => true])?>
	
	<?= $form->field($contacto, 'txt_email_confirmar')->textInput(['maxlength' => true])?>
	
	<?= $form->field($contacto, 'b_asistente')->checkbox([],false)?>
	
	<?= $form->field($contacto, 'txt_email_asistente')->textInput(['maxlength' => true])?>
	
	<?= $form->field($contacto, 'b_tel_cel_asistente')->textInput(['maxlength' => true])?>
	
	<?= $form->field($contacto, 'b_tel_fijo_asistente')->textInput(['maxlength' => true])?>
		
	<?= Html::submitButton()?>

<?php

ActiveForm::end ();