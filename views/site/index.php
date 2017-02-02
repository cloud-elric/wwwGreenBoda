<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $usuario app\models\EntUsuarios */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'PESADO Experiencia All Access';

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

$this->registerJsFile ( '@web/webAssets/plugins/ladda/js/spin.min.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerJsFile ( '@web/webAssets/plugins/ladda-bootstrap/dist/ladda.min.js', [
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

$this->registerJsFile ( '@web/webAssets/js/user.js', [
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
<section class="page-home js-page-home active">
	<div class="page-container">
		<div class="leftSide">
			<img src="webAssets/images/logo-experiencia-all-access.png"
				alt="All Access con Gruopo Pesado">
			<div class="leftSide-home-txt" id="js-toggle-home-txt">
				<h2>
					Participa en el concurso para ganar una de las 5 experiencias con PESADO en la Arena Monterrey <br> <span> Previa al palomazo y vive el concierto en súper palco.</span>
				</h2>
				<h3>La victoria es compartir los mejores momentos</h3>

				<img class="img-stars" src="webAssets/images/barra-stars.png" alt="">
				<div class="cta js-participa-cta">
					<a href="" class="js-participa-aqui">Participa</a> <i
						class="ion-chevron-right"></i> <i class="ion-chevron-right"></i>
				</div>
			</div>
		</div>
		<!-- End LeftSide -->
		<div class="rightSide">
			<img id="js-imagen-pesado" class="grupo-pesado-img"
				src="webAssets/images/grupo-pesado.png" alt="Grupo Pesado">
		</div>
		<!-- End RightSide -->
	</div>

</section>

<section class="page-registro js-page-registro">
	<div class="page-container">
		<div class="leftSide">
			<img src="webAssets/images/logo-experiencia-all-access.png"
				alt="All Access con Gruopo Pesado">
			<div class="mecanica-del-sitio" id="js-mecanicas-box">
				<h2>¿Cómo Ganar?</h2>
				<ol>
					<li>Sube una fotografía donde muestres ¿Por qué PESADO es parte importante de tu vida?, describe tu foto (600 caracteres).</li>
					<li>Las fotografías más originales serán seleccionadas por PESADO.</li>
					<li>Podrás ganar una #ExperienciaAllAccess al concierto de PESADO en la Arena Monterrey</li>
				</ol>
			</div>

		</div>
		<div class="rightSide">
			<img id="js-imagen-pesado" class="grupo-pesado-img"
				src="webAssets/images/grupo-pesado.png" alt="Grupo Pesado">
			<div class="participa-forma-wrapper" id="js-forma-de-registro">
				<div class="step step1">
					<div class="step-header">
						<div class="bullet">1</div>
						<span>Sube tu foto (.JPG, .GIF, .PNG)</span>
					</div>
					<div class="btn ladda-button" data-style="zoom-in" id="js-boton-subir-video">
						<label for="entusuarios-video"  class="ladda-label">Seleccionar imágen</label>
					</div>

					<!--<div id="container-video-viewer"></div> -->
					<div id="js-archivo-agregado" class="nombre-video"></div>
<!-- 					<input type="text-field" name="" value="" placeholder="describe tu foto"> -->
				</div>


				<div class="step step2">
					<div class="step-header">
						<div class="bullet">2</div>
						<span>Llena correctamente los datos</span>
						</div>
						<?php

							$form = ActiveForm::begin ( [
									'id' => 'form-registro',
									'options' => [
											'enctype' => 'multipart/form-data'
									]
							] );
							?>
							<?= $form->field($usuario, 'txt_descripcion',['template'=>'<i class="icono ion-document-text"></i>{input}{error}', 'options'=>['class'=>'input-group']])->textarea(['maxlength' => true, 'class'=>'regular', 'placeholder'=>'Describe tu foto'])?>
							<?= $form->field($usuario, 'video',['template'=>'{input}'])->fileInput(['style'=>'display:none;'])?>
							<?= $form->field($usuario, 'txt_nombre_completo',['template'=>'<i class="icono ion-ios-person"></i>{input}{error}', 'options'=>['class'=>'input-group']])->textInput(['maxlength' => true, 'class'=>'regular', 'placeholder'=>'Nombre completo'])?>
							<?= $form->field($usuario, 'txt_telefono_casa',['template'=>'<i class="icono ion-ios-telephone"></i>{input}{error}'.$form->field ( $usuario, 'txt_cp', [ 'template' => '<i class="icono ion-earth"></i>{input}{error}','options' => [ 'class' => 'input-group','tag' => false ] ] )->textInput ( [ 'maxlength' => true,'class' => 'regular input-small','placeholder' => 'Codigo postal' ] ), 'options'=>['class'=>'input-group']])->textInput(['maxlength' => true, 'class'=>'regular input-small', 'placeholder'=>'Télefono casa'])?>
							<?= $form->field($usuario, 'txt_ocupacion',['template'=>'<i class="icono ion-briefcase"></i>{input}{error}', 'options'=>['class'=>'input-group']])->textInput(['maxlength' => true, 'class'=>'regular input-small', 'placeholder'=>'Ocupación'])?>
							<?= $form->field($usuario, 'txt_telefono_celular',['template'=>'<i class="icono ion-iphone"></i>{input}'.Html::activeTextInput($usuario, 'repeatCelular', ['class'=>'regular input-small input-confirma', 'placeholder'=>'Confirma celular']).'{error}', 'options'=>['class'=>'input-group']])->textInput(['maxlength' => true, 'class'=>'regular input-small', 'placeholder'=>'Celular'])?>
							<?= $form->field($usuario, 'txt_email',['template'=>'<i class="icono ion-ios-email"></i>{input}'.Html::activeTextInput($usuario, 'repeatEmail', ['class'=>'regular input-small input-confirma', 'placeholder'=>'Confirma correo']).'{error}', 'options'=>['class'=>'input-group']])->textInput(['maxlength' => true, 'class'=>'regular input-small', 'placeholder'=>'Correo electrónico'])?>

							<div class="acepto-terminos">
								<input type="checkbox" id="entusuarios-leido" class="checkbox" name="EntUsuarios[entusuarios-leido]" value="1"> He leído y acepto los <span class="terminos-trigger">términos y condiciones</span> y el <span class="aviso-trigger">aviso de privacidad</span>
							</div>


					<div class="btn ladda-button" data-style="zoom-in"
						id="guardar-registro">
						<span class="ladda-label">Registrar</span>
					</div>

					<div class="input-group" id="js-mesaje-de-espera">

					</div>

							<?php ActiveForm::end(); ?>

						</div>
			</div>
		</div>
	</div>

</section>

<section class="page-premios">
	<div class="container">
		<div class="box">
			<h2>
				<span>Pesado</span> te hará vivir la
			</h2>
		</div>
		<img src="webAssets/images/logo-experiencia-all-access.png"
			alt="All Access con Gruopo Pesado">
		<div class="text">
			<h3>
				Regalándote una experiencia en el concierto de <span class="logo-pesado">Pesado</span> este 17 de Febrero en la Arena Monterrey que incluye:
			</h3>
			<ul>
				<li>1 pase doble en Súper Palco</li>
				<li>Soundcheck</li>
				<li>Meet&Greet</li>
				<li>All Access</li>
			</ul>
			<p>¡Regístrate y Gana solo tenemos 5 pases dobles!</p>
			<h4>El 15 de febrero se darán a conocer los ganadores.</h4>
		</div>

		<div class="gallery">
			<img src="webAssets/images/min1.png" alt="Pesado-AllAccess">
			<img src="webAssets/images/min2.png" alt="Pesado-AllAccess">
			<img src="webAssets/images/min3.png" alt="Pesado-AllAccess">
			<img src="webAssets/images/min4.png" alt="Pesado-AllAccess">
		</div>
	</div>
</section>

<section class="modal">
	<div class="container">
		<div class="terminos-box">

			<h4 > BASES Y CONDICIONES EXPERIENCIA ALL ACCESS </h4>

			<p>Aviso de promoción PFC.C.A.-000375/17</p>


			<h6>Cómo Ganar</h6>
			<ul>
				<li>Debes ser mayor de edad.</li>
				<li>Solo participan personas con nacionalidad mexicana (o con FM2 vigente), residan en Monterrey Nuevo León.</li>
				<li>Del 2 de febrero al 14 de febrero de 2017 a las 18:00 Hrs, podrás registrarse y subir una foto donde exprese PORQUE GRUPO PESADO ES IMPORTANTE EN TU VIDA en el micro sitió <a href="http://www.pesadoallaccess.mx">pesadoallaccess.mx</a>.</li>
				<li>Se cerrará participación el día 14 de febrero de 2017 a las 18:00 Hrs.</li>
				<li>El día 15 de febrero GRUPO PESADO seleccionará a 5 ganadores de la EXPERIENCIA ALL ACCESS.</li>
				<li>La publicación de ganadores se realizará en las redes sociales de GRUPO PESADO <a href="https://www.facebook.com/GrupoPesado">https://www.facebook.com/GrupoPesado</a> el 15 de febrero de 2017 a las 18:00Hrs.</li>
			</ul>


			<h6>Qué Puedo ganar</h6>
				<p>Una de las 5 EXPERIENCIA ALL ACCESS con GRUPO PESADO el 17 de febrero de 2017.</p>
				<p>*Indispensable presentar identificación oficial vigente para hacer entrega del incentivo.</p>

			<h6>Qúe incluye la Experiencia All Access</h6>
			<ul>
				<li>Entrada doble para 2 adultos a Concierto, Súper Palco, Soundcheck,  Meet&Greet con GRUPO PESADO en Arena Monterrey  el 17 de febrero de 2017.</li>
			</ul>


			<h6>Condiciones para la entrega de la Experiencia All Access</h6>
			<p>La entrega se realizar el día 17 de febrero a las 14:00Hrs en Arena Monterrey en el acceso G4, con un representante del operado y Grupo PESADO. Para cualquier duda pueden contactarnos al 01 800 4671897.</p>


			<h6>RESTRICCIONES</h6>
			<ul>
				<li>El formato de la fotografía debe ser en formato JPG, PNG o GIF.</li>
				<li>Se descartaran fotografías que en su contenido muestren desnudos, actos violentos, uso o consumo de sustancias nocivas para la salud (drogas, alcohol) o armas.</li>
				<li>No participan personas involucradas en la realización de la promoción.</li>
				<li>No participan menores de edad.</li>
				<li>Limitado a una participación por persona.</li>
				<li>El premio no podrá ser canjeado por dinero en efectivo.</li>
				<li>El premio tiene una vigencia para disfrutarse el 17 de febrero de 2017, no sujeta a cambio, si el ganador no puede hacer uso de esta cortesía en las fechas indicadas, pierde el derecho a reclamar el incentivo.</li>
			</ul>


			<h6>Responsable de la promoción</h6>
			<p>El organizador responsable y encargado de la promoción es PUBLICIDAD Y SOLUCIONES GREEN S.A DE C.V PSG061123PQ9 con domicilio en Santa Brígida 19, Jardines de Santa Mónica, C.P. 54050, Tlalnepantla de Baz Estado de México.</p>

			<p>GRUPO PESADO se deslinda de la ejecución de la promoción.</p>


			<h6>Autorización</h6>
			<p>El participante que resulte ganador de LA PROMOCIóN, autoriza expresa e irrevocablemente a PUBLICIDAD Y SOLUCIONES GREEN S.A. DE C.V. y GRUPO PESADO o cualquier otra empresa que ésta determine, a difundir en los medios que estime conveniente, su nombre y apellido completo, país y ciudad de origen, fotografías y uso de imagen o retrato, videos y en general todos aquellos datos que pudieran requerirse con motivo de la difusión de esta promoción, renunciando expresa e irrevocablemente, desde la aceptación de las bases, a cualquier tipo de compensación económica, remuneración, regalía o retribución alguna por dicho uso.</p>
			<p>El participante ganador cuyos datos, imagen, retrato, video y/o alguno de los señalados  anteriormente, entiende y acepta que el uso de dicha imagen no se lleva acabo con fines de lucro directo ni indirecto, sino para dar claridad y transparencia sobre los resultados de la presente promoción.</p>

			<h6>PRIVACIDAD Y PROTECCIÓN DE DATOS PERSONALES.</h6>
			<p>PUBLICIDAD Y SOLUCIONES GREEN S.A. DE C.V<strong>.</strong> con domicilio en Santa Brígida 19, Jardines de Santa Mónica, C.P. 54055, Tlalnepantla de Baz Estado de México, es el responsable del tratamiento de sus datos personales, y se han adoptado los niveles de seguridad de protección de datos personales legalmente requeridos y procuran instalar aquellos otros medios y medidas técnicas adicionales a su alcance para evitar la pérdida, mal uso, alteración, acceso no autorizado y robo de los mismos. Usted podrá consultar el Aviso de Privacidad completo publicado en la página de internet, <a href="http://www.participagana.com.mx">www.participagana.com.mx</a></p>
			<p> </p>
			<p> </p>
			<p><em>Las presentes bases de participación están sujetas a cambio sin previo aviso. Para cualquier duda acerca de la promoción comunícate al 01 800 467 1897  o escríbenos al correo electrónico </em><a href="mailto:promociones@participagana.com.mx">promociones@participagana.com.mx</a></p>
		</div>




		<div class="aviso-box">
			<h4>Aviso de Privacidad</h4>

			<h5>Aviso de Privacidad Green</h5>

			<p>Con fundamento en los artículos 15 y 16 de la LEY FEDERAL DE
				PROTECCIÓN DE DATOS PERSONALES EN POSESIÓN DE PARTICULARES, hacemos
				de su conocimiento que, PUBLICIDAD Y SOLUCIONES GREEN S.A. DE C.V.,
				con domicilio en calle Convento de Santa Brigida #19, Colonia
				Jardines de Santa Mónica, Tlalnepantla, Estado de México, c.p.
				54050, es responsable de recabar sus datos personales, del uso que
				se les dé a los mismos y de su protección.</p>

			<p>Su información personal será utilizada para las siguientes
				finalidades: proveer los servicios y productos que ha solicitado;
				notificarle sobre nuevos productos que tengan relación con los ya
				contratados o adquiridos; comunicarle en los cambios de los mismos;
				elaborar estudios y programas que son necesarios para determinar
				hábitos de consumo; realizar evaluaciones periódicas de nuestros
				productos y servicios para efecto de mejorar la calidad de los
				mismos; evaluar la calidad del servicio que brindamos, y en general 
				para dar cumplimiento a las obligaciones que hemos contraído para
				con Usted.</p>
			<p>Para las finalidades antes mencionadas, en forma enunciativa más
				no limitativa podríamos obtener alguno de los siguientes datos
				personales: nombre completo, teléfono fijo y/o teléfono celular,
				correo electrónico, dirección de facebook, twiter, y/o cualquier
				otra red social, así como domicilio particular y de trabajo.</p>

			<h6>LIMITACIÓN DE USO Y DIVULGACIÓN</h6>

			<p>El tratamiento de sus datos personales será el que resulte
				necesario, adecuado y relevante en relación con las finalidades
				previstas en esta Política de Privacidad. PUBLICIDAD Y SOLUCIONES
				GREEN S.A. DE C.V., cumple los principios de protección de datos
				personales establecidos en la Ley Federal de Protección de Datos
				Personales en Posesión de los Particulares y adopta las medidas
				necesarias para su aplicación. Lo anterior aplica aún y cuando estos
				datos fueren tratados por un tercero, a solicitud de PUBLICIDAD Y
				SOLUCIONES GREEN S.A. DE C.V., y con el fin de cubrir los servicios
				necesarios, manteniendo la confidencialidad en todo momento.
				PUBLICIDAD Y SOLUCIONES GREEN S.A. DE C.V., toma las medidas
				necesarias y suficientes para procurar que esta Política de
				Privacidad sea respetada, por él o por terceros con los que guarde
				alguna relación, para otorgar los servicios o productos establecidos
				con el titular.</p>
			<p>La obligación de acceso a la información se dará por cumplida
				cuando se ponga a disposición del titular los datos personales, o
				bien, mediante la expedición de copias simples, documentos
				electrónicos o cualquier otro medio que PUBLICIDAD Y SOLUCIONES
				GREEN S.A. DE C.V., provea al titular.</p>
			<p>En el caso de que el titular solicite acceso a los datos a una
				persona que presume es el responsable, y ésta resulta no serlo,
				bastará con que así se le indique al titular por cualquiera de los
				medios impresos (carta de procedencia) o electrónicos (correo
				electrónico, medios audiovisuales, etc.), para tener por cumplida la
				solicitud.</p>

			<p>PUBLICIDAD Y SOLUCIONES GREEN S.A. DE C.V., limitará el uso de los
				datos personales sensibles a petición expresa del titular, y no
				estará obligada a cancelar los datos personales cuando:</p>
			<p>Se refiera a las partes de un contrato privado, social,
				administrativo, y sean necesarios para su desarrollo y cumplimiento.</p>
			<p>Deban ser tratados por disposición legal</p>
			.
			<p>Obstaculice actuaciones judiciales o administrativas vinculadas a
				obligaciones fiscales, la investigación y persecución de delitos, o
				la actualización de sanciones administrativas.</p>
			<p>Sean necesarios para proteger los intereses jurídicamente
				tutelados del titular. Sean necesarios para realizar una acción en
				función del interés público. Sean necesarios para cumplir con una
				obligación legalmente adquirida por el titular, o Sean objeto de
				tratamiento para la prevención o el diagnóstico médico o la gestión
				de servicios de salud, siempre que dicho tratamiento se realice por
				un profesional de la salud sujeto a un deber secreto. Usted tiene
				derecho de acceder, rectificar y cancelar sus datos personales, así
				como de oponerse al tratamiento de los mismos o revocar su
				consentimiento, para lo cual se puede poner en contacto directamente
				a Publicidad y Soluciones Green S.A. de C.V., la cual puede
				localizar en la dirección ya señalada en el primer párrafo de este
				aviso, o al teléfono 24-87-01-01, y en el correo
				electrónico info@publicidadgreen.com.mx, o bien a través de un
				escrito libre acompañado de una copia de su identificación oficial,
				y especificando los datos personales que quiera proteger,
				entregándolo en la misma dirección ya citada, PUBLICIDAD Y
				SOLUCIONES GREEN S.A. DE C.V., contará con 20 días hábiles para
				atender su solicitud.</p>

			<p>Si usted no manifiesta su oposición para que sus datos personales
				sean transferidos, se entenderá que ha otorgado su consentimiento
				para ello.</p>
			<p>Es importante informarle que Usted tiene derecho al acceso,
				ratificación, y cancelación de sus datos personales, a oponerse al
				tratamiento de los mismos o a revocar el consentimiento que para
				dicho fin nos haya otorgado.</p>

			<p>Al aceptar las condiciones y términos establecidos por medio del
				presente aviso de privacidad se considera otorgado el consentimiento
				expreso para que PUBLICIDAD GREEN, haga uso de manejo tratamiento y
				transferencia de sus datos personales para los fines descritos.</p>

			<span class="contacto-txt">Contacto PUBLICIDAD GREEN: info@publicidadgreen.com.mx</span>

		</div>
	</div>


</section>




<!-- <div class="btn btn-primary ladda-button"  data-style="zoom-in"> -->
<!-- 	<span class="ladda-label">Guardar</span> -->
<!-- </div> -->
<!-- <div id="container-video-viewer"> -->

<!-- </div> -->
