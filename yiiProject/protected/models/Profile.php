<?php

/**
 * This is the model class for table "profile".
 *
 * The followings are the available columns in table 'profile':
 * @property string $profile_username
 * @property string $firstname
 * @property string $lastname
 * @property integer $birthmonth
 * @property integer $birthday
 * @property integer $birthyear
 * @property string $title
 * @property string $goal
 * @property string $gender
 * @property integer $weight
 * @property integer $height
 * @property string $location
 *
 * The followings are the available model relations:
 * @property User $profileUsername
 */
class Profile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Profile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profile_username, firstname, lastname, birthmonth, birthday, birthyear, goal, gender', 'required'),
			array('birthmonth, birthday, birthyear, weight, height', 'numerical', 'integerOnly'=>true),
			array('profile_username', 'length', 'max'=>64),
			array('firstname, lastname, title, goal, gender, location', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('profile_username, firstname, lastname, birthmonth, birthday, birthyear, title, goal, gender, weight, height', 'safe', 'on'=>'search'),
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
			'profileUsername' => array(self::BELONGS_TO, 'User', 'profile_username'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'profile_username' => 'Profile Username',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'birthmonth' => 'Birthmonth',
			'birthday' => 'Birthday',
			'birthyear' => 'Birthyear',
			'title' => 'Title',
			'goal' => 'Goal',
			'gender' => 'Gender',
			'weight' => 'Weight',
			'height' => 'Height',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('profile_username',$this->profile_username,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('birthmonth',$this->birthmonth);
		$criteria->compare('birthday',$this->birthday);
		$criteria->compare('birthyear',$this->birthyear);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('goal',$this->goal,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('height',$this->height);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * gets the options for the possible genders
	 */
	public function getGenderOptions()
	{
		return array(
				0 => 'Male',
				1 => 'Female',
		);
	}
	
	/**
	 * returns list of available days
	 */
	public function getDayOptions()
	{
		//TODO add async call to update available days depending on month and year
		for ($i = 1; $i <= 31; $i++)
		{
			$days["{$i}"] = "{$i}";
		}
		return $days;
	}
	
	/**
	 * returns the months so that it can be selected from a drop down menu
	 */
	public function getMonthOptions()
	{
		$monthNames = array('','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		for ($i = 1; $i < count($monthNames); $i++)
		{
		$months["{$i}"] = Yii::t('default', $monthNames[$i]);
		}
		return $months;
	}
	
	/**
	 * returns the years so it can be selected from drop down menu
	 */
	public function getYearOptions()
	{
		for ($i = date('Y'); $i >= 1900; $i--)
		{
			$years["{$i}"] = "{$i}";
		}
		return $years;
	}
	
	public function getGoalOptions()
	{
		return array(
				0 => 'Lose Weight',
				1 => 'Maintain Weight',
				2 => 'Gain Weight',
				3 => 'Increase Performance',
		);
	}
	
	public function primaryKey()
	{
		return 'profile_username';
	}
}