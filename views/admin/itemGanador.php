<?php
use yii\helpers\Url;
use yii\web\View;
?>
<input class="js-chekbox-ganador" type="checkbox" data-id="<?= $model->id_usuario ?> ">
<?= $model->txt_nombre ?> 
<?= $model->txt_apellido_paterno ?> 
<?= $model->txt_email ?>
<?= $model->txt_telefono_celular ?>
<a class="js-btn-video" href="<?= Url::base() ?>/admin/ver-video?idUs=<?= $model->id_usuario ?>" data-url="<?= $model->txt_url_video ?>">Video</a>
