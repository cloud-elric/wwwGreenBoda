<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $usuario app\models\EntUsuarios */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Registra tu video';

?>

<?php $form = ActiveForm::begin(['options' => [ 
				'enctype' => 'multipart/form-data' 
		],]); ?>
<?= $form->field($usuario, 'txt_nombre')->textInput(['maxlength' => true])?>
<?= $form->field($usuario, 'txt_apellido_paterno')->textInput(['maxlength' => true])?>
<?= $form->field($usuario, 'txt_apellido_materno')->textInput(['maxlength' => true])?>
<?= $form->field($usuario, 'txt_email')->textInput(['maxlength' => true])?>
<?= $form->field($usuario, 'txt_telefono_celular')->textInput(['maxlength' => true])?>
<?= $form->field($usuario, 'video')->fileInput()?>
<?= Html::submitButton($usuario->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $usuario->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
<?php ActiveForm::end(); ?>

<div class="guardar-registro">
Guardar
</div>
<div id="container-video-viewer">

</div>
