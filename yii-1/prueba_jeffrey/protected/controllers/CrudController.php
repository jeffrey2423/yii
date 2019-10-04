<?php

class CrudController extends Controller
{


	public function actionIndex()
	{
		$getUsuarios = User::model("User")->findAll();
		$this->render('index', array(
			"usuarios" => $getUsuarios
		));
	}

	public function actionAdd()
	{
		$model = new User;

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			//User::model("User")->add($nombre, $email, $password);
			if ($model->save()) {
				//Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->redirect(Yii::app()->request->baseUrl . "/crud");
				//$this->refresh();
			}
		}

		$this->render('create', array(
			"model" => $model
		));
	}

	public function actionEdit($id = null)
	{

		if ($id == null) {
			$this->redirect(Yii::app()->request->baseUrl . "/crud");
		}
		$model = new User;
		$usuario = User::model("User")->findByPk($id);

		if (isset($_POST['User'])) {
			$usuario->attributes = $_POST['User'];
			if ($usuario->validate()) {
				//$model->mod($model->id, $model->nombre, $model->apellido, $model->email, $model->password);
				if ($usuario->save()) {
					$this->redirect(Yii::app()->request->baseUrl . "/crud");
				}
			}
		}


		$this->render('create', array(
			"model" => $model,
			"usuario" => $usuario
		));
	}

	public function actionDelete($id = null)
	{

		if ($id == null) {
			$this->redirect(Yii::app()->request->baseUrl . "/crud");
		}
		$model = new User;
		$usuario = User::model("User")->findByPk($id);

		if ($usuario->delete()) {
			$this->redirect(Yii::app()->request->baseUrl . "/crud");
		}

		$this->render('create', array(
			"model" => $model,
			"usuario" => $usuario
		));
	}

	public function actionView($id = null, $view=null)
	{

		if ($id == null) {
			$this->redirect(Yii::app()->request->baseUrl . "/crud");
		} else {

			$usuario = User::model("User")->findByPk($id);
			$this->render('create', array(
				"usuario" => $usuario,
				"view" => $view
			));
		}
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
