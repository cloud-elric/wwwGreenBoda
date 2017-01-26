<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $usuario app\models\EntUsuarios */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Registra tu video';

$this->registerJsFile ( '@web/webAssets/plugins/sweetAlert/js/sweetalert.min.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerCssFile ( '@web/webAssets/plugins/sweetAlert/css/sweetalert.css', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerJsFile ( '@web/webAssets/plugins/ladda-bootstrap/dist/ladda.min.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerJsFile ( '@web/webAssets/plugins/ladda/js/spin.min.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerJsFile ( '@web/webAssets/plugins/animsition/js/animsition.min.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerCssFile ( '@web/webAssets/plugins/animsition/css/animsition.min.css', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerJsFile ( '@web/webAssets/js/site-custom-min.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerJsFile ( '@web/webAssets/js/videoPreview.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );



$this->registerCssFile ( '@web/webAssets/plugins/ladda-bootstrap/dist/ladda-themeless.min.css', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

?>
<section class="page-home js-page-home">
			<div class="page-container">
				<div class="leftSide">
					<img src="webAssets/images/logo-experiencia-all-access.png" alt="All Access con Gruopo Pesado">
					<div class="leftSide-home-txt" id="js-toggle-home-txt">
						<h2>
							Disfruta en el mejor hotel de Monterrey <br> <span>La experiencia previa al Palomazo</span> <br> y vive el concierto en palco
						</h2>
						<h3>
							La victoria es compartir los mejores momentos
						</h3>
						<img class="img-stars" src="webAssets/images/barra-stars.png" alt="">
						<div class="cta js-participa-cta">
							<a href="">Participa</a>
							<i class="ion-chevron-right"></i>
							<i class="ion-chevron-right"></i>
						</div>
					</div>
				</div>
				<!-- End LeftSide -->
				<div class="rightSide">
					<img id="js-imagen-pesado" class="grupo-pesado-img" src="webAssets/images/grupo-pesado.png" alt="Grupo Pesado">
				</div>
				<!-- End RightSide -->
			</div>
			
		</section>

		<section class="page-registro js-page-registro">
			<div class="page-container">
				<div class="leftSide">
					<img src="webAssets/images/logo-experiencia-all-access.png" alt="All Access con Gruopo Pesado">
					<div class="mecanica-del-sitio" id="js-mecanicas-box">
						<h2>¿Como Ganar?</h2>
						<ol>
							<li>Sube tu video de 30 segundos contandonos porqué PESADO es parte de tu vida</li>
							<li>Los videos más prendidos los escojera @betozapata</li>
							<li>Podrás ganar una #ExperienciaAllAccess al concierto de PESADO en la Arena Monterrey</li>
						</ol>
					</div>
					
				</div>
				<div class="rightSide">
					<img id="js-imagen-pesado" class="grupo-pesado-img" src="webAssets/images/grupo-pesado.png" alt="Grupo Pesado">
					<div class="participa-forma-wrapper" id="js-forma-de-registro">
						<div class="step step1">
							<div class="step-header">
								<div class="bullet">1</div>
								<span>Sube tu video más prendido</span>
							</div>
							<div class="btn">Subir video</div>
						</div>
						<div class="step step2">
							<div class="step-header">
								<div class="bullet">2</div>
								<span>LLena correctamente los datos</span>
							</div>
							<?php $form = ActiveForm::begin(['id'=>'form-registro', 'options' => [ 
											'enctype' => 'multipart/form-data' 
										],]); 
							?>
							
							<?= $form->field($usuario, 'txt_nombre_completo',['template'=>'<i class="icono"></i>{input}{error}', 'options'=>['class'=>'input-group']])->textInput(['maxlength' => true, 'class'=>'regular', 'placeholder'=>'Nombre completo'])?>
							<?= $form->field($usuario, 'txt_telefono_casa',['template'=>'<i class="icono"></i>{input}{error}', 'options'=>['class'=>'input-group']])->textInput(['maxlength' => true, 'class'=>'regular input-small', 'placeholder'=>'Télefono casa'])?>
							<?= $form->field($usuario, 'txt_ocupacion',['template'=>'<i class="icono"></i>{input}{error}', 'options'=>['class'=>'input-group']])->textInput(['maxlength' => true, 'class'=>'regular input-small', 'placeholder'=>'Ocupación'])?>
							<?= $form->field($usuario, 'txt_telefono_celular',['template'=>'<i class="icono"></i>{input}'.Html::activeTextInput($usuario, 'repeatCelular', ['class'=>'regular input-small input-confirma', 'placeholder'=>'Confirma celular']).'{error}', 'options'=>['class'=>'input-group']])->textInput(['maxlength' => true, 'class'=>'regular input-small', 'placeholder'=>'Celular'])?>
							<?= $form->field($usuario, 'txt_email',['template'=>'<i class="icono"></i>{input}'.Html::activeTextInput($usuario, 'repeatEmail', ['class'=>'regular input-small input-confirma', 'placeholder'=>'Confirma correo']).'{error}', 'options'=>['class'=>'input-group']])->textInput(['maxlength' => true, 'class'=>'regular input-small', 'placeholder'=>'Correo electrónico'])?>
								
								<div class="acepto-terminos">
									<div class="rkmd-checkbox checkbox-ripple">
										<label class="input-checkbox">
											<input type="checkbox" id="checkbox-1" checked>
											<span class="checkbox"></span>
										</label>
									</div>
									He leído y acepto los <span class="terminos-trigger">términos y condiciones</span> y el <span class="aviso-trigger">aviso de privacidad</span>
								</div>
								
								<div class="btn">Registrar</div>

							<?php ActiveForm::end(); ?>

						</div>
					</div>
				</div>
			</div>
			
		</section>





<!-- <div class="btn btn-primary ladda-button" id="guardar-registro" data-style="zoom-in"> -->
<!-- 	<span class="ladda-label">Guardar</span> -->
<!-- </div> -->
<!-- <div id="container-video-viewer"> -->

<!-- </div> -->
