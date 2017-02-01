<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register ( $this );
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags()?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head()?>
</head>
<body>
<?php $this->beginBody()?>
	<div id="bg">
		<img src="webAssets/images/siteBKGD.jpg" alt="">
	</div>

	<header>
		<div class="container">
			<div class="logo">
				<img src="webAssets/images/logo-pesado-negro.png" alt="" class="js-inicio">
			</div>
			<nav class="main-nav">
				<ul>
					<li><a href="" class="js-participa-aqui">Participa Aquí</a></li>
					<li><a href="" class="js-premios">Premios</a></li>
					<!-- <li><a href="">Participantes</a></li> -->
					<li><a href="" class="js-terminos-y-condiciones">Términos y condiciones</a></li>
				</ul>
			</nav>
			<nav class="mobile-nav-wrap" role="navigation">
				<ul class="mobile-header-nav">
					<li><a href="#" class="js-participa-aqui">Participa Aquí</a></li>
					<li><a href="#" class="js-premios">Premios</a></li>
					<!-- <li><a href="#">Participantes</a></li> -->
					<li><a href="#" class="js-terminos-y-condiciones">Términos y condiciones</a></li>
				</ul>
			</nav>
			<a class="mobile-menu-toggle js-toggle-menu hamburger-menu" href="#">
				<span class="menu-item"></span> <span class="menu-item"></span> <span
				class="menu-item"></span>
			</a>
		</div>
	</header>
	
	<?= $content?>

<!-- .footer -->
	<footer class="footer">
		<div class="container">
			<img src="webAssets/images/logo-favc.png" alt=""> <img
				src="webAssets/images/logo-pesado.png" alt=""> <img
				src="webAssets/images/logo-victoria.png" alt="">
		</div>
	</footer>
	<!-- end - .footer -->
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
