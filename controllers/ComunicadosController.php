<?php

namespace app\controllers;

use Yii;
use app\models\CatComunicados;
use app\models\CatComunicadosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\EntEventos;
use app\models\EntListasUsuariosRegistrados;
use app\models\EntComunicadosEnviados;
use yii\helpers\ArrayHelper;
use yii\base\Model;
use app\models\Utils;
use app\models\RelListasUsuarios;
use yii\filters\AccessControl;
use yii\filters\AccessRule;

/**
 * ComunicadosController implements the CRUD actions for CatComunicados model.
 */
class ComunicadosController extends Controller {
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
        			'enviar'
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
	 * Lists all CatComunicados models.
	 *
	 * @return mixed
	 */
	public function actionIndex($id = null) {
		$evento = EntEventos::searchClienteById ( $id );
		
		$searchModel = new CatComunicadosSearch ();
		$dataProvider = $searchModel->search ( Yii::$app->request->queryParams, $evento->id_convencion );
		
		return $this->render ( 'index', [ 
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
				'evento' => $evento 
		] );
	}
	
	/**
	 * Displays a single CatComunicados model.
	 *
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render ( 'view', [ 
				'model' => $this->findModel ( $id ) 
		] );
	}
	
	/**
	 * Creates a new CatComunicados model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 *
	 * @return mixed
	 */
	public function actionCreate($id = null) {
		$evento = EntEventos::searchClienteById ( $id );
		$model = new CatComunicados ();
		$model->id_evento = $evento->id_convencion;
		
		if ($model->load ( Yii::$app->request->post () ) && $model->save ()) {
			return $this->redirect ( [ 
					'view',
					'id' => $model->id_comunicado 
			] );
		} else {
			return $this->render ( 'create', [ 
					'model' => $model,
					'evento' => $evento 
			] );
		}
	}
	
	/**
	 * Updates an existing CatComunicados model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel ( $id );
		
		if ($model->load ( Yii::$app->request->post () ) && $model->save ()) {
			return $this->redirect ( [ 
					'view',
					'id' => $model->id_comunicado 
			] );
		} else {
			return $this->render ( 'update', [ 
					'model' => $model 
			] );
		}
	}
	
	/**
	 * Deletes an existing CatComunicados model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel ( $id )->delete ();
		
		return $this->redirect ( [ 
				'index' 
		] );
	}
	
	/**
	 * Finds the CatComunicados model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param string $id        	
	 * @return CatComunicados the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = CatComunicados::findOne ( $id )) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
	
	/**
	 * Enviar comunicado
	 *
	 * @param unknown $id        	
	 * @return string
	 */
	public function actionEnviar($id = null) {
		$comunicado = $this->findModel ( $id );
		$template = $comunicado->idTemplate;
		$optionsTemplate = $template->relTemplatesOptions;
		$listas = EntListasUsuariosRegistrados::find ()->where ( [ 
				'id_evento' => $comunicado->id_evento 
		] )->all ();
		
		$listas = ArrayHelper::map ( $listas, 'id_lista_usuario_registrado', 'txt_nombre' );
		
		$comunicadoEnviar = new EntComunicadosEnviados ();
		$comunicadoEnviar->id_comunicado = $comunicado->id_comunicado;
		
		// Validación de post
		if (Model::loadMultiple ( $optionsTemplate, Yii::$app->request->post () ) && Model::validateMultiple ( $optionsTemplate ) && $comunicadoEnviar->load ( Yii::$app->request->post () )) {
			$templateHtml = $template->txt_content;
			foreach ($optionsTemplate as $option) {
				$templateHtml = str_replace($option->txt_valor, $option->txt_config, $templateHtml);
			}
			
			$utils = new Utils();
			$utils->sendEmailTemplate($templateHtml, 'solo texto', 'no-reply@onex.mx', 'alfredo@capitalonline.com.mx', $comunicado->txt_nombre);
			$utils->sendEmailTemplate($templateHtml, 'solo texto', 'no-reply@onex.mx', 'humberto@2gom.com.mx', $comunicado->txt_nombre);
		}
		
		return $this->render ( 'enviarComunicado', [ 
				'comunicado' => $comunicado,
				'template' => $template,
				'optionsTemplate' => $optionsTemplate,
				'listas' => $listas,
				'comunicadoEnviar' => $comunicadoEnviar 
		] );
	}
}
