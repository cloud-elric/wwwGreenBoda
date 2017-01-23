<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntPonenciasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-ponencias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ponencia') ?>

    <?= $form->field($model, 'id_ponente') ?>

    <?= $form->field($model, 'id_evento') ?>

    <?= $form->field($model, 'txt_titulo') ?>

    <?= $form->field($model, 'txt_actividad') ?>

    <?php // echo $form->field($model, 'txt_descripcion') ?>

    <?php // echo $form->field($model, 'txt_notas') ?>

    <?php // echo $form->field($model, 'txt_lugar') ?>

    <?php // echo $form->field($model, 'num_cupo') ?>

    <?php // echo $form->field($model, 'num_dia') ?>

    <?php // echo $form->field($model, 'num_orden') ?>

    <?php // echo $form->field($model, 'txt_hora_inicio') ?>

    <?php // echo $form->field($model, 'txt_duracion') ?>

    <?php // echo $form->field($model, 'txt_imagen_header') ?>

    <?php // echo $form->field($model, 'txt_grupo') ?>

    <?php // echo $form->field($model, 'txt_ico') ?>

    <?php // echo $form->field($model, 'num_asistentes') ?>

    <?php // echo $form->field($model, 'b_vip') ?>

    <?php // echo $form->field($model, 'b_receso') ?>

    <?php // echo $form->field($model, 'b_habilitado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
