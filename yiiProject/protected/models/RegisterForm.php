<?php
/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user register form data. It is used by the 'Register' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	public $firstname;
	public $lastname;
	public $username;
	public $email;
	public $password;
	public $password2;
	public $gender;
	public $goal;
	public $birthmonth;
	public $birthday;
	public $birthyear;

	private $_identity;
	
	/**
	 * Declares the validation rules.
	 * The rules state that firstname, lastname, username, email and both passwords are required,
	 * email is actually an email
	 * passwords match
	 * min and max field lengths
	 * ensure valid age of user
	 * username and email are unique
	 */
	public function rules()
	{
		return array(
				// all entries are required
				array('firstname, lastname, username, email, password, password2, birthday, birthmonth, birthyear, goal, gender', 'required'),
				//email is an email
				array('email', 'email'),
				//ensure passwords match
				array('password', 'compare', 'compareAttribute'=>'password2', 'on'=>'register'),
				//set min password length
				array('password', 'length', 'min'=>8),
				//set max field lengths
				array('firstname, lastname, username, email, password', 'length', 'max'=>30),
				//ensure that users aren't too young
				//TODO make more robust age validator
				array('birthyear', 'numerical', 'max'=>date('Y')-13, 'tooBig'=>"Sorry too young"),
				//ensure username and email are unique
				array('username, email', 'unique', 'className' => 'User'),
		);
	}
	
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
                return array(
                        'username'=>'Username',
                        'password'=>'Password',
                		'password2'=>'Confirm Password',
                        'email'=>'Email',
                		'firstname'=>'First Name',
                		'lastname'=>'Last Name',
                );
		
	}

	
}