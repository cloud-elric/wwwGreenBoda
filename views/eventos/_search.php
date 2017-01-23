<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntEventosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-eventos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_evento') ?>

    <?= $form->field($model, 'id_cliente') ?>

    <?= $form->field($model, 'txt_nombre') ?>

    <?= $form->field($model, 'txt_titulo') ?>

    <?= $form->field($model, 'txt_descripcion') ?>

    <?php // echo $form->field($model, 'txt_direccion') ?>

    <?php // echo $form->field($model, 'txt_token') ?>

    <?php // echo $form->field($model, 'fch_inicio') ?>

    <?php // echo $form->field($model, 'fch_final') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
