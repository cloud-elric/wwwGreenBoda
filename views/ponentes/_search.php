<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntPonentesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-ponentes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ponente') ?>

    <?= $form->field($model, 'id_evento') ?>

    <?= $form->field($model, 'txt_nombre') ?>

    <?= $form->field($model, 'txt_apellido_p') ?>

    <?= $form->field($model, 'txt_apellido_m') ?>

    <?php // echo $form->field($model, 'txt_job') ?>

    <?php // echo $form->field($model, 'txt_descripcion') ?>

    <?php // echo $form->field($model, 'txt_nombre_archivo') ?>

    <?php // echo $form->field($model, 'b_vip') ?>

    <?php // echo $form->field($model, 'b_habilitado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
