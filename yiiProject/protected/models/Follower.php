<?php

/**
 * This is the model class for table "follower".
 *
 * The followings are the available columns in table 'follower':
 * @property string $followed_username
 * @property string $follower_username
 * @property integer $status
 * @property integer $create_time
 *
 * The followings are the available model relations:
 * @property User $followedUsername
 * @property User $followerUsername
 */
class Follower extends CActiveRecord
{
	const STATUS_PENDING=1;
	const STATUS_CONFIRMED=2;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Follower the static model class
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
		return 'follower';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('followed_username, follower_username, status, create_time', 'required'),
			array('status', 'in', 'range'=>array(STATUS_PENDING,STATUS_CONFIRMED)),
			array('status, create_time', 'numerical', 'integerOnly'=>true),
			array('followed_username, follower_username', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('followed_username, follower_username, status, create_time', 'safe', 'on'=>'search'),
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
			'followedUsername' => array(self::BELONGS_TO, 'User', 'followed_username'),
			'followerUsername' => array(self::BELONGS_TO, 'User', 'follower_username'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'followed_username' => 'Followed Username',
			'follower_username' => 'Follower Username',
			'status' => 'Status',
			'create_time' => 'Create Time',
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

		$criteria->compare('followed_username',$this->followed_username,true);
		$criteria->compare('follower_username',$this->follower_username,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}