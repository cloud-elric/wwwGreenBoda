<?php

namespace app\controllers;

use app\models\EntPonencias;
use app\models\WrkPreguntasPonencias;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use app\models\EntEncuestas;
use app\models\EntRespuestasEncuestas;
use app\models\EntRespuestas;
use app\models\EntEventos;

class ApiController extends Controller {
	public $enableCsrfValidation = false;
	
	
	public function actionGuardarPreguntaPonenciaGet($idEvento=null, $tokenPonencia=null, $txt_pregunta=null, $txt_usuario=null){

	// deshabilita la validacion csrf
		
		// deshabilita layout
		$this->layout = false;
		
		// formato de respuesta
		Yii::$app->response->format = Response::FORMAT_JSON;
		
		// Se busca si existe la ponencia
		$ponencia = $this->getPonenciaByTokenAndIdEvento ( trim ( $idEvento ), trim ( $tokenPonencia ) );
		
		$preguntaPonencia = new WrkPreguntasPonencias ();
		
		if (isset($_GET['txt_pregunta']) && isset($_GET['txt_usuario'])) {
			
			$preguntaPonencia->txt_pregunta = $_GET['txt_pregunta'];
			$preguntaPonencia->txt_usuario = $_GET['txt_usuario'];
			$preguntaPonencia->id_ponencia = $ponencia->id_ponencia;
			if ($preguntaPonencia->save ()) {
				return [ 
						'status' => 'success' 
				];
			} else {
				return [ 
						'status' => 'error',
						$preguntaPonencia->errors 
				];
			}
		} else {
			return [ 
					'status' => 'error',
					'message' => 'Bad request' 
			];
		}
		
	} 
	
	
	public function guardarRespuesta($idRespuestaCre, $index, $valor, $usuario){
		
		$respuesta = new EntRespuestasEncuestas ();
		$respuesta->id_respuesta_creacion = $idRespuestaCre;
		$respuesta->id_pregunta = $index;
		$respuesta->txt_valor = $valor;
		$respuesta->txt_nombre_usuario = $usuario;
		if ($respuesta->save ()) {
			
		}
	}
	
	
	public function actionGuardarRespuestasGet($idEvento = null, $valor0 = null, $valor1 = null, $valor2 = null, $valor3 = null, $valor4 = null, $valor5 = null, $valor6 = null, $valor7 = null, $usuario = null) 
	{
		// deshabilita layout
		$this->layout = false;
		// formato de respuesta
		Yii::$app->response->format = Response::FORMAT_JSON;
		
		// Se busca si existe la ponencia
		$encuesta = $this->getEncuestaById ( trim ( $idEvento ) );
		
		if (isset ( $_GET ['valor0'] ) && isset ( $_GET ['valor1'] ) && isset ( $_GET ['valor2'] ) && isset ( $_GET ['valor3'] ) && isset ( $_GET ['valor4'] ) && isset ( $_GET ['valor5'] ) && isset ( $_GET ['valor6'] ) && isset ( $_GET ['notas'] ) && isset ( $_GET ['usuario'] )) {
			
			$respuestaCre = new EntRespuestas();
			$respuestaCre->id_encuesta = $encuesta->id_encuesta;
			$respuestaCre->save ();
			
			$valor1 = $_GET ['valor0'];
			$valor2 = $_GET ['valor1'];
			$valor3 = $_GET ['valor2'];
			$valor4 = $_GET ['valor3'];
			$valor5 = $_GET ['valor4'];
			$valor6 = $_GET ['valor5'];
			$valor7 = $_GET ['valor6'];
			$valor8 = $_GET ['notas'];
			$usuario = $_GET ['usuario'];
			
			$this->guardarRespuesta($respuestaCre->id_respuesta, 1, $valor1, $usuario);
			$this->guardarRespuesta($respuestaCre->id_respuesta, 2, $valor2, $usuario);
			$this->guardarRespuesta($respuestaCre->id_respuesta, 3, $valor3, $usuario);
			$this->guardarRespuesta($respuestaCre->id_respuesta, 4, $valor4, $usuario);
			$this->guardarRespuesta($respuestaCre->id_respuesta, 5, $valor5, $usuario);
			$this->guardarRespuesta($respuestaCre->id_respuesta, 6, $valor6, $usuario);
			$this->guardarRespuesta($respuestaCre->id_respuesta, 7, $valor7, $usuario);
			$this->guardarRespuesta($respuestaCre->id_respuesta, 8, $valor8, $usuario);
			
			
			return [ 
					'status' => 'success' 
			];
		} else {
			return [ 
					'status' => 'error' 
			];
		}
	}
	
	/**
	 * Servicio para guardar una pregunta
	 * 
	 * @param unknown $idEvento        	
	 * @param unknown $tokenPonencia        	
	 * @return string[]|string[]
	 */
	public function actionGuardarPreguntaPonencia($idEvento = null, $tokenPonencia = null) {
		// deshabilita la validacion csrf
		
		// deshabilita layout
		$this->layout = false;
		
		// formato de respuesta
		Yii::$app->response->format = Response::FORMAT_JSON;
		
		// Se busca si existe la ponencia
		$ponencia = $this->getPonenciaByTokenAndIdEvento ( trim ( $idEvento ), trim ( $tokenPonencia ) );
		
		$preguntaPonencia = new WrkPreguntasPonencias ();
		
		if ($preguntaPonencia->load ( Yii::$app->request->post () )) {
			$preguntaPonencia->id_ponencia = $ponencia->id_ponencia;
			if ($preguntaPonencia->save ()) {
				return [ 
						'status' => 'success' 
				];
			} else {
				return [ 
						'status' => 'error',
						$preguntaPonencia->errors 
				];
			}
		} else {
			return [ 
					'status' => 'error',
					'message' => 'Bad request' 
			];
		}
	}
	public function actionIndex() {
		$this->layout = false;
	}
	public function actionGuardarRespuestas($idEvento = null) {
		
		// deshabilita layout
		$this->layout = false;
		// formato de respuesta
		Yii::$app->response->format = Response::FORMAT_JSON;
		
		// Se busca si existe la ponencia
		$encuesta = $this->getEncuestaById ( trim ( $idEvento ) );
		
		if (isset ( $_POST ['valores'] ) && isset ( $_POST ['usuario'] )) {
			
			$respuestaCre = new EntRespuestas ();
			$respuestaCre->id_encuesta = $encuesta->id_encuesta;
			$respuestaCre->save ();
			
			$valores = $_POST ['valores'];
			$usuario = $_POST ['usuario'];
			$index = 1;
			foreach ( $valores as $key => $valor ) {
				$respuesta = new EntRespuestasEncuestas ();
				$respuesta->id_respuesta_creacion = $respuestaCre->id_respuesta;
				$respuesta->id_pregunta = $index;
				$respuesta->txt_valor = $valor;
				$respuesta->txt_nombre_usuario = $usuario;
				if ($respuesta->save ()) {
				} else {
					return [ 
							'status' => 'error' . $index,
							'message' => $respuesta->errors 
					];
				}
				$index ++;
			}
			return [ 
					'status' => 'success' 
			];
		} else {
			return [ 
					'status' => 'error' 
			];
		}
	}
	
	/**
	 * Busca una encuesta por id
	 *
	 * @param unknown $token        	
	 * @throws NotFoundHttpException
	 * @return Ent
	 */
	private function getEncuestaById($idEvento) {
		if (($encuesta = EntEncuestas::find ()->where ( [ 
				'id_convencion' => $idEvento 
		] )->one ()) !== null) {
			return $encuesta;
		} else {
			
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
	
	/**
	 * Busca un comentario por su token
	 *
	 * @param unknown $token        	
	 * @throws NotFoundHttpException
	 * @return EntPonencias
	 */
	private function getPonenciaByTokenAndIdEvento($idEvento, $tokenPonencia) {
		if (($ponencia = EntPonencias::find ()->where ( [ 
				'id_convencion' => $idEvento,
				'id_ponencia' => $tokenPonencia 
		] )->one ()) !== null) {
			return $ponencia;
		} else {
			
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
}
