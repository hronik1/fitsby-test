<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'password-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'oldpassword'); ?>
		<?php echo $form->passwordField($model,'oldpassword'); ?>
		<?php echo $form->error($model,'oldpassword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'newpassword'); ?>
		<?php echo $form->passwordField($model,'newpassword'); ?>
		<?php echo $form->error($model,'newpassword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'newpasswordconfirm'); ?>
		<?php echo $form->passwordField($model,'newpasswordconfirm'); ?>
		<?php echo $form->error($model,'newpasswordconfirm'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->