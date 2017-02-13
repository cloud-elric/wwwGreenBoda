<?php
use yii\widgets\ListView;
use yii\web\View;
use yii\helpers\Url;
$this->registerCssFile ( '@web/webAssets/plugins/ladda-bootstrap/dist/ladda-themeless.min.css', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerJsFile ( '@web/webAssets/plugins/ladda-bootstrap/dist/spin.min.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerJsFile ( '@web/webAssets/plugins/ladda-bootstrap/dist/ladda.min.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );
?>
<header>
	<div class="container">
		<div class="logo">
			<img src="<?= Url::base()?>/webAssets/images/logo-pesado-negro.png" alt="" class="js-inicio">
		</div>
		<nav class="main-nav">
			<ul>
				<li>
				<button id="js-descargar" class="btn btn-link ladda-button" data-style="zoom-in"><span class="ladda-label">Descargar</span></button>
				</li>
			</ul>
		</nav>
		<nav class="mobile-nav-wrap" role="navigation">
			<ul class="mobile-header-nav">
<li>
				<button id="js-descargar" class="btn btn-link ladda-button" data-style="zoom-in"><span class="ladda-label">Descargar</span></button>
				</li>
			</ul>
		</nav>
		<a class="mobile-menu-toggle js-toggle-menu hamburger-menu" href="#">
			<span class="menu-item"></span> <span class="menu-item"></span> <span
			class="menu-item"></span>
		</a>
	</div>
</header>

<section class="photo-content">
	<div class="container">
			<?php
			echo ListView::widget( [
				'dataProvider' => $dataProvider,
				'itemView' => '_item',
			] );

			?>
	</div>
</section>







<?php
$this->registerJs ( "

$('.js-btn-video').on('click', function(event) {
    event.preventDefault();
	var data = $(this).data('url');
	var url = '".Url::base()."/uploads/'+data;
	$('.contenedor-video').html('<video id=\'video-viewer\' controls  width=\'100%\'><source id=\'video-source\' src=\''+url+'\' type=\'video/mp4\'></video>');
   	$('.modal').css('display', 'flex');
});

var modal = document.getElementById('myModal');
$(document).on({
	'click' : function(e) {
		e.preventDefault();
		if (event.target == modal) {
        	modal.style.display = 'none';
    	}
	}
}, '.modal');

		$('#js-descargar').on('click',function(e){
			e.preventDefault();
			var l = Ladda.create(this);
		 	//l.start();
		
			window.location='descargar'
		});
		
", View::POS_END );
?>
