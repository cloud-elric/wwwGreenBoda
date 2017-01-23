<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EntEncuestas */

$this->title = 'Crear encuestas';
$this->params['breadcrumbs'][] = ['label' => 'Encuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-encuestas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
