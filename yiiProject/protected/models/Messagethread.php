<?php

/**
 * This is the model class for table "messagethread".
 *
 * The followings are the available columns in table 'messagethread':
 * @property integer $thread_id
 * @property integer $message_id
 * @property integer $sender_status
 * @property integer $read_status
 * @property string $content
 * @property integer $create_time
 *
 * The followings are the available model relations:
 * @property Message $message
 */
class Messagethread extends CActiveRecord
{
	const STATUS_INCOMING=1;
	const STATUS_OUTGOING=2;
	const STATUS_READ=1;
	const STATUS_UNREAD=2;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Messagethread the static model class
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
		return 'messagethread';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('message_id, sender_status, read_status, content, create_time', 'required'),
			array('message_id, sender_status, read_status, create_time', 'numerical', 'integerOnly'=>true),
			array('sender_status', 'in', 'range'=>array(STATUS_INCOMING,STATUS_OUTGOING)),
			array('read_status', 'in', 'range'=>array(STATUS_READ, STATUS_UNREAD)),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('thread_id, message_id, sender_status, read_status, content, create_time', 'safe', 'on'=>'search'),
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
			'message' => array(self::BELONGS_TO, 'Message', 'message_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'thread_id' => 'Thread',
			'message_id' => 'Message',
			'status' => 'Status',
			'content' => 'Content',
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

		$criteria->compare('thread_id',$this->thread_id);
		$criteria->compare('message_id',$this->message_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}