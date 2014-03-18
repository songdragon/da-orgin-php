<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $nickname
 * @property string $address
 * @property string $telephone
 * @property string $mobile
 * @property integer $district
 * @property string $email
 * @property integer $role
 * @property string $register_date
 * @property string $last_update
 *
 * The followings are the available model relations:
 * @property Answer[] $answers
 * @property Company $company
 * @property Doctor $doctor
 * @property LoginLog[] $loginLogs
 * @property District $district0
 * @property Role $role0
 */
class User extends TrackActiveRecord
{
	public $password_repeat;
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
			array('username, password, district,email', 'required'),
			array('username,email,telephone,mobile','unique'),
			array('district, role', 'numerical', 'integerOnly'=>true),
			array('username, nickname', 'length', 'max'=>15),
			array('password', 'length', 'max'=>512),
			array('address, email', 'length', 'max'=>50),
			array('telephone, mobile', 'length', 'max'=>20),
			array('password', 'compare','compareAttribute'=>'password_repeat'),
			array('password_repeat', 'safe'),	
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, nickname, address, telephone, mobile, district, email, role, register_date, last_update', 'safe', 'on'=>'search'),
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
			'answers' => array(self::HAS_MANY, 'Answer', 'user_id'),
			'company' => array(self::HAS_ONE, 'Company', 'id'),
			'doctor' => array(self::HAS_ONE, 'Doctor', 'id'),
			'loginLogs' => array(self::HAS_MANY, 'LoginLog', 'uid'),
			'district0' => array(self::BELONGS_TO, 'District', 'district'),
			'role0' => array(self::BELONGS_TO, 'Role', 'role'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'primary key',
			'username' => '用户名',
			'password' => '密码',
			'nickname' => '昵称',
			'address' => '地址',
			'telephone' => '固定电话',
			'mobile' => '手机',
			'district' => '地区',
			'email' => 'Email',
			'role' => '角色',
			'register_date' => '注册时间',
			'last_update' => '上次更新注册信息时间',
			'password_repeat'=>'确认密码',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('district',$this->district);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('register_date',$this->register_date,true);
		$criteria->compare('last_update',$this->last_update,true);

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
	
	protected function afterValidate()
	{
		parent::afterValidate();
		if($this->isNewRecord)
		{
			$this->password=$this->encrypt($this->password);
		}
		else 
		{
			$user=User::model()->findByPk($this->id);
			$this->password=$user->password;
		}
	}
	
	public function encrypt($value)
	{
		return md5($value);
	}
}
