<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EntClientes */

$this->title = 'Crear cliente';
$this->params ['breadcrumbs'] [] = [ 
		'label' => 'Clientes',
		'url' => [ 
				'index' 
		] 
];
$this->params ['breadcrumbs'] [] = $this->title;
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">Crear cliente</div>
			<div class="panel-body">
    <?=$this->render ( '_form', [ 'model' => $model ] )?>      
    
    </div>
		</div>
	</div>
</div>
