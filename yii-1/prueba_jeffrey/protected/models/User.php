<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 */
class User extends CActiveRecord
{

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email', 'required'),
			array('username, password, email', 'length', 'max' => 128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, email', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
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

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('email', $this->email, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	public function add($nombre, $email, $password)
	{
		$sql = "insert into tbl_user (username,password,email) values (:username,:password,:email)";
		$parameters = array(
			":username" => $nombre,
			":password" => $password,
			":email" => $email
		);

		$insert = $this->connection->createCommand($sql)->execute($parameters);
		return $insert;

		/*$insert = $this->connection->createCommand()->insert("tbl_user", array(
			"username" => $nombre,
			"password" => $password,
			"email" => $email
		));
		return $insert;*/
	}

	public function mod($id, $nombre, $apellido, $email, $password)
	{
		$update = $this->connection->createCommand()->update("usuarios", array(
				"nombre" => $nombre,
				"apellido" => $apellido,
				"email" => $email,
				"password" => $password
			), "id=$id");
		return $update;
	}







	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
