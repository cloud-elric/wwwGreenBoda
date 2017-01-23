<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\EntListasUsuariosRegistrados;
use Yii;
use app\models\RelListasUsuarios;
use app\models\EntClientes;
use yii\web\NotFoundHttpException;
use MadMimi\Connection;
use MadMimi\CurlRequest;
use MadMimi\Options\Mail\Transactional;
use app\models\EntEventos;
use app\models\CatTemplatesHtml;
use app\models\EntUsuariosCompletoSearch;
use yii\filters\AccessRule;

class AdministradorController extends Controller {
	public $layout = 'mainAdmin';
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
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
        			'cliente',
        			'crear-lista',
        			'mostrar-lista',
        			'creacion-comunicados',
        			'test-email',
        			'evento',
        			'ver-lista-usuarios',
        			'get-html-template',
        			'agregar-user',
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
	 * Redirecciona a los clientes
	 */
	public function actionIndex() {
		return $this->redirect ( [ 
				'clientes/index' 
		] );
	}
	
	/**
	 * Vista para administrar el cliente
	 * 
	 * @param unknown $id        	
	 * @return string
	 */
	public function actionCliente($id = null) {
		$cliente = $this->searchClienteById ( $id );
		
		return $this->render ( 'cliente', [ 
				'cliente' => $cliente 
		] );
	}
	
	/**
	 * Busca cliente por el id
	 * 
	 * @param unknown $id        	
	 * @throws NotFoundHttpException
	 * @return EntClientes
	 */
	private function searchClienteById($id) {
		if (($cliente = EntClientes::find ()->where ( [ 
				'id_cliente' => $id 
		] )->one ()) !== null) {
			return $cliente;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
	
	/**
	 * Action para la creación de la lista
	 *
	 * @return string
	 */
	public function actionCrearLista($token) {
		$lista = new EntListasUsuariosRegistrados ();
		$evento = EntEventos::find()->where(['txt_token'=>$token])->one();
		if ($lista->load ( Yii::$app->request->post () )) {
			
			if ($lista->save ()) {
				
				if (isset ( $_POST ['selection'] )) {
					foreach ( $_POST ['selection'] as $id ) {
						$usuarioALista = new RelListasUsuarios ();
						$usuarioALista->id_usuario = $id;
						$usuarioALista->id_lista = $lista->id_lista_usuario_registrado;
						$usuarioALista->save ();
					}
				}
			}
		}
		return $this->render ( 'crearLista', [ 
				'lista' => $lista,
				'evento' => $evento
		] );
	}

	public function actionMostrarLista($token){
		$evento = EntEventos::find()->where(['txt_token'=>$token])->one();
		$lista = EntListasUsuariosRegistrados::find()->where(['id_evento'=>$evento->id_convencion])->all();
		
		return $this->render('mostrarLista', [
			'lista' => $lista,
			'evento' => $evento
		]);
	}
	
	/**
	 * Action para generar los comunicados
	 */
	public function actionCreacionComunicados() {
	}
	public function actionTestEmail() {
		$connection = new Connection ( 'humberto@2gom.com.mx', 'eadc1b012973cd02f1b38722f9839baa', new CurlRequest () );
		
		$options = new Transactional ();
		$options->setPromotionName ( 'Test' )->setPlaceholderValues ( [ 
				'answer' => '42' 
		] )->setTo ( 'humberto@2gom.com.mx', ':D' );
		
		$transactionId = $connection->request ( $options );
	}
	
	/**
	 * Administracion del evento
	 * @param unknown $id
	 * @return string
	 */
	public function actionEvento($id) {
		$evento = $this->searchEventoById ( $id );
		
		return $this->render ( 'evento', [ 
				'evento' => $evento 
		] );
	}
	
	/**
	 * Busca evento por el id
	 * 
	 * @param unknown $id        	
	 * @throws NotFoundHttpException
	 * @return EntEventos
	 */
	private function searchEventoById($id) {
		if (($evento = EntEventos::find ()->where ( [ 
				'id_convencion' => $id 
		] )->one ()) !== null) {
			return $evento;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
	
	/**
	 * 
	 * @param string $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
				'model' => $this->findModel($id),
		]);
	}
	
	protected function findModel($id)
	{
		if (($model = EntListasUsuariosRegistrados::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
	
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
	
		return $this->redirect(['index']);
	}
	
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
	
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id_lista_usuario_registrado]);
		} else {
			return $this->render('update', [
					'model' => $model,
			]);
		}
	}
	
	public function actionVerListaUsuarios($id){
		$lista = EntListasUsuariosRegistrados::find()->where(['id_lista_usuario_registrado'=>$id])->one();
		$evento = EntEventos::find()->where(['id_convencion'=>$lista->id_evento])->one();
		
		$searchModel = new EntUsuariosCompletoSearch();
		$dataProvider = $searchModel->searchCompleto(Yii::$app->request->queryParams, $evento->id_convencion);
		
// 		if ($lista->load ( Yii::$app->request->post () )) {
// 			RelListasUsuarios::deleteAll('id_lista=:idLista', [':idLista'=>$id]);
// 			if ($lista->save ()) {
		
// 				if (isset ( $_POST ['selection'] )) {
// 					foreach ( $_POST ['selection'] as $id ) {
// 						$usuarioALista = new RelListasUsuarios ();
// 						$usuarioALista->id_usuario = $id;
// 						$usuarioALista->id_lista = $lista->id_lista_usuario_registrado;
// 						$usuarioALista->save ();
// 					}
// 				}
// 			}
// 		}
		
		return $this->render ( 'verListaUsuarios', [
				'lista' => $lista,
				'evento' => $evento,
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider
		] );
	}
	
	public function actionGetHtmlTemplate(){
		$this->layout = false;
		
		$template = CatTemplatesHtml::find()->one();
		
		echo $template->txt_content;
		
	}
	
	public function actionAgregarUser(){
		$relLista = new RelListasUsuarios();
		
		$idUser = $_POST['user'];
		$idLista = $_POST['lista'];
		
		$relLista->id_lista = $idLista;
		$relLista->id_usuario = $idUser;
		$relLista->save();
	}
	
	public function actionCreate($idEvento)
	{
		$model = new EntListasUsuariosRegistrados();
		$evento = EntEventos::find()->where(['id_convencion'=>$idEvento])->one();
		$model->id_evento = $idEvento;
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
// 			echo $model->id_evento;
// 			exit();
			return $this->redirect(['ver-lista-usuarios', 'id' => $model->id_lista_usuario_registrado]);
		} else {
			return $this->render('create', [
					'model' => $model,
					'evento' => $evento
			]);
		}
	}
}
