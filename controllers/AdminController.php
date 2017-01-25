<?php

namespace app\controllers;

use app\models\EntUsuarios;
use yii\data\ActiveDataProvider;

class AdminController extends \yii\web\Controller
{
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
    	$idUs = $_POST['id'];
    	
    	$usuario = EntUsuarios::find()->where(['id_usuario'=>$idUs])->one();
    	
    	$usuario->b_ganador = 1;
    	$usuario->save();
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
