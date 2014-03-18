<?php
/* @var $this EcaseController */
/* @var $model Ecase */

$this->breadcrumbs=array(
	'Ecases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ecase', 'url'=>array('index')),
	array('label'=>'Create Ecase', 'url'=>array('create')),
	array('label'=>'Update Ecase', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ecase', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ecase', 'url'=>array('admin')),
);
?>

<h1>View Ecase #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'age',
		'mainsuit',
		'current',
		'anamnesis',
		'infect',
		'operation',
		'descrption',
		'examine',
		'assistexamine',
		'initresult',
		'question_id',
	),
)); ?>
