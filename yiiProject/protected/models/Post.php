<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property integer $id
 * @property string $to_user
 * @property string $from_user
 * @property string $content
 * @property integer $status
 * @property integer $create_time
 *
 * The followings are the available model relations:
 * @property User $toUser
 * @property User $fromUser
 */
class Post extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
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
		return 'post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('to_user, from_user, content, status, create_time', 'required'),
			array('status, create_time', 'numerical', 'integerOnly'=>true),
			array('to_user, from_user', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, to_user, from_user, content, status, create_time', 'safe', 'on'=>'search'),
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
			'toUser' => array(self::BELONGS_TO, 'User', 'to_user'),
			'fromUser' => array(self::BELONGS_TO, 'User', 'from_user'),
			'postComments' => array(self::HAS_MANY, 'Postcomment', 'post_id',
					'order' => 'postComments.create_time ASC'),
			'postCommentsNumber' => array(self::STAT, 'Postcomment', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'to_user' => 'To User',
			'from_user' => 'From User',
			'content' => 'Content',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('to_user',$this->to_user,true);
		$criteria->compare('from_user',$this->from_user,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function primaryKey()
	{
		return 'id';
	}
}