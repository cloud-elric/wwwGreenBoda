<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntEncuestasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-encuestas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_encuesta') ?>

    <?= $form->field($model, 'id_ponencia') ?>

    <?= $form->field($model, 'id_convencion') ?>

    <?= $form->field($model, 'txt_nombre') ?>

    <?= $form->field($model, 'b_habilitado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
