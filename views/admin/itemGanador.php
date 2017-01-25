<?php
use yii\helpers\Url;
?>

<?= $model->txt_nombre_completo ?>  
<?= $model->txt_email ?>
<?= $model->txt_telefono_celular ?>
<a class="js-btn-video" href="<?= Url::base() ?>/admin/ver-video?idUs=<?= $model->id_usuario ?>" data-url="<?= $model->txt_url_video ?>">Video</a>
