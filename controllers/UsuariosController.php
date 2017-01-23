<?php

namespace app\controllers;

use Yii;
use app\models\EntUsuarios2;
use app\models\EntUsuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ViewUsuariosCompleto;
use yii\data\ActiveDataProvider;
use app\models\EntEventos;
use app\models\EntUsuariosCompletosSearch;
use app\models\EntUsuariosCompletoSearch;
use yii\filters\AccessControl;
use yii\filters\AccessRule;

/**
 * UsuariosController implements the CRUD actions for EntUsuarios2 model.
 */
class UsuariosController extends Controller
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
     * Lists all EntUsuarios2 models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        //$searchModel = new EntUsuariosSearch();
    	$searchModel = new EntUsuariosCompletoSearch();
        $dataProvider = $searchModel->searchCompleto(Yii::$app->request->queryParams, $id);
        $evento = EntEventos::find()->where(['id_convencion'=>$id])->one();
        
//     	$query = ViewUsuariosCompleto::find()->where(['id_evento'=>$id]);
//     	$dataProvider = new ActiveDataProvider([
//     			'query' => $query,
//     	]);
		
    	
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        	'evento' => $evento,
        ]);
    }

    /**
     * Displays a single EntUsuarios2 model.
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
     * Creates a new EntUsuarios2 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EntUsuarios2();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_usuario]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EntUsuarios2 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_usuario]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EntUsuarios2 model.
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
     * Finds the EntUsuarios2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EntUsuarios2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ViewUsuariosCompleto::find()->where(['id_usuario'=>$id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
