<?php 
$this->title = 'Evento';
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['eventos/index/'.$evento->id_cliente]];
$this->params['breadcrumbs'][] = "Evento";
?>

<div class="row">
	<div class="col-lg-4 col-sm-6">
		<!-- Widget Linearea One-->
		<a href="<?=Yii::$app->urlManager->createAbsoluteUrl ( ['comunicados/index', 'id'=>$evento->id_convencion] );?>"><div class="widget widget-shadow" id="widgetLineareaOne">
			<div class="widget-content">
				<div class="padding-20 padding-top-10">
					<div class="clearfix">
						<div class="grey-800 pull-left padding-vertical-10">
							<i
								class="glyphicon glyphicon-glass"></i>
							Comunicados
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
		<!-- End Widget Linearea One -->
	</div>

	<div class="col-lg-4 col-sm-6">
		<!-- Widget Linearea One-->
		<a href="<?=Yii::$app->urlManager->createAbsoluteUrl ( ['usuarios/index', 'id'=>$evento->id_convencion] );?>">
		<div class="widget widget-shadow" id="widgetLineareaOne">
			<div class="widget-content">
				<div class="padding-20 padding-top-10">
					<div class="clearfix">
						<div class="grey-800 pull-left padding-vertical-10">
							<i
								class="glyphicon glyphicon-user"></i>
							Usuarios registrados
						</div>
						
					</div>
				</div>
			</div>
		</div>
		</a>
		<!-- End Widget Linearea One -->
	</div>

	<div class="col-lg-4 col-sm-6">
		<!-- Widget Linearea One-->
		<a href="<?=Yii::$app->urlManager->createAbsoluteUrl ( ['administrador/mostrar-lista', 'token'=>$evento->txt_token] );?>">
		<div class="widget widget-shadow" id="widgetLineareaOne">
			<div class="widget-content">
				<div class="padding-20 padding-top-10">
					<div class="clearfix">
						<div class="grey-800 pull-left padding-vertical-10">
							<i
								class="glyphicon glyphicon-th-list"></i>
							Lista de envío
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
		<!-- End Widget Linearea One -->
	</div>
	
	<div class="col-lg-4 col-sm-6">
		<!-- Widget Linearea One-->
		<a href="<?=Yii::$app->urlManager->createAbsoluteUrl ( ['ponencias/index', 'id' => $evento->id_convencion] );?>">
		<div class="widget widget-shadow" id="widgetLineareaOne">
			<div class="widget-content">
				<div class="padding-20 padding-top-10">
					<div class="clearfix">
						<div class="grey-800 pull-left padding-vertical-10">
							<i
								class="glyphicon glyphicon-bullhorn"></i>
							Conferencias
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
		<!-- End Widget Linearea One -->
	</div>
	
	<div class="col-lg-4 col-sm-6">
		<!-- Widget Linearea One-->
		<a href="<?=Yii::$app->urlManager->createAbsoluteUrl ( ['ponentes/index', 'id' => $evento->id_convencion] );?>">
		<div class="widget widget-shadow" id="widgetLineareaOne">
			<div class="widget-content">
				<div class="padding-20 padding-top-10">
					<div class="clearfix">
						<div class="grey-800 pull-left padding-vertical-10">
							<i
								class="glyphicon glyphicon-star"></i>
							Ponentes
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
		<!-- End Widget Linearea One -->
	</div>
	
	<div class="col-lg-4 col-sm-6">
		<!-- Widget Linearea One-->
		<a href="<?=Yii::$app->urlManager->createAbsoluteUrl ( ['administrador/mostrar-lista', 'token'=>$evento->txt_token] );?>">
		<div class="widget widget-shadow" id="widgetLineareaOne">
			<div class="widget-content">
				<div class="padding-20 padding-top-10">
					<div class="clearfix">
						<div class="grey-800 pull-left padding-vertical-10">
							<i
								class="glyphicon glyphicon-cutlery"></i>
							Agenda
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
		<!-- End Widget Linearea One -->
	</div>
	
	<div class="col-lg-4 col-sm-6">
		<!-- Widget Linearea One-->
		<a href="<?=Yii::$app->urlManager->createAbsoluteUrl ( ['encuestas/index-lista-respuestas?idE='. $evento->id_convencion] );?>">
		<div class="widget widget-shadow" id="widgetLineareaOne">
			<div class="widget-content">
				<div class="padding-20 padding-top-10">
					<div class="clearfix">
						<div class="grey-800 pull-left padding-vertical-10">
							<i
								class="glyphicon glyphicon-check"></i>
							Encuesta
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
		<!-- End Widget Linearea One -->
	</div>
	
	<div class="col-lg-4 col-sm-6">
		<!-- Widget Linearea One-->
		<a href="<?=Yii::$app->urlManager->createAbsoluteUrl ( ['ponencias/index-preguntas', 'id' => $evento->id_convencion] );?>">
		<div class="widget widget-shadow" id="widgetLineareaOne">
			<div class="widget-content">
				<div class="padding-20 padding-top-10">
					<div class="clearfix">
						<div class="grey-800 pull-left padding-vertical-10">
							<i
								class="glyphicon glyphicon-check"></i>
							Preguntas
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
		<!-- End Widget Linearea One -->
	</div>

	<div class="col-lg-4 col-sm-6">
		<!-- Widget Linearea One-->
		<a href="<?=Yii::$app->urlManager->createAbsoluteUrl ( ['eventos/view', 'id'=>$evento->id_convencion] );?>">
		<div class="widget widget-shadow" id="widgetLineareaOne">
			<div class="widget-content">
				<div class="padding-20 padding-top-10">
					<div class="clearfix">
						<div class="grey-800 pull-left padding-vertical-10">
							<i
								class="glyphicon glyphicon-info-sign"></i>
							Infomación del evento
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
		<!-- End Widget Linearea One -->
	</div>
	
	<div class="col-lg-4 col-sm-6">
		<!-- Widget Linearea One-->
		<a href="<?=Yii::$app->urlManager->createAbsoluteUrl ( ['ponencias/actividades', 'id' => $evento->id_convencion] );?>">
		<div class="widget widget-shadow" id="widgetLineareaOne">
			<div class="widget-content">
				<div class="padding-20 padding-top-10">
					<div class="clearfix">
						<div class="grey-800 pull-left padding-vertical-10">
							<i
								class="glyphicon glyphicon-bullhorn"></i>
							Actividades
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
		<!-- End Widget Linearea One -->
	</div>
	
</div>
