<?php
/* @var $this UserController */
/* @var $user User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php

$form = $this->beginWidget ( 'CActiveForm', array (
		'id' => 'user-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false 
) );
?>

	<p class="note">
		Fields with <span class="required">*</span> are required.
	</p>

	<?php echo $form->errorSummary($user); ?>

	<div class="row">
		<?php echo $form->labelEx($user,'username'); ?>
		<?php echo $form->textField($user,'username',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($user,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'password'); ?>
		<?php echo $form->passwordField($user,'password',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($user,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'password_repeat'); ?>
		<?php echo $form->textField($user,'password_repeat', array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($user,'password_repeat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'nickname'); ?>
		<?php echo $form->textField($user,'nickname',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($user,'nickname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'address'); ?>
		<?php echo $form->textField($user,'address',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($user,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'telephone'); ?>
		<?php echo $form->textField($user,'telephone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($user,'telephone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'mobile'); ?>
		<?php echo $form->textField($user,'mobile',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($user,'mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'district'); ?>
		<?php echo $form->dropDownList($user, 'district',$district);?>
		<?php echo $form->error($user,'district'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'email'); ?>
		<?php echo $form->textField($user,'email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($user,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($doctor,'name'); ?>
		<?php echo $form->textField($doctor,'name',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($doctor,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($doctor,'birthday'); ?>
		<?php
		
		$this->widget ( 'zii.widgets.jui.CJuiDatePicker', array (
				'model' => $doctor,
				'attribute' => 'birthday',
				'name' => 'birthday',
				// additional javascript options for the date picker plugin
				'options' => array (
						'showAnim' => 'fold',
						'changeYear' => true,
						'changeMonth' => true,
						'yearRange' => '-100:+0',
						'dateFormat' => 'yy-dd-mm',
				),
				'htmlOptions' => array (
						'style' => 'height:20px;' 
				) 
		) );
		?>
		<?php echo $form->error($doctor,'birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($doctor,'phano'); ?>
		<?php echo $form->textField($doctor,'phano'); ?>
		<?php echo $form->error($doctor,'phano'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($doctor,'department'); ?>
		<?php echo $form->dropDownList($doctor, 'department',$department);/*$form->textField($doctor,'department');*/ ?>
		<?php echo $form->error($doctor,'department'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($doctor,'hospital'); ?>
		<?php echo $form->textField($doctor,'hospital'); ?>
		<?php echo $form->error($doctor,'hospital'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($doctor,'title'); ?>
		<?php echo $form->dropDownList($doctor, 'title',$title); ?>
		<?php echo $form->error($doctor,'title'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($user->isNewRecord ? '注册' : '保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->