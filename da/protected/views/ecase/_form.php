<?php
/* @var $this EcaseController */
/* @var $model Ecase */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ecase-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mainsuit'); ?>
		<?php echo $form->textArea($model,'mainsuit',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'mainsuit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current'); ?>
		<?php echo $form->textArea($model,'current',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'current'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'anamnesis'); ?>
		<?php echo $form->textArea($model,'anamnesis',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'anamnesis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'infect'); ?>
		<?php echo $form->textArea($model,'infect',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'infect'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operation'); ?>
		<?php echo $form->textArea($model,'operation',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'operation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descrption'); ?>
		<?php echo $form->textArea($model,'descrption',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descrption'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'examine'); ?>
		<?php echo $form->textArea($model,'examine',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'examine'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'assistexamine'); ?>
		<?php echo $form->textArea($model,'assistexamine',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'assistexamine'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'initresult'); ?>
		<?php echo $form->textArea($model,'initresult',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'initresult'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'question_id'); ?>
		<?php echo $form->textField($model,'question_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'question_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->