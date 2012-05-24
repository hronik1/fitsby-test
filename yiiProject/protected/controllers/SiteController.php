<?php


include_once(dirname(__FILE__)."/../components/Controller.php");
//include(dirname(__FILE__)."/../models/Encrypter.php");
/**
 * SiteController is the default controller to handle user requests.
 */
class SiteController extends Controller
{

	

	
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
// 		echo 'Hello World';
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
	
	/**
	 * this action to be called on Login
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(array('profile/default/index'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	/**
	 * Displays the register page
	 */
	public function actionRegister()
	{
		$model=new RegisterForm;
		$newUser = new User;
		$newProfile = new Profile;
		$encrypter = new Encrypter();
	
        //uncomment to enable ajax authentication
// 		// if it is ajax validation request
// 		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
// 		{
// 			echo CActiveForm::validate($model);
// 			Yii::app()->end();
// 		}
	
		// collect user input data
		if(isset($_POST['RegisterForm']))
		{
			$model->attributes=$_POST['RegisterForm'];
			if($model->validate()){
				$newUser->username = $model->username;
				$newUser->password = $encrypter->encrypt($model->password);
				$newUser->email = $model->email;
				$newProfile->birthday = $model->birthday;
				$newProfile->birthmonth = $model->birthmonth;
				$newProfile->birthyear = $model->birthyear;
				$newProfile->gender = $model->gender;
				$newProfile->goal = $model->goal;
				$newProfile->firstname = $model->firstname;
				$newProfile->lastname = $model->lastname;
				$newProfile->profile_username = $model->username;
				
				//TODO further authenticate on email, validate birthday
				if($newUser->save() && $newProfile->save()) {
					$identity=new UserIdentity($newUser->username,$model->password);
					$identity->authenticate();
					Yii::app()->user->login($identity,0);
					//redirect the user to page he/she came from
					$this->redirect(Yii::app()->user->returnUrl);
				}
			}
	
		}
		// display the register form
		$this->render('register',array('model'=>$model));
	}
	
	/**
	 * logs the current user out
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	/**
	 * loads up the settings menu
	 */
	public function actionSettings(){
		echo "Settings";
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
}