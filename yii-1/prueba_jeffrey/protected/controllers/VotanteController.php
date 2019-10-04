<?php

class VotanteController extends Controller
{
	public function actionIndex()
	{
		$query = "SELECT * FROM votaciones_candidato";
		$resultquery = Yii::app()->db->createCommand($query)->queryAll();
		$this->render('index', array('votantes' => $resultquery));
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