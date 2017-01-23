<?php

namespace app\controllers;

use Yii;
use app\models\EntEncuestas;
use app\models\EntEncuestasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\EntRespuestas;
use yii\data\ActiveDataProvider;
use app\models\EntRespuestasEncuestas;

/**
 * EncuestasController implements the CRUD actions for EntEncuestas model.
 */
class EncuestasController extends Controller
{
	public $layout = 'mainAdmin';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EntEncuestas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntEncuestasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EntEncuestas model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EntEncuestas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EntEncuestas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_encuesta]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EntEncuestas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_encuesta]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EntEncuestas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EntEncuestas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EntEncuestas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EntEncuestas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionIndexListaRespuestas($idE){
    	$encuesta = EntEncuestas::find()->where(['id_convencion'=>$idE])->one();
    	
    	$searchModel = new EntRespuestas();
    	$dataProvider = new ActiveDataProvider([
    			'query' => EntRespuestas::find()->where(['id_encuesta'=>$encuesta->id_encuesta]),
    	]);
    	
    	return $this->render('indexRespuestas', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'encuesta' => $encuesta
    	]);
    }
    
    public function actionIndexRespuestasEncuestas($idR, $idEv){
    	 
    	return $this->render('indexRespuestasEncuestas', [
    		'idR' => $idR,
    		'idEv' => $idEv
    	]);
    }
}
