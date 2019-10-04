<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $idUser
 * @property string $nombreUser
 * @property string $apellidoUser
 * @property integer $cedulaUser
 * @property string $fechaCreacion
 */
class User extends CActiveRecord
{
	private $_identity;
	//public $nombreUser, $userPassword;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreUser, userPassword, correoUser, apellidoUser', 'required'),
			array('idUser', 'numerical', 'integerOnly'=>true),
			array('nombreUser, apellidoUser', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idUser, nombreUser, apellidoUser, cedulaUser, fechaCreacion', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	*/

	public function attributeLabels()
	{
		return array(
			'idUser' => 'Identificacion de usuario',
			'nombreUser' => 'Nombre de usuario',
			'apellidoUser' => 'Apellido de usuario',
			'cedulaUser' => 'Cedula de usuario',
			'fechaCreacion' => 'Fecha de creacion',
			'userPassword' => 'Contraseña de usuario',
			'correoUser' => 'correo de usuario'
		);
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

		$criteria=new CDbCriteria;

		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('nombreUser',$this->nombreUser,true);
		$criteria->compare('apellidoUser',$this->apellidoUser,true);
		$criteria->compare('cedulaUser',$this->cedulaUser);
		$criteria->compare('fechaCreacion',$this->fechaCreacion,true);
		$criteria->compare('userPassword',$this->userPassword,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

		/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}

	public function login(){
		
		if ($this->_identity === null) {
			$this->_identity = new UserIdentity($this->nombreUser, $this->userPassword);
		}

		if($this->_identity->authenticate()){
			Yii::app()->user->login($this->_identity);
			return true;
		}else{
			echo $this->_identity->errorMessage;
		}
	}
}
