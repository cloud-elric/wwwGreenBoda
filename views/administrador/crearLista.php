<?php
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use app\models\EntUsuarios2;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$this->title = 'Crear lista';
?>

<?php
$form = ActiveForm::begin ( [ 
		
		'id' => 'guardar-lista',
] );

?>

<?= $form->field($lista, 'txt_nombre')->textInput(['maxlength' => true])?>
<?php \yii\widgets\Pjax::begin(); ?>
<?php 

$dataProvider = new ActiveDataProvider([
		'query' => EntUsuarios2::find()->where(['id_evento'=>$evento->id_convencion]),
		'pagination' => [
				'pageSize' => 20,
		],
]);
echo GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
				// ...
				[
						'class' => 'yii\grid\CheckboxColumn',
						// you may configure additional properties here
				],
				'txt_nombre'
		]
]);
?>

<?php ?>
<?= Html::submitButton($lista->isNewRecord?'crear':'editar')?>
<?php \yii\widgets\Pjax::end(); 
ActiveForm::end ();
?>

