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
<meta name="description" content="Queremos que seas uno de los cinco afortunados en vivir la #ExperienciaAllAccess entra a www.pesadoallaccess.mx">
<meta name="author" content="2 Geeks One Monkey">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags()?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head()?>
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '362558594127783'); // Insert your pixel ID here.
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=362558594127783&ev=PageView&noscript=1"
    /></noscript>

    <script>
     (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
     (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
     m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
     })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

     ga('create', 'UA-91194145-1', 'auto');
     ga('send', 'pageview');

    </script>


<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

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
			<!-- <img src="webAssets/images/logo-favc.png" alt=""> <img
				src="webAssets/images/logo-pesado.png" alt=""> <img
				src="webAssets/images/logo-victoria.png" alt=""> -->
		</div>
	</footer>
	<!-- end - .footer -->
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
