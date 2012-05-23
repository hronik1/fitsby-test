<?php

/**
 * .
 * InformationForm is the data structure for keeping
 * user information form data. It is used by the 'information' action of 'DefaultController'.
 */
class InformationForm extends CFormModel
{
	public $firstname;
	public $lastname;
	public $title;
	
	public $goal;
	public $height;
	public $weight;
	public $location;
	
	private $_username;
	private $_profile;
	
	/**
	 * Declares the validation rules
	 */
	public function rules()
	{
		return array(
				//sets goal to be required
				array('goal', 'required'),
				//set maximum length of name to be 30 characters
				array('firstname, lastname', 'length', 'max'=>30),
				//set maximum length of title and location to be 64 characters
				array('title, location', 'length', 'max'=>64),
				//set limits and error messages for height
				array('height', 'numerical', 'min'=>0, 'max'=>108, 'tooSmall'=>'Really? Come on now, negative height?', 'tooBig'=>'9 feet tall?! No way!'),
				//set limits on weight
				array('weight', 'numerical', 'min'=>0, 'max'=>500, 'tooSmall'=>'We do not believe you are THAT lean ;)', 'tooBig'=>'Solid bloat my friend!'),
		);
	}
	
	/**
	 * Provides user descriptive labels for the attributes on the form
	 */
	public function attributeLabels()
	{
		return array(
			'firstname' => 'First Name',
			'lastname' => 'Last Name',
			'title' => 'Title',
			'goal' => 'Goal',
			'height' => 'Height(in inches)',
			'weight' => 'Weight(in pounds)',
			'location' => 'Location',
		);
	}
	
	public function update()
	{
		$this->_username = Yii::app()->user->getName();
		$this->_profile = Profile::model()->findByAttributes(array('profile_username'=>$this->_username));
	}
	
}