<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $usuario app\models\EntUsuarios */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Registra tu video';

$this->registerJsFile ( '@web/plugins/sweetAlert/js/sweetalert.min.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerCssFile ( '@web/plugins/sweetAlert/css/sweetalert.css', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerJsFile ( '@web/plugins/ladda-bootstrap/dist/ladda.min.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerCssFile ( '@web/plugins/ladda-bootstrap/dist/ladda-themeless.min.css', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

?>

<?php $form = ActiveForm::begin(['id'=>'form-registro', 'options' => [ 
				'enctype' => 'multipart/form-data' 
		],]); ?>
<?= $form->field($usuario, 'txt_nombre')->textInput(['maxlength' => true])?>
<?= $form->field($usuario, 'txt_apellido_paterno')->textInput(['maxlength' => true])?>
<?= $form->field($usuario, 'txt_apellido_materno')->textInput(['maxlength' => true])?>
<?= $form->field($usuario, 'txt_email')->textInput(['maxlength' => true])?>
<?= $form->field($usuario, 'txt_telefono_celular')->textInput(['maxlength' => true])?>
<?= $form->field($usuario, 'video')->fileInput()?>

<?php ActiveForm::end(); ?>

<div class="btn btn-primary ladda-button" id="guardar-registro" data-style="zoom-in">
<span class="ladda-label">Guardar</span>
</div>
<div id="container-video-viewer">

</div>
