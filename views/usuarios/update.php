<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EntUsuarios2 */

$this->title = 'Update Ent Usuarios2: ' . $model->id_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Ent Usuarios2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_usuario, 'url' => ['view', 'id' => $model->id_usuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ent-usuarios2-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
