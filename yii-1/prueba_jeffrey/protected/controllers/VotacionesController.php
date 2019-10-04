<?php

class VotacionesController extends Controller
{
	public function actionIndex()
	{
		$model = new VotacionesUsuario;

		if (isset($_POST['VotacionesUsuario'])) {
			$model->attributes = $_POST['VotacionesUsuario'];
			//User::model("User")->add($nombre, $email, $password);

			if ($model->validate()) {
				if ($model->validarUser($model->usuario)) {
					if ($model->save()) {
						Yii::app()->user->setFlash('success', 'Ya puedes iniciar Sesion');
						$this->redirect(Yii::app()->request->baseUrl . "/votaciones/login");
						//$this->refresh();
					}
				} else {
					Yii::app()->user->setFlash('danger', 'El usuario ya existe, intenta con otro');
					//$this->redirect(Yii::app()->request->baseUrl . "/votaciones/login");
					$this->refresh();
				}
			}
		}

		$this->render('index', array('model' => $model));
	}

	public function actionLogin()
	{
		$model = new VotacionesUsuarioLogin;
		Yii::app()->session['login'] = null;

		if (isset($_POST['VotacionesUsuarioLogin'])) {
			$model->attributes = $_POST['VotacionesUsuarioLogin'];
			if ($model->validate()) {
				$result = VotacionesUsuarioLogin::model()->validarLogin($model->usuario, $model->clave);
				switch ($result) {
					case 'vista.admin':
						echo 'vista admin';
						break;
					case 'vista.votante':
						Yii::app()->session['login'] = $model->attributes;
						$this->redirect(Yii::app()->request->baseUrl . "/votante/index");

						break;
					case 'usuario.no.existe':
						Yii::app()->user->setFlash('danger', 'El usuario no existe o la contraseña es incorrecta');
						$this->refresh();

						break;
				}
			}
		}

		$this->render('login', array('model' => $model));
	}








	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
