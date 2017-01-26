// Variables generales
/**
 * Variable que almacenara la extension del video
 */
var extensionFile = null;
/**
 * Variable que almacenara el archivo
 */
var file = null;

/**
 * Variable con los archivos aceptados
 */
var archivosAdmitidos = [ "video/mp4", 'video/ogg', 'video/webm' ];

$(document)
		.ready(
				function() {
					// Al campo de texto número validara solo numeros	
					$('#entusuarios-txt_telefono_celular').keydown(function(e) {
						validarSoloNumeros(e);
					});
					// Al campo de texto número validara solo numeros	
					$('#entusuarios-repeatcelular').keydown(function(e) {
						validarSoloNumeros(e);
					});
					
					// Al campo de texto número validara solo numeros	
					$('#entusuarios-txt_telefono_casa').keydown(function(e) {
						validarSoloNumeros(e);
					});

					// Listener cuando cambia de archivo el input
					$('#entusuarios-video')
							.on(
									'change',
									function() {
										// Se asigna archivo a variable	
										file = this.files[0];
										
										// Se asigna la extension del archivo
										extensionFile = file.type;

										// Validacion del archivo
										if (!((extensionFile == archivosAdmitidos[0])
												|| (extensionFile == archivosAdmitidos[1]) || (extensionFile == archivosAdmitidos[2]))) {
											swal(
													"Espera",
													"Archivo no admitido por el sistema",
													"warning");

											$('#container-video-viewer').html(
													'');
											clearFileInput($(this))
											return false;
										}

										var reader = new FileReader();
										reader.onloadstart = viewer.start;
										reader.onloadend = viewer.end;
										reader.readAsDataURL(file);
										viewer.setProperties(file);

									});

					$('#guardar-registro').on('click', function(e) {
						e.preventDefault();
						 
						$('form').submit();
					});

				});

var viewer = {
	start : function(e) {
		$("#container-video-viewer").html('Cargando video.....');
	},
	end : function(e) {
		$("#container-video-viewer").html('Video Cargado.....');
		var url = URL.createObjectURL(file);
		$('#container-video-viewer').html(
				'<video id="video-viewer" controls><source id="video-source" src='
						+ url + ' type="' + extensionFile + '"></video>');

	},

	setProperties : function(file) {

	}
}

$('body').on(
				'beforeSubmit',
				'form',
				function() {
					var form = $(this);

					 var l = Ladda.create(document.getElementById('guardar-registro'));
					 l.start();
					if (form.find('.has-error').length) {
						l.stop();
						
						return false;
					}
					// var button = document
					// .getElementById('modal-agregar-post-guardar');
					// var l = Ladda.create(button);
					// l.start();

					$
							.ajax({
								url : 'site/guardar-informacion',
								type : 'post',
								data : new FormData(this),
								dataType : 'json',
								cache : false,
								contentType : false,
								processData : false,
								success : function(response) {
									// l.stop();
									swal(
											"Registro exitoso",
											"Nos comunicaremos contigo en caso de ser el ganador",
											"success");
									// Reseteamos el modal
									document.getElementById("form-registro")
											.reset();
									$("#container-video-viewer").html('');
									l.stop();
								},
								error : function() {

								},
								statusCode : {
									404 : function() {
										alert("page not found");
									}
								}

							});
					return false;
				});
// Utils
// ********************************************************************************************************
/**
 * Valida que cuando se aprieta un boton sea solo números
 * 
 * @param e
 */
function validarSoloNumeros(e) {
	// Allow: backspace, delete, tab, escape, enter and .
	if ($.inArray(e.keyCode, [ 46, 8, 9, 27, 13, 110 ]) !== -1 ||
	// Allow: Ctrl+A, Command+A
	(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
	// Allow: home, end, left, right, down, up
	(e.keyCode >= 35 && e.keyCode <= 40)) {
		// let it happen, don't do anything
		return;
	}
	// Ensure that it is a number and stop the keypress
	if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57))
			&& (e.keyCode < 96 || e.keyCode > 105)) {
		e.preventDefault();
	}
}

/**
 * Limpia un campo de File input
 * 
 * @param $input
 */
function clearFileInput($input) {
	if ($input.val() == '') {
		return;
	}
	// Fix for IE ver < 11, that does not clear file inputs
	// Requires a sequence of steps to prevent IE crashing but
	// still allow clearing of the file input.
	if (/MSIE/.test(navigator.userAgent)) {
		var $frm1 = $input.closest('form');
		if ($frm1.length) { // check if the input is already wrapped in a form
			$input.wrap('<form>');
			var $frm2 = $input.closest('form'), // the wrapper form
			$tmpEl = $(document.createElement('div')); // a temporary
			// placeholder element
			$frm2.before($tmpEl).after($frm1).trigger('reset');
			$input.unwrap().appendTo($tmpEl).unwrap();
		} else { // no parent form exists - just wrap a form element
			$input.wrap('<form>').closest('form').trigger('reset').unwrap();
		}
	} else { // normal reset behavior for other sane browsers
		$input.val('');
	}
}