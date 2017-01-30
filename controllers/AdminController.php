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
