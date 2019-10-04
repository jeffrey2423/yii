<?php

class Users extends CActiveRecord
{
    private $connection;
    private $getUsers;
    private $getUser;


    public function __construct()
    {
        //Lanzamos la conexión a la base de datos
        $this->connection = new CDbConnection(
            //Cogemos la configuración asignada en config/main.php
            Yii::app()->db->connectionString,
            Yii::app()->db->username,
            Yii::app()->db->password
        );

        //Activamos la conexión
        $this->connection->active = true;
    }

    public static function model($model = __CLASS__)
    {
        return parent::model($model);
    }

    public function getUsuarios()
    {
        $this->getUsers = $this->connection->createCommand()
            ->select("*")->from('tbl_user')->queryAll();

        return $this->getUsers;
    }

    public function getUnUsuario($id)
    {
        $this->getUser = $this->connection->createCommand()
            ->select("*")->from('tbl_user')
            ->where("id=$id")->queryAll();
        return $this->getUser;
    }
}
