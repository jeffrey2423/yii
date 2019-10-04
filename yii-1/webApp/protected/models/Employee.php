<?php

/**
 * This is the model class for table "employee".
 *
 * The followings are the available columns in table 'employee':
 * @property integer $idEmployee
 * @property integer $idUser
 * @property string $areaEmployee
 * @property string $ocupationEmployee
 *
 * The followings are the available model relations:
 * @property User $idUser0
 */
class Employee extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'employee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUser, areaEmployee, ocupationEmployee', 'required'),
			array('idUser', 'numerical', 'integerOnly'=>true),
			array('areaEmployee, ocupationEmployee', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEmployee, idUser, areaEmployee, ocupationEmployee', 'safe', 'on'=>'search'),
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
			'objUser' => array(self::BELONGS_TO, 'User', 'idUser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEmployee' => 'Identificacion empleado',
			'idUser' => 'Identificacion de usuario',
			'areaEmployee' => 'Area del empleado',
			'ocupationEmployee' => 'Cargo',
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

		$criteria->compare('idEmployee',$this->idEmployee);
		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('areaEmployee',$this->areaEmployee,true);
		$criteria->compare('ocupationEmployee',$this->ocupationEmployee,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Employee the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
