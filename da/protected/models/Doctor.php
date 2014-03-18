<?php

/**
 * This is the model class for table "doctor".
 *
 * The followings are the available columns in table 'doctor':
 * @property integer $id
 * @property string $name
 * @property integer $age
 * @property string $phano
 * @property integer $department
 * @property string $hospital
 * @property integer $title
 * @property integer $level
 * @property string $birthday
 * @property integer $isVerified
 *
 * The followings are the available model relations:
 * @property Department $department0
 * @property User $id0
 * @property Level $level0
 * @property Title $title0
 * @property Question[] $questions
 */
class Doctor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'doctor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, phano, department, hospital, title, level, birthday', 'required'),
			array('department, title, level', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>10),
			array('phano, hospital', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, age, phano, department, hospital, title, level, birthday, isVerified', 'safe', 'on'=>'search'),
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
			'department0' => array(self::BELONGS_TO, 'Department', 'department'),
			'id0' => array(self::BELONGS_TO, 'User', 'id'),
			'level0' => array(self::BELONGS_TO, 'Level', 'level'),
			'title0' => array(self::BELONGS_TO, 'Title', 'title'),
			'questions' => array(self::HAS_MANY, 'Question', 'doctor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '姓名',
			'age' => '年龄',
			'phano' => '医师资格证书编号',
			'department' => '科室',
			'hospital' => '医院',
			'title' => '职称',
			'level' => '虚拟等级',
			'birthday' => '生日',
			'isVerified' => '是否已认证',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('phano',$this->phano,true);
		$criteria->compare('department',$this->department);
		$criteria->compare('hospital',$this->hospital,true);
		$criteria->compare('title',$this->title);
		$criteria->compare('level',$this->level);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('isVerified',$this->isVerified);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Doctor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
