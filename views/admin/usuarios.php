<?php
use yii\widgets\ListView;
use yii\web\View;
use yii\helpers\Url;

?>
<header>
	<div class="container">
		<div class="logo">
			<img src="<?= Url::base()?>/webAssets/images/logo-pesado-negro.png" alt="" class="js-inicio">
		</div>
		<nav class="main-nav">
			<ul>

			</ul>
		</nav>
		<nav class="mobile-nav-wrap" role="navigation">
			<ul class="mobile-header-nav">

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

", View::POS_END );
?>
