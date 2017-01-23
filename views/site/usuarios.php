<?php
use yii\helpers\Url;
use yii\widgets\ListView;
?>
		
<?php
echo ListView::widget ( [ 
		'dataProvider' => $dataProvider,
		// 'options' => [
		// 'tag' => 'div',
		// 'class' => 'user-register-cont-tabla-body',
		// 'id' => 'list-wrapper'
		// ],
		'itemOptions' => [ 
				'class' => 'user-register-cont-tabla-body-tr' 
		],
		'summary' => "Mostrando {begin} - {end} de {totalCount}",
// 		'layout' => '<div class="user-register-cont-tabla">
// 										<div class="user-register-cont-tabla-head">
// 											<div class="user-register-cont-tabla-head-td">Nombre</div>
// 											<div class="user-register-cont-tabla-head-td">Telefono</div>
// 										</div>
// 										<div class="user-register-cont-tabla-body">
// 											{items}
// 										</div>
// 									</div>{summary}{pager}',
		'itemView' => '_itemUsuario' 
] );
?>
	