<?php

namespace app\controllers;

use Yii;
use app\models\EntPonentes;
use app\models\EntPonentesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\EntEventos;
use yii\filters\AccessControl;
use yii\filters\AccessRule;

/**
 * PonentesController implements the CRUD actions for EntPonentes model.
 */
class PonentesController extends Controller
{
	public $layout = 'mainAdmin';
    /**
     * @inheritdoc
     */
    public function behaviors(){
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
        			'view',
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
     * Lists all EntPonentes models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new EntPonentesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$evento = EntEventos::find()->where(['id_convencion'=>$id])->one();
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        	'evento' => $evento
        ]);
    }

    /**
     * Displays a single EntPonentes model.
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
     * Creates a new EntPonentes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idEvento)
    {
        $model = new EntPonentes();
        $evento = EntEventos::find()->where(['id_convencion'=>$idEvento])->one();
		$model->id_convencion = $idEvento;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_ponente]);
        } else {
            return $this->render('create', [
                'model' => $model,
            	'evento' => $evento
            ]);
        }
    }

    /**
     * Updates an existing EntPonentes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_ponente]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EntPonentes model.
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
     * Finds the EntPonentes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EntPonentes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EntPonentes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
