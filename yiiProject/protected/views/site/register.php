<?php
$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
	'Register',
);
?>

<h1>Register</h1>
	
<p class="note">Fields with <span class="required">*</span> are required.</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname'); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname'); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->passwordField($model,'password2'); ?>
		<?php echo $form->error($model,'password2'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'birthday', Profile::model()->getDayOptions()); ?>
		<?php echo $form->dropDownList($model,'birthmonth', Profile::model()->getMonthOptions()); ?>
		<?php echo $form->dropDownList($model,'birthyear', Profile::model()->getYearOptions()); ?>
		<?php echo $form->error($model,'birthyear'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->dropDownList($model,'gender', Profile::model()->getGenderOptions());?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'goal', Profile::model()->getGoalOptions());?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->