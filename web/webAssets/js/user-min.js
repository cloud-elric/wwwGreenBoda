function validarSoloNumeros(e){$.inArray(e.keyCode,[46,8,9,27,13,110])!==-1||65===e.keyCode&&(e.ctrlKey===!0||e.metaKey===!0)||e.keyCode>=35&&e.keyCode<=40||(e.shiftKey||e.keyCode<48||e.keyCode>57)&&(e.keyCode<96||e.keyCode>105)&&e.preventDefault()}function clearFileInput(e){if(""!=e.val())if(/MSIE/.test(navigator.userAgent)){var a=e.closest("form");if(a.length){e.wrap("<form>");var o=e.closest("form"),s=$(document.createElement("div"));o.before(s).after(a).trigger("reset"),e.unwrap().appendTo(s).unwrap()}else e.wrap("<form>").closest("form").trigger("reset").unwrap()}else e.val("")}var extensionFile=null,file=null,archivosAdmitidos=["image/png","image/jpg","image/jpeg","image/gif"];$(document).ready(function(){$(".js-participa-aqui").on("click",function(e){e.preventDefault();var a=$(".active");return!a.hasClass("page-registro")&&(a.removeClass("active"),a.css("display","none"),$(".page-registro").css("display","block"),void $(".page-registro").addClass("active"))}),$(".js-inicio").on("click",function(e){e.preventDefault();var a=$(".active");return!a.hasClass("page-home")&&(a.removeClass("active"),a.css("display","none"),$(".page-home").css("display","block"),$(".page-home").css("opacity","1"),void $(".page-home").addClass("active"))}),$(".terminos-trigger").on("click",function(e){e.preventDefault();var a=$(".active");return!a.hasClass("modal")&&(a.removeClass("active"),a.css("display","none"),$(".modal").css("display","block"),void $(".modal").addClass("active"))}),$(".js-terminos-y-condiciones").on("click",function(e){e.preventDefault();var a=$(".active");return!a.hasClass("modal")&&(a.removeClass("active"),a.css("display","none"),$(".modal").css("display","block"),void $(".modal").addClass("active"))}),$(".aviso-trigger").on("click",function(e){e.preventDefault();var a=$(".active");return!a.hasClass("modal")&&(a.removeClass("active"),a.css("display","none"),$(".modal").css("display","block"),void $(".modal").addClass("active"))}),$(".js-premios").on("click",function(e){e.preventDefault();var a=$(".active");return!a.hasClass("page-premios")&&(a.removeClass("active"),a.css("display","none"),$(".page-premios").css("display","block"),void $(".page-premios").addClass("active"))}),$("#entusuarios-txt_telefono_celular").keydown(function(e){validarSoloNumeros(e)}),$("#entusuarios-repeatcelular").keydown(function(e){validarSoloNumeros(e)}),$("#entusuarios-txt_telefono_casa").keydown(function(e){validarSoloNumeros(e)}),$("#entusuarios-txt_cp").keydown(function(e){validarSoloNumeros(e)}),$("#js-boton-subir-video").on("click",function(e){e.preventDefault(),$("#entusuarios-video").trigger("click")}),$("#entusuarios-video").on("change",function(){var e=Ladda.create(document.getElementById("js-boton-subir-video"));e.start(),file=this.files[0];var a=$(this).val();if("fakepath"==a.substring(3,11)&&(a=a.substring(12),$("#js-archivo-agregado").html(a)),extensionFile=file.type,extensionFile!=archivosAdmitidos[0]&&extensionFile!=archivosAdmitidos[1]&&extensionFile!=archivosAdmitidos[2]&&extensionFile!=archivosAdmitidos[3])return swal("Espera","debes subir un archivo con extension Jpg, Gif o Png","warning"),$("#container-video-viewer").html(""),clearFileInput($(this)),e.stop(),$("#js-archivo-agregado").html(""),!1;var o=new FileReader;o.onloadstart=viewer.start,o.onloadend=viewer.end,o.readAsDataURL(file),viewer.setProperties(file)}),$("#guardar-registro").on("click",function(e){return e.preventDefault(),$("#entusuarios-video").val()||swal("Espera","Necesitas agregar tu foto","warning"),$("#entusuarios-leido").prop("checked")?void $("form").submit():(swal("Espera","Debes de aceptar los términos ycondiciones así como el aviso de privacidad","warning"),!1)})});var viewer={start:function(e){$("#container-video-viewer").html("Cargando video.....")},end:function(e){var a=Ladda.create(document.getElementById("js-boton-subir-video"));a.stop(),$("#container-video-viewer").html("Foto Cargada.....");var o=URL.createObjectURL(file);$("#container-video-viewer").html('<video id="video-viewer" controls><source id="video-source" src='+o+' type="'+extensionFile+'"></video>')},setProperties:function(e){}};$("body").on("beforeSubmit","form",function(){var e=$(this),a=Ladda.create(document.getElementById("guardar-registro"));return a.start(),$("#js-mesaje-de-espera").html("Tu video se esta cargando espera unos minutos."),e.find(".has-error").length?($("#js-mesaje-de-espera").html(""),a.stop(),!1):($.ajax({url:"site/guardar-informacion",type:"post",data:new FormData(this),dataType:"json",cache:!1,contentType:!1,processData:!1,success:function(e){swal("Registro exitoso","Nos comunicaremos contigo en caso de ser el ganador","success"),document.getElementById("form-registro").reset(),$("#container-video-viewer").html(""),$("#js-archivo-agregado").html(""),a.stop(),$("#js-mesaje-de-espera").html("")},error:function(){},statusCode:{404:function(){alert("page not found")}}}),!1)});