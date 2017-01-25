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
}
