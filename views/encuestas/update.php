<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EntEncuestas */

$this->title = 'Actualizar Encuestas: ' . $model->txt_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Encuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->txt_nombre, 'url' => ['view', 'id' => $model->id_encuesta]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ent-encuestas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
