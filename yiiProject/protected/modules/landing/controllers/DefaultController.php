<?php

class DefaultController extends CController
{
	
	public function actionIndex()
	{
		$this->layout='main';
		$this->render('index');
	}
	

}