<?php 
use app\models\Utils;

$this->title = 'Usuarios registrados';
?>

<!-- .aqua-registros-body -->
<div class="aqua-registros-body" id="js-contenedor-registros">
                            
							<?php
							foreach ( $registrados as $registrado ) {
								?>
                            <!-- .aqua-registros-item -->
	<div class="aqua-registros-item">
		<p><?=$registrado->txt_nombre.' '.$registrado->txt_apellido_paterno?></p>
		<p><?=$registrado->txt_email?></p>
		<p><?=$registrado->tel_numero_celular?></p>
		<p><?=Utils::changeFormatDate($registrado->fch_creacion)?></p>
	</div>
	<!-- end - .aqua-registros-item -->
                            <?php
							}
							?>
                        </div>
<!-- end - .aqua-registros-body -->

<!-- .aqua-exportar -->
            <!-- <button class="btn aqua-exportar js-btn-exportar ladda-button aqua-exportar-view" data-style="zoom-out"><span class="ladda-label">Exportar</span></button> -->