<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
    <script> var basePath = '<?=Yii::$app->urlManager->createAbsoluteUrl ( [''] );?>'; </script>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>

        <?php $this->beginBody() ?>


        <!-- .animsition -->
        <div class="animsition">

            <header>
                <!-- <h1>Registro al Evento</h1> -->
                <img class="logo-huella" src="<?=Url::base()?>/images/logo-huella.png" alt="Huella">
                <img class="logo-sura" src="<?=Url::base()?>/images/logo-sura.png" alt="Sura">
            </header>

            <!-- .pc -->
            <div class="pc" style="
    text-align: center;display: block;
">
                

                    <?= $content?>


              

                <!-- end - .logo-junto-dejamos-huella -->

            </div>
            <!-- end - .pc -->

            <div class="home-footer" style="display: none;">
                <div class="home-footer-left">
                    <span id="btn-aviso-privacidad">Aviso de privacidad</span>
                </div>

    <!--             <div class="home-footer-right"> -->
    <!--                 <span href="" class="pc-ver-resgistros js-ver-resgistros">Ver registros</span> -->
    <!--             </div> -->
            </div>



            <!-- .modal (Aviso de privacidad) -->
            <div id="modal-aviso-privacidad" class="modal modal-aviso-privacidad" style="display: none;">

                <!-- .modal-content -->
                <div class="modal-content">
                    <!-- .modal-header -->
                    <div class="modal-header">
                        <span class="close" id="modal-aviso-privacidad-close">Ã—</span>
                        <h2>Aviso de privacidad de </h2>
                    </div>
                    <!-- end - .modal-header -->
                    <!-- .modal-body -->
                    <div class="modal-body">
                        <div class="aviso-privacidad-colum">
                            

                        </div>
                        
                         <span class="aceptar-terminos-condiciones-btn"> He leÃ­do el aviso de privacidad </span>
                        
                    </div>
                    <!-- end - .modal-body -->
                </div>
                <!-- end - .modal-content -->

            </div>
            <!-- end - .modal -->
                

            <!-- .modal (TÃ©rminos y condiciones) -->
            <div id="modal-terminos-condiciones" class="modal modal-terminos-condiciones" style="display: none;">

                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close modal-terminos-condiciones-close" id="modal-terminos-condiciones-close">Ã—</span>
                        <h2>TÃ©rminos y Condiciones</h2>
                    </div>
                    <div class="modal-body">
                        <div class="terminos-condiciones-colum">

                        </div>

                        <span class="aceptar-terminos-condiciones-btn"> Acepto los
                            tÃ©rminos y condiciones </span>
                    </div>
                    <!-- <div class="modal-footer">
                            <h3>Modal Footer</h3>
                        </div> -->

                </div>

            </div>
            <!-- end - .modal -->

        </div>
        <!-- end - .animsition -->

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
        