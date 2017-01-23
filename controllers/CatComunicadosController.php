<?php

namespace app\controllers;

use Yii;
use app\models\CatComunicados;
use app\models\CatComunicadosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\filters\AccessRule;

/**
 * CatComunicadosController implements the CRUD actions for CatComunicados model.
 */
class CatComunicadosController extends Controller
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
        			'create',
        			'update',
        			'delete',
        			'view'
        		],
        		'rules' => [
        			[
        				'actions' => [
        					'index',
        					'create',
        					'update',
        					'delete',
        					'view'
        				],
        				'allow' => true,
        				// Allow users, moderators and admins to create
        				'roles' => [
        					'1',
//                          User::ROLE_MODERATOR,
//                          User::ROLE_ADMIN
        				],
        			],
        		]
        	]
        ];
    }
    

    /**
     * Lists all CatComunicados models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatComunicadosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatComunicados model.
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
     * Creates a new CatComunicados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatComunicados();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_comunicado]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CatComunicados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_comunicado]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CatComunicados model.
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
     * Finds the CatComunicados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return CatComunicados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CatComunicados::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
