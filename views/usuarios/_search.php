<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CatEstados;
use app\models\CatNivelesPuestos;
use app\models\CatTiposAlimentacion;
use app\models\CatTipoSangre;

/* @var $this yii\web\View */
/* @var $model app\models\EntUsuariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php

$form = ActiveForm::begin ( [ 
		'action' => [ 
				'index?id=' . $id 
		],
		'method' => 'get' 
] );
?>
<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#home">Datos basicos</a></li>
	<li><a data-toggle="tab" href="#menu1">Datos de ubicacion</a></li>
	<li><a data-toggle="tab" href="#menu2">Datos generales</a></li>
	<li><a data-toggle="tab" href="#menu3">Datos laborales</a></li>
	<li><a data-toggle="tab" href="#menu4">Datos de contacto</a></li>
</ul>

<div class="tab-content">
	<div id="home" class="tab-pane fade in active">
		<div class="panel">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
					<?= $form->field($model, 'txt_nombre_usuario')?>
				</div>
					<div class="col-md-4">
					<?= $form->field($model, 'txt_apellido_paterno')?>					
				</div>
					<div class="col-md-4">
					<?= $form->field($model, 'txt_apellido_materno')?>	
				</div>
				</div>

			</div>
		</div>
	</div>
	<div id="menu1" class="tab-pane fade">
		<div class="panel">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
					<?=$form->field ( $model, 'id_estado' )->dropDownList ( ArrayHelper::map ( CatEstados::find ()->asArray ()->all (), 'id_estado', 'txt_nombre' ), [ 'prompt' => 'seleccionar estado' ] )?>
				</div>
					<div class="col-md-4">
				 <?= $form->field($model, 'txt_ciudad')?>
				 </div>
				</div>
			</div>
		</div>
	</div>
	<div id="menu2" class="tab-pane fade">

		<div class="row">
			<div class="col-md-4">
		<?=$form->field ( $model, 'id_alimentacion' )->dropDownList ( ArrayHelper::map ( CatTiposAlimentacion::find ()->asArray ()->all (), 'id_alimentacion', 'txt_nombre_alimentacion' ), [ 'prompt' => 'seleccionar alimentacion' ] )?>
		    
		</div>
			<div class="col-md-4">
			 <?=$form->field ( $model, 'id_sangre' )->dropDownList ( ArrayHelper::map ( CatTipoSangre::find ()->asArray ()->all (), 'id_sangre', 'txt_nombre_sangre' ), [ 'prompt' => 'seleccionar tipo sangre' ] )?>
		</div>
			<div class="col-md-4">
			<?= $form->field($model, 'txt_alergias')?>
		</div>
			<div class="col-md-4">
			<?= $form->field($model, 'txt_capacidades')?>		
		</div>
			<div class="col-md-4">
			<?= $form->field($model, 'txt_padecimientos')?>		
		</div>
		</div>


	</div>
	<div id="menu3" class="tab-pane fade">
		<div class="row">
			<div class="col-md-4">
			<?=$form->field ( $model, 'id_puesto' )->dropDownList ( ArrayHelper::map ( CatNivelesPuestos::find ()->asArray ()->all (), 'id_puesto', 'txt_nombre_puesto' ), [ 'prompt' => 'seleccionar puesto' ] )?>
		</div>
		</div>
	</div>
	<div id="menu4" class="tab-pane fade">
		<div class="row">
			<div class="col-md-4">
		<?= $form->field($model, 'b_telefono_fijo')?>
		    </div>

			<div class="col-md-4">
		    <?= $form->field($model, 'b_telefono_celular')?>
		</div>
			<div class="col-md-4">    
		    <?= $form->field($model, 'txt_extension')?>
		  </div>
			<div class="col-md-4">
		    <?= $form->field($model, 'txt_email')?>
		   </div>
			<div class="col-md-4"> 
		    <?= $form->field($model, 'txt_genero')?>
		   </div>
			<div class="col-md-4">
		    <?= $form->field($model, 'fch_creacion')?>
		   </div>
		</div>
	</div>

 	<?= Html::submitButton('Search', ['class' => 'btn btn-primary'])?>
	<?= Html::resetButton('Reset', ['class' => 'btn btn-default'])?>
</div>		    

<?php ActiveForm::end(); ?>
