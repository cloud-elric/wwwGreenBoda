<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CatComunicados */

$this->title = 'Create Cat Comunicados';
$this->params['breadcrumbs'][] = ['label' => 'Comunicados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-comunicados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
