<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\EntEventos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-eventos-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">

		<div class="col-md-12">

		
		    <?= $form->field($model, 'txt_titulo')->textInput(['maxlength' => true])?>
		    
		</div>

		<div class="col-md-6">

		    <?= $form->field($model, 'fch_inicio')->textInput(['class'=>'form_datetime form-control'])?>
		
		</div>

		<div class="col-md-6">
		
		<?= $form->field($model, 'fch_fin')->textInput(['class'=>'form_datetime form-control'])?>
		</div>

		<div class="col-md-6">

		    <?= $form->field($model, 'txt_descripcion')->textarea(['maxlength' => true])?>
		
		</div>

		<div class="col-md-6">
		 <?= $form->field($model, 'txt_direccion')->textarea(['maxlength' => true])?>
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

<?php
$this->registerJs ( "
	$.fn.datetimepicker.dates['es'] = {
		days: ['Domingo', 'Lunes', 'Martes', 'Mi�rcoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
		daysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
		daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa', 'Do'],
		months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
		today: 'Hoy',
		suffix: [],
		meridiem: []
	};
		
	$('.form_datetime').datetimepicker({format: 'd-mm-yyyy', minView: 2, language: 'es'});
", View::POS_END );
?>

