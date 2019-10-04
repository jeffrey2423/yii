<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow anyone to register
				  'actions'=>array('create'), 
				  'users'=>array('*'), // all users
			),
			array('allow', // allow authenticated users to update/view
				  'actions'=>array('update','view'), 
				  'roles'=>array('authenticated')
			),
			array('allow', // allow admins only to delete
				  'actions'=>array('delete'), 
				  'roles'=>array('admin'),
			),
			array('deny', // deny anything else
				  'users'=>array('*'),
			),
		);
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionLogin(){
		$model= new User;
		$session = Yii::app()->session;
		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			if ($model->login()) {
				$this->redirect(array('Employee/index'));
			}else {
				$this->redirect(Yii::app()->request->urlReferrer);
			}		
		}
		$this->render('login',array('model'=> $model));
	}

	public function actionWelcome(){
		
		$this->render("welcome",array('data'=>$session));
	}

	public function actionRecover(){
		$model = new User();

		if (isset($_POST['User'])) {
				  // arrParams array contains eventtype same as the event_template table event type
		  // repacement array used for variables which you want to replace dynamically from your content
		  $model->attributes = $_POST['User'];
		}
		$this->render("recover",array('model'=>$model));
	}

	public function actionRegister(){
		$model = new User();
		if (isset($_POST['User'])) {
			$model->fechaCreacion = date("Y-m-d");
			$model->attributes = $_POST['User'];
			if ($model->save()) {
				$this->redirect(array('login'));
			}
			
		}
		$this->render("register", array('model'=>$model));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
