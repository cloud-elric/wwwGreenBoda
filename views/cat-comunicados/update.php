<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatComunicados */

$this->title = 'Update Cat Comunicados: ' . $model->id_comunicado;
$this->params['breadcrumbs'][] = ['label' => 'Comunicados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_comunicado, 'url' => ['view', 'id' => $model->id_comunicado]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cat-comunicados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
