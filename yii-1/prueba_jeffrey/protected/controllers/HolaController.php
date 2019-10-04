<?php
#http://localhost/yii/prueba_jeffrey/hola/index

class HolaController extends Controller
{
    public function actionIndex()
    {
        $model = Users::model("Users")->findAll();
        $prueba = "@PruebaJeffrey desde prueba";
        $this->render("index", array("model"=>$model,"prueba" => $prueba));
    }

}
