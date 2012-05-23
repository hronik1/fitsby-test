<?php

include_once(dirname(__FILE__)."/../../../models/Encrypter.php");
/**
 * .
 * PasswordForm is the data structure for keeping
 * user password form data. It is used by the 'Password' action of 'DefaultController'.
 */
class PasswordForm extends CFormModel
{
	public $oldpassword;
	public $newpassword;
	public $newpasswordconfirm;

	private $_username;
	private $_user;
	private $_password;
	private $_encrypter;
	

	/**
	 * Declares the validation rules.
	 * oldPassword, newPassword, and newPasswordConfirm must exist
	 * old password must match the users password
	 * newPassword and newPasswordConfirm must match each other
	 * all must be between 8 and 30 characters
	 */
	public function rules(){
		return array(
			//all fields must be entered
			array('oldpassword, newpassword, newpasswordconfirm', 'required'),
			//match oldPassword to this users password
			array('oldpassword', 'authenticate'),
			//confirm newPasswords match
			array('newpassword', 'compare', 'compareAttribute'=>'newpasswordconfirm'),
			//set minimum and maximum length
			array('oldpassword, newpassword, newpasswordconfirm', 'length', 'min'=>8, 'max'=>30),
		);
	}
	
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
                return array(
                        'oldpassword'=>'Old Password',
                        'newpassword'=>'New Password',
                		'newpasswordconfirm'=>'Confirm New Password',
                );
		
	}
	
	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		$this->_encrypter = new Encrypter();
		$this->_username = Yii::app()->user->getName();
		$this->_user = User::model()->findByPk($this->_username);
		$this->_password = $this->_user->password;
		$encryptedPassword = $this->_encrypter->encrypt($this->oldpassword);
		if($this->_password !== $encryptedPassword)
			$this->addError('oldpassword','Sorry does not match password for this user');
	}
	
	/**
	 * updates the user to their new password
	 */
	public function update()
	{
		$this->_user->password = $this->_encrypter->encrypt($this->newpassword);
		$this->_user->save();
	}
}