<?php

namespace app\controllers;

use app\models\EntUsuarios;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class AdminController extends \yii\web\Controller
{
	public $layout = 'mainAdmin';
	
	public function behaviors() {
		return [ 
			'access' => [ 
				'class' => AccessControl::className (),
				'only' => [ 
					'usuarios',
					'ver-ganadores' 
				],
				'rules' => [ 
					[ 
						'actions' => [ 
							
						],
						'allow' => true,
						'roles' => [ 
							'@' 
						] 
					] 
				] 
			],
			'verbs' => [ 
				'class' => VerbFilter::className (),
				'actions' => [ 
					'logout' => [ 
						'post' 
					] 
				] 
			] 
		];
	}
	
	
	public function actionIndex()
    {
        return $this->render('index');
    }
	
    public function actionUsuarios(){
    	$usuarios = EntUsuarios::find();
    	$dataProvider = new ActiveDataProvider([
    		'query' => $usuarios,
    		'pagination' => [
        		'pageSize' => 20,
    		]
    	]);
    	
    	return $this->render('usuarios',[
    		'dataProvider' => $dataProvider
    	]);
    }
    
    public function actionVerVideo($idUs){
    	$usuario = EntUsuarios::find()->where(['id_usuario'=>$idUs])->one();
    	
    	return $this->render('verVideo',[
    		'usuario' => $usuario	
    	]);
    }
    
    public function actionUserGanador(){
    	Yii::$app->response->format = Response::FORMAT_JSON;
    	$idUs = $_POST['id'];
    	
    	$usuario = EntUsuarios::find()->where(['id_usuario'=>$idUs])->one();
    	
    	$usuario->repeatEmail = $usuario->txt_email;
    	$usuario->repeatCelular = $usuario->txt_telefono_celular;
    	
    	if(!$usuario->txt_descripcion){
    		$usuario->txt_descripcion = '-';	
    	}
    	
    	if($usuario->b_ganador == 0){
	    	$usuario->b_ganador = 1;
	    	if($usuario->save()){
	    		return ['success'];
	    	}
    	}else{
    		$usuario->b_ganador = 0;
    		if($usuario->save()){
    			return ['success'];
    		}
    	}
    }
    
    public function actionDescargar(){
    	$registros = EntUsuarios::find ()->all ();
    	
    	$array = [ ];
    	$i = 0;
    	foreach ( $registros as $registro ) {
    		$array [$i] ['nombreCompleto'] = $registro->txt_nombre_completo;
    		$array [$i] ['telefono'] = $registro->txt_telefono_casa;
    		$array [$i] ['cp'] = $registro->txt_cp;
    		$array [$i] ['ocupacion'] = $registro->txt_ocupacion;
    		$array [$i] ['email'] = $registro->txt_email;
    		$array [$i] ['telefono_celular'] = $registro->txt_telefono_celular;
    		$i ++;
    	}
    	
    	$this->downloadSendHeaders ( 'registros.csv' );
    	
    	$this->array2CSV ( $array );
    	
    	exit ();
    }
    
    private function array2CSV($array) {
    	if (count ( $array ) == 0) {
    		return null;
    	}
    
    	$df = fopen ( "php://output", 'w' );
    	fputcsv ( $df, [
    			'Nombre completo',
    			'Telefono casa',
    			'Codigo postal',
    			'Ocupacion',
    			'Email',
    			'Telefono celular',
    	] );
    	foreach ( $array as $row ) {
    		fputcsv ( $df, $row );
    	}
    	fclose ( $df );
    }
    private function downloadSendHeaders($filename) {
    	// disable caching
    	$now = gmdate ( "D, d M Y H:i:s" );
    	// header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    	header ( "Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate" );
    	header ( "Last-Modified: {$now} GMT" );
    
    	// force download
    	header ( "Content-Type: application/force-download" );
    	header ( "Content-Type: application/octet-stream" );
    	header ( "Content-Type: application/download" );
    
    	// disposition / encoding on response body
    	header ( "Content-Disposition: attachment;filename={$filename}" );
    	header ( "Content-Transfer-Encoding: binary" );
    }
    
    public function actionVerGanadores(){
    	$usuarios = EntUsuarios::find()->where(['b_ganador'=>1]);
    	$dataProvider = new ActiveDataProvider([
    			'query' => $usuarios,
    			'pagination' => [
    					'pageSize' => 20,
    			]
    	]);
    	
    	return $this->render('verGanadores',[
    		'dataProvider' => $dataProvider
    	]);
    }
}
