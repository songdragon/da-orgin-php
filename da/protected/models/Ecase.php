<?php

/**
 * This is the model class for table "ecase".
 *
 * The followings are the available columns in table 'ecase':
 * @property string $id
 * @property integer $age
 * @property string $mainsuit
 * @property string $current
 * @property string $anamnesis
 * @property string $infect
 * @property string $operation
 * @property string $descrption
 * @property string $examine
 * @property string $assistexamine
 * @property string $initresult
 * @property string $question_id
 *
 * The followings are the available model relations:
 * @property Question $question
 */
class Ecase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ecase';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, age, mainsuit, question_id', 'required'),
			array('age', 'numerical', 'integerOnly'=>true),
			array('id, question_id', 'length', 'max'=>20),
			array('current, anamnesis, infect, operation, descrption, examine, assistexamine, initresult', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, age, mainsuit, current, anamnesis, infect, operation, descrption, examine, assistexamine, initresult, question_id', 'safe', 'on'=>'search'),
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
			'question' => array(self::BELONGS_TO, 'Question', 'question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'key',
			'age' => '患者年龄',
			'mainsuit' => '主诉',
			'current' => '现病史',
			'anamnesis' => '既往病史',
			'infect' => '传',
			'operation' => '外伤、手术及输血史',
			'descrption' => '病例描述',
			'examine' => '专科情况',
			'assistexamine' => '辅助检查',
			'initresult' => '初步诊断',
			'question_id' => 'Question',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('mainsuit',$this->mainsuit,true);
		$criteria->compare('current',$this->current,true);
		$criteria->compare('anamnesis',$this->anamnesis,true);
		$criteria->compare('infect',$this->infect,true);
		$criteria->compare('operation',$this->operation,true);
		$criteria->compare('descrption',$this->descrption,true);
		$criteria->compare('examine',$this->examine,true);
		$criteria->compare('assistexamine',$this->assistexamine,true);
		$criteria->compare('initresult',$this->initresult,true);
		$criteria->compare('question_id',$this->question_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ecase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
