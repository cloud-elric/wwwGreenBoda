<?php

namespace app\controllers;

use Yii;
use app\models\EntPonencias;
use app\models\EntPonenciasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\EntEventos;
use app\models\EntPonentes;
use app\models\RelConvencionPonente;
use app\models\RelPonenciaPonente;
use app\models\WrkPreguntasPonencias;
use yii\data\ActiveDataProvider;
use yii\web\Response;
use app\components\AccessRule;
use yii\filters\AccessControl;

/**
 * PonenciasController implements the CRUD actions for EntPonencias model.
 */
class PonenciasController extends Controller
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
        			'agregar-ponentes',
        			'index-preguntas',
        			'preguntas',
        			'aceptar-preguntas',
        			'actividades',
        			'create-actividades',
        			'view-actividad',
        			'update-actividad'
        		],
        		'rules' => [
        			[
        				'actions' => [
        					'index',
        					'create',
        					'update',
        					'delete',
        					'agregar-ponentes',
        					'index-preguntas',
        					'preguntas',
        					'aceptar-preguntas',
        					'actividades',
        					'create-actividades',
        					'view-actividad',
        					'update-actividad'
        				],
        				'allow' => true,
        				// Allow users, moderators and admins to create
        				'roles' => [
        					'1',
//                                User::ROLE_MODERATOR,
//                                User::ROLE_ADMIN        								],
        				],
        			],
        		],
        	]
        ];
    }

    /**
     * Lists all EntPonencias models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new EntPonenciasSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        $searchModel->id_convencion = $id;
        $searchModel->id_tipo_ponencia = 1;
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $evento = EntEventos::find()->where(['id_convencion'=>$id])->one();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        	'evento' => $evento
        ]);
    }

    /**
     * Displays a single EntPonencias model.
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
     * Creates a new EntPonencias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idEvento)
    {
        $model = new EntPonencias();
        $evento = EntEventos::find()->where(['id_convencion'=>$idEvento])->one();
        $model->id_tipo_ponencia = 1;
        $model->id_convencion = $idEvento;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_ponencia]);
        } else {
            return $this->render('create', [
                'model' => $model,
            	'evento' => $evento
            ]);
        }
    }

    /**
     * Updates an existing EntPonencias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_ponencia]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EntPonencias model.
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
     * Finds the EntPonencias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EntPonencias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EntPonencias::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionAgregarPonentes(){
    	$idPonente = $_POST['ponente'];
    	$idPonencia = $_POST['ponencia'];
    	
    	$relacion = RelPonenciaPonente::find()->where(['id_ponencia'=>$idPonencia])->andWhere(['id_ponente'=>$idPonente])->one();
    	
    	if($relacion){
//     		print_r($relacion);
//     		exit();
    		$relacion->delete();
    	}else{
    		$relacion2 = new RelPonenciaPonente();
    		
    		$relacion2->id_ponencia = $idPonencia;
    		$relacion2->id_ponente = $idPonente;
    		$relacion2->save();
    	}
    }
    
    public function actionIndexPreguntas($id)
    {
    	
    	$evento = EntEventos::find()->where(['id_convencion'=>$id])->one();
    	
    	$searchModel = new EntPonenciasSearch();
    	$searchModel->id_convencion = $evento->id_convencion;
    	$searchModel->id_tipo_ponencia = 1;
    	$dataProvider = $searchModel->searchParaPreguntas(Yii::$app->request->queryParams);
    
    	return $this->render('indexPreguntas', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'evento' => $evento
    	]);
    }
    
    public function actionPreguntas($id, $idEvento, $ultimoId = 0){
    	
    	$evento = EntEventos::find()->where(['id_convencion'=>$idEvento])->one();
    	$query = WrkPreguntasPonencias::find()->where(['id_ponencia'=>$id])->andWhere(['>', 'id_pregunta', $ultimoId])->orderBy('fch_creacion ASC')->limit(5)->all();
    	$conferencia = EntPonencias::find()->where(['id_ponencia'=>$id])->one();
    	
    	//print_r($query);
    	if(Yii::$app->request->isAjax){
    		
    		$this->layout = false;
    		Yii::$app->response->format = Response::FORMAT_JSON;
    		
    		return [
    			'status' => 'success',
    			'preguntas' => $query
    		];
    	}
    	
	    return $this->render('preguntas',[
	    	'preguntas' => $query,
	     	'id' => $id,
	    	'evento' => $evento,
	    	'conferencia' => $conferencia
	    ]);

    }
    
    public function actionAceptarPregunta(){
    	$idPreg = $_POST['preg'];
    	$preguntas = WrkPreguntasPonencias::find()->where(['id_pregunta'=>$idPreg])->one();
    	$preguntas->b_aceptada = 1;
    	$preguntas->save();
    }
    
    public function actionActividades($id){
    	$searchModel = new EntPonenciasSearch();
    	$dataProvider = $searchModel->searchActividades(Yii::$app->request->queryParams, $id);
    	$evento = EntEventos::find()->where(['id_convencion'=>$id])->one();
    
    	return $this->render('indexActividades', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'evento' => $evento
    	]);
    }
    
    public function actionCreateActividades($idEvento){
    	$model = new EntPonencias();
    	$evento = EntEventos::find()->where(['id_convencion'=>$idEvento])->one();
    	$model->id_tipo_ponencia = 2;
    	$model->id_convencion = $idEvento;
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->redirect(['view-actividad', 'id' => $model->id_ponencia]);
    	} else {
    		return $this->render('createActividades', [
    				'model' => $model,
    				'evento' => $evento
    		]);
    	}
    }
    
    public function actionViewActividad($id)
    {
    	return $this->render('viewActividad', [
    			'model' => $this->findModel($id),
    	]);
    }
    
    public function actionUpdateActividad($id)
    {
    	$model = $this->findModel($id);
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->redirect(['view-actividad', 'id' => $model->id_ponencia]);
    	} else {
    		return $this->render('updateActividades', [
    				'model' => $model,
    		]);
    	}
    }
}
