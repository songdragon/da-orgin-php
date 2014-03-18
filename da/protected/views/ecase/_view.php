<?php
/* @var $this EcaseController */
/* @var $data Ecase */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mainsuit')); ?>:</b>
	<?php echo CHtml::encode($data->mainsuit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current')); ?>:</b>
	<?php echo CHtml::encode($data->current); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anamnesis')); ?>:</b>
	<?php echo CHtml::encode($data->anamnesis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('infect')); ?>:</b>
	<?php echo CHtml::encode($data->infect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operation')); ?>:</b>
	<?php echo CHtml::encode($data->operation); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('descrption')); ?>:</b>
	<?php echo CHtml::encode($data->descrption); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('examine')); ?>:</b>
	<?php echo CHtml::encode($data->examine); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assistexamine')); ?>:</b>
	<?php echo CHtml::encode($data->assistexamine); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('initresult')); ?>:</b>
	<?php echo CHtml::encode($data->initresult); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_id')); ?>:</b>
	<?php echo CHtml::encode($data->question_id); ?>
	<br />

	*/ ?>

</div>