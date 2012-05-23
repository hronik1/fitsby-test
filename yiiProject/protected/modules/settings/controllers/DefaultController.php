<?php

class DefaultController extends CController
{
	/**
	 * default action of the default controller
	 */
	public function actionIndex()
	{
		$this->render('index');
	}
	
	/**
	 * performs all actions required to allow user to change their password
	 */
	public function actionPassword()
	{
		$model=new PasswordForm;
		
		// uncomment the following code to enable ajax-based validation
		/*
		 if(isset($_POST['ajax']) && $_POST['ajax']==='password-form-password-form')
		 {
		echo CActiveForm::validate($model);
		Yii::app()->end();
		}
		*/
		
		if(isset($_POST['PasswordForm']))
		{
			$model->attributes=$_POST['PasswordForm'];
			if($model->validate())
			{
				// form inputs are valid, do something here
				
				//figure out which page should be returned to
				$model->update();
				$this->redirect(array('default/index'));
				return;
			}
		}
		$this->render('password',array('model'=>$model));
	}
	

	public function actionInformation()
	{
		$model=new InformationForm;

		// uncomment the following code to enable ajax-based validation
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='information-form-information-form')
		{
		echo CActiveForm::validate($model);
		Yii::app()->end();
		}
		

		if(isset($_POST['InformationForm']))
		{
			$model->attributes=$_POST['InformationForm'];
			if($model->validate())
			{
				// form inputs are valid, do something here
				$model->update();
				$this->redirect(array('default/index'));
				return;
			}
		}
		$this->render('information',array('model'=>$model));
	}

}