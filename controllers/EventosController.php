<?php

namespace app\controllers;

use Yii;
use app\models\EntEventos;
use app\models\EntEventosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Utils;
use app\models\EntClientes;
use yii\filters\AccessControl;
use yii\filters\AccessRule;

/**
 * EventosController implements the CRUD actions for EntEventos model.
 */
class EventosController extends Controller {
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
        	'access' => [
        		'class' => AccessControl::className(),
        		// We will override the default rule config with the new AccessRule class
        		'ruleConfig' => [
        			'class' => AccessRule::className(),
        		],
        		'only' => [
        			'index',
        			'create',
        			'update',
        			'delete',
        		],
        		'rules' => [
        			[
        				'allow' => true,
                    	'roles' => ['@'],
        			],
        		]
        	]
        ];
    }

    /**
     * Lists all EntEventos models.
     * @return mixed
     */
    public function actionIndex($id)
    {
    	$cliente = EntClientes::searchClienteById($id);
    	
        $searchModel = new EntEventosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $cliente->id_cliente);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        	'cliente'=>$cliente
        ]);
    }

    /**
     * Displays a single EntEventos model.
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
     * Creates a new EntEventos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
    	$cliente = EntClientes::searchClienteById($id);
    	
        $model = new EntEventos();

        $model->id_cliente = $cliente->id_cliente;
        $model->txt_token = Utils::generateToken();
        
        if ($model->load(Yii::$app->request->post())) {
        	$model->fch_inicio = Utils::changeFormatDateInput($model->fch_inicio);
        	$model->fch_fin= Utils::changeFormatDateInput($model->fch_fin);
        	if($model->save()){
        		return $this->redirect(['view', 'id' => $model->id_evento]);
        	}    
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EntEventos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
        	$model->fch_inicio = Utils::changeFormatDateInput($model->fch_inicio);
        	$model->fch_fin = Utils::changeFormatDateInput($model->fch_fin);
        	if($model->save()){
        		return $this->redirect(['view', 'id' => $model->id_evento]);
        	}
        }
        $model->fch_inicio = Utils::changeFormatDate($model->fch_inicio);
        $model->fch_fin = Utils::changeFormatDate($model->fch_fin);
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EntEventos model.
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
     * Finds the EntEventos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EntEventos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EntEventos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
