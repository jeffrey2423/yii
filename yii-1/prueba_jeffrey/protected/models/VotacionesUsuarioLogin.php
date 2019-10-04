<?php

/**
 * This is the model class for table "votaciones_usuario".
 *
 * The followings are the available columns in table 'votaciones_usuario':
 * @property integer $id_user
 * @property string $usuario
 * @property string $clave
 
 *
 * The followings are the available model relations:
 * @property VotacionesUsuarioExtendido[] $votacionesUsuarioExtendidos
 */
class VotacionesUsuarioLogin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'votaciones_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario, clave', 'required'),
			array('nombre, apellido, usuario', 'length', 'max' => 255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_user, nombre, apellido, usuario, clave, fecha_creacion', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'votacionesUsuarioExtendidos' => array(self::HAS_MANY, 'VotacionesUsuarioExtendido', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user' => 'Id User',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'usuario' => 'Usuario',
			'clave' => 'Clave',
			'fecha_creacion' => 'Fecha Creacion',
		);
	}

	public function validarLogin($user, $pass)
	{
		$tipo = "";
		/*$criterial = new CDbCriteria();
		$criterial->select = "t.*, D.nombre as nombre_rol, C.id_permiso, C.nombre as nombre_permiso, C.descripcion as desc_permiso";
		// $criterial->select = "t.*, B.id_rol";
		$criterial->condition = 't.usuario = :busqueda AND t.clave = :clave';
		$criterial->params = array(':busqueda' => $user, ':clave' => $pass);
		$criterial->join = " INNER JOIN votaciones_usuario_extendido AS B on t.id_user = B.id_user";
		$criterial->join .= " INNER JOIN votaciones_permisos AS C on t.id_rol = C.rol";
		$criterial->join .= " INNER JOIN votaciones_roles AS D on C.rol = D.id_rol";
		$query = VotacionesUsuario::model()->find($criterial);*/

		$query = "SELECT A.id_user, A.nombre, A.apellido, A.usuario, A.clave, B.id_rol,";
		$query .= " D.nombre as nombre_rol, C.id_permiso, C.nombre as nombre_permiso, C.descripcion as desc_permiso FROM";
		$query .= " (votaciones_usuario as A inner join votaciones_usuario_extendido as B on A.id_user = B.id_user";
		$query .= " inner join votaciones_permisos as C on B.id_rol = C.rol inner join votaciones_roles as D on C.rol = D.id_rol)";
		$query .= " WHERE A.usuario = '$user' AND A.clave = '$pass'";
		$resultquery = Yii::app()->db->createCommand($query)->queryAll();

		if ($resultquery) {
			switch ($resultquery[0]['nombre_rol']) {
				case 'admin':
					$tipo = "vista.admin";
					break;
				case 'votante':
					$tipo = "vista.votante";
					break;
			}
		} else {
			$tipo = "usuario.no.existe";
		}
		return $tipo;
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id_user', $this->id_user);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('apellido', $this->apellido, true);
		$criteria->compare('usuario', $this->usuario, true);
		$criteria->compare('clave', $this->clave, true);
		$criteria->compare('fecha_creacion', $this->fecha_creacion, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VotacionesUsuarioLogin the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
